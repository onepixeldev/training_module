<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conference_setup extends MY_Controller
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Conference_setup_model', 'mdl');
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
    public function viewTabFilter($tabID, $sid)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        if($sid == 'ASF032') {
            redirect($this->class_uri('ASF032'));
        } elseif($sid == 'ASF151') {
            redirect($this->class_uri('ASF151'));
        }
        

    }

    public function viewTabFilterATF093($tabID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        redirect($this->class_uri('ATF093'));
    }

    // CONFERENCE SETUP
    public function ASF032()
    {
        $this->render();
    }

    // CONFERENCE INFORMATION SETUP
    public function ATF093()
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

    // CONFERENCE SETUP RMIC
    public function ASF151()
    {
        $this->render();
    }

    /*===========================================================
       CONFERENCE SETUP - ASF032
    =============================================================*/

    // CONFERENCE CATEGORY LIST
    public function getConferenceCat()
    {
        // get available records
        $data['conference_cat'] = $this->mdl->getConferenceCat();

        $this->render($data);
    }

    // ADD CONFERENCE CATEGORY
    public function addConferenceCat()
    {
        $this->render();
    }

    // SAVE ADD CONFERENCE CATEGORY
    public function saveConferenceCat() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // CC CODE
        $ccCode = $form['code'];

        // form / input validation
        $rule = array(
            'code' => 'required|max_length[10]',
            'category' => 'required|max_length[100]',
            'from' => 'required|numeric|max_length[40]',
            'to' => 'required|numeric|max_length[40]',
            'head_recommend' => 'max_length[1]',
            'tnc_approve' => 'max_length[1]',
            'vc_approve' => 'max_length[1]',
            'status' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->mdl->getConferenceDetl($ccCode);

            if(empty($check)) {
                $insert = $this->mdl->saveConferenceCat($form);

                if($insert > 0) {
                    $ccRow = $this->ccRow($ccCode);
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'cc_row' => $ccRow);
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

    // CONFERENCE CAT ROW
    private function ccRow($ccCode){
        $data['cc_code'] = $ccCode;
        $data['cc_detl'] = $this->mdl->getConferenceCat($ccCode);
		
		return $this->load->view('Conference_setup/ccRow', $data, true);	
    }

    // EDIT CONFERENCE CATEGORY
    public function editConferenceCat()
    {
        $ccCode = $this->input->post('ccCode', true);
        $ccDesc = $this->input->post('ccDesc', true);

        if(!empty($ccCode)) {
            $data['cc_code'] = $ccCode;
            $data['cc_desc'] = $ccDesc;

            $data['cc_detl'] = $this->mdl->getConferenceDetl($ccCode);
        } 

        $this->render($data);
    }

    // SAVE UPDATE CONFERENCE CATEGORY
    public function saveEditConferenceCat() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // CC CODE
        $ccCode = $form['code'];

        // form / input validation
        $rule = array(
            'category' => 'required|max_length[100]',
            'from' => 'required|numeric|max_length[40]',
            'to' => 'required|numeric|max_length[40]',
            'head_recommend' => 'max_length[1]',
            'tnc_approve' => 'max_length[1]',
            'vc_approve' => 'max_length[1]',
            'status' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $insert = $this->mdl->saveEditConferenceCat($form);

            if($insert > 0) {
                $ccCol = $this->mdl->getConferenceCat($ccCode);

                $ccAmtFrom = number_format($ccCol->CC_RM_AMOUNT_FROM, 2);
                $ccAmtTo= number_format($ccCol->CC_RM_AMOUNT_TO, 2);

                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success', 'cc_col' => $ccCol, 'cc_amt_from' => $ccAmtFrom, 'cc_amt_to' => $ccAmtTo);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE CONFERENCE CATEGORY
    public function  deleteConferenceCategory() {
        $this->isAjax();
		
        $ccCode = $this->input->post('ccCode', true);
        
        if (!empty($ccCode)) {

            $checkChildRec = $this->mdl->checkChildRec($ccCode);

            if(empty($checkChildRec)) {
                $del = $this->mdl->deleteConferenceCategory($ccCode);
                
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Could not remove record.'.nl2br("\r\n Please remove child record from <b>STAFF CONFERENCE</b>"), 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // CONFERENCE SETUP 
    public function conferenceSetup()
    {
        $parmCode1 = "CONFERENCE_TEMP_OPEN_APPL";
        $parmCode2 = "MIN_DAYS_SUBMIT_LOCAL";
        $parmCode3 = "MIN_DAYS_SUBMIT_OVERSEA";
        $parmCode4 = "CHECK_SUBMIT_REPORT";
        $parmCode5 = "MAX_DAYS_EDIT_LMP";
        $parmCode6 = "CONFERENCE_OVERSEAS_2YRS";
        $parmCode7 = "CONFERENCE_ASEAN_1YRS";
        $parmCode8 = "CONF_MAX_DAYS_REC_LOCAL";
        $parmCode9 = "CONF_MAX_DAYS_REC_OVERSEA";
        $parmCode10 = "CONFERENCE_URL";
        $parmCode11 = "CONFERENCE_ADMIN_EMAIL";
        $parmCode12 = "CONFERENCE_ADMIN_EXT";
        $parmCode13 = "CONF_RPT_MAX_DAYS_B4_REMINDER";
        $parmCode14 = "CONF_RPT_DUE_DAYS_REMINDER";
        
        // get available records
        $data['conference_temp_open_appl'] = $this->mdl->getHpParmConSet($parmCode1);
        $data['min_days_submit_local'] = $this->mdl->getHpParmConSet($parmCode2);
        $data['min_days_submit_oversea'] = $this->mdl->getHpParmConSet($parmCode3);
        $data['check_submit_report'] = $this->mdl->getHpParmConSet($parmCode4);
        $data['max_days_edit_lmp'] = $this->mdl->getHpParmConSet($parmCode5);
        $data['conference_overseas_2yrs'] = $this->mdl->getHpParmConSet($parmCode6);
        $data['conference_asean_1yrs'] = $this->mdl->getHpParmConSet($parmCode7);
        $data['conf_max_days_rec_local'] = $this->mdl->getHpParmConSet($parmCode8);
        $data['conf_max_days_rec_oversea'] = $this->mdl->getHpParmConSet($parmCode9);
        $data['conference_url'] = $this->mdl->getHpParmConSet($parmCode10);
        $data['conference_admin_email'] = $this->mdl->getHpParmConSet($parmCode11);
        $data['conference_admin_ext'] = $this->mdl->getHpParmConSet($parmCode12);
        $data['conf_rpt_max_days_b4_reminder'] = $this->mdl->getHpParmConSet($parmCode13);
        $data['conf_rpt_due_days_reminder'] = $this->mdl->getHpParmConSet($parmCode14);

        $this->render($data);
    }

    // SAVE UPDATE CONFERENCE SETUP
    public function saveConferenceSet() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $parmCode1 = "CONFERENCE_TEMP_OPEN_APPL";
        $parmCode2 = "MIN_DAYS_SUBMIT_LOCAL";
        $parmCode3 = "MIN_DAYS_SUBMIT_OVERSEA";
        $parmCode4 = "CHECK_SUBMIT_REPORT";
        $parmCode5 = "MAX_DAYS_EDIT_LMP";
        $parmCode6 = "CONFERENCE_OVERSEAS_2YRS";
        $parmCode7 = "CONFERENCE_ASEAN_1YRS";
        $parmCode8 = "CONF_MAX_DAYS_REC_LOCAL";
        $parmCode9 = "CONF_MAX_DAYS_REC_OVERSEA";

        $parmCodeRmic1 = "MIN_DAYS_SUBMIT_LOCAL_RMIC";
        $parmCodeRmic2 = "MIN_DAYS_SUBMIT_OVERSEA_RMIC";
        $parmCodeRmic3 = "CONFERENCE_APPROVAL_TNCPI_ONLINE";

        $updateTempOpen = 0;
        $updateMinDaysSubmitLocal = 0;
        $updateMinDaysSubmitOversea = 0;
        $updateCheckSubmitLmp = 0;
        $updateMaxDaysEditLmp = 0;
        $updateConOverseas2yrs = 0;
        $updateConAsean1yrs = 0;
        $updateConMaxDaysRecLoc = 0;
        $updateConMaxDaysRecOve = 0;
        $approveTncpiOnline = 0;

        // form / input validation
        $rule = array(
            'temp_open' => 'max_length[3]',
            'min_days_submit_local' => 'is_natural|max_length[3]',
            'min_days_submit_oversea' => 'is_natural|max_length[3]',
            'check_submit_lmp' => 'max_length[3]',
            'max_days_edit_lmp' => 'is_natural|max_length[3]',
            'conference_overseas_2yrs' => 'max_length[3]',
            'conference_asean_1yrs' => 'max_length[3]',
            'conf_max_days_rec_local' => 'is_natural|max_length[3]',
            'conf_max_days_rec_oversea' => 'is_natural|max_length[3]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            if($form['mod'] == 'RMIC') {
                $minDaysSubmitLocal = $form['min_days_submit_local'];
                $minDaysSubmitOversea = $form['min_days_submit_oversea'];
                $appTncpiOnline = $form['approval_tncpi_online'];

                $updateMinDaysSubmitLocal = $this->mdl->saveConferenceSet($parmCodeRmic1, $minDaysSubmitLocal);
                $updateMinDaysSubmitOversea = $this->mdl->saveConferenceSet($parmCodeRmic2, $minDaysSubmitOversea);
                $approveTncpiOnline = $this->mdl->saveConferenceSet($parmCodeRmic3, $appTncpiOnline);
            } else {
                $tempOpen = $form['temp_open'];
                $minDaysSubmitLocal = $form['min_days_submit_local'];
                $minDaysSubmitOversea = $form['min_days_submit_oversea'];
                $checkSubmitLmp = $form['check_submit_lmp'];
                $maxDaysEditLmp = $form['max_days_edit_lmp'];
                $conOverseas2yrs = $form['conference_overseas_2yrs'];
                $conAsean1yrs = $form['conference_asean_1yrs'];
                $conMaxDaysRecLoc = $form['conf_max_days_rec_local'];
                $conMaxDaysRecOve = $form['conf_max_days_rec_oversea'];

                $updateTempOpen = $this->mdl->saveConferenceSet($parmCode1, $tempOpen);
                $updateMinDaysSubmitLocal = $this->mdl->saveConferenceSet($parmCode2, $minDaysSubmitLocal);
                $updateMinDaysSubmitOversea = $this->mdl->saveConferenceSet($parmCode3, $minDaysSubmitOversea);
                $updateCheckSubmitLmp = $this->mdl->saveConferenceSet($parmCode4, $checkSubmitLmp);
                $updateMaxDaysEditLmp = $this->mdl->saveConferenceSet($parmCode5, $maxDaysEditLmp);
                $updateConOverseas2yrs = $this->mdl->saveConferenceSet($parmCode6, $conOverseas2yrs);
                $updateConAsean1yrs = $this->mdl->saveConferenceSet($parmCode7, $conAsean1yrs);
                $updateConMaxDaysRecLoc = $this->mdl->saveConferenceSet($parmCode8, $conMaxDaysRecLoc);
                $updateConMaxDaysRecOve = $this->mdl->saveConferenceSet($parmCode9, $conMaxDaysRecOve);
            }
            

            if(($updateTempOpen > 0 && $updateMinDaysSubmitLocal > 0 && $updateMinDaysSubmitOversea > 0 && $updateCheckSubmitLmp > 0 && $updateMaxDaysEditLmp > 0 && $updateConOverseas2yrs > 0 && $updateConAsean1yrs > 0 && $updateConMaxDaysRecLoc > 0 && $updateConMaxDaysRecOve > 0) || ($updateMinDaysSubmitLocal > 0 && $updateMinDaysSubmitOversea > 0 && $approveTncpiOnline > 0)) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // SAVE UPDATE CONFERENCE URL
    public function saveConURL() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $parmCode10 = "CONFERENCE_URL";

        // form / input validation
        $rule = array(
            'conference_url' => 'valid_url|max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $conferenceURL = $form['conference_url'];
            $updateConURL= $this->mdl->saveConferenceSet($parmCode10, $conferenceURL);

            if($updateConURL > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // ADD CONFERENCE SETUP OVERSEA
    public function addConSetOversea()
    {
        $this->render();
    }

    // SAVE CONFERENCE SETUP OVERSEA
    public function saveConSetOvsea() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $parmCode11 = "CONFERENCE_ADMIN_EMAIL";

        // form / input validation
        $rule = array(
            'email' => 'required|valid_email|max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $email = $form['email'];
            $insertConSetOvsea= $this->mdl->saveInsConSet($parmCode11, $email);

            if($insertConSetOvsea > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE CONFERENCE SETUP OVERSEA
    public function  deleteConSetOvsea() {
        $this->isAjax();
        
        $parmCode = "CONFERENCE_ADMIN_EMAIL";
        $parmNo = $this->input->post('parmNo', true);

        if (!empty($parmNo)) {
            $del = $this->mdl->deleteConSet($parmCode, $parmNo);
                
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

    // ADD STAFF CONTACT INFO
    public function addStfConInfo()
    {
        $this->render();
    }

    // SAVE STAFF CONTACT INFO
    public function saveStfConInfo() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        if($form['mod'] == 'RMIC') {
            $parmCode11 = "CONFERENCE_ADMIN_EXT_RMIC";
        } else {
            $parmCode11 = "CONFERENCE_ADMIN_EXT";
        }
       

        // form / input validation
        $rule = array(
            'ext' => 'required|max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $ext = $form['ext'];
            $insertStfConInfo = $this->mdl->saveInsConSet($parmCode11, $ext);

            if($insertStfConInfo > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // EDIT STAFF CONTACT INFO
    public function editStfConInfo()
    {
        $parmCode = "CONFERENCE_ADMIN_EXT";
        $parmNo = $this->input->post('parmNo', true);
        $ext = $this->input->post('ext', true);

        if(!empty($parmNo)) {
            $data['parm_no'] = $parmNo;
            $data['ext'] = $ext;
        }

        $this->render($data);
    }

    // SAVE UPDATE STAFF CONTACT INFO
    public function saveUpdStfConInfo() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        if($form['mod'] == 'RMIC') {
            $parmCode11 = "CONFERENCE_ADMIN_EXT_RMIC";
        } else {
            $parmCode11 = "CONFERENCE_ADMIN_EXT";
        }

        $parmNo = $form['parm_no'];

        // form / input validation
        $rule = array(
            'ext' => 'required|max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $ext = $form['ext'];
            $insertStfConInfo = $this->mdl->saveUpdConSet($parmCode11, $parmNo, $ext);

            if($insertStfConInfo > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE STAFF CONTACT INFO
    public function  deleteStfConInfo() {
        $this->isAjax();

        $parmNo = $this->input->post('parmNo', true);
        $mod = $this->input->post('mod', true);

        if($mod == 'RMIC') {
            $parmCode = "CONFERENCE_ADMIN_EXT_RMIC";
        } else {
            $parmCode = "CONFERENCE_ADMIN_EXT";
        }
       

        if (!empty($parmNo)) {
            $del = $this->mdl->deleteConSet($parmCode, $parmNo);
                
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

    // SAVE REMINDER SETUP
    public function saveRemSet() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $parmCode1 = "CONF_RPT_MAX_DAYS_B4_REMINDER";
        $parmCode2 = "CONF_RPT_DUE_DAYS_REMINDER";

        // form / input validation
        $rule = array(
            'conf_rpt_max_days_b4_reminder' => 'is_natural|max_length[3]',
            'conf_rpt_due_days_reminder' => 'is_natural|max_length[3]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $lmpRem = $form['conf_rpt_max_days_b4_reminder'];
            $dueDateLmpRem = $form['conf_rpt_due_days_reminder'];

            $updateLmpRem= $this->mdl->saveConferenceSet($parmCode1, $lmpRem);
            $updateDueDateLmpRem = $this->mdl->saveConferenceSet($parmCode2, $dueDateLmpRem);

            if($updateLmpRem > 0 && $updateDueDateLmpRem > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // STAFF ADMIN HIERARCHY LIST
    public function getStfAdminHier()
    {
        // get available records
        $data['staff_admin_hier'] = $this->mdl->getStfAdminHier();

        $this->render($data);
    }

    // CERTIFIED OFFICER FOR HEAD OF PTJ LIST
    public function getCerOfficer()
    {
        // get available records
        $data['certified_officer_head_ptj'] = $this->mdl->getCerOfficer();

        $this->render($data);
    }

    // ADD STAFF ADMIN HIER
    public function addStfAdminHier()
    {
        $data['admin_list'] = $this->dropdown($this->mdl->getAdmin(), 'APM_CODE', 'APM_CODE_DESC', ' ---Please select--- ');
        $this->render($data);
    }

    // SAVE STAFF ADMIN HIER
    public function saveStfAdminHier() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'admin_code' => 'required|max_length[10]',
            'tnc_approve' => 'max_length[1]',
            'vc_approve' => 'max_length[1]',
            'status' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $checkExist = $this->mdl->getStfAdminHierDetl($form['admin_code']);

            if(empty($checkExist)) {
                $insert = $this->mdl->saveStfAdminHier($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
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

    // DELETE STAFF ADMIN HIER
    public function  deleteStfAdminHier() 
    {
        $this->isAjax();
        
        $apmCode = $this->input->post('apmCode', true);

        if (!empty($apmCode)) {
            $del = $this->mdl->deleteStfAdminHier($apmCode);
                
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

    // EDIT STAFF ADMIN HIER
    public function editStfAdminHier()
    {
        $apmCode = $this->input->post('apmCode', true);
        
        $data['admin_detl'] = $this->mdl->getStfAdminHierDetl($apmCode);
        $data['admin_list'] = $this->dropdown($this->mdl->getAdmin(), 'APM_CODE', 'APM_CODE_DESC', ' ---Please select--- ');
        $this->render($data);
    }

    // SAVE UPDATE STAFF ADMIN HIER
    public function updateStfAdminHier() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'tnc_approve' => 'max_length[1]',
            'vc_approve' => 'max_length[1]',
            'status' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl->saveUpdStfAdminHier($form);

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

    // ADD CERTIFIED OFFICER FOR HEAD OF PTJ
    public function addCerOfficer()
    {
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptCon(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
        $data['parent_dept_list'] = $this->dropdown($this->mdl->getParDeptCon(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
        $this->render($data);
    }

    // SAVE CERTIFIED OFFICER FOR HEAD OF PTJ
    public function saveCerOfficer() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'department' => 'required|max_length[10]',
            'parent_department' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $checkExist = $this->mdl->getCerOfficerDetl($form['department']);

            if(empty($checkExist)) {
                $insert = $this->mdl->saveCerOfficer($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
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

    // DELETE CERTIFIED OFFICER FOR HEAD OF PTJ
    public function  deleteCerOfficer() 
    {
        $this->isAjax();
        
        $cdhCode = $this->input->post('cdhCode', true);

        if (!empty($cdhCode)) {
            $del = $this->mdl->deleteCerOfficer($cdhCode);
                
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

    // EDIT CERTIFIED OFFICER FOR HEAD OF PTJ
    public function editCerOfficer()
    {
        $cdhCode = $this->input->post('cdhCode', true);
        $cdhDesc = $this->input->post('cdhDesc', true);
        if(!empty($cdhCode) && !empty($cdhDesc)) {
            $data['cdh_code'] = $cdhCode;
            $data['cdh_desc'] = $cdhCode.' - '.$cdhDesc;
        } else {
            $data['cdh_code'] = '';
            $data['cdh_desc'] = '';
        }   

        $data['cdh_detl'] = $this->mdl->getCerOfficerDetl($cdhCode);
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptCon(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');
        $data['parent_dept_list'] = $this->dropdown($this->mdl->getParDeptCon(), 'DM_DEPT_CODE', 'DM_DEPT_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE UPDATE CERTIFIED OFFICER FOR HEAD OF PTJ
    public function updateCerOfficer() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'parent_department' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl->updateCerOfficer($form);

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

    // NOTIFICATION SETUP
    public function notificationSetup()
    {
        $data['staff_list'] = $this->dropdown($this->mdl->getStaffList(), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        
        $data['noti_setup'] = $this->mdl->getNotificationSetup();

        if (!empty($data['noti_setup'])) {
            $data['code'] = $data['noti_setup']->TMC_CODE;
            $data['address'] = $data['noti_setup']->TMC_ADDRESS;
            $data['url_link'] = $data['noti_setup']->TMC_LINK;
            $data['phone_no'] = $data['noti_setup']->TMC_TELNO;
            $data['fax_no'] = $data['noti_setup']->TMC_FAXNO;
            $data['send_by'] = $data['noti_setup']->TMC_SEND_BY;
            $data['status'] = $data['noti_setup']->TMC_STATUS;
        } else {
            $data['code'] = '';
            $data['address'] = '';
            $data['url_link'] = '';
            $data['phone_no'] = '';
            $data['fax_no'] = '';
            $data['send_by'] = '';
            $data['status'] = '';
        }

        $data['staff_reminder'] = $this->mdl->getStaffReminder();
        
        $this->render($data);
    }

    // SAVE UPDATE NOTIFICATION SETUP
    public function saveNotiSet() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'address' => 'max_length[200]',
            'url_link' => 'valid_url|max_length[80]',
            'phone_no' => 'max_length[15]',
            'fax_no' => 'max_length[15]',
            'send_by' => 'required|max_length[10]',
            'status' => 'max_length[2]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl->saveNotiSet($form);

            if($update > 0 ) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // ADD STAFF REMINDER
    public function addStaffReminder()
    {
        $mod = $this->input->post('mod', true);
        if($mod == 'RMIC') {
            $data['mod'] = 'RMIC';
        } else {
            $data['mod'] = '';
        }

        $data['staff_tnca'] = $this->dropdown($this->mdl->getStaffTnca($mod), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE INSERT STAFF REMINDER
    public function saveStaffReminder() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'staff_id' => 'required|max_length[10]',
            'status' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $checkExist = $this->mdl->getStfRemDetl($form['staff_id'], $form['mod']);

            if(empty($checkExist)) {
                $insert = $this->mdl->saveStaffReminder($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
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

    // DELETE STAFF REMINDER
    public function  deleteStaffReminder() 
    {
        $this->isAjax();
        
        $stfID = $this->input->post('stfID', true);
        $mod = $this->input->post('mod', true);

        if (!empty($stfID)) {
            $del = $this->mdl->deleteStaffReminder($stfID, $mod);
                
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

    // CONFERENCE ALLOWANCE
    public function conferenceAllowance()
    {
        $mod = $this->input->post('mod', true);
        if($mod == 'RMIC') {
            $data['mod'] = 'RMIC';
        } else {
            $data['mod'] = '';
        }
        // $data['staff_tnca'] = $this->dropdown($this->mdl->getStaffTnca(), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        $data['con_allow'] = $this->mdl->getConAllow();

        $this->render($data);
    }

    // ADD CONFERENCE ALLOWANCE
    public function addConAllow()
    {
        $mod = $this->input->post('mod', true);
        if($mod == 'RMIC') {
            $data['mod'] = 'RMIC';
        } else {
            $data['mod'] = '';
        }
        
        $this->render($data);
    }

    // SAVE CONFERENCE ALLOWANCE
    public function saveConAllow() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        // var_dump($form['mod']);

        // form / input validation
        $rule = array(
            'code' => 'required|max_length[20]',
            'description' => 'required|max_length[100]',
            'max_amount' => 'numeric|max_length[40]',
            'budget_origin_local' => 'max_length[20]',
            'budget_origin_oversea' => 'max_length[20]',
            'status' => 'max_length[10]',
            'display_rmic' => 'max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $checkExist = $this->mdl->getConAllow($form['code']);

            if(empty($checkExist)) {
                $insert = $this->mdl->saveConAllow($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
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

    // DELETE CONFERENCE ALLOWANCE
    public function  deleteConAllow() 
    {
        $this->isAjax();
        
        $caCode = $this->input->post('caCode', true);

        if (!empty($caCode)) {
            // CHECK
            $check = $this->mdl->getStaffConAllowance($caCode);

            if(empty($check)) {
                $del = $this->mdl->deleteConAllow($caCode);
                
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record while sub-record exist', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // EDIT CONFERENCE ALLOWANCE
    public function editConAllow()
    {
        $caCode = $this->input->post('caCode', true);
        $mod = $this->input->post('mod', true);
        
        if($mod == 'RMIC') {
            $data['mod'] = 'RMIC';
        } else {
            $data['mod'] = '';
        }

        if(!empty($caCode)) {
            $data['ca_detl'] = $this->mdl->getConAllow($caCode);
        } else {
            $data['ca_detl'] = '';
        }

        $this->render($data);
    }

    // SAVE UPDATE CONFERENCE ALLOWANCE
    public function updateConAllow() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'description' => 'required|max_length[100]',
            'max_amount' => 'numeric|max_length[40]',
            'budget_origin_local' => 'max_length[20]',
            'budget_origin_oversea' => 'max_length[20]',
            'status' => 'max_length[10]',
            'display_rmic' => 'max_length[10]'
        );
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl->updateConAllow($form);

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

    // COUNTRY SETUP
    public function conCountrySetup()
    {
        $data['con_Country'] = $this->mdl->getConCountrySetup();

        $this->render($data);
    }

    // ADD COUNTRY SETUP
    public function addConCountry()
    {
        $data['country_list'] = $this->dropdown($this->mdl->getCountry(), 'CM_COUNTRY_CODE', 'CM_CODE_DESC', ' ---Please select--- ');
        $this->render($data);
    }

    // SAVE COUNTRY SETUP
    public function saveConCountry() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'country_code' => 'required|max_length[10]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $checkExist = $this->mdl->getConCountrySetup($form['country_code']);

            if(empty($checkExist)) {
                $insert = $this->mdl->saveConCountry($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
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

    // DELETE COUNTRY SETUP
    public function  deleteConCountry() 
    {
        $this->isAjax();
        
        $cCode = $this->input->post('cCode', true);

        if (!empty($cCode)) {
            $del = $this->mdl->deleteConCountry($cCode);
                
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

    // PARTICIPANT ROLE LIST
    public function conParticipantRole()
    {
        $mod = $this->input->post('mod', true);
        if($mod == 'RMIC') {
            $data['mod'] = 'RMIC';
        } elseif($mod == 'CPD') {
            $data['mod'] = 'CPD';
        } else {
            $data['mod'] = '';
        }

        $data['part_role'] = $this->mdl->getConParticipantRole();

        $this->render($data);
    }

    // PARTICIPANT ROLE DETL
    public function conDetlPartRole()
    {
        $cprCode = $this->input->post('cprCode', true);
        $cprDesc = $this->input->post('cprDesc', true);
        $mod = $this->input->post('mod', true);
        if($mod == 'RMIC') {
            $data['mod'] = 'RMIC';
        } else {
            $data['mod'] = '';
        }

        if(!empty($cprCode)) {
            $data['cpr_code'] = $cprCode;
            $data['cpr_desc'] = $cprDesc;
            $data['part_role_detl'] = $this->mdl->getConParticipantRoleDetl($cprCode);
        } else {
            $data['cpr_code'] = null;
            $data['cpr_desc'] = null;
            $data['part_role_detl'] = null;
        }
    
        $this->render($data);
    }

    // ADD PARTICIPANT ROLE
    public function addConPartRole()
    {
        $data['ref_role'] = $this->dropdown($this->mdl->getRefRole(), 'CTR_CODE', 'CTR_CODE_DESC', ' ---Please select--- ');
        $this->render($data);
    }

    // SAVE PARTICIPANT ROLE
    public function saveConPartRole() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array(
            'code' => 'required|max_length[50]',
            'participant_role' => 'required|max_length[100]',
            'ref_code' => 'max_length[10]',
            'order_by' => 'max_length[40]',
            'cpd_counted_academic' => 'max_length[1]',
            'cpd_counted_non_academic' => 'max_length[1]',
            'display_conference' => 'max_length[1]',
            'prosiding' => 'max_length[1]',
            'number_of_attachment' => 'max_length[40]',
            'checklist_bm' => 'max_length[300]',
            'checklist_bi' => 'max_length[300]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $checkExist = $this->mdl->getConParticipantRoleDetl($form['code']);

            if(empty($checkExist)) {
                $insert = $this->mdl->saveConPartRole($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
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

    // DELETE PARTICIPANT ROLE
    public function  deleteConPartRole() 
    {
        $this->isAjax();
        
        $cprCode = $this->input->post('cprCode', true);

        if (!empty($cprCode)) {
            $del = $this->mdl->deleteConPartRole($cprCode);
                
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

    // UPDATE PARTICIPANT ROLE
    public function updateConPartRole()
    {
        $cprCode = $this->input->post('cprCode', true);
        $mod = $this->input->post('mod', true);
        if($mod == 'RMIC') {
            $data['mod'] = 'RMIC';
        } else {
            $data['mod'] = '';
        }

        if(!empty($cprCode)) {
            $data['cpr_code'] = $cprCode;
            $data['part_role_detl'] = $this->mdl->getConParticipantRoleDetl($cprCode);
        } else {
            $data['cpr_code'] = null;
            $data['part_role_detl'] = null;
        }
        
        $data['ref_role'] = $this->dropdown($this->mdl->getRefRole(), 'CTR_CODE', 'CTR_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE UPDATE PARTICIPANT ROLE
    public function saveUpdConPartRole() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $mod = $form['mod'];
        
        // form / input validation
        if($mod == 'CPD') {
            $rule = array(
                'participant_role' => 'required|max_length[100]',
                'ref_code' => 'max_length[10]',
                'order_by' => 'max_length[40]',
                'cpd_counted_academic' => 'max_length[1]',
                'cpd_counted_non_academic' => 'max_length[1]',
                'prosiding' => 'max_length[1]',
                'display_rmic' => 'max_length[1]',
                'number_of_attachment' => 'max_length[40]',
                'checklist_bm' => 'max_length[300]',
                'checklist_bi' => 'max_length[300]'
            );
        } elseif($mod == 'RMIC') {
            $rule = array(
                'participant_role' => 'required|max_length[100]',
                'order_by' => 'max_length[40]',
                'display_conference' => 'max_length[1]',
                'prosiding' => 'max_length[1]',
                'display_rmic' => 'required|max_length[1]',
                'number_of_attachment' => 'required|max_length[40]',
                'checklist_bm' => 'required|max_length[300]',
                'checklist_bi' => 'required|max_length[300]'
            );
        } else {
            $rule = array(
                'participant_role' => 'required|max_length[100]',
                'ref_code' => 'max_length[10]',
                'order_by' => 'max_length[40]',
                'cpd_counted_academic' => 'max_length[1]',
                'cpd_counted_non_academic' => 'max_length[1]',
                'display_conference' => 'max_length[1]',
                'prosiding' => 'max_length[1]',
                'display_rmic' => 'max_length[1]',
                'number_of_attachment' => 'max_length[40]',
                'checklist_bm' => 'max_length[300]',
                'checklist_bi' => 'max_length[300]'
            );
        }
        

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->mdl->saveUpdConPartRole($form);

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


    /*===========================================================
       CONFERENCE INFORMATION SETUP - ATF093
    =============================================================*/

    // CONFERENCE INFORMATION LIST
    public function getConferenceInfoList()
    {
        $sMonth = $this->input->post('sMonth', true);
        $sYear = $this->input->post('sYear', true);

        if(empty($sMonth) && empty($sYear)) {
            $month = $this->mdl->getCurDate();
            $year = $this->mdl->getCurDate();

            $curMonth = $month->SYSDATE_MM;
            $curYear = $month->SYSDATE_YYYY;
        } else {
            $curMonth = $sMonth;
            $curYear = $sYear;
        }

        // get available records
        $data['conference_inf_list'] = $this->mdl->getConferenceInfoList($curMonth, $curYear);

        $this->render($data);
    }

    // ADD CONFERENCE INFORMATION
    public function addConferenceInfo()
    {
        // get state dd list
        $data['state_list'] = $this->dropdown($this->mdl->getStateList(), 'SM_STATE_CODE', 'SM_STATE_CODE_DESC', ' ---Please select--- ');

        // get country dd list
        $data['country_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_CODE_DESC', ' ---Please select--- ');

        // get level dd list
        $data['lvl_list'] = $this->dropdown($this->mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');

        $data['con_Country'] = $this->mdl->getConCountrySetup();

        $this->render($data);
    }

    // SAVE INSERT CONFERENCE INFORMATION
    public function saveConInfo() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

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
            $insert = $this->mdl->saveConInfo($form);

            if($insert > 0) {
                $json = array('sts' => 1, 'msg' => 'Record successfully saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

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
        // $month = $this->input->post('month', true);
        // $year = $this->input->post('year', true);

        // if(!empty($month)) {
        //     $data['month'] = $month;
        // } else {
        //     $data['month'] = '';
        // }

        // if(!empty($year)) {
        //     $data['year'] = $year;
        // } else {
        //     $data['year'] = '';
        // }

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
            $check = $this->mdl->checkChildRecScm($refid);

            if(empty($check)) {
                $del = $this->mdl->deleteConInfo($refid);
                
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record while sub-record exist', 'alert' => 'danger');
            }
            
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    /*===============================================================
       CONFERENCE SETUP FOR RMIC (ASF151)
    ================================================================*/

    // NOTIFICATION SETUP
    public function notificationSetupRmic()
    {
        $mod = 'RMIC';
        $parmCode1 = "MIN_DAYS_SUBMIT_LOCAL_RMIC";
        $parmCode2 = "MIN_DAYS_SUBMIT_OVERSEA_RMIC";
        $parmCode3 = "CONFERENCE_ADMIN_EXT_RMIC";
        $parmCode4 = "CONFERENCE_APPROVAL_TNCPI_ONLINE";
        
        // get available records
        $data['min_days_submit_local_rmic'] = $this->mdl->getHpParmConSet($parmCode1);
        $data['min_days_submit_oversea_rmic'] = $this->mdl->getHpParmConSet($parmCode2);
        $data['conference_admin_ext'] = $this->mdl->getHpParmConSet($parmCode3);
        $data['approval_tncpi_online'] = $this->mdl->getHpParmConSet($parmCode4);

        $data['staff_reminder'] = $this->mdl->getStaffReminder($mod);

        $this->render($data);
    }
}