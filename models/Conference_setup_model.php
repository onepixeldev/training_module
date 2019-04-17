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

    // TRAINING HEAD
    public function getConferenceCat()
    {
        $this->db->select("CC_CODE, CC_DESC, 'RM'||TO_CHAR(CC_RM_AMOUNT_FROM, '999999999D99') AS CC_RM_AMOUNT_FROM, 'RM'||TO_CHAR(CC_RM_AMOUNT_TO, '999999999D99') AS CC_RM_AMOUNT_TO, 
                            CC_HEAD_RECOMMEND, CC_TNCA_APPROVE, CC_VC_APPROVE, CC_STATUS");
        $this->db->from("CONFERENCE_CATEGORY");
        $this->db->order_by("CC_STATUS, CC_RM_AMOUNT_FROM");
        $q = $this->db->get();
        
        return $q->result();
    }
}