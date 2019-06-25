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
       CONFERENCE APPLICATION - MANUAL ENTRY (ASF032)
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
    public function getStaffList()
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID ||' - '||SM_STAFF_NAME AS SM_STAFF_ID_NAME");
        $this->db->from("STAFF_MAIN, STAFF_STATUS");
        $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS AND SS_STATUS_STS = 'ACTIVE' AND SM_STAFF_TYPE = 'STAFF'");
        $this->db->order_by("2");

        $q = $this->db->get();
        return $q->result();
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
        TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') AS CM_DATE_FROM, TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') AS CM_DATE_TO, CM_ORGANIZER_NAME");
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
        SCM_PAPER_TITLE2, SCM_CATEGORY_CODE, SCM_SPONSOR, SCM_SPONSOR_NAME, 
        SCM_SPONSOR_BUDGET_ORIGIN, SCM_RM_SPONSOR_TOTAL_AMT, SCM_BUDGET_ORIGIN, 
        TO_CHAR(SCM_APPLY_DATE, 'DD/MM/YYYY') AS SCM_APPLY_DATE, 
        SCM_STATUS, SCM_APPROVER_REMARK1, SCM_APPROVER_REMARK2, SCM_APPROVER_REMARK3,
        SCM_APPROVER_REMARK4, SCM_RECOMMEND_BY, TO_CHAR(SCM_RECOMMEND_DATE, 'DD/MM/YYYY') AS SCM_RECOMMEND_DATE,
        SCM_TNCA_REMARK, SCM_TNCA_APPROVE_BY, TO_CHAR(SCM_TNCA_APPROVE_DATE, 'DD/MM/YYYY') AS SCM_TNCA_APPROVE_DATE,
        TO_CHAR(SCM_TNCA_RECEIVE_DATE, 'DD/MM/YYYY') AS SCM_TNCA_RECEIVE_DATE, SCM_VC_REMARK, SCM_VC_APPROVE_BY, 
        TO_CHAR(SCM_VC_APPROVE_DATE, 'DD/MM/YYYY') AS SCM_VC_APPROVE_DATE, TO_CHAR(SCM_VC_RECEIVE_DATE, 'DD/MM/YYYY') AS SCM_VC_RECEIVE_DATE, TO_CHAR(SCM_LEAVE_DATE_FROM, 'DD/MM/YYYY') AS SCM_LEAVE_DATE_FROM, TO_CHAR(SCM_LEAVE_DATE_TO, 'DD/MM/YYYY') AS SCM_LEAVE_DATE_TO");
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
    public function getTotalLeave($staffID)
    {
        $this->db->select("SLR_TAKEN_DAYS, SLR_BALANCE_DAYS");
        $this->db->from("STAFF_LEAVE_RECORD");
        $this->db->where("SLR_STAFF_ID", $staffID);
        $this->db->where("SLR_YEAR = TO_CHAR(SYSDATE, 'YYYY')");
        $this->db->where("SLR_LEAVE_CODE = '014'");

        $q = $this->db->get();
        return $q->row();
    } 

    // GET LEAVE DETL
    public function getLeaveDetl($leaveRefid, $staffID)
    {
        $this->db->select("TO_CHAR(SLD_DATE_FROM, 'DD/MM/YYYY') AS SLD_DATE_FROM, TO_CHAR(SLD_DATE_TO, 'DD/MM/YYYY') AS SLD_DATE_TO");
        $this->db->from("STAFF_LEAVE_DETL");
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

    /////////////////////////////////////
    // GET CONFERENCE INFO DETL
    public function conInfoSetupDetl($refid) {
        $this->db->select("
        CM_REFID,
        CM_NAME,
        CM_DESC,
        CM_ADDRESS,
        CM_CITY,
        CM_POSTCODE,
        CM_STATE,
        CM1.CM_COUNTRY_CODE AS CM_COUNTRY_CODE,
        CM2.CM_COUNTRY_DESC AS CM_COUNTRY_DESC,
        SM_STATE_DESC,
        TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') AS CM_DATE_FROM,
        TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') AS CM_DATE_TO,
        CM_ORGANIZER_NAME,
        CM_LEVEL,
        TL_DESC,
        CM_TEMP_OPEN,
        CASE 
            WHEN CM_TEMP_OPEN = 'Y' THEN 'Yes'
            WHEN CM_TEMP_OPEN = 'N' THEN 'No'
        END
        CM_TEMP_OPEN_FULL,
        CM_PARTICIPANT");
        $this->db->from("CONFERENCE_MAIN CM1");
        $this->db->join("COUNTRY_MAIN CM2", "CM1.CM_COUNTRY_CODE = CM2.CM_COUNTRY_CODE", "LEFT");
        $this->db->join("STATE_MAIN", "CM_STATE = SM_STATE_CODE", "LEFT");
        $this->db->join("TRAINING_LEVEL", "CM_LEVEL = TL_CODE", "LEFT");
        $this->db->where("CM_REFID", $refid);
        $q = $this->db->get();
                
        return $q->row();
    }

    // SAVE EDIT CONFERENCE INFORMATION
    public function saveEditConInfo($form, $refid)
    {
        $curDate = 'SYSDATE';

        if($form['country'] != 'MYS' && empty($form['total_participant']) && $form['total_participant'] != '0') {
            $totalParticipant = "(SELECT HP_PARM_DESC FROM HRADMIN_PARMS WHERE HP_PARM_CODE = 'CONFERENCE_MAX_PARTICIPANT_OVERSEA')";
        } 
        elseif($form['country'] == 'MYS' && empty($form['total_participant']) && $form['total_participant'] !='0') {
            $totalParticipant = 0;
        } 
        else {
            $totalParticipant = $form['total_participant'];
        }

        $data = array(
            "CM_NAME" => $form['title'],
            "CM_DESC" => $form['description'],
            "CM_ADDRESS" => $form['address'],
            "CM_CITY" => $form['city'],
            "CM_POSTCODE" => $form['postcode'],
            "CM_STATE" => $form['state'],
            "CM_COUNTRY_CODE" => $form['country'],
            "CM_ORGANIZER_NAME" => $form['organizer_name'],
            "CM_LEVEL" => $form['level'],
            "CM_TEMP_OPEN" => $form['temporary_open']
        );

        $this->db->set("CM_PARTICIPANT", $totalParticipant, false);

        if(!empty($form['date_from'])) {
            $date_from = "to_date('".$form['date_from']."', 'DD/MM/YYYY')";
            $this->db->set("CM_DATE_FROM", $curDate, false);
        }

        if(!empty($form['date_to'])) {
            $date_to = "to_date('".$form['date_to']."', 'DD/MM/YYYY')";
            $this->db->set("CM_DATE_TO", $curDate, false);
        }

        $this->db->where("CM_REFID", $refid);
        
        return $this->db->update("CONFERENCE_MAIN", $data);
    }

    // DELETE CONFERENCE INFORMATION
    public function deleteConInfo($refid) 
    {
        $this->db->where("CM_REFID", $refid);
        return $this->db->delete("CONFERENCE_MAIN");
    } 
}