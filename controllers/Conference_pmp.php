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
    public function viewTabFilter($tabID, $scID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);

        // $scID = $scID;
        
        if($scID == 'ATF075') {
            redirect($this->class_uri('ATF075')); 
        } elseif($scID == 'ATF035') {
            redirect($this->class_uri('ATF035'));
        }
        
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

    // APPROVE / VERIFY CONFERENCE APPLICATION (TNC/A&A)
    public function ATF035()
    {
        $mod = 'TNCA';

        $data['month'] = $this->mdl->getCurDate();
        $data['year'] = $this->mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        // DEPARTMENT LIST
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($mod), 'DM_DEPT_CODE', 'DM_DEPT_CODE', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    // APPROVE CONFERENCE APPLICATION (VC)
    public function ATF043()
    {
        $mod = 'VC';

        $data['month'] = $this->mdl->getCurDate();
        $data['year'] = $this->mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        // DEPARTMENT LIST
        $data['dept_list'] = $this->dropdown($this->mdl->populateDept($mod), 'DM_DEPT_CODE', 'DM_DEPT_CODE', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        $this->render($data);
    }

    /*===========================================================
       CONFERENCE APPLICATION - MANUAL ENTRY (ATF075)
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
            $data['cr_status_list'] = array(''=>' ---Please select--- ', 'APPLY'=>'APPLY', 'VERIFY_TNCA'=>'VERIFY_HOD', 'VERIFY_VC'=>'VERIFY_TNCA', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL', 'ENTRY'=>'ENTRY');

            $data['stf_detl'] = $this->mdl->getStaffConferenceDetl($refid, $staffID);
        }

        $this->render($data);
    }

    // GET STAFF CONFERENCE MAIN SPONSOR DETAIL
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

    // GET STAFF CONFERENCE MAIN STATUS DETAIL
    public function getStaffConStatus() 
    {
        $this->isAjax();

        // get parameter values
        $staffID = $this->input->post('staffID', true);
        $refid = $this->input->post('refid', true);

        if (!empty($staffID) && !empty($refid)) {
            $check = $this->mdl->getStaffConferenceDetl($refid, $staffID);
            if(!empty($check)) {
                $status = $check->SCM_STATUS;
            } else {
                $status = '';
            }

            $json = array('sts' => 1, 'msg' => 'SCM_STATUS value', 'alert' => 'success', 'status' => $status); 
        } else {
            $json = array('sts' => 0, 'msg' => 'Failed to get SCM_STATUS value', 'alert' => 'danger');
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

    // DELETE STAFF CONFERENCE
    public function delStfConference() {
		$this->isAjax();
		
        $staffId = $this->input->post('staffId', true);
        $crRefID = $this->input->post('crRefID', true);
        $msgCheckDel1 = '';
        $msgCheckDel2 = '';
        $msgCheckDel3 = '';
        
        if (!empty($staffId) && !empty($crRefID)) {
            // CHECK STAFF_CONFERENCE_ALLOWANCE RECORD
            $checkDel1 = $this->mdl->checkDelStfConAllw($staffId, $crRefID);
            if(!empty($checkDel1)) {
                $msgCheckDel1 = '<b>STAFF_CONREFENCE_ALLOWANCE</b>'.nl2br("\r\n");
            }

            // CHECK STAFF_APPL_ATTACH RECORD
            $checkDel2 = $this->mdl->checkDelStfApplAtt($staffId, $crRefID);
            if(!empty($checkDel2)) {
                $msgCheckDel2 = '<b>STAFF_APPL_ATTACH</b>'.nl2br("\r\n");
            }
            
            // CHECK STAFF_LEAVE_DETL RECORD
            $checkDel3 = $this->mdl->checkDelStfLevDetl($staffId);
            if(!empty($checkDel3)) {
                $msgCheckDel3 = '<b>STAFF_LEAVE_DETL</b>'.nl2br("\r\n");
            }

            if(empty($checkDel1) && empty($checkDel2) && empty($checkDel3)) {
                $del = $this->mdl->delStfConference($staffId, $crRefID);
            
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to delete record'.nl2br("\r\n").'Please remove related record from'.nl2br("\r\n").$msgCheckDel1.$msgCheckDel2.$msgCheckDel3, 'alert' => 'danger');
            }
        	
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
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
        if(!empty($crRefID) && !empty($crStaffID) && $repCode == 'ATRATT') {
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
        } elseif(!empty($crRefID) && !empty($crStaffID) && $repCode == 'ATRAPPVER') {
            $cr_detl = $this->mdl->getConferenceDetl($crRefID);
            $cr_detl2 = $this->mdl->getConDuration($crRefID);
            $cr_country = $cr_detl->CM_COUNTRY_CODE;
            $cr_duration = $cr_detl2->CM_DURATION;

            if($cr_country != 'MYS' && !empty($cr_country)) {
                if($cr_duration <= '13') {
                    $repCode = 'ATR031';
                } else {
                    $repCode = 'ATR075';
                }
                $json = array('sts' => 1, 'msg' => 'Print Appendix', 'alert' => 'danger');
            } else {
                $repCode = 'ATR020';
                $json = array('sts' => 0, 'msg' => 'Print ATR020', 'alert' => 'danger');
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

    // ADD STAFF CONFERENCE LEAVE
    public function addConferenceLeave() {
        $staffID = $this->input->post('staffID', true);
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);
        $crStaffName = $this->input->post('crStaffName', true);

        if(empty($crStaffName) && !empty($staffID)) {
            // get staff name
            $data['stf_detl'] = $this->mdl->getStaffList($staffID);

            if(!empty($data['stf_detl'])) {
                $data['crStaffName'] = $data['stf_detl']->SM_STAFF_NAME;
            } else {
                $data['crStaffName'] = '';
            }
        } else {
            $data['crStaffName'] = $crStaffName;
        }

        if(empty($crName) && !empty($refid)) {

            // CONFERENCE DETAILS
            $data['cr_detl'] = $this->mdl->getConferenceDetl($refid);
            if(!empty($data['cr_detl'])) {
                $data['crName'] = $data['cr_detl']->CM_NAME;
            } else {
                $data['crName'] = '';
            }
        } else {
            $data['crName'] = $crName;
        }

        if(!empty($refid) && !empty($staffID)) {
            $data['staff_id'] = $staffID;
            $data['refid'] = $refid;
            
            // $data['crStaffName'] = $crStaffName;

            // CONFERENCE DETAILS
            $data['cr_detl'] = $this->mdl->getConferenceDetl($refid);
            if(!empty($data['cr_detl'])) {
                $data['date_from'] = $data['cr_detl']->CM_DATE_FROM;
                $data['date_to'] = $data['cr_detl']->CM_DATE_TO;
            } else {
                $data['date_from'] = '';
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

            // STAFF LEAVE DETL
            $data['leave_detl'] = $this->mdl->getLeaveDetl($data['leave_refid'], $staffID);
            if(!empty($data['leave_detl'])) {
                $data['sld_date_from'] = $data['leave_detl']->SLD_DATE_FROM;
                $data['sld_date_to'] = $data['leave_detl']->SLD_DATE_TO;

                // TOTAL DAY APPROVED
                $data['day_approve'] = $this->mdl->countTotalDayApprove($data['sld_date_from'], $data['sld_date_to']);
                
                if(!empty($data['day_approve']->TOTAL_DAY_APPROVE)) {
                    $data['total_day_approve'] = $data['day_approve']->TOTAL_DAY_APPROVE;
                } else {
                    $data['total_day_approve'] = '';
                }
            } else {
                $data['sld_date_from'] = '';
                $data['sld_date_to'] = '';
                $data['total_day_approve'] = '';
            }

            if(!empty($data['leave_detl']->SLD_DATE_FROM_YEAR)) {
                // CURRENT YEAR
                $data['curr_year'] = $data['leave_detl']->SLD_DATE_FROM_YEAR;
            } elseif(!empty($data['cr_detl']->CM_DATE_FROM_YEAR)) {
                $data['curr_year'] = $data['cr_detl']->CM_DATE_FROM_YEAR;
            } else {
                $data['curr_year'] = '';
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
            } else {
                $data['entitled'] = '';
                // $data['balance'] = '';
            }

            // CHECK STAFF LEAVE RECORD (BALANCE)
            $data['lv_rec'] = $this->mdl->getTotalLeave($staffID, $data['curr_year']);
            if(!empty($data['lv_rec'])) {
                $data['balance'] = $data['lv_rec']->SLR_BALANCE_DAYS;
            } else {
                $data['balance'] = $data['entitled'];
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

    // COUNT TOTAL DAY APPLIED
    public function countTotalDayApplied() {
        $app_date_fr = $this->input->post('app_date_fr', true);
        $app_date_to = $this->input->post('app_date_to', true);
        $app_date_fr_arr = explode('/', $app_date_fr);
        $app_date_to_arr = explode('/', $app_date_to);

        // var_dump($app_date_fr_split);
        // var_dump(checkdate($app_date_fr_split[1], $app_date_fr_split[0], $app_date_fr_split[2]));
        if(checkdate($app_date_fr_arr[1], $app_date_fr_arr[0], $app_date_fr_arr[2]) && checkdate($app_date_to_arr[1], $app_date_to_arr[0], $app_date_to_arr[2])) {
            if(!empty($app_date_fr) && !empty($app_date_to)) {
                $countTdayApplied = $this->mdl->countTotalDayApplied($app_date_fr, $app_date_to);
    
                if(!empty($countTdayApplied)) {
                    $countTdayApplied = $countTdayApplied->TOTAL_DAY_APPLIED;
                } else {
                    $countTdayApplied = '';
                }
    
                $json = array('sts' => 1, 'msg' => 'Total day applied counted', 'alert' => 'success', 'total_day_applied' => $countTdayApplied);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to count total day applied', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid Date', 'alert' => 'danger');
        }
        
        
        echo json_encode($json);
    }

    // GET LEAVE BALANCE
    public function getLeaveBalance() {
        $total_day_applied = $this->input->post('total_day_applied', true);
        $crRefid = $this->input->post('crRefid', true);
        $staffID = $this->input->post('staffID', true);
        $app_date_fr_year = $this->input->post('app_date_fr', true);
        // var_dump($app_date_fr_year);

        if(!empty($app_date_fr_year)) {
            $app_date_fr_year = explode('/', $app_date_fr_year);
            $app_date_fr_year = $app_date_fr_year[2];
        } else {
            $app_date_fr_year = '';
        }

        // var_dump($app_date_fr_year);

        if(!empty($staffID)) {
            $leaveDetl = $this->mdl->getTotalLeave($staffID, $app_date_fr_year);
            $stf_detl = $this->mdl->getStaffDetlAca($staffID);
            $con_detl = $this->mdl->getStaffConferenceDetl($crRefid, $staffID);
            

            // LEAVE REFID & SLD_TOTAL_DAY
            if(!empty($con_detl->SCM_LEAVE_REFID)) {
                $leave_refid = $con_detl->SCM_LEAVE_REFID;
                $stf_leave_detl = $this->mdl->getLeaveDetlLeaveDate($leave_refid, $staffID, $app_date_fr_year);

                if(!empty($stf_leave_detl)) {
                    $sld_total_day_db = $stf_leave_detl->SLD_TOTAL_DAY;
                } 
                else {
                    $sld_total_day_db = '';
                }
            } else {
                $leave_refid = '';
                $sld_total_day_db = '';
            }

            // ENTITLED LEAVE
            if(!empty($stf_detl)) {
                // ENTITLED LEAVE
                if($stf_detl->SS_ACADEMIC == 'Y') {
                    $entitled_leave = '10';
                } else {
                    $entitled_leave = '7';
                }
            }

            // BALANCE LEAVE
            if(!empty($leaveDetl)) {
                $leave_balance = $leaveDetl->SLR_BALANCE_DAYS;
            } else {
                $leave_balance = $entitled_leave;
            }

            // IF TOTAL DAY APPLIED == SLD_TOTAL_DAY then sts == 2
            // to prevent current leave balance from being subtracted by Total Day (Approve) if Total Day (Approve) value == to SLD_TOTAL_DAY
            if(($sld_total_day_db == $total_day_applied) && !empty($sld_total_day_db)) {
                $json = array('sts' => 2, 'msg' => 'Total day approve == to SLD_TOTAL_DAY', 'alert' => 'success', 'leave_balance' => $leave_balance, 'sld_total_day_db' => $sld_total_day_db, 'app_date_fr_year' => $app_date_fr_year, 'entitled_leave' => $entitled_leave);
            } elseif(($total_day_applied > $sld_total_day_db) && !empty($sld_total_day_db)) {
                $json = array('sts' => 4, 'msg' => 'Total day approve == to SLD_TOTAL_DAY', 'alert' => 'success', 'leave_balance' => $leave_balance, 'sld_total_day_db' => $sld_total_day_db, 'app_date_fr_year' => $app_date_fr_year, 'entitled_leave' => $entitled_leave);
            } elseif(($total_day_applied < $sld_total_day_db) && !empty($sld_total_day_db)) {
                $json = array('sts' => 3, 'msg' => 'Total day approve == to SLD_TOTAL_DAY', 'alert' => 'success', 'leave_balance' => $leave_balance, 'sld_total_day_db' => $sld_total_day_db, 'app_date_fr_year' => $app_date_fr_year, 'entitled_leave' => $entitled_leave);
            }  else {
                $json = array('sts' => 1, 'msg' => 'Leave balance', 'alert' => 'success', 'leave_balance' => $leave_balance, 'sld_total_day_db' => $sld_total_day_db, 'app_date_fr_year' => $app_date_fr_year, 'entitled_leave' => $entitled_leave);
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Fail to get leave balance', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // SAVE ADD/EDIT CONFERENCE LEAVE
    public function saveInsEditConLeave() 
    {
        $this->isAjax();

        // parameter values
        $form = $this->input->post('form', true);
        $staff_id = $form['staff_id'];
        $cr_refid = $form['conference_title'];
        $sld_refid = '';
        $successUpdStfLvDetl = 0;
        $successInsStfLvDetl = 0;
        $successUpdStfLvRec = 0;
        $successUpdStfConMain = 0;
        $successInsStfLvRec = 0;
        $msg_staff_leave_detl = '';
        $msg_staff_leave_rec = '';
        $msg_staff_con_main = '';

        $rule = array(
            'applied_date_from' => 'required|max_length[11]',
            'applied_date_to' => 'required|max_length[11]',
            'approve_date_from' => 'required|max_length[11]',
            'approve_date_to' => 'required|max_length[11]',
            'total_day_applied' => 'required|max_length[11]',
            'total_day_approve' => 'required|max_length[11]',
            'entitled' => 'required|max_length[11]',
            'balance' => 'required|max_length[11]',
            'year' => 'required|max_length[11]',
            'study_leave' => 'required|max_length[30]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {

            $cr_detl = $this->mdl->getStaffConferenceDetl($cr_refid, $staff_id);

            // leave refid
            $cr_leave_refid = $cr_detl->SCM_LEAVE_REFID;

            // apply date
            $apply_date = $cr_detl->SCM_APPLY_DATE;

            // approver & approve date
            $approve_by = $cr_detl->SCM_APPROVE_BY;
            $approve_date_hod = $cr_detl->SCM_APPROVE_DATE;
            
            $tnca_approve_by = $cr_detl->SCM_TNCA_APPROVE_BY;
            $approve_date_tnca = $cr_detl->SCM_TNCA_APPROVE_DATE;

            $vc_approve_by = $cr_detl->SCM_VC_APPROVE_BY;
            $approve_date_vc = $cr_detl->SCM_VC_APPROVE_DATE;

            // assign sld_status 
            $scm_status = $cr_detl->SCM_STATUS;

            $leave_approver = '';
            $approve_date = '';
            $leave_approver_tnca = '';
            $approve_date_tnca  = '';
            $leave_approver_vc = '';
            $approve_date_vc = '';

            if($scm_status == 'APPROVE') {
                $sld_status = 'APPROVE';

                // SLD_APPROVE_BY
                // SLD_APPROVE_DATE
                if(!empty($approve_by) && empty($tnca_approve_by) && empty($vc_approve_by)) {
                    $leave_approver = $approve_by;
                    $approve_date = $approve_date_hod;
                } else if(!empty($approve_by) && !empty($tnca_approve_by) && empty($vc_approve_by)) {
                    $leave_approver_tnca = $tnca_approve_by;
                    $approve_date_tnca = $approve_date_tnca;
                } else if(!empty($approve_by) && !empty($tnca_approve_by) && !empty($vc_approve_by)) {
                    $leave_approver_vc = $vc_approve_by;
                    $approve_date_vc = $approve_date_vc;
                }
                
            } elseif($scm_status == 'REJECT') {
                $sld_status = 'REJECT';
                
                // SLD_APPROVE_BY
                // SLD_APPROVE_DATE
                if(!empty($approve_by) && empty($tnca_approve_by) && empty($vc_approve_by)) {
                    $leave_approver = $approve_by;
                    $approve_date = $approve_date_hod;
                } else if(!empty($approve_by) && !empty($tnca_approve_by) && empty($vc_approve_by)) {
                    $leave_approver_tnca = $tnca_approve_by;
                    $approve_date_tnca = $approve_date_tnca;
                } else if(!empty($approve_by) && !empty($tnca_approve_by) && !empty($vc_approve_by)) {
                    $leave_approver_vc = $vc_approve_by;
                    $approve_date_vc = $approve_date_vc;
                }
            } else {
                $sld_status = 'APPLY';
            }

            // if staff_leave_detl(sld_refid) !empty then update else insert
            if(!empty($cr_leave_refid)) {
                
                $upd_staff_leave_detl = $this->mdl->updStaffLeaveDetl($form, $cr_leave_refid, $staff_id);

                if($upd_staff_leave_detl > 0) {
                    $successUpdStfLvDetl++;
                    $msg_staff_leave_detl = 'Record succesfully updated (STAFF_LEAVE_DETL)';

                    $upd_stf_con_main = $this->mdl->updStaffConMain($form, $cr_refid, $staff_id);
                    if($upd_stf_con_main > 0) {
                        $successUpdStfConMain++;
                        $msg_staff_con_main = 'Record succesfully updated (STAFF_CONFERENCE_MAIN)';
                    } 
                } 
            } else {
                
                // generate sld_refid    
                $sld_refid_gen = $this->mdl->getStaffLeaveDetlRefid();
                if(!empty($sld_refid_gen)) {
                    $sld_refid = $sld_refid_gen->SLD_GEN_REFID;
                }
                // var_dump($sld_refid);

                $ins_staff_leave_detl = $this->mdl->insStaffLeaveDetl($form, $sld_refid, $staff_id, $apply_date, $sld_status, $leave_approver, $approve_date, $leave_approver_tnca, $approve_date_tnca, $leave_approver_vc, $approve_date_vc);

                if($ins_staff_leave_detl > 0) {
                    $successInsStfLvDetl++;
                    $msg_staff_leave_detl = 'Record succesfully saved (STAFF_LEAVE_DETL)';

                    $upd_stf_con_main = $this->mdl->updStaffConMainLvRefid($form, $cr_refid, $staff_id, $sld_refid);
                    if($upd_stf_con_main > 0) {
                        $successUpdStfConMain++;
                        $msg_staff_con_main = 'Record succesfully updated (STAFF_CONFERENCE_MAIN)';
                    }
                } 
            }

            // split to YYYY
            $approve_date_from = $form['approve_date_from'];
            $approve_date_from = explode('/', $approve_date_from);
            $approve_date_from_year = $approve_date_from[2];
            // var_dump($approve_date_from_year);

            $stf_lv_rec = $this->mdl->getTotalLeave($staff_id, $approve_date_from_year);

            if(!empty($stf_lv_rec) && ($successUpdStfLvDetl > 0 || $successInsStfLvDetl > 0)) {

                $sum_total_day_taken = $this->mdl->sumTotalDayTaken($staff_id, $approve_date_from_year);
                if(!empty($sum_total_day_taken->SLD_TOTAL_DAY) && $sum_total_day_taken->SLD_STAFF_ID_COUNT > 1) {
                    $day_taken = $sum_total_day_taken->SLD_TOTAL_DAY;
                } else {
                    $day_taken = $form['total_day_approve'];
                }

                $upd_staff_leave_rec = $this->mdl->updStaffLeaveRec($form, $staff_id, $day_taken, $approve_date_from_year);

                if($upd_staff_leave_rec > 0) {
                    $successUpdStfLvRec++;
                    $msg_staff_leave_rec = 'Record succesfully updated (STAFF_LEAVE_RECORD)';
                }
            } else {

                $sum_total_day_taken = $this->mdl->sumTotalDayTaken($staff_id, $approve_date_from_year);
                if(!empty($sum_total_day_taken->SLD_TOTAL_DAY)) {
                    $day_taken = $sum_total_day_taken->SLD_TOTAL_DAY;
                } else {
                    $day_taken = $form['total_day_approve'];
                }

                $ins_staff_leave_rec = $this->mdl->insStaffLeaveRec($form, $staff_id, $day_taken);

                if($ins_staff_leave_rec > 0) {
                    $successInsStfLvRec++;
                    $msg_staff_leave_rec = 'Record succesfully saved (STAFF_LEAVE_RECORD)';
                }
            }

            /*update staff_conference_main
                set scm_update_by = RES2,
                scm_update_date = sysdate
                where scm_refid = :SCM_REFID
                and scm_staff_id = :SCM_STAFF_ID;*/

                // $successUpdStfLvDetl = 0;
                // $successInsStfLvDetl = 0;
                // $successUpdStfConMain = 0;
                // $successUpdStfLvRec = 0;
                // $successInsStfLvRec = 0;

            if(($successUpdStfLvDetl > 0 && $successUpdStfConMain > 0 && $successUpdStfLvRec > 0) || ($successInsStfLvDetl > 0 && $successUpdStfConMain > 0 && $successInsStfLvRec > 0) || ($successUpdStfLvDetl > 0 && $successUpdStfConMain > 0 && $successUpdStfLvRec > 0) || ($successInsStfLvDetl > 0 && $successUpdStfConMain > 0 && $successUpdStfLvRec > 0)) {
                $json = array('sts' => 1, 'msg' => nl2br("\r\n").$msg_staff_leave_detl.nl2br("\r\n").$msg_staff_con_main.nl2br("\r\n").$msg_staff_leave_rec, 'alert' => 'success', 'balance' => $form['balance'], 'day_taken' => $day_taken);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // STAFF CONFERENCE ALLOWANCE
    public function staffConferenceAllowance() {
        $staffID = $this->input->post('staffID', true);
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);
        $crStaffName = $this->input->post('crStaffName', true);
        $data['total_apply'] = 0;
        $data['total_apply_foreign'] = 0;
        $data['total_hod'] = 0;
        $data['total_hod_foreign'] = 0;
        $data['total_tnca'] = 0;
        $data['total_tnca_foreign'] = 0;
        $data['total_vc'] = 0;
        $data['total_vc_foreign'] = 0;

        if(empty($crStaffName) && !empty($staffID)) {
            // get staff name
            $data['stf_detl'] = $this->mdl->getStaffList($staffID);

            if(!empty($data['stf_detl'])) {
                $data['crStaffName'] = $data['stf_detl']->SM_STAFF_NAME;
            } else {
                $data['crStaffName'] = '';
            }
        } else {
            $data['crStaffName'] = $crStaffName;
        }

        if(!empty($refid) && !empty($staffID)) {
            $data['staff_id'] = $staffID;
            $data['refid'] = $refid;
            $data['crName'] = $crName;
            // $data['crStaffName'] = $crStaffName;

            // CONFERENCE DETAILS
            $data['cr_detl'] = $this->mdl->getConferenceDetl($refid);
            if(!empty($data['cr_detl'])) {
                $data['date_from'] = $data['cr_detl']->CM_DATE_FROM;
                $data['date_to'] = $data['cr_detl']->CM_DATE_TO;
            } else {
                $data['date_from'] = '';
                $data['date_to'] = '';
            }

            // STAFF CONFERENCE DETAILS
            $data['stf_cr_detl'] = $this->mdl->getStaffConferenceDetl($refid, $staffID);
            if(!empty($data['stf_cr_detl'])) {
                $data['budget_origin'] = $data['stf_cr_detl']->SCM_SPONSOR_BUDGET_ORIGIN;
                $data['appl_con_ptnca'] = number_format($data['stf_cr_detl']->SCM_RM_TOTAL_AMT, 2);
                $data['appr_hod_con_ptnca'] = number_format($data['stf_cr_detl']->SCM_RM_TOTAL_AMT_APPROVE_HOD, 2);
                $data['appr_tnca'] = number_format($data['stf_cr_detl']->SCM_RM_TOTAL_AMT_APPROVE_TNCA, 2);
                $data['appr_vc'] = number_format($data['stf_cr_detl']->SCM_RM_TOTAL_AMT_APPROVE_VC, 2);
                $data['appl_dept'] = number_format($data['stf_cr_detl']->SCM_RM_TOTAL_AMT_DEPT, 2);
                $data['appl_dept_hod'] = number_format($data['stf_cr_detl']->SCM_TOTAL_AMT_DEPT_APPRV_HOD, 2);
                $data['budget_origin'] = $data['stf_cr_detl']->SCM_BUDGET_ORIGIN;
            } else {
                $data['budget_origin'] = '';
                $data['appl_con_ptnca'] = '';
                $data['appr_hod_con_ptnca'] = '';
                $data['appr_tnca'] = '';
                $data['appr_vc'] = '';
                $data['appl_dept'] = '';
                $data['appl_dept_hod'] = '';
                $data['budget_origin'] = '';
            }

            // STAFF CONFERENCE ALLOWANCE
            $data['stf_cr_allw'] = $this->mdl->getStaffConAllowance($refid, $staffID);
            $stf_cr_allw = $data['stf_cr_allw'];
            foreach($stf_cr_allw as $key=>$sca) {
                $data['total_apply'] += $sca->SCA_AMOUNT_RM;
                $data['total_apply_foreign'] += $sca->SCA_AMOUNT_FOREIGN;
                $data['total_hod'] += $sca->SCA_AMT_RM_APPROVE_HOD;
                $data['total_hod_foreign'] += $sca->SCA_AMT_FOREIGN_APPROVE_HOD;
                $data['total_tnca'] += $sca->SCA_AMT_RM_APPROVE_TNCA;
                $data['total_tnca_foreign'] += $sca->SCA_AMT_FOREIGN_APPROVE_TNCA;
                $data['total_vc'] += $sca->SCA_AMT_RM_APPROVE_VC;
                $data['total_vc_foreign'] += $sca->SCA_AMT_FOREIGN_APPROVE_VC;
            }
        }

        $this->render($data);
    }

    // ADD STAFF CONFERENCE ALLOWANCE
    public function addStaffConferenceAllowance() {
        $staffID = $this->input->post('staffId', true);
        $crStaffName = $this->input->post('staffName', true);
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);

        if(!empty($refid) && !empty($staffID)) {
            $data['staff_id'] = $staffID;
            $data['staff_name'] = $crStaffName;
            $data['refid'] = $refid;
            $data['cr_name'] = $crName;

            $data['cr_allowance_dd'] = $this->dropdown($this->mdl->getConferenceAllowanceList(), 'CA_CODE', 'CA_CODE_DESC', ' ---Please select--- ');
        } else {
            $data['staff_id'] = '';
            $data['staff_name'] = '';
            $data['refid'] = '';
            $data['cr_name'] = '';
        }
       
        $this->render($data);
    }

    // SAVE INSERT NEW STAFF CONFERENCE ALLOWANCE
    public function saveNewStfConAllowance() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $refid = $form['conference_title'];
        $staff_id = $form['staff_id'];
        $allowance_code = $form['allowance_code'];
        $insertMsg = '';
        $update1Msg = '';

        // form / input validation
        $rule = array(
            'staff_id' => 'required|max_length[20]',
            'apply' => 'required|numeric|max_length[40]',
            'apply_foreign' => 'numeric|max_length[40]',
            'approved_hod' => 'numeric|max_length[40]',
            'approved_hod_foreign' => 'numeric|max_length[40]',
            'approved_tnca' => 'numeric|max_length[40]',
            'approved_tnca_foreign' => 'numeric|max_length[40]',
            'approved_vc' => 'numeric|max_length[40]',
            'approved_vc_foreign' => 'numeric|max_length[40]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->mdl->getStaffConAllowance($refid, $staff_id, $allowance_code);

            if(empty($check)) {
                $insert = $this->mdl->saveNewStfConAllowance($form, $refid, $staff_id, $allowance_code);

                if($insert > 0) {
                    $insertMsg = 'Record successfully saved (STAFF_CONFERENCE_ALLOWANCE)';

                    // GET STAFF CONFERENCE DETL
                    $staff_detl = $this->mdl->getStaffConferenceDetl($refid, $staff_id);
                    if(!empty($staff_detl)) {
                        $budget_origin = $staff_detl->SCM_BUDGET_ORIGIN;
                    } else {
                        $budget_origin = '';
                    }
                    // var_dump($budget_origin);

                    // GET SUM ALLOWANCE
                    if($budget_origin == 'CONFERENCE') {
                        $sum_allw_con = $this->mdl->getSumAllowanceConference($refid, $staff_id);
                        if(!empty($sum_allw_con)) {
                            $scm_rm_total_amt = $sum_allw_con->SCA_AMOUNT_RM;
                            $scm_foreign_total_amt = $sum_allw_con->SCA_AMOUNT_FOREIGN;
                            $scm_rm_total_amt_dept = 0;
                            $scm_foreign_total_amt_dept = 0;
                            $scm_rm_total_amt_approve_hod = $sum_allw_con->SCA_AMT_RM_APPROVE_HOD;
                            $scm_total_amt_dept_apprv_hod = 0;
                            $scm_rm_total_amt_approve_tnca = $sum_allw_con->SCA_AMT_RM_APPROVE_TNCA;
                            $scm_rm_total_amt_approve_vc = $sum_allw_con->SCA_AMT_RM_APPROVE_VC;
                        } else {
                            $scm_rm_total_amt = 0;
                            $scm_foreign_total_amt = 0;
                            $scm_rm_total_amt_dept = 0;
                            $scm_foreign_total_amt_dept = 0;
                            $scm_rm_total_amt_approve_hod = 0;
                            $scm_total_amt_dept_apprv_hod = 0;
                            $scm_rm_total_amt_approve_tnca = 0;
                            $scm_rm_total_amt_approve_vc = 0;
                        }
                    } elseif($budget_origin == 'DEPARTMENT') {
                        $sum_allw_dept_local = $this->mdl->getSumAllowanceDepartmentCon($refid, $staff_id);
                        $sum_allw_dept = $this->mdl->getSumAllowanceDepartment($refid, $staff_id);

                        if(!empty($sum_allw_dept_local) && !empty($sum_allw_dept)) {
                            $scm_rm_total_amt = $sum_allw_dept_local->SCA_AMOUNT_RM;
                            $scm_foreign_total_amt = $sum_allw_dept_local->SCA_AMOUNT_FOREIGN;
                            $scm_rm_total_amt_dept = $sum_allw_dept->SCA_AMOUNT_RM;
                            $scm_foreign_total_amt_dept = $sum_allw_dept->SCA_AMOUNT_FOREIGN;
                            $scm_rm_total_amt_approve_hod = $sum_allw_dept_local->SCA_AMT_RM_APPROVE_HOD;
                            $scm_total_amt_dept_apprv_hod = $sum_allw_dept->SCA_AMT_RM_APPROVE_HOD;
                            $scm_rm_total_amt_approve_tnca = $sum_allw_dept_local->SCA_AMT_RM_APPROVE_TNCA;
                            $scm_rm_total_amt_approve_vc = $sum_allw_dept_local->SCA_AMT_RM_APPROVE_VC;
                        } else {
                            $scm_rm_total_amt = 0;
                            $scm_foreign_total_amt = 0;
                            $scm_rm_total_amt_dept = 0;
                            $scm_foreign_total_amt_dept = 0;
                            $scm_rm_total_amt_approve_hod = 0;
                            $scm_total_amt_dept_apprv_hod = 0;
                            $scm_rm_total_amt_approve_tnca = 0;
                            $scm_rm_total_amt_approve_vc = 0;
                        }
                    }
                    
                    // UPDATE SUM ALLOWANCE TO STAFF_CONFERENCE_MAIN
                    if($budget_origin == 'CONFERENCE' || $budget_origin == 'DEPARTMENT') {
                        $update1 = $this->mdl->updSumScm($refid, $staff_id, $budget_origin, $scm_rm_total_amt, $scm_foreign_total_amt, $scm_rm_total_amt_dept, $scm_foreign_total_amt_dept, $scm_rm_total_amt_approve_hod, $scm_total_amt_dept_apprv_hod, $scm_rm_total_amt_approve_tnca, $scm_rm_total_amt_approve_vc);
                        if($update1 > 0) { 
                            $update1Msg = 'Record successfully updated (STAFF_CONFERENCE_MAIN)';
                        } else {
                            $update1Msg = 'Fail to update record (STAFF_CONFERENCE_MAIN)';
                        }
                    } 

                    $json = array('sts' => 1, 'msg' => nl2br("\r\n").$insertMsg.nl2br("\r\n").$update1Msg, 'alert' => 'success');
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

    // EDIT STAFF CONFERENCE ALLOWANCE
    public function editStaffConferenceAllowance() {
        $staffID = $this->input->post('staffId', true);
        $crStaffName = $this->input->post('staffName', true);
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);
        $sca_code = $this->input->post('sca_code', true);

        if(!empty($refid) && !empty($staffID) && !empty($sca_code)) {
            $data['staff_id'] = $staffID;
            $data['staff_name'] = $crStaffName;
            $data['refid'] = $refid;
            $data['cr_name'] = $crName;

            $data['cr_allowance_dd'] = $this->dropdown($this->mdl->getConferenceAllowanceList(), 'CA_CODE', 'CA_CODE_DESC', ' ---Please select--- ');

            $data['stf_cr_allw'] = $this->mdl->getStaffConAllowance($refid, $staffID, $sca_code);
            if(!empty($data['stf_cr_allw'])) {
                $data['allw_code'] = $data['stf_cr_allw']->SCA_ALLOWANCE_CODE;
                $data['apply'] = $data['stf_cr_allw']->SCA_AMOUNT_RM;
                $data['apply_foreign'] = $data['stf_cr_allw']->SCA_AMOUNT_FOREIGN;
                $data['apprv_hod'] = $data['stf_cr_allw']->SCA_AMT_RM_APPROVE_HOD;
                $data['apprv_hod_foreign'] = $data['stf_cr_allw']->SCA_AMT_FOREIGN_APPROVE_HOD;
                $data['apprv_tnca'] = $data['stf_cr_allw']->SCA_AMT_RM_APPROVE_TNCA;
                $data['apprv_tnca_foreign'] = $data['stf_cr_allw']->SCA_AMT_FOREIGN_APPROVE_TNCA;
                $data['apprv_vc'] = $data['stf_cr_allw']->SCA_AMT_RM_APPROVE_VC;
                $data['apprv_vc_foreign'] = $data['stf_cr_allw']->SCA_AMT_FOREIGN_APPROVE_VC;
            } else {
                $data['allw_code'] = '';
                $data['apply'] = '';
                $data['apply_foreign'] = '';
                $data['apprv_hod'] = '';
                $data['apprv_hod_foreign'] = '';
                $data['apprv_tnca'] = '';
                $data['apprv_tnca_foreign'] = '';
                $data['apprv_vc'] = '';
                $data['apprv_vc_foreign'] = '';
            }
        } else {
            $data['staff_id'] = '';
            $data['staff_name'] = '';
            $data['refid'] = '';
            $data['cr_name'] = '';
        }
       
        $this->render($data);
    }

    // SAVE UPDATE STAFF CONFERENCE ALLOWANCE
    public function saveUpdStfConAllowance() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $refid = $form['conference_title'];
        $staff_id = $form['staff_id'];
        $allowance_code = $form['allowance_code'];
        $updateMsg = '';
        $update1Msg = '';

        // form / input validation
        $rule = array(
            // 'staff_id' => 'required|max_length[20]',
            'apply' => 'required|numeric|max_length[40]',
            'apply_foreign' => 'numeric|max_length[40]',
            'approved_hod' => 'numeric|max_length[40]',
            'approved_hod_foreign' => 'numeric|max_length[40]',
            'approved_tnca' => 'numeric|max_length[40]',
            'approved_tnca_foreign' => 'numeric|max_length[40]',
            'approved_vc' => 'numeric|max_length[40]',
            'approved_vc_foreign' => 'numeric|max_length[40]'
        );

        $exclRule = array('staff_id');
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            // $check = $this->mdl->getStaffConAllowance($refid, $staff_id, $allowance_code);

           
            $update = $this->mdl->saveUpdStfConAllowance($form, $refid, $staff_id, $allowance_code);

            if($update > 0) {
                $updateMsg = 'Record successfully saved (STAFF_CONFERENCE_ALLOWANCE)';

                // GET STAFF CONFERENCE DETL
                $staff_detl = $this->mdl->getStaffConferenceDetl($refid, $staff_id);
                if(!empty($staff_detl)) {
                    $budget_origin = $staff_detl->SCM_BUDGET_ORIGIN;
                } else {
                    $budget_origin = '';
                }
                // var_dump($budget_origin);

                // GET SUM ALLOWANCE
                if($budget_origin == 'CONFERENCE') {
                    $sum_allw_con = $this->mdl->getSumAllowanceConference($refid, $staff_id);
                    $sum_allw_con_tnca_vc = $this->mdl->getSumAllowanceTncaVc($refid, $staff_id);
                    if(!empty($sum_allw_con) && !empty($sum_allw_con_tnca_vc)) {
                        $scm_rm_total_amt = $sum_allw_con->SCA_AMOUNT_RM;
                        $scm_foreign_total_amt = $sum_allw_con->SCA_AMOUNT_FOREIGN;
                        $scm_rm_total_amt_dept = 0;
                        $scm_foreign_total_amt_dept = 0;
                        $scm_rm_total_amt_approve_hod = $sum_allw_con->SCA_AMT_RM_APPROVE_HOD;
                        $scm_total_amt_dept_apprv_hod = 0;
                        $scm_rm_total_amt_approve_tnca = $sum_allw_con_tnca_vc->SCA_AMT_RM_APPROVE_TNCA;
                        $scm_rm_total_amt_approve_vc = $sum_allw_con_tnca_vc->SCA_AMT_RM_APPROVE_VC;
                    } else {
                        $scm_rm_total_amt = 0;
                        $scm_foreign_total_amt = 0;
                        $scm_rm_total_amt_dept = 0;
                        $scm_foreign_total_amt_dept = 0;
                        $scm_rm_total_amt_approve_hod = 0;
                        $scm_total_amt_dept_apprv_hod = 0;
                        $scm_rm_total_amt_approve_tnca = 0;
                        $scm_rm_total_amt_approve_vc = 0;
                    }
                } elseif($budget_origin == 'DEPARTMENT') {
                    $sum_allw_dept_local = $this->mdl->getSumAllowanceDepartmentCon($refid, $staff_id);
                    $sum_allw_dept = $this->mdl->getSumAllowanceDepartment($refid, $staff_id);
                    $sum_allw_con_tnca_vc = $this->mdl->getSumAllowanceTncaVc($refid, $staff_id);

                    if(!empty($sum_allw_dept_local) && !empty($sum_allw_dept) && !empty($sum_allw_con_tnca_vc)) {
                        $scm_rm_total_amt = $sum_allw_dept_local->SCA_AMOUNT_RM;
                        $scm_foreign_total_amt = $sum_allw_dept_local->SCA_AMOUNT_FOREIGN;
                        $scm_rm_total_amt_dept = $sum_allw_dept->SCA_AMOUNT_RM;
                        $scm_foreign_total_amt_dept = $sum_allw_dept->SCA_AMOUNT_FOREIGN;
                        $scm_rm_total_amt_approve_hod = $sum_allw_dept_local->SCA_AMT_RM_APPROVE_HOD;
                        $scm_total_amt_dept_apprv_hod = $sum_allw_dept->SCA_AMT_RM_APPROVE_HOD;
                        $scm_rm_total_amt_approve_tnca = $sum_allw_con_tnca_vc->SCA_AMT_RM_APPROVE_TNCA;
                        $scm_rm_total_amt_approve_vc = $sum_allw_con_tnca_vc->SCA_AMT_RM_APPROVE_VC;
                    } else {
                        $scm_rm_total_amt = 0;
                        $scm_foreign_total_amt = 0;
                        $scm_rm_total_amt_dept = 0;
                        $scm_foreign_total_amt_dept = 0;
                        $scm_rm_total_amt_approve_hod = 0;
                        $scm_total_amt_dept_apprv_hod = 0;
                        $scm_rm_total_amt_approve_tnca = 0;
                        $scm_rm_total_amt_approve_vc = 0;
                    }
                }
                
                // UPDATE SUM ALLOWANCE TO STAFF_CONFERENCE_MAIN
                if($budget_origin == 'CONFERENCE' || $budget_origin == 'DEPARTMENT') {
                    $update1 = $this->mdl->updSumScm($refid, $staff_id, $budget_origin, $scm_rm_total_amt, $scm_foreign_total_amt, $scm_rm_total_amt_dept, $scm_foreign_total_amt_dept, $scm_rm_total_amt_approve_hod, $scm_total_amt_dept_apprv_hod, $scm_rm_total_amt_approve_tnca, $scm_rm_total_amt_approve_vc);
                    if($update1 > 0) { 
                        $update1Msg = 'Record successfully updated (STAFF_CONFERENCE_MAIN)';
                    } else {
                        $update1Msg = 'Fail to update record (STAFF_CONFERENCE_MAIN)';
                    }
                } 

                $json = array('sts' => 1, 'msg' => nl2br("\r\n").$updateMsg.nl2br("\r\n").$update1Msg, 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
             
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE STAFF CONFERENCE ALLOWANCE
    public function delStfConAllowance() {
		$this->isAjax();
		
        $staffId = $this->input->post('staffId', true);
        $crRefID = $this->input->post('crRefID', true);
        $sca_code = $this->input->post('sca_code', true);
        
        if (!empty($staffId) && !empty($crRefID) && !empty($sca_code)) {
        	$del = $this->mdl->delStfConAllowance($staffId, $crRefID, $sca_code);
            
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
       Approve / Verify Conference Application (TNC A&A) (ATF035)
    ================================================================*/

    // CONFERENCE APLICATION TNCAA LIST
    public function getConferenceApplicationTncaVc()
    {
        $deptCode = $this->input->post('deptCode', true);
        $mod = $this->input->post('mod', true);

        // get available records
        $data['con_app_tncaa'] = $this->mdl->getConferenceApplicationTncaVc($deptCode, $mod);

        $this->render($data);
    }

    // GET DEPARTMENT DESC
    public function getDepartmentDesc() {
		$this->isAjax();
		
        $deptCode = $this->input->post('deptCode', true);
        
        if (!empty($deptCode)) {
            $getDept = $this->mdl->getDeptDetl($deptCode);
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

    // GET FILE ATTACHMENT
    public function getFileAttachment()
    {
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);

        // get available records
        if(!empty($staff_id) && !empty($refid)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;

            // GET STAFF NAME
            $data['stf_detl'] = $this->mdl->getStaffList($staff_id);
            if(!empty($data['stf_detl'])) {
                $data['staff_name'] = $data['stf_detl']->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }

            // GET CONFERENCE NAME
            $data['con_detl'] = $this->mdl->getConferenceDetl($refid);
            if(!empty($data['con_detl'])) {
                $data['con_name'] = $data['con_detl']->CM_NAME;
            } else {
                $data['con_name'] = '';
            }

            // FILE ATTACHMENT LIST
            $data['file_att'] = $this->mdl->getFileAttachment($staff_id, $refid);
        } else {
            $data['staff_id'] = '';
            $data['refid'] = '';
            $data['file_att'] = '';
        }

        $this->render($data);
    }

    // DOWNLAOD FILE ATTACHMENT PARAM
    public function dloadFileAttParam() {
        $staff_id = $this->input->post('staff_id', true);
        $cr_refid = $this->input->post('cr_refid', true);
        $file_name = $this->input->post('file_name', true);

        if(!empty($staff_id) && !empty($cr_refid) && !empty($file_name)) {
            $file_name = str_replace(" ","_", $file_name);
            $this->session->set_userdata('staff_id', $staff_id);
            $this->session->set_userdata('cr_refid', $cr_refid);
            $this->session->set_userdata('file_name', $file_name);

            $json = array('sts' => 1, 'msg' => 'Param assigned.', 'alert' => 'success');
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // DOWNLOAD FILE ATTACHMENT URL
    public function fileAttachmentDload() {
        $staff_id = $this->session->userdata('staff_id');
        $cr_refid = $this->session->userdata('cr_refid');
        $file_name = $this->session->userdata('file_name');

        if(!empty($staff_id) && !empty($cr_refid) && !empty($file_name)) {
            $selUrl = $this->mdl->getEcommUrl();
            if(!empty($selUrl)) {
                $ecomm_url = $selUrl->HP_PARM_DESC;
            } else {
                $ecomm_url = '';
            }

            echo header('Location: '.$ecomm_url.'sites/default/docManager/Conference/'.$staff_id.'/'.$cr_refid.'/'.$file_name);
            exit;
        } 
    }

    // STAFF CONFERENCE DETAILS APPROVE / VERIFY
    public function staffConferenceDetlAppVer() {
        $staffID = $this->input->post('staffID', true);
        $refid = $this->input->post('refid', true);
        $crName = $this->input->post('crName', true);
        $crStaffName = $this->input->post('crStaffName', true);
        $mod = $this->input->post('mod', true);

        if(empty($crStaffName) && !empty($staffID)) {
            // get staff name
            $data['stf_detl'] = $this->mdl->getStaffList($staffID);

            if(!empty($data['stf_detl'])) {
                $data['crStaffName'] = $data['stf_detl']->SM_STAFF_NAME;
            } else {
                $data['crStaffName'] = '';
            }
        } else {
            $data['crStaffName'] = $crStaffName;
        }

        if(empty($crName) && !empty($refid)) {

            // CONFERENCE DETAILS
            $data['cr_detl'] = $this->mdl->getConferenceDetl($refid);
            if(!empty($data['cr_detl'])) {
                $data['crName'] = $data['cr_detl']->CM_NAME;
            } else {
                $data['crName'] = '';
            }
        } else {
            $data['crName'] = $crName;
        }

        if(!empty($staffID) && !empty($refid)) {
            $data['staffID'] = $staffID;
            $data['refid'] = $refid;

            $data['staff_list'] = $this->dropdown($this->mdl->getStaffList(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
            // $data['cr_role_list'] = $this->dropdown($this->mdl->getConferenceRoleList(), 'CPR_CODE', 'CPR_CODE', ' ---Please select--- ');
            $data['cr_cat_list'] = $this->dropdown($this->mdl->getCrCategoryList($mod), 'CC_CODE', 'CC_CODE_DESC_CC_FROM_TO', '');
            // $data['cr_spon_list'] = array(''=>' ---Please select--- ', 'Y'=>'Yes', 'N'=>'No', 'H'=>'Half Sponsorship');
            // $data['cr_budget_spon_list'] = array(''=>' ---Please select--- ', 'GRANTS'=>'Grants', 'EXTERNAL'=>'External Organization', 'SELF'=>'Self');
            $data['cr_budget_origin_list'] = array(''=>' ---Please select--- ', 'DEPARTMENT'=>'DEPARTMENT', 'CONFERENCE'=>'CONFERENCE', 'OTHERS'=>'OTHERS', 'RESEARCH'=>'RESEARCH', 'RESEARCH_CONFERENCE'=>'RESEARCH_CONFERENCE');
            // $data['cr_status_list'] = array(''=>' ---Please select--- ', 'APPLY'=>'APPLY', 'VERIFY_TNCA'=>'VERIFY_HOD', 'VERIFY_VC'=>'VERIFY_TNCA', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL', 'ENTRY'=>'ENTRY');
            
            $data['stf_detl'] = $this->mdl->getStaffConferenceDetl($refid, $staffID);

            if($mod == 'TNCA') {
                $data['remark'] = $data['stf_detl']->SCM_TNCA_REMARK;
            } elseif($mod == 'VC') {
                $data['remark'] = $data['stf_detl']->SCM_VC_REMARK;
            }

            if(!empty($data['stf_detl'])) {
                $budget_origin = $data['stf_detl']->SCM_BUDGET_ORIGIN;
                $budget_origin_prev = $data['stf_detl']->SCM_BUDGET_ORIGIN_PREV;
                $recommend_date = $data['stf_detl']->SCM_RECOMMEND_DATE;
                $apply_date = $data['stf_detl']->SCM_APPLY_DATE;
                $tncpi_approve_date = $data['stf_detl']->SCM_TNCPI_APPROVE_DATE;
                $rmic_approve_date = $data['stf_detl']->SCM_RMIC_APPROVE_DATE;

                // receive date
                if(($budget_origin != 'RESEARCH' || $budget_origin != 'RESEARCH_CONFERENCE') && empty($budget_origin_prev)) {
                    if(!empty($recommend_date)) {
                        $data['receive_date'] = $recommend_date;
                    } else {
                        $data['receive_date'] = $apply_date;
                    }

                } elseif(($budget_origin != 'RESEARCH' || $budget_origin != 'RESEARCH_CONFERENCE') && !empty($budget_origin_prev)) {
                    if(!empty($tncpi_approve_date)) {
                        $data['receive_date'] = $tncpi_approve_date;
                    } else {
                        $data['receive_date'] = $rmic_approve_date;
                    }
                } elseif(($budget_origin == 'RESEARCH' || $budget_origin == 'RESEARCH_CONFERENCE') && empty($budget_origin_prev)) {
                    if(!empty($tncpi_approve_date)) {
                        $data['receive_date'] = $tncpi_approve_date;
                    } else {
                        $data['receive_date'] = $rmic_approve_date;
                    }
                } elseif(($budget_origin == 'RESEARCH' || $budget_origin == 'RESEARCH_CONFERENCE') && !empty($budget_origin_prev)) {
                    if(!empty($tncpi_approve_date)) {
                        $data['receive_date'] = $tncpi_approve_date;
                    } else {
                        $data['receive_date'] = $rmic_approve_date;
                    }
                }
            }


            $data['app_rejc'] = $this->mdl->getAppRejcStaff($mod);
            if(!empty($data['app_rejc'])) {
                $data['app_rejc_id'] = $data['app_rejc']->SM_STAFF_ID;
                $data['curr_date'] = $data['app_rejc']->CURR_DATE;
            } else {
                $data['app_rejc'] = '';
                $data['curr_date'] = '';
            }
        }

        $this->render($data);
    }

    // RESEARCH INFO
    public function researchInfo() {
        $research_refid = $this->input->post('research_refid', true);
        
        if(!empty($research_refid)) {
            $data['research_refid'] = $research_refid;
            $data['research_detl'] = $this->mdl->researchInfo($research_refid);

            if(!empty($data['research_detl'])) {
                $data['research_desc'] = $data['research_detl']->SR_RESEARCH_TITLE;
                $data['project_id'] = $data['research_detl']->SR_PROJECT_ID;
                $data['grant_amt'] = number_format($data['research_detl']->SR_GRANT_AMT, 2);
                $data['rsh_date_from'] = $data['research_detl']->SR_DATE_FROM;
                $data['rsh_date_to'] = $data['research_detl']->SR_DATE_TO;
            }
        }

        $this->render($data);
    }

    // ALLOWANCE DETAIL RESEARCH / RESEARCH_CONFERENCE
    public function allowanceDetlResearch() {
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $data['total_sca_amount_rm'] = 0;
        $data['total_sca_amount_foreign'] = 0;
        $data['total_sca_amt_rm_approve_hod'] = 0;
        $data['total_sca_amt_foreign_approve_hod'] = 0;
        $data['total_sca_amt_rm_approve_rmic'] = 0;
        $data['total_sca_amt_foreign_approve_rmic'] = 0;
        $data['total_sca_amt_rm_approve_tncpi'] = 0;
        $data['total_sca_amt_foreign_approve_tncpi'] = 0;
        $data['total_sca_amt_rm_approve_tnca'] = 0;
        $data['total_sca_amt_foreign_approve_tnca'] = 0;
        
        if(!empty($staff_id) && !empty($refid)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;  
            $data['research_allw_detl'] = $this->mdl->getStaffConAllowance($refid, $staff_id);

            if(!empty($data['research_allw_detl'])) {
                $research_allw_detl = $data['research_allw_detl'];

                foreach($research_allw_detl as $rad) {
                    $data['total_sca_amount_rm'] += $rad->SCA_AMOUNT_RM;
                    $data['total_sca_amount_foreign'] += $rad->SCA_AMOUNT_FOREIGN;
                    $data['total_sca_amt_rm_approve_hod'] += $rad->SCA_AMT_RM_APPROVE_HOD;
                    $data['total_sca_amt_foreign_approve_hod'] += $rad->SCA_AMT_FOREIGN_APPROVE_HOD;
                    $data['total_sca_amt_rm_approve_rmic'] += $rad->SCA_AMT_RM_APPROVE_RMIC;
                    $data['total_sca_amt_foreign_approve_rmic'] += $rad->SCA_AMT_FOREIGN_APPROVE_RMIC;
                    $data['total_sca_amt_rm_approve_tncpi'] += $rad->SCA_AMT_RM_APPROVE_TNCPI;
                    $data['total_sca_amt_foreign_approve_tncpi'] += $rad->SCA_AMT_FOREIGN_APPROVE_TNCPI;
                    $data['total_sca_amt_rm_approve_tnca'] += $rad->SCA_AMT_RM_APPROVE_TNCA;
                    $data['total_sca_amt_foreign_approve_tnca'] += $rad->SCA_AMT_FOREIGN_APPROVE_TNCA;
                }
            }
        }

        $this->render($data);
    }

    // ALLOWANCE DETAIL RESEARCH / RESEARCH_CONFERENCE VC
    public function allowanceDetlResearchVc() {
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $data['total_sca_amount_rm'] = 0;
        $data['total_sca_amount_foreign'] = 0;
        $data['total_sca_amt_rm_approve_rmic'] = 0;
        $data['total_sca_amt_foreign_approve_rmic'] = 0;
        $data['total_sca_amt_rm_approve_tncpi'] = 0;
        $data['total_sca_amt_foreign_approve_tncpi'] = 0;
        $data['total_sca_amt_rm_approve_tnca'] = 0;
        $data['total_sca_amt_foreign_approve_tnca'] = 0;
        $data['total_sca_amt_rm_approve_vc'] = 0;
        $data['total_sca_amt_foreign_approve_vc'] = 0;
        
        if(!empty($staff_id) && !empty($refid)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;  
            $data['research_allw_detl'] = $this->mdl->getStaffConAllowance($refid, $staff_id);

            if(!empty($data['research_allw_detl'])) {
                $research_allw_detl = $data['research_allw_detl'];

                foreach($research_allw_detl as $rad) {
                    $data['total_sca_amount_rm'] += $rad->SCA_AMOUNT_RM;
                    $data['total_sca_amount_foreign'] += $rad->SCA_AMOUNT_FOREIGN;
                    $data['total_sca_amt_rm_approve_rmic'] += $rad->SCA_AMT_RM_APPROVE_RMIC;
                    $data['total_sca_amt_foreign_approve_rmic'] += $rad->SCA_AMT_FOREIGN_APPROVE_RMIC;
                    $data['total_sca_amt_rm_approve_tncpi'] += $rad->SCA_AMT_RM_APPROVE_TNCPI;
                    $data['total_sca_amt_foreign_approve_tncpi'] += $rad->SCA_AMT_FOREIGN_APPROVE_TNCPI;
                    $data['total_sca_amt_rm_approve_tnca'] += $rad->SCA_AMT_RM_APPROVE_TNCA;
                    $data['total_sca_amt_foreign_approve_tnca'] += $rad->SCA_AMT_FOREIGN_APPROVE_TNCA;
                    $data['total_sca_amt_rm_approve_vc'] += $rad->SCA_AMT_RM_APPROVE_VC;
                    $data['total_sca_amt_foreign_approve_vc'] += $rad->SCA_AMT_FOREIGN_APPROVE_VC;
                }
            }
        }

        $this->render($data);
    }

    // ALLOWANCE DETAIL OTHERS
    public function allowanceDetlOthers() {
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $data['total_sca_amount_rm'] = 0;
        $data['total_sca_amount_foreign'] = 0;
        $data['total_sca_amt_rm_approve_hod'] = 0;
        $data['total_sca_amt_foreign_approve_hod'] = 0;
        $data['total_sca_amt_rm_approve_tnca'] = 0;
        $data['total_sca_amt_foreign_approve_tnca'] = 0;
        
        if(!empty($staff_id) && !empty($refid)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;  
            $data['other_allw_detl'] = $this->mdl->getStaffConAllowance($refid, $staff_id);

            // sponsor & total amount
            // $data['stf_con_detl'] = $this->mdl->getStaffConferenceDetl($refid, $staff_id);

            if(!empty($data['other_allw_detl'])) {
                $other_allw_detl = $data['other_allw_detl'];

                foreach($other_allw_detl as $oad) {
                    $data['total_sca_amount_rm'] += $oad->SCA_AMOUNT_RM;
                    $data['total_sca_amount_foreign'] += $oad->SCA_AMOUNT_FOREIGN;
                    $data['total_sca_amt_rm_approve_hod'] += $oad->SCA_AMT_RM_APPROVE_HOD;
                    $data['total_sca_amt_foreign_approve_hod'] += $oad->SCA_AMT_FOREIGN_APPROVE_HOD;
                    $data['total_sca_amt_rm_approve_tnca'] += $oad->SCA_AMT_RM_APPROVE_TNCA;
                    $data['total_sca_amt_foreign_approve_tnca'] += $oad->SCA_AMT_FOREIGN_APPROVE_TNCA;
                }
            }
        }

        $this->render($data);
    }

    // ALLOWANCE DETAIL OTHERS VC
    public function allowanceDetlOthersVc() {
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $data['total_sca_amount_rm'] = 0;
        $data['total_sca_amount_foreign'] = 0;
        $data['total_sca_amt_rm_approve_tnca'] = 0;
        $data['total_sca_amt_foreign_approve_tnca'] = 0;
        $data['total_sca_amt_rm_approve_vc'] = 0;
        $data['total_sca_amt_foreign_approve_vc'] = 0;
        
        if(!empty($staff_id) && !empty($refid)) {
            $data['staff_id'] = $staff_id;
            $data['refid'] = $refid;  
            $data['other_allw_detl'] = $this->mdl->getStaffConAllowance($refid, $staff_id);

            if(!empty($data['other_allw_detl'])) {
                $other_allw_detl = $data['other_allw_detl'];

                foreach($other_allw_detl as $oad) {
                    $data['total_sca_amount_rm'] += $oad->SCA_AMOUNT_RM;
                    $data['total_sca_amount_foreign'] += $oad->SCA_AMOUNT_FOREIGN;
                    $data['total_sca_amt_rm_approve_tnca'] += $oad->SCA_AMT_RM_APPROVE_TNCA;
                    $data['total_sca_amt_foreign_approve_tnca'] += $oad->SCA_AMT_FOREIGN_APPROVE_TNCA;
                    $data['total_sca_amt_rm_approve_vc'] += $oad->SCA_AMT_RM_APPROVE_VC;
                    $data['total_sca_amt_foreign_approve_vc'] += $oad->SCA_AMT_FOREIGN_APPROVE_VC;
                }
            }
        }

        $this->render($data);
    }

    // SAVE ALLOWANCE DETAIL OTHERS
    public function saveAllwDetlOthers()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        $allwCodeArr = $this->input->post('allwCodeArr', true);
        $amountArr = $this->input->post('amountArr', true);
        $amountForArr = $this->input->post('amountForArr', true);
        $appHodArr = $this->input->post('appHodArr', true);
        $appHodForArr = $this->input->post('appHodForArr', true);
        $appTncaArr = $this->input->post('appTncaArr', true);
        $appTncaForArr = $this->input->post('appTncaForArr', true);

        $success = 0;
        $successSave = 0;
        $successUpdSum = 0;

        $saveMsg = '';
        $successUpdSumMsg = '';

        if (!empty($refid) && !empty($staff_id) && !empty($allwCodeArr)) {
            foreach ($allwCodeArr as $key => $aca) {
                $success++;
                $amt = $amountArr[$key];
                $amtFor = $amountForArr[$key];
                $appHod = $appHodArr[$key];
                $appHodFor = $appHodForArr[$key];
                $appTnca = $appTncaArr[$key];
                $appTncaFor = $appTncaForArr[$key];

                $save = $this->mdl->saveAllwDetlOthers($refid, $staff_id, $aca, $amt, $amtFor, $appHod, $appHodFor, $appTnca, $appTncaFor);

                if ($save > 0) {
                    $successSave++;
                    $saveMsg = 'Record has been saved (STAFF_CONFERENCE_ALLOWANCE)';
                } else {
                    $successSave = 0;
                    $saveMsg = 'Fail to save record (STAFF_CONFERENCE_ALLOWANCE)';
                }

                $sum = $this->mdl->sumStaffConAllw($refid, $staff_id);
                if(!empty($sum)) {
                    $newSumAppTnca = $sum->SCA_AMT_RM_APPROVE_TNCA;
                    $updateSum = $this->mdl->updApprvAmtTnca($refid, $staff_id, $newSumAppTnca);

                    if ($updateSum > 0) {
                        $successUpdSum++;
                        $successUpdSumMsg = nl2br("\r\n").'Record has been saved (STAFF_CONFERENCE_MAIN)';
                    } else {
                        $successUpdSum = 0;
                        $successUpdSumMsg = nl2br("\r\n").'Fail to save record (STAFF_CONFERENCE_MAIN)';
                    }
                }
            }

            if($success == $successSave && $success == $successUpdSum) {
                $json = array('sts' => 1, 'msg' => $saveMsg.$successUpdSumMsg, 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => $saveMsg.$successUpdSumMsg, 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // CLEAR VALUE APPROVED TNCA
    public function clearValAppTnca()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        $allwCodeArr = $this->input->post('allwCodeArr', true);

        $success = 0;
        $successClear = 0;
        $successClearSum = 0;
        $successClearSumMsg = 0;

        if (!empty($refid) && !empty($staff_id) && !empty($allwCodeArr)) {
            foreach ($allwCodeArr as $key => $aca) {
                $success++;

                $clear = $this->mdl->clearValAppTnca($refid, $staff_id, $aca);

                if ($clear > 0) {
                    $successClear++;
                    $clearMsg = 'Record has been cleared (STAFF_CONFERENCE_ALLOWANCE)';
                } else {
                    $successClear = 0;
                    $clearMsg = 'Fail to clear record (STAFF_CONFERENCE_ALLOWANCE)';
                }

                $newSumAppTnca = '';
                $clearSum = $this->mdl->updApprvAmtTnca($refid, $staff_id, $newSumAppTnca);

                if ($clearSum > 0) {
                    $successClearSum++;
                    $successClearSumMsg = nl2br("\r\n").'Record has been cleared (STAFF_CONFERENCE_MAIN)';
                } else {
                    $successClearSum = 0;
                    $successClearSumMsg = nl2br("\r\n").'Fail to clear record (STAFF_CONFERENCE_MAIN)';
                }
            }

            if($success == $successClear && $success == $successClearSum) {
                $json = array('sts' => 1, 'msg' => $clearMsg.$successClearSumMsg, 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => $clearMsg.$successClearSumMsg, 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // CALCULATE ALLOWANCE TNCA
    public function calculateAllwTnca()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        $allwCodeArr = $this->input->post('allwCodeArr', true);
        $appTncaArr = $this->input->post('appTncaArr', true);
        $appTncaForArr = $this->input->post('appTncaForArr', true);

        $success = 0;
        $successCalc = 0;

        if (!empty($refid) && !empty($staff_id) && !empty($allwCodeArr)) {

            $conDetl = $this->mdl->getConferenceDetl($refid);
            $conCountry = $conDetl->CM_COUNTRY_CODE;

            foreach ($allwCodeArr as $key => $aca) {
                $success++;
                $appTnca = $appTncaArr[$key];
                $appTncaFor = $appTncaForArr[$key];
                
                // amount approve tnca (local)
                $aat = $this->mdl->amtApprTnca($refid, $staff_id, $aca);
                if(!empty($aat->AMT_APPR_TNCA)) {
                    $amt_app_tnca = $aat->AMT_APPR_TNCA;
                } else {
                    $amt_app_tnca = 0;
                }

                // amount foreign approve tnca (overseas)	
                $aaft = $this->mdl->amtApprForTnca($refid, $staff_id, $aca);
                if(!empty($aaft->AMT_APPR_FOR_TNCA)) {
                    $amt_app_for_tnca = $aaft->AMT_APPR_FOR_TNCA;
                } else {
                    $amt_app_for_tnca = 0;
                }

                // amount RM approve tnca (overseas)
                $aato = $this->mdl->amtApprTncaOversea($refid, $staff_id, $aca);
                if(!empty($aato->AMT_APPR_TNCA_OS)) {
                    $amt_app_tnca_os = $aato->AMT_APPR_TNCA_OS;
                } else {
                    $amt_app_tnca_os = 0;
                }

                // amount foreign approve tnca (overseas)
                $aafto = $this->mdl->amtApprForTncaOversea($refid, $staff_id, $aca);
                if(!empty($aafto->AMT_APPR_FOR_TNCA_OS)) {
                    $amt_app_for_tnca_os = $aafto->AMT_APPR_FOR_TNCA_OS;
                } else {
                    $amt_app_for_tnca_os = 0;
                }

                if($conCountry != 'MYS') {
                    if(empty($appTnca)) {
                        $appTnca = $amt_app_tnca_os;
                    } else {
                        $appTnca = $appTnca;
                    }

                    if(empty($appTncaFor)) {
                        $appTncaFor = $amt_app_for_tnca_os;
                    } else {
                        $appTncaFor = $appTncaFor;
                    }
                } elseif($conCountry == 'MYS') {
                    if(empty($appTnca)) {
                        $appTnca = $amt_app_tnca;
                    } else {
                        $appTnca = $appTnca;
                    }

                    if(empty($appTncaFor)) {
                        $appTncaFor = $amt_app_for_tnca;
                    } else {
                        $appTncaFor = $appTncaFor;
                    }
                }

                $save_calc = $this->mdl->saveCalcAllwTnca($refid, $staff_id, $aca, $appTnca, $appTncaFor);

                if ($save_calc > 0) {
                    $successCalc++;
                } else {
                    $successCalc = 0;
                }
            }

            if($success == $successCalc) {
                $json = array('sts' => 1, 'msg' => 'Calculate complete', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to calculate', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // AMEND STAFF CONFERENCE TNCAA
    public function ammendConferenceTncaa()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        $remark = $this->input->post('remark', true);
        $appr_rej_by = $this->input->post('appr_rej_by', true);
        $appr_rej_date = $this->input->post('appr_rej_date', true);
        $remIDArr = array();
        $memoID = 0;
        $successAmend = 0;
        $successMemo = 0;
        $rmic_staff = '';


        if (!empty($refid) && !empty($staff_id)) {

            $amend = $this->mdl->ammendConferenceTncaa($refid, $staff_id, $remark, $appr_rej_by, $appr_rej_date);

            if($amend > 0) {
                $successAmend++;
                $amendMsg = 'Amendment success';

                // SENDER
                $from = $appr_rej_by;

                // TO
                $sendTO = $staff_id;

                // STAFF DETAILS
                $staffDetl = $this->mdl->getStaffList($staff_id);

                if(!empty($staffDetl)) {
                    $staff_name = $staffDetl->SM_STAFF_NAME;
                } else {
                    $staff_name = '';
                }

                // CONFERENCE DETAILS DISTINCT
                $conDetl = $this->mdl->conDetlDis($refid, $staff_id);
                if(!empty($conDetl)) {
                    $cm_name = $conDetl->CM_NAME;
                    $cm_date_from = $conDetl->CM_DATE_FROM2;
                    $cm_date_to = $conDetl->CM_DATE_TO2;
                    $cm_budget_origin = $conDetl->SCM_BUDGET_ORIGIN;
                } else {
                    $cm_name = '';
                    $cm_date_from = '';
                    $cm_date_to = '';
                    $cm_budget_origin = '';
                }
                
                // MEMO TITLE
                $memoTitle = 'Conference Application : Notification of Amendment';

                // MEMO CONTENT
                $memoContent = 'Please resubmit conference application by fulfill the information needed :<br><br>'.
                                'Staff ID : '.$staff_id.'<br>'.
                                'Name : '.$staff_name.'<br>'.
                                'Conference Title : '.$cm_name.' ('.$cm_date_from.'-'.$cm_date_to.')'.'<br><br>'.
                                'Amendment Remark  : '.$remark.'<br>'.
                                'Click here to proceed  : '.'<a href="training.jsp?action=view_conference&TrainingMenu=CONFERENCE&conference_status=ENTRY">Amend</a> '.'<br><br>'.
                                '<br> -- system generated memo --';

                if($cm_budget_origin == 'RESEARCH' || $cm_budget_origin == 'RESEARCH_CONFERENCE') {
                    $memoID = 2;
                    // GET STAFF REMINDER
                    $stfRem = $this->mdl->getStaffReminder();
                    if(!empty($stfRem)) {
                        foreach($stfRem as $key => $sr) {
                            $remID = $sr->SR_STAFF_ID;
                            $remIDArr [] = $remID;
                        }
                        $filterRemIDArr = array_values(array_filter($remIDArr));
                        $rmic_staff = $filterRemIDArr;
                    }
                    $sendMemo = $this->mdl->createMemo($from, $sendTO, $rmic_staff, $memoTitle, $memoContent, $memoID);
                } else {
                    $rmic_staff = '';
                    $memoID = 1;
                    $sendMemo = $this->mdl->createMemo($from, $sendTO, $rmic_staff, $memoTitle, $memoContent, $memoID);
                }

                if ($sendMemo > 0) {
                    $successMemo++;
                    $memoMsg = 'Amendment memo sent';
                } else {
                    $successMemo = 0;
                    $memoMsg = 'Failed to send amendment memo';
                }

            } else {
                $successAmend = 0;
                $amendMsg = 'Amendment failed';
            }

            if($successAmend == $successMemo) {
                $json = array('sts' => 1, 'msg' => $amendMsg.nl2br("\r\n").$memoMsg, 'alert' => 'danger');
            } else {
                $json = array('sts' => 0, 'msg' => $amendMsg.nl2br("\r\n").$memoMsg, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // APPROVE STAFF CONFERENCE TNCAA
    public function approveConferenceTncaa()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        $remark = $this->input->post('remark', true);
        $bud_org = $this->input->post('bud_org', true);
        $cat_code = $this->input->post('cat_code', true);
        $appr_rej_by = $this->input->post('appr_rej_by', true);
        $appr_rej_date = $this->input->post('appr_rej_date', true);
        $rec_date = $this->input->post('rec_date', true);

        $total_amt_app_tncaa = $this->input->post('total_amt_app_tncaa', true);
        $hod_amount = $this->input->post('hod_amount', true);
        $rmic_amount = $this->input->post('rmic_amount', true);
        $tncpi_amount = $this->input->post('tncpi_amount', true);

        $remIDArr = array();
        $memoID = 0;
        $successAppr = 0;
        $successUpdSLD = 0;
        $successMemo = 0;
        
        $rmic_staff = '';
        $apprMsg = '';
        $updSLDMsg = '';
        $memoMsg = '';
        


        if (!empty($refid) && !empty($staff_id)) {

            // STAFF CONFERENCE MAIN DETL
            $stf_con_detl= $this->mdl->getStaffConferenceDetl($refid, $staff_id);
            if(!empty($stf_con_detl->SCM_LEAVE_REFID)) {
                $leave_ref = $stf_con_detl->SCM_LEAVE_REFID;
            } else {
                $leave_ref = '';
            }

            // GET STAFF TNCPI
            $tncpi = $this->mdl->getTncpi();

            // CONFERENCE CATEGORY DETL
            $cc = $this->mdl->getConCatDetl($cat_code);

            // CONFERENCE ADMIN HIER
            $cah = $this->mdl->getConAdmHier($staff_id);

            // SET SCM_STATUS
            if (($bud_org != 'RESEARCH' || $bud_org != 'RESEARCH_CONFERENCE') || ($bud_org == 'RESEARCH' || $bud_org == 'RESEARCH_CONFERENCE') && $staff_id != $tncpi->SM_STAFF_ID) {
                if($cc->CC_VC_APPROVE == 'Y') {
                    if(!empty($cah)) {
                        if($cah->cah_approve_vc = 'Y') {
                            $scm_sts = 'VERIFY_VC';
                        } else {
                            $scm_sts = 'APPROVE';
                        }
                    } else {
                        $scm_sts = 'VERIFY_VC';
                    }
                } else {
                    $scm_sts = 'APPROVE';
                }
            } elseif(($bud_org == 'RESEARCH' || $bud_org == 'RESEARCH_CONFERENCE') && $staff_id == $tncpi->SM_STAFF_ID) {
                if(!empty($cah)) {
                    if($cah->cah_approve_vc = 'Y') {
                        $scm_sts = 'VERIFY_VC';
                    } else {
                        $scm_sts = 'APPROVE';
                    }
                } 
                
                // else {
                //     $scm_sts = 'VERIFY_VC';
                // }
            }

            // APPROVE STAFF
            $approve = $this->mdl->approveConferenceTncaa($refid, $staff_id, $remark, $appr_rej_by, $appr_rej_date, $rec_date, $scm_sts);

            if($approve > 0) {
                $successAppr++;
                $apprMsg = 'Approve success';
            } else {
                $successAppr = 0;
                $apprMsg = 'Approve failed';
            }

            if($scm_sts == 'APPROVE') {
                $sld_sts = 'APPROVE';
                if(!empty($leave_ref)) {
                    $updSLD = $this->mdl->updateAppSLD($staff_id, $leave_ref, $sld_sts, $appr_rej_by);
                    if($updSLD > 0) {
                        $successUpdSLD++;
                        $updSLDMsg = nl2br("\r\n").'Staff Leave Detail updated';
                    } else {
                        $successUpdSLD = 0;
                        $updSLDMsg = nl2br("\r\n").'Fail to update Staff Leave Detail';
                    }
                } else {
                    $successUpdSLD = 3;
                    $updSLDMsg = '';
                }
                
                // SENDER
                $from = $appr_rej_by;

                // TO
                $sendTO = $staff_id;

                // STAFF DETAILS
                $staffDetl = $this->mdl->getStaffList($staff_id);

                if(!empty($staffDetl)) {
                    $staff_name = $staffDetl->SM_STAFF_NAME;
                } else {
                    $staff_name = '';
                }

                // CONFERENCE DETAILS APPROVE TNCAA
                $conDetl = $this->mdl->getConferenceDetlAppTncaa($appr_rej_by, $staff_id, $refid);

                if($cat_code == '006' || $cat_code == '007') {
                    // MEMO TITLE
                    $memoTitle = 'Conference Application Has Been Approved By TNC(A&A)';

                    if($conDetl->CM_COUNTRY_CODE == 'MYS' && ($bud_org != 'RESEARCH' || $bud_org != 'RESEARCH_CONFERENCE')) {
                        // MEMO CONTENT
                        $memoContent = 'Please take note that your conference application has been approved. Details :<br><br>'.
                        'Staff ID : '.$staff_id.'<br>'.
                        'Name : '.$staff_name.'<br>'.
                        'Conference Title : '.$conDetl->CM_NAME.' ('.$conDetl->CM_DATE_FROM2.'-'.$conDetl->CM_DATE_TO2.')'.'<br><br>'.
                        'Approval Remark  : '.$remark.'<br>'.
                        'Total Amount Approved TNC(A&A) : (RM) '.number_format($total_amt_app_tncaa, 2).'<br>'.
                        'Total Amount Approved PTJ      : (RM) '.number_format($hod_amount, 2).'<br>'.
                        '<br> --System Generated Memo--';
                    } elseif($conDetl->CM_COUNTRY_CODE != 'MYS' && ($bud_org != 'RESEARCH' || $bud_org != 'RESEARCH_CONFERENCE')) {
                        // MEMO CONTENT
                        $memoContent = 'Please take note that your conference application has been approved. Details :<br><br>'.
                        'Staff ID : '.$staff_id.'<br>'.
                        'Name : '.$staff_name.'<br>'.
                        'Conference Title : '.$conDetl->CM_NAME.' ('.$conDetl->CM_DATE_FROM2.'-'.$conDetl->CM_DATE_TO2.')'.'<br><br>'.
                        'Approval Remark  : '.$remark.'<br>'.
                        'Total Amount Approved TNC(A&A) : (RM) '.number_format($total_amt_app_tncaa, 2).'<br>'.
                        '<br> --System Generated Memo--';
                    } elseif($bud_org == 'RESEARCH' || $bud_org == 'RESEARCH_CONFERENCE') {
                        // MEMO CONTENT
                        $memoContent = 'Please take note that your conference application has been approved. Details :<br><br>'.
                        'Staff ID : '.$staff_id.'<br>'.
                        'Name : '.$staff_name.'<br>'.
                        'Conference Title : '.$conDetl->CM_NAME.' ('.$conDetl->CM_DATE_FROM2.'-'.$conDetl->CM_DATE_TO2.')'.'<br><br>'.
                        'Approval Remark  : '.$remark.'<br>'.
                        'Total Amount Approved TNC(A&A) : (RM) '.number_format($total_amt_app_tncaa, 2).'<br>'.
                        'Total Amount Approved TNC(P&I) : (RM) '.number_format($tncpi_amount, 2).'<br>'.
                        '<br> --System Generated Memo--';
                    }
                } elseif($cat_code == '005' || $cat_code == '008') {
                    // MEMO TITLE
                    $memoTitle = 'Conference Application Has Been Recommended By TNC(A&A)';

                    if($conDetl->CM_COUNTRY_CODE == 'MYS') {
                        // MEMO CONTENT
                        $memoContent = 'Please take note that your conference application has been recommended. Details :<br><br>'.
                        'Staff ID : '.$staff_id.'<br>'.
                        'Name : '.$staff_name.'<br>'.
                        'Conference Title : '.$conDetl->CM_NAME.' ('.$conDetl->CM_DATE_FROM2.'-'.$conDetl->CM_DATE_TO2.')'.'<br><br>'.
                        'Recommended Remark  : '.$remark.'<br>'.
                        'Total Amount Approved TNC(A&A) : (RM) '.number_format($total_amt_app_tncaa, 2).'<br>'.
                        'Total Amount Approved PTJ      : (RM) '.number_format($hod_amount, 2).'<br>'.
                        '<br> --System Generated Memo--';
                    } elseif($conDetl->CM_COUNTRY_CODE != 'MYS') {
                        // MEMO CONTENT
                        $memoContent = 'Please take note that your conference application has been recommended. Details :<br><br>'.
                        'Staff ID : '.$staff_id.'<br>'.
                        'Name : '.$staff_name.'<br>'.
                        'Conference Title : '.$conDetl->CM_NAME.' ('.$conDetl->CM_DATE_FROM2.'-'.$conDetl->CM_DATE_TO2.')'.'<br><br>'.
                        'Recommended Remark  : '.$remark.'<br>'.
                        'Total Amount Approved TNC(A&A) : (RM) '.number_format($total_amt_app_tncaa, 2).'<br>'.
                        '<br> --System Generated Memo--';
                    } elseif($bud_org == 'RESEARCH' || $bud_org == 'RESEARCH_CONFERENCE') {
                        // MEMO CONTENT
                        $memoContent = 'Please take note that your conference application has been recommended. Details :<br><br>'.
                        'Staff ID : '.$staff_id.'<br>'.
                        'Name : '.$staff_name.'<br>'.
                        'Conference Title : '.$conDetl->CM_NAME.' ('.$conDetl->CM_DATE_FROM2.'-'.$conDetl->CM_DATE_TO2.')'.'<br><br>'.
                        'Recommended Remark  : '.$remark.'<br>'.
                        'Total Amount Approved TNC(A&A) : (RM) '.number_format($total_amt_app_tncaa, 2).'<br>'.
                        'Total Amount Approved TNC(P&I) : (RM) '.number_format($tncpi_amount, 2).'<br>'.
                        '<br> --System Generated Memo--';
                    }
                }

                if($bud_org == 'RESEARCH' || $bud_org == 'RESEARCH_CONFERENCE') {
                    $memoID = 2;
                    // GET STAFF REMINDER
                    $stfRem = $this->mdl->getStaffReminder();
                    if(!empty($stfRem)) {
                        foreach($stfRem as $key => $sr) {
                            $remID = $sr->SR_STAFF_ID;
                            $remIDArr [] = $remID;
                        }
                        $filterRemIDArr = array_values(array_filter($remIDArr));
                        $rmic_staff = $filterRemIDArr;
                    }
                    $sendMemo = $this->mdl->createMemo($from, $sendTO, $rmic_staff, $memoTitle, $memoContent, $memoID);
                } else {
                    $rmic_staff = '';
                    $memoID = 1;
                    $sendMemo = $this->mdl->createMemo($from, $sendTO, $rmic_staff, $memoTitle, $memoContent, $memoID);
                }

                if ($sendMemo > 0) {
                    $successMemo++;
                    $memoMsg = nl2br("\r\n").'Approval memo sent';
                } else {
                    $successMemo = 0;
                    $memoMsg = nl2br("\r\n").'Failed to send approval memo';
                }
            }

            if($successAppr > 0 && (($successUpdSLD > 0 && $successMemo > 0) || ($successUpdSLD == 0 && $successMemo == 0) || ($successUpdSLD == 3 && $successMemo == 0))) {
                $json = array('sts' => 1, 'msg' => $apprMsg.$updSLDMsg.$memoMsg, 'alert' => 'danger');
            } else {
                $json = array('sts' => 0, 'msg' =>  $apprMsg.$updSLDMsg.$memoMsg, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // REJECT STAFF CONFERENCE TNCAA
    public function rejectConferenceTncaa()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        $remark = $this->input->post('remark', true);
        $appr_rej_by = $this->input->post('appr_rej_by', true);
        $appr_rej_date = $this->input->post('appr_rej_date', true);
        $rec_date = $this->input->post('rec_date', true);
        $bud_org = $this->input->post('bud_org', true);
        $remIDArr = array();
        $memoID = 0;
        $successReject = 0;
        $successMemo = 0;
        $successUpdSLR = 0;
        $successUpdSLD = 0;
        $rmic_staff = '';


        if (!empty($refid) && !empty($staff_id)) {

            $reject = $this->mdl->rejectConferenceTncaa($refid, $staff_id, $remark, $appr_rej_by, $appr_rej_date, $rec_date);

            if($reject > 0) {
                $successReject++;
                $rejectMsg = 'Staff has been rejected';

                // SENDER
                $from = $appr_rej_by;

                // TO
                $sendTO = $staff_id;

                // STAFF DETAILS
                $staffDetl = $this->mdl->getStaffList($staff_id);

                if(!empty($staffDetl)) {
                    $staff_name = $staffDetl->SM_STAFF_NAME;
                } else {
                    $staff_name = '';
                }

                // CONFERENCE DETAILS APPROVE TNCAA
                $conDetl = $this->mdl->getConferenceDetlAppTncaa($appr_rej_by, $staff_id, $refid);
                
                // MEMO TITLE
                $memoTitle = 'Your Conference Application Has Been Rejected By TNC (A&A)';

                // MEMO CONTENT
                $memoContent = 'Please take note that your conference application has been rejected. Details :<br><br>'.
                                'Staff ID : '.$staff_id.'<br>'.
                                'Name : '.$staff_name.'<br>'.
                                'Conference Title : '.$conDetl->CM_NAME.' ('.$conDetl->CM_DATE_FROM2.'-'.$conDetl->CM_DATE_TO2.')'.'<br><br>'.
                                'Rejected Remark  : '.$remark.'<br><br>'.
                                '<br> --System Generated Memo--';

                if($bud_org == 'RESEARCH' || $bud_org == 'RESEARCH_CONFERENCE') {
                    $memoID = 2;
                    // GET STAFF REMINDER
                    $stfRem = $this->mdl->getStaffReminder();
                    if(!empty($stfRem)) {
                        foreach($stfRem as $key => $sr) {
                            $remID = $sr->SR_STAFF_ID;
                            $remIDArr [] = $remID;
                        }
                        $filterRemIDArr = array_values(array_filter($remIDArr));
                        $rmic_staff = $filterRemIDArr;
                    }
                    $sendMemo = $this->mdl->createMemo($from, $sendTO, $rmic_staff, $memoTitle, $memoContent, $memoID);
                } else {
                    $rmic_staff = '';
                    $memoID = 1;
                    $sendMemo = $this->mdl->createMemo($from, $sendTO, $rmic_staff, $memoTitle, $memoContent, $memoID);
                }

                if ($sendMemo > 0) {
                    $successMemo++;
                    $memoMsg = nl2br("\r\n").'Rejected staff memo has been sent';
                } else {
                    $successMemo = 0;
                    $memoMsg = nl2br("\r\n").'Failed to send memo to rejected staff';
                }

                // REJECT LEAVE AND RETURN LEAVE BALANCE
                // STAFF CONFERENCE MAIN DETL
                $stf_con_detl= $this->mdl->getStaffConferenceDetl($refid, $staff_id);
                if(!empty($stf_con_detl->SCM_LEAVE_REFID)) {
                    $leave_ref = $stf_con_detl->SCM_LEAVE_REFID;
                } else {
                    $leave_ref = '';
                }

                if(!empty($leave_ref)) {
                    $sld_status = 'REJECT';
                    $leaveDetl = $this->mdl->getLeaveDetl($leave_ref, $staff_id);
                    $ldTotalDay = $leaveDetl->SLD_TOTAL_DAY;
                    $sld_date_from = $leaveDetl->SLD_DATE_FROM;
                    $sld_date_from_year_split = explode('/', $sld_date_from);
                    $sld_date_from_year = $sld_date_from_year_split[2];

                    if(empty($ldTotalDay)) {
                        $ldTotalDay = 0;
                    }

                    $updRejSLR = $this->mdl->updateRejSLR($ldTotalDay, $staff_id, $sld_date_from_year);
                    $updRejSLD = $this->mdl->updateRejSLD($leave_ref, $sld_status);

                    if($updRejSLR > 0 && $updRejSLD > 0) {
                        $successUpdSLR++;
                        $updSLRMsg = nl2br("\r\n").'Staff Leave Record updated';
                    } else {
                        $successUpdSLR = 0;
                        $updSLRMsg = nl2br("\r\n").'Fail to update Staff Leave Record';
                    }

                    if($updRejSLD > 0) {
                        $successUpdSLD++;
                        $updSLDMsg = nl2br("\r\n").'Staff Leave Detail updated';
                    } else {
                        $successUpdSLD = 0;
                        $updSLDMsg = nl2br("\r\n").'Fail to update Staff Leave Detail';
                    }
                } else {
                    $successUpdSLR = 3;
                    $successUpdSLD = 3;
                    $updSLRMsg = '';
                    $updSLDMsg = '';
                }


            } else {
                $successReject = 0;
                $rejectMsg = 'Faill to reject staff';
            }

            if($successReject == $successMemo && (($successUpdSLR == 3 && $successUpdSLD == 3) || ($successUpdSLR == $successReject && $successUpdSLD == $successReject))) {
                $json = array('sts' => 1, 'msg' => $rejectMsg.$memoMsg.$updSLRMsg.$updSLDMsg, 'alert' => 'danger');
            } else {
                $json = array('sts' => 0, 'msg' => $rejectMsg.$memoMsg.$updSLRMsg.$updSLDMsg, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }
}