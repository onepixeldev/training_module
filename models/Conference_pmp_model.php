<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conference_pmp_model extends MY_Model
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
       CONFERENCE APPLICATION - MANUAL ENTRY (ATF075)
    =============================================================*/
    public function getCurDate() {		
        $this->db->select("TO_CHAR(SYSDATE, 'MM') AS SYSDATE_MM, TO_CHAR(SYSDATE, 'YYYY') AS SYSDATE_YYYY");
        $this->db->from("DUAL");
        $q = $this->db->get();
                
        return $q->row();
    } 

    // GET YEAR DROPDOWN
    public function getYearList() {		
        $this->db->select("to_char(CM_DATE, 'YYYY') AS CM_YEAR");
        $this->db->from("CALENDAR_MAIN");
        $this->db->where("to_char(CM_DATE, 'YYYY') >= to_char(SYSDATE, 'YYYY') - 15");
        $this->db->group_by("to_char(CM_DATE, 'YYYY')");
        $this->db->order_by("to_char(CM_DATE, 'YYYY') DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // GET MONTH DROPDOWN
    public function getMonthList() {		
        $this->db->select("to_char(CM_DATE, 'MM') AS CM_MM, to_char(CM_DATE, 'MONTH') AS CM_MONTH");
        $this->db->from("CALENDAR_MAIN");
        $this->db->group_by("to_char(CM_DATE,'MM'), to_char(CM_DATE, 'MONTH')");
        $this->db->order_by("to_char(CM_DATE, 'MM')");
        $q = $this->db->get();
		        
        return $q->result();
    } 

    // GET CONFERENCE INFO LIST
    public function getConferenceInfoList($month = null, $year = null, $refidTitle = null) {		
        $this->db->select("CM_REFID, CM_NAME, TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') AS CM_DATE_FR, TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') AS CM_DATE_TO");
        $this->db->from("CONFERENCE_MAIN");
        if(!empty($month) && empty($year)) {
            $this->db->where("TO_CHAR(CM_DATE_FROM, 'MM') = '$month'");
        } 
        elseif(!empty($year) && empty($month)) {
            $this->db->where("TO_CHAR(CM_DATE_FROM, 'YYYY') = '$year'");
        }   
        elseif(!empty($month) && !empty($year)) {
            $this->db->where("TO_CHAR(CM_DATE_FROM, 'MM') = '$month'");
            $this->db->where("TO_CHAR(CM_DATE_FROM, 'YYYY') = '$year'");
        }
        elseif(empty($month) && empty($year) && !empty($refidTitle)) {
            $this->db->where("CM_REFID LIKE '%$refidTitle%' OR UPPER(CM_NAME) LIKE UPPER('%$refidTitle%')");
        }
        $this->db->order_by("CM_DATE_FROM DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // CONFERENCE APPLICANT LIST
    public function getStaffConferenceApplication($refid) {		
        $this->db->select("SCM_STAFF_ID, SM_STAFF_NAME, CC_DESC, CPR_DESC,
        CASE SCM_STATUS
          WHEN 'VERIFY_VC' THEN 'VERIFY VC'
          WHEN 'VERIFY_TNCA' THEN 'VERIFY TNCA'
          ELSE SCM_STATUS
        END AS SCM_STATUS");
        $this->db->from("STAFF_CONFERENCE_MAIN");
        $this->db->join("STAFF_MAIN", "STAFF_CONFERENCE_MAIN.SCM_STAFF_ID = STAFF_MAIN.SM_STAFF_ID", "LEFT");
        $this->db->join("CONFERENCE_CATEGORY", "STAFF_CONFERENCE_MAIN.SCM_CATEGORY_CODE = CONFERENCE_CATEGORY.CC_CODE", "LEFT");
        $this->db->join("CONFERENCE_PARTICIPANT_ROLE", "STAFF_CONFERENCE_MAIN.SCM_PARTICIPANT_ROLE = CONFERENCE_PARTICIPANT_ROLE.CPR_CODE", "LEFT");
        $this->db->where("SCM_REFID", $refid);
        $q = $this->db->get();
                
        return $q->result();
    }

    // GET STAFF LIST DROPDOWN
    public function getStaffList($staffID = null)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID ||' - '||SM_STAFF_NAME AS SM_STAFF_ID_NAME");
        $this->db->from("STAFF_MAIN, STAFF_STATUS");
        $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS AND SS_STATUS_STS = 'ACTIVE' AND SM_STAFF_TYPE = 'STAFF'");

        if(!empty($staffID)) {
            $this->db->where("SM_STAFF_ID", $staffID);
            $q = $this->db->get();
            return $q->row();
        } else {
            $this->db->order_by("2");

            $q = $this->db->get();
            return $q->result();
        }
    }

    // GET CONFERENCE ROLE LIST
    public function getConferenceRoleList()
    {
        $this->db->select("UPPER(CPR_CODE) CPR_CODE");
        $this->db->from("CONFERENCE_PARTICIPANT_ROLE");
        $this->db->where("NVL(CPR_DISPLAY,'N')='Y'");

        $q = $this->db->get();
        return $q->result();
    } 

    // GET CONFERENCE CATEGORY LIST
    public function getCrCategoryList()
    {
        $this->db->select("CC_CODE, CC_DESC, CC_RM_AMOUNT_FROM, CC_RM_AMOUNT_TO, CC_CODE||' - '||CC_DESC||' (RM'||CC_RM_AMOUNT_FROM||' - RM'||CC_RM_AMOUNT_TO||')' AS CC_CODE_DESC_CC_FROM_TO");
        $this->db->from("CONFERENCE_CATEGORY");
        $this->db->where("CC_STATUS='Y'");
        $this->db->order_by("CC_RM_AMOUNT_FROM");

        $q = $this->db->get();
        return $q->result();
    } 

    // GET CONFERENCE DETAILS
    public function getConferenceDetl($refid)
    {
        $this->db->select("CM_REFID, CM_NAME, CM_ADDRESS, CM_CITY, CM_POSTCODE, 
        CM_STATE, SM_STATE_DESC, CONFERENCE_MAIN.CM_COUNTRY_CODE AS CM_COUNTRY_CODE, COUNTRY_MAIN.CM_COUNTRY_DESC AS CM_COUNTRY_DESC, 
        TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') AS CM_DATE_FROM, TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') AS CM_DATE_TO, CM_ORGANIZER_NAME, TO_CHAR(CM_DATE_FROM, 'YYYY') AS CM_DATE_FROM_YEAR");
        $this->db->from("CONFERENCE_MAIN");
        $this->db->join("STATE_MAIN", "CM_STATE = STATE_MAIN.SM_STATE_CODE", "LEFT");
        $this->db->join("COUNTRY_MAIN", "CONFERENCE_MAIN.CM_COUNTRY_CODE = COUNTRY_MAIN.CM_COUNTRY_CODE", "LEFT");
        $this->db->where("CM_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    } 

    // GET STAFF CONFERENCE DETAILS
    public function getStaffConferenceDetl($refid, $staff_id)
    {
        $this->db->select("SCM_STAFF_ID, SCM_REFID, SCM_LEAVE_REFID, SCM_PARTICIPANT_ROLE, SCM_PAPER_TITLE,
        SCM_PAPER_TITLE2, SCM_CATEGORY_CODE, SCM_APPROVE_BY, TO_CHAR(SCM_APPROVE_DATE, 'DD/MM/YYYY') AS SCM_APPROVE_DATE, SCM_SPONSOR, SCM_SPONSOR_NAME, 
        SCM_SPONSOR_BUDGET_ORIGIN, SCM_RM_SPONSOR_TOTAL_AMT, SCM_BUDGET_ORIGIN, 
        TO_CHAR(SCM_APPLY_DATE, 'DD/MM/YYYY') AS SCM_APPLY_DATE, 
        SCM_STATUS, SCM_APPROVER_REMARK1, SCM_APPROVER_REMARK2, SCM_APPROVER_REMARK3,
        SCM_APPROVER_REMARK4, SCM_RECOMMEND_BY, TO_CHAR(SCM_RECOMMEND_DATE, 'DD/MM/YYYY') AS SCM_RECOMMEND_DATE,
        SCM_TNCA_REMARK, SCM_TNCA_APPROVE_BY, TO_CHAR(SCM_TNCA_APPROVE_DATE, 'DD/MM/YYYY') AS SCM_TNCA_APPROVE_DATE,
        TO_CHAR(SCM_TNCA_RECEIVE_DATE, 'DD/MM/YYYY') AS SCM_TNCA_RECEIVE_DATE, SCM_VC_REMARK, SCM_VC_APPROVE_BY, 
        TO_CHAR(SCM_VC_APPROVE_DATE, 'DD/MM/YYYY') AS SCM_VC_APPROVE_DATE, TO_CHAR(SCM_VC_RECEIVE_DATE, 'DD/MM/YYYY') AS SCM_VC_RECEIVE_DATE, TO_CHAR(SCM_LEAVE_DATE_FROM, 'DD/MM/YYYY') AS SCM_LEAVE_DATE_FROM, TO_CHAR(SCM_LEAVE_DATE_TO, 'DD/MM/YYYY') AS SCM_LEAVE_DATE_TO,
        SCM_RM_TOTAL_AMT, SCM_RM_TOTAL_AMT_APPROVE_HOD, SCM_RM_TOTAL_AMT_APPROVE_TNCA, SCM_RM_TOTAL_AMT_APPROVE_VC,
        SCM_RM_TOTAL_AMT_DEPT, SCM_TOTAL_AMT_DEPT_APPRV_HOD, SCM_RM_TOT_AMT_APPRV_RMIC, SCM_RM_TOT_AMT_APPRV_TNCPI, SCM_BUDGET_ORIGIN_PREV, TO_CHAR(SCM_TNCPI_APPROVE_DATE, 'DD/MM/YYYY') AS SCM_TNCPI_APPROVE_DATE, 
        TO_CHAR(SCM_RMIC_APPROVE_DATE, 'DD/MM/YYYY') AS SCM_RMIC_APPROVE_DATE, SCM_RESEARCH_REFID");
        $this->db->from("STAFF_CONFERENCE_MAIN");
        $this->db->where("SCM_REFID", $refid);
        $this->db->where("SCM_STAFF_ID", $staff_id);

        $q = $this->db->get();
        return $q->row();
    } 

    // SAVE INSERT NEW STAFF CONFERENCE
    public function saveNewStfCr($form, $refid)
    {
        $curDate = 'SYSDATE';
        $curUsr = $this->staff_id;



        $data = array(
            "SCM_STAFF_ID" => $form['staff_id'],
            "SCM_REFID" => $refid,
            "SCM_PARTICIPANT_ROLE" => $form['role'],
            "SCM_PAPER_TITLE" => $form['paper_title1'],
            "SCM_PAPER_TITLE2" => $form['paper_title2'],
            "SCM_CATEGORY_CODE" => $form['category'],
            "SCM_SPONSOR" => $form['sponsor'],
            "SCM_SPONSOR_NAME" => $form['sponsor_name'],
            "SCM_SPONSOR_BUDGET_ORIGIN" => $form['budget_origin_for_sponsor'],
            "SCM_RM_SPONSOR_TOTAL_AMT" => $form['total'],
            "SCM_BUDGET_ORIGIN" => $form['budget_origin'],
            "SCM_STATUS" => $form['status'],
            "SCM_APPROVER_REMARK1" => $form['remark1'],
            "SCM_APPROVER_REMARK2" => $form['remark2'],
            "SCM_APPROVER_REMARK3" => $form['remark3'],
            "SCM_APPROVER_REMARK4" => $form['remark4'],
            "SCM_RECOMMEND_BY" => $form['approved_by_hod'],
            // "SCM_RECOMMEND_DATE" => $form['approved_date_hod'],
            "SCM_TNCA_REMARK" => $form['remark_tnc'],
            "SCM_TNCA_APPROVE_BY" => $form['approved_by_tnc'],
            // "SCM_TNCA_APPROVE_DATE" => $form['approved_date_tnc'],
            // "SCM_TNCA_RECEIVE_DATE" => $form['received_date_tnc'],
            "SCM_VC_REMARK" => $form['remark_vc'],
            "SCM_VC_APPROVE_BY" => $form['approved_by_vc'],
            // "SCM_VC_APPROVE_DATE" => $form['approved_date_vc'],
            // "SCM_VC_RECEIVE_DATE" => $form['received_date_vc'],
            "SCM_APPLY_BY" => $curUsr
        );

        if(!empty($form['apply_date'])) {
            $apply_date = "to_date('".$form['apply_date']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_APPLY_DATE", $apply_date, false);
        } else {
            $this->db->set("SCM_APPLY_DATE", $curDate, false);
        }

        if(!empty($form['approved_date_hod'])) {
            $approved_date_hod = "to_date('".$form['approved_date_hod']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_RECOMMEND_DATE", $approved_date_hod, false);
        }

        if(!empty($form['approved_date_tnc'])) {
            $approved_date_tnc = "to_date('".$form['approved_date_tnc']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_APPROVE_DATE", $approved_date_tnc, false);
        }

        if(!empty($form['received_date_tnc'])) {
            $received_date_tnc = "to_date('".$form['received_date_tnc']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_RECEIVE_DATE", $received_date_tnc, false);
        }

        if(!empty($form['approved_date_vc'])) {
            $approved_date_vc = "to_date('".$form['approved_date_vc']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_VC_APPROVE_DATE", $approved_date_vc, false);
        }

        if(!empty($form['received_date_vc'])) {
            $received_date_vc = "to_date('".$form['received_date_vc']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_VC_RECEIVE_DATE", $received_date_vc, false);
        }
        
        return $this->db->insert("STAFF_CONFERENCE_MAIN", $data);
    }

    // INSERT STAFF CONFERENCE DETL
    public function insStaffConDetl($refid, $staff_id)
    {
        $data = array(
            "SCD_REFID" => $refid,
            "SCD_STAFF_ID" => $staff_id,
            "SCD_ANNUAL_LEAVE" => 'N'
        );
        
        return $this->db->insert("STAFF_CONFERENCE_DETL", $data);
    }

    // SAVE EDIT STAFF CONFERENCE
    public function saveEditStfCr($form, $refid, $staff_id)
    {
        $curDate = 'SYSDATE';
        $curUsr = $this->staff_id;

        $data = array(
            "SCM_PARTICIPANT_ROLE" => $form['role'],
            "SCM_PAPER_TITLE" => $form['paper_title1'],
            "SCM_PAPER_TITLE2" => $form['paper_title2'],
            "SCM_CATEGORY_CODE" => $form['category'],
            "SCM_SPONSOR" => $form['sponsor'],
            "SCM_SPONSOR_NAME" => $form['sponsor_name'],
            "SCM_SPONSOR_BUDGET_ORIGIN" => $form['budget_origin_for_sponsor'],
            "SCM_RM_SPONSOR_TOTAL_AMT" => $form['total'],
            "SCM_BUDGET_ORIGIN" => $form['budget_origin'],
            "SCM_STATUS" => $form['status'],
            "SCM_APPROVER_REMARK1" => $form['remark1'],
            "SCM_APPROVER_REMARK2" => $form['remark2'],
            "SCM_APPROVER_REMARK3" => $form['remark3'],
            "SCM_APPROVER_REMARK4" => $form['remark4'],
            "SCM_RECOMMEND_BY" => $form['approved_by_hod'],
            "SCM_TNCA_REMARK" => $form['remark_tnc'],
            "SCM_TNCA_APPROVE_BY" => $form['approved_by_tnc'],
            "SCM_VC_REMARK" => $form['remark_vc'],
            "SCM_VC_APPROVE_BY" => $form['approved_by_vc'],
            "SCM_APPLY_BY" => $curUsr
        );

        if(!empty($form['apply_date'])) {
            $apply_date = "to_date('".$form['apply_date']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_APPLY_DATE", $apply_date, false);
        } else {
            $this->db->set("SCM_APPLY_DATE", $curDate, false);
        }

        if(!empty($form['approved_date_hod'])) {
            $approved_date_hod = "to_date('".$form['approved_date_hod']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_RECOMMEND_DATE", $approved_date_hod, false);
        }

        if(!empty($form['approved_date_tnc'])) {
            $approved_date_tnc = "to_date('".$form['approved_date_tnc']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_APPROVE_DATE", $approved_date_tnc, false);
        }

        if(!empty($form['received_date_tnc'])) {
            $received_date_tnc = "to_date('".$form['received_date_tnc']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_RECEIVE_DATE", $received_date_tnc, false);
        }

        if(!empty($form['approved_date_vc'])) {
            $approved_date_vc = "to_date('".$form['approved_date_vc']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_VC_APPROVE_DATE", $approved_date_vc, false);
        }

        if(!empty($form['received_date_vc'])) {
            $received_date_vc = "to_date('".$form['received_date_vc']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_VC_RECEIVE_DATE", $received_date_vc, false);
        }
        
        $this->db->where("SCM_STAFF_ID", $staff_id);
        $this->db->where("SCM_REFID", $refid);

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
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

    // GET COMFERENCE DURATION
    public function getConDuration($crRefID)
    {
        $this->db->select("TO_CHAR(CM_DATE_TO, 'YYYYMMDD')-TO_CHAR(CM_DATE_FROM, 'YYYYMMDD')+1 AS CM_DURATION");
        $this->db->from("CONFERENCE_MAIN");
        $this->db->where("CM_REFID", $crRefID);

        $q = $this->db->get();
        return $q->row();
    } 

    // CHECK CONFERENCE LEAVE
    public function checkConferenceLeave($staffID, $refid)
    {
        $this->db->select("SCM_LEAVE_DATE_FROM, SCM_LEAVE_DATE_TO");
        $this->db->from("STAFF_CONFERENCE_MAIN");
        $this->db->where("SCM_REFID", $refid);
        $this->db->where("SCM_STAFF_ID", $staffID);

        $q = $this->db->get();
        return $q->row();
    } 

    // CHECK STAFF ACADEMIN OR NON_ACADEMIC
    public function getStaffDetlAca($staffID)
    {
        $this->db->select("SS_ACADEMIC, TO_CHAR(SYSDATE, 'YYYY') AS CURR_YEAR");
        $this->db->from("STAFF_MAIN, SERVICE_SCHEME");
        $this->db->where("SM_JOB_CODE = SS_SERVICE_CODE");
        $this->db->where("SM_STAFF_ID", $staffID);

        $q = $this->db->get();
        return $q->row();
    } 

    // COUNT TOTAL LEAVE
    public function getTotalLeave($staffID, $pYear)
    {
        $this->db->select("SLR_ENTITLED_DAYS, SLR_TAKEN_DAYS, SLR_BALANCE_DAYS");
        $this->db->from("STAFF_LEAVE_RECORD");
        $this->db->where("SLR_STAFF_ID", $staffID);
        $this->db->where("SLR_YEAR = NVL('$pYear', TO_CHAR(SYSDATE, 'YYYY'))");
        $this->db->where("SLR_LEAVE_CODE = '014'");

        $q = $this->db->get();
        return $q->row();
    } 

    // GET LEAVE DETL
    public function getLeaveDetl($leaveRefid, $staffID)
    {
        $this->db->select("SLD_REF_ID, SLD_STAFF_ID, TO_CHAR(SLD_DATE_FROM, 'DD/MM/YYYY') AS SLD_DATE_FROM, TO_CHAR(SLD_DATE_TO, 'DD/MM/YYYY') AS SLD_DATE_TO, SLD_TOTAL_DAY, TO_CHAR(SLD_DATE_FROM, 'YYYY') AS SLD_DATE_FROM_YEAR");
        $this->db->from("STAFF_LEAVE_DETL");
        $this->db->where("SLD_STAFF_ID", $staffID);
        $this->db->where("SLD_REF_ID", $leaveRefid);
        $this->db->where("SLD_LEAVE_TYPE = '014'");

        $q = $this->db->get();
        return $q->row();
    }

    // GET LEAVE DETL WITH LEAVE DATE
    public function getLeaveDetlLeaveDate($leaveRefid, $staffID, $app_date_fr_year)
    {
        $this->db->select("SLD_REF_ID, SLD_STAFF_ID, TO_CHAR(SLD_DATE_FROM, 'DD/MM/YYYY') AS SLD_DATE_FROM, TO_CHAR(SLD_DATE_TO, 'DD/MM/YYYY') AS SLD_DATE_TO, SLD_TOTAL_DAY, TO_CHAR(SLD_DATE_FROM, 'YYYY') AS SLD_DATE_FROM_YEAR");
        $this->db->from("STAFF_LEAVE_DETL");
        $this->db->where("TO_CHAR(SLD_DATE_FROM, 'YYYY') = '$app_date_fr_year'");
        $this->db->where("SLD_STAFF_ID", $staffID);
        $this->db->where("SLD_REF_ID", $leaveRefid);
        $this->db->where("SLD_LEAVE_TYPE = '014'");

        $q = $this->db->get();
        return $q->row();
    }

    // GET STUDY LEAVE DETL
    public function getStudyLeaveDetl($sldDateFr, $sldDateTo, $staffID)
    {
        $this->db->select("COUNT(1) AS STUDY_LEAVE_COUNT");
        $this->db->from("STAFF_STUDY_LEAVE_HEAD");
        $this->db->where("SSLH_STATUS = 'APPROVE'");
        $this->db->where("((TO_DATE(SYSDATE, 'DD/MM/YYYY') BETWEEN SSLH_DATE_FROM AND SSLH_DATE_TO) OR (TO_CHAR(SYSDATE, 'DD/MM/YYYY')  BETWEEN SSLH_EXTEND1_DATE_FROM AND SSLH_EXTEND1_DATE_TO) OR (TO_CHAR(SYSDATE, 'DD/MM/YYYY')  BETWEEN SSLH_EXTEND2_DATE_FROM AND SSLH_EXTEND2_DATE_TO) OR (TO_CHAR(SYSDATE, 'DD/MM/YYYY')  BETWEEN SSLH_EXTEND3_DATE_FROM AND SSLH_EXTEND3_DATE_TO) OR TO_CHAR(SYSDATE, 'DD/MM/YYYY')  <= SSLH_MAX_DATE_TO)");
        $this->db->where("TRIM(UPPER(NVL(SSLH_REP_DUTY_STATUS,'N'))) <> TRIM(UPPER('Lapor Diri'))");
        $this->db->where("SSLH_REP_DUTY_DATE IS NULL");
        $this->db->where("SSLH_STAFF_ID", $staffID);
        $this->db->where("( TO_DATE('$sldDateFr', 'DD/MM/YYYY') BETWEEN SSLH_DATE_FROM AND SSLH_DATE_TO OR TO_DATE('$sldDateTo', 'DD/MM/YYYY') BETWEEN SSLH_DATE_FROM AND SSLH_DATE_TO)");

        $q = $this->db->get();
        return $q->row();
    }

    // COUNT TOTAL LEAVE
    public function getSabbacticalLeave($sldDateFr, $sldDateTo, $staffID)
    {
        $this->db->select("COUNT(1) AS SABB_LEAVE");
        $this->db->from("STAFF_SABBATICAL_LEAVE_MAIN");
        $this->db->where("SSLM_STATUS IN ('APPROVE','APPLY_TNCA')");
        $this->db->where("SSLM_STAFF_ID", $staffID);
        $this->db->where("( '$sldDateFr' BETWEEN SSLM_DATE_FROM AND SSLM_DATE_TO OR '$sldDateTo' BETWEEN SSLM_DATE_FROM AND SSLM_DATE_TO)");

        $q = $this->db->get();
        return $q->row();
    }

    // COUNT TOTAL DAY APPLIED
    public function countTotalDayApplied($leaveDateFr, $leaveDateTo) {
        $this->db->select("COUNT(CM_DATE) AS TOTAL_DAY_APPLIED");
        $this->db->from("CALENDAR_MAIN");
        $this->db->where("TRUNC(CM_DATE) BETWEEN TRUNC(TO_DATE('$leaveDateFr', 'DD/MM/YYYY')) AND TRUNC(TO_DATE('$leaveDateTo', 'DD/MM/YYYY'))");
        $this->db->where("CM_TYPE = 'A'");

        $q = $this->db->get();
        return $q->row();
    }

    // COUNT TOTAL DAY APPROVE
    public function countTotalDayApprove($leaveDateAppFr, $leaveDateAppTo) {
        $this->db->select("COUNT(CM_DATE) AS TOTAL_DAY_APPROVE");
        $this->db->from("CALENDAR_MAIN");
        $this->db->where("TRUNC(CM_DATE) BETWEEN TRUNC(TO_DATE('$leaveDateAppFr', 'DD/MM/YYYY')) AND TRUNC(TO_DATE('$leaveDateAppTo', 'DD/MM/YYYY'))");
        $this->db->where("CM_TYPE = 'A'");

        $q = $this->db->get();
        return $q->row();
    }

    // SAVE UPDATE STAFF LEAVE DETL
    public function updStaffLeaveDetl($form, $cr_leave_refid, $staff_id)
    {
        // $curDate = 'SYSDATE';
        // $curUsr = $this->staff_id;

        $data = array(
            "SLD_TOTAL_DAY" => $form['total_day_approve']
        );

        if(!empty($form['approve_date_from'])) {
            $sld_date_from = "to_date('".$form['approve_date_from']."', 'DD/MM/YYYY')";
            $this->db->set("SLD_DATE_FROM", $sld_date_from, false);
        } 

        if(!empty($form['approve_date_to'])) {
            $sld_date_to = "to_date('".$form['approve_date_to']."', 'DD/MM/YYYY')";
            $this->db->set("SLD_DATE_TO", $sld_date_to, false);
        } 

        
        $this->db->where("SLD_REF_ID", $cr_leave_refid);
        $this->db->where("SLD_STAFF_ID", $staff_id);

        return $this->db->update("STAFF_LEAVE_DETL", $data);
    }

    // GENERATE LEAVE_DETL REFID
    public function getStaffLeaveDetlRefid()
    {
        $this->db->select("to_char(sysdate,'yyyy')||'-'||trim(to_char(STAFF_LEAVE_DETL_ID.nextval,'000000')) AS SLD_GEN_REFID");
        $this->db->from("DUAL");

        $q = $this->db->get();
        return $q->row();
    }

    // SAVE INSERT STAFF LEAVE DETL
    public function insStaffLeaveDetl($form, $sld_refid, $staff_id, $apply_date, $sld_status, $leave_approver, $approve_date, $leave_approver_tnca, $approve_date_tnca, $leave_approver_vc, $approve_date_vc)
    {
        // $curDate = 'SYSDATE';
        // $curUsr = $this->staff_id;

        if(!empty($leave_approver)) {
            $data = array(
                "SLD_LEAVE_TYPE" => '014',
                "SLD_REF_ID" => $sld_refid,
                "SLD_STAFF_ID" => $staff_id,
                "SLD_STATUS" => $sld_status,
                "SLD_APPROVE_BY" => $leave_approver,
                "SLD_TOTAL_DAY" => $form['total_day_approve']
            );
        } elseif(!empty($leave_approver_tnca)) {
            $data = array(
                "SLD_LEAVE_TYPE" => '014',
                "SLD_REF_ID" => $sld_refid,
                "SLD_STAFF_ID" => $staff_id,
                "SLD_STATUS" => $sld_status,
                "SLD_APPROVE_BY" => $leave_approver_tnca,
                "SLD_TOTAL_DAY" => $form['total_day_approve']
            );
        } elseif(!empty($leave_approver_vc)) {
            $data = array(
                "SLD_LEAVE_TYPE" => '014',
                "SLD_REF_ID" => $sld_refid,
                "SLD_STAFF_ID" => $staff_id,
                "SLD_STATUS" => $sld_status,
                "SLD_APPROVE_BY" => $leave_approver_vc,
                "SLD_TOTAL_DAY" => $form['total_day_approve']
            );
        } else {
            $data = array(
                "SLD_LEAVE_TYPE" => '014',
                "SLD_REF_ID" => $sld_refid,
                "SLD_STAFF_ID" => $staff_id,
                "SLD_STATUS" => $sld_status,
                "SLD_TOTAL_DAY" => $form['total_day_approve']
            );
        }
            

        if(!empty($form['approve_date_from'])) {
            $sld_date_from = "to_date('".$form['approve_date_from']."', 'DD/MM/YYYY')";
            $this->db->set("SLD_DATE_FROM", $sld_date_from, false);
        } 

        if(!empty($form['approve_date_to'])) {
            $sld_date_to = "to_date('".$form['approve_date_to']."', 'DD/MM/YYYY')";
            $this->db->set("SLD_DATE_TO", $sld_date_to, false);
        } 

        if(!empty($apply_date)) {
            $sld_apply_date = "to_date('".$apply_date."', 'DD/MM/YYYY')";
            $this->db->set("SLD_APPLY_DATE", $sld_apply_date, false);
        } 

        if(!empty($approve_date)) {
            $sld_approve_date = "to_date('".$approve_date."', 'DD/MM/YYYY')";
            $this->db->set("SLD_APPROVE_DATE", $sld_approve_date, false);
        } elseif(!empty($approve_date_tnca)) {
            $sld_approve_date = "to_date('".$approve_date_tnca."', 'DD/MM/YYYY')";
            $this->db->set("SLD_APPROVE_DATE", $sld_approve_date, false);
        } elseif(!empty($approve_date_vc)) {
            $sld_approve_date = "to_date('".$approve_date_vc."', 'DD/MM/YYYY')";
            $this->db->set("SLD_APPROVE_DATE", $sld_approve_date, false);
        }

        
        // $this->db->where("SLD_REF_ID", $cr_leave_refid);
        // $this->db->where("SLD_STAFF_ID", $staff_id);

        return $this->db->insert("STAFF_LEAVE_DETL", $data);
    }

    // SAVE UPDATE STAFF CONFERENCE MAIN LEAVE DATE
    public function updStaffConMain($form, $cr_refid, $staff_id)
    {
        if(!empty($form['applied_date_from'])) {
            $applied_date_from = "to_date('".$form['applied_date_from']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_LEAVE_DATE_FROM", $applied_date_from, false);
        } 

        if(!empty($form['applied_date_to'])) {
            $applied_date_to = "to_date('".$form['applied_date_to']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_LEAVE_DATE_TO", $applied_date_to, false);
        } 
        
        $this->db->where("SCM_REFID", $cr_refid);
        $this->db->where("SCM_STAFF_ID", $staff_id);

        return $this->db->update("STAFF_CONFERENCE_MAIN");
    }

    // SAVE UPDATE STAFF CONFERENCE MAIN LEAVE DATE & LEAVE REFID
    public function updStaffConMainLvRefid($form, $cr_refid, $staff_id, $sld_refid)
    {
        $data = array(
            "SCM_LEAVE_REFID" => $sld_refid,
        );

        if(!empty($form['applied_date_from'])) {
            $applied_date_from = "to_date('".$form['applied_date_from']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_LEAVE_DATE_FROM", $applied_date_from, false);
        } 

        if(!empty($form['applied_date_to'])) {
            $applied_date_to = "to_date('".$form['applied_date_to']."', 'DD/MM/YYYY')";
            $this->db->set("SCM_LEAVE_DATE_TO", $applied_date_to, false);
        } 
        
        $this->db->where("SCM_REFID", $cr_refid);
        $this->db->where("SCM_STAFF_ID", $staff_id);

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
    }

    // SUM TOTAL DAY TAKEN FROM STAFF_LEAVE_DETL
    public function sumTotalDayTaken($staff_id, $approve_date_from_year)
    {
        $this->db->select("COUNT(SLD_STAFF_ID) AS SLD_STAFF_ID_COUNT, SUM(SLD_TOTAL_DAY) AS SLD_TOTAL_DAY");
        $this->db->from("STAFF_LEAVE_DETL");
        $this->db->where("SLD_STAFF_ID", $staff_id);
        $this->db->where("TO_CHAR(SLD_DATE_FROM, 'YYYY') = '$approve_date_from_year'");

        $q = $this->db->get();
        return $q->row();
    }

    // SAVE UPDATE STAFF LEAVE RECORD
    public function updStaffLeaveRec($form, $staff_id, $day_taken, $approve_date_from_year)
    {
        // UPDATE BASED ON SLD_DATE_FROM
        $data = array(
            "SLR_TAKEN_DAYS" => $day_taken,
            "SLR_BALANCE_DAYS" => $form['balance']
        );
        
        $this->db->where("SLR_STAFF_ID", $staff_id);
        $this->db->where("SLR_YEAR", $approve_date_from_year);

        return $this->db->update("STAFF_LEAVE_RECORD", $data);
    }

    // SAVE INSERT STAFF LEAVE RECORD
    public function insStaffLeaveRec($form, $staff_id, $sum_total_day_taken)
    {
        $data = array(
            "SLR_STAFF_ID" => $staff_id,
            "SLR_YEAR" => $form['year'],
            "SLR_LEAVE_CODE" => '014',
            "SLR_ENTITLED_DAYS" => $form['entitled'],
            "SLR_TAKEN_DAYS" => $sum_total_day_taken,
            "SLR_BALANCE_DAYS" => $form['balance']
        );

        return $this->db->insert("STAFF_LEAVE_RECORD", $data);
    }

    // STAFF CONFERENCE ALLOWANCE
    public function getStaffConAllowance($refid, $staffID, $allowance_code = null) {
        $this->db->select("*");
        $this->db->from("STAFF_CONFERENCE_ALLOWANCE");
        $this->db->join("CONFERENCE_ALLOWANCE", "SCA_ALLOWANCE_CODE = CA_CODE", "LEFT");

        if(!empty($allowance_code)) {
            $this->db->where("SCA_REFID", $refid);
            $this->db->where("SCA_STAFF_ID", $staffID);
            $this->db->where("SCA_ALLOWANCE_CODE", $allowance_code);

            $q = $this->db->get();
            return $q->row();
        } else {
            $this->db->where("SCA_REFID", $refid);
            $this->db->where("SCA_STAFF_ID", $staffID);

            $q = $this->db->get();
            return $q->result();
        }
    }

    // CONFERENCE ALLOWANCE LIST
    public function getConferenceAllowanceList() {
        $this->db->select("CA_CODE, CA_DESC, CA_CODE||' - '|| CA_DESC AS CA_CODE_DESC");
        $this->db->from("CONFERENCE_ALLOWANCE");
        $this->db->order_by("CA_CODE");

        $q = $this->db->get();
        return $q->result();
    }

    // SAVE INSERT STAFF CONFERENCE ALLOWANCE
    public function saveNewStfConAllowance($form, $refid, $staff_id, $allowance_code)
    {
        $data = array(
            "SCA_REFID" => $refid,
            "SCA_STAFF_ID" => $staff_id,
            "SCA_ALLOWANCE_CODE" => $allowance_code,
            "SCA_AMOUNT_RM" => $form['apply'],
            "SCA_AMOUNT_FOREIGN" => $form['apply_foreign'],
            "SCA_AMT_RM_APPROVE_HOD" => $form['approved_hod'],
            "SCA_AMT_FOREIGN_APPROVE_HOD" => $form['approved_hod_foreign'],
            "SCA_AMT_RM_APPROVE_TNCA" => $form['approved_tnca'],
            "SCA_AMT_FOREIGN_APPROVE_TNCA" => $form['approved_tnca_foreign'],
            "SCA_AMT_RM_APPROVE_VC" => $form['approved_vc'],
            "SCA_AMT_FOREIGN_APPROVE_VC" => $form['approved_vc_foreign']
        );

        return $this->db->insert("STAFF_CONFERENCE_ALLOWANCE", $data);
    }

    // GET SUM ALLOWANCE BUDGET 'CONFERENCE'
    public function getSumAllowanceConference($refid, $staff_id) {
        $this->db->select("SUM(SCA_AMOUNT_RM) AS SCA_AMOUNT_RM, SUM(SCA_AMOUNT_FOREIGN) AS SCA_AMOUNT_FOREIGN, 
        SUM(SCA_AMT_RM_APPROVE_HOD) AS SCA_AMT_RM_APPROVE_HOD,
        SUM(SCA_AMT_RM_APPROVE_TNCA) AS SCA_AMT_RM_APPROVE_TNCA, 
        SUM(SCA_AMT_RM_APPROVE_VC) AS SCA_AMT_RM_APPROVE_VC");
        $this->db->from("STAFF_CONFERENCE_ALLOWANCE, CONFERENCE_ALLOWANCE");
        $this->db->where("SCA_ALLOWANCE_CODE = CA_CODE");
        $this->db->where("CA_BUDGET_ORIGIN_OVERSEAS IN ('CONFERENCE','PTNCA')");
        $this->db->where("SCA_STAFF_ID", $staff_id);
        $this->db->where("SCA_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // GET SUM ALLOWANCE BUDGET 'DEPARTMENT' - CA_BUDGET_ORIGIN_LOCAL 
    public function getSumAllowanceDepartmentCon($refid, $staff_id) {
        $this->db->select("SUM(SCA_AMOUNT_RM) AS SCA_AMOUNT_RM, SUM(SCA_AMOUNT_FOREIGN) AS SCA_AMOUNT_FOREIGN,
        SUM(SCA_AMT_RM_APPROVE_HOD) AS SCA_AMT_RM_APPROVE_HOD, SUM(SCA_AMT_RM_APPROVE_TNCA) AS SCA_AMT_RM_APPROVE_TNCA,
        SUM(SCA_AMT_RM_APPROVE_VC) AS SCA_AMT_RM_APPROVE_VC");
        $this->db->from("STAFF_CONFERENCE_ALLOWANCE, CONFERENCE_ALLOWANCE");
        $this->db->where("SCA_ALLOWANCE_CODE = CA_CODE");
        $this->db->where("CA_BUDGET_ORIGIN_LOCAL IN ('CONFERENCE','PTNCA')");
        $this->db->where("SCA_STAFF_ID", $staff_id);
        $this->db->where("SCA_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // GET SUM ALLOWANCE BUDGET 'DEPARTMENT' SCM_RM_TOTAL_AMT_DEPT, SCM_FOREIGN_TOTAL_AMT_DEPT, SCM_TOTAL_AMT_DEPT_APPRV_HOD
    public function getSumAllowanceDepartment($refid, $staff_id) {
        $this->db->select("SUM(SCA_AMOUNT_RM) AS SCA_AMOUNT_RM, SUM(SCA_AMOUNT_FOREIGN) AS SCA_AMOUNT_FOREIGN,
        SUM(SCA_AMT_RM_APPROVE_HOD) AS SCA_AMT_RM_APPROVE_HOD");
        $this->db->from("STAFF_CONFERENCE_ALLOWANCE, CONFERENCE_ALLOWANCE");
        $this->db->where("SCA_ALLOWANCE_CODE = CA_CODE");
        $this->db->where("CA_BUDGET_ORIGIN_LOCAL = 'DEPARTMENT'");
        $this->db->where("SCA_STAFF_ID", $staff_id);
        $this->db->where("SCA_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // GET SUM TOTAL ALLOWANCE BUDGET 'CONFERENCE' OR 'DEPARTMENT'
    public function getSumAllowanceTncaVc($refid, $staff_id) {
        $this->db->select("SUM(SCA_AMT_RM_APPROVE_TNCA) AS SCA_AMT_RM_APPROVE_TNCA, SUM(SCA_AMT_RM_APPROVE_VC) AS SCA_AMT_RM_APPROVE_VC");
        $this->db->from("STAFF_CONFERENCE_ALLOWANCE, CONFERENCE_ALLOWANCE");
        $this->db->where("SCA_ALLOWANCE_CODE = CA_CODE");
        $this->db->where("SCA_STAFF_ID", $staff_id);
        $this->db->where("SCA_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // UPDATE SUM ALLOWANCE TO STAFF_CONFERENCE_MAIN
    public function updSumScm($refid, $staff_id, $budget_origin, $scm_rm_total_amt, $scm_foreign_total_amt, $scm_rm_total_amt_dept, $scm_foreign_total_amt_dept, $scm_rm_total_amt_approve_hod, $scm_total_amt_dept_apprv_hod, $scm_rm_total_amt_approve_tnca, $scm_rm_total_amt_approve_vc)
    {
        // $curDate = 'SYSDATE';
        // $curUsr = $this->staff_id;
        if($budget_origin == 'CONFERENCE') {
            $data = array(
                "SCM_RM_TOTAL_AMT" => $scm_rm_total_amt,
                "SCM_FOREIGN_TOTAL_AMT" => $scm_foreign_total_amt,
                "SCM_RM_TOTAL_AMT_APPROVE_HOD" => $scm_rm_total_amt_approve_hod,
                "SCM_RM_TOTAL_AMT_APPROVE_TNCA" => $scm_rm_total_amt_approve_tnca,
                "SCM_RM_TOTAL_AMT_APPROVE_VC" => $scm_rm_total_amt_approve_vc
            );
        } elseif($budget_origin == 'DEPARTMENT') {
            $data = array(
                "SCM_RM_TOTAL_AMT" => $scm_rm_total_amt,
                "SCM_FOREIGN_TOTAL_AMT" => $scm_foreign_total_amt,
                "SCM_RM_TOTAL_AMT_DEPT" => $scm_rm_total_amt_dept,
                "SCM_FOREIGN_TOTAL_AMT_DEPT" => $scm_foreign_total_amt_dept,
                "SCM_RM_TOTAL_AMT_APPROVE_HOD" => $scm_rm_total_amt_approve_hod,
                "SCM_TOTAL_AMT_DEPT_APPRV_HOD" => $scm_total_amt_dept_apprv_hod,
                "SCM_RM_TOTAL_AMT_APPROVE_TNCA" => $scm_rm_total_amt_approve_tnca,
                "SCM_RM_TOTAL_AMT_APPROVE_VC" => $scm_rm_total_amt_approve_vc
            );
        }
        
        $this->db->where("SCM_STAFF_ID", $staff_id);
        $this->db->where("SCM_REFID", $refid);

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
    }

    // DELETE STAFF CONFERENCE ALLOWANCE
    public function delStfConAllowance($staffId, $crRefID, $sca_code) {
        $this->db->where('SCA_REFID', $crRefID);
        $this->db->where('SCA_STAFF_ID', $staffId);
        $this->db->where('SCA_ALLOWANCE_CODE', $sca_code);
        return $this->db->delete('STAFF_CONFERENCE_ALLOWANCE');
    }

    // SAVE UPDATE STAFF CONFERENCE ALLOWANCE
    public function saveUpdStfConAllowance($form, $refid, $staff_id, $allowance_code)
    {
        $data = array(
            "SCA_AMOUNT_RM" => $form['apply'],
            "SCA_AMOUNT_FOREIGN" => $form['apply_foreign'],
            "SCA_AMT_RM_APPROVE_HOD" => $form['approved_hod'],
            "SCA_AMT_FOREIGN_APPROVE_HOD" => $form['approved_hod_foreign'],
            "SCA_AMT_RM_APPROVE_TNCA" => $form['approved_tnca'],
            "SCA_AMT_FOREIGN_APPROVE_TNCA" => $form['approved_tnca_foreign'],
            "SCA_AMT_RM_APPROVE_VC" => $form['approved_vc'],
            "SCA_AMT_FOREIGN_APPROVE_VC" => $form['approved_vc_foreign']
        );

        $this->db->where('SCA_REFID', $refid);
        $this->db->where('SCA_STAFF_ID', $staff_id);
        $this->db->where('SCA_ALLOWANCE_CODE', $allowance_code);

        return $this->db->update("STAFF_CONFERENCE_ALLOWANCE", $data);
    }

    // CHECK STAFF_CONFERENCE_ALLOWANCE RECORD
    public function checkDelStfConAllw($staffId, $crRefID) {
        $this->db->select("1");
        $this->db->from("STAFF_CONFERENCE_ALLOWANCE");
        $this->db->where("SCA_STAFF_ID", $staffId);
        $this->db->where("SCA_REFID", $crRefID);

        $q = $this->db->get();
        return $q->row();
    }

    // CHECK STAFF_APPL_ATTACH RECORD
    public function checkDelStfApplAtt($staffId, $crRefID) {
        $this->db->select("1");
        $this->db->from("STAFF_APPL_ATTACH");
        $this->db->where("SAA_STAFF_ID", $staffId);
        $this->db->where("SAA_REFID", $crRefID);

        $q = $this->db->get();
        return $q->row();
    }

    // CHECK STAFF_LEAVE_DETL RECORD
    public function checkDelStfLevDetl($staffId) {
        $this->db->select("1");
        $this->db->from("STAFF_LEAVE_DETL");
        $this->db->where("SLD_STAFF_ID", $staffId);

        $q = $this->db->get();
        return $q->row();
    }

    // DELETE STAFF FROM CONFERENCE
    public function delStfConference($staffId, $crRefID) {
        $this->db->where('SCM_REFID', $crRefID);
        $this->db->where('SCM_STAFF_ID', $staffId);
        return $this->db->delete('STAFF_CONFERENCE_MAIN');
    }

    /*===============================================================
       Approve / Verify Conference Application (TNC A&A) (ATF035)
    ================================================================*/

    // POPULATE DEPARTMENT
    public function populateDept() {
        $query = "SELECT 'All' DM_DEPT_CODE, '' SS_DESC_SHORT FROM DUAL
        UNION    
        SELECT DM_DEPT_CODE, DM_DEPT_DESC
        FROM DEPARTMENT_MAIN
        WHERE NVL(DM_STATUS,'INACTIVE') = 'ACTIVE'
        AND DM_DEPT_CODE IN (SELECT SM_DEPT_CODE FROM STAFF_CONFERENCE_MAIN,STAFF_MAIN
        WHERE SM_STAFF_ID = SCM_STAFF_ID AND SCM_STATUS='VERIFY_TNCA')
        ORDER BY DM_DEPT_CODE";

        $q = $this->db->query($query);
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

    // GET CONFERENCE INFO LIST
    public function getConferenceApplicationTncaa($deptCode = null) {		
        $this->db->select("SCM_STAFF_ID, SM_STAFF_NAME, SCM_REFID, CM_NAME, TO_CHAR(SCM_APPLY_DATE, 'DD-MM-YYYY') AS SCM_APPLY_DATE, 
        TM_TITLE_DESC, NVL(SS_ACADEMIC,'N') AS SS_ACADEMIC, SS_DESC_SHORT,
        CASE SS_ACADEMIC
            WHEN 'Y' THEN 'Yes'
            ELSE 'No'
        END AS SS_ACADEMIC_DESC, TM_TITLE_DESC||' '||SM_STAFF_NAME AS TITLE_NAME");
        $this->db->from("STAFF_CONFERENCE_MAIN, STAFF_MAIN, CONFERENCE_MAIN,TITLE_MAIN, SERVICE_SCHEME");
        if($deptCode != 'All') {
            $this->db->where("(SCM_STATUS='VERIFY_TNCA' 
            AND SCM_STAFF_ID IN
            (SELECT SM_STAFF_ID FROM STAFF_MAIN WHERE SM_DEPT_CODE = '$deptCode'))");
        } else {
            $this->db->where("SCM_STATUS='VERIFY_TNCA'");
        }
        
        $this->db->where("SCM_STAFF_ID = SM_STAFF_ID");
        $this->db->where("SCM_REFID = CM_REFID");
        $this->db->where("SS_SERVICE_CODE = SM_JOB_CODE");
        $this->db->where("TM_TITLE_CODE(+) = SM_STAS_TITLE");
        $this->db->order_by("SCM_APPLY_DATE");
        $q = $this->db->get();
                
        return $q->result();
    }

    // GET FILE ATTACHMENT
    public function getFileAttachment($staff_id, $refid) {
        $this->db->select("*");
        $this->db->from("STAFF_APPL_ATTACH");
        $this->db->where("SAA_FORMNAME = 'CONFERENCE'");
        $this->db->where("SAA_STAFF_ID", $staff_id);
        $this->db->where("SAA_REFID", $refid);

        $q = $this->db->get();
        return $q->result();
    }

    // APPROVE / REJECT BY
    public function getAppRejcStaff() {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, TO_CHAR(SYSDATE, 'DD/MM/YYYY') AS CURR_DATE");
        $this->db->from("STAFF_MAIN");
        $this->db->where("SM_ADMIN_JOBCODE = '43'");
        $this->db->where("SM_STAFF_STATUS = '01'");

        $q = $this->db->get();
        return $q->row();
    }

    // GET RESEARCH DETAIL
    public function researchInfo($research_refid) {
        $this->db->select("SR_RESEARCH_TITLE, SR_PROJECT_ID, SR_GRANT_AMT, 
        TO_CHAR(SR_DATE_FROM, 'DD/MM/YYYY') AS SR_DATE_FROM, 
        TO_CHAR(SR_DATE_TO, 'DD/MM/YYYY') AS SR_DATE_TO");
        $this->db->from("STAFF_RESEARCH_RIMS");
        $this->db->where("SR_RESEARCH_REFID", $research_refid);

        $q = $this->db->get();
        return $q->row();
    }

    // SAVE ALLOWANCE DETAIL OTHERS
    public function saveAllwDetlOthers($refid, $staff_id, $aca, $amt, $amtFor, $appHod, $appHodFor, $appTnca, $appTncaFor)
    {
        $curDate = 'SYSDATE';
        $curUsr = $this->staff_id;

        $data = array(
            "SCA_AMOUNT_RM" => $amt,
            "SCA_AMOUNT_FOREIGN" => $amtFor,
            "SCA_AMT_RM_APPROVE_HOD" => $appHod,
            "SCA_AMT_FOREIGN_APPROVE_HOD" => $appHodFor,
            "SCA_AMT_RM_APPROVE_TNCA" => $appTnca,
            "SCA_AMT_FOREIGN_APPROVE_TNCA" => $appTncaFor,
            "SCA_UPDATE_BY" => $curUsr
        );
        $this->db->set("SCA_UPDATE_DATE", $curDate, false);

        $this->db->where('SCA_REFID', $refid);
        $this->db->where('SCA_STAFF_ID', $staff_id);
        $this->db->where('SCA_ALLOWANCE_CODE', $aca);

        return $this->db->update("STAFF_CONFERENCE_ALLOWANCE", $data);
    }

    // SUM STAFF CONFERENCE ALLOWANCE
    public function sumStaffConAllw($refid, $staff_id) {
        $this->db->select("SUM(SCA_AMT_RM_APPROVE_TNCA) SCA_AMT_RM_APPROVE_TNCA");
        $this->db->from("STAFF_CONFERENCE_ALLOWANCE");
        $this->db->where("SCA_REFID", $refid);
        $this->db->where("SCA_STAFF_ID", $staff_id);

        $q = $this->db->get();
        return $q->row();
    }

    public function updApprvAmtTnca($refid, $staff_id, $newSumAppTnca)
    {
        $data = array(
            "SCM_RM_TOTAL_AMT_APPROVE_TNCA" => $newSumAppTnca,
        );
        
        $this->db->where("SCM_STAFF_ID", $staff_id);
        $this->db->where("SCM_REFID", $refid);

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
    }
    
    // CLEAR VALUE APPROVED TNCA
    public function clearValAppTnca($refid, $staff_id, $aca)
    {
        $data = array(
            "SCA_AMT_RM_APPROVE_TNCA" => 0,
            "SCA_AMT_FOREIGN_APPROVE_TNCA" => 0
        );

        $this->db->where('SCA_REFID', $refid);
        $this->db->where('SCA_STAFF_ID', $staff_id);
        $this->db->where('SCA_ALLOWANCE_CODE', $aca);

        return $this->db->update("STAFF_CONFERENCE_ALLOWANCE", $data);
    }

    // AMEND STAFF CONFERENCE TNCAA
    public function ammendConferenceTncaa($refid, $staff_id, $remark, $appr_rej_by, $appr_rej_date)
    {
        $data = array(
            "SCM_TNCA_APPROVE_BY" => $appr_rej_by,
            "SCM_TNCA_REMARK" => $remark,
            "SCM_STATUS" => 'ENTRY'
        );

        if(!empty($appr_rej_date)) {
            $appr_rej_date = "to_date('".$appr_rej_date."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_APPROVE_DATE", $appr_rej_date, false);
        }

        $this->db->where('SCM_REFID', $refid);
        $this->db->where('SCM_STAFF_ID', $staff_id);

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
    }

    // CONFERENCE DETAILS DISTINCT
    public function conDetlDis($refid, $staff_id) {
        $this->db->select("CM_NAME, TO_CHAR(CM_DATE_FROM,'DD/MM/YYYY') CM_DATE_FROM2, 
        TO_CHAR(CM_DATE_TO,'DD/MM/YYYY') CM_DATE_TO2, SCM_BUDGET_ORIGIN");
        $this->db->from("STAFF_CONFERENCE_MAIN, CONFERENCE_MAIN");
        $this->db->where("SCM_REFID = CM_REFID");
        $this->db->where("SCM_STAFF_ID", $staff_id);
        $this->db->where("CM_REFID", $refid);

        $q = $this->db->get();
        return $q->row();
    }

    // GET STAFF REMINDER
    public function getStaffReminder($refid, $staff_id) {
        $this->db->select("SR_STAFF_ID");
        $this->db->from("STAFF_REMINDER");
        $this->db->where("SR_MODULE = 'CONFERENCE_RMIC'");
        $this->db->where("NVL(SR_STATUS,'N') = 'Y'");

        $q = $this->db->get();
        return $q->result();
    }

    // CREATE MEMO
    public function createMemo($from, $sendTO, $rmic_staff = null, $memoTitle, $memoContent, $memoID) {
        if($memoID == 1) {
            $sql = oci_parse($this->db->conn_id, "begin create_memo(:bind1,:bind2,null,:bind3,:bind4); end;");
            oci_bind_by_name($sql, ":bind1", $from);				//IN
            oci_bind_by_name($sql, ":bind2", $sendTO);				//IN
            oci_bind_by_name($sql, ":bind3", $memoTitle, 255);		//IN
            oci_bind_by_name($sql, ":bind4", $memoContent, 4000);	//IN
            $q = oci_execute($sql, OCI_DEFAULT); 
        }

        if($memoID == 2) {
            $sql = oci_parse($this->db->conn_id, "begin create_memo(:bind1,:bind2,:bind3,:bind4,:bind5); end;");
            oci_bind_by_name($sql, ":bind1", $from);				//IN
            oci_bind_by_name($sql, ":bind2", $sendTO);				//IN
            oci_bind_by_name($sql, ":bind3", $rmic_staff);				//IN
            oci_bind_by_name($sql, ":bind4", $memoTitle, 255);		//IN
            oci_bind_by_name($sql, ":bind5", $memoContent, 4000);	//IN
            $q = oci_execute($sql, OCI_DEFAULT); 
        }
		
		
        if ($q === FALSE) {
			return 0;
		}
		
		return 1;	
    } 

    // STAFF TNCPI
    public function getTncpi() {
        $this->db->select("SM_STAFF_ID");
        $this->db->from("STAFF_MAIN");
        $this->db->where("SM_ADMIN_JOBCODE = '14'");

        $q = $this->db->get();
        return $q->row();
    }

    // CONFERENCE CATEGORY DETL
    public function getConCatDetl($cat_code) {
        $this->db->select("*");
        $this->db->from("CONFERENCE_CATEGORY");
        $this->db->where("CC_CODE", $cat_code);

        $q = $this->db->get();
        return $q->row();
    }

    // CONFERENCE ADMIN HIER
    public function getConAdmHier($staff_id) {
        $this->db->select("*");
        $this->db->from("CONFERENCE_ADMIN_HIERARCHY, STAFF_MAIN");
        $this->db->where("SM_ADMIN_JOBCODE = CAH_ADMIN_CODE");
        $this->db->where("SM_STAFF_ID", $staff_id);
        $this->db->where("CAH_STATUS = 'Y'");

        $q = $this->db->get();
        return $q->row();
    }

    // APPROVE STAFF CONFERENCE TNCAA
    public function approveConferenceTncaa($refid, $staff_id, $remark, $appr_rej_by, $appr_rej_date, $rec_date, $scm_sts)
    {
        $data = array(
            "SCM_TNCA_APPROVE_BY" => $appr_rej_by,
            "SCM_TNCA_REMARK" => $remark,
            "SCM_STATUS" => $scm_sts
        );

        if(!empty($appr_rej_date)) {
            $appr_rej_date = "to_date('".$appr_rej_date."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_APPROVE_DATE", $appr_rej_date, false);
        }

        if(!empty($rec_date)) {
            $rec_date = "to_date('".$rec_date."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_RECEIVE_DATE", $rec_date, false);
        }

        $this->db->where('SCM_REFID', $refid);
        $this->db->where('SCM_STAFF_ID', $staff_id);

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
    }

    // UPDATE APPROVE STAFF_LEAVE_DETL
    public function updateAppSLD($staff_id, $leave_ref, $sld_sts, $appr_rej_by)
    {
        $curDate = 'SYSDATE';

        $data = array(
            "SLD_STATUS" => $sld_sts,
            "SLD_APPROVE_BY" => $appr_rej_by,
        );

        $this->db->set("SLD_APPROVE_DATE", $curDate, false);

        $this->db->where('SLD_REF_ID', $leave_ref);
        $this->db->where('SLD_STAFF_ID', $staff_id);

        return $this->db->update("STAFF_LEAVE_DETL", $data);
    }

    // CONFERENCE DETAILS APPROVE TNCAA
    public function getConferenceDetlAppTncaa($appr_rej_by, $staff_id, $refid) {
        $query = "SELECT DISTINCT SCM_REFID,CM_NAME,CM_ADDRESS,CM_POSTCODE,CM_CITY,
        CM_STATE,SM_STATE_DESC, CONFERENCE_MAIN.CM_COUNTRY_CODE CM_COUNTRY_CODE,CM_COUNTRY_DESC,
        TO_CHAR(CM_DATE_FROM,'dd/mm/yyyy') CM_DATE_FROM2,TO_CHAR(CM_DATE_TO,'dd/mm/yyyy') CM_DATE_TO2,
        SM_STAFF_ID,SM_STAFF_NAME,TO_CHAR(SYSDATE,'dd/mm/yyyy') APPROVE_DATE,
        TO_CHAR(CM_DATE_TO+14,'dd/mm/yyyy') CM_SUBMIT_LMP,TO_CHAR(CM_DATE_FROM,'yyyy') CM_YEAR,SCM_BUDGET_ORIGIN
        FROM STAFF_CONFERENCE_MAIN,CONFERENCE_MAIN,COUNTRY_MAIN,STATE_MAIN,STAFF_MAIN APPROVER
        WHERE SCM_REFID = CM_REFID
        AND APPROVER.SM_STAFF_ID = '$appr_rej_by'
        AND SCM_STAFF_ID = '$staff_id'
        AND SM_STATE_CODE(+) = CM_STATE
        AND COUNTRY_MAIN.CM_COUNTRY_CODE(+) = CONFERENCE_MAIN.CM_COUNTRY_CODE
        AND CM_REFID = '$refid'";

        $q = $this->db->query($query);
        return $q->row();
    }

    // REJECT STAFF CONFERENCE TNCAA
    public function rejectConferenceTncaa($refid, $staff_id, $remark, $appr_rej_by, $appr_rej_date, $rec_date)
    {
        $data = array(
            "SCM_TNCA_APPROVE_BY" => $appr_rej_by,
            "SCM_TNCA_REMARK" => $remark,
            "SCM_STATUS" => 'REJECT'
        );

        if(!empty($appr_rej_date)) {
            $appr_rej_date = "to_date('".$appr_rej_date."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_APPROVE_DATE", $appr_rej_date, false);
        }

        if(!empty($rec_date)) {
            $rec_date = "to_date('".$rec_date."', 'DD/MM/YYYY')";
            $this->db->set("SCM_TNCA_RECEIVE_DATE", $rec_date, false);
        }

        $this->db->where('SCM_REFID', $refid);
        $this->db->where('SCM_STAFF_ID', $staff_id);

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
    }
}