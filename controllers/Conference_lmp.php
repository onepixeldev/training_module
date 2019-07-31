<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conference_lmp extends MY_Controller
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Conference_lmp_model', 'mdl_lmp');
        $this->load->model('Conference_pmp_model', 'mdl_pmp');
        $this->load->library('../controllers/conference_pmp');
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }

    // QUERY CONFERENCE REPORT APPLICATION
    public function ATF088()
    { 
        // DEPARTMENT LIST
        $data['dept_list'] = $this->dropdown($this->mdl_lmp->populateDeptQ(), 'DM_DEPT_CODE', 'DM_DEPT_CODE', '');

        $this->render($data);
    }

    // CONFERENCE REPORT APPLICATION - MANUAL ENTRY
    public function ATF096()
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

    /*===========================================================
       QUERY CONFERENCE REPORT APPLICATION - ATF088
    =============================================================*/

    // STAFF INFO LIST - QUERY
    public function staffInfoListQ() {
        $dept = $this->input->post('deptCode', true);

        if(!empty($dept)) {
            $data['dept'] = $dept;
            $data['stf_inf'] = $this->mdl_lmp->getStaffListQ($dept);
        }

        $this->render($data);
    }

    // GET DEPARTMENT DESC
    public function getDepartmentDesc() {
		$this->isAjax();
		
        $deptCode = $this->input->post('deptCode', true);
        
        if (!empty($deptCode)) {
            $getDept = $this->mdl_lmp->getDeptDetl($deptCode);
            if(!empty($getDept)) {
                $dept_desc = $getDept->DM_DEPT_DESC;
            } else {
                $dept_desc = '';
            }
            
        	if (!empty($getDept)) {
          		$json = array('sts' => 1, 'msg' => 'Success', 'alert' => 'success', 'dept_desc' => $dept_desc);
        	} else {
          		$json = array('sts' => 0, 'msg' => 'Fail', 'alert' => 'danger');
        	}
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // GET STAFF CONFERENCE REPORT
    public function getStaffConRep() {
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);
        $svc_code = $this->input->post('svc_code', true);
        $svc_desc = $this->input->post('svc_desc', true);

        if(!empty($staff_id) && !empty($staff_name) && !empty($svc_code) && !empty($svc_code)) {
            $data['staff_id'] = $staff_id;
            $data['staff_name'] = $staff_name;
            $data['svc_code'] = $svc_code;
            $data['svc_desc'] = $svc_desc;
            $data['con_rep'] = $this->mdl_lmp->getStaffConRepQ($staff_id);
        } elseif(!empty($staff_id) && empty($staff_name) && empty($svc_code) && empty($svc_code)) {
            $data['staff_id'] = $staff_id;

            // GET STAFF NAME & SERVICE CODE
            $data['stf_inf'] = $this->mdl_lmp->getStaffDetlAca($staff_id);
            if(!empty($data['stf_inf'])) {
                $data['staff_name'] = $data['stf_inf']->SM_STAFF_NAME;
                $data['svc_code'] = $data['stf_inf']->SM_JOB_CODE;
                $data['svc_desc'] = $data['stf_inf']->SS_SERVICE_DESC;
            } else {
                $data['staff_name'] = '';
                $data['svc_code'] = '';
                $data['svc_desc'] = '';
            }

            $data['con_rep'] = $this->mdl_lmp->getStaffConRepQ($staff_id);
        }

        $this->render($data);
    }

    //////////////////////////////////
    // CONFERENCE REPORT DETAIL QUERY
    //////////////////////////////////
    public function conAppQuery() {
        $this->conference_pmp->conAppQuery();
    }

    public function addConferenceLeave() {
        $this->conference_pmp->addConferenceLeave();
    }

    public function conRmicApproval() {
        $this->conference_pmp->conRmicApproval();
    }

    public function staffConAllowanceQuery() {
        $this->conference_pmp->staffConAllowanceQuery();
    }

    public function researchInfo() {
        $this->conference_pmp->researchInfo();
    }
    //////////////////////////////////
    // CONFERENCE REPORT DETAIL QUERY
    //////////////////////////////////

    // SET REPORT PARAM
    public function setRepParam() {
		$this->isAjax();
		
		// get parameter values
        // $form = $this->input->post('form', true);
		$repCode = $this->input->post('repCode', true);
		// $repFormat = $this->input->post('rep_format', true);
		$param = '';
		
		if ($repCode == 'ATR073') {
			$refid = $this->input->post('refid', true);
			$staff_id = $this->input->post('staff_id', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO','CONFERENCE_ID'=>$refid,'STAFF_ID'=>$staff_id));
        }
		
		$json = array('report' => $param);
		
		echo json_encode($json);		
    } 

    // GENERATE REPORT
    public function report(){
		$report = $this->encryption->decrypt_array($this->input->get('r'));
		$this->lib->generate_report($report, false);
    }

    // CONFERENCE REPORT PART II
    public function getConRepPart2() {
        $refid = $this->input->post('refid', true);
        $crname = $this->input->post('crName', true);
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);

        if(!empty($staff_id) && !empty($staff_name)) {
            $data['staff_id'] = $staff_id;
            $data['staff_name'] = $staff_name;
            $data['refid'] = $refid;
            $data['crname'] = $crname;

            $data['con_rep_partii'] = $this->mdl_lmp->getConRepDetl($refid, $staff_id);
            $data['scr_parti'] = $this->mdl_lmp->getScrPart1($refid, $staff_id);
        } elseif(!empty($staff_id) && empty($staff_name) && empty($svc_code) && empty($svc_code)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;
            $data['crname'] = $crname;

            // GET STAFF NAME & SERVICE CODE
            $data['stf_inf'] = $this->mdl_lmp->getStaffDetlAca($staff_id);
            if(!empty($data['stf_inf'])) {
                $data['staff_name'] = $data['stf_inf']->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }

            $data['con_rep_partii'] = $this->mdl_lmp->getConRepDetl($refid, $staff_id);
            $data['scr_parti'] = $this->mdl_lmp->getScrPart1($refid, $staff_id);
        }

        $this->render($data);
    }

    // CONFERENCE REPORT PART III
    public function getConRepPart3() {
        $refid = $this->input->post('refid', true);
        $crname = $this->input->post('crName', true);
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);

        if(!empty($staff_id) && !empty($staff_name)) {
            $data['staff_id'] = $staff_id;
            $data['staff_name'] = $staff_name;
            $data['refid'] = $refid;
            $data['crname'] = $crname;

            $data['con_rep_partiii'] = $this->mdl_lmp->getConRepDetl($refid, $staff_id);
            $data['scr_partii'] = $this->mdl_lmp->getScrPart2($refid, $staff_id);
            $data['saa_detl'] = $this->mdl_lmp->getStfApplAttch($refid, $staff_id);
        } elseif(!empty($staff_id) && empty($staff_name) && empty($svc_code) && empty($svc_code)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;
            $data['crname'] = $crname;

            // GET STAFF NAME & SERVICE CODE
            $data['stf_inf'] = $this->mdl_lmp->getStaffDetlAca($staff_id);
            if(!empty($data['stf_inf'])) {
                $data['staff_name'] = $data['stf_inf']->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }

            $data['con_rep_partiii'] = $this->mdl_lmp->getConRepDetl($refid, $staff_id);
            $data['scr_partii'] = $this->mdl_lmp->getScrPart2($refid, $staff_id);
            $data['saa_detl'] = $this->mdl_lmp->getStfApplAttch($refid, $staff_id);
        }

        $this->render($data);
    }

    // CONFERENCE REPORT PART IV
    public function getConRepPart4() {
        $refid = $this->input->post('refid', true);
        $crname = $this->input->post('crName', true);
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);

        if(!empty($staff_id) && !empty($staff_name)) {
            $data['staff_id'] = $staff_id;
            $data['staff_name'] = $staff_name;
            $data['refid'] = $refid;
            $data['crname'] = $crname;

            $data['con_rep_partiv'] = $this->mdl_lmp->getConRepDetl($refid, $staff_id);
        } elseif(!empty($staff_id) && empty($staff_name) && empty($svc_code) && empty($svc_code)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;
            $data['crname'] = $crname;

            // GET STAFF NAME & SERVICE CODE
            $data['stf_inf'] = $this->mdl_lmp->getStaffDetlAca($staff_id);
            if(!empty($data['stf_inf'])) {
                $data['staff_name'] = $data['stf_inf']->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }

            $data['con_rep_partiv'] = $this->mdl_lmp->getConRepDetl($refid, $staff_id);
        }

        $this->render($data);
    }

    ////////////////////////////////////////
    // FILE ATTACHMENT ECOMMUNITY_STAFF_URL
    ///////////////////////////////////////

    // DOWNLAOD FILE ATTACHMENT PARAM
    public function dloadFileAttParam() {
        $this->conference_pmp->dloadFileAttParam();
    }

    // DOWNLOAD FILE ATTACHMENT URL
    public function fileAttachmentDload() {
        $this->conference_pmp->fileAttachmentDload();
    }
    
    ////////////////////////////////////////
    // FILE ATTACHMENT ECOMMUNITY_STAFF_URL
    ///////////////////////////////////////

    /*===========================================================
       Conference Report Application - Manual Entry (ATF096)
    =============================================================*/

    // POPULATE CONFERENCE LIST
    public function getConferenceInfoList() {
        $this->conference_pmp->getConferenceInfoList();
    }

    // CONFERENCE APPLICANT LIST
    public function getStaffListConRep()
    {   
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);

        //$data2 = array();

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['crName'] = $crName;
            $data['staff_cr_list'] = $this->mdl_lmp->getStaffListConRep($refid);
        } 

        $this->renderAjax($data);
    }

    // ADD REPORT ENTRY
    public function addReportEntry()
    {  
        // STATUS LIST
        $data['sts_list'] = array(''=>'--- Please Select ---', 'APPLY'=>'APPLY', 'VERIFY_HOD'=>'VERIFY_HOD', 'VERIFY_TNCA'=>'VERIFY_TNCA', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL', 'ENTRY'=>'ENTRY');

        $this->renderAjax($data);
    }

    ////////////////////
    // SEARCH STAFF
    ///////////////////

    // AUTO SEARCH STAFF ID
    public function staffKeyUp() {
        $this->conference_pmp->staffKeyUp();
    }

    // SEARCH STAFF / SEARCH STAFF MODAL
    public function searchStaffMd() {
        $this->conference_pmp->searchStaffMd();
    } 

    // STAFF INFO DETL
    public function getStaffDetlInfo()
    {  
        $this->isAjax();
        $staff_id = $this->input->post('staff_id', true);
        $found = 0;
        // var_dump($staff_id);
        // exit;
        if (!empty($staff_id)) {

            $stf_inf = $this->mdl_lmp->getStaffDetlInfo($staff_id);
            if(!empty($stf_inf)) {
                $found++;
                $pos = $stf_inf->SS_SERVICE_DESC;
                $pos_lvl = $stf_inf->SJS_STATUS_DESC;
                $dept_unit = $stf_inf->SM_UNIT;
                $ptj_fac = $stf_inf->SM_DEPT_CODE;
                $dept_desc = $stf_inf->DM_DEPT_DESC1;
                $unit_desc = $stf_inf->DM_DEPT_DESC2;
            } else {
                $found = 0;
                $pos = '';
                $pos_lvl = '';
                $dept_unit = '';
                $ptj_fac = '';
                $dept_desc = '';
                $unit_desc = '';
            }
            
            if($found > 0) {
                $json = array('sts' => 1, 'msg' => '', 'alert' => 'green', 'pos' => $pos, 'pos_lvl' => $pos_lvl, 'dept_unit' => $dept_unit, 'ptj_fac' => $ptj_fac, 'dept_desc' => $dept_desc, 'unit_desc' => $unit_desc);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to get staff info', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // SEARCH CONFERENCE
    public function searchCrMd() {
        $staff_id = $this->input->post('staff_id', true);
        $staff_name = $this->input->post('staff_name', true);
        // var_dump($staff_id);

        if(!empty($staff_id)) {
            $data['staff_id'] = strtoupper($staff_id);
            $data['staff_name'] = $staff_name;
            $data['cr_inf'] = $this->mdl_lmp->searchCrMd($staff_id);
        }

        $this->render($data);
    }

    // CONFERENCE INFO DETL
    public function getConDetlInfo()
    {  
        $this->isAjax();
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('select', true);
        // var_dump($staff_id);
        // exit;
        if (!empty($staff_id)) {

            $con_inf = $this->mdl_lmp->searchCrMd($staff_id);
            
            if(!empty($con_inf)) {
                $json = array('sts' => 1, 'msg' => '', 'alert' => 'green', 'con_inf' => $con_inf);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to get conference info', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }
}