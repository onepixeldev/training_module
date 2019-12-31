<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_appl_setup_model extends MY_Model
{
    private $staff_id;

    public function __construct()
    {
        $this->load->database();
        $this->staff_id = $this->lib->userid();
    }
    
    /*=======================================================================
                            TRAINING PARAMETER SETUP
    =========================================================================*/
    /*=======================================================================
       TRAINING TYPE
    =========================================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    // list training type
    public function getTrainingTypeList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_TYPE');
        
        $this->db->order_by('TT_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record - training type
    public function getTTDetail($codeTT)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_TYPE');
        $this->db->where('TT_CODE', strtoupper($codeTT));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db - training type
    public function insertTT($form)
    {
        // set array data to be inserted
        $data = array(
            "TT_CODE" => strtoupper($form['code']),
            "TT_DESC" => strtoupper($form['training_type']),
            "TT_COUNTED" => $form['counted'],
            "TT_EVALUATION" => $form['training_evaluation'],
            "TT_CONFIRMATION" => $form['confirmation'],
            "TT_SERVICE_BOOK" => $form['service_book']
        );
        
        return $this->db->insert("TRAINING_TYPE", $data);
    }

    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db - training type
    public function deleteTTdb($codeTT)
    {
        $this->db->where('TT_CODE', $codeTT);
        return $this->db->delete('TRAINING_TYPE');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTT($codeTT, $form)
    {
        $data = array(
            "TT_DESC" => strtoupper($form['training_type']),
            "TT_COUNTED" => $form['counted'],
            "TT_EVALUATION" => $form['training_evaluation'],
            "TT_CONFIRMATION" => $form['confirmation'],
            "TT_SERVICE_BOOK" => $form['service_book']
        );
        
        $this->db->where("TT_CODE", $codeTT);
        
        return $this->db->update("TRAINING_TYPE", $data);
    }


    /*=======================================================================
       TRAINING CATEGORY
    =========================================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    // list training category
    public function getTrainingCategoryList($stTraining = null, $status=null)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_CATEGORY');

        if (!empty($stTraining)) {
            $this->db->where('TC_STRUCTURED', $stTraining);
        }

        if (!empty($status)) {
            $this->db->where('TC_STATUS', $status);
        }
        
        $this->db->order_by('TC_RANKING ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record - training type
    public function getTCDetail($categoryTC)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_CATEGORY');
        $this->db->where('TC_CATEGORY', strtoupper($categoryTC));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTC($form)
    {
        // set array data to be inserted
        $data = array(
            "TC_CATEGORY" => strtoupper($form['category']),
            "TC_CONFIRMATION" => $form['confirmation'],
            "TC_ELEMENT" => $form['element'],
            "TC_STRUCTURED" => $form['structured'],
            "TC_RANKING" => $form['sort_by'],
            "TC_STATUS" => $form['status']
        );
        
        return $this->db->insert("TRAINING_CATEGORY", $data);
    }

    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db - training type
    public function deleteTCdb($tc_cat)
    {
        $this->db->where('TC_CATEGORY', $tc_cat);
        return $this->db->delete('TRAINING_CATEGORY');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTC($categoryTC, $form)
    {
        $data = array(
            "TC_CONFIRMATION" => $form['confirmation'],
            "TC_ELEMENT" => $form['element'],
            "TC_STRUCTURED" => $form['structured'],
            "TC_RANKING" => $form['sort_by'],
            "TC_STATUS" => $form['status']
        );
        
        $this->db->where("TC_CATEGORY", $categoryTC);
        
        return $this->db->update("TRAINING_CATEGORY", $data);
    }


    /*===========================================================
        TRAINING LEVEL
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    // list training level
    public function getTrainingLevelList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_LEVEL');
        
        $this->db->order_by('TL_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record - training level
    public function getTLDetail($codeTL)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_LEVEL');
        $this->db->where('TL_CODE', strtoupper($codeTL));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTL($form)
    {
        // set array data to be inserted
        $data = array(
            "TL_CODE" => strtoupper($form['code']),
            "TL_DESC" => strtoupper($form['training_level']),
            "TL_DESC_ENG" => strtoupper($form['training_level_english'])
        );
        
        return $this->db->insert("TRAINING_LEVEL", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db - training type
    public function deleteTLdb($tl_code)
    {
        $this->db->where('TL_CODE', $tl_code);
        return $this->db->delete('TRAINING_LEVEL');
    }
}
