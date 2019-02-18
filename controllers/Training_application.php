<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training_application extends MY_Controller
{
    private $staff_id;

    public function __construct()
    {
        parent::__construct();
        //$this->loadModel('mdl');
        $this->load->model('Training_application_model', 'mdl');
        $this->staff_id = $this->lib->userid();
    }

    // View MAIN Page
    public function index()
    {
        // clear filter
        $this->session->set_userdata('tabID', '');
        //$this->session->set_userdata('sTraining', '');
        //$this->session->set_userdata('trSts', '');

        $this->redirect($this->class_uri('ATF001'));
    }

    public function ATF001()
    {   
        $this->render();
    }

    // View Page Filter
    public function viewTabFilter($tabID)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);
        
        redirect($this->class_uri('ATF001'));
    }

    /*===========================================================
       TRAINING SETUP
    =============================================================*/
    /*_____________________
        GET DETAILS
    _____________________*/
    public function trainingInfo()
    {   
        // get available records
        $data['trainingInfo'] = $this->mdl->getTrainingInfo();

        $this->render($data);
    }

    public function speakerInfo()
    {   
        $tsRefID = $this->input->post('tsRefID', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['speakerInfoExternal'] = $this->mdl->getSpeakerInfoExternal($tsRefID);
            $data['speakerInfoStaff'] = $this->mdl->getSpeakerInfoStaff($tsRefID);
        }

        $this->render($data);
    }

    public function facilitatorInfo()
    {   
        $tsRefID = $this->input->post('tsRefID', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['facilitatorInfoExternal'] = $this->mdl->getFacilitatorInfoExternal($tsRefID);
            $data['facilitatorInfoStaff'] = $this->mdl->getFacilitatorInfoStaff($tsRefID);
        }

        $this->render($data);
    }

    public function targetGroup()
    {   
        $tsRefID = $this->input->post('tsRefID', true);
        $tName = $this->input->post('tName', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['tname'] = $tName;
            $data['targetGroup'] = $this->mdl->getTargetGroup($tsRefID);
        }

        $this->render($data);
    }

    public function moduleSetup()
    {   
        $tsRefID = $this->input->post('tsRefID', true);
        $tName = $this->input->post('tName', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['tname'] = $tName;
            $data['moduleSetup'] = $this->mdl->getmoduleSetup($tsRefID);
        }

        $this->render($data);
    }

    public function cpdSetup()
    {   
        $tsRefID = $this->input->post('tsRefID', true);
        $tName = $this->input->post('tName', true);

        // get available records
        if(!empty($tsRefID)){
            $data['refid'] = $tsRefID;
            $data['tname'] = $tName;
            $data['cpdSetup'] = $this->mdl->getCpdSetup($tsRefID);
            if (!empty($data['cpdSetup']->CH_CATEGORY)){
                $data['cpdSetupCat'] = $this->mdl->getCpdSetupCategory($data['cpdSetup']->CH_CATEGORY);
                $data['cpdSetupCatDesc'] = $data['cpdSetupCat']->CH_CC_CATEGORY_DESC;
            } else {
                $data['cpdSetupCatDesc'] = '';
            }
        }

        $this->render($data);
    }

    // Populate state list
    public function stateList(){
        $this->isAjax();
        
        $countCode = $this->input->post('countryCode', true);
        
        // get available records
        $stateList = $this->mdl->getCountryStateList($countCode);
               
        if (!empty($stateList)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'stateList' => $stateList);
        
        echo json_encode($json);
    }

    // Populate organizer info
    public function organizerInfo(){
        $this->isAjax();
        
        $organizerCode = $this->input->post('orgCode', true);
        
        // get available records
        $organizerInfo = $this->mdl->getOrganizerName($organizerCode);
               
        if (!empty($organizerInfo)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'orgInfo' => $organizerInfo);
        
        echo json_encode($json);
    }

    // Populate structured training
    /*public function structuredTrainingInfo(){
        $this->isAjax();
        
        $strTrCode = $this->input->post('strCode', true);
        
        // get available records
        $structuredTrainingInfo = $this->mdl->getStructuredTraining($strTrCode);
               
        if (!empty($structuredTrainingInfo)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'strTrInfo' => $structuredTrainingInfo);
        
        echo json_encode($json);
    }*/

    /*private function trainingInfoRow($thRefID){
		$data['trInfo'] = $this->mdl->getCityDetail($cityCode);
		
		return $this->load->view('training_application/trainingInfoRow', $data, true);	
    }*/

    public function verifyStructuredTrainingSetup()
    {
        $refID = $this->input->post('refID',true);
        
        if(!empty($refID)) {

            $data['verStrTrCode'] = $this->mdl->getTrainingInfoDetail($refID);
            $data['verStrTr'] = $this->mdl->getCountTargetGroup($refID);

            if((!empty($data['verStrTrCode']->TH_TRAINING_CODE) && $data['verStrTr']->COUNT_TG > 0)){
                $json = array('sts' => 1, 'msg' => ''.nl2br("Please delete target group first \n\n <b>Structured Training Ref ID:</b> ".$data['verStrTrCode']->TH_TRAINING_CODE."").'', 'alert' => 'danger');
            } else{
                $json = array('sts' => 0, 'msg' => 'OK!', 'alert' => 'success');
            }
            
            echo json_encode($json);
        }
    }

    /*_____________________
        ADD PROCESS
    _____________________*/
    public function addNewTraining()
    {
        $countCode = $this->input->post('countryCode',true);
        $organizerCode = $this->input->post('orgCode',true);

        $data['type_list'] = $this->dropdown($this->mdl->getTypeList(), 'TT_CODE', 'TT_CODE_DESC', ' ---Please select--- ');
        $data['category'] = $this->dropdown($this->mdl->getCategoryList(), 'TC_CATEGORY', 'TC_CATEGORY', ' ---Please select--- ');
        $data['level'] = $this->dropdown($this->mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');
        $data['area'] = $this->dropdown($this->mdl->getAreaList(), 'TF_CODE', 'TF_CODE_DESC', ' ---Please select--- ');
        $data['sgroup'] = $this->dropdown($this->mdl->getSgroupList(), 'SG_GROUP_CODE', 'SG_CODE_DESC', ' ---Please select--- ');
        $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');
        $data['com_lvl_code'] = $this->dropdown($this->mdl->getCompetencyLevel(), 'TCL_COMPETENCY_CODE', 'TCL_COMPETENCY_CODE_DESC', ' ---Please select--- ');
        $data['coor'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
        $data['coor_sec'] = $this->dropdown($this->mdl->getCoordinatorSec(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');
        $data['org_lvl'] = $this->dropdown($this->mdl->getOrganizerLevel(), 'TOL_CODE', 'TOL_CODE_DESC', ' ---Please select--- ');
        $data['org_name'] = $this->dropdown($this->mdl->getOrganizerName(), 'TOH_ORG_CODE', 'TOH_ORG_CODE_DESC', ' ---Please select--- ');

        $data['count_def'] = $this->mdl->getCountryDef();

        $countCode2= 'MYS';
        if (!empty($countCode2) || !empty($countCode)) {
            $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode2), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
        } else {
            $data['state_list'] = '';
        }

        if (!empty($organizerCode)) {
            $data['org_info'] = $this->mdl->getCountryStateList($countCode);
        } else {
            $data['org_info'] = '';
        }

        //$data['count_code'] = $countCode;
        //$data['org_code'] = $organizerCode;
        
        $this->renderAjax($data);
    }
    
    public function saveNewTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TH_TRAINING_CODE
        $trCode = $form['structured_training'];

        // module setup
        $coor = $form['coordinator'];
        $coorSeq = $form['coordinator_sector'];
        $coorContact = $form['phone_number'];
        $evaluationTHD = $form['evaluation'];

        // form / input validation
        $rule = array(
        // 0
        'type' => 'required|max_length[100]', 
        'category' => 'required|max_length[200]',
        'structured_training' => 'required|max_length[20]',
        'level' => 'required|max_length[10]', 
        'area' => 'required|max_length[200]', 
        'service_group' => 'max_length[10]',
        'training_title' => 'required|max_length[100]', 
        'training_description' => 'max_length[500]', 
        'venue' => 'max_length[100]',
        'country' => 'max_length[10]', 
        'state' => 'max_length[10]', 
        'date_from' => 'required|max_length[11]',
        'date_to' => 'required|max_length[11]', 
        'time_from' => 'required|max_length[11]', 
        'time_to' => 'required|max_length[11]',
        'total_hours' => 'required|max_length[12]', 
        'internal_external' => 'required|max_length[20]', 
        'sponsor' => 'required|max_length[100]',
        'offer' => 'max_length[1]', 
        'participants' => 'max_length[11]', 
        'online_application' => 'max_length[1]',
        'closing_date' => 'max_length[11]', 
        'competency_code' => 'max_length[10]', 
        'evaluation_period_from' => 'required|max_length[30]',
        'evaluation_period_to' => 'required|max_length[30]', 

        // TRAINING_HEAD_DETL
        'coordinator' => 'max_length[10]', 
        'coordinator_sector' => 'max_length[10]',
        'phone_number' => 'max_length[15]', 
        'evaluation' => 'max_length[1]', 
        
        // confirmation due info
        'confirmation_due_date_from' => 'required|max_length[11]', 'confirmation_due_date_to' => 'required|max_length[11]',
        
        // organizer info
        'organizer_level' => 'max_length[10]', 'organizer_name' => 'max_length[100]', 

        // completion info
        'evaluation_compulsary' => 'required|max_length[1]', 'attendance_type' => 'required|max_length[20]', 'print_certificate' => 'required|max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {
            $data['refID'] = $this->mdl->getRefID();

            if(!empty($data['refID'])){
                $refid = $data['refID']->TESTREFID;
                $insert = $this->mdl->insertTrainingHead($form, $refid);

                if ($insert > 0 && !empty($trCode)) {

                    $data['compt'] = $this->mdl->getStructuredTraining($trCode);
                    $data['resultTTG'] = $this->mdl->getResultTTG($trCode);
                    $data['resultTGS'] = $this->mdl->getResultTGS($trCode);
                    $insCount = 0; // tr grp
                    $insCount2 = 0; // tr grp service
                    $insertTHD = 0; // tr head detl
                    $insTHD = 0; // tr head detl

                    // insert CPD head
                    if(!empty($data['compt']->TTH_COMPETENCY)){
                        $competency = $data['compt']->TTH_COMPETENCY;
                    } else {
                        $competency = '';
                    }
                    $insertCPDHead = $this->mdl->insertCPDHead($refid, $competency); 

                    // insert training group
                    if(!empty($data['resultTTG'])){

                        foreach($data['resultTTG'] as $rtg){
                            $gpCode = $rtg->TTG_GROUP_CODE;

                            $insertTrainingTargetGroup = $this->mdl->insertTrainingTargetGroup($refid, $trCode, $gpCode);
                            $insCount++;
                        }
                    } else {
                        $insertTrainingTargetGroup = 0;
                    }

                    // insert training group service
                    if(!empty($data['resultTGS'])){
                        $insertTrainingGroupService = 0;

                        foreach($data['resultTGS'] as $rtgs){
                            $gpCode = $rtgs->TTG_GROUP_CODE;
                            $tgsSeq = $rtgs->TGS_SEQ;
                            $tgsSvcCode = $rtgs->TGS_SERVICE_CODE;

                            // verify if specific data already exist in training group service
                            $data['verifyTGS'] = $this->mdl->checkTGS($gpCode, $tgsSeq);

                            if(empty($data['verifyTGS'])){
                                $insertTrainingGroupService = $this->mdl->insertTrainingGroupService($gpCode, $tgsSeq, $tgsSvcCode);
                                $insCount2++;
                            }
                        }
                    } else {
                        $insertTrainingGroupService = 0;
                    }

                    // insert training head detail
                    if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD)) {
                        $insertTHD = $this->mdl->insertTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);
                        $insTHD++;
                    }

                    if($insertTrainingTargetGroup == $insCount && $insertTrainingGroupService == $insCount2 && $insertCPDHead > 0 && $insertTHD == $insTHD) {
                        $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid);
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                    }
                    
                }
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        
        //$this->renderAjax($data);
        echo json_encode($json);
    }


    /*_____________________
        UPDATE PROCESS
    _____________________*/
    public function editTraining()
    {
        $refID = $this->input->post('refID',true);
        $countCode = $this->input->post('countryCode',true);
        $organizerCode = $this->input->post('orgCode',true);
        
        if(!empty($refID)) {

            $data['trInfo'] = $this->mdl->getTrainingInfoDetail($refID);
            $data['trInfoDetl'] = $this->mdl->getmoduleSetup($refID);

            $data['type_list'] = $this->dropdown($this->mdl->getTypeList(), 'TT_CODE', 'TT_CODE_DESC', ' ---Please select--- ');
            $data['category'] = $this->dropdown($this->mdl->getCategoryList(), 'TC_CATEGORY', 'TC_CATEGORY', ' ---Please select--- ');
            $data['level'] = $this->dropdown($this->mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');
            $data['area'] = $this->dropdown($this->mdl->getAreaList(), 'TF_CODE', 'TF_CODE_DESC', ' ---Please select--- ');
            $data['sgroup'] = $this->dropdown($this->mdl->getSgroupList(), 'SG_GROUP_CODE', 'SG_CODE_DESC', ' ---Please select--- ');
            $data['count_list'] = $this->dropdown($this->mdl->getCountryList(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_DESC', ' ---Please select--- ');
            $data['com_lvl_code'] = $this->dropdown($this->mdl->getCompetencyLevel(), 'TCL_COMPETENCY_CODE', 'TCL_COMPETENCY_CODE_DESC', ' ---Please select--- ');
            $data['coor'] = $this->dropdown($this->mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
            $data['coor_sec'] = $this->dropdown($this->mdl->getCoordinatorSec(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');
            $data['org_lvl'] = $this->dropdown($this->mdl->getOrganizerLevel(), 'TOL_CODE', 'TOL_CODE_DESC', ' ---Please select--- ');
            $data['org_name'] = $this->dropdown($this->mdl->getOrganizerName(), 'TOH_ORG_CODE', 'TOH_ORG_CODE_DESC', ' ---Please select--- ');
            

            $data['count_def'] = $this->mdl->getCountryDef();

            $countCode2= 'MYS';
            if (!empty($countCode2) || !empty($countCode)) {
                $data['state_list'] = $this->dropdown($this->mdl->getCountryStateList($countCode2), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
            } else {
                $data['state_list'] = '';
            }

            if (!empty($organizerCode)) {
                $data['org_info'] = $this->mdl->getCountryStateList($countCode);
            } else {
                $data['org_info'] = '';
            }

            //$data['count_code'] = $countCode;
            //$data['org_code'] = $organizerCode;
            
            $this->renderAjax($data);
        }
    }

    public function saveUpdateTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refID = $form['training_refid'];
        //$data['countTG'] = $this->mdl->getCountTargetGroup($refID);

        // form / input validation
        $rule = array(
        'type' => 'required|max_length[100]',
        'category' => 'required|max_length[200]',
        'level' => 'required|max_length[10]', 
        'area' => 'required|max_length[200]', 
        'service_group' => 'max_length[10]',
        'training_title' => 'required|max_length[100]', 
        'training_description' => 'max_length[500]', 
        'venue' => 'max_length[100]',
        'country' => 'max_length[10]', 
        'state' => 'max_length[10]', 
        'date_from' => 'required|max_length[11]',
        'date_to' => 'required|max_length[11]', 
        'time_from' => 'required|max_length[11]', 
        'time_to' => 'required|max_length[11]',
        'total_hours' => 'required|max_length[12]', 
        'internal_external' => 'required|max_length[20]', 
        'sponsor' => 'required|max_length[100]',
        'offer' => 'max_length[1]', 
        'participants' => 'max_length[11]', 
        'online_application' => 'max_length[1]',
        'closing_date' => 'max_length[11]', 
        'competency_code' => 'max_length[10]', 
        'evaluation_period_from' => 'required|max_length[30]',
        'evaluation_period_to' => 'required|max_length[30]', 

        // TRAINING_HEAD_DETL
        'coordinator' => 'max_length[10]', 
        'coordinator_sector' => 'max_length[10]',
        'phone_number' => 'max_length[15]', 
        'evaluation' => 'max_length[1]', 
        
        // confirmation due info
        'confirmation_due_date_from' => 'required|max_length[11]', 'confirmation_due_date_to' => 'required|max_length[11]',
        
        // organizer info
        'organizer_level' => 'max_length[10]', 'organizer_name' => 'max_length[100]', 

        // completion info
        'evaluation_compulsary' => 'required|max_length[1]', 'attendance_type' => 'required|max_length[20]', 'print_certificate' => 'required|max_length[1]'
        );

        
        $exclRule = array('training_refid');     
        
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {
            $update = $this->mdl->updateTrainingHead($form, $refID);
                    
            if ($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has ' .$refID. ' been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // update structured training for training info
    public function setupStructuredTraining()
    {

        $data['str_tr'] = $this->mdl->getStructuredTraining();
        //$refID = $this->input->post('refID',true);

        //$data['str_tr'] = $this->dropdown($this->mdl->getStructuredTraining(), 'TTH_REF_ID', 'TTH_REF_TITLE', ' ---Please select--- ');
        /*if(!empty($refID)) {
            $data['refID'] = $refID;
            $data['strTrInfo'] = $this->mdl->getTrainingInfoDetail($refID);
            if(!empty($data['strTrInfo']->TH_TRAINING_CODE)){
                $data['cur_str_tr'] = $data['strTrInfo']->TH_TRAINING_CODE;
                $data['str_tr_detl'] = $this->mdl->getStructuredTraining($data['strTrInfo']->TH_TRAINING_CODE);

                $data['title'] = $data['str_tr_detl']->TTH_TRAINING_TITLE;
                $data['category'] = $data['str_tr_detl']->TTH_CATEGORY;
                $data['area'] = $data['str_tr_detl']->TTH_TF_FIELD_DESC;
                $data['type'] = $data['str_tr_detl']->TTH_TT_TYPE_DESC;
                $data['competency'] = $data['str_tr_detl']->TTH_COMPETENCY;
            } else {
                $data['cur_str_tr'] = '';

                $data['title'] = '';
                $data['category'] = '';
                $data['area'] = '';
                $data['type'] = '';
                $data['competency'] = '';
            }
            
        }*/


        $this->renderAjax($data);
    }

    /*public function saveUpdateStructuredTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refID = $form['training_refid'];
        $strRefID = $form['code'];
        //$data['countTG'] = $this->mdl->getCountTargetGroup($refID);

        // form / input validation
        $rule = array('code' => 'required|max_length[20]');

        
        $exclRule = array('training_refid');     
        
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {
            $update = $this->mdl->updateTrainingHeadStrTr($form, $refID);
                    
            if ($update > 0) {
                $insertTargetGroup = $this->mdl->insertStrTrTargetGroup($strRefID);
                //$insertGroupService = $this->mdl->insertStrTrGroupService($refID);
                if ($update > 0) {
                    $json = array('sts' => 1, 'msg' => 'ayy', 'alert' => 'success');
                }

                //$json = array('sts' => 1, 'msg' => 'Record has ' .$strRefID. ' been saved', 'alert' => 'success');
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }*/

}
