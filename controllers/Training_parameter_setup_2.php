<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_parameter_setup_2 extends MY_Controller
{
    private $staff_id;

    public function __construct()
    {
        parent::__construct();
        //$this->loadModel('mdl');
        $this->load->model('Training_parameter_setup_2_model', 'mdl');
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

    /*===========================================================
       Training Parameter Setup 2 VIEW && TAB FILTER
    =============================================================*/

    public function ASF113()
    {   
        //public function view($stTraining = null, $sSts = null)
        /*if (empty($stTraining)) {
            if (!empty($this->session->sTraining)) {
                $stTraining = $this->session->sTraining;
            }
        }
        $data['default_stt'] = $stTraining;

        if (empty($sSts)) {
            if (!empty($this->session->trSts)) {
                $sSts = $this->session->trSts;
            }
        }
        $data['default_sts'] = $sSts;
        */

        // get training effectiveness evaluation
        $thm1='1';
        $thm2='2';
        $thm3='3';
        $data['hod_memo'] = $this->mdl->getTraEffEvaSetup($thm1);
        $data['hod_memo2'] = $this->mdl->getTraEffEvaSetup($thm2);
        $data['hod_memo3'] = $this->mdl->getTraEffEvaSetup($thm3);

        $data['tr_eva_memo'] = $this->mdl->getTrEvaMemSetup();

        $data['tr_eva_por'] = $this->mdl->getTrEvaPorSetup();

        // get training component
        $data['tr_mod_comp'] = $this->mdl->getTrModCom();

        // get external agency setup
        $data['max_interval'] = $this->mdl->getExAgSetup();
        $data['guideline_url'] = $this->mdl->getExAgSetupUrl();

        $this->render($data);
    }

    // View Page Filter
    public function viewTabFilter($tabID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        redirect($this->class_uri('ASF113'));
    }

    /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                    TRAINING PARAMETER SETUP 2
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /*===========================================================
       Training Effectiveness Evaluation 
    =============================================================*/

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    public function editHodMem()
    {
        $hpp_no = $this->post('hpp_no', true);
        $parm_code = $this->post('parm_code', true);
        
        // GET INFO FROM DB
        if (!empty($hpp_no) && empty($parm_code)) {
            $data['hpp_no'] = $hpp_no;
            $data['hpp_desc'] = $this->mdl->getTraEffEvaSetup($hpp_no);
        } elseif (!empty($hpp_no) && $parm_code=='TRAINING_EVALUATION_MEMO') {
            $data['hpp_no'] = $hpp_no;
            $data['hpp_desc'] = $this->mdl->getTrEvaMemSetup($hpp_no);
        } elseif (!empty($hpp_no) && $parm_code=='TRAINING_EVALUATION_PORTAL') {
            $data['hpp_no'] = $hpp_no;
            $data['hpp_desc'] = $this->mdl->getTrEvaPorSetup($hpp_no);
        }
         else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }
    public function updateHODmem()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $hpp_no = $form['hpp_no'];
        $hpp_type = $form['hpp_code'];
       
        // form / input validation
        if ($hpp_type=="TRAINING_HOD_MEMO"){
            $rule = array('time' => 'required|is_natural|max_length[2]');
        } 
        elseif ($hpp_type=="TRAINING_EVALUATION_MEMO"){
            $rule = array('day' => 'required|is_natural|max_length[2]');
        }
        elseif ($hpp_type=="TRAINING_EVALUATION_PORTAL"){
            $rule = array('function_portal' => 'required|max_length[1]');
        }

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateHODmem($hpp_no, $form);
                
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
       Training Effectiveness SETUP
    =============================================================*/
    /*_____________________
        GET DETAILS
    _____________________*/
    // get training 
    public function trEffSetup()
    {
        // get available records
        $data['ef_cat'] = $this->mdl->getTrEffSetup();
        
        $this->renderAjax($data);
    }

    public function effTitleSetup()
    {
        $data['gg'] = '';
        $codeTAC = $this->input->post('codeTAC',true);
        $descTAC = $this->input->post('descTAC',true);
        // get available records
        $data['tac_code'] = $codeTAC;
        $data['tac_desc'] = $descTAC;
        $data['ef_title_se'] = $this->mdl->getEffTitleSetup($codeTAC);
        $data['ef_se'] = $this->mdl->getEffSetup($codeTAC);

        $this->renderAjax($data);
    }

    public function effSetup()
    {
        $codeTAC = $this->input->post('codeTAC',true);
        $descTAC = $this->input->post('descTAC',true);
        // get available records
        $data['tac_code'] = $codeTAC;
        $data['tac_desc'] = $descTAC;
        $data['ef_se'] = $this->mdl->getEffSetup($codeTAC);

        $this->renderAjax($data);
    }

    public function effSetup2()
    {
        $codeTET = $this->input->post('codeTET',true);
        $descTET = $this->input->post('descTET',true);
        $codeTAC = $this->input->post('coteTAC',true);

        // get available records
        $data['tet_code'] = $codeTET;
        $data['tet_desc'] = $descTET;
        $data['tac_code'] = $codeTAC;
        $data['ef_se'] = $this->mdl->getEffSetup2($codeTET);

        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    // call add modal
    public function addTAC()
    {
        $this->renderAjax();
    }
    
    // validation ADD 
    public function saveTAC()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]', 'description' => 'required|max_length[200]',
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

    public function addEffTitle()
    {
        $codeTAC = $this->input->post('tac_code',true);
        $data['code_tac'] = $codeTAC;

        $this->renderAjax($data);
    }
    
    // validation ADD 
    public function saveTET()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]', 'description' => 'required|max_length[200]',
        'order' => 'required|is_natural_no_zero|max_length[40]');

        $codeTET = $form['code'];
        $codeTAC = $form['codetac'];
        //$TT = $form['training_type'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCode = $this->mdl->getTETDetail($codeTET);
    
            // If not exists, proceed add new record
            if (empty($recCode)) {
                // insert new record
                $insert = $this->mdl->insertTET($form);
                    
                if ($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
                // ------------------------------------
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record. Record with code '.$codeTET. ' already exists here or on another related record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
        // -------------------
         
        echo json_encode($json);
    }

    public function addTASEff()
    {
        $codeTAC = $this->input->post('codeTAC',true);
        $data['code_tac'] = $codeTAC;

        $this->renderAjax($data);
    }
    
    // validation ADD 
    public function saveTASEff()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('type' => 'max_length[20]', 'tas_category' => 'max_length[10]', 'order' => 'required|is_natural_no_zero|max_length[40]',
        'no_portal' => 'max_length[10]', 'no' => 'required|max_length[10]', 'description' => 'required|max_length[200]',
        'effectiveness_type' => 'required|max_length[20]', 'status' => 'required|max_length[1]');

        $codeTAS = $form['no'];
        //$TT = $form['training_type'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCode = $this->mdl->getTASEffDetail($codeTAS);
    
            // If not exists, proceed add new record
            if (empty($recCode)) {
                // insert new record
                $insert = $this->mdl->insertTASEff($form);
                    
                if ($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
                // ------------------------------------
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record. Record with No. '.$codeTAS.' already exists', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
        // -------------------
         
        echo json_encode($json);
    }

    public function addTASEff2()
    {
        $codeTET = $this->input->post('codeTET',true);
        $codeTAC = $this->input->post('codeTAC',true);

        if(!empty($codeTET) && !empty($codeTAC)){
            $data['code_tet'] = $codeTET;
            $data['code_tac'] = $codeTAC;
        }

        $this->renderAjax($data);
    }
    
    // validation ADD 
    public function saveTASEff2()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('type' => 'max_length[20]', 'tas_title' => 'max_length[10]', 'tas_category' => 'max_length[10]', 'order' => 'required|is_natural_no_zero|max_length[40]',
        'no_portal' => 'max_length[10]', 'no' => 'required|max_length[10]', 'description' => 'required|max_length[200]',
        'effectiveness_type' => 'required|max_length[20]', 'status' => 'required|max_length[1]');

        $codeTAS = $form['no'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCode = $this->mdl->getTASEffDetail($codeTAS);
    
            // If not exists, proceed add new record
            if (empty($recCode)) {
                // insert new record
                $insert = $this->mdl->insertTASEff2($form);
                    
                if ($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
                // ------------------------------------
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record. Record with No. '.$codeTAS.' already exists', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
        // -------------------
         
        echo json_encode($json);
    }

    /*_____________________
        DELETE PROCESS
    _____________________*/
    // call delete modal
    public function delTAC()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTAC = $this->post('codeTAC', true);
        
        // GET INFO FROM DB
        if (!empty($codeTAC) || $codeTAC==0) {
            $data['tac_code'] = $codeTAC;
            $data['tac_desc'] = $this->mdl->getTACDetail($codeTAC);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record 
    public function deleteTAC()
    {
        $this->isAjax();
        
        $codeTAC = $this->post('codeTAC', true);

        if (!empty($codeTAC)) {
            // Check whether record related to another table
            $recDel = $this->mdl->getTACDetailDel($codeTAC);
            $recDel2 = $this->mdl->getTACDetailDel2($codeTAC);
    
            // If not exists, proceed delete record
            if (empty($recDel) && empty($recDel2)) {
                $del = $this->mdl->deleteTACdb($codeTAC);
                
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }


        echo json_encode($json);
    }

    public function delTET()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTET = $this->post('tetCode', true);
        $codeTAC = $this->post('tacCode', true);
        
        // GET INFO FROM DB
        if (!empty($codeTET) || $codeTET==0) {
            $data['tet_code'] = $codeTET;
            $data['tet_desc'] = $this->mdl->getTETDetail($codeTET, $codeTAC);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record 
    public function deleteTET()
    {
        $this->isAjax();
        
        $codeTET = $this->post('tetCode', true);
        $codeTAC = $this->post('tacCode', true);

        if (!empty($codeTAC)) {
            // Check whether record related to another table
            $recDel = $this->mdl->getTETDetailDel($codeTET);
    
            // If not exists, proceed delete record
            if (empty($recDel)) {
                $del = $this->mdl->deleteTETdb($codeTET, $codeTAC);
                
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'FATAL ERROR!', 'alert' => 'danger');
        }


        echo json_encode($json);
    }

    public function delTASEff()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        //$tasType = $this->post('tas_type', true);
        $tasCode = $this->post('tas_code', true);
        //$tasCatCode = $this->post('tas_cat_code', true);
        
        // GET INFO FROM DB
        if (!empty($tasCode) || $tasCode==0) {
            //$data['tas_type'] = $tasType;
            $data['tas_code'] = $tasCode;
            //$data['tas_cat_code'] = $tasCatCode;
            $data['tas_desc'] = $this->mdl->getTASEffDetail($tasCode);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record 
    public function deleteTASEff()
    {
        $this->isAjax();
        
        $tasCode = $this->post('tas_code', true);
        $tasType = $this->post('tas_type', true);

        if (!empty($tasCode) && !empty($tasType) ) {
            // Check whether record related to another table
            $recDel = $this->mdl->getTASEffDetailDel($tasType);
    
            // If not exists, proceed delete record
            if (empty($recDel)) {
                $del = $this->mdl->deleteTASEffdb($tasCode, $tasType);
                
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'FATAL ERROR!', 'alert' => 'danger');
        }


        echo json_encode($json);
    }

    /*public function delTASEff2()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tasCode = $this->post('tas_code', true);
        
        // GET INFO FROM DB
        if (!empty($tasCode) || $tasCode==0) {
            $data['tas_code'] = $tasCode;
            $data['tas_desc'] = $this->mdl->getTASEffDetail($tasCode);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record 
    public function deleteTASEff2()
    {
        $this->isAjax();
        
        $tasCode = $this->post('tas_code', true);
        $tasType = $this->post('tas_type', true);

        if (!empty($tasCode) && !empty($tasType) ) {
            // Check whether record related to another table
            $recDel = $this->mdl->getTASEffDetailDel($tasType);
    
            // If not exists, proceed delete record
            if (empty($recDel)) {
                $del = $this->mdl->deleteTASEffdb($tasCode, $tasType);
                
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'FATAL ERROR!', 'alert' => 'danger');
        }


        echo json_encode($json);
    }*/

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    // Call edit modal
    public function editTAC()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTAC = $this->post('codeTAC', true);
        
        // GET INFO FROM DB
        if (!empty($codeTAC) || $codeTAC==0) {
            $data['tac_code'] = $codeTAC;
            $data['tac_desc'] = $this->mdl->getTACDetail($codeTAC);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE
    public function updateTAC()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTAC = $form['code'];
       
        // form / input validation
        $rule = array('description' => 'required|max_length[200]',
        'order' => 'required|is_natural_no_zero|max_length[40]', 'status' => 'required|max_length[10]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTAC($codeTAC, $form);
                
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

    public function editTET()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTET = $this->post('tetCode', true);
        $codeTAC = $this->post('tacCode', true);
        
        // GET INFO FROM DB
        if (!empty($codeTET) || $codeTET==0) {
            $data['tet_cat'] = $codeTAC;
            $data['tet_code'] = $codeTET;
            $data['tet_desc'] = $this->mdl->getTETDetail($codeTET, $codeTAC);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE
    public function updateTET()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTET = $form['code'];
        $codeTAC = $form['codetac'];
       
        // form / input validation
        $rule = array('description' => 'required|max_length[200]', 'order' => 'required|is_natural_no_zero|max_length[40]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTET($codeTET, $codeTAC, $form);
                
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

    public function editTASEff()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tasCode = $this->post('tas_code', true);
        
        // GET INFO FROM DB
        if (!empty($tasCode) || $tasCode==0) {
            $data['tas_code'] = $tasCode;
            $data['tas_desc'] = $this->mdl->getTASEffDetail($tasCode);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE
    public function updateTASEff()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $tasCode = $form['no'];
        $tasType = $form['type'];
       
        // form / input validation
        $rule = array('order' => 'required|is_natural_no_zero|max_length[40]',
        'no_portal' => 'max_length[10]', 'description' => 'required|max_length[200]',
        'effectiveness_type' => 'required|max_length[20]', 'status' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTASEff($tasCode, $tasType, $form);
                
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

    /*public function editTASEff2()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tasCode = $this->post('tas_code', true);
        
        // GET INFO FROM DB
        if (!empty($tasCode) || $tasCode==0) {
            $data['tas_code'] = $tasCode;
            $data['tas_desc'] = $this->mdl->getTASEffDetail($tasCode);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE
    public function updateTASEff2()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $tasCode = $form['no'];
        $tasType = $form['type'];
       
        // form / input validation
        $rule = array('order' => 'required|is_natural_no_zero|max_length[40]',
        'no_portal' => 'max_length[10]', 'description' => 'required|max_length[200]',
        'effectiveness_type' => 'required|max_length[20]', 'status' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTASEff($tasCode, $tasType, $form);
                
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
    }*/


    /*===========================================================
       Training Component
    =============================================================*/
    
    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addTMC()
    {
        $this->renderAjax();
    }
    
    public function saveTMC()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','description' => 'required|max_length[100]');

        $code_tmc = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recTRT = $this->mdl->getTMCDetail($code_tmc);
    
            // If not exists, proceed add new record
            if (empty($recTRT)) {
                // insert new record
                $insert = $this->mdl->insertTMC($form);
                    
                if ($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
                // ------------------------------------
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record. Record with code '.$code_tmc. ' already exists', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
        // -------------------
         
        echo json_encode($json);
    }

    /*_____________________
        DELETE PROCESS
    _____________________*/
    // call delete modal
    public function delTMC()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tmc_code = $this->post('codeTMC', true);
        
        // GET INFO FROM DB
        if (!empty($tmc_code) || $tmc_code==0) {
            $data['tmc_code'] = $tmc_code;
            $data['tmc_desc'] = $this->mdl->getTMCDetail($tmc_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTMC()
    {
        $this->isAjax();
        
        $tmc_code = $this->post('tmcCode', true);
        
        if (!empty($tmc_code)) {
            $del = $this->mdl->deleteTMCdb($tmc_code);
            
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

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    // Call edit modal 
    public function editTMC()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tmc_code = $this->post('codeTMC', true);
        
        // GET INFO FROM DB
        if (!empty($tmc_code) || $tmc_code==0) {
            $data['tmc_code'] = $tmc_code;
            $data['tmc_desc'] = $this->mdl->getTMCDetail($tmc_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE 
    public function updateTMC()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $code_tmc = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','description' => 'required|max_length[100]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTMC($code_tmc, $form);
                
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
       Training External Agency Setup
    =============================================================*/

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    public function editEAS()
    {
        $eas_no = $this->post('eas_no', true);
        $parm_code = $this->post('parm_code', true);
        
        // GET INFO FROM DB
        if (!empty($eas_no) && $parm_code=='EXTERNAL_MAX_DAY_APPL') {
            $data['eas_no'] = $eas_no;
            $data['eas_desc'] = $this->mdl->getExAgSetup($eas_no);
        } elseif (!empty($eas_no) && $parm_code=='EXTERNAL_URL') {
            $data['eas_no'] = $eas_no;
            $data['eas_desc'] = $this->mdl->getExAgSetupUrl($eas_no);
        }
         else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    public function updateEAS()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $eas_no = $form['eas_no'];
        $eas_type = $form['eas_code'];
       
        // form / input validation
        if ($eas_type=="EXTERNAL_MAX_DAY_APPL"){
            $rule = array('external_max_day_apply' => 'required|is_natural|max_length[3]');
        }
        if ($eas_type=="EXTERNAL_URL"){
            $rule = array('guideline_url' => 'required|valid_url|max_length[200]');
        }

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateEAS($eas_no, $form);
                
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
       TRAINING COMPETENCY LEVEL
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    // get training 
    public function trainingCompetencyLevel()
    {
        // get available records
        $data['tr_comp_lvl'] = $this->mdl->getTrComLvl();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    // call add modal
    public function addTCL()
    {
        $this->renderAjax();
    }
    
    // validation ADD 
    public function saveTCL()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','description' => 'required|max_length[100]','service_year_from' => 'is_natural|max_length[40]',
        'service_year_to' => 'is_natural|max_length[40]', 'ordering' => 'required|is_natural|max_length[40]','status' => 'required|max_length[1]');

        $codeTCL = $form['code'];
        //$TT = $form['training_type'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCode = $this->mdl->getTCLDetail($codeTCL);
            //$recTT = $this->mdl->getTTDetail($TT);
    
            // If not exists, proceed add new record
            if (empty($recCode)) {
                // insert new record
                $insert = $this->mdl->insertTCL($form);
                    
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

    /*_____________________
        DELETE PROCESS
    _____________________*/
    // call delete modal
    public function delTCL()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTCL = $this->post('codeTCL', true);
        
        // GET INFO FROM DB
        if (!empty($codeTCL) || $codeTCL==0) {
            $data['tcl_code'] = $codeTCL;
            $data['tcl_desc'] = $this->mdl->getTCLDetail($codeTCL);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record 
    public function deleteTCL()
    {
        $this->isAjax();
        
        $codeTCL = $this->post('codeTCL', true);
        
        if (!empty($codeTCL)) {
            $del = $this->mdl->deleteTCLdb($codeTCL);
            
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

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    // Call edit modal
    public function editTCL()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTCL = $this->post('codeTCL', true);
        
        // GET INFO FROM DB
        if (!empty($codeTCL) || $codeTCL==0) {
            $data['tcl_code'] = $codeTCL;
            $data['tcl_desc'] = $this->mdl->getTCLDetail($codeTCL);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE
    public function updateTCL()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTCL = $form['code'];
       
        // form / input validation
        $rule = array('description' => 'required|max_length[100]','service_year_from' => 'is_natural|max_length[40]',
        'service_year_to' => 'is_natural|max_length[40]', 'ordering' => 'required|is_natural|max_length[40]','status' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTCL($codeTCL, $form);
                
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
       TRAINING COST SETUP (TYPE)
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    // get training 
    public function costTypeSetup()
    {
        // get available records
        $data['tr_cost_st'] = $this->mdl->getTrCostSt();
        $data['tr_fee_st'] = $this->mdl->getTrFeeSt();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    // call add modal
    public function addCTS()
    {
        $this->renderAjax();
    }
    
    // validation ADD 
    public function saveCTS()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]', 'description' => 'required|max_length[100]', 'status' => 'required|max_length[1]');

        $codeTCS = $form['code'];
        //$TT = $form['training_type'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCode = $this->mdl->getTCSDetail($codeTCS);
            //$recTT = $this->mdl->getTTDetail($TT);
    
            // If not exists, proceed add new record
            if (empty($recCode)) {
                // insert new record
                $insert = $this->mdl->insertTCS($form);
                    
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

    /*_____________________
        DELETE PROCESS
    _____________________*/
    // call delete modal
    public function delCTS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTCS = $this->post('codeTCS', true);
        
        // GET INFO FROM DB
        if (!empty($codeTCS) || $codeTCS==0) {
            $data['tcs_code'] = $codeTCS;
            $data['tcs_desc'] = $this->mdl->getTCSDetail($codeTCS);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record 
    public function deleteCTS()
    {
        $this->isAjax();
        
        $codeTCS = $this->post('codeTCS', true);
        
        if (!empty($codeTCS)) {
            // Check whether record related to another table
            $delVal = $this->mdl->getTCSDelVal($codeTCS);
            $delVal2 = $this->mdl->getTCSDelVal2($codeTCS);
            if(empty($delVal) && empty($delVal2)){
                $del = $this->mdl->deleteTCSdb($codeTCS);
            
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist.', 'alert' => 'danger');
            }    
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);



        /*if (!empty($tl_code)) {
            // Check whether record related to another table
            $delVal = $this->mdl->getTLDelVal($tl_code);
            if(empty($delVal)){
                $del = $this->mdl->deleteTLdb($tl_code);
                
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }*/
    }

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    // Call edit modal
    public function editCTS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTCS = $this->post('codeTCS', true);
        
        // GET INFO FROM DB
        if (!empty($codeTCS) || $codeTCS==0) {
            $data['tcs_code'] = $codeTCS;
            $data['tcs_desc'] = $this->mdl->getTCSDetail($codeTCS);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE
    public function updateCTS()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTCS = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]', 'description' => 'required|max_length[100]', 'status' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTCS($codeTCS, $form);
                
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
       TRAINING COST SETUP (FEE CATEGORY)
    =============================================================*/

    /*_____________________
        ADD PROCESS
    _____________________*/
    // call add modal
    public function addTFS()
    {
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DM_DEPT_DESC', ' ---Please select--- ');

        $this->renderAjax($data);
    }
    
    // validation ADD 
    public function saveTFS()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]', 'description' => 'required|max_length[100]',
        'minimum_range' => 'required|numeric|max_length[10]', 'maximum_range' => 'required|numeric|max_length[10]',
        'dcr_approve' => 'max_length[10]', 'registrar_approve' => 'max_length[10]', 
        'mpe_approve' => 'required|max_length[1]', 'status' => 'required|max_length[1]');

        $codeTFS = $form['code'];
        //$TT = $form['training_type'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCode = $this->mdl->getTFSDetail($codeTFS);
            //$recTT = $this->mdl->getTTDetail($TT);
    
            // If not exists, proceed add new record
            if (empty($recCode)) {
                // insert new record
                $insert = $this->mdl->insertTFS($form);
                    
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

    public function detailTFS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTFS = $this->post('codeTFS', true);
        
        // GET INFO FROM DB
        if (!empty($codeTFS) || $codeTFS==0) {
            $data['tfs_code'] = $codeTFS;
            $data['tfs_desc'] = $this->mdl->getTFSDetail($codeTFS);
            $data['tfs_dept_full'] = $this->mdl->getTFSDeptFull($codeTFS);
            $data['tfs_dept_full2'] = $this->mdl->getTFSDeptFull2($codeTFS);

            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    /*_____________________
        DELETE PROCESS
    _____________________*/
    // call delete modal
    public function delTFS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTFS = $this->post('codeTFS', true);
        
        // GET INFO FROM DB
        if (!empty($codeTFS) || $codeTFS==0) {
            $data['tfs_code'] = $codeTFS;
            $data['tfs_desc'] = $this->mdl->getTFSDetail($codeTFS);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record 
    public function deleteTFS()
    {
        $this->isAjax();
        
        $codeTFS = $this->post('codeTFS', true);
        
        if (!empty($codeTFS)) {
            $del = $this->mdl->deleteTFSdb($codeTFS);
            
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

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    // Call edit modal
    public function editTFS()
    {
        $codeTFS = $this->post('codeTFS', true);
        $data['dept_list'] = $this->dropdown($this->mdl->getDeptList(), 'DM_DEPT_CODE', 'DM_DEPT_DESC', ' ---Please select--- ');
        
        // GET INFO FROM DB
        if (!empty($codeTFS) || $codeTFS==0) {
            $data['tfs_code'] = $codeTFS;
            $data['tfs_desc'] = $this->mdl->getTFSDetail($codeTFS);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE
    public function updateTFS()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTFS = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]', 'description' => 'required|max_length[100]',
        'minimum_range' => 'required|numeric|max_length[10]', 'maximum_range' => 'required|numeric|max_length[10]',
        'dcr_approve' => 'max_length[10]', 'registrar_approve' => 'max_length[10]', 
        'mpe_approve' => 'required|max_length[1]', 'status' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTFS($codeTFS, $form);
                
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
       Training Effectiveness Grading Setup
    =============================================================*/
    /*_____________________
        GET DETAILS
    _____________________*/
    // get training 
    public function effGraSetup($typeEGSVar = null)
    {
        $typeEGSP = $this->input->post('typeEGS', true);

        // default filter
        $typeEGSDef = 'EFFECTIVENESS';
        if (empty($typeEGSVar)){
            $typeEGS = $typeEGSDef;
        }

        // get parameter values
        if(!empty($typeEGSP)){
            $typeEGS = $this->input->post('typeEGS', true);
        } 
        /*if($typeEGSP == 'ALL'){
            $typeEGS = '';
        }*/

        // get available records
        $data['eff_gra_se'] = $this->mdl->getEffGraSetup($typeEGS);
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addEGS()
    {
        $this->renderAjax();
    }
    
    public function saveEGS()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('mark' => 'required|is_natural_no_zero|max_length[10]','description' => 'required|max_length[100]','type' => 'required|max_length[20]');

        $code_egs = $form['mark'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recTRT = $this->mdl->getEGSDetail($code_egs);
    
            // If not exists, proceed add new record
            if (empty($recTRT)) {
                // insert new record
                $insert = $this->mdl->insertEGS($form);
                    
                if ($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
                // ------------------------------------
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record. Record with mark '.$code_egs. ' already exists', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
        // -------------------
         
        echo json_encode($json);
    }

    /*_____________________
        DELETE PROCESS
    _____________________*/
    // call delete modal
    public function delEGS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $egs_code = $this->post('egsCode', true);
        
        // GET INFO FROM DB
        if (!empty($egs_code)) {
            $data['egs_code'] = $egs_code;
            $data['egs_desc'] = $this->mdl->getEGSDetail($egs_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteEGS()
    {
        $this->isAjax();
        
        $egs_code = $this->post('codeEGS', true);
        
        if (!empty($egs_code)) {
            $del = $this->mdl->deleteEGSdb($egs_code);
            
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

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    // Call edit modal 
    public function editEGS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $egs_code = $this->post('egsCode', true);
        
        // GET INFO FROM DB
        if (!empty($egs_code)) {
            $data['egs_code'] = $egs_code;
            $data['egs_desc'] = $this->mdl->getEGSDetail($egs_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE 
    public function updateEGS()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $code_egs = $form['mark'];
       
        // form / input validation
        $rule = array('description' => 'required|max_length[100]', 'type' => 'required|max_length[20]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateEGS($code_egs, $form);
                
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
       Training Memo for Participants
    =============================================================*/
    /*_____________________
        GET DETAILS
    _____________________*/
    // get training 
    public function trainingMemoPar()
    {
        // get available records
        $data['tr_mem_pr'] = $this->mdl->getTrainingMemoPar();
        $data['tr_mem_ev'] = $this->mdl->getTrainingMemoEva();
        
        $this->renderAjax($data);
    }

    public function detailTMP()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTMP = $this->post('codeTMP', true);
        $staffID = $this->post('staffID', true);
        
        // GET INFO FROM DB
        if (!empty($codeTMP)) {
            $data['tmp_code'] = $codeTMP;
            $data['tmp_desc'] = $this->mdl->getTMPDetail($codeTMP);
            $data['staff_desc'] = $this->mdl->getStaffFullName($staffID);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    public function detailTEM()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        //$codeTEM = $this->post('codeTEM', true);
        $staffID = $this->post('staffID', true);
        
        // GET INFO FROM DB
        //$data['tem_code'] = $codeTEM;
        $data['tem_desc'] = $this->mdl->getTrainingMemoEva();
        $data['staff_desc'] = $this->mdl->getStaffFullName($staffID);
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addTMP()
    {
        $data['staff_list'] = $this->dropdown($this->mdl->getStaffList(), 'SM_STAFF_ID', 'SM_STAFF_NAME', ' ---Please select--- ');
        $this->renderAjax($data);
    }
    
    public function saveTMP()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('module' => 'required|max_length[50]','address' => 'max_length[200]','link' => 'valid_url|max_length[80]',
        'email' => 'valid_email|max_length[100]','tel_no' => 'max_length[15]','fax_no' => 'max_length[15]','send_by' => 'required|max_length[100]',
        'status' => 'max_length[2]');

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            $insert = $this->mdl->insertTMP($form);
                
            if ($insert > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*_____________________
        DELETE PROCESS
    _____________________*/
    // call delete modal
    public function delTMP()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTMP = $this->post('codeTMP', true);
        $staffID = $this->post('staffID', true);
        
        // GET INFO FROM DB
        if (!empty($codeTMP)) {
            $data['tmp_code'] = $codeTMP;
            $data['tmp_desc'] = $this->mdl->getTMPDetail($codeTMP);
            $data['staff_desc'] = $this->mdl->getStaffFullName($staffID);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTMP()
    {
        $this->isAjax();
        
        $tmp_code = $this->post('codeTMP', true);
        
        if (!empty($tmp_code)) {
            $del = $this->mdl->deleteTMPdb($tmp_code);
            
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

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    // Call edit modal 
    public function editTMP()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTMP = $this->post('codeTMP', true);
        
        $data['staff_list'] = $this->dropdown($this->mdl->getStaffList(), 'SM_STAFF_ID', 'SM_STAFF_NAME', ' ---Please select--- ');
        
        // GET INFO FROM DB
        if (!empty($codeTMP)) {
            $data['tmp_code'] = $codeTMP;
            $data['tmp_desc'] = $this->mdl->getTMPDetail($codeTMP);
            
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    public function editTEM()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        //$codeTEM = $this->post('codeTEM', true);
        $staffID = $this->post('staffID', true);

        $data['staff_list'] = $this->dropdown($this->mdl->getStaffList(), 'SM_STAFF_ID', 'SM_STAFF_NAME', ' ---Please select--- ');
        
        // GET INFO FROM DB
        //$data['tem_code'] = $codeTEM;
        $data['tem_desc'] = $this->mdl->getTrainingMemoEva();
        $data['staff_desc'] = $this->mdl->getStaffFullName($staffID);
        
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTMP()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $code_tmp = $form['code'];
       
        // form / input validation
        $rule = array('module' => 'required|max_length[50]','address' => 'max_length[200]','link' => 'valid_url|max_length[80]',
        'email' => 'valid_email|max_length[100]','tel_no' => 'max_length[15]','fax_no' => 'max_length[15]','send_by' => 'required|max_length[100]',
        'status' => 'max_length[2]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTMP($code_tmp, $form);
                
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

    public function updateTEM()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        //$code_tmp = $form['code'];
       
        // form / input validation
        $rule = array('title' => 'max_length[200]','content' => 'required|max_length[4000]','send_by' => 'required|max_length[10]',
        'status' => 'max_length[2]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTEM($form);
                
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
