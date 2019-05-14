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
    public function viewTabFilter($tabID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        redirect($this->class_uri('ASF032'));
    }

    // CONFERENCE SETUP
    public function ASF032()
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
                $json = array('sts' => 0, 'msg' => 'Could not remove record.'.nl2br("\r\n Please remove child record from <b>STAFF_CONFERENCE_MAIN</b>"), 'alert' => 'danger');
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

            if($updateTempOpen > 0 && $updateMinDaysSubmitLocal > 0 && $updateMinDaysSubmitOversea > 0 && $updateCheckSubmitLmp > 0 && $updateMaxDaysEditLmp > 0 && $updateConOverseas2yrs > 0 && $updateConAsean1yrs > 0 && $updateConMaxDaysRecLoc > 0 && $updateConMaxDaysRecOve > 0) {
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

        $parmCode11 = "CONFERENCE_ADMIN_EXT";

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

    // DELETE STAFF CONTACT INFO
    public function  deleteStfConInfo() {
        $this->isAjax();
        
        $parmCode = "CONFERENCE_ADMIN_EXT";
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
        // $data['staff_list'] = $this->dropdown($this->mdl->getDept(), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        $this->render();
    }
}