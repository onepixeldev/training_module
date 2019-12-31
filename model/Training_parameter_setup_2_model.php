<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_parameter_setup_2_model extends MY_Model
{
    private $staff_id;

    public function __construct()
    {
        $this->load->database();
        $this->staff_id = $this->lib->userid();
    }
    
    /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                    TRAINING PARAMETER SETUP 2
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /*===========================================================
       Training Effectiveness Evaluation 
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTraEffEvaSetup($thm)
    {
        $this->db->select('TO_NUMBER(HP_PARM_DESC) HP_PARM_DESC, HP_PARM_NO, HP_PARM_CODE');
        $this->db->from('HRADMIN_PARMS');
        $this->db->where("HP_PARM_CODE = 'TRAINING_HOD_MEMO'");
        $this->db->where('HP_PARM_NO', $thm);
        $q = $this->db->get();
        
        return $q->row();
    }

    public function getTrEvaMemSetup()
    {
        $this->db->select('TO_NUMBER(HP_PARM_DESC) HP_PARM_DESC, HP_PARM_CODE, HP_PARM_NO');
        $this->db->from('HRADMIN_PARMS');
        $this->db->where("HP_PARM_CODE = 'TRAINING_EVALUATION_MEMO'");
        $this->db->where('HP_PARM_NO = 1');
        $q = $this->db->get();
        
        return $q->row();
    }

    public function getTrEvaPorSetup()
    {
        $this->db->select('HP_PARM_DESC, HP_PARM_CODE, HP_PARM_NO');
        $this->db->from('HRADMIN_PARMS');
        $this->db->where("HP_PARM_CODE = 'TRAINING_EVALUATION_PORTAL'");
        $q = $this->db->get();
        
        return $q->row();
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/

    public function saveUpdateHODmem($hpp_no, $form)
    {
        $parmCode = $form['hpp_code'];

        if ($parmCode == 'TRAINING_HOD_MEMO') {
            $data = array(
                "HP_PARM_DESC" => $form['day']
            );

            $this->db->where("HP_PARM_CODE = 'TRAINING_HOD_MEMO'");
        } 
        if ($parmCode == 'TRAINING_EVALUATION_MEMO') {
            $data = array(
                "HP_PARM_DESC" => $form['time']
            );
            $this->db->where("HP_PARM_CODE = 'TRAINING_EVALUATION_MEMO'");
        }
        if ($parmCode == 'TRAINING_EVALUATION_PORTAL') {
            $data = array(
                "HP_PARM_DESC" => $form['function_portal']
            );
            $this->db->where("HP_PARM_CODE = 'TRAINING_EVALUATION_PORTAL'");
        }
        
        //$this->db->where("HP_PARM_CODE = 'TRAINING_HOD_MEMO'");
        $this->db->where("HP_PARM_NO", $hpp_no);
        
        return $this->db->update("HRADMIN_PARMS", $data);
    }


    /*=======================================================================
       Training Effectiveness SETUP
    =========================================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrEffSetup()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_CATEGORY');
        
        $this->db->order_by('TAC_STATUS DESC, TAC_ORDERING ');
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getEffTitleSetup($codeTAC)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_CATEGORY');
        $this->db->join("TRAINING_EVALUATION_TITLE", "TRAINING_EVALUATION_TITLE.TET_CATEGORY = TRAINING_ASSESSMENT_CATEGORY.TAC_CODE");
        $this->db->where('TAC_CODE', $codeTAC);
        $this->db->order_by('TET_ORDERING');
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getEffSetup($codeTAC)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_SETUP');
        $this->db->join("TRAINING_ASSESSMENT_CATEGORY", "TRAINING_ASSESSMENT_CATEGORY.TAC_CODE = TRAINING_ASSESSMENT_SETUP.TAS_CATEGORY");
        $this->db->where('TRAINING_ASSESSMENT_CATEGORY.TAC_CODE', $codeTAC);
        $this->db->where('TAS_TITLE IS NULL');
        $this->db->where("TAS_TYPE IN ('EFFECTIVENESS')");
        $this->db->order_by('TAS_STATUS ASC, TAS_ORDERING');
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getEffSetup2($codeTET)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_EVALUATION_TITLE');
        $this->db->join("TRAINING_ASSESSMENT_SETUP", "TRAINING_ASSESSMENT_SETUP.TAS_CATEGORY = TRAINING_EVALUATION_TITLE.TET_CATEGORY");
        $this->db->where('TRAINING_EVALUATION_TITLE.TET_CODE', $codeTET);
        $this->db->where('TRAINING_ASSESSMENT_SETUP.TAS_NUMBERING IS NOT NULL');
        $this->db->where('TRAINING_ASSESSMENT_SETUP.TAS_TITLE', $codeTET);
        $this->db->where("TRAINING_ASSESSMENT_SETUP.TAS_TYPE IN ('EFFECTIVENESS')");
        $this->db->order_by('TAS_STATUS ASC,TAS_ORDERING');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record 
    public function getTACDetail($codeTAC)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_CATEGORY');
        $this->db->where('TAC_CODE', $codeTAC);
        $q = $this->db->get();

        return $q->row();
    }

    public function getTACDetailDel($codeTAC)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_EVALUATION_TITLE');
        $this->db->where('TET_CATEGORY', $codeTAC);
        $q = $this->db->get();

        return $q->row();
    }

    public function getTACDetailDel2($codeTAC)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_SETUP');
        $this->db->where('TAS_CATEGORY', $codeTAC);
        $q = $this->db->get();

        return $q->row();
    }

    public function getTETDetail($codeTET)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_EVALUATION_TITLE');
        $this->db->where('TET_CODE', $codeTET);
        //$this->db->where('TET_CATEGORY', $codeTAC);
        $q = $this->db->get();

        return $q->row();
    }

    public function getTETDetailDel($codeTET)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_SETUP');
        $this->db->where('TAS_TITLE', $codeTET);
        $q = $this->db->get();

        return $q->row();
    }

    public function getTASEffDetail($codeTAS)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_SETUP');
        $this->db->where('TAS_CODE', $codeTAS);
        $this->db->where("TAS_TYPE IN 'EFFECTIVENESS'");
        $q = $this->db->get();

        return $q->row();
    }

    public function getTASEffDetailDel($typeTAS)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_GRADING');
        $this->db->where('TAG_GRADE_TYPE', $typeTAS);
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTAC($form)
    {
        $insertDate = "SYSDATE";
        // set array data to be inserted
        $data = array(
            "TAC_CODE" => strtoupper($form['code']),
            "TAC_DESC" => strtoupper($form['description']),
            "TAC_ORDERING" => $form['order'],
            "TAC_STATUS" => $form['status'],
            "TAC_UPDATE_BY" => $this->staff_id
        );

        // set data to be inserted (reference id, date)
        $this->db->set("TAC_UPDATE_DATE", $insertDate, false);
        
        return $this->db->insert("TRAINING_ASSESSMENT_CATEGORY", $data);
    }

    public function insertTET($form)
    {
        // set array data to be inserted
        $data = array(
            "TET_CODE" => strtoupper($form['code']),
            "TET_DESC" => strtoupper($form['description']),
            "TET_ORDERING" => $form['order'],
            "TET_CATEGORY" => $form['codetac']
        );
        
        return $this->db->insert("TRAINING_EVALUATION_TITLE", $data);
    }

    public function insertTASEff($form)
    {
        // set array data to be inserted
        $data = array(
            "TAS_TYPE" => $form['type'],
            "TAS_CATEGORY" => $form['tas_category'],
            "TAS_ORDERING" => $form['order'],
            "TAS_NUMBERING" => $form['no_portal'],
            "TAS_CODE" => $form['no'],
            "TAS_DESC" => $form['description'],
            "TAS_ASSESSMENT_TYPE" => $form['effectiveness_type'],
            "TAS_STATUS" => $form['status']
        );
        
        return $this->db->insert("TRAINING_ASSESSMENT_SETUP", $data);
    }

    public function insertTASEff2($form)
    {
        // set array data to be inserted
        $data = array(
            "TAS_TYPE" => $form['type'],
            "TAS_TITLE" => $form['tas_title'],
            "TAS_CATEGORY" => $form['tas_category'],
            "TAS_ORDERING" => $form['order'],
            "TAS_NUMBERING" => $form['no_portal'],
            "TAS_CODE" => $form['no'],
            "TAS_DESC" => $form['description'],
            "TAS_ASSESSMENT_TYPE" => $form['effectiveness_type'],
            "TAS_STATUS" => $form['status']
        );
        
        return $this->db->insert("TRAINING_ASSESSMENT_SETUP", $data);
    }

    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteTACdb($codeTAC)
    {
        $this->db->where('TAC_CODE', $codeTAC);
        return $this->db->delete('TRAINING_ASSESSMENT_CATEGORY');
    }

    public function deleteTETdb($codeTET, $codeTAC)
    {
        $this->db->where('TET_CODE', $codeTET);
        $this->db->where('TET_CATEGORY', $codeTAC);
        return $this->db->delete('TRAINING_EVALUATION_TITLE');
    }

    public function deleteTASEffdb($tasCode, $tasType)
    {
        $this->db->where('TAS_CODE', $tasCode);
        $this->db->where('TAS_TYPE IN', $tasType);
        return $this->db->delete('TRAINING_ASSESSMENT_SETUP');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTAC($codeTAC, $form)
    {
        $upDate = "SYSDATE";

        $data = array(
            "TAC_DESC" => strtoupper($form['description']),
            "TAC_ORDERING" => $form['order'],
            "TAC_STATUS" => $form['status'],
            "TAC_UPDATE_BY" => $this->staff_id
        );
        
        $this->db->set("TAC_UPDATE_DATE", $upDate, false);

        $this->db->where("TAC_CODE", $codeTAC);
        
        return $this->db->update("TRAINING_ASSESSMENT_CATEGORY", $data);
    }

    public function saveUpdateTET($codeTET, $codeTAC, $form)
    {
        $data = array(
            "TET_DESC" => strtoupper($form['description']),
            "TET_ORDERING" => $form['order']
        );

        $this->db->where("TET_CODE", $codeTET);
        $this->db->where("TET_CATEGORY", $codeTAC);
        
        return $this->db->update("TRAINING_EVALUATION_TITLE", $data);
    }

    public function saveUpdateTASEff($tasCode, $tasType, $form)
    {
        $data = array(
            "TAS_ORDERING" => $form['order'],
            "TAS_NUMBERING" => $form['no_portal'],
            "TAS_DESC" => $form['description'],
            "TAS_ASSESSMENT_TYPE" => $form['effectiveness_type'],
            "TAS_STATUS" => $form['status']
        );

        $this->db->where("TAS_CODE", $tasCode);
        $this->db->where("TAS_TYPE", $tasType);
        
        return $this->db->update("TRAINING_ASSESSMENT_SETUP", $data);
    }


    /*===========================================================
       Training Component
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrModCom()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_MODULE_COMPONENT');
        $this->db->order_by('TMC_COMPONENT_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getTMCDetail($code_tmc){
        $this->db->select('*');
        $this->db->from('TRAINING_MODULE_COMPONENT');
        $this->db->where('TMC_COMPONENT_CODE', $code_tmc);
        $q = $this->db->get();
        
        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function insertTMC($form)
    {
        $data = array(
            "TMC_COMPONENT_CODE" => strtoupper($form['code']),
            "TMC_COMPONENT_DESC" => $form['description']
        );
        
        return $this->db->insert("TRAINING_MODULE_COMPONENT", $data);
    }

    /*_____________________
        DELETE PROCESS
    _____________________*/
    public function deleteTMCdb($tmc_code)
    {
        $this->db->where('TMC_COMPONENT_CODE', $tmc_code);
        return $this->db->delete('TRAINING_MODULE_COMPONENT');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    public function saveUpdateTMC($code_tmc, $form)
    {
        $data = array(
            "TMC_COMPONENT_DESC" => $form['description']
        );
        
        
        $this->db->where("TMC_COMPONENT_CODE", $code_tmc);
        
        return $this->db->update("TRAINING_MODULE_COMPONENT", $data);
    }

    /*===========================================================
       Training External Agency Setup
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getExAgSetup()
    {
        $this->db->select('TO_NUMBER(HP_PARM_DESC) HP_PARM_DESC, HP_PARM_NO, HP_PARM_CODE');
        $this->db->from('HRADMIN_PARMS');
        $this->db->where("HP_PARM_CODE = 'EXTERNAL_MAX_DAY_APPL'");
        $q = $this->db->get();
        
        return $q->row();
    }

    public function getExAgSetupUrl()
    {
        $this->db->select('*');
        $this->db->from('HRADMIN_PARMS');
        $this->db->where("HP_PARM_CODE = 'EXTERNAL_URL'");
        $q = $this->db->get();
        
        return $q->row();
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/

    public function saveUpdateEAS($eas_no, $form)
    {
        $parmCode = $form['eas_code'];

        if ($parmCode == 'EXTERNAL_MAX_DAY_APPL') {
            $data = array(
                "HP_PARM_DESC" => $form['external_max_day_apply']
            );
            $this->db->where("HP_PARM_CODE = 'EXTERNAL_MAX_DAY_APPL'");
        }
        if ($parmCode == 'EXTERNAL_URL') {
            $data = array(
                "HP_PARM_DESC" => $form['guideline_url']
            );
            $this->db->where("HP_PARM_CODE = 'EXTERNAL_URL'");
        }
        
        //$this->db->where("HP_PARM_CODE = 'TRAINING_HOD_MEMO'");
        //$this->db->where("HP_PARM_NO", $hpp_no);
        
        return $this->db->update("HRADMIN_PARMS", $data);
    }


    /*=======================================================================
       TRAINING COMPETENCY LEVEL
    =========================================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrComLvl()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_COMPETENCY_LEVEL');
        
        $this->db->order_by('TCL_ORDERING ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record 
    public function getTCLDetail($codeTCL)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_COMPETENCY_LEVEL');
        $this->db->where('TCL_COMPETENCY_CODE', strtoupper($codeTCL));
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTCL($form)
    {
        // set array data to be inserted
        $data = array(
            "TCL_COMPETENCY_CODE" => strtoupper($form['code']),
            "TCL_COMPETENCY_DESC" => $form['description'],
            "TCL_SERVICE_YEAR_FROM" => $form['service_year_from'],
            "TCL_SERVICE_YEAR_TO" => $form['service_year_to'],
            "TCL_ORDERING" => $form['ordering'],
            "TCL_STATUS" => $form['status']
        );
        
        return $this->db->insert("TRAINING_COMPETENCY_LEVEL", $data);
    }

    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteTCLdb($codeTCL)
    {
        $this->db->where('TCL_COMPETENCY_CODE', $codeTCL);
        return $this->db->delete('TRAINING_COMPETENCY_LEVEL');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTCL($codeTCL, $form)
    {
        $data = array(
            "TCL_COMPETENCY_DESC" => $form['description'],
            "TCL_SERVICE_YEAR_FROM" => $form['service_year_from'],
            "TCL_SERVICE_YEAR_TO" => $form['service_year_to'],
            "TCL_ORDERING" => $form['ordering'],
            "TCL_STATUS" => $form['status']
        );
        
        $this->db->where("TCL_COMPETENCY_CODE", $codeTCL);
        
        return $this->db->update("TRAINING_COMPETENCY_LEVEL", $data);
    }


    /*=======================================================================
       TRAINING COST SETUP (TYPE)
    =========================================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrCostSt()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_COST_TYPE');
        
        $this->db->order_by('TCT_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record 
    public function getTCSDetail($codeTCS)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_COST_TYPE');
        $this->db->where('TCT_CODE', $codeTCS);
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTCS($form)
    {
        // set array data to be inserted
        $data = array(
            "TCT_CODE" => strtoupper($form['code']),
            "TCT_DESC" => $form['description'],
            "TCT_STATUS" => $form['status']
        );
        
        return $this->db->insert("TRAINING_COST_TYPE", $data);
    }

    /*_______________________
        DELETE PROCESS
    _______________________*/
    // delete validation
    public function getTCSDelVal($codeTCS)
    {
        $this->db->select('*');
        $this->db->from('STAFF_TRAINING_COST_DETL');
        $this->db->where('STCD_COST_CODE', strtoupper($codeTCS));
        $q = $this->db->get();

        return $q->row();
    }

    public function getTCSDelVal2($codeTCS)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_COST');
        $this->db->where('TC_COST_CODE', strtoupper($codeTCS));
        $q = $this->db->get();

        return $q->row();
    }

    // DELETE DATA to db
    public function deleteTCSdb($codeTCS)
    {
        $this->db->where('TCT_CODE', $codeTCS);
        return $this->db->delete('TRAINING_COST_TYPE');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTCS($codeTCS, $form)
    {
        $data = array(
            "TCT_DESC" => $form['description'],
            "TCT_STATUS" => $form['status']
        );
        
        $this->db->where("TCT_CODE", $codeTCS);
        
        return $this->db->update("TRAINING_COST_TYPE", $data);
    }


    /*=======================================================================
       TRAINING COST SETUP (FEE CATEGORY)
    =========================================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrFeeSt()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_FEE_SETUP');
        
        $this->db->order_by('TFS_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record 
    public function getTFSDetail($codeTFS)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_FEE_SETUP');
        $this->db->where('TFS_CODE', $codeTFS);
        $q = $this->db->get();

        return $q->row();
    }

    public function getTFSDeptFull($codeTFS)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_FEE_SETUP');
        $this->db->join('DEPARTMENT_MAIN', 'TRAINING_FEE_SETUP.TFS_DCR_APPROVE = DEPARTMENT_MAIN.DM_DEPT_CODE');
        $this->db->where('TFS_CODE', $codeTFS);
        $q = $this->db->get();

        return $q->row();
    }

    public function getTFSDeptFull2($codeTFS)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_FEE_SETUP');
        $this->db->join('DEPARTMENT_MAIN', 'TRAINING_FEE_SETUP.TFS_REGISTRAR_APPROVE = DEPARTMENT_MAIN.DM_DEPT_CODE');
        $this->db->where('TFS_CODE', $codeTFS);
        $q = $this->db->get();

        return $q->row();
    }

    public function getDeptList()
    {
        $this->db->select('DM_DEPT_CODE, DM_DEPT_DESC');
        $this->db->from('DEPARTMENT_MAIN');
        $this->db->where("NVL(DM_STATUS, 'INACTIVE') = 'ACTIVE'");
        $this->db->order_by('DM_DEPT_CODE');
        $q = $this->db->get();
		        
        return $q->result();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTFS($form)
    {
        // set array data to be inserted
        $data = array(
            "TFS_CODE" => strtoupper($form['code']),
            "TFS_DESC" => $form['description'],
            "TFS_AMOUNT_FROM" => $form['minimum_range'],
            "TFS_AMOUNT_TO" => $form['maximum_range'],
            "TFS_DCR_APPROVE" => $form['dcr_approve'],
            "TFS_REGISTRAR_APPROVE" => $form['registrar_approve'],
            "TFS_MPE_APPROVE" => $form['mpe_approve'],
            "TFS_STATUS" => $form['status']
        );
        
        return $this->db->insert("TRAINING_FEE_SETUP", $data);
    }

    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteTFSdb($codeTFS)
    {
        $this->db->where('TFS_CODE', $codeTFS);
        return $this->db->delete('TRAINING_FEE_SETUP');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTFS($codeTFS, $form)
    {
        $data = array(
            "TFS_DESC" => $form['description'],
            "TFS_AMOUNT_FROM" => $form['minimum_range'],
            "TFS_AMOUNT_TO" => $form['maximum_range'],
            "TFS_DCR_APPROVE" => $form['dcr_approve'],
            "TFS_REGISTRAR_APPROVE" => $form['registrar_approve'],
            "TFS_MPE_APPROVE" => $form['mpe_approve'],
            "TFS_STATUS" => $form['status']
        );
        
        $this->db->where("TFS_CODE", $codeTFS);
        
        return $this->db->update("TRAINING_FEE_SETUP", $data);
    }


    /*=======================================================================
       TRAINING Effectiveness Grading Setup
    =========================================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getEffGraSetup($typeEGS = null)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_GRADING');
        if (!empty($typeEGS)) {
            $this->db->where("TAG_GRADE_TYPE", $typeEGS);
        }
        
        $this->db->order_by('TAG_GRADE_CODE ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record 
    public function getEGSDetail($code_egs)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_ASSESSMENT_GRADING');
        $this->db->where("TAG_GRADE_TYPE = 'EFFECTIVENESS'");
        $this->db->where('TAG_GRADE_CODE', $code_egs);
        $q = $this->db->get();

        return $q->row();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertEGS($form)
    {
        // set array data to be inserted
        $data = array(
            "TAG_GRADE_CODE" => $form['mark'],
            "TAG_GRADE_DESC" => $form['description'],
            "TAG_GRADE_TYPE" => $form['type']
        );
        
        return $this->db->insert("TRAINING_ASSESSMENT_GRADING", $data);
    }

    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteEGSdb($egs_code)
    {
        $this->db->where("TAG_GRADE_TYPE = 'EFFECTIVENESS'");
        $this->db->where('TAG_GRADE_CODE', $egs_code);
        return $this->db->delete('TRAINING_ASSESSMENT_GRADING');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateEGS($code_egs, $form)
    {
        $data = array(
            "TAG_GRADE_DESC" => $form['description'],
            "TAG_GRADE_TYPE" => $form['type']
        );
        
        $this->db->where("TAG_GRADE_TYPE = 'EFFECTIVENESS'");
        $this->db->where('TAG_GRADE_CODE', $code_egs);
        
        return $this->db->update("TRAINING_ASSESSMENT_GRADING", $data);
    }


    /*=======================================================================
       TRAINING MEMO FOR PARTICIPANTS
    =========================================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    public function getTrainingMemoPar()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_MEMO_CONTENT');
        $this->db->where("TMC_MODULE IN ('TRAINING_EFFECTIVENESS','ASSIGN_TRAINING','TRAINING_HELPDESK','TRAINING_APPL_SECTOR')");
        //$this->db->order_by("TMC_CODE ASC");
        
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getTrainingMemoEva()
    {
        $this->db->select('*');
        $this->db->from('TRAINING_EVALUATION_MEMO');
        $this->db->where("TEM_MODULE = 'TRAINING_EVALUATION'");
        
        $q = $this->db->get();
        
        return $q->row();
    }

    public function getStaffFullName($staffID)
    {
        //select sm_staff_id, sm_staff_name from staff_main,staff_status where ss_status_code = sm_staff_status and ss_status_sts = 'ACTIVE' and sm_staff_type = 'STAFF' order by 2
        $this->db->select('SM_STAFF_ID, SM_STAFF_NAME');
        $this->db->from('STAFF_MAIN, STAFF_STATUS');
        $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS");
        $this->db->where("SS_STATUS_STS = 'ACTIVE'");
        $this->db->where("SM_STAFF_TYPE = 'STAFF'");
        $this->db->where("SM_STAFF_ID", $staffID);
        
        $q = $this->db->get();
        
        return $q->row();
    }

    public function getStaffList()
    {
        //select sm_staff_id, sm_staff_name from staff_main,staff_status where ss_status_code = sm_staff_status and ss_status_sts = 'ACTIVE' and sm_staff_type = 'STAFF' order by 2
        $this->db->select('SM_STAFF_ID, SM_STAFF_NAME');
        $this->db->from('STAFF_MAIN, STAFF_STATUS');
        $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS");
        $this->db->where("SS_STATUS_STS = 'ACTIVE'");
        $this->db->where("SM_STAFF_TYPE = 'STAFF'");
        $this->db->order_by("2");
        
        $q = $this->db->get();
        
        return $q->result();
    }

    // CHECK record 
    public function getTMPDetail($codeTMP)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_MEMO_CONTENT');
        $this->db->where('TMC_CODE', $codeTMP);
        $q = $this->db->get();

        return $q->row();
    }

    /*public function getTEMDetail($codeTEM)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_EVALUATION_MEMO');
        $this->db->where('TEM_CODE', $codeTEM);
        $q = $this->db->get();

        return $q->row();
    }*/

    /*_____________________
        ADD PROCESS
    _______________________*/
    // INSERT DATA to db
    public function insertTMP($form)
    {
        $tmp_code = "'TMC'||ltrim(to_char(TRAINING_MEMO_CONTENT_SEQ.nextval,'0000000'))";

        $status = "";
        if (empty($form['status'])) {
            $status = 'Y';
        } else {
            $status = $form['status'];
        }

        // set array data to be inserted
        $data = array(
            "TMC_MODULE" => $form['module'],
            "TMC_ADDRESS" => $form['address'],
            "TMC_LINK" => $form['link'],
            "TMC_EMAIL" => $form['email'],
            "TMC_TELNO" => $form['tel_no'],
            "TMC_FAXNO" => $form['fax_no'],
            "TMC_SEND_BY" => $form['send_by'],
            "TMC_STATUS" => $status
        );

        // set data to be inserted (reference id, date)
        $this->db->set("TMC_CODE", $tmp_code, false);
        
        return $this->db->insert("TRAINING_MEMO_CONTENT", $data);
    }

    /*_______________________
        DELETE PROCESS
    _______________________*/
    // DELETE DATA to db
    public function deleteTMPdb($tmp_code)
    {
        $this->db->where('TMC_CODE', $tmp_code);
        return $this->db->delete('TRAINING_MEMO_CONTENT');
    }

    /*_______________________
        UPDATE PROCESS
    _______________________*/
    // UPDATE DATA to db
    public function saveUpdateTMP($code_tmp, $form)
    {
        $status = "";
        if (empty($form['status'])) {
            $status = 'Y';
        } else {
            $status = $form['status'];
        }

        $data = array(
            "TMC_MODULE" => $form['module'],
            "TMC_ADDRESS" => $form['address'],
            "TMC_LINK" => $form['link'],
            "TMC_EMAIL" => $form['email'],
            "TMC_TELNO" => $form['tel_no'],
            "TMC_FAXNO" => $form['fax_no'],
            "TMC_SEND_BY" => $form['send_by'],
            "TMC_STATUS" => $status
        );
        
        $this->db->where('TMC_CODE', $code_tmp);
        
        return $this->db->update("TRAINING_MEMO_CONTENT", $data);
    }

    public function saveUpdateTEM($form)
    {
        $data = array(
            "TEM_TITLE" => $form['title'],
            "TEM_CONTENT" => $form['content'],
            "TEM_SEND_BY" => $form['send_by'],
            "TEM_STATUS" => $form['status'],
        );
        
        $this->db->where("TEM_CODE = 'TEM00001'");
        
        return $this->db->update("TRAINING_EVALUATION_MEMO", $data);
    }
}
