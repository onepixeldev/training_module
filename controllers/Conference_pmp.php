<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conference_pmp extends MY_Controller
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Conference_pmp_model', 'mdl');
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }

    // View MAIN Page
    public function index()
    {
        // clear filter
        $this->session->set_userdata('tabID', '');

        $this->redirect($this->class_uri('ASF032'));
    }

    // View Page Filter
    public function viewTabFilter($tabID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        redirect($this->class_uri('ASF032'));
    }

    // CONFERENCE APPLICATION - MANUAL ENTRY
    public function ATF075()
    {

        $data['month'] = $this->mdl->getCurDate();
        $data['year'] = $this->mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl->getYearList(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    /*===========================================================
       CONFERENCE APPLICATION - MANUAL ENTRY (ASF032)
    =============================================================*/

    // CONFERENCE LIST
    public function getConferenceInfoList()
    {
        $sMonth = $this->input->post('sMonth', true);
        $sYear = $this->input->post('sYear', true);
        $refidTitle = $this->input->post('refid_title', true);

        if(empty($sMonth) && empty($sYear)) {
            $month = $this->mdl->getCurDate();
            $year = $this->mdl->getCurDate();

            $curMonth = $month->SYSDATE_MM;
            $curYear = $month->SYSDATE_YYYY;
        } elseif($sMonth == 1 && $sYear == 1) {
            $curMonth = '';
            $curYear = '';
        } else {
            $curMonth = $sMonth;
            $curYear = $sYear;
        }

        // get available records
        $data['conference_inf_list'] = $this->mdl->getConferenceInfoList($curMonth, $curYear, $refidTitle);

        $this->render($data);
    }

    // CONFERENCE APPLICANT LIST
    public function getStaffConferenceApplication()
    {   
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);

        //$data2 = array();

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['crName'] = $crName;
            $data['staff_cr_list'] = $this->mdl->getStaffConferenceApplication($refid);
        } 

        $this->renderAjax($data);
    }
    
    // ADD STAFF CONFERENCE
    public function addStaffConference() {
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['crName'] = $crName;

            $data['cr_detl'] = $this->mdl->getConferenceDetl($refid);
            if(!empty($data['cr_detl'])) {
                $data['venue'] = $data['cr_detl']->CM_ADDRESS;
                $data['city'] = $data['cr_detl']->CM_CITY;
                $data['postcode'] = $data['cr_detl']->CM_POSTCODE;
                $data['state'] = $data['cr_detl']->SM_STATE_DESC;
                $data['country'] = $data['cr_detl']->CM_COUNTRY_DESC;
                $data['date_from'] = $data['cr_detl']->CM_DATE_FROM;
                $data['date_to'] = $data['cr_detl']->CM_DATE_TO;
                $data['organizer'] = $data['cr_detl']->CM_ORGANIZER_NAME;
            } else {
                $data['venue'] = '';
                $data['city'] = '';
                $data['postcode'] = '';
                $data['state'] = '';
                $data['country'] = '';
                $data['date_from'] = '';
                $data['date_to'] = '';
                $data['organizer'] = '';
            }

            $data['staff_list'] = $this->dropdown($this->mdl->getStaffList(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
            $data['cr_role_list'] = $this->dropdown($this->mdl->getConferenceRoleList(), 'CPR_CODE', 'CPR_CODE', ' ---Please select--- ');
            $data['cr_cat_list'] = $this->dropdown($this->mdl->getCrCategoryList(), 'CC_CODE', 'CC_CODE_DESC_CC_FROM_TO', ' ---Please select--- ');
            $data['cr_spon_list'] = array(''=>' ---Please select--- ', 'Y'=>'Yes', 'N'=>'No', 'H'=>'Half Sponsorship');
            $data['cr_budget_spon_list'] = array(''=>' ---Please select--- ', 'GRANTS'=>'Grants', 'EXTERNAL'=>'External Organization', 'SELF'=>'Self');
            $data['cr_budget_origin_list'] = array(''=>' ---Please select--- ', 'DEPARTMENT'=>'DEPARTMENT', 'CONFERENCE'=>'CONFERENCE', 'OTHERS'=>'OTHERS');
            $data['cr_status_list'] = array(''=>' ---Please select--- ', 'APPLY'=>'APPLY', 'VERIFY_TNCA'=>'VERIFY_HOD', 'VERIFY_VC'=>'VERIFY_TNCA', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL', 'ENTRY'=>'ENTRY');
        }

        $this->render($data);
    }

    // SAVE INSERT NEW STAFF FOR CONFERENCE 
    public function saveNewStfCr() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // sponsor field
        $sponsor = $form['sponsor'];

        // refid 
        $refid = $form['conference_title'];
        $staff_id = $form['staff_id'];

        if(!empty($sponsor) && ($sponsor == 'Y' || $sponsor == 'H')) {
            // form / input validation
            $rule = array(
                'staff_id' => 'required|max_length[10]',
                'role' => 'required|max_length[100]',
                'paper_title1' => 'max_length[500]',
                'paper_title2' => 'max_length[500]',
                'category' => 'required|max_length[10]',
                'sponsor' => 'required|max_length[1]',
                'sponsor_name' => 'required|max_length[200]',
                'budget_origin_for_sponsor' => 'required|max_length[20]',
                'total' => 'required|numeric|max_length[40]',
                'budget_origin' => 'required|max_length[20]',
                'apply_date' => 'max_length[11]',
                'status' => 'required|max_length[20]',
                'remark1' => 'max_length[4000]',
                'remark2' => 'max_length[4000]',
                'remark3' => 'max_length[4000]',
                'remark4' => 'max_length[4000]',
                'approved_by_hod' => 'max_length[10]',
                'approved_date_hod' => 'max_length[11]',
                'remark_tnc' => 'max_length[4000]',
                'approved_by_tnc' => 'max_length[10]',
                'approved_date_tnc' => 'max_length[11]',
                'received_date_tnc' => 'max_length[11]',
                'remark_vc' => 'max_length[4000]',
                'approved_by_vc' => 'max_length[10]',
                'approved_date_vc' => 'max_length[11]',
                'received_date_vc' => 'max_length[11]'
            );
        } else {
            // form / input validation
            $rule = array(
                'staff_id' => 'required|max_length[10]',
                'role' => 'required|max_length[100]',
                'paper_title1' => 'max_length[500]',
                'paper_title2' => 'max_length[500]',
                'category' => 'required|max_length[10]',
                'sponsor' => 'required|max_length[1]',
                'sponsor_name' => 'max_length[200]',
                'budget_origin_for_sponsor' => 'max_length[20]',
                'total' => 'max_length[40]',
                'budget_origin' => 'required|max_length[20]',
                'apply_date' => 'max_length[11]',
                'status' => 'required|max_length[20]',
                'remark1' => 'max_length[4000]',
                'remark2' => 'max_length[4000]',
                'remark3' => 'max_length[4000]',
                'remark4' => 'max_length[4000]',
                'approved_by_hod' => 'max_length[10]',
                'approved_date_hod' => 'max_length[11]',
                'remark_tnc' => 'max_length[4000]',
                'approved_by_tnc' => 'max_length[10]',
                'approved_date_tnc' => 'max_length[11]',
                'received_date_tnc' => 'max_length[11]',
                'remark_vc' => 'max_length[4000]',
                'approved_by_vc' => 'max_length[10]',
                'approved_date_vc' => 'max_length[11]',
                'received_date_vc' => 'max_length[11]'
            );
        }

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->mdl->getStaffConferenceDetl($refid, $staff_id);

            if(empty($check)) {
                $insert = $this->mdl->saveNewStfCr($form, $refid);
                //$insert = 1;

                if($insert > 0) {
                    $insertStaffConDetl = $this->mdl->insStaffConDetl($refid, $staff_id);
                    if($insertStaffConDetl > 0) { 
                        $insConDetlMsg = 'Successfully saved on STAFF_CONFERENCE_DETL';
                    } else {
                        $insConDetlMsg = '';
                    }

                    $staff_detl = $this->mdl->getStaffConferenceDetl($refid, $staff_id);
                    if(!empty($staff_detl)) {
                        $sponsor = $staff_detl->SCM_SPONSOR;
                    } else {
                        $sponsor = '';
                    }

                    $json = array('sts' => 1, 'msg' => 'Record successfully saved'.nl2br("\r\n").$insConDetlMsg, 'alert' => 'success', 'sponsor' => $sponsor);
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

    // EDIT STAFF CONFERENCE
    public function editStaffConference() {
        $staffID = $this->input->post('staffID', true);
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);

        if(!empty($staffID) && !empty($refid)) {
            $data['staffID'] = $staffID;
            $data['refid'] = $refid;
            $data['crName'] = $crName;

            $data['cr_detl'] = $this->mdl->getConferenceDetl($refid);
            if(!empty($data['cr_detl'])) {
                $data['venue'] = $data['cr_detl']->CM_ADDRESS;
                $data['city'] = $data['cr_detl']->CM_CITY;
                $data['postcode'] = $data['cr_detl']->CM_POSTCODE;
                $data['state'] = $data['cr_detl']->SM_STATE_DESC;
                $data['country'] = $data['cr_detl']->CM_COUNTRY_DESC;
                $data['date_from'] = $data['cr_detl']->CM_DATE_FROM;
                $data['date_to'] = $data['cr_detl']->CM_DATE_TO;
                $data['organizer'] = $data['cr_detl']->CM_ORGANIZER_NAME;
            } else {
                $data['venue'] = '';
                $data['city'] = '';
                $data['postcode'] = '';
                $data['state'] = '';
                $data['country'] = '';
                $data['date_from'] = '';
                $data['date_to'] = '';
                $data['organizer'] = '';
            }

            $data['staff_list'] = $this->dropdown($this->mdl->getStaffList(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
            $data['cr_role_list'] = $this->dropdown($this->mdl->getConferenceRoleList(), 'CPR_CODE', 'CPR_CODE', ' ---Please select--- ');
            $data['cr_cat_list'] = $this->dropdown($this->mdl->getCrCategoryList(), 'CC_CODE', 'CC_CODE_DESC_CC_FROM_TO', ' ---Please select--- ');
            $data['cr_spon_list'] = array(''=>' ---Please select--- ', 'Y'=>'Yes', 'N'=>'No', 'H'=>'Half Sponsorship');
            $data['cr_budget_spon_list'] = array(''=>' ---Please select--- ', 'GRANTS'=>'Grants', 'EXTERNAL'=>'External Organization', 'SELF'=>'Self');
            $data['cr_budget_origin_list'] = array(''=>' ---Please select--- ', 'DEPARTMENT'=>'DEPARTMENT', 'CONFERENCE'=>'CONFERENCE', 'OTHERS'=>'OTHERS');
            $data['cr_status_list'] = array(''=>' ---Please select--- ', 'APPLY'=>'APPLY', 'VERIFY_HOD'=>'VERIFY_HOD', 'VERIFY_TNCA'=>'VERIFY_TNCA', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL', 'ENTRY'=>'ENTRY');

            $data['stf_detl'] = $this->mdl->getStaffConferenceDetl($refid, $staffID);
        }

        $this->render($data);
    }

    // GET CONFERENCE MAIN SPONSOR DETAIL
    public function checkSponsor() 
    {
        $this->isAjax();

        // get parameter values
        $staffID = $this->input->post('staffID', true);
        $refid = $this->input->post('refid', true);

        if (!empty($staffID) && !empty($refid)) {
            $check = $this->mdl->getStaffConferenceDetl($refid, $staffID);
            if(!empty($check)) {
                $sponsor = $check->SCM_SPONSOR;
            } else {
                $sponsor = '';
            }

            $json = array('sts' => 1, 'msg' => 'SCM_SPONSOR value', 'alert' => 'success', 'sponsor' => $sponsor); 
        } else {
            $json = array('sts' => 0, 'msg' => 'Failed to get SCM_SPONSOR value', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // SAVE EDIT STAFF FOR CONFERENCE 
    public function saveEditStfCr() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // sponsor field
        $sponsor = $form['sponsor'];

        // refid 
        $refid = $form['conference_title'];
        $staff_id = $form['staff_id'];

        if(!empty($sponsor) && ($sponsor == 'Y' || $sponsor == 'H')) {
            // form / input validation
            $rule = array(
                'staff_id' => 'required|max_length[10]',
                'role' => 'required|max_length[100]',
                'paper_title1' => 'max_length[500]',
                'paper_title2' => 'max_length[500]',
                'category' => 'required|max_length[10]',
                'sponsor' => 'required|max_length[1]',
                'sponsor_name' => 'required|max_length[200]',
                'budget_origin_for_sponsor' => 'required|max_length[20]',
                'total' => 'required|numeric|max_length[40]',
                'budget_origin' => 'required|max_length[20]',
                'apply_date' => 'max_length[11]',
                'status' => 'required|max_length[20]',
                'remark1' => 'max_length[4000]',
                'remark2' => 'max_length[4000]',
                'remark3' => 'max_length[4000]',
                'remark4' => 'max_length[4000]',
                'approved_by_hod' => 'max_length[10]',
                'approved_date_hod' => 'max_length[11]',
                'remark_tnc' => 'max_length[4000]',
                'approved_by_tnc' => 'max_length[10]',
                'approved_date_tnc' => 'max_length[11]',
                'received_date_tnc' => 'max_length[11]',
                'remark_vc' => 'max_length[4000]',
                'approved_by_vc' => 'max_length[10]',
                'approved_date_vc' => 'max_length[11]',
                'received_date_vc' => 'max_length[11]'
            );
        } else {
            // form / input validation
            $rule = array(
                'staff_id' => 'required|max_length[10]',
                'role' => 'required|max_length[100]',
                'paper_title1' => 'max_length[500]',
                'paper_title2' => 'max_length[500]',
                'category' => 'required|max_length[10]',
                'sponsor' => 'required|max_length[1]',
                'sponsor_name' => 'max_length[200]',
                'budget_origin_for_sponsor' => 'max_length[20]',
                'total' => 'max_length[40]',
                'budget_origin' => 'required|max_length[20]',
                'apply_date' => 'max_length[11]',
                'status' => 'required|max_length[20]',
                'remark1' => 'max_length[4000]',
                'remark2' => 'max_length[4000]',
                'remark3' => 'max_length[4000]',
                'remark4' => 'max_length[4000]',
                'approved_by_hod' => 'max_length[10]',
                'approved_date_hod' => 'max_length[11]',
                'remark_tnc' => 'max_length[4000]',
                'approved_by_tnc' => 'max_length[10]',
                'approved_date_tnc' => 'max_length[11]',
                'received_date_tnc' => 'max_length[11]',
                'remark_vc' => 'max_length[4000]',
                'approved_by_vc' => 'max_length[10]',
                'approved_date_vc' => 'max_length[11]',
                'received_date_vc' => 'max_length[11]'
            );
        }

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl->saveEditStfCr($form, $refid, $staff_id);
            //$update = 1;

            if($update > 0) {

                // CHECK IF STAFF_LEAVE_DETL RECORD EXIST

                // ****ASSIGN PARAM****
                // if :STAFF_CONFERENCE_MAIN.SCM_APPROVE_BY is not null and :STAFF_CONFERENCE_MAIN.SCM_TNCA_APPROVE_BY is null
				// and :STAFF_CONFERENCE_MAIN.SCM_VC_APPROVE_BY is null then
                // v_approver = :STAFF_CONFERENCE_MAIN.SCM_APPROVE_BY
                // v_approved_date := :STAFF_CONFERENCE_MAIN.SCM_APPROVE_DATE;

                // elsif :STAFF_CONFERENCE_MAIN.SCM_APPROVE_BY is not null and :STAFF_CONFERENCE_MAIN.SCM_TNCA_APPROVE_BY is not null
				// and :STAFF_CONFERENCE_MAIN.SCM_VC_APPROVE_BY is null then
                // v_approver = :STAFF_CONFERENCE_MAIN.SCM_TNCA_APPROVE_BY;
                // v_approved_date := :STAFF_CONFERENCE_MAIN.SCM_TNCA_APPROVE_DATE;

                // elsif :STAFF_CONFERENCE_MAIN.SCM_APPROVE_BY is not null and :STAFF_CONFERENCE_MAIN.SCM_TNCA_APPROVE_BY is not null
				// and :STAFF_CONFERENCE_MAIN.SCM_VC_APPROVE_BY is not null then
                // v_approver = :STAFF_CONFERENCE_MAIN.SCM_VC_APPROVE_BY;
                // v_approved_date := :STAFF_CONFERENCE_MAIN.SCM_VC_APPROVE_DATE;

                // ***UPDATE STAFF_LEAVE_DETL***
                // if scm_status in APPROVE, REJECT, CANCEL
                /*update staff_leave_detl
                set sld_status = 'APPROVE', sld_approve_by = v_approver, 
                    sld_approve_date = to_date(v_approved_date,'dd/mm/yyyy'), sld_cancel_approve_by = null, 
                    sld_cancel_approve_date = null
                where sld_ref_id = :SCM_LEAVE_REFID;*/

                // if scm_status in REJECT
                /*update staff_leave_detl
				set sld_status = 'REJECT', sld_approve_by = v_approver, 
					sld_approve_date = to_date(v_approved_date,'dd/mm/yyyy'), sld_cancel_approve_by = null, 
					sld_cancel_approve_date = null
                where sld_ref_id = :SCM_LEAVE_REFID;*/
                
                // if scm_status in CANCEL
                /*update staff_leave_detl
                set sld_status = 'CANCEL', sld_approve_by = null, 
                    sld_approve_date = null, sld_cancel_approve_by = v_approver, 
                    sld_cancel_approve_date = to_date(v_approved_date,'dd/mm/yyyy')
                where sld_ref_id = :SCM_LEAVE_REFID*/

                // else
                /*update staff_leave_detl
                set sld_status = 'APPLY', sld_approve_by = null, 
                    sld_approve_date = null, sld_cancel_approve_by = null, 
                    sld_cancel_approve_date = null
                where sld_ref_id = :SCM_LEAVE_REFID;*/


                /*update staff_conference_main
                set scm_update_by = RES2,
                scm_update_date = sysdate
                where scm_refid = :SCM_REFID
                and scm_staff_id = :SCM_STAFF_ID;*/


                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // FILE ATTACHMENT PARAM
    public function fileAttParam() {
        $staffID = $this->input->post('staffID', true);
        $refid = $this->input->post('refid', true);

        if(!empty($staffID) && !empty($refid)) {
            $this->session->set_userdata('staffID', $staffID);
            $this->session->set_userdata('refid', $refid);

            $json = array('sts' => 1, 'msg' => 'Param assigned.', 'alert' => 'success');
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // FILE ATTACHMENT URL
    public function fileAttachment() {
        $staffID = $this->session->userdata('staffID');
        $refid = $this->session->userdata('refid');
        $curUser = $this->staff_id;

        if(!empty($staffID) && !empty($refid) && !empty($curUser)) {
            $selUrl = $this->mdl->getEcommUrl();
            if(!empty($selUrl)) {
                $ecomm_url = $selUrl->HP_PARM_DESC;
            } else {
                $ecomm_url = '';
            }

            echo header('Location: '.$ecomm_url.'conferenceAttachment.jsp?action=attach&sID='.$staffID.'&admsID='.$curUser.'&apRID='.$refid.'_blank');
            exit;
        } 
    }

    // PARAM PMP
    public function setParamPmpAtt() {
		// clear filter for report
        $this->session->set_userdata('repCode','');
        $this->session->set_userdata('crStaffID','');
        $this->session->set_userdata('crRefID','');
        $this->session->set_userdata('print','');
		
    	// get current value 
    	$repCode = $this->input->post('repCode');
        $crStaffID = $this->input->post('crStaffID');
        $crRefID = $this->input->post('crRefID');

		// set session value staff id & conference id
        $this->session->set_userdata('crStaffID',$crStaffID);
        $this->session->set_userdata('crRefID',$crRefID);
        
        // PRINT APPENDIX A/B PARAM
        if(!empty($crRefID) && $repCode == 'ATRATT') {
            $cr_detl = $this->mdl->getConferenceDetl($crRefID);
            $cr_detl2 = $this->mdl->getConDuration($crRefID);
            $cr_country = $cr_detl->CM_COUNTRY_CODE;
            $cr_duration = $cr_detl2->CM_DURATION;

            if($cr_country != 'MYS') {
                if($cr_duration <= '13') {
                    $repCode = 'ATR031';
                } else {
                    $repCode = 'ATR075';
                }
                $json = array('sts' => 1, 'msg' => 'Print Appendix', 'alert' => 'danger');
            } else {
                $msg = 'Appendix A/B is not required for this application.';
                $json = array('sts' => 0, 'msg' => $msg, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 2, 'msg' => 'Print PMP', 'alert' => 'danger');
        }

        // set session value repcode
        $this->session->set_userdata('repCode',$repCode);

        echo json_encode($json);
    }

    // GENERATE REPORT PMP
    public function genReportPmpAtt() {
        $repCode = $this->session->userdata('repCode');
    	$crStaffID = $this->session->userdata('crStaffID');
        $crRefID = $this->session->userdata('crRefID');

        $param = array('PARAMFORM' => 'NO', 'STAFF_ID' => $crStaffID, 'CONFERENCE_ID' => $crRefID);
        $this->lib->report($repCode, $param);
    } 

    // ADD STAFF CONFERENCE
    public function addConferenceLeave() {
        $staffID = $this->input->post('staffID', true);
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);
        $crStaffName = $this->input->post('crStaffName', true);

        if(!empty($refid)) {
            $data['staff_id'] = $staffID;
            $data['refid'] = $refid;
            $data['crName'] = $crName;
            $data['crStaffName'] = $crStaffName;

            // CONFERENCE DETAILS
            $data['cr_detl'] = $this->mdl->getConferenceDetl($refid);
            if(!empty($data['cr_detl'])) {
                $data['date_from'] = $data['cr_detl']->CM_DATE_FROM;
                $data['date_to'] = $data['cr_detl']->CM_DATE_TO;
            } else {
                $data['date_to'] = '';
            }

            // STAFF CONFERENCE DETAILS
            $data['stf_cr_detl'] = $this->mdl->getStaffConferenceDetl($refid, $staffID);
            if(!empty($data['stf_cr_detl']->SCM_LEAVE_REFID)) {
                $data['leave_refid'] = $data['stf_cr_detl']->SCM_LEAVE_REFID;
            } else {
                $data['leave_refid'] = '';
            }

            // GET scm_leave_date_from & scm_leave_date_to
            $data['check_con_leave'] = $this->mdl->checkConferenceLeave($staffID, $refid);
            if(!empty($data['check_con_leave']->SCM_LEAVE_DATE_FROM) && !empty($data['check_con_leave']->SCM_LEAVE_DATE_TO)) {
                $data['scm_leave_date_from'] = $data['stf_cr_detl']->SCM_LEAVE_DATE_FROM;
                $data['scm_leave_date_to'] = $data['stf_cr_detl']->SCM_LEAVE_DATE_TO;

                // TOTAL DAY APPLIED
                $data['day_applied'] = $this->mdl->countTotalDayApplied($data['scm_leave_date_from'], $data['scm_leave_date_to']);
                if(!empty($data['day_applied']->TOTAL_DAY_APPLIED)) {
                    $data['total_day_applied'] = $data['day_applied']->TOTAL_DAY_APPLIED;
                } else {
                    $data['total_day_applied'] = '';
                }
            } else {
                $data['scm_leave_date_from'] = '';
                $data['scm_leave_date_to'] = '';
                $data['total_day_applied'] = '';
            }

            // CHECK ACADEMIC OR NON-ACADEMIC STAFF
            $data['cr_detl'] = $this->mdl->getStaffDetlAca($staffID);
            if(!empty($data['cr_detl'])) {
                // ENTITLED LEAVE
                if($data['cr_detl']->SS_ACADEMIC == 'Y') {
                    $data['entitled'] = '10';
                } else {
                    $data['entitled'] = '7';
                }

                // CURRENT YEAR
                $data['curr_year'] = $data['cr_detl']->CURR_YEAR;

                // CHECK STAFF LEAVE RECORD
                $data['lv_rec'] = $this->mdl->getTotalLeave($staffID);
                if(!empty($data['lv_rec'])) {
                    $data['balance'] = $data['lv_rec']->SLR_BALANCE_DAYS;
                } else {
                    $data['balance'] = $data['entitled'];
                }
            } else {
                $data['entitled'] = '';
                $data['balance'] = '';
            }

            // STAFF LEAVE DETL
            $data['leave_detl'] = $this->mdl->getLeaveDetl($data['leave_refid'], $staffID);
            if(!empty($data['leave_detl'])) {
                $data['sld_date_from'] = $data['leave_detl']->SLD_DATE_FROM;
                $data['sld_date_to'] = $data['leave_detl']->SLD_DATE_TO;
            } else {
                $data['sld_date_from'] = '';
                $data['sld_date_to'] = '';
            }

            // STAFF STUDY LEAVE
            $data['study_leave'] = $this->mdl->getStudyLeaveDetl($data['sld_date_from'], $data['sld_date_to'], $staffID);
            // SABBACTICAL LEAVE
            $data['sabb_leave'] = $this->mdl->getSabbacticalLeave($data['sld_date_from'], $data['sld_date_to'], $staffID);

            if($data['study_leave']->STUDY_LEAVE_COUNT > 0) {
                $data['sb_leave'] = 'Study Leave';
            } else {
                if($data['sabb_leave']->SABB_LEAVE > 0) {
                    $data['sb_leave'] = 'Sabbatical Leave';
                } else {
                    $data['sb_leave'] = 'None';
                }
            }
        }

        $this->render($data);
    }

    // CHECK CONFERENCE LEAVE
    // public function checkConferenceLeave() {
    //     $staffID = $this->input->post('staffID', true);
    //     $refid = $this->input->post('refid', true);
    //     $crName = $this->input->post('crName', true);

    //     if(!empty($staffID) && !empty($refid)) {
    //         $cl_detl = $this->mdl->checkConferenceLeave($staffID, $refid);

    //         if(!empty($cl_detl)) {
    //             $json = array('sts' => 1, 'msg' => 'Conference Leave Record Found', 'alert' => 'success');
    //         } else {
    //             $json = array('sts' => 0, 'msg' => 'Conference Leave Record Not Found', 'alert' => 'danger');
    //         }
    //     } else {
    //         $json = array('sts' => 0, 'msg' => 'Failed', 'alert' => 'danger');
    //     }
        
    //     echo json_encode($json);
    // }



    // // ADD CONFERENCE INFORMATION
    // public function addConferenceInfo()
    // {
    //     // get state dd list
    //     $data['state_list'] = $this->dropdown($this->mdl->getStateList(), 'SM_STATE_CODE', 'SM_STATE_CODE_DESC', ' ---Please select--- ');

    //     // get country dd list
    //     $data['country_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_CODE_DESC', ' ---Please select--- ');

    //     // get level dd list
    //     $data['lvl_list'] = $this->dropdown($this->mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');

    //     $data['con_Country'] = $this->mdl->getConCountrySetup();

    //     $this->render($data);
    // }

    // CONFERENCE INFORMATION DETL
    public function conInfoSetupDetl()
    {
        $refid = $this->input->post('refid', true);
        $title = $this->input->post('title', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['title'] = $title;
            $data['detl'] = $this->mdl->conInfoSetupDetl($refid);
        } else {
            $data['refid'] = null;
            $data['title'] = null;
            $data['detl'] = null;
        }
    
        $this->render($data);
    }

    // ADD CONFERENCE INFORMATION
    public function editConferenceInfo()
    {
        $refid = $this->input->post('refid', true);
        $title = $this->input->post('title', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['title'] = $title;
            $data['detl'] = $this->mdl->conInfoSetupDetl($refid);
        } else {
            $data['refid'] = null;
            $data['title'] = null;
            $data['detl'] = null;
        }

        // get state dd list
        $data['state_list'] = $this->dropdown($this->mdl->getStateList(), 'SM_STATE_CODE', 'SM_STATE_CODE_DESC', ' ---Please select--- ');

        // get country dd list
        $data['country_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_CODE_DESC', ' ---Please select--- ');

        // get level dd list
        $data['lvl_list'] = $this->dropdown($this->mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');

        $data['con_Country'] = $this->mdl->getConCountrySetup();

        $this->render($data);
    }

    // SAVE EDIT CONFERENCE INFORMATION
    public function saveEditConInfo() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // REFID
        $refid = $form['refid'];

        // form / input validation
        $rule = array(
            'title' => 'required|max_length[200]',
            'date_from' => 'max_length[11]',
            'date_to' => 'max_length[11]',
            'description' => 'max_length[500]',
            'address' => 'required|max_length[200]',
            'city' => 'max_length[100]',
            'postcode' => 'max_length[20]',
            'state' => 'required|max_length[10]',
            'country' => 'required|max_length[10]',
            'organizer_name' => 'required|max_length[100]',
            'level' => 'required|max_length[10]',
            'temporary_open' => 'max_length[1]',
            'total_participant' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl->saveEditConInfo($form, $refid);

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

    // DELETE CONFERENCE INFORMATION
    public function  deleteConInfo() 
    {
        $this->isAjax();
        
        $refid = $this->input->post('refid', true);

        if (!empty($refid)) {
            $del = $this->mdl->deleteConInfo($refid);
                
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
}