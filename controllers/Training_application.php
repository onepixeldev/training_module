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

        $selDept = $this->input->post('sDept', true);

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


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
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


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
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

    // QUERY STAFF TRAINING
    public function ATF118()
    { 
        // default value filter
        // default dept
        //$data['cur_usr_dept'] = $this->mdl->getCurUserDept();
        //$data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;

        // get department dd list
        //$data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' --- Please select --- ');

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
        // get available records
        $data['trainingInfo'] = $this->mdl->getTrainingInfo();

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
                $data['cpdSetupCatDesc'] = $data['cpdSetupCat']->CH_CC_CATEGORY_DESC;
            } else {
                $data['cpdSetupCatDesc'] = '';
            }
        }

        $this->render($data);
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
    public function organizerInfo(){
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

        // get available records
        if(!empty($groupCode)){
            $data['gp_code'] = $groupCode;
            $data['list_eg_pos'] = $this->mdl->getListEgPosition($groupCode);
        }

        $this->render($data);
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

        // form / input validation
        $rule = array(
            // 0
            'type' => 'required|max_length[100]', 
            'category' => 'required|max_length[200]',
            'structured_training' => 'max_length[20]',
            'level' => 'required|max_length[10]', 
            'area' => 'required|max_length[200]', 
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
            'total_hours' => 'required|max_length[12]', 
            'internal_external' => 'required|max_length[20]', 
            'sponsor' => 'required|max_length[100]',
            'offer' => 'max_length[1]', 
            'participants' => 'max_length[11]', 
            'online_application' => 'max_length[1]',
            'closing_date' => 'max_length[11]', 
            'competency_code' => 'max_length[10]', 
            'evaluation_period_from' => 'required|max_length[30]',
            'evaluation_period_to' => 'required|max_length[30]', 

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
            'evaluation_compulsary' => 'required|max_length[1]', 'attendance_type' => 'required|max_length[20]', 'print_certificate' => 'required|max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {
            $data['refID'] = $this->mdl->getRefID();

            if(!empty($data['refID'])){
                $refid = $data['refID']->REF_ID;
                $insert = $this->mdl->insertTrainingHead($form, $refid);

                if($insert > 0){
                    $insTrHeadMsg = 'TRAINING_HEAD success! ';
                    $insertTHD = 0; // tr head detl
                    $insTHD = 0; // tr head detl

                    // INSERT TRAINING HEAD DETAIL
                    if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD)) {
                        $insertTHD = $this->mdl->insertTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);
                        $insTHD++;
                    }
                    
                    if($insertTHD == $insTHD) {
                        $insTHDMsg = 'TRAINING_HEAD_DETL success! ';
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
                    $insertTHD = 0; // tr head detl
                    $insTHD = 0; // tr head detl

                    // INSERT CPD HEAD
                    if(!empty($data['compt']->TTH_COMPETENCY)){
                        $competency = $data['compt']->TTH_COMPETENCY;
                    } else {
                        $competency = '';
                    }
                    $insertCPDHead = $this->mdl->insertCPDHead($refid, $competency); 

                    if($insertCPDHead > 0) {
                        $insCpdHeadMsg = 'CPD_HEAD success! ';
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
                        $insTTGMsg = 'TRAINING_TARGET_GROUP success! ';
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
                        $insTHD++;
                    }

                    if($insertTHD == $insTHD) {
                        $insTHDMsg = 'TRAINING_HEAD_DETL success! ';
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
            'facilitator' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check training speaker
            $check = $this->mdl->checkTrainingFacilitator($refid, $fiID);

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
    public function editTraining()
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

        // form / input validation
        $rule = array(
            // sc code
            'sc_code' => 'max_length[10]',


            // training info
            'type' => 'required|max_length[100]', 
            'category' => 'required|max_length[200]',
            'structured_training' => 'max_length[20]',
            'level' => 'required|max_length[10]', 
            'area' => 'required|max_length[200]', 
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
            'total_hours' => 'required|max_length[12]', 
            'internal_external' => 'required|max_length[20]', 
            'sponsor' => 'required|max_length[100]',
            'offer' => 'max_length[1]', 
            'participants' => 'max_length[11]', 
            'online_application' => 'max_length[1]',
            'closing_date' => 'max_length[11]', 
            'competency_code' => 'max_length[10]', 
            'evaluation_period_from' => 'required|max_length[30]',
            'evaluation_period_to' => 'required|max_length[30]', 

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
            'evaluation_compulsary' => 'required|max_length[1]', 'attendance_type' => 'required|max_length[20]', 'print_certificate' => 'required|max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {

            if(!empty($refid)){
                //$refid = $data['refID']->REFID;
                $update = $this->mdl->updateTrainingHead($form, $refid);

                if($update > 0){
                    $data['trInfo'] = $this->mdl->getTrainingInfoDetail($refid);
                    $trName = $data['trInfo']->TH_TRAINING_TITLE;

                    $updTrHeadMsg = 'TRAINING_HEAD success! ';

                    $insertTHD = 0; // tr head detl
                    $updTHD = 0; // tr head detl

                    // update training head detail
                    $updateTHD = $this->mdl->updateTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);

                    if($updateTHD > 0) {
                        $updTHD++;
                    } else {
                        $updateTHD = 0;
                    }

                    if($updateTHD == $updTHD) {
                        $updTHDMsg = 'TRAINING_HEAD_DETL success! ';
                    } else {
                        $updTHDMsg = '';
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
                    // $insertTHD = 0; // tr head detl
                    // $updTHD = 0; // tr head detl

                    // update CPD head
                    if(!empty($data['compt']->TTH_COMPETENCY)){
                        $competency = $data['compt']->TTH_COMPETENCY;
                    } else {
                        $competency = '';
                    }
                    $updatetCPDHead = $this->mdl->updateCPDHead($refid, $competency); 

                    if($updatetCPDHead > 0) {
                        $updCpdHeadMsg = 'CPD_HEAD success! ';
                    } 
                    else {
                        $updCpdHeadMsg = '';
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

                    // // update training head detail
                    // $updateTHD = $this->mdl->updateTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);

                    // if($updateTHD > 0) {
                    //     $updTHD++;
                    // } else {
                    //     $updateTHD = 0;
                    // }

                    // if($updateTHD == $updTHD) {
                    //     $updTHDMsg = 'TRAINING_HEAD_DETL success! ';
                    // } else {
                    //     $updTHDMsg = '';
                    // }


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
       TRAINING APPLICATION [APPROVE TRAINING APPLICATIONS]
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
        $data['tr_list'] = $this->mdl->getTrainingList($defIntExt, $curUsrDept, $defMonth, $curYear, $defTrSts);

        $this->render($data);
    }

    // APPLICANT LIST
    public function getStaffTrainingApplication()
    {   
        $refid = $this->input->post('refid', true);
        $tName = $this->input->post('tName', true);

        //$data2 = array();

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['tname'] = $tName;
            $data['staff_tr_list'] = $this->mdl->getStaffTrainingApplication($refid);
        } 

        $this->renderAjax($data);
    }

    // APPLICANT DETAIL
    public function detailSTA()
    {   
        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffID', true);

        if(!empty($refid) && !empty($staffID)) {
            $data['refid'] = $refid;
            $data['staffID'] = $staffID;
            $data['staff_tr_list'] = $this->mdl->getStaffTrainingApplication($refid, $staffID);
            $data['eva_tr_info'] = $this->mdl->getEvaluatorInfo($refid, $staffID);
            if(!empty($data['eva_tr_info'])) {
                $data['eva_info'] = $data['eva_tr_info']->STAFF;
            } else {
                $data['eva_info'] = '';
            }
        } 

        $this->renderAjax($data);
    }

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
                    $json = array('sts' => 1, 'msg' => 'TH_DATE_FROM > SYSDATE ' .$verDate->TH_DATE_FROM. '>' .$verDate->CUR_DATE.'', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'TH_DATE_FROM < SYSDATE ' .$verDate->TH_DATE_FROM. '<' .$verDate->CUR_DATE.'', 'alert' => 'danger');
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
        $staffID = $this->input->post('staffID', true);
        $remark = $this->input->post('remark', true);
        $sts = 1;

        if (!empty($refid) && !empty($staffID)) {   
            $data['eva_id'] = $this->mdl->getEvaluatorID($refid, $staffID);

            if(!empty($data['eva_id'])) {
                $eveluatorID = $data['eva_id']->EVAID;
            } else {
                $eveluatorID = '';
            }

            $approve = $this->mdl->apprOrReApp($refid, $staffID, $eveluatorID, $remark, $sts);
            //$approve = '1';

            if($approve > 0) {
                //$cpd5_row = $this->mdl->getCpdSetup($refid);

                $json = array('sts' => 1, 'msg' => 'Training Application has been approved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to approve Training Application', 'alert' => 'danger');
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

        if (!empty($refid) && !empty($staffID)) {   
            $data['eva_id'] = $this->mdl->getEvaluatorID($refid, $staffID);

            if(!empty($data['eva_id'])) {
                $eveluatorID = $data['eva_id']->EVAID;
            } else {
                $eveluatorID = '';
            }

            $reject = $this->mdl->apprOrReApp($refid, $staffID, $eveluatorID, $remark, $sts);
            //$approve = '1';

            if($reject > 0) {
                //$cpd5_row = $this->mdl->getCpdSetup($refid);

                $json = array('sts' => 1, 'msg' => 'Training Application has been rejected', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to reject Training Application', 'alert' => 'danger');
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
        $staffID = $this->input->post('staffID', true);
        $memo_from = 'bsm.latihan@upsi.edu.my';

        if(!empty($refid) && !empty($staffID)) {

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

            // GET STAFF EMAIL
            $staff_app = $this->mdl->getCurUserDept($staffID);
            if(!empty($staff_app)){
                $staff_app_email = $staff_app->SM_EMAIL_ADDR;
                $staff_app_id = $staff_app->SM_STAFF_ID;
                $staff_app_name = $staff_app->SM_STAFF_NAME;
            } else {
                $staff_app_email = '';
            }

            // GET EVALUATOR STAFF EMAIL DISTINCT
            $staff_eva = $this->mdl->getStaffMainDis($refid, $staffID);
            if(!empty($staff_eva)) {
                $eva_email = $staff_eva->SM_EMAIL_ADDR;
                $eva_id = $staff_eva->STAFF;
                $eva_name = $staff_eva->SM_STAFF_NAME;
            } else {
                $eva_email = '';
                $eva_id = '';
                $eva_name = '';
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

            // EMAIL CC
            if(!empty($eva_email)) {
                $email_cc = ''.$eva_email. ', ' .$memo_from;
            } else {
                $email_cc = $memo_from;
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

           
            if(!empty($staff_app_email)) {
                $sendEmailSts = $this->mdl->sendEmail($memo_from, $staff_app_email, $email_cc, $msg_title, $msg_content);

                if($sendEmailSts > 0) {
                    $checkEmailSts = $this->mdl->verifyTraining($refid, $staffID);
    
                    if(!empty($checkEmailSts)) {
                        $updEmailSts = $this->mdl->updateEmailSts($refid, $staffID);
                    } else {
                        $insEmailSts = $this->mdl->insertEmailSts($refid, $staffID);
                    }
    
                    $sentMsg = 'Memo successfully sent';
                    $json = array('sts' => 1, 'msg' => $sentMsg, 'alert' => 'success');
                } else {
                    $sentMsg = 'Fail to send memo';
                    $json = array('sts' => 0, 'msg' => $sentMsg, 'alert' => 'danger');
                }
            } else {
                $sentMsg = nl2br('Fail to send memo to <b>'.$staff_app_id.' - '.$staff_app_name."\n".'</b>Applicant email address not found!'."\n".'Cannot approve applicant Training Application!');
                $json = array('sts' => 0, 'msg' => $sentMsg, 'alert' => 'danger');
            }   
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
            $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
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
            'department' => 'required|max_length[100]', 
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
            $del = $this->mdl->deleteAssignedStaff($refid, $staffId);
        
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
    public function approveTrainingSetup() {
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

    // VERIFY ATTEND CONFIRMATION
    public function verifyAttendConfirmation() {
        $this->isAjax();
        
		$stfName = $this->input->post('stfName', true);
        $stfID = $this->input->post('stfID', true);
        $refid = $this->input->post('refid', true);
        
        if (!empty($refid) && !empty($stfID)) {
            $checkStfTrDetl = $this->mdl->verifyTraining($refid, $stfID);

            if(!empty($checkStfTrDetl)) {
                if($checkStfTrDetl->STD_ATTEND == 'A' || $checkStfTrDetl->STD_ATTEND == 'Y') {
                    $json = array('sts' => 1, 'msg' => 'Applicant attendance <b>already confirmed</b>. <br>Staff ID: <b>'.$stfID.' - '.$stfName.'</b>', 'alert' => 'danger');
                } elseif($checkStfTrDetl->STD_ATTEND == 'N') {
                    $json = array('sts' => 1, 'msg' => 'Applicant attendance cannot be confirmed. <br>Staff ID: <b>'.$stfID.' - '.$stfName.'</b>', 'alert' => 'danger');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Applicant attendance need confirmation.', 'alert' => 'danger');
                }
                
            } else {
                $json = array('sts' => 0, 'msg' => 'Applicant attendance need confirmation.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // AUTO ATTEND CONFIRMATION
    public function autoAttendConfirmation() {
        $this->isAjax();
        
		$stfName = $this->input->post('stfName', true);
        $stfID = $this->input->post('stfID', true);
        $refid = $this->input->post('refid', true);
        
        if (!empty($refid) && !empty($stfID)) {
            foreach ($stfID as $key => $fid) {
                // CHECK IF STAFF RECORD ALREADY EXIST
                $checkStfTrDetl = $this->mdl->verifyTraining($refid, $fid);

                if (!empty($checkStfTrDetl) && empty($checkStfTrDetl->STD_ATTEND)) {
                    // IF EXIST THEN UPDATE RECORD
                    $transport = '';
                    $trCode = '';
                    $attend_field = '';

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
                        $attend_field = $this->mdl->verifyTraining($refid, $fid);
                        if ($attend_field->STD_ATTEND == 'A') {
                            $attend_field = '<font color="green">Yes (Auto)</font>';
                            $staff_id = '<font color="green">'.$fid.'</font>';
                            $c_attend = $this->mdl->getCountAttendSum($refid, $att = 0);
                            $c_absent = $this->mdl->getCountAttendSum($refid, $att = 1);
                            $c_unconf = $this->mdl->getCountAttendSum($refid, $att = 2);
                            $total_approve = $this->mdl->getCountAttendSum($refid, $att = 3);
                            $summary = nl2br('Total Offer Approved: <b>'.$total_approve->COUNT_ATTEND."</b>\r\n"."\r\n".
                                            '<font color="green">Total Attend: <b>'.$c_attend->COUNT_ATTEND."</font></b>\r\n".
                                            '<font color="red">Total Absent: <b>'.$c_absent->COUNT_ATTEND."</font></b>\r\n".
                                            '<font color="blue">Total Unconfirmed: <b>'.$c_unconf->COUNT_ATTEND.'</font></b>');
                        } else {
                            $attend_field = '';
                            $summary = '';
                        }
                        $autoConfMsg = 'Attendance <font color="green"><b>successfully confirmed</b></font>';
                    } else {
                        $autoConfMsg = 'Fail to confirm attendance.';
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
                    $json = array('sts' => 1, 'msg' => ''.$autoConfMsg.'<br>'.$updMsg.'', 'alert' => 'green', 'attend_field' => $attend_field, 'summary' => $summary, 'staff_id' => $staff_id);
                } 
                
                if (empty($checkStfTrDetl)) {
                    // INSERT
                    $transport = '';
                    $trCode = '';
                    $checkTrExternal = $this->mdl->getTrainingExternal($refid);
                    if (!empty($checkTrExternal)) {
                        $trCode = $checkTrExternal->TH_TRAINING_CODE;
                        if ($checkTrExternal->TH_INTERNAL_EXTERNAL == 'EXTERNAL') {
                            $transport = 'UPSI';
                        }
                    }

                    $autoConfirmIns = $this->mdl->autoAttendConfirmationIns($refid, $stfID, $transport);
                    if ($autoConfirmIns > 0) {
                        $attend_field = $this->mdl->verifyTraining($refid, $stfID);
                        if ($attend_field->STD_ATTEND == 'A') {
                            $attend_field = 'Yes (Auto)';
                        } else {
                            $attend_field = '';
                        }
                        $autoConfMsg = 'Attendance <font color="green"><b>successfully confirmed</b></font>. <br>Staff ID: <b>'.$stfID.' - '.$stfName.'</b>';
                    } else {
                        $autoConfMsg = 'Fail to confirm attendance.';
                    }

                    $countRequirement = $this->mdl->getTrainingRequirement($trCode, $stfID);
                    if ($countRequirement->R_COUNT > 0) {
                        $updateTrRequirement = $this->mdl->updTrainingRequirementDetl($trCode, $stfID);
                        if ($updateTrRequirement == true) {
                            $updMsg = 'Training Requirement successfully updated.';
                        } else {
                            $updMsg = 'Fail to update Training Requirement.';
                        }
                    } else {
                        $updMsg = '';
                    }
                    $json = array('sts' => 1, 'msg' => ''.$autoConfMsg.'<br>'.$updMsg.'', 'alert' => 'green', 'attend_field' => $attend_field);
                }
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
            $update = $this->mdl->saveUpdateApplicantDetails($form, $refid, $stfID);

            if($update > 0) {
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

    // RESEND EMAIL APPLICANT
    public function resendEmailApplicant()
    {
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('stfID', true);
        $stName = $this->input->post('stfName', true);
        $memo_from = 'bsm.latihan@upsi.edu.my';

        if(!empty($refid) && !empty($staffID)) {

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

            // GET STAFF EMAIL
            $staff_app = $this->mdl->getCurUserDept($staffID);
            if(!empty($staff_app)){
                $staff_app_email = $staff_app->SM_EMAIL_ADDR;
                $staff_app_id = $staff_app->SM_STAFF_ID;
                $staff_app_name = $staff_app->SM_STAFF_NAME;
            } else {
                $staff_app_email = '';
            }

            // GET EVALUATOR STAFF EMAIL DISTINCT
            $staff_eva = $this->mdl->getStaffMainDis($refid, $staffID, $resend = 1);
            if(!empty($staff_eva)) {
                $eva_email = $staff_eva->SM_EMAIL_ADDR;
                $eva_id = $staff_eva->STAFF;
                $eva_name = $staff_eva->SM_STAFF_NAME;
            } else {
                $eva_email = '';
                $eva_id = '';
                $eva_name = '';
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

            // EMAIL CC
            if(!empty($eva_email)) {
                //$email_cc = ''.$eva_email. ', ' .$memo_from;
                $email_cc = $eva_email;
            } else {
                $email_cc = '';
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

           
            if(!empty($staff_app_email)) {
                $sendEmailSts = $this->mdl->sendEmail($memo_from, $staff_app_email, $email_cc, $msg_title, $msg_content);

                if($sendEmailSts > 0) {
                    $checkEmailSts = $this->mdl->verifyTraining($refid, $staffID);
    
                    /*if(!empty($checkEmailSts)) {
                        $updEmailSts = $this->mdl->updateEmailSts($refid, $staffID);
                    } else {
                        $insEmailSts = $this->mdl->insertEmailSts($refid, $staffID);
                    }*/
    
                    $sentMsg = 'Memo successfully sent';
                    $json = array('sts' => 1, 'msg' => $sentMsg, 'alert' => 'success');
                } else {
                    $sentMsg = 'Fail to send memo';
                    $json = array('sts' => 0, 'msg' => $sentMsg, 'alert' => 'danger');
                }
            } else {
                $sentMsg = nl2br('Fail to send memo to <b>'.$staff_app_id.' - '.$staff_app_name."\n".'</b>Applicant email address not found!');
                $json = array('sts' => 0, 'msg' => $sentMsg, 'alert' => 'danger');
            }   
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator!', 'alert' => 'danger');
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
    	// get current value 
    	$refid = $this->input->post('refid');
        $sendDate = $this->input->post('sendDate');
        $refNo = $this->input->post('refNo');
        
        if(!empty($refid) && !empty($sendDate) && !empty($refNo)) {
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
    public function printOfferReport() {
        $refid = $this->session->userdata('refid_mem');
        $sendDate = $this->session->userdata('send_date_mem');
        $refNo = $this->session->userdata('ref_no');
        $formCode = 'ATR250';
        $param = array('PARAMFORM' => 'NO', 'TRAINING_REFID' => $refid, 'TARIKH_SEND' => $sendDate, 'RUJUKAN' => $refNo);

        $this->lib->report($formCode, $param);
    }
}
