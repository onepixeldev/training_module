<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_parameter_setup extends MY_Controller
{
    private $staff_id;

    public function __construct()
    {
        parent::__construct();
        //$this->loadModel('mdl');
        $this->load->model('Training_parameter_setup_model', 'mdl');
        $this->staff_id = $this->lib->userid();
    }

    // View MAIN Page
    public function index()
    {
        // clear filter
        $this->session->set_userdata('tabID', '');

        // training category clear filter
        $this->session->set_userdata('sTraining', '');
        $this->session->set_userdata('trSts', '');

        // training Assessment setup flear filter
        $this->session->set_userdata('aSts', '');

        $this->redirect($this->class_uri('viewPS'));
    }

    /*===========================================================
       Training Parameter Setup VIEW && TAB FILTER
    =============================================================*/

    public function viewPS($stTraining = null, $sSts = null, $aSt = null)
    {
        // filter structured training - training category list
        if (empty($stTraining)) {
            if (!empty($this->session->sTraining)) {
                $stTraining = $this->session->sTraining;
            }
        }
        $data['default_stt'] = $stTraining;

        // filter status - training category list
        if (empty($sSts)) {
            if (!empty($this->session->trSts)) {
                $sSts = $this->session->trSts;
            }
        }
        $data['default_sts'] = $sSts;

        // filter Assessment Setup Type - Assessment Setup list
        if (empty($aSt)) {
            if (!empty($this->session->aSts)) {
                $aSt = $this->session->aSts;
            }
        }
        $data['default_ast'] = $aSt;

        $this->render($data);
    }

    // View Page Filter
    public function viewTabFilter($tabID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        redirect($this->class_uri('viewPS'));
    }

    /*===========================================================
       TRAINING TYPE
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    // get training type list
    public function trainingTypeList()
    {
        //$search = null;
        
        // get available records
        $data['training_type_list'] = $this->mdl->getTrainingTypeList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    // call add modal - training type
    public function addTrainingType()
    {
        $this->renderAjax();
    }
    
    // validation ADD - training type
    public function saveTT()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','training_type' => 'required|max_length[100]','counted' => 'required|max_length[1]',
        'training_evaluation' => 'required|max_length[1]', 'confirmation' => 'required|max_length[1]','service_book' => 'required|max_length[1]');

        $codeTT = $form['code'];
        //$TT = $form['training_type'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCodeTT = $this->mdl->getTTDetail($codeTT);
            //$recTT = $this->mdl->getTTDetail($TT);
    
            // If not exists, proceed add new record
            if (empty($recCodeTT)) {
                // insert new record
                $insert = $this->mdl->insertTT($form);
                    
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
    // call delete modal - Training Type
    public function delTT()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $codeTT = $this->post('codeTT', true);
        
        // GET INFO FROM DB
        if (!empty($codeTT) || $codeTT==0) {
            $data['tt_code'] = $codeTT;
            $data['tt_desc'] = $this->mdl->getTTDetail($codeTT);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record - Training Type
    public function deleteTT()
    {
        $this->isAjax();
        
        $codeTT = $this->post('codeTT', true);
        
        if (!empty($codeTT)) {
            $del = $this->mdl->deleteTTdb($codeTT);
            
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
    // Call edit modal - training type
    public function editTT()
    {
        $codeTT = $this->post('codeTT', true);
        
        // GET INFO FROM DB
        if (!empty($codeTT) || $codeTT==0) {
            $data['tt_code'] = $codeTT;
            $data['tt_desc'] = $this->mdl->getTTDetail($codeTT);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE - training type
    public function updateTT()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTT = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','training_type' => 'required|max_length[100]','counted' => 'required|max_length[1]',
        'training_evaluation' => 'required|max_length[1]', 'confirmation' => 'required|max_length[1]','service_book' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTT($codeTT, $form);
                
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
       TRAINING CATEGORY
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingCategoryList()
    {
        // get parameter values
        $stt = $this->input->post('trStr', true);
        $sts = $this->input->post('trSts', true);

        // get available records
        $data['training_category_list'] = $this->mdl->getTrainingCategoryList($stt, $sts);
        
        $this->renderAjax($data);
    }
    
    
    /*_____________________
        ADD PROCESS
    _____________________*/
    // call add modal 
    public function addTrainingCategory()
    {
        $this->renderAjax();
    }
    
    // validation ADD 
    public function saveTC()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('category' => 'required|max_length[200]','confirmation' => 'required|max_length[1]',
        'element' => 'required|max_length[100]','structured' => 'required|max_length[1]', 'sort_by' => 'required|is_natural_no_zero|max_length[100]',
        'status' => 'required|max_length[1]');

        $categoryTC = $form['category'];
        //$TT = $form['training_type'];
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCodeTT = $this->mdl->getTCDetail($categoryTC);
            //$recTT = $this->mdl->getTTDetail($TT);
    
            // If not exists, proceed add new record
            if (empty($recCodeTT)) {
                // insert new record
                $insert = $this->mdl->insertTC($form);
                    
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
    public function delTC()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tc_cat = $this->post('tc_cat', true);
        
        // GET INFO FROM DB
        if (!empty($tc_cat) || $tc_cat==0) {
            $data['tc_cat'] = $tc_cat;
            $data['tc_desc'] = $this->mdl->getTCDetail($tc_cat);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTC()
    {
        $this->isAjax();
        
        $tc_cat = $this->post('categoryTC', true);
        
        if (!empty($tc_cat)) {
            $del = $this->mdl->deleteTCdb($tc_cat);
            
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
    public function editTC()
    {
        $categoryTC = $this->post('tc_cat', true);
        
        // GET INFO FROM DB
        if (!empty($categoryTC) || $categoryTC==0) {
            $data['tc_cat'] = $categoryTC;
            $data['tc_desc'] = $this->mdl->getTCDetail($categoryTC);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE
    public function updateTC()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $categoryTC = $form['category'];
       
        // form / input validation
        $rule = array('category' => 'required|max_length[200]','confirmation' => 'required|max_length[1]',
        'element' => 'required|max_length[100]','structured' => 'required|max_length[1]', 'sort_by' => 'required|is_natural_no_zero|max_length[100]',
        'status' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTC($categoryTC, $form);
                
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
        TRAINING LEVEL
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingLevelList()
    {
        // get available records
        $data['training_level_list'] = $this->mdl->getTrainingLevelList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addTrainingLevel()
    {
        $this->renderAjax();
    }
    
    public function saveTL()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','training_level' => 'required|max_length[100]','training_level_english' => 'max_length[100]');

        $codeTL = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCodeTL = $this->mdl->getTLDetail($codeTL);
    
            // If not exists, proceed add new record
            if (empty($recCodeTL)) {
                // insert new record
                $insert = $this->mdl->insertTL($form);
                    
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
    public function delTL()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tl_code = $this->post('codeTL', true);
        
        // GET INFO FROM DB
        if (!empty($tl_code) || $tl_code==0) {
            $data['tl_code'] = $tl_code;
            $data['tl_desc'] = $this->mdl->getTLDetail($tl_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTL()
    {
        $this->isAjax();
        
        $tl_code = $this->post('codeTL', true);
        
        if (!empty($tl_code)) {
            $del = $this->mdl->deleteTLdb($tl_code);
            
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
    public function editTL()
    {
        $codeTL = $this->post('codeTL', true);
        
        // GET INFO FROM DB
        if (!empty($codeTL) || $codeTL==0) {
            $data['tl_code'] = $codeTL;
            $data['tl_desc'] = $this->mdl->getTLDetail($codeTL);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTL()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTL = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','training_level' => 'required|max_length[100]','training_level_english' => 'max_length[100]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTL($codeTL, $form);
                
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
        TRAINING SPONSOR LEVEL
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingSponsorList()
    {
        // get available records
        $data['training_sponsor_list'] = $this->mdl->getTrainingSponsorList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addSponsorLevel()
    {
        $this->renderAjax();
    }
    
    public function saveTSL()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','sponsor_level' => 'required|max_length[100]');

        $codeTSL = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCodeTL = $this->mdl->getTSLDetail($codeTSL);
    
            // If not exists, proceed add new record
            if (empty($recCodeTL)) {
                // insert new record
                $insert = $this->mdl->insertTSL($form);
                    
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
    public function delTSL()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tsl_code = $this->post('codeTSL', true);
        
        // GET INFO FROM DB
        if (!empty($tsl_code) || $tsl_code==0) {
            $data['tsl_code'] = $tsl_code;
            $data['tsl_desc'] = $this->mdl->getTSLDetail($tsl_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTSL()
    {
        $this->isAjax();
        
        $tsl_code = $this->post('codeTSL', true);
        
        if (!empty($tsl_code)) {
            $del = $this->mdl->deleteTSLdb($tsl_code);
            
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
    public function editTSL()
    {
        $codeTSL = $this->post('codeTSL', true);
        
        // GET INFO FROM DB
        if (!empty($codeTSL) || $codeTSL==0) {
            $data['tsl_code'] = $codeTSL;
            $data['tsl_desc'] = $this->mdl->getTSLDetail($codeTSL);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTSL()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTSL = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','sponsor_level' => 'required|max_length[100]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTSL($codeTSL, $form);
                
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
        TRAINING ORGANIZER LEVEL
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingOrganizerLevelList()
    {
        // get available records
        $data['training_organizer_level_list'] = $this->mdl->getTrainingOrganizerLevelList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addOrganizerLevel()
    {
        $this->renderAjax();
    }
    
    public function saveTOL()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','organizer_level' => 'required|max_length[100]');

        $codeTOL = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCodeTOL = $this->mdl->getTOLDetail($codeTOL);
    
            // If not exists, proceed add new record
            if (empty($recCodeTOL)) {
                // insert new record
                $insert = $this->mdl->insertTOL($form);
                    
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
    public function delTOL()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tol_code = $this->post('codeTOL', true);
        
        // GET INFO FROM DB
        if (!empty($tol_code) || $tol_code==0) {
            $data['tol_code'] = $tol_code;
            $data['tol_desc'] = $this->mdl->getTOLDetail($tol_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTOL()
    {
        $this->isAjax();
        
        $tol_code = $this->post('codeTOL', true);
        
        if (!empty($tol_code)) {
            $del = $this->mdl->deleteTOLdb($tol_code);
            
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
    public function editTOL()
    {
        $codeTOL = $this->post('codeTOL', true);
        
        // GET INFO FROM DB
        if (!empty($codeTOL) || $codeTOL==0) {
            $data['tol_code'] = $codeTOL;
            $data['tol_desc'] = $this->mdl->getTOLDetail($codeTOL);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE
    public function updateTOL()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTOL = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','organizer_level' => 'required|max_length[100]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTOL($codeTOL, $form);
                
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
        TRAINING PARTICIPANT ROLE
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingParticipantRoleList()
    {
        // get available records
        $data['training_participant_role_list'] = $this->mdl->getTrainingParticipantRoleList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addParticipantRole()
    {
        $this->renderAjax();
    }
    
    public function saveTPR()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','participant_role' => 'required|max_length[100]','sort_order' => 'required|is_natural_no_zero',
        'cpd_counted_nacad' => 'required|max_length[1]','cpd_counted_acad' => 'required|max_length[1]','display_training' => 'required|max_length[1]',
        'display_conference' => 'required|max_length[1]');

        $codeTPR = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCodeTPR = $this->mdl->getTPRDetail($codeTPR);
    
            // If not exists, proceed add new record
            if (empty($recCodeTPR)) {
                // insert new record
                $insert = $this->mdl->insertTPR($form);
                    
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
    public function delTPR()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tpr_code = $this->post('codeTPR', true);
        
        // GET INFO FROM DB
        if (!empty($tpr_code) || $tpr_code==0) {
            $data['tpr_code'] = $tpr_code;
            $data['tpr_desc'] = $this->mdl->getTPRDetail($tpr_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTPR()
    {
        $this->isAjax();
        
        $tpr_code = $this->post('codeTPR', true);
        
        if (!empty($tpr_code)) {
            $del = $this->mdl->deleteTPRdb($tpr_code);
            
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
    public function editTPR()
    {
        $codeTPR = $this->post('codeTPR', true);
        
        // GET INFO FROM DB
        if (!empty($codeTPR) || $codeTPR==0) {
            $data['tpr_code'] = $codeTPR;
            $data['tpr_desc'] = $this->mdl->getTPRDetail($codeTPR);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTPR()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTPR = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','participant_role' => 'required|max_length[100]','sort_order' => 'required|is_natural_no_zero',
        'cpd_counted_nacad' => 'required|max_length[1]','cpd_counted_acad' => 'required|max_length[1]','display_training' => 'required|max_length[1]',
        'display_conference' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTPR($codeTPR, $form);
                
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
        TRAINING PARTICIPANT STATUS
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingParticipantStatusList()
    {
        // get available records
        $data['training_participant_status_list'] = $this->mdl->getTrainingParticipantStatusList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addParticipantStatus()
    {
        $this->renderAjax();
    }
    
    public function saveTPS()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','participant_status' => 'required|max_length[100]');

        $codeTPS = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCodeTPS = $this->mdl->getTPSDetail($codeTPS);
    
            // If not exists, proceed add new record
            if (empty($recCodeTPS)) {
                // insert new record
                $insert = $this->mdl->insertTPS($form);
                    
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
    public function delTPS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tps_code = $this->post('codeTPS', true);
        
        // GET INFO FROM DB
        if (!empty($tps_code) || $tps_code==0) {
            $data['tps_code'] = $tps_code;
            $data['tps_desc'] = $this->mdl->getTPSDetail($tps_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTPS()
    {
        $this->isAjax();
        
        $tps_code = $this->post('codeTPS', true);
        
        if (!empty($tps_code)) {
            $del = $this->mdl->deleteTPSdb($tps_code);
            
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
    public function editTPS()
    {
        $codeTPS = $this->post('codeTPS', true);
        
        // GET INFO FROM DB
        if (!empty($codeTPS) || $codeTPS==0) {
            $data['tps_code'] = $codeTPS;
            $data['tps_desc'] = $this->mdl->getTPSDetail($codeTPS);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTPS()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTPS = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','participant_status' => 'required|max_length[100]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTPS($codeTPS, $form);
                
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
        TRAINING SECTOR LEVEL
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingSectorLevelList()
    {
        // get available records
        $data['training_sector_level_list'] = $this->mdl->getTrainingSectorLevelList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addSectorLevel()
    {
        $this->renderAjax();
    }
    
    public function saveTSECL()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','sector_level' => 'required|max_length[100]','sector_level_status' => 'required|max_length[1]');

        $codeTSECL = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recCodeTSECL = $this->mdl->getTSECLDetail($codeTSECL);
    
            // If not exists, proceed add new record
            if (empty($recCodeTSECL)) {
                // insert new record
                $insert = $this->mdl->insertTSECL($form);
                    
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
    public function delTSECl()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tsecl_code = $this->post('codeTSECL', true);
        
        // GET INFO FROM DB
        if (!empty($tsecl_code) || $tsecl_code==0) {
            $data['tsecl_code'] = $tsecl_code;
            $data['tsecl_desc'] = $this->mdl->getTSECLDetail($tsecl_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTSECL()
    {
        $this->isAjax();
        
        $codeTSECL = $this->post('codeTSECL', true);
        
        if (!empty($codeTSECL)) {
            $del = $this->mdl->deleteTSECLdb($codeTSECL);
            
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
    public function editTSECL()
    {
        $codeTSECL = $this->post('codeTSECL', true);
        
        // GET INFO FROM DB
        if (!empty($codeTSECL) || $codeTSECL==0) {
            $data['tsecl_code'] = $codeTSECL;
            $data['tsecl_desc'] = $this->mdl->getTSECLDetail($codeTSECL);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTSECL()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTSECL = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','sector_level' => 'required|max_length[100]','sector_level_status' => 'required|max_length[1]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTSECL($codeTSECL, $form);
                
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
        TRAINING REMARK SETUP
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingRemarkSetupList()
    {
        // get available records
        $data['training_remark_setup_list'] = $this->mdl->getTrainingRemarkSetupList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addRemarkSetup()
    {
        $this->renderAjax();
    }
    
    public function saveRS()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('no' => 'required|is_natural_no_zero|max_length[40]','remark' => 'required|max_length[50]','module' => 'max_length[50]');

        $no_seq = $form['no'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recRS = $this->mdl->getRSDetail($no_seq);
    
            // If not exists, proceed add new record
            if (empty($recRS)) {
                // insert new record
                $insert = $this->mdl->insertRS($form);
                    
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
    public function delRS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $trs_seq = $this->post('trsSEQ', true);
        
        // GET INFO FROM DB
        if (!empty($trs_seq) || $trs_seq==0) {
            $data['trs_seq'] = $trs_seq;
            $data['trs_desc'] = $this->mdl->getRSDetail($trs_seq);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteRS()
    {
        $this->isAjax();
        
        $trs_seq = $this->post('trsSEQ', true);
        
        if (!empty($trs_seq)) {
            $del = $this->mdl->deleteRSdb($trs_seq);
            
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
    public function editRS()
    {
        $trs_seq = $this->post('trsSEQ', true);
        
        // GET INFO FROM DB
        if (!empty($trs_seq) || $trs_seq==0) {
            $data['trs_seq'] = $trs_seq;
            $data['trs_desc'] = $this->mdl->getRSDetail($trs_seq);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateRS()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $no_seq = $form['no'];
       
        // form / input validation
        $rule = array('no' => 'required|is_natural_no_zero|max_length[40]','remark' => 'required|max_length[50]','module' => 'max_length[50]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateRS($no_seq, $form);
                
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
        TRAINING ATTENDANCE STATUS
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingAttendanceStatusList()
    {
        // get available records
        $data['training_attendance_status_list'] = $this->mdl->getTrainingAttendanceStatusList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addAttendanceStatus()
    {
        $this->renderAjax();
    }
    
    public function saveTAS()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[10]','attendance_status' => 'required|max_length[100]');

        $code_tas = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recTAS = $this->mdl->getTASDetail($code_tas);
    
            // If not exists, proceed add new record
            if (empty($recTAS)) {
                // insert new record
                $insert = $this->mdl->insertTAS($form);
                    
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
    public function delTAS()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tas_code = $this->post('tasCode', true);
        
        // GET INFO FROM DB
        if (!empty($tas_code) || $tas_code==0) {
            $data['tas_code'] = $tas_code;
            $data['tas_desc'] = $this->mdl->getTASDetail($tas_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTAS()
    {
        $this->isAjax();
        
        $tas_code = $this->post('tasCode', true);
        
        if (!empty($tas_code)) {
            $del = $this->mdl->deleteTASdb($tas_code);
            
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
    public function editTAS()
    {
        $tas_code = $this->post('tasCode', true);
        
        // GET INFO FROM DB
        if (!empty($tas_code) || $tas_code==0) {
            $data['tas_code'] = $tas_code;
            $data['tas_desc'] = $this->mdl->getTASDetail($tas_code);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTAS()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $code_tas = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[10]','attendance_status' => 'required|max_length[100]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTAS($code_tas, $form);
                
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
        TRAINING ASSESSMENT SETUP
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingAssessmentSetupView()
    {
        $sts = $this->input->post('aSts', true);

        // get available records
        $data['training_assessment_setup_view'] = $this->mdl->getTrainingAssessmentSetupList($sts);
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addTrainingAssessmentSetup()
    {
        $this->renderAjax();
    }
    
    public function saveTASV()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('type' => 'required|max_length[20]','order' => 'required|is_natural_no_zero|max_length[30]',
        'code' => 'required|max_length[8]','description' => 'required|max_length[200]', 
        'assessment_type' => 'required|max_length[20]');

        $code_tasv = $form['code'];
        $type_tasv = $form['type'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recTASV = $this->mdl->getTASVDetail($code_tasv, $type_tasv);
    
            // If not exists, proceed add new record
            if (empty($recTASV)) {
                // insert new record
                $insert = $this->mdl->insertTASV($form);
                    
                if ($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
                // ------------------------------------
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record. Record with code '.$code_tasv.' already exists', 'alert' => 'danger');
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
    public function delTASV()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tasv_type = $this->post('tasv_type', true);
        $tasv_code = $this->post('tasv_code', true);
        
        // GET INFO FROM DB
        if (!empty($tasv_code) && !empty($tasv_type)) {
            $data['tasv_code'] = $tasv_code;
            $data['tasv_desc'] = $this->mdl->getTASVDetail($tasv_code, $tasv_type);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTASV()
    {
        $this->isAjax();
        
        $tasv_code = $this->post('codeTASV', true);
        $tasv_type = $this->post('typeTASV', true);

        if (!empty($tasv_code) && !empty($tasv_type)) {
            // Check whether record related to another table
            $recTASV = $this->mdl->getTASVVerDetail($tasv_code, $tasv_type);
    
            // If not exists, proceed delete record
            if (!empty($tasv_code) && !empty($tasv_type) && empty($recTASV)) {
                $del = $this->mdl->deleteTASVdb($tasv_code, $tasv_type);
                
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

    /*_____________________
        UPDATE PROCESS
    _____________________*/
    // Call edit modal 
    public function editTASV()
    {
        $tasv_type = $this->post('tasv_type', true);
        $tasv_code = $this->post('tasv_code', true);
        
        // GET INFO FROM DB
        if (!empty($tasv_code) && !empty($tasv_type)) {
            $data['tasv_code'] = $tasv_code;
            $data['tasv_desc'] = $this->mdl->getTASVDetail($tasv_code, $tasv_type);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTASV()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $code_tasv = $form['code'];
        $type_tasv = $form['type'];
       
        // form / input validation
        $rule = array('type' => 'required|max_length[20]','order' => 'required|is_natural_no_zero|max_length[30]',
        'code' => 'required|max_length[8]','description' => 'required|max_length[200]', 
        'assessment_type' => 'required|max_length[20]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTASV($code_tasv, $type_tasv, $form);
                
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

    /*_____________________________________________
        GRADING SETUP
    _______________________________________________*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function gradingList()
    {
        $assessmentType = $this->input->post('tg_type',true);
        // get available records
        $data['tg_type'] = $assessmentType;
        $data['training_grading_list'] = $this->mdl->getTrainingGradingList($assessmentType);
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addTrainingGrading()
    {
        $assessmentType = $this->input->post('tg_type',true);
        $data['tg_type'] = $assessmentType;

        $this->renderAjax($data);
    }
    
    public function saveTG()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('type' => 'max_length[20]','mark' => 'required|is_natural_no_zero','grading_description' => 'required|max_length[100]');

        $type_tg = $form['type'];
        $code_tg = $form['mark'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recTG = $this->mdl->getTGDetail($code_tg, $type_tg);
    
            // If not exists, proceed add new record
            if (empty($recTG)) {
                // insert new record
                $insert = $this->mdl->insertTG($form);
                    
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
    public function delTG()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tg_code = $this->post('tg_code', true);
        $tg_type = $this->post('tg_type', true);
        
        // GET INFO FROM DB
        if (!empty($tg_code) && !empty($tg_type)) {
            $data['tg_code'] = $tg_code;
            $data['tg_type'] = $tg_type;
            $data['tg_desc'] = $this->mdl->getTGDetail($tg_code, $tg_type);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTG()
    {
        $this->isAjax();
        
        $tg_code = $this->post('tg_code', true);
        $tg_type = $this->post('tg_type', true);
        
        if (!empty($tg_code) && !empty($tg_type)) {
            $del = $this->mdl->deleteTGdb($tg_code, $tg_type);
            
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
    public function editTG()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $tg_code = $this->post('tg_code', true);
        $tg_type = $this->post('tg_type', true);
        
        // GET INFO FROM DB
        if (!empty($tg_code) && !empty($tg_type)) {
            $data['tg_code'] = $tg_code;
            $data['tg_type'] = $tg_type;
            $data['tg_desc'] = $this->mdl->getTGDetail($tg_code, $tg_type);
            
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // VALIDATION UPDATE 
    public function updateTG()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $type_tg = $form['type'];
        $code_tg = $form['mark'];
       
        // form / input validation
        $rule = array('type' => 'max_length[20]','mark' => 'required|is_natural_no_zero','grading_description' => 'required|max_length[100]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTG($code_tg, $type_tg, $form);
                
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
        TRAINING REQUIREMENT TYPE
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingRequirementTypeList()
    {
        // get available records
        $data['training_requirement_type_list'] = $this->mdl->getTrainingRequirementTypeList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addTrainingRequirementType()
    {
        $this->renderAjax();
    }
    
    public function saveTRT()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[20]','requirement_type' => 'required|max_length[100]');

        $code_trt = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recTRT = $this->mdl->getTRTDetail($code_trt);
    
            // If not exists, proceed add new record
            if (empty($recTRT)) {
                // insert new record
                $insert = $this->mdl->insertTRT($form);
                    
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
    public function delTRT()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $trt_code = $this->post('trtCode', true);
        
        // GET INFO FROM DB
        if (!empty($trt_code) || $trt_code==0) {
            $data['trt_code'] = $trt_code;
            $data['trt_desc'] = $this->mdl->getTRTDetail($trt_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTRT()
    {
        $this->isAjax();
        
        $trt_code = $this->post('trtCode', true);
        
        if (!empty($trt_code)) {
            $del = $this->mdl->deleteTRTdb($trt_code);
            
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
    public function editTRT()
    {
        $trt_code = $this->post('trtCode', true);
        
        // GET INFO FROM DB
        if (!empty($trt_code) || $trt_code==0) {
            $data['trt_code'] = $trt_code;
            $data['trt_desc'] = $this->mdl->getTRTDetail($trt_code);
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTRT()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $code_trt = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[20]','requirement_type' => 'required|max_length[100]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTRT($code_trt, $form);
                
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
        TRAINING ORGANIZER INFO
    =============================================================*/

    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingOrganizerHeadList()
    {
        // get available records
        $data['training_organizer_head'] = $this->mdl->getTrainingOrganizerHeadList();
        //$data['training_organizer_head'] = $this->mdl->getTrainingOrganizerHeadList();
        
        $this->renderAjax($data);
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addTrainingOrganizerHead()
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
    
    public function saveTOH()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('code' => 'required|max_length[20]','description' => 'required|max_length[100]','address' => 'max_length[200]',
        'postcode' => 'max_length[10]', 'city' => 'max_length[100]', 'country' => 'required|max_length[10]',
        'state' => 'max_length[10]', 'external_agency' => 'required|max_length[1]');

        $code_toh = $form['code'];

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);
        // ------------------------------------

        // Begin Insert New Record
        if ($status == 1) {
            // Check whether record already exists
            $recTOH = $this->mdl->getTOHDetail($code_toh);
    
            // If not exists, proceed add new record
            if (empty($recTOH)) {
                // insert new record
                $insert = $this->mdl->insertTOH($form);
                    
                if ($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
                // ------------------------------------
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record. Record with code '.$code_toh.' already exists', 'alert' => 'danger');
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
    public function delTOH()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $toh_code = $this->post('codeTOH', true);
        
        // GET INFO FROM DB
        if (!empty($toh_code) || $toh_code==0) {
            $data['toh_code'] = $toh_code;
            $data['toh_desc'] = $this->mdl->getTOHDetail($toh_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
    }

    // Begin delete record
    public function deleteTOH()
    {
        $this->isAjax();
        
        $toh_code = $this->post('codeTOH', true);
        
        if (!empty($toh_code)) {
            $del = $this->mdl->deleteTOHdb($toh_code);
            
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
    public function editTOH()
    {
        $countCode = $this->input->post('countryCode',true);

        $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');

        $country_list = $this->post('country');

        $toh_code = $this->post('codeTOH', true);
        
        // GET INFO FROM DB
        if (!empty($toh_code) || $toh_code==0) {
            $data['toh_code'] = $toh_code;
            $data['toh_desc'] = $this->mdl->getTOHDetail($toh_code);
            if (!empty($data['toh_desc']->TOH_COUNTRY)) {
                $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($data['toh_desc']->TOH_COUNTRY), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
            } else {
                $data['state_list'] = '';
            }
        } else {
            echo 'Invalid Request.';
        }
        //sleep(3);
        $this->renderAjax($data);
    }

    // VALIDATION UPDATE 
    public function updateTOH()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $code_toh = $form['code'];
       
        // form / input validation
        $rule = array('code' => 'required|max_length[20]','description' => 'required|max_length[100]','address' => 'max_length[200]',
        'postcode' => 'max_length[10]', 'city' => 'max_length[100]', 'country' => 'required|max_length[10]',
        'state' => 'max_length[10]');
        
        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Update Record
        if ($status == 1) {
            // Begin Update Record
            $update = $this->mdl->saveUpdateTOH($code_toh, $form);
                
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

    // more details
    public function detailTOH()
    {
        // ASSIGN TO POST DATA FROM JQUERY FUNCTION
        $toh_code = $this->post('codeTOH', true);
        
        // GET INFO FROM DB
        if (!empty($toh_code) || $toh_code==0) {
            $data['toh_code'] = $toh_code;
            $data['toh_desc'] = $this->mdl->getTOHDetail($toh_code);
            $data['toh_s'] = $this->mdl->getTOHDetailSDesc($toh_code);
            $data['toh_c'] = $this->mdl->getTOHDetailCDesc($toh_code);
            
            //sleep(3);
            $this->renderAjax($data);
        } else {
            echo 'Invalid Request.';
        }
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
}
