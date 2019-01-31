<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Training_external_speaker extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('mdl');
    }

    // View MAIN Page
    public function index()
    {
        $this->redirect($this->class_uri('view'));
    }
    // DISPLAY basic external speaker's data
    public function view()
    {
        $data['basic_ext'] = $this->mdl->getBasicExtSp();
        $this->render($data);
    }

    /*=================
        ADD PROCESS
    ==================*/
    // call add modal
    public function addES()
    {
        $countCode = $this->input->post('countryCode',true);

        $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');
        
        if (!empty($countCode)) {
            $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
        } else {
            $data['state_list'] = '';
        }

        $data['count_code'] = $countCode;

        $this->renderAjax($data);
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

    // VALIDATION ADD
    public function saveES()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('status' => 'required|max_length[10]','name' => 'required|max_length[200]','ic_no' => 'max_length[15]',
        'orES' => 'max_length[200]','posES' => 'max_length[200]','offTelES' => 'max_length[15]',
        'mobileES' => 'max_length[15]','addressES' => 'max_length[200]','postcodeES' => 'max_length[15]',
        'cityES' => 'max_length[50]','country_es' => 'max_length[10]','state_es' => 'max_length[10]');
        //$countryES = $form['country_es'];
        //$stateES = $form['state_es'];
        $esName = $form['name'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record for selected code is already exists
            $recCounter = $this->mdl->checkESDetail($esName);
    
            // If not exists, proceed add new record
            if (empty($recCounter)) {
                // insert new record
                $insert = $this->mdl->insertES($form);
                    
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
    
    /*=================
        GET DETAILS
    ==================*/
    // CALL DETAIL MODAL
    public function esDetail()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $es_id = $this->post('esID', true);
        
        // GET INFO FROM DB
        if (!empty($es_id)) {
            //$data['es_id'] = $es_id;
            $data['es_info'] = $this->mdl->getESDetail($es_id);
            $data['es_state_country_desc'] = $this->mdl->getESStateCountryDesc($es_id);
            
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }
    
    /*=================
        DELETE PROCESS
    ==================*/
    // call delete modal
    public function delES()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $ES_ID = $this->post('esID', true);
        
        // GET INFO FROM DB
        if (!empty($ES_ID) || $ES_ID==0) {
            $data['es_id'] = $ES_ID;
            $data['es_name'] = $this->mdl->getESDetail($ES_ID);
  
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }
    
    // Begin delete record
    public function deleteES()
    {
        $this->isAjax();
        
        $id_es = $this->post('esID', true);
        
        if (!empty($id_es)) {
            $del = $this->mdl->deleteESdb($id_es);
            
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

    /*=================
        UPDATE PROCESS
    ==================*/
    // Call editES modal
    public function editES() {
        $countCode = $this->input->post('countryCode',true);

        $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');

        $country_list = $this->post('country_es');
        $ESID = $this->post('esID',true);

        /*if (!empty($countCode)) {
            $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
        } else {
            $data['state_list'] = '';
        }*/
        
		// GET INFO FROM DB
        if (!empty($ESID) || $ESID==0) {
            $data['es_id'] = $ESID;
            $data['es_desc'] = $this->mdl->getESDetail($ESID);
            if (!empty($data['es_desc']->ES_COUNTRY)) {
                $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($data['es_desc']->ES_COUNTRY), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
            } else {
                $data['state_list'] = '';
            }
        } else {
            echo 'Invalid Request.';
        }

        $data['count_code'] = $countCode;
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE
    public function updateES()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $ESid = $this->post('IDes', true);
       
        // form / input validation
        $rule = array('IDes'=>'required|max_length[10]', 'status' => 'max_length[10]','name' => 'required|max_length[200]','ic_no' => 'max_length[15]',
        'orES' => 'max_length[200]','posES' => 'max_length[200]','offTelES' => 'max_length[15]',
        'mobileES' => 'max_length[15]','addressES' => 'max_length[200]','postcodeES' => 'max_length[15]',
        'cityES' => 'max_length[50]','country_es' => 'max_length[10]','state_es' => 'max_length[10]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateES($ESid, $form);
                
            if ($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been updated', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to update record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
        // -------------------
             
        echo json_encode($json);
    }
}
