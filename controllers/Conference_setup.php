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

    // SAVE CONFERENCE CATEGORY
    public function saveConferenceCat() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

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
            $insert = $this->mdl->saveConferenceCat($form);

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
}