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

        $this->renderAjax($data);
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
        $tsRefID = $this->input->post('trRefID', true);
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

    // Populate speaker list
    public function speakerList(){
        $this->isAjax();
        
        $trSpeakerCode = $this->input->post('trSpeakerCode', true);
        $tpSpeaker = $this->input->post('tpSpeaker', true);

        if(!empty($trSpeakerCode)) {
            if($tpSpeaker == 'STAFF') {
                $spList = $this->mdl->getSpeakerList($tpSpeaker, $trSpeakerCode);
                   
                if (!empty($spList)) {
                    $success = 1;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'spList' => $spList);
            } 
            elseif($tpSpeaker == 'EXTERNAL') {
                $spList = $this->mdl->getSpeakerList($tpSpeaker, $trSpeakerCode);
                   
                if (!empty($spList)) {
                    $success = 2;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'spList' => $spList);
            } 
            else {
                $spList = '';
                $success = 0;
                
                $json = array('sts' => $success, 'spList' => $spList);
            }
        }
        
        // get available records
        if(empty($trSpeakerCode)) {
            if($tpSpeaker == 'STAFF') {
                $spList = $this->mdl->getSpeakerList($tpSpeaker);
                   
                if (!empty($spList)) {
                    $success = 1;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'spList' => $spList);
            } 
            elseif($tpSpeaker == 'EXTERNAL') {
                $spList = $this->mdl->getSpeakerList($tpSpeaker);
                   
                if (!empty($spList)) {
                    $success = 2;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'spList' => $spList);
            } 
            else {
                $spList = '';
                $success = 0;
                
                $json = array('sts' => $success, 'spList' => $spList);
            }
        }
        
        echo json_encode($json);
    }

    // Populate facilitator list
    public function facilitatorList(){
        $this->isAjax();
        
        //$trSpeakerCode = $this->input->post('trSpeakerCode', true);
        $tpFacilitator = $this->input->post('tpFacilitator', true);

        // if(!empty($trSpeakerCode)) {
        //     if($tpSpeaker == 'STAFF') {
        //         $spList = $this->mdl->getSpeakerList($tpSpeaker, $trSpeakerCode);
                   
        //         if (!empty($spList)) {
        //             $success = 1;
        //         } else {
        //             $success = 0;
        //         }
                
        //         $json = array('sts' => $success, 'spList' => $spList);
        //     } 
        //     elseif($tpSpeaker == 'EXTERNAL') {
        //         $spList = $this->mdl->getSpeakerList($tpSpeaker, $trSpeakerCode);
                   
        //         if (!empty($spList)) {
        //             $success = 2;
        //         } else {
        //             $success = 0;
        //         }
                
        //         $json = array('sts' => $success, 'spList' => $spList);
        //     } 
        //     else {
        //         $spList = '';
        //         $success = 0;
                
        //         $json = array('sts' => $success, 'spList' => $spList);
        //     }
        // }
        
        // get available records
        if(!empty($tpFacilitator)) {
            if($tpFacilitator == 'STAFF') {
                $fiList = $this->mdl->getFacilitatorList($tpFacilitator);
                   
                if (!empty($fiList)) {
                    $success = 1;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'fiList' => $fiList);
            } 
            elseif($tpFacilitator == 'EXTERNAL') {
                $fiList = $this->mdl->getFacilitatorList($tpFacilitator);
                   
                if (!empty($fiList)) {
                    $success = 2;
                } else {
                    $success = 0;
                }
                
                $json = array('sts' => $success, 'fiList' => $fiList);
            } 
            else {
                $fiList = '';
                $success = 0;
                
                $json = array('sts' => $success, 'fiList' => $fiList);
            }
        }
        
        echo json_encode($json);
    }

    // Populate target group details
    public function tgList(){
        $this->isAjax();
        
        $groupCode = $this->input->post('grpCode', true);
        
        // get available records
        if(!empty($groupCode)) {
            $tgList = $this->mdl->getTargetGroupList($groupCode);
                
            if (!empty($tgList)) {
                $success = 1;
            } else {
                $success = 0;
            }
            
            $json = array('sts' => $success, 'tgList' => $tgList);
            
        } else {
            $tgList = '';
            $success = 0;
            
            $json = array('sts' => $success, 'tgList' => $tgList);
        }
        
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

    // add training info
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

        // training name
        $trName = $form['training_title'];

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

                    $insTrHeadMsg = 'TRAINING_HEAD success! ';

                    $data['compt'] = $this->mdl->getStructuredTraining($trCode);
                    $data['resultTTG'] = $this->mdl->getResultTTG($trCode);
                    $data['resultTGS'] = $this->mdl->getResultTGS($trCode);
                    $insCount = 0; // tr grp
                    $insCount2 = 0; // tr grp service
                    $insertTHD = 0; // tr head detl
                    $insTHD = 0; // tr head detl

                    // INSERT CPD HEAD
                    if(!empty($data['compt']->TTH_COMPETENCY)){
                        $competency = $data['compt']->TTH_COMPETENCY;
                    } else {
                        $competency = '';
                    }
                    $insertCPDHead = $this->mdl->insertCPDHead($refid, $competency); 

                    if($insertCPDHead > 0) {
                        $insCpdHeadMsg = 'CPD_HEAD success! ';
                    } 
                    else {
                        $insCpdHeadMsg = '';
                    }

                    // INSERT TRAINING GROUP
                    if(!empty($data['resultTTG'])){

                        foreach($data['resultTTG'] as $rtg){
                            $gpCode = $rtg->TTG_GROUP_CODE;

                            $insertTrainingTargetGroup = $this->mdl->insertTrainingTargetGroup($refid, $gpCode);
                            $insCount++;
                        }
                    } else {
                        $insertTrainingTargetGroup = 0;
                    }

                    if($insertTrainingTargetGroup == $insCount) {
                        $insTTGMsg = 'TRAINING_TARGET_GROUP success! ';
                    } else {
                        $insTTGMsg = '';
                    }

                    // INSERT TRAINING GROUP SERVICE
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

                    if($insertTrainingGroupService == $insCount2) {
                        $insTGSMsg = 'TRAINING_GROUP_SERVICE success! ';
                    } else {
                        $insTGSMsg = '';
                    }

                    // INSERT TRAINING HEAD DETAIL
                    if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD)) {
                        $insertTHD = $this->mdl->insertTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);
                        $insTHD++;
                    }

                    if($insertTHD == $insTHD) {
                        $insTHDMsg = 'TRAINING_HEAD_DETL success! ';
                    } else {
                        $insTHDMsg = '';
                    }

                    $stsMsg = nl2br("\n".$insTrHeadMsg."\n".$insCpdHeadMsg."\n".$insTTGMsg."\n".$insTGSMsg."\n".$insTHDMsg);
                    $json = array('sts' => 1, 'msg' => nl2br("Record has been saved \n".$stsMsg), 'alert' => 'success', 'refid' => $refid, 'trName' => $trName);
                }
                else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        
        //$this->renderAjax($data);
        echo json_encode($json);
    }

    // add training speaker
    public function addTrainingSpeaker()
    {
        $refid = $this->input->post('RefID', true);
        $tpSpeaker = $this->input->post('tpSpeaker', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
        }

        if ($tpSpeaker == 'STAFF') {
            $data['speaker_list'] = $this->dropdown($this->mdl->getSpeakerList($tpSpeaker), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        } 
        elseif($tpSpeaker == 'EXTERNAL') {
            $data['speaker_list'] = $this->dropdown($this->mdl->getSpeakerList($tpSpeaker), 'ES_SPEAKER_ID', 'ES_SPEAKER_ID_NAME', ' ---Please select--- ');
        } else {
            $data['speaker_list'] = '';
        }

        $this->renderAjax($data);
    }

    // save training speaker    
    public function saveTrainingSpeaker()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // SPEAKER ID
        $spID = $form['speaker'];

        // form / input validation
        $rule = array(
        'type' => 'required|max_length[20]', 
        'speaker' => 'required|max_length[10]',
        'department' => 'required|max_length[100]',
        'contact_phone_no' => 'max_length[15]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check training speaker
            $check = $this->mdl->checkTrainingSpeaker($refid, $spID);

            if(empty($check)) {
                $insert = $this->mdl->insertTrainingSpeaker($form, $refid);

                if($insert > 0) {
                    $sp_row = $this->SpRow($refid, $spID);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'sp_row' => $sp_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // training speaker row
    private function SpRow($refid, $spID){
        $data['refid'] = $refid;
        $data['speakerInfoExternal'] = $this->mdl->getSpeakerInfoExternal($refid, $spID);
        $data['speakerInfoStaff'] = $this->mdl->getSpeakerInfoStaff($refid, $spID);
		
		return $this->load->view('Training_application/SpRow', $data, true);	
    }

    // add training facilitator
    public function addTrainingFacilitator()
    {
        $refid = $this->input->post('RefID', true);
        $tpFacilitator = $this->input->post('tpFacilitator', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
        }

        if ($tpFacilitator == 'STAFF') {
            $data['facilitator_list'] = $this->dropdown($this->mdl->getFacilitatorList($tpFacilitator), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        } 
        elseif($tpFacilitator == 'EXTERNAL') {
            $data['facilitator_list'] = $this->dropdown($this->mdl->getFacilitatorList($tpFacilitator), 'EF_FACILITATOR_ID', 'ES_FACILITATOR_ID_NAME', ' ---Please select--- ');
        } else {
            $data['facilitator_list'] = '';
        }

        $this->renderAjax($data);
    }

    // save training facilitator    
    public function saveTrainingFacilitator()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // FACILITATOR ID
        $fiID = $form['facilitator'];

        // form / input validation
        $rule = array(
            'type' => 'required|max_length[20]', 
            'facilitator' => 'required|max_length[10]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            // check training speaker
            $check = $this->mdl->checkTrainingFacilitator($refid, $fiID);

            if(empty($check)) {
                $insert = $this->mdl->insertTrainingFacilitator($form, $refid);

                if($insert > 0) {
                    $fi_row = $this->FiRow($refid, $fiID);

                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'fi_row' => $fi_row);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Record already exist', 'alert' => 'danger');
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // training facilitator row
    private function FiRow($refid, $fiID){
        $data['refid'] = $refid;
        $data['facilitatorInfoExternal'] = $this->mdl->getFacilitatorInfoExternal($refid, $fiID);
        $data['facilitatorInfoStaff'] = $this->mdl->getFacilitatorInfoStaff($refid, $fiID);
		
		return $this->load->view('Training_application/FiRow', $data, true);	
    }

    // add target group
    public function addTargetGroup()
    {
        $refid = $this->input->post('RefID', true);

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['tg_list'] = $this->dropdown($this->mdl->getTargetGroupList(), 'TG_GROUP_CODE', 'TG_GROUP_CODE_DESC', ' ---Please select--- ');
        }

        $this->renderAjax($data);
    }


    /*_____________________
        UPDATE PROCESS
    _____________________*/

    // update training head
    public function editTraining()
    {
        $refID = $this->input->post('refID',true);
        $countCode = $this->input->post('countryCode',true);
        $organizerCode = $this->input->post('orgCode',true);
        
        if(!empty($refID)) {

            $data['trInfo'] = $this->mdl->getTrainingInfoDetail($refID);
            if(!empty($data['trInfo']->TH_ORGANIZER_NAME)) {
                $data['trOrg'] = $this->mdl->getOrganizerName($data['trInfo']->TH_ORGANIZER_NAME);
                if(!empty($data['trOrg'])) {
                    $data['OrgAdd'] = $data['trOrg']->TOH_ADDRESS;
                    $data['OrgPost'] = $data['trOrg']->TOH_POSTCODE;
                    $data['OrgCity'] = $data['trOrg']->TOH_CITY;
                    $data['OrgState'] = $data['trOrg']->SM_STATE_DESC;
                    $data['OrgCountry'] = $data['trOrg']->CM_COUNTRY_DESC;
                } 
            } else {
                $data['OrgAdd'] = '';
                $data['OrgPost'] = '';
                $data['OrgCity'] = '';
                $data['OrgState'] = '';
                $data['OrgCountry'] = '';
            }
            

            $data['trInfoDetl'] = $this->mdl->getTrHeadDetl($refID);
            if (!empty($data['trInfoDetl'])) {
                $data['coordinator'] = $data['trInfoDetl']->THD_COORDINATOR;
                $data['coor_sector'] = $data['trInfoDetl']->THD_COORDINATOR_SECTOR;
                $data['coor_p_no'] = $data['trInfoDetl']->THD_COORDINATOR_TELNO;
                $data['evaluation'] = $data['trInfoDetl']->THD_EVALUATION;
            } else {
                $data['coordinator'] = '';
                $data['coor_sector'] = '';
                $data['coor_p_no'] = '';
                $data['evaluation'] = '';
            }

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
            
        }

        $this->renderAjax($data);
    }

    // save update training head
    public function saveUpdateTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // training refid
        $refid = $form['training_refid'];

        // TH_TRAINING_CODE
        $trCode = $form['structured_training'];

        // module setup
        $coor = $form['coordinator'];
        $coorSeq = $form['coordinator_sector'];
        $coorContact = $form['phone_number'];
        $evaluationTHD = $form['evaluation'];

        // form / input validation
        $rule = array(
        // training info
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

            if(!empty($refid)){
                //$refid = $data['refID']->TESTREFID;
                $insert = $this->mdl->updateTrainingHead($form, $refid);

                if ($insert > 0 && !empty($trCode)) {

                    $updTrHeadMsg = 'TRAINING_HEAD success! ';

                    $data['compt'] = $this->mdl->getStructuredTraining($trCode);
                    $data['resultTTG'] = $this->mdl->getResultTTG($trCode);
                    $data['resultTGS'] = $this->mdl->getResultTGS($trCode);
                    $insCount = 0; // tr grp
                    $insCount2 = 0; // tr grp service
                    $insertTHD = 0; // tr head detl
                    $updTHD = 0; // tr head detl

                    // update CPD head
                    if(!empty($data['compt']->TTH_COMPETENCY)){
                        $competency = $data['compt']->TTH_COMPETENCY;
                    } else {
                        $competency = '';
                    }
                    $updatetCPDHead = $this->mdl->updateCPDHead($refid, $competency); 

                    if($updatetCPDHead > 0) {
                        $updCpdHeadMsg = 'CPD_HEAD success! ';
                    } 
                    else {
                        $updCpdHeadMsg = '';
                    }

                    // insert training group
                    if(!empty($data['resultTTG'])){

                        foreach($data['resultTTG'] as $rtg){
                            $gpCode = $rtg->TTG_GROUP_CODE;

                            // verify if specific data already exist in training group
                            $checkTrGroup = $this->mdl->getTargetGroup($refid, $gpCode);

                            if(empty($checkTrGroup)) {
                                $insertTrainingTargetGroup = $this->mdl->insertTrainingTargetGroup($refid, $gpCode);
                                $insCount++;
                            }
                            else {
                                $insertTrainingTargetGroup = 0;
                                $insCount = 0;
                            }
                        }
                    } else {
                        $insertTrainingTargetGroup = 0;
                    }

                    if($insertTrainingTargetGroup == $insCount) {
                        $insTTGMsg = 'TRAINING_TARGET_GROUP success! ';
                    } else {
                        $insTTGMsg = '';
                    }

                    // insert training group service
                    if(!empty($data['resultTGS'])){

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
                            else {
                                $insertTrainingGroupService = 0;
                                $insCount2 = 0;
                            }
                        }
                    } else {
                        $insertTrainingGroupService = 0;
                    }

                    if($insertTrainingGroupService == $insCount2) {
                        $insTGSMsg = 'TRAINING_GROUP_SERVICE success! ';
                    } else {
                        $insTGSMsg = '';
                    }

                    // update training head detail
                    $updateTHD = $this->mdl->updateTrainingHeadDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD);

                    if($updateTHD > 0) {
                        $updTHD++;
                    } else {
                        $updateTHD = 0;
                    }

                    if($updateTHD == $updTHD) {
                        $updTHDMsg = 'TRAINING_HEAD_DETL success! ';
                    } else {
                        $updTHDMsg = '';
                    }


                    $stsMsg = nl2br("\n".$updTrHeadMsg."\n".$updCpdHeadMsg."\n".$insTTGMsg."\n".$insTGSMsg."\n".$updTHDMsg);
                    $json = array('sts' => 1, 'msg' => nl2br("Record has been saved \n".$stsMsg), 'alert' => 'success');
                }
                else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } 
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        
        //$this->renderAjax($data);
        echo json_encode($json);
    }

    // update training speaker
    public function editTrainingSpeaker()
    {
        $refid = $this->input->post('refid', true);
        $spType = $this->input->post('spType', true);
        $spID = $this->input->post('spID', true);
        

        if(!empty($refid)){
            $data['refid'] = $refid;
            $data['sp_info'] = $this->mdl->checkTrainingSpeaker($refid, $spID);

            if ($spType == 'STAFF') {
                $data['telno'] = $this->mdl->getSpeakerList($spType, $spID);
                $data['sp_telno'] =  $data['telno']->SM_DEPT_CODE;
            } elseif($spType == 'EXTERNAL') {
                $data['telno'] = $this->mdl->getSpeakerList($spType, $spID);
                $data['sp_telno'] =  $data['telno']->ES_DEPT;
            }
        }

        if ($spType == 'STAFF') {
            $data['speaker_list'] = $this->dropdown($this->mdl->getSpeakerList($spType), 'SM_STAFF_ID', 'STAFF_ID_NAME', ' ---Please select--- ');
        } 
        elseif($spType == 'EXTERNAL') {
            $data['speaker_list'] = $this->dropdown($this->mdl->getSpeakerList($spType), 'ES_SPEAKER_ID', 'ES_SPEAKER_ID_NAME', ' ---Please select--- ');
        } else {
            $data['speaker_list'] = '';
        }

        $this->renderAjax($data);
    }
    
    // save update training speaker
    public function saveUpdateTrainingSpeaker() {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        // TRAINING REF ID
        $refid = $form['refid'];

        // SPEAKER ID
        $spID = $form['speaker'];

        // form / input validation
        $rule = array(
            'contact_phone_no' => 'max_length[15]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1 && !empty($refid)) {
            $update = $this->mdl->updateTrainingSpeaker($form, $refid, $spID);

            if($update > 0) {
                $sp_row = $this->mdl->checkTrainingSpeaker($refid, $spID);

                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'sp_row' => $sp_row);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*_____________________
        DELETE PROCESS
    _____________________*/
    
    // DELETE TRAINING SPEAKER
    public function deleteTrainingSpeaker() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $spID = $this->input->post('spID', true);
        
        if (!empty($refid) && !empty($spID)) {
        	$del = $this->mdl->delTrainingSpeaker($refid, $spID);
            
        	if ($del > 0) {
          		$json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
        	} else {
          		$json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
        	}
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // DELETE TRAINING FACILITATOR
    public function deleteTrainingFacilitator() {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $fiID = $this->input->post('fiID', true);
        
        if (!empty($refid) && !empty($fiID)) {
        	$del = $this->mdl->delTrainingFacilitator($refid, $fiID);
            
        	if ($del > 0) {
          		$json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
        	} else {
          		$json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
        	}
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }


    // select table modal structured training
    public function setupStructuredTraining()
    {

        $data['str_tr'] = $this->mdl->getStructuredTraining();


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
