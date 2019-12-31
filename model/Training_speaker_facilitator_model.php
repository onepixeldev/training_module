<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_speaker_facilitator_model extends MY_Model {

    private $staff_id;

    public function __construct() {
        $this->load->database();
        $this->staff_id = $this->lib->userid();
        //$this->staff_id = 'K00825';
    }

	/*===========================================================
       EXTERNAL SPEAKER 
    =============================================================*/

    // GET BASIC INFORMATION - view
    public function getBasicExtSp()
    {
        $this->db->select('ES_SPEAKER_ID, ES_SPEAKER_NAME, ES_IC_NO, ES_DEPT, ES_POSITION, ES_STATUS');
        $this->db->from('EXTERNAL_SPEAKER');
        $this->db->order_by('ES_SPEAKER_ID');
        return $this->db->get()->result();
    }

    // CHECK if record exist for ADD PROCESS based on name
    public function checkESDetail($esName)
    {
        $this->db->select('ES_SPEAKER_NAME');
        $this->db->from('EXTERNAL_SPEAKER');
        $this->db->where('ES_SPEAKER_NAME', $esName);
        $q = $this->db->get();

        return $q->row();
    }

    // GET ALL DETAILS for selected External Speaker based on speaker id
    // Used by DETAIL, EDIT and DELETE
    public function getESDetail($esID)
    {
        $this->db->select('ES_STATUS, ES_SPEAKER_NAME, ES_IC_NO, ES_DEPT, ES_POSITION, ES_TELNO_WORK,
        ES_HANDPHONE, ES_ADDRESS, ES_PCODE, ES_CITY, ES_STATE, ES_COUNTRY');
        $this->db->from('EXTERNAL_SPEAKER');
        $this->db->where('ES_SPEAKER_ID', $esID);
        $q = $this->db->get();

        return $q->row();
    }

    // get state & country full name for specific speaker
    // used by DETAIL only
    public function getESCountryDesc($esID)
    {
        $this->db->select('EXTERNAL_SPEAKER.ES_SPEAKER_ID, EXTERNAL_SPEAKER.ES_STATE, COUNTRY_MAIN.CM_COUNTRY_CODE, COUNTRY_MAIN.CM_COUNTRY_DESC');
        $this->db->from('EXTERNAL_SPEAKER');
        //$this->db->join('STATE_MAIN', 'EXTERNAL_SPEAKER.ES_STATE=STATE_MAIN.SM_STATE_CODE');
        $this->db->join('COUNTRY_MAIN', 'EXTERNAL_SPEAKER.ES_COUNTRY=COUNTRY_MAIN.CM_COUNTRY_CODE');
        $this->db->where('EXTERNAL_SPEAKER.ES_SPEAKER_ID', $esID);
        $q = $this->db->get();

        return $q->row();
    }

    public function getESStateDesc($esID)
    {
        $this->db->select('EXTERNAL_SPEAKER.ES_SPEAKER_ID, EXTERNAL_SPEAKER.ES_STATE, STATE_MAIN.SM_STATE_CODE, STATE_MAIN.SM_STATE_DESC');
        $this->db->from('EXTERNAL_SPEAKER');
        $this->db->join('STATE_MAIN', 'EXTERNAL_SPEAKER.ES_STATE=STATE_MAIN.SM_STATE_CODE');
        //$this->db->join('COUNTRY_MAIN', 'EXTERNAL_SPEAKER.ES_COUNTRY=COUNTRY_MAIN.CM_COUNTRY_CODE');
        $this->db->where('EXTERNAL_SPEAKER.ES_SPEAKER_ID', $esID);
        $q = $this->db->get();

        return $q->row();
    }
    
    // INSERT DATA to db
    public function insertES($form)
    {
        $insertDate = "SYSDATE";
        $insertESID = "to_char(sysdate,'YYYY')||ltrim(to_char(EXTERNAL_SPEAKER_SEQ.nextval,'000000'))";

        // set array data to be inserted
        $data = array(
            "ES_STATUS" => strtoupper($form['status']),
            "ES_SPEAKER_NAME" => $form['name'],
            "ES_IC_NO" => $form['ic_no'],
            "ES_DEPT" => $form['organization'],
            "ES_POSITION" => $form['posES'],
            "ES_TELNO_WORK" => $form['offTelES'],
            "ES_HANDPHONE" => $form['hp_no'],
            "ES_ADDRESS" => $form['addressES'],
            "ES_PCODE" => $form['postcodeES'],
            "ES_CITY" => $form['cityES'],
            "ES_STATE" => $form['state_es'],
            "ES_COUNTRY" => $form['country_es'],
            "ES_ENTER_BY" => $this->staff_id,
        );

        // set data to be inserted (reference id, date)
        $this->db->set("ES_SPEAKER_ID", $insertESID, false);
        $this->db->set("ES_ENTER_DATE", $insertDate, false);
        
        return $this->db->insert("EXTERNAL_SPEAKER", $data);
    } // insertES()
    
    // UPDATE DATA to db 
    public function saveUpdateES($IDes, $form)
    {   
        $updateDate = "SYSDATE";
        $updateESID = $form['IDes'];
        $data = array(
            "ES_STATUS" => strtoupper($form['status']),
            "ES_SPEAKER_NAME" => $form['name'],
            "ES_IC_NO" => $form['ic_no'],
            "ES_DEPT" => $form['organization'],
            "ES_POSITION" => $form['posES'],
            "ES_TELNO_WORK" => $form['offTelES'],
            "ES_HANDPHONE" => $form['hp_no'],
            "ES_ADDRESS" => $form['addressES'],
            "ES_PCODE" => $form['postcodeES'],
            "ES_CITY" => $form['cityES'],
            "ES_STATE" => $form['state_es'],
            "ES_COUNTRY" => $form['country_es'],
            "ES_UPDATE_BY" => $this->staff_id,
        );

        // set data to be inserted (reference id, date)
        $this->db->set("ES_SPEAKER_ID", $updateESID, false);
        $this->db->set("ES_UPDATE_DATE", $updateDate, false);
        
        $this->db->where("ES_SPEAKER_ID", $IDes);
        
        return $this->db->update("EXTERNAL_SPEAKER", $data);
    }
    
    // DELETE DATA to db
    public function deleteESdb($id_es)
    {
        $this->db->where('ES_SPEAKER_ID', $id_es);
        return $this->db->delete('EXTERNAL_SPEAKER');
    }

    /*===========================================================
       EXTERNAL FACILITATOR 
    =============================================================*/

    // ------------------
	// GET BASIC INFORMATION
    // ------------------
    public function getExternalFacilitatorInfo() {
        $this->db->select('EF_FACILITATOR_ID, EF_FACILITATOR_NAME, EF_DEPARTMENT, EF_ORGANIZATION, 
        EF_POSITION, EF_STATE, EF_STATUS');
        $this->db->from('EXTERNAL_FACILITATOR');
		
		/*if (!empty($searchK)) {
			$this->db->where('SVAE_STATUS', $statusK);
		} */
		
        $this->db->order_by('EF_FACILITATOR_NAME ASC');
        $q = $this->db->get();
        
        return $q->result();
    }

    // INSERT DATA to db
    public function insertEF($form)
    {
        $insertDate = "SYSDATE";
        $insertEFID = "to_char(sysdate,'YYYY')||ltrim(to_char(EXTERNAL_FACILITATOR_SEQ.nextval,'000000'))";

        // set array data to be inserted
        $data = array(
            "EF_STATUS" => strtoupper($form['status']),
            "EF_FACILITATOR_NAME" => $form['name'],
            "EF_IC_NO" => $form['ic_no'],
            "EF_DEPARTMENT" => $form['deptEF'],
            "EF_ORGANIZATION" => $form['organization'],
            "EF_POSITION" => $form['posEF'],
            "EF_TELNO_WORK" => $form['offTelEF'],
            "EF_HANDPHONE_NO" => $form['hp_no'],
            "EF_EMAIL_ADDR" => $form['email'],
            "EF_AREA_1" => $form['area1'],
            "EF_AREA_2" => $form['area2'],
            "EF_AREA_3" => $form['area3'],
            "EF_ADDRESS" => $form['addressEF'],
            "EF_STATE" => $form['state'],
            "EF_COUNTRY" => $form['country'],
            "EF_PCODE" => $form['postcodeEF'],
            "EF_CITY" => $form['cityEF'],
            "EF_ENTER_BY" => $this->staff_id,
        );

        // set data to be inserted (reference id, date)
        $this->db->set("EF_FACILITATOR_ID", $insertEFID, false);
        $this->db->set("EF_ENTER_DATE", $insertDate, false);
        
        return $this->db->insert("EXTERNAL_FACILITATOR", $data);
    }


    // CHECK if record exist for ADD PROCESS based on name
    public function checkEFDetail($efName)
    {
        $this->db->select('EF_FACILITATOR_NAME');
        $this->db->from('EXTERNAL_FACILITATOR');
        $this->db->where('EF_FACILITATOR_NAME', $efName);
        $q = $this->db->get();

        return $q->row();
    }

    // GET ALL DETAILS for selected External Facilitator based on Facilitator id
    // Used by DETAIL, EDIT and DELETE
    public function getEFDetail($efID)
    {
        $this->db->select('EF_STATUS, EF_FACILITATOR_NAME, EF_IC_NO, EF_DEPARTMENT, EF_ORGANIZATION, 
        EF_POSITION, EF_TELNO_WORK, EF_HANDPHONE_NO, EF_EMAIL_ADDR, EF_AREA_1, EF_AREA_2, EF_AREA_3, 
        EF_ADDRESS, EF_STATE, EF_COUNTRY, EF_PCODE, EF_CITY');
        $this->db->from('EXTERNAL_FACILITATOR');
        $this->db->where('EF_FACILITATOR_ID', $efID);
        $q = $this->db->get();

        return $q->row();
    }

    // get state & country full name for specific Facilitator
    // used by DETAIL only
    public function getEFCountryDesc($efID)
    {
        $this->db->select('EXTERNAL_FACILITATOR.EF_FACILITATOR_ID, EXTERNAL_FACILITATOR.EF_STATE, COUNTRY_MAIN.CM_COUNTRY_CODE, 
        COUNTRY_MAIN.CM_COUNTRY_DESC');
        $this->db->from('EXTERNAL_FACILITATOR');
        //$this->db->join('STATE_MAIN', 'EXTERNAL_FACILITATOR.EF_STATE=STATE_MAIN.SM_STATE_CODE');
        $this->db->join('COUNTRY_MAIN', 'EXTERNAL_FACILITATOR.EF_COUNTRY=COUNTRY_MAIN.CM_COUNTRY_CODE');
        $this->db->where('EXTERNAL_FACILITATOR.EF_FACILITATOR_ID', $efID);
        $q = $this->db->get();

        return $q->row();
    }

    public function getEFStateDesc($efID)
    {
        $this->db->select('EXTERNAL_FACILITATOR.EF_FACILITATOR_ID, EXTERNAL_FACILITATOR.EF_STATE, STATE_MAIN.SM_STATE_CODE, 
        STATE_MAIN.SM_STATE_DESC');
        $this->db->from('EXTERNAL_FACILITATOR');
        $this->db->join('STATE_MAIN', 'EXTERNAL_FACILITATOR.EF_STATE=STATE_MAIN.SM_STATE_CODE');
        //$this->db->join('COUNTRY_MAIN', 'EXTERNAL_FACILITATOR.EF_COUNTRY=COUNTRY_MAIN.CM_COUNTRY_CODE');
        $this->db->where('EXTERNAL_FACILITATOR.EF_FACILITATOR_ID', $efID);
        $q = $this->db->get();

        return $q->row();
    }

    // DELETE DATA to db
    public function deleteEFdb($id_ef)
    {
        $this->db->where('EF_FACILITATOR_ID', $id_ef);
        return $this->db->delete('EXTERNAL_FACILITATOR');
    }

    // UPDATE DATA to db 
    public function saveUpdateEF($EFid, $form)
    {   
        $updateDate = "SYSDATE";
        $updateESID = $form['efID'];
        $data = array(
            "EF_STATUS" => strtoupper($form['status']),
            "EF_FACILITATOR_NAME" => $form['name'],
            "EF_IC_NO" => $form['ic_no'],
            "EF_DEPARTMENT" => $form['deptEF'],
            "EF_ORGANIZATION" => $form['organization'],
            "EF_POSITION" => $form['posEF'],
            "EF_TELNO_WORK" => $form['offTelEF'],
            "EF_HANDPHONE_NO" => $form['hp_no'],
            "EF_EMAIL_ADDR" => $form['email'],
            "EF_AREA_1" => $form['area1'],
            "EF_AREA_2" => $form['area2'],
            "EF_AREA_3" => $form['area3'],
            "EF_ADDRESS" => $form['addressEF'],
            "EF_STATE" => $form['state'],
            "EF_COUNTRY" => $form['country'],
            "EF_PCODE" => $form['postcodeEF'],
            "EF_CITY" => $form['cityEF'],
            "EF_UPDATE_BY" => $this->staff_id,
        );

        // set data to be set (reference id, date)
        $this->db->set("EF_FACILITATOR_ID", $updateESID, false);
        $this->db->set("EF_UPDATE_DATE", $updateDate, false);
        
        $this->db->where("EF_FACILITATOR_ID", $updateESID);
        
        return $this->db->update("EXTERNAL_FACILITATOR", $data);
    }

    /*=======================================================================
       EXTERNAL FACILITATOR && EXTERNAL SPEAKER - populate country and state
    =========================================================================*/
    // used for ADD & UPDATE form to get country list
    public function getCountryList() {
        $this->db->select('CM_COUNTRY_CODE, CM_COUNTRY_DESC');
        $this->db->from('COUNTRY_MAIN');
        $this->db->order_by('CM_COUNTRY_DESC');
        $q = $this->db->get();
		        
        return $q->result();
    }
    
    // used by ADD & UPDATE form to get state based on choosen country
    public function getCountryStateList($countCode) {
        $this->db->select('SM_STATE_CODE, SM_STATE_DESC, SM_COUNTRY_CODE');
        $this->db->from('STATE_MAIN');
		$this->db->where('SM_COUNTRY_CODE', $countCode);
        $this->db->order_by('SM_STATE_CODE');
        $q = $this->db->get();
        
        return $q->result();
    } 
}


