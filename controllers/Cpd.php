<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cpd extends MY_Controller
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cpd_model', 'mdl_cpd');
        $this->load->model('Conference_pmp_model', 'mdl_pmp');
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }

    // View MAIN Page
    // public function index()
    // {
    //     // clear filter
    //     $this->session->set_userdata('tabID', '');

    //     $this->redirect($this->class_uri('ASF032'));
    // }

    // View Page Filter
    public function viewTabFilter($tabID, $scID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);

        // $scID = $scID;
        
        if($scID == 'ATF098') {
            redirect($this->class_uri('ATF098')); 
        } elseif($scID == 'ATF097') {
            redirect($this->class_uri('ATF097'));
        } 
        
        // elseif($scID == 'ATF043') {
        //     redirect($this->class_uri('ATF043'));
        // } elseif($scID == 'ATF158') {
        //     redirect($this->class_uri('ATF158'));
        // } elseif($scID == 'ATF170') {
        //     redirect($this->class_uri('ATF170'));
        // }
        
    }

    // CPD SETUP
    public function ATF098()
    {
        $data['year'] = $this->mdl_pmp->getCurDate(); 
        $data['cur_year'] = $data['year']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_pmp->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');

        $this->render($data);
    }

    // CONFERENCE SETUP (CPD)
    public function ATF097()
    {
        $data['month'] = $this->mdl_pmp->getCurDate();
        $data['year'] = $this->mdl_pmp->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_pmp->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl_pmp->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    // STAFF CPD SETUP 
    public function ATF122()
    {
        $data['date'] = $this->mdl_pmp->getCurDate();

        $data['cur_year'] = $data['date']->SYSDATE_YYYY;       

        // get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_pmp->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');

        // get dept dd list
        $data['dept_list'] = $this->dropdown($this->mdl_cpd->populateDept(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');


        // CURRENT USER DEPT
        $usr_dept = $this->mdl_cpd->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl_cpd->getCpdAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        $data['dept_list'] = $this->dropdown($this->mdl_cpd->populateDeptNew($deptCode), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
       
        // // HRD DEPT
        // $data['hrd_dept'] = $this->mdl_cpd->getHrdDept();
        // if(!empty($data['hrd_dept'])) {
        //     $data['hrd_dept_2'] = $data['hrd_dept']->HP_PARM_DESC;
        // } else {
        //     $data['hrd_dept_2'] = '';
        // }

        // // CURRENT USER DEPT
        // $data['usr_dept'] = $this->mdl_cpd->currentUsrDept();
        // if(!empty($data['usr_dept'])) {
        //     $data['curr_dept'] = $data['usr_dept']->SM_DEPT_CODE;

        //     // get dept dd list
        //     if($data['curr_dept'] == $data['hrd_dept_2']) {
        //         $data['dept_list'] = $this->dropdown($this->mdl_cpd->populateDept(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
        //     } else {
        //         $data['dept_list'] = $this->dropdown($this->mdl_cpd->populateDept2($data['curr_dept']), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
        //     }
        // } else {
        //     $data['curr_dept'] = '';
        // }

        $this->render($data);
    }

    // STAFF CPD MANUAL ENTRY
    public function ATF149()
    {
        $data['date'] = $this->mdl_pmp->getCurDate();

        $data['cur_year'] = $data['date']->SYSDATE_YYYY;       

        // get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_pmp->getYearList(), 'CM_YEAR', 'CM_YEAR');

        // get dept dd list
        $data['dept_list'] = $this->dropdown($this->mdl_cpd->populateDept(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');

        // CURRENT USER DEPT
        $usr_dept = $this->mdl_cpd->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->mdl_cpd->getCpdAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        $data['dept_list'] = $this->dropdown($this->mdl_cpd->populateDeptNew($deptCode), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
       
        // HRD DEPT
        // $data['hrd_dept'] = $this->mdl_cpd->getHrdDept();
        // if(!empty($data['hrd_dept'])) {
        //     $data['hrd_dept_2'] = $data['hrd_dept']->HP_PARM_DESC;
        // } else {
        //     $data['hrd_dept_2'] = '';
        // }

        // // CURRENT USER DEPT
        // $data['usr_dept'] = $this->mdl_cpd->currentUsrDept();
        // if(!empty($data['usr_dept'])) {
        //     $data['curr_dept'] = $data['usr_dept']->SM_DEPT_CODE;

        //     // get dept dd list
        //     if($data['curr_dept'] == $data['hrd_dept_2']) {
        //         $data['dept_list'] = $this->dropdown($this->mdl_cpd->populateDept(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
        //     } else {
        //         $data['dept_list'] = $this->dropdown($this->mdl_cpd->populateDept2($data['curr_dept']), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
        //     }
        // } else {
        //     $data['curr_dept'] = '';
        // }

        $this->render($data);
    }

    // CPD REPORT SUBMISSION
    public function ATF103()
    {
        $data['month'] = $this->mdl_pmp->getCurDate();
        $data['year'] = $this->mdl_pmp->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_pmp->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl_pmp->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    // UPDATE CPD INFO
    public function ATF123B()
    {   
        // default value filter
        // default dept
        $data['cur_usr_dept'] = $this->mdl_cpd->getCurUserDept();
        $data['curUsrDept'] = $data['cur_usr_dept']->SM_DEPT_CODE;
        // default month
        $data['defMonth'] = '';
        // default year
        $data['cur_year'] = $this->mdl_cpd->getCurYear();
        $data['curYear'] = $data['cur_year']->CUR_YEAR;


        // get department dd list
        $data['dept_list'] = $this->dropdown($this->mdl_cpd->getDeptList2(), 'DM_DEPT_CODE', 'DEPT_CODE_DESC', ' ---Please select--- ');
        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_cpd->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl_cpd->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');
        //get training status list
        //$data['tr_sts_list'] = array('ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE');

        $this->render($data);
    }

    // SET REPORT PARAM
    public function setRepParam() {
		$this->isAjax();
	
		$repCode = $this->input->post('repCode', true);
		$param = '';
		
		if ($repCode == 'COORREP') {
			$role = $this->input->post('role', true);
            $sector = $this->input->post('sector', true);
            $format = $this->input->post('format', true);

            if($role == 'COORDINATOR') {
                if($format == 'EXCEL') {
                    $repCode = 'ATR236X';
                } else {
                    $repCode = 'ATR236';
                } 
            } elseif($role == 'PANEL') {
                if($format == 'EXCEL') {
                    $repCode = 'ATR237X';
                } else {
                    $repCode = 'ATR237';
                } 
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','SECTOR'=>$sector));
        } 
        elseif($repCode == 'ATR112') {
            $refid = $this->input->post('refid', true);
            $month = $this->input->post('month', true);
            $year = $this->input->post('year', true);

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'PARAMFORM' => 'NO','P_CONFERENCE_MONTH'=>$month,'P_CONFERENCE_YEAR'=>$year,'P_CONFERENCE_ID'=>$refid));
        } 
        elseif($repCode == 'ATR115') {
            $refid = $this->input->post('refid', true);
            $staff_id = $this->input->post('staff_id', true);

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'PARAMFORM' => 'NO','REFID'=>$refid,'STAFF_ID'=>$staff_id));
        }
		
		$json = array('report' => $param);
		
		echo json_encode($json);		
    } 
    
    // GENERATE REPORT
    public function report(){
		$report = $this->encryption->decrypt_array($this->input->get('r'));
		$this->lib->generate_report($report, false);
    }

    // AUTO SEARCH STAFF ID
    public function staffKeyUp()
    {  
        $this->isAjax();
        $staff_id = $this->input->post('staff_id', true);
        $found = 0;

        if (!empty($staff_id)) {
            $stf_inf = $this->mdl_pmp->getStaffList($staff_id);
            if(!empty($stf_inf->SM_STAFF_NAME)) {
                $found++;
                $stf_name = $stf_inf->SM_STAFF_NAME;
            } else {
                $stf_name = '';
            }
            
            if($found > 0) {
                $json = array('sts' => 1, 'msg' => 'Staff found', 'alert' => 'green', 'stf_name' => $stf_name);
            } else {
                $json = array('sts' => 0, 'msg' => 'Staff not found', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // SEARCH STAFF
    public function searchStaffMd() {
        $staff_id = $this->input->post('staff_id', true);
        $search_trigger = $this->input->post('search_trigger', true);

        if(!empty($staff_id) && $search_trigger == 1) {
            $data['stf_inf'] = $this->mdl_pmp->getStaffSearch($staff_id);
            $this->render($data);
        } elseif(empty($staff_id) && $search_trigger == 1) {
            $data['stf_inf'] = $this->mdl_pmp->getStaffList();
            $this->render($data);
        } else {
            $this->render();
        }
    }

    /*===============================================================
       CPD SETUP (ATF098)
    ================================================================*/

    // CPD CATEGORY
    public function cpdCategoryList()
    {
        $data['cpd_cat'] = $this->mdl_cpd->cpdCategoryList();

        $this->render($data);
    }

    // CPD POINT
    public function cpdPointList()
    {
        $sYear = $this->input->post('sYear', true);

        $data['cpd_pts'] = $this->mdl_cpd->cpdPointList($sYear);

        $this->render($data);
    }

    // SECTOR LIST
    public function sectorList()
    {  
        $this->isAjax();

        // get parameter values
        $role = $this->input->post('role', true);

        if(!empty($role)) {

            $sectorList = $this->mdl_cpd->sectorList();

            if(!empty($sectorList)) {
                $json = array('sts' => 1, 'msg' => 'Sector list found', 'alert' => 'success', 'sectorList' => $sectorList);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to get sector list', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // COORDINATOR LIST
    public function coorList()
    {
        $role = $this->input->post('role', true);
        $sector = $this->input->post('sector', true);

        $data['coor_list'] = $this->mdl_cpd->coorList($role, $sector);

        $this->render($data);
    }

    // ADD CPD CATEGORY
    public function addCpdCat()
    {
        $this->render();
    }

    // SAVE CPD CATEGORY
    public function saveCpdCategory()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'code' => 'required|max_length[10]',
            'description' => 'max_length[100]',
            'status' => 'required|max_length[20]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {

            $check = $this->mdl_cpd->cpdCategoryList($form['code']);

            if(empty($check)) {
                $insert = $this->mdl_cpd->saveCpdCategory($form);

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

    // EDIT CPD CATEGORY
    public function editCpdCat()
    {
        $code = $this->input->post('code', true);

        if(!empty($code)) {
            $data['code'] = $code;
            $data['cpd_cat_detl'] = $this->mdl_cpd->cpdCategoryList($code);
        }

        $this->render($data);
    }

    // SAVE UPDATE CPD CATEGORY
    public function saveUpdCpdCategory()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $code = $form['code'];

        // form / input validation
        $rule = array(
            'description' => 'max_length[100]',
            'status' => 'required|max_length[20]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_cpd->saveUpdCpdCategory($form, $code);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
            
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // ADD CPD POINT
    public function addCpdPoint()
    {
        $sYear = $this->input->post('sYear', true);

        if(!empty($sYear)) {
            $data['cp_year'] = $sYear;
        } else {
            $data['cp_year'] = '';
        }

        $data['scheme_list'] = $this->dropdown($this->mdl_cpd->getSchemeList(), 'SS_SERVICE_KUMPP', 'SS_SERVICE_KUMPP_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE CPD POINT
    public function saveCpdPoint()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $year = $form['cp_year'];
        $cp_scheme = $form['scheme'];

        // form / input validation
        $rule = array(
            'scheme' => 'required|max_length[10]',
            'compulsory_cpd' => 'numeric|max_length[40]',
            'minimum_cpd_khusus' => 'numeric|max_length[40]',
            'minimum_cpd_umum' => 'numeric|max_length[40]',
            'cpd_umum_compulsory' => 'numeric|max_length[40]',
            'minimum_cpd_teras' => 'numeric|max_length[40]',
            'lnpt_weightage' => 'numeric|max_length[40]',
            'rank' => 'numeric|max_length[40]',
            'cp_year' => 'max_length[40]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->mdl_cpd->cpdPointList($year, $cp_scheme);

            if(empty($check)) {
                $insert = $this->mdl_cpd->saveCpdPoint($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    // UPDATE CPD POINT
    public function editCpdPoint()
    {
        $cp_scheme = $this->input->post('cp_scheme', true);
        $sYear = $this->input->post('sYear', true);

        if(!empty($sYear)) {
            $data['cp_year'] = $sYear;
        } else {
            $data['cp_year'] = '';
        }

        if(!empty($cp_scheme) && !empty($sYear)) {
            $data['cpd_p_detl'] = $this->mdl_cpd->cpdPointList($sYear, $cp_scheme);
        }

        $data['scheme_list'] = $this->dropdown($this->mdl_cpd->getSchemeList(), 'SS_SERVICE_KUMPP', 'SS_SERVICE_KUMPP_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE UPDATE CPD POINT
    public function saveUpdCpdPoint()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $year = $form['cp_year'];
        $cp_scheme = $form['scheme'];

        // form / input validation
        $rule = array(
            'scheme' => 'required|max_length[10]',
            'compulsory_cpd' => 'numeric|max_length[40]',
            'minimum_cpd_khusus' => 'numeric|max_length[40]',
            'minimum_cpd_umum' => 'numeric|max_length[40]',
            'cpd_umum_compulsory' => 'numeric|max_length[40]',
            'minimum_cpd_teras' => 'numeric|max_length[40]',
            'lnpt_weightage' => 'numeric|max_length[40]',
            'rank' => 'numeric|max_length[40]',
            'cp_year' => 'max_length[40]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_cpd->saveUpdCpdPoint($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    // DELETE CPD POINT
    public function deleteCpdPoint() {
		$this->isAjax();
		
        $cp_scheme = $this->input->post('cp_scheme', true);
        $cp_year = $this->input->post('cp_year', true);

        if (!empty($cp_scheme) && !empty($cp_year)) {
            $check = $this->mdl_cpd->countStaffCpdPointHead($cp_scheme, $cp_year);
            if(!empty($check)) {
                $sts = $check->COUNT_STAFF;
            } else {
                $sts = '';
            }

            $sysdate = $this->mdl_pmp->getCurDate(); 
            $cur_year = $sysdate->SYSDATE_YYYY;
            
            if($cp_year < $cur_year) {
                $json = array('sts' => 0, 'msg' => 'Cannot Delete Previous Record', 'alert' => 'danger');
            } else {
                if($sts == 0) {
                    $del = $this->mdl_cpd->deleteCpdPoint($cp_scheme, $cp_year);
            
                    if ($del > 0) {
                        $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                    }
                } else {
                    $json = array('sts' => 0, 'msg' => 'Cannot Delete Data. Record Staff Already Exists', 'alert' => 'danger');
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // GENERATE STAFF CPD POINT
    public function genStaffCpd() {
		$this->isAjax();
		
        $cp_scheme = $this->input->post('cp_scheme', true);
        $cp_year = $this->input->post('cp_year', true);

        $cp_cpd_layak = $this->input->post('cp_cpd_layak', true);
        $cp_cpd_khusus_min = $this->input->post('cp_cpd_khusus_min', true);
        $cp_cpd_umum_min = $this->input->post('cp_cpd_umum_min', true);
        $cp_cpd_teras_min = $this->input->post('cp_cpd_teras_min', true);
        $cp_lnpt_weightage = $this->input->post('cp_lnpt_weightage', true);

        $countStaff = 0;
        $countUpdStaff = 0;
        $successInsStaff = 0;
        $successUpdStaff = 0;

        $success1 = 0;
        $success2 = 0;

        $insStaffMsg = '';
        $updStaffMsg = '';

        if (!empty($cp_scheme) && !empty($cp_year)) {
            $sysdate = $this->mdl_pmp->getCurDate(); 
            $cur_year = $sysdate->SYSDATE_YYYY;
            
            if($cp_year < $cur_year) {
                $json = array('sts' => 0, 'msg' => 'Cannot Generate Previous Record Staff.', 'alert' => 'danger');
            } else {
                $gen_staff = $this->mdl_cpd->generateStaff($cp_scheme, $cp_year);
                // var_dump($gen_staff);

                if(!empty($gen_staff)) {
                    foreach($gen_staff as $gs) {
                        $countStaff++;

                        $sid = $gs->SM_STAFF_ID;
                        $class_code = $gs->SS_CLASS_CODE;
                        $dept_code = $gs->SM_DEPT_CODE;
                        $aca = $gs->SS_ACADEMIC;

                        $ins_staff_cpd_head = $this->mdl_cpd->insStaffCpdHead($cp_scheme, $cp_year, $sid, $class_code, $dept_code, $aca, $cp_cpd_layak, $cp_cpd_khusus_min, $cp_cpd_umum_min, $cp_cpd_teras_min, $cp_lnpt_weightage);

                        if($ins_staff_cpd_head > 0) {
                            $successInsStaff++;
                        } else {
                            $successInsStaff = 0;
                        }
                    }

                    if($countStaff == $successInsStaff) {
                        $success1 = 1;
                        $insStaffMsg = 'Successfully generate staff';
                    } else {
                        $insStaffMsg = 'Fail to generate staff';
                    }
                } else {
                    $success1 = 2;
                    $insStaffMsg = 'Cannot generate staff or staff already generated.';
                }

                if($success1 == 1) {
                    $upd_staff = $this->mdl_cpd->getUpdCpdStaff($cp_scheme, $cp_year);
                    // var_dump($upd_staff);

                    if(!empty($upd_staff)) {
                        foreach($upd_staff as $us) {
                            $countUpdStaff++;

                            $sid = $us->SCH_STAFF_ID;
                            $prorate_svc = $us->SCH_PRORATE_SERVICE;

                            $sch_jum_khusus_min = (($prorate_svc / 12)* $cp_cpd_khusus_min);
                            $sch_jum_umum_min = (($prorate_svc / 12)* $cp_cpd_umum_min);
                            $sch_jum_teras_min = (($prorate_svc / 12)* $cp_cpd_teras_min);
                            $sch_pemberat_lpp = $cp_lnpt_weightage;

                            // var_dump($sch_jum_khusus_min);
                            $upd_staff_cpd_head = $this->mdl_cpd->updStaffCpdHead($cp_scheme, $cp_year, $sid, $sch_jum_khusus_min, $sch_jum_umum_min, $sch_jum_teras_min, $sch_pemberat_lpp);

                            if($upd_staff_cpd_head > 0) {
                                $successUpdStaff++;
                            } else {
                                $successUpdStaff = 0;
                            }
                        }

                        if($countUpdStaff == $successUpdStaff) {
                            $success2 = 1;
                            $updStaffMsg = nl2br("\r\n").'Successfully update staff CPD point.';
                        } else {
                            $updStaffMsg = nl2br("\r\n").'Fail to update staff CPD point.';
                        }
                    }
                } else {
                    $success2 = 1;
                    $updStaffMsg = '';
                } 

                if(($success1 == 1 && $success2 == 1) || ($success1 == 2 && $success2 == 1)) {
                    $json = array('sts' => 1, 'msg' => $insStaffMsg.$updStaffMsg, 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => $insStaffMsg.$updStaffMsg, 'alert' => 'danger');
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // ADD CPD COORDINATOR
    public function addCpdCoor()
    {
        $data['dept_list'] = $this->dropdown($this->mdl_cpd->getDeptList(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE CPD COORDINATOR
    public function saveCpdCoor()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'staff_id' => 'required|max_length[10]',
            'role' => 'max_length[20]',
            'role_panel' => 'max_length[200]',
            'department_1' => 'max_length[10]',
            'department_2' => 'max_length[10]',
            'department_3' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $insert = $this->mdl_cpd->saveCpdCoor($form);

            if($insert > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    // EDIT CPD COORDINATOR
    public function editCpdCoor()
    {
        $rowid = $this->input->post('rowid', true);
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);

        if(!empty($rowid) && !empty($staff_id)) {
            $data['rowid'] = $rowid;
            $data['staff_id'] = $staff_id;
            $data['staff_name'] = $staff_name;

            $data['cpd_coor_detl'] = $this->mdl_cpd->coorList($role = null, $sector = null, $rowid);
        }

        $data['dept_list'] = $this->dropdown($this->mdl_cpd->getDeptList(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE UPDATE CPD CATEGORY
    public function saveUpdCpdCoor()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'staff_id' => 'required|max_length[10]',
            'role' => 'max_length[20]',
            'role_panel' => 'max_length[200]',
            'department_1' => 'max_length[10]',
            'department_2' => 'max_length[10]',
            'department_3' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $insert = $this->mdl_cpd->saveUpdCpdCoor($form);

            if($insert > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    // DELETE CPD COORDINATOR
    public function deleteCpdCoor() {
		$this->isAjax();
		
        $rowid = $this->input->post('rowid', true);
        
        if (!empty($rowid)) {
            $del = $this->mdl_cpd->deleteCpdCoor($rowid);
        
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

     /*===============================================================
       CONFERENCE SETUP CPD (ATF097)
    ================================================================*/

    // CONFERENCE DETAIL CPD
    public function crDetailCpd()
    {
        $refid = $this->input->post('refid', true);
        $title = $this->input->post('title', true);

        if(!empty($refid)) {
            $data['refid'] = $refid; 
            $data['title'] = $title;
            $data['cr_detl'] = $this->mdl_pmp->getConferenceDetl($refid);
        } else {
            $data['refid'] = '';
            $data['title'] = '';
            $data['lvl_list'] = '';
        }

        // get level dd list
        $data['lvl_list'] = $this->dropdown($this->mdl_cpd->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE CONFERENCE DETL CPD
    public function saveConDetlCpd()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]',
            'level' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_cpd->saveConDetlCpd($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    // CONFERENCE CPD SETUP
    public function crCpdSetup()
    {
        $refid = $this->input->post('refid', true);
        $title = $this->input->post('title', true);

        if(!empty($refid)) {
            $data['refid'] = $refid; 
            $data['title'] = $title;

            $data['cr_cpd'] = $this->mdl_cpd->getCrCpdDetl($refid);
            if(!empty($data['cr_cpd'])) {
                $data['competency'] = $data['cr_cpd']->CH_COMPETENCY;
                $data['category'] = $data['cr_cpd']->CH_CATEGORY;
                $data['mark'] = $data['cr_cpd']->CH_MARK;
                $data['rep_sub'] = $data['cr_cpd']->CH_REPORT_SUBMISSION;
                $data['com'] = $data['cr_cpd']->CH_COMPULSORY;
            } else {
                $data['competency'] = '';
                $data['category'] = '';
                $data['mark'] = '';
                $data['rep_sub'] = '';
                $data['com'] = '';
            }
        } else {
            $data['refid'] = '';
            $data['competency'] = '';
            $data['category'] = '';
            $data['mark'] = '';
            $data['rep_sub'] = '';
            $data['com'] = '';
        }

        // get cpd category dd list
        $data['cpd_cat_list'] = $this->dropdown($this->mdl_cpd->cpdCategoryList(), 'CC_CATEGORY_CODE', 'CC_CATEGORY_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE INS/UPD CONFERENCE CPD SETUP
    public function saveConCpdSetup()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]',
            'competency' => 'max_length[10]',
            'category' => 'max_length[20]',
            'mark' => 'numeric|max_length[10]',
            'report_submission' => 'max_length[10]',
            'compulsory' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->mdl_cpd->getCrCpdDetl($refid);

            if(!empty($check)) {
                $update = $this->mdl_cpd->saveConCpdSetup($form);

                if($update > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $insert = $this->mdl_cpd->insConCpdSetup($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            }
            
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    // DELETE CONFERENCE CPD SETUP
    public function delConCpdSetup() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);

        if (!empty($refid)) {
            $del = $this->mdl_cpd->delConCpdSetup($refid);
    
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

    // CHECK CONFERENCE CPD
    public function checkConCpd() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);

        if (!empty($refid)) {
            $check = $this->mdl_cpd->getCrCpdDetl($refid);
    
            if (!empty($check)) {
                $json = array('sts' => 1, 'msg' => 'Record found', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'No record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // CONFERENCE ASSIGN CPD
    public function cpdInfo()
    {
        $refid = $this->input->post('refid', true);
        $title = $this->input->post('title', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['title'] = $title;
        }

        $data['cpd_detl'] = $this->mdl_cpd->getCrCpdDetl($refid);
        if(!empty($data['cpd_detl'])) {
            $data['comp'] = $data['cpd_detl']->CH_COMPETENCY;
            $data['mark'] = $data['cpd_detl']->CH_MARK;
        } else {
            $data['comp'] = '';
            $data['mark'] = '';
        }

        $data['cr_detl'] = $this->mdl_pmp->getConferenceDetl($refid);
        if(!empty($data['cr_detl'])) {
            $data['cr_dt_fr'] = $data['cr_detl']->CM_DATE_FROM;
            $data['cr_dt_to'] = $data['cr_detl']->CM_DATE_TO;
        } else {
            $data['cr_dt_fr'] = '';
            $data['cr_dt_to'] = '';
        }

        // STAFF CPD MARK LIST
        $data['stf_list'] = $this->mdl_cpd->staffCpdMarkList($refid);

        $this->render($data);
    }

    // ASSIGN CPD MARK
    public function generateCpd() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $competency = $this->input->post('competency', true);
        $mark = $this->input->post('mark', true);

        $success = 0;
        $successCpd = 0;
        $successLnpt = 0;

        $comp1 = 'KHUSUS';
        $comp2 = 'UMUM';
        $comp3 = 'TERAS';
        // $test_array = array();

        if (!empty($refid)) {

            // STAFF CPD LIST
            $staff_cpd = $this->mdl_cpd->getStaffCrCpd($refid);

            if(!empty($staff_cpd)) {
                foreach($staff_cpd as $sc) {
                    $success++;

                    $refid2 = $sc->SCM_REFID;
                    $sid = $sc->SCM_STAFF_ID;

                    // UPDATE GENERATE CPD
                    $update_cpd = $this->mdl_cpd->generateCpd($refid2, $sid, $competency, $mark);

                    if($update_cpd > 0) {
                        $successCpd++;
                    } else {
                        $successCpd = 0;
                    }

                    // TRANSFER INTO STAFF_CPD_HEAD
                    $cpd_point_info = $this->mdl_cpd->getCpdPointInfo($sid);

                    if(!empty($cpd_point_info)) {
                        $sch_jum_cpd = (float)$cpd_point_info->SCH_JUM_CPD;
                        $sch_cpd_layak = (float)$cpd_point_info->SCH_CPD_LAYAK;
                        $lnptweightage = (float)$cpd_point_info->CP_LNPT_WEIGHTAGE;
                        $sch_jum_khusus_min = (float)$cpd_point_info->SCH_JUM_KHUSUS_MIN;
                        $sch_jum_umum_min = (float)$cpd_point_info->SCH_JUM_UMUM_MIN;
                        $sch_jum_khusus = (float)$cpd_point_info->SCH_JUM_KHUSUS;
                        $sch_jum_umum = (float)$cpd_point_info->SCH_JUM_UMUM;
                        $sch_jum_teras_min = (float)$cpd_point_info->SCH_JUM_TERAS_MIN;
                        $sch_jum_teras = (float)$cpd_point_info->SCH_JUM_TERAS;
                        $cp_umum_mandatory = (float)$cpd_point_info->CP_UMUM_MANDATORY;
                        $sch_prorate_service = (float)$cpd_point_info->SCH_PRORATE_SERVICE;
                    } else {
                        $sch_jum_cpd = 0;
                        $sch_cpd_layak = 0;
                        $lnptweightage = 0;
                        $sch_jum_khusus_min = 0;
                        $sch_jum_umum_min = 0;
                        $sch_jum_khusus = 0;
                        $sch_jum_umum = 0;
                        $sch_jum_teras_min = 0;
                        $sch_jum_teras = 0;
                        $cp_umum_mandatory = 0;
                        $sch_prorate_service = 0;
                    }
                    
                    $curr_date = $this->mdl_cpd->getCurDate(); 
                    if(!empty($curr_date)) {
                        $sys_yyyy = $curr_date->SYSDATE_YYYY;
                    } else {
                        $sys_yyyy = '';
                    }

                    // CPD KHUSUS
                    $ttlReqCpdKhu = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp1);
                    if (!empty($ttlReqCpdKhu)) {
                        $jkhu = $ttlReqCpdKhu['REQ_CPD'];
                    } else {
                        $jkhu = 0;
                    }

                    // CPD UMUM
                    $ttlReqCpdUm = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp2);
                    if (!empty($ttlReqCpdUm)) {
                        $jumum = (float)$ttlReqCpdUm['REQ_CPD'];
                    } else {
                        $jumum = 0;
                    }

                    // CPD TERAS
                    $ttlReqCpdTr = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp3);
                    if (!empty($ttlReqCpdTr)) {
                        $jteras = $ttlReqCpdTr['REQ_CPD'];
                    } else {
                        $jteras = 0;
                    }

                    // TOTAL UMUM COMPETENCY
                    $ttlUmComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp2);
                    if (!empty($ttlUmComp)) {
                        $total_jumum = $ttlUmComp['TTL_CPD'];
                    } else {
                        $total_jumum = 0;
                    }

                    // TOTAL TERAS COMPETENCY
                    $ttlTrComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp3);
                    if (!empty($ttlTrComp)) {
                        $total_jteras = $ttlTrComp['TTL_CPD'];
                    } else {
                        $total_jteras = 0;
                    }

                    // TOTAL TERAS COMPETENCY
                    $ttlKhuComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp1);
                    if (!empty($ttlKhuComp)) {
                        $total_jkhu = $ttlKhuComp['TTL_CPD'];
                    } else {
                        $total_jkhu = 0;
                    }

                    $jum_cpd = $total_jkhu+$total_jumum+$total_jteras;

                    // $test_array [] = $total_cpd;                    
                    // var_dump($ttlReqCpd);

                    if($jkhu <= $sch_jum_khusus_min) {
                        $jkhu = $jkhu;
                    } else {
                        $jkhu = $sch_jum_khusus_min;
                    }


                    if($jteras <= $sch_jum_teras_min) {
                        $jteras = $jteras;
                    } else {
                        $jteras = $sch_jum_teras_min;
                    }
                    
                    $jumum_mandatory = ($sch_prorate_service/12)*$cp_umum_mandatory;

                    // $jumum 1
                    if($jumum >= $jumum_mandatory && $total_jumum >= $sch_jum_umum_min) {
                        $jumum = $sch_jum_umum_min;
                    }

                    // $jumum 2
                    if($jumum < $jumum_mandatory && $total_jumum >= $sch_jum_umum_min) {
                        $jumum = $jumum+($sch_jum_umum_min - $jumum_mandatory);
                    }

                    // $jumum 3
                    if($jumum == 0 && $total_jumum >= $sch_jum_umum_min) {
                        $jumum = $sch_jum_umum_min - $jumum_mandatory;
                    }

                    // $jumum 4
                    if($jumum == 0 && $total_jumum < $sch_jum_umum_min) {
                        $jumum = $total_jumum-($sch_jum_umum_min - $jumum_mandatory);
                        if($jumum > ($sch_jum_umum_min - $jumum_mandatory)) {
                            $jumum = $sch_jum_umum_min - $jumum_mandatory;
                        } else {
                            $jumum = $jumum;
                        }
                    }

                    // $total_jumum 1
                    if($jumum < $jumum_mandatory && $total_jumum < $sch_jum_umum_min) {
                        $total_jumum = $total_jumum-($sch_jum_umum_min - $jumum_mandatory);
                        if($total_jumum > ($sch_jum_umum_min - $jumum_mandatory)) {
                            $total_jumum = $sch_jum_umum_min - $jumum_mandatory;
                        } else {
                            $total_jumum = $total_jumum;
                        }
                    }

                    // $jumum 5
                    if($jumum <= 0) {
                        $jumum = 0;
                    }
                    
                    $jumum = round($jumum, 2);

                    if(($jumum+$jkhu+$jteras) == $sch_cpd_layak) {
                        $res = $lnptweightage;
                    } else {
                        $res = 0;
                    }

                    // UPDATE LNPT INFO
                    $upd_lnpt_info = $this->mdl_cpd->updLnptInfo($sid, $jkhu, $jumum, $jteras, $jum_cpd, $lnptweightage, $res, $sys_yyyy);

                    if($upd_lnpt_info > 0) {
                        $successLnpt++;
                    } else {
                        $successLnpt = 0;
                    }

                    // $test_array [] = $res; 
                }
                // var_dump($test_array);
            } 

            if ($success == $successCpd && $success == $successLnpt) {
                $json = array('sts' => 1, 'msg' => 'Process completed successfully.', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to generate CPD / cannot update some records.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // GET CURRENT YEAR
    public function validateCrDate() {
        $this->isAjax();
        
        $curr_date = $this->mdl_cpd->getCurDate(); 
        if(!empty($curr_date)) {
            $sys_yyyy = $curr_date->SYSDATE_YYYY;
            $json = array('sts' => 1, 'msg' => 'Current year.', 'alert' => 'success', 'sys_yyyy' => $sys_yyyy);
        } else {
            $sys_yyyy = '';
            $json = array('sts' => 0, 'msg' => 'Current year is empty.', 'alert' => 'danger', 'sys_yyyy' => $sys_yyyy);
        }

        echo json_encode($json);
    }

    // UPDATE CPD INFO STAFF
    public function updateCpd()
    {
        $refid = $this->input->post('refid', true);
        $title = $this->input->post('title', true);
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
        } else {
            $data['refid'] = '';
        }

        if(!empty($title)) {
            $data['title'] = $title;
        } else {
            $data['title'] = '';
        }

        if(!empty($staff_id)) {
            $data['staff_id'] = $staff_id;
        } else {
            $data['staff_id'] = '';
        }

        if(!empty($staff_name)) {
            $data['staff_name'] = $staff_name;
        } else {
            $data['staff_name'] = '';
        }

        // STAFF CPD DETL
        $data['scm_detl'] = $this->mdl_cpd->getStaffCpdDetl($refid, $staff_id);
        if(!empty($data['scm_detl'])) {
            $data['comp'] = $data['scm_detl']->SCM_CPD_COMPETENCY;
            $data['mark'] = $data['scm_detl']->SCM_CPD_MARK;
        } else {
            $data['comp'] = '';
            $data['mark'] = '';
        }

        $this->render($data);
    }

    // SAVE CPD INFO STAFF
    public function saveStaffUpdateCpd()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]',
            'staff_id' => 'required|max_length[10]',
            'mark' => 'numeric|max_length[40]',
            'competency' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_cpd->saveStaffUpdateCpd($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    /*===============================================================
       STAFF CPD SETUP (ATF122)
    ================================================================*/

    // LIST STAFF CPD
    public function getStaffCpdSetupList()
    {
        $year = $this->input->post('year', true);
        $department = $this->input->post('department', true);
        $idName = $this->input->post('idName', true);


        // STAFF CPD LIST
        $data['s_cpd'] = $this->mdl_cpd->getStaffCpdSetupList($year, $department, $idName);
        
        $this->render($data);
    }

    // UPDATE STAFF CPD POINT
    public function updateStfCpdPoint()
    {
        $staff_id = $this->input->post('staff_id', true);
        // $staff_name = $this->input->post('staff_name', true);
        $selc_date = $this->input->post('selc_date', true);

        if(!empty($staff_id) && !empty($selc_date)) {
            $data['staff_id'] = $staff_id;
            // $data['staff_name'] = $staff_name;
            $data['year'] = $selc_date;

            // STAFF CPD DETL
            $data['s_cpd_detl'] = $this->mdl_cpd->getStaffCpdPointDetl($staff_id, $selc_date);
        } 
        
        $this->render($data);
    }

    // SAVE UPDATE STAFF CPD POINT
    public function saveUpdStfCpdPoint()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $sid = $form['staff_id'];
        $year = $form['year'];
        $sname = $form['sname'];

        $successCpdPts = 0;
        $successLnpt = 0;
        $msgCpdPts = '';
        $msgLnpt = '';

        // form / input validation
        $rule = array(
            'year' => 'max_length[30]',
            'staff_id' => 'max_length[10]',
            'prorate_service_month' => 'numeric|max_length[40]',
            'cpd_layak' => 'numeric|max_length[40]',
            'jumlah_khusus_min' => 'numeric|max_length[40]',
            'jumlah_umum_min' => 'numeric|max_length[40]',
            'jumlah_teras_min' => 'numeric|max_length[40]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_cpd->saveUpdStfCpdPoint($form);

            if($update > 0) {
                $successCpdPts++;
                $msgCpdPts = 'Record has been saved';

                $comp1 = 'KHUSUS';
                $comp2 = 'UMUM';
                $comp3 = 'TERAS';

                // TRANSFER INTO STAFF_CPD_HEAD
                $cpd_point_info = $this->mdl_cpd->getCpdPointInfo($sid);

                if(!empty($cpd_point_info)) {
                    $sch_jum_cpd = (float)$cpd_point_info->SCH_JUM_CPD;
                    $sch_cpd_layak = (float)$cpd_point_info->SCH_CPD_LAYAK;
                    $lnptweightage = (float)$cpd_point_info->CP_LNPT_WEIGHTAGE;
                    $sch_jum_khusus_min = (float)$cpd_point_info->SCH_JUM_KHUSUS_MIN;
                    $sch_jum_umum_min = (float)$cpd_point_info->SCH_JUM_UMUM_MIN;
                    $sch_jum_khusus = (float)$cpd_point_info->SCH_JUM_KHUSUS;
                    $sch_jum_umum = (float)$cpd_point_info->SCH_JUM_UMUM;
                    $sch_jum_teras_min = (float)$cpd_point_info->SCH_JUM_TERAS_MIN;
                    $sch_jum_teras = (float)$cpd_point_info->SCH_JUM_TERAS;
                    $cp_umum_mandatory = (float)$cpd_point_info->CP_UMUM_MANDATORY;
                    $sch_prorate_service = (float)$cpd_point_info->SCH_PRORATE_SERVICE;
                } else {
                    $sch_jum_cpd = 0;
                    $sch_cpd_layak = 0;
                    $lnptweightage = 0;
                    $sch_jum_khusus_min = 0;
                    $sch_jum_umum_min = 0;
                    $sch_jum_khusus = 0;
                    $sch_jum_umum = 0;
                    $sch_jum_teras_min = 0;
                    $sch_jum_teras = 0;
                    $cp_umum_mandatory = 0;
                    $sch_prorate_service = 0;
                }
                
                $curr_date = $this->mdl_cpd->getCurDate(); 
                if(!empty($curr_date)) {
                    $sys_yyyy = $curr_date->SYSDATE_YYYY;
                } else {
                    $sys_yyyy = '';
                }

                // CPD KHUSUS
                $ttlReqCpdKhu = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp1);
                if (!empty($ttlReqCpdKhu)) {
                    $jkhu = $ttlReqCpdKhu['REQ_CPD'];
                } else {
                    $jkhu = 0;
                }

                // CPD UMUM
                $ttlReqCpdUm = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp2);
                if (!empty($ttlReqCpdUm)) {
                    $jumum = (float)$ttlReqCpdUm['REQ_CPD'];
                } else {
                    $jumum = 0;
                }

                // CPD TERAS
                $ttlReqCpdTr = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp3);
                if (!empty($ttlReqCpdTr)) {
                    $jteras = $ttlReqCpdTr['REQ_CPD'];
                } else {
                    $jteras = 0;
                }

                // TOTAL UMUM COMPETENCY
                $ttlUmComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp2);
                if (!empty($ttlUmComp)) {
                    $total_jumum = $ttlUmComp['TTL_CPD'];
                } else {
                    $total_jumum = 0;
                }

                // TOTAL TERAS COMPETENCY
                $ttlTrComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp3);
                if (!empty($ttlTrComp)) {
                    $total_jteras = $ttlTrComp['TTL_CPD'];
                } else {
                    $total_jteras = 0;
                }

                // TOTAL TERAS COMPETENCY
                $ttlKhuComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp1);
                if (!empty($ttlKhuComp)) {
                    $total_jkhu = $ttlKhuComp['TTL_CPD'];
                } else {
                    $total_jkhu = 0;
                }

                $jum_cpd = $total_jkhu+$total_jumum+$total_jteras;

                // $test_array [] = $total_cpd;                    
                // var_dump($ttlReqCpd);

                if($jkhu <= $sch_jum_khusus_min) {
                    $jkhu = $jkhu;
                } else {
                    $jkhu = $sch_jum_khusus_min;
                }


                if($jteras <= $sch_jum_teras_min) {
                    $jteras = $jteras;
                } else {
                    $jteras = $sch_jum_teras_min;
                }
                
                $jumum_mandatory = ($sch_prorate_service/12)*$cp_umum_mandatory;

                // $jumum 1
                if($jumum >= $jumum_mandatory && $total_jumum >= $sch_jum_umum_min) {
                    $jumum = $sch_jum_umum_min;
                }

                // $jumum 2
                if($jumum < $jumum_mandatory && $total_jumum >= $sch_jum_umum_min) {
                    $jumum = $jumum+($sch_jum_umum_min - $jumum_mandatory);
                }

                // $jumum 3
                if($jumum == 0 && $total_jumum >= $sch_jum_umum_min) {
                    $jumum = $sch_jum_umum_min - $jumum_mandatory;
                }

                // $jumum 4
                if($jumum == 0 && $total_jumum < $sch_jum_umum_min) {
                    $jumum = $total_jumum-($sch_jum_umum_min - $jumum_mandatory);
                    if($jumum > ($sch_jum_umum_min - $jumum_mandatory)) {
                        $jumum = $sch_jum_umum_min - $jumum_mandatory;
                    } else {
                        $jumum = $jumum;
                    }
                }

                // $total_jumum 1
                if($jumum < $jumum_mandatory && $total_jumum < $sch_jum_umum_min) {
                    $total_jumum = $total_jumum-($sch_jum_umum_min - $jumum_mandatory);
                    if($total_jumum > ($sch_jum_umum_min - $jumum_mandatory)) {
                        $total_jumum = $sch_jum_umum_min - $jumum_mandatory;
                    } else {
                        $total_jumum = $total_jumum;
                    }
                    $jumum = $jumum+$total_jumum;
                }

                // $jumum 5
                if($jumum <= 0) {
                    $jumum = 0;
                }
                
                $jumum = round($jumum, 2);

                if(($jumum+$jkhu+$jteras) == $sch_cpd_layak) {
                    $res = $lnptweightage;
                } else {
                    $res = 0;
                }

                // UPDATE LNPT INFO
                $upd_lnpt_info = $this->mdl_cpd->updLnptInfo($sid, $jkhu, $jumum, $jteras, $jum_cpd, $lnptweightage, $res, $sys_yyyy);

                if($upd_lnpt_info > 0) {
                    $successLnpt++;
                    $msgLnpt = nl2br("\r\n").'<i class="fa fa-check"></i> <b>Success</b> Record has been saved (STAFF CPD MAIN)';
                    
                } else {
                    $successLnpt = 0;
                    $msgLnpt = nl2br("\r\n").'<font color="red"><i class="fa fa-times"></i> <font color="red"><b>Fail</b> Fail to save record (STAFF CPD MAIN) </font>';
                }

            } else {
                $successCpdPts = 0;
                $msgCpdPts = 'Fail to save record';
            }


            if($successCpdPts == $successLnpt) {
                $stf_row = $this->mdl_cpd->getStaffCpdPointDetl($sid, $year);
                $json = array('sts' => 1, 'msg' => $msgCpdPts.$msgLnpt, 'alert' => 'success', 'stf_row' => $stf_row, 'sid' => $sid, 'year' => $year, 'sname' => $sname);
            } else {
                $json = array('sts' => 0, 'msg' => $msgCpdPts.$msgLnpt, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    // VIEW DETAIL
    public function getStaffCpdPointDetlList()
    {
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);
        $year = $this->input->post('selc_date', true);

        $data['staff_id'] = $staff_id;
        $data['staff_name'] = $staff_name;
        $data['year'] = $year;

        // VIEW DETAIL
        $data['s_cpd_pt_detl'] = $this->mdl_cpd->getStaffCpdPointDetlList($staff_id, $year);

        // VIEW ACCU CPD & REQ CPD
        $data['req_accu_cpd'] = $this->mdl_cpd->getReqAccuCpd($staff_id, $year);
        
        $this->render($data);
    }

    /*===============================================================
       STAFF CPD MANUAL ENTRY (ATF149)
    ================================================================*/

    // LIST UNREG STAFF
    public function getUnregStaff()
    {
        $year = $this->input->post('year', true);
        $department = $this->input->post('department', true);


        // LIST UNREGISTERED STAFF
        $data['unreg_stf'] = $this->mdl_cpd->getUnregStaff($year, $department);
        
        $this->render($data);
    }

    // CREATE STAFF CPD
    public function regStaffCpd()
    {  
        $this->isAjax();

        $year = $this->input->post('year', true);
        $staff_id = $this->input->post('staff_id', true);
        $dept = $this->input->post('dept', true);
        $job_code = $this->input->post('job_code', true);

        if(!empty($year) && !empty($staff_id)) {
            $check = $this->mdl_cpd->getStaffCpdHeadDetl($staff_id, $year);

            if(empty($check)) {
                // STAFF INFO
                $stf_info = $this->mdl_cpd->getStaffDetl($job_code);
                if(!empty($stf_info)) {
                    $scheme = $stf_info->SS_CLASS_CODE;
                    $kumpp = $stf_info->SS_SERVICE_KUMPP;
                    $academic = $stf_info->SS_ACADEMIC;
                } else {
                    $scheme = '';
                    $kumpp = '';
                    $academic = '';
                }

                // INSERT STAFF CPD HEAD - MANUAL ENTRY
                $insStaffCpd = $this->mdl_cpd->insStaffCpdHeadManEnt($year, $staff_id, $scheme, $kumpp, $dept, $academic);

                if($insStaffCpd > 0) {
                    $json = array('sts' => 1, 'msg' => 'Staff has been registered.', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to register staff', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // UPDATE CPD INFO
    public function updCpdInfo()
    {
        $year = $this->input->post('year', true);
        $staff_id = $this->input->post('staff_id', true);

        if(!empty($staff_id) && !empty($year)) {
            $data['year'] = $year;
            $data['staff_id'] = $staff_id;
            $data['stf_info'] = $this->mdl_cpd->getStaffCpdHeadDetl($staff_id, $year);
        }
        
        $this->render($data);
    }

    // CALCULATE STAFF CPD
    public function calculateUpdStaffCpd()
    {  
        $this->isAjax();

        $year = $this->input->post('year', true);
        $staff_id = $this->input->post('staff_id', true);
        $prorate_svc = $this->input->post('prorate_svc', true);
        $kump = $this->input->post('kump', true);



        if(!empty($year) && !empty($staff_id)) {

            // GET CP
            $c_2 = $this->mdl_cpd->getCp($year, $kump);
            if(!empty($c_2)) {
                $cpd_layak = (float)$c_2->CP_CPD_LAYAK;
                $cpd_khusus = (float)$c_2->CP_CPD_KHUSUS_MIN;
                $cpd_umum = (float)$c_2->CP_CPD_UMUM_MIN;
                $cpd_teras = (float)$c_2->CP_CPD_TERAS_MIN;
                $lnpt_weightage = (float)$c_2->CP_LNPT_WEIGHTAGE;
            } else {
                $cpd_layak = 0;
                $cpd_khusus = 0;
                $cpd_umum = 0;
                $cpd_teras = 0;
                $lnpt_weightage = 0;
            }

            // GET TOTAL CPD MARK
            $c_jum = $this->mdl_cpd->getSumCpdMark($year, $staff_id);
            if(!empty($c_jum)) {
                $jum_cpd = (float)$c_jum->TTL_CPD_MARK;
            } else {
                $jum_cpd = 0;
            }

            // GET TOTAL CPD MARK 2
            $c_khusus = $this->mdl_cpd->getSumCpdMark2($year, $staff_id);
            if(!empty($c_khusus)) {
                $jum_khusus = (float)$c_khusus->TTL_CPD_MARK2;
            } else {
                $jum_khusus = 0;
            }

            // GET TOTAL CPD MARK 3
            $c_umum = $this->mdl_cpd->getSumCpdMark3($year, $staff_id);
            if(!empty($c_umum)) {
                $jum_umum = (float)$c_umum->TTL_CPD_MARK3;
            } else {
                $jum_umum = 0;
            }

            // GET TOTAL CPD MARK 4
            $c_teras = $this->mdl_cpd->getSumCpdMark4($year, $staff_id);
            if(!empty($c_teras)) {
                $jum_teras = (float)$c_teras->TTL_CPD_MARK4;
            } else {
                $jum_teras = 0;
            }

            $sch_cpd_layak = round($prorate_svc/12*$cpd_layak,2);
            $sch_jum_khusus_min = round($prorate_svc/12*$cpd_khusus,2);
            $sch_jum_umum_min = round($prorate_svc/12*$cpd_umum, 2);
            $sch_jum_teras_min = round($prorate_svc/12*$cpd_teras, 2);

            $sch_jum_cpd = $jum_cpd;
            $sch_jum_khusus = $jum_khusus;
            $sch_jum_umum = $jum_umum;
            $sch_jum_teras = $jum_teras;
            $sch_pemberat_lpp = $lnpt_weightage;

            if(($sch_jum_khusus >= $sch_jum_khusus_min) || (($sch_jum_khusus+$sch_jum_teras) >= $sch_jum_khusus_min) AND ($sch_jum_umum >= $sch_jum_umum_min)) {
                $res = $lnpt_weightage;
            } else {
                $res = 0;
            }

            $sch_peratus_lpp = round($res, 2);

            
            $json = array('sts' => 1, 'msg' => 'Values', 'alert' => 'success', 'sch_pemberat_lpp' => $sch_pemberat_lpp, 'sch_peratus_lpp' => $sch_peratus_lpp, 'sch_jum_khusus_min' => $sch_jum_khusus_min, 'sch_jum_umum_min' => $sch_jum_umum_min, 'sch_jum_teras_min' => $sch_jum_teras_min, 'sch_cpd_layak' => $sch_cpd_layak, 'sch_jum_khusus' => $sch_jum_khusus, 'sch_jum_umum' => $sch_jum_umum, 'sch_jum_teras' => $sch_jum_teras, 'sch_jum_cpd' => $sch_jum_cpd);

        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
        
         
        echo json_encode($json);
    }

    // SAVE UPDATE CPD INFO
    public function saveUpdCpdPointInfo()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'year' => 'required|max_length[4]',
            'staff_id' => 'required|max_length[10]',
            'scheme' => 'max_length[10]',
            'kump' => 'max_length[10]',
            'prorate_service' => 'numeric|max_length[40]',
            'pemberat_lnpt' => 'numeric|max_length[40]',
            'peratus_lnpt' => 'numeric|max_length[40]',
            'jumlah_khusus_min' => 'numeric|max_length[40]',
            'jumlah_umum_min' => 'numeric|max_length[40]',
            'jumlah_teras_min' => 'numeric|max_length[40]',
            'cpd_layak' => 'numeric|max_length[40]',
            'jumlah_khusus' => 'numeric|max_length[40]',
            'jumlah_umum' => 'numeric|max_length[40]',
            'jumlah_teras' => 'numeric|max_length[40]',
            'jumlah_cpd' => 'numeric|max_length[40]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_cpd->saveUpdCpdPointInfo($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
         
        echo json_encode($json);
    }

    /*===============================================================
       UPDATE CPD INFO - ATF123
    ================================================================*/

    // UPDATE CPD INFO
    public function ATF123()
    {
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {

            $data['refid'] = $refid;

            // TRAINING INFO
            $data['tr_detl'] = $this->mdl_cpd->getTrainingDetl($refid);

            // STAFF CPD MARK LIST
            $data['stf_list'] = $this->mdl_cpd->getStaffTrCpd($refid);
        }
        
        $this->render($data);
    }

    // UPDATE TR CPD INFO STAFF
    public function updateTrCpd()
    {
        $refid = $this->input->post('refid', true);
        $title = $this->input->post('title', true);
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
        } else {
            $data['refid'] = '';
        }

        if(!empty($title)) {
            $data['title'] = $title;
        } else {
            $data['title'] = '';
        }

        if(!empty($staff_id)) {
            $data['staff_id'] = $staff_id;
        } else {
            $data['staff_id'] = '';
        }

        if(!empty($staff_name)) {
            $data['staff_name'] = $staff_name;
        } else {
            $data['staff_name'] = '';
        }

        // STAFF CPD DETL
        $data['sth_detl'] = $this->mdl_cpd->updateTrCpd($refid, $staff_id);
        if(!empty($data['sth_detl'])) {
            $data['comp'] = $data['sth_detl']->STH_CPD_COMPETENCY;
            $data['mark'] = $data['sth_detl']->STH_CPD_MARK;
        } else {
            $data['comp'] = '';
            $data['mark'] = '';
        }

        $this->render($data);
    }

    // VALIDATE UPDATE
    public function validateUpdateTrCpd() 
    {
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        
        // EVA START
        $eva_start = $this->mdl_cpd->getEvaStart(); 
        if(!empty($eva_start->HP_PARM_DESC)) {
            $dt = $eva_start->HP_PARM_DESC;
            $date = explode('/', $dt);
            $date_combo = $date[2];
            $eva_start_dt = (int)$date_combo;
            $current_year = (int)$eva_start->CURR_YEAR;
        } else {
            $eva_start_dt = 0;
            $current_year = 0;
        }

        // COUNT TR DETL
        $count = $this->mdl_cpd->getCountTrDetl($refid); 
        if(!empty($count)) {
            $getC = (int)$count->COUNT_G;
        } else {
            $getC = 0;
        }

        // TR DETL
        $tr_detl = $this->mdl_cpd->getTrainingDetl($refid); 
        if(!empty($tr_detl)) {
            $dt = $tr_detl->TH_DATE_FROM;
            $date = explode('/', $dt);
            $date_combo = $date[2];
            $th_date_from = (int)$date_combo;
        } else {
            $th_date_from = 0;
        }

        // STH DETL
        $sth_detl = $this->mdl_cpd->getSthDetl($refid, $staff_id); 
        if(!empty($sth_detl)) {
            $sth_hod_evaluation = $sth_detl->STH_HOD_EVALUATION;
        } else {
            $sth_hod_evaluation = '';
        }

        // var_dump($current_date);
        // exit;

        /*if($sth_hod_evaluation == 'N' && ($th_date_from >= $eva_start_dt) && $getC > 0) {
            $json = array('sts' => 0, 'msg' => 'Cannot update CPD mark', 'alert' => 'success');

        } elseif ($sth_hod_evaluation == 'Y' && ($th_date_from >= $eva_start_dt) && $getC > 0 || ($th_date_from >= $eva_start_dt) && $getC == 0 || ($th_date_from < $eva_start_dt) && ($getC == 0 || $getC > 0 )) {
            if($th_date_from == $current_year) {
                $json = array('sts' => 1, 'msg' => 'Update', 'alert' => 'danger');
            } else {
                $json = array('sts' => 1, 'msg' => 'Cannot update CPD from previous year', 'alert' => 'danger');
            }
        }*/

        if($sth_hod_evaluation == 'N' && ($th_date_from >= $eva_start_dt) && $getC > 0) {
            $json = array('sts' => 0, 'msg' => 'Cannot update CPD mark', 'alert' => 'success');

        } elseif ($sth_hod_evaluation == 'Y' && ($th_date_from >= $eva_start_dt) && $getC > 0 || ($th_date_from >= $eva_start_dt) && $getC == 0 || ($th_date_from < $eva_start_dt) && ($getC == 0 || $getC > 0 )) {
            if($th_date_from == $current_year) {
                $json = array('sts' => 1, 'msg' => 'Update', 'alert' => 'danger');
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot update CPD mark', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => 'Cannot update CPD mark', 'alert' => 'danger');
        }

        echo json_encode($json);
    }

    // SAVE UPDATE STAFF CPD MARK
    public function saveStaffUpdateCpdMark()
    {  
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]',
            'staff_id' => 'required|max_length[10]',
            'mark' => 'numeric|max_length[40]',
            'competency' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_cpd->saveStaffUpdateCpdMark($form);

            $comp1 = 'KHUSUS';
            $comp2 = 'UMUM';
            $comp3 = 'TERAS';
            $sid = $form['staff_id'];

            // TRANSFER INTO STAFF_CPD_HEAD
            $cpd_point_info = $this->mdl_cpd->getCpdPointInfo($sid);

            if(!empty($cpd_point_info)) {
                $sch_jum_cpd = (float)$cpd_point_info->SCH_JUM_CPD;
                $sch_cpd_layak = (float)$cpd_point_info->SCH_CPD_LAYAK;
                $lnptweightage = (float)$cpd_point_info->CP_LNPT_WEIGHTAGE;
                $sch_jum_khusus_min = (float)$cpd_point_info->SCH_JUM_KHUSUS_MIN;
                $sch_jum_umum_min = (float)$cpd_point_info->SCH_JUM_UMUM_MIN;
                $sch_jum_khusus = (float)$cpd_point_info->SCH_JUM_KHUSUS;
                $sch_jum_umum = (float)$cpd_point_info->SCH_JUM_UMUM;
                $sch_jum_teras_min = (float)$cpd_point_info->SCH_JUM_TERAS_MIN;
                $sch_jum_teras = (float)$cpd_point_info->SCH_JUM_TERAS;
                $cp_umum_mandatory = (float)$cpd_point_info->CP_UMUM_MANDATORY;
                $sch_prorate_service = (float)$cpd_point_info->SCH_PRORATE_SERVICE;
            } else {
                $sch_jum_cpd = 0;
                $sch_cpd_layak = 0;
                $lnptweightage = 0;
                $sch_jum_khusus_min = 0;
                $sch_jum_umum_min = 0;
                $sch_jum_khusus = 0;
                $sch_jum_umum = 0;
                $sch_jum_teras_min = 0;
                $sch_jum_teras = 0;
                $cp_umum_mandatory = 0;
                $sch_prorate_service = 0;
            }
            
            $curr_date = $this->mdl_cpd->getCurDate(); 
            if(!empty($curr_date)) {
                $sys_yyyy = $curr_date->SYSDATE_YYYY;
            } else {
                $sys_yyyy = '';
            }

            // CPD KHUSUS
            $ttlReqCpdKhu = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp1);
            if (!empty($ttlReqCpdKhu)) {
                $jkhu = $ttlReqCpdKhu['REQ_CPD'];
            } else {
                $jkhu = 0;
            }

            // CPD UMUM
            $ttlReqCpdUm = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp2);
            if (!empty($ttlReqCpdUm)) {
                $jumum = (float)$ttlReqCpdUm['REQ_CPD'];
            } else {
                $jumum = 0;
            }

            // CPD TERAS
            $ttlReqCpdTr = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp3);
            if (!empty($ttlReqCpdTr)) {
                $jteras = $ttlReqCpdTr['REQ_CPD'];
            } else {
                $jteras = 0;
            }

            // TOTAL UMUM COMPETENCY
            $ttlUmComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp2);
            if (!empty($ttlUmComp)) {
                $total_jumum = $ttlUmComp['TTL_CPD'];
            } else {
                $total_jumum = 0;
            }

            // TOTAL TERAS COMPETENCY
            $ttlTrComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp3);
            if (!empty($ttlTrComp)) {
                $total_jteras = $ttlTrComp['TTL_CPD'];
            } else {
                $total_jteras = 0;
            }

            // TOTAL TERAS COMPETENCY
            $ttlKhuComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp1);
            if (!empty($ttlKhuComp)) {
                $total_jkhu = $ttlKhuComp['TTL_CPD'];
            } else {
                $total_jkhu = 0;
            }

            $jum_cpd = $total_jkhu+$total_jumum+$total_jteras;

            // $test_array [] = $total_cpd;                    
            // var_dump($ttlReqCpd);

            if($jkhu <= $sch_jum_khusus_min) {
                $jkhu = $jkhu;
            } else {
                $jkhu = $sch_jum_khusus_min;
            }


            if($jteras <= $sch_jum_teras_min) {
                $jteras = $jteras;
            } else {
                $jteras = $sch_jum_teras_min;
            }
            
            $jumum_mandatory = ($sch_prorate_service/12)*$cp_umum_mandatory;

            // $jumum 1
            if($jumum >= $jumum_mandatory && $total_jumum >= $sch_jum_umum_min) {
                $jumum = $sch_jum_umum_min;
            }

            // $jumum 2
            if($jumum < $jumum_mandatory && $total_jumum >= $sch_jum_umum_min) {
                $jumum = $jumum+($sch_jum_umum_min - $jumum_mandatory);
            }

            // $jumum 3
            if($jumum == 0 && $total_jumum >= $sch_jum_umum_min) {
                $jumum = $sch_jum_umum_min - $jumum_mandatory;
            }

            // $jumum 4
            if($jumum == 0 && $total_jumum < $sch_jum_umum_min) {
                $jumum = $total_jumum-($sch_jum_umum_min - $jumum_mandatory);
                if($jumum > ($sch_jum_umum_min - $jumum_mandatory)) {
                    $jumum = $sch_jum_umum_min - $jumum_mandatory;
                } else {
                    $jumum = $jumum;
                }
            }

            // $total_jumum 1
            if($jumum < $jumum_mandatory && $total_jumum < $sch_jum_umum_min) {
                $total_jumum = $total_jumum-($sch_jum_umum_min - $jumum_mandatory);
                if($total_jumum > ($sch_jum_umum_min - $jumum_mandatory)) {
                    $total_jumum = $sch_jum_umum_min - $jumum_mandatory;
                } else {
                    $total_jumum = $total_jumum;
                }
                $jumum = $jumum+$total_jumum;
            }

            // $jumum 5
            if($jumum <= 0) {
                $jumum = 0;
            }
            
            $jumum = round($jumum, 2);

            if(($jumum+$jkhu+$jteras) == $sch_cpd_layak) {
                $res = $lnptweightage;
            } else {
                $res = 0;
            }

            // UPDATE LNPT INFO
            $upd_lnpt_info = $this->mdl_cpd->updLnptInfo($sid, $jkhu, $jumum, $jteras, $jum_cpd, $lnptweightage, $res, $sys_yyyy);

            /*if($upd_lnpt_info > 0) {
                $successLnpt++;
                $msgLnpt = nl2br("\r\n").'<i class="fa fa-check"></i> <b>Success</b> Record has been saved (STAFF CPD MAIN)';
                
            } else {
                $successLnpt = 0;
                $msgLnpt = nl2br("\r\n").'<font color="red"><i class="fa fa-times"></i> <font color="red"><b>Fail</b> Fail to save record (STAFF CPD MAIN) </font>';
            }*/

            if($update > 0 && $upd_lnpt_info > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'warning');
        }
        
        echo json_encode($json);
    }

    // VALIDATE GENERATE CPD MARK
    public function validateGenerateCpdMark() {
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        
        // TH GENERATE CPD STS
        $gen_cpd = $this->mdl_cpd->getTrainingDetl($refid); 
        if(!empty($gen_cpd)) {
            $gen_cpd_sts = $gen_cpd->TH_GENERATE_CPD;
        } else {
            $gen_cpd_sts = '';
        }

        if($gen_cpd_sts == 'Y') {
            $json = array('sts' => 0, 'msg' => 'CPD already generated.', 'alert' => 'danger');
        } else {
            $json = array('sts' => 1, 'msg' => 'Continue process.', 'alert' => 'success');
        }
        echo json_encode($json);
    }

    // GENERATE CPD MARK
    public function generateCpdMark() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $competency = $this->input->post('competency', true);
        $mark = $this->input->post('mark', true);

        $success = 0;
        $successCpd = 0;
        $successLnpt = 0;
        $successThCpd = 0;

        $comp1 = 'KHUSUS';
        $comp2 = 'UMUM';
        $comp3 = 'TERAS';
        // $test_array = array();

        if (!empty($refid)) {

            // EVA START
            $eva_start = $this->mdl_cpd->getEvaStart(); 
            if(!empty($eva_start)) {
                $eva_start_dt = $eva_start->HP_PARM_DESC;
            } else {
                $eva_start_dt = '';
            }

            // STAFF CPD MARK LIST
            $staff_cpd = $this->mdl_cpd->getStaffGenMark($refid, $eva_start_dt);

            if(!empty($staff_cpd)) {
                foreach($staff_cpd as $sc) {
                    $success++;

                    $sid = $sc->STH_STAFF_ID;
                    // $sid = 'K01258';

                    // UPDATE GENERATE CPD
                    $update_cpd = $this->mdl_cpd->generateCpdMark($refid, $sid, $competency, $mark);

                    if($update_cpd > 0) {
                        $successCpd++;
                    } else {
                        $successCpd = 0;
                    }

                    // TRANSFER INTO STAFF_CPD_HEAD
                    $cpd_point_info = $this->mdl_cpd->getCpdPointInfo($sid);

                    if(!empty($cpd_point_info)) {
                        $sch_jum_cpd = (float)$cpd_point_info->SCH_JUM_CPD;
                        $sch_cpd_layak = (float)$cpd_point_info->SCH_CPD_LAYAK;
                        $lnptweightage = (float)$cpd_point_info->CP_LNPT_WEIGHTAGE;
                        $sch_jum_khusus_min = (float)$cpd_point_info->SCH_JUM_KHUSUS_MIN;
                        $sch_jum_umum_min = (float)$cpd_point_info->SCH_JUM_UMUM_MIN;
                        $sch_jum_khusus = (float)$cpd_point_info->SCH_JUM_KHUSUS;
                        $sch_jum_umum = (float)$cpd_point_info->SCH_JUM_UMUM;
                        $sch_jum_teras_min = (float)$cpd_point_info->SCH_JUM_TERAS_MIN;
                        $sch_jum_teras = (float)$cpd_point_info->SCH_JUM_TERAS;
                        $cp_umum_mandatory = (float)$cpd_point_info->CP_UMUM_MANDATORY;
                        $sch_prorate_service = (float)$cpd_point_info->SCH_PRORATE_SERVICE;
                    } else {
                        $sch_jum_cpd = 0;
                        $sch_cpd_layak = 0;
                        $lnptweightage = 0;
                        $sch_jum_khusus_min = 0;
                        $sch_jum_umum_min = 0;
                        $sch_jum_khusus = 0;
                        $sch_jum_umum = 0;
                        $sch_jum_teras_min = 0;
                        $sch_jum_teras = 0;
                        $cp_umum_mandatory = 0;
                        $sch_prorate_service = 0;
                    }
                    
                    $curr_date = $this->mdl_cpd->getCurDate(); 
                    if(!empty($curr_date)) {
                        $sys_yyyy = $curr_date->SYSDATE_YYYY;
                    } else {
                        $sys_yyyy = '';
                    }

                    // CPD KHUSUS
                    $ttlReqCpdKhu = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp1);
                    if (!empty($ttlReqCpdKhu)) {
                        // $jkhu = $ttlReqCpdKhu['REQ_CPD'];
                        $jkhu = (float)$ttlReqCpdKhu['REQ_CPD'];
                    } else {
                        $jkhu = 0;
                    }

                    // CPD UMUM
                    $ttlReqCpdUm = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp2);
                    if (!empty($ttlReqCpdUm)) {
                        $jumum = (float)$ttlReqCpdUm['REQ_CPD'];
                    } else {
                        $jumum = 0;
                    }

                    // CPD TERAS
                    $ttlReqCpdTr = $this->mdl_cpd->getTtlReqCpd($sid, $sys_yyyy, $comp3);
                    if (!empty($ttlReqCpdTr)) {
                        // $jteras = $ttlReqCpdTr['REQ_CPD'];
                        $jteras = (float)$ttlReqCpdTr['REQ_CPD'];
                    } else {
                        $jteras = 0;
                    }

                    // TOTAL UMUM COMPETENCY
                    $ttlUmComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp2);
                    if (!empty($ttlUmComp)) {
                        // $total_jumum = $ttlUmComp['TTL_CPD'];
                        $total_jumum = (float)$ttlUmComp['TTL_CPD'];
                    } else {
                        $total_jumum = 0;
                    }

                    // TOTAL TERAS COMPETENCY
                    $ttlTrComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp3);
                    if (!empty($ttlTrComp)) {
                        // $total_jteras = $ttlTrComp['TTL_CPD'];
                        $total_jteras = (float)$ttlTrComp['TTL_CPD'];
                    } else {
                        $total_jteras = 0;
                    }

                    // TOTAL TERAS COMPETENCY
                    $ttlKhuComp = $this->mdl_cpd->getTtlCpdByCom($sid, $sys_yyyy, $comp1);
                    if (!empty($ttlKhuComp)) {
                        // $total_jkhu = $ttlKhuComp['TTL_CPD'];
                        $total_jkhu = (float)$ttlKhuComp['TTL_CPD'];
                    } else {
                        $total_jkhu = 0;
                    }

                    $jum_cpd = $total_jkhu+$total_jumum+$total_jteras;

                    
                    // var_dump($jteras);
                    // var_dump($jkhu);
                    // var_dump($jumum);
                    // exit;
                    // $test_array [] = $total_cpd;                    
                    // var_dump($ttlReqCpd);

                    if($jkhu <= $sch_jum_khusus_min) {
                        $jkhu = $jkhu;
                    } else {
                        $jkhu = $sch_jum_khusus_min;
                    }


                    if($jteras <= $sch_jum_teras_min) {
                        $jteras = $jteras;
                    } else {
                        $jteras = $sch_jum_teras_min;
                    }
                    
                    $jumum_mandatory = (($sch_prorate_service/12)*$cp_umum_mandatory);

                    // $jumum 1
                    if($jumum >= $jumum_mandatory && $total_jumum >= $sch_jum_umum_min) {
                        $jumum = $sch_jum_umum_min;
                    }

                    // $jumum 2
                    if($jumum < $jumum_mandatory && $total_jumum >= $sch_jum_umum_min) {
                        $jumum = $jumum+($sch_jum_umum_min - $jumum_mandatory);
                    }

                    // $jumum 3
                    if($jumum == 0 && $total_jumum >= $sch_jum_umum_min) {
                        $jumum = $sch_jum_umum_min - $jumum_mandatory;
                    }

                    // $jumum 4
                    if($jumum == 0 && $total_jumum < $sch_jum_umum_min) {
                        $jumum = $total_jumum-($sch_jum_umum_min - $jumum_mandatory);
                        if($jumum > ($sch_jum_umum_min - $jumum_mandatory)) {
                            $jumum = $sch_jum_umum_min - $jumum_mandatory;
                        } else {
                            $jumum = $jumum;
                        }
                    }

                    // $total_jumum 1
                    if($jumum < $jumum_mandatory && $total_jumum < $sch_jum_umum_min) {
                        $total_jumum = $total_jumum-($sch_jum_umum_min - $jumum_mandatory);
                        if($total_jumum > ($sch_jum_umum_min - $jumum_mandatory)) {
                            $total_jumum = $sch_jum_umum_min - $jumum_mandatory;
                        } else {
                            $total_jumum = $total_jumum;
                        }
                        $jumum = $jumum + $total_jumum;
                    }

                    // $jumum 5
                    if($jumum <= 0) {
                        $jumum = 0;
                    }
                    
                    $jumum = round($jumum, 2);

                    if(($jumum+$jkhu+$jteras) == $sch_cpd_layak) {
                        $res = $lnptweightage;
                    } else {
                        $res = 0;
                    }

                    // var_dump($jteras);
                    // var_dump($jkhu);
                    // var_dump($jumum);
                    // exit;

                    // UPDATE LNPT INFO
                    $upd_lnpt_info = $this->mdl_cpd->updLnptInfo($sid, $jkhu, $jumum, $jteras, $jum_cpd, $lnptweightage, $res, $sys_yyyy);

                    if($upd_lnpt_info > 0) {
                        $successLnpt++;
                    } else {
                        $successLnpt = 0;
                    }

                    // $test_array [] = $res; 
                }
                // var_dump($test_array);
            } 

            // UPDATE GENERATE CPD TRAINING HEAD
            $update_gen_cpd_th = $this->mdl_cpd->updThGenCpd($refid);
            if($update_gen_cpd_th > 0) {
                $successThCpd++;
            } else {
                $successThCpd = 0;
            }

            $successThCpd++;

            if ($success == $successCpd && $success == $successLnpt && $successThCpd > 0) {
                $json = array('sts' => 1, 'msg' => 'Process completed successfully.', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to process CPD / cannot update some records.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    /*===============================================================
       CPD REPORT SUBMISSION - ATF103
    ================================================================*/

    // CONFERENCE LIST
    public function getTrainingList()
    {
        $sMonth = $this->input->post('sMonth', true);
        $sYear = $this->input->post('sYear', true);
        $refidTitle = $this->input->post('refid_title', true);
        // var_dump($sMonth);

        if($sMonth == 'CURR_M' && $sYear = 'CURR_Y') {
            $month = $this->mdl_pmp->getCurDate();
            $year = $this->mdl_pmp->getCurDate();

            $curMonth = $month->SYSDATE_MM;
            $curYear = $month->SYSDATE_YYYY;
        } else {
            $curMonth = $sMonth;
            $curYear = $sYear;
        }

        // get available records
        $data['conference_inf_list'] = $this->mdl_cpd->getTrainingList($curMonth, $curYear, $refidTitle);

        $this->render($data);
    }

    // TRAINING STAFF LIST
    public function getStaffTrainingList()
    {
        $refid = $this->input->post('refid', true);
        $trainingN = $this->input->post('trainingN', true);
        $status = $this->input->post('status', true);

        $data['status'] = $status;
    
        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['title'] = $trainingN;
        } else {
            $data['refid'] = '';
            $data['title'] = '';
        }

        // get available records
        $data['staff_list'] = $this->mdl_cpd->getStaffTrainingList($refid, $status);

        // ststus dd list
        $data['status_dd'] = array(''=>'All records', 'SUBMIT'=>'SUBMIT', 'RECOMMEND'=>'RECOMMEND', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'N'=>'NO SUBMISSION');

        $this->render($data);
    }

    // VALIDATE PRINT REPORT
    public function validateReportSub() 
    {
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        
        $count = $this->mdl_cpd->validateReportSub($refid, $staff_id); 
        if(!empty($count)) {
            $count_rep = $count->COUNT_REP;
        } else {
            $count_rep = 0;
        }

        if($count_rep > 0) {
            $json = array('sts' => 1, 'msg' => 'Print Report', 'alert' => 'success');
        } else  {
            $json = array('sts' => 0, 'msg' => 'Report has been submitted manually.', 'alert' => 'danger');
        }

        echo json_encode($json);
    }

    // REPORT SUBMISSION DETL
    public function getReportSubDetl()
    {
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);
        $refid = $this->input->post('refid', true);
        $trainingN = $this->input->post('trainingN', true);
    
        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['title'] = $trainingN;
        } else {
            $data['refid'] = '';
            $data['title'] = '';
        }

        if(!empty($staff_id)) {
            $data['staff_id'] = $staff_id;
            $data['staff_name'] = $staff_name;
        } else {
            $data['staff_id'] = '';
            $data['staff_name'] = '';
        }

        // get available records
        $data['rep_detl'] = $this->mdl_cpd->getReportSubDetl($staff_id, $refid);

        if(!empty($data['rep_detl'])) {
            $data['sub_date'] = $data['rep_detl']->STR_APPLY_DATE;
            $data['obj'] = $data['rep_detl']->STR_OBJECTIVE;
            $data['ben_stf'] = $data['rep_detl']->STR_STAFF_BENEFIT;
            $data['ben_dept'] = $data['rep_detl']->STR_DEPT_BENEFIT;
            $data['rec_id'] = $data['rep_detl']->STR_RECOMMEND_BY;
            $data['rec_name'] = $data['rep_detl']->STR_RECOMMEND_NAME;
            $data['rec_date'] = $data['rep_detl']->STR_RECOMMEND_DATE;
            $data['app_id'] = $data['rep_detl']->STR_APPROVE_BY;
            $data['app_name'] = $data['rep_detl']->STR_APPROVE_NAME;
            $data['app_date'] = $data['rep_detl']->STR_APPROVE_DATE;
        } else {
            $data['sub_date'] = '';
            $data['obj'] = '';
            $data['ben_stf'] = '';
            $data['ben_dept'] = '';
            $data['rec_id'] = '';
            $data['rec_name'] = '';
            $data['rec_date'] = '';
            $data['app_id'] = '';
            $data['app_name'] = '';
            $data['app_date'] = '';
        }


        $data['strp_detl'] = $this->mdl_cpd->getReportSubDetl2($staff_id, $refid);

        $this->render($data);
    }

    // APPROVE BY TRAINING
    public function approveRepByTr()
    {  
        $this->isAjax();

        $refidArr = $this->input->post('refidArr', true);

        $successRefid = 0;
        $successSid = 0;
        $successUpdSth = 0;
        $successUpdStr = 0;

        $successUpdSthMsg = '';
        $successUpdStrMsg = '';

        $test_array = array();
        $test_array2 = array();

        if (!empty($refidArr)) {
            foreach ($refidArr as $key => $rid) {
                $successRefid++;
                $refid = $rid;

                // TRAINING DETL
                $tr_detl = $this->mdl_cpd->getStaffTrainingList($refid);
                if(!empty($tr_detl)) {
                    foreach($tr_detl as $sl) {
                        $staff_id = $sl->STH_STAFF_ID;
                        $sth_cpd_report = $sl->STH_CPD_REPORT_APP;
                        $sth_cpd_report_date = '';

                        if($sth_cpd_report != 'Y') {
                            $successSid++;

                            if($sl->STH_CPD_REPORT == 'Y') {
                                $is_submit = 'APPROVE';
                            } else {
                                $is_submit = 'NO SUBMISSION';
                            }
        
                            if($is_submit == 'NO SUBMISSION') {
                                $submission_date = $sl->STR_APPLY_DATE;
                                $recommendation_date = $sl->STR_RECOMMEND_DATE;
        
                                if(!empty($sl->STR_STATUS)) {
                                    $sth_report_status = $sl->STR_STATUS;
                                } else {
                                    $sth_report_status = $is_submit;
                                }
                            } else {
                                $sth_report_status = $is_submit;
        
                                if($is_submit == 'APPROVE') {
                                    if(!empty($sl->STR_STATUS)) {
                                        $submission_date = $sl->STR_APPLY_DATE;
                                        $recommendation_date = $sl->STR_RECOMMEND_DATE;
                                    } else {
                                        if($sl->STH_CPD_REPORT == 'Y') {
                                            $submission_date = $sl->STH_CPD_REPORT_DATE;
                                            $recommendation_date = $sl->STH_CPD_REPORT_DATE;
                                        } else {
                                            $submission_date = $sl->STH_CPD_REPORT_DATE;
                                            $sth_report_status = 'SUBMIT';
                                        }
                                    }
                                }
                            }

                            if($sth_report_status != 'NO SUBMISSION' && $sth_report_status != 'APPROVE' && $sth_report_status != 'REJECT') {
                                $sth_cpd_report = 'Y';
                                $sth_cpd_report_date = $submission_date;
                            } else {
                                $sth_cpd_report = '';
                            }

                            // var_dump($test_array);
                            // exit;
                            // $test_array[] = $staff_id;
                            // $test_array2[] = $sth_cpd_report_date;

                            // UPDATE STH APPROVE
                            $upd_sth = $this->mdl_cpd->updAppSth($refid, $staff_id, $sth_cpd_report, $sth_cpd_report_date);
                            if($upd_sth > 0) {
                                $successUpdSth++;
                                $successUpdSthMsg = nl2br("\r\n").'Record has been updated (Staff Training)';
                            } else {
                                $successUpdSth = 0;
                                $successUpdSthMsg = nl2br("\r\n").'Fail to update (Staff Training)';
                            }

                            // UPDATE STR APPROVE
                            $upd_str = $this->mdl_cpd->updAppStr($refid, $staff_id);
                            if($upd_str > 0) {
                                $successUpdStr++;
                                $successUpdStrMsg = nl2br("\r\n").'Record has been updated (Staff Report)';
                            } else {
                                $successUpdStr = 0;
                                $successUpdStrMsg = nl2br("\r\n").'Fail to update (Staff Report)';
                            }
                        }
                    }
                    // var_dump($test_array);
                    // var_dump($test_array2);
                    // exit;
                }
            }

            if($successSid == $successUpdSth && $successSid == $successUpdStr) {
                $json = array('sts' => 1, 'msg' => 'Approval Completed'.$successUpdSthMsg.$successUpdStrMsg, 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Approval Failed'.$successUpdSthMsg.$successUpdStrMsg, 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // APPROVE BY STAFF
    public function approveRepByStf()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $sidArr = $this->input->post('sidArr', true);

        $successRefid = 0;
        $successSid = 0;
        $successUpdSth = 0;
        $successUpdStr = 0;

        $successUpdSthMsg = '';
        $successUpdStrMsg = '';

        $test_array = array();
        $test_array2 = array();

        if (!empty($sidArr)) {
            foreach ($sidArr as $key => $sid) {
                $successRefid++;
                $staff_id = $sid;

                // TRAINING STAFF DETL
                $sl = $this->mdl_cpd->getStaffTrainingDetl($refid, $staff_id);

                if(!empty($sl)) {
                    $staff_id = $sl->STH_STAFF_ID;
                    $sth_cpd_report = $sl->STH_CPD_REPORT_APP;
                    $sth_cpd_report_date = '';

                    if($sth_cpd_report != 'Y') {
                        $successSid++;

                        if($sl->STH_CPD_REPORT == 'Y') {
                            $is_submit = 'APPROVE';
                        } else {
                            $is_submit = 'NO SUBMISSION';
                        }

                        if($is_submit == 'NO SUBMISSION') {
                            $submission_date = $sl->STR_APPLY_DATE;
                            $recommendation_date = $sl->STR_RECOMMEND_DATE;

                            if(!empty($sl->STR_STATUS)) {
                                $sth_report_status = $sl->STR_STATUS;
                            } else {
                                $sth_report_status = $is_submit;
                            }
                        } else {
                            $sth_report_status = $is_submit;

                            if($is_submit == 'APPROVE') {
                                if(!empty($sl->STR_STATUS)) {
                                    $submission_date = $sl->STR_APPLY_DATE;
                                    $recommendation_date = $sl->STR_RECOMMEND_DATE;
                                } else {
                                    if($sl->STH_CPD_REPORT == 'Y') {
                                        $submission_date = $sl->STH_CPD_REPORT_DATE;
                                        $recommendation_date = $sl->STH_CPD_REPORT_DATE;
                                    } else {
                                        $submission_date = $sl->STH_CPD_REPORT_DATE;
                                        $sth_report_status = 'SUBMIT';
                                    }
                                }
                            }
                        }

                        if($sth_report_status != 'NO SUBMISSION' && $sth_report_status != 'APPROVE' && $sth_report_status != 'REJECT') {
                            $sth_cpd_report = 'Y';
                            $sth_cpd_report_date = $submission_date;
                        } else {
                            $sth_cpd_report = '';
                        }

                        // UPDATE STH APPROVE
                        $upd_sth = $this->mdl_cpd->updAppSth($refid, $staff_id, $sth_cpd_report, $sth_cpd_report_date);
                        if($upd_sth > 0) {
                            $successUpdSth++;
                            $successUpdSthMsg = nl2br("\r\n").'Record has been updated (Staff Training)';
                        } else {
                            $successUpdSth = 0;
                            $successUpdSthMsg = nl2br("\r\n").'Fail to update (Staff Training)';
                        }

                        // UPDATE STR APPROVE
                        $upd_str = $this->mdl_cpd->updAppStr($refid, $staff_id);
                        if($upd_str > 0) {
                            $successUpdStr++;
                            $successUpdStrMsg = nl2br("\r\n").'Record has been updated (Staff Report)';
                        } else {
                            $successUpdStr = 0;
                            $successUpdStrMsg = nl2br("\r\n").'Fail to update (Staff Report)';
                        }
                    }
                }

                // $test_array[] = $staff_id;
                // $test_array2[] = $sth_cpd_report_date;
            }

            // var_dump($sidArr);
            // var_dump($test_array2);
            // exit;

            if($successSid == $successUpdSth && $successSid == $successUpdStr) {
                $json = array('sts' => 1, 'msg' => 'Approval Completed'.$successUpdSthMsg.$successUpdStrMsg, 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Approval Failed'.$successUpdSthMsg.$successUpdStrMsg, 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }


    /*===============================================================
       UPDATE 09/09/2020
    ================================================================*/

    // TRAINING LIST
    public function getTrainingList2()
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
                $data['cur_usr_dept'] = $this->mdl_cpd->getCurUserDept();
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
                $data['cur_year'] = $this->mdl_cpd->getCurYear();
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
        $data['tr_list'] = $this->mdl_cpd->getTrainingList2($defIntExt, $curUsrDept, $defMonth, $curYear, $defTrSts, $evaluation, $screRpt);

        $this->render($data);
    }
}