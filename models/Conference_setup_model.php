<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conference_setup_model extends MY_Model
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
       CONFERENCE SETUP - ASF032
    =============================================================*/

    // CONFERENCE CATEGORY LIST
    public function getConferenceCat($ccCode = null)
    {
        $this->db->select("CC_CODE, CC_DESC, CC_RM_AMOUNT_FROM, CC_RM_AMOUNT_TO,
                            CASE 
                                WHEN CC_HEAD_RECOMMEND = 'Y' THEN 'Yes'
                                WHEN CC_HEAD_RECOMMEND = 'N' THEN 'No'
                            END
                            CC_HEAD_RECOMMEND, 
                            CASE 
                                WHEN CC_TNCA_APPROVE = 'Y' THEN 'Yes'
                                WHEN CC_TNCA_APPROVE = 'N' THEN 'No'
                            END
                            CC_TNCA_APPROVE, 
                            CASE 
                                WHEN CC_VC_APPROVE = 'Y' THEN 'Yes'
                                WHEN CC_VC_APPROVE = 'N' THEN 'No'
                            END
                            CC_VC_APPROVE, 
                            CASE 
                                WHEN CC_STATUS = 'Y' THEN 'Yes'
                                WHEN CC_STATUS = 'N' THEN 'No'
                            END
                            CC_STATUS");
        $this->db->from("CONFERENCE_CATEGORY");

        if(!empty($ccCode)) {
            $this->db->where("CC_CODE", $ccCode);
            $q = $this->db->get();
            
            return $q->row();
        } else {
            $this->db->order_by("CC_STATUS, CC_RM_AMOUNT_FROM");
            $q = $this->db->get();
            
            return $q->result();
        }
    }

    // SAVE CONFERENCE CATEGORY
    public function saveConferenceCat($form)
    {
        $data = array(
            "CC_CODE" => $form['code'],
            "CC_DESC" => $form['category'],
            "CC_RM_AMOUNT_FROM" => $form['from'],
            "CC_RM_AMOUNT_TO" => $form['to'],
            "CC_HEAD_RECOMMEND" => $form['head_recommend'],
            "CC_TNCA_APPROVE" => $form['tnc_approve'],
            "CC_VC_APPROVE" => $form['vc_approve'],
            "CC_STATUS" => $form['status']
        );

        return $this->db->insert("CONFERENCE_CATEGORY", $data);
    }

    // GET CONFERENCE DETL
    public function getConferenceDetl($ccCode)
    {
        $this->db->select("*");
        $this->db->from("CONFERENCE_CATEGORY");
        $this->db->where("CC_CODE", $ccCode);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SAVE UPDATE CONFERENCE CATEGORY
    public function saveEditConferenceCat($form)
    {
        $data = array(
            "CC_DESC" => $form['category'],
            "CC_RM_AMOUNT_FROM" => $form['from'],
            "CC_RM_AMOUNT_TO" => $form['to'],
            "CC_HEAD_RECOMMEND" => $form['head_recommend'],
            "CC_TNCA_APPROVE" => $form['tnc_approve'],
            "CC_VC_APPROVE" => $form['vc_approve'],
            "CC_STATUS" => $form['status']
        );

        $this->db->where("CC_CODE", $form['code']);

        return $this->db->update("CONFERENCE_CATEGORY", $data);
    }

    // CHECK CONFERENCE CATEGORY CHILD RECORD
    public function checkChildRec($ccCode)
    {
        $this->db->select("*");
        $this->db->from("STAFF_CONFERENCE_MAIN");
        $this->db->where("SCM_CATEGORY_CODE", $ccCode);
        $q = $this->db->get();
        
        return $q->row();
    }

    // DELETE CONFERENCE CATEGORY
    public function deleteConferenceCategory($ccCode) 
    {
        $this->db->where('CC_CODE', $ccCode);
        return $this->db->delete("CONFERENCE_CATEGORY");
    }
    
    // GET HRADMIN_PARMS
    public function getHpParmConSet($parmCode)
    {
        $this->db->select("*");
        $this->db->from("HRADMIN_PARMS");
        $this->db->where("HP_PARM_CODE", $parmCode);
        $q = $this->db->get();
        
        if($parmCode == 'CONFERENCE_ADMIN_EMAIL' || $parmCode == 'CONFERENCE_ADMIN_EXT') {
            return $q->result();
        } else {
            return $q->row();
        }
    }

    // SAVE UPDATE CONFERENCE SETUP
    public function saveConferenceSet($parmCode, $parmDesc)
    {
        $data = array(
            "HP_PARM_DESC" => $parmDesc,
        );

        $this->db->where("HP_PARM_CODE", $parmCode);

        return $this->db->update("HRADMIN_PARMS", $data);
    }

    // SAVE INSERT CONFERENCE SETUP / STAFF CONTACT INFO
    public function saveInsConSet($parmCode, $parmDesc)
    {
        if ($parmCode == 'CONFERENCE_ADMIN_EMAIL') {
            $parmNo = "(SELECT CASE 
                        WHEN HP_PARM_NO IS NULL THEN 1
                        WHEN HP_PARM_NO IS NOT NULL THEN HP_PARM_NO
                        END AS HP_PARM_NO
                        FROM(
                        SELECT MAX(HP_PARM_NO)+1 AS HP_PARM_NO
                        FROM HRADMIN_PARMS
                        WHERE HP_PARM_CODE = 'CONFERENCE_ADMIN_EMAIL'))";
        } 
        elseif ($parmCode == 'CONFERENCE_ADMIN_EXT') {
            $parmNo = "(SELECT CASE 
                        WHEN HP_PARM_NO IS NULL THEN 1
                        WHEN HP_PARM_NO IS NOT NULL THEN HP_PARM_NO
                        END AS HP_PARM_NO
                        FROM(
                        SELECT MAX(HP_PARM_NO)+1 AS HP_PARM_NO
                        FROM HRADMIN_PARMS
                        WHERE HP_PARM_CODE = 'CONFERENCE_ADMIN_EXT'))";
        }
        
        $data = array(
            "HP_PARM_CODE" => $parmCode,
            "HP_PARM_DESC" => $parmDesc
        );

        $this->db->set("HP_PARM_NO", $parmNo, false);

        return $this->db->insert("HRADMIN_PARMS", $data);
    }

    // DELETE CONFERENCE SETUP OVERSEA / STAFF CONTACT INFO
    public function deleteConSet($parmCode, $parmNo) 
    {
        $this->db->where('HP_PARM_CODE', $parmCode);
        $this->db->where('HP_PARM_NO', $parmNo);
        return $this->db->delete("HRADMIN_PARMS");
    }

    // STAFF ADMIN HIERARCHY LIST
    public function getStfAdminHier()
    {
        $this->db->select("CAH_ADMIN_CODE, APM_DESC, 
                            CASE 
                                WHEN CAH_APPROVE_TNCA = 'Y' THEN 'Yes'
                                WHEN CAH_APPROVE_TNCA = 'N' THEN 'No'
                            END
                            CAH_APPROVE_TNCA, 
                            CASE 
                                WHEN CAH_APPROVE_VC = 'Y' THEN 'Yes'
                                WHEN CAH_APPROVE_VC = 'N' THEN 'No'
                            END
                            CAH_APPROVE_VC, 
                            CASE 
                                WHEN CAH_STATUS = 'Y' THEN 'Yes'
                                WHEN CAH_STATUS = 'N' THEN 'No'
                            END
                            CAH_STATUS");
        $this->db->from("CONFERENCE_ADMIN_HIERARCHY");
        $this->db->join("ADMIN_POST_MAIN", "APM_CODE = CAH_ADMIN_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // CERTIFIED OFFICER FOR HEAD OF PTJ LIST
    public function getCerOfficer()
    {
        $this->db->select("CDH_DEPT_CODE, DM1.DM_DEPT_DESC AS DM_DEPT_DESC1,
                            CDH_PARENT_DEPT_CODE, DM2.DM_DEPT_DESC AS DM_DEPT_DESC2");
        $this->db->from("CONFERENCE_DEPT_HIERARCHY");
        $this->db->join("DEPARTMENT_MAIN DM1", "DM1.DM_DEPT_CODE = CDH_DEPT_CODE");
        $this->db->join("DEPARTMENT_MAIN DM2", "DM2.DM_DEPT_CODE = CDH_PARENT_DEPT_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // ADMIN CODE DD
    public function getAdmin()
    {
        $this->db->select("APM_CODE, APM_DESC, APM_CODE||' - '||APM_DESC AS APM_CODE_DESC");
        $this->db->from("ADMIN_POST_MAIN");
        $q = $this->db->get();
        
        return $q->result();
    }

    // STAFF ADMIN HIER DETL
    public function getStfAdminHierDetl($admCode)
    {
        $this->db->select("*");
        $this->db->from("CONFERENCE_ADMIN_HIERARCHY");
        $this->db->where("CAH_ADMIN_CODE", $admCode);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SAVE INSERT STAFF ADMIN HIER
    public function saveStfAdminHier($form)
    {
        $curDate = "SYSDATE";
        $curUsr = $this->staff_id;

        $data = array(
            "CAH_ADMIN_CODE" => $form['admin_code'],
            "CAH_APPROVE_TNCA" => $form['tnc_approve'],
            "CAH_APPROVE_VC" => $form['vc_approve'],
            "CAH_STATUS" => $form['status'],
            "CAH_UPDATE_BY" => $curUsr
        );

        $this->db->set("CAH_UPDATE_DATE", $curDate, false);

        return $this->db->insert("CONFERENCE_ADMIN_HIERARCHY", $data);
    }

    // DELETE STAFF ADMIN HIER
    public function deleteStfAdminHier($apmCode) 
    {
        $this->db->where('CAH_ADMIN_CODE', $apmCode);
        return $this->db->delete("CONFERENCE_ADMIN_HIERARCHY");
    }

    // SAVE UPDATE STAFF ADMIN HIER
    public function saveUpdStfAdminHier($form)
    {
        $adminCode = $form['admin_code'];
        $curDate = "SYSDATE";
        $curUsr = $this->staff_id;

        $data = array(
            "CAH_APPROVE_TNCA" => $form['tnc_approve'],
            "CAH_APPROVE_VC" => $form['vc_approve'],
            "CAH_STATUS" => $form['status'],
            "CAH_UPDATE_BY" => $curUsr
        );

        $this->db->set("CAH_UPDATE_DATE", $curDate, false);

        $this->db->where("CAH_ADMIN_CODE", $adminCode);
        return $this->db->update("CONFERENCE_ADMIN_HIERARCHY", $data);
    }

    // DEPERTMENT CONFERENCE DD
    public function getDeptCon()
    {
        $this->db->select("DM_DEPT_CODE, DM_DEPT_DESC, DM_DEPT_CODE||' - '||DM_DEPT_DESC AS DM_DEPT_CODE_DESC");
        $this->db->from("DEPARTMENT_MAIN");
        $this->db->where("NVL(DM_STATUS,'INACTIVE') = 'ACTIVE'
        AND DM_DEPT_CODE NOT IN (SELECT CDH_DEPT_CODE 
        FROM CONFERENCE_DEPT_HIERARCHY)");
        $this->db->order_by("DM_DEPT_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // PARENT DEPERTMENT CONFERENCE DD
    public function getParDeptCon()
    {
        $this->db->select("DM_DEPT_CODE, DM_DEPT_DESC, DM_DEPT_CODE||' - '||DM_DEPT_DESC AS DM_DEPT_CODE_DESC");
        $this->db->from("DEPARTMENT_MAIN");
        $this->db->where("NVL(DM_STATUS,'INACTIVE') = 'ACTIVE'
        AND DM_LEVEL IN (1,2)");
        $this->db->order_by("DM_DEPT_CODE");
        $q = $this->db->get();
        
        return $q->result();
    }

    // CERTIFIED OFFICER DETL
    public function getCerOfficerDetl($cdhCode)
    {
        $this->db->select("*");
        $this->db->from("CONFERENCE_DEPT_HIERARCHY");
        $this->db->where("CDH_DEPT_CODE", $cdhCode);
        $q = $this->db->get();
        
        return $q->row();
    }

    // SAVE INSERT CERTIFIED OFFICER
    public function saveCerOfficer($form)
    {
        $curDate = "SYSDATE";
        $curUsr = $this->staff_id;

        $data = array(
            "CDH_DEPT_CODE" => $form['department'],
            "CDH_PARENT_DEPT_CODE" => $form['parent_department'],
            "CDH_UPDATE_BY" => $curUsr,
        );

        $this->db->set("CDH_UPDATE_DATE", $curDate, false);

        return $this->db->insert("CONFERENCE_DEPT_HIERARCHY", $data);
    }

    // DELETE CERTIFIED OFFICER
    public function deleteCerOfficer($cdhCode) 
    {
        $this->db->where('CDH_DEPT_CODE', $cdhCode);
        return $this->db->delete("CONFERENCE_DEPT_HIERARCHY");
    }

    // SAVE UPDATE CERTIFIED OFFICER
    public function updateCerOfficer($form)
    {
        $cdhDept = $form['department'];
        $curDate = "SYSDATE";
        $curUsr = $this->staff_id;

        $data = array(
            "CDH_PARENT_DEPT_CODE" => $form['parent_department'],
            "CDH_UPDATE_BY" => $curUsr,
        );

        $this->db->set("CDH_UPDATE_DATE", $curDate, false);

        $this->db->where("CDH_DEPT_CODE", $cdhDept);
        return $this->db->update("CONFERENCE_DEPT_HIERARCHY", $data);
    }

    // NOTIFICATION SETUP
    public function getNotificationSetup()
    {
        $this->db->select("TMC_CODE, TMC_ADDRESS, TMC_LINK, TMC_TELNO, TMC_FAXNO, TMC_SEND_BY, TMC_STATUS");
        $this->db->from("TRAINING_MEMO_CONTENT");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = TMC_SEND_BY", "LEFT");
        $this->db->where("TMC_MODULE = 'CONFERENCE_REP'");
        $q = $this->db->get();
        
        return $q->row();
    }

    // STAFF LIST
    public function getStaffList()
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID||' - '||SM_STAFF_NAME AS STAFF_ID_NAME");
        $this->db->from("STAFF_MAIN, STAFF_STATUS");
        $this->db->where("SS_STATUS_CODE = SM_STAFF_STATUS 
        AND SS_STATUS_STS = 'ACTIVE' 
        AND SM_STAFF_TYPE = 'STAFF'");
        $this->db->order_by("2");
        $q = $this->db->get();
        
        return $q->result();
    }

    // SAVE UPDATE NOTIFICATION SETUP
    public function saveNotiSet($form)
    {
        $data = array(
            "TMC_ADDRESS" => $form['address'],
            "TMC_LINK" => $form['url_link'],
            "TMC_TELNO" => $form['phone_no'],
            "TMC_FAXNO" => $form['fax_no'],
            "TMC_SEND_BY" => $form['send_by'],
            "TMC_STATUS" => $form['status']
        );

        $this->db->where("TMC_MODULE = 'CONFERENCE_REP'");
        return $this->db->update("TRAINING_MEMO_CONTENT", $data);
    }

    // STAFF REMINDER
    public function getStaffReminder()
    {
        $this->db->select("SR_STAFF_ID, SM_STAFF_NAME,
                            CASE 
                                WHEN SR_STATUS = 'Y' THEN 'Active'
                                WHEN SR_STATUS = 'N' THEN 'Inactive'
                            END
                            SR_STATUS");
        $this->db->from("STAFF_REMINDER");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = SR_STAFF_ID");
        $this->db->where("SR_MODULE = 'CONFERENCE'");
        $this->db->order_by("SR_STAFF_ID");
        $q = $this->db->get();
        
        return $q->result();
    }

    // STAFF LIST TNCA
    public function getStaffTnca()
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID||' - '||SM_STAFF_NAME AS STAFF_ID_NAME");
        $this->db->from("STAFF_MAIN");
        $this->db->where("SM_STAFF_STATUS = '01' 
        AND SM_DEPT_CODE = 'PTNC-A'");
        $q = $this->db->get();
        
        return $q->result();
    }

    // GET STAFF REMINDER DETL
    public function getStfRemDetl($staffID)
    {
        $this->db->select("*");
        $this->db->from("STAFF_REMINDER");
        $this->db->where("SR_STAFF_ID", $staffID);
        $this->db->where("SR_MODULE = 'CONFERENCE'");
        $q = $this->db->get();
        
        return $q->row();
    }

    // SAVE INSERT STAFF REMINDER
    public function saveStaffReminder($form)
    {
        $data = array(
            "SR_STAFF_ID" => $form['staff_id'],
            "SR_MODULE" => 'CONFERENCE',
            "SR_STATUS" => $form['status']
        );

        return $this->db->insert("STAFF_REMINDER", $data);
    }

    // DELETE STAFF REMINDER
    public function deleteStaffReminder($stfID) 
    {
        $this->db->where("SR_STAFF_ID", $stfID);
        $this->db->where("SR_MODULE = 'CONFERENCE'");
        return $this->db->delete("STAFF_REMINDER");
    }

    // GET CONFERENCE ALLOWANCE LIST
    public function getConAllow($caCode = null)
    {
        $this->db->select("CA_CODE, CA_DESC, CA_RM_MAX_AMOUNT, CA_BUDGET_ORIGIN_LOCAL, CA_BUDGET_ORIGIN_OVERSEAS, CA_STATUS");
        $this->db->from("CONFERENCE_ALLOWANCE");

        if(!empty($caCode)) {
            $this->db->where("CA_CODE", $caCode);
            $q = $this->db->get();
        
            return $q->row();
        } else {
            $q = $this->db->get();
        
            return $q->result();
        }
    }

    // SAVE INSERT CONFERENCE ALLOWANCE
    public function saveConAllow($form)
    {
        $data = array(
            "CA_CODE" => $form['code'],
            "CA_DESC" => $form['description'],
            "CA_RM_MAX_AMOUNT" => $form['max_amount'],
            "CA_BUDGET_ORIGIN_LOCAL" => $form['budget_origin_local'],
            "CA_BUDGET_ORIGIN_OVERSEAS" => $form['budget_origin_oversea'],
            "CA_STATUS" => $form['status']
        );

        return $this->db->insert("CONFERENCE_ALLOWANCE", $data);
    }

    // DELETE CONFERENCE ALLOWANCE
    public function deleteConAllow($caCode) 
    {
        $this->db->where("CA_CODE", $caCode);
        return $this->db->delete("CONFERENCE_ALLOWANCE");
    }

    // SAVE UPDATE CONFERENCE ALLOWANCE
    public function updateConAllow($form)
    {
        $data = array(
            "CA_DESC" => $form['description'],
            "CA_RM_MAX_AMOUNT" => $form['max_amount'],
            "CA_BUDGET_ORIGIN_LOCAL" => $form['budget_origin_local'],
            "CA_BUDGET_ORIGIN_OVERSEAS" => $form['budget_origin_oversea'],
            "CA_STATUS" => $form['status']
        );

        $this->db->where("CA_CODE", $form['code']);
        return $this->db->update("CONFERENCE_ALLOWANCE", $data);
    }

    // GET COUNTRY SETUP LIST
    public function getConCountrySetup($cmCode = null)
    {
        $this->db->select("*");
        $this->db->from("ASEAN_COUNTRY_SETUP");

        if(!empty($cmCode)) {
            $this->db->where("ACS_COUNTRY_CODE", $cmCode);
            $q = $this->db->get();
    
            return $q->row();

        } else {
            $this->db->order_by("1");
            $q = $this->db->get();
    
            return $q->result();
        }
    }

    // GET COUNTRY DD LIST
    public function getCountry()
    {
        $this->db->select("CM_COUNTRY_CODE, CM_COUNTRY_DESC, CM_COUNTRY_CODE||' - '||CM_COUNTRY_DESC AS CM_CODE_DESC");
        $this->db->from("COUNTRY_MAIN");
        $this->db->order_by("1");
        $q = $this->db->get();
    
        return $q->result();
    }

    // SAVE INSERT COUNTRY SETUP
    public function saveConCountry($form)
    {
        $cCode = $form['country_code'];
        $cDesc = "(SELECT CM_COUNTRY_DESC FROM COUNTRY_MAIN WHERE CM_COUNTRY_CODE = '$cCode')";

        $data = array(
            "ACS_COUNTRY_CODE" => $cCode
            //"ACS_COUNTRY_DESC" => $cDesc
        );

        $this->db->set("ACS_COUNTRY_DESC", $cDesc, false);

        return $this->db->insert("ASEAN_COUNTRY_SETUP", $data);
    }

    // DELETE COUNTRY SETUP
    public function deleteConCountry($cCode) 
    {
        $this->db->where("ACS_COUNTRY_CODE", $cCode);
        return $this->db->delete("ASEAN_COUNTRY_SETUP");
    }

    // GET PARTICIPANT ROLE
    public function getConParticipantRole()
    {
        $this->db->select("CPR_CODE, CPR_DESC, CPR_ASSE_ROLE_CODE, 
                            UPPER(CTR_ROLE) AS CTR_ROLE, CPR_ORDER_BY,
                            CASE CPR_CPD_COUNTED_ACAD
                                WHEN 'Y' THEN 'Yes'
                                WHEN 'N' THEN 'No'
                                ELSE ''
                            END AS CPR_CPD_COUNTED_ACAD,
                            CASE CPR_CPD_COUNTED_NACAD
                                WHEN 'Y' THEN 'Yes'
                                WHEN 'N' THEN 'No'
                                ELSE ''
                            END AS CPR_CPD_COUNTED_NACAD,
                            CASE CPR_DISPLAY
                                WHEN 'Y' THEN 'Yes'
                                WHEN 'N' THEN 'No'
                                ELSE ''
                            END AS CPR_DISPLAY,
                            CASE CPR_PROCEEDING
                                WHEN 'Y' THEN 'Yes'
                                WHEN 'N' THEN 'No'
                                ELSE ''
                            END AS CPR_PROCEEDING");
        $this->db->from("CONFERENCE_PARTICIPANT_ROLE");
        $this->db->join("CV_TRAINING_ROLE", "CTR_CODE = CPR_ASSE_ROLE_CODE");
        $this->db->order_by("CPR_ORDER_BY");

        $q = $this->db->get();

        return $q->result();
    }

    // GET PARTICIPANT ROLE DETL
    public function getConParticipantRoleDetl($cprCode)
    {
        $this->db->select("CPR_TOTAL_ATTACHMENTS, CPR_CHECKLIST, CPR_CHECKLIST_ENG");
        $this->db->from("CONFERENCE_PARTICIPANT_ROLE");
        $this->db->WHERE("CPR_CODE", $cprCode);

        $q = $this->db->get();

        return $q->row();
    }

    
}