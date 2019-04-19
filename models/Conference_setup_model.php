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
    public function getConferenceCat()
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
        $this->db->order_by("CC_STATUS, CC_RM_AMOUNT_FROM");
        $q = $this->db->get();
        
        return $q->result();
    }

    public function saveConferenceCat($form)
    {



        $data = array(
            "CC_CODE" => $form['code'],
            "UPPER(CC_DESC)" => $form['category'],
            "CC_RM_AMOUNT_FROM" => $form['from'],
            "CC_RM_AMOUNT_TO" => $form['to'],
            "CC_HEAD_RECOMMEND" => $form['head_recommend'],
            "CC_TNCA_APPROVE" => $form['tnc_approve'],
            "CC_VC_APPROVE" => $form['vc_approve'],
            "CC_STATUS" => $form['status']
        );

        return $this->db->insert("CONFERENCE_CATEGORY", $data);
    }
}