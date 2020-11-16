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

    // CREATE MEMO
    public function createMemo($from, $sendTO, $cc = null, $memoTitle, $memoContent, $memoID) {
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
            oci_bind_by_name($sql, ":bind3", $cc);			        //IN
            oci_bind_by_name($sql, ":bind4", $memoTitle, 255);		//IN
            oci_bind_by_name($sql, ":bind5", $memoContent, 4000);	//IN
            $q = oci_execute($sql, OCI_DEFAULT); 
        }
		
		
        if ($q === FALSE) {
			return 0;
		}
		
		return 1;	
    } 
    
    /*===========================================================
       QUERY CONFERENCE REPORT APPLICATION - ATF088
    =============================================================*/

    // POPULATE DEPARTMENT QUERY CONFERENCE REPORT APPLICATION
    public function populateDeptQ($mod = null) {
        if($mod == 'APP_REPORT') {
            $curr_usrname = $this->username;

            $query = "SELECT '-'||'-'||'-'||'Please select'||'-'||'-'||'-' DM_DEPT_CODE FROM DUAL
            UNION 
            SELECT DM_DEPT_CODE FROM DEPARTMENT_MAIN	
            WHERE NVL(DM_STATUS,'INACTIVE') = 'ACTIVE'
                AND DM_DEPT_CODE IN
                (SELECT NVL(SM_DEPT_CODE,'-') 
                  FROM STAFF_MAIN, STAFF_CONFERENCE_REP 
                  WHERE SM_STAFF_ID = SCR_STAFF_ID
                  AND SCR_STATUS = 'VERIFY_HOD')
                OR DM_DEPT_CODE IN
                (SELECT NVL(SM_DEPT_CODE,'-') 
                  FROM STAFF_MAIN, STAFF_CONFERENCE_REP, DEPARTMENT_MAIN 
                  WHERE SM_STAFF_ID = SCR_STAFF_ID
                  AND DM_DIRECTOR = SM_STAFF_ID
                  AND DM_LEVEL IN (1,2)
                  AND NVL(DM_STATUS,'INACTIVE') = 'ACTIVE'
                  AND SCR_STATUS = 'APPLY')	
                OR DM_DEPT_CODE IN
                (SELECT NVL(SM_DEPT_CODE,'PTNC-A') 
                  FROM STAFF_MAIN 
                  WHERE UPPER(SM_APPS_USERNAME) = UPPER('$curr_usrname'))
                ORDER BY DM_DEPT_CODE";
        } else {
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
        }
        

        $q = $this->db->query($query);
        return $q->result();
    }

    // STAFF LIST QUERY
    public function getStaffListQ($dept, $mod = null) {
        
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_JOB_CODE, SS_SERVICE_DESC");
        $this->db->from("STAFF_MAIN");
        $this->db->join("SERVICE_SCHEME", "SS_SERVICE_CODE = SM_JOB_CODE", "LEFT");
        if($mod == 'APP_REPORT') {
            $this->db->join("STAFF_CONFERENCE_REP", "SCR_STAFF_ID = SM_STAFF_ID", "LEFT");
            $this->db->where("(SCR_STAFF_ID IN (SELECT SM_STAFF_ID FROM STAFF_MAIN WHERE SM_STAFF_ID = SCR_STAFF_ID AND SM_DEPT_CODE = '$dept') AND SCR_STATUS='VERIFY_HOD') 
            OR (SCR_STAFF_ID IN (SELECT DM_DIRECTOR 
            FROM DEPARTMENT_MAIN WHERE DM_DIRECTOR = SCR_STAFF_ID AND DM_LEVEL IN (1,2) AND DM_DEPT_CODE = '$dept') 
            AND SCR_STATUS = 'APPLY')");
            $this->db->order_by("SCR_APPLY_DATE, SCR_STAFF_ID");
        } else {
            $this->db->where("SM_STAFF_ID IN (SELECT DISTINCT SCR_STAFF_ID FROM STAFF_CONFERENCE_REP,STAFF_MAIN WHERE SM_DEPT_CODE = '$dept' AND SM_STAFF_ID = SCR_STAFF_ID)");
            $this->db->order_by("SM_STAFF_NAME");
        }
        
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
    public function getStaffConRepQ($staff_id, $mod = null)
    {
        $deptCode = "(SELECT SM_DEPT_CODE FROM STAFF_MAIN WHERE SM_STAFF_ID = '$staff_id')";

        $this->db->select("SCR_REFID, SCR_STAFF_ID, CM_NAME, TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') CM_DATE_FROM, TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') CM_DATE_TO, TO_CHAR(SCR_APPLY_DATE, 'DD/MM/YYYY') AS SCR_APPLY_DATE2, SCR_STATUS, SM_DEPT_CODE");
        $this->db->from("STAFF_CONFERENCE_REP");
        $this->db->join("CONFERENCE_MAIN", "CM_REFID = SCR_REFID", "LEFT");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = SCR_STAFF_ID", "LEFT");
        $this->db->where("SCR_STAFF_ID", $staff_id);
        if($mod == 'APP_REPORT') {
            $this->db->where("(SCR_STAFF_ID IN (SELECT SM_STAFF_ID FROM STAFF_MAIN WHERE SM_STAFF_ID = SCR_STAFF_ID AND SM_DEPT_CODE = $deptCode) AND SCR_STATUS='VERIFY_HOD') 
            OR (SCR_STAFF_ID IN (SELECT DM_DIRECTOR 
            FROM DEPARTMENT_MAIN WHERE DM_DIRECTOR = '$staff_id' AND DM_LEVEL IN (1,2) AND DM_DEPT_CODE = $deptCode) 
            AND SCR_STATUS = 'APPLY')");         
        }
        $this->db->order_by("SCR_APPLY_DATE DESC");
        
        //FROM DEPARTMENT_MAIN WHERE DM_DIRECTOR = SCR_STAFF_ID AND DM_LEVEL IN (1,2) AND DM_DEPT_CODE = $deptCode) 
        $q = $this->db->get();
        return $q->result();
    } 

    // STAFF CONFERENCE REPORT DETAIL
    public function getConRepDetl($refid, $staff_id)
    {
        $this->db->select("SCM_PAPER_TITLE, SCM_PAPER_TITLE2, SCR_CONTENT, SCR_EXPERIENCE, SCR_REMARK, SCR_HOD_REMARK1, SCR_HOD_REMARK2, SCR_HOD_REMARK3, SM1.SM_STAFF_NAME SCR_HOD_VERIFY_BY_NAME, SCR_HOD_VERIFY_BY, SCR_HOD_VERIFY_BY||' - '||SM1.SM_STAFF_NAME HOD_VERIFY_BY_ID_NAME,
        TO_CHAR(SCR_HOD_VERIFY_DATE, 'DD/MM/YYYY') SCR_HOD_VERIFY_DATE, SCR_TNCA_REMARK1, SM2.SM_STAFF_NAME SCR_TNCA_VERIFY_BY_NAME, SCR_TNCA_VERIFY_BY, SCR_TNCA_VERIFY_BY||' - '||SM2.SM_STAFF_NAME TNCA_VERIFY_BY_ID_NAME, TO_CHAR(SCR_TNCA_VERIFY_DATE, 'DD/MM/YYYY') SCR_TNCA_VERIFY_DATE, SCR_TNCA_REJECT_REMARK, SCR_TNCA_REJECT_BY, TO_CHAR(SYSDATE, 'DD/MM/YYYY') AS CURR_DATE");
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
    public function getStaffListConRep($refid, $staff_id = null) {		
        $this->db->select("SCR_STAFF_ID, SM_STAFF_NAME, SCR_STATUS, TO_CHAR(SCR_APPLY_DATE, 'DD/MM/YYYY') SCR_APPLY_DATE, SCR_CONTENT, SCR_OTHER_TOTAL_AMT, SCR_EXPERIENCE, SCR_REMARK");
        $this->db->from("STAFF_CONFERENCE_REP");
        $this->db->join("STAFF_MAIN", "SCR_STAFF_ID = SM_STAFF_ID", "LEFT");
        $this->db->where("SCR_REFID", $refid);
        
        if(!empty($staff_id)) {
            $this->db->where("SCR_STAFF_ID = UPPER('$staff_id')");

            $q = $this->db->get();
            return $q->row();
        } else {
            $q = $this->db->get();
            return $q->result();
        }
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
    public function getConferenceDetlRep($refid, $staff_id)
    {
        $this->db->select("CM_REFID, CM_NAME,  SCM_PAPER_TITLE, SCM_PAPER_TITLE2, CM_ADDRESS, CM_CITY, CM_POSTCODE, 
        CM_STATE, SM_STATE_DESC, CONFERENCE_MAIN.CM_COUNTRY_CODE AS CM_COUNTRY_CODE, 
        COUNTRY_MAIN.CM_COUNTRY_DESC AS CM_COUNTRY_DESC, 
        TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') AS CM_DATE_FROM,
        TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') AS CM_DATE_TO, 
        floor(TO_DATE (TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY'), 'dd/mm/yyyy') - TO_DATE (TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY'), 'dd/mm/yyyy')) + 1 AS DURATION_CM,
        CM_ORGANIZER_NAME, SCM_RM_TOTAL_AMT_APPROVE_TNCA, SCM_RM_SPONSOR_TOTAL_AMT");
        $this->db->from("CONFERENCE_MAIN");
        $this->db->join("STAFF_CONFERENCE_MAIN", "SCM_REFID = CM_REFID", "LEFT");
        $this->db->join("STATE_MAIN", "CM_STATE = STATE_MAIN.SM_STATE_CODE", "LEFT");
        $this->db->join("COUNTRY_MAIN", "CONFERENCE_MAIN.CM_COUNTRY_CODE = COUNTRY_MAIN.CM_COUNTRY_CODE", "LEFT");
        $this->db->where("CM_REFID", $refid);
        $this->db->where("SCM_STAFF_ID", $staff_id);

        $q = $this->db->get();
        return $q->row();
    } 

    // SAVE REPORT ENTRY PART I
    public function saveRepPartI($form)
    {
        $curr_date = 'SYSDATE';
        $curr_usr = $this->staff_id;

        // SCR_OTHER_TOTAL_AMT
        if(empty($form['fa_os'])) {
            $fa_os = 0;
        } else {
            $fa_os = $form['fa_os'];
        }

        // SCR_STATUS
        if(empty($form['status'])) {
            $status = 'VERIFY_TNCA';
        } else {
            $status = $form['status'];
        }
        
        $data = array(
            "SCR_STAFF_ID" => strtoupper($form['staff_id']),
            "SCR_REFID" => $form['conference_workshop_seminar'],
            "SCR_OTHER_TOTAL_AMT" => $fa_os,
            "SCR_STATUS" => $status, 
            "SCR_ENTER_BY" => $curr_usr
        );

        if(!empty($form['report_date_submission'])) {
            $rep_sub_date = "to_date('".$form['report_date_submission']."', 'DD/MM/YYYY')";
            $this->db->set("SCR_APPLY_DATE", $rep_sub_date, false);
        } else {
            $this->db->set("SCR_APPLY_DATE", $curr_date, false);
        }
        
        $this->db->set("SCR_ENTER_DATE", $curr_date, false);

        $this->db->where("SCR_STAFF_ID", $form['staff_id']);
        $this->db->where("SCR_REFID", $form['conference_workshop_seminar']);

        return $this->db->insert("STAFF_CONFERENCE_REP", $data);
    }

    // SAVE EDIT REPORT ENTRY PART I
    public function saveEditRepPartI($form)
    {
        $curr_date = 'SYSDATE';
        $curr_usr = $this->staff_id;

        // SCR_OTHER_TOTAL_AMT
        if(empty($form['fa_os'])) {
            $fa_os = 0;
        } else {
            $fa_os = $form['fa_os'];
        }
        
        $data = array(
            "SCR_OTHER_TOTAL_AMT" => $fa_os,
            "SCR_STATUS" => $form['status'],
            "SCR_UPDATE_BY" => $curr_usr
        );

        if(!empty($form['report_date_submission'])) {
            $rep_sub_date = "to_date('".$form['report_date_submission']."', 'DD/MM/YYYY')";
            $this->db->set("SCR_APPLY_DATE", $rep_sub_date, false);
        } else {
            $this->db->set("SCR_APPLY_DATE", $curr_date, false);
        }
        
        $this->db->set("SCR_UPDATE_DATE", $curr_date, false);

        $this->db->where("SCR_STAFF_ID", $form['staff_id']);
        $this->db->where("SCR_REFID", $form['conference_workshop_seminar']);

        return $this->db->update("STAFF_CONFERENCE_REP", $data);
    }

    // SAVE EDIT REPORT ENTRY PART II
    public function saveRepPartII($form)
    {
        $curr_date = 'SYSDATE';
        $curr_usr = $this->staff_id;
        
        $data = array(
            "SCR_CONTENT" => $form['conference_content'],
            "SCR_UPDATE_BY" => $curr_usr
        );
        
        $this->db->set("SCR_UPDATE_DATE", $curr_date, false);

        $this->db->where("SCR_STAFF_ID", $form['staff_id']);
        $this->db->where("SCR_REFID", $form['conference_id']);

        return $this->db->update("STAFF_CONFERENCE_REP", $data);
    }

    // SAVE EDIT REPORT ENTRY PART III
    public function saveRepPartIII($form)
    {
        $curr_date = 'SYSDATE';
        $curr_usr = $this->staff_id;
        
        $data = array(
            "SCR_EXPERIENCE" => $form['conference_experience'],
            "SCR_REMARK" => $form['conference_remark'],
            "SCR_UPDATE_BY" => $curr_usr
        );
        
        $this->db->set("SCR_UPDATE_DATE", $curr_date, false);

        $this->db->where("SCR_STAFF_ID", $form['staff_id']);
        $this->db->where("SCR_REFID", $form['conference_id']);

        return $this->db->update("STAFF_CONFERENCE_REP", $data);
    }

    // SAVE EDIT REPORT ENTRY PART IV
    public function saveRepPartIV($form)
    {
        $curr_date = 'SYSDATE';
        $curr_usr = $this->staff_id;
        
        $data = array(
            "SCR_HOD_REMARK1" => $form['hod_remark_1'],
            "SCR_HOD_REMARK2" => $form['hod_remark_2'],
            "SCR_HOD_REMARK3" => $form['hod_remark_3'],
            "SCR_TNCA_REMARK1" => $form['tnca_remark'],
            "SCR_HOD_VERIFY_BY" => strtoupper($form['certified_by_id']),
            "SCR_TNCA_VERIFY_BY" => strtoupper($form['approved_by_id']),
            "SCR_UPDATE_BY" => $curr_usr
        );

        if(!empty($form['date_certified'])) {
            $date_certified = "to_date('".$form['date_certified']."', 'DD/MM/YYYY')";
            $this->db->set("SCR_HOD_VERIFY_DATE", $date_certified, false);
        } 

        if(!empty($form['approved_date'])) {
            $approved_date = "to_date('".$form['approved_date']."', 'DD/MM/YYYY')";
            $this->db->set("SCR_TNCA_VERIFY_DATE", $approved_date, false);
        } 
        
        $this->db->set("SCR_UPDATE_DATE", $curr_date, false);

        $this->db->where("SCR_STAFF_ID", $form['staff_id']);
        $this->db->where("SCR_REFID", $form['conference_id']);

        return $this->db->update("STAFF_CONFERENCE_REP", $data);
    }

    // RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS DETL
    public function getScrPart1Detl($refid, $staff_id, $name, $field)
    {
        $this->db->select("SCRP1_NAME, SCRP1_FIELD, SCRP1_INSTITUITION, SCRP1_TELNO, SCRP1_EMAIL");
        $this->db->from("STAFF_CONFERENCE_REP_PART1");
        $this->db->where("SCRP1_REFID", $refid);
        $this->db->where("SCRP1_STAFF_ID", $staff_id);
        $this->db->where("SCRP1_NAME", $name);
        $this->db->where("SCRP1_FIELD", $field);

        $q = $this->db->get();
        return $q->row();
    }

    // SAVE RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS
    public function saveEstNetRelay($form, $refid, $staff_id)
    {
        $data = array(
            "SCRP1_REFID" => $refid,
            "SCRP1_STAFF_ID" => $staff_id,
            "SCRP1_NAME" => $form['name'],
            "SCRP1_FIELD" => $form['expertise'],
            "SCRP1_INSTITUITION" => $form['institution'],
            "SCRP1_TELNO" => $form['tel_no'],
            "SCRP1_EMAIL" => $form['email']
        );

        return $this->db->insert("STAFF_CONFERENCE_REP_PART1", $data);
    }

    // DELETE RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS
    public function delEstNetRelay($refid, $staff_id, $name, $field) {
        $this->db->where('SCRP1_REFID', $refid);
        $this->db->where('SCRP1_STAFF_ID', $staff_id);
        $this->db->where('SCRP1_NAME', $name);
        $this->db->where('SCRP1_FIELD', $field);
        return $this->db->delete('STAFF_CONFERENCE_REP_PART1');
    }

    // SCR PART 2 DETL
    public function getScrPart2Detl($refid, $staff_id, $activity)
    {
        $this->db->select("SCRP2_ACTIVITY, SCRP2_IMPLEMENT_DATE");
        $this->db->from("STAFF_CONFERENCE_REP_PART2");
        $this->db->where("SCRP2_REFID", $refid);
        $this->db->where("SCRP2_STAFF_ID", $staff_id);
        $this->db->where("SCRP2_ACTIVITY", $activity);

        $q = $this->db->get();
        return $q->row();
    }

    // SAVE SCR PART 2
    public function saveScrpii($form, $refid, $staff_id)
    { 
        $data = array(
            "SCRP2_REFID" => $refid,
            "SCRP2_STAFF_ID" => $staff_id,
            "SCRP2_ACTIVITY" => $form['activity'],
            "SCRP2_IMPLEMENT_DATE" => $form['implementation_date'],
        );

        return $this->db->insert("STAFF_CONFERENCE_REP_PART2", $data);
    }

    // DELETE RECORD SCR PART 2
    public function delScrpII($refid, $staff_id, $activity) {
        $this->db->where('SCRP2_REFID', $refid);
        $this->db->where('SCRP2_STAFF_ID', $staff_id);
        $this->db->where('SCRP2_ACTIVITY', $activity);
        return $this->db->delete('STAFF_CONFERENCE_REP_PART2');
    }

    /*===========================================================
       APPROVE CONFERENCE REPORT (TNC A&A) - (ATF087)
    =============================================================*/

    // APPROVE / REJECT BY TNCAA
    public function getAppRejcStaff() {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, TO_CHAR(SYSDATE, 'DD/MM/YYYY') AS CURR_DATE");
        $this->db->from("STAFF_MAIN");
        $this->db->where("SM_ADMIN_JOBCODE = '43'");
        $this->db->where("SM_STAFF_STATUS IN ('01','17')");
        $q = $this->db->get();
        return $q->row();
    }

    // SAVE AMEND / APPROVAL
    public function saveAmdAppTncaa($refid, $staff_id, $app_amd_remark, $app_amd_by, $app_amd_date)
    { 
        $data = array(
            "SCR_TNCA_REMARK1" => $app_amd_remark,
            "SCR_TNCA_VERIFY_BY" => $app_amd_by
        );

        if(!empty($app_amd_date)) {
            $app_amd_date = "to_date('".$app_amd_date."', 'DD/MM/YYYY')";
            $this->db->set("SCR_TNCA_VERIFY_DATE", $app_amd_date, false);
        }

        $this->db->where("SCR_REFID", $refid);
        $this->db->where("SCR_STAFF_ID", $staff_id);

        return $this->db->update("STAFF_CONFERENCE_REP", $data);
    }

    // SAVE REJECT
    public function saveRejcTncaa($refid, $staff_id, $rjc_remark, $rjc_by, $rjc_date)
    { 
        $data = array(
            "SCR_TNCA_REJECT_REMARK" => $rjc_remark,
            "SCR_TNCA_REJECT_BY" => $rjc_by
        );

        if(!empty($rjc_date)) {
            $rjc_date = "to_date('".$rjc_date."', 'DD/MM/YYYY')";
            $this->db->set("SCR_TNCA_REJECT_DATE", $rjc_date, false);
        }

        $this->db->where("SCR_REFID", $refid);
        $this->db->where("SCR_STAFF_ID", $staff_id);

        return $this->db->update("STAFF_CONFERENCE_REP", $data);
    }

    // REJECT CONFERENCE REPORT
    public function rejectConferenceReport($refid, $staff_id, $rjc_remark, $rjc_by, $rjc_date)
    { 
        $data = array(
            "SCR_STATUS" => 'REJECTED',
            "SCR_TNCA_REJECT_REMARK" => $rjc_remark,
            "SCR_TNCA_REJECT_BY" => $rjc_by
        );

        if(!empty($rjc_date)) {
            $rjc_date = "to_date('".$rjc_date."', 'DD/MM/YYYY')";
            $this->db->set("SCR_TNCA_REJECT_DATE", $rjc_date, false);
        }

        $this->db->where("SCR_REFID", $refid);
        $this->db->where("SCR_STAFF_ID", $staff_id);

        return $this->db->update("STAFF_CONFERENCE_REP", $data);
    }

    // CONTENT REJECT MEMO DETAILS
    public function getRejectRepMemContent($refid, $staff_id, $rjc_by) {

        $query = "SELECT DISTINCT SCM_REFID,CM_NAME,CM_ADDRESS,CM_POSTCODE,CM_CITY,
        CM_STATE,SM_STATE_DESC,CONFERENCE_MAIN.CM_COUNTRY_CODE CM_COUNTRY_CODE,CM_COUNTRY_DESC,
        TO_CHAR(CM_DATE_FROM,'dd/mm/yyyy') CM_DATE_FROM2,TO_CHAR(CM_DATE_TO,'dd/mm/yyyy') CM_DATE_TO2,
        SM_STAFF_ID,SM_STAFF_NAME,TO_CHAR(SYSDATE,'dd/mm/yyyy') APPROVE_DATE,SCR_TNCA_REJECT_REMARK
        FROM STAFF_CONFERENCE_MAIN,CONFERENCE_MAIN,COUNTRY_MAIN,STATE_MAIN,STAFF_MAIN APPROVER,STAFF_CONFERENCE_REP
        WHERE SCM_REFID = CM_REFID
        AND APPROVER.SM_STAFF_ID = UPPER('$rjc_by')
        AND SCM_STAFF_ID = UPPER('$staff_id')
        AND SM_STATE_CODE(+) = CM_STATE
        AND COUNTRY_MAIN.CM_COUNTRY_CODE(+) = CONFERENCE_MAIN.CM_COUNTRY_CODE
        AND CM_REFID = '$refid'
        AND SCM_REFID = SCR_REFID
        AND SCM_STAFF_ID = SCR_STAFF_ID";

        $q = $this->db->query($query);
        return $q->row();
    }

    // GET HOD
    public function getHod($staff_id) {
        $query = "SELECT DISTINCT DM_DIRECTOR
        FROM DEPARTMENT_MAIN,STAFF_MAIN
        WHERE SM_DEPT_CODE = DM_DEPT_CODE
        AND SM_STAFF_ID = '$staff_id'";

        $q = $this->db->query($query);
        return $q->row();
    }

    // AMEND CONFERENCE REPORT
    public function amendApproveConferenceReport($refid, $staff_id, $app_amd_remark, $app_amd_by, $app_amd_date, $repSts)
    { 
        $data = array(
            "SCR_STATUS" => $repSts,
            "SCR_TNCA_REMARK1" => $app_amd_remark,
            "SCR_TNCA_VERIFY_BY" => $app_amd_by
        );

        if(!empty($app_amd_date)) {
            $app_amd_date = "to_date('".$app_amd_date."', 'DD/MM/YYYY')";
            $this->db->set("SCR_TNCA_VERIFY_DATE", $app_amd_date, false);
        }

        $this->db->where("SCR_REFID", $refid);
        $this->db->where("SCR_STAFF_ID", $staff_id);

        return $this->db->update("STAFF_CONFERENCE_REP", $data);
    }

    // CONTENT AMEND / APPROVE MEMO DETAILS
    public function getAmdAppRepMemContent($refid, $staff_id, $app_amd_by) {

        $query = "SELECT DISTINCT SCM_REFID,CM_NAME,CM_ADDRESS,CM_POSTCODE,CM_CITY,
        CM_STATE,SM_STATE_DESC,CONFERENCE_MAIN.CM_COUNTRY_CODE CM_COUNTRY_CODE,CM_COUNTRY_DESC,
        TO_CHAR(CM_DATE_FROM,'dd/mm/yyyy') CM_DATE_FROM2,TO_CHAR(CM_DATE_TO,'dd/mm/yyyy') CM_DATE_TO2,
        SM_STAFF_ID,SM_STAFF_NAME,TO_CHAR(SYSDATE,'dd/mm/yyyy') APPROVE_DATE,SCR_TNCA_REMARK1
        FROM STAFF_CONFERENCE_MAIN,CONFERENCE_MAIN,COUNTRY_MAIN,STATE_MAIN,STAFF_MAIN APPROVER,STAFF_CONFERENCE_REP
        WHERE SCM_REFID = CM_REFID
        AND APPROVER.SM_STAFF_ID = UPPER('$app_amd_by')
        AND SCM_STAFF_ID = UPPER('$staff_id')
        AND SM_STATE_CODE(+) = CM_STATE
        AND COUNTRY_MAIN.CM_COUNTRY_CODE(+) = CONFERENCE_MAIN.CM_COUNTRY_CODE
        AND CM_REFID = '$refid'
        AND SCM_REFID = SCR_REFID
        AND SCM_STAFF_ID = SCR_STAFF_ID";

        $q = $this->db->query($query);
        return $q->row();
    }

}