<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_appl_setup extends MY_Controller
{
    private $staff_id;

    public function __construct()
    {
        parent::__construct();
        //$this->loadModel('mdl');
        $this->load->model('Training_appl_setup_model', 'mdl');
        $this->staff_id = $this->lib->userid();
    }

    // View MAIN Page
    public function index()
    {
        // clear filter
        $this->session->set_userdata('tabID', '');
        $this->session->set_userdata('sTraining', '');
        $this->session->set_userdata('trSts', '');

        $this->redirect($this->class_uri('viewPS'));
    }

    /*===========================================================
       Training Parameter Setup VIEW && TAB FILTER
    =============================================================*/

    public function viewPS($stTraining = null, $sSts = null)
    {
        if (empty($stTraining)) {
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
        $rule = array('code' => 'required|max_length[10]','training_type' => 'required|max_length[100]','counted' => 'max_length[1]',
        'training_evaluation' => 'max_length[1]', 'confirmation' => 'max_length[1]','service_book' => 'max_length[1]');

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
        $rule = array('code' => 'required|max_length[10]','training_type' => 'required|max_length[100]','counted' => 'max_length[1]',
        'training_evaluation' => 'max_length[1]', 'confirmation' => 'max_length[1]','service_book' => 'max_length[1]');
        
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
    // get training category list
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
    // call add modal - training category
    public function addTrainingCategory()
    {
        $this->renderAjax();
    }
    
    // validation ADD - training category
    public function saveTC()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // form / input validation
        $rule = array('category' => 'required|max_length[200]','confirmation' => 'max_length[1]',
        'element' => 'max_length[100]','structured' => 'max_length[1]', 'sort_by' => 'is_natural_no_zero|max_length[100]',
        'status' => 'max_length[1]');

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
    // Call edit modal - training type
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

    // VALIDATION UPDATE - training type
    public function updateTC()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $categoryTC = $form['category'];
       
        // form / input validation
        $rule = array('category' => 'required|max_length[200]','confirmation' => 'max_length[1]',
        'element' => 'max_length[100]','structured' => 'max_length[1]', 'sort_by' => 'max_length[100]',
        'status' => 'max_length[1]');
        
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
    // get training level list
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
    // Call edit modal - training type
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

    // VALIDATION UPDATE - training type
    public function updateTL()
    {
        $this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);
        $codeTL = $form['category'];
       
        // form / input validation
        $rule = array('category' => 'required|max_length[200]','confirmation' => 'max_length[1]',
        'element' => 'max_length[100]','structured' => 'max_length[1]', 'sort_by' => 'max_length[100]',
        'status' => 'max_length[1]');
        
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
}
