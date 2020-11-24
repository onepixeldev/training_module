<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_application extends MY_Controller
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        parent::__construct();
        //$this->loadModel('mdl');
        $this->load->model('Training_application_model', 'mdl');
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }

    // View MAIN Page
    public function index()
    {
        // clear filter
        $this->session->set_userdata('tabID', '');

        $this->redirect($this->class_uri('ATF001'));
    }

    // TRAINING SETUP
    public function ATF001()
    {   
        $this->render();
    }

    // APPROVE TRAINING APPLICATION
    public function ATF002()
    { 
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curUsrDept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curUsrDept'];
        }

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($deptCode), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    // ASSIGN TRAINING
    public function ATF004()
    { 
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curUsrDept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curUsrDept'];
        }

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($deptCode), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    // APPROVE TRAINING SETUP
    public function ATF027()
    { 
        // default value filter
        // default training status
        $data['def_tr_sts'] = 'ENTRY';
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curUsrDept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curUsrDept'];
        }

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($deptCode), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get training status list
        $data['tr_sts_list'] = array('ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE');

        $this->render($data);
    }

    // QUERY TRAINING
    public function ATF008()
    { 
        // default value filter
        // default internal/external
        $data['def_int_ext'] = '';
        // default training status
        $data['def_tr_sts'] = 'APPROVE';
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        $data['int_ext_list'] = array(''=>'--- Please Select ---', 'INTERNAL'=>'INTERNAL', 'EXTERNAL'=>'EXTERNAL', 'EXTERNAL_AGENCY'=>'EXTERNAL AGENCY');
        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' --- Please select --- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' --- Please select --- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' --- Please select --- ');
        //get training status list
        $data['tr_sts_list'] = $this->dropdown($this->mdl->getTrainingStsList(), 'TH_STATUS', 'TH_STATUS', ' --- Please select --- ');

        $this->render($data);
    }

    // EDIT APPROVED TRAINING SETUP
    public function ATF044()
    {   
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curUsrDept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curUsrDept'];
        }

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($deptCode), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get training status list
        //$data['tr_sts_list'] = array('ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE');

        $this->render($data);
    }

    // CONFIRMATION ATTEND TRAINING
    public function ATF148()
    {   
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get training status list
        //$data['tr_sts_list'] = array('ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE');

        $this->render($data);
    }

    // UPDATE CPD INFO
    /*public function ATF123B()
    {   
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get training status list
        //$data['tr_sts_list'] = array('ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE');

        $this->render($data);
    }*/

    public function ATF123B() {
        $this->cpd->ATF123B();
    }

    // QUERY STAFF TRAINING
    public function ATF041()
    { 
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        //$data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' --- Please select --- ');

        $this->render($data);
    }

    // QUERY STAFF TRAINING
    public function ATF123()
    { 
        // default value filter
        // default dept
        //$data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        //$data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;

        // get department dd list
        //$data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' --- Please select --- ');

        $this->render();
    }

    // STAFF TRAINING EVALUATION
    public function ATF104()
    {   
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curUsrDept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curUsrDept'];
        }

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($deptCode), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get training status list
        //$data['tr_sts_list'] = array('ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE');

        $this->render($data);
    }

    // STAFF EVALUATOR SEND MEMO
    public function ATF121()
    {   
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curUsrDept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curUsrDept'];
        }

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($deptCode), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get training status list
        //$data['tr_sts_list'] = array('ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE');

        $this->render($data);
    }
    
    // REPORT FOR TRAINING EVALUATION
    public function ATF166()
    {   
        // clear filter for report
        $this->session->set_userdata('repCode2','');
        $this->session->set_userdata('year_i2','');
        $this->session->set_userdata('department2','');
        $this->session->set_userdata('staffID2','');
        $this->session->set_userdata('corTitle22','');
        $this->session->set_userdata('courseDate2','');
        $this->session->set_userdata('sMonth2','');
        $this->session->set_userdata('sYear2','');
        $this->session->set_userdata('corTitle2','');

        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        // get staff dd list
        $data['staff_list'] = $this->dropdown($this->mdl->getStaffListDD(), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get course list
        $data['course_list_btm'] = $this->dropdown($this->mdl->getCourseListEff(), 'TH_REF_ID', 'COURSE_ID_NAME', ' ---Please select--- ');

        $this->render($data);
    }

    // TRAINING SECRETARIAT REPORT - MANUAL ENTRY
    public function ATF147()
    {   
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curUsrDept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curUsrDept'];
        }

        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($deptCode), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get training status list
        //$data['tr_sts_list'] = array('ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE');

        $this->render($data);
    }

    // TRAINING APPLICATION REPORTS
    public function ATF081()
    {   
        $this->render();
    }

    // View Page Filter
    public function viewTabFilter($tabID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        redirect($this->class_uri('ATF001'));
    }

    /*===========================================================
       TRAINING APPLICATION [TRAINING SETUP]
    =============================================================*/
    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingInfo()
    {   
        // user dept
        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curUsrDept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curUsrDept'];
        }

        // get available records
        $data['trainingInfo'] = $this->mdl->getTrainingInfo2($deptCode);

        $this->render($data);
    }

    public function speakerInfo()
    {   
        $tsRefID = $this->input->post('tsRefID', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['speakerInfoExternal'] = $this->mdl->getSpeakerInfoExternal($tsRefID);
            $data['speakerInfoStaff'] = $this->mdl->getSpeakerInfoStaff($tsRefID);
        }

        $this->renderAjax($data);
    }

    public function facilitatorInfo()
    {   
        $tsRefID = $this->input->post('tsRefID', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['facilitatorInfoExternal'] = $this->mdl->getFacilitatorInfoExternal($tsRefID);
            $data['facilitatorInfoStaff'] = $this->mdl->getFacilitatorInfoStaff($tsRefID);
        }

        $this->render($data);
    }

    public function targetGroup()
    {   
        $tsRefID = $this->input->post('trRefID', true);
        $tName = $this->input->post('tName', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['tname'] = $tName;
            $data['targetGroup'] = $this->mdl->getTargetGroup($tsRefID);
        }

        $this->render($data);
    }

    public function moduleSetup()
    {   
        $tsRefID = $this->input->post('tsRefID', true);
        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['moduleSetup'] = $this->mdl->getmoduleSetup($tsRefID);
        }

        $this->render($data);
    }

    public function cpdSetup()
    {   
        $tsRefID = $this->input->post('tsRefID', true);
        $tName = $this->input->post('tName', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['tname'] = $tName;
            $data['cpdSetup'] = $this->mdl->getCpdSetup($tsRefID);
            if (!empty($data['cpdSetup']->CH_CATEGORY)){
                $data['cpdSetupCat'] = $this->mdl->getCpdSetupCategory($data['cpdSetup']->CH_CATEGORY);
                if(!empty($data['cpdSetupCat'])) {
                    $data['cpdSetupCatDesc'] = $data['cpdSetupCat']->CH_CC_CATEGORY_DESC;
                } else {
                    $data['cpdSetupCatDesc'] = '';
                }
            } else {
                $data['cpdSetupCatDesc'] = '';
            }
        }

        $this->renderAjax($data);
    }

    // Populate state list
    public function stateList(){
        $this->isAjax();
        
        $countCode = $this->input->post('countryCode', true);
        
        // get available records
        $stateList = $this->mdl->getCountryStateList($countCode);
               
        if (!empty($stateList)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'stateList' => $stateList);
        
        echo json_encode($json);
    }

    // Populate organizer info
    public function organizerInfo()
    {
        $this->isAjax();
        
        $organizerCode = $this->input->post('orgCode', true);
        
        // get available records
        $organizerInfo = $this->mdl->getOrganizerName($organizerCode);
               
        if (!empty($organizerInfo)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'orgInfo' => $organizerInfo);
        
        echo json_encode($json);
    }

    // Populate speaker list
    public function speakerList(){
        $this->isAjax();
        
        $trSpeakerCode = $this->input->post('trSpeakerCode', true);
        $tpSpeaker = $this->input->post('tpSpeaker', true);

        if(!empty($trSpeakerCode)) {
            if($tpSpeaker == 'STAFF') {
                $spList = $this->mdl->getSpeakerList($tpSpeaker, $trSpeakerCode);
                   
                if (!empty($spList)) {
                    $success = 1;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'spList' => $spList);
            } 
            elseif($tpSpeaker == 'EXTERNAL') {
                $spList = $this->mdl->getSpeakerList($tpSpeaker, $trSpeakerCode);
                   
                if (!empty($spList)) {
                    $success = 2;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'spList' => $spList);
            } 
            else {
                $spList = '';
                $success = 0;
                
                $json = array('sts' => $success, 'spList' => $spList);
            }
        }
        
        // get available records
        if(empty($trSpeakerCode)) {
            if($tpSpeaker == 'STAFF') {
                $spList = $this->mdl->getSpeakerList($tpSpeaker);
                   
                if (!empty($spList)) {
                    $success = 1;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'spList' => $spList);
            } 
            elseif($tpSpeaker == 'EXTERNAL') {
                $spList = $this->mdl->getSpeakerList($tpSpeaker);
                   
                if (!empty($spList)) {
                    $success = 2;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'spList' => $spList);
            } 
            else {
                $spList = '';
                $success = 0;
                
                $json = array('sts' => $success, 'spList' => $spList);
            }
        }
        
        echo json_encode($json);
    }

    // Populate facilitator list
    public function facilitatorList(){
        $this->isAjax();
        
        $tpFacilitator = $this->input->post('tpFacilitator', true);
        
        // get available records
        if(!empty($tpFacilitator)) {
            if($tpFacilitator == 'STAFF') {
                $fiList = $this->mdl->getFacilitatorList($tpFacilitator);
                   
                if (!empty($fiList)) {
                    $success = 1;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'fiList' => $fiList);
            } 
            elseif($tpFacilitator == 'EXTERNAL') {
                $fiList = $this->mdl->getFacilitatorList($tpFacilitator);
                   
                if (!empty($fiList)) {
                    $success = 2;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'fiList' => $fiList);
            } 
            else {
                $fiList = '';
                $success = 0;
                
                $json = array('sts' => $success, 'fiList' => $fiList);
            }
        }
        
        echo json_encode($json);
    }

    // Populate target group details
    public function tgList(){
        $this->isAjax();
        
        $groupCode = $this->input->post('grpCode', true);
        
        // get available records
        if(!empty($groupCode)) {
            $tgList = $this->mdl->getTargetGroupList($groupCode);
                
            if (!empty($tgList)) {
                $success = 1;
            } else {
                $success = 0;
            }
            
            $json = array('sts' => $success, 'tgList' => $tgList);
            
        } else {
            $tgList = '';
            $success = 0;
            
            $json = array('sts' => $success, 'tgList' => $tgList);
        }
        
        echo json_encode($json);
    }

    // LIST OF ELIGIBLE POSITION 
    public function listEgPosition(){

        $groupCode = $this->input->post('gpCode', true);
        $schemeCode = $this->input->post('schemeCode', true);
        $gradeTo = $this->input->post('gradeTo', true);
        $svcGrp = $this->input->post('svcGrp', true);
        $aca = $this->input->post('aca', true);

        if(!empty($aca)) {
            if($aca == 'NO'){
                $aca = 'N';
            } elseif($aca == 'YES') {
                $aca = 'Y';
            }
        } else {
            $aca = '';
        }

        // get available records
        if(!empty($groupCode)){
            $data['gp_code'] = $groupCode;
            $data['schemeCode'] = $schemeCode;
            $data['gradeTo'] = $gradeTo;
            $data['svcGrp'] = $svcGrp;
            $data['aca'] = $aca;

            $data['list_eg_pos'] = $this->mdl->getListEgPosition($groupCode);
        }

        $this->render($data);
    }

    // edit modal eg position
    public function addEgPos(){

        $gpCode = $this->input->post('gpCode', true);
        // $tgsSeq = $this->input->post('tgsSeq', true);
        // $svcCode = $this->input->post('svcCode', true);
        $schemeCode = $this->input->post('schemeCode', true);
        $gradeTo = $this->input->post('gradeTo', true);
        $svcGrp = $this->input->post('svcGrp', true);
        $aca = $this->input->post('aca', true);

        // get available records
        if(!empty($gpCode)){
            $data['gpCode'] = $gpCode;
            // $data['tgsSeq'] = $tgsSeq;
            // $data['svcCode'] = $svcCode;
            $data['service_list'] = $this->dropdown($this->mdl->getServiceList($schemeCode, $gradeTo, $svcGrp, $aca), 'SS_SERVICE_CODE', 'SS_SERVICE_DESC', ' ---Please select--- ');
        }

        $this->render($data);
    }

    // SAVE insert eg position
    public function saveInsertEgPos() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // GROUP CODE
        $gpCode = $form['gpcode'];
        
        // svc code
        $svcCode = $form['service'];

        // form / input validation
        $rule = array(
            'service' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin update Record
        if ($status == 1 && !empty($gpCode)) {
            $checkTGS = $this->mdl->checkTGS2($gpCode, $svcCode);

            if(empty($checkTGS)) {
                $insert = $this->mdl->saveInsertEgPos($form, $gpCode);

                if($insert > 0) {
                    $ps_row = $this->PsRow($gpCode, $svcCode);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'ps_row' => $ps_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // training speaker row
    private function PsRow($gpCode, $svcCode){
        $data['gpCode'] = $gpCode;
        $data['svcCode'] = $svcCode;
        $data['getListEgPosition'] = $this->mdl->getListEgPosition($gpCode, $svcCode);
		
		return $this->load->view('Training_application/PsRow', $data, true);	
    }

    public function verifyStructuredTrainingSetup()
    {
        $refID = $this->input->post('refID',true);
        
        if(!empty($refID)) {

            $data['verStrTrCode'] = $this->mdl->getTrainingInfoDetail($refID);
            $data['verStrTr'] = $this->mdl->getCountTargetGroup($refID);

            if((!empty($data['verStrTrCode']->TH_TRAINING_CODE) && $data['verStrTr']->COUNT_TG > 0)){
                $json = array('sts' => 1, 'msg' => ''.nl2br("Please delete target group first \n\n <b>Structured Training Ref ID:</b> ".$data['verStrTrCode']->TH_TRAINING_CODE."").'', 'alert' => 'danger');
            } else{
                $json = array('sts' => 0, 'msg' => 'OK!', 'alert' => 'success');
            }
            
            echo json_encode($json);
        }
    }

    // SELECT TABLE MODAL STRUCTURED TRAINING
    public function setupStructuredTraining()
    {
        $data['str_tr'] = $this->mdl->getStructuredTraining();

        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/

    // add training info
    public function addNewTraining()
    {
        $countCode = $this->input->post('countryCode',true);
        $organizerCode = $this->input->post('orgCode',true);

        $data['type_list'] = $this->dropdown($this->mdl->getTypeList(), 'TT_CODE', 'TT_CODE_DESC', ' ---Please select--- ');
        $data['category'] = $this->dropdown($this->mdl->getCategoryList(), 'TC_CATEGORY', 'TC_CATEGORY', ' ---Please select--- ');
        $data['level'] = $this->dropdown($this->mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');
        $data['area'] = $this->dropdown($this->mdl->getAreaList(), 'TF_CODE', 'TF_CODE_DESC', ' ---Please select--- ');
        $data['sgroup'] = $this->dropdown($this->mdl->getSgroupList(), 'SG_GROUP_CODE', 'SG_CODE_DESC', ' ---Please select--- ');
        $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');
        $data['com_lvl_code'] = $this->dropdown($this->mdl->getCompetencyLevel(), 'TCL_COMPETENCY_CODE', 'TCL_COMPETENCY_CODE_DESC', ' ---Please select--- ');
        $data['coor'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
        $data['coor_sec'] = $this->dropdown($this->mdl->getCoordinatorSec(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');
        $data['org_lvl'] = $this->dropdown($this->mdl->getOrganizerLevel(), 'TOL_CODE', 'TOL_CODE_DESC', ' ---Please select--- ');
        $data['org_name'] = $this->dropdown($this->mdl->getOrganizerName(), 'TOH_ORG_CODE', 'TOH_ORG_CODE_DESC', ' ---Please select--- ');

        $data['count_def'] = $this->mdl->getCountryDef();

        $countCode2= 'MYS';
        if (!empty($countCode2) || !empty($countCode)) {
            $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode2), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
        } else {
            $data['state_list'] = '';
        }

        if (!empty($organizerCode)) {
            $data['org_info'] = $this->mdl->getCountryStateList($countCode);
        } else {
            $data['org_info'] = '';
        }

        //$data['count_code'] = $countCode;
        //$data['org_code'] = $organizerCode;
        
        $this->renderAjax($data);
    }
    
    public function saveNewTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TH_TRAINING_CODE
        $trCode = $form['structured_training'];

        // module setup
        $coor = $form['coordinator'];
        $coorSeq = $form['coordinator_sector'];
        $coorContact = $form['phone_number'];
        $evaluationTHD = $form['evaluation'];

        // training name
        $trName = $form['training_title'];

        // // evaluation period not/required
        // if($evaluationTHD == 'Y') {
        //     $evaluationFrReq = 'required|max_length[30]';
        //     $evaluationToReq = 'required|max_length[30]';
        // } else {
        //     $evaluationFrReq = 'max_length[30]';
        //     $evaluationToReq = 'max_length[30]';
        // }

        // form / input validation
        $rule = array(
            // 0
            'type' => 'required|max_length[100]', 
            'category' => 'required|max_length[200]',
            'structured_training' => 'max_length[20]',
            'level' => 'required|max_length[10]', 
            'area' => 'max_length[200]', 
            'service_group' => 'max_length[10]',
            'training_title' => 'required|max_length[100]', 
            'training_description' => 'max_length[500]', 
            'venue' => 'max_length[100]',
            'country' => 'max_length[10]', 
            'state' => 'max_length[10]', 
            'date_from' => 'required|max_length[11]',
            'date_to' => 'required|max_length[11]', 
            'time_from' => 'required|max_length[11]', 
            'time_to' => 'required|max_length[11]',
            'total_hours' => 'required|numeric|max_length[12]', 
            'internal_external' => 'required|max_length[20]', 
            'sponsor' => 'max_length[100]',
            'offer' => 'max_length[1]', 
            'participants' => 'integer|max_length[11]', 
            'online_application' => 'max_length[1]',
            'closing_date' => 'max_length[11]', 
            'competency_code' => 'max_length[10]', 
            'evaluation_period_from' => 'max_length[30]',
            'evaluation_period_to' => 'max_length[30]', 

            // 'evaluation_period_from' => $evaluationFrReq,
            // 'evaluation_period_to' => $evaluationToReq, 

            // TRAINING_HEAD_DETL
            'coordinator' => 'max_length[10]', 
            'coordinator_sector' => 'max_length[10]',
            'phone_number' => 'max_length[15]', 
            'evaluation' => 'max_length[1]', 
            
            // confirmation due info
            'confirmation_due_date_from' => 'required|max_length[11]', 'confirmation_due_date_to' => 'required|max_length[11]',
            
            // organizer info
            'organizer_level' => 'max_length[10]', 'organizer_name' => 'max_length[100]', 

            // completion info
            'evaluation_compulsary' => 'max_length[1]', 'attendance_type' => 'max_length[20]', 'print_certificate' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {
            $data['refID'] = $this->mdl->getRefID();

            if(!empty($data['refID'])){
                $refid = $data['refID']->REF_ID;
                $insert = $this->mdl->insertTrainingHead($form, $refid);

                if($insert > 0 && empty($trCode)){
                    $insTrHeadMsg = 'TRAINING_HEAD success! ';

                    // INSERT TRAINING HEAD DETAIL
                    if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD)) {
                        $insertTHD = $this->mdl->insertTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);

                        if($insertTHD > 0) {
                            $insTHDMsg = 'TRAINING_HEAD_DETL (Module Setup) success! ';
                        } else {
                            $insTHDMsg = '';
                        }
                    } else {
                        $insTHDMsg = '';
                    }

                    $stsMsg = nl2br("\n".$insTrHeadMsg."\n".$insTHDMsg);
                    $json = array('sts' => 1, 'msg' => nl2br("Record has been saved \n".$stsMsg), 'alert' => 'success', 'refid' => $refid, 'trName' => $trName);
                }
                elseif ($insert > 0 && !empty($trCode)) {

                    $insTrHeadMsg = 'TRAINING_HEAD success! ';
                    //$insTrHeadMsg = $refid;

                    $data['compt'] = $this->mdl->getStructuredTraining($trCode);
                    $data['resultTTG'] = $this->mdl->getResultTTG($trCode);
                    $data['resultTGS'] = $this->mdl->getResultTGS($trCode);
                    $insCount = 0; // tr grp
                    $insCount2 = 0; // tr grp service

                    // INSERT CPD HEAD (CPD Setup)
                    if(!empty($data['compt']->TTH_COMPETENCY)){
                        $competency = $data['compt']->TTH_COMPETENCY;
                    } else {
                        $competency = '';
                    }
                    $insertCPDHead = $this->mdl->insertCPDHead($refid, $competency); 

                    if($insertCPDHead > 0) {
                        $insCpdHeadMsg = 'CPD_HEAD (CPD Setup) success! ';
                    } 
                    else {
                        $insCpdHeadMsg = '';
                    }

                    // INSERT TRAINING GROUP
                    if(!empty($data['resultTTG'])){

                        foreach($data['resultTTG'] as $rtg){
                            $gpCode = $rtg->TTG_GROUP_CODE;

                            $insertTrainingTargetGroup = $this->mdl->insertTrainingTargetGroup($refid, $gpCode);
                            $insCount++;
                        }
                    } else {
                        $insertTrainingTargetGroup = 0;
                    }

                    if($insertTrainingTargetGroup == $insCount) {
                        $insTTGMsg = 'TRAINING_TARGET_GROUP (Target Group) success! ';
                    } else {
                        $insTTGMsg = '';
                    }

                    // INSERT TRAINING GROUP SERVICE
                    if(!empty($data['resultTGS'])){
                        $insertTrainingGroupService = 0;

                        foreach($data['resultTGS'] as $rtgs){
                            $gpCode = $rtgs->TTG_GROUP_CODE;
                            $tgsSeq = $rtgs->TGS_SEQ;
                            $tgsSvcCode = $rtgs->TGS_SERVICE_CODE;

                            // verify if specific data already exist in training group service
                            $data['verifyTGS'] = $this->mdl->checkTGS($gpCode, $tgsSeq);

                            if(empty($data['verifyTGS'])){
                                $insertTrainingGroupService = $this->mdl->insertTrainingGroupService($gpCode, $tgsSeq, $tgsSvcCode);
                                $insCount2++;
                            }
                        }
                    } else {
                        $insertTrainingGroupService = 0;
                    }

                    if($insertTrainingGroupService == $insCount2) {
                        $insTGSMsg = 'TRAINING_GROUP_SERVICE success! ';
                    } else {
                        $insTGSMsg = '';
                    }

                    // INSERT TRAINING HEAD DETAIL
                    if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD)) {
                        $insertTHD = $this->mdl->insertTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);
                        
                        if($insertTHD > 0) {
                            $insTHDMsg = 'TRAINING_HEAD_DETL (Module Setup) success! ';
                        } else {
                            $insTHDMsg = '';
                        }
                    } else {
                        $insTHDMsg = '';
                    }

                    $stsMsg = nl2br("\n".$insTrHeadMsg."\n".$insCpdHeadMsg."\n".$insTTGMsg."\n".$insTGSMsg."\n".$insTHDMsg);
                    $json = array('sts' => 1, 'msg' => nl2br("Record has been saved \n".$stsMsg), 'alert' => 'success', 'refid' => $refid, 'trName' => $trName);
                }
                else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        
        //$this->renderAjax($data);
        echo json_encode($json);
    }

    // add training speaker
    public function addTrainingSpeaker()
    {
        $refid = $this->input->post('RefID', true);
        $tpSpeaker = $this->input->post('tpSpeaker', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
        }

        if ($tpSpeaker == 'STAFF') {
            $data['speaker_list'] = $this->dropdown($this->mdl->getSpeakerList($tpSpeaker), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        } 
        elseif($tpSpeaker == 'EXTERNAL') {
            $data['speaker_list'] = $this->dropdown($this->mdl->getSpeakerList($tpSpeaker), 'ES_SPEAKER_ID', 'ES_SPEAKER_ID_NAME', ' ---Please select--- ');
        } else {
            $data['speaker_list'] = '';
        }

        $this->renderAjax($data);
    }

    // save training speaker    
    public function saveTrainingSpeaker()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // SPEAKER ID
        $spID = $form['speaker'];

        // form / input validation
        $rule = array(
        'type' => 'required|max_length[20]', 
        'speaker' => 'required|max_length[10]',
        //'department' => 'required|max_length[100]',
        'contact_phone_no' => 'max_length[15]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check training speaker
            $check = $this->mdl->checkTrainingSpeaker($refid, $spID);

            if(empty($check)) {
                $insert = $this->mdl->insertTrainingSpeaker($form, $refid);

                if($insert > 0) {
                    $sp_row = $this->SpRow($refid, $spID);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'sp_row' => $sp_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // training speaker row
    private function SpRow($refid, $spID){
        $data['refid'] = $refid;
        $data['speakerInfoExternal'] = $this->mdl->getSpeakerInfoExternal($refid, $spID);
        $data['speakerInfoStaff'] = $this->mdl->getSpeakerInfoStaff($refid, $spID);
		
		return $this->load->view('Training_application/SpRow', $data, true);	
    }

    // add training facilitator
    public function addTrainingFacilitator()
    {
        $refid = $this->input->post('RefID', true);
        $tpFacilitator = $this->input->post('tpFacilitator', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
        }

        if ($tpFacilitator == 'STAFF') {
            $data['facilitator_list'] = $this->dropdown($this->mdl->getFacilitatorList($tpFacilitator), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        } 
        elseif($tpFacilitator == 'EXTERNAL') {
            $data['facilitator_list'] = $this->dropdown($this->mdl->getFacilitatorList($tpFacilitator), 'EF_FACILITATOR_ID', 'ES_FACILITATOR_ID_NAME', ' ---Please select--- ');
        } else {
            $data['facilitator_list'] = '';
        }

        $this->renderAjax($data);
    }

    // save training facilitator    
    public function saveTrainingFacilitator()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // FACILITATOR ID
        $fiID = $form['facilitator'];

        // form / input validation
        $rule = array(
            'type' => 'required|max_length[20]', 
            'facilitator' => 'required|max_length[10]',
			'label' => 'required|max_length[2]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check training speaker
            $check = $this->mdl->checkTrainingFacilitator($refid, $fiID, $form['label']);

            if(empty($check)) {
                $insert = $this->mdl->insertTrainingFacilitator($form, $refid);

                if($insert > 0) {
                    $fi_row = $this->FiRow($refid, $fiID);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'fi_row' => $fi_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // training facilitator row
    private function FiRow($refid, $fiID){
        $data['refid'] = $refid;
        $data['facilitatorInfoExternal'] = $this->mdl->getFacilitatorInfoExternal($refid, $fiID);
        $data['facilitatorInfoStaff'] = $this->mdl->getFacilitatorInfoStaff($refid, $fiID);
		
		return $this->load->view('Training_application/FiRow', $data, true);	
    }

    // add target group
    public function addTargetGroup()
    {
        $refid = $this->input->post('RefID', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['tg_list'] = $this->dropdown($this->mdl->getTargetGroupList(), 'TG_GROUP_CODE', 'TG_GROUP_CODE_DESC', ' ---Please select--- ');
        }

        $this->renderAjax($data);
    }

    // save training target group    
    public function saveTrainingTG()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // group code
        $gpCode = $form['group_code'];

        // form / input validation
        $rule = array(
            'group_code' => 'required|max_length[10]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check if record already exist
            $check = $this->mdl->getTargetGroupDetail($refid, $gpCode);

            if(empty($check)) {
                $insert = $this->mdl->insertTrainingTG($form, $refid);

                if($insert > 0) {
                    $tg_row = $this->TgRow($refid, $gpCode);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'tg_row' => $tg_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // training target group row
    private function TgRow($refid, $gpCode){
        $data['refid'] = $refid;
        $data['target_group'] = $this->mdl->getTargetGroup($refid, $gpCode);
		
		return $this->load->view('Training_application/TgRow', $data, true);	
    }

    // add module setup modal  
    public function addModuleSetup()
    {
        $refid = $this->input->post('refid', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['comp_list'] = $this->dropdown($this->mdl->getCompList(), 'TMC_COMPONENT_CODE', 'TMC_CODE_DESC', ' ---Please select--- ');
        }

        $this->renderAjax($data);
    }

    // save module setup    
    public function saveModuleSetup()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'specific_objectives' => 'max_length[2000]',
            'contents' => 'max_length[4000]',
            'component_category' => 'required|max_length[10]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check if record already exist
            $check = $this->mdl->getmoduleSetup($refid);

            if(empty($check)) {
                $insert = $this->mdl->insertModuleSetup($form, $refid);

                if($insert > 0) {
                    $ms_row = $this->msRow($refid);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'msRow' => $ms_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // module setup row
    private function msRow($refid){
        $data['refid'] = $refid;
        $data['tr_head_detl'] = $this->mdl->getmoduleSetup($refid);
		
		return $this->load->view('Training_application/msRow', $data, true);	
    }

    // add cpd setup modal  
    public function addCPDSetup()
    {
        $refid = $this->input->post('refid', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['category_list'] = $this->dropdown($this->mdl->getCpdCategoryList(), 'CC_CATEGORY_CODE', 'CC_CODE_DESC', ' ---Please select--- ');
        }

        $this->renderAjax($data);
    }

    // save cpd setup    
    public function saveCPDSetup()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'competency' => 'required|max_length[20]',
            'category' => 'required|max_length[10]',
            'mark' => 'numeric|max_length[40]',
            'report_submission' => 'required|max_length[10]',
            'compulsory' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check if record already exist
            $check = $this->mdl->getCpdSetup($refid);

            if(empty($check)) {
                $insert = $this->mdl->insertCpdSetup($form, $refid);

                if($insert > 0) {
                    $cpd_row = $this->cpdRow($refid);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'cpdRow' => $cpd_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // module cpd row
    private function cpdRow($refid){
        $data['refid'] = $refid;
        $data['cpdSetup'] = $this->mdl->getCpdSetup($refid);

        if (!empty($data['cpdSetup']->CH_CATEGORY)){
            $data['cpdSetupCat'] = $this->mdl->getCpdSetupCategory($data['cpdSetup']->CH_CATEGORY);
            $data['cpdSetupCatDesc'] = $data['cpdSetupCat']->CH_CC_CATEGORY_DESC;
        } else {
            $data['cpdSetupCatDesc'] = '';
        }
		
		return $this->load->view('Training_application/cpdRow', $data, true);	
    }


    /*_____________________
        UPDATE PROCESS
    _____________________*/

    // update training head
    public function editTraining($refID = null)
    {
        $refID = $this->input->post('refID',true);
        $countCode = $this->input->post('countryCode',true);
        $organizerCode = $this->input->post('orgCode',true);

        // ATF044
        $scCode = $this->input->post('scCode',true);
        if(!empty($scCode)) {
            $data['defSecCode'] = $scCode;
        } else {
            $data['defSecCode'] = '';
        }
        
        if(!empty($refID)) {
            
            $data['trInfo'] = $this->mdl->getTrainingInfoDetail($refID);
            if(!empty($data['trInfo']->TH_ORGANIZER_NAME)) {
                $data['trOrg'] = $this->mdl->getOrganizerName($data['trInfo']->TH_ORGANIZER_NAME);
                if(!empty($data['trOrg'])) {
                    $data['OrgAdd'] = $data['trOrg']->TOH_ADDRESS;
                    $data['OrgPost'] = $data['trOrg']->TOH_POSTCODE;
                    $data['OrgCity'] = $data['trOrg']->TOH_CITY;
                    $data['OrgState'] = $data['trOrg']->SM_STATE_DESC;
                    $data['OrgCountry'] = $data['trOrg']->CM_COUNTRY_DESC;
                }
                else {
                    $data['OrgAdd'] = '';
                    $data['OrgPost'] = '';
                    $data['OrgCity'] = '';
                    $data['OrgState'] = '';
                    $data['OrgCountry'] = '';     
                } 
            } else {
                $data['OrgAdd'] = '';
                $data['OrgPost'] = '';
                $data['OrgCity'] = '';
                $data['OrgState'] = '';
                $data['OrgCountry'] = '';
            }
            
            //start @update 06032020
            if(!empty($data['trInfo']->TH_APPROVE_BY) && $data['trInfo']->TH_APPROVE_BY === 'HRA_ADMIN') {
                $data['thHistory'] = 'Y';
            }else {
                $data['thHistory'] = 'N';
            }  
            //end @update 06032020
            

            $data['trInfoDetl'] = $this->mdl->getTrHeadDetl($refID);
            if (!empty($data['trInfoDetl'])) {
                $data['coordinator'] = $data['trInfoDetl']->THD_COORDINATOR;
                $data['coor_sector'] = $data['trInfoDetl']->THD_COORDINATOR_SECTOR;
                $data['coor_p_no'] = $data['trInfoDetl']->THD_COORDINATOR_TELNO;
                $data['evaluation'] = $data['trInfoDetl']->THD_EVALUATION;
            } else {
                $data['coordinator'] = '';
                $data['coor_sector'] = '';
                $data['coor_p_no'] = '';
                $data['evaluation'] = '';
            }

            $data['type_list'] = $this->dropdown($this->mdl->getTypeList(), 'TT_CODE', 'TT_CODE_DESC', ' ---Please select--- ');
            $data['category'] = $this->dropdown($this->mdl->getCategoryList(), 'TC_CATEGORY', 'TC_CATEGORY', ' ---Please select--- ');
            $data['level'] = $this->dropdown($this->mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');
            $data['area'] = $this->dropdown($this->mdl->getAreaList(), 'TF_CODE', 'TF_CODE_DESC', ' ---Please select--- ');
            $data['sgroup'] = $this->dropdown($this->mdl->getSgroupList(), 'SG_GROUP_CODE', 'SG_CODE_DESC', ' ---Please select--- ');
            $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');
            $data['com_lvl_code'] = $this->dropdown($this->mdl->getCompetencyLevel(), 'TCL_COMPETENCY_CODE', 'TCL_COMPETENCY_CODE_DESC', ' ---Please select--- ');
            $data['coor'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
            $data['coor_sec'] = $this->dropdown($this->mdl->getCoordinatorSec(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');
            $data['org_lvl'] = $this->dropdown($this->mdl->getOrganizerLevel(), 'TOL_CODE', 'TOL_CODE_DESC', ' ---Please select--- ');
            $data['org_name'] = $this->dropdown($this->mdl->getOrganizerName(), 'TOH_ORG_CODE', 'TOH_ORG_CODE_DESC', ' ---Please select--- ');
            

            $data['count_def'] = $this->mdl->getCountryDef();

            $countCode2= 'MYS';
            if (!empty($countCode2) || !empty($countCode)) {
                $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode2), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
            } else {
                $data['state_list'] = '';
            }

            if (!empty($organizerCode)) {
                $data['org_info'] = $this->mdl->getCountryStateList($countCode);
            } else {
                $data['org_info'] = '';
            }

            //$data['count_code'] = $countCode;
            //$data['org_code'] = $organizerCode;
            
        }

        $this->renderAjax($data);
    }

    // save update training head
    public function saveUpdateTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        
        //
        //$defSecCode = $form['sc_code'];

        // training refid
        $refid = $form['training_refid'];

        // TH_TRAINING_CODE
        $trCode = $form['structured_training'];

        // module setup
        $coor = $form['coordinator'];
        $coorSeq = $form['coordinator_sector'];
        $coorContact = $form['phone_number'];
        $evaluationTHD = $form['evaluation'];

        // evaluation period not/required
        // if($evaluationTHD == 'Y') {
        //     $evaluationFrReq = 'required|max_length[30]';
        //     $evaluationToReq = 'required|max_length[30]';
        // } else {
        //     $evaluationFrReq = 'max_length[30]';
        //     $evaluationToReq = 'max_length[30]';
        // }

        // form / input validation
        $rule = array(
            // sc code
            'sc_code' => 'max_length[10]',


            // training info
            'type' => 'required|max_length[100]', 
            'category' => 'required|max_length[200]',
            'structured_training' => 'max_length[20]',
            'level' => 'required|max_length[10]', 
            'area' => 'max_length[200]', 
            'service_group' => 'max_length[10]',
            'training_title' => 'required|max_length[100]', 
            'training_description' => 'max_length[500]', 
            'venue' => 'max_length[100]',
            'country' => 'max_length[10]', 
            'state' => 'max_length[10]', 
            'date_from' => 'required|max_length[11]',
            'date_to' => 'required|max_length[11]', 
            'time_from' => 'required|max_length[11]', 
            'time_to' => 'required|max_length[11]',
            'total_hours' => 'required|numeric|max_length[12]', 
            'internal_external' => 'required|max_length[20]', 
            'sponsor' => 'max_length[100]',
            'offer' => 'max_length[1]', 
            'participants' => 'integer|max_length[11]', 
            'online_application' => 'max_length[1]',
            'closing_date' => 'max_length[11]', 
            'competency_code' => 'max_length[10]', 
            'evaluation_period_from' => 'max_length[30]',
            'evaluation_period_to' => 'max_length[30]', 
            
            //start @update 06032020
            'training_setup_history' => 'max_length[1]',
            //end @update 06032020
            
            // 'evaluation_period_from' => $evaluationFrReq,
            // 'evaluation_period_to' => $evaluationToReq, 

            // TRAINING_HEAD_DETL
            'coordinator' => 'max_length[10]', 
            'coordinator_sector' => 'max_length[10]',
            'phone_number' => 'max_length[15]', 
            'evaluation' => 'max_length[1]', 
            
            // confirmation due info
            'confirmation_due_date_from' => 'required|max_length[11]', 'confirmation_due_date_to' => 'required|max_length[11]',
            
            // organizer info
            'organizer_level' => 'max_length[10]', 'organizer_name' => 'max_length[100]', 

            // completion info
            'evaluation_compulsary' => 'max_length[1]', 'attendance_type' => 'max_length[20]', 'print_certificate' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin update Record
        if ($status == 1) {

            if(!empty($refid)){
                //$refid = $data['refID']->REFID;
                $update = $this->mdl->updateTrainingHead($form, $refid);

                if($update > 0 && empty($trCode)){
                    $data['trInfo'] = $this->mdl->getTrainingInfoDetail($refid);
                    $trName = $data['trInfo']->TH_TRAINING_TITLE;

                    $updTrHeadMsg = 'TRAINING_HEAD success! ';

                    // check training head detail
                    $checkTHD = $this->mdl->getTrHeadDetl($refid);

                    // update/insert training head detail (module setup)
                    if(!empty($checkTHD)) {
                        $updateTHD = $this->mdl->updateTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);

                        if($updateTHD > 0) {
                            $updTHDMsg = 'TRAINING_HEAD_DETL (Module Setup) updated!';
                        } else {
                            $updTHDMsg = '';
                        }
                    } else {
                        if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD)) {
                            $insertTHD = $this->mdl->insertTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);

                            if($insertTHD > 0) {
                                $updTHDMsg = 'TRAINING_HEAD_DETL (Module Setup) added! ';
                            } else {
                                $updTHDMsg = '';
                            }
                        } else {
                            $updTHDMsg = '';
                        }
                    }

                    $stsMsg = nl2br("\n".$updTrHeadMsg."\n".$updTHDMsg);
                    $json = array('sts' => 1, 'msg' => nl2br("Record has been saved \n".$stsMsg), 'alert' => 'success', 'refid' => $refid, 'trName' => $trName);
                }
                elseif ($update > 0 && !empty($trCode)) {
                    
                    $data['trInfo'] = $this->mdl->getTrainingInfoDetail($refid);
                    $trName = $data['trInfo']->TH_TRAINING_TITLE;

                    $updTrHeadMsg = 'TRAINING_HEAD success! ';

                    $data['compt'] = $this->mdl->getStructuredTraining($trCode);
                    $data['resultTTG'] = $this->mdl->getResultTTG($trCode);
                    $data['resultTGS'] = $this->mdl->getResultTGS($trCode);
                    $insCount = 0; // tr grp
                    $insCount2 = 0; // tr grp service

                    if(!empty($data['compt']->TTH_COMPETENCY)){
                        $competency = $data['compt']->TTH_COMPETENCY;
                    } else {
                        $competency = '';
                    }

                    // check cpd
                    $checkCPD = $this->mdl->getCpdSetup($refid);

                    // update/insert CPD head
                    if(!empty($checkCPD)) {
                        // UPDATE CPD HEAD
                        $updatetCPDHead = $this->mdl->updateCPDHead($refid, $competency);

                        if($updatetCPDHead > 0) {
                            $updCpdHeadMsg = 'CPD_HEAD (CPD Setup) updated! ';
                        } 
                        else {
                            $updCpdHeadMsg = '';
                        }
                    } else {
                        $inserttCPDHead = $this->mdl->insertCPDHead($refid, $competency);

                        if($inserttCPDHead > 0) {
                            $updCpdHeadMsg = 'CPD_HEAD (CPD Setup) added! ';
                        } 
                        else {
                            $updCpdHeadMsg = '';
                        }
                    }

                    // insert training group
                    if(!empty($data['resultTTG'])){

                        foreach($data['resultTTG'] as $rtg){
                            $gpCode = $rtg->TTG_GROUP_CODE;

                            // verify if specific data already exist in training group
                            $checkTrGroup = $this->mdl->getTargetGroup($refid, $gpCode);

                            if(empty($checkTrGroup)) {
                                $insertTrainingTargetGroup = $this->mdl->insertTrainingTargetGroup($refid, $gpCode);
                                $insCount++;
                            }
                            else {
                                $insertTrainingTargetGroup = 0;
                                $insCount = 0;
                            }
                        }
                    } else {
                        $insertTrainingTargetGroup = 0;
                    }

                    if($insertTrainingTargetGroup == $insCount) {
                        $insTTGMsg = 'TRAINING_TARGET_GROUP success! ';
                    } else {
                        $insTTGMsg = '';
                    }

                    // insert training group service
                    if(!empty($data['resultTGS'])){

                        foreach($data['resultTGS'] as $rtgs){
                            $gpCode = $rtgs->TTG_GROUP_CODE;
                            $tgsSeq = $rtgs->TGS_SEQ;
                            $tgsSvcCode = $rtgs->TGS_SERVICE_CODE;

                            // verify if specific data already exist in training group service
                            $data['verifyTGS'] = $this->mdl->checkTGS($gpCode, $tgsSeq);

                            if(empty($data['verifyTGS'])){
                                $insertTrainingGroupService = $this->mdl->insertTrainingGroupService($gpCode, $tgsSeq, $tgsSvcCode);
                                $insCount2++;
                            }
                            else {
                                $insertTrainingGroupService = 0;
                                $insCount2 = 0;
                            }
                        }
                    } else {
                        $insertTrainingGroupService = 0;
                    }

                    if($insertTrainingGroupService == $insCount2) {
                        $insTGSMsg = 'TRAINING_GROUP_SERVICE success! ';
                    } else {
                        $insTGSMsg = '';
                    }

                    // update training head detail
                    // check training head detail
                    $checkTHD = $this->mdl->getTrHeadDetl($refid);

                    if(!empty($checkTHD)) {
                        $updateTHD = $this->mdl->updateTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);

                        if($updateTHD > 0) {
                            $updTHDMsg = 'TRAINING_HEAD_DETL (Module Setup) updated!';
                        } else {
                            $updTHDMsg = '';
                        }
                    } else {
                        if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD)) {
                            $insertTHD = $this->mdl->insertTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);

                            if($insertTHD > 0) {
                                $updTHDMsg = 'TRAINING_HEAD_DETL (Module Setup) added! ';
                            } else {
                                $updTHDMsg = '';
                            }
                        } else {
                            $updTHDMsg = '';
                        }
                    }

                    $stsMsg = nl2br("\n".$updTrHeadMsg."\n".$updCpdHeadMsg."\n".$insTTGMsg."\n".$insTGSMsg."\n".$updTHDMsg);
                    $json = array('sts' => 1, 'msg' => nl2br("Record has been saved \n".$stsMsg), 'alert' => 'success', 'refid' => $refid, 'trName' => $trName);
                }
                else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        
        //$this->renderAjax($data);
        echo json_encode($json);
    }

    // update training speaker
    public function editTrainingSpeaker()
    {
        $refid = $this->input->post('refid', true);
        $spType = $this->input->post('spType', true);
        $spID = $this->input->post('spID', true);
        $spName = $this->input->post('spName', true);
        $spDept = $this->input->post('spDept', true);
        

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['spname'] = $spName;
            $data['spdept'] = $spDept;
            
            $data['sp_info'] = $this->mdl->checkTrainingSpeaker($refid, $spID);
        }

        $this->renderAjax($data);
    }
    
    // save update training speaker
    public function saveUpdateTrainingSpeaker() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // SPEAKER ID
        $spID = $form['speaker'];

        // form / input validation
        $rule = array(
            'contact_phone_no' => 'max_length[15]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateTrainingSpeaker($form, $refid, $spID);

            if($update > 0) {
                $sp_row = $this->mdl->checkTrainingSpeaker($refid, $spID);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'sp_row' => $sp_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // update module setup 1
    public function editModuleSetup1()
    {
        $refid = $this->input->post('refid', true);
        $sp_obj = $this->input->post('spObj', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['sp_obj'] = $sp_obj;
        }

        $this->renderAjax($data);
    }

    // save update module setup 1
    public function saveUpdateMS1() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'specific_objectives' => 'max_length[2000]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateMs1($form, $refid);

            if($update > 0) {
                $ms1_row = $this->mdl->getTrHeadDetl($refid);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'ms1_row' => $ms1_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // update module setup 2
    public function editModuleSetup2()
    {
        $refid = $this->input->post('refid', true);
        $msCont = $this->input->post('msCont', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['ms_cont'] = $msCont;
        }

        $this->renderAjax($data);
    }

    // save update module setup 2
    public function saveUpdateMS2() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'contents' => 'max_length[4000]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateMs2($form, $refid);

            if($update > 0) {
                $ms2_row = $this->mdl->getTrHeadDetl($refid);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'ms2_row' => $ms2_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // update module setup 3
    public function editModuleSetup3()
    {
        $refid = $this->input->post('refid', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['comp_list'] = $this->dropdown($this->mdl->getCompList(), 'TMC_COMPONENT_CODE', 'TMC_CODE_DESC', ' ---Please select--- ');
            $data['comp_val'] = $this->mdl->getTrHeadDetl($refid);
        }

        $this->renderAjax($data);
    }

    // save update module setup 3
    public function saveUpdateMS3() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'component_category' => 'max_length[10]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateMs3($form, $refid);

            if($update > 0) {
                $ms3_row = $this->mdl->getmoduleSetup($refid);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'ms3_row' => $ms3_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // update cpd setup 1
    public function editCpdSetup1()
    {
        $refid = $this->input->post('refid', true);
        $cpdComp = $this->input->post('cpdComp', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['cpd_comp_val'] = $cpdComp;
        }

        $this->renderAjax($data);
    }

    // save update cpd setup 1
    public function saveUpdateCpd1() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'competency' => 'required|max_length[20]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateCpd1($form, $refid);

            if($update > 0) {
                $cpd1_row = $this->mdl->getCpdSetup($refid);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'cpd1_row' => $cpd1_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }


    // update cpd setup 2
    public function editCpdSetup2()
    {
        $refid = $this->input->post('refid', true);
        $cpdComp = $this->input->post('cpdComp', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['category_list'] = $this->dropdown($this->mdl->getCpdCategoryList(), 'CC_CATEGORY_CODE', 'CC_CODE_DESC', ' ---Please select--- ');
            $data['cpd_cat_val'] = $this->mdl->getCpdSetup($refid);
        }

        $this->renderAjax($data);
    }

    // save update cpd setup 2
    public function saveUpdateCpd2() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'category' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateCpd2($form, $refid);

            if($update > 0) {
                $data['cpdSetup'] = $this->mdl->getCpdSetup($refid);

                if (!empty($data['cpdSetup']->CH_CATEGORY)){
                    $data['cpdSetupCat'] = $this->mdl->getCpdSetupCategory($data['cpdSetup']->CH_CATEGORY);
                    $cpd2_row = $data['cpdSetupCat']->CH_CC_CATEGORY_DESC;
                } else {
                    $cpd2_row = '';
                }

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'cpd2_row' => $cpd2_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // update cpd setup 3
    public function editCpdSetup3()
    {
        $refid = $this->input->post('refid', true);
        $cpdMark = $this->input->post('cpdMark', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['cpd_mark_val'] = $cpdMark;
        }

        $this->renderAjax($data);
    }

    // save update cpd setup 3
    public function saveUpdateCpd3() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'mark' => 'required|numeric|max_length[40]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateCpd3($form, $refid);

            if($update > 0) {
                $cpd3_row = $this->mdl->getCpdSetup($refid);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'cpd3_row' => $cpd3_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // update cpd setup 4
    public function editCpdSetup4()
    {
        $refid = $this->input->post('refid', true);
        $rpSub = $this->input->post('rpSub', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['cpd_rpsub_val'] = $rpSub;
        }

        $this->renderAjax($data);
    }

    // save update cpd setup 4
    public function saveUpdateCpd4() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'report_submission' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateCpd4($form, $refid);

            if($update > 0) {
                $cpd4_row = $this->mdl->getCpdSetup($refid);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'cpd4_row' => $cpd4_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // update cpd setup 4
    public function editCpdSetup5()
    {
        $refid = $this->input->post('refid', true);
        $cpdCmpy = $this->input->post('cpdCmpy', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['cpd_cpd_cmpy_val'] = $cpdCmpy;
        }

        $this->renderAjax($data);
    }

    // save update cpd setup 4
    public function saveUpdateCpd5() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'compulsory' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateCpd5($form, $refid);

            if($update > 0) {
                $cpd5_row = $this->mdl->getCpdSetup($refid);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'cpd5_row' => $cpd5_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*_____________________
        DELETE PROCESS
    _____________________*/

    // DELETE TRAINING INFO
    public function deleteTrainingInfo() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        //$tgsSeq = $this->input->post('tgsSeq', true);
        
        if (!empty($refid)) {

            // check training speaker
            $delVerify1 = $this->mdl->delVerifyTrSP($refid);
            // check training facilitator
            $delVerify2 = $this->mdl->delVerifyTrFi($refid);
            // check training target group
            $delVerify3 = $this->mdl->delVerifyTrGrp($refid);
            // check training module setup
            $delVerify4 = $this->mdl->delVerifyModSet($refid);
            // check training cpd setup
            $delVerify5 = $this->mdl->delVerifyCpdSet($refid);

            if(empty($delVerify1) && empty($delVerify2) && empty($delVerify3) && empty($delVerify4) && empty($delVerify5)) {
                $del = $this->mdl->delTrainingInfo($refid);
            
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist. Please make sure to delete records in <b><font color="red">Training Speaker</font></b>, <b><font color="red">Training Facilitator</font></b>, <b><font color="red">Target Group</font></b>, <b><font color="red">Module Setup</font></b>, and <b><font color="red">CPD Setup</font></b> first!', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }
    
    // DELETE TRAINING SPEAKER
    public function deleteTrainingSpeaker() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $spID = $this->input->post('spID', true);
        
        if (!empty($refid) && !empty($spID)) {
        	$del = $this->mdl->delTrainingSpeaker($refid, $spID);
            
        	if ($del > 0) {
          		$json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
        	} else {
          		$json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
        	}
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // DELETE TRAINING FACILITATOR
    public function deleteTrainingFacilitator() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $fiID = $this->input->post('fiID', true);
        
        if (!empty($refid) && !empty($fiID)) {
        	$del = $this->mdl->delTrainingFacilitator($refid, $fiID);
            
        	if ($del > 0) {
          		$json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
        	} else {
          		$json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
        	}
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // DELETE TRAINING TARGET GROUP
    public function deleteTargetGroup() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $gpCode = $this->input->post('gpCode', true);
        
        if (!empty($refid) && !empty($gpCode)) {

            $delVerify = $this->mdl->delTargetGroupVerify($gpCode);

            if(empty($delVerify)) {
                $del = $this->mdl->delTargetGroup($refid, $gpCode);
            
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist. Please delete <b><font color="red">Position</font></b> first!', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // DELETE TRAINING GROUP SERVICE
    public function deleteTrainingGpService() {
		$this->isAjax();
		
        $gpCode = $this->input->post('gpCode', true);
        $tgsSeq = $this->input->post('tgsSeq', true);
        
        if (!empty($gpCode) && !empty($tgsSeq)) {
            $del = $this->mdl->delTrainingGpService($gpCode, $tgsSeq);
        
            if ($del > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // DELETE TRAINING MODULE SETUP
    public function deleteModuleSetup() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        
        if (!empty($refid)) {
            $del = $this->mdl->delModuleSetup($refid);
        
            if ($del > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // DELETE TRAINING CPD SETUP
    public function deleteCpdSetup() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        
        if (!empty($refid)) {
            $del = $this->mdl->delCpdSetup($refid);
        
            if ($del > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }


    /*===========================================================
       TRAINING APPLICATION [APPROVE TRAINING APPLICATIONS] - ATF002
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    // TRAINING LIST
    public function getTrainingList()
    {   
        // selected filter value
        $selIntExt = $this->input->post('intExt', true);
        $selDept = $this->input->post('sDept', true);
        $selMonth = $this->input->post('sMonth', true);
        $selYear = $this->input->post('sYear', true);
        $selSts = $this->input->post('tSts', true);

        // verify filter
        $disDept = $this->input->post('disDept', true);
        $disYear = $this->input->post('disYear', true);
        $disTsts = $this->input->post('disTsts', true);
        $evaluation = $this->input->post('evaluation', true);
        $screRpt = $this->input->post('screRpt', true);

        // default filter value
        //|| empty($selDept) || empty($selMonth) || empty($selYear) || empty($selSts)
        if (!empty($selIntExt)) {
            // default internal/external
            //$defIntExt = '';
            $defIntExt = $selIntExt;
        } else {
            $defIntExt = '';
            // $curUsrDept = $selDept; 
            // $defMonth = $selMonth;
            // $curYear = $selYear;
            // $defTrSts = $selSts;
        }

        if (empty($selDept)) {
            // current user dept
            // $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
            // $curUsrDept = $data['cur_usr_dept']->SM_DEPT_CODE;
            $curUsrDept = '';
            if($disDept == '1') {
                $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
                $curUsrDept = $data['cur_usr_dept']->SM_DEPT_CODE;
            }
        } else {
            // $defIntExt = $selIntExt;
            $curUsrDept = $selDept; 
            // $defMonth = $selMonth;
            // $curYear = $selYear;
            // $defTrSts = $selSts;
        }

        if (empty($selMonth)) {
            // default month
            $defMonth = '';
        }   else {
            // $defIntExt = $selIntExt;
            // $curUsrDept = $selDept; 
            $defMonth = $selMonth;
            // $curYear = $selYear;
            // $defTrSts = $selSts;
        }

        if (empty($selYear)) {
            // current year
            // $data['cur_year'] = $this->mdl->getCurYear();
            // $curYear = $data['cur_year']->CUR_YEAR;
            $curYear = '';
            if($disYear == '1') {
                $data['cur_year'] = $this->mdl->getCurYear();
                $curYear = $data['cur_year']->CUR_YEAR;
            }
            
        } else {
            // $defIntExt = $selIntExt;
            // $curUsrDept = $selDept; 
            // $defMonth = $selMonth;
            $curYear = $selYear;
            // $defTrSts = $selSts;
        }

        if (empty($selSts)) {
            // default training status
            $defTrSts = '';
            if($disTsts == '1') {
                $defTrSts = '1';
            }
        } else {
            // $defIntExt = $selIntExt;
            // $curUsrDept = $selDept; 
            // $defMonth = $selMonth;
            // $curYear = $selYear;
            $defTrSts = $selSts;
        }

        // get available records
        $data['tr_list'] = $this->mdl->getTrainingList($defIntExt, $curUsrDept, $defMonth, $curYear, $defTrSts, $evaluation, $screRpt);

        $this->render($data);
    }

    // APPLICANT LIST
    public function getStaffTrainingApplication()
    {   
        $refid = $this->input->post('refid', true);
        $tName = $this->input->post('tName', true);

        $stf_li_arr = array();

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['tname'] = $tName;
            $data['staff_tr_list'] = $this->mdl->getStaffTrainingApplication($refid);

            foreach($data['staff_tr_list'] as $stl) {
                $staff_id = $stl->SM_STAFF_ID;
                $staff_name = $stl->SM_STAFF_NAME;
                $staff_email = $stl->SM_EMAIL_ADDR;
                $staff_dept = $stl->SM_DEPT_CODE;
                $staff_job_sts = $stl->SJS_STATUS_DESC;
                $staff_eva_id = '';

                $getEvaID = $this->mdl->getStaffTrainingApplicationEvaID($refid, $staff_id);

                if(!empty($getEvaID)) {
                    $staff_eva_id = $getEvaID->STAFF;
                }
                
                $stf_li_arr [] = array('staff_id'=>$staff_id,
                                'staff_name'=>$staff_name,
                                'staff_email'=>$staff_email,
                                'staff_dept'=>$staff_dept,
                                'staff_job_sts'=>$staff_job_sts,
                                'staff_eva_id'=>$staff_eva_id);
            }

            $data['stf_li_arr'] = $stf_li_arr;
        } 

        $this->renderAjax($data);
    }

    // APPLICANT DETAIL
    // public function detailSTA()
    // {   
    //     $refid = $this->input->post('refid', true);
    //     $staffID = $this->input->post('staffID', true);

    //     if(!empty($refid) && !empty($staffID)) {
    //         $data['refid'] = $refid;
    //         $data['staffID'] = $staffID;
    //         $data['staff_tr_list'] = $this->mdl->getStaffTrainingApplication($refid, $staffID);
    //         $data['eva_tr_info'] = $this->mdl->getEvaluatorInfo($refid, $staffID);
    //         if(!empty($data['eva_tr_info'])) {
    //             $data['eva_info'] = $data['eva_tr_info']->STAFF;
    //         } else {
    //             $data['eva_info'] = '';
    //         }
    //     } 

    //     $this->renderAjax($data);
    // }

    // VERIFY TRAINING DATE
    public function verifyTrainingDate()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $sts = 0;

        if (!empty($refid)) {   
            $verDate = $this->mdl->getTrainingDateFrom($refid);
            //$curDate = $this->mdl->getCurYear($verTr = 1);
            if(!empty($verDate)) {
                if(!empty($verDate->TH_DATE_FROM) && $verDate->TH_DATE_FROM > $verDate->CUR_DATE) {
                    // SYSDATE DID NOT PAST COURSE DATE
                    // SEND EMAIL & APPROVE 

                    $json = array('sts' => 1, 'msg' => 'TH_DATE_FROM >  SYSDATE <br><br>SYSDATE DID NOT PAST COURSE DATE<br><br>SEND EMAIL & APPROVE<br><br>' .$verDate->TH_DATE_FROM. ' >= ' .$verDate->CUR_DATE.'', 'alert' => 'success');
                } 
                if(!empty($verDate->TH_DATE_FROM) && $verDate->TH_DATE_FROM <= $verDate->CUR_DATE) {
                    // SYSDATE PAST COURSE DATE
                    // APPROVE ONLY
                    $json = array('sts' => 0, 'msg' => 'TH_DATE_FROM <= SYSDATE <br><br> SYSDATE PAST COURSE DATE<br><br>APPROVE ONLY<br><br>' .$verDate->TH_DATE_FROM. ' < ' .$verDate->CUR_DATE.'', 'alert' => 'danger');
                }
                //$json = array('sts' => 1, 'msg' => '> TH_DATE_FROM', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Refference ID empty', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*_____________________
        UPDATE PROCESS
    _______________________*/

    // APPROVE APPLICATION
    public function approveStf()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffIDArr', true);
        $remark = $this->input->post('remarkArr', true);
        $success = 0;
        $successApp = 0;
        $sts = 1;

        if (!empty($refid) && !empty($staffID)) { 
            foreach($staffID as $key => $sid) {
                $rem = $remark[$key];

                $success++;
                $data['eva_id'] = $this->mdl->getEvaluatorID($refid, $sid);

                if(!empty($data['eva_id'])) {
                    $eveluatorID = $data['eva_id']->EVAID;
                } else {
                    $eveluatorID = '';
                }

                $approveOrReject = $this->mdl->apprOrReApp($refid, $sid, $eveluatorID, $rem, $sts);
                //$approveOrReject = '1';

                if($approveOrReject > 0) {
                    $successApp++;
    
                    //$json = array('sts' => 1, 'msg' => 'Training Application has been approved', 'alert' => 'success');
                } else {
                    $successApp = 0;
                    //$json = array('sts' => 0, 'msg' => 'Fail to approve Training Application', 'alert' => 'danger');
                }
            }

            if($success = $successApp) {
                $json = array('sts' => 1, 'msg' => 'Training Application has been approved', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to approve Training Application', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // REJECT APPLICATION
    public function rejectStf()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffID', true);
        $remark = $this->input->post('remark', true);
        $sts = 0;
        $success = 0;
        $successRej = 0;

        if (!empty($refid) && !empty($staffID)) {
            foreach ($staffID as $key => $sid) {
                $success++;
                $rem = $remark[$key];

                $data['eva_id'] = $this->mdl->getEvaluatorID($refid, $sid);

                if (!empty($data['eva_id'])) {
                    $eveluatorID = $data['eva_id']->EVAID;
                } else {
                    $eveluatorID = '';
                }

                $reject = $this->mdl->apprOrReApp($refid, $sid, $eveluatorID, $rem, $sts);
                //$approve = '1';

                if ($reject > 0) {
                    $successRej++;
                    //$cpd5_row = $this->mdl->getCpdSetup($refid);

                    //$json = array('sts' => 1, 'msg' => 'Training Application has been rejected', 'alert' => 'success');
                } else {
                    $successRej = 0;
                    //$json = array('sts' => 0, 'msg' => 'Fail to reject Training Application', 'alert' => 'danger');
                }
            }

            if($success = $successRej) {
                $json = array('sts' => 1, 'msg' => 'Selected applicant has been rejected', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to reject selected applicant', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*_____________________
        EMAIL PROCESS
    _______________________*/
    
    // SEND EMAIL APPLICANT
    public function sendEmailApplicant()
    {
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('stfID', true);
        $memo_from = 'bsm.latihan@upsi.edu.my';
        $memo_from_cc = 'bsm.latihan@upsi.edu.my';

        $staffNameArr = array();
        $staffEmailArr = array();
        $staffIDCCArr = array();
        $staffNameCCArr = array();
        $staffEmailCCArr = array();

        // GET TRAINING DETAIL
        $tr_detl = $this->mdl->getTrDetl($refid);
        if (!empty($tr_detl)) {
            // TRAINING REFID
            $tr_refid = $tr_detl->TH_REF_ID;
            // TRAINING TITLE
            $tr_title = $tr_detl->TH_TRAINING_TITLE;
            // TRAINING VENUE
            $tr_venue = $tr_detl->TH_TRAINING_VENUE;
            // TRAINING DATE FROM
            $tr_date_from = $tr_detl->TH_DATEFR;
            // TRAINING DATE TO
            $tr_date_to = $tr_detl->TH_DATETO;
            // TRAINING TIME FROM
            $tr_time_from = $tr_detl->TIME_FR;
            // TRAINING TIME TO
            $tr_time_to = $tr_detl->TIME_T;
            // TRAINING CONFIRM DATE
            $tr_confirm_date = $tr_detl->TH_CON_DATE_TO;
        } else {
            $trTitle = '';
            $tr_date_from = '';
            $tr_date_to = '';
            $tr_time_from = '';
            $tr_time_to = '';
            $tr_confirm_date = '';
        }

        // GET TRAINING COORDINATOR
        $tr_coor = $this->mdl->getTrCoor($refid);
        if (!empty($tr_coor)) {
            $coor_name = $tr_coor->STAFF_NAME;
            $coor_tel_no = $tr_coor->THD_COORDINATOR_TELNO;
        } else {
            $coor_name = '';
            $coor_tel_no = '';
        }

        // MEMO TITLE AND CONTENT
        $msg_title = 'MEMO TAWARAN KURSUS : ' .$tr_title.'';
        $msg_content = 'Adalah dimaklumkan tuan/puan telah ditawarkan untuk mengikuti kursus seperti butiran berikut : '.
                                '<br><br>'.
                                'Kursus : '.$tr_title.
                                '<br>'.
                                'Tarikh : '.$tr_date_from.' hingga '.$tr_date_to.
                                '<br>'.
                                'Masa : '.$tr_time_from.' hingga '.$tr_time_to.
                                '<br>'.
                                'Tempat : '.$tr_venue.
                                '<br><br>'.
                                '2. Sehubungan itu, tuan/puan diminta hadir sepenuh masa ke kursus tersebut.  Kehadiran adalah diwajibkan. '.
                                'Tuan/puan dimohon untuk membuat pengesahan kehadiran di <b>MyUPSI Portal > Human Resource > Training </b>selewat-lewatnya pada <b>'.$tr_confirm_date.'</b>'.
                                '<br><br>'.
                                '3. Sekiranya tuan/puan tidak membuat pengesahan ini sehingga tarikh yang dinyatakan, tuan/puan dianggap bersetuju menghadiri '.
                                'kursus tersebut.  Sebarang ketidakhadiran tanpa makluman akan dikenakan denda (RM50.00 sehari untuk kursus dalaman / '.
                                'RM200 sehari untuk kursus luar) seperti yang telah diputuskan oleh Mesyuarat Lembaga Pengarah Universiti kali ke-90, Bil 6/2013 bertarikh 11 Disember 2013.'.
                                '<br><br>'.
                                '4. Sebarang pertanyaan berkenaan perkara di atas, sila berhubung dengan urusetia kursus '.$coor_name.' di talian '.$coor_tel_no.'<br><br>'.
                                'Sekian, terima kasih.';

        if(!empty($refid) && !empty($staffID)) {
            $staffEmailCCArr [] = $memo_from_cc;
            foreach ($staffID as $key => $fid) {
                // GET STAFF EMAIL
                $staff_app = $this->mdl->getCurUserDept($fid);
                if (!empty($staff_app)) {
                    $staff_app_email = $staff_app->SM_EMAIL_ADDR;
                    $staff_app_id = $staff_app->SM_STAFF_ID;
                    $staff_app_name = $staff_app->SM_STAFF_NAME;
                } else {
                    $staff_app_email = '';
                }

                $staffNameArr [] = $staff_app_name;
                $staffEmailArr [] = $staff_app_email;

                // GET EVALUATOR STAFF EMAIL DISTINCT
                $staff_eva = $this->mdl->getStaffMainDis($refid, $fid);
                if (!empty($staff_eva)) {
                    $eva_email = $staff_eva->SM_EMAIL_ADDR;
                    $eva_id = $staff_eva->STAFF;
                    $eva_name = $staff_eva->SM_STAFF_NAME;
                } else {
                    $eva_email = '';
                    $eva_id = '';
                    $eva_name = '';
                }

                // EMAIL CC
                // if (!empty($eva_email)) {
                //     $email_cc = ''.$eva_email. ', ' .$memo_from;
                // } else {
                //     $email_cc = $memo_from;
                // }

                $staffIDCCArr [] = $eva_id;
                $staffNameCCArr [] = $eva_name;
                $staffEmailCCArr [] = $eva_email;
            
                // if (!empty($staff_app_email)) {
                //     $sendEmailSts = $this->mdl->sendEmail($memo_from, $staff_app_email, $email_cc, $msg_title, $msg_content);

                //     if ($sendEmailSts > 0) {
                //         $checkEmailSts = $this->mdl->verifyTraining($refid, $fid);
        
                //         if (!empty($checkEmailSts)) {
                //             $updEmailSts = $this->mdl->updateEmailSts($refid, $fid);
                //         } else {
                //             $insEmailSts = $this->mdl->insertEmailSts($refid, $fid);
                //         }

                //         $successEmail++;
        
                //         // $sentMsg = 'Memo successfully sent';
                //         // $json = array('sts' => 1, 'msg' => $sentMsg, 'alert' => 'success');
                //     } else {
                //         $successEmail = 0;
                //         // $sentMsg = 'Fail to send memo';
                //         // $json = array('sts' => 0, 'msg' => $sentMsg, 'alert' => 'danger');
                //     }
                // } else {
                //     $sentMsg = nl2br('Fail to send memo to <b>'.$staff_app_id.' - '.$staff_app_name."\n".'</b>Applicant email address not found!'."\n".'Cannot approve applicant Training Application!');
                //     $json = array('sts' => 0, 'msg' => $sentMsg, 'alert' => 'danger');
                // }
            }

            $filterStaffIDCCArr = array_values(array_filter($staffIDCCArr));
            $filterStaffNameCCArr = array_values(array_filter($staffNameCCArr));
            $filterStaffEmailCCArr = array_values(array_filter($staffEmailCCArr));

            $json = array('sts' => 1, 'msg' => 'All staff details', 'alert' => 'red', 'from' => $memo_from, 'staffNameArr' => $staffNameArr, 'staffEmailArr' => $staffEmailArr, 'staffIDCCArr' => $filterStaffIDCCArr, 'staffNameCCArr' => $filterStaffNameCCArr, 'staffEmailCCArr' => $filterStaffEmailCCArr, 'msg_title' => $msg_title, 'msg_content' => $msg_content, 'refid' => $tr_refid);
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator!', 'alert' => 'danger');
        }

        echo json_encode($json);
    }


    /*===========================================================
       ASSIGN TRAINING TO STAFF
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    // APPLICANT LIST
    public function getAssignStaff()
    {   
        $refid = $this->input->post('refid', true);
        $tName = $this->input->post('tName', true);

        //$data2 = array();

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['tname'] = $tName;
            $data['staff_asstr_list'] = $this->mdl->getAssignStaff($refid);
        } 

        $this->renderAjax($data);
    }

    // GET STAFF LIST BASED ON DEPT
    public function getStaffList()
    {
        $this->isAjax();
        
        $refid = $this->input->post('refid',true);
        $deptCode = $this->input->post('deptCode',true);
        
        // get available records
        if(!empty($refid) && !empty($deptCode)) {
            $staffList = $this->mdl->getStaffList($refid, $deptCode);
        }
               
        if (!empty($staffList)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'staffList' => $staffList);
        
        echo json_encode($json);
    }

    /*_____________________
        INSERT PROCESS
    _______________________*/
    
    // ASSIGN STAFF TO TRAINING
    public function assignStaff()
    {
        $deptCode = $this->input->post('deptCode',true);
        $refid = $this->input->post('refid', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['staff_list'] = $this->dropdown($this->mdl->getStaffList($refid), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
            $data['role_list'] = $this->dropdown($this->mdl->getRoleList(), 'TPR_CODE', 'TPR_DESC', ' ---Please select--- ');
            $data['sts_list'] = array('' => ' ---Please select--- ', 'APPLY' => 'APPLY', 'VERIFY' => 'VERIFY', 'RECOMMEND' => 'RECOMMEND', 'APPROVE' => 'APPROVE', 'REJECT' => 'REJECT', 'CANCEL' => 'CANCEL');
        }

        // if(!empty($deptCode) && !empty($refid)){
        //     $data['stf_list'] = $this->dropdown($this->mdl->getStaffList($deptCode), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        // } else {
        //     $data['stf_list'] = '';
        // }

        $this->renderAjax($data);
    }

    // ASSIGN STAFF BATCH TO TRAINING
    public function assignStaffBatch()
    {
        $deptCode = $this->input->post('deptCode',true);
        $refid = $this->input->post('refid', true);

        $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        if(!empty($data['cur_usr_dept'])) {
            $curUsrDept = $data['cur_usr_dept']->SM_DEPT_CODE;
            $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        } else {
            $curUsrDept = '';
            $data['curUsrDept'] = '';
        }
        
        if(!empty($deptCode)){
            $curUsrDept = $deptCode;
            $data['curUsrDept'] = $deptCode;
        } 

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['staff_list'] = $this->mdl->getStaffList($refid, $curUsrDept);
            $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
            $data['role_list'] = $this->dropdown($this->mdl->getRoleList(), 'TPR_CODE', 'TPR_DESC', ' ---Please select--- ');
            $data['sts_list'] = array('' => ' ---Please select--- ', 'APPLY' => 'APPLY', 'VERIFY' => 'VERIFY', 'RECOMMEND' => 'RECOMMEND', 'APPROVE' => 'APPROVE', 'REJECT' => 'REJECT', 'CANCEL' => 'CANCEL');
        }

        $this->renderAjax($data);
    }

    // ASSIGN STAFF BATCH PROCESS
    public function assignStaffBatchProcess() {
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $stfID = $this->input->post('stfID', true);
        $roleArr = $this->input->post('roleArr', true);
        $stsArr = $this->input->post('stsArr', true);
        
        $confirm = 0;
        $successConfirm = 0;
        
        if (!empty($refid) && !empty($stfID)) {
            foreach ($stfID as $key => $sid) {
                $role = $roleArr[$key];
                $sts = $stsArr[$key];
                $confirm++;
                // CHECK IF STAFF EXIST
                $check = $this->mdl->checkStaffTr($refid, $sid);

                // ASSIGN STAFF
                if (empty($check)) {
                    $insert = $this->mdl->saveAssignedStaffBatch($refid, $sid, $role, $sts);
                    if($insert > 0 ) {
                        $successConfirm++;
                        $msgIns = '';
                    } else {
                        $msgIns = 'Some record could not be processed.';
                    }
                } else {
                    $successConfirm++;
                }
            }

            if($confirm == $successConfirm) {
                $json = array('sts' => 1, 'msg' => 'Selected staff successfully assigned.'.nl2br("\r\n".$msgIns), 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to assign selected staff', 'alert' => 'red');
            }

        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // SAVE ASSIGNED STAFF    
    public function saveAssignedStaff()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // STAFF ID
        $staffId = $form['staff_id'];

        // form / input validation
        $rule = array( 
            'staff_id' => 'required|max_length[10]',
            'role' => 'required|max_length[100]',
            'status' => 'required|max_length[15]',
            'training_benefit_staff' => 'max_length[200]',
            'training_benefit_department' => 'max_length[200]',
            'remark' => 'max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid) && !empty($staffId)) {
            // check staff in training head
            $check = $this->mdl->checkStaffTr($refid, $staffId);

            if(empty($check)) {
                $insert = $this->mdl->saveAssignedStaff($form, $refid);

                if($insert > 0) {
                    $stf_assign_row = $this->StfAssignRow($refid, $staffId);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'stf_assign_row' => $stf_assign_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // STAFF ROW
    private function StfAssignRow($refid, $staffId){
        $data['refid'] = $refid;
        $data['stf_assign_row'] = $this->mdl->getAssignStaff($refid, $staffId);
		
		return $this->load->view('Training_application/StfAssignRow', $data, true);	
    }

    /*_____________________
        UPDATE PROCESS
    _______________________*/

    // UPDATE ASSIGNED STAFF
    public function editAssignedStaff()
    {   
        $refid = $this->input->post('refid', true);
        $staffId = $this->input->post('staffId', true);

        //$data2 = array();

        if(!empty($refid) && !empty($staffId)) {
            $data['refid'] = $refid;
            $data['staff_id'] = $staffId;
            $data['staff_asstr_list'] = $this->mdl->getAssignStaff($refid, $staffId);
            $data['role_list'] = $this->dropdown($this->mdl->getRoleList(), 'TPR_CODE', 'TPR_DESC', ' ---Please select--- ');
            $data['sts_list'] = array('' => ' ---Please select--- ', 'APPLY' => 'APPLY', 'VERIFY' => 'VERIFY', 'RECOMMEND' => 'RECOMMEND', 'APPROVE' => 'APPROVE', 'REJECT' => 'REJECT', 'CANCEL' => 'CANCEL');
        } 

        $this->renderAjax($data);
    }

    // SAVE UPDATE ASSIGNED STAFF
    public function saveUpdAssignedStaff() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // STAFF ID
        $staffid = $form['staff_id'];

        // form / input validation
        $rule = array(
            'role' => 'required|max_length[100]',
            'status' => 'required|max_length[15]',
            'training_benefit_staff' => 'max_length[200]',
            'training_benefit_department' => 'max_length[200]',
            'remark' => 'max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin update
        if ($status == 1 && !empty($refid) && !empty($staffid)) {
            $update = $this->mdl->saveUpdAssigned($form, $refid, $staffid);

            if($update > 0) {
                $upd_stf_row = $this->mdl->getAssignStaff($refid, $staffid);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'upd_stf_row' => $upd_stf_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*_____________________
        DELETE PROCESS
    _______________________*/
    
    // DELETE ASSIGNED STAFF 
    public function deleteAssignedStaff() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $staffId = $this->input->post('staffId', true);
        
        if (!empty($refid) && !empty($staffId)) {
            $verDel = $this->mdl->checkStaffTr($refid, $staffId);
            //$verDel = '';

            if(empty($verDel)) {
                $del = $this->mdl->deleteAssignedStaff($refid, $staffId);
            
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist.' .nl2br("\r\n Please remove child record from <b>STAFF_TRAINING_COST_MAIN</b>"), 'alert' => 'danger');
            } 
                
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }


    /*===========================================================
       TRAINING QUERY
    =============================================================*/

    // TRAINING COST
    public function trainingCost() {
        $tsRefID = $this->input->post('trRefID', true);
        $tName = $this->input->post('tName', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['tname'] = $tName;
            $data['trCost'] = $this->mdl->getTrainingCost($tsRefID);
        }

        $this->render($data);
    }

    // VERIFY EXTERNAL AGENCY TRAINING
    public function verExternalAgency() {
		$this->isAjax();
		
        $refid = $this->input->post('trRefID', true);
        
        if (!empty($refid)) {
            $verify = $this->mdl->getTrainingInfoDetail($refid);
        
            if ($verify->TH_INTERNAL_EXTERNAL == 'EXTERNAL_AGENCY') {
                $json = array('sts' => 1, 'msg' => 'EXTERNAL_AGENCY', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Not EXTERNAL_AGENCY', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    /*===========================================================
       APPROVE TRAINING SETUP - ATF027
    =============================================================*/

    // APPROVE TRAINING
    public function approveTrainingSetup() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        
        if (!empty($refid)) {
            $checkTrainingSts = $this->mdl->getTrainingInfoDetail($refid);

            if($checkTrainingSts->TH_STATUS == 'APPROVE') {
                $json = array('sts' => 0, 'msg' => 'Training already approved.', 'alert' => 'danger');
            } else {
                $approve = $this->mdl->approveTrainingSetup($refid);
                //$approve = 1;
            
                if ($approve > 0) {
                    $json = array('sts' => 1, 'msg' => 'Training Approval Completed', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Training Approval Aborted', 'alert' => 'danger');
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // POSTPONE TRAINING
    public function postponeTrainingSetup() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        
        if (!empty($refid)) {
            $checkTrainingSts = $this->mdl->getTrainingInfoDetail($refid);

            if($checkTrainingSts->TH_STATUS == 'POSTPONE') {
                $json = array('sts' => 0, 'msg' => 'Training already postponed.', 'alert' => 'danger');
            } else {
                $postpone = $this->mdl->postponeTrainingSetup($refid);
                //$postpone = 1;
            
                if ($postpone > 0) {
                    $json = array('sts' => 1, 'msg' => 'Training Postponement Completed', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Training Postponement Aborted', 'alert' => 'danger');
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // REJECT TRAINING
    public function rejectTrainingSetup() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $trName = $this->input->post('trName', true);
        
        if (!empty($refid)) {
            $checkTrainingSts = $this->mdl->getTrainingInfoDetail($refid);

            if($checkTrainingSts->TH_STATUS == 'REJECT') {
                $json = array('sts' => 0, 'msg' => 'Training already rejected.', 'alert' => 'danger');
            } else {
                // check if applicant exist in training
                $checkSthRecords = $this->mdl->getStaffTrainingRecords($refid);
                if($checkSthRecords->CC == 0) {
                    $reject = $this->mdl->rejectTrainingSetup($refid);
                    //$reject = 1;
                
                    if ($reject > 0) {
                        $json = array('sts' => 1, 'msg' => 'Training Rejection Completed', 'alert' => 'success');
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Training Rejection Aborted', 'alert' => 'danger');
                    }
                } else {
                    $rejectStaffTraining = $this->mdl->rejectStaffTraining($refid);
                    if($rejectStaffTraining > 0) {
                        $reject = $this->mdl->rejectTrainingSetup($refid);
                        $json = array('sts' => 1, 'msg' => 'Training Rejection Completed', 'alert' => 'success');
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Training Rejection Aborted', 'alert' => 'danger');
                    }
                    // $json = array('sts' => 0, 'msg' => 'Cannot reject Training ID <b>'.$refid.' - ' .$trName.'</b> <br>There are staff applying/approved/assigned for this training', 'alert' => 'danger');
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // AMEND TRAINING
    public function amendTrainingSetup() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $trName = $this->input->post('trName', true);
        
        if (!empty($refid)) {
            $checkTrainingSts = $this->mdl->getTrainingInfoDetail($refid);

            if($checkTrainingSts->TH_STATUS == 'ENTRY') {
                $json = array('sts' => 0, 'msg' => 'Training already amended.', 'alert' => 'danger');
            } else {
                // check if applicant exist in training
                $checkSthRecords = $this->mdl->getStaffTrainingRecords($refid);
                if($checkSthRecords->CC == 0) {
                    $amend = $this->mdl->amendTrainingSetup($refid);
                    //$amend = 1;
                
                    if ($amend > 0) {
                        $json = array('sts' => 1, 'msg' => 'Training Amendment Completed', 'alert' => 'success');
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Training Amendment Aborted', 'alert' => 'danger');
                    }
                } else {
                    $json = array('sts' => 0, 'msg' => 'Cannot amend Training ID <b>'.$refid.' - ' .$trName.'</b> <br>There are staff applying/approved/assigned for this training', 'alert' => 'danger');
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }
    
    /*===========================================================
       EDIT APPROVE TRAINING SETUP - ATF044
    =============================================================*/

    public function fileAttParam() {
        $refid = $this->input->post('refid', true);
        //$tName = $this->input->post('tName', true);

        if(!empty($refid)) {
            $this->session->set_userdata('refid', $refid);
            //$this->session->set_userdata('tName', $tName);
            $json = array('sts' => 1, 'msg' => 'Param assigned.', 'alert' => 'success');
        } else {
            $json = array('sts' => 0, 'msg' => 'Training ID not found!', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    public function fileAttachment() {
        $refid = $this->session->userdata('refid');
        //$tName = $this->session->userdata('tName');
        $curUser = $this->staff_id;

        if(!empty($refid) && !empty($curUser)) {
            $selUrl = $this->mdl->getEcommUrl();
            if(!empty($selUrl)) {
                $ecomm_url = $selUrl->HP_PARM_DESC;
            } else {
                $ecomm_url = '';
            }

            echo header('Location: '.$ecomm_url.'trainingAttachment.jsp?admsID='.$curUser.'&apRID='.$refid.'&apTy=APPL');
            exit;
        } 
    }

    /*===========================================================
       QUERY STAFF TRAINING - ATF041
    =============================================================*/

    // STAFF LIST
    public function getStaffTrainingList()
    {   
        // selected filter value
        $selDept = $this->input->post('sDept', true);
        $selStfId = $this->input->post('stfID', true);

        $disDept = $this->input->post('disDept', true);



        // default filter value
        if (empty($selDept)) {
            $curUsrDept = '';
            if($disDept == '1') {
                $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
                $curUsrDept = $data['cur_usr_dept']->SM_DEPT_CODE;
            }
        } else {
            $curUsrDept = $selDept; 
        }

        if (empty($selStfId)) {
            $stfID = '';
        } else {
            $stfID = $selStfId; 
        }

        // get available records
        $data['stf_tr_list'] = $this->mdl->getStaffTrainingList($curUsrDept, $stfID);

        $this->render($data);
    }

    // STAFF TRAINING LIST
    public function trainingListStaff()
    {   
        $stfID = $this->input->post('stfID', true);
        $stfName = $this->input->post('stfName', true);

        // get available records
        if(!empty($stfID)) {
            $data['stfID'] = $stfID;
            $data['stfName'] = $stfName;
            $data['tr_list'] = $this->mdl->trainingListStaff($stfID);
        } else {
            $data['tr_list'] = '';
        }
        
        $this->render($data);
    }

    // STAFF APPLICATION DETAILS
    public function applicationDetail()
    {   
        $refid = $this->input->post('refid', true);
        $stfID = $this->input->post('stfID', true);

        // get available records
        if(!empty($refid) && !empty($stfID)) {
            $data['refid'] = $refid;
            $data['stfID'] = $stfID;
            $data['app_detl'] = $this->mdl->applicationDetail($refid, $stfID);
        } else {
            $data['app_detl'] = '';
        }
        
        $this->render($data);
    }

     /*===========================================================
       Confirmation Attend Training - ATF148
    =============================================================*/

    // APPLICANT LIST
    public function getStaffTrainingApplicationConf()
    {   
        $refid = $this->input->post('refid', true);
        $tName = $this->input->post('tName', true);

        //$data2 = array();

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['tname'] = $tName;
            $data['c_attend'] = $this->mdl->getCountAttendSum($refid, $att = 0);
            $data['c_absent'] = $this->mdl->getCountAttendSum($refid, $att = 1);
            $data['c_unconf'] = $this->mdl->getCountAttendSum($refid, $att = 2);
            $data['total_approve'] = $this->mdl->getCountAttendSum($refid, $att = 3);
            $data['summary'] = nl2br('Total Offer Approved: <b>'.$data['total_approve']->COUNT_ATTEND."</b>\r\n"."\r\n".
                               '<font color="green">Total Attend: <b>'.$data['c_attend']->COUNT_ATTEND."</font></b>\r\n".
                               '<font color="red">Total Absent: <b>'.$data['c_absent']->COUNT_ATTEND."</font></b>\r\n".
                               '<font color="blue">Total Unconfirmed: <b>'.$data['c_unconf']->COUNT_ATTEND.'</font></b>');

            $data['staff_tr_list_con'] = $this->mdl->getStaffTrainingApplicationConf($refid);
        } 

        $this->renderAjax($data);
    }

    // AUTO ATTEND CONFIRMATION
    public function autoAttendConfirmation() {
        $this->isAjax();
        
        $stfID = $this->input->post('stfID', true);
        $refid = $this->input->post('refid', true);
        $confirm = 0;
        $successConfirm = 0;
        
        if (!empty($refid) && !empty($stfID)) {
            foreach ($stfID as $key => $fid) {
                $confirm++;
                // CHECK IF STAFF RECORD ALREADY EXIST
                $checkStfTrDetl = $this->mdl->verifyTraining($refid, $fid);
                $transport = '';
                $trCode = '';

                if (!empty($checkStfTrDetl) && empty($checkStfTrDetl->STD_ATTEND)) {
                    // IF EXIST THEN UPDATE RECORD
                    // GET TRANSPORT
                    $checkTrExternal = $this->mdl->getTrainingExternal($refid);
                    if (!empty($checkTrExternal)) {
                        $trCode = $checkTrExternal->TH_TRAINING_CODE;
                        if ($checkTrExternal->TH_INTERNAL_EXTERNAL == 'EXTERNAL') {
                            $transport = 'UPSI';
                        }
                    }

                    // UPDATE ATTENDANCE CONFIRMATION
                    $autoConfirm = $this->mdl->autoAttendConfirmation($refid, $fid, $transport);
                    if ($autoConfirm > 0) {
                        $successConfirm++;
                    } else {
                        $successConfirm = 0;
                    }
                } 
                
                if (empty($checkStfTrDetl)) {
                    // INSERT
                    $checkTrExternal = $this->mdl->getTrainingExternal($refid);
                    if (!empty($checkTrExternal)) {
                        $trCode = $checkTrExternal->TH_TRAINING_CODE;
                        if ($checkTrExternal->TH_INTERNAL_EXTERNAL == 'EXTERNAL') {
                            $transport = 'UPSI';
                        }
                    }

                    $autoConfirmIns = $this->mdl->autoAttendConfirmationIns($refid, $fid, $transport);
                    if ($autoConfirmIns > 0) {
                        $successConfirm++;
                    } else {
                        $successConfirm = 0;
                    }
                }

                // UPDATE TRAINING REQUIREMENT
                $countRequirement = $this->mdl->getTrainingRequirement($trCode, $fid);
                if ($countRequirement->R_COUNT > 0) {
                    $updateTrRequirement = $this->mdl->updTrainingRequirementDetl($trCode, $fid);
                    if ($updateTrRequirement == true) {
                        $updMsg = 'Training Requirement successfully updated.';
                    } else {
                        $updMsg = 'Fail to update Training Requirement.';
                    }
                } else {
                    $updMsg = '';
                }
            }

            if($confirm == $successConfirm) {
                $json = array('sts' => 1, 'msg' => 'Attendance <font color="green"><b>successfully confirmed</b></font><br>'.$updMsg.'', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to confirm attendance.<br>'.$updMsg.'', 'alert' => 'red');
            }

        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // APPLICANT OTHER DETAILS 
    public function applicantOtherDetl()
    {   
        $refid = $this->input->post('refid', true);
        $stfID = $this->input->post('stfID', true);
        $tName = $this->input->post('stfName', true);

        //$data2 = array();

        if(!empty($refid) && !empty($stfID) && !empty($tName)) {
            $data['refid'] = $refid;
            $data['stfID'] = $stfID;
            $data['tname'] = $tName;
            $data['app_ot_detl'] = $this->mdl->getStaffTrainingApplicationConf($refid, $stfID);
        } 

        $this->renderAjax($data);
    }

    // EDIT APPLICANT DETAILS 
    public function editApplicantDetails()
    {   
        $refid = $this->input->post('refid', true);
        $stfID = $this->input->post('stfID', true);
        $stName = $this->input->post('stfName', true);

        //$data2 = array();

        if(!empty($refid) && !empty($stfID) && !empty($stName)) {
            $data['refid'] = $refid;
            $data['stfID'] = $stfID;
            $data['stName'] = $stName;
            $data['abs_rmk'] = $this->dropdown($this->mdl->getRemarkList(), 'TRS_REMARK', 'TRS_REMARK', ' ---Please select--- ');
            $data['app_ot_detl'] = $this->mdl->getStaffTrainingApplicationConf($refid, $stfID);
        } 

        $this->renderAjax($data);
    }

    // SAVE UPDATE APPLICANT DETAILS
    public function saveUpdateApplicantDetails() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // STAFF ID
        $stfID = $form['staff_id'];

        // form / input validation
        $rule = array(
            'attendance_confirmation' => 'max_length[1]',
            'transportation' => 'max_length[12]',
            'confirm_date' => 'max_length[11]',
            'absent_remark' => 'max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1 && !empty($refid) && !empty($stfID)) {
            $checkStaffCon = $this->mdl->verifyTraining($refid, $stfID);
            
            if(!empty($checkStaffCon)) {
                $updateIns = $this->mdl->saveUpdateApplicantDetails($form, $refid, $stfID);
            } else {
                $updateIns = $this->mdl->saveInsertApplicantDetails($form, $refid, $stfID);
            }
            

            if($updateIns > 0) {
                $attend_field = $this->mdl->verifyTraining($refid, $stfID);

                if($attend_field->STD_ATTEND == 'A') {
                    $attend_field = '<font color="green">Yes (Auto)</font>';
                    $staff_id = '<font color="green">'.$stfID.'</font>';
                } elseif($attend_field->STD_ATTEND == 'Y') {
                    $attend_field = '<font color="green">Yes</font>';
                    $staff_id = '<font color="green">'.$stfID.'</font>';
                } elseif($attend_field->STD_ATTEND == 'N') {
                    $attend_field = '<font color="red">No</font>';
                    $staff_id = '<font color="red">'.$stfID.'</font>';
                } else {
                    $attend_field = '';
                    $staff_id = '<font color="blue">'.$stfID.'</font>';
                }

                $c_attend = $this->mdl->getCountAttendSum($refid, $att = 0);
                $c_absent = $this->mdl->getCountAttendSum($refid, $att = 1);
                $c_unconf = $this->mdl->getCountAttendSum($refid, $att = 2);
                $total_approve = $this->mdl->getCountAttendSum($refid, $att = 3);
                $summary = nl2br('Total Offer Approved: <b>'.$total_approve->COUNT_ATTEND."</b>\r\n"."\r\n".
                                '<font color="green">Total Attend: <b>'.$c_attend->COUNT_ATTEND."</font></b>\r\n".
                                '<font color="red">Total Absent: <b>'.$c_absent->COUNT_ATTEND."</font></b>\r\n".
                                '<font color="blue">Total Unconfirmed: <b>'.$c_unconf->COUNT_ATTEND.'</font></b>');

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'attend_field' => $attend_field, 'summary' => $summary, 'staff_id' => $staff_id);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // EMAIL FORM MODAL
    public function emailForm() {
        $this->renderAjax();
    }

    // RESEND EMAIL APPLICANT
    public function resendEmailApplicantDetl()
    {
        $this->isAjax();

        $staffID = $this->input->post('stfID', true);
        $refid = $this->input->post('refid', true);
        // $stName = $this->input->post('stfName', true);
        $memo_from = 'bsm.latihan@upsi.edu.my';

        $staffNameArr = array();
        $staffEmailArr = array();
        $staffIDCCArr = array();
        $staffNameCCArr = array();
        $staffEmailCCArr = array();

        // GET TRAINING DETAIL
        $tr_detl = $this->mdl->getTrDetl($refid);
        if(!empty($tr_detl)) {
            // TRAINING TITLE
            $tr_title = $tr_detl->TH_TRAINING_TITLE;
            // TRAINING VENUE
            $tr_venue = $tr_detl->TH_TRAINING_VENUE;
            // TRAINING DATE FROM
            $tr_date_from = $tr_detl->TH_DATEFR;
            // TRAINING DATE TO
            $tr_date_to = $tr_detl->TH_DATETO;
            // TRAINING TIME FROM
            $tr_time_from = $tr_detl->TIME_FR;
            // TRAINING TIME TO
            $tr_time_to = $tr_detl->TIME_T;
            // TRAINING CONFIRM DATE
            $tr_confirm_date = $tr_detl->TH_CON_DATE_TO;
        } else {
            $trTitle = '';
            $tr_date_from = '';
            $tr_date_to = '';
            $tr_time_from = '';
            $tr_time_to = '';
            $tr_confirm_date = '';
        }

        // GET TRAINING COORDINATOR
        $tr_coor = $this->mdl->getTrCoor($refid);
        if(!empty($tr_coor)) {
            $coor_name = $tr_coor->STAFF_NAME;
            $coor_tel_no = $tr_coor->THD_COORDINATOR_TELNO;
        } else {
            $coor_name = '';
            $coor_tel_no = '';
        }

        // MEMO TITLE AND CONTENT
        $msg_title = 'Pindaan Kursus : ' .$tr_title.'';
        $msg_content = 'Adalah dimaklumkan pelaksanaan kursus ' .$tr_title.' adalah dipinda berdasarkan maklumat berikut :'.
                                '<br><br>'.
                                'Tarikh : '.$tr_date_from.' hingga '.$tr_date_to.
                                '<br>'.
                                'Masa : '.$tr_time_from.' hingga '.$tr_time_to.
                                '<br>'.
                                'Tempat : '.$tr_venue.
                                '<br><br>'.
                                '2. Namun demikian, sebarang maklumbalas ketidakhadiran pada tarikh baru yang dinyatakan, mohon emelkan kepada '.
                                'Unit Latihan, BSM secara rasmi bagi mengelakkan tuan/puan dikenakan sebarang denda. '.
                                '<br><br>'.
                                '3. Sekiranya tuan/puan tidak membuat sebarang maklumbalas, tuan/puan dianggap <b>bersetuju menghadiri kursus tersebut.</b> '.
                                'Sebarang ketidakhadiran tanpa makluman akan dikenakan denda (RM50.00 sehari untuk kursus dalaman / RM200 sehari untuk '.
                                'kursus luar) seperti yang telah diputuskan oleh Mesyuarat Lembaga Pengarah Universiti kali ke-90, Bil 6/2013 bertarikh 11 Disember 2013.'.
                                '<br><br>'.
                                '4. Sebarang pertanyaan berkenaan perkara di atas, sila berhubung dengan urusetia kursus '.$coor_name.' di talian '.$coor_tel_no.'<br><br>'.
                                'Sekian, terima kasih.';

        if(!empty($refid) && !empty($staffID)) {
            foreach ($staffID as $key => $fid) {
                // GET STAFF EMAIL
                $staff_app = $this->mdl->getCurUserDept($fid);
                if(!empty($staff_app)){
                    $staff_app_email = $staff_app->SM_EMAIL_ADDR;
                    $staff_app_id = $staff_app->SM_STAFF_ID;
                    $staff_app_name = $staff_app->SM_STAFF_NAME;
                } else {
                    $staff_app_email = '';
                }

                $staffNameArr [] = $staff_app_name;
                $staffEmailArr [] = $staff_app_email;

                // GET EVALUATOR STAFF EMAIL DISTINCT
                $staff_eva = $this->mdl->getStaffMainDis($refid, $fid, $resend = 1);
                if(!empty($staff_eva)) {
                    // foreach($staffIDCCArr as $i => $idCC) {
                    //     if($staff_eva->STAFF == $staffIDCCArr[$i]) {
                    //         $eva_email = '';
                    //         $eva_id = '';
                    //         $eva_name = '';
                    //     } else {
                    //         $eva_id = $staff_eva->STAFF;
                    //         $eva_name = $staff_eva->SM_STAFF_NAME;
                    //         $eva_email = $staff_eva->SM_EMAIL_ADDR;
                    //     }
                    // }

                    $eva_id = $staff_eva->STAFF;
                    $eva_name = $staff_eva->SM_STAFF_NAME;
                    $eva_email = $staff_eva->SM_EMAIL_ADDR;
                    
                } else {
                    $eva_email = '';
                    $eva_id = '';
                    $eva_name = '';
                }

                $staffIDCCArr [] = $eva_id;
                $staffNameCCArr [] = $eva_name;
                $staffEmailCCArr [] = $eva_email;
            }

            $filterStaffIDCCArr = array_values(array_filter($staffIDCCArr));
            $filterStaffNameCCArr = array_values(array_filter($staffNameCCArr));
            $filterStaffEmailCCArr = array_values(array_filter($staffEmailCCArr));
            //var_dump($filterStaffEmailCCArr);

            $json = array('sts' => 1, 'msg' => 'All staff details', 'alert' => 'red', 'from' => $memo_from, 'staffNameArr' => $staffNameArr, 'staffEmailArr' => $staffEmailArr, 'staffIDCCArr' => $filterStaffIDCCArr, 'staffNameCCArr' => $filterStaffNameCCArr, 'staffEmailCCArr' => $filterStaffEmailCCArr, 'msg_title' => $msg_title, 'msg_content' => $msg_content);
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator!', 'alert' => 'red');
        }

        echo json_encode($json);
    }

    // SEND EMAIL
    public function resendEmail() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $sentMsg = '';

        // staff email
        $memo_from = $form['from'];

        // staff email
        $emailForm = $form['email_to'];
        //$staff_app_email = explode(",", $emailForm);

        // cc email
        $emailCCForm = $form['email_cc'];
        //$email_cc = explode(",", $emailCCForm);

        // email title
        $msg_title = $form['title'];

        // email content 
        $msg_content = $form['content'];

        // staff_id 
        $staff_id = $form['staff_id_to'];
        $staff_id_arr = explode(",", $staff_id);

        // refid 
        $refid = $form['refid'];

        $success = 0;
        $successResend = 0;
        
        //var_dump($email_cc);
        $sendEmailSts = $this->mdl->sendEmail($memo_from, $emailForm, $emailCCForm, $msg_title, $msg_content);

        if($sendEmailSts > 0) {
            
            // update/insert memo status
            foreach ($staff_id_arr as $sia) {
                $success++;
                
                $checkEmailSts = $this->mdl->verifyTraining($refid, $sia);
        
                if (!empty($checkEmailSts)) {
                    $updEmailSts = $this->mdl->updateEmailSts($refid, $sia);
                    if ($updEmailSts > 0) {
                        $successResend++;
                        $msgSuccess = "Memo status updated";
                    } else {
                        $msgSuccess = "";
                    }
                } else {
                    $insEmailSts = $this->mdl->insertEmailSts($refid, $sia);
                    if ($insEmailSts > 0) {
                        $successResend++;
                        $msgSuccess = "Memo status updated";
                    } else {
                        $msgSuccess = "";
                    }
                }
            }
        } else {
            $successResend = 0;
        }

        if($success == $successResend) {
            $json = array('sts' => 1, 'msg' => 'Email sent '.nl2br("\n\r").$msgSuccess, 'alert' => 'green');
        } else {
            $json = array('sts' => 0, 'msg' => 'Fail to send email', 'alert' => 'red');
        }
         
        echo json_encode($json);
    }

    // RESEND EMAIL
    public function resendEmail2() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $sentMsg = '';

        // staff email
        $memo_from = $form['from'];

        // staff email
        $emailForm = $form['email_to'];
        //$staff_app_email = explode(",", $emailForm);

        // cc email
        $emailCCForm = $form['email_cc'];
        //$email_cc = explode(",", $emailCCForm);

        // email title
        $msg_title = $form['title'];

        // email content 
        $msg_content = $form['content'];

        // staff_id 
        $staff_id = $form['staff_id_to'];
        $staff_id_arr = explode(",", $staff_id);

        // refid 
        $refid = $form['refid'];

        // $success = 0;
        // $successResend = 0;
        
        //var_dump($email_cc);
        $sendEmailSts = $this->mdl->sendEmail($memo_from, $emailForm, $emailCCForm, $msg_title, $msg_content);

        if($sendEmailSts > 0) {
            $json = array('sts' => 1, 'msg' => 'Email sent', 'alert' => 'green');
        } else {
            $json = array('sts' => 0, 'msg' => 'Fail to send email', 'alert' => 'red');
        }
         
        echo json_encode($json);
    }

    // PRINT OFFER MEMO MODAL
    public function printOfferMemo()
    {   
        $refid = $this->input->post('refid', true);
        $stfID = $this->input->post('stfID', true);
        $stName = $this->input->post('stfName', true);

        // get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        // get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $data['ref_no'] = 'UPSI/PEND/SM4/UL2/445.2Jld.4(     )';

        $this->renderAjax($data);
    }

    // GET COURSE TITLE LIST
    public function ddTrainingList()
    {   
        $this->isAjax();

        $selMonth = $this->input->post('month', true);
        $selYear = $this->input->post('year', true);

        $defIntExt = '1';
        $curUsrDept = '';
        $defTrSts = 'APPROVE';

        if (empty($selMonth)) {
            // default month
            $defMonth = '';
        }   else {
            $defMonth = $selMonth;
        }

        if (empty($selYear)) {
            // current year
            $curYear = '';
        } else {
            $curYear = $selYear;
        }
        
        // get available records
        $ddTrList = $this->mdl->getTrainingList($defIntExt, $curUsrDept, $defMonth, $curYear, $defTrSts);
               
        if (!empty($ddTrList)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'ddTrList' => $ddTrList);
        
        echo json_encode($json);
    }

    // GET SEND DATE
    public function getSendDate()
    {   
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        
        // get available records
        $sendDateList = $this->mdl->getSendDate($refid);
               
        if (!empty($sendDateList)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'sendDateList' => $sendDateList);
        
        echo json_encode($json);
    }

    // SET PARAM PRINT OFFER MEMO
    public function setOfferMemoParam() {
        $this->isAjax();

    	// get current value 
    	$refid = $this->input->post('refid');
        $sendDate = $this->input->post('sendDate');
        $refNo = $this->input->post('refNo');
        
        if(!empty($refid) && !empty($refNo)) {
            // set session value
            $this->session->set_userdata('refid_mem', $refid);
            $this->session->set_userdata('send_date_mem', $sendDate);
            $this->session->set_userdata('ref_no', $refNo);

            $json = array('sts' => 1, 'msg' => 'Offer Memo param has been set', 'alert' => 'success');
        } else {
            $json = array('sts' => 0, 'msg' => 'Fail to set param', 'alert' => 'danger');
        }
		
        echo json_encode($json);
    }

    // PRINT OFFER MEMO
    /* function printOfferReport() {
        $refid = $this->session->userdata('refid_mem');
        $sendDate = $this->session->userdata('send_date_mem');
        $refNo = $this->session->userdata('ref_no');
        $formCode = 'ATR250';
        $param = array('PARAMFORM' => 'NO', 'TRAINING_REFID' => $refid, 'TARIKH_SEND' => $sendDate, 'RUJUKAN' => $refNo);

        $this->lib->report($formCode, $param);
    }*/

    // VERIFY TRAINING SERVICE BOOK
    public function verifySvcBook(){
        $this->isAjax();
 
    	$refid = $this->input->post('refid');
        
        if(!empty($refid)) {
            $getThDate = $this->mdl->getTrainingDateFrom($refid);
            $verSvcBook = $this->mdl->verifySvcBook($refid);

            if($getThDate->TH_DATE_TO_FULL > $getThDate->CUR_DATE) {
                $json = array('sts' => 0, 'msg' => 'Course is not completed', 'alert' => 'red');
            } elseif($getThDate->TH_DATE_TO_YEAR < '2013') {
                $json = array('sts' => 0, 'msg' => 'Only courses from 2013 and above can be included in the service book.', 'alert' => 'red');
            } elseif($verSvcBook->TT_SERVICE_BOOK == 'N' || empty($verSvcBook->TT_SERVICE_BOOK)) {
                $json = array('sts' => 0, 'msg' => 'Course is not included in service book', 'alert' => 'red');
            } else {
                $json = array('sts' => 1, 'msg' => 'Course is included in service book', 'alert' => 'green');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'red');
        }
		
        echo json_encode($json);
    }

    // GET STAFF LIST (SERVICE BOOK)
    public function ATF118() {
        $refid = $this->input->post('refid');
        $tName = $this->input->post('tName');

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['tname'] = $tName;
            $data['tr_detl'] = $this->mdl->getTrainingInfoDetail($refid);
            $data['get_svc_book'] = $this->mdl->getStaffListSvcBook($refid);
        }

        $this->renderAjax($data);
    }

    // ADD TO SERVICE BOOK
    public function addServiceBook(){
        $this->isAjax();
 
        $refid = $this->input->post('refid');
        $staffID = $this->input->post('stfID');
        $success = 0;
        $successSvc = 0;
        
        if(!empty($refid) && !empty($staffID)) {
            
            $tr_detl = $this->mdl->getTrDetlSvcBook($refid);
            // GET TRAINING DETAIL
            if(!empty($tr_detl)) {
                // TRAINING TITLE
                $tr_title = $tr_detl->TH_TRAINING_TITLE;
                // TRAINING VENUE
                $tr_venue = $tr_detl->TH_TRAINING_VENUE;
                // TRAINING DATE FROM
                $tr_date_from = $tr_detl->TH_DATEFR;
                // TRAINING DATE TO
                $tr_date_to = $tr_detl->TH_DATETO;
                // TRAINING ORGANIZER NAME
                $tr_organizer = $tr_detl->TH_ORGANIZER_NAME;
            } else {
                $tr_title = '';
                $tr_venue = '';
                $tr_date_from = '';
                $tr_date_to = '';
                $tr_organizer = '';
            }

            $sb_remark = 'Telah menghadiri dengan jayanya Kursus/Bengkel/Seminar/Persidangan.'.
                            "\n".
                            'Tajuk : '.$tr_title.
                            "\n".
                            'Tarikh : '.$tr_date_from.' hingga '.$tr_date_to.
                            "\n".
                            'Tempat : '.$tr_venue.
                            "\n".
                            'Anjuran : '.$tr_organizer.'';
                        
            // $sb_remark = strtr($sb_remark2, chr(10), chr(32));

            // $sb_remark = preg_replace('/\<br(\s*)?\/?\>/i', "\n", $sb_remark2);                


            foreach($staffID as $key => $sid) {
                $success++;

                $getJobCode = $this->mdl->getJobCode($sid);
                if(!empty($getJobCode)) {
                    $jobCode = $getJobCode->SM_JOB_CODE; 
                } else {
                    $jobCode = '';
                }

                $getPensionSts = $this->mdl->getPenisionSts($sid);
                if(!empty($getPensionSts)) {
                    $pensionSts = $getPensionSts->SS_PENSION_STATUS;
                } else {
                    $pensionSts = '';
                }

                $getPensionSts = $this->mdl->addServiceBook($refid, $sid, $sb_remark, $jobCode, $pensionSts, $tr_date_from, $tr_date_to);

                if($getPensionSts > 0) {
                    $this->mdl->updSthSvcBook($refid, $sid);
                    $successSvc++;
                } else {
                    $successSvc = 0;
                }
            }

            if($success == $successSvc) {
                $json = array('sts' => 1, 'msg' => 'Successfully registered to Service Book', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to register to Service Book', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'red');
        }
		
        echo json_encode($json);
    }

    /*===========================================================
       Staff Training Evaluation - ATF104
    =============================================================*/

    // STAFF LIST
    public function getStaffListEvaluation()
    {   
        $refid = $this->input->post('refid', true);
        $tName = $this->input->post('tName', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['tname'] = $tName;
            $data['staff_list_eva'] = $this->mdl->getStaffListEvaluation($refid);
        } 

        $this->renderAjax($data);
    }

    // EVALUATION REPORT
    /*public function genEvaReport($formCode, $refid) {
    	// set param list
    	if (!empty($refid)) {
			$param = array('PARAMFORM' => 'NO', 'REFID' => $refid);	
		} else {
			$param = null;
		}
		
		// Format = PDF
        $this->lib->report($formCode, $param);
    } 

    // STAFF EVALUATION INDIVIDUAL REPORT
    public function genStaffEvaReport($refid, $staffID) {
    	// set param list
    	if (!empty($refid)) {
            $trDetl = $this->mdl->getTrainingDateFrom($refid);
            $hrParm = $this->mdl->getStartDate($refid);

            if($trDetl->TH_DATE_FROM >= $hrParm->HP_PARM_DESC) {
                $formCode = 'ATR275';
            } elseif($trDetl->TH_DATE_FROM < $hrParm->HP_PARM_DESC) {
                $formCode = 'ATR131';
            } else {
                $formCode = '';
            }

			$param = array('PARAMFORM' => 'NO', 'REFID' => $refid, 'STAFFID' => $staffID);	
		} else {
			$param = null;
		}
		
		// Format = PDF
        $this->lib->report($formCode, $param);
    }*/

    // STAFF EVALUATION DETAILS
    public function staffEvaluationDetails()
    {   
        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('stfID', true);
        $staffN = $this->input->post('stfName', true);

        if(!empty($refid) && !empty($staffID)) {
            $data['refid'] = $refid;
            $data['staffID'] = $staffID;
            $data['staffN'] = $staffN;
            $data['staff_eva_detl'] = $this->mdl->getStaffListEvaluation($refid, $staffID);
        } 

        $this->renderAjax($data);
    }

    // STAFF EVALUATION UPDATE MODAL
    public function editStaffEvaluation()
    {   
        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('stfID', true);
        $staffN = $this->input->post('stfName', true);

        if(!empty($refid) && !empty($staffID)) {
            $data['refid'] = $refid;
            $data['staffID'] = $staffID;
            $data['staffN'] = $staffN;
            $data['staff_eva_detl'] = $this->mdl->getStaffListEvaluation($refid, $staffID);
            $data['eva_list'] = $this->dropdown($this->mdl->getEvaluatorList(), 'SM_STAFF_ID', 'STF_ID_NAME', ' ---Please select--- ');
        } 

        $this->renderAjax($data);
    }

    // SAVE UPDATE APPLICANT DETAILS
    public function saveUpdateStaffEvaDetails() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // STAFF ID
        $stfID = $form['staff_id'];

        // form / input validation
        $rule = array(
            'submit_date' => 'max_length[11]',
            'evaluator_id' => 'max_length[10]',
            'evaluation_status' => 'max_length[1]',
            'evaluation_date' => 'max_length[11]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1 && !empty($refid) && !empty($stfID)) {
            $update = $this->mdl->saveUpdateStaffEvaDetails($form, $refid, $stfID);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // PROCESS EVALUATOR ID
    public function procEvaluatorId() {
        $this->isAjax();
        
        $stfID = $this->input->post('stfID', true);
        $refid = $this->input->post('refid', true);
        $process = 0;
        $successProcess = 0;
        
        if (!empty($refid) && !empty($stfID)) {
            foreach ($stfID as $key => $fid) {
                $process++;

                // GET EVALUATOR ID
                $evaID = $this->mdl->getProcessEvaluatorID($refid, $fid);
                if(!empty($evaID)) {
                    // EVALUATOR ID
                    $procEvaID = $evaID->PROC_EVA_ID;
                    // CHECK EVALUATOR ID IF NULL
                    $checkEvaId = $this->mdl->verifyEvaID($refid, $fid);

                    if(empty($checkEvaId->STH_EVALUATOR_ID)) {
                        $updateEvaID = $this->mdl->updateEvaID($refid, $fid, $procEvaID);

                        if($updateEvaID > 0) {
                            $successProcess++;
                        } else {
                            $successProcess = 0;
                        }
                    } else {
                        $successProcess++;
                    }
                } else {
                    $successProcess++;
                }
            }

            if($process == $successProcess) {
                $json = array('sts' => 1, 'msg' => 'Process Completed', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Process Aborted', 'alert' => 'red');
            }

        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    /*===========================================================
       Staff Evaluator Send Memo - ATF121
    =============================================================*/

    // STAFF LIST
    public function getStaffListSendMemo()
    {   
        $refid = $this->input->post('refid', true);
        $tName = $this->input->post('tName', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['tname'] = $tName;
            $data['staff_list_sm'] = $this->mdl->getStaffListSendMemo($refid);
        } 

        $this->renderAjax($data);
    }

    // VERIFY SEND MEMO
    public function verifySendMemo() {
        $this->isAjax();
        // get parameter values
        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('stfID', true);
        $evaID = $this->input->post('evaID', true);

        $getMaxSeq = $this->mdl->getMaxSeq();
        if(!empty($getMaxSeq)) {
            $maxSeq = $getMaxSeq->HP_PARM_DESC;
        } else {
            $maxSeq = '0';
        }

        if ($maxSeq > 0) {
            if (!empty($refid) && !empty($staffID) && !empty($evaID)) {
                $getMemoSeq = $this->mdl->getStaffListSendMemo($refid, $staffID);
                if(!empty($getMemoSeq)) {
                    $seqMemo = $getMemoSeq->SND_MEM;
                } else {
                    $seqMemo = '0';
                }
    
                if ($seqMemo > $maxSeq) {
                    $json = array('sts' => 0, 'msg' => 'Memos can only be sent ' .$maxSeq. ' only.', 'color' => 'red');
                    
                } else {
                    $json = array('sts' => 1, 'msg' => 'Proceeed to send memo', 'color' => 'green');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'color' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'This function has been disabled', 'color' => 'red');
        }
        
         
        echo json_encode($json);
    }

    // SEND MEMO FORM
    public function sendMemoForm()
    {   
        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('stfID', true);
        $evaID = $this->input->post('evaID', true);

        $train_eva_memo = $this->mdl->getTrainEvaMemoDetl();
        if(!empty($train_eva_memo)) {
            $from = $train_eva_memo->TEM_SEND_BY;
            $tem_title = $train_eva_memo->TEM_TITLE;
            $tem_content = $train_eva_memo->TEM_CONTENT;
        } else {
            $from = "";
            $tem_title = "";
            $tem_content = "";
        }
        

        if(!empty($refid) && !empty($staffID)) {
            $data['refid'] = $refid;
            $data['staffID'] = $staffID;

            $data['sendFrom'] = $this->mdl->getStaffInfo($from);
            $data['sendTo'] = $this->mdl->getStaffInfo($evaID);

            // EVALUATOR INFO
            if(!empty($data['sendTo'])) {
                $data['eva_id'] = $data['sendTo']->SM_STAFF_ID;
                $data['eva_name'] = $data['sendTo']->SM_STAFF_NAME;
            } else {
                $data['eva_id'] = '';
                $data['eva_name'] = '';
            }

            // SEND MEMO SEQ
            $data['teh_seq'] = $this->mdl->getStaffListSendMemo($refid, $staffID);
            if(!empty($data['teh_seq']->SND_MEM)) {
                $data['teh_seq_val'] = $data['teh_seq']->SND_MEM;
            } else {
                $data['teh_seq_val'] = '0';
            }

            // GET TRAINING DETAIL
            $data['tr_detl'] = $this->mdl->getTrDetl($refid);
            if(!empty($data['tr_detl'])) {
                // TRAINING TITLE
                $data['tr_title'] = $data['tr_detl']->TH_TRAINING_TITLE;
            } else {
                $data['trTitle'] = '';
            }

            // $data['title'] = 'Borang Penilaian Keberkesanan Latihan';
            $data['title'] = $tem_title;

            // REPLACE WITH DEFAULT CONTENT
            // $data['content'] = 'Nama : nn'."\r\n".
            //                     'Kursus : xxxxxxx'."\r\n".
            //                     'Tarikh : dd/mm/yyyy'."\r\n".
            //                     'Tempat : kkkkkk'."\r\n"."\r\n".
            //                     'Mohon tindakan Tuan/Puan untuk mengisi Borang Penilaian Keberkesanan Latihan terhadap penilaian kendiri staf di bawah seliaan yang '.
            //                     'mengikuti latihan dalam tempoh satu (1) minggu dari tarikh penerimaan memo ini. Kegagalan Tuan/Puan dalam membuat penilaian '.
            //                     'boleh mengakibatkan mata CPD staf bagi kursus berkenaan tidak akan <b>DIPROSES</b>. '."\r\n"."\r\n".
            //                     'Borang penilaian boleh diakses secara atas talian di link berikut : FFFFFF'."\r\n".
            //                     'Sekian, terima kasih.'."\r\n"."\r\n".
            //                     'Unit Latihan, BSM'."\r\n"."\r\n".
            //                     '-- system generated memo --';

            $data['content'] = $tem_content;
        } 

        $this->renderAjax($data);
    }

    // SEND MEMO EVALUATOR
    public function sendMemoEvaluator() {
        $this->isAjax();
        // get parameter values
        $form = $this->input->post('form', true);

        // URL
        $link = '<a href="training.jsp?action=list_of_evaluater"><b>Borang Penilaian Keberkesanan</b></a>';

        // TRAINING REF ID
        $refid = $form['training_ref_id'];

        // MEMO SEQ
        $memoSeq = $form['seq_send_memo'];

        // GET MAX SEQ
        $getMaxSeq = $this->mdl->getMaxSeq();
        if(!empty($getMaxSeq)) {
            $maxSeq = $getMaxSeq->HP_PARM_DESC;
        } else {
            $maxSeq = '0';
        }

        // MEMO FROM
        $from = $form['from'];

        // SEND TO
        $sendTO = $form['to'];

        // CC
        $memoCC = $form['memo_cc'];
        if(!empty($memoCC)) {
            $staffInfo = $this->mdl->getStaffInfo($memoCC);
            $memoCCId = $staffInfo->SM_STAFF_ID;
            $memoCCName = $staffInfo->SM_STAFF_NAME;
        } else {
            $memoCCId = '';
            $memoCCName = '';
        }

        // MEMO TITLE
        $memoTitle = $form['title'];

        // GET TRAINING DETAIL
        $tr_detl = $this->mdl->getTrDetl($refid);
        if(!empty($tr_detl)) {
            // TRAINING TITLE
            $tr_title = $tr_detl->TH_TRAINING_TITLE;
            // TRAINING VENUE
            $tr_venue = $tr_detl->TH_TRAINING_VENUE;
            if(empty($tr_venue) || $tr_venue == '-') {
                $getVenue = $this->mdl->getVenue($refid);
                $venue = $getVenue->TH_VENUE;
            } else {
                $venue = $tr_detl->TH_TRAINING_VENUE;
            }
            // TRAINING DATE FROM
            $tr_date_from = $tr_detl->TH_DATEFR;
            // TRAINING DATE TO
            $tr_date_to = $tr_detl->TH_DATETO;
        } else {
            $trTitle = '';
            $tr_venue = '';
            $tr_date_from = '';
            $tr_date_to = '';
        }

        // MEMO CONTENT
        $memoContent = 'Nama : '.$memoCCName.' ('.$memoCCId.')'.
                            '<br>'.
                            'Kursus : '.$tr_title.' - '.$refid.
                            '<br>'.
                            'Tarikh : '.$tr_date_from.' - '.$tr_date_to.
                            '<br>'.
                            'Tempat : '.$venue.
                            '<br><br>'.
                            'Mohon tindakan Tuan/Puan untuk mengisi Borang Penilaian Keberkesanan Latihan terhadap penilaian kendiri staf di bawah seliaan yang '.
                            'mengikuti latihan dalam tempoh satu (1) minggu dari tarikh penerimaan memo ini. Kegagalan Tuan/Puan dalam membuat penilaian '.
                            'boleh mengakibatkan mata CPD staf bagi kursus berkenaan tidak akan <b>DIPROSES</b>. '.
                            '<br><br>'.
                            'Borang penilaian boleh diakses secara atas talian di link berikut : '.$link.
                            '<br>'.
                            'Sekian, terima kasih.'.
                            '<br><br>'.
                            'Unit Latihan, BSM'.
                            '<br><br>'.
                            '-- system generated memo --';
        // DEFAULT CONTENT
        $defContent = $form['content'];
        // if($maxSeq == 0) {
        //     $json = array('sts' => 0, 'msg' => 'This function has been disabled.', 'alert' => 'danger', 'color' => 'red');
        // }

        if (!empty($from) && !empty($sendTO) && !empty($memoTitle) && !empty($memoContent) && $memoSeq < $maxSeq) {
            $sendMemo = $this->mdl->createMemo($from, $sendTO, $memoTitle, $memoContent);

            if ($sendMemo > 0) {
                // INSERT INTO TRAINING_EVALUATION_HIS FOR REFERENCE PURPOSE
                $countMemoSeq = $this->mdl->getCountMemoSeq($refid, $sendTO, $memoCC);
                $curMemoCount = $countMemoSeq->MEMOC;
                $insRef = $this->mdl->insertRefMemo($refid, $curMemoCount, $memoTitle, $defContent, $from, $sendTO, $memoCC);
                if($insRef > 0) {
                    $refMsg = 'Saved as reference';
                } else {
                    $refMsg = '';
                }

                $memoSeqRow = $this->mdl->getStaffListSendMemo($refid, $memoCC);
                if(!empty($memoSeqRow)) {
                    $memRow = $memoSeqRow->SND_MEM;
                } else {
                    $memRow = '';
                }
                
                $json = array('sts' => 1, 'msg' => nl2br('Memo sent.'."\r\n"."\r\n".$refMsg), 'alert' => 'success', 'color' => 'green', 'memoRow' => $memRow);
                
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to send memo.', 'alert' => 'danger', 'color' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Memo can only be sent ' .$maxSeq. ' times.', 'alert' => 'danger', 'color' => 'red');
        }
         
        echo json_encode($json);
    }


    /*===========================================================
       Report for Training Evaluation - ATF166
    =============================================================*/

    // POPULATE COURSE LIST
    public function courseListRptTe(){
        $this->isAjax();
        
        $year = $this->input->post('year_i', true);
        
        // get available records
        if(!empty($year)) {
            $courseList = $this->mdl->courseListRptTe($year);
        } else {
            $courseList = '';
        }
               
        if (!empty($courseList)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'courseList' => $courseList);
        
        echo json_encode($json);
    }

    // REPORT PARAM
    /*public function setParam() {
		// clear filter for report
        $this->session->set_userdata('repCode2','');
        $this->session->set_userdata('year_i2','');
        $this->session->set_userdata('department2','');
        $this->session->set_userdata('staffID2','');
        $this->session->set_userdata('corTitle22','');
        $this->session->set_userdata('courseDate2','');
        $this->session->set_userdata('sMonth2','');
        $this->session->set_userdata('sYear2','');
        $this->session->set_userdata('corTitle2','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$year_i = $this->input->post('year_i');
    	$department = $this->input->post('department');
        $staffID = $this->input->post('staffID');
        $corTitle2 = $this->input->post('corTitle2');
    	$courseDate = $this->input->post('courseDate');
    	$sMonth = $this->input->post('sMonth');
        $sYear = $this->input->post('sYear');
        $corTitle = $this->input->post('corTitle');

		// set session value
        $this->session->set_userdata('repCode2',$repCode);
        $this->session->set_userdata('year_i2',$year_i);
        $this->session->set_userdata('department2',$department);
        $this->session->set_userdata('staffID2',$staffID);
        $this->session->set_userdata('corTitle22',$corTitle2);
        $this->session->set_userdata('courseDate2',$courseDate);
        $this->session->set_userdata('sMonth2',$sMonth);
        $this->session->set_userdata('sYear2',$sYear);
        $this->session->set_userdata('corTitle2',$corTitle);
    }

    // GENERATE REPORT
    public function genReport() {
        $repCode = $this->session->userdata('repCode2');
    	$year_i = $this->session->userdata('year_i2');
    	$department = $this->session->userdata('department2');
        $staffID = $this->session->userdata('staffID2');
        $corTitle2 = $this->session->userdata('corTitle22');
        $courseDate = $this->session->userdata('courseDate2');

        $sMonth = $this->session->userdata('sMonth2');
        $sYear = $this->session->userdata('sYear2');

        $corTitle = $this->session->userdata('corTitle2');
        

		if($repCode == 'ATR079' || $repCode == 'ATR084') {
            $param = array('PARAMFORM' => 'NO', 'P_YEAR' => $year_i, 'P_DEPT_CODE' => $department, 'P_STAFF_ID' => $staffID, 'P_REF_ID' => $corTitle2, 'P_TRAINING_DATE' => $courseDate);
            $this->lib->report($repCode, $param);
        } elseif($repCode == 'ATR132') {
            $param = array('PARAMFORM' => 'NO', 'YEAR' => $sYear, 'MONTH2' => $sMonth);
            $this->lib->report($repCode, $param);
        } elseif($repCode == 'ATR133') {
            $param = array('PARAMFORM' => 'NO', 'REFID' => $corTitle);
            $this->lib->report($repCode, $param);
        } elseif($repCode == 'ATRPDF' || $repCode == 'ATRXLS') {
            $getTrDate = $this->mdl->getTrainingDateFrom($corTitle);
            $trDateFrom = $getTrDate->TH_DATE_FROM;

            $getStartDate = $this->mdl->getStartDate();
            $evaStartDate = $getStartDate->HP_PARM_DESC;

            if($trDateFrom >= $evaStartDate && $repCode == 'ATRPDF') {
                $rpCode = 'ATR277';
            } elseif($trDateFrom < $evaStartDate && $repCode == 'ATRPDF') {
                $rpCode = 'ATR185';
            } elseif($trDateFrom >= $evaStartDate && $repCode == 'ATRXLS') {
                $rpCode = 'ATR277X';
            } elseif($trDateFrom < $evaStartDate && $repCode == 'ATRXLS') {
                $rpCode = 'ATR185';
            }

            if($repCode == 'ATRPDF') {
                $param = array('PARAMFORM' => 'NO', 'REFID' => $corTitle);
                $this->lib->report($rpCode, $param, $format='pdf');
            } elseif($repCode == 'ATRXLS') {
                $param = array('PARAMFORM' => 'NO', 'REFID' => $corTitle);
                $this->lib->report($rpCode, $param, $format='EXCEL');
            }
        } 
    }*/

    /*===========================================================
       Training Secretariat Report - Manual Entry - ATF147
    =============================================================*/

    // TRAINING LIST MANUAL ENTRY REPORT
    public function getTrainingListRptManEnt()
    {   
        // selected filter value
        $selIntExt = $this->input->post('intExt', true);
        $selDept = $this->input->post('sDept', true);
        $selMonth = $this->input->post('sMonth', true);
        $selYear = $this->input->post('sYear', true);
        $selSts = $this->input->post('tSts', true);

        // verify filter
        $disDept = $this->input->post('disDept', true);
        $disYear = $this->input->post('disYear', true);
        $disTsts = $this->input->post('disTsts', true);
        $evaluation = $this->input->post('evaluation', true);
        $screRpt = $this->input->post('screRpt', true);

        // COUNT
        $total_rpt = 0;
        $total_filled = 0;
        $total_unfilled = 0;

        // default filter value
        if (!empty($selIntExt)) {
            $defIntExt = $selIntExt;
        } else {
            $defIntExt = '';
        }

        if (empty($selDept)) {
            $curUsrDept = '';
            if($disDept == '1') {
                $data['cur_usr_dept'] = $this->mdl->getCurUserDept();
                $curUsrDept = $data['cur_usr_dept']->SM_DEPT_CODE;
            }
        } else {
            $curUsrDept = $selDept; 
        }

        if (empty($selMonth)) {
            $defMonth = '';
        }   else {
            $defMonth = $selMonth;
        }

        if (empty($selYear)) {
            $curYear = '';
            if($disYear == '1') {
                $data['cur_year'] = $this->mdl->getCurYear();
                $curYear = $data['cur_year']->CUR_YEAR;
            }
            
        } else {
            $curYear = $selYear;
        }

        if (empty($selSts)) {
            $defTrSts = '';
            if($disTsts == '1') {
                $defTrSts = '1';
            }
        } else {
            $defTrSts = $selSts;
        }

        // get available records
        $data['tr_list'] = $this->mdl->getTrainingList($defIntExt, $curUsrDept, $defMonth, $curYear, $defTrSts, $evaluation, $screRpt);
        foreach($data['tr_list'] as $trCount) {
            $total_rpt++;
            if(!empty($trCount)) {
                $trCountRefid = $trCount->TH_REF_ID;
                $checkSubmittedReport = $this->mdl->getSubmittedReport($trCountRefid);

                if(!empty($checkSubmittedReport)) {
                    $total_filled++;
                } else {
                    $total_unfilled++;
                }
            }
        }
        $data['summary'] = nl2br('Total amount of secretariat report: <b>'.$total_rpt."</b>\r\n"."\r\n".
                                    '<font color="green">Total amount of filled Secretariat Report: <b>'.$total_filled."</font></b>\r\n".
                                    '<font color="red">Total amount of unfiilled Secretariat Report: <b>'.$total_unfilled.'</font></b>');

        $this->render($data);
    }

    // REPORT MANUAL ENTRY FORM
    public function reportManualEntryForm()
    {  
        $refid = $this->input->post('refid', true);
        $tName = $this->input->post('tname', true);

        if(!empty($refid)) {
            $data['refid'] = $refid; 
            $data['tName'] = $tName; 

            // PARTICIPANT ATTENDANCE
            $data['cr_date_from'] = $this->mdl->getTrainingDateFrom($refid);
            if(!empty($data['cr_date_from'])) {
                $date_from = $data['cr_date_from']->TH_DATE_FROM;
                if($date_from < '2016') {
                    $data['total_number_attend'] = $this->mdl->getTotalAttend1($refid);
                    $data['total_attend'] = $data['total_number_attend']->TOTAL_ATTEND;
                } else {
                    $data['total_number_attend'] = $this->mdl->getTotalAttend2($refid);
                    $data['total_attend'] = $data['total_number_attend']->TOTAL_ATTEND;
                }
            }
            $data['attend_par'] = $this->mdl->getAttendParticipant($refid);
            if(!empty($data['attend_par'])) {
                $data['attended'] = $data['attend_par']->ATTENDED;
            } else {
                $data['attended'] = '0';
            }
            
            // REPORT FORM DETL
            $data['reportForm'] = $this->mdl->getSubmittedReport($refid);
            if(!empty($data['reportForm'])) {
                // Participant
                $data['discipline'] = $data['reportForm']->TSR_PARTICIPANT_DISCIPLINE;
                $data['participant_time'] = $data['reportForm']->TSR_PARTICIPANT_TIME;
                $data['participant_remark'] = $data['reportForm']->TSR_PARTICIPANT_REMARK;

                // Food / Drink
                $data['cafe_name'] = $data['reportForm']->TSR_CAFE_NAME;
                $data['food_drink_time'] = $data['reportForm']->TSR_CAFE_TIME;
                $data['food_drink_quality'] = $data['reportForm']->TSR_CAFE_QUALITY;
                $data['cafe_remark'] = $data['reportForm']->TSR_CAFE_REMARK;

                // Training Room
                $data['chair'] = $data['reportForm']->TSR_ROOM_CHAIR;
                $data['aircond'] = $data['reportForm']->TSR_ROOM_AIRCOND;
                $data['table'] = $data['reportForm']->TSR_ROOM_DESK;
                $data['lamps'] = $data['reportForm']->TSR_ROOM_LAMP;
                $data['training_room_remark'] = $data['reportForm']->TSR_ROOM_REMARK;

                // Electronic Equipment
                $data['laptop_desktop'] = $data['reportForm']->TSR_EQUIPMENT_COMPUTER;
                $data['lcd_pointer'] = $data['reportForm']->TSR_EQUIPMENT_LCD;
                $data['laser_pointer'] = $data['reportForm']->TSR_EQUIPMENT_LASERPOINTER;
                $data['pa_system'] = $data['reportForm']->TSR_EQUIPMENT_PASYSTEM;
                $data['equipment_remark'] = $data['reportForm']->TSR_EQUIPMENT_REMARK;

                // Overall report / Improvements Suggestion
                $data['overall_remark'] = $data['reportForm']->TSR_OVERALL_REPORT;
            } else {
                // Participant
                $data['discipline'] = '';
                $data['participant_time'] = '';
                $data['participant_remark'] = '';

                // Food / Drink
                $data['cafe_name'] = '';
                $data['food_drink_time'] = '';
                $data['food_drink_quality'] = '';
                $data['cafe_remark'] = '';

                // Training Room
                $data['chair'] = '';
                $data['aircond'] = '';
                $data['table'] = '';
                $data['lamps'] = '';
                $data['training_room_remark'] = '';

                // Electronic Equipment
                $data['laptop_desktop'] = '';
                $data['lcd_pointer'] = '';
                $data['laser_pointer'] = '';
                $data['pa_system'] = '';
                $data['equipment_remark'] = '';

                // Overall report / Improvements Suggestion
                $data['overall_remark'] = '';
            }

            // SECRETARIAT ON DUTY
            $data['screDuty'] = $this->mdl->getScreOnDuty($refid);
        }

        $this->render($data);
    }

    // SAVE SECRET REPORT FORM    
    public function saveSecretReport()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'discipline' => 'max_length[20]', 
            'participant_time' => 'max_length[20]',
            'participant_remark' => 'max_length[2000]',

            'cafe_name' => 'max_length[200]',
            'food_drink_time' => 'max_length[20]',
            'food_drink_quality' => 'max_length[20]',
            'cafe_remark' => 'max_length[2000]',

            'chair' => 'max_length[20]',
            'aircond' => 'max_length[20]',
            'table' => 'max_length[20]',
            'lamps' => 'max_length[20]',
            'training_room_remark' => 'max_length[2000]',

            'laptop_desktop' => 'max_length[20]',
            'lcd_pointer' => 'max_length[20]',
            'laser_pointer' => 'max_length[20]',
            'pa_system' => 'max_length[20]',
            'equipment_remark' => 'max_length[2000]',

            'overall_remark' => 'max_length[2000]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check TRAINING_SECRETARIAT_REPORT
            $check = $this->mdl->getSubmittedReport($refid);

            if(empty($check)) {
                // insert
                $insert = $this->mdl->insertSecretReport($form, $refid);

                if($insert > 0) {
                    //$sp_row = $this->SpRow($refid, $spID);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                // update
                $update = $this->mdl->updateSecretReport($form, $refid);

                if($update > 0) {
                    $json = array('sts' => 2, 'msg' => 'Record has been updated', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to update record', 'alert' => 'danger');
                }
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // ADD SECRET FORM MODAL
    public function addSecretDuty()
    { 
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['staff_list'] = $this->dropdown($this->mdl->getStaffListDD(), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        }

        $this->render($data);
    }

    // GET STAFF DEPT    
    public function getStaffDept(){
        $this->isAjax();
        
        $staff_id = $this->input->post('staff_id', true);
        
        if(!empty($staff_id)) {
            $staffDept = $this->mdl->getStaffDept($staff_id);
        } else {
            $staffDept = '';
        }
               
        if (!empty($staffDept)) {
            $dept = $staffDept->SM_DEPT_CODE;
            $success = 1;
        } else {
            $dept = '';
            $success = 0;
        }
        
        $json = array('sts' => $success, 'dept' => $dept);
        
        echo json_encode($json);
    }

    // SAVE SECRET DUTY
    public function saveSecretDuty()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // STAFF ID
        $secretariat_id = $form['secretariat_id'];

        // form / input validation
        $rule = array(
            'secretariat_id' => 'required|max_length[10]', 
            'date' => 'max_length[11]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check TRAINING_SECRETARIAT_REPORT
            $check = $this->mdl->checkSecretDuty($refid, $secretariat_id);

            if(empty($check)) {
                // insert
                $insert = $this->mdl->insertSecretDuty($form, $refid);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE SECRETARIAT INCHARGE
    public function deleteScrIncharge() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $seq = $this->input->post('seq', true);
        $scrId = $this->input->post('scrId', true);
        
        if (!empty($refid) && !empty($seq) && !empty($scrId)) {
        	$del = $this->mdl->deleteScrIncharge($refid, $seq, $scrId);
            
        	if ($del > 0) {
          		$json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
        	} else {
          		$json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
        	}
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    /*===========================================================
       Training Application Report - ATF081
    =============================================================*/
    
    // REPORT I
    public function tarReport()
    { 
        // clear filter for report
        $this->session->set_userdata('repCodei','');
        $this->session->set_userdata('year_ai','');
        $this->session->set_userdata('department_ai','');
        $this->session->set_userdata('choice_ai','');
        $this->session->set_userdata('fr_month_ai','');
        $this->session->set_userdata('fr_year_ai','');
        $this->session->set_userdata('to_month_ai','');
        $this->session->set_userdata('to_year_ai','');
        $this->session->set_userdata('year_bi','');
        $this->session->set_userdata('courseRefid','');
        
        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptListAppRpt(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' --Please select-- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    // REPORT II
    public function tarReportii()
    { 
        // clear filter for report
        $this->session->set_userdata('repCodeii','');
        $this->session->set_userdata('year_aii','');
        $this->session->set_userdata('organizer_ii','');
        $this->session->set_userdata('rep_for_ii','');
        $this->session->set_userdata('fr_month_aii','');
        $this->session->set_userdata('fr_year_aii','');
        $this->session->set_userdata('to_month_aii','');
        $this->session->set_userdata('to_year_aii','');
        $this->session->set_userdata('org_codeii','');
        $this->session->set_userdata('sector_ii','');
        $this->session->set_userdata('coor_ii','');

        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get sector list
        $data['org_list_ii'] = $this->dropdown($this->mdl->getOrganizer(), 'TOH_ORG_CODE', 'TOH_CODE_DESC', ' ---Please select--- ');
        //get sector list
        $data['sec_list_ii'] = $this->dropdown($this->mdl->getSector(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');
        //get coordinator list
        $data['corr_list_ii'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');

        $this->render($data);
    }

    // REPORT III
    public function tarReportiii()
    { 
        // clear filter for report
        $this->session->set_userdata('repCodeiii','');
        $this->session->set_userdata('year_aiii','');
        $this->session->set_userdata('department_aiii','');
        $this->session->set_userdata('course_titleiii','');
        $this->session->set_userdata('staff_idiii','');
        $this->session->set_userdata('date_course_fromiii','');
        $this->session->set_userdata('department_biii','');

        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptListAppRpt(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get coordinator list
        $data['staff_list'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');

        $this->render($data);
    }

    // REPORT IV
    public function tarReportiv()
    { 
        // clear filter for report
        $this->session->set_userdata('repCodeiv','');
        $this->session->set_userdata('induction_courseiv','');
        $this->session->set_userdata('induction_test_sts','');
        $this->session->set_userdata('pnp_course_sts','');
        $this->session->set_userdata('year_avi','');

        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');

        $this->render($data);
    }

    // REPORT V
    public function tarReportv()
    { 
        $this->session->set_userdata('repCodev','');
        $this->session->set_userdata('year_av','');
        $this->session->set_userdata('month_from_av','');
        $this->session->set_userdata('month_to_av','');
        $this->session->set_userdata('department_v','');
        $this->session->set_userdata('quarter_v','');
        $this->session->set_userdata('quarter_month_av','');
        $this->session->set_userdata('quarter_month_bv','');
        $this->session->set_userdata('quarter_month_cv','');

        // default year
        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptListAppRpt(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    // REPORT VI
    public function tarReportvi()
    { 
        // clear filter for report
        $this->session->set_userdata('repCodevi','');
        $this->session->set_userdata('month_vi','');
        $this->session->set_userdata('year_vi','');
        $this->session->set_userdata('month_to_av','');
        $this->session->set_userdata('aca_nonaca','');
        $this->session->set_userdata('orga_vi','');
        $this->session->set_userdata('re_formatvi','');
        $this->session->set_userdata('staff_id_vi','');

        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptListAppRpt(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get staff list
        $data['staff_list'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');

        $this->render($data);
    }

    // REPORT VII
    public function tarReportvii()
    { 
        // clear filter for report
        $this->session->set_userdata('repCodevi','');
        $this->session->set_userdata('month_vi','');
        $this->session->set_userdata('year_vi','');
        $this->session->set_userdata('month_to_av','');
        $this->session->set_userdata('aca_nonaca','');
        $this->session->set_userdata('orga_vi','');
        $this->session->set_userdata('re_formatvi','');
        $this->session->set_userdata('staff_id_vi','');

        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptListAppRpt(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get staff list
        $data['staff_list'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');

        $this->render($data);
    }

    // REPORT PARAM I
    public function setParami() {
		// clear filter for report
        $this->session->set_userdata('repCodei','');
        $this->session->set_userdata('year_ai','');
        $this->session->set_userdata('department_ai','');
        $this->session->set_userdata('choice_ai','');
        $this->session->set_userdata('fr_month_ai','');
        $this->session->set_userdata('fr_year_ai','');
        $this->session->set_userdata('to_month_ai','');
        $this->session->set_userdata('to_year_ai','');
        $this->session->set_userdata('year_bi','');
        $this->session->set_userdata('courseRefid','');
        $this->session->set_userdata('rep_format_bi','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$year_ai = $this->input->post('year_ai');
    	$department_ai = $this->input->post('department_ai');
        $choice_ai = $this->input->post('choice_ai');
        $fr_month_ai = $this->input->post('fr_month_ai');
    	$fr_year_ai = $this->input->post('fr_year_ai');
    	$to_month_ai = $this->input->post('to_month_ai');
        $to_year_ai = $this->input->post('to_year_ai');
        $year_bi = $this->input->post('year_bi');
        $courseRefid = $this->input->post('courseRefid');
        $rep_format_bi = $this->input->post('rep_format_bi');

		// set session value
        $this->session->set_userdata('repCodei', $repCode);
        $this->session->set_userdata('year_ai', $year_ai);
        $this->session->set_userdata('department_ai', $department_ai);
        $this->session->set_userdata('choice_ai', $choice_ai);
        $this->session->set_userdata('fr_month_ai', $fr_month_ai);
        $this->session->set_userdata('fr_year_ai', $fr_year_ai);
        $this->session->set_userdata('to_month_ai', $to_month_ai);
        $this->session->set_userdata('to_year_ai', $to_year_ai);
        $this->session->set_userdata('year_bi', $year_bi);
        $this->session->set_userdata('courseRefid', $courseRefid);
        $this->session->set_userdata('rep_format_bi', $rep_format_bi);
    }

    // GENERATE REPORT I
    public function genReporti() {
        $repCode = $this->session->userdata('repCodei');

    	$year_ai = $this->session->userdata('year_ai');
    	$department_ai = $this->session->userdata('department_ai');
        $choice_ai = $this->session->userdata('choice_ai');

        $fr_month_ai = $this->session->userdata('fr_month_ai');
        $fr_year_ai = $this->session->userdata('fr_year_ai');
        $to_month_ai = $this->session->userdata('to_month_ai');
        $to_year_ai = $this->session->userdata('to_year_ai');
        $mm_from = $fr_month_ai.'/'.$fr_year_ai;
        $mm_to = $to_month_ai.'/'.$to_year_ai;

        $year_bi = $this->session->userdata('year_bi');
        $courseRefid = $this->session->userdata('courseRefid');
        $rep_format_bi = $this->session->userdata('rep_format_bi');

	    if($repCode == 'ATR057') {
            $param = array('PARAMFORM' => 'NO', 'DM_DEPT_CODE' => $department_ai, 'YEAR_YEAR' => $year_ai);
            $this->lib->report($repCode, $param);
        } 
        elseif($repCode == 'ATR058LIST') {
            if($choice_ai == 'A') {
                $newRepCode = 'ATR058';
            } elseif($choice_ai == 'Y') {
                $newRepCode = 'ATR058B';
            } else {
                $newRepCode = 'ATR058C';
            }

            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai);
            $this->lib->report($newRepCode, $param);
        } 
        elseif($repCode == 'ATR059') {
            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai);
            $this->lib->report($repCode, $param);
        } 
        elseif($repCode == 'ATR060') {
            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR085') {
            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR086') {
            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR065') {
            $param = array('PARAMFORM' => 'NO', 'MONTH_FROM' => $mm_from, 'MONTH_TO' => $mm_to);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR072') {
            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR061') {
            
            if($rep_format_bi == 'EXCEL') {
                $repCode = 'ATR061';
            } else {
                $repCode = 'ATR061';
            }

            $param = array('PARAMFORM' => 'NO', 'REF_ID' => $courseRefid, 'YEAR_YEAR' => $year_bi);
            $this->lib->report($repCode, $param, $rep_format_bi);
        }
        elseif($repCode == 'ATR062') {
            
            if($rep_format_bi == 'EXCEL') {
                $repCode = 'ATR062';
            } else {
                $repCode = 'ATR062';
            }

            $param = array('PARAMFORM' => 'NO', 'REF_ID' => $courseRefid, 'YEAR_YEAR' => $year_bi);
            $this->lib->report($repCode, $param, $rep_format_bi);
        }
        elseif($repCode == 'ATR063') {
            
            if($rep_format_bi == 'EXCEL') {
                $repCode = 'ATR063';
            } else {
                $repCode = 'ATR063';
            }

            $param = array('PARAMFORM' => 'NO', 'REF_ID' => $courseRefid, 'YEAR_YEAR' => $year_bi);
            $this->lib->report($repCode, $param, $rep_format_bi);
        }
        elseif($repCode == 'ATR064') {
            
            if($rep_format_bi == 'EXCEL') {
                $repCode = 'ATR064';
            } else {
                $repCode = 'ATR064';
            }

            $param = array('PARAMFORM' => 'NO', 'REF_ID' => $courseRefid, 'YEAR_YEAR' => $year_bi);
            $this->lib->report($repCode, $param, $rep_format_bi);
        }
        /*
        elseif($repCode == 'ATR061') {
            $param = array('PARAMFORM' => 'NO', 'REF_ID' => $courseRefid, 'YEAR_YEAR' => $year_bi);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR062') {
            $param = array('PARAMFORM' => 'NO', 'REF_ID' => $courseRefid, 'YEAR_YEAR' => $year_bi);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR063') {
            $param = array('PARAMFORM' => 'NO', 'REF_ID' => $courseRefid, 'YEAR_YEAR' => $year_bi);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR064') {
            $param = array('PARAMFORM' => 'NO', 'REF_ID' => $courseRefid, 'YEAR_YEAR' => $year_bi);
            $this->lib->report($repCode, $param);
        }*/
    }
    
    // SELECT TABLE MODAL COURSE TITLE
    public function courseTitlei()
    {
        $year = $this->input->post('year_bi');

        $data['cr_title'] = $this->mdl->courseTitlei($year);

        $this->renderAjax($data);
    }

    // REPORT PARAM II
    public function setParamii() {
		// clear filter for report
        $this->session->set_userdata('repCodeii','');
        $this->session->set_userdata('year_aii','');
        $this->session->set_userdata('organizer_ii','');
        $this->session->set_userdata('rep_for_ii','');
        $this->session->set_userdata('fr_month_aii','');
        $this->session->set_userdata('fr_year_aii','');
        $this->session->set_userdata('to_month_aii','');
        $this->session->set_userdata('to_year_aii','');
        $this->session->set_userdata('org_codeii','');
        $this->session->set_userdata('sector_ii','');
        $this->session->set_userdata('coor_ii','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$year_aii = $this->input->post('year_aii');
    	$organizer_ii = $this->input->post('organizer_ii');
        $rep_for_ii = $this->input->post('rep_for_ii');
        $fr_month_aii = $this->input->post('fr_month_aii');
    	$fr_year_aii = $this->input->post('fr_year_aii');
    	$to_month_aii = $this->input->post('to_month_aii');
        $to_year_aii = $this->input->post('to_year_aii');
        $org_codeii = $this->input->post('org_codeii');
        $sector_ii = $this->input->post('sector_ii');
        $coor_ii = $this->input->post('coor_ii');

		// set session value
        $this->session->set_userdata('repCodeii', $repCode);
        $this->session->set_userdata('year_aii', $year_aii);
        $this->session->set_userdata('organizer_ii', $organizer_ii);
        $this->session->set_userdata('rep_for_ii', $rep_for_ii);
        $this->session->set_userdata('fr_month_aii', $fr_month_aii);
        $this->session->set_userdata('fr_year_aii', $fr_year_aii);
        $this->session->set_userdata('to_month_aii', $to_month_aii);
        $this->session->set_userdata('to_year_aii', $to_year_aii);
        $this->session->set_userdata('org_codeii', $org_codeii);
        $this->session->set_userdata('sector_ii', $sector_ii);
        $this->session->set_userdata('coor_ii', $coor_ii);
    }

    // GENERATE REPORT II
    public function genReportii() {
        $repCode = $this->session->userdata('repCodeii');

        $year_aii = $this->session->userdata('year_aii');
        $organizer_ii = $this->session->userdata('organizer_ii');
        $rep_for_ii = $this->session->userdata('rep_for_ii');

        $fr_month_aii = $this->session->userdata('fr_month_aii');
        $fr_year_aii = $this->session->userdata('fr_year_aii');
        $to_month_aii = $this->session->userdata('to_month_aii');
        $to_year_aii = $this->session->userdata('to_year_aii');
        $org_codeii = $this->session->userdata('org_codeii');
        $sector_ii = $this->session->userdata('sector_ii');
        $coor_ii = $this->session->userdata('coor_ii');
        
        $mm_from = $fr_month_aii.'/'.$fr_year_aii;
        $mm_to = $to_month_aii.'/'.$to_year_aii;
        

	    if($repCode == 'ATR047') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii);
            $this->lib->report($repCode, $param, $rep_for_ii);
        } 
        elseif($repCode == 'ATR047X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        elseif($repCode == 'ATR087') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii);
            $this->lib->report($repCode, $param, $rep_for_ii);
        } 
        elseif($repCode == 'ATR108') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii);
            $this->lib->report($repCode, $param, $rep_for_ii);
        }
        elseif($repCode == 'ATR109') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii);
            $this->lib->report($repCode, $param, $rep_for_ii);
        }
        elseif($repCode == 'ATR113') {
            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_aii);
            $this->lib->report($repCode, $param, $rep_for_ii);
        }
        elseif($repCode == 'ATR123') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii, 'TRAINING_MONTH' => $mm_from, 'TRAINING_MONTH2' => $mm_to, 'P_PTJ' => $org_codeii, 'SECTOR' => $sector_ii, 'COORDINATOR' => $coor_ii);
            $this->lib->report($repCode, $param, $rep_for_ii);
        }
        elseif($repCode == 'ATR123X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii, 'TRAINING_MONTH' => $mm_from, 'TRAINING_MONTH2' => $mm_to, 'P_PTJ' => $org_codeii, 'SECTOR' => $sector_ii, 'COORDINATOR' => $coor_ii);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
    }

    // COURSE TITLE - REPORT III
    public function courseTitleiii(){
        $this->isAjax();
        
        $year = $this->input->post('year', true);
        
        // get available records
        $courseList = $this->mdl->courseTitleiii($year);
               
        if (!empty($courseList)) {
            $success = 1;
        } else {
            $success = 0;
            $courseList = '';
        }
        
        $json = array('sts' => $success, 'courseList' => $courseList);
        
        echo json_encode($json);
    }

    // REPORT PARAM III
    public function setParamiii() {
		// clear filter for report
        $this->session->set_userdata('repCodeiii','');
        $this->session->set_userdata('year_aiii','');
        $this->session->set_userdata('department_aiii','');
        $this->session->set_userdata('course_titleiii','');
        $this->session->set_userdata('staff_idiii','');
        $this->session->set_userdata('date_course_fromiii','');
        $this->session->set_userdata('department_biii','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$year_aiii = $this->input->post('year_aiii');
    	$department_aiii = $this->input->post('department_aiii');
        $course_titleiii = $this->input->post('course_titleiii');
        $staff_idiii = $this->input->post('staff_idiii');
    	$date_course_fromiii = $this->input->post('date_course_fromiii');
    	$department_biii = $this->input->post('department_biii');

		// set session value
        $this->session->set_userdata('repCodeiii', $repCode);
        $this->session->set_userdata('year_aiii', $year_aiii);
        $this->session->set_userdata('department_aiii', $department_aiii);
        $this->session->set_userdata('course_titleiii', $course_titleiii);
        $this->session->set_userdata('staff_idiii', $staff_idiii);
        $this->session->set_userdata('date_course_fromiii', $date_course_fromiii);
        $this->session->set_userdata('department_biii', $department_biii);
    }

    // GENERATE REPORT III
    public function genReportiii() {
        $repCode = $this->session->userdata('repCodeiii');

        $year_aiii = $this->session->userdata('year_aiii');

        $department_aiii = $this->session->userdata('department_aiii');
        $course_titleiii = $this->session->userdata('course_titleiii');
        $staff_idiii = $this->session->userdata('staff_idiii');
        
        $date_course_fromiii = $this->session->userdata('date_course_fromiii');

        $department_biii = $this->session->userdata('department_biii');
        
	    if($repCode == 'ATR110') {
            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR6' => $year_aiii, 'P_PTJ' => $department_aiii, 'P_KURSUS' => $course_titleiii, 'P_STAF' => $staff_idiii);
            $this->lib->report($repCode, $param);
        } 
        elseif($repCode == 'ATR111') {
            $param = array('PARAMFORM' => 'NO', 'YEAR_YEAR6' => $year_aiii, 'P_PTJ' => $department_aiii, 'P_KURSUS' => $course_titleiii, 'P_STAF' => $staff_idiii);
            $this->lib->report($repCode, $param);
        } 
        elseif($repCode == 'ATR147') {
            $param = array('PARAMFORM' => 'NO', 'P_TH_DATE_FROM' => $date_course_fromiii);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR141') {
            $param = array('PARAMFORM' => 'NO');
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR144') {
            $param = array('PARAMFORM' => 'NO');
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR142') {
            $param = array('PARAMFORM' => 'NO', 'DEPARTMENT' => $department_biii);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR143') {
            $param = array('PARAMFORM' => 'NO', 'DEPARTMENT' => $department_biii);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR145') {
            $param = array('PARAMFORM' => 'NO', 'DEPARTMENT' => $department_biii);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR146') {
            $param = array('PARAMFORM' => 'NO', 'DEPARTMENT' => $department_biii);
            $this->lib->report($repCode, $param);
        }
    }

    // REPORT PARAM VI
    public function setParamiv() {
		// clear filter for report
        $this->session->set_userdata('repCodeiv','');
        $this->session->set_userdata('induction_courseiv','');
        $this->session->set_userdata('induction_test_sts','');
        $this->session->set_userdata('pnp_course_sts','');
        $this->session->set_userdata('year_avi','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$induction_courseiv = $this->input->post('induction_courseiv');
    	$induction_test_sts = $this->input->post('induction_test_sts');
        $pnp_course_sts = $this->input->post('pnp_course_sts');
        $year_avi = $this->input->post('year_avi');

		// set session value
        $this->session->set_userdata('repCodeiv', $repCode);
        $this->session->set_userdata('induction_courseiv', $induction_courseiv);
        $this->session->set_userdata('induction_test_sts', $induction_test_sts);
        $this->session->set_userdata('pnp_course_sts', $pnp_course_sts);
        $this->session->set_userdata('year_avi', $year_avi);
    }

    // GENERATE REPORT VI
    public function genReportiv() {
        $repCode = $this->session->userdata('repCodeiv');

        $induction_courseiv = $this->session->userdata('induction_courseiv');

        $induction_test_sts = $this->session->userdata('induction_test_sts');
        $pnp_course_sts = $this->session->userdata('pnp_course_sts');

        $year_avi = $this->session->userdata('year_avi');
        
		if($repCode == 'ATRCOURSEINDUCTION') {
            if($induction_courseiv == 'LULUS') {
                $newRepCode = 'ATR126';
            } elseif($induction_courseiv == 'GAGAL') {
                $newRepCode = 'ATR088';
            } elseif($induction_courseiv == 'PENGECUALIAN') {
                $newRepCode = 'ATR127';
            } else {
                $newRepCode = 'ATR124';
            }

            $param = array('PARAMFORM' => 'NO', 'STATUS' => $induction_courseiv);
            $this->lib->report($newRepCode, $param);
        } 
        elseif($repCode == 'ATRTESTINDUCTION') {
            if(!empty($induction_test_sts) && !empty($pnp_course_sts)) {
                $newRepCode = 'ATR125';
            } elseif(empty($induction_test_sts) && empty($pnp_course_sts)) {
                $newRepCode = 'ATR119';
            } 

            $param = array('PARAMFORM' => 'NO', 'STATUS' => $induction_test_sts, 'STATUS2' => $pnp_course_sts);
            $this->lib->report($newRepCode, $param);
        } 
        elseif($repCode == 'ATR206') {
            $param = array('PARAMFORM' => 'NO', 'P_YEAR' => $year_avi);
            $this->lib->report($repCode, $param);
        }
    }

    // REPORT PARAM V
    public function setParamv() {
		// clear filter for report
        $this->session->set_userdata('repCodev','');
        $this->session->set_userdata('year_av','');
        $this->session->set_userdata('month_from_av','');
        $this->session->set_userdata('month_to_av','');
        $this->session->set_userdata('department_v','');
        $this->session->set_userdata('quarter_v','');
        $this->session->set_userdata('quarter_month_av','');
        $this->session->set_userdata('quarter_month_bv','');
        $this->session->set_userdata('quarter_month_cv','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$year_av = $this->input->post('year_av');
    	$month_from_av = $this->input->post('month_from_av');
        $month_to_av = $this->input->post('month_to_av');
        $department_v = $this->input->post('department_v');
        $quarter_v = $this->input->post('quarter_v');
        $quarter_month_av = $this->input->post('quarter_month_av');
        $quarter_month_bv = $this->input->post('quarter_month_bv');
        $quarter_month_cv = $this->input->post('quarter_month_cv');

		// set session value
        $this->session->set_userdata('repCodev', $repCode);
        $this->session->set_userdata('year_av', $year_av);
        $this->session->set_userdata('month_from_av', $month_from_av);
        $this->session->set_userdata('month_to_av', $month_to_av);
        $this->session->set_userdata('department_v', $department_v);
        $this->session->set_userdata('quarter_v', $quarter_v);
        $this->session->set_userdata('quarter_month_av', $quarter_month_av);
        $this->session->set_userdata('quarter_month_bv', $quarter_month_bv);
        $this->session->set_userdata('quarter_month_cv', $quarter_month_cv);
    }

    // GENERATE REPORT V
    public function genReportv() {
        $repCode = $this->session->userdata('repCodev');
        $year_av = $this->session->userdata('year_av');
        $month_from_av = $this->session->userdata('month_from_av');
        $month_to_av = $this->session->userdata('month_to_av');
        $department_v = $this->session->userdata('department_v');
        $quarter_v = $this->session->userdata('quarter_v');
        $quarter_month_av = $this->session->userdata('quarter_month_av');
        $quarter_month_bv = $this->session->userdata('quarter_month_bv');
        $quarter_month_cv = $this->session->userdata('quarter_month_cv');
        
		if($repCode == 'ATR220') {

            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av);
            $this->lib->report($repCode, $param);
        } 
        elseif($repCode == 'ATR220X') {

            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        elseif($repCode == 'ATR221') {

            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR221X') {

            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param, 'EXCEL');
        }  
        elseif($repCode == 'ATR222') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR222X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        elseif($repCode == 'ATR223') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR223X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        elseif($repCode == 'ATR224') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR224X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        elseif($repCode == 'ATR225') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR225X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        elseif($repCode == 'ATR226') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR226X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        elseif($repCode == 'ATR227') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'DEPARTMENT' => $department_v);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR227X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'DEPARTMENT' => $department_v);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR228') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'SUKU_TAHUN' => $quarter_v, 'SUKU_BULAN1' => $quarter_month_av, 'SUKU_BULAN2' => $quarter_month_bv, 'SUKU_BULAN3' => $quarter_month_cv);
            $this->lib->report($repCode, $param);
        }
        elseif($repCode == 'ATR228X') {
            $param = array('PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'SUKU_TAHUN' => $quarter_v, 'SUKU_BULAN1' => $quarter_month_av, 'SUKU_BULAN2' => $quarter_month_bv, 'SUKU_BULAN3' => $quarter_month_cv);
            $this->lib->report($repCode, $param);
        }
    }

    // REPORT PARAM VI
    public function setParamvi() {
		// clear filter for report
        $this->session->set_userdata('repCodevi','');
        $this->session->set_userdata('month_vi','');
        $this->session->set_userdata('year_vi','');
        $this->session->set_userdata('month_to_av','');
        $this->session->set_userdata('aca_nonaca','');
        $this->session->set_userdata('orga_vi','');
        $this->session->set_userdata('re_formatvi','');
        $this->session->set_userdata('staff_id_vi','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$month_vi = $this->input->post('month_vi');
    	$year_vi = $this->input->post('year_vi');
        $aca_nonaca = $this->input->post('aca_nonaca');
        $orga_vi = $this->input->post('orga_vi');
        $re_formatvi = $this->input->post('re_formatvi');
        $staff_id_vi = $this->input->post('staff_id_vi');

		// set session value
        $this->session->set_userdata('repCodevi', $repCode);
        $this->session->set_userdata('month_vi', $month_vi);
        $this->session->set_userdata('year_vi', $year_vi);
        $this->session->set_userdata('aca_nonaca', $aca_nonaca);
        $this->session->set_userdata('orga_vi', $orga_vi);
        $this->session->set_userdata('re_formatvi', $re_formatvi);
        $this->session->set_userdata('staff_id_vi', $staff_id_vi);
    }

    // GENERATE REPORT VI
    public function genReportvi() {
        $repCode = $this->session->userdata('repCodevi');
        $month_vi = $this->session->userdata('month_vi');
        $year_vi = $this->session->userdata('year_vi');
        $aca_nonaca = $this->session->userdata('aca_nonaca');
        $orga_vi = $this->session->userdata('orga_vi');
        $re_formatvi = $this->session->userdata('re_formatvi');
        $staff_id_vi = $this->session->userdata('staff_id_vi');
        
        if($repCode == 'ATR242') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR242X';
            } else {
                $repCode = 'ATR242';
            }

            $param = array('PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi);
        }
        elseif($repCode == 'ATR243') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR243X';
            } else {
                $repCode = 'ATR243';
            }

            $param = array('PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi);
        }
        elseif($repCode == 'ATR244') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR244X';
            } else {
                $repCode = 'ATR244';
            }

            $param = array('PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi);
        }
        elseif($repCode == 'ATR245') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR245X';
            } else {
                $repCode = 'ATR245';
            }

            $param = array('PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi);
        }
        elseif($repCode == 'ATR246') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR246X';
            } else {
                $repCode = 'ATR246';
            }

            $param = array('PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi);
        }
        elseif($repCode == 'ATR247') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR247X';
            } else {
                $repCode = 'ATR247';
            }

            $param = array('PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi);
        }
        elseif($repCode == 'ATR248') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR248X';
            } else {
                $repCode = 'ATR248';
            }

            $param = array('PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi);
        }
        elseif($repCode == 'ATR267') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR267X';
            } else {
                $repCode = 'ATR267';
            }

            $param = array('PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi);
        }
        elseif($repCode == 'ATR268') {
            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR268X';
            } else {
                $repCode = 'ATR268';
            }

            $param = array('PARAMFORM' => 'NO', 'P_STH_STAFF_ID' => $staff_id_vi);
        }

        $this->lib->report($repCode, $param, $re_formatvi);
    }

    // UNIT LIST - REPORT VII
    public function getUnitVii(){
        $this->isAjax();
        
        $deptCode = $this->input->post('deptCode', true);
        
        // get available records
        $unitList = $this->mdl->getUnitVii($deptCode);
               
        if (!empty($unitList)) {
            $success = 1;
        } else {
            $success = 0;
            $unitList = '';
        }
        
        $json = array('sts' => $success, 'unit_list' => $unitList);
        
        echo json_encode($json);
    }

    // REPORT PARAM VII
    public function setParamvii() {
		// clear filter for report
        $this->session->set_userdata('repCodeVii','');
        $this->session->set_userdata('staffID', '');
        $this->session->set_userdata('department', '');
        $this->session->set_userdata('unit', '');
        $this->session->set_userdata('statusavii', '');
        $this->session->set_userdata('year', '');
        $this->session->set_userdata('courseTitle', '');
        $this->session->set_userdata('dateFrom', '');
        $this->session->set_userdata('statusbvii', '');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$staffID = $this->input->post('staffID');
    	$department = $this->input->post('department');
        $unit = $this->input->post('unit');
        $statusavii = $this->input->post('statusavii');
        $year = $this->input->post('year');
        $courseTitle = $this->input->post('courseTitle');
        $dateFrom = $this->input->post('dateFrom');
        $statusbvii = $this->input->post('statusbvii');

		// set session value
        $this->session->set_userdata('repCodeVii', $repCode);
        $this->session->set_userdata('staffID', $staffID);
        $this->session->set_userdata('department', $department);
        $this->session->set_userdata('unit', $unit);
        $this->session->set_userdata('statusavii', $statusavii);
        $this->session->set_userdata('year', $year);
        $this->session->set_userdata('courseTitle', $courseTitle);
        $this->session->set_userdata('dateFrom', $dateFrom);
        $this->session->set_userdata('statusbvii', $statusbvii);
    }

    // GENERATE REPORT VII
    public function genReportvii() {
        $repCode = $this->session->userdata('repCodeVii');
        $staffID = $this->session->userdata('staffID');
        $department = $this->session->userdata('department');
        $unit = $this->session->userdata('unit');
        $statusavii = $this->session->userdata('statusavii');
        $year = $this->session->userdata('year');
        $courseTitle = $this->session->userdata('courseTitle');
        $dateFrom = $this->session->userdata('dateFrom');
        $statusbvii = $this->session->userdata('statusbvii');
        
        $desformat = 'PDF';

		if($repCode == 'ATR044') {
            $param = array('PARAMFORM' => 'NO', 'P_STH_STAFF_ID' => $staffID);
        }
        elseif($repCode == 'ATR045') {
            $param = array('PARAMFORM' => 'NO', 'P_SM_DEPT_CODE' => $department, 'P_SM_UNIT' => $unit, 'P_STH_STATUS' => $statusavii);
        }
        elseif($repCode == 'ATR037') {
            $param = array('PARAMFORM' => 'NO', 'P_YEAR' => $year, 'P_TH_REF_ID' => $courseTitle, 'P_TH_DATE_FROM' => $dateFrom, 'P_STH_STATUS' => $statusbvii);
        } 
        elseif($repCode == 'ATR038') {
            $param = array('PARAMFORM' => 'NO', 'DESFORMAT' => $desformat, 'P_YEAR' => $year, 'P_TH_REF_ID' => $courseTitle, 'P_TH_DATE_FROM' => $dateFrom, 'P_STH_STATUS' => $statusbvii);
        }
        elseif($repCode == 'ATR080') {
            $param = array('PARAMFORM' => 'NO', 'DESFORMAT' => $desformat, 'P_YEAR' => $year, 'P_TH_REF_ID' => $courseTitle, 'P_TH_DATE_FROM' => $dateFrom, 'P_STH_STATUS' => $statusbvii);
        }
        elseif($repCode == 'ATR249') {
            $param = array('PARAMFORM' => 'NO', 'DESFORMAT' => $desformat, 'P_YEAR' => $year, 'P_TH_REF_ID' => $courseTitle, 'P_TH_DATE_FROM' => $dateFrom, 'P_STH_STATUS' => $statusbvii);
        }

        $this->lib->report($repCode, $param, 'PDF');
    }
    
    //start update @17/02/2020
    //--------------------------------------------------------------------------
    
    // REPORT VIII
    public function tarReportviii()
    { 
        // clear filter for report
        $this->session->set_userdata('repCodevi','');
        $this->session->set_userdata('month_vi','');
        $this->session->set_userdata('year_vi','');
        $this->session->set_userdata('month_to_av','');
        $this->session->set_userdata('aca_nonaca','');
        $this->session->set_userdata('orga_vi','');
        $this->session->set_userdata('re_formatvi','');
        $this->session->set_userdata('staff_id_vi','');

        $data['cur_year'] = $this->mdl->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptListAppRpt(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get staff list
        $data['staff_list'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');

        $this->render($data);
    }
    
    public function ATF081DepartmentSearchResult(){
		
	// get available records
	$data['dept_list'] = $this->mdl->getDeptListAppRpt();
		
        $this->renderAjax($data);
    }//ATF081DepartmentSearchResult()
    
    public function ATF081DepartmentSearchResult2(){
		
	// get available records
	$data['dept_list'] = $this->mdl->getDeptListAppRpt();
		
        $this->renderAjax($data);
    }//ATF081DepartmentSearchResult2()
    
    public function ATF081DepartmentSearchResult3(){
		
	// get available records
	$data['dept_list'] = $this->mdl->getDeptListAppRpt();
		
        $this->renderAjax($data);
    }//ATF081DepartmentSearchResult3()
    
    public function ATF081TrainingSearchResult(){
	
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        
	// get available records
	$data['training_list'] = $this->mdl->getTerasTrainingList($year,$month);
		
        $this->renderAjax($data);
    }//ATF081TrainingSearchResult()
    
    public function ATF081TrainingSearchResult2(){
        
	// get available records
	$data['training_list'] = $this->mdl->getTerasList();
		
        $this->renderAjax($data);
    }//ATF081TrainingSearchResult2()
    
    public function getDeptName(){
	$this->isAjax();
		
	// get parameter value
        $sid = $this->input->post('sid',true);
		
	// get available records
       // $postName = $this->mdl->getARF003RecruitmentPostInfo($sid);
	$deptName = $this->mdl->getQueryDetailInfo("DEPARTMENT_MAIN","DM_DEPT_DESC","DM_DEPT_CODE",$sid);
		       
        if (!empty($deptName)) {
            $success = 1;
        } else {
            $success = 0;
        }
		
	$json = array('sts' => $success, 'deptName' => $deptName);
		
	echo json_encode($json);
    } // getDeptName()
    
    public function getTrainingName(){
	$this->isAjax();
		
	// get parameter value
        $sid = $this->input->post('sid',true);
		
	// get available records
       // $postName = $this->mdl->getARF003RecruitmentPostInfo($sid);
	$trainingName = $this->mdl->getQueryDetailInfo("TRAINING_HEAD","TH_TRAINING_TITLE","TH_REF_ID",$sid);
		       
        if (!empty($trainingName)) {
            $success = 1;
        } else {
            $success = 0;
        }
		
	$json = array('sts' => $success, 'trainingName' => $trainingName);
		
	echo json_encode($json);
    } // getTrainingName()
    
    public function getTrainingName2(){
	$this->isAjax();
		
	// get parameter value
        $sid = $this->input->post('sid',true);
		
	// get available records
	$trainingName = $this->mdl->getQueryDetailInfo("TNA_TRAINING_HEAD","TTH_TRAINING_TITLE","TTH_REF_ID",$sid);
		       
        if (!empty($trainingName)) {
            $success = 1;
        } else {
            $success = 0;
        }
		
	$json = array('sts' => $success, 'trainingName' => $trainingName);
		
	echo json_encode($json);
    } // getTrainingName2()
    
    public function getOrganizerName(){
	$this->isAjax();
		
	// get parameter value
        $sid = $this->input->post('sid',true);
		
	// get available records
       // $postName = $this->mdl->getARF003RecruitmentPostInfo($sid);
	$orgName = $this->mdl->getQueryDetailInfo("TRAINING_ORGANIZER_HEAD","TOH_ORG_DESC","TOH_ORG_CODE",$sid);
		       
        if (!empty($orgName)) {
            $success = 1;
        } else {
            $success = 0;
        }
		
	$json = array('sts' => $success, 'orgName' => $orgName);
		
	echo json_encode($json);
    } // getOrganizerName()
    
    public function getStaffName(){
	$this->isAjax();
		
	// get parameter value
        $sid = $this->input->post('sid',true);
		
	// get available records
       // $postName = $this->mdl->getARF003RecruitmentPostInfo($sid);
	$staffName = $this->mdl->getQueryDetailInfo("STAFF_MAIN","SM_STAFF_NAME","SM_STAFF_ID",$sid);
		       
        if (!empty($staffName)) {
            $success = 1;
        } else {
            $success = 0;
        }
		
	$json = array('sts' => $success, 'staffName' => $staffName);
		
	echo json_encode($json);
    } // getStaffName()
    
    // REPORT PARAM VIII
    public function setParamviii() {
	// clear filter for report
        $this->session->set_userdata('repCodev','');
        $this->session->set_userdata('trainingID','');
        $this->session->set_userdata('trainingID2','');
        $this->session->set_userdata('year','');
        $this->session->set_userdata('month','');
        $this->session->set_userdata('department_v','');
        $this->session->set_userdata('department_v2','');
        $this->session->set_userdata('department_v3','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
    	$trainingID = $this->input->post('trainingID');
        $trainingID2 = $this->input->post('trainingID2');
    	$year = $this->input->post('year');
        $month = $this->input->post('month');
        $department_v = $this->input->post('department_v');
        $department_v2 = $this->input->post('department_v2');
        $department_v3 = $this->input->post('department_v3');

	// set session value
        $this->session->set_userdata('repCodev', $repCode);
        $this->session->set_userdata('department_v', $department_v);
        $this->session->set_userdata('department_v2', $department_v2);
        $this->session->set_userdata('department_v3', $department_v3);
        $this->session->set_userdata('trainingID', $trainingID);
        $this->session->set_userdata('trainingID2', $trainingID2);
        $this->session->set_userdata('year', $year);
        $this->session->set_userdata('month', $month);
        
    }//setParamviii

    // GENERATE REPORT VIII
    public function genReportviii() {
        $repCode = $this->session->userdata('repCodev');
        $trainingID = $this->session->userdata('trainingID');
        $trainingID2 = $this->session->userdata('trainingID2');
        $year = $this->session->userdata('year');
        $month = $this->session->userdata('month');
        $department_v = $this->session->userdata('department_v');
        $department_v2 = $this->session->userdata('department_v2');
        $department_v3 = $this->session->userdata('department_v3');
        
	    if($repCode == 'ATR287') {

            $param = array('PARAMFORM' => 'NO', 'DEPT' => $department_v);
            $this->lib->report($repCode, $param);
        } 
        
        elseif($repCode == 'ATR287X') {

            $param = array('PARAMFORM' => 'NO', 'DEPT' => $department_v);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        
        
        elseif($repCode == 'ATR288') {

            $param = array('PARAMFORM' => 'NO', 'DEPT' => $department_v);
            $this->lib->report($repCode, $param);
        }
        
        elseif($repCode == 'ATR288X') {

            $param = array('PARAMFORM' => 'NO', 'DEPT' => $department_v);
            $this->lib->report($repCode, $param, 'EXCEL');
            
        } elseif($repCode == 'ATR289') {

            $param = array('PARAMFORM' => 'NO', 'DEPT' => $department_v2, 'TRAINING_ID' => $trainingID, 'TRAINING_MONTH' => $month, 'TRAINING_YEAR' => $year);
            $this->lib->report($repCode, $param);
            
        } elseif($repCode == 'ATR289X') {

            $param = array('PARAMFORM' => 'NO', 'DEPT' => $department_v2, 'TRAINING_ID' => $trainingID, 'TRAINING_MONTH' => $month, 'TRAINING_YEAR' => $year);
            $this->lib->report($repCode, $param, 'EXCEL');
            
        } elseif($repCode == 'ATR290') {

            $param = array('PARAMFORM' => 'NO', 'DEPT' => $department_v3, 'STRUCTUREDID' => $trainingID2);
            $this->lib->report($repCode, $param);
            
        } elseif($repCode == 'ATR290X') {

            $param = array('PARAMFORM' => 'NO', 'DEPT' => $department_v3, 'STRUCTUREDID' => $trainingID2);
            $this->lib->report($repCode, $param, 'EXCEL');
        }
        
        
    }//genReportviii
    
    //TAB 1 : REPORTS (tarReport.php)
    //------------------------------
    public function ATF081Tab1DepartmentSearchResult(){
		
	// get available records
	$data['dept_list'] = $this->mdl->getDeptListAppRpt();
		
        $this->renderAjax($data);
    }//ATF081Tab1DepartmentSearchResult()
    
    //TAB 2 : REPORTS (II) (tarReportii.php)
    //--------------------------------------
    public function ATF081Tab2OrganizerSearchResult(){
		
	// get available records
	$data['organizer_list'] = $this->mdl->getOrganizer();
		
        $this->renderAjax($data);
    }//ATF081Tab2OrganizerSearchResult()
    
    public function ATF081Tab2StaffSearchResult(){
		
	// get available records
	$data['coordinator_list'] = $this->mdl->getCoordinator();
		
        $this->renderAjax($data);
    }//ATF081Tab2StaffSearchResult()
    
    //TAB 3 : REPORTS (III) (tarReportiii.php)
    //---------------------------------------
    public function ATF081Tab3DepartmentSearchResult(){
		
	// get available records
	$data['dept_list'] = $this->mdl->getDeptListAppRpt();
		
        $this->renderAjax($data);
    }//ATF081Tab3DepartmentSearchResult()
    
    public function ATF081Tab3TrainingSearchResult(){
	
        $year = $this->input->post('year');
        
	// get available records
	$data['training_list'] = $this->mdl->courseTitleiii($year);
		
        $this->renderAjax($data);
    }//ATF081Tab3TrainingSearchResult()
    
    public function ATF081Tab3StaffSearchResult(){
		
	// get available records
	$data['staff_list'] = $this->mdl->getCoordinator();
		
        $this->renderAjax($data);
    }//ATF081Tab3StaffSearchResult()
    
    public function ATF081Tab3BDepartmentSearchResult(){
		
	// get available records
	$data['dept_list'] = $this->mdl->getDeptListAppRpt();
		
        $this->renderAjax($data);
    }//ATF081Tab3BDepartmentSearchResult()
    
    //TAB 5 : REPORTS (V) (tarReportv.php)
    //---------------------------------------
    public function ATF081Tab5DepartmentSearchResult(){
		
	// get available records
	$data['dept_list'] = $this->mdl->getDeptListAppRpt();
		
        $this->renderAjax($data);
    }//ATF081Tab5DepartmentSearchResult()
    
    //TAB 6 : REPORTS (VI) (tarReportvi.php)
    //---------------------------------------
    public function ATF081Tab6StaffSearchResult(){
		
	// get available records
	$data['staff_list'] = $this->mdl->getCoordinator();
		
        $this->renderAjax($data);
    }//ATF081Tab6StaffSearchResult()
    
    //TAB 7 : REPORTS (VII) (tarReportvii.php)
    //---------------------------------------
    public function ATF081Tab7StaffSearchResult(){
		
	// get available records
	$data['staff_list'] = $this->mdl->getCoordinator();
		
        $this->renderAjax($data);
    }//ATF081Tab7StaffSearchResult()
    
    public function ATF081Tab7TrainingSearchResult(){
	
        $year = $this->input->post('year');
        
	// get available records
	$data['training_list'] = $this->mdl->courseTitleiii($year);
		
        $this->renderAjax($data);
    }//ATF081Tab7TrainingSearchResult()
    
    public function ATF166TrainingSearchResult(){
	
        $year = $this->input->post('year');
        
	// get available records
	$data['training_list'] = $this->mdl->courseListRptTe($year);
		
        $this->renderAjax($data);
    }//ATF166TrainingSearchResult()
    
    public function ATF166Training2SearchResult(){
	
        //$year = $this->input->post('year');
        
	// get available records
	$data['training_list'] = $this->mdl->getCourseListEff();
		
        $this->renderAjax($data);
    }//ATF166Training2SearchResult()
    
    //end update @17/02/2020 -----------------------------------------------------------
    

    // evaluation report jasper update
    // SET REPORT PARAM
    public function setRepParam() 
    {
		$this->isAjax();
		
		$repCode = $this->input->post('repCode', true);
		$param = '';
		
		if ($repCode == 'ATR276') {
			$refid = $this->input->post('refid', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'REFID' => $refid));
        } elseif ($repCode == 'STAFF_EVA_REP') {
            $refid = $this->input->post('refid', true);
            $staff_id = $this->input->post('staffID', true);
            $repFormat = 'PDF';

            $trDetl = $this->mdl->getTrainingDateFrom($refid);
            $hrParm = $this->mdl->getStartDate($refid);

            if($trDetl->TH_DATE_FROM >= $hrParm->HP_PARM_DESC) {
                $repCode = 'ATR275';
            } elseif($trDetl->TH_DATE_FROM < $hrParm->HP_PARM_DESC) {
                $repCode = 'ATR131';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO','REFID'=>$refid,'STAFFID'=>$staff_id));
        } elseif($repCode == 'ATR079' || $repCode == 'ATR084') {
            $year_i = $this->input->post('year_i');
            $department = $this->input->post('department');
            $staffID = $this->input->post('staffID');
            $corTitle2 = $this->input->post('corTitle2');
            $courseDate = $this->input->post('courseDate');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO', 'P_YEAR' => $year_i, 'P_DEPT_CODE' => $department, 'P_STAFF_ID' => $staffID, 'P_REF_ID' => $corTitle2, 'P_TRAINING_DATE' => $courseDate));
        } elseif($repCode == 'ATR132') {
            $sMonth = $this->input->post('sMonth');
            $sYear = $this->input->post('sYear');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO', 'YEAR' => $sYear, 'MONTH2' => $sMonth));
        } elseif ($repCode == 'ATR133') {
            $refid = $this->input->post('corTitle', true);
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO','REFID'=>$refid));
        } elseif ($repCode == 'ATRPDF' || $repCode == 'ATRXLS') {
            $corTitle = $this->input->post('corTitle', true);

            $getTrDate = $this->mdl->getTrainingDateFrom($corTitle);
            $trDateFrom = $getTrDate->TH_DATE_FROM;

            $getStartDate = $this->mdl->getStartDate();
            $evaStartDate = $getStartDate->HP_PARM_DESC;

            if($trDateFrom >= $evaStartDate && $repCode == 'ATRPDF') {
                $repCode = 'ATR277';
                $repFormat = 'PDF';
            } elseif($trDateFrom < $evaStartDate && $repCode == 'ATRPDF') {
                $repCode = 'ATR185';
                $repFormat = 'PDF';
            } elseif($trDateFrom >= $evaStartDate && $repCode == 'ATRXLS') {
                $repCode = 'ATR277X';
                $repFormat = 'excel';
            } elseif($trDateFrom < $evaStartDate && $repCode == 'ATRXLS') {
                $repCode = 'ATR185X';
                $repFormat = 'excel';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO','REFID'=>$corTitle)); 
        }


        /*elseif($repCode == 'ATRPDF' || $repCode == 'ATRXLS') {
            $getTrDate = $this->mdl->getTrainingDateFrom($corTitle);
            $trDateFrom = $getTrDate->TH_DATE_FROM;

            $getStartDate = $this->mdl->getStartDate();
            $evaStartDate = $getStartDate->HP_PARM_DESC;

            if($trDateFrom >= $evaStartDate && $repCode == 'ATRPDF') {
                $rpCode = 'ATR277';
            } elseif($trDateFrom < $evaStartDate && $repCode == 'ATRPDF') {
                $rpCode = 'ATR185';
            } elseif($trDateFrom >= $evaStartDate && $repCode == 'ATRXLS') {
                $rpCode = 'ATR277X';
            } elseif($trDateFrom < $evaStartDate && $repCode == 'ATRXLS') {
                $rpCode = 'ATR185';
            }

            if($repCode == 'ATRPDF') {
                $param = array('PARAMFORM' => 'NO', 'REFID' => $corTitle);
                $this->lib->report($rpCode, $param, $format='pdf');
            } elseif($repCode == 'ATRXLS') {
                $param = array('PARAMFORM' => 'NO', 'REFID' => $corTitle);
                $this->lib->report($rpCode, $param, $format='EXCEL');
            }
        }*/
		
		$json = array('report' => $param);
		
		echo json_encode($json);		
    }
    
    // GENERATE REPORT (JASPER)
    public function report() 
    {
        // Load jasperreport library
        $this->load->library('jasperreport');
		
		// get report parameters
		$param = $this->encryption->decrypt_array($this->input->get('r'));
		
		// get report code
        $repCode = isset($param['REPORT'])?strtoupper($param['REPORT']):'';
        
		$format = isset($param['FORMAT'])?strtolower($param['FORMAT']):'';
        
		// for report format = excel / word, report will be downloaded as attachment
		if ($format == 'excel') {
			$format = 'xlsx';
			$this->jasperreport->setAttachment();
		} elseif ($format == 'word') {
			$format = 'docx';
			$this->jasperreport->setAttachment();
		}
		
		$this->jasperreport->runReport("/Reports/MyHRIS/HRA_AT/" . $repCode,$format,$param);
    }
    
    // QUERY TRAINING FROM STRUCTURED TRAINING
    public function ATF008Q(){
    
        $paramList = $this->input->get('parm');
	$parm = $this->encryption->decrypt_array($paramList);
            
            if (!empty($parm['rID'])) {
		$refID = $parm['rID'];
            } else {
		$refID = $this->input->post('rID', true);
            }
        
        if(!empty($refID)) {

            $data['ref_id'] = $refID;
            $data['trInfo'] = $this->mdl->getTrainingInfoDetail($refID);
           
        $trainingBasicInfo = $this->mdl->getTrainingInfoDetail($refID);
            $type = ($trainingBasicInfo) ? $trainingBasicInfo->TH_TYPE : '';
            $area = ($trainingBasicInfo) ? $trainingBasicInfo->TH_FIELD : '';
            $level = ($trainingBasicInfo) ? $trainingBasicInfo->TH_LEVEL : '';
            $service_group = ($trainingBasicInfo) ? $trainingBasicInfo->TH_SERVICE_GROUP : '';
            $country = ($trainingBasicInfo) ? $trainingBasicInfo->TH_TRAINING_COUNTRY : '';
            $state = ($trainingBasicInfo) ? $trainingBasicInfo->TH_TRAINING_STATE : '';
            $offer = ($trainingBasicInfo) ? $trainingBasicInfo->TH_OFFER : '';
            $open = ($trainingBasicInfo) ? $trainingBasicInfo->TH_OPEN : '';
            $organize_level = ($trainingBasicInfo) ? $trainingBasicInfo->TH_ORGANIZER_LEVEL : '';
            $organize_name = ($trainingBasicInfo) ? $trainingBasicInfo->TH_ORGANIZER_NAME : '';
            $organize_country = ($trainingBasicInfo) ? $trainingBasicInfo->TH_ORGANIZER_COUNTRY : '';
            $organize_state = ($trainingBasicInfo) ? $trainingBasicInfo->TH_ORGANIZER_STATE : '';
            $eva_compulsory = ($trainingBasicInfo) ? $trainingBasicInfo->TH_EVALUATION_COMPULSORY : '';
            $print = ($trainingBasicInfo) ? $trainingBasicInfo->TH_PRINT_CERTIFICATE : '';
            
            $data['type'] = $this->mdl->getQueryDetailInfo("TRAINING_TYPE","TT_DESC","TT_CODE",$type);
            $data['area'] = $this->mdl->getQueryDetailInfo("TRAINING_FIELD","TF_FIELD_DESC","TF_CODE",$area);
            $data['level'] = $this->mdl->getQueryDetailInfo("TRAINING_LEVEL","TL_DESC","TL_CODE",$level);
            $data['service_group'] = $this->mdl->getQueryDetailInfo("SERVICE_GROUP","SG_GROUP_DESC","SG_GROUP_CODE",$service_group);
            $data['country'] = $this->mdl->getQueryDetailInfo("COUNTRY_MAIN","CM_COUNTRY_DESC","CM_COUNTRY_CODE",$country);
            $data['state'] = $this->mdl->getQueryDetailInfo("STATE_MAIN","SM_STATE_DESC","SM_STATE_CODE",$state);
            $data['organize_level'] = $this->mdl->getQueryDetailInfo("TRAINING_ORGANIZER_LEVEL","TOL_DESC","TOL_CODE",$organize_level);
            $data['organize_name'] = $this->mdl->getQueryDetailInfo("TRAINING_ORGANIZER_HEAD","TOH_ORG_DESC","TOH_ORG_CODE",$organize_name);
            $data['organize_add'] = $this->mdl->getQueryDetailInfo("TRAINING_ORGANIZER_HEAD","TOH_ADDRESS","TOH_ORG_CODE",$organize_name);
            $data['organize_postcode'] = $this->mdl->getQueryDetailInfo("TRAINING_ORGANIZER_HEAD","TOH_POSTCODE","TOH_ORG_CODE",$organize_name);
            $data['organize_city'] = $this->mdl->getQueryDetailInfo("TRAINING_ORGANIZER_HEAD","TOH_CITY","TOH_ORG_CODE",$organize_name);
            $data['organize_country'] = $this->mdl->getQueryDetailInfo("COUNTRY_MAIN","CM_COUNTRY_DESC","CM_COUNTRY_CODE",$organize_country);
            $data['organize_state'] = $this->mdl->getQueryDetailInfo("STATE_MAIN","SM_STATE_DESC","SM_STATE_CODE",$organize_state);
            
            //$offer
            if ($offer == 'Y'){
                $data['offer'] = 'Yes';                
            }
            elseif ($offer == 'N'){
                $data['offer'] = 'No';
            }
            else{
                $data['offer'] = '';
            }
            //--------------------------
            
            //$open
            if ($open == 'Y'){
                $data['open'] = 'Yes';                
            }
            elseif ($open == 'N'){
                $data['open'] = 'No';
            }
            else{
                $data['open'] = '';
            }
            //---------------------------
            
            //evalation compulsary
            if ($eva_compulsory == 'Y'){
                $data['evaluation_com'] = 'Yes';                
            }
            elseif ($eva_compulsory == 'N'){
                $data['evaluation_com'] = 'No';
            }
            else{
                $data['evaluation_com'] = '';
            }
            //--------------------------
            
            //print certificate
            if ($print == 'Y'){
                $data['print_cer'] = 'Yes';                
            }
            elseif ($print == 'N'){
                $data['print_cer'] = 'No';
            }
            else{
                $data['print_cer'] = '';
            }
            //--------------------------
        
            // cordinator info
            $data['trInfoDetl'] = $this->mdl->getTrHeadDetl($refID);
            if (!empty($data['trInfoDetl'])) {
                $data['coordinator'] = $data['trInfoDetl']->THD_COORDINATOR;
                $data['coor_sector'] = $data['trInfoDetl']->THD_COORDINATOR_SECTOR;
                $data['coor_p_no'] = $data['trInfoDetl']->THD_COORDINATOR_TELNO;
                //$data['evaluation'] = $data['trInfoDetl']->THD_EVALUATION;
            } else {
                $data['coordinator'] = '-';
                $data['coor_sector'] = '-';
                $data['coor_p_no'] = '-';
                //$data['evaluation'] = '-';
            }
              
            $trainingCoorInfo = $this->mdl->getTrHeadDetl($refID);

            $evaluation = ($trainingCoorInfo) ? $trainingCoorInfo->THD_EVALUATION : '';
            $coor = $data['coordinator'];
            $sector = $data['coor_sector'];
            
           $data['coor'] = $this->mdl->getQueryDetailInfo("STAFF_MAIN","SM_STAFF_NAME","SM_STAFF_ID",$coor);
           $data['sector'] = $this->mdl->getQueryDetailInfo("TRAINING_SECTOR_LEVEL","TSL_DESC","TSL_CODE",$sector);
           //--------------------------------------
            
            // evaluation
            if ($evaluation == 'Y'){
                $data['evaluation'] = 'Yes';                
            }
            elseif ($evaluation == 'N'){
                $data['evaluation'] = 'No';
            }
            else{
                $data['evaluation'] = '';
            }
            //--------------------------
        
        //organize info
        if(!empty($data['trInfo']->TH_ORGANIZER_NAME)) {
            $data['trOrg'] = $this->mdl->getOrganizerName_Query($organize_name);
                if(!empty($data['trOrg'])) {
                    $data['OrgAdd'] = $data['trOrg']->TOH_ADDRESS;
                    $data['OrgPost'] = $data['trOrg']->TOH_POSTCODE;
                    $data['OrgCity'] = $data['trOrg']->TOH_CITY;
                    $data['OrgState'] = $data['trOrg']->SM_STATE_DESC;
                    $data['OrgCountry'] = $data['trOrg']->CM_COUNTRY_DESC;
                }
                else {
                    $data['OrgAdd'] = '';
                    $data['OrgPost'] = '';
                    $data['OrgCity'] = '';
                    $data['OrgState'] = '';
                    $data['OrgCountry'] = '';     
                } 
        } else {
                $data['OrgAdd'] = '';
                $data['OrgPost'] = '';
                $data['OrgCity'] = '';
                $data['OrgState'] = '';
                $data['OrgCountry'] = '';
        }
        //---------------------------
          
        // speaker info
        $data['speakerInfoExternal'] = $this->mdl->getSpeakerInfoExternal($refID);
        $data['speakerInfoStaff'] = $this->mdl->getSpeakerInfoStaff($refID);
        //--------------
        
        // fasilitator info
        $data['facilitatorInfoExternal'] = $this->mdl->getFacilitatorInfoExternal($refID);
        $data['facilitatorInfoStaff'] = $this->mdl->getFacilitatorInfoStaff($refID);
        //-------------------
        
        // training cost info
        $data['trCost'] = $this->mdl->getTrainingCost($refID);
        //-----------------------
        
        // target group info
        $data['targetGroup'] = $this->mdl->getTargetGroup($refID);
        //--------------------
        
        // module setup info
        $data['moduleSetup'] = $this->mdl->getmoduleSetup($refID);
        //------------------
        
        // CPD Setup Info
        $data['cpdSetup'] = $this->mdl->getCpdSetup($refID);
            if (!empty($data['cpdSetup']->CH_CATEGORY)){
                $data['cpdSetupCat'] = $this->mdl->getCpdSetupCategory($data['cpdSetup']->CH_CATEGORY);
                $data['cpdSetupCatDesc'] = $data['cpdSetupCat']->CH_CC_CATEGORY_DESC;
            } else {
                $data['cpdSetupCatDesc'] = '';
            }
        //---------------
            
        }
    		$this->render($data);
    }//ATF008Q
    
    // LIST OF ELIGIBLE POSITION 
    public function ATF008QListposition(){

        $groupCode = $this->input->post('gpCode', true);
        $schemeCode = $this->input->post('schemeCode', true);
        $gradeTo = $this->input->post('gradeTo', true);
        $svcGrp = $this->input->post('svcGrp', true);
        $aca = $this->input->post('aca', true);

        if(!empty($aca)) {
            if($aca == 'NO'){
                $aca = 'N';
            } elseif($aca == 'YES') {
                $aca = 'Y';
            }
        } else {
            $aca = '';
        }

        // get available records
        if(!empty($groupCode)){
            $data['gp_code'] = $groupCode;
            $data['schemeCode'] = $schemeCode;
            $data['gradeTo'] = $gradeTo;
            $data['svcGrp'] = $svcGrp;
            $data['aca'] = $aca;

            $data['list_eg_pos'] = $this->mdl->getListEgPosition($groupCode);
        }

        $this->render($data);
    }//ATF008QListposition()

    // REPORT PARAM
    public function setReportParamTrainAppl()
    {
        $this->isAjax();
		
		$repCode = $this->input->post('repCode', true);
		$param = '';
		
		if ($repCode == 'ATR250') {
			$refid = $this->input->post('refid', true);
            $sendDate = $this->input->post('sendDate', true);
            $refNo = $this->input->post('refNo', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_REFID' => $refid, 'TARIKH_SEND' => $sendDate, 'RUJUKAN' => $refNo));
        } elseif ($repCode == 'ATR057') {
			$year_ai = $this->input->post('year_ai');
    	    $department_ai = $this->input->post('department_ai');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DM_DEPT_CODE' => $department_ai, 'YEAR_YEAR' => $year_ai));
        } elseif ($repCode == 'ATR058LIST') {
            $choice_ai = $this->input->post('choice_ai');
			$year_ai = $this->input->post('year_ai');
            $repFormat = 'PDF';
            
            if($choice_ai == 'A') {
                $newRepCode = 'ATR058';
            } elseif($choice_ai == 'Y') {
                $newRepCode = 'ATR058B';
            } else {
                $newRepCode = 'ATR058C';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$newRepCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai));
        } elseif ($repCode == 'ATR059') {
			$year_ai = $this->input->post('year_ai');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai));
        } elseif ($repCode == 'ATR060') {
			$year_ai = $this->input->post('year_ai');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai));
        } elseif ($repCode == 'ATR085') {
			$year_ai = $this->input->post('year_ai');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai));
        } elseif ($repCode == 'ATR086') {
			$year_ai = $this->input->post('year_ai');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai));
        } elseif ($repCode == 'ATR065') {
            $year_ai = $this->input->post('year_ai');
            $fr_month_ai = $this->input->post('fr_month_ai');
            $fr_year_ai = $this->input->post('fr_year_ai');
            $to_month_ai = $this->input->post('to_month_ai');
            $to_year_ai = $this->input->post('to_year_ai');
            $mm_from = $fr_month_ai.'/'.$fr_year_ai;
            $mm_to = $to_month_ai.'/'.$to_year_ai;
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'MONTH_FROM' => $mm_from, 'MONTH_TO' => $mm_to));
        } elseif ($repCode == 'ATR072') {
			$year_ai = $this->input->post('year_ai');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_ai));
        } elseif ($repCode == 'ATR061') {
            $year_bi = $this->input->post('year_bi');
            $courseRefid = $this->input->post('courseRefid');
            $rep_format_bi = $this->input->post('rep_format_bi');

            if ($rep_format_bi == 'PDF'){
                $repFormat = 'PDF';
            } elseif ($rep_format_bi == 'EXCEL'){
                $repFormat = 'EXCEL';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'REFID' => $courseRefid, 'YEAR_YEAR' => $year_bi));
        } elseif ($repCode == 'ATR062') {
            $year_bi = $this->input->post('year_bi');
            $courseRefid = $this->input->post('courseRefid');
            $rep_format_bi = $this->input->post('rep_format_bi');

            if ($rep_format_bi == 'PDF'){
                $repFormat = 'PDF';
            } elseif ($rep_format_bi == 'EXCEL'){
                $repFormat = 'EXCEL';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'REFID' => $courseRefid, 'YEAR_YEAR' => $year_bi));
        } elseif ($repCode == 'ATR063') {
            $year_bi = $this->input->post('year_bi');
            $courseRefid = $this->input->post('courseRefid');
            $rep_format_bi = $this->input->post('rep_format_bi');

            if ($rep_format_bi == 'PDF'){
                $repFormat = 'PDF';
            } elseif ($rep_format_bi == 'EXCEL'){
                $repFormat = 'EXCEL';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'REFID' => $courseRefid, 'YEAR_YEAR' => $year_bi));
        } elseif ($repCode == 'ATR064') {
            $year_bi = $this->input->post('year_bi');
            $courseRefid = $this->input->post('courseRefid');
            $rep_format_bi = $this->input->post('rep_format_bi');

            if ($rep_format_bi == 'PDF'){
                $repFormat = 'PDF';
            } elseif ($rep_format_bi == 'EXCEL'){
                $repFormat = 'EXCEL';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'REFID' => $courseRefid, 'YEAR_YEAR' => $year_bi));
        } elseif ($repCode == 'ATR047') {
            $year_aii = $this->input->post('year_aii');
            $organizer_ii = $this->input->post('organizer_ii');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii));
        } elseif ($repCode == 'ATR047X') {
            $year_aii = $this->input->post('year_aii');
            $organizer_ii = $this->input->post('organizer_ii');
            $repFormat = 'EXCEL';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii));
        } elseif ($repCode == 'ATR087') {
            $year_aii = $this->input->post('year_aii');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii));
        } elseif ($repCode == 'ATR108') {
            $year_aii = $this->input->post('year_aii');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii));
        } elseif ($repCode == 'ATR109') {
            $year_aii = $this->input->post('year_aii');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii));
        } elseif ($repCode == 'ATR113') {
            $year_aii = $this->input->post('year_aii');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR' => $year_aii));
        } elseif ($repCode == 'ATR123') {
            $year_aii = $this->input->post('year_aii');
            $organizer_ii = $this->input->post('organizer_ii');
            $org_codeii = $this->input->post('org_codeii');
            $sector_ii = $this->input->post('sector_ii');
            $coor_ii = $this->input->post('coor_ii');

            $fr_month_aii = $this->input->post('fr_month_aii');
            $fr_year_aii = $this->input->post('fr_year_aii');
            $to_month_aii = $this->input->post('to_month_aii');
            $to_year_aii = $this->input->post('to_year_aii');
        
            $mm_from = $fr_month_aii.'/'.$fr_year_aii;
            $mm_to = $to_month_aii.'/'.$to_year_aii;

            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii, 'TRAINING_MONTH' => $mm_from, 'TRAINING_MONTH2' => $mm_to, 'P_PTJ' => $org_codeii, 'SECTOR' => $sector_ii, 'COORDINATOR' => $coor_ii));
        } elseif ($repCode == 'ATR123X') {
            $year_aii = $this->input->post('year_aii');
            $organizer_ii = $this->input->post('organizer_ii');
            $org_codeii = $this->input->post('org_codeii');
            $sector_ii = $this->input->post('sector_ii');
            $coor_ii = $this->input->post('coor_ii');

            $fr_month_aii = $this->input->post('fr_month_aii');
            $fr_year_aii = $this->input->post('fr_year_aii');
            $to_month_aii = $this->input->post('to_month_aii');
            $to_year_aii = $this->input->post('to_year_aii');
        
            $mm_from = $fr_month_aii.'/'.$fr_year_aii;
            $mm_to = $to_month_aii.'/'.$to_year_aii;

            $repFormat = 'EXCEL';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_aii, 'P_OPTION' => $organizer_ii, 'TRAINING_MONTH' => $mm_from, 'TRAINING_MONTH2' => $mm_to, 'P_PTJ' => $org_codeii, 'SECTOR' => $sector_ii, 'COORDINATOR' => $coor_ii));
        } elseif ($repCode == 'ATR110') {
            $year_aiii = $this->input->post('year_aiii');
            $department_aiii =$this->input->post('department_aiii');
            $course_titleiii = $this->input->post('course_titleiii');
            $staff_idiii =$this->input->post('staff_idiii');

            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR6' => $year_aiii, 'P_PTJ' => $department_aiii, 'P_KURSUS' => $course_titleiii, 'P_STAF' => $staff_idiii));
        } elseif ($repCode == 'ATR111') {
            $year_aiii = $this->input->post('year_aiii');
            $department_aiii =$this->input->post('department_aiii');
            $course_titleiii = $this->input->post('course_titleiii');
            $staff_idiii =$this->input->post('staff_idiii');

            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'YEAR_YEAR6' => $year_aiii, 'P_PTJ' => $department_aiii, 'P_KURSUS' => $course_titleiii, 'P_STAF' => $staff_idiii));
        } elseif ($repCode == 'ATR147') {
            $date_course_fromiii = $this->input->post('date_course_fromiii');

            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'P_TH_DATE_FROM' => $date_course_fromiii));
        } elseif ($repCode == 'ATR141') {
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO'));
        } elseif ($repCode == 'ATR144') {
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO'));
        } elseif ($repCode == 'ATR142') {
            $department_biii = $this->input->post('department_biii');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DEPARTMENT' => $department_biii));
        } elseif ($repCode == 'ATR143') {
            $department_biii = $this->input->post('department_biii');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DEPARTMENT' => $department_biii));
        } elseif ($repCode == 'ATR145') {
            $department_biii = $this->input->post('department_biii');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DEPARTMENT' => $department_biii));
        } elseif ($repCode == 'ATR146') {
            $department_biii = $this->input->post('department_biii');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DEPARTMENT' => $department_biii));
        } elseif ($repCode == 'ATRCOURSEINDUCTION') {
            $induction_courseiv = $this->input->post('induction_courseiv');
            $repFormat = 'PDF';

            if($induction_courseiv == 'LULUS') {
                $newRepCode = 'ATR126';
            } elseif($induction_courseiv == 'GAGAL') {
                $newRepCode = 'ATR088';
            } elseif($induction_courseiv == 'PENGECUALIAN') {
                $newRepCode = 'ATR127';
            } else {
                $newRepCode = 'ATR124';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$newRepCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'STATUS' => $induction_courseiv));
        } elseif ($repCode == 'ATRTESTINDUCTION') {
            $induction_test_sts = $this->input->post('induction_test_sts');
            $pnp_course_sts = $this->input->post('pnp_course_sts');
            $repFormat = 'PDF';
            
            if(!empty($induction_test_sts) && !empty($pnp_course_sts)) {
                $newRepCode = 'ATR125';
            } elseif(empty($induction_test_sts) && empty($pnp_course_sts)) {
                $newRepCode = 'ATR119';
            }

            // var_dump($pnp_course_sts);
            // exit;

            $param = $this->encryption->encrypt_array(array('REPORT'=>$newRepCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'STATUS' => $induction_test_sts, 'STATUS2' => $pnp_course_sts));
        } elseif ($repCode == 'ATR206') {
            $year_avi = $this->input->post('year_avi');
            $repFormat = 'PDF';

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO','P_YEAR' => $year_avi));
        } elseif ($repCode == 'ATR220'||$repCode == 'ATR220X') {
            $year_av = $this->input->post('year_av');

            if($repCode == 'ATR220X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av));
        } elseif ($repCode == 'ATR221'||$repCode == 'ATR221X') {
            $year_av = $this->input->post('year_av');
            $month_from_av = $this->input->post('month_from_av');
            $month_to_av = $this->input->post('month_to_av');

            if($repCode == 'ATR221X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av, 'TRAINING_MONTH2' => $month_to_av));
        } elseif ($repCode == 'ATR222'||$repCode == 'ATR222X') {
            $year_av = $this->input->post('year_av');
            $month_from_av = $this->input->post('month_from_av');

            if($repCode == 'ATR222X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av));
        } elseif ($repCode == 'ATR223'||$repCode == 'ATR223X') {
            $year_av = $this->input->post('year_av');
            $month_from_av = $this->input->post('month_from_av');

            if($repCode == 'ATR223X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av));
        } elseif ($repCode == 'ATR224'||$repCode == 'ATR224X') {
            $year_av = $this->input->post('year_av');
            $month_from_av = $this->input->post('month_from_av');

            if($repCode == 'ATR224X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av));
        } elseif ($repCode == 'ATR225'||$repCode == 'ATR225X') {
            $year_av = $this->input->post('year_av');
            $month_from_av = $this->input->post('month_from_av');

            if($repCode == 'ATR225X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av));
        } elseif ($repCode == 'ATR226'||$repCode == 'ATR226X') {
            $year_av = $this->input->post('year_av');
            $month_from_av = $this->input->post('month_from_av');

            if($repCode == 'ATR226X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'TRAINING_MONTH' => $month_from_av));
        } elseif ($repCode == 'ATR227'||$repCode == 'ATR227X') {
            $year_av = $this->input->post('year_av');
            $department_v = $this->input->post('department_v');

            if($repCode == 'ATR227X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'DEPARTMENT' => $department_v));
        } elseif ($repCode == 'ATR228'||$repCode == 'ATR228X') {
            $year_av = $this->input->post('year_av');
            $quarter_v = $this->input->post('quarter_v');
            $quarter_month_av = $this->input->post('quarter_month_av');
            $quarter_month_bv = $this->input->post('quarter_month_bv');
            $quarter_month_cv = $this->input->post('quarter_month_cv');

            if($repCode == 'ATR228X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'TRAINING_YEAR' => $year_av, 'SUKU_TAHUN' => $quarter_v, 'SUKU_BULAN1' => $quarter_month_av, 'SUKU_BULAN2' => $quarter_month_bv, 'SUKU_BULAN3' => $quarter_month_cv));
        } elseif ($repCode == 'ATR242') {
            $year_vi = $this->input->post('year_vi');
            $month_vi = $this->input->post('month_vi');
            $aca_nonaca = $this->input->post('aca_nonaca');
            $orga_vi = $this->input->post('orga_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR242X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR242';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi));
        } elseif ($repCode == 'ATR243') {
            $year_vi = $this->input->post('year_vi');
            $month_vi = $this->input->post('month_vi');
            $aca_nonaca = $this->input->post('aca_nonaca');
            $orga_vi = $this->input->post('orga_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR243X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR243';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi));
        } elseif ($repCode == 'ATR244') {
            $year_vi = $this->input->post('year_vi');
            $month_vi = $this->input->post('month_vi');
            $aca_nonaca = $this->input->post('aca_nonaca');
            $orga_vi = $this->input->post('orga_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR244X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR244';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi));
        } elseif ($repCode == 'ATR245') {
            $year_vi = $this->input->post('year_vi');
            $month_vi = $this->input->post('month_vi');
            $aca_nonaca = $this->input->post('aca_nonaca');
            $orga_vi = $this->input->post('orga_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR245X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR245';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi));
        } elseif ($repCode == 'ATR246') {
            $year_vi = $this->input->post('year_vi');
            $month_vi = $this->input->post('month_vi');
            $aca_nonaca = $this->input->post('aca_nonaca');
            $orga_vi = $this->input->post('orga_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR246X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR246';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi));
        } elseif ($repCode == 'ATR247') {
            $year_vi = $this->input->post('year_vi');
            $month_vi = $this->input->post('month_vi');
            $aca_nonaca = $this->input->post('aca_nonaca');
            $orga_vi = $this->input->post('orga_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR247X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR247';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi));
        } elseif ($repCode == 'ATR248') {
            $year_vi = $this->input->post('year_vi');
            $month_vi = $this->input->post('month_vi');
            $aca_nonaca = $this->input->post('aca_nonaca');
            $orga_vi = $this->input->post('orga_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR248X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR248';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi));
        } elseif ($repCode == 'ATR267') {
            $year_vi = $this->input->post('year_vi');
            $month_vi = $this->input->post('month_vi');
            $aca_nonaca = $this->input->post('aca_nonaca');
            $orga_vi = $this->input->post('orga_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR267X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR267';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'AKEPT_YEAR' => $year_vi, 'AKEPT_MONTH' => $month_vi, 'AKA_NAKA' => $aca_nonaca, 'AKEPT_ORGANIZER' => $orga_vi));
        } elseif ($repCode == 'ATR268') {
            $staff_id_vi = $this->input->post('staff_id_vi');
            $re_formatvi = $this->input->post('re_formatvi');

            if($re_formatvi == 'EXCEL' || $re_formatvi == 'SPREADSHEET') {
                $repCode = 'ATR268X';
                $repFormat = 'EXCEL';
            } else {
                $repCode = 'ATR268';
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'P_STH_STAFF_ID' => $staff_id_vi));
        } elseif ($repCode == 'ATR044') {
            $staffID = $this->input->post('staffID');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'P_STH_STAFF_ID' => $staffID));
        } elseif ($repCode == 'ATR045') {
            $department = $this->input->post('department');
            $unit = $this->input->post('unit');
            $statusavii = $this->input->post('statusavii');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'P_SM_DEPT_CODE' => $department, 'P_SM_UNIT' => $unit, 'P_STH_STATUS' => $statusavii));
        } elseif ($repCode == 'ATR037') {
            $year = $this->input->post('year');
            $courseTitle = $this->input->post('courseTitle');
            $dateFrom = $this->input->post('dateFrom');
            $statusbvii = $this->input->post('statusbvii');
            $format_vii = $this->input->post('format_vii');

            if ($format_vii == 'EXCEL') {
                $repCode = 'ATR037X'; 
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'P_YEAR' => $year, 'P_TH_REF_ID' => $courseTitle, 'P_TH_DATE_FROM' => $dateFrom, 'P_STH_STATUS' => $statusbvii));
        } elseif ($repCode == 'ATR038') {
            $year = $this->input->post('year');
            $courseTitle = $this->input->post('courseTitle');
            $dateFrom = $this->input->post('dateFrom');
            $statusbvii = $this->input->post('statusbvii');
            $format_vii = $this->input->post('format_vii');

            if ($format_vii == 'EXCEL') {
                $repCode = 'ATR038X'; 
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'P_YEAR' => $year, 'P_TH_REF_ID' => $courseTitle, 'P_TH_DATE_FROM' => $dateFrom, 'P_STH_STATUS' => $statusbvii));
        } elseif ($repCode == 'ATR080') {
            $year = $this->input->post('year');
            $courseTitle = $this->input->post('courseTitle');
            $dateFrom = $this->input->post('dateFrom');
            $statusbvii = $this->input->post('statusbvii');
            $format_vii = $this->input->post('format_vii');

            if ($format_vii == 'EXCEL') {
                $repCode = 'ATR080X'; 
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'P_YEAR' => $year, 'P_TH_REF_ID' => $courseTitle, 'P_TH_DATE_FROM' => $dateFrom, 'P_STH_STATUS' => $statusbvii));
        } elseif ($repCode == 'ATR249') {
            $year = $this->input->post('year');
            $courseTitle = $this->input->post('courseTitle');
            $dateFrom = $this->input->post('dateFrom');
            $statusbvii = $this->input->post('statusbvii');
            $format_vii = $this->input->post('format_vii');

            if ($format_vii == 'EXCEL') {
                $repCode = 'ATR249X'; 
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'P_YEAR' => $year, 'P_TH_REF_ID' => $courseTitle, 'P_TH_DATE_FROM' => $dateFrom, 'P_STH_STATUS' => $statusbvii));
        } elseif ($repCode == 'ATR287'||$repCode == 'ATR287X') {
            $department_v = $this->input->post('department_v');

            if($repCode == 'ATR287X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DEPT' => $department_v));
        } elseif ($repCode == 'ATR288'||$repCode == 'ATR288X') {
            $department_v = $this->input->post('department_v');

            if($repCode == 'ATR288X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DEPT' => $department_v));
        } elseif ($repCode == 'ATR289'||$repCode == 'ATR289X') {
            $department_v2 = $this->input->post('department_v2');
            $trainingID = $this->input->post('trainingID');
            $month = $this->input->post('month');
            $year = $this->input->post('year');

            if($repCode == 'ATR289X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DEPT' => $department_v2, 'TRAINING_ID' => $trainingID, 'TRAINING_MONTH' => $month, 'TRAINING_YEAR' => $year));
        } elseif ($repCode == 'ATR290'||$repCode == 'ATR290X') {
            $department_v3 = $this->input->post('department_v2');
            $trainingID2 = $this->input->post('trainingID');

            if($repCode == 'ATR290X') {
                $repFormat = 'EXCEL';
            } else {
                $repFormat = 'PDF';
            }
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'DEPT' => $department_v3, 'STRUCTUREDID' => $trainingID2));
        } 

        // Borang Laporan Urusetia Kursus 
        elseif ($repCode == 'ATR251') {
            $refid = $this->input->post('refid');
            $repFormat = 'PDF';
            
            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode, 'FORMAT'=>$repFormat, 'PARAMFORM' => 'NO', 'REFID' => $refid));
        }


		$json = array('report' => $param);
		
		echo json_encode($json);
    }
}
