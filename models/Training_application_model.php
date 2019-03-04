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
       TRAINING SETUP
    =============================================================*/

   /*_____________________
        GET BASIC INFO
    _______________________*/

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
        
        $this->db->where("TH_STATUS = 'ENTRY'");
        $this->db->where("TH_DEPT_CODE = (SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE UPPER(SM_APPS_USERNAME) = UPPER('$umg'))");
        $this->db->where("TH_INTERNAL_EXTERNAL NOT IN ('EXTERNAL_AGENCY')");
        $this->db->where("TH_REF_ID", $refID);
        $q = $this->db->get();
        
        return $q->row();
    }

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

    public function getTypeList()
    {
        $this->db->select("TT_CODE, TT_CODE ||' - '|| TT_DESC AS TT_CODE_DESC");
        $this->db->from("TRAINING_TYPE");
        $q = $this->db->get();
        
        return $q->result();
    }

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

    public function getCategoryList()
    {
        $this->db->select("TC_CATEGORY");
        $this->db->from("TRAINING_CATEGORY");
        $this->db->where("NVL(TC_STATUS,'N') = 'Y'");
        $this->db->order_by("1");
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getLevelList()
    {
        $this->db->select("TL_CODE, TL_CODE ||' - '|| TL_DESC AS TL_CODE_DESC");
        $this->db->from("TRAINING_LEVEL");
        $this->db->order_by("TL_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getAreaList()
    {
        $this->db->select("TF_CODE, TF_CODE ||' - '|| TF_FIELD_DESC AS TF_CODE_DESC");
        $this->db->from("TRAINING_FIELD");
        $this->db->where("NVL(TF_STATUS,'N') = 'Y'");
        $this->db->order_by("TF_RANKING");
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getSgroupList()
    {
        //select SG_GROUP_CODE,SG_GROUP_DESC from service_group order by 1
        $this->db->select("SG_GROUP_CODE, SG_GROUP_CODE ||' - '|| SG_GROUP_DESC AS SG_CODE_DESC");
        $this->db->from("SERVICE_GROUP");
        $this->db->order_by("1");
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getCountryList() {
        $this->db->select('CM_COUNTRY_CODE, CM_COUNTRY_DESC');
        $this->db->from('COUNTRY_MAIN');
        $this->db->order_by('CM_COUNTRY_DESC');
        $q = $this->db->get();
		        
        return $q->result();
    }

    public function getCountryDef() {
        $this->db->select('CM_COUNTRY_CODE, CM_COUNTRY_DESC');
        $this->db->from('COUNTRY_MAIN');
        $this->db->where("CM_COUNTRY_CODE = 'MYS'");
        $q = $this->db->get();
		        
        return $q->row();
    }

    public function getCountryStateList($countCode) {
        $this->db->select('SM_STATE_CODE, SM_STATE_DESC, SM_COUNTRY_CODE');
        $this->db->from('STATE_MAIN');
		$this->db->where('SM_COUNTRY_CODE', $countCode);
        $this->db->order_by('SM_STATE_CODE');
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getCompetencyLevel() {
        $this->db->select("TCL_COMPETENCY_CODE, TCL_COMPETENCY_CODE ||' - '|| TCL_COMPETENCY_DESC AS TCL_COMPETENCY_CODE_DESC, TCL_SERVICE_YEAR_FROM, TCL_SERVICE_YEAR_TO,TCL_ORDERING");
        $this->db->from('TRAINING_COMPETENCY_LEVEL');
		$this->db->where("TCL_STATUS = 'Y'");
        $this->db->order_by('TCL_ORDERING');
        $q = $this->db->get();
        
        return $q->result();
    }

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

    public function getCoordinatorSec() {
        $this->db->select("TSL_CODE, TSL_CODE ||' - '|| TSL_DESC AS TSL_CODE_DESC");
        $this->db->from('TRAINING_SECTOR_LEVEL');
		$this->db->where("NVL(TSL_STATUS,'N') = 'Y'");
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getOrganizerLevel() {
        $this->db->select("TOL_CODE, TOL_CODE ||' - '|| TOL_DESC AS TOL_CODE_DESC");
        $this->db->from('TRAINING_ORGANIZER_LEVEL');
        $this->db->order_by('TOL_CODE');
        $q = $this->db->get();
        
        return $q->result();
    }

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

    public function getmoduleSetup($tsrefID) {
        $this->db->select("THD_TRAINING_OBJECTIVE2, THD_TRAINING_CONTENT, THD_MODULE_CATEGORY, THD_MODULE_CATEGORY ||' - '|| TMC_COMPONENT_DESC AS TMCDESC,
        THD_EVALUATION, THD_COORDINATOR, THD_COORDINATOR_TELNO, THD_COORDINATOR_SECTOR");
        $this->db->from("TRAINING_HEAD_DETL");
        $this->db->join("TRAINING_MODULE_COMPONENT", "TMC_COMPONENT_CODE = THD_MODULE_CATEGORY", "LEFT");
        $this->db->where("THD_REF_ID", $tsrefID);
        $q = $this->db->get();
        
        return $q->row();
    }

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

    public function getCpdSetupCategory($cCode) {
        $this->db->select("CC_CATEGORY_CODE ||' - '|| CC_CATEGORY_DESC AS CH_CC_CATEGORY_DESC");
        $this->db->from("CPD_CATEGORY");
        $this->db->where("CC_CATEGORY_CODE", $cCode);
        $q = $this->db->get();
        
        return $q->row();
    }

    public function getCountTargetGroup($tsrefID) {
        $this->db->select("COUNT(1) AS COUNT_TG");
        $this->db->from("TRAINING_TARGET_GROUP");
        $this->db->where("TTG_TRAINING_REFID", $tsrefID);
        $q = $this->db->get();
        
        return $q->row();
    }

    public function getValueStrTrTargetGroup($strRefID) {
        $this->db->select("TTG_GROUP_CODE");
        $this->db->from("TNA_TARGET_GROUP, TNA_GROUP");
        $this->db->where("TTG_REF_ID", $strRefID);
        $this->db->where("TG_GROUP_CODE = TTG_GROUP_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getRefID() {
        // $this->db->select("MAX(TO_NUMBER(REGEXP_REPLACE(TH_REF_ID,'\D',''))) + 1 AS TESTREFID");
        // $this->db->from('TRAINING_HEAD');

        $this->db->select("to_char(sysdate,'yyyy')||'-'||ltrim(to_char(training_head_seq.nextval,'000000')) AS REF_ID");
        $this->db->from("DUAL");
        $q = $this->db->get();
        
        return $q->row();
    }

    public function getResultTTG($trCode) {
        $this->db->select("TTG_GROUP_CODE");
        $this->db->from("TNA_TARGET_GROUP, TNA_GROUP");
        $this->db->where("TTG_REF_ID",$trCode);
        $this->db->where("TG_GROUP_CODE = TTG_GROUP_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getResultTGS($trCode) {
        $this->db->select("TTG_GROUP_CODE, TGS_SEQ, TGS_SERVICE_CODE");
        $this->db->from("TNA_GROUP_SERVICE, TNA_TARGET_GROUP");
        $this->db->where("TGS_GRPSERV_CODE = TTG_GROUP_CODE");
        $this->db->where("TTG_REF_ID", $trCode);
        $q = $this->db->get();
        
        return $q->result();
    }

    public function checkTGS($gpCode, $tgsSeq) {
        $this->db->select("TGS_GRPSERV_CODE, TGS_SEQ");
        $this->db->from("TRAINING_GROUP_SERVICE");
        $this->db->where("TGS_GRPSERV_CODE", $gpCode);
        $this->db->where("TGS_SEQ", $tgsSeq);
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getTrHeadDetl($refID) {
        $this->db->select("*");
        $this->db->from("TRAINING_HEAD_DETL");
        $this->db->where("THD_REF_ID", $refID);
        
        $q = $this->db->get();
        return $q->row();
    }

    // get speaker list
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

    // get facilitator list
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

    public function checkTrainingSpeaker($refID, $spID) {
        $this->db->select("TS_TRAINING_REFID, TS_SPEAKER_ID, TS_TYPE, TS_CONTACT");
        $this->db->from("TRAINING_SPEAKER");
        $this->db->where("TS_SPEAKER_ID", $spID);
        $this->db->where("TS_TRAINING_REFID", $refID);
        $q = $this->db->get();
        
        return $q->row();
    }

    public function checkTrainingFacilitator($refID, $fiID) {
        $this->db->select("*");
        $this->db->from("TRAINING_FACILITATOR");
        $this->db->where("TF_FACILITATOR_ID", $fiID);
        $this->db->where("TF_TRAINING_REFID", $refID);
        $q = $this->db->get();
        
        return $q->row();
    }

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

    public function getTargetGroupDetail($refid, $gpCode) {
        $this->db->select("*");
        $this->db->from("TRAINING_TARGET_GROUP");
        $this->db->where("TTG_TRAINING_REFID", $refid);
        $this->db->where("TTG_GROUP_CODE", $gpCode);

        $q = $this->db->get();
        return $q->row();
    }

    public function delTargetGroupVerify($gpCode) {
        $this->db->select("1");
        $this->db->from("TRAINING_GROUP_SERVICE");
        $this->db->where("TGS_GRPSERV_CODE", $gpCode);

        $q = $this->db->get();
        return $q->result();
    }

    public function getListEgPosition($groupCode) {
        $this->db->select("TGS_GRPSERV_CODE, TGS_SEQ, TGS_SERVICE_CODE, SS_SERVICE_DESC");
        $this->db->from("TRAINING_GROUP_SERVICE");
        $this->db->join('SERVICE_SCHEME', 'TRAINING_GROUP_SERVICE.TGS_SERVICE_CODE = SERVICE_SCHEME.SS_SERVICE_CODE', 'LEFT');
        $this->db->where("TGS_GRPSERV_CODE", $groupCode);

        $q = $this->db->get();
        return $q->result();
    }

    public function getCompList() {
        $this->db->select("TMC_COMPONENT_CODE, TMC_COMPONENT_CODE ||' - '|| TMC_COMPONENT_DESC TMC_CODE_DESC");
        $this->db->from("TRAINING_MODULE_COMPONENT");
        $this->db->order_by("TMC_COMPONENT_CODE");

        $q = $this->db->get();
        return $q->result();
    }

    public function getCpdCategoryList() {
        $this->db->select("CC_CATEGORY_CODE, CC_CATEGORY_CODE ||' - '|| CC_CATEGORY_DESC AS CC_CODE_DESC");
        $this->db->from("CPD_CATEGORY");

        $q = $this->db->get();
        return $q->result();
    }

    // verify delete training speaker
    public function delVerifyTrSP($refid) {
        $this->db->select("1");
        $this->db->from("TRAINING_SPEAKER T");
        $this->db->where("T.TS_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // verify delete training facilitator
    public function delVerifyTrFi($refid) {
        $this->db->select("1");
        $this->db->from("TRAINING_FACILITATOR T");
        $this->db->where("T.TF_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // verify delete training target group
    public function delVerifyTrGrp($refid) {
        $this->db->select("1");
        $this->db->from("TRAINING_TARGET_GROUP T");
        $this->db->where("T.TTG_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // verify delete training module setup
    public function delVerifyModSet($refid) {
        $this->db->select("1");
        $this->db->from("TRAINING_HEAD_DETL T");
        $this->db->where("T.THD_REF_ID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // verify delete training cpd setup
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

    public function insertTrainingGroupService($gpCode, $tgsSeq, $tgsSvcCode)
    {
        $data = array(
            "TGS_GRPSERV_CODE" => $gpCode,
            "TGS_SEQ" => $tgsSeq,
            "TGS_SERVICE_CODE" => $tgsSvcCode
        );

        return $this->db->insert("TRAINING_GROUP_SERVICE", $data);
    }

    public function insertCPDHead($refid, $competency)
    {
        $data = array(
            "CH_TRAINING_REFID" => $refid,
            "CH_COMPETENCY" => $competency,
            "CH_REPORT_SUBMISSION" => 'N'
        );

        return $this->db->insert("CPD_HEAD", $data);
    }

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

    public function insertTrainingFacilitator($form, $refid)
    {
        $data = array(
            "TF_TRAINING_REFID" => $refid,
            "TF_FACILITATOR_ID" => $form['facilitator'],
            "TF_TYPE" => $form['type'],
        );

        return $this->db->insert("TRAINING_FACILITATOR", $data);
    }

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

    public function updateTrainingHead($form, $refid)
    {
        $umg = $this->staff_id;
        $staff_dept_code = "(SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE SM_STAFF_ID = '$umg')";
        $enter_date = 'SYSDATE';

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

        $this->db->where("TH_REF_ID",$refid);

        return $this->db->update("TRAINING_HEAD", $data);
    }

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

    public function updateTrainingSpeaker($form, $refid, $spID)
    {
        $data = array(
            "TS_CONTACT" => $form['contact_phone_no']
        );

        $this->db->where("TS_TRAINING_REFID", $refid);
        $this->db->where("TS_SPEAKER_ID", $spID);

        return $this->db->update("TRAINING_SPEAKER", $data);
    }

    public function updateMs1($form, $refid)
    {
        $data = array(
            "THD_TRAINING_OBJECTIVE2" => $form['specific_objectives']
        );

        $this->db->where("THD_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD_DETL", $data);
    }

    public function updateMs2($form, $refid)
    {
        $data = array(
            "THD_TRAINING_CONTENT" => $form['contents']
        );

        $this->db->where("THD_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD_DETL", $data);
    }

    public function updateMs3($form, $refid)
    {
        $data = array(
            "THD_MODULE_CATEGORY" => $form['component_category']
        );

        $this->db->where("THD_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD_DETL", $data);
    }

    public function updateCpd1($form, $refid)
    {
        $data = array(
            "CH_COMPETENCY" => $form['competency']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    public function updateCpd2($form, $refid)
    {
        $data = array(
            "CH_CATEGORY" => $form['category']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    public function updateCpd3($form, $refid)
    {
        $data = array(
            "CH_MARK" => $form['mark']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

    public function updateCpd4($form, $refid)
    {
        $data = array(
            "CH_REPORT_SUBMISSION" => $form['report_submission']
        );

        $this->db->where("CH_TRAINING_REFID", $refid);

        return $this->db->update("CPD_HEAD", $data);
    }

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

    public function delTrainingInfo($refid) {
        $this->db->where('TH_REF_ID', $refid);
        return $this->db->delete('TRAINING_HEAD');
    }

    public function delTrainingSpeaker($refid, $spID) {
        $this->db->where('TS_TRAINING_REFID', $refid);
        $this->db->where('TS_SPEAKER_ID', $spID);
        return $this->db->delete('TRAINING_SPEAKER');
    }

    public function delTrainingFacilitator($refid, $fiID) {
        $this->db->where('TF_TRAINING_REFID', $refid);
        $this->db->where('TF_FACILITATOR_ID', $fiID);
        return $this->db->delete('TRAINING_FACILITATOR');
    }

    public function delTargetGroup($refid, $gpCode) {
        $this->db->where('TTG_TRAINING_REFID', $refid);
        $this->db->where('TTG_GROUP_CODE', $gpCode);
        return $this->db->delete('TRAINING_TARGET_GROUP');
    }

    public function delModuleSetup($refid) {
        $this->db->where('THD_REF_ID', $refid);
        return $this->db->delete('TRAINING_HEAD_DETL');
    }

    public function delCpdSetup($refid) {
        $this->db->where('CH_TRAINING_REFID', $refid);
        return $this->db->delete('CPD_HEAD');
    }

    public function delTrainingGpService($gpCode, $tgsSeq) {
        $this->db->where('TGS_GRPSERV_CODE', $gpCode);
        $this->db->where('TGS_SEQ', $tgsSeq);
        return $this->db->delete('TRAINING_GROUP_SERVICE');
    }
}
