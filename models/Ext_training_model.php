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

    // get current date
    public function getCurDate() {		
        $this->db->select("TO_CHAR(SYSDATE, 'MM') AS SYSDATE_MM, TO_CHAR(SYSDATE, 'YYYY') AS SYSDATE_YYYY");
        $this->db->from("DUAL");
        $q = $this->db->get();
                
        return $q->row();
    } 

    // GET YEAR DROPDOWN
    public function getYearList() 
    {		
        $this->db->select("to_char(CM_DATE, 'YYYY') AS CM_YEAR");
        $this->db->from("CALENDAR_MAIN");
        $this->db->where("to_char(CM_DATE, 'YYYY') >= to_char(SYSDATE, 'YYYY') - 15");
        $this->db->group_by("to_char(CM_DATE, 'YYYY')");
        $this->db->order_by("to_char(CM_DATE, 'YYYY') DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // GET MONTH DROPDOWN
    public function getMonthList() 
    {		
        $this->db->select("to_char(CM_DATE, 'MM') AS CM_MM, to_char(CM_DATE, 'MONTH') AS CM_MONTH");
        $this->db->from("CALENDAR_MAIN");
        $this->db->group_by("to_char(CM_DATE,'MM'), to_char(CM_DATE, 'MONTH')");
        $this->db->order_by("to_char(CM_DATE, 'MM')");
        $q = $this->db->get();
		        
        return $q->result();
    } 

    // CURREMT USER DEPT
    public function currentUsrDept()
    {  
        $curr_usr = $this->username;

        $this->db->select("SM_DEPT_CODE");
        $this->db->from("STAFF_MAIN");
        $this->db->where("UPPER(SM_APPS_USERNAME)", $curr_usr);
        $q = $this->db->get();
    
        return $q->row();
    }

    // ALL DEPARTMENT
    public function getDeptAll()
    {  
        $this->db->select("DM_DEPT_CODE, DM_DEPT_CODE||' - '||DM_DEPT_DESC AS DP_CODE_DESC");
        $this->db->from("DEPARTMENT_MAIN");
        $this->db->where("COALESCE(DM_STATUS,'INACTIVE') = 'ACTIVE'");
        $this->db->where("DM_LEVEL IN (1,2)");
        $this->db->order_by("DM_DEPT_CODE");
        $q = $this->db->get();
    
        return $q->result();
    }

    // NOT ALL DEPARTMENT
    public function getDeptBased()
    {  
        $curr_usr = $this->username;

        $this->db->select("DM_DEPT_CODE, DM_DEPT_CODE||' - '||DM_DEPT_DESC AS DP_CODE_DESC");
        $this->db->from("DEPARTMENT_MAIN");
        $this->db->where("COALESCE(DM_STATUS,'INACTIVE') = 'ACTIVE'");
        $this->db->where("DM_LEVEL IN (1,2)");
        $this->db->where("DM_DEPT_CODE = (SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE UPPER(SM_APPS_USERNAME) = '$curr_usr')");
        $this->db->order_by("DM_DEPT_CODE");
        $q = $this->db->get();
    
        return $q->result();
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
        TOH_COUNTRY||' - '||CM_COUNTRY_DESC TOH_COUNTRY_DESC,
        SM_STATE_DESC,
        CM_COUNTRY_DESC");
        $this->db->from("TRAINING_ORGANIZER_HEAD");
        $this->db->join("STATE_MAIN", "TOH_STATE = SM_STATE_CODE", "LEFT");
        $this->db->join("COUNTRY_MAIN", "TOH_COUNTRY = CM_COUNTRY_CODE", "LEFT");
        $this->db->where("COALESCE(TOH_EXTERNAL_AGENCY,'N') = 'Y'");

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
        $this->db->where("COALESCE(TC_STATUS,'N') = 'Y'");
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
		$this->db->where("COALESCE(TSL_STATUS,'N') = 'Y'");
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
        $this->db->where("COALESCE(TOH_EXTERNAL_AGENCY,'N') = 'Y'");

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

    // GET REFID
    public function getRefID() 
    {
        $this->db->select("to_char(sysdate,'yyyy')||'-E'||ltrim(to_char(training_head_seq.nextval,'000000')) AS REF_ID");
        $this->db->from("DUAL");
        $q = $this->db->get();
        
        return $q->row();
    }

    // INSERT TRAINING HEAD
    public function saveNewTraining($form, $refid)
    {
        $umg = $this->staff_id;
        $staff_dept_code = "(SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE SM_STAFF_ID = '$umg')";
        $enter_date = 'SYSDATE';

        $data = array(
            "TH_REF_ID" => $refid,
            "TH_TYPE" => $form['type'],
            "TH_CATEGORY" => $form['category'],
            "TH_LEVEL" => $form['level'],
            "TH_TRAINING_TITLE" => $form['training_title'],
            "TH_TRAINING_DESC" => $form['training_description'],
            "TH_TRAINING_VENUE" => $form['venue'],
            "TH_TRAINING_COUNTRY" => $form['country'],
            "TH_TRAINING_STATE" => $form['state'],
            "TH_TOTAL_HOURS" => $form['total_hours'],
            "TH_TRAINING_FEE" => $form['fee'],
            "TH_INTERNAL_EXTERNAL" => $form['internal_external'],
            "TH_SPONSOR" => $form['sponsor'],
            "TH_MAX_PARTICIPANT" => $form['participants'],
            "TH_OPEN" => $form['online_application'],
            // "TH_COMPETENCY_CODE" => $form['competency_code'],

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
            $date_from = "to_date('".$form['date_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_DATE_FROM", $date_from, false);
        }

        if(!empty($form['date_to'])){
            $date_to = "to_date('".$form['date_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_DATE_TO", $date_to, false);
        }

        if(!empty($form['closing_date'])){
            $closing_date = "to_date('".$form['closing_date']."', 'DD/MM/YYYY')";
            $this->db->set("TH_APPLY_CLOSING_DATE", $closing_date, false);
        }

        if(!empty($form['evaluation_period_from'])){
            $evaluation_period_from = "to_date('".$form['evaluation_period_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_FROM", $evaluation_period_from, false);
        }

        if(!empty($form['evaluation_period_to'])){
            $evaluation_period_to = "to_date('".$form['evaluation_period_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_TO", $evaluation_period_to, false);
        }

        return $this->db->insert("TRAINING_HEAD", $data);
    }

    // INSERT TRAINING HEAD DETL
    public function saveTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention)
    {
        $data = array(
            "THD_REF_ID" => $refid,
            "THD_COORDINATOR" => $coor,
            "THD_COORDINATOR_SECTOR" => $coorSeq,
            "THD_COORDINATOR_TELNO" => $coorContact,
            "THD_EVALUATION" => $evaluationTHD,
            "THD_FOR_ATTENTION" => $attention
        );

        return $this->db->insert("TRAINING_HEAD_DETL", $data);
    }

    // GET TRAINING HEAD
    public function getTrainingHead($refid)
    {
        $this->db->select("TH_REF_ID,
        TH_TYPE,
        TH_CATEGORY,
        TH_LEVEL,
        TH_TRAINING_TITLE,
        TH_TRAINING_DESC,
        TH_TRAINING_VENUE,
        TH_TRAINING_COUNTRY,
        TH_TRAINING_STATE,
        TO_CHAR(TH_DATE_FROM, 'DD/MM/YYYY') TH_DATE_FROM2,
        TO_CHAR(TH_DATE_TO, 'DD/MM/YYYY') TH_DATE_TO2,
        TH_TOTAL_HOURS,
        TH_TRAINING_FEE,
        TH_INTERNAL_EXTERNAL,
        TH_SPONSOR,
        TH_MAX_PARTICIPANT,
        TH_OPEN,
        TO_CHAR(TH_APPLY_CLOSING_DATE, 'DD/MM/YYYY') TH_APPLY_CLOSING_DATE2,
        TH_COMPETENCY_CODE,
        TO_CHAR(TH_EVALUATION_DATE_FROM, 'DD/MM/YYYY') TH_EVALUATION_DATE_FROM2,
        TO_CHAR(TH_EVALUATION_DATE_TO, 'DD/MM/YYYY') TH_EVALUATION_DATE_TO2,
        TH_ORGANIZER_LEVEL,
        TH_ORGANIZER_NAME,
        TH_EVALUATION_COMPULSORY,
        TH_ATTENDANCE_TYPE,
        TH_PRINT_CERTIFICATE,
        TH_STATUS
        ");

        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_REF_ID", $refid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // GET TRAINING HEAD DETL
    public function getTrainingHeadDetl($refid)
    {
        $this->db->select("THD_REF_ID,
        THD_COORDINATOR,
        THD_COORDINATOR_SECTOR,
        THD_COORDINATOR_TELNO,
        THD_FOR_ATTENTION,
        THD_EVALUATION,
        SM_STAFF_NAME
        ");

        $this->db->from("TRAINING_HEAD_DETL");
        $this->db->join("STAFF_MAIN", "THD_COORDINATOR = SM_STAFF_ID", "LEFT");
        $this->db->where("THD_REF_ID", $refid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // UPDATE TRAINING HEAD
    public function saveEditTraining($form, $refid)
    {
        $umg = $this->staff_id;
        $staff_dept_code = "(SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE SM_STAFF_ID = '$umg')";
        $enter_date = 'SYSDATE';

        $data = array(
            "TH_TYPE" => $form['type'],
            "TH_CATEGORY" => $form['category'],
            "TH_LEVEL" => $form['level'],
            "TH_TRAINING_TITLE" => $form['training_title'],
            "TH_TRAINING_DESC" => $form['training_description'],
            "TH_TRAINING_VENUE" => $form['venue'],
            "TH_TRAINING_COUNTRY" => $form['country'],
            "TH_TRAINING_STATE" => $form['state'],
            "TH_TOTAL_HOURS" => $form['total_hours'],
            "TH_TRAINING_FEE" => $form['fee'],
            "TH_INTERNAL_EXTERNAL" => $form['internal_external'],
            "TH_SPONSOR" => $form['sponsor'],
            "TH_MAX_PARTICIPANT" => $form['participants'],
            "TH_OPEN" => $form['online_application'],
            // "TH_COMPETENCY_CODE" => $form['competency_code'],

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

        $this->db->set("TH_DEPT_CODE", $staff_dept_code, false);
        $this->db->set("TH_ENTER_DATE", $enter_date, false);

        if(!empty($form['date_from'])){
            $date_from = "to_date('".$form['date_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_DATE_FROM", $date_from, false);
        }

        if(!empty($form['date_to'])){
            $date_to = "to_date('".$form['date_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_DATE_TO", $date_to, false);
        }

        if(!empty($form['closing_date'])){
            $closing_date = "to_date('".$form['closing_date']."', 'DD/MM/YYYY')";
            $this->db->set("TH_APPLY_CLOSING_DATE", $closing_date, false);
        }

        if(!empty($form['evaluation_period_from'])){
            $evaluation_period_from = "to_date('".$form['evaluation_period_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_FROM", $evaluation_period_from, false);
        }

        if(!empty($form['evaluation_period_to'])){
            $evaluation_period_to = "to_date('".$form['evaluation_period_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_TO", $evaluation_period_to, false);
        }

        $this->db->where("TH_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD", $data);
    }

    // UPDATE TRAINING HEAD DETL
    public function saveUpdTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention)
    {
        $data = array(
            "THD_COORDINATOR" => $coor,
            "THD_COORDINATOR_SECTOR" => $coorSeq,
            "THD_COORDINATOR_TELNO" => $coorContact,
            "THD_EVALUATION" => $evaluationTHD,
            "THD_FOR_ATTENTION" => $attention
        );

        $this->db->where("THD_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD_DETL", $data);
    }

    // ORGANIZER INFO DETL EDIT
    public function getOrgInfoDetlEdit($org_name)
    {
        $this->db->select("TOH_ORG_CODE,
        TOH_ORG_DESC,
        TOH_ADDRESS,
        TOH_POSTCODE,
        TOH_CITY,
        TOH_STATE,
        TOH_COUNTRY,
        TOH_EXTERNAL_AGENCY,
        SM_STATE_DESC,
        CM_COUNTRY_DESC");
        $this->db->from("TRAINING_ORGANIZER_HEAD");
        $this->db->join("STATE_MAIN", "TOH_STATE = SM_STATE_CODE", "LEFT");
        $this->db->join("COUNTRY_MAIN", "TOH_COUNTRY = CM_COUNTRY_CODE", "LEFT");
        $this->db->where("TOH_ORG_CODE", $org_name);

        $q = $this->db->get();
        
        return $q->row();
    }

    // TRAINING COST
    public function getTrainingCost($refid)
    {
        $this->db->select("TC_TRAINING_REFID,
        TC_COST_CODE,
        TC_AMOUNT,
        TC_REMARK,
        TCT_DESC
        ");
        $this->db->from("TRAINING_COST");
        $this->db->join("TRAINING_COST_TYPE", "TCT_CODE = TC_COST_CODE", "LEFT");
        $this->db->where("TC_TRAINING_REFID", $refid);

        $q = $this->db->get();
        
        return $q->result();
    }

    // GET ECOMM URL
    public function getEcommUrl()
    {
        $this->db->select("HP_PARM_DESC");
        $this->db->from("HRADMIN_PARMS");
        $this->db->where("HP_PARM_CODE = 'ECOMMUNITY_STAFF_URL'");

        $q = $this->db->get();
        return $q->row();
    } 

    // TRAINING COST
    public function getCostCodeDd()
    {
        $this->db->select("TCT_CODE,
        TCT_DESC, 
        TCT_CODE||' - '||TCT_DESC TCT_CODE_DESC
        ");
        $this->db->from("TRAINING_COST_TYPE");
        $this->db->where("COALESCE(TCT_STATUS,'N') = 'Y'");
        $this->db->order_by("TCT_CODE");

        $q = $this->db->get();
        
        return $q->result();
    }

    // TRAINING COST DETL
    public function getTrainingCostDetl($refid, $cost_code)
    {
        $this->db->select("TC_TRAINING_REFID,
        TC_COST_CODE,
        TC_AMOUNT,
        TC_REMARK,
        ");
        $this->db->from("TRAINING_COST");
        $this->db->where("TC_TRAINING_REFID", $refid);
        $this->db->where("TC_COST_CODE", $cost_code);

        $q = $this->db->get();
        
        return $q->row();
    }

    // INSERT TRAINING_COST
    public function saveNewTrCost($form)
    {
        $data = array(
            "TC_TRAINING_REFID" => $form['refid'],
            "TC_COST_CODE" => $form['cost_code'],
            "TC_AMOUNT" => $form['amount'],
            "TC_REMARK" => $form['remark']
        );

        return $this->db->insert("TRAINING_COST", $data);
    }

    // UPDATE TRAINING_COST
    public function saveUpdTrCost($form)
    {
        $data = array(
            "TC_AMOUNT" => $form['amount'],
            "TC_REMARK" => $form['remark']
        );

        $this->db->where("TC_TRAINING_REFID", $form['refid']);
        $this->db->where("TC_COST_CODE", $form['cost_code']);

        return $this->db->update("TRAINING_COST", $data);
    }

    // DELETE TRAINING COST
    public function deleteTrainingCost($refid, $code) 
    {
        $this->db->where("TC_TRAINING_REFID", $refid);
        $this->db->where("TC_COST_CODE", $code);
        return $this->db->delete('TRAINING_COST');
    }

    // check training head detl
    public function delVerify1($refid) 
    {
        $this->db->select("1");
        $this->db->from("TRAINING_HEAD_DETL");
        $this->db->where("THD_REF_ID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // check cpd head
    public function delVerify2($refid) 
    {
        $this->db->select("1");
        $this->db->from("CPD_HEAD");
        $this->db->where("CH_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // check training target group
    public function delVerify3($refid) 
    {
        $this->db->select("1");
        $this->db->from("TRAINING_TARGET_GROUP");
        $this->db->where("TTG_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // check training cost
    public function delVerify4($refid) 
    {
        $this->db->select("1");
        $this->db->from("TRAINING_COST");
        $this->db->where("TC_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // check training attachment
    public function delVerify5($refid) 
    {
        $this->db->select("1");
        $this->db->from("TRAINING_DOC_ATTACH");
        $this->db->where("TDA_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // DELETE TRAINING HEAD
    public function delTrainingInfo($refid) 
    {
        $this->db->where('TH_REF_ID', $refid);
        return $this->db->delete('TRAINING_HEAD');
    }

    /*===========================================================
       APPROVE TRAINING SETUP FOR EXTERNAL AGENCY - ATF139
    =============================================================*/

    // GET TRAINING LIST
    public function getTrainingList2($dept, $month, $year, $status)
    {
        $this->db->select("TH_REF_ID,
        TH_TRAINING_TITLE,
        TO_CHAR(TH_DATE_FROM, 'DD/MM/YYYY') TH_DATE_FROM2,
        TO_CHAR(TH_DATE_TO, 'DD/MM/YYYY') TH_DATE_TO2,
        TH_TRAINING_FEE
        ");
        $this->db->from("TRAINING_HEAD");

        if(!empty($dept)) {
            $this->db->where("TH_DEPT_CODE", $dept);
        }

        if(!empty($month)) {
            $this->db->where("COALESCE(TO_CHAR(TH_DATE_FROM,'MM'),'') = '$month'");
        }

        if(!empty($year)) {
            $this->db->where("COALESCE(TO_CHAR(TH_DATE_FROM,'YYYY'),'') = '$year'");
        }

        // if(!empty($year) && !empty($month)) {
        //     $this->db->where("COALESCE(TO_CHAR(TH_DATE_FROM,'MM/YYYY'),'') = '$month/$year'");
        // }

        if(!empty($status)) {
            $this->db->where("COALESCE(TH_STATUS, 'ENTRY') = '$status'");
        }
        
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->order_by("TH_DATE_FROM, TH_DATE_TO, TH_TRAINING_TITLE, TH_REF_ID");
        $q = $this->db->get();
        
        return $q->result();
    }

    // APPROVE/POSTPONE/AMEND/REJECT TRAINING
    public function updStsExtTrainingSetup($refid, $upd_status)
    {
        $currentUsr = $this->staff_id;
        $curDate = 'SYSDATE';

        $data = array(
            "TH_STATUS" =>  $upd_status,
            "TH_APPROVE_BY" => $currentUsr
        );

        $this->db->set("TH_APPROVE_DATE", $curDate, false);

        $this->db->where("TH_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD", $data);
    } 

    // COUNT STAFF TRAINING
    public function getTrainingStaffDetl($refid)
    {
        $this->db->select("COUNT(1) AS C_STAFF");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // UPDATE STH TRAINING
    public function updSthTrainingSetup($refid, $upd_status)
    {
        $data = array(
            "STH_STATUS" =>  $upd_status,
        );

        $this->db->where("STH_TRAINING_REFID", $refid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    } 
    
}
