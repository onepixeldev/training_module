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
        $this->render();
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