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

    public function getSpeakerInfoExternal($tsrefID)
    {
        $this->db->select("TS_TRAINING_REFID, TS_SPEAKER_ID, TS_TYPE, TS_CONTACT, ES_SPEAKER_NAME, ES_DEPT");
        $this->db->from("EXTERNAL_SPEAKER, TRAINING_SPEAKER");
        $this->db->where("ES_SPEAKER_ID = TS_SPEAKER_ID");
        $this->db->where("TS_TRAINING_REFID", $tsrefID);
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getSpeakerInfoStaff($tsrefID)
    {
        $this->db->select("TS_TYPE, TS_SPEAKER_ID, SM_STAFF_NAME, SM_DEPT_CODE, TS_CONTACT");
        $this->db->from("STAFF_MAIN, TRAINING_SPEAKER");
        $this->db->where("SM_STAFF_ID = TS_SPEAKER_ID");
        $this->db->where("TS_TRAINING_REFID", $tsrefID);
        $q = $this->db->get();
        
        return $q->result();
    }

    public function getTypeList()
    {
        $this->db->select("TT_CODE, TT_CODE ||' - '|| TT_DESC AS TT_CODE_DESC");
        $this->db->from("TRAINING_TYPE");
        $q = $this->db->get();
        
        return $q->result();
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
}
