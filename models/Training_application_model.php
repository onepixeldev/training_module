<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_application_model extends MY_Model
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        $this->load->database();
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }
    
    /*===========================================================
       TRAINING APPLICATION [TRAINING SETUP]
    =============================================================*/

   /*_____________________
        GET BASIC INFO
    _______________________*/

    // TRAINING HEAD
    public function getTrainingInfo()
    {
        $umg = $this->username;

        $this->db->select('*');
        $this->db->from('TRAINING_HEAD');
        
        $this->db->where("TH_STATUS = 'ENTRY'");
        $this->db->where("TH_DEPT_CODE = (SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE UPPER(SM_APPS_USERNAME) = UPPER('$umg'))");
        $this->db->where("TH_INTERNAL_EXTERNAL NOT IN ('EXTERNAL_AGENCY')");
        $this->db->order_by("TH_DATE_FROM, TH_DATE_TO, TH_TRAINING_TITLE, TH_REF_ID");
        $q = $this->db->get();
        
        return $q->result();
    }

    // TRAINING HEAD BASED ON REFID
    public function getTrainingInfoDetail($refID)
    {
        $umg = $this->username;

        $this->db->select("TH_REF_ID, 
        TH_TRAINING_TITLE, 
        TH_TRAINING_DESC, 
        TH_TYPE, 
        TH_STATUS, 
        TH_INTERNAL_EXTERNAL,
        TH_LEVEL, 
        TH_TRAINING_VENUE, 
        TH_TRAINING_COUNTRY, 
        TH_ORGANIZER_NAME, 
        TH_ORGANIZER_LEVEL, 
        TH_ORGANIZER_ADDRESS,
        TH_ORGANIZER_POSTCODE, 
        TH_ORGANIZER_CITY, 
        TH_ORGANIZER_STATE, 
        TH_ORGANIZER_COUNTRY, 
        TH_SPONSOR, 
        TO_CHAR(TH_DATE_FROM, 'DD-MM-YYYY') AS TH_DATEFR,
        TO_CHAR(TH_DATE_TO, 'DD-MM-YYYY') AS TH_DATETO, 
        TH_TOTAL_HOURS, 
        TH_TRAINING_FEE, 
        TO_CHAR(TH_APPLY_CLOSING_DATE, 'DD-MM-YYYY') AS TH_APP_CLOSING_DATE, 
        TH_CURRENT_PARTICIPANT, 
        TH_MAX_PARTICIPANT,
        TH_OPEN, 
        TH_DEPT_CODE, 
        TH_ENTER_BY, 
        TH_ENTER_DATE, 
        TH_APPROVE_BY, 
        TH_APPROVE_DATE, 
        TH_TRAINING_STATE, 
        TH_ATTENDANCE_TYPE,
        TH_PRINT_CERTIFICATE, 
        TH_EVALUATION_COMPULSORY, 
        TH_SERVICE_GROUP, 
        TH_CATEGORY, 
        TO_CHAR(TH_EVALUATION_DATE_FROM, 'DD-MM-YYYY') AS TH_EVA_DATE_FROM,
        TO_CHAR(TH_EVALUATION_DATE_TO, 'DD-MM-YYYY') AS TH_EVA_DATE_TO, 
        TH_TRAINING_HISTORY, 
        TH_COMPETENCY_CODE, 
        TH_TRAINING_CODE, 
        TH_OFFER, 
        TH_GENERATE_CPD,
        TO_CHAR(TH_TIME_FROM, 'HH:MI AM') AS TIME_FR, 
        TO_CHAR(TH_TIME_TO, 'HH:MI AM') AS TIME_T, 
        TO_CHAR(TH_CONFIRM_DATE_FROM, 'DD-MM-YYYY') AS TH_CON_DATE_FROM,
        TO_CHAR(TH_CONFIRM_DATE_TO, 'DD-MM-YYYY') AS TH_CON_DATE_TO, 
        TH_FIELD");
        $this->db->from('TRAINING_HEAD');
        
        // if(empty($scCode)) {
        //     $this->db->where("TH_STATUS = 'ENTRY'");
        //     $this->db->where("TH_DEPT_CODE = (SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE UPPER(SM_APPS_USERNAME) = UPPER('$umg'))");
        //     $this->db->where("TH_INTERNAL_EXTERNAL NOT IN ('EXTERNAL_AGENCY')");
        // }
    
        $this->db->where("TH_REF_ID", $refID);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SPEAKER INFO EXTERNAL
    public function getSpeakerInfoExternal($tsrefID, $spID = null)
    {
        $this->db->select("TRAINING_SPEAKER.ROWID AS SPRD, TS_TRAINING_REFID, TS_SPEAKER_ID, TS_TYPE, TS_CONTACT, ES_SPEAKER_NAME, ES_DEPT");
        $this->db->from("EXTERNAL_SPEAKER, TRAINING_SPEAKER");
        $this->db->where("ES_SPEAKER_ID = TS_SPEAKER_ID");
        $this->db->where("TS_TRAINING_REFID", $tsrefID);
        
        if(!empty($spID)) {
            $this->db->where("TS_SPEAKER_ID", $spID);

            $q = $this->db->get();
            
            return $q->row();
        } else {
            $q = $this->db->get();
        
            return $q->result();
        }
    }

    // SPEAKER INFO STAFF
    public function getSpeakerInfoStaff($tsrefID, $spID = null)
    {
        $this->db->select("TS_TYPE, TS_SPEAKER_ID, SM_STAFF_NAME, SM_DEPT_CODE, TS_CONTACT");
        $this->db->from("STAFF_MAIN, TRAINING_SPEAKER");
        $this->db->where("SM_STAFF_ID = TS_SPEAKER_ID");
        $this->db->where("TS_TRAINING_REFID", $tsrefID);

        if(!empty($spID)) {
            $this->db->where("TS_SPEAKER_ID", $spID);

            $q = $this->db->get();
            
            return $q->row();
        } else {
            $q = $this->db->get();
        
            return $q->result();
        }
    }

    // FACILITATOR INFO EXTERNAL
    public function getFacilitatorInfoExternal($tsrefID, $fiID = null)
    {
        $this->db->select("TF_TYPE, EF_FACILITATOR_NAME, TF_FACILITATOR_ID");
        $this->db->from("TRAINING_FACILITATOR, EXTERNAL_FACILITATOR");
        $this->db->where("EF_FACILITATOR_ID = TF_FACILITATOR_ID");
        $this->db->where("TF_TRAINING_REFID", $tsrefID);
        
        if(!empty($fiID)) {
            $this->db->where("TF_FACILITATOR_ID", $fiID);

            $q = $this->db->get();
            
            return $q->row();
        } else {
            $q = $this->db->get();
        
            return $q->result();
        }
    }

    // FACILITATOR INFO STAFF
    public function getFacilitatorInfoStaff($tsrefID, $fiID = null)
    {
        $this->db->select("TF_TYPE, SM_STAFF_NAME, TF_FACILITATOR_ID");
        $this->db->from("TRAINING_FACILITATOR, STAFF_MAIN");
        $this->db->where("SM_STAFF_ID = TF_FACILITATOR_ID");
        $this->db->where("TF_TRAINING_REFID", $tsrefID);
        
        if(!empty($fiID)) {
            $this->db->where("TF_FACILITATOR_ID", $fiID);

            $q = $this->db->get();
            
            return $q->row();
        } else {
            $q = $this->db->get();
        
            return $q->result();
        }
    }

    // DROPDOWN TYPE LIST
    public function getTypeList()
    {
        $this->db->select("TT_CODE, TT_CODE ||' - '|| TT_DESC AS TT_CODE_DESC");
        $this->db->from("TRAINING_TYPE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // SELECT STRUCTURED TRAINING
    public function getStructuredTraining($strTrCode = null)
    {
        $this->db->select("TTH_REF_ID, TTH_REF_ID ||' - '|| TTH_TRAINING_TITLE AS TTH_REF_TITLE, 
        TTH_TRAINING_TITLE, TTH_CATEGORY, TTH_FIELD ||' - '|| TF_FIELD_DESC AS TTH_TF_FIELD_DESC, TTH_TYPE ||' - '|| TT_DESC AS TTH_TT_TYPE_DESC, TTH_COMPETENCY");
        $this->db->from("TNA_TRAINING_HEAD, TRAINING_TYPE, TRAINING_FIELD");
        $this->db->where("TTH_TYPE = TT_CODE");
        $this->db->where("NVL(TTH_STATUS,'INACTIVE') = 'ACTIVE'");
        $this->db->where("TTH_FIELD = TF_CODE");

        if(!empty($strTrCode)){
            $this->db->where("TTH_REF_ID", $strTrCode);
            $q = $this->db->get();
        
            return $q->row();
        } else {
            $this->db->order_by("TTH_REF_ID");
            $q = $this->db->get();
            
            return $q->result();
        }
    }

    // DROPDOWN CATEGORY LIST
    public function getCategoryList()
    {
        $this->db->select("TC_CATEGORY");
        $this->db->from("TRAINING_CATEGORY");
        $this->db->where("NVL(TC_STATUS,'N') = 'Y'");
        $this->db->order_by("1");
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN LEVEL LIST
    public function getLevelList()
    {
        $this->db->select("TL_CODE, TL_CODE ||' - '|| TL_DESC AS TL_CODE_DESC");
        $this->db->from("TRAINING_LEVEL");
        $this->db->order_by("TL_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN AREA LIST
    public function getAreaList()
    {
        $this->db->select("TF_CODE, TF_CODE ||' - '|| TF_FIELD_DESC AS TF_CODE_DESC");
        $this->db->from("TRAINING_FIELD");
        $this->db->where("NVL(TF_STATUS,'N') = 'Y'");
        $this->db->order_by("TF_RANKING");
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN GROUP LIST
    public function getSgroupList()
    {
        //select SG_GROUP_CODE,SG_GROUP_DESC from service_group order by 1
        $this->db->select("SG_GROUP_CODE, SG_GROUP_CODE ||' - '|| SG_GROUP_DESC AS SG_CODE_DESC");
        $this->db->from("SERVICE_GROUP");
        $this->db->order_by("1");
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN COUNTRY LIST
    public function getCountryList() {
        $this->db->select('CM_COUNTRY_CODE, CM_COUNTRY_DESC');
        $this->db->from('COUNTRY_MAIN');
        $this->db->order_by('CM_COUNTRY_DESC');
        $q = $this->db->get();
		        
        return $q->result();
    }

    // DEFAULT COUNTRY
    public function getCountryDef() {
        $this->db->select('CM_COUNTRY_CODE, CM_COUNTRY_DESC');
        $this->db->from('COUNTRY_MAIN');
        $this->db->where("CM_COUNTRY_CODE = 'MYS'");
        $q = $this->db->get();
		        
        return $q->row();
    }

    // DROPDOWN STATE LIST
    public function getCountryStateList($countCode) {
        $this->db->select('SM_STATE_CODE, SM_STATE_DESC, SM_COUNTRY_CODE');
        $this->db->from('STATE_MAIN');
		$this->db->where('SM_COUNTRY_CODE', $countCode);
        $this->db->order_by('SM_STATE_CODE');
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN COMPETENCY LEVEL LIST
    public function getCompetencyLevel() {
        $this->db->select("TCL_COMPETENCY_CODE, TCL_COMPETENCY_CODE ||' - '|| TCL_COMPETENCY_DESC AS TCL_COMPETENCY_CODE_DESC, TCL_SERVICE_YEAR_FROM, TCL_SERVICE_YEAR_TO,TCL_ORDERING");
        $this->db->from('TRAINING_COMPETENCY_LEVEL');
		$this->db->where("TCL_STATUS = 'Y'");
        $this->db->order_by('TCL_ORDERING');
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN STAFF LIST
    public function getCoordinator() {
        $this->db->select("SM_STAFF_ID, SM_STAFF_ID ||' - '|| SM_STAFF_NAME AS SM_STAFF_ID_NAME");
        $this->db->from('STAFF_MAIN, STAFF_STATUS');
        $this->db->where("SM_STAFF_STATUS = SS_STATUS_CODE");
        $this->db->where("SS_STATUS_STS = 'ACTIVE'");
        $this->db->where("SM_STAFF_TYPE = 'STAFF'");
        $this->db->order_by('SM_STAFF_NAME');
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN SECTOR LEVEL LIST
    public function getCoordinatorSec() {
        $this->db->select("TSL_CODE, TSL_CODE ||' - '|| TSL_DESC AS TSL_CODE_DESC");
        $this->db->from('TRAINING_SECTOR_LEVEL');
		$this->db->where("NVL(TSL_STATUS,'N') = 'Y'");
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN ORGANIZER LEVEL LIST
    public function getOrganizerLevel() {
        $this->db->select("TOL_CODE, TOL_CODE ||' - '|| TOL_DESC AS TOL_CODE_DESC");
        $this->db->from('TRAINING_ORGANIZER_LEVEL');
        $this->db->order_by('TOL_CODE');
        $q = $this->db->get();
        
        return $q->result();
    }

    // GET ORGANIZER DETAILS
    public function getOrganizerName($organizerCode = null) {
        $this->db->select("TOH_ORG_CODE, TOH_ORG_DESC, TOH_ORG_CODE ||' - '|| TOH_ORG_DESC AS TOH_ORG_CODE_DESC, TOH_ADDRESS, TOH_POSTCODE, TOH_CITY, SM_STATE_DESC, CM_COUNTRY_DESC");
        $this->db->from('TRAINING_ORGANIZER_HEAD, STATE_MAIN, COUNTRY_MAIN');
        $this->db->where("TOH_STATE=SM_STATE_CODE");
        $this->db->where("TOH_COUNTRY=CM_COUNTRY_CODE");
        $this->db->where("NVL(TOH_EXTERNAL_AGENCY,'N') <> 'Y'");

        if(!empty($organizerCode)) {
            $this->db->where("TOH_ORG_CODE", $organizerCode);
            $q = $this->db->get();
        
            return $q->row();
        } 
        else {
            $this->db->order_by("2");
            $q = $this->db->get();
        
            return $q->result();
        }
        
        
    }

    // GET TARGET GROUP LIST
    public function getTargetGroup($tsrefID, $gpCode = null) {
        $this->db->select("TTG_TRAINING_REFID, TTG_GROUP_CODE, TG_GROUP_DESC, TG_SCHEME, TG_GRADE_FROM, 
                            TG_GRADE_TO, TG_SERVICE_YEAR_FROM, TG_SERVICE_YEAR_TO, TG_SERVICE_GROUP,
                            CASE TG_ACADEMIC
                                WHEN 'Y' THEN 'YES'
                                WHEN 'N' THEN 'NO'
                            END
                            AS TGACADEMIC,
                            CASE TG_NEW_STAFF
                                WHEN 'Y' THEN 'YES'
                                WHEN 'N' THEN 'NO'
                            END
                            AS TGNEWSTAFF,
                            CASE TG_COMPULSORY
                                WHEN 'Y' THEN 'YES'
                                WHEN 'N' THEN 'NO'
                            END
                            AS TGCOMPULSORY, 
                            TG_ACADEMIC, TG_NEW_STAFF, TG_COMPULSORY ");
        $this->db->from("TRAINING_TARGET_GROUP, TNA_GROUP");
        $this->db->where("TTG_TRAINING_REFID", $tsrefID);
        $this->db->where("TTG_GROUP_CODE = TG_GROUP_CODE");

        if(!empty($gpCode)) {
            $this->db->where("TTG_GROUP_CODE", $gpCode);

            $this->db->order_by("TRAINING.GETTARGETGROUPDESC(TTG_GROUP_CODE)");
            $q = $this->db->get();
            
            return $q->row();
        } 
        else 
        {
            $this->db->order_by("TRAINING.GETTARGETGROUPDESC(TTG_GROUP_CODE)");
            $q = $this->db->get();
            
            return $q->result();
        }
    }

    // SELECT TRAINING HEAD DETL
    public function getmoduleSetup($tsrefID) {
        $this->db->select("THD_TRAINING_OBJECTIVE2, THD_TRAINING_CONTENT, THD_MODULE_CATEGORY, THD_MODULE_CATEGORY ||' - '|| TMC_COMPONENT_DESC AS TMCDESC,
        THD_EVALUATION, THD_COORDINATOR, THD_COORDINATOR_TELNO, THD_COORDINATOR_SECTOR");
        $this->db->from("TRAINING_HEAD_DETL");
        $this->db->join("TRAINING_MODULE_COMPONENT", "TMC_COMPONENT_CODE = THD_MODULE_CATEGORY", "LEFT");
        $this->db->where("THD_REF_ID", $tsrefID);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SELECT CPD HEAD
    public function getCpdSetup($tsrefID) {
        $this->db->select("CH_COMPETENCY, CH_CATEGORY, CH_MARK, 
                           CASE WHEN CH_REPORT_SUBMISSION = 'Y' THEN 'YES' ELSE 'NO' END AS REP_SUB, 
                           CASE WHEN CH_COMPULSORY = 'Y' THEN 'YES' ELSE 'NO' END AS CHCOMPULSORY,
                           CH_AUTO");
        $this->db->from("CPD_HEAD");
        $this->db->where("CH_TRAINING_REFID", $tsrefID);
        //$this->db->where("CC_CATEGORY_CODE = CH_CATEGORY");
        $q = $this->db->get();
        
        return $q->row();
    }

    // SELECT CPD CATEGORY
    public function getCpdSetupCategory($cCode) {
        $this->db->select("CC_CATEGORY_CODE ||' - '|| CC_CATEGORY_DESC AS CH_CC_CATEGORY_DESC");
        $this->db->from("CPD_CATEGORY");
        $this->db->where("CC_CATEGORY_CODE", $cCode);
        $q = $this->db->get();
        
        return $q->row();
    }

    // COUNT TARGET GROUP
    public function getCountTargetGroup($tsrefID) {
        $this->db->select("COUNT(1) AS COUNT_TG");
        $this->db->from("TRAINING_TARGET_GROUP");
        $this->db->where("TTG_TRAINING_REFID", $tsrefID);
        $q = $this->db->get();
        
        return $q->row();
    }

    // TARGET GROUP STRUCTURED TRAINING
    public function getValueStrTrTargetGroup($strRefID) {
        $this->db->select("TTG_GROUP_CODE");
        $this->db->from("TNA_TARGET_GROUP, TNA_GROUP");
        $this->db->where("TTG_REF_ID", $strRefID);
        $this->db->where("TG_GROUP_CODE = TTG_GROUP_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // GET REFID
    public function getRefID() {
        // $this->db->select("MAX(TO_NUMBER(REGEXP_REPLACE(TH_REF_ID,'\D',''))) + 1 AS TESTREFID");
        // $this->db->from('TRAINING_HEAD');

        $this->db->select("to_char(sysdate,'yyyy')||'-'||ltrim(to_char(training_head_seq.nextval,'000000')) AS REF_ID");
        $this->db->from("DUAL");
        $q = $this->db->get();
        
        return $q->row();
    }

    // GET ALL TNA_TARGET_GROUP BASED ON STRUCTURED TRAINING CODE
    public function getResultTTG($trCode) {
        $this->db->select("TTG_GROUP_CODE");
        $this->db->from("TNA_TARGET_GROUP, TNA_GROUP");
        $this->db->where("TTG_REF_ID",$trCode);
        $this->db->where("TG_GROUP_CODE = TTG_GROUP_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // GET ALL TRAINING GROUP SERVICE BASED ON STRUCTURED TRAINING CODE
    public function getResultTGS($trCode) {
        $this->db->select("TTG_GROUP_CODE, TGS_SEQ, TGS_SERVICE_CODE");
        $this->db->from("TNA_GROUP_SERVICE, TNA_TARGET_GROUP");
        $this->db->where("TGS_GRPSERV_CODE = TTG_GROUP_CODE");
        $this->db->where("TTG_REF_ID", $trCode);
        $q = $this->db->get();
        
        return $q->result();
    }

    // SELECT TRAINING GROUP SERVICE 
    public function checkTGS($gpCode, $tgsSeq) {
        $this->db->select("TGS_GRPSERV_CODE, TGS_SEQ");
        $this->db->from("TRAINING_GROUP_SERVICE");
        $this->db->where("TGS_GRPSERV_CODE", $gpCode);
        $this->db->where("TGS_SEQ", $tgsSeq);
        $q = $this->db->get();
        
        return $q->result();
    }

    // SELECT TRAINING HEAD DETAIL
    public function getTrHeadDetl($refID) {
        $this->db->select("*");
        $this->db->from("TRAINING_HEAD_DETL");
        $this->db->where("THD_REF_ID", $refID);
        
        $q = $this->db->get();
        return $q->row();
    }

    // GET SPEAKER LIST AND SELECT SPEAKER
    public function getSpeakerList($tpSpeaker, $trSpeakerCode = null) {
        if(empty($trSpeakerCode)) {
            if($tpSpeaker == 'STAFF') {
                $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_DEPT_CODE, SM_STAFF_ID ||' - '|| SM_STAFF_NAME AS STAFF_ID_NAME");
                $this->db->from("STAFF_MAIN, STAFF_STATUS, DEPARTMENT_MAIN");
                $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS");
                $this->db->where("SS_STATUS_STS = 'ACTIVE'");
                $this->db->where("SM_DEPT_CODE = DM_DEPT_CODE");
                $this->db->order_by("2,1");
            } 
            elseif($tpSpeaker == 'EXTERNAL') {
                $this->db->select("ES_SPEAKER_ID, ES_SPEAKER_NAME, ES_DEPT, ES_TELNO_WORK, ES_SPEAKER_ID ||' - '|| ES_SPEAKER_NAME AS ES_SPEAKER_ID_NAME");
                $this->db->from("EXTERNAL_SPEAKER");
                $this->db->where("ES_STATUS = 'ACTIVE'");
                $this->db->order_by("2");
            }
    
            $q = $this->db->get();
            return $q->result();
        } 
        elseif(!empty($trSpeakerCode)) {
            if($tpSpeaker == 'STAFF') {
                $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_DEPT_CODE, SM_TELNO_WORK, SM_STAFF_ID ||' - '|| SM_STAFF_NAME AS STAFF_ID_NAME");
                $this->db->from("STAFF_MAIN, STAFF_STATUS, DEPARTMENT_MAIN");
                $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS");
                $this->db->where("SS_STATUS_STS = 'ACTIVE'");
                $this->db->where("SM_DEPT_CODE = DM_DEPT_CODE");
                $this->db->where("SM_STAFF_ID", $trSpeakerCode);
            } 
            elseif($tpSpeaker == 'EXTERNAL') {
                $this->db->select("ES_SPEAKER_ID, ES_SPEAKER_NAME, ES_DEPT, ES_TELNO_WORK, ES_SPEAKER_ID ||' - '|| ES_SPEAKER_NAME AS ES_SPEAKER_ID_NAME");
                $this->db->from("EXTERNAL_SPEAKER");
                $this->db->where("ES_STATUS = 'ACTIVE'");
                $this->db->where("ES_SPEAKER_ID", $trSpeakerCode);
            }
    
            $q = $this->db->get();
            return $q->row();        
        }
    }

    // GET FACILITATOR LIST AND SELECT FACILITATOR
    public function getFacilitatorList($tpFacilitator, $trSpeakerCode = null) {

        if(!empty($tpFacilitator)) {
            if($tpFacilitator == 'STAFF') {
                $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID ||' - '|| SM_STAFF_NAME AS STAFF_ID_NAME");
                $this->db->from("STAFF_MAIN, STAFF_STATUS");
                $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS");
                $this->db->where("SS_STATUS_STS = 'ACTIVE'");
                $this->db->order_by("2,1");
            } 
            elseif($tpFacilitator == 'EXTERNAL') {
                $this->db->select("EF_FACILITATOR_ID, EF_FACILITATOR_NAME, EF_FACILITATOR_ID ||' - '|| EF_FACILITATOR_NAME AS ES_FACILITATOR_ID_NAME");
                $this->db->from("EXTERNAL_FACILITATOR");
                $this->db->order_by("2");
            }
    
            $q = $this->db->get();
            return $q->result();
        }
    }

    // SELECT TRAINING SPEAKER
    public function checkTrainingSpeaker($refID, $spID) {
        $this->db->select("TS_TRAINING_REFID, TS_SPEAKER_ID, TS_TYPE, TS_CONTACT");
        $this->db->from("TRAINING_SPEAKER");
        $this->db->where("TS_SPEAKER_ID", $spID);
        $this->db->where("TS_TRAINING_REFID", $refID);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SELECT TRAINING FACILITATOR
    public function checkTrainingFacilitator($refID, $fiID) {
        $this->db->select("*");
        $this->db->from("TRAINING_FACILITATOR");
        $this->db->where("TF_FACILITATOR_ID", $fiID);
        $this->db->where("TF_TRAINING_REFID", $refID);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SELECT TRAINING NEED ANALYSIS GROUP
    public function getTargetGroupList($groupCode = null) {

        if(!empty($groupCode)) {
            $this->db->select("TG_GROUP_DESC, TG_SCHEME, TG_GRADE_FROM, 
                               TG_GRADE_TO, TG_SERVICE_YEAR_FROM, TG_SERVICE_YEAR_TO, 
                               TG_SERVICE_GROUP,
                               CASE TG_ACADEMIC
                                WHEN 'Y' THEN 'YES'
                                WHEN 'N' THEN 'NO'
                                END
                               AS TGACADEMIC,
                               CASE TG_NEW_STAFF
                                    WHEN 'Y' THEN 'YES'
                                    WHEN 'N' THEN 'NO'
                                END
                               AS TGNEWSTAFF,
                               CASE TG_COMPULSORY
                                    WHEN 'Y' THEN 'YES'
                                    WHEN 'N' THEN 'NO'
                                END
                               AS TGCOMPULSORY,
                               TG_ACADEMIC, TG_NEW_STAFF, TG_COMPULSORY ");
            $this->db->from("TNA_GROUP");
            $this->db->where("TG_GROUP_CODE", $groupCode);

            $q = $this->db->get();
            return $q->row();
        } 
        
        if(empty($groupCode)) {
            $this->db->select("TG_GROUP_CODE, TG_GROUP_DESC, TG_GROUP_CODE ||' - '|| TG_GROUP_DESC AS TG_GROUP_CODE_DESC, 
                               TG_SCHEME, TG_SERVICE_GROUP, 
                               TG_GRADE_FROM, TG_GRADE_TO, TG_ACADEMIC, TG_COMPULSORY,
                               TG_NEW_STAFF, TG_SERVICE_YEAR_FROM, TG_SERVICE_YEAR_TO,
                               TG_OPTION, TG_STATUS");
            $this->db->from("TNA_GROUP");
            $this->db->where("TG_STATUS = 'ACTIVE'");
            $this->db->order_by("TG_GROUP_DESC");

            $q = $this->db->get();
            return $q->result();
        }
    }

    // SELECT TRAINING TARGET GROUP BASED ON REFID & GROUP CODE
    public function getTargetGroupDetail($refid, $gpCode) {
        $this->db->select("*");
        $this->db->from("TRAINING_TARGET_GROUP");
        $this->db->where("TTG_TRAINING_REFID", $refid);
        $this->db->where("TTG_GROUP_CODE", $gpCode);

        $q = $this->db->get();
        return $q->row();
    }

    // SELECT TRAINING TARGET GROUP BASED ON REFID
    public function delTargetGroupVerify($gpCode) {
        $this->db->select("1");
        $this->db->from("TRAINING_GROUP_SERVICE");
        $this->db->where("TGS_GRPSERV_CODE", $gpCode);

        $q = $this->db->get();
        return $q->result();
    }

    // GET SERVICE SCHEME BASED ON GROUP CODE
    public function getListEgPosition($groupCode) {
        $this->db->select("TGS_GRPSERV_CODE, TGS_SEQ, TGS_SERVICE_CODE, SS_SERVICE_DESC");
        $this->db->from("TRAINING_GROUP_SERVICE");
        $this->db->join('SERVICE_SCHEME', 'TRAINING_GROUP_SERVICE.TGS_SERVICE_CODE = SERVICE_SCHEME.SS_SERVICE_CODE', 'LEFT');
        $this->db->where("TGS_GRPSERV_CODE", $groupCode);

        $q = $this->db->get();
        return $q->result();
    }

    // GET TRAINING MODULE COMPONENT
    public function getCompList() {
        $this->db->select("TMC_COMPONENT_CODE, TMC_COMPONENT_CODE ||' - '|| TMC_COMPONENT_DESC TMC_CODE_DESC");
        $this->db->from("TRAINING_MODULE_COMPONENT");
        $this->db->order_by("TMC_COMPONENT_CODE");

        $q = $this->db->get();
        return $q->result();
    }

    // GET CPD CATEGORY LIST
    public function getCpdCategoryList() {
        $this->db->select("CC_CATEGORY_CODE, CC_CATEGORY_CODE ||' - '|| CC_CATEGORY_DESC AS CC_CODE_DESC");
        $this->db->from("CPD_CATEGORY");

        $q = $this->db->get();
        return $q->result();
    }

    // VERIFY DELETE TRAINING SPEAKER
    public function delVerifyTrSP($refid) {
        $this->db->select("1");
        $this->db->from("TRAINING_SPEAKER T");
        $this->db->where("T.TS_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // VERIFY DELETE TRAINING FACILITATOR
    public function delVerifyTrFi($refid) {
        $this->db->select("1");
        $this->db->from("TRAINING_FACILITATOR T");
        $this->db->where("T.TF_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // VERIFY DELETE TRAINING TARGET GROUP
    public function delVerifyTrGrp($refid) {
        $this->db->select("1");
        $this->db->from("TRAINING_TARGET_GROUP T");
        $this->db->where("T.TTG_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // VERIFY DELETE TRAINING MODULE SETUP
    public function delVerifyModSet($refid) {
        $this->db->select("1");
        $this->db->from("TRAINING_HEAD_DETL T");
        $this->db->where("T.THD_REF_ID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // VERIFY DELETE TRAINING CPD SETUP
    public function delVerifyCpdSet($refid) {
        $this->db->select("1");
        $this->db->from("CPD_HEAD C");
        $this->db->where("C.CH_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    /*_____________________
        ADD PROCESS
    _______________________*/

    // INSERT TRAINING HEAD
    public function insertTrainingHead($form, $refid)
    {
        $umg = $this->staff_id;
        $staff_dept_code = "(SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE SM_STAFF_ID = '$umg')";
        $enter_date = 'SYSDATE';

        $refID = $refid;

        $data = array(
            "TH_REF_ID" => $refID,
            "TH_TYPE" => $form['type'],
            "TH_CATEGORY" => $form['category'],
            "TH_TRAINING_CODE" => $form['structured_training'],
            "TH_LEVEL" => $form['level'],
            "TH_FIELD" => $form['area'],
            "TH_SERVICE_GROUP" => $form['service_group'],
            "TH_TRAINING_TITLE" => $form['training_title'],
            "TH_TRAINING_DESC" => $form['training_description'],
            "TH_TRAINING_VENUE" => $form['venue'],
            "TH_TRAINING_COUNTRY" => $form['country'],
            "TH_TRAINING_STATE" => $form['state'],
            "TH_TOTAL_HOURS" => $form['total_hours'],
            "TH_INTERNAL_EXTERNAL" => $form['internal_external'],
            "TH_SPONSOR" => $form['sponsor'],
            "TH_OFFER" => $form['offer'],
            "TH_MAX_PARTICIPANT" => $form['participants'],
            "TH_OPEN" => $form['online_application'],
            "TH_COMPETENCY_CODE" => $form['competency_code'],

            // organizer info
            "TH_ORGANIZER_LEVEL" => $form['organizer_level'],
            "TH_ORGANIZER_NAME" => $form['organizer_name'],

            // completion info
            "TH_EVALUATION_COMPULSORY" => $form['evaluation_compulsary'],
            "TH_ATTENDANCE_TYPE" => $form['attendance_type'],
            "TH_PRINT_CERTIFICATE" => $form['print_certificate'],

            "TH_ENTER_BY" => $umg,
            "TH_STATUS" => 'ENTRY'
        );

        //$this->db->set("TH_REF_ID", $refID, false);
        $this->db->set("TH_DEPT_CODE", $staff_dept_code, false);
        $this->db->set("TH_ENTER_DATE", $enter_date, false);

        if(!empty($form['date_from'])){
            $date_from = "TO_DATE('".$form['date_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_DATE_FROM", $date_from, false);

            if(!empty($form['time_from'])){
                $time_from = "TO_DATE('".$form['date_from']." ".$form['time_from']."', 'DD/MM/YYYY HH12:MI PM')";
                $this->db->set("TH_TIME_FROM", $time_from, false);
            }

            if(!empty($form['time_to'])){
                $time_to = "TO_DATE('".$form['date_from']." ".$form['time_to']."', 'DD/MM/YYYY HH12:MI PM')";
                $this->db->set("TH_TIME_TO", $time_to, false);
            }
        }

        if(!empty($form['date_to'])){
            $date_to = "TO_DATE('".$form['date_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_DATE_TO", $date_to, false);
        }

        if(!empty($form['closing_date'])){
            $closing_date = "TO_DATE('".$form['closing_date']."', 'DD/MM/YYYY')";
            $this->db->set("TH_APPLY_CLOSING_DATE", $closing_date, false);
        }

        if(!empty($form['evaluation_period_from'])){
            $evaluation_period_from = "TO_DATE('".$form['evaluation_period_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_FROM", $evaluation_period_from, false);
        }

        if(!empty($form['evaluation_period_to'])){
            $evaluation_period_to = "TO_DATE('".$form['evaluation_period_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_TO", $evaluation_period_to, false);
        }

        if(!empty($form['confirmation_due_date_from'])){
            $confirmation_due_date_from = "TO_DATE('".$form['confirmation_due_date_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_CONFIRM_DATE_FROM", $confirmation_due_date_from, false);
        }

        if(!empty($form['confirmation_due_date_to'])){
            $confirmation_due_date_to = "TO_DATE('".$form['confirmation_due_date_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_CONFIRM_DATE_TO", $confirmation_due_date_to, false);
        }

        return $this->db->insert("TRAINING_HEAD", $data);
    }

    // INSERT TRAINING TARGET GROUP
    public function insertTrainingTargetGroup($refid, $gpCode)
    {
        $insertDate = 'SYSDATE';
        $enterBy = $this->staff_id;

        $data = array(
            "TTG_TRAINING_REFID" => $refid,
            "TTG_GROUP_CODE" => $gpCode,
            "TTG_STRUCTURED" => 'Y',
            "TTG_ENTER_BY" => $enterBy,
        );

        $this->db->set("TTG_ENTER_DATE", $insertDate, false);

        return $this->db->insert("TRAINING_TARGET_GROUP", $data);
    }

    // INSERT TRAINING GROUP SERVICE
    public function insertTrainingGroupService($gpCode, $tgsSeq, $tgsSvcCode)
    {
        $data = array(
            "TGS_GRPSERV_CODE" => $gpCode,
            "TGS_SEQ" => $tgsSeq,
            "TGS_SERVICE_CODE" => $tgsSvcCode
        );

        return $this->db->insert("TRAINING_GROUP_SERVICE", $data);
    }

    // INSERT CPD HEAD FROM INSERT TRAINING INFO
    public function insertCPDHead($refid, $competency)
    {
        $data = array(
            "CH_TRAINING_REFID" => $refid,
            "CH_COMPETENCY" => $competency,
            "CH_REPORT_SUBMISSION" => 'N'
        );

        return $this->db->insert("CPD_HEAD", $data);
    }

    // INSERT TRAINING HEAD DETAIL FROM INSERT TRAINING INFO
    public function insertTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD)
    {
        $data = array(
            "THD_REF_ID" => $refid,
            "THD_COORDINATOR" => $coor,
            "THD_COORDINATOR_SECTOR" => $coorSeq,
            "THD_COORDINATOR_TELNO" => $coorContact,
            "THD_EVALUATION" => $evaluationTHD,
        );

        return $this->db->insert("TRAINING_HEAD_DETL", $data);
    }
    
    // INSERT TRAINING SPEAKER
    public function insertTrainingSpeaker($form, $refid)
    {
        $data = array(
            "TS_TRAINING_REFID" => $refid,
            "TS_SPEAKER_ID" => $form['speaker'],
            "TS_TYPE" => $form['type'],
            "TS_CONTACT" => $form['contact_phone_no'],
        );

        return $this->db->insert("TRAINING_SPEAKER", $data);
    }

    // INSERT TRAINING FACILITATOR
    public function insertTrainingFacilitator($form, $refid)
    {
        $data = array(
            "TF_TRAINING_REFID" => $refid,
            "TF_FACILITATOR_ID" => $form['facilitator'],
            "TF_TYPE" => $form['type'],
        );

        return $this->db->insert("TRAINING_FACILITATOR", $data);
    }

    // INSERT TRAINING TARGET GROUP
    public function insertTrainingTG($form, $refid)
    {
        $umg = $this->staff_id;
        $eDate = 'SYSDATE';

        $data = array(
            "TTG_TRAINING_REFID" => $refid,
            "TTG_GROUP_CODE" => $form['group_code'],
            "TTG_ENTER_BY" => $umg,
        );
        
        //$this->db->set("TTG_ENTER_BY", $umg, false);
        $this->db->set("TTG_ENTER_DATE", $eDate, false);

        return $this->db->insert("TRAINING_TARGET_GROUP", $data);
    }

    // INSERT TRAINING HEAD DETAIL
    public function insertModuleSetup($form, $refid)
    {
        $data = array(
            "THD_REF_ID" => $refid,
            "THD_TRAINING_OBJECTIVE2" => $form['specific_objectives'],
            "THD_TRAINING_CONTENT" => $form['contents'],
            "THD_MODULE_CATEGORY" => $form['component_category'],
        );

        return $this->db->insert("TRAINING_HEAD_DETL", $data);
    }

    // INSERT TRAINING HEAD
    public function insertCpdSetup($form, $refid)
    {
        $data = array(
            "CH_TRAINING_REFID" => $refid,
            "CH_COMPETENCY" => $form['competency'],
            "CH_CATEGORY" => $form['category'],
            "CH_MARK" => $form['mark'],
            "CH_REPORT_SUBMISSION" => $form['report_submission'],
            "CH_COMPULSORY" => $form['compulsory']
        );

        return $this->db->insert("CPD_HEAD", $data);
    }

    /*_____________________
        UPDATE PROCESS
    _______________________*/
    
    // UPDATE TRAINING HEAD
    public function updateTrainingHead($form, $refid)
    {
        $umg = $this->staff_id;
        $staff_dept_code = "(SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE SM_STAFF_ID = '$umg')";
        $enter_date = 'SYSDATE';

        $defScCode = $form['sc_code'];
        $sts = '';

        if($defScCode == 'ATF044') {
            $sts = 'APPROVE';
        } else {
            $sts = 'ENTRY';
        }

        //$refID = $refid;

        $data = array(
            "TH_TYPE" => $form['type'],
            "TH_CATEGORY" => $form['category'],
            "TH_TRAINING_CODE" => $form['structured_training'],
            "TH_LEVEL" => $form['level'],
            "TH_FIELD" => $form['area'],
            "TH_SERVICE_GROUP" => $form['service_group'],
            "TH_TRAINING_TITLE" => $form['training_title'],
            "TH_TRAINING_DESC" => $form['training_description'],
            "TH_TRAINING_VENUE" => $form['venue'],
            "TH_TRAINING_COUNTRY" => $form['country'],
            "TH_TRAINING_STATE" => $form['state'],
            "TH_TOTAL_HOURS" => $form['total_hours'],
            "TH_INTERNAL_EXTERNAL" => $form['internal_external'],
            "TH_SPONSOR" => $form['sponsor'],
            "TH_OFFER" => $form['offer'],
            "TH_MAX_PARTICIPANT" => $form['participants'],
            "TH_OPEN" => $form['online_application'],
            "TH_COMPETENCY_CODE" => $form['competency_code'],

            // organizer info
            "TH_ORGANIZER_LEVEL" => $form['organizer_level'],
            "TH_ORGANIZER_NAME" => $form['organizer_name'],

            // completion info
            "TH_EVALUATION_COMPULSORY" => $form['evaluation_compulsary'],
            "TH_ATTENDANCE_TYPE" => $form['attendance_type'],
            "TH_PRINT_CERTIFICATE" => $form['print_certificate'],

            "TH_ENTER_BY" => $umg,
            "TH_STATUS" => $sts
        );

        //$this->db->set("TH_REF_ID", $refID, false);
        $this->db->set("TH_DEPT_CODE", $staff_dept_code, false);
        $this->db->set("TH_ENTER_DATE", $enter_date, false);

        if(!empty($form['date_from'])){
            $date_from = "TO_DATE('".$form['date_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_DATE_FROM", $date_from, false);

            if(!empty($form['time_from'])){
                $time_from = "TO_DATE('".$form['date_from']." ".$form['time_from']."', 'DD/MM/YYYY HH12:MI PM')";
                $this->db->set("TH_TIME_FROM", $time_from, false);
            }

            if(!empty($form['time_to'])){
                $time_to = "TO_DATE('".$form['date_from']." ".$form['time_to']."', 'DD/MM/YYYY HH12:MI PM')";
                $this->db->set("TH_TIME_TO", $time_to, false);
            }
        }

        if(!empty($form['date_to'])){
            $date_to = "TO_DATE('".$form['date_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_DATE_TO", $date_to, false);
        }

        if(!empty($form['closing_date'])){
            $closing_date = "TO_DATE('".$form['closing_date']."', 'DD/MM/YYYY')";
            $this->db->set("TH_APPLY_CLOSING_DATE", $closing_date, false);
        }

        if(!empty($form['evaluation_period_from'])){
            $evaluation_period_from = "TO_DATE('".$form['evaluation_period_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_FROM", $evaluation_period_from, false);
        }

        if(!empty($form['evaluation_period_to'])){
            $evaluation_period_to = "TO_DATE('".$form['evaluation_period_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_TO", $evaluation_period_to, false);
        }

        if(!empty($form['confirmation_due_date_from'])){
            $confirmation_due_date_from = "TO_DATE('".$form['confirmation_due_date_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_CONFIRM_DATE_FROM", $confirmation_due_date_from, false);
        }

        if(!empty($form['confirmation_due_date_to'])){
            $confirmation_due_date_to = "TO_DATE('".$form['confirmation_due_date_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_CONFIRM_DATE_TO", $confirmation_due_date_to, false);
        }

        $this->db->where("TH_REF_ID",$refid);

        return $this->db->update("TRAINING_HEAD", $data);
    }

    // UPDATE CPD HEAD FROM TRAINING INFO FORM
    public function updateCPDHead($refid, $competency)
    {
        $data = array(
            //"CH_TRAINING_REFID" => $refid,
            "CH_COMPETENCY" => $competency,
            "CH_REPORT_SUBMISSION" => 'N'
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    // UPDATE TRAINING HEAD DETAIL
    public function updateTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD)
    {
        $data = array(
            //"THD_REF_ID" => $refid,
            "THD_COORDINATOR" => $coor,
            "THD_COORDINATOR_SECTOR" => $coorSeq,
            "THD_COORDINATOR_TELNO" => $coorContact,
            "THD_EVALUATION" => $evaluationTHD,
        );

        $this->db->where("THD_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD_DETL", $data);
    }

    // UPDATE TRAINING SPEAKER
    public function updateTrainingSpeaker($form, $refid, $spID)
    {
        $data = array(
            "TS_CONTACT" => $form['contact_phone_no']
        );

        $this->db->where("TS_TRAINING_REFID", $refid);
        $this->db->where("TS_SPEAKER_ID", $spID);

        return $this->db->update("TRAINING_SPEAKER", $data);
    }

    // UPDATE TRAINING HEAD DETAIL 1
    public function updateMs1($form, $refid)
    {
        $data = array(
            "THD_TRAINING_OBJECTIVE2" => $form['specific_objectives']
        );

        $this->db->where("THD_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD_DETL", $data);
    }

    // UPDATE TRAINING HEAD DETAIL 2
    public function updateMs2($form, $refid)
    {
        $data = array(
            "THD_TRAINING_CONTENT" => $form['contents']
        );

        $this->db->where("THD_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD_DETL", $data);
    }

    // UPDATE TRAINING HEAD DETAIL 3
    public function updateMs3($form, $refid)
    {
        $data = array(
            "THD_MODULE_CATEGORY" => $form['component_category']
        );

        $this->db->where("THD_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD_DETL", $data);
    }

    // UPDATE CPD HEAD 1
    public function updateCpd1($form, $refid)
    {
        $data = array(
            "CH_COMPETENCY" => $form['competency']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    // UPDATE CPD HEAD 2
    public function updateCpd2($form, $refid)
    {
        $data = array(
            "CH_CATEGORY" => $form['category']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    // UPDATE CPD HEAD 3
    public function updateCpd3($form, $refid)
    {
        $data = array(
            "CH_MARK" => $form['mark']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    // UPDATE CPD HEAD 4
    public function updateCpd4($form, $refid)
    {
        $data = array(
            "CH_REPORT_SUBMISSION" => $form['report_submission']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    // UPDATE CPD HEAD 5
    public function updateCpd5($form, $refid)
    {
        $data = array(
            "CH_COMPULSORY" => $form['compulsory']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    /*_____________________
        DELETE PROCESS
    _______________________*/

    // DELETE TRAINING HEAD
    public function delTrainingInfo($refid) {
        $this->db->where('TH_REF_ID', $refid);
        return $this->db->delete('TRAINING_HEAD');
    }

    // DELETE TRAINING SPEAKER
    public function delTrainingSpeaker($refid, $spID) {
        $this->db->where('TS_TRAINING_REFID', $refid);
        $this->db->where('TS_SPEAKER_ID', $spID);
        return $this->db->delete('TRAINING_SPEAKER');
    }

    // DELETE TRAINING FACILITATOR
    public function delTrainingFacilitator($refid, $fiID) {
        $this->db->where('TF_TRAINING_REFID', $refid);
        $this->db->where('TF_FACILITATOR_ID', $fiID);
        return $this->db->delete('TRAINING_FACILITATOR');
    }

    // DELETE TRAINING TARGET GROUP
    public function delTargetGroup($refid, $gpCode) {
        $this->db->where('TTG_TRAINING_REFID', $refid);
        $this->db->where('TTG_GROUP_CODE', $gpCode);
        return $this->db->delete('TRAINING_TARGET_GROUP');
    }

    // DELETE TRAINING HEAD DETAIL
    public function delModuleSetup($refid) {
        $this->db->where('THD_REF_ID', $refid);
        return $this->db->delete('TRAINING_HEAD_DETL');
    }

    // DELETE CPD HEAD
    public function delCpdSetup($refid) {
        $this->db->where('CH_TRAINING_REFID', $refid);
        return $this->db->delete('CPD_HEAD');
    }

    // DELETE TRAINING GROUP SERVICE
    public function delTrainingGpService($gpCode, $tgsSeq) {
        $this->db->where('TGS_GRPSERV_CODE', $gpCode);
        $this->db->where('TGS_SEQ', $tgsSeq);
        return $this->db->delete('TRAINING_GROUP_SERVICE');
    }



    /*===========================================================
       TRAINING APPLICATION [APPROVE TRAINING APPLICATIONS]
    =============================================================*/

    /*_____________________
        GET BASIC INFO
    _______________________*/

    // GET CURRENT DEFAULT USER DEPARTMENT - STAFF MAIN
    public function getCurUserDept($staffID = null) {

        $curUsername = $this->username;

        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_DEPT_CODE, SM_EMAIL_ADDR");
        $this->db->from("STAFF_MAIN");



        if(empty($staffID)) {
            $this->db->where("SM_APPS_USERNAME", $curUsername);
        } else {
            $this->db->where("SM_STAFF_ID", $staffID);
        }
        
        $q = $this->db->get();
        return $q->row();
    }

    // GET CURRENT DEFAULT YEAR
    public function getCurYear() {
        $this->db->select("TO_CHAR(SYSDATE, 'YYYY') AS CUR_YEAR");
        $this->db->from("DUAL");
        
        $q = $this->db->get();
        return $q->row();
    }

    // GET TRAINING HEAD BASED ON FILTER
    public function getTrainingList($defIntExt = null, $curUsrDept = null, $defMonth = null, $curYear = null, $defTrSts = null)
    {
        $this->db->select('*');
        $this->db->from('TRAINING_HEAD');
        if(!empty($curUsrDept)) {
            $this->db->where("TH_DEPT_CODE = '$curUsrDept'");
        }

        if(!empty($defMonth) && !empty($curYear)) {
            $this->db->where("((NVL(TO_CHAR(TH_DATE_FROM,'MM/YYYY'),'') = '$defMonth'||'/'||'$curYear'))");
        } elseif(!empty($defMonth)) {
            $this->db->where("((NVL(TO_CHAR(TH_DATE_FROM,'MM'),'') = '$defMonth'))");
        } elseif(!empty($curYear)) {
            $this->db->where("((NVL(TO_CHAR(TH_DATE_FROM,'YYYY'),'') = '$curYear'))");
        }
        
        if($defIntExt == 'INTERNAL' || $defIntExt == 'EXTERNAL' || $defIntExt == 'EXTERNAL_AGENCY' ) {
            $this->db->where("TH_INTERNAL_EXTERNAL", $defIntExt);
        } elseif($defIntExt == '1') {
            $this->db->where("TH_INTERNAL_EXTERNAL NOT IN ('EXTERNAL_AGENCY')");
        }

        if($defTrSts == 'POSTPONE' || $defTrSts == 'REJECT' || $defTrSts == 'APPROVE' || $defTrSts == 'ENTRY') {
            $this->db->where("TH_STATUS", $defTrSts);
        } elseif(empty($defTrSts)) {
            $this->db->where("NVL(TH_STATUS,'ENTRY') = 'APPROVE'");
        } 
        
        $this->db->order_by("TH_DATE_FROM, TH_DATE_TO, TH_TRAINING_TITLE");

        $q = $this->db->get();
        return $q->result();
    }

    // GET TRAINING DETAIL
    public function getTrDetl($refid)
    {
        $this->db->select("TH_REF_ID, 
                            TH_TRAINING_TITLE,
                            TH_TRAINING_VENUE,
                            TO_CHAR(TH_DATE_FROM, 'DD/MM/YYYY') AS TH_DATEFR,
                            TO_CHAR(TH_DATE_TO, 'DD/MM/YYYY') AS TH_DATETO,  
                            TO_CHAR(TH_TIME_FROM, 'HH:MI AM') AS TIME_FR, 
                            TO_CHAR(TH_TIME_TO, 'HH:MI AM') AS TIME_T, 
                            TO_CHAR(TH_CONFIRM_DATE_TO, 'DD/MM/YYYY') AS TH_CON_DATE_TO");
        $this->db->from('TRAINING_HEAD');
        $this->db->where("TH_REF_ID", $refid);
        $this->db->where("TH_STATUS= 'APPROVE'");

        $q = $this->db->get();
        return $q->row();
    }

    // GET DEPARTMENT LIST
    public function getDeptList() {
        $this->db->select("DM_DEPT_CODE, DM_DEPT_DESC, DM_DEPT_CODE ||' - '|| DM_DEPT_DESC AS DEPT_CODE_DESC");
        $this->db->from('DEPARTMENT_MAIN');
		$this->db->where('NVL(DM_STATUS,\'INACTIVE\')', 'ACTIVE');
		$this->db->where('DM_LEVEL <= 2');
        $this->db->order_by('DM_DEPT_CODE');
        $q = $this->db->get();
		        
        return $q->result();
    }

    // GET YEAR DROPDOWN
    public function getYearList() {		
        $this->db->select("TO_CHAR(CM_DATE, 'YYYY') AS CM_YEAR");
        $this->db->from("CALENDAR_MAIN");
		$this->db->where("TO_CHAR(CM_DATE, 'YYYY') >= TO_CHAR(SYSDATE, 'YYYY') - 15");
        $this->db->group_by("TO_CHAR(CM_DATE, 'YYYY')");
        $this->db->order_by("TO_CHAR(CM_DATE, 'YYYY') DESC");
        $q = $this->db->get();
		        
        return $q->result();
    } 

    // GET MONTH DROPDOWN
    public function getMonthList() {		
        $this->db->select("TO_CHAR(CM_DATE, 'MM') AS CM_MM, TO_CHAR(CM_DATE, 'MONTH') AS CM_MONTH");
        $this->db->from("CALENDAR_MAIN");
        $this->db->group_by("TO_CHAR(CM_DATE,'MM'), TO_CHAR(CM_DATE, 'MONTH')");
        $this->db->order_by("TO_CHAR(CM_DATE, 'MM')");
        $q = $this->db->get();
		        
        return $q->result();
    } 

    // GET STAFF LIST BASED FROM TRAINING
    public function getStaffTrainingApplication($refid, $staffID = null)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_DEPT_CODE, 
                           SJS_STATUS_DESC, STH_STATUS, SM_EMAIL_ADDR, 
                           TO_CHAR(STH_APPLY_DATE) AS STHAPPDATE,
                           STH_DEPT_TRAINING_BENEFIT");
        $this->db->from('STAFF_TRAINING_HEAD');
        $this->db->join("STAFF_MAIN", "STH_STAFF_ID = SM_STAFF_ID");
        $this->db->join("STAFF_SERVICE", "STH_STAFF_ID = SS_STAFF_ID");
        $this->db->join("STAFF_JOB_STATUS", "SS_JOB_STATUS = SJS_STATUS_CODE");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->where("STH_STATUS = 'RECOMMEND'");

        if(!empty($staffID)) {
            $this->db->where("SM_STAFF_ID", $staffID);

            $q = $this->db->get();
            return $q->row();
        } else {
            $this->db->order_by("SM_STAFF_NAME");

            $q = $this->db->get();
            return $q->result();
        }   
    }

    // GET EVALUATOR INFO
    public function getEvaluatorInfo($refid, $staffID)
    {
        $query = "SELECT SM_STAFF_ID||' - '||SM_STAFF_NAME||' ('||SM_EMAIL_ADDR||')' AS STAFF
        FROM STAFF_TRAINING_HEAD, STAFF_MAIN
        WHERE STH_TRAINING_REFID = '$refid'
        AND STH_STATUS = 'RECOMMEND'
        AND NVL(STH_VERIFY_BY,STH_RECOMMEND_BY) = SM_STAFF_ID
        AND STH_STAFF_ID = '$staffID'
        UNION
        SELECT SM_STAFF_ID||' - '||SM_STAFF_NAME||' ('||SM_EMAIL_ADDR||')' AS STAFF
        FROM LEAVE_STAFF_HIERARCHY,STAFF_MAIN,STAFF_TRAINING_HEAD
        WHERE LEAVE_STAFF_HIERARCHY.LSH_STAFF_ID = STH_STAFF_ID
        AND STH_TRAINING_REFID = '$refid'
        AND STH_STATUS = 'RECOMMEND'
        AND STH_VERIFY_BY IS NULL 
        AND STH_RECOMMEND_BY IS NULL
        AND NVL(LEAVE_STAFF_HIERARCHY.LSH_RECOMMEND_BY,LSH_APPROVE_BY) = SM_STAFF_ID
        AND STH_STAFF_ID = '$staffID'";

        $q = $this->db->query($query);
        return $q->row();
    }

    // GET EVALUATOR ID
    public function getEvaluatorID($refid, $staffID)
    {
        $query = "SELECT NVL(STH_VERIFY_BY, NVL(STH_RECOMMEND_BY, NVL(LSH_RECOMMEND_BY, LSH_APPROVE_BY))) AS EVAID
        FROM STAFF_TRAINING_HEAD,LEAVE_STAFF_HIERARCHY,TRAINING_HEAD_DETL
        WHERE STH_STAFF_ID = '$staffID'
        AND STH_TRAINING_REFID = '$refid'
        AND NVL(THD_EVALUATION,'N') = 'Y' 
        AND THD_REF_ID = STH_TRAINING_REFID
        AND LSH_STAFF_ID = STH_STAFF_ID";

        $q = $this->db->query($query);
        return $q->row();
    }

    // GET STAFF EMAIL DISTINCT
    public function getStaffMainDis($refid, $staffID)
    {
        $query = "SELECT DISTINCT SM_EMAIL_ADDR, NVL(STH_VERIFY_BY,STH_RECOMMEND_BY) STAFF, SM_STAFF_NAME
        FROM STAFF_TRAINING_HEAD, STAFF_MAIN
        WHERE STH_TRAINING_REFID = '$refid'
        AND STH_STATUS = 'RECOMMEND'
        AND NVL(STH_VERIFY_BY, STH_RECOMMEND_BY) = SM_STAFF_ID
        AND STH_STAFF_ID = '$staffID'
        UNION
        SELECT DISTINCT SM_EMAIL_ADDR, NVL(LEAVE_STAFF_HIERARCHY.LSH_RECOMMEND_BY, LSH_APPROVE_BY) STAFF, SM_STAFF_NAME
        FROM LEAVE_STAFF_HIERARCHY, STAFF_MAIN, STAFF_TRAINING_HEAD
        WHERE LEAVE_STAFF_HIERARCHY.LSH_STAFF_ID = STH_STAFF_ID
        AND STH_TRAINING_REFID = '$refid'
        AND STH_STATUS = 'RECOMMEND'
        AND STH_VERIFY_BY IS NULL 
        AND STH_RECOMMEND_BY IS NULL
        AND NVL(LEAVE_STAFF_HIERARCHY.LSH_RECOMMEND_BY, LSH_APPROVE_BY) = SM_STAFF_ID
        AND STH_STAFF_ID = '$staffID'";

        $q = $this->db->query($query);
        return $q->row();
    }

    // GET TRAINING COORDINATOR
    public function getTrCoor($refid)
    {
        $query = "SELECT TM_TITLE_DESC||' '||SM_STAFF_NAME AS STAFF_NAME, THD_COORDINATOR_TELNO
        FROM TRAINING_HEAD, TRAINING_HEAD_DETL, STAFF_MAIN, TITLE_MAIN
        WHERE TH_REF_ID = '$refid'
        AND TH_STATUS = 'APPROVE'
        AND TH_REF_ID = THD_REF_ID
        AND THD_COORDINATOR = SM_STAFF_ID
        AND SM_STAS_TITLE = TM_TITLE_CODE(+)";

        $q = $this->db->query($query);
        return $q->row();
    }

    // VERIFY TRAINING
    public function verifyTraining($refid, $staffID)
    {
        $this->db->select("*");
        $this->db->from('STAFF_TRAINING_DETL');
        $this->db->where("STD_TRAINING_REFID", $refid);
        $this->db->where("STD_STAFF_ID", $staffID);

        $q = $this->db->get();
        return $q->row();
    }

    /*_____________________
        INSERT PROCESS
    _______________________*/

    // INSERT SENT EMAIL STATUS
    public function insertEmailSts($refid, $staffID)
    {
        $curDate = 'SYSDATE';

        $data = array(
            "STD_TRAINING_REFID" => $refid,
            "STD_STAFF_ID" => $staffID,
            "STD_SENDMEMO" => 'Y'
        );

        $this->db->set("STD_SENDMEMO_DATE", $curDate, false);

        return $this->db->insert("STAFF_TRAINING_DETL", $data);
    }

    /*_____________________
        UPDATE PROCESS
    _______________________*/

    // UPDATE STAFF TRAINING HEAD - APPROVE APPLICANT
    public function apprOrReApp($refid, $staffID, $eveluatorID, $remark, $sts)
    {
        if($sts == 1) {
            $sthSts = 'APPROVE';
        } elseif($sts == 0) {
            $sthSts = 'REJECT';
        } 

        $curUsr = $this->staff_id;
        $curDate = 'SYSDATE';

        $data = array(
            "STH_STATUS" => $sthSts,
            "STH_APPROVE_BY" => $curUsr,
            "STH_EVALUATOR_ID" => $eveluatorID,
            "STH_REMARK" => $remark
        );

        $this->db->set("STH_APPROVE_DATE", $curDate, false);

        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->where("STH_STAFF_ID", $staffID);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    // UPDATE SENT EMAIL STATUS
    public function updateEmailSts($refid, $staffID)
    {
        $curDate = 'SYSDATE';

        $data = array(
            "STD_SENDMEMO" => 'Y'
        );

        $this->db->set("STD_SENDMEMO_DATE", $curDate, false);

        $this->db->where("STD_TRAINING_REFID", $refid);
        $this->db->where("STD_STAFF_ID", $staffID);

        return $this->db->update("STAFF_TRAINING_DETL", $data);
    }


    /*_____________________
        SEND EMAIL
    _______________________*/

    public function sendEmail($memo_from, $staff_app_email, $email_cc, $msg_title, $msg_content) {
		if (empty($memo_from)) {
			$memo_from = 'bsm.latihan@upsi.edu.my';
		}
		if (empty($email_cc)) {
			$email_cc = null;
		}
		
		// execute create_memo procedure
		$sql = 'begin utl_mail.send(
					sender=>?,
					recipients=>?,
					cc=>?,
					subject=>?,
					message=>?,
					mime_type=>\'text/html\'		
				); end;';
        $q = $this->db->query($sql, array($memo_from, $staff_app_email, $email_cc, $msg_title, $msg_content));

		if ($q === FALSE) {
			// return 0 if fail to execute create_memo
			return 0;
		}
		
		return 1;
    }


    /*===========================================================
       ASSIGN TRAINING TO STAFF
    =============================================================*/

    // GET ALL STAFF FROM TRAINING
    public function getAssignStaff($refid, $staffId = null)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_DEPT_CODE, STH_PARTICIPANT_ROLE, 
                            TPR_DESC, STH_STATUS, STH_STAFF_TRAINING_BENEFIT, 
                            STH_DEPT_TRAINING_BENEFIT, STH_REMARK, SM_STAFF_ID||' - '||SM_STAFF_NAME AS SM_ID_NAME");
        $this->db->from('STAFF_TRAINING_HEAD');
        $this->db->join("STAFF_MAIN", "STH_STAFF_ID = SM_STAFF_ID");
        $this->db->join("TRAINING_PARTICIPANT_ROLE", "TPR_CODE = STH_PARTICIPANT_ROLE", "LEFT");
        $this->db->where("STH_TRAINING_REFID", $refid);
        if(empty($staffId)) {
            $this->db->order_by("STH_STAFF_ID, UPPER(GET_STAFF_DEPT(STH_STAFF_ID)), STH_STATUS, UPPER(GET_STAFF_NAME(STH_STAFF_ID))");

            $q = $this->db->get();
            return $q->result();
        } 
        elseif(!empty($staffId)) {
            $this->db->where("STH_STAFF_ID", $staffId);

            $q = $this->db->get();
            return $q->row();
        }
    } 

    // FILTER STAFF DROPDOWN LIST
    public function getStaffList($refid, $deptCode)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID||' - '||SM_STAFF_NAME AS STAFF_ID_NAME");
        $this->db->from('STAFF_MAIN, STAFF_SERVICE, STAFF_STATUS');
        $this->db->where("SS_STAFF_ID = SM_STAFF_ID");
        $this->db->where("SM_STAFF_STATUS = SS_STATUS_CODE");
        $this->db->where("SS_JOB_STATUS IN ('01','03','08','09','10','02','11')");
        $this->db->where("SS_STATUS_STS = 'ACTIVE'");
        $this->db->where("SM_DEPT_CODE", $deptCode);
        $this->db->where("SM_STAFF_ID NOT IN
        (SELECT STH_STAFF_ID FROM STAFF_TRAINING_HEAD WHERE STH_TRAINING_REFID = '$refid')");
        $this->db->order_by("SM_STAFF_NAME");

        $q = $this->db->get();
        return $q->result();
    } 

    // GET PARTICIPANT ROLE
    public function getRoleList()
    {
        $this->db->select("*");
        $this->db->from('TRAINING_PARTICIPANT_ROLE');
        $this->db->order_by("TPR_CODE");

        $q = $this->db->get();
        return $q->result();
    }

    // GET PARTICIPANT STATUS
    public function getPstatusList()
    {
        $this->db->select("*");
        $this->db->from('TRAINING_PARTICIPANT_STATUS');
        $this->db->order_by("TPS_CODE");

        $q = $this->db->get();
        return $q->result();
    }

    // CHECK STAFF IN TRAINING HEAD
    public function checkStaffTr($refid, $staffId)
    {
        $this->db->select("*");
        $this->db->from('STAFF_TRAINING_HEAD');
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->where("STH_STAFF_ID", $staffId);

        $q = $this->db->get();
        return $q->row();
    }
    
    /*_____________________
        INSERT PROCESS
    _______________________*/

    // INSERT ASSIGNED STAFF
    public function saveAssignedStaff($form, $refid)
    {
        $curDate = 'SYSDATE';

        $data = array(
            "STH_STAFF_ID" => $form['staff_id'],
            "STH_TRAINING_REFID" => $refid,
            "STH_PARTICIPANT_ROLE" => $form['role'],
            "STH_STAFF_TRAINING_BENEFIT" => $form['training_benefit_staff'],
            "STH_DEPT_TRAINING_BENEFIT" => $form['training_benefit_department'],
            "STH_STATUS" => $form['status'],
            "STH_REMARK" => $form['remark'],
        );

        $this->db->set("STH_APPLY_DATE", $curDate, false);

        return $this->db->insert("STAFF_TRAINING_HEAD", $data);
    }

    /*_____________________
        UPDATE PROCESS
    _______________________*/

    // SAVE UPDATE ASSIGNED STAFF
    public function saveUpdAssigned($form, $refid, $staffid)
    {
        $data = array(
            "STH_PARTICIPANT_ROLE" => $form['role'],
            "STH_STAFF_TRAINING_BENEFIT" => $form['training_benefit_staff'],
            "STH_DEPT_TRAINING_BENEFIT" => $form['training_benefit_department'],
            "STH_STATUS" => $form['status'],
            "STH_REMARK" => $form['remark'],
        );

        $this->db->where('STH_TRAINING_REFID', $refid);
        $this->db->where('STH_STAFF_ID', $staffid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    /*_____________________
        DELETE PROCESS
    _______________________*/

    // DELETE ASSIGNED STAFF
    public function deleteAssignedStaff($refid, $staffId) {
        $this->db->where('STH_TRAINING_REFID', $refid);
        $this->db->where('STH_STAFF_ID', $staffId);

        return $this->db->delete('STAFF_TRAINING_HEAD');
    }


    /*===========================================================
       TRAINING QURIES - ATF008
    =============================================================*/

    // GET TRAINING STATUS LIST
    public function getTrainingStsList()
    {
        $this->db->select("TH_STATUS");
        $this->db->from('TRAINING_HEAD');
        $this->db->group_by("TH_STATUS");

        $q = $this->db->get();
        return $q->result();
    }

    // GET TRAINING COST
    public function getTrainingCost($tsRefID)
    {
        $this->db->select("TC_COST_CODE, TCT_DESC, TC_AMOUNT, TC_REMARK");
        $this->db->from("TRAINING_COST, TRAINING_COST_TYPE");
        $this->db->where("TC_COST_CODE = TCT_CODE");
        $this->db->where("TC_TRAINING_REFID", $tsRefID);

        $q = $this->db->get();
        return $q->result();
    }

    /*===========================================================
       APPROVE TRAINING SETUP - ATF027
    =============================================================*/

    // STAFF TRAINING RECORDS
    public function getStaffTrainingRecords($refid)
    {
        $this->db->select("COUNT(1) AS CC");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->where("STH_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // APPROVE TRAINING
    public function approveTrainingSetup($refid)
    {
        $currentUsr = $this->staff_id;
        $curDate = 'SYSDATE';

        $data = array(
            "TH_STATUS" => 'APPROVE',
            "TH_APPROVE_BY" => $currentUsr
        );

        $this->db->set("TH_APPROVE_DATE", $curDate, false);

        $this->db->where("TH_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD", $data);
    } 
    
    // APPROVE TRAINING
    public function postponeTrainingSetup($refid)
    {
        $currentUsr = $this->staff_id;
        $curDate = 'SYSDATE';

        $data = array(
            "TH_STATUS" => 'POSTPONE',
            "TH_APPROVE_BY" => $currentUsr
        );

        $this->db->set("TH_APPROVE_DATE", $curDate, false);

        $this->db->where("TH_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD", $data);
    }  
    
    // REJECT TRAINING
    public function rejectTrainingSetup($refid)
    {
        $currentUsr = $this->staff_id;
        $curDate = 'SYSDATE';

        $data = array(
            "TH_STATUS" => 'REJECT',
            "TH_APPROVE_BY" => $currentUsr
        );

        $this->db->set("TH_APPROVE_DATE", $curDate, false);

        $this->db->where("TH_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD", $data);
    }

    public function rejectStaffTraining($refid)
    {
        // $currentUsr = $this->staff_id;
        // $curDate = 'SYSDATE';

        $data = array(
            "STH_STATUS" => 'REJECT'
        );

        //$this->db->set("TH_APPROVE_DATE", $curDate, false);

        $this->db->where("STH_TRAINING_REFID", $refid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    // AMEND TRAINING
    public function amendTrainingSetup($refid)
    {
        $currentUsr = $this->staff_id;
        $curDate = 'SYSDATE';

        $data = array(
            "TH_STATUS" => 'ENTRY',
            "TH_APPROVE_BY" => $currentUsr
        );

        $this->db->set("TH_APPROVE_DATE", $curDate, false);

        $this->db->where("TH_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD", $data);
    }

    /*===========================================================
       EDIT APPROVE TRAINING SETUP - ATF044
    =============================================================*/

    // GET URL
    public function getEcommUrl()
    {
        $this->db->select("HP_PARM_DESC");
        $this->db->from("HRADMIN_PARMS");
        $this->db->where("HP_PARM_CODE = 'ECOMMUNITY_STAFF_URL'");

        $q = $this->db->get();
        return $q->row();
    }

    /*===========================================================
       QUERY STAFF TRAINING - ATF041
    =============================================================*/

    // GET STAFF LIST
    public function getStaffTrainingList($curUsrDept = null, $stfID = null)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, DM_DEPT_DESC, SS_SERVICE_DESC");
        $this->db->from("STAFF_MAIN");
        $this->db->join("SERVICE_SCHEME", "SS_SERVICE_CODE = SM_JOB_CODE", "LEFT");
        $this->db->join("DEPARTMENT_MAIN", "DM_DEPT_CODE = SM_DEPT_CODE", "LEFT");
        if(!empty($curUsrDept)) {
            $this->db->where("SM_DEPT_CODE = '$curUsrDept'");
        }
        if(!empty($stfID)) {
            $this->db->where("SM_STAFF_ID = '$stfID'");
        }
        $this->db->where("SM_STAFF_STATUS IN (SELECT SS_STATUS_CODE FROM STAFF_STATUS WHERE SS_STATUS_STS='ACTIVE')");
        $this->db->where("SM_STAFF_TYPE <> 'SYSTEM'");
        $this->db->order_by("SM_STAFF_NAME");

        $q = $this->db->get();
        return $q->result();
    }

    // GET STAFF LIST
    public function trainingListStaff($stfID)
    {
        $this->db->select("STH_TRAINING_REFID, TH_TRAINING_TITLE, TPS_DESC, TPR_DESC, STH_STATUS, STH_REMARK,
                            CASE
                            WHEN STH_COMPLETE = 'Y' THEN 'YES'
                            ELSE 'NO'
                            END AS STHCOMPLETE");
        $this->db->from("STAFF_TRAINING_HEAD STH");
        $this->db->join("TRAINING_HEAD TH", "STH.STH_TRAINING_REFID = TH.TH_REF_ID", "LEFT");
        $this->db->join("TRAINING_PARTICIPANT_STATUS TPS", "STH.STH_PARTICIPANT_STATUS = TPS.TPS_CODE", "LEFT");
        $this->db->join("TRAINING_PARTICIPANT_ROLE TPR", "STH.STH_PARTICIPANT_ROLE = TPR.TPR_CODE", "LEFT");
        $this->db->where("STH_STAFF_ID", $stfID);
        $this->db->order_by("STH_TRAINING_REFID");

        $q = $this->db->get();
        return $q->result();
    }

    // GET STAFF LIST
    public function applicationDetail($refid, $stfID)
    {
        $this->db->select("STH_TRAINING_REFID ||' - '|| TH_TRAINING_TITLE TRAINING_ID, TO_CHAR(STH_APPLY_DATE, 'DD/MM/YYYY') AS APPL_DATE, 
                            CASE
                            WHEN STD_TRAINING_CALENDAR = 'Y' THEN 'YES'
                            ELSE 'NO'
                            END AS TRAINING_CALENDAR,
                            CASE
                            WHEN STD_WORK_RELATED = 'Y' THEN 'YES'
                            ELSE 'NO'
                            END AS WORK_RELATED, 
                            STH_STAFF_TRAINING_BENEFIT, STH_VERIFY_BY ||' - '|| SM1.SM_STAFF_NAME AS VER_BY,
                            TO_CHAR(STH_VERIFY_DATE, 'DD/MM/YYYY') AS VER_DATE, STH_DEPT_TRAINING_BENEFIT, STH_RECOMMEND_BY ||' - '|| SM2.SM_STAFF_NAME AS REC_BY, 
                            TO_CHAR(STH_RECOMMEND_DATE, 'DD/MM/YYYY') AS REC_DATE, STH_RECOMMENDER_REASON, STH_REMARK, STH_APPROVE_BY ||' - '|| SM3.SM_STAFF_NAME AS APPR_BY,
                            TO_CHAR(STH_APPROVE_DATE, 'DD/MM/YYYY') AS APPR_DATE, TO_CHAR(STD_MPE_DATE, 'DD/MM/YYYY') AS MPE_DATE, 
                            STH_APPROVE_REASON, STD_CANCEL_BY ||' - '|| SM4.SM_STAFF_NAME AS CANC_BY, TO_CHAR(STD_CANCEL_DATE, 'DD/MM/YYYY') AS CANC_DATE, 
                            STD_CANCEL_REASON");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->join("TRAINING_HEAD", "STH_TRAINING_REFID = TH_REF_ID", "LEFT");
        $this->db->join("STAFF_TRAINING_DETL", "STH_TRAINING_REFID = STD_TRAINING_REFID AND STH_STAFF_ID = STD_STAFF_ID", "LEFT");
        $this->db->join("STAFF_MAIN SM1", "SM1.SM_STAFF_ID = STH_VERIFY_BY", "LEFT");
        $this->db->join("STAFF_MAIN SM2", "SM2.SM_STAFF_ID = STH_RECOMMEND_BY", "LEFT");
        $this->db->join("STAFF_MAIN SM3", "SM3.SM_STAFF_ID = STH_APPROVE_BY", "LEFT");
        $this->db->join("STAFF_MAIN SM4", "SM4.SM_STAFF_ID = STD_CANCEL_BY", "LEFT");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->where("STH_STAFF_ID", $stfID);

        $q = $this->db->get();
        return $q->row();
    }

    /*===========================================================
       Confirmation Attend Training - ATF148
    =============================================================*/

    // GET STAFF LIST
    public function getStaffTrainingApplicationConf($refid, $stfID = null)
    {
        $this->db->select("STH_TRAINING_REFID, SM_STAFF_ID, SM_STAFF_NAME, SM_DEPT_CODE, 
                            TPR_DESC, TO_CHAR(STH_APPLY_DATE, 'DD/MM/YYYY') AS STHAPPDATE,
                            CASE
                            WHEN STD_ATTEND = 'A' THEN 'Yes (Auto)'
                            WHEN STD_ATTEND = 'Y' THEN 'Yes'
                            WHEN STD_ATTEND = 'N' THEN 'No'
                            END AS STD_ATTEND, 
                            CASE
                            WHEN STD_SENDMEMO = 'Y' THEN 'Yes'
                            WHEN STD_SENDMEMO = 'Y' THEN 'No'
                            END AS STD_SENDMEMO,
                            CASE
                            WHEN STH_HOD_EVALUATION = 'Y' THEN 'Yes'
                            WHEN STH_HOD_EVALUATION = 'N' THEN 'No'
                            END AS STH_HOD_EVALUATION,
                            CASE
                            WHEN STD_TRANSPORTATION = 'OWN_SHARING' THEN 'Owned  / Shared Transport'
                            WHEN STD_TRANSPORTATION = 'UPSI' THEN 'UPSI'
                            END AS STD_TRANSPORTATION, 
                            TO_CHAR(STD_ATTEND_DATE, 'DD/MM/YYYY') 
                            STD_ATTEND_DATE, STD_ATTEND_REMARK, STD_ATTEND AS STD_ATTEND2,
                            STD_TRANSPORTATION AS STD_TRANSPORTATION2");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->join("STAFF_MAIN", "STH_STAFF_ID = SM_STAFF_ID", "LEFT");
        $this->db->join("STAFF_SERVICE", "STH_STAFF_ID = SS_STAFF_ID", "LEFT");
        $this->db->join("TRAINING_PARTICIPANT_ROLE", "STH_PARTICIPANT_ROLE = TPR_CODE", "LEFT");
        $this->db->join("STAFF_TRAINING_DETL", "STH_TRAINING_REFID = STD_TRAINING_REFID AND STH_STAFF_ID = STD_STAFF_ID", "LEFT");

        if(!empty($stfID)) {
            $this->db->where("STH_STAFF_ID", $stfID);
            $this->db->where("STH_TRAINING_REFID", $refid);
            $this->db->where("STH_STATUS = 'APPROVE'"); 

            $q = $this->db->get();
            return $q->row();
        } else {
            $this->db->where("STH_TRAINING_REFID", $refid);
            $this->db->where("STH_STATUS = 'APPROVE'");
            $this->db->order_by("STH_STAFF_ID");

            $q = $this->db->get();
            return $q->result();
        }
    }

    // CHECK TRAINING EXTERNAL
    public function getTrainingExternal($refid)
    {
        $this->db->select("TH_INTERNAL_EXTERNAL, TH_TRAINING_CODE");
        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_REF_ID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // AUTO ATTEND CONFIRMATION UPDATE
    public function autoAttendConfirmation($refid, $staffID, $transport)
    {
        $curDate = 'SYSDATE';

        $data = array(
            "STD_ATTEND" => 'A',
            "STD_TRANSPORTATION" => $transport
        );

        $this->db->set("STD_ATTEND_DATE", $curDate, false);

        $this->db->where("STD_TRAINING_REFID", $refid);
        $this->db->where("STD_STAFF_ID", $staffID);

        return $this->db->update("STAFF_TRAINING_DETL", $data);
    }

    // AUTO ATTEND CONFIRMATION INSERT
    public function autoAttendConfirmationIns($refid, $staffID, $transport)
    {
        $curDate = 'SYSDATE';

        $data = array(
            "STD_TRAINING_REFID" => $refid,
            "STD_STAFF_ID" => $staffID,
            "STD_ATTEND" => 'A',
            "STD_TRANSPORTATION" => $transport
        );

        $this->db->set("STD_ATTEND_DATE", $curDate, false);

        return $this->db->insert("STAFF_TRAINING_DETL", $data);
    }

    // COUNT TRAINING REQUIREMENT
    public function getTrainingRequirement($trCode, $staffID)
    {
        $query = "SELECT COUNT(1) AS R_COUNT
        FROM TRAINING_REQUIREMENT_MAIN,TRAINING_REQUIREMENT_DETL
        WHERE TRM_CODE = TRD_ID
        AND TRM_SETUP_CODE IN (SELECT TRS_CODE
        FROM TRAINING_REQUIREMENT_SETUP 
        WHERE TRS_REMARK IS NOT NULL
        AND TRS_DATE_TO IS NULL)
        AND TRM_STAFF_ID = '$staffID'
        AND TRD_TRAINING_REFID = '$trCode'
        AND TRD_STATUS <> 'APPROVE'";

        $q = $this->db->query($query);
        return $q->row();
    }

    // UPDATE TRAINING REQUIREMENT DETAIL
    public function updTrainingRequirementDetl($trCode, $staffID)
    {
        $currStaff = $this->staff_id;

        $query = "UPDATE TRAINING_REQUIREMENT_DETL
        SET TRD_STATUS = 'APPROVE',
        TRD_UPDATE_BY = '$currStaff',
        TRD_UPDATE_DATE = SYSDATE
        WHERE EXISTS  
        (SELECT TRM_CODE 
        FROM TRAINING_REQUIREMENT_MAIN
        WHERE TRM_CODE = TRD_ID
        AND TRM_STAFF_ID = '$staffID'
        and TRM_SETUP_CODE in 
            (SELECT TRS_CODE
            FROM TRAINING_REQUIREMENT_SETUP 
            WHERE TRS_REMARK is not null
            and TRS_DATE_TO is null)
            ) 
        AND TRD_TRAINING_REFID = '$trCode'
        and TRD_STATUS <> 'APPROVE'";

        $q = $this->db->query($query);
        $afftectedRows =  $this->db->affected_rows();

        if ($afftectedRows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }

        // if ($q === FALSE) {
		// 	// return 0 if fail to execute create_memo
		// 	return 0;
		// } 
        // return 1;
    }

    // CHECK TRAINING EXTERNAL
    public function getRemarkList()
    {
        $this->db->select("*");
        $this->db->from("TRAINING_REMARK_SETUP");
        $this->db->where("TRS_MODULE = 'APPLICATION'");
        $this->db->order_by("TRS_SEQ");

        $q = $this->db->get();
        return $q->result();
    }

    // SAVE UPDATE APPLICANT DETAILS
    public function saveUpdateApplicantDetails($form, $refid, $stfID)
    {
        $data = array(
            "STD_ATTEND" => $form['attendance_confirmation'],
            "STD_TRANSPORTATION" => $form['transportation'],
            "STD_ATTEND_REMARK" => $form['absent_remark']
        );

        if(!empty($form['confirm_date'])){
            $confirm_date = "TO_DATE('".$form['confirm_date']."', 'DD/MM/YYYY')";
            $this->db->set("STD_ATTEND_DATE", $confirm_date, false);
        }

        $this->db->where("STD_TRAINING_REFID", $refid);
        $this->db->where("STD_STAFF_ID", $stfID);

        return $this->db->update("STAFF_TRAINING_DETL", $data);
    }

    public function getCountAttendSum($refid, $att)
    {

        $this->db->select("COUNT(1) COUNT_ATTEND");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->join("STAFF_TRAINING_DETL", "STH_TRAINING_REFID = STD_TRAINING_REFID AND STH_STAFF_ID = STD_STAFF_ID","LEFT");
        $this->db->where("STD_TRAINING_REFID", $refid);
        $this->db->where("STH_STATUS = 'APPROVE'");
        if($att == 0) {
            $this->db->where("(STD_ATTEND = 'Y' OR STD_ATTEND = 'A')");
        }

        if($att == 1) {
            $this->db->where("STD_ATTEND = 'N'");
        }

        if($att == 2) {
            $this->db->where("STD_ATTEND IS NULL");
        }

        $q = $this->db->get();
        return $q->row();


        // if($att == 0) {
        //     $this->db->select("COUNT(1) COUNT_ATTEND");
        //     $this->db->from("STAFF_TRAINING_HEAD");
        //     $this->db->join("STAFF_TRAINING_DETL", "TH_TRAINING_REFID = STD_TRAINING_REFID AND STH_STAFF_ID = STD_STAFF_ID","LEFT");
        //     $this->db->where("STD_TRAINING_REFID", $refid);
        //     $this->db->where("STH_STATUS = 'APPROVE'");
        //     $this->db->where("(STD_ATTEND = 'Y' OR STD_ATTEND = 'A')");

        //     $q = $this->db->get();
        //     return $q->row();
        // } 

        // if($att == 1) {
        //     $this->db->select("COUNT(1) COUNT_ABSENT");
        //     $this->db->from("STAFF_TRAINING_HEAD");
        //     $this->db->join("STAFF_TRAINING_DETL", "TH_TRAINING_REFID = STD_TRAINING_REFID AND STH_STAFF_ID = STD_STAFF_ID","LEFT");
        //     $this->db->where("STD_TRAINING_REFID", $refid);
        //     $this->db->where("STH_STATUS = 'APPROVE'");
        //     $this->db->where("STD_ATTEND = 'N'");

        //     $q = $this->db->get();
        //     return $q->row();
        // }

        // if($att == 2) {
        //     $this->db->select("COUNT(1) COUNT_ATTEND");
        //     $this->db->from("STAFF_TRAINING_HEAD");
        //     $this->db->join("STAFF_TRAINING_DETL", "TH_TRAINING_REFID = STD_TRAINING_REFID AND STH_STAFF_ID = STD_STAFF_ID","LEFT");
        //     $this->db->where("STD_TRAINING_REFID", $refid);
        //     $this->db->where("STH_STATUS = 'APPROVE'");
        //     $this->db->where("STD_ATTEND IS NULL");

        //     $q = $this->db->get();
        //     return $q->row();
        // }
    }
}
