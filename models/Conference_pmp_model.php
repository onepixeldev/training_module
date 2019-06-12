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
    public function getConferenceInfoList($month = null, $year = null) {		
        $this->db->select("CM_REFID, CM_NAME, TO_CHAR(CM_DATE_FROM, 'DD/MM/YYYY') AS CM_DATE_FROM, TO_CHAR(CM_DATE_TO, 'DD/MM/YYYY') AS CM_DATE_TO");
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
        $this->db->order_by("CM_DATE_FROM DESC");
        $q = $this->db->get();
                
        return $q->result();
    } 

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
            $this->db->set("CM_DATE_FROM", $curDate, false);
        }

        if(!empty($form['date_to'])) {
            $date_to = "to_date('".$form['date_to']."', 'DD/MM/YYYY')";
            $this->db->set("CM_DATE_TO", $curDate, false);
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