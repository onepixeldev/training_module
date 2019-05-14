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
}