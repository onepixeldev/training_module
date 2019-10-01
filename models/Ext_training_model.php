<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ext_training_model extends MY_Model
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
       Organizer Info for External Agency Setup - ASF132
    =============================================================*/

    // ORGANIZER INFO
    public function getOrgInfoList($state = null)
    {
        $this->db->select("TOH_ORG_CODE,
        TOH_ORG_DESC,
        TOH_ADDRESS,
        TOH_POSTCODE,
        TOH_CITY,
        TOH_STATE,
        TOH_COUNTRY,
        TOH_EXTERNAL_AGENCY,
        TOH_STATE||' - '||SM_STATE_DESC TOH_STATE_DESC,
        TOH_COUNTRY||' - '||CM_COUNTRY_DESC TOH_COUNTRY_DESC");
        $this->db->from("TRAINING_ORGANIZER_HEAD");
        $this->db->join("STATE_MAIN", "TOH_STATE = SM_STATE_CODE", "LEFT");
        $this->db->join("COUNTRY_MAIN", "TOH_COUNTRY = CM_COUNTRY_CODE", "LEFT");
        $this->db->where("NVL(TOH_EXTERNAL_AGENCY,'N') = 'Y'");

        if(!empty($state)) 
        {
            $this->db->where("TOH_STATE", $state);
        }

        $this->db->order_by("TOH_STATE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // STATE DD
    public function getStateDD()
    {
        $this->db->select("SM_STATE_CODE, SM_STATE_CODE||' - '||SM_STATE_DESC SM_STATE_CD");
        $this->db->from("STATE_MAIN");
        $this->db->where("(SM_COUNTRY_CODE = 'MYS'
        OR SM_COUNTRY_CODE IS NULL)");
        $this->db->order_by("SM_STATE_DESC");
    
        $q = $this->db->get();
    
        return $q->result();
    }

    // CONTRY DD
    public function getCountryDD()
    {
        $this->db->select("CM_COUNTRY_CODE, CM_COUNTRY_CODE||' - '||CM_COUNTRY_DESC CM_COUNTRY_CD");
        $this->db->from("COUNTRY_MAIN");
        $this->db->order_by("CM_COUNTRY_DESC");
    
        $q = $this->db->get();
    
        return $q->result();
    }

    // ORGANIZER INFO DETL
    public function getOrgInfoDetl($code)
    {
        $this->db->select("TOH_ORG_CODE,
        TOH_ORG_DESC,
        TOH_ADDRESS,
        TOH_POSTCODE,
        TOH_CITY,
        TOH_STATE,
        TOH_COUNTRY,
        TOH_EXTERNAL_AGENCY");
        $this->db->from("TRAINING_ORGANIZER_HEAD");
        $this->db->where("TOH_ORG_CODE", $code);

        $q = $this->db->get();
        
        return $q->row();
    }

    // SAVE ADD ORGANIZER INFO
    public function saveOrgInfo($form) 
    {
        $data = array(
            "TOH_ORG_CODE" => $form['code'],
            "TOH_ORG_DESC" => $form['description'],
            "TOH_ADDRESS" => $form['address'],
            "TOH_POSTCODE" => $form['postcode'],
            "TOH_CITY" => $form['city'],
            "TOH_STATE" => $form['state'],
            "TOH_COUNTRY" => $form['country'],
            "TOH_EXTERNAL_AGENCY" => 'Y',
        );

        return $this->db->insert("TRAINING_ORGANIZER_HEAD", $data);
    }

    // SAVE UPDATE ORGANIZER INFO
    public function saveUpdOrgInfo($form, $code) 
    {
        $data = array(
            "TOH_ORG_DESC" => $form['description'],
            "TOH_ADDRESS" => $form['address'],
            "TOH_POSTCODE" => $form['postcode'],
            "TOH_CITY" => $form['city'],
            "TOH_STATE" => $form['state'],
            "TOH_COUNTRY" => $form['country'],
        );

        $this->db->where("UPPER(TOH_ORG_CODE) = UPPER('$code')");

        return $this->db->update("TRAINING_ORGANIZER_HEAD", $data);
    }

    // DELETE ORGANIZER INFO
    public function delOrgInfo($code) 
    {
        $this->db->where("UPPER(TOH_ORG_CODE) = UPPER('$code')");
        return $this->db->delete('TRAINING_ORGANIZER_HEAD');
    }

    /*===========================================================
       TRAINING SETUP FOR EXTERNAL AGENCY - ATF138
    =============================================================*/

    // GET TRAINING LIST
    public function getTrainingList()
    {
        $umg = $this->username;

        $this->db->select("TH_REF_ID,
        TH_TRAINING_TITLE,
        TO_CHAR(TH_DATE_FROM, 'DD/MM/YYYY') TH_DATE_FROM2,
        TO_CHAR(TH_DATE_TO, 'DD/MM/YYYY') TH_DATE_TO2,
        ");
        $this->db->from("TRAINING_HEAD");
        
        $this->db->where("TH_STATUS = 'ENTRY'");
        $this->db->where("TH_DEPT_CODE = (SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE UPPER(SM_APPS_USERNAME) = UPPER('$umg'))");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->order_by("TH_DATE_FROM, TH_DATE_TO, TH_TRAINING_TITLE, TH_REF_ID");
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN TYPE LIST
    public function getTypeList()
    {
        $this->db->select("TT_CODE, TT_CODE ||' - '|| TT_DESC AS TT_CODE_DESC");
        $this->db->from("TRAINING_TYPE");
        $q = $this->db->get();
        
        return $q->result();
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

    // DROPDOWN COMPETENCY LEVEL LIST
    public function getCompetencyLevel() 
    {
        $this->db->select("TCL_COMPETENCY_CODE, TCL_COMPETENCY_CODE ||' - '|| TCL_COMPETENCY_DESC AS TCL_COMPETENCY_CODE_DESC, TCL_SERVICE_YEAR_FROM, TCL_SERVICE_YEAR_TO,TCL_ORDERING");
        $this->db->from('TRAINING_COMPETENCY_LEVEL');
		$this->db->where("TCL_STATUS = 'Y'");
        $this->db->order_by('TCL_ORDERING');
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN STAFF LIST
    public function getCoordinator() 
    {
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
    public function getCoordinatorSec() 
    {
        $this->db->select("TSL_CODE, TSL_CODE ||' - '|| TSL_DESC AS TSL_CODE_DESC");
        $this->db->from('TRAINING_SECTOR_LEVEL');
		$this->db->where("NVL(TSL_STATUS,'N') = 'Y'");
        $q = $this->db->get();
        
        return $q->result();
    }

    // DROPDOWN ORGANIZER LEVEL LIST
    public function getOrganizerLevel() 
    {
        $this->db->select("TOL_CODE, TOL_CODE ||' - '|| TOL_DESC AS TOL_CODE_DESC");
        $this->db->from('TRAINING_ORGANIZER_LEVEL');
        $this->db->order_by('TOL_CODE');
        $q = $this->db->get();
        
        return $q->result();
    }

    // GET ORGANIZER DETAILS
    public function getOrganizerName($organizerCode = null) 
    {
        $this->db->select("TOH_ORG_CODE, TOH_ORG_DESC, TOH_ORG_CODE ||' - '|| TOH_ORG_DESC AS TOH_ORG_CODE_DESC, TOH_ADDRESS, TOH_POSTCODE, TOH_CITY, SM_STATE_DESC, CM_COUNTRY_DESC");
        $this->db->from('TRAINING_ORGANIZER_HEAD, STATE_MAIN, COUNTRY_MAIN');
        $this->db->where("TOH_STATE=SM_STATE_CODE");
        $this->db->where("TOH_COUNTRY=CM_COUNTRY_CODE");
        $this->db->where("NVL(TOH_EXTERNAL_AGENCY,'N') = 'Y'");

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

    // DROPDOWN STATE LIST
    public function getCountryStateList($countCode) 
    {
        $this->db->select('SM_STATE_CODE, SM_STATE_DESC, SM_COUNTRY_CODE');
        $this->db->from('STATE_MAIN');
		$this->db->where('SM_COUNTRY_CODE', $countCode);
        $this->db->order_by('SM_STATE_CODE');
        $q = $this->db->get();
        
        return $q->result();
    }

    // GET STAFF LIST DROPDOWN
    public function getStaffList($staffID = null)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID ||' - '||SM_STAFF_NAME AS SM_STAFF_ID_NAME, TO_CHAR(SYSDATE, 'DD/MM/YYYY') AS CURR_DATE");
        $this->db->from("STAFF_MAIN, STAFF_STATUS");
        $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS");
        $this->db->where("SM_STAFF_TYPE = 'STAFF'");

        if(!empty($staffID)) {
            $this->db->where("UPPER(SM_STAFF_ID) = UPPER('$staffID')");
            $q = $this->db->get();
            return $q->row();
        } else {
            $this->db->where("SS_STATUS_STS = 'ACTIVE'");
            $this->db->order_by("2");

            $q = $this->db->get();
            return $q->result();
        }
    }

    // SEARCH STAFF
    public function getStaffSearch($staffID)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID ||' - '||SM_STAFF_NAME AS SM_STAFF_ID_NAME");
        $this->db->from("STAFF_MAIN, STAFF_STATUS");
        $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS");
        $this->db->where("SM_STAFF_TYPE = 'STAFF'");
        $this->db->where("SS_STATUS_STS = 'ACTIVE'");

        $this->db->where("(UPPER(SM_STAFF_ID) LIKE UPPER('%$staffID%') OR UPPER(SM_STAFF_NAME) LIKE UPPER('%$staffID%'))");
        $this->db->order_by("2");

        $q = $this->db->get();
        return $q->result();
    }


}
