<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conference_lmp_model extends MY_Model
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
       QUERY CONFERENCE REPORT APPLICATION - ATF088
    =============================================================*/

    // POPULATE DEPARTMENT QUERY CONFERENCE REPORT APPLICATION
    public function populateDeptQ() {
        $curr_usr_id = $this->staff_id;
        $hrd = "(SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE SM_STAFF_ID = '$curr_usr_id')";

        $query = "SELECT '-'||'-'||'-'||'Please select'||'-'||'-'||'-' DM_DEPT_CODE, '' DM_DEPT_DESC FROM DUAL
        UNION    
        SELECT DM_DEPT_CODE,DM_DEPT_DESC
        FROM DEPARTMENT_MAIN
        WHERE NVL(DM_STATUS,'INACTIVE') = 'ACTIVE'
        AND DM_LEVEL IN (1,2)
        AND ($hrd IS NULL 
        OR ($hrd IS NOT NULL 
        AND (DM_DEPT_CODE = $hrd
        OR $hrd IN ('PTNC-A','ICT'))))
        ORDER BY DM_DEPT_CODE";

        $q = $this->db->query($query);
        return $q->result();
    }

    // STAFF LIST QUERY
    public function getStaffListQ($dept) {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_JOB_CODE, SS_SERVICE_DESC");
        $this->db->from("STAFF_MAIN");
        $this->db->join("SERVICE_SCHEME", "SS_SERVICE_CODE = SM_JOB_CODE", "LEFT");
        $this->db->where("SM_STAFF_ID IN (SELECT DISTINCT SCR_STAFF_ID FROM STAFF_CONFERENCE_REP,STAFF_MAIN WHERE SM_DEPT_CODE = '$dept' AND SM_STAFF_ID = SCR_STAFF_ID)");
        $this->db->order_by("SM_STAFF_NAME");

        $q = $this->db->get();
        return $q->result();
    }

    // GET DEPARTMENT DETAIL
    public function getDeptDetl($deptCode) {
        $this->db->select("DM_DEPT_CODE, DM_DEPT_DESC");
        $this->db->from("DEPARTMENT_MAIN");
        $this->db->where("DM_DEPT_CODE", $deptCode);

        $q = $this->db->get();
        return $q->row();
        
    }

    // STAFF JOB CODE/DESC
    public function getStaffDetlAca($staffID)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_JOB_CODE, SS_SERVICE_DESC, SS_ACADEMIC, TO_CHAR(SYSDATE, 'YYYY') AS CURR_YEAR");
        $this->db->from("STAFF_MAIN, SERVICE_SCHEME");
        $this->db->where("SM_JOB_CODE = SS_SERVICE_CODE");
        $this->db->where("SM_STAFF_ID", $staffID);

        $q = $this->db->get();
        return $q->row();
    } 

    // STAFF CONFERENCE REPORT
    public function getStaffConRepQ($staff_id)
    {
        $this->db->select("SCR_REFID, SCR_STAFF_ID, CM_NAME, TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') CM_DATE_FROM, TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') CM_DATE_TO, TO_CHAR(SCR_APPLY_DATE, 'DD/MM/YYYY') AS SCR_APPLY_DATE, SCR_STATUS");
        $this->db->from("STAFF_CONFERENCE_REP");
        $this->db->join("CONFERENCE_MAIN", "CM_REFID = SCR_REFID", "LEFT");
        $this->db->where("SCR_STAFF_ID", $staff_id);

        $q = $this->db->get();
        return $q->result();
    } 

    // STAFF CONFERENCE REPORT DETAIL
    public function getConRepDetl($refid, $staff_id)
    {
        $this->db->select("SCM_PAPER_TITLE, SCM_PAPER_TITLE2, SCR_CONTENT, SCR_EXPERIENCE, SCR_REMARK, SCR_HOD_REMARK1, SCR_HOD_REMARK2, SCR_HOD_REMARK3, SCR_HOD_VERIFY_BY, SCR_HOD_VERIFY_BY||' - '||SM1.SM_STAFF_NAME HOD_VERIFY_BY_ID_NAME,
        TO_CHAR(SCR_HOD_VERIFY_DATE, 'DD/MM/YYYY') SCR_HOD_VERIFY_DATE, SCR_TNCA_REMARK1, SCR_TNCA_VERIFY_BY, SCR_TNCA_VERIFY_BY||' - '||SM2.SM_STAFF_NAME TNCA_VERIFY_BY_ID_NAME, TO_CHAR(SCR_TNCA_VERIFY_DATE, 'DD/MM/YYYY') SCR_TNCA_VERIFY_DATE");
        $this->db->from("STAFF_CONFERENCE_REP");
        $this->db->join("STAFF_CONFERENCE_MAIN", "SCM_REFID = SCR_REFID AND SCM_STAFF_ID = SCR_STAFF_ID", "LEFT");
        $this->db->join("STAFF_MAIN SM1", "SM1.SM_STAFF_ID = SCR_HOD_VERIFY_BY", "LEFT");
        $this->db->join("STAFF_MAIN SM2", "SM2.SM_STAFF_ID = SCR_TNCA_VERIFY_BY", "LEFT");
        $this->db->where("SCR_REFID", $refid);
        $this->db->where("SCR_STAFF_ID", $staff_id);

        $q = $this->db->get();
        return $q->row();
    } 

    // SCR PART 1
    public function getScrPart1($refid, $staff_id)
    {
        $this->db->select("SCRP1_NAME, SCRP1_FIELD, SCRP1_INSTITUITION, SCRP1_TELNO, SCRP1_EMAIL");
        $this->db->from("STAFF_CONFERENCE_REP_PART1");
        $this->db->where("SCRP1_REFID", $refid);
        $this->db->where("SCRP1_STAFF_ID", $staff_id);

        $q = $this->db->get();
        return $q->result();
    }
    
    // SCR PART 2
    public function getScrPart2($refid, $staff_id)
    {
        $this->db->select("SCRP2_ACTIVITY, SCRP2_IMPLEMENT_DATE");
        $this->db->from("STAFF_CONFERENCE_REP_PART2");
        $this->db->where("SCRP2_REFID", $refid);
        $this->db->where("SCRP2_STAFF_ID", $staff_id);

        $q = $this->db->get();
        return $q->result();
    }
    
    // STAFF FILE ATTACHMENT
    public function getStfApplAttch($refid, $staff_id)
    {
        $this->db->select("SAA_FILENAME, SAA_PROCEEDING_AWARDED, SAA_PROCEEDING_STATUS, SAA_STAFF_ID, SAA_REFID, DECODE(SAA_ATTACH_REFID, '10', 'No', 'Yes') PR_FILE");
        $this->db->from("STAFF_APPL_ATTACH");
        $this->db->where("SAA_REFID", $refid);
        $this->db->where("SAA_STAFF_ID", $staff_id);
        $this->db->where("SAA_FORMNAME = 'CONFERENCE_REP'");

        $q = $this->db->get();
        return $q->result();
    } 

    /*===========================================================
       Conference Report Application - Manual Entry (ATF096)
    =============================================================*/

    // CONFERENCE APPLICANT LIST
    public function getStaffListConRep($refid) {		
        $this->db->select("SCR_STAFF_ID, SM_STAFF_NAME, SCR_STATUS, TO_CHAR(SCR_APPLY_DATE, 'DD/MM/YYYY') SCR_APPLY_DATE");
        $this->db->from("STAFF_CONFERENCE_REP");
        $this->db->join("STAFF_MAIN", "SCR_STAFF_ID = SM_STAFF_ID", "LEFT");
        $this->db->where("SCR_REFID", $refid);
        $q = $this->db->get();
                
        return $q->result();
    }

    // STAFF DETL INFO
    public function getStaffDetlInfo($staff_id) {		
        $this->db->select("SM_STAFF_NAME, SS_SERVICE_DESC, SJS_STATUS_DESC, SM_UNIT, SM_DEPT_CODE, DM1.DM_DEPT_DESC DM_DEPT_DESC1, DM2.DM_DEPT_DESC AS DM_DEPT_DESC2");
        $this->db->from("STAFF_MAIN");
        $this->db->join("DEPARTMENT_MAIN DM2", "DM2.DM_DEPT_CODE = SM_UNIT", "LEFT");
        $this->db->join("DEPARTMENT_MAIN DM1", "DM1.DM_DEPT_CODE = SM_DEPT_CODE", "LEFT");
        $this->db->join("STAFF_SERVICE", "SS_STAFF_ID = SM_STAFF_ID", "LEFT");
        $this->db->join("SERVICE_SCHEME", "SM_JOB_CODE = SS_SERVICE_CODE", "LEFT");
        $this->db->join("STAFF_JOB_STATUS", "SS_JOB_STATUS = SJS_STATUS_CODE", "LEFT");
        $this->db->where("UPPER(SM_STAFF_ID) = UPPER('$staff_id')");
        $q = $this->db->get();
                
        return $q->row();
    }

    // CONFERENCE LIST BASED ON STAFF_ID
    public function searchCrMd($staff_id) {		
        $this->db->select("CM_REFID, CM_NAME, TO_CHAR(CM_DATE_FROM,'dd-mm-yyyy') CM_DATE_FROM, TO_CHAR(CM_DATE_TO,'dd-mm-yyyy') CM_DATE_TO, CM_ADDRESS, CM_CITY, CM_POSTCODE, SM_STATE_DESC, COUNTRY_MAIN.CM_COUNTRY_DESC CM_COUNTRY_DESC, CM_ORGANIZER_NAME, CM_DATE_FROM DFROM");
        $this->db->from("CONFERENCE_MAIN, STATE_MAIN, COUNTRY_MAIN");
        $this->db->where("CM_STATE = SM_STATE_CODE");
        $this->db->where("CONFERENCE_MAIN.CM_COUNTRY_CODE = COUNTRY_MAIN.CM_COUNTRY_CODE");
        $this->db->where("TO_CHAR(CM_DATE_FROM,'yyyy') IN (TO_CHAR(sysdate,'yyyy'),TO_CHAR(sysdate,'yyyy')-1)");
        $this->db->where("CM_REFID NOT IN 
        (SELECT SCR_REFID FROM STAFF_CONFERENCE_REP
        WHERE UPPER(SCR_STAFF_ID) = UPPER('$staff_id')
        AND SCR_STATUS NOT IN ('REJECT','CANCEL'))");
        $this->db->where("CM_REFID IN 
        (SELECT SCM_REFID FROM STAFF_CONFERENCE_MAIN
        WHERE UPPER(SCM_STAFF_ID) = UPPER('$staff_id')
        AND SCM_STATUS = 'APPROVE')");
        $this->db->order_by("DFROM DESC, CM_NAME");
        $q = $this->db->get();
               
        return $q->result();
    }

    // GET CONFERENCE DETAILS
    public function getConferenceDetl($refid)
    {
        $this->db->select("CM_REFID, CM_NAME, CM_ADDRESS, CM_CITY, CM_POSTCODE, 
        CM_STATE, SM_STATE_DESC, CONFERENCE_MAIN.CM_COUNTRY_CODE AS CM_COUNTRY_CODE, COUNTRY_MAIN.CM_COUNTRY_DESC AS CM_COUNTRY_DESC, 
        TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') AS CM_DATE_FROM, TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') AS CM_DATE_TO, CM_ORGANIZER_NAME, TO_CHAR(CM_DATE_FROM, 'YYYY') AS CM_DATE_FROM_YEAR, CM_DESC, CM_ENTER_BY, TO_CHAR(CM_ENTER_DATE, 'DD/MM/YYYY') AS CM_ENTER_DATE");
        $this->db->from("CONFERENCE_MAIN");
        $this->db->join("STATE_MAIN", "CM_STATE = STATE_MAIN.SM_STATE_CODE", "LEFT");
        $this->db->join("COUNTRY_MAIN", "CONFERENCE_MAIN.CM_COUNTRY_CODE = COUNTRY_MAIN.CM_COUNTRY_CODE", "LEFT");
        $this->db->where("CM_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    } 
}