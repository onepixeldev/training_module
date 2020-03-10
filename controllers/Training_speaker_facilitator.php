<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Training_speaker_facilitator extends MY_Controller
{
    private $staff_id;

    public function __construct()
    {
        parent::__construct();
        //$this->loadModel('mdl');
        $this->load->model('Training_speaker_facilitator_model', 'mdl');
        $this->staff_id = $this->lib->userid();
    }

    // View MAIN Page
    public function index()
    {
        // clear filter
        $this->session->set_userdata('tabID', '');
        
        //$this->redirect($this->class_uri('viewEF'));
        $this->redirect($this->class_uri('ATF050'));
    }
	
    /*===========================================================
       EXTERNAL FACILITATOR
    =============================================================*/

    // public function viewEF()
    // {
    //     $this->render();
    // }

    public function ATF050()
    {
        $this->render();
    }
    
    public function applicationList()
    {
        // get available records
        $data['external_facilitator_list'] = $this->mdl->getExternalFacilitatorInfo();
        
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
    
    // validation ADD
    public function saveEF()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('status' => 'required|max_length[20]','name' => 'required|max_length[200]','ic_no' => 'max_length[15]',
        'deptEF' => 'max_length[200]', 'organization' => 'required|max_length[200]','posEF' => 'max_length[200]','offTelEF' => 'max_length[20]',
        'hp_no' => 'required|max_length[20]','email' => 'required|valid_email|max_length[50]','area1' => 'max_length[500]',
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
            $data['ef_country_desc'] = $this->mdl->getEFCountryDesc($ef_id);
            $data['ef_state_desc'] = $this->mdl->getEFStateDesc($ef_id);
            
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
        'deptEF' => 'max_length[200]', 'organization' => 'required|max_length[200]','posEF' => 'max_length[200]','offTelEF' => 'max_length[20]',
        'hp_no' => 'required|max_length[20]','email' => 'required|valid_email|max_length[50]','area1' => 'max_length[500]',
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

    // GENERATE REPORT (JASPER)
    /*public function report($format){
        

        $c = new Jaspersoft\Client\Client("http://10.99.1.192:8080/jasperserver","trainee","123456");
		
		$c->setRequestTimeout(60);
		//print_r($c); 1
		//$report = $c->reportService()->runReport("/Reports/Training/Cherry","html");2
		$report = $c->reportService()->runReport("/Reports/Training/Syazwan/efList","pdf");
		
		header('Content-type: application/pdf');
		
		echo $report;
    }*/

    // GENERATE REPORT (ORACLE)
    public function genReportOtherOra() {
        $formCode = 'ATR021';
        //$formCode = 'WRR147';
        // Format = PDF
        $param = null;
        $this->lib->report($formCode, $param);
    }

    // GENERATE REPORT (ORACLE)
    public function genReportOther() {
        // Load jasperreport library
		$this->load->library('jasperreport');
		
		// get report parameters
		$param = null;
		
		// get report code and format
		$repCode = 'ATR021';
		$format = 'pdf';
		
		// for report format = excel / word, report will be downloaded as attachment
		if ($format == 'excel') {
			$format = 'xlsx';
			$this->jasperreport->setAttachment();
		} elseif ($format == 'word') {
			$format = 'docx';
			$this->jasperreport->setAttachment();
		}
		
		$this->jasperreport->runReport("/Reports/MyHRIS/HRA_AT/" . $repCode,$format,$param);
    }


    /*===========================================================
       EXTERNAL SPEAKER
    =============================================================*/

    
    public function ATF120()
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

    // VALIDATION ADD
    public function saveES()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('status' => 'required|max_length[10]','name' => 'required|max_length[200]','ic_no' => 'max_length[15]',
        'organization' => 'required|max_length[200]','posES' => 'max_length[200]','offTelES' => 'max_length[15]',
        'hp_no' => 'required|max_length[15]','addressES' => 'max_length[200]','postcodeES' => 'max_length[15]',
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
            $data['es_country_desc'] = $this->mdl->getESCountryDesc($es_id);
            $data['es_state_desc'] = $this->mdl->getESStateDesc($es_id);
            
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

        // /$country_list = $this->post('country_es');
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
        'organization' => 'required|max_length[200]','posES' => 'max_length[200]','offTelES' => 'max_length[15]',
        'hp_no' => 'required|max_length[15]','addressES' => 'max_length[200]','postcodeES' => 'max_length[15]',
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

    /*===========================================================
       EXTERNAL SPEAKER & EXTERNAL FACILITATOR
    =============================================================*/
    // Populate state list (External Speaker and External Facilitator)
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
}
