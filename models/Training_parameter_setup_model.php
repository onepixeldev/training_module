<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Training_parameter_setup_model extends MY_Model
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
    // get max application training application setup
    public function getTrMaxAppl()
    {
        $this->db->select('TO_NUMBER(HP_PARM_DESC) HP_PARM_DESC');
        $this->db->from('HRADMIN_PARMS');
        $this->db->where("HP_PARM_CODE = 'TRAINING_MAX_APPL'");

        $q = $this->db->get();
        
        return $q->row();
    }

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
    
    // delete validation
    public function deleteTTVal($codeTT)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_HEAD');
        $this->db->where('TH_TYPE', strtoupper($codeTT));
        $q = $this->db->get();

        return $q->row();
    }


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
    public function saveUpdateMA($form)
    {
        $data = array(
            "HP_PARM_DESC" => $form['maximum_application']
        );
        
        $this->db->where("HP_PARM_CODE = 'TRAINING_MAX_APPL'");
        
        return $this->db->update("HRADMIN_PARMS", $data);
    }

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
    public function getTrainingCategoryList($stTraining = null, $status = null)
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

    public function getTrainingLevelList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_LEVEL');
        
        $this->db->order_by('TL_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

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
    // delete validation
    public function getTLDelVal($codeTL)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_HEAD');
        $this->db->where('TH_LEVEL', strtoupper($codeTL));
        $q = $this->db->get();

        return $q->row();
    }

    // DELETE DATA to db
    public function deleteTLdb($tl_code)
    {
        $this->db->where('TL_CODE', $tl_code);
        return $this->db->delete('TRAINING_LEVEL');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTL($codeTT, $form)
    {
        $data = array(
            "TL_DESC" => strtoupper($form['training_level']),
            "TL_DESC_ENG" => strtoupper($form['training_level_english'])
        );
        
        $this->db->where("TL_CODE", $codeTT);
        
        return $this->db->update("TRAINING_LEVEL", $data);
    }


    /*===========================================================
        TRAINING SPONSOR LEVEL
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingSponsorList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_SPONSOR_LEVEL');
        
        $this->db->order_by('TSL_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getTSLDetail($codeTSL)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_SPONSOR_LEVEL');
        $this->db->where('TSL_CODE', strtoupper($codeTSL));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTSL($form)
    {
        // set array data to be inserted
        $data = array(
            "TSL_CODE" => strtoupper($form['code']),
            "TSL_DESC" => strtoupper($form['sponsor_level'])
        );
        
        return $this->db->insert("TRAINING_SPONSOR_LEVEL", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // delete validation
    public function getTSLDelVal($tsl_code)
    {
        $this->db->select('*');
        $this->db->from('STAFF_TRAINING_HEAD');
        $this->db->where('STH_SPONSOR_LEVEL', strtoupper($tsl_code));
        $q = $this->db->get();

        return $q->row();
    }

    // DELETE DATA to db
    public function deleteTSLdb($tsl_code)
    {
        $this->db->where('TSL_CODE', $tsl_code);
        return $this->db->delete('TRAINING_SPONSOR_LEVEL');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTSL($codeTSL, $form)
    {
        $data = array(
            "TSL_DESC" => strtoupper($form['sponsor_level'])
        );
        
        $this->db->where("TSL_CODE", $codeTSL);
        
        return $this->db->update("TRAINING_SPONSOR_LEVEL", $data);
    }


    /*===========================================================
        TRAINING ORGANIZER LEVEL
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingOrganizerLevelList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ORGANIZER_LEVEL');
        
        $this->db->order_by('TOL_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTOLDetail($codeTOL)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ORGANIZER_LEVEL');
        $this->db->where('TOL_CODE', strtoupper($codeTOL));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTOL($form)
    {
        // set array data to be inserted
        $data = array(
            "TOL_CODE" => strtoupper($form['code']),
            "TOL_DESC" => strtoupper($form['organizer_level'])
        );
        
        return $this->db->insert("TRAINING_ORGANIZER_LEVEL", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // validation delete
    public function getTOLDelVal($tol_code)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_HEAD');
        $this->db->where('TH_ORGANIZER_LEVEL', strtoupper($tol_code));
        $q = $this->db->get();

        return $q->row();
    }

    // DELETE DATA to db
    public function deleteTOLdb($tol_code)
    {
        $this->db->where('TOL_CODE', $tol_code);
        return $this->db->delete('TRAINING_ORGANIZER_LEVEL');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTOL($codeTOL, $form)
    {
        $data = array(
            "TOL_DESC" => strtoupper($form['organizer_level'])
        );
        
        $this->db->where("TOL_CODE", $codeTOL);
        
        return $this->db->update("TRAINING_ORGANIZER_LEVEL", $data);
    }


    /*===========================================================
        TRAINING PARTICIPANT ROLE
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingParticipantRoleList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_PARTICIPANT_ROLE');
        
        $this->db->order_by('TPR_ORDER_BY ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTPRDetail($codeTPR)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_PARTICIPANT_ROLE');
        $this->db->where('TPR_CODE', strtoupper($codeTPR));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTPR($form)
    {
        // set array data to be inserted
        $data = array(
            "TPR_CODE" => strtoupper($form['code']),
            "TPR_DESC" => strtoupper($form['participant_role']),
            "TPR_ORDER_BY" => $form['sort_order'],
            "TPR_CPD_COUNTED_NACAD" => $form['cpd_counted_non_academic'],
            "TPR_CPD_COUNTED_ACAD" => $form['cpd_counted_academic'],
            "TPR_DISPLAY_TRAINING" => $form['display_training'],
            "TPR_DISPLAY_CONFERENCE" => $form['display_conference']
        );
        
        return $this->db->insert("TRAINING_PARTICIPANT_ROLE", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // delete validation
    public function getTPRDelVal($tpr_code)
    {
        $this->db->select('*');
        $this->db->from('STAFF_TRAINING_HEAD');
        $this->db->where('STH_PARTICIPANT_ROLE', strtoupper($tpr_code));
        $q = $this->db->get();

        return $q->row();
    }

    // DELETE DATA to db
    public function deleteTPRdb($tpr_code)
    {
        $this->db->where('TPR_CODE', $tpr_code);
        return $this->db->delete('TRAINING_PARTICIPANT_ROLE');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTPR($codeTPR, $form)
    {
        $data = array(
            "TPR_DESC" => strtoupper($form['participant_role']),
            "TPR_ORDER_BY" => $form['sort_order'],
            "TPR_CPD_COUNTED_NACAD" => $form['cpd_counted_non_academic'],
            "TPR_CPD_COUNTED_ACAD" => $form['cpd_counted_academic'],
            "TPR_DISPLAY_TRAINING" => $form['display_training'],
            "TPR_DISPLAY_CONFERENCE" => $form['display_conference']
        );
        
        $this->db->where("TPR_CODE", $codeTPR);
        
        return $this->db->update("TRAINING_PARTICIPANT_ROLE", $data);
    }


    /*===========================================================
        TRAINING PARTICIPANT STATUS
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingParticipantStatusList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_PARTICIPANT_STATUS');
        
        $this->db->order_by('TPS_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTPSDetail($codeTPS)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_PARTICIPANT_STATUS');
        $this->db->where('TPS_CODE', strtoupper($codeTPS));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTPS($form)
    {
        // set array data to be inserted
        $data = array(
            "TPS_CODE" => strtoupper($form['code']),
            "TPS_DESC" => strtoupper($form['participant_status']),
        );
        
        return $this->db->insert("TRAINING_PARTICIPANT_STATUS", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // delete validation
    public function getTPSDelVal($tps_code)
    {
        $this->db->select('*');
        $this->db->from('STAFF_TRAINING_HEAD');
        $this->db->where('STH_PARTICIPANT_STATUS', strtoupper($tps_code));
        $q = $this->db->get();

        return $q->row();
    }
    
    // DELETE DATA to db
    public function deleteTPSdb($tps_code)
    {
        $this->db->where('TPS_CODE', $tps_code);
        return $this->db->delete('TRAINING_PARTICIPANT_STATUS');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTPS($codeTPS, $form)
    {
        $data = array(
            "TPS_DESC" => strtoupper($form['participant_status']),
        );
        
        $this->db->where("TPS_CODE", $codeTPS);
        
        return $this->db->update("TRAINING_PARTICIPANT_STATUS", $data);
    }


    /*===========================================================
        TRAINING SECTOR LEVEL
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingSectorLevelList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_SECTOR_LEVEL');
        
        $this->db->order_by('TSL_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTSECLDetail($codeTSECL)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_SECTOR_LEVEL');
        $this->db->where('TSL_CODE', strtoupper($codeTSECL));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTSECL($form)
    {
        // set array data to be inserted
        $data = array(
            "TSL_CODE" => strtoupper($form['code']),
            "TSL_DESC" => strtoupper($form['sector_level']),
            "TSL_STATUS" => $form['sector_level_status']
        );
        
        return $this->db->insert("TRAINING_SECTOR_LEVEL", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteTSECLdb($codeTSECL)
    {
        $this->db->where('TSL_CODE', $codeTSECL);
        return $this->db->delete('TRAINING_SECTOR_LEVEL');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTSECL($codeTSECL, $form)
    {
        $data = array(
            "TSL_DESC" => strtoupper($form['sector_level']),
            "TSL_STATUS" => $form['sector_level_status']
        );
        
        $this->db->where("TSL_CODE", $codeTSECL);
        
        return $this->db->update("TRAINING_SECTOR_LEVEL", $data);
    }


    /*===========================================================
        TRAINING REMARK SETUP
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingRemarkSetupList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_REMARK_SETUP');
        
        $this->db->order_by('TRS_SEQ ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getRSDetail($no_seq)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_REMARK_SETUP');
        $this->db->where('TRS_SEQ', strtoupper($no_seq));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertRS($form)
    {
        // set array data to be inserted
        $data = array(
            "TRS_SEQ" => strtoupper($form['no']),
            "TRS_REMARK" => strtoupper($form['remark']),
            "TRS_MODULE" => strtoupper($form['module'])
        );
        
        return $this->db->insert("TRAINING_REMARK_SETUP", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteRSdb($trs_seq)
    {
        $this->db->where('TRS_SEQ', $trs_seq);
        return $this->db->delete('TRAINING_REMARK_SETUP');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateRS($no_seq, $form)
    {
        $data = array(
            "TRS_SEQ" => strtoupper($form['no']),
            "TRS_REMARK" => strtoupper($form['remark']),
            "TRS_MODULE" => strtoupper($form['module'])
        );
        
        $this->db->where("TRS_SEQ", $no_seq);
        
        return $this->db->update("TRAINING_REMARK_SETUP", $data);
    }


    /*===========================================================
        TRAINING ATTENDANCE STATUS
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingAttendanceStatusList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ATTENDANCE_STATUS');
        
        $this->db->order_by('TAS_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTASDetail($code_tas)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ATTENDANCE_STATUS');
        $this->db->where('TAS_CODE', strtoupper($code_tas));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTAS($form)
    {
        // set array data to be inserted
        $data = array(
            "TAS_CODE" => strtoupper($form['code']),
            "TAS_DESC" => strtoupper($form['attendance_status'])
        );
        
        return $this->db->insert("TRAINING_ATTENDANCE_STATUS", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteTASdb($tas_code)
    {
        $this->db->where('TAS_CODE', $tas_code);
        return $this->db->delete('TRAINING_ATTENDANCE_STATUS');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTAS($code_tas, $form)
    {
        $data = array(
            "TAS_DESC" => strtoupper($form['attendance_status'])
        );
        
        $this->db->where("TAS_CODE", $code_tas);
        
        return $this->db->update("TRAINING_ATTENDANCE_STATUS", $data);
    }


    /*===========================================================
        TRAINING ASSESSMENT SETUP
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingAssessmentSetupList($sts = null)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_SETUP');
        $this->db->where("TAS_TYPE IN ('TRAINING','FACILITATOR')");

        if (!empty($sts)) {
            $this->db->where('TAS_TYPE', $sts);
        }

        $this->db->order_by('TAS_TYPE, TAS_ORDERING');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTASVDetail($code_tasv, $type_tasv)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_SETUP');
        $this->db->where('TAS_CODE', $code_tasv);
        $this->db->where("TAS_TYPE IN", $type_tasv);
        $q = $this->db->get();

        return $q->row();
    }

    // verify if record related to another table
    public function getTASVVerDetail($tasv_type)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_GRADING');
        $this->db->join('TRAINING_ASSESSMENT_SETUP', 'TRAINING_ASSESSMENT_GRADING.TAG_GRADE_TYPE = TRAINING_ASSESSMENT_SETUP.TAS_TYPE');
        //$this->db->where('STA_ASSESSMENT_CODE', $code_tasv);
        $this->db->where("TRAINING_ASSESSMENT_SETUP.TAS_TYPE IN", $tasv_type);
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTASV($form)
    {
        // set array data to be inserted
        $data = array(
            "TAS_TYPE" => $form['type'],
            "TAS_ORDERING" => $form['order'],
            "TAS_CODE" => $form['code'],
            "TAS_DESC" => $form['description'],
            "TAS_ASSESSMENT_TYPE" => $form['assessment_type']
        );
        
        return $this->db->insert("TRAINING_ASSESSMENT_SETUP", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // delete validation
    public function getTASDelVal($tas_code)
    {
        $this->db->select('*');
        $this->db->from('STAFF_TRAINING_ATTENDANCE');
        $this->db->where('STA_ATTENDANCE_STATUS', strtoupper($tas_code));
        $q = $this->db->get();

        return $q->row();
    }

    // DELETE DATA to db
    public function deleteTASVdb($tasv_code, $tasv_type)
    {
        $this->db->where('TAS_CODE', $tasv_code);
        $this->db->where("TAS_TYPE IN", $tasv_type);
        return $this->db->delete('TRAINING_ASSESSMENT_SETUP');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTASV($code_tasv, $type_tasv, $form)
    {
        $data = array(
            "TAS_TYPE" => $form['type'],
            "TAS_ORDERING" => $form['order'],
            "TAS_DESC" => $form['description'],
            "TAS_ASSESSMENT_TYPE" => $form['assessment_type']
        );
        
        
        $this->db->where('TAS_CODE', $code_tasv);
        $this->db->where("TAS_TYPE IN", $type_tasv);
        
        return $this->db->update("TRAINING_ASSESSMENT_SETUP", $data);
    }

    /*_____________________________________________
        GRADING SETUP
    _______________________________________________*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingGradingList($assessmentType)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_GRADING');
        $this->db->where("TAG_GRADE_TYPE IN", $assessmentType);
        $this->db->order_by('TAG_GRADE_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTGDetail($code_tg, $type_tg)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_GRADING');
        $this->db->where("TAG_GRADE_CODE", $code_tg);
        $this->db->where("TAG_GRADE_TYPE IN", $type_tg);
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTG($form)
    {
        // set array data to be inserted
        $data = array(
            "TAG_GRADE_TYPE" => $form['type'],
            "TAG_GRADE_CODE" => $form['mark'],
            "TAG_GRADE_DESC" => $form['grading_description']
        );
        
        return $this->db->insert("TRAINING_ASSESSMENT_GRADING", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteTGdb($tg_code, $tg_type)
    {
        $this->db->where('TAG_GRADE_CODE', $tg_code);
        $this->db->where("TAG_GRADE_TYPE IN", $tg_type);
        return $this->db->delete('TRAINING_ASSESSMENT_GRADING');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTG($code_tg, $type_tg, $form)
    {
        $data = array(
            "TAG_GRADE_DESC" => $form['grading_description']
        );
        
        
        $this->db->where('TAG_GRADE_CODE', $code_tg);
        $this->db->where("TAG_GRADE_TYPE IN", $type_tg);
        
        return $this->db->update("TRAINING_ASSESSMENT_GRADING", $data);
    }


    /*===========================================================
        TRAINING REQUIREMENT TYPE
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingRequirementTypeList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_REQUIREMENT_TYPE');
        
        $this->db->order_by('TRT_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTRTDetail($code_trt)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_REQUIREMENT_TYPE');
        $this->db->where('TRT_CODE', strtoupper($code_trt));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTRT($form)
    {
        // set array data to be inserted
        $data = array(
            "TRT_CODE" => strtoupper($form['code']),
            "TRT_DESC" => strtoupper($form['requirement_type'])
        );
        
        return $this->db->insert("TRAINING_REQUIREMENT_TYPE", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // delete validation
    public function getTRTDelVal($trt_code)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_REQUIREMENT');
        $this->db->where('TRA_TRAINING_REQ_CODE', strtoupper($trt_code));
        $q = $this->db->get();

        return $q->row();
    }

    // DELETE DATA to db
    public function deleteTRTdb($trt_code)
    {
        $this->db->where('TRT_CODE', $trt_code);
        return $this->db->delete('TRAINING_REQUIREMENT_TYPE');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTRT($code_trt, $form)
    {
        $data = array(
            "TRT_DESC" => strtoupper($form['requirement_type'])
        );
        
        
        $this->db->where("TRT_CODE", $code_trt);
        
        return $this->db->update("TRAINING_REQUIREMENT_TYPE", $data);
    }


    /*===========================================================
        TRAINING ORGANIZER INFO (HEAD)
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingOrganizerHeadList()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ORGANIZER_HEAD');
        $this->db->join('COUNTRY_MAIN', 'TRAINING_ORGANIZER_HEAD.TOH_COUNTRY = COUNTRY_MAIN.CM_COUNTRY_CODE');
        $this->db->where("TOH_EXTERNAL_AGENCY = 'N' OR TOH_EXTERNAL_AGENCY is NULL");
        $this->db->order_by('TOH_ORG_DESC ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record
    public function getTOHDetail($code_toh)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ORGANIZER_HEAD');
        $this->db->where('TOH_ORG_CODE', $code_toh);
        $q = $this->db->get();

        return $q->row();
    }

    public function getTOHDetailSDesc($code_toh)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ORGANIZER_HEAD');
        $this->db->join('STATE_MAIN', 'TRAINING_ORGANIZER_HEAD.TOH_STATE = STATE_MAIN.SM_STATE_CODE');
        $this->db->where('TOH_ORG_CODE', $code_toh);
        $q = $this->db->get();

        return $q->row();
    }
    
    public function getTOHDetailCDesc($code_toh)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ORGANIZER_HEAD');
        $this->db->join('COUNTRY_MAIN', 'TRAINING_ORGANIZER_HEAD.TOH_COUNTRY = COUNTRY_MAIN.CM_COUNTRY_CODE');
        $this->db->where('TOH_ORG_CODE', $code_toh);
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTOH($form)
    {
        // set array data to be inserted
        $data = array(
            "TOH_ORG_CODE" => strtoupper($form['code']),
            "TOH_ORG_DESC" => strtoupper($form['description']),
            "TOH_ADDRESS" => $form['address'],
            "TOH_POSTCODE" => $form['postcode'],
            "TOH_CITY" => $form['city'],
            "TOH_STATE" => $form['state'],
            "TOH_COUNTRY" => $form['country'],
            "TOH_EXTERNAL_AGENCY" => $form['external_agency']
        );
        
        return $this->db->insert("TRAINING_ORGANIZER_HEAD", $data);
    }
    
    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteTOHdb($toh_code)
    {
        $this->db->where('TOH_ORG_CODE', $toh_code);
        return $this->db->delete('TRAINING_ORGANIZER_HEAD');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTOH($code_toh, $form)
    {
        $data = array(
            "TOH_ORG_DESC" => strtoupper($form['description']),
            "TOH_ADDRESS" => $form['address'],
            "TOH_POSTCODE" => $form['postcode'],
            "TOH_CITY" => $form['city'],
            "TOH_STATE" => $form['state'],
            "TOH_COUNTRY" => $form['country']
        );
        
        
        $this->db->where("TOH_ORG_CODE", $code_toh);
        
        return $this->db->update("TRAINING_ORGANIZER_HEAD", $data);
    }
    
    // used for ADD & UPDATE form to get country list
    public function getCountryList()
    {
        $this->db->select('CM_COUNTRY_CODE, CM_COUNTRY_DESC');
        $this->db->from('COUNTRY_MAIN');
        $this->db->order_by('CM_COUNTRY_DESC');
        $q = $this->db->get();
                
        return $q->result();
    }
    
    // used by ADD & UPDATE form to get state based on choosen country
    public function getCountryStateList($countCode)
    {
        $this->db->select('SM_STATE_CODE, SM_STATE_DESC, SM_COUNTRY_CODE');
        $this->db->from('STATE_MAIN');
        $this->db->where('SM_COUNTRY_CODE', $countCode);
        $this->db->order_by('SM_STATE_CODE');
        $q = $this->db->get();
        
        return $q->result();
    }
}
