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
        
        if($parmCode == 'CONFERENCE_ADMIN_EMAIL' || $parmCode == 'CONFERENCE_ADMIN_EXT' || $parmCode == 'CONFERENCE_ADMIN_EXT_RMIC') {
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
        } elseif ($parmCode == 'CONFERENCE_ADMIN_EXT_RMIC') {
            $parmNo = "(SELECT CASE 
                        WHEN HP_PARM_NO IS NULL THEN 1
                        WHEN HP_PARM_NO IS NOT NULL THEN HP_PARM_NO
                        END AS HP_PARM_NO
                        FROM(
                        SELECT MAX(HP_PARM_NO)+1 AS HP_PARM_NO
                        FROM HRADMIN_PARMS
                        WHERE HP_PARM_CODE = 'CONFERENCE_ADMIN_EXT_RMIC'))";
        }
        
        $data = array(
            "HP_PARM_CODE" => $parmCode,
            "HP_PARM_DESC" => $parmDesc
        );

        $this->db->set("HP_PARM_NO", $parmNo, false);

        return $this->db->insert("HRADMIN_PARMS", $data);
    }

    // SAVE UPDATE STAFF CONTACT INFO
    public function saveUpdConSet($parmCode, $parmNo, $parmDesc)
    {
        $data = array(
            "HP_PARM_DESC" => $parmDesc
        );

        $this->db->where("HP_PARM_CODE", $parmCode);
        $this->db->where("HP_PARM_NO", $parmNo);

        return $this->db->update("HRADMIN_PARMS", $data);
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
    public function getStaffReminder($mod = null)
    {
        $this->db->select("SR_STAFF_ID, SM_STAFF_NAME,
                            CASE 
                                WHEN SR_STATUS = 'Y' THEN 'Active'
                                WHEN SR_STATUS = 'N' THEN 'Inactive'
                            END
                            SR_STATUS");
        $this->db->from("STAFF_REMINDER");
        $this->db->join("STAFF_MAIN", "SM_STAFF_ID = SR_STAFF_ID");
        if($mod == 'RMIC') {
            $this->db->where("SR_MODULE = 'CONFERENCE_RMIC'");
        } else {
            $this->db->where("SR_MODULE = 'CONFERENCE'");
        }
        $this->db->order_by("SR_STAFF_ID");
        $q = $this->db->get();
        
        return $q->result();
    }

    // STAFF LIST TNCA
    public function getStaffTnca($mod = null)
    {
        $this->db->select("SM_STAFF_ID, SM_STAFF_NAME, SM_STAFF_ID||' - '||SM_STAFF_NAME AS STAFF_ID_NAME");
        $this->db->from("STAFF_MAIN");
        if($mod == 'RMIC') {
            $this->db->where("SM_STAFF_STATUS = '01' AND SM_DEPT_CODE = 'PPP'");
        } else {
            $this->db->where("SM_STAFF_STATUS = '01' AND SM_DEPT_CODE = 'PTNC-A'");
        }
        
        $q = $this->db->get();
        
        return $q->result();
    }

    // GET STAFF REMINDER DETL
    public function getStfRemDetl($staffID, $mod)
    {
        $this->db->select("*");
        $this->db->from("STAFF_REMINDER");
        $this->db->where("SR_STAFF_ID", $staffID);
        if($mod == 'RMIC') {
            $this->db->where("SR_MODULE = 'CONFERENCE_RMIC'");
        } else {
            $this->db->where("SR_MODULE = 'CONFERENCE'");
        }
        
        $q = $this->db->get();
        
        return $q->row();
    }

    // SAVE INSERT STAFF REMINDER
    public function saveStaffReminder($form)
    {
        if($form['mod'] == 'RMIC') {
            $data = array(
                "SR_STAFF_ID" => $form['staff_id'],
                "SR_MODULE" => 'CONFERENCE_RMIC',
                "SR_STATUS" => $form['status']
            );
        } else {
            $data = array(
                "SR_STAFF_ID" => $form['staff_id'],
                "SR_MODULE" => 'CONFERENCE',
                "SR_STATUS" => $form['status']
            );
        }

        return $this->db->insert("STAFF_REMINDER", $data);
    }

    // DELETE STAFF REMINDER
    public function deleteStaffReminder($stfID, $mod) 
    {
        $this->db->where("SR_STAFF_ID", $stfID);
        
        if($mod == 'RMIC') {
            $this->db->where("SR_MODULE = 'CONFERENCE_RMIC'");
        } else {
            $this->db->where("SR_MODULE = 'CONFERENCE'");
        }
       
        return $this->db->delete("STAFF_REMINDER");
    }

    // GET CONFERENCE ALLOWANCE LIST
    public function getConAllow($caCode = null)
    {
        $this->db->select("CA_CODE, CA_DESC, CA_RM_MAX_AMOUNT, CA_BUDGET_ORIGIN_LOCAL, CA_BUDGET_ORIGIN_OVERSEAS, CA_STATUS, CA_BUDGET_ORIGIN_OVERSEAS_RMIC, CA_BUDGET_ORIGIN_LOCAL_RMIC, CA_RMIC, 
        CASE CA_RMIC
            WHEN 'Y' THEN 'Yes'
            WHEN 'N' THEN 'No'
        END AS CA_RMIC_DESC");
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
        if($form['mod'] == 'RMIC') { 
            $data = array(
                "CA_CODE" => $form['code'],
                "CA_DESC" => $form['description'],
                "CA_RM_MAX_AMOUNT" => $form['max_amount'],
                "CA_BUDGET_ORIGIN_LOCAL_RMIC" => $form['budget_origin_local'],
                "CA_BUDGET_ORIGIN_OVERSEAS_RMIC" => $form['budget_origin_oversea'],
                "CA_STATUS" => $form['status'],
                "CA_RMIC" => $form['display_rmic']
            );
        } else {
            $data = array(
                "CA_CODE" => $form['code'],
                "CA_DESC" => $form['description'],
                "CA_RM_MAX_AMOUNT" => $form['max_amount'],
                "CA_BUDGET_ORIGIN_LOCAL" => $form['budget_origin_local'],
                "CA_BUDGET_ORIGIN_OVERSEAS" => $form['budget_origin_oversea'],
                "CA_STATUS" => $form['status']
            );
        }

        return $this->db->insert("CONFERENCE_ALLOWANCE", $data);
    }

    // STAFF CONFERENCE ALLOWANCE
    public function getStaffConAllowance($caCode) {
        $this->db->select("*");
        $this->db->from("STAFF_CONFERENCE_ALLOWANCE");
        $this->db->join("CONFERENCE_ALLOWANCE", "SCA_ALLOWANCE_CODE = CA_CODE", "LEFT");
        $this->db->where("SCA_ALLOWANCE_CODE", $caCode);

        $q = $this->db->get();
        return $q->result();
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
        if($form['mod'] == 'RMIC') {
            $data = array(
                // "CA_DESC" => $form['description'],
                // "CA_RM_MAX_AMOUNT" => $form['max_amount'],
                "CA_BUDGET_ORIGIN_LOCAL_RMIC" => $form['budget_origin_local'],
                "CA_BUDGET_ORIGIN_OVERSEAS_RMIC" => $form['budget_origin_oversea'],
                // "CA_STATUS" => $form['status'],
                "CA_RMIC" => $form['display_rmic']
            );
        } else {
            $data = array(
                "CA_DESC" => $form['description'],
                "CA_RM_MAX_AMOUNT" => $form['max_amount'],
                "CA_BUDGET_ORIGIN_LOCAL" => $form['budget_origin_local'],
                "CA_BUDGET_ORIGIN_OVERSEAS" => $form['budget_origin_oversea'],
                "CA_STATUS" => $form['status']
            );
        }
        
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
                            END AS CPR_PROCEEDING, 
                            CASE CPR_RMIC
                                WHEN 'Y' THEN 'Yes'
                                WHEN 'N' THEN 'No'
                                ELSE ''
                            END AS CPR_RMIC");
        $this->db->from("CONFERENCE_PARTICIPANT_ROLE");
        $this->db->join("CV_TRAINING_ROLE", "CTR_CODE = CPR_ASSE_ROLE_CODE", "LEFT");
        $this->db->order_by("CPR_ORDER_BY");

        $q = $this->db->get();

        return $q->result();
    }

    // GET PARTICIPANT ROLE DETL
    public function getConParticipantRoleDetl($cprCode)
    {
        $this->db->select("*");
        $this->db->from("CONFERENCE_PARTICIPANT_ROLE");
        $this->db->WHERE("CPR_CODE", $cprCode);

        $q = $this->db->get();

        return $q->row();
    }

    // GET REF ROLE DD
    public function getRefRole()
    {
        $this->db->select("CTR_CODE, UPPER(CTR_ROLE), CTR_CODE||' - '||UPPER(CTR_ROLE) AS CTR_CODE_DESC");
        $this->db->from("CV_TRAINING_ROLE");

        $q = $this->db->get();

        return $q->result();
    }

    // SAVE INSERT PARTICIPANT ROLE
    public function saveConPartRole($form)
    {   
        if ($form['mod'] == 'RMIC') {
            $data = array(
                "CPR_CODE" => $form['code'],
                "CPR_DESC" => $form['participant_role'],
                "CPR_ASSE_ROLE_CODE" => $form['ref_code'],
                "CPR_ORDER_BY" => $form['order_by'],
                "CPR_CPD_COUNTED_ACAD" => $form['cpd_counted_academic'],
                "CPR_CPD_COUNTED_NACAD" => $form['cpd_counted_non_academic'],
                "CPR_RMIC" => $form['display_rmic'],
                "CPR_TOTAL_ATTACH_RMIC" => $form['number_of_attachment'],
                "CPR_CHECKLIST_RMIC" => $form['checklist_bm'],
                "CPR_CHECKLIST_ENG_RMIC" => $form['checklist_bi']
            );
        } else {
            $data = array(
                "CPR_CODE" => $form['code'],
                "CPR_DESC" => $form['participant_role'],
                "CPR_ASSE_ROLE_CODE" => $form['ref_code'],
                "CPR_ORDER_BY" => $form['order_by'],
                "CPR_CPD_COUNTED_ACAD" => $form['cpd_counted_academic'],
                "CPR_CPD_COUNTED_NACAD" => $form['cpd_counted_non_academic'],
                "CPR_DISPLAY" => $form['display_conference'],
                "CPR_PROCEEDING" => $form['prosiding'],
                "CPR_TOTAL_ATTACHMENTS" => $form['number_of_attachment'],
                "CPR_CHECKLIST" => $form['checklist_bm'],
                "CPR_CHECKLIST_ENG" => $form['checklist_bi']
            );
        }

        return $this->db->insert("CONFERENCE_PARTICIPANT_ROLE", $data);
    }

    // DELETE PARTICIPANT ROLE 
    public function deleteConPartRole($cprCode) 
    {
        $this->db->where("CPR_CODE", $cprCode);
        return $this->db->delete("CONFERENCE_PARTICIPANT_ROLE");
    } 

    // SAVE UPDATE PARTICIPANT ROLE
    public function saveUpdConPartRole($form)
    {
        if ($form['mod'] == 'RMIC') {
            $data = array(
                // "CPR_DESC" => $form['participant_role'],
                // "CPR_ASSE_ROLE_CODE" => $form['ref_code'],
                // "CPR_ORDER_BY" => $form['order_by'],
                // "CPR_CPD_COUNTED_ACAD" => $form['cpd_counted_academic'],
                // "CPR_CPD_COUNTED_NACAD" => $form['cpd_counted_non_academic'],
                "CPR_RMIC" => $form['display_rmic'],
                "CPR_TOTAL_ATTACH_RMIC" => $form['number_of_attachment'],
                "CPR_CHECKLIST_RMIC" => $form['checklist_bm'],
                "CPR_CHECKLIST_ENG_RMIC" => $form['checklist_bi']
            );
        } elseif($form['mod'] == 'CPD') {
            $data = array(
                "CPR_CPD_COUNTED_ACAD" => $form['cpd_counted_academic'],
                "CPR_CPD_COUNTED_NACAD" => $form['cpd_counted_non_academic'],
            );
        } else {
            $data = array(
                "CPR_DESC" => $form['participant_role'],
                "CPR_ASSE_ROLE_CODE" => $form['ref_code'],
                "CPR_ORDER_BY" => $form['order_by'],
                "CPR_CPD_COUNTED_ACAD" => $form['cpd_counted_academic'],
                "CPR_CPD_COUNTED_NACAD" => $form['cpd_counted_non_academic'],
                "CPR_DISPLAY" => $form['display_conference'],
                "CPR_PROCEEDING" => $form['prosiding'],
                "CPR_TOTAL_ATTACHMENTS" => $form['number_of_attachment'],
                "CPR_CHECKLIST" => $form['checklist_bm'],
                "CPR_CHECKLIST_ENG" => $form['checklist_bi']
            );
        }

        $this->db->where("CPR_CODE", $form['code']);

        return $this->db->update("CONFERENCE_PARTICIPANT_ROLE", $data);
    }

    /*===========================================================
       CONFERENCE INFORMATION SETUP - ATF093
    =============================================================*/

    public function getCurDate() {		
        $this->db->select("TO_CHAR(SYSDATE, 'MM') AS SYSDATE_MM, TO_CHAR(SYSDATE, 'YYYY') AS SYSDATE_YYYY");
        $this->db->from("DUAL");
        $q = $this->db->get();
                
        return $q->row();
    } 

    // GET YEAR DROPDOWN
    public function getYearList() {
        $this->db->distinct();		
        $this->db->select("TO_CHAR(CM_DATE_FROM, 'YYYY') AS CM_YEAR");
        $this->db->from("CONFERENCE_MAIN");
        $this->db->where("CM_DATE_FROM IS NOT NULL");
        $this->db->order_by("TO_CHAR(CM_DATE_FROM, 'YYYY') DESC");
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
    public function getConferenceInfoList($month = null, $year = null) {		
        $this->db->select("CM_REFID, CM_NAME, TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') AS CM_DATE_FROM2, TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') AS CM_DATE_TO2, CM_DATE_FROM");
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
        $this->db->order_by("CM_DATE_FROM DESC, CM_NAME");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // GET STATE DROPDOWN
    public function getStateList() {
        $this->db->select("SM_STATE_CODE, SM_STATE_DESC, SM_STATE_CODE||' - '||SM_STATE_DESC AS SM_STATE_CODE_DESC");
        $this->db->from("STATE_MAIN");
        $this->db->order_by("SM_STATE_DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // GET COUNTRY DROPDOWN
    public function getCountryList() {
        $this->db->select("CM_COUNTRY_CODE, CM_COUNTRY_DESC, CM_COUNTRY_CODE||' - '||CM_COUNTRY_DESC AS CM_COUNTRY_CODE_DESC");
        $this->db->from("COUNTRY_MAIN");
        $this->db->order_by("CM_COUNTRY_DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // GET LEVEL DROPDOWN
    public function getLevelList() {
        $this->db->select("TL_CODE, TL_DESC, TL_CODE||' - '||TL_DESC AS TL_CODE_DESC");
        $this->db->from("TRAINING_LEVEL");
        $this->db->order_by("TL_CODE");
        $q = $this->db->get();
                
        return $q->result();
    } 

    // SAVE INSERT CONFERENCE INFORMATION
    public function saveConInfo($form)
    {
        $curDate = 'SYSDATE';
        $curUsr = $this->staff_id;
        $refid = "TO_CHAR(SYSDATE,'YYYY')||'-'||TRIM(TO_CHAR(CONFERENCE_MAIN_SEQ.NEXTVAL,'00000000'))";

        if($form['country'] != 'MYS' && empty($form['total_participant']) && $form['total_participant'] != '0') {
            $totalParticipant = "(SELECT HP_PARM_DESC FROM HRADMIN_PARMS WHERE HP_PARM_CODE = 'CONFERENCE_MAX_PARTICIPANT_OVERSEA')";
        } 
        elseif($form['country'] == 'MYS' && empty($form['total_participant']) && $form['total_participant'] != '0') {
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
            "CM_TEMP_OPEN" => $form['temporary_open'],
            "CM_ENTER_BY" => $curUsr
        );

        $this->db->set("CM_REFID", $refid, false);
        $this->db->set("CM_ENTER_DATE", $curDate, false);
        $this->db->set("CM_PARTICIPANT", $totalParticipant, false);

        if(!empty($form['date_from'])) {
            $date_from = "to_date('".$form['date_from']."', 'DD/MM/YYYY')";
            $this->db->set("CM_DATE_FROM", $date_from, false);
        }

        if(!empty($form['date_to'])) {
            $date_to = "to_date('".$form['date_to']."', 'DD/MM/YYYY')";
            $this->db->set("CM_DATE_TO", $date_to, false);
        }
        
        return $this->db->insert("CONFERENCE_MAIN", $data);
    }

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
            $this->db->set("CM_DATE_FROM", $date_from, false);
        }

        if(!empty($form['date_to'])) {
            $date_to = "to_date('".$form['date_to']."', 'DD/MM/YYYY')";
            $this->db->set("CM_DATE_TO", $date_to, false);
        }

        $this->db->where("CM_REFID", $refid);
        
        return $this->db->update("CONFERENCE_MAIN", $data);
    }

    // CHECK STAFF CONFERENCE MAIN CHILD RECORD
    public function checkChildRecScm($refid)
    {
        $this->db->select("*");
        $this->db->from("STAFF_CONFERENCE_MAIN");
        $this->db->where("SCM_REFID", $refid);
        $q = $this->db->get();
        
        return $q->result();
    }

    // DELETE CONFERENCE INFORMATION
    public function deleteConInfo($refid) 
    {
        $this->db->where("CM_REFID", $refid);
        return $this->db->delete("CONFERENCE_MAIN");
    } 
}