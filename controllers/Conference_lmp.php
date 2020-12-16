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
        $this->load->library('../modules/training/controllers/Conference_pmp.php');
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }

    // View Page Filter
    public function viewTabFilter($tabID, $scID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);

        // $scID = $scID;
        
        if($scID == 'ATF087') {
            redirect($this->class_uri('ATF087')); 
        } 
        
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

    // APPROVE CONFERENCE REPORT (TNC A&A)
    public function ATF087()
    { 
        // DEPARTMENT LIST
        $data['dept_list'] = $this->dropdown($this->mdl_lmp->populateDeptQ($mod = 'APP_REPORT'), 'DM_DEPT_CODE', 'DM_DEPT_CODE', '');

        $this->render($data);
    }

    /*===========================================================
       QUERY CONFERENCE REPORT APPLICATION - ATF088
    =============================================================*/

    // STAFF INFO LIST - QUERY
    public function staffInfoListQ() {
        $dept = $this->input->post('deptCode', true);
        $mod = $this->input->post('mod', true);

        if($mod == 'APP_REPORT') {
            if(!empty($dept)) {
                $data['dept'] = $dept;
                $data['stf_inf'] = $this->mdl_lmp->getStaffListQ($dept, $mod);
            }
        } else {
            if(!empty($dept)) {
                $data['dept'] = $dept;
                $data['stf_inf'] = $this->mdl_lmp->getStaffListQ($dept);
            }
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
        $mod = $this->input->post('mod', true);

        if(!empty($staff_id) && !empty($staff_name) && !empty($svc_code) && !empty($svc_code)) {
            $data['staff_id'] = $staff_id;
            $data['staff_name'] = $staff_name;
            $data['svc_code'] = $svc_code;
            $data['svc_desc'] = $svc_desc;
            $data['con_rep'] = $this->mdl_lmp->getStaffConRepQ($staff_id, $mod);
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

            $data['con_rep'] = $this->mdl_lmp->getStaffConRepQ($staff_id, $mod);
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
    public function reportold(){
		$report = $this->encryption->decrypt_array($this->input->get('r'));
		$this->lib->generate_report($report, false);
    }

	public function report(){
		// Load jasperreport library
		$this->load->library('jasperreport');
		
		// get report parameters
		$param = $this->encryption->decrypt_array($this->input->get('r'));
		
		// get report code and format
		$repCode = isset($param['REPORT'])?strtoupper($param['REPORT']):'';
		$format = isset($param['FORMAT'])?strtolower($param['FORMAT']):'pdf';
		
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
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        // var_dump($staff_id);
        // exit;
        if (!empty($refid) && !empty($staff_id)) {

            $con_inf = $this->mdl_lmp->getConferenceDetlRep($refid, $staff_id);
            
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

    // SAVE REPORT ENTRY PART I
    public function saveRepPartI() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['conference_workshop_seminar'];
        $staff_id = $form['staff_id'];

        // $refid = '2013-00001498';
        // $staff_id = 'K01503';

        $rule = array(
            'staff_id' => 'required|max_length[10]',
            'staff_name' => 'required|max_length[100]',
            'conference_workshop_seminar' => 'required|max_length[20]',
            'fa_os' => 'max_length[40]',
            'report_date_submission' => 'max_length[11]',
            'status' => 'max_length[20]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->mdl_lmp->getStaffListConRep($refid, $staff_id);

            if(empty($check)) {
                $insert = $this->mdl_lmp->saveRepPartI($form, $refid);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => strtoupper($staff_id));
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                } 
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // EDIT REPORT PART I
    public function editRepPartI()
    {  
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);

        if(!empty($refid) && ! empty($staff_id)) {
            $data['refid'] = $refid;
            $data['staff_id'] = $staff_id;

            // STAFF DETAILS
            $staffDetl = $this->mdl_pmp->getStaffList($staff_id);
            if(!empty($staffDetl)) {
                $data['staff_name'] = $staffDetl->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }

            $stf_inf = $this->mdl_lmp->getStaffDetlInfo($staff_id);
            if(!empty($stf_inf)) {
                $data['pos'] = $stf_inf->SS_SERVICE_DESC;
                $data['pos_lvl'] = $stf_inf->SJS_STATUS_DESC;
                $data['dept_unit'] = $stf_inf->SM_UNIT;
                $data['ptj_fac'] = $stf_inf->SM_DEPT_CODE;
                $data['dept_desc'] = $stf_inf->DM_DEPT_DESC1;
                $data['unit_desc'] = $stf_inf->DM_DEPT_DESC2;
            } else {
                $data['pos'] = '';
                $data['pos_lvl'] = '';
                $data['dept_unit'] = '';
                $data['ptj_fac'] = '';
                $data['dept_desc'] = '';
                $data['unit_desc'] = '';
            }

            $con_rep_inf = $this->mdl_lmp->getConferenceDetlRep($refid, $staff_id);
            if(!empty($con_rep_inf)) {
                $data['pw1'] = $con_rep_inf->SCM_PAPER_TITLE;
                $data['pw2'] = $con_rep_inf->SCM_PAPER_TITLE2;
                $data['address'] = $con_rep_inf->CM_ADDRESS;
                $data['city'] = $con_rep_inf->CM_CITY;
                $data['postcode'] = $con_rep_inf->CM_POSTCODE;
                $data['state'] = $con_rep_inf->SM_STATE_DESC;
                $data['country'] = $con_rep_inf->CM_COUNTRY_DESC;
                $data['date_from'] = $con_rep_inf->CM_DATE_FROM;
                $data['date_to'] = $con_rep_inf->CM_DATE_TO;
                $data['duration'] = $con_rep_inf->DURATION_CM;
                $data['organizer'] = $con_rep_inf->CM_ORGANIZER_NAME;
                $data['fa_upsi'] = $con_rep_inf->SCM_RM_TOTAL_AMT_APPROVE_TNCA;
                $data['fa_ea'] = $con_rep_inf->SCM_RM_SPONSOR_TOTAL_AMT;
            } else {
                $data['pw1'] = '';
                $data['pw2'] = '';
                $data['address'] = '';
                $data['city'] = '';
                $data['postcode'] = '';
                $data['state'] = '';
                $data['country'] = '';
                $data['date_from'] = '';
                $data['date_to'] = '';
                $data['duration'] = '';
                $data['organizer'] = '';
                $data['fa_upsi'] = '';
                $data['fa_ea'] = '';
            }

            $scr_detl = $this->mdl_lmp->getStaffListConRep($refid, $staff_id);
            if(!empty($scr_detl)) {
                $data['oth_s'] = $scr_detl->SCR_OTHER_TOTAL_AMT;
                $data['appl_date'] = $scr_detl->SCR_APPLY_DATE;
                $data['scr_sts'] = $scr_detl->SCR_STATUS;
            } else {
                $data['oth_s'] = '';
                $data['appl_date'] = '';
                $data['scr_sts'] = '';
            }

            // CONFERENCE DETAILS
            $cr_detl = $this->mdl_pmp->getConferenceDetl($refid);
            if(!empty($cr_detl)) {
                $data['crName'] = $cr_detl->CM_NAME;
            } else {
                $data['crName'] = '';
            }
        }

        // STATUS LIST
        $data['sts_list'] = array(''=>'--- Please Select ---', 'APPLY'=>'APPLY', 'VERIFY_HOD'=>'VERIFY_HOD', 'VERIFY_TNCA'=>'VERIFY_TNCA', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL', 'ENTRY'=>'ENTRY');

        $this->renderAjax($data);
    }

    // SAVE EDIT REPORT ENTRY PART I
    public function saveEditRepPartI() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['conference_workshop_seminar'];
        $staff_id = $form['staff_id'];
        // var_dump($form['conference_content']);

        $rule = array(
            'fa_os' => 'max_length[40]',
            'report_date_submission' => 'max_length[11]',
            'status' => 'max_length[20]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_lmp->saveEditRepPartI($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => strtoupper($staff_id));
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // EDIT REPORT PART II
    public function editRepPartII()
    {  
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);

        if(!empty($refid) && ! empty($staff_id)) {
            $data['refid'] = $refid;
            $data['staff_id'] = $staff_id;

            // STAFF DETAILS
            $staffDetl = $this->mdl_pmp->getStaffList($staff_id);
            if(!empty($staffDetl)) {
                $data['staff_name'] = $staffDetl->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }

            // CONFERENCE DETAILS
            $cr_detl = $this->mdl_pmp->getConferenceDetl($refid);
            if(!empty($cr_detl)) {
                $data['crName'] = $cr_detl->CM_NAME;
            } else {
                $data['crName'] = '';
            }

            $data['part_ii_detl'] = $this->mdl_lmp->getStaffListConRep($refid, $staff_id);
            if(!empty($data['part_ii_detl'])) {
                $data['scr_content'] = $data['part_ii_detl']->SCR_CONTENT;   
            } else {
                $data['scr_content'] = '';
            }

            $data['scr_parti'] = $this->mdl_lmp->getScrPart1($refid, $staff_id);
        }

        $this->renderAjax($data);
    }

    // SAVE REPORT ENTRY PART II
    public function saveRepPartII() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['conference_id'];
        $staff_id = $form['staff_id'];
        // var_dump($form['conference_content']);

        $rule = array(
            'staff_id' => 'required|max_length[10]',
            'conference_id' => 'required|max_length[20]',
            'conference_content' => 'max_length[4000]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_lmp->saveRepPartII($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => strtoupper($staff_id));
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // ADD RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS
    public function addEstNetRelayMd()
    {   
        $refid = $this->input->post('staff_id', true);
        $staff_id = $this->input->post('refid', true);
        
        if(!empty($refid) && !empty($staff_id)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;
        } else {
            $data['staff_id'] = '';
            $data['refid'] = '';
        }

        $this->renderAjax($data);
    }

    // SAVE RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS 
    public function saveEstNetRelay() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $staff_id = $form['staff_id'];
        // var_dump($form['conference_content']);

        $rule = array(
            'staff_id' => 'required|max_length[10]',
            'refid' => 'required|max_length[20]',
            'name' => 'required|max_length[100]',
            'expertise' => 'required|max_length[100]',
            'institution' => 'max_length[100]',
            'tel_no' => 'max_length[15]',
            'email' => 'max_length[100]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->mdl_lmp->getScrPart1Detl($refid, $staff_id, $form['name'], $form['expertise']);

            if(empty($check)) {
                $insert = $this->mdl_lmp->saveEstNetRelay($form, $refid, $staff_id);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => strtoupper($staff_id));
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                } 
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS
    public function delEstNetRelay() {
		$this->isAjax();
		
        $name = $this->input->post('name', true);
        $field = $this->input->post('field', true);
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        
        if (!empty($name) && !empty($field) && !empty($refid) && !empty($staff_id)) {
            $del = $this->mdl_lmp->delEstNetRelay($refid, $staff_id, $name, $field);
        
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

    // EDIT REPORT PART III
    public function editRepPartIII()
    {  
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);

        if(!empty($refid) && ! empty($staff_id)) {
            $data['refid'] = $refid;
            $data['staff_id'] = $staff_id;

            // STAFF DETAILS
            $staffDetl = $this->mdl_pmp->getStaffList($staff_id);
            if(!empty($staffDetl)) {
                $data['staff_name'] = $staffDetl->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }

            // CONFERENCE DETAILS
            $cr_detl = $this->mdl_pmp->getConferenceDetl($refid);
            if(!empty($cr_detl)) {
                $data['crName'] = $cr_detl->CM_NAME;
            } else {
                $data['crName'] = '';
            }

            $data['part_ii_detl'] = $this->mdl_lmp->getStaffListConRep($refid, $staff_id);
            if(!empty($data['part_ii_detl'])) {
                $data['scr_exp'] = $data['part_ii_detl']->SCR_EXPERIENCE;
                $data['scr_remark'] = $data['part_ii_detl']->SCR_REMARK;   
            } else {
                $data['scr_exp'] = '';
                $data['scr_remark'] = '';
            }

            $data['scr_partii'] = $this->mdl_lmp->getScrPart2($refid, $staff_id);
        }

        $this->renderAjax($data);
    }

    // SAVE REPORT ENTRY PART III
    public function saveRepPartIII() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['conference_id'];
        $staff_id = $form['staff_id'];
        // var_dump($form['conference_content']);

        $rule = array(
            'staff_id' => 'required|max_length[10]',
            'conference_id' => 'required|max_length[20]',
            'conference_experience' => 'max_length[4000]',
            'conference_remark' => 'max_length[4000]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_lmp->saveRepPartIII($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => strtoupper($staff_id));
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // ADD RECORD SCR PART 2
    public function addScrPartIIMd()
    {   
        $refid = $this->input->post('staff_id', true);
        $staff_id = $this->input->post('refid', true);
        
        if(!empty($refid) && !empty($staff_id)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;
        } else {
            $data['staff_id'] = '';
            $data['refid'] = '';
        }

        $this->renderAjax($data);
    }

    // SAVE ADD RECORD SCR PART 2
    public function saveScrpii() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $staff_id = $form['staff_id'];
        // var_dump($form['conference_content']);

        $rule = array(
            'staff_id' => 'required|max_length[10]',
            'refid' => 'required|max_length[20]',
            'activity' => 'required|max_length[2000]',
            'implementation_date' => 'max_length[20]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->mdl_lmp->getScrPart2Detl($refid, $staff_id, $form['activity']);

            if(empty($check)) {
                $insert = $this->mdl_lmp->saveScrpii($form, $refid, $staff_id);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => strtoupper($staff_id));
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                } 
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE RECORD SCR PART 2
    public function delScrpII() {
		$this->isAjax();
		
        $activity = $this->input->post('activity', true);
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        
        if (!empty($activity) && !empty($refid) && !empty($staff_id)) {
            $del = $this->mdl_lmp->delScrpII($refid, $staff_id, $activity);
        
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

    // FILE ATTACHMENT PARAM
    public function fileAttParam() {
        $this->isAjax();

        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);

        if(!empty($staff_id) && !empty($refid)) {
            $this->session->set_userdata('staff_id', $staff_id);
            $this->session->set_userdata('refid', $refid);

            $json = array('sts' => 1, 'msg' => 'Param assigned.', 'alert' => 'success');
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // FILE ATTACHMENT URL
    public function fileAttachment() {
        $staff_id = $this->session->userdata('staff_id');
        $refid = $this->session->userdata('refid');
        $curUser = $this->staff_id;

        if(!empty($staff_id) && !empty($refid) && !empty($curUser)) {
            $selUrl = $this->mdl_pmp->getEcommUrl();
            if(!empty($selUrl)) {
                $ecomm_url = $selUrl->HP_PARM_DESC;
            } else {
                $ecomm_url = '';
            }

            echo header('Location: '.$ecomm_url.'conferenceAttachment.jsp?action=attachLMP&admsID='.$curUser.'&sID='.$curUser.'&apRID='.$refid);
            exit;
        } 
    }

    // EDIT REPORT PART IV
    public function editRepPartIV()
    {  
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);

        if(!empty($refid) && ! empty($staff_id)) {
            $data['refid'] = $refid;
            $data['staff_id'] = $staff_id;

            // STAFF DETAILS
            $staffDetl = $this->mdl_pmp->getStaffList($staff_id);
            if(!empty($staffDetl)) {
                $data['staff_name'] = $staffDetl->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }

            // CONFERENCE DETAILS
            $cr_detl = $this->mdl_pmp->getConferenceDetl($refid);
            if(!empty($cr_detl)) {
                $data['crName'] = $cr_detl->CM_NAME;
            } else {
                $data['crName'] = '';
            }

            $data['con_rep_partiv'] = $this->mdl_lmp->getConRepDetl($refid, $staff_id);
            if(!empty($data['con_rep_partiv'])) {
                $data['hod_remark1'] = $data['con_rep_partiv']->SCR_HOD_REMARK1;
                $data['hod_remark2'] = $data['con_rep_partiv']->SCR_HOD_REMARK2;
                $data['hod_remark3'] = $data['con_rep_partiv']->SCR_HOD_REMARK3;
                $data['tnca_remark1'] = $data['con_rep_partiv']->SCR_TNCA_REMARK1;
                $data['hod_ver_id'] = $data['con_rep_partiv']->SCR_HOD_VERIFY_BY;
                $data['hod_ver_name'] = $data['con_rep_partiv']->SCR_HOD_VERIFY_BY_NAME;
                // $data['hod_ver_date'] = $data['con_rep_partiv']->SCR_HOD_VERIFY_DATE;
                $data['tnca_ver_id'] = $data['con_rep_partiv']->SCR_TNCA_VERIFY_BY;
                $data['tnca_ver_name'] = $data['con_rep_partiv']->SCR_TNCA_VERIFY_BY_NAME;

                // SYSDATE
                $data['hod_ver_date'] = $data['con_rep_partiv']->CURR_DATE;
                $data['tnca_app_date'] = $data['con_rep_partiv']->CURR_DATE;
                // if(empty($data['con_rep_partiv']->SCR_TNCA_VERIFY_DATE)) {
                //     $data['tnca_app_date'] = $data['con_rep_partiv']->CURR_DATE;
                // } else {
                //     $data['tnca_app_date'] = $data['con_rep_partiv']->SCR_TNCA_VERIFY_DATE;
                // }
                
            } else {
                $data['hod_remark1'] = '';
                $data['hod_remark2'] = '';
                $data['hod_remark3'] = '';
                $data['tnca_remark1'] = '';
                $data['hod_ver_id'] = '';
                $data['hod_ver_name'] = '';
                $data['hod_ver_date'] = '';
                $data['tnca_ver_id'] = '';
                $data['tnca_ver_name'] = '';
                $data['tnca_app_date'] = '';
            }
        }

        $this->renderAjax($data);
    }

    // SAVE REPORT ENTRY PART III
    public function saveRepPartIV() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['conference_id'];
        $staff_id = $form['staff_id'];
        // var_dump($form['conference_content']);
        
        if(!empty($form['certified_by_id']) && empty($form['approved_by_id'])) {
            $rule = array(
                'staff_id' => 'required|max_length[10]',
                'conference_id' => 'required|max_length[20]',
                'hod_remark_1' => 'max_length[4000]',
                'hod_remark_2' => 'max_length[4000]',
                'hod_remark_2' => 'max_length[4000]',
                'certified_by_id' => 'max_length[10]',
                'certified_by_name' => 'required|max_length[100]',
                'date_certified' => 'max_length[11]',
                'tnca_remark' => 'max_length[4000]',
                'approved_by_id' => 'max_length[10]',
                'approved_by_name' => 'max_length[100]',
                'approved_date' => 'max_length[11]'
            );
        } elseif(empty($form['certified_by_id']) && !empty($form['approved_by_id'])) {
            $rule = array(
                'staff_id' => 'required|max_length[10]',
                'conference_id' => 'required|max_length[20]',
                'hod_remark_1' => 'max_length[4000]',
                'hod_remark_2' => 'max_length[4000]',
                'hod_remark_2' => 'max_length[4000]',
                'certified_by_id' => 'max_length[10]',
                'certified_by_name' => 'max_length[100]',
                'date_certified' => 'max_length[11]',
                'tnca_remark' => 'max_length[4000]',
                'approved_by_id' => 'max_length[10]',
                'approved_by_name' => 'required|max_length[100]',
                'approved_date' => 'max_length[11]'
            );
        } elseif(!empty($form['certified_by_id']) && !empty($form['approved_by_id'])) {
            $rule = array(
                'staff_id' => 'required|max_length[10]',
                'conference_id' => 'required|max_length[20]',
                'hod_remark_1' => 'max_length[4000]',
                'hod_remark_2' => 'max_length[4000]',
                'hod_remark_2' => 'max_length[4000]',
                'certified_by_id' => 'max_length[10]',
                'certified_by_name' => 'required|max_length[100]',
                'date_certified' => 'max_length[11]',
                'tnca_remark' => 'max_length[4000]',
                'approved_by_id' => 'max_length[10]',
                'approved_by_name' => 'required|max_length[100]',
                'approved_date' => 'max_length[11]'
            );
        }elseif(empty($form['certified_by_id']) && empty($form['approved_by_id'])) {
            $rule = array(
                'staff_id' => 'required|max_length[10]',
                'conference_id' => 'required|max_length[20]',
                'hod_remark_1' => 'max_length[4000]',
                'hod_remark_2' => 'max_length[4000]',
                'hod_remark_2' => 'max_length[4000]',
                'certified_by_id' => 'max_length[10]',
                'certified_by_name' => 'max_length[100]',
                'date_certified' => 'max_length[11]',
                'tnca_remark' => 'max_length[4000]',
                'approved_by_id' => 'max_length[10]',
                'approved_by_name' => 'max_length[100]',
                'approved_date' => 'max_length[11]'
            );
        }

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl_lmp->saveRepPartIV($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => strtoupper($staff_id));
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*===========================================================
       APPROVE CONFERENCE REPORT (TNC A&A) - (ATF087)
    =============================================================*/

    // TNCA APPROVAL
    public function tncaaApproval() {
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
            $data['def_app_amd_rejc_by'] = $this->mdl_lmp->getAppRejcStaff();

            // var_dump($data['def_app_amd_rejc_by']);
            // exit();
            
            // TNC (A&A) Amendment / Approval
            if(empty($data['con_rep_partiv']->SCR_TNCA_VERIFY_BY)) {

                if(!empty($data['def_app_amd_rejc_by'])) {
                    $data['app_amd_by_id'] = $data['def_app_amd_rejc_by']->SM_STAFF_ID;
                    $data['app_amd_by_name'] = $data['def_app_amd_rejc_by']->SM_STAFF_NAME;
                } else {
                    $data['app_amd_by_id'] = '';
                    $data['app_amd_by_name'] = '';
                }
            } else {
                $data['app_amd_by_id'] = $data['con_rep_partiv']->SCR_TNCA_VERIFY_BY;

                $data['stf_inf'] = $this->mdl_lmp->getStaffDetlAca($data['app_amd_by_id']);
                if(!empty($data['stf_inf'])) {
                    $data['app_amd_by_name'] = $data['stf_inf']->SM_STAFF_NAME;
                } else {
                    $data['app_amd_by_name'] = '';
                }
            }

            // TNC (A&A) Reject
            if(empty($data['con_rep_partiv']->SCR_TNCA_REJECT_BY)) {
                // $data['rejc_by_id'] = $data['def_app_amd_rejc_by']->SM_STAFF_ID;
                // $data['rejc_by_name'] = $data['def_app_amd_rejc_by']->SM_STAFF_NAME;

                if(!empty($data['def_app_amd_rejc_by'])) {
                    $data['rejc_by_id'] = $data['def_app_amd_rejc_by']->SM_STAFF_ID;
                    $data['rejc_by_name'] = $data['def_app_amd_rejc_by']->SM_STAFF_NAME;
                } else {
                    $data['rejc_by_id'] = '';
                    $data['rejc_by_name'] = '';
                }
            } else {
                $data['rejc_by_id'] = $data['con_rep_partiv']->SCR_TNCA_REJECT_BY;

                $data['stf_inf'] = $this->mdl_lmp->getStaffDetlAca($data['rejc_by_id']);
                if(!empty($data['stf_inf'])) {
                    $data['rejc_by_name'] = $data['stf_inf']->SM_STAFF_NAME;
                } else {
                    $data['rejc_by_name'] = '';
                }
            }

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
            $data['app_amd_rejc_by'] = $this->mdl_lmp->getAppRejcStaff();

            // TNC (A&A) Amendment / Approval
            if(empty($data['con_rep_partiv']->SCR_TNCA_VERIFY_BY)) {
                $data['app_amd_by_id'] = $data['def_app_amd_rejc_by']->SM_STAFF_ID;
                $data['app_amd_by_name'] = $data['def_app_amd_rejc_by']->SM_STAFF_NAME;
            } else {
                $data['app_amd_by_id'] = $data['con_rep_partiv']->SCR_TNCA_VERIFY_BY;

                $data['stf_inf'] = $this->mdl_lmp->getStaffDetlAca($data['app_amd_by_id']);
                if(!empty($data['stf_inf'])) {
                    $data['app_amd_by_name'] = $data['stf_inf']->SM_STAFF_NAME;
                } else {
                    $data['app_amd_by_name'] = '';
                }
            }

            // TNC (A&A) Reject
            if(empty($data['con_rep_partiv']->SCR_TNCA_REJECT_BY)) {
                $data['rejc_by_id'] = $data['def_app_amd_rejc_by']->SM_STAFF_ID;
                $data['rejc_by_name'] = $data['def_app_amd_rejc_by']->SM_STAFF_NAME;
            } else {
                $data['rejc_by_id'] = $data['con_rep_partiv']->SCR_TNCA_REJECT_BY;

                $data['stf_inf'] = $this->mdl_lmp->getStaffDetlAca($data['rejc_by_id']);
                if(!empty($data['stf_inf'])) {
                    $data['rejc_by_name'] = $data['stf_inf']->SM_STAFF_NAME;
                } else {
                    $data['rejc_by_name'] = '';
                }
            }
        }

        $this->render($data);
    }

    // SAVE AMEND / APPROVAL
    public function saveAmdAppTncaa() {
        $this->isAjax();
        
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $app_amd_remark = $this->input->post('app_amd_remark', true);
        $app_amd_by = strtoupper($this->input->post('app_amd_by', true));
        $app_amd_date = $this->input->post('app_amd_date', true);
        

        if(!empty($staff_id) && !empty($refid)) {
            $update = $this->mdl_lmp->saveAmdAppTncaa($refid, $staff_id, $app_amd_remark, $app_amd_by, $app_amd_date);
            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'success');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // SAVE REJECT
    public function saveRejcTncaa() {
        $this->isAjax();

        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $rjc_remark = $this->input->post('rjc_remark', true);
        $rjc_by = strtoupper($this->input->post('rjc_by', true));
        $rjc_date = $this->input->post('rjc_date', true);

        if(!empty($staff_id) && !empty($refid)) {
            $update = $this->mdl_lmp->saveRejcTncaa($refid, $staff_id, $rjc_remark, $rjc_by, $rjc_date);
            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'success');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // REJECT CONFERENCE REPORT
    public function rejectConferenceReport() {
        $this->isAjax();

        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $rjc_remark = $this->input->post('rjc_remark', true);
        $rjc_by = strtoupper($this->input->post('rjc_by', true));
        $rjc_date = $this->input->post('rjc_date', true);

        $rejectSts = 0;
        $successMemo = 0;
        $rejectMsg = '';
        $memoMsg = '';
        // tnca_reject_send_memo (:SCR_STAFF_ID,:SCR_REFID,:SCR_TNCA_REJECT_BY,:SCR_HOD_VERIFY_BY);
        // var_dump($staff_id);
        // var_dump($refid);
        // var_dump($rjc_by);
        // exit();

        if(!empty($staff_id) && !empty($refid) && !empty($rjc_by)) {
            //$update = $this->mdl_lmp->getRejectRepMemContent($refid, $staff_id, $rjc_remark, $rjc_by, $rjc_date);
            $update = $this->mdl_lmp->rejectConferenceReport($refid, $staff_id, $rjc_remark, $rjc_by, $rjc_date);

            if($update > 0) {
                $rejectSts++;
                $rejectMsg = 'Conference report has been rejected';

                // SENDER
                $from = $rjc_by;

                // TO
                $sendTO = $staff_id;

                // STAFF DETAILS
                $staffDetl = $this->mdl_pmp->getStaffList($staff_id);
                if(!empty($staffDetl)) {
                    $staff_name = $staffDetl->SM_STAFF_NAME;
                } else {
                    $staff_name = '';
                }

                // CONTENT REJECT MEMO DETAILS
                // $memoDetl = $this->mdl_lmp->getRepMemContent($refid, $staff_id, $rjc_by);
                $memoDetl = $this->mdl_lmp->getRejectRepMemContent($refid, $staff_id, $rjc_by);

                // GET HOD & CC MEMO
                $hod = $this->mdl_lmp->getHod($staff_id);
                if(!empty($hod)) {
                    $cc = $hod->DM_DIRECTOR.',';
                } else {
                    $cc = '';
                }

                // MEMO TITLE
                $memoTitle = 'Conference Report Application Has Been Rejected By TNC(A&A)';
                
                // MEMO CONTENT
                $memoContent = 'Please take note that your conference report application has been rejected. Details :<br><br>'.
                                'Staff ID : '.$staff_id.'<br>'.
                                'Name : '.$staff_name.'<br>'.
                                'Conference Title : '.$memoDetl->CM_NAME.' ('.$memoDetl->CM_DATE_FROM2.'-'.$memoDetl->CM_DATE_TO2.')'.'<br><br>'.
                                'Reason for Reject  : '.$memoDetl->SCR_TNCA_REJECT_REMARK.'<br>'.
                                '<br> --System Generated Memo--';
                
                $memoID = 2;

                $sendMemo = $this->mdl_lmp->createMemo($from, $sendTO, $cc, $memoTitle, $memoContent, $memoID);

                if ($sendMemo > 0) {
                    $successMemo++;
                    $memoMsg = nl2br("\r\n").'Reject conference report memo has been sent';
                } else {
                    $successMemo = 0;
                    $memoMsg = nl2br("\r\n").'Failed to send memo';
                }
                
            } else {
                $rejectSts = 0;
                $rejectMsg = 'Fail to reject conference report';
            }

            if(($rejectSts > 0 && $successMemo > 0) || ($rejectSts > 0 && $successMemo == 0) ) {
                $json = array('sts' => 1, 'msg' => $rejectMsg.$memoMsg, 'alert' => 'danger');
            } else {
                $json = array('sts' => 0, 'msg' => $rejectMsg.$memoMsg, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // AMEND CONFERENCE REPORT
    public function amendConferenceReport() {
        $this->isAjax();

        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $app_amd_remark = $this->input->post('app_amd_remark', true);
        $app_amd_by = strtoupper($this->input->post('app_amd_by', true));
        $app_amd_date = $this->input->post('app_amd_date', true);

        $amendSts = 0;
        $successMemo = 0;
        $amendMsg = '';
        $memoMsg = '';
        // tnca_reject_send_memo (:SCR_STAFF_ID,:SCR_REFID,:SCR_TNCA_REJECT_BY,:SCR_HOD_VERIFY_BY);

        if(!empty($staff_id) && !empty($refid) && !empty($app_amd_by)) {
            $repSts = 'ENTRY';

            $update = $this->mdl_lmp->amendApproveConferenceReport($refid, $staff_id, $app_amd_remark, $app_amd_by, $app_amd_date, $repSts);

            if($update > 0) {
                $amendSts++;
                $amendMsg = 'Conference report has been amended';

                // SENDER
                $from = $app_amd_by;

                // TO
                $sendTO = $staff_id;

                // STAFF DETAILS
                $staffDetl = $this->mdl_pmp->getStaffList($staff_id);
                if(!empty($staffDetl)) {
                    $staff_name = $staffDetl->SM_STAFF_NAME;
                } else {
                    $staff_name = '';
                }

                // CONTENT REJECT MEMO DETAILS
                $memoDetl = $this->mdl_lmp->getAmdAppRepMemContent($refid, $staff_id, $app_amd_by);

                // MEMO TITLE
                $memoTitle = 'Conference Report Approval';
                
                // MEMO CONTENT
                $memoContent = 'Please resubmit conference report by fulfill the information needed :<br><br>'.
                                'Staff ID : '.$staff_id.'<br>'.
                                'Name : '.$staff_name.'<br>'.
                                'Conference Title : '.$memoDetl->CM_NAME.' ('.$memoDetl->CM_DATE_FROM2.'-'.$memoDetl->CM_DATE_TO2.')'.'<br><br>'.
                                'Amendment Remark : '.$memoDetl->SCR_TNCA_REMARK1.'<br>'.
                                'Click here to proceed :'.'<a href="training.jsp?action=view_conference_rep&TrainingMenu=CONFERENCE&conference_status=ENTRY">Amend</a> '.'<br><br>';
                                '<br> --System Generated Memo--';
                
                $memoID = 1;

                $sendMemo = $this->mdl_lmp->createMemo($from, $sendTO, $cc = null, $memoTitle, $memoContent, $memoID);

                if ($sendMemo > 0) {
                    $successMemo++;
                    $memoMsg = nl2br("\r\n").'Amend conference report memo has been sent';
                } else {
                    $successMemo = 0;
                    $memoMsg = nl2br("\r\n").'Failed to send memo';
                }
                
            } else {
                $amendSts = 0;
                $amendMsg = 'Fail to amend conference report';
            }

            if(($amendSts > 0 && $successMemo > 0) || ($amendSts > 0 && $successMemo == 0) ) {
                $json = array('sts' => 1, 'msg' => $amendMsg.$memoMsg, 'alert' => 'danger');
            } else {
                $json = array('sts' => 0, 'msg' => $amendMsg.$memoMsg, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // APPROVE CONFERENCE REPORT
    public function approveConferenceReport() {
        $this->isAjax();

        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $app_amd_remark = $this->input->post('app_amd_remark', true);
        $app_amd_by = strtoupper($this->input->post('app_amd_by', true));
        $app_amd_date = $this->input->post('app_amd_date', true);

        $approveSts = 0;
        $successMemo = 0;
        $approveMsg = '';
        $memoMsg = '';
        // tnca_reject_send_memo (:SCR_STAFF_ID,:SCR_REFID,:SCR_TNCA_REJECT_BY,:SCR_HOD_VERIFY_BY);

        if(!empty($staff_id) && !empty($refid) && !empty($app_amd_by)) {
            $repSts = 'VERIFY_TNCA';

            $update = $this->mdl_lmp->amendApproveConferenceReport($refid, $staff_id, $app_amd_remark, $app_amd_by, $app_amd_date, $repSts);

            if($update > 0) {
                $approveSts++;
                $approveMsg = 'Conference report has been approve';

                // SENDER
                $from = $app_amd_by;

                // TO
                $sendTO = $staff_id;

                // STAFF DETAILS
                $staffDetl = $this->mdl_pmp->getStaffList($staff_id);
                if(!empty($staffDetl)) {
                    $staff_name = $staffDetl->SM_STAFF_NAME;
                } else {
                    $staff_name = '';
                }

                // CONTENT REJECT MEMO DETAILS
                $memoDetl = $this->mdl_lmp->getAmdAppRepMemContent($refid, $staff_id, $app_amd_by);

                // MEMO TITLE
                $memoTitle = 'Conference Report Application Has Been Approved By TNC (A&A)';
                
                // MEMO CONTENT
                $memoContent = 'Please take note that your conference report application has been Approved. Details :<br><br>'.
                                'Staff ID : '.$staff_id.'<br>'.
                                'Name : '.$staff_name.'<br>'.
                                'Conference Title : '.$memoDetl->CM_NAME.' ('.$memoDetl->CM_DATE_FROM2.'-'.$memoDetl->CM_DATE_TO2.')'.'<br><br>'.
                                'Approved Remark : '.$memoDetl->SCR_TNCA_REMARK1.'<br>'.
                                '<br> --System Generated Memo--';
                
                $memoID = 1;

                $sendMemo = $this->mdl_lmp->createMemo($from, $sendTO, $cc = null, $memoTitle, $memoContent, $memoID);

                if ($sendMemo > 0) {
                    $successMemo++;
                    $memoMsg = nl2br("\r\n").'Approve conference report memo has been sent';
                } else {
                    $successMemo = 0;
                    $memoMsg = nl2br("\r\n").'Failed to send memo';
                }
                
            } else {
                $approveSts = 0;
                $approveMsg = 'Fail to approve conference report';
            }

            if(($approveSts > 0 && $successMemo > 0) || ($approveSts > 0 && $successMemo == 0) ) {
                $json = array('sts' => 1, 'msg' => $approveMsg.$memoMsg, 'alert' => 'danger');
            } else {
                $json = array('sts' => 0, 'msg' => $approveMsg.$memoMsg, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }
}