<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Training_external_facilitator extends MY_Controller
{
    private $staff_id;

    public function __construct()
    {
        parent::__construct();
        //$this->loadModel('mdl');
        $this->load->model('Training_external_facilitator_model', 'mdl');
        $this->staff_id = $this->lib->userid();
    }

    // View MAIN Page
    public function index()
    {
        // clear filter
        $this->session->set_userdata('tabID', '');
        $this->session->set_userdata('usKey', '');
        
        $this->redirect($this->class_uri('view'));
    }
	
    public function view($sKey = null)
    {
        if (empty($sKey)) {
            if (!empty($this->session->usKey)) {
                $sKey = $this->session->usKey;
            }
        }
        $data['default_key'] = $sKey;
        $this->render($data);
    }
    
    public function applicationList()
    {
        $search = null;
        
        // get available records
        $data['external_facilitator_list'] = $this->mdl->getExternalFacilitatorInfo($search);
        
        $this->renderAjax($data);
	}
	
	/*=================
        ADD PROCESS
    ==================*/
    // call add modal
    public function addEF()
    {
        $countCode = $this->input->post('countryCode',true);

        $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');
        
        if (!empty($countCode)) {
            $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
        } else {
            $data['state_list'] = '';
        }

        $data['count_code'] = $countCode;

        //sleep(3);
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

    // validation ADD
    public function saveEF()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('status' => 'required|max_length[20]','name' => 'required|max_length[200]','ic_no' => 'max_length[15]',
        'deptEF' => 'max_length[200]', 'orEF' => 'max_length[200]','posEF' => 'max_length[200]','offTelEF' => 'max_length[20]',
        'mobileEF' => 'max_length[20]','emailEF' => 'max_length[50]','area1' => 'max_length[500]',
        'area2' => 'max_length[500]','area3' => 'max_length[500]', 'addressEF' => 'max_length[200]', 'postcodeEF' => 'max_length[15]',
        'cityEF' => 'max_length[50]', 'country' => 'max_length[10]', 'state' => 'max_length[10]');

        $efName = $form['name'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record for selected code is already exists
            $recCounter = $this->mdl->checkEFDetail($efName);
    
            // If not exists, proceed add new record
            if (empty($recCounter)) {
                // insert new record
                $insert = $this->mdl->insertEF($form);
                    
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
    public function efDetail()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $ef_id = $this->post('efID', true);
        
        // GET INFO FROM DB
        if (!empty($ef_id)) {
            $data['ef_id'] = $ef_id;
            $data['ef_info'] = $this->mdl->getEFDetail($ef_id);
            $data['ef_state_country_desc'] = $this->mdl->getESStateCountryDesc($ef_id);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    /*=================
        DELETE PROCESS
    ==================*/
    // call delete modal
    public function delEF()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $EF_ID = $this->post('efID', true);
        
        // GET INFO FROM DB
        if (!empty($EF_ID) || $EF_ID==0) {
            $data['ef_id'] = $EF_ID;
            $data['ef_name'] = $this->mdl->getEFDetail($EF_ID);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteEF()
    {
        $this->isAjax();
        
        $id_ef = $this->post('efID', true);
        
        if (!empty($id_ef)) {
            $del = $this->mdl->deleteEFdb($id_ef);
            
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
    // Call editEF modal
    public function editEF() {
        $countCode = $this->input->post('countryCode',true);

        $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');

        $country_list = $this->post('country');

        $EF_ID = $this->post('efID',true);

        /*if (!empty($countCode)) {
            $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
        } else {
            $data['state_list'] = '';
        }*/
        
		// GET INFO FROM DB
        if (!empty($EF_ID) || $EF_ID==0) {
            $data['ef_id'] = $EF_ID;
            $data['ef_info'] = $this->mdl->getEFDetail($EF_ID);
            if (!empty($data['ef_info']->EF_COUNTRY)) {
                $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($data['ef_info']->EF_COUNTRY), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
            } else {
                $data['state_list'] = '';
            }
        } else {
            echo 'Invalid Request.';
        }

        $data['count_code'] = $countCode;
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE
    public function updateEF()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $EFid = $this->post('efID', true);
       
        // form / input validation
        $rule = array('status' => 'required|max_length[20]','name' => 'required|max_length[200]','ic_no' => 'max_length[15]',
        'deptEF' => 'max_length[200]', 'orEF' => 'max_length[200]','posEF' => 'max_length[200]','offTelEF' => 'max_length[20]',
        'mobileEF' => 'max_length[20]','emailEF' => 'max_length[50]','area1' => 'max_length[500]',
        'area2' => 'max_length[500]','area3' => 'max_length[500]', 'addressEF' => 'max_length[200]', 'postcodeEF' => 'max_length[15]',
        'cityEF' => 'max_length[50]', 'country' => 'max_length[10]', 'state' => 'max_length[10]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateEF($EFid, $form);
                
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

    // generate report jasper
    /*public function report($format){
        

        $c = new Jaspersoft\Client\Client("http://10.99.1.192:8080/jasperserver","trainee","123456");
		
		$c->setRequestTimeout(60);
		//print_r($c); 1
		//$report = $c->reportService()->runReport("/Reports/Training/Cherry","html");2
		$report = $c->reportService()->runReport("/Reports/Training/Syazwan/efList","pdf");
		
		header('Content-type: application/pdf');
		
		echo $report;
    }*/

    // generate report oracle
    public function genReportOther($formCode) {
		
        // Format = PDF
        $param = null;
        $this->lib->report($formCode, $param, 'pdf', false);
    }
}
