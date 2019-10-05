<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ext_training_appl extends MY_Controller
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ext_training_model', 'et_mdl');
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }

    // View Page Filter
    public function viewTabFilter($tabID, $sid = null)
    {
        // set session
        $this->session->set_userdata('tabID', $tabID);

        if($sid == 'ASF132') {
            redirect($this->class_uri('ASF132'));
        }
    }

    // TRAINING SETUP - EXTERNAL AGENCY
    public function ATF138()
    {   
        $this->render();
    }

    // SEARCH STAFF
    public function searchStaffMd() {
        $staff_id = $this->input->post('staff_id', true);
        $search_trigger = $this->input->post('search_trigger', true);

        if(!empty($staff_id) && $search_trigger == 1) {
            $data['stf_inf'] = $this->et_mdl->getStaffSearch($staff_id);
            $this->render($data);
        } elseif(empty($staff_id) && $search_trigger == 1) {
            $data['stf_inf'] = $this->et_mdl->getStaffList();
            $this->render($data);
        } else {
            $this->render();
        }
    }

    // AUTO SEARCH STAFF ID
    public function staffKeyUp()
    {  
        $this->isAjax();
        $staff_id = $this->input->post('staff_id', true);
        $found = 0;

        if (!empty($staff_id)) {
            $stf_inf = $this->et_mdl->getStaffList($staff_id);
            if(!empty($stf_inf->SM_STAFF_NAME)) {
                $found++;
                $stf_name = $stf_inf->SM_STAFF_NAME;
            } else {
                $stf_name = '';
            }
            
            if($found > 0) {
                $json = array('sts' => 1, 'msg' => 'Staff found', 'alert' => 'green', 'stf_name' => $stf_name);
            } else {
                $json = array('sts' => 0, 'msg' => 'Staff not found', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // FILE ATTACHMENT PARAM
    public function fileAttParam() {
        $this->isAjax();

        $mod = $this->input->post('mod', true);
        $this->session->set_userdata('mod', $mod);

        if($mod == "TR_SETUP") {
            $refid = $this->input->post('refid', true);

            $this->session->set_userdata('refid', $refid);

            $json = array('sts' => 1, 'msg' => 'Param assigned.', 'alert' => 'success');
        } else {
            $json = array('sts' => 0, 'msg' => 'Param not assigned', 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    // FILE ATTACHMENT URL
    public function fileAttachment() {
        $mod = $this->session->userdata('mod');

        if($mod == "TR_SETUP") {
            $refid = $this->session->userdata('refid');
            $curUser = $this->staff_id;

            $selUrl = $this->et_mdl->getEcommUrl();
            if(!empty($selUrl)) {
                $ecomm_url = $selUrl->HP_PARM_DESC;
            } else {
                $ecomm_url = '';
            }

            echo header('Location: '.$ecomm_url.'trainingAttachment.jsp?admsID='.$curUser.'&apRID='.$refid.'&apTy=APPL');
            exit;
        } 
    }

    /*===========================================================
       TRAINING SETUP FOR EXTERNAL AGENCY - ATF138
    =============================================================*/

    // TRAINING LIST
    public function trainingList()
    {   
        // get available records
        $data['tr_list'] = $this->et_mdl->getTrainingList();

        $this->render($data);
    }

    // ADD NEW TRAINING
    public function addTraining()
    {
        // type dd
        $data['type_list'] = $this->dropdown($this->et_mdl->getTypeList(), 'TT_CODE', 'TT_CODE_DESC', ' ---Please select--- ');

        // category dd
        $data['category'] = $this->dropdown($this->et_mdl->getCategoryList(), 'TC_CATEGORY', 'TC_CATEGORY', ' ---Please select--- ');

        // level dd
        $data['level'] = $this->dropdown($this->et_mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');

        // competency code
        // $data['com_lvl_code'] = $this->dropdown($this->et_mdl->getCompetencyLevel(), 'TCL_COMPETENCY_CODE', 'TCL_COMPETENCY_CODE_DESC', ' ---Please select--- ');

        // coordinator dd
        $data['coor'] = $this->dropdown($this->et_mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
        $data['coor_sec'] = $this->dropdown($this->et_mdl->getCoordinatorSec(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');

        // organizer dd
        $data['org_lvl'] = $this->dropdown($this->et_mdl->getOrganizerLevel(), 'TOL_CODE', 'TOL_CODE_DESC', ' ---Please select--- ');
        $data['org_name'] = $this->dropdown($this->et_mdl->getOrganizerName(), 'TOH_ORG_CODE', 'TOH_ORG_CODE_DESC', ' ---Please select--- ');

        // STATE DD
        $data['state_dd'] = $this->dropdown($this->et_mdl->getStateDD(), 'SM_STATE_CODE', 'SM_STATE_CD', ' ---Please select--- ');

        // CONTRY DD
        $data['country_dd'] = $this->dropdown($this->et_mdl->getCountryDD(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_CD', ' ---Please select--- ');
        
        $this->render($data);
    }

    // POPULATE ORGANIZER INFO
    public function organizerInfo()
    {
        $this->isAjax();
        
        $organizerCode = $this->input->post('orgCode', true);
        
        // get available records
        $organizerInfo = $this->et_mdl->getOrganizerName($organizerCode);
               
        if (!empty($organizerInfo)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'orgInfo' => $organizerInfo);
        
        echo json_encode($json);
    }

    // SAVE ADD TRAINING 
    public function saveNewTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $msgTH = '';
        $msgTHD = '';
        $successTH = 0;
        $successTHD = 1;

        // module setup
        $coor = strtoupper($form['coordinator']);
        $coorSeq = $form['coordinator_sector'];
        $coorContact = $form['phone_number'];
        $evaluationTHD = $form['evaluation'];
        $attention = $form['attention'];

        // evaluation period not/required
        if($evaluationTHD == 'Y') {
            $evaluationFrReq = 'required|max_length[30]';
            $evaluationToReq = 'required|max_length[30]';
        } else {
            $evaluationFrReq = 'max_length[30]';
            $evaluationToReq = 'max_length[30]';
        }

        // form / input validation
        $rule = array(
            'type' => 'required|max_length[100]', 
            'category' => 'required|max_length[200]',
            'level' => 'required|max_length[10]', 
            'training_title' => 'required|max_length[100]', 
            'training_description' => 'max_length[500]', 
            'venue' => 'max_length[100]',
            'country' => 'max_length[10]', 
            'state' => 'max_length[10]', 
            'date_from' => 'required|max_length[11]',
            'date_to' => 'required|max_length[11]', 
            'total_hours' => 'required|max_length[12]', 
            'fee' => 'numeric|max_length[12]', 
            'internal_external' => 'required|max_length[20]', 
            'sponsor' => 'max_length[100]',
            'participants' => 'max_length[11]', 
            'online_application' => 'max_length[1]',
            'closing_date' => 'max_length[11]', 
            // 'competency_code' => 'max_length[10]', 
            'evaluation_period_from' => $evaluationFrReq,
            'evaluation_period_to' => $evaluationToReq, 
            'attention' => 'max_length[500]', 

            // TRAINING_HEAD_DETL
            'coordinator' => 'max_length[10]', 
            'coordinator_sector' => 'max_length[10]',
            'phone_number' => 'max_length[15]', 
            'evaluation' => 'max_length[1]', 
            
            // organizer info
            'organizer_level' => 'max_length[10]', 
            'organizer_name' => 'max_length[100]', 
            'attention' => 'max_length[200]',

            // completion info
            'evaluation_compulsary' => 'max_length[1]', 
            'attendance_type' => 'max_length[20]', 
            'print_certificate' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {
            $data['refID'] = $this->et_mdl->getRefID();

            if(!empty($data['refID'])) {
                $refid = $data['refID']->REF_ID; 
                $title = $form['training_title'];

                // INSERT TRAINING HEAD
                $insert = $this->et_mdl->saveNewTraining($form, $refid);
                if($insert > 0) {
                    $msgTH = "Record has been saved (Training)";
                    $successTH = 1;
                } else {
                    $msgTH = "Fail to save record (Training)";
                    $successTH = 0;
                }

                // INSERT TRAINING HEAD DETL
                if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD) || !empty($attention)) {
                    $insert2 = $this->et_mdl->saveTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention);

                    if($insert2 > 0) {
                        $msgTHD = nl2br("\r\n").'<b><font color="green"><i class="fa fa-check"></i> Success </font></b>'."Record has been saved (Training Detail)";
                        $successTHD = 1;
                    } else {
                        $msgTHD = nl2br("\r\n").'<b><font color="white"><i class="fa fa-times"></i> Failed </font></b>'."Fail to save record (Training Detail)";
                        $successTHD = 0;
                    }
                } else {
                    $msgTHD = '';
                    $successTHD = 1;
                }

                if($successTH == 1 && $successTHD == 1) {
                    $json = array('sts' => 1, 'msg' => $msgTH.$msgTHD, 'alert' => 'success', 'refid' => $refid, 'title' => $title);
                } else {
                    $json = array('sts' => 0, 'msg' => $msgTH.$msgTHD, 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Could not generate refid!', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // EDIT TRAINING
    public function editTraining()
    {
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid; 
            $data['tr_info'] = $this->et_mdl->getTrainingHead($refid);
            if(!empty($data['tr_info'])) {
                $org_name = $data['tr_info']->TH_ORGANIZER_NAME;
                if(!empty($org_name)) {
                    $org_info = $this->et_mdl->getOrgInfoDetlEdit($org_name);
                    if(!empty($org_info)) {
                        $data['address'] = $org_info->TOH_ADDRESS;
                        $data['postcode'] = $org_info->TOH_POSTCODE;
                        $data['city'] = $org_info->TOH_CITY;
                        $data['state'] = $org_info->SM_STATE_DESC;
                        $data['country'] = $org_info->CM_COUNTRY_DESC;
                    } else {
                        $data['address'] = "";
                        $data['postcode'] = "";
                        $data['city'] = "";
                        $data['state'] = "";
                        $data['country'] = "";
                    }
                } else {
                    $data['address'] = "";
                    $data['postcode'] = "";
                    $data['city'] = "";
                    $data['state'] = "";
                    $data['country'] = "";
                }
            } 

            $data['thd_info'] = $this->et_mdl->getTrainingHeadDetl($refid);
            if(!empty($data['thd_info'])) {
                $data['coor_id'] = $data['thd_info']->THD_COORDINATOR;
                $data['coor_name'] = $data['thd_info']->SM_STAFF_NAME;
                $data['coor_sec_code'] = $data['thd_info']->THD_COORDINATOR_SECTOR;
                $data['coor_c'] = $data['thd_info']->THD_COORDINATOR_TELNO;
                $data['f_att'] = $data['thd_info']->THD_FOR_ATTENTION;
                $data['evaluation'] = $data['thd_info']->THD_EVALUATION;
            } else {
                $data['coor_id'] = "";
                $data['coor_name'] = "";
                $data['coor_sec_code'] = "";
                $data['coor_c'] = "";
                $data['f_att'] = "";
                $data['evaluation'] = "";
            }
        }


        // type dd
        $data['type_list'] = $this->dropdown($this->et_mdl->getTypeList(), 'TT_CODE', 'TT_CODE_DESC', ' ---Please select--- ');

        // category dd
        $data['category'] = $this->dropdown($this->et_mdl->getCategoryList(), 'TC_CATEGORY', 'TC_CATEGORY', ' ---Please select--- ');

        // level dd
        $data['level'] = $this->dropdown($this->et_mdl->getLevelList(), 'TL_CODE', 'TL_CODE_DESC', ' ---Please select--- ');

        // competency code
        $data['com_lvl_code'] = $this->dropdown($this->et_mdl->getCompetencyLevel(), 'TCL_COMPETENCY_CODE', 'TCL_COMPETENCY_CODE_DESC', ' ---Please select--- ');

        // coordinator dd
        $data['coor'] = $this->dropdown($this->et_mdl->getCoordinator(), 'SM_STAFF_ID', 'SM_STAFF_ID_NAME', ' ---Please select--- ');
        $data['coor_sec'] = $this->dropdown($this->et_mdl->getCoordinatorSec(), 'TSL_CODE', 'TSL_CODE_DESC', ' ---Please select--- ');

        // organizer dd
        $data['org_lvl'] = $this->dropdown($this->et_mdl->getOrganizerLevel(), 'TOL_CODE', 'TOL_CODE_DESC', ' ---Please select--- ');
        $data['org_name'] = $this->dropdown($this->et_mdl->getOrganizerName(), 'TOH_ORG_CODE', 'TOH_ORG_CODE_DESC', ' ---Please select--- ');

        // STATE DD
        $data['state_dd'] = $this->dropdown($this->et_mdl->getStateDD(), 'SM_STATE_CODE', 'SM_STATE_CD', ' ---Please select--- ');

        // CONTRY DD
        $data['country_dd'] = $this->dropdown($this->et_mdl->getCountryDD(), 'CM_COUNTRY_CODE', 'CM_COUNTRY_CD', ' ---Please select--- ');
        
        $this->render($data);
    }

    // SAVE EDIT TRAINING 
    public function saveEditTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $refid = $form['refid'];
        $msgTH = '';
        $msgTHD = '';
        $successTH = 0;
        $successTHD = 1;

        // module setup
        $coor = strtoupper($form['coordinator']);
        $coorSeq = $form['coordinator_sector'];
        $coorContact = $form['phone_number'];
        $evaluationTHD = $form['evaluation'];
        $attention = $form['attention'];

        // evaluation period not/required
        if($evaluationTHD == 'Y') {
            $evaluationFrReq = 'required|max_length[30]';
            $evaluationToReq = 'required|max_length[30]';
        } else {
            $evaluationFrReq = 'max_length[30]';
            $evaluationToReq = 'max_length[30]';
        }

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[20]', 
            'type' => 'required|max_length[100]', 
            'category' => 'required|max_length[200]',
            'level' => 'required|max_length[10]', 
            'training_title' => 'required|max_length[100]', 
            'training_description' => 'max_length[500]', 
            'venue' => 'max_length[100]',
            'country' => 'max_length[10]', 
            'state' => 'max_length[10]', 
            'date_from' => 'required|max_length[11]',
            'date_to' => 'required|max_length[11]', 
            'total_hours' => 'required|max_length[12]', 
            'fee' => 'numeric|max_length[12]', 
            'internal_external' => 'required|max_length[20]', 
            'sponsor' => 'max_length[100]',
            'participants' => 'max_length[11]', 
            'online_application' => 'max_length[1]',
            'closing_date' => 'max_length[11]', 
            // 'competency_code' => 'max_length[10]', 
            'evaluation_period_from' => $evaluationFrReq,
            'evaluation_period_to' => $evaluationToReq, 
            'attention' => 'max_length[500]', 

            // TRAINING_HEAD_DETL
            'coordinator' => 'max_length[10]', 
            'coordinator_sector' => 'max_length[10]',
            'phone_number' => 'max_length[15]', 
            'evaluation' => 'max_length[1]', 
            
            // organizer info
            'organizer_level' => 'max_length[10]', 
            'organizer_name' => 'max_length[100]', 
            'attention' => 'max_length[200]',

            // completion info
            'evaluation_compulsary' => 'max_length[1]', 
            'attendance_type' => 'max_length[20]', 
            'print_certificate' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        // Begin Insert New Record
        if ($status == 1) {

            // UPDATE TRAINING HEAD
            $update = $this->et_mdl->saveEditTraining($form, $refid);
            if($update > 0) {
                $msgTH = "Record has been saved (Training)";
                $successTH = 1;
            } else {
                $msgTH = "Fail to save record (Training)";
                $successTH = 0;
            }

            // UPDATE TRAINING HEAD DETL
            if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD) || !empty($attention)) {
                $update2 = $this->et_mdl->saveUpdTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention);

                if($update2 > 0) {
                    $msgTHD = nl2br("\r\n").'<b><font color="green"><i class="fa fa-check"></i> Success </font></b>'."Record has been saved (Training Detail)";
                    $successTHD = 1;
                } else {
                    $msgTHD = nl2br("\r\n").'<b><font color="white"><i class="fa fa-times"></i> Failed </font></b>'."Fail to save record (Training Detail)";
                    $successTHD = 0;
                }
            } else {
                $msgTHD = '';
                $successTHD = 1;
            }

            if($successTH == 1 && $successTHD == 1) {
                $json = array('sts' => 1, 'msg' => $msgTH.$msgTHD, 'alert' => 'success', 'refid' => $refid);
            } else {
                $json = array('sts' => 0, 'msg' => $msgTH.$msgTHD, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // TRAINING COST
    public function trainingCost()
    {   
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $data['tr_info'] = $this->et_mdl->getTrainingHead($refid);
        } else {
            $data['refid'] = "";
        }

        // get available records
        $data['tr_cost'] = $this->et_mdl->getTrainingCost($refid);

        $this->render($data);
    }

    // ADD TRAINING COST
    public function addTrainingCost()
    {   
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
        } else {
            $data['refid'] = "";
        }

        // cost code dd
        $data['c_code'] = $this->dropdown($this->et_mdl->getCostCodeDd(), 'TCT_CODE', 'TCT_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE ADD TRAINING COST
    public function saveNewTrCost()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $cost_code = $form['cost_code'];
        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]', 
            'cost_code' => 'required|max_length[10]', 
            'amount' => 'required|numeric|max_length[40]',
            'remark' => 'max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {

            $check = $this->et_mdl->getTrainingCostDetl($refid, $cost_code);

            if(empty($check)) {

                // INSERT TRAINING_COST
                $insert = $this->et_mdl->saveNewTrCost($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid);
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

    // EDIT TRAINING COST
    public function editTrainingCost()
    {   
        $refid = $this->input->post('refid', true);
        $code = $this->input->post('code', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
        } else {
            $data['refid'] = "";
        }

        if(!empty($code)) {
            $data['code'] = $code;
        } else {
            $data['code'] = "";
        }

        $data['cost_detl'] = $this->et_mdl->getTrainingCostDetl($refid, $code);

        // cost code dd
        $data['c_code'] = $this->dropdown($this->et_mdl->getCostCodeDd(), 'TCT_CODE', 'TCT_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SAVE UPDATE TRAINING COST
    public function saveUpdTrCost()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $cost_code = $form['cost_code'];
        // form / input validation
        $rule = array( 
            'amount' => 'required|numeric|max_length[40]',
            'remark' => 'max_length[200]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {

            // UPDATE TRAINING_COST
            $update = $this->et_mdl->saveUpdTrCost($form);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE TRAINING COST
    public function deleteTrainingCost() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $code = $this->input->post('code', true);
        
        if (!empty($refid) && !empty($code)) {
            $del = $this->et_mdl->deleteTrainingCost($refid, $code);
        
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

    // DELETE TRAINING INFO
    public function deleteTraining() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        //$tgsSeq = $this->input->post('tgsSeq', true);
        
        if (!empty($refid)) {

            // check training head detl
            $delVerify1 = $this->et_mdl->delVerify1($refid);

            // check cpd head
            $delVerify2 = $this->et_mdl->delVerify2($refid);

            // check training target group
            $delVerify3 = $this->et_mdl->delVerify3($refid);

            // check training cost
            $delVerify4 = $this->et_mdl->delVerify4($refid);

            // check training attachment
            $delVerify5 = $this->et_mdl->delVerify5($refid);

            if(empty($delVerify1) && empty($delVerify2) && empty($delVerify3) && empty($delVerify4) && empty($delVerify5)) {
                $del = $this->et_mdl->delTrainingInfo($refid);
            
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Cannot delete master record when matching detail records exist. Please make sure to delete records in <b><font color="red">Module Setup</font></b>, <b><font color="red">CPD Setup</font></b>, <b><font color="red">Target Group</font></b>, <b><font color="red">Training Cost</font></b>, and <b><font color="red">Training File Attachment</font></b> first!', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }
    
}
