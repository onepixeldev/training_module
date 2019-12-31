<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_external_speaker_model extends MY_Model
{
    private $staff_id;

    public function __construct()
    {
        $this->load->database();
        $this->staff_id = $this->lib->userid();
    }

    // GET BASIC INFORMATION - view
    public function getBasicExtSp()
    {
        $this->db->select('ES_SPEAKER_ID, ES_SPEAKER_NAME, ES_IC_NO, ES_DEPT, ES_POSITION, ES_STATUS');
        $this->db->from('EXTERNAL_SPEAKER');
        $this->db->order_by('ES_SPEAKER_ID');
        return $this->db->get()->result();
    }

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
    public function getESStateCountryDesc($esID)
    {
        $this->db->select('EXTERNAL_SPEAKER.ES_SPEAKER_ID, EXTERNAL_SPEAKER.ES_STATE, STATE_MAIN.SM_STATE_CODE, STATE_MAIN.SM_STATE_DESC,
                            COUNTRY_MAIN.CM_COUNTRY_CODE, COUNTRY_MAIN.CM_COUNTRY_DESC');
        $this->db->from('EXTERNAL_SPEAKER');
        $this->db->join('STATE_MAIN', 'EXTERNAL_SPEAKER.ES_STATE=STATE_MAIN.SM_STATE_CODE');
        $this->db->join('COUNTRY_MAIN', 'EXTERNAL_SPEAKER.ES_COUNTRY=COUNTRY_MAIN.CM_COUNTRY_CODE');
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
            "ES_DEPT" => $form['orES'],
            "ES_POSITION" => $form['posES'],
            "ES_TELNO_WORK" => $form['offTelES'],
            "ES_HANDPHONE" => $form['mobileES'],
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
            "ES_DEPT" => $form['orES'],
            "ES_POSITION" => $form['posES'],
            "ES_TELNO_WORK" => $form['offTelES'],
            "ES_HANDPHONE" => $form['mobileES'],
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
}
