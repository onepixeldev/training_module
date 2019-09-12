<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cpd_model extends MY_Model
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        $this->load->database();
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
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

    public function getCurDate() {		
        $this->db->select("TO_CHAR(SYSDATE, 'MM') AS SYSDATE_MM, TO_CHAR(SYSDATE, 'YYYY') AS SYSDATE_YYYY");
        $this->db->from("DUAL");
        $q = $this->db->get();
                
        return $q->row();
    } 
    
    /*===============================================================
       CPD SETUP (ATF098)
    ================================================================*/

    // CPD CATEGORYLIST
    public function cpdCategoryList($code = null)
    {
        $this->db->select("CC_CATEGORY_CODE, CC_CATEGORY_DESC, CC_STATUS, 
        CASE CC_STATUS
            WHEN 'Y' THEN 'Active'
            WHEN 'N' THEN 'Inactive'
        END AS CC_STATUS_DESC,
        CC_CATEGORY_CODE||' - '||CC_CATEGORY_DESC CC_CATEGORY_CODE_DESC");
        $this->db->from("CPD_CATEGORY");

        if(!empty($code)) {
            $this->db->where("CC_CATEGORY_CODE", $code);
            $q = $this->db->get();
        
            return $q->row();
        } else {
            $q = $this->db->get();
    
            return $q->result();
        }
    }

    // CPD POINT
    public function cpdPointList($sYear, $cp_scheme = null)
    {
        $this->db->select("CP_SCHEME, CP_RANK, CP_CPD_LAYAK, CP_CPD_KHUSUS_MIN, CP_CPD_UMUM_MIN,CP_UMUM_MANDATORY, CP_CPD_TERAS_MIN, CP_LNPT_WEIGHTAGE, SOG_GROUP_DESC");
        $this->db->join("SERVICE_ORG_GROUP", "SOG_GROUP_CODE = CP_SCHEME");
        $this->db->from("CPD_POINT");
        if(!empty($sYear)) {
            $this->db->where("CP_YEAR", $sYear);
            // $this->db->where("(:year_year is null and cp_year =to_char(sysdate,'yyyy')) or (:year_year is not null and  cp_year =:year_year");
        } else {
            $this->db->where("CP_YEAR = TO_CHAR(SYSDATE,'YYYY')");
        }   
        
        if(!empty($cp_scheme)) {
            $this->db->where("CP_SCHEME", $cp_scheme);

            $q = $this->db->get();
        
            return $q->row();
        } else {
            $this->db->order_by("CP_RANK");
            $q = $this->db->get();
        
            return $q->result();
        }
    }

    // SECTOR LIST
    public function sectorList()
    {   
        $this->db->distinct();
        $this->db->select("SC_CLASS_SECTOR");
        $this->db->from("SERVICE_CLASSIFICATION");
        $this->db->where("SC_CLASS_SECTOR IS NOT NULL");
        $q = $this->db->get();
    
        return $q->result();
    }

    // COORDINATOR LIST
    public function coorList($role, $sector, $rowid = null)
    {
        $this->db->select("ROWIDTOCHAR(CPD_USER_LEVEL.ROWID) ROWIDCHAR, CUL_STAFF_ID, SM_STAFF_NAME, CUL_ROLE, CUL_ROLE_PANEL, CUL_ROLE_DEPT1, CUL_ROLE_DEPT1||' - '||DM1.DM_DEPT_DESC DEPT_CODE_DESC1, CUL_ROLE_DEPT2, CUL_ROLE_DEPT2||' - '||DM2.DM_DEPT_DESC DEPT_CODE_DESC2, CUL_ROLE_DEPT3, CUL_ROLE_DEPT3||' - '||DM3.DM_DEPT_DESC DEPT_CODE_DESC3");
        $this->db->from("CPD_USER_LEVEL");
        $this->db->join("STAFF_MAIN", "CUL_STAFF_ID = SM_STAFF_ID");
        $this->db->join("DEPARTMENT_MAIN DM1", "CUL_ROLE_DEPT1 = DM1.DM_DEPT_CODE", "LEFT");
        $this->db->join("DEPARTMENT_MAIN DM2", "CUL_ROLE_DEPT2 = DM2.DM_DEPT_CODE", "LEFT");
        $this->db->join("DEPARTMENT_MAIN DM3", "CUL_ROLE_DEPT3 = DM3.DM_DEPT_CODE", "LEFT");

        if(!empty($role)) {
            $this->db->where("CUL_ROLE", $role); 
        }
        
        if(!empty($sector)) {
            $this->db->where("CUL_ROLE_PANEL ", $sector); 
        }

        if(!empty($rowid)) {
            $this->db->where("CPD_USER_LEVEL.ROWID = CHARTOROWID('$rowid')");

            $q = $this->db->get();
            return $q->row();
        } else {
            $q = $this->db->get();
            return $q->result();
        }
    }

    // SAVE CPD CATEGORY
    public function saveCpdCategory($form)
    {
        $data = array(
            "CC_CATEGORY_CODE" => $form['code'],
            "CC_CATEGORY_DESC" => $form['description'],
            "CC_STATUS" => $form['status']
        );

        return $this->db->insert("CPD_CATEGORY", $data);
    }

    // SAVE UPDATE CPD CATEGORY
    public function saveUpdCpdCategory($form, $code)
    {
        $data = array(
            "CC_CATEGORY_DESC" => $form['description'],
            "CC_STATUS" => $form['status']
        );

        $this->db->where("CC_CATEGORY_CODE", $code);

        return $this->db->update("CPD_CATEGORY", $data);
    }

    // DEPT LIST DD
    public function getDeptList()
    {   
        $this->db->distinct();
        $this->db->select("DM_DEPT_CODE, DM_DEPT_DESC, DM_DEPT_CODE||' - '||DM_DEPT_DESC DM_DEPT_CODE_DESC");
        $this->db->from("DEPARTMENT_MAIN");
        $this->db->where("DM_LEVEL != 3");
        $this->db->where("DM_STATUS = 'ACTIVE'");
        $this->db->order_by("DM_DEPT_CODE");
        $q = $this->db->get();
    
        return $q->result();

        // select distinct dm_dept_code, dm_dept_desc from department_main where dm_level <> 3 and dm_status = 'ACTIVE' order by dm_dept_code
    }

    // SAVE CPD COORDINATOR
    public function saveCpdCoor($form)
    {
        $data = array(
            "CUL_STAFF_ID" => strtoupper($form['staff_id']),
            "CUL_ROLE" => $form['role'],
            "CUL_ROLE_PANEL" => $form['role_panel'],
            "CUL_ROLE_DEPT1" => $form['department_1'],
            "CUL_ROLE_DEPT2" => $form['department_2'],
            "CUL_ROLE_DEPT3" => $form['department_3']
        );

        return $this->db->insert("CPD_USER_LEVEL", $data);
    }

    // SAVE UPDATE CPD COORDINATOR
    public function saveUpdCpdCoor($form)
    {
        $rowid = $form['row_id'];

        $data = array(
            "CUL_STAFF_ID" => strtoupper($form['staff_id']),
            "CUL_ROLE" => $form['role'],
            "CUL_ROLE_PANEL" => $form['role_panel'],
            "CUL_ROLE_DEPT1" => $form['department_1'],
            "CUL_ROLE_DEPT2" => $form['department_2'],
            "CUL_ROLE_DEPT3" => $form['department_3']
        );

        $this->db->where("ROWID = CHARTOROWID('$rowid')");

        return $this->db->update("CPD_USER_LEVEL", $data);
    }

    // DELETE CPD COORDINATOR
    public function deleteCpdCoor($rowid) {
        $this->db->where("ROWID = CHARTOROWID('$rowid')");
        return $this->db->delete("CPD_USER_LEVEL");
    }

    // COUNT STAFF HEAD CPD POINT
    public function countStaffCpdPointHead($cp_scheme, $cp_year)
    {  
        $this->db->select("COUNT(*) AS COUNT_STAFF");
        $this->db->from("STAFF_CPD_HEAD");
        $this->db->where("SCH_TAHUN", $cp_year);
        $this->db->where("SCH_KUMP", $cp_scheme);
        $q = $this->db->get();
    
        return $q->row();
    }

    // DELETE CPD POINT
    public function deleteCpdPoint($cp_scheme, $cp_year) {
        $this->db->where("CP_YEAR", $cp_year);
        $this->db->where("CP_SCHEME", $cp_scheme);
        return $this->db->delete("CPD_POINT");
    }

    // SCHEME LIST
    public function getSchemeList()
    {  
        $this->db->distinct();
        $this->db->select("SS_SERVICE_KUMPP, SOG_GROUP_DESC, SS_SERVICE_KUMPP||' - '||SOG_GROUP_DESC AS SS_SERVICE_KUMPP_DESC");
        $this->db->from("SERVICE_SCHEME, SERVICE_ORG_GROUP");
        $this->db->where("SS_SERVICE_KUMPP = SOG_GROUP_CODE");
        $this->db->order_by("SS_SERVICE_KUMPP DESC");
        $q = $this->db->get();
    
        return $q->result();
    }

    // SAVE CPD POINT
    public function saveCpdPoint($form)
    {
        $data = array(
            "CP_SCHEME" => $form['scheme'],
            "CP_YEAR" => $form['cp_year'],
            "CP_CPD_LAYAK" => $form['compulsory_cpd'],
            "CP_CPD_KHUSUS_MIN" => $form['minimum_cpd_khusus'],
            "CP_CPD_UMUM_MIN" => $form['minimum_cpd_umum'],
            "CP_UMUM_MANDATORY" => $form['cpd_umum_compulsory'],
            "CP_CPD_TERAS_MIN" => $form['minimum_cpd_teras'],
            "CP_LNPT_WEIGHTAGE" => $form['lnpt_weightage'],
            "CP_RANK" => $form['rank']
        );

        return $this->db->insert("CPD_POINT", $data);
    }

    // SAVE UPDATE CPD POINT
    public function saveUpdCpdPoint($form)
    {
        $data = array(
            "CP_CPD_LAYAK" => $form['compulsory_cpd'],
            "CP_CPD_KHUSUS_MIN" => $form['minimum_cpd_khusus'],
            "CP_CPD_UMUM_MIN" => $form['minimum_cpd_umum'],
            "CP_UMUM_MANDATORY" => $form['cpd_umum_compulsory'],
            "CP_CPD_TERAS_MIN" => $form['minimum_cpd_teras'],
            "CP_LNPT_WEIGHTAGE" => $form['lnpt_weightage'],
            "CP_RANK" => $form['rank']
        );

        $this->db->where("CP_SCHEME", $form['scheme']);
        $this->db->where("CP_YEAR", $form['cp_year']);

        return $this->db->update("CPD_POINT", $data);
    }

    // POPULATE DEPARTMENT
    public function generateStaff($cp_scheme, $cp_year) { 

        $query = "SELECT SM_STAFF_ID, SM_DEPT_CODE, SS_ACADEMIC, SS_CLASS_CODE
        FROM STAFF_MAIN, STAFF_SERVICE, STAFF_STATUS, SERVICE_SCHEME, DEPARTMENT_MAIN, TITLE_MAIN, SERVICE_GROUP
        WHERE SM_JOB_CODE = SS_SERVICE_CODE
        AND SS_STAFF_ID = SM_STAFF_ID
        AND SM_DEPT_CODE=DM_DEPT_CODE
        AND SM_STAFF_STATUS = SS_STATUS_CODE
        AND SM_STAS_TITLE=TM_TITLE_CODE
        AND SS_SERVICE_GROUP = SG_GROUP_CODE
        AND SS_SERVICE_GROUP IS NOT NULL
        AND SS_STATUS_STS = 'ACTIVE'
        AND SM_STAFF_TYPE = 'STAFF'
        AND SS_JOB_STATUS<>'02'
        AND SM_STAFF_ID NOT IN (SELECT SSLH_STAFF_ID STAFF_ID
        FROM STAFF_STUDY_LEAVE_HEAD,STAFF_MAIN SM2,TITLE_MAIN, STUDY_LEAVE_TYPE,STAFF_STATUS
        WHERE SM2.SM_STAFF_ID = SSLH_STAFF_ID
        AND SM2.SM_STAS_TITLE = TM_TITLE_CODE
        AND SSLH_PROGRAM_TYPE = SLT_CODE
        AND SM_STAFF_STATUS = SS_STATUS_CODE
        AND SS_STATUS_STS = 'ACTIVE'
        AND SM_STAFF_TYPE = 'STAFF'
        AND SLT_TYPE = 'FULL_TIME'
        AND SSLH_STATUS='APPROVE'
        AND TRIM(UPPER(NVL(SSLH_REP_DUTY_STATUS,'N'))) <> TRIM(UPPER('Lapor Diri'))
        AND TRIM(UPPER(NVL(SSLH_COMPLETE,'N'))) = 'N'
        AND TRIM(UPPER(NVL(SSLH_CLOSE_FILE,'N'))) = 'N'
        AND ((SYSDATE BETWEEN SSLH_DATE_FROM AND SSLH_DATE_TO)
        OR (SYSDATE  BETWEEN SSLH_EXTEND1_DATE_FROM AND SSLH_EXTEND1_DATE_TO)
        OR (SYSDATE  BETWEEN SSLH_EXTEND2_DATE_FROM AND SSLH_EXTEND2_DATE_TO)
        OR (SYSDATE  BETWEEN SSLH_EXTEND3_DATE_FROM AND SSLH_EXTEND3_DATE_TO)
        OR SYSDATE  <= SSLH_MAX_DATE_TO
        OR SYSDATE  <= SSLH_REP_DUTY_DATE))
        AND SS_SERVICE_KUMPP = '$cp_scheme'
        AND SM_STAFF_ID NOT IN (SELECT SCH_STAFF_ID FROM STAFF_CPD_HEAD WHERE SCH_TAHUN = '$cp_year' AND SCH_KUMP = '$cp_scheme' AND SCH_STAFF_ID = SM_STAFF_ID)";

        $q = $this->db->query($query);
        return $q->result();
    }

    // INSERT GENERATE STAFF CPD HEAD
    public function insStaffCpdHead($cp_scheme, $cp_year, $sid, $class_code, $dept_code, $aca, $cp_cpd_layak, $cp_cpd_khusus_min, $cp_cpd_umum_min, $cp_cpd_teras_min, $cp_lnpt_weightage)
    {
        $curDate = 'SYSDATE';
        $curUsr = $this->staff_id;

        $data = array(
            "SCH_TAHUN" => $cp_year,
            "SCH_STAFF_ID" => $sid, 
            "SCH_SCHEME" => $class_code, 
            "SCH_KUMP" => $cp_scheme, 
            "SCH_CPD_LAYAK" => $cp_cpd_layak, 
            "SCH_JUM_KHUSUS" => 0, 
            "SCH_JUM_UMUM" => 0,
            "SCH_JUM_TERAS" => 0, 
            "SCH_JUM_CPD" => 0, 
            "SCH_JUM_KHUSUS_MIN" => $cp_cpd_khusus_min, 
            "SCH_JUM_UMUM_MIN" => $cp_cpd_umum_min, 
            "SCH_JUM_TERAS_MIN" => $cp_cpd_teras_min,      
            "SCH_PEMBERAT_LPP" => $cp_lnpt_weightage, 
            "SCH_PERATUS_LPP" => 0, 
            "SCH_CREATE_BY" => $curUsr, 
            // "SCH_CREATE_DATE" => sysdate, 
            "SCH_DEPT_CODE" => $dept_code, 
            "SCH_PRORATE_SERVICE" => 12, 
            "SCH_ACADEMIC" => $aca
        );

        $this->db->set("SCH_CREATE_DATE", $curDate, false);

        return $this->db->insert("STAFF_CPD_HEAD", $data);
    }

    // GET CPD STAFF HEAD
    public function getUpdCpdStaff($cp_scheme, $cp_year)
    {  
        $this->db->select("SCH_STAFF_ID, SCH_PRORATE_SERVICE");
        $this->db->from("STAFF_CPD_HEAD");
        $this->db->where("SCH_TAHUN", $cp_year);
        $this->db->where("SCH_KUMP", $cp_scheme);
        $q = $this->db->get();
    
        return $q->result();
    }

    // UPDATE STAFF CPD HEAD
    public function updStaffCpdHead($cp_scheme, $cp_year, $sid, $sch_jum_khusus_min, $sch_jum_umum_min, $sch_jum_teras_min, $sch_pemberat_lpp)
    {
        $data = array(
            "SCH_JUM_KHUSUS_MIN" => $sch_jum_khusus_min,
            "SCH_JUM_UMUM_MIN" => $sch_jum_umum_min, 
            "SCH_JUM_TERAS_MIN" => $sch_jum_teras_min, 
            "SCH_PEMBERAT_LPP" => $sch_pemberat_lpp
        );

        $this->db->where("SCH_TAHUN", $cp_year);
        $this->db->where("SCH_KUMP", $cp_scheme);
        $this->db->where("SCH_STAFF_ID", $sid);

        return $this->db->update("STAFF_CPD_HEAD", $data);
    }

    // GET LEVEL DROPDOWN
    public function getLevelList() {
        $this->db->select("TL_CODE, TL_DESC, TL_CODE||' - '||TL_DESC AS TL_CODE_DESC");
        $this->db->from("TRAINING_LEVEL");
        $this->db->order_by("TL_CODE");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // SAVE CONFERENCE DETL CPD
    public function saveConDetlCpd($form)
    {
        $data = array(
            "CM_LEVEL" => $form['level']
        );

        $this->db->where("CM_REFID", $form['refid']);

        return $this->db->update("CONFERENCE_MAIN", $data);
    }

    // CONFERENCE CPD SETUP BTN
    public function getCrCpdDetl($refid)
    {  
        $this->db->select("*");
        $this->db->from("CPD_HEAD");
        $this->db->where("CH_TRAINING_REFID", $refid);
        $q = $this->db->get();
    
        return $q->row();
    }

    // SAVE UPD CONFERENCE CPD SETUP
    public function saveConCpdSetup($form)
    {
        if(empty($form['report_submission'])) {
            $form['report_submission'] = 'N';
        }

        if(empty($form['compulsory'])) {
            $form['compulsory'] = 'N';
        }

        $data = array(
            "CH_COMPETENCY" => $form['competency'],
            "CH_CATEGORY" => $form['category'],
            "CH_MARK" => $form['mark'],
            "CH_REPORT_SUBMISSION" => $form['report_submission'],
            "CH_COMPULSORY" => $form['compulsory'],
        );

        $this->db->where("CH_TRAINING_REFID", $form['refid']);

        return $this->db->update("CPD_HEAD", $data);
    }

    // SAVE INS CONFERENCE CPD SETUP
    public function insConCpdSetup($form)
    {
        if(empty($form['report_submission'])) {
            $form['report_submission'] = 'N';
        }

        if(empty($form['compulsory'])) {
            $form['compulsory'] = 'N';
        }

        $data = array(
            "CH_TRAINING_REFID" => $form['refid'],
            "CH_COMPETENCY" => $form['competency'],
            "CH_CATEGORY" => $form['category'],
            "CH_MARK" => $form['mark'],
            "CH_REPORT_SUBMISSION" => $form['report_submission'],
            "CH_COMPULSORY" => $form['compulsory'],
        );

        return $this->db->insert("CPD_HEAD", $data);
    }

    // DELETE CONFERENCE CPD SETUP
    public function delConCpdSetup($refid) {
        $this->db->where("CH_TRAINING_REFID", $refid);
        return $this->db->delete("CPD_HEAD");
    }

    // STAFF CPD MARK LIST
    public function staffCpdMarkList($refid) { 

        $query = "SELECT SCM_REFID, SCM_STAFF_ID, SM_STAFF_NAME, SCM_PARTICIPANT_ROLE,
        CASE SCM_STATUS 
            WHEN 'APPLY' THEN 'Permohonan'
            WHEN 'VERIFY_TNCA' THEN 'Disokong'
            WHEN 'VERIFY_VC' THEN 'Diperakukan'
            WHEN 'APPROVE' THEN 'Diluluskan'
            WHEN 'REJECT' THEN 'Ditolak'
            ELSE 'Dibatalkan'
        END STATUS_PMP,

        (CASE  
        WHEN SCR_APPLY_DATE2 IS NULL THEN 
            (
                CASE SCM_STATUS
                    WHEN 'REJECT' THEN '(PMP Ditolak)'
                    WHEN 'CANCEL' THEN '(PMP Dibatalkan)'
                    ELSE '(Belum Hantar LMP)'
                END  
            )
        ELSE 
            (
                CASE SCR_STATUS
                    WHEN 'VERIFY_TNCA' THEN SCR_APPLY_DATE2||' (Telah diperakukan)'
                    ELSE SCR_APPLY_DATE2||' (Belum diperakukan)'
                END  
            )
        END) STATUS_LMP,
        SCM_CPD_MARK, SCM_CPD_COMPETENCY 
        FROM(
        SELECT SCM_REFID, SCM_STAFF_ID, SM_STAFF_NAME, SCM_PARTICIPANT_ROLE, SCM_STATUS,
        SCM_CPD_MARK, SCM_CPD_COMPETENCY
        FROM STAFF_CONFERENCE_MAIN
        LEFT JOIN STAFF_MAIN ON SCM_STAFF_ID = SM_STAFF_ID
        WHERE SCM_REFID = '$refid')
        LEFT JOIN (
        SELECT SCR_REFID, SCR_STAFF_ID, TO_CHAR(SCR_APPLY_DATE,'dd/mm/yyyy') AS SCR_APPLY_DATE2, SCR_STATUS
        FROM STAFF_CONFERENCE_REP 
        WHERE SCR_REFID = '$refid'
        ) ON SCM_REFID = SCR_REFID AND SCR_STAFF_ID = SCM_STAFF_ID";

        $q = $this->db->query($query);
        return $q->result();
    }

    // STAFF CPD LIST
    public function getStaffCrCpd($refid) { 

        $query = "SELECT SCM_STAFF_ID, SCM_REFID
        FROM STAFF_CONFERENCE_MAIN ,CONFERENCE_MAIN, STAFF_CONFERENCE_REP, CPD_HEAD
        WHERE SCM_REFID = CM_REFID
        AND SCM_STAFF_ID = SCR_STAFF_ID(+)
        AND SCM_REFID = SCR_REFID(+)
        AND CH_TRAINING_REFID = CM_REFID
        AND TO_CHAR(CM_DATE_TO,'yyyy') = TO_CHAR(SYSDATE,'YYYY')
        AND SCM_STATUS = 'APPROVE'
        AND ((CH_REPORT_SUBMISSION = 'N')
        OR (CH_REPORT_SUBMISSION='Y' AND SCR_STATUS = 'VERIFY_TNCA'))
        AND SCM_REFID = '$refid'";

        $q = $this->db->query($query);
        return $q->result();
    }

    // UPDATE GENERATE CPD
    public function generateCpd($refid2, $sid, $competency, $mark)
    {
        $data = array(
            "SCM_CPD_COMPETENCY" => $competency,
            "SCM_CPD_MARK" => $mark
        );

        $this->db->where("SCM_STAFF_ID", $sid);
        $this->db->where("SCM_REFID", $refid2);
        $this->db->where("SCM_CPD_MARK IS NULL");

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
    }

    // CPD POINT INFO
    public function getCpdPointInfo($sid)
    {  
        $this->db->select("SCH_JUM_CPD, SCH_CPD_LAYAK, CP_LNPT_WEIGHTAGE, SCH_JUM_KHUSUS_MIN, SCH_JUM_UMUM_MIN, SCH_JUM_KHUSUS, SCH_JUM_UMUM, SCH_JUM_TERAS_MIN, SCH_JUM_TERAS, CP_UMUM_MANDATORY, SCH_PRORATE_SERVICE");
        $this->db->from("STAFF_CPD_HEAD, CPD_POINT");
        $this->db->where("SCH_TAHUN = CP_YEAR");
        $this->db->where("SCH_KUMP = CP_SCHEME");
        $this->db->where("SCH_TAHUN = TO_CHAR(SYSDATE,'YYYY')");
        $this->db->where("SCH_STAFF_ID", $sid);
        // $this->db->where("SCH_STAFF_ID = 'K02284'");
        $q = $this->db->get();
    
        return $q->row();
    }

    // JKHU/JUMUM/JTERAS
    public function getTtlReqCpd($sid, $sys_yyyy, $comp) {
		$req_cpd = null;
		
		$sql = oci_parse($this->db->conn_id, "begin :bindOutput1 := CPD.total_required_cpd(:bind1,:bind2,:bind3); end;");
		oci_bind_by_name($sql, ":bind1", $sid, 10);	        //IN
		oci_bind_by_name($sql, ":bind2", $sys_yyyy, 4);			//IN
		oci_bind_by_name($sql, ":bind3", $comp, 6);			//IN
		oci_bind_by_name($sql, ":bindOutput1", $req_cpd, 4);				//OUT
		oci_execute($sql, OCI_DEFAULT); 
		
        $data = array(
            'REQ_CPD' => $req_cpd
        );
		
		return $data;	
    }

    // TOTAL CPD BY COMPETENCY
    public function getTtlCpdByCom($sid, $sys_yyyy, $comp) {
		$total = null;
		
		$sql = oci_parse($this->db->conn_id, "begin :bindOutput1 := CPD.total_cpd_by_competency(:bind1,:bind2,:bind3); end;");
		oci_bind_by_name($sql, ":bind1", $sid, 10);	        //IN
		oci_bind_by_name($sql, ":bind2", $sys_yyyy, 4);			//IN
		oci_bind_by_name($sql, ":bind3", $comp, 6);			//IN
		oci_bind_by_name($sql, ":bindOutput1", $total, 4);				//OUT
		oci_execute($sql, OCI_DEFAULT); 
		
        $data = array(
            'TTL_CPD' => $total
        );
		
		return $data;	
    }

    // UPDATE LNPT INFO
    public function updLnptInfo($sid, $jkhu, $jumum, $jteras, $jum_cpd, $lnptweightage, $res, $sys_yyyy)
    {
        if(empty($jkhu)) {
            $jkhu = 0;
        }

        if(empty($jumum)) {
            $jumum = 0;
        }

        if(empty($jteras)) {
            $jteras = 0;
        }

        if(empty($jum_cpd)) {
            $jum_cpd = 0;
        }

        $res2 = round($res, 2);

        $data = array(
            "SCH_JUM_KHUSUS" => $jkhu,
            "SCH_JUM_UMUM" => $jumum,
            "SCH_JUM_TERAS" => $jteras,
            "SCH_JUM_CPD" => $jum_cpd,
            "SCH_PEMBERAT_LPP" => $lnptweightage,
            "SCH_PERATUS_LPP" => $res2,
        );

        $this->db->where("SCH_STAFF_ID", $sid);
        $this->db->where("SCH_TAHUN", $sys_yyyy);

        return $this->db->update("STAFF_CPD_HEAD", $data);
    }

    // STAFF CPD DETL
    public function getStaffCpdDetl($refid, $staff_id)
    {  
        $this->db->select("SCM_REFID, SCM_STAFF_ID, SCM_CPD_MARK, SCM_CPD_COMPETENCY");
        $this->db->from("STAFF_CONFERENCE_MAIN");
        $this->db->where("SCM_REFID", $refid);
        $this->db->where("SCM_STAFF_ID", $staff_id);
        $q = $this->db->get();
    
        return $q->row();
    }

    // SAVE CPD INFO STAFF
    public function saveStaffUpdateCpd($form)
    {
        $data = array(
            "SCM_CPD_COMPETENCY" => $form['competency'],
            "SCM_CPD_MARK" => $form['mark']
        );

        $this->db->where("SCM_STAFF_ID", $form['staff_id']);
        $this->db->where("SCM_REFID", $form['refid']);

        return $this->db->update("STAFF_CONFERENCE_MAIN", $data);
    }
}