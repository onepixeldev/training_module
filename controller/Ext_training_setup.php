<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ext_training_setup extends MY_Controller
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ext_training_model', 'et_mdl');
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }

    // View Page Filter
    public function viewTabFilter($tabID, $sid = null)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);

        if($sid == 'ASF132') {
            redirect($this->class_uri('ASF132'));
        }
    }


    // Organizer Info for External Agency Setup
    public function ASF132()
    {   
        $data['state_dd'] = $this->dropdown($this->et_mdl->getStateDD(), 'SM_STATE_CODE', 'SM_STATE_CD', ' ---Please select--- ');

        $this->render($data);
    }

    /*===========================================================
       Organizer Info for External Agency Setup - ASF132
    =============================================================*/

    // ORGANIZER INFO LIST
    public function organizerInfoList()
    {   
        $state = $this->input->post('state', true);

        // get available records
        $data['org_list'] = $this->et_mdl->getOrgInfoList($state);

        $this->render($data);
    }

    // ADD ORGANIZER INFO
    public function addOrganizerInfo()
    {  
        // STATE DD
        $data['state_dd'] = $this->dropdown($this->et_mdl->getStateDD(), 'SM_STATE_CODE', 'SM_STATE_CD', ' ---Please select--- ');

        // CONTRY DD
        // $data['country_dd'] = $this->dropdown($this->et_mdl->getCountryDD(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_CD', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE ADD ORGANIZER INFO
    public function saveOrgInfo() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // CODE
        $code = strtoupper($form['code']);

        // form / input validation
        $rule = array(
            'code' => 'required|max_length[10]',
            'description' => 'max_length[4000]',
            'address' => 'max_length[2000]',
            'postcode' => 'max_length[10]',
            'city' => 'max_length[30]',
            'state' => 'required|max_length[10]',
            'country' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check = $this->et_mdl->getOrgInfoDetl($code);

            if(empty($check)) {
                $insert = $this->et_mdl->saveOrgInfo($form);

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

    // EDIT ORGANIZER INFO
    public function editOrganizerInfo()
    {  
        $code = $this->input->post('code', true);
            
        $data['org_detl'] = $this->et_mdl->getOrgInfoDetl($code);

        // STATE DD
        $data['state_dd'] = $this->dropdown($this->et_mdl->getStateDD(), 'SM_STATE_CODE', 'SM_STATE_CD', ' ---Please select--- ');

        // CONTRY DD
        $data['country_dd'] = $this->dropdown($this->et_mdl->getCountryDD(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_CD', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE UPDATE ORGANIZER INFO
    public function saveUpdOrgInfo() 
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // CODE
        $code = strtoupper($form['code']);

        // form / input validation
        $rule = array(
            'description' => 'max_length[4000]',
            'address' => 'max_length[2000]',
            'postcode' => 'max_length[10]',
            'city' => 'max_length[30]',
            'state' => 'required|max_length[10]',
            'country' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $update = $this->et_mdl->saveUpdOrgInfo($form, $code);

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

    // DELETE ORGANIZER INFO
    public function delOrgInfo() 
    {
		$this->isAjax();
		
        $code = $this->input->post('code', true);
        
        if (!empty($code)) {
            $del = $this->et_mdl->delOrgInfo($code);
        
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
