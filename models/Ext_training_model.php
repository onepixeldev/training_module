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

    // GET ADMIN DEPT
    public function getTrainingAdminDeptCode() {
		$sID = $this->staff_id;
		
        $this->db->select('HP_PARM_DESC AS PARM_DESC');
        $this->db->from('HRADMIN_PARMS');
        $this->db->join('STAFF_MAIN','SM_DEPT_CODE = UPPER(TRIM(HP_PARM_DESC))');
        $this->db->where('HP_PARM_CODE', 'TRAINING_ADM_DEPT_CODE');
        $this->db->where('SM_STAFF_ID', $sID);
        $query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            if ($query->row()->PARM_DESC == '' or $query->row()->PARM_DESC == null){
                return '';
            }else{
                return $query->row()->PARM_DESC;
            }
        }
		
        return '';
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

    // ALL DEPARTMENT 2
    public function getPopulateDept($deptCode)
    {  
        $this->db->select("DM_DEPT_CODE, DM_DEPT_CODE||' - '||DM_DEPT_DESC AS DP_CODE_DESC");
        $this->db->from("DEPARTMENT_MAIN");
        if(!empty($deptCode)) {
            $this->db->where('DM_DEPT_CODE', $deptCode);
        }
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
            "TOH_ORG_CODE" => strtoupper($form['code']),
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

    // GET TRAINING LIST NEW
    public function getTrainingListNew($deptCode)
    {
        $this->db->select("TH_REF_ID,
        TH_TRAINING_TITLE,
        TO_CHAR(TH_DATE_FROM, 'DD/MM/YYYY') TH_DATE_FROM2,
        TO_CHAR(TH_DATE_TO, 'DD/MM/YYYY') TH_DATE_TO2,
        ");
        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_STATUS = 'ENTRY'");
        if(!empty($deptCode)) {
            $this->db->where("TH_DEPT_CODE", $deptCode);
        }
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
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID ||' - '||SM_STAFF_NAME AS SM_STAFF_ID_NAME, TO_CHAR(SYSDATE, 'DD/MM/YYYY') AS CURR_DATE, SM_DEPT_CODE");
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
        } else {
            $this->db->set("TH_EVALUATION_DATE_FROM", '', true);
        }

        if(!empty($form['evaluation_period_to'])){
            $evaluation_period_to = "to_date('".$form['evaluation_period_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_TO", $evaluation_period_to, false);
        } else {
            $this->db->set("TH_EVALUATION_DATE_TO", '', true);
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

    // GET SUM TRAINING COST
    public function getSumTrCost($refid)
    {
        $this->db->select("SUM(TC_AMOUNT) AS SUM_TR_COST");
        $this->db->from("TRAINING_COST");
        $this->db->where("TC_TRAINING_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // UPDATE TRAINING FEE
    public function updTrainingFee($refid, $tr_cost)
    {
        $data = array(
            "TH_TRAINING_FEE" => $tr_cost,
        );

        $this->db->where("TH_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD", $data);
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

    // GET YEAR DROPDOWN
    public function getYearListAppTr() 
    {		
        $this->db->select("TO_CHAR(TH_DATE_FROM,'YYYY') AS CM_YEAR");
        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->group_by("TO_CHAR(TH_DATE_FROM,'YYYY') ");
        $this->db->order_by("TO_CHAR(TH_DATE_FROM,'YYYY') DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

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
    
    /*===========================================================
       APPROVE TRAINING SETUP FOR EXTERNAL AGENCY - ATF139
    =============================================================*/

    // GET YEAR DROPDOWN
    public function getYearListEdtAppTr() 
    {		
        $this->db->select("TO_CHAR(TH_DATE_FROM,'YYYY') AS CM_YEAR");
        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_STATUS = 'APPROVE'");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->group_by("TO_CHAR(TH_DATE_FROM,'YYYY') ");
        $this->db->order_by("TO_CHAR(TH_DATE_FROM,'YYYY') DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // UPDATE TRAINING HEAD
    public function saveEditTraining2($form, $refid)
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

        // if(!empty($form['evaluation_period_from'])){
        //     $evaluation_period_from = "to_date('".$form['evaluation_period_from']."', 'DD/MM/YYYY')";
        //     $this->db->set("TH_EVALUATION_DATE_FROM", $evaluation_period_from, false);
        // }

        // if(!empty($form['evaluation_period_to'])){
        //     $evaluation_period_to = "to_date('".$form['evaluation_period_to']."', 'DD/MM/YYYY')";
        //     $this->db->set("TH_EVALUATION_DATE_TO", $evaluation_period_to, false);
        // }

        if(!empty($form['evaluation_period_from'])){
            $evaluation_period_from = "to_date('".$form['evaluation_period_from']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_FROM", $evaluation_period_from, false);
        } else {
            $this->db->set("TH_EVALUATION_DATE_FROM", '', true);
        }

        if(!empty($form['evaluation_period_to'])){
            $evaluation_period_to = "to_date('".$form['evaluation_period_to']."', 'DD/MM/YYYY')";
            $this->db->set("TH_EVALUATION_DATE_TO", $evaluation_period_to, false);
        } else {
            $this->db->set("TH_EVALUATION_DATE_TO", '', true);
        }

        $this->db->where("TH_REF_ID", $refid);

        return $this->db->update("TRAINING_HEAD", $data);
    }

    /*===========================================================
       APPROVE TRAINING APPLICATIONS FOR EXTERNAL AGENCY - ATF141
    =============================================================*/

    // GET TRAINING LIST
    public function getTrainingList4($dept, $month, $year)
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

        if (!empty($year)) {
            $this->db->where("COALESCE(TO_CHAR(TH_DATE_FROM,'YYYY'),'') = '$year'");
        }
        
        $this->db->where("COALESCE(TH_STATUS, 'ENTRY') = 'APPROVE'");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->order_by("TH_DATE_FROM, TH_DATE_TO, TH_TRAINING_TITLE, TH_REF_ID");
        $q = $this->db->get();
        
        return $q->result();
    }

    // STAFF LIST
    public function getTrStaffList($refid)
    {
        $this->db->select("STH_STAFF_ID,
        SM_STAFF_NAME,
        STH_STATUS,
        SS_JOB_STATUS,
        SJS_STATUS_DESC,
        STH_APPLY_DATE,
        TO_CHAR(STH_APPLY_DATE, 'DD/MM/YYYY') STH_APPLY_DATE2,
        STH_FEE_CODE||' - '||TFS_DESC AS FEE_CODE_DESC,
        TC_AMOUNT,
        STH_FEE_CODE,
        STH_RECOMMENDER_REASON
        ");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = STH_STAFF_ID", "LEFT");
        $this->db->join("STAFF_SERVICE", "SS_STAFF_ID = STH_STAFF_ID", "LEFT");
        $this->db->join("STAFF_JOB_STATUS", "SJS_STATUS_CODE = SS_JOB_STATUS", "LEFT");
        $this->db->join("TRAINING_FEE_SETUP", "TFS_CODE = STH_FEE_CODE", "LEFT");
        $this->db->join("TRAINING_COST", "TC_COST_CODE = 'T001' AND TC_TRAINING_REFID = '$refid'", "LEFT");
        $this->db->where("STH_STATUS = 'RECOMMEND'");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->order_by("get_staff_name(STH_STAFF_ID)");
        $q = $this->db->get();
        
        return $q->result();
    }

    // GET KTP
    public function getKtp()
    {
        $this->db->select("DM_DIRECTOR");
        $this->db->from("DEPARTMENT_MAIN, TRAINING_FEE_SETUP");
        $this->db->where("DM_DEPT_CODE = TFS_DCR_APPROVE");
        $q = $this->db->get();
        
        return $q->row();
    }

    // GET REGISTRAR
    public function getRegistrar()
    {
        $this->db->select("DM_DIRECTOR");
        $this->db->from("DEPARTMENT_MAIN, TRAINING_FEE_SETUP");
        $this->db->where("DM_DEPT_CODE = TFS_REGISTRAR_APPROVE");
        $q = $this->db->get();
        
        return $q->row();
    }

    // STH DETL
    public function getSTHDetl($refid, $staff_id)
    {
        $this->db->select("STH_STAFF_ID,
        STH_TRAINING_REFID,
        STH_FEE_CODE,
        STH_STATUS,
        ");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->where("STH_STAFF_ID", $staff_id);
        $this->db->where("STH_TRAINING_REFID", $refid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // EVALUATOR DETL
    public function getEvaDetl($refid, $staff_id)
    {
        $this->db->select("STH_VERIFY_BY");
        $this->db->from("STAFF_TRAINING_HEAD, TRAINING_HEAD_DETL, TRAINING_HEAD");
        $this->db->where("STH_STAFF_ID", $staff_id);
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->where("COALESCE(THD_EVALUATION,'N') = 'Y'");
        $this->db->where("THD_REF_ID = STH_TRAINING_REFID");
        $this->db->where("TH_REF_ID = STH_TRAINING_REFID");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $q = $this->db->get();
        
        return $q->row();
    }

    // UPDATE TRAINING HEAD (APPROVE)
    public function updateApprove($refid, $sid, $fee_code, $cur_usr_id, $rem, $eva_id)
    {
        $curr_date = 'SYSDATE';

        $data = array(
            "STH_FEE_CODE" => $fee_code,
            "STH_STATUS" => 'RECOMMEND_BSM',
            "STH_RECOMMEND_BY" => $cur_usr_id,
            "STH_RECOMMENDER_REASON" => $rem,
            "STH_EVALUATOR_ID" => $eva_id
        );

        $this->db->set("STH_RECOMMEND_DATE", $curr_date, false);

        $this->db->where("STH_STAFF_ID", $sid);
        $this->db->where("STH_TRAINING_REFID", $refid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    // UPDATE TRAINING HEAD KTP / REG
    public function updateApproveKtpReg($refid, $sid, $fee_code, $cur_usr_id, $rem, $eva_id)
    {
        $curr_date = 'SYSDATE';

        $data = array(
            "STH_FEE_CODE" => $fee_code,
            "STH_STATUS" => 'APPROVE',
            "STH_APPROVE_BY" => $cur_usr_id,
            "STH_APPROVE_REASON" => $rem,
            "STH_RECOMMENDER_REASON" => $rem,
            "STH_EVALUATOR_ID" => $eva_id
        );

        $this->db->set("STH_APPROVE_DATE", $curr_date, false);

        $this->db->where("STH_STAFF_ID", $sid);
        $this->db->where("STH_TRAINING_REFID", $refid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    // UPDATE TRAINING HEAD (REJECT)
    public function updateReject($refid, $sid, $fee_code, $cur_usr_id, $rem)
    {
        $curr_date = 'SYSDATE';

        $data = array(
            "STH_FEE_CODE" => $fee_code,
            "STH_STATUS" => 'REJECT',
            "STH_RECOMMEND_BY" => $cur_usr_id,
            "STH_RECOMMENDER_REASON" => $rem
        );

        $this->db->set("STH_RECOMMEND_DATE", $curr_date, false);

        $this->db->where("STH_STAFF_ID", $sid);
        $this->db->where("STH_TRAINING_REFID", $refid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    // UPDATE TRAINING HEAD (REJECT - KTP / REG)
    public function updateRejectKtpReg($refid, $sid, $fee_code, $cur_usr_id, $rem)
    {
        $curr_date = 'SYSDATE';

        $data = array(
            "STH_FEE_CODE" => $fee_code,
            "STH_STATUS" => 'REJECT',
            "STH_APPROVE_BY" => $cur_usr_id,
            "STH_APPROVE_REASON" => $rem,
            "STH_RECOMMENDER_REASON" => $rem
        );

        $this->db->set("STH_APPROVE_DATE", $curr_date, false);

        $this->db->where("STH_STAFF_ID", $sid);
        $this->db->where("STH_TRAINING_REFID", $refid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    // GET KTP / SUPERIOR
    public function getKtpSup()
    {
        $this->db->select("DM_DIRECTOR");
        $this->db->from("DEPARTMENT_MAIN, TRAINING_FEE_SETUP");
        $this->db->where("DM_DEPT_CODE = TFS_DCR_APPROVE");
        $this->db->where("TFS_CODE = '001'");
        $q = $this->db->get();
        
        return $q->row();
    }

    // GET REGISTRAR / SUPERIOR
    public function getRegSup()
    {
        $this->db->select("DM_DIRECTOR");
        $this->db->from("DEPARTMENT_MAIN, TRAINING_FEE_SETUP");
        $this->db->where("DM_DEPT_CODE = TFS_REGISTRAR_APPROVE");
        $this->db->where("TFS_CODE = '002'");
        $q = $this->db->get();
        
        return $q->row();
    }

    // SEND APPROVE MEMO 001
    public function SendApproveMemo001($cur_usr_id, $refid, $ktp_sup, $cc_user) 
    {
        $sts = null;

		$sql = oci_parse($this->db->conn_id, "begin :bindOutput1 := EXTERNAL_TRAINING.SendApproveMemo001(:bind1,:bind2,:bind3,:bind4); end;");
		oci_bind_by_name($sql, ":bind1", $cur_usr_id);	//IN
		oci_bind_by_name($sql, ":bind2", $refid);		//IN
        oci_bind_by_name($sql, ":bind3", $ktp_sup);		//IN
        oci_bind_by_name($sql, ":bind4", $cc_user);		//IN
        oci_bind_by_name($sql, ":bindOutput1", $sts);	//OUT
		$q = oci_execute($sql, OCI_DEFAULT); 
		
        if ($q === FALSE) {
			return 0;
		}
		
        return 1;
        // var_dump($q); 	
    } 

    // SEND APPROVE MEMO 002
    public function SendApproveMemo002($cur_usr_id, $refid, $reg_sup, $cc_user) 
    {
        $sts = null;

		$sql = oci_parse($this->db->conn_id, "begin :bindOutput1 := EXTERNAL_TRAINING.SendApproveMemo002(:bind1,:bind2,:bind3,:bind4); end;");
		oci_bind_by_name($sql, ":bind1", $cur_usr_id);	//IN
		oci_bind_by_name($sql, ":bind2", $refid);		//IN
        oci_bind_by_name($sql, ":bind3", $reg_sup);		//IN
        oci_bind_by_name($sql, ":bind4", $cc_user);		//IN
        oci_bind_by_name($sql, ":bindOutput1", $sts);	//OUT
		$q = oci_execute($sql, OCI_DEFAULT); 
		
        if ($q === FALSE) {
			return 0;
		}
		
        return 1;
        // var_dump($q); 	
    } 

    // SEND APPROVE MEMO 003
    public function SendApproveMemo003($cur_usr_id, $refid, $sid) 
    {
        $sts = null;

		$sql = oci_parse($this->db->conn_id, "begin :bindOutput1 := EXTERNAL_TRAINING.SendApproveMemo003(:bind1,:bind2,:bind3); end;");
		oci_bind_by_name($sql, ":bind1", $cur_usr_id);	//IN
		oci_bind_by_name($sql, ":bind2", $refid);		//IN
        oci_bind_by_name($sql, ":bind3", $sid);		//IN
        oci_bind_by_name($sql, ":bindOutput1", $sts);	//OUT
		$q = oci_execute($sql, OCI_DEFAULT); 
		
        if ($q === FALSE) {
			return 0;
		}
		
        return 1;
        // var_dump($q); 	
    } 

    // SEND APPROVE MEMO 004
    public function SendApproveMemo004($cur_usr_id, $refid, $sid) 
    {
        $sts = null;

		$sql = oci_parse($this->db->conn_id, "begin :bindOutput1 := EXTERNAL_TRAINING.SendApproveMemo004(:bind1,:bind2,:bind3); end;");
		oci_bind_by_name($sql, ":bind1", $cur_usr_id);	//IN
		oci_bind_by_name($sql, ":bind2", $refid);		//IN
        oci_bind_by_name($sql, ":bind3", $sid);		//IN
        oci_bind_by_name($sql, ":bindOutput1", $sts);	//OUT
		$q = oci_execute($sql, OCI_DEFAULT); 
		
        if ($q === FALSE) {
			return 0;
		}
		
        return 1;
        // var_dump($q); 	
    } 

    // GET REJECT MEMO DETL
    public function getRejMemoDetl($refid, $sid)
    {
        $this->db->select("STH_STAFF_ID, 
        TH_TRAINING_TITLE, 
        COALESCE(TH_TRAINING_VENUE,'') STH_VENUE,
        TO_CHAR(TH_DATE_FROM,'DD/MM/YYYY') TH_DATE_FROM,
        TO_CHAR(TH_DATE_TO,'DD/MM/YYYY') TH_DATE_TO, 
        STH_STATUS,
		TO_CHAR(TH_DATE_FROM-7,'DD/MM/YYYY') TH_DUE_DATE");
        $this->db->from("TRAINING_HEAD");
        // $this->db->where("TH_REF_ID(+) = STH_TRAINING_REFID");
        $this->db->join("STAFF_TRAINING_HEAD", "TH_REF_ID = STH_TRAINING_REFID", "LEFT");
        $this->db->where("(TH_REF_ID = '$refid'
		AND STH_STAFF_ID = '$sid')");
        $q = $this->db->get();
        
        return $q->row();
    }

    // SEND MEMO
    public function createMemo($cur_usr_id, $sid, $cc = null, $memoTitle, $memoContent) 
    {
		$sql = oci_parse($this->db->conn_id, "begin create_memo(:bind1,:bind2,null,:bind3,:bind4); end;");
		oci_bind_by_name($sql, ":bind1", $cur_usr_id);		    //IN
		oci_bind_by_name($sql, ":bind2", $sid);				    //IN
		oci_bind_by_name($sql, ":bind3", $memoTitle, 255);		//IN
		oci_bind_by_name($sql, ":bind4", $memoContent, 4000);	//IN
		$q = oci_execute($sql, OCI_DEFAULT); 
		
        if ($q === FALSE) {
			return 0;
		}
		
		return 1;	
    } 

    /*===========================================================
       ASSIGN TRAINING COST TO STAFF - ATF029
    =============================================================*/

    // GET YEAR DROPDOWN
    public function getYearListTrCost() 
    {		
        $this->db->select("TO_CHAR(TH_DATE_FROM,'YYYY') AS CM_YEAR");
        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_STATUS = 'APPROVE'");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->group_by("TO_CHAR(TH_DATE_FROM,'YYYY') ");
        $this->db->order_by("TO_CHAR(TH_DATE_FROM,'YYYY') DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // STAFF LIST
    public function getTrStaffCostList($refid)
    {
        $this->db->select("STCM_STAFF_ID,
        STCM_TRAINING_REFID,
        STCM_TOTAL_AMOUNT,
        SM_STAFF_NAME
        ");
        $this->db->from("STAFF_TRAINING_COST_MAIN");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = STCM_STAFF_ID", "LEFT");
        $this->db->where("STCM_TRAINING_REFID", $refid);
        $this->db->order_by("UPPER(GET_STAFF_NAME(STCM_STAFF_ID))");
        $q = $this->db->get();
        
        return $q->result();
    }

    // PAYMENT DETAILS
    public function getPaymentDetl($staff_id, $refid)
    {
        $this->db->select("STCD_STAFF_ID,
        STCD_TRAINING_REFID,
        STCD_COST_CODE,
        STCD_AMOUNT,
        TCT_DESC
        ");
        $this->db->from("STAFF_TRAINING_COST_DETL");
        $this->db->join("TRAINING_COST_TYPE", "TCT_CODE = STCD_COST_CODE", "LEFT");
        $this->db->where("STCD_STAFF_ID", $staff_id);
        $this->db->where("STCD_TRAINING_REFID", $refid);
        $q = $this->db->get();
        
        return $q->result();
    }

    // APPLICANT DETL
    public function getApplicantDetl($staff_id)
    {
        $this->db->select("SM_STAFF_NAME,
        SM_STAFF_ID
        ");
        $this->db->from("STAFF_MAIN");
        $this->db->where("SM_STAFF_ID", $staff_id);
        $q = $this->db->get();
        
        return $q->row();
    }

    // STAFF TRAINING COST DETL
    public function getTrStaffCostDetl($refid, $staff_id)
    {
        $this->db->select("STCM_STAFF_ID,
        STCM_TRAINING_REFID,
        STCM_TOTAL_AMOUNT
        ");
        $this->db->from("STAFF_TRAINING_COST_MAIN");
        $this->db->where("STCM_TRAINING_REFID", $refid);
        $this->db->where("STCM_STAFF_ID", $staff_id);
        $q = $this->db->get();
        
        return $q->row();
    }

    // UPDATE STAFF_TRAINING_COST_MAIN
    public function saveUpdAssignStaffCost($form) 
    {
        $data = array(
            "STCM_TOTAL_AMOUNT" => $form['amount']
        );

        $this->db->where("STCM_TRAINING_REFID", $form['refid']);
        $this->db->where("STCM_STAFF_ID", $form['staff_id']);

        return $this->db->update("STAFF_TRAINING_COST_MAIN", $data);
    }

    // COST CODE DD
    public function getCostCodeDD2($refid, $staff_id)
    {
        $this->db->select("TC_COST_CODE,
        TCT_DESC, 
        TC_AMOUNT,
        TC_COST_CODE||' - '||TCT_DESC TC_COST_CODE_DESC
        ");
        $this->db->from("TRAINING_COST, TRAINING_COST_TYPE");
        $this->db->where("TC_COST_CODE = TCT_CODE");
        $this->db->where("TC_TRAINING_REFID", $refid);
        $this->db->where("TC_COST_CODE NOT IN (SELECT STCD_COST_CODE
        FROM STAFF_TRAINING_COST_DETL
        WHERE STCD_TRAINING_REFID = '$refid'
        AND STCD_STAFF_ID = '$staff_id')");
        $q = $this->db->get();
        
        return $q->result();
    }

    // COST CODE DETL
    public function getCostCodeDetl($refid, $staff_id, $cost_code)
    {
        $this->db->select("TC_COST_CODE,
        TCT_DESC, 
        TC_AMOUNT
        ");
        $this->db->from("TRAINING_COST, TRAINING_COST_TYPE");
        $this->db->where("TC_COST_CODE = TCT_CODE");
        $this->db->where("TC_TRAINING_REFID", $refid);
        $this->db->where("TC_COST_CODE NOT IN (SELECT STCD_COST_CODE
        FROM STAFF_TRAINING_COST_DETL
        WHERE STCD_TRAINING_REFID = '$refid'
        AND STCD_STAFF_ID = '$staff_id')");
        $this->db->where("TC_COST_CODE", $cost_code);
        $q = $this->db->get();
        
        return $q->row();
    }

    // INSERT STAFF_TRAINING_COST_DETL
    public function savePayDetl($form) 
    {
        $data = array(
            "STCD_STAFF_ID" => $form['staff_id'],
            "STCD_TRAINING_REFID" => $form['refid'],
            "STCD_COST_CODE" => $form['cost_code'],
            "STCD_AMOUNT" => $form['amount']
        );

        return $this->db->insert("STAFF_TRAINING_COST_DETL", $data);
    }

    // SUM STCD
    public function getSumSTCD($refid, $staff_id)
    {
        $this->db->select("COALESCE(SUM(STCD_AMOUNT),0) SUM_STCD");
        $this->db->from("STAFF_TRAINING_COST_DETL");
        $this->db->where("STCD_STAFF_ID", $staff_id);
        $this->db->where("STCD_TRAINING_REFID", $refid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // UPDATE STAFF_TRAINING_COST_MAIN 2
    public function saveUpdateStfTrCostMain($refid, $staff_id, $amt) 
    {
        $data = array(
            "STCM_TOTAL_AMOUNT" => $amt
        );

        $this->db->where("STCM_TRAINING_REFID", $refid);
        $this->db->where("STCM_STAFF_ID", $staff_id);

        return $this->db->update("STAFF_TRAINING_COST_MAIN", $data);
    }

    // CHECK STCD
    public function checkSTCD($refid, $staff_id)
    {
        $this->db->select("1");
        $this->db->from("STAFF_TRAINING_COST_DETL");
        $this->db->where("STCD_STAFF_ID", $staff_id);
        $this->db->where("STCD_TRAINING_REFID", $refid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // DELETE STCM
    public function delStfTrCost($refid, $staff_id) 
    {
        $this->db->where("STCM_TRAINING_REFID", $refid);
        $this->db->where("STCM_STAFF_ID", $staff_id);
        return $this->db->delete('STAFF_TRAINING_COST_MAIN');
    }

    // DELETE STCD
    public function delPayDetl($refid, $staff_id, $code_code) 
    {
        $this->db->where("STCD_TRAINING_REFID", $refid);
        $this->db->where("STCD_STAFF_ID", $staff_id);
        $this->db->where("STCD_COST_CODE", $code_code);
        return $this->db->delete('STAFF_TRAINING_COST_DETL');
    }

    /*===========================================================
       APPROVE TRAINING BY MPE FOR EXTERNAL AGENCY - ATF143
    =============================================================*/

    // GET YEAR DROPDOWN
    public function getYearListAppTr2() 
    {		
        $this->db->select("TO_CHAR(TH_DATE_FROM,'YYYY') AS CM_YEAR");
        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_STATUS = 'APPROVE'");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->group_by("TO_CHAR(TH_DATE_FROM,'YYYY')");
        $this->db->order_by("TO_CHAR(TH_DATE_FROM,'YYYY') DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // GET TRAINING LIST
    public function getTrainingList5($dept, $month, $year)
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

        if (!empty($year)) {
            $this->db->where("COALESCE(TO_CHAR(TH_DATE_FROM,'YYYY'),'') = '$year'");
        }
        
        $this->db->where("COALESCE(TH_STATUS, 'ENTRY') = 'APPROVE'");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->where("TH_TRAINING_FEE >= '5000.01'");
        $this->db->order_by("TH_DATE_FROM, TH_DATE_TO, TH_TRAINING_TITLE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // STAFF LIST
    public function getTrStaffList3($refid)
    {
        $this->db->select("STH_STAFF_ID,
        SM_STAFF_NAME,
        STH_STATUS,
        SS_JOB_STATUS,
        SJS_STATUS_DESC,
        STH_APPLY_DATE,
        TO_CHAR(STH_APPLY_DATE, 'DD/MM/YYYY') STH_APPLY_DATE2,
        STH_FEE_CODE||' - '||TFS_DESC AS FEE_CODE_DESC,
        TC_AMOUNT,
        STH_FEE_CODE,
        STH_RECOMMENDER_REASON,
        STH_APPROVE_REASON
        ");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = STH_STAFF_ID", "LEFT");
        $this->db->join("STAFF_SERVICE", "SS_STAFF_ID = STH_STAFF_ID", "LEFT");
        $this->db->join("STAFF_JOB_STATUS", "SJS_STATUS_CODE = SS_JOB_STATUS", "LEFT");
        $this->db->join("TRAINING_FEE_SETUP", "TFS_CODE = STH_FEE_CODE", "LEFT");
        $this->db->join("TRAINING_COST", "TC_COST_CODE = 'T001' AND TC_TRAINING_REFID = '$refid'", "LEFT");
        $this->db->where("STH_STATUS = 'RECOMMEND_BSM'");
        $this->db->where("STH_FEE_CODE IN (SELECT TFS_CODE FROM TRAINING_FEE_SETUP WHERE COALESCE(TFS_MPE_APPROVE,'N') = 'Y')");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->order_by("get_staff_name(STH_STAFF_ID)");
        $q = $this->db->get();
        
        return $q->result();
    }

    // UPDATE STH
    public function updateSTH($refid, $sid, $cur_usr_id, $rem)
    {
        $curr_date = 'SYSDATE';

        $data = array(
            "STH_STATUS" => 'APPROVE',
            "STH_APPROVE_BY" => $cur_usr_id,
            "STH_APPROVE_REASON" => $rem
        );

        $this->db->set("STH_APPROVE_DATE", $curr_date, false);

        $this->db->where("STH_STAFF_ID", $sid);
        $this->db->where("STH_TRAINING_REFID", $refid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    // UPDATE STD
    public function updateSTD($refid, $sid, $mpe_date)
    {
        if(!empty($mpe_date)) {
            $date = "TO_DATE('".$mpe_date."', 'DD/MM/YYYY')";
            $this->db->set("STD_MPE_DATE", $date, false);
        } 

        $this->db->where("STD_TRAINING_REFID", $refid);
        $this->db->where("STD_STAFF_ID", $sid);

        return $this->db->update("STAFF_TRAINING_DETL");
    }

    // GET DM_DIRECTOR
    public function getDeptDirector($sid)
    {
        $this->db->select("DM_DIRECTOR");
        $this->db->from("DEPARTMENT_MAIN, STAFF_MAIN");
        $this->db->where("SM_DEPT_CODE = DM_DEPT_CODE");
        $this->db->where("SM_STAFF_ID", $sid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SEND MEMO 2
    public function createMemo2($cur_usr_id, $sid, $cc_hod, $memoTitle, $memoContent) 
    {
		$sql = oci_parse($this->db->conn_id, "begin create_memo(:bind1,:bind2,:bind3,:bind4,:bind5); end;");
		oci_bind_by_name($sql, ":bind1", $cur_usr_id);		    //IN
        oci_bind_by_name($sql, ":bind2", $sid);				    //IN
        oci_bind_by_name($sql, ":bind3", $cc_hod);				//IN
		oci_bind_by_name($sql, ":bind4", $memoTitle, 255);		//IN
		oci_bind_by_name($sql, ":bind5", $memoContent, 4000);	//IN
		$q = oci_execute($sql, OCI_DEFAULT); 
		
        if ($q === FALSE) {
			return 0;
		}
		
		return 1;	
    } 

    // UPDATE STH 2
    public function updateSTH2($refid, $sid, $cur_usr_id, $rem)
    {
        $curr_date = 'SYSDATE';

        $data = array(
            "STH_STATUS" => 'REJECT',
            "STH_APPROVE_BY" => $cur_usr_id,
            "STH_APPROVE_REASON" => $rem
        );

        $this->db->set("STH_APPROVE_DATE", $curr_date, false);

        $this->db->where("STH_STAFF_ID", $sid);
        $this->db->where("STH_TRAINING_REFID", $refid);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    /*===========================================================
       ASSIGN TRAINING FOR EXTERNAL AGENCY - ATF142
    =============================================================*/

    // GET TRAINING LIST 6
    public function getTrainingList6($dept, $month, $year)
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

        if (!empty($year)) {
            $this->db->where("COALESCE(TO_CHAR(TH_DATE_FROM,'YYYY'),'') = '$year'");
        }
        
        $this->db->where("TH_STATUS = 'APPROVE'");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->order_by("TH_DATE_FROM, TH_DATE_TO, TH_TRAINING_TITLE, TH_REF_ID");
        $q = $this->db->get();
        
        return $q->result();
    }

    // STAFF LIST
    public function getTrStaffList4($refid)
    {
        $this->db->select("STH_STAFF_ID,
        SM_STAFF_NAME,
        STH_STATUS,
        STH_APPLY_DATE,
        TO_CHAR(STH_APPLY_DATE, 'DD/MM/YYYY') STH_APPLY_DATE2,
        STH_FEE_CODE||' - '||TFS_DESC AS FEE_CODE_DESC,
        TC_AMOUNT,
        STH_FEE_CODE,
        STH_RECOMMENDER_REASON,
        STH_APPROVE_REASON,
        SM_DEPT_CODE STAFF_DEPT,
        TPR_DESC,
        STH_STAFF_TRAINING_BENEFIT,
        STH_DEPT_TRAINING_BENEFIT,
        CASE STH_HOD_EVALUATION
        WHEN 'Y' THEN 'Yes'
        WHEN 'N' THEN 'No'
        END STH_HOD_EVALUATION2,
        STH_HOD_EVALUATION
        ");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = STH_STAFF_ID", "LEFT");
        $this->db->join("TRAINING_PARTICIPANT_ROLE", "TPR_CODE = STH_PARTICIPANT_ROLE", "LEFT");
        // $this->db->join("STAFF_SERVICE", "SS_STAFF_ID = STH_STAFF_ID", "LEFT");
        // $this->db->join("STAFF_JOB_STATUS", "SJS_STATUS_CODE = SS_JOB_STATUS", "LEFT");
        $this->db->join("TRAINING_FEE_SETUP", "TFS_CODE = STH_FEE_CODE", "LEFT");
        $this->db->join("TRAINING_COST", "TC_COST_CODE = 'T001' AND TC_TRAINING_REFID = '$refid'", "LEFT");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->order_by("STH_STAFF_ID, UPPER(GET_STAFF_DEPT(STH_STAFF_ID)), STH_STATUS, UPPER(GET_STAFF_NAME(STH_STAFF_ID))");
        $q = $this->db->get();
        
        return $q->result();
    }

    // ROLE DD
    public function getRoleDD()
    {
        $this->db->select("TPR_CODE,
        TPR_DESC,
        TPR_CODE||' - '||TPR_DESC TPR_CODE_DESC
        ");
        $this->db->from("TRAINING_PARTICIPANT_ROLE");
        $this->db->order_by("TPR_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // FEE DD
    public function getFeeDD()
    {
        $this->db->select("TFS_CODE,
        TFS_DESC,
        TFS_CODE||' - '||TFS_DESC TFS_CODE_DESC
        ");
        $this->db->from("TRAINING_FEE_SETUP");
        $this->db->order_by("TFS_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // STAFF DEPT
    public function getStaffDept($staff_id)
    {
        $this->db->select("SM_DEPT_CODE");
        $this->db->from("STAFF_MAIN");
        $this->db->where("SM_STAFF_ID", $staff_id);
        $q = $this->db->get();
        
        return $q->row();
    }

    // TRAINING FEE
    public function getTrainingFee($refid)
    {
        $this->db->select("TC_AMOUNT");
        $this->db->from("TRAINING_COST");
        $this->db->where("TC_COST_CODE = 'T001'");
        $this->db->where("TC_TRAINING_REFID", $refid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // ASSIGN STAFF DETL
    public function assignStaffDetl($refid, $staff_id)
    {
        $this->db->select("STH_STAFF_ID, STH_TRAINING_REFID");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->where("STH_STAFF_ID", $staff_id);
        $q = $this->db->get();
        
        return $q->row();
    }

    // TRAINING HEAD DETL
    public function getTrDetl($refid)
    {
        $this->db->select("TH_ATTENDANCE_TYPE, COALESCE(TH_EVALUATION_COMPULSORY,'N') TH_EVALUATION_COMPULSORY");
        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_REF_ID", $refid);
        $q = $this->db->get();
        
        return $q->row();
    }

    // ASSIGN NEW STAFF
    public function saveAssignStaff($form, $sth_complete, $eva_id)
    {
        $curr_usr = $this->staff_id;
        $curr_date = 'SYSDATE';
        $status = $form['status'];
        $role = $form['role'];

        $sth_approve_by = '';
        $sth_approve_date = '';
        $sth_verify_by = '';
        $sth_verify_date = '';
        $sth_recommend_by = '';
        $sth_recommend_date = '';

        // AUTO ASSIGN ROLE PESERTA
        if(empty($form['role'])) {
            $role = 'D';
        }

        if($status == 'APPROVE' || $status == 'REJECT') {
            $sth_approve_by = $curr_usr;
            $sth_approve_date = $curr_date;
        } elseif($status == 'RECOMMEND') {
            $sth_verify_by = $curr_usr;
            $sth_verify_date = $curr_date;
        } elseif($status == 'RECOMMEND_BSM') {
            $sth_recommend_by = $curr_usr;
            $sth_recommend_date = $curr_date;
        }

        $data = array(
            "STH_TRAINING_REFID" => $form['refid'],
            "STH_STAFF_ID" => $form['staff_id_form'],
            "STH_PARTICIPANT_ROLE" =>  $role,
            "STH_STATUS" =>  $form['status'],
            "STH_FEE_CODE" =>  $form['fee_category'],
            "STH_STAFF_TRAINING_BENEFIT" =>  $form['tr_benefit_stf'],
            "STH_DEPT_TRAINING_BENEFIT" =>  $form['tr_benefit_dept'],
            "STH_RECOMMENDER_REASON" =>  $form['remark'],
            "STH_APPROVE_REASON" =>  $form['remark_other'],
            "STH_HOD_EVALUATION" =>  $form['eva_status'],
            "STH_ENTER_BY" => $curr_usr,
        );

        $this->db->set("STH_ENTER_DATE", $curr_date, false);

        // APPROVE & REJECT
        if(!empty($sth_approve_by)) {
            $this->db->set("STH_APPROVE_BY", $sth_approve_by);
        }

        if(!empty($sth_approve_date)) {
            $this->db->set("STH_APPROVE_DATE", $sth_approve_date, false);
        }

        // RECOMMEND
        if(!empty($sth_verify_by)) {
            $this->db->set("STH_VERIFY_BY", $sth_verify_by);
        }

        if(!empty($sth_verify_date)) {
            $this->db->set("STH_VERIFY_DATE", $sth_verify_date, false);
        }

        // RECOMMEND_BSM
        if(!empty($sth_recommend_by)) {
            $this->db->set("STH_RECOMMEND_BY", $sth_verify_by);
        }

        if(!empty($sth_recommend_date)) {
            $this->db->set("STH_RECOMMEND_DATE", $sth_recommend_date, false);
        } 

        // STH_COMPLETE
        if(!empty($sth_complete)) {
            $this->db->set("STH_COMPLETE", $sth_complete);
        }

        // STH_EVALUATOR_ID
        if(!empty($eva_id)) {
            $this->db->set("STH_EVALUATOR_ID", $eva_id);
        }

        return $this->db->insert("STAFF_TRAINING_HEAD", $data);
    }

    // ASSIGN STAFF DETL 2
    public function getAssignStfDetl($refid, $staff_id)
    {
        $this->db->select("STH_STAFF_ID,
        SM_STAFF_NAME,
        STH_STATUS,
        STH_APPLY_DATE,
        TO_CHAR(STH_APPLY_DATE, 'DD/MM/YYYY') STH_APPLY_DATE2,
        STH_FEE_CODE||' - '||TFS_DESC AS FEE_CODE_DESC,
        TC_AMOUNT,
        STH_FEE_CODE,
        STH_RECOMMENDER_REASON,
        STH_APPROVE_REASON,
        SM_DEPT_CODE STAFF_DEPT,
        TPR_DESC,
        STH_STAFF_TRAINING_BENEFIT,
        STH_DEPT_TRAINING_BENEFIT,
        CASE STH_HOD_EVALUATION
        WHEN 'Y' THEN 'Yes'
        WHEN 'N' THEN 'No'
        END STH_HOD_EVALUATION2,
        STH_HOD_EVALUATION,
        STH_PARTICIPANT_ROLE
        ");
        $this->db->from("STAFF_TRAINING_HEAD");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = STH_STAFF_ID", "LEFT");
        $this->db->join("TRAINING_PARTICIPANT_ROLE", "TPR_CODE = STH_PARTICIPANT_ROLE", "LEFT");
        $this->db->join("TRAINING_FEE_SETUP", "TFS_CODE = STH_FEE_CODE", "LEFT");
        $this->db->join("TRAINING_COST", "TC_COST_CODE = 'T001' AND TC_TRAINING_REFID = '$refid'", "LEFT");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->where("STH_STAFF_ID", $staff_id);
        $q = $this->db->get();
        
        return $q->row();
    }

    // GET EVALUATOR DETL
    public function getEvaluatorDetl($staff_id)
    {
        $this->db->select("DM_DIRECTOR");
        $this->db->from("DEPARTMENT_MAIN, STAFF_MAIN");
        $this->db->where("SM_DEPT_CODE = DM_DEPT_CODE");
        $this->db->where("SM_STAFF_ID", $staff_id);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SAVE EDIT ASSIGN STAFF
    public function saveEditAssignStaff($form, $sth_complete)
    {
        $curr_usr = $this->staff_id;
        $curr_date = 'SYSDATE';
        $status = $form['status'];
        $role = $form['role'];

        $sth_approve_by = '';
        $sth_approve_date = '';
        $sth_verify_by = '';
        $sth_verify_date = '';
        $sth_recommend_by = '';
        $sth_recommend_date = '';

        // AUTO ASSIGN ROLE PESERTA
        if(empty($form['role'])) {
            $role = 'D';
        }

        if($status == 'APPROVE' || $status == 'REJECT') {
            $sth_approve_by = $curr_usr;
            $sth_approve_date = $curr_date;
        } elseif($status == 'RECOMMEND') {
            $sth_verify_by = $curr_usr;
            $sth_verify_date = $curr_date;
        } elseif($status == 'RECOMMEND_BSM') {
            $sth_recommend_by = $curr_usr;
            $sth_recommend_date = $curr_date;
        }

        $data = array(
            "STH_PARTICIPANT_ROLE" =>  $role,
            "STH_STATUS" =>  $form['status'],
            "STH_FEE_CODE" =>  $form['fee_category'],
            "STH_STAFF_TRAINING_BENEFIT" =>  $form['tr_benefit_stf'],
            "STH_DEPT_TRAINING_BENEFIT" =>  $form['tr_benefit_dept'],
            "STH_RECOMMENDER_REASON" =>  $form['remark'],
            "STH_APPROVE_REASON" =>  $form['remark_other'],
            "STH_HOD_EVALUATION" =>  $form['eva_status'],
            "STH_ENTER_BY" => $curr_usr,
        );

        $this->db->set("STH_ENTER_DATE", $curr_date, false);

        // APPROVE & REJECT
        if(!empty($sth_approve_by)) {
            $this->db->set("STH_APPROVE_BY", $sth_approve_by);
        }

        if(!empty($sth_approve_date)) {
            $this->db->set("STH_APPROVE_DATE", $sth_approve_date, false);
        }

        // RECOMMEND
        if(!empty($sth_verify_by)) {
            $this->db->set("STH_VERIFY_BY", $sth_verify_by);
        }

        if(!empty($sth_verify_date)) {
            $this->db->set("STH_VERIFY_DATE", $sth_verify_date, false);
        }

        // RECOMMEND_BSM
        if(!empty($sth_recommend_by)) {
            $this->db->set("STH_RECOMMEND_BY", $sth_recommend_by);
        }

        if(!empty($sth_recommend_date)) {
            $this->db->set("STH_RECOMMEND_DATE", $sth_recommend_date, false);
        }

        // STH_COMPLETE
        if(!empty($sth_complete)) {
            $this->db->set("STH_COMPLETE", $sth_complete);
        }

        // // STH_EVALUATOR_ID
        // if(!empty($eva_id)) {
        //     $this->db->set("STH_EVALUATOR_ID", $eva_id);
        // }
        
        $this->db->where("STH_TRAINING_REFID", $form['refid']);
        $this->db->where("STH_STAFF_ID", $form['staff_id_form']);

        return $this->db->update("STAFF_TRAINING_HEAD", $data);
    }

    // GET SUM CNT
    public function getSumCNT($staff_id)
    {
        $query = $this->db->query("SELECT SUM(CNT) SUM_CNT FROM
        (SELECT SUM(STH_CPD_MARK)CNT
        FROM STAFF_TRAINING_HEAD, TRAINING_HEAD
        WHERE STH_TRAINING_REFID=TH_REF_ID
        AND STH_STAFF_ID='$staff_id'
        AND STH_STATUS='APPROVE'
        AND STH_CPD_COMPETENCY='UMUM'
        AND TO_CHAR(TH_DATE_FROM,'YYYY')=TO_CHAR(SYSDATE,'YYYY')
        UNION
        SELECT SUM(SCM_CPD_MARK)CNT
        FROM STAFF_CONFERENCE_MAIN,CONFERENCE_MAIN,STAFF_CONFERENCE_REP, CPD_HEAD
        WHERE SCM_REFID=CM_REFID
        AND SCM_STAFF_ID = SCR_STAFF_ID(+)
        AND SCM_REFID = SCR_REFID(+)
        AND CH_TRAINING_REFID=CM_REFID
        AND SCM_STAFF_ID='$staff_id'
        AND TO_CHAR(CM_DATE_TO,'yyyy')=TO_CHAR(SYSDATE,'YYYY')
        AND SCM_STATUS = 'APPROVE'
        AND ((CH_REPORT_SUBMISSION = 'N')
        OR (CH_REPORT_SUBMISSION='Y' AND SCR_STATUS = 'VERIFY_TNCA'))
        AND SCM_CPD_COMPETENCY ='UMUM')");

        $row = $query->row();
        
        return $row;
    }

    // GET SUM CNT 2
    public function getSumCNT2($staff_id)
    {
        $query = $this->db->query("SELECT SUM(CNT) SUM_CNT2 FROM
        (SELECT SUM(STH_CPD_MARK)CNT
        FROM STAFF_TRAINING_HEAD, TRAINING_HEAD
        WHERE STH_TRAINING_REFID=TH_REF_ID
        AND STH_STAFF_ID='$staff_id'
        AND STH_STATUS='APPROVE'
        AND STH_CPD_COMPETENCY='KHUSUS'
        AND TO_CHAR(TH_DATE_FROM,'YYYY')=TO_CHAR(SYSDATE,'YYYY')
        UNION
        SELECT SUM(SCM_CPD_MARK)CNT
        FROM STAFF_CONFERENCE_MAIN,CONFERENCE_MAIN,STAFF_CONFERENCE_REP, CPD_HEAD
        WHERE SCM_REFID=CM_REFID
        AND SCM_STAFF_ID = SCR_STAFF_ID(+)
        AND SCM_REFID = SCR_REFID(+)
        AND CH_TRAINING_REFID=CM_REFID
        AND SCM_STAFF_ID='$staff_id'
        AND TO_CHAR(CM_DATE_TO,'yyyy')=TO_CHAR(SYSDATE,'YYYY')
        AND SCM_STATUS = 'APPROVE'
        AND ((CH_REPORT_SUBMISSION = 'N')
        OR (CH_REPORT_SUBMISSION='Y' AND SCR_STATUS = 'VERIFY_TNCA'))
        AND SCM_CPD_COMPETENCY ='KHUSUS')");

        $row = $query->row();
        
        return $row;
    }

    // GET SUM CNT 3
    public function getSumCNT3($staff_id)
    {
        $query = $this->db->query("SELECT SUM(CNT) SUM_CNT3 FROM
        (SELECT SUM(STH_CPD_MARK) CNT
        FROM STAFF_TRAINING_HEAD, TRAINING_HEAD
        WHERE STH_TRAINING_REFID=TH_REF_ID
        AND STH_STAFF_ID='$staff_id'
        AND STH_CPD_COMPETENCY IN ('KHUSUS','UMUM')
        AND TO_CHAR(TH_DATE_FROM,'YYYY')=TO_CHAR(SYSDATE,'YYYY')
        AND STH_STATUS='APPROVE'
        UNION
        SELECT SUM(SCM_CPD_MARK) CNT
        FROM STAFF_CONFERENCE_MAIN,CONFERENCE_MAIN,STAFF_CONFERENCE_REP, CPD_HEAD
        WHERE SCM_REFID=CM_REFID
        AND SCM_STAFF_ID = SCR_STAFF_ID(+)
        AND SCM_REFID = SCR_REFID(+)
        AND CH_TRAINING_REFID=CM_REFID
        AND SCM_STAFF_ID='$staff_id'
        AND TO_CHAR(CM_DATE_TO,'yyyy')=TO_CHAR(SYSDATE,'YYYY')
        AND SCM_STATUS = 'APPROVE'
        AND ((CH_REPORT_SUBMISSION = 'N')
        OR (CH_REPORT_SUBMISSION='Y' AND SCR_STATUS = 'VERIFY_TNCA'))
        AND SCM_CPD_COMPETENCY IN ('KHUSUS','UMUM'))");

        $row = $query->row();
        
        return $row;
    }

    // GET CPD DETL
    public function getCPDDetl($staff_id)
    {
        $this->db->select("SCH_JUM_CPD, SCH_CPD_LAYAK, CP_LNPT_WEIGHTAGE");
        $this->db->from("STAFF_CPD_HEAD, CPD_POINT");
        $this->db->where("SCH_TAHUN = CP_YEAR");
        $this->db->where("SCH_KUMP = CP_SCHEME");
        $this->db->where("SCH_TAHUN = TO_CHAR(SYSDATE,'YYYY')");
        $this->db->where("SCH_STAFF_ID", $staff_id);
        $q = $this->db->get();
        
        return $q->row();
    }

    // UPDATE STAFF_CPD_HEAD
    public function updateSCH($staff_id, $jumum, $jkhu, $jum_cpd)
    {
        $data = array(
            "SCH_JUM_KHUSUS" =>  $jkhu,
            "SCH_JUM_UMUM" =>  $jumum,
            "SCH_JUM_CPD" =>  $jum_cpd
        );
        
        $this->db->where("SCH_STAFF_ID", $staff_id);
        $this->db->where("SCH_TAHUN = TO_CHAR(SYSDATE,'YYYY')");

        return $this->db->update("STAFF_CPD_HEAD", $data);
    }

    // UPDATE STAFF_CPD_HEAD 2
    public function updateSCH2($staff_id, $res)
    {
        $data = array(
            "SCH_PERATUS_LPP" =>  $res
        );
        
        $this->db->where("SCH_STAFF_ID", $staff_id);
        $this->db->where("SCH_TAHUN = TO_CHAR(SYSDATE,'YYYY')");

        return $this->db->update("STAFF_CPD_HEAD", $data);
    }

    // GET TRAINING DETL
    public function getTrainingDetl($refid, $staff_id)
    {
        $this->db->select("STD_CANCEL_REASON, TO_CHAR(STD_MPE_DATE, 'DD/MM/YYYY') STD_MPE_DATE2, STD_TRAINING_CALENDAR, STD_WORK_RELATED");
        $this->db->from("STAFF_TRAINING_DETL");
        $this->db->where("STD_TRAINING_REFID", $refid);
        $this->db->where("STD_STAFF_ID", $staff_id);
        $q = $this->db->get();
        
        return $q->row();
    }

    // UPDATE STAFF_TRAINING_DETL
    public function saveEditTrDetl($form)
    {
        $curr_usr = $this->staff_id;
        $curr_date = 'SYSDATE';
        $status = $form['status'];
        $mpe_date = $form['mpe_date'];

        $data = array(
            "STD_CANCEL_REASON" =>  $form['cancel_reason'],
            "STD_TRAINING_CALENDAR" =>  $form['nitc'],
            "STD_WORK_RELATED" =>  $form['wrelated'],
        );

        if($status == 'CANCEL') {
            
            $this->db->set("STD_CANCEL_BY", $curr_usr);

            $this->db->set("STD_CANCEL_DATE", $curr_date, false);
        } 

        if(!empty($mpe_date)) {
            $date = "TO_DATE('$mpe_date', 'DD/MM/YYYY')";
            $this->db->set("STD_MPE_DATE", $date, false);
        } else {
            $this->db->set("STD_MPE_DATE", '', true);
        }
        
        $this->db->where("STD_TRAINING_REFID", $form['refid']);
        $this->db->where("STD_STAFF_ID", $form['staff_id_form']);

        return $this->db->update("STAFF_TRAINING_DETL", $data);
    }

    // INSERT STAFF_TRAINING_DETL
    public function saveInsTrDetl($form)
    {
        $curr_usr = $this->staff_id;
        $curr_date = 'SYSDATE';
        $status = $form['status'];
        $mpe_date = $form['mpe_date'];

        $data = array(
            "STD_TRAINING_REFID" =>  $form['refid'],
            "STD_STAFF_ID" =>  $form['staff_id_form'],
            "STD_CANCEL_REASON" =>  $form['cancel_reason'],
            "STD_TRAINING_CALENDAR" =>  $form['nitc'],
            "STD_WORK_RELATED" =>  $form['wrelated'],
        );

        if($status == 'CANCEL') {
            
            $this->db->set("STD_CANCEL_BY", $curr_usr);

            $this->db->set("STD_CANCEL_DATE", $curr_date, false);
        } 

        if(!empty($mpe_date)) {
            $date = "TO_DATE('$mpe_date', 'DD/MM/YYYY')";
            $this->db->set("STD_MPE_DATE", $date, false);
        }

        return $this->db->insert("STAFF_TRAINING_DETL", $data);
    }

    /*===========================================================
       REPORTS FOR EXTERNAL AGENCY - ATF144
    =============================================================*/

    // TRAINING LIST
    public function getExtTrainList()
    {
        $this->db->select("TH_REF_ID, TH_TRAINING_TITLE, TO_CHAR(TH_DATE_FROM,'DD/MM/YYYY') TH_DATE_FROM, TO_CHAR(TH_DATE_TO,'DD/MM/YYYY') TH_DATE_TO");
        $this->db->from("TRAINING_HEAD");
        $this->db->where("TH_INTERNAL_EXTERNAL = 'EXTERNAL_AGENCY'");
        $this->db->where("TH_STATUS = 'APPROVE'");
        $q = $this->db->get();
        
        return $q->result();
    }

    // SEARCH STAFF
    public function searchStaffMdExt($refid)
    {
        $this->db->select("STH_STAFF_ID,
        SM_STAFF_NAME,
        SM_DEPT_CODE");
        $this->db->from("STAFF_TRAINING_HEAD, STAFF_MAIN, STAFF_SERVICE, STAFF_JOB_STATUS");
        $this->db->where("STH_STAFF_ID = SM_STAFF_ID");
        $this->db->where("SS_STAFF_ID = SM_STAFF_ID");
        $this->db->where("SS_JOB_STATUS = SJS_STATUS_CODE");
        $this->db->where("STH_TRAINING_REFID", $refid);
        $this->db->where("STH_STATUS = 'APPROVE'");
        $q = $this->db->get();
        
        return $q->result();
    }
}
