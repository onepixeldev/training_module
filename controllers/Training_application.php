<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_application extends MY_Controller
{
    private $staff_id;

    public function __construct()
    {
        parent::__construct();
        //$this->loadModel('mdl');
        $this->load->model('Training_application_model', 'mdl');
        $this->staff_id = $this->lib->userid();
    }

    // View MAIN Page
    public function index()
    {
        // clear filter
        $this->session->set_userdata('tabID', '');
        //$this->session->set_userdata('sTraining', '');
        //$this->session->set_userdata('trSts', '');

        $this->redirect($this->class_uri('ASF113'));
    }

    public function ATF001()
    {   
        $this->render();
    }

    // View Page Filter
    public function viewTabFilter($tabID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        redirect($this->class_uri('ATF001'));
    }

    /*===========================================================
       TRAINING SETUP
    =============================================================*/
    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingInfo()
    {   
        // get available records
        $data['trainingInfo'] = $this->mdl->getTrainingInfo();

        $this->render($data);
    }

    public function speakerInfo()
    {   
        $tsRefID = $this->input->post('tsRefID', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['speakerInfoExternal'] = $this->mdl->getSpeakerInfoExternal($tsRefID);
            $data['speakerInfoStaff'] = $this->mdl->getSpeakerInfoStaff($tsRefID);
        }

        $this->render($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    // call add modal
    public function addNewTraining()
    {
        $countCode = $this->input->post('countryCode',true);
        $organizerCode = $this->input->post('orgCode',true);

        $data['type_list'] = $this->dropdown($this->mdl->getTypeList(), 'TT_CODE', 'TT_CODE_DESC', ' ---Please select--- ');
        $data['category'] = $this->dropdown($this->mdl->getCategoryList(), 'TC_CATEGORY', 'TC_CATEGORY', ' ---Please select--- ');
        $data['level'] = $this->dropdown($this->mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');
        $data['area'] = $this->dropdown($this->mdl->getAreaList(), 'TF_CODE', 'TF_CODE_DESC', ' ---Please select--- ');
        $data['sgroup'] = $this->dropdown($this->mdl->getSgroupList(), 'SG_GROUP_CODE', 'SG_CODE_DESC', ' ---Please select--- ');
        $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');
        $data['com_lvl_code'] = $this->dropdown($this->mdl->getCompetencyLevel(), 'TCL_COMPETENCY_CODE', 'TCL_COMPETENCY_CODE_DESC', ' ---Please select--- ');
        $data['coor'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
        $data['coor_sec'] = $this->dropdown($this->mdl->getCoordinatorSec(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');
        $data['org_lvl'] = $this->dropdown($this->mdl->getOrganizerLevel(), 'TOL_CODE', 'TOL_CODE_DESC', ' ---Please select--- ');
        $data['org_name'] = $this->dropdown($this->mdl->getOrganizerName(), 'TOH_ORG_CODE', 'TOH_ORG_CODE_DESC', ' ---Please select--- ');

        if (!empty($countCode)) {
            $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
        } else {
            $data['state_list'] = '';
        }

        if (!empty($organizerCode)) {
            $data['org_info'] = $this->mdl->getCountryStateList($countCode);
        } else {
            $data['org_info'] = '';
        }

        //$data['count_code'] = $countCode;
        //$data['org_code'] = $organizerCode;
        

        $this->renderAjax($data);
    }
    
    // validation ADD 
    public function saveNewTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[ ]', 'description' => 'required|max_length[200]',
        'order' => 'required|is_natural_no_zero|max_length[40]', 'status' => 'required|max_length[10]');

        $codeTAC = $form['code'];
        //$TT = $form['training_type'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCode = $this->mdl->getTACDetail($codeTAC);
    
            // If not exists, proceed add new record
            if (empty($recCode)) {
                // insert new record
                $insert = $this->mdl->insertTAC($form);
                    
                if ($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
                // ------------------------------------
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record. Record already exists', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
        // -------------------
         
        echo json_encode($json);
    }


    // Populate state list
    public function stateList(){
        $this->isAjax();
        
        $countCode = $this->input->post('countryCode', true);
        
        // get available records
        $stateList = $this->mdl->getCountryStateList($countCode);
               
        if (!empty($stateList)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'stateList' => $stateList);
        
        echo json_encode($json);
    }

    // Populate organizer info
    public function organizerInfo(){
        $this->isAjax();
        
        $organizerCode = $this->input->post('orgCode', true);
        
        // get available records
        $organizerInfo = $this->mdl->getOrganizerName($organizerCode);
               
        if (!empty($organizerInfo)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'orgInfo' => $organizerInfo);
        
        echo json_encode($json);
    }
}
