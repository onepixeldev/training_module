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

                    // $tisch = $this->mdl_cpd->transferStaffToSCH($sid);

                    $cpd_point_info = $this->mdl_cpd->getCpdPointInfo($sid);

                    if(!empty($cpd_point_info)) {
                        $sch_jum_cpd = (int)$cpd_point_info->SCH_JUM_CPD;
                        $sch_cpd_layak = (int)$cpd_point_info->SCH_CPD_LAYAK;
                        $lnptweightage = (int)$cpd_point_info->CP_LNPT_WEIGHTAGE;
                        $sch_jum_khusus_min = (int)$cpd_point_info->SCH_JUM_KHUSUS_MIN;
                        $sch_jum_umum_min = (int)$cpd_point_info->SCH_JUM_UMUM_MIN;
                        $sch_jum_khusus = (int)$cpd_point_info->SCH_JUM_KHUSUS;
                        $sch_jum_umum = (int)$cpd_point_info->SCH_JUM_UMUM;
                        $sch_jum_teras_min = (int)$cpd_point_info->SCH_JUM_TERAS_MIN;
                        $sch_jum_teras = (int)$cpd_point_info->SCH_JUM_TERAS;
                        $cp_umum_mandatory = (int)$cpd_point_info->CP_UMUM_MANDATORY;
                        $sch_prorate_service = (int)$cpd_point_info->SCH_PRORATE_SERVICE;
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
                        $jumum = (int)$ttlReqCpdUm['REQ_CPD'];
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
                    
                    $jumum = round($jumum, 1);

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
            'mark' => 'numeric|required|max_length[40]',
            'competency' => 'required|max_length[10]'
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
}