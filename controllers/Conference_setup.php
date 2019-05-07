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

    // // View Page Filter
    // public function viewTabFilter($tabID)
    // {
    //     // set session
    //     $this->session->set_userdata('tabID', $tabID);
        
    //     redirect($this->class_uri('ASF032'));
    // }

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
        

        // get available records
        $data['conference_temp_open_appl'] = $this->mdl->getHpParmConTemOpAppl($parmCode1);
        $data['min_days_submit_local'] = $this->mdl->getHpParmConTemOpAppl($parmCode2);
        $data['min_days_submit_oversea'] = $this->mdl->getHpParmConTemOpAppl($parmCode3);
        $data['check_submit_report'] = $this->mdl->getHpParmConTemOpAppl($parmCode4);
        $data['max_days_edit_lmp'] = $this->mdl->getHpParmConTemOpAppl($parmCode5);
        $data['conference_overseas_2yrs'] = $this->mdl->getHpParmConTemOpAppl($parmCode6);
        $data['conference_asean_1yrs'] = $this->mdl->getHpParmConTemOpAppl($parmCode7);
        $data['conf_max_days_rec_local'] = $this->mdl->getHpParmConTemOpAppl($parmCode8);
        $data['conf_max_days_rec_oversea'] = $this->mdl->getHpParmConTemOpAppl($parmCode9);
        $data['conference_url'] = $this->mdl->getHpParmConTemOpAppl($parmCode10);

        $this->render($data);
    }
}