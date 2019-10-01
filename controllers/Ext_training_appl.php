<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ext_training_appl extends MY_Controller
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

    // TRAINING SETUP - EXTERNAL AGENCY
    public function ATF138()
    {   
        $this->render();
    }

    // SEARCH STAFF
    public function searchStaffMd() {
        $staff_id = $this->input->post('staff_id', true);
        $search_trigger = $this->input->post('search_trigger', true);

        if(!empty($staff_id) && $search_trigger == 1) {
            $data['stf_inf'] = $this->et_mdl->getStaffSearch($staff_id);
            $this->render($data);
        } elseif(empty($staff_id) && $search_trigger == 1) {
            $data['stf_inf'] = $this->et_mdl->getStaffList();
            $this->render($data);
        } else {
            $this->render();
        }
    }

    // AUTO SEARCH STAFF ID
    public function staffKeyUp()
    {  
        $this->isAjax();
        $staff_id = $this->input->post('staff_id', true);
        $found = 0;

        if (!empty($staff_id)) {
            $stf_inf = $this->et_mdl->getStaffList($staff_id);
            if(!empty($stf_inf->SM_STAFF_NAME)) {
                $found++;
                $stf_name = $stf_inf->SM_STAFF_NAME;
            } else {
                $stf_name = '';
            }
            
            if($found > 0) {
                $json = array('sts' => 1, 'msg' => 'Staff found', 'alert' => 'green', 'stf_name' => $stf_name);
            } else {
                $json = array('sts' => 0, 'msg' => 'Staff not found', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*===========================================================
       TRAINING SETUP FOR EXTERNAL AGENCY - ATF138
    =============================================================*/

    // TRAINING LIST
    public function trainingList()
    {   
        // get available records
        $data['tr_list'] = $this->et_mdl->getTrainingList();

        $this->render($data);
    }

    // ADD NEW TRAINING
    public function addTraining()
    {
        // type dd
        $data['type_list'] = $this->dropdown($this->et_mdl->getTypeList(), 'TT_CODE', 'TT_CODE_DESC', ' ---Please select--- ');

        // category dd
        $data['category'] = $this->dropdown($this->et_mdl->getCategoryList(), 'TC_CATEGORY', 'TC_CATEGORY', ' ---Please select--- ');

        // level dd
        $data['level'] = $this->dropdown($this->et_mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');

        // competency code
        $data['com_lvl_code'] = $this->dropdown($this->et_mdl->getCompetencyLevel(), 'TCL_COMPETENCY_CODE', 'TCL_COMPETENCY_CODE_DESC', ' ---Please select--- ');

        // coordinator dd
        $data['coor'] = $this->dropdown($this->et_mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
        $data['coor_sec'] = $this->dropdown($this->et_mdl->getCoordinatorSec(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');

        // organizer dd
        $data['org_lvl'] = $this->dropdown($this->et_mdl->getOrganizerLevel(), 'TOL_CODE', 'TOL_CODE_DESC', ' ---Please select--- ');
        $data['org_name'] = $this->dropdown($this->et_mdl->getOrganizerName(), 'TOH_ORG_CODE', 'TOH_ORG_CODE_DESC', ' ---Please select--- ');

        // STATE DD
        $data['state_dd'] = $this->dropdown($this->et_mdl->getStateDD(), 'SM_STATE_CODE', 'SM_STATE_CD', ' ---Please select--- ');

        // CONTRY DD
        $data['country_dd'] = $this->dropdown($this->et_mdl->getCountryDD(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_CD', ' ---Please select--- ');
        
        $this->render($data);
    }

    // POPULATE ORGANIZER INFO
    public function organizerInfo()
    {
        $this->isAjax();
        
        $organizerCode = $this->input->post('orgCode', true);
        
        // get available records
        $organizerInfo = $this->et_mdl->getOrganizerName($organizerCode);
               
        if (!empty($organizerInfo)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'orgInfo' => $organizerInfo);
        
        echo json_encode($json);
    }

    // SAVE ADD TRAINING 
    public function saveNewTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TH_TRAINING_CODE
        // $trCode = $form['structured_training'];

        // module setup
        $coor = $form['coordinator'];
        $coorSeq = $form['coordinator_sector'];
        $coorContact = $form['phone_number'];
        $evaluationTHD = $form['evaluation'];

        // training name
        $trName = $form['training_title'];

        // evaluation period not/required
        if($evaluationTHD == 'Y') {
            $evaluationFrReq = 'required|max_length[30]';
            $evaluationToReq = 'required|max_length[30]';
        } else {
            $evaluationFrReq = 'max_length[30]';
            $evaluationToReq = 'max_length[30]';
        }

        // form / input validation
        $rule = array(
            'type' => 'required|max_length[100]', 
            'category' => 'required|max_length[200]',
            // 'structured_training' => 'max_length[20]',
            'level' => 'required|max_length[10]', 
            // 'area' => 'max_length[200]', 
            // 'service_group' => 'max_length[10]',
            'training_title' => 'required|max_length[100]', 
            'training_description' => 'max_length[500]', 
            'venue' => 'max_length[100]',
            'country' => 'max_length[10]', 
            'state' => 'max_length[10]', 
            'date_from' => 'required|max_length[11]',
            'date_to' => 'required|max_length[11]', 
            // 'time_from' => 'required|max_length[11]', 
            // 'time_to' => 'required|max_length[11]',
            'total_hours' => 'required|max_length[12]', 
            'internal_external' => 'required|max_length[20]', 
            'sponsor' => 'max_length[100]',
            // 'offer' => 'max_length[1]', 
            'participants' => 'max_length[11]', 
            'online_application' => 'max_length[1]',
            'closing_date' => 'max_length[11]', 
            'competency_code' => 'max_length[10]', 
            'evaluation_period_from' => $evaluationFrReq,
            'evaluation_period_to' => $evaluationToReq, 
            'attention' => 'max_length[500]', 

            // TRAINING_HEAD_DETL
            'coordinator' => 'max_length[10]', 
            'coordinator_sector' => 'max_length[10]',
            'phone_number' => 'max_length[15]', 
            'evaluation' => 'max_length[1]', 
            
            // organizer info
            'organizer_level' => 'max_length[10]', 'organizer_name' => 'max_length[100]', 

            // completion info
            'evaluation_compulsary' => 'max_length[1]', 'attendance_type' => 'max_length[20]', 'print_certificate' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {
            $data['refID'] = $this->et_mdl->getRefID();

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
         
        
        //$this->renderAjax($data);
        echo json_encode($json);
    }

}
