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

    // APPROVE TRAINING SETUP FOR EXTERNAL AGENCY
    public function ATF139()
    {
        $data['month'] = $this->et_mdl->getCurDate();
        $data['year'] = $this->et_mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->et_mdl->getYearListAppTr(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->et_mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        // CURRENT USER DEPT
        $usr_dept = $this->et_mdl->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->et_mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        $data['dept_list'] = $this->dropdown($this->et_mdl->getPopulateDept($deptCode), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');

        // CURRENT USER DEPT
        // $usr_dept = $this->et_mdl->currentUsrDept();
        // if(!empty($usr_dept)) {
        //     $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        //     if($data['curr_dept'] == 'BSM') {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptAll(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     } else {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptBased(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     }
        // } else {
        //     $data['curr_dept'] = '';
        //     $data['dept_list'] = array(''=>'');
        // }

        $this->render($data);
    }

    // EDIT APPROVED TRAINING SETUP FOR EXTERNAL AGENCY
    public function ATF140()
    {
        $data['month'] = $this->et_mdl->getCurDate();
        $data['year'] = $this->et_mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->et_mdl->getYearListEdtAppTr(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->et_mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        // CURRENT USER DEPT
        $usr_dept = $this->et_mdl->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->et_mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        $data['dept_list'] = $this->dropdown($this->et_mdl->getPopulateDept($deptCode), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');

        // CURRENT USER DEPT
        // $usr_dept = $this->et_mdl->currentUsrDept();
        // if(!empty($usr_dept)) {
        //     $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        //     if($data['curr_dept'] == 'BSM') {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptAll(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     } else {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptBased(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     }
        // } else {
        //     $data['curr_dept'] = '';
        //     $data['dept_list'] = array(''=>'');
        // }

        $this->render($data);
    }

    // APPROVE TRAINING APPLICATIONS FOR EXTERNAL AGENCY
    public function ATF141()
    {
        $data['month'] = $this->et_mdl->getCurDate();
        $data['year'] = $this->et_mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->et_mdl->getYearListAppTr(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->et_mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        // CURRENT USER DEPT
        $usr_dept = $this->et_mdl->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->et_mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        $data['dept_list'] = $this->dropdown($this->et_mdl->getPopulateDept($deptCode), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');

        // CURRENT USER DEPT
        // $usr_dept = $this->et_mdl->currentUsrDept();
        // if(!empty($usr_dept)) {
        //     $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        //     if($data['curr_dept'] == 'BSM') {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptAll(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     } else {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptBased(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     }
        // } else {
        //     $data['curr_dept'] = '';
        //     $data['dept_list'] = array(''=>'');
        // }

        $this->render($data);
    }

    // ASSIGN TRAINING COST TO STAFF
    public function ATF029()
    {
        $data['month'] = $this->et_mdl->getCurDate();
        $data['year'] = $this->et_mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->et_mdl->getYearListTrCost(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->et_mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        // CURRENT USER DEPT
        $usr_dept = $this->et_mdl->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->et_mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        $data['dept_list'] = $this->dropdown($this->et_mdl->getPopulateDept($deptCode), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');

        // if(!empty($usr_dept)) {
            

        //     if($data['curr_dept'] == 'BSM') {
                
        //     } else {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptBased2(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     }
        // } else {
        //     $data['curr_dept'] = '';
        //     $data['dept_list'] = array(''=>'');
        // }

        $this->render($data);
    }

    // APPROVE TRAINING BY MPE FOR EXTERNAL AGENCY
    public function ATF143()
    {
        $data['month'] = $this->et_mdl->getCurDate();
        $data['year'] = $this->et_mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->et_mdl->getYearListAppTr2(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->et_mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        // CURRENT USER DEPT
        $usr_dept = $this->et_mdl->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->et_mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        $data['dept_list'] = $this->dropdown($this->et_mdl->getPopulateDept($deptCode), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');

        // CURRENT USER DEPT
        // $usr_dept = $this->et_mdl->currentUsrDept();
        // if(!empty($usr_dept)) {
        //     $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        //     if($data['curr_dept'] == 'BSM') {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptAll(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     } else {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptBased(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     }
        // } else {
        //     $data['curr_dept'] = '';
        //     $data['dept_list'] = array(''=>'');
        // }

        $this->render($data);
    }

    // ASSIGN TRAINING FOR EXTERNAL AGENCY
    public function ATF142()
    {
        $data['month'] = $this->et_mdl->getCurDate();

        $data['cur_month'] = $data['month']->SYSDATE_MM;  
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->et_mdl->getYearListAppTr2(), 'CM_YEAR', 'CM_YEAR', ' ---Please select--- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->et_mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' ---Please select--- ');

        // CURRENT USER DEPT
        $usr_dept = $this->et_mdl->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->et_mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        $data['dept_list'] = $this->dropdown($this->et_mdl->getPopulateDept($deptCode), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');

        // CURRENT USER DEPT
        // $usr_dept = $this->et_mdl->currentUsrDept();
        // if(!empty($usr_dept)) {
        //     $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        //     if($data['curr_dept'] == 'BSM') {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptAll(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     } else {
        //         $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptBased(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');
        //     }
        // } else {
        //     $data['curr_dept'] = '';
        //     $data['dept_list'] = array(''=>'');
        // }

        $this->render($data);
    }

    // ASSIGN TRAINING FOR EXTERNAL AGENCY
    public function ATF144()
    {
        $this->render();
    }


    // SEARCH STAFF
    public function searchStaffMd() 
    {
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
    public function fileAttParam() 
    {
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
    public function fileAttachment() 
    {
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

    // SET REPORT PARAM oracle
    public function setRepParam() 
    {
		$this->isAjax();
		
		$repCode = $this->input->post('repCode', true);
		$param = '';
		
		if ($repCode == 'ATR281') {
			$refid = $this->input->post('refid', true);
			$staff_id = $this->input->post('staff_id', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO','training_refid'=>$refid,'staffID'=>$staff_id));
        } elseif ($repCode == 'ATR238') {
			$refid = $this->input->post('refid', true);
            $staff_id = $this->input->post('staff_id', true);
            $ref_no = $this->input->post('ref_no', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO','TRAINING_REFID'=>$refid,'STAFFID'=>$staff_id, 'RUJUKAN'=>$ref_no));
        } elseif ($repCode == 'ATR231') {
			$month = $this->input->post('month', true);
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $sts = $this->input->post('sts', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO', 'DEPARTMENT'=>$dept, 'TRAINING_YEAR'=>$year, 'STATUS'=>$sts, 'TRAINING_MM'=>$month));
        } elseif ($repCode == 'ATR232') {
			$month = $this->input->post('month', true);
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $sts = $this->input->post('sts', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO', 'DEPARTMENT'=>$dept, 'TRAINING_YEAR'=>$year, 'STATUS'=>$sts, 'TRAINING_MM'=>$month));
        } elseif ($repCode == 'ATR233') {
			$month = $this->input->post('month', true);
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO', 'DEPARTMENT'=>$dept, 'TRAINING_YEAR'=>$year, 'TRAINING_MM'=>$month));
        } elseif ($repCode == 'ATR234') {
			$month = $this->input->post('month', true);
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO', 'DEPARTMENT'=>$dept, 'TRAINING_YEAR'=>$year, 'TRAINING_MM'=>$month));
        } elseif ($repCode == 'ATR235') {
			$month = $this->input->post('month', true);
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $fee_code = $this->input->post('fee_code', true);
            $repFormat = 'PDF';

			$param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$repFormat,'PARAMFORM' => 'NO', 'DEPARTMENT'=>$dept, 'TRAINING_YEAR'=>$year, 'TRAINING_MM'=>$month, 'FEE_CODE'=>$fee_code));
        }
		
		$json = array('report' => $param);
		
		echo json_encode($json);		
    } 
    
    // GENERATE REPORT oracle
    // public function report()
    // {
	// 	$report = $this->encryption->decrypt_array($this->input->get('r'));
	// 	$this->lib->generate_report($report, false);
    // }

    // GENERATE REPORT (JASPER)
    public function report() 
    {
        // Load jasperreport library
        $this->load->library('jasperreport');
		
		// get report parameters
		$param = $this->encryption->decrypt_array($this->input->get('r'));
		
		// get report code
		$repCode = isset($param['REPORT'])?strtoupper($param['REPORT']):'';
		$format = isset($param['repFormat'])?strtolower($param['repFormat']):'pdf';
        
		// for report format = excel / word, report will be downloaded as attachment
		if ($format == 'excel') {
			$format = 'xlsx';
			$this->jasperreport->setAttachment();
		} elseif ($format == 'word') {
			$format = 'docx';
			$this->jasperreport->setAttachment();
		}
		
		$this->jasperreport->runReport("/Reports/MyHRIS/HRA_AT/" . $repCode,$format,$param);
    }

    /*===========================================================
       TRAINING SETUP FOR EXTERNAL AGENCY - ATF138
    =============================================================*/

    // TRAINING LIST
    public function trainingList()
    {   
        // CURRENT USER DEPT
        $usr_dept = $this->et_mdl->currentUsrDept();
        $data['curr_dept'] = $usr_dept->SM_DEPT_CODE;

        // get department code for Human Resource Division
        $hrdCode = $this->et_mdl->getTrainingAdminDeptCode();

        // check whether Human Resource Staff
        if($hrdCode == $data['curr_dept']) {
            $deptCode = null;
        } else {
            $deptCode = $data['curr_dept'];
        }

        // get available records
        $data['tr_list'] = $this->et_mdl->getTrainingListNew($deptCode);

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

    // Populate state list
    public function stateList(){
        $this->isAjax();
        
        $countCode = $this->input->post('countryCode', true);
        
        // get available records
        $stateList = $this->et_mdl->getCountryStateList($countCode);
               
        if (!empty($stateList)) {
            $success = 1;
        } else {
            $success = 0;
        }
        
        $json = array('sts' => $success, 'stateList' => $stateList);
        
        echo json_encode($json);
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
        // if($evaluationTHD == 'Y') {
        //     $evaluationFrReq = 'required|max_length[30]';
        //     $evaluationToReq = 'required|max_length[30]';
        // } else {
        //     $evaluationFrReq = 'max_length[30]';
        //     $evaluationToReq = 'max_length[30]';
        // }

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
            'evaluation_period_from' => 'max_length[30]',
            'evaluation_period_to' => 'max_length[30]',  
            // 'evaluation_period_from' => $evaluationFrReq,
            // 'evaluation_period_to' => $evaluationToReq, 
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

            // COUNTRY CODE
            if(!empty($data['tr_info']->TH_TRAINING_COUNTRY)) {
                $countCode = $data['tr_info']->TH_TRAINING_COUNTRY;
            } else {
                $countCode = '';
            }

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

        if (!empty($countCode)) {
            $data['state_list'] = $this->dropdown($this->et_mdl->getCountryStateList($countCode), 'SM_STATE_CODE', 'SM_STATE_DESC', ' ---Please select--- ');
        } else {
            $data['state_list'] = '';
        }
        
        $this->render($data);
    }

    // SAVE EDIT TRAINING 
    public function saveEditTraining()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $refid = $form['refid'];
        $title = $form['training_title'];
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
        // if($evaluationTHD == 'Y') {
        //     $evaluationFrReq = 'required|max_length[30]';
        //     $evaluationToReq = 'required|max_length[30]';
        // } else {
        //     $evaluationFrReq = 'max_length[30]';
        //     $evaluationToReq = 'max_length[30]';
        // }

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
            'evaluation_period_from' => 'max_length[30]',
            'evaluation_period_to' => 'max_length[30]', 
            // 'evaluation_period_from' => $evaluationFrReq,
            // 'evaluation_period_to' => $evaluationToReq, 
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

            $thd_info = $this->et_mdl->getTrainingHeadDetl($refid);

            if(!empty($thd_info)) {
                // UPDATE TRAINING HEAD DETL
                $update2 = $this->et_mdl->saveUpdTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention);

                if($update2 > 0) {
                    $msgTHD = nl2br("\r\n").'<b><font color="green"><i class="fa fa-check"></i> Success </font></b>'."Record has been saved (Training Detail)";
                    $successTHD = 1;
                } else {
                    $msgTHD = nl2br("\r\n").'<b><font color="white"><i class="fa fa-times"></i> Failed </font></b>'."Fail to save record (Training Detail)";
                    $successTHD = 0;
                }
            } else {
                // INSERT TRAINING HEAD DETL
                if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD) || !empty($attention)) {
                    $update2 = $this->et_mdl->saveTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention);

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
            }
            

            if($successTH == 1 && $successTHD == 1) {
                $json = array('sts' => 1, 'msg' => $msgTH.$msgTHD, 'alert' => 'success', 'refid' => $refid, 'title' => $title);
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
        $tr_cost = 0;

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
                    $get_sum_tr_cost = $this->et_mdl->getSumtrCost($refid);
                    if(!empty($get_sum_tr_cost)) {
                        $tr_cost = $get_sum_tr_cost->SUM_TR_COST;
                    } 

                    $upd_tr_fee = $this->et_mdl->updTrainingFee($refid, $tr_cost);
                    if($upd_tr_fee > 0) {
                        $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid);
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Fail to update Training Fee', 'alert' => 'danger');
                    }

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
        $tr_cost = 0;

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
                $get_sum_tr_cost = $this->et_mdl->getSumtrCost($refid);
                if(!empty($get_sum_tr_cost)) {
                    $tr_cost = $get_sum_tr_cost->SUM_TR_COST;
                } 

                $upd_tr_fee = $this->et_mdl->updTrainingFee($refid, $tr_cost);
                if($upd_tr_fee > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to update Training Fee', 'alert' => 'danger');
                }
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
        $tr_cost = 0;
        
        if (!empty($refid) && !empty($code)) {
            $del = $this->et_mdl->deleteTrainingCost($refid, $code);
        
            if ($del > 0) {
                $get_sum_tr_cost = $this->et_mdl->getSumtrCost($refid);
                if(!empty($get_sum_tr_cost)) {
                    $tr_cost = $get_sum_tr_cost->SUM_TR_COST;
                } 

                $upd_tr_fee = $this->et_mdl->updTrainingFee($refid, $tr_cost);
                if($upd_tr_fee > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success', 'refid' => $refid);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to update Training Fee', 'alert' => 'danger');
                }
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
    
    /*===========================================================
       APPROVE TRAINING SETUP FOR EXTERNAL AGENCY - ATF139
    =============================================================*/

    // TRAINING LIST
    public function getTrainingList()
    {   
        // selected filter value
        $dept = $this->input->post('dept', true);
        $month = $this->input->post('month', true);
        $year = $this->input->post('year', true);
        $status = $this->input->post('status', true);

        // get available records
        $data['tr_list'] = $this->et_mdl->getTrainingList2($dept, $month, $year, $status);

        $this->render($data);
    }

    // TRAINING DETL
    public function trDetl()
    {   
        $this->render();
    }

    // APPROVE TRAINING
    public function approveExtTrainingSetup() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $upd_status = 'APPROVE';

        if (!empty($refid)) {
            $tr_detl = $this->et_mdl->getTrainingHead($refid);

            if(!empty($tr_detl)) {
                $status = $tr_detl->TH_STATUS;
                $fee = $tr_detl->TH_TRAINING_FEE;
            } else {
                $status ='';
                $fee = '';
            }

            if($status == 'APPROVE') {
                $json = array('sts' => 0, 'msg' => 'Training already approved.', 'alert' => 'danger');
            } else {
                if(empty($fee)) {
                    $json = array('sts' => 0, 'msg' => 'Training setup not complete.'.nl2br("\r\n").'Please key-in the <b><font color="red">Fee</font></b> amount at <b>Training Setup for External Agency</b> page.', 'alert' => 'danger');
                } else {
                    $approve = $this->et_mdl->updStsExtTrainingSetup($refid, $upd_status);
            
                    if ($approve > 0) {
                        $json = array('sts' => 1, 'msg' => 'Training Approval completed.', 'alert' => 'success');
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Training Approval failed.', 'alert' => 'danger');
                    }
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // AMEND TRAINING
    public function amendExtTrainingSetup() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $upd_status = 'ENTRY';
        
        if (!empty($refid)) {
            $tr_detl = $this->et_mdl->getTrainingHead($refid);
            if(!empty($tr_detl)) {
                $status = $tr_detl->TH_STATUS;
                $fee = $tr_detl->TH_TRAINING_FEE;
            } else {
                $status ='';
                $fee = '';
            }

            // count staff
            $tr_stf_detl = $this->et_mdl->getTrainingStaffDetl($refid);
            if(!empty($tr_stf_detl)) {
                $count = (int)$tr_stf_detl->C_STAFF;
            } else {
                $count = 0;
            }

            if($status == 'ENTRY') {
                $json = array('sts' => 0, 'msg' => 'Training already amended.', 'alert' => 'danger');
            } else {
                if(empty($fee)) {
                    $json = array('sts' => 0, 'msg' => 'Training setup not complete.'.nl2br("\r\n").'Please key-in the <b><font color="red">Fee</font></b> amount at <b>Training Setup for External Agency</b> page.', 'alert' => 'danger');
                } else {
                    if($count == 0) {
                        $amend = $this->et_mdl->updStsExtTrainingSetup($refid, $upd_status);
            
                        if ($amend > 0) {
                            $json = array('sts' => 1, 'msg' => 'Training Amendment completed.', 'alert' => 'success');
                        } else {
                            $json = array('sts' => 0, 'msg' => 'Training Amendment failed.', 'alert' => 'danger');
                        }
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Cannot amend Training.'.nl2br("\r\n").'There are staff <b><font color="red">applying/approved/assigned</font></b> for this training.', 'alert' => 'danger');
                    }
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // POSTPONE TRAINING
    public function postponeExtTrainingSetup() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $upd_status = 'POSTPONE';

        if (!empty($refid)) {
            $tr_detl = $this->et_mdl->getTrainingHead($refid);

            if(!empty($tr_detl)) {
                $status = $tr_detl->TH_STATUS;
                $fee = $tr_detl->TH_TRAINING_FEE;
            } else {
                $status ='';
                $fee = '';
            }

            if($status == 'POSTPONE') {
                $json = array('sts' => 0, 'msg' => 'Training already postponed.', 'alert' => 'danger');
            } else {
                if(empty($fee)) {
                    $json = array('sts' => 0, 'msg' => 'Training setup not complete.'.nl2br("\r\n").'Please key-in the <b><font color="red">Fee</font></b> amount at <b>Training Setup for External Agency</b> page.', 'alert' => 'danger');
                } else {
                    $postpone = $this->et_mdl->updStsExtTrainingSetup($refid, $upd_status);
            
                    if ($postpone > 0) {
                        $json = array('sts' => 1, 'msg' => 'Training Postponement completed.', 'alert' => 'success');
                    } else {
                        $json = array('sts' => 0, 'msg' => 'Training Postponement failed.', 'alert' => 'danger');
                    }
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // REJECT TRAINING
    public function rejectExtTrainingSetup() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $upd_status = 'REJECT';

        $sth_msg = '';
        $th_msg = '';
        $sth_success = 0;
        $th_success = 0;
        
        if (!empty($refid)) {
            $tr_detl = $this->et_mdl->getTrainingHead($refid);
            if(!empty($tr_detl)) {
                $status = $tr_detl->TH_STATUS;
                $fee = $tr_detl->TH_TRAINING_FEE;
            } else {
                $status ='';
                $fee = '';
            }

            // count staff
            $tr_stf_detl = $this->et_mdl->getTrainingStaffDetl($refid);
            if(!empty($tr_stf_detl)) {
                $count = (int)$tr_stf_detl->C_STAFF;
            } else {
                $count = 0;
            }

            if($status == 'REJECT') {
                $json = array('sts' => 0, 'msg' => 'Training already rejected.', 'alert' => 'danger');
            } else {
                if(empty($fee)) {
                    $json = array('sts' => 0, 'msg' => 'Training setup not complete.'.nl2br("\r\n").'Please key-in the <b><font color="red">Fee</font></b> amount at <b>Training Setup for External Agency</b> page.', 'alert' => 'danger');
                } else {
                    if($count == 0) {
                        $reject = $this->et_mdl->updStsExtTrainingSetup($refid, $upd_status);
                        if ($reject > 0) {
                            $json = array('sts' => 1, 'msg' => 'Training Rejection completed.', 'alert' => 'success');
                        } else {
                            $json = array('sts' => 0, 'msg' => 'Training Rejection failed.', 'alert' => 'danger');
                        }
                    } else {
                        $reject_sth = $this->et_mdl->updSthTrainingSetup($refid, $upd_status);
                        if ($reject_sth > 0) {
                            $sth_msg = 'Staff Training Rejection completed.'.nl2br("\r\n");
                            $sth_success++;
                        } else {
                            $sth_msg = 'Staff Training Rejection failed'.nl2br("\r\n");
                            $sth_success = 0;
                        }

                        $reject = $this->et_mdl->updStsExtTrainingSetup($refid, $upd_status);
                        if ($reject > 0) {
                            $th_msg = 'Training Rejection completed.';
                            $th_success++;
                        } else {
                            $th_msg = 'Training Rejection failed.';
                            $th_success = 0;
                        }

                        if ($sth_success == $th_success) {
                            $json = array('sts' => 1, 'msg' => $sth_msg.$th_msg, 'alert' => 'success');
                        } else {
                            $json = array('sts' => 0, 'msg' => $sth_msg.$th_msg, 'alert' => 'danger');
                        }
                    }
                }
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    /*===========================================================
       APPROVE TRAINING SETUP FOR EXTERNAL AGENCY - ATF139
    =============================================================*/

    // TRAINING LIST 3
    public function getTrainingList3()
    {   
        // selected filter value
        $dept = $this->input->post('dept', true);
        $month = $this->input->post('month', true);
        $year = $this->input->post('year', true);
        $status = $this->input->post('status', true);

        // get available records
        $data['tr_list'] = $this->et_mdl->getTrainingList2($dept, $month, $year, $status);

        $this->render($data);
    }

    // SAVE EDIT TRAINING 
    public function saveEditTraining2()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);
        $refid = $form['refid'];
        $title = $form['training_title'];
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
        // if($evaluationTHD == 'Y') {
        //     $evaluationFrReq = 'required|max_length[30]';
        //     $evaluationToReq = 'required|max_length[30]';
        // } else {
        //     $evaluationFrReq = 'max_length[30]';
        //     $evaluationToReq = 'max_length[30]';
        // }

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
            'evaluation_period_from' => 'max_length[30]',
            'evaluation_period_to' => 'max_length[30]', 
            // 'evaluation_period_from' => $evaluationFrReq,
            // 'evaluation_period_to' => $evaluationToReq, 
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

        // Begin update
        if ($status == 1) {

            // UPDATE TRAINING HEAD
            $update = $this->et_mdl->saveEditTraining2($form, $refid);
            if($update > 0) {
                $msgTH = "Record has been saved (Training)";
                $successTH = 1;
            } else {
                $msgTH = "Fail to save record (Training)";
                $successTH = 0;
            }

            // UPDATE TRAINING HEAD DETL
            // if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD) || !empty($attention)) {
            //     $update2 = $this->et_mdl->saveUpdTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention);

            //     if($update2 > 0) {
            //         $msgTHD = nl2br("\r\n").'<b><font color="green"><i class="fa fa-check"></i> Success </font></b>'."Record has been saved (Training Detail)";
            //         $successTHD = 1;
            //     } else {
            //         $msgTHD = nl2br("\r\n").'<b><font color="white"><i class="fa fa-times"></i> Failed </font></b>'."Fail to save record (Training Detail)";
            //         $successTHD = 0;
            //     }
            // } else {
            //     $msgTHD = '';
            //     $successTHD = 1;
            // }

            $thd_info = $this->et_mdl->getTrainingHeadDetl($refid);

            if(!empty($thd_info)) {
                // UPDATE TRAINING HEAD DETL
                $update2 = $this->et_mdl->saveUpdTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention);

                if($update2 > 0) {
                    $msgTHD = nl2br("\r\n").'<b><font color="green"><i class="fa fa-check"></i> Success </font></b>'."Record has been saved (Training Detail)";
                    $successTHD = 1;
                } else {
                    $msgTHD = nl2br("\r\n").'<b><font color="white"><i class="fa fa-times"></i> Failed </font></b>'."Fail to save record (Training Detail)";
                    $successTHD = 0;
                }
            } else {
                // INSERT TRAINING HEAD DETL
                if(!empty($coor) || !empty($coorSeq) || !empty($coorContact) || !empty($evaluationTHD) || !empty($attention)) {
                    $update2 = $this->et_mdl->saveTrainingDetl($refid, $coor, $coorSeq, $coorContact, $evaluationTHD, $attention);

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
            }

            if($successTH == 1 && $successTHD == 1) {
                $json = array('sts' => 1, 'msg' => $msgTH.$msgTHD, 'alert' => 'success', 'refid' => $refid, 'title' => $title);
            } else {
                $json = array('sts' => 0, 'msg' => $msgTH.$msgTHD, 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
        
        echo json_encode($json);
    }

    /*===========================================================
       APPROVE TRAINING APPLICATIONS FOR EXTERNAL AGENCY - ATF141
    =============================================================*/

    // TRAINING LIST
    public function getTrainingList4()
    {   
        // selected filter value
        $dept = $this->input->post('dept', true);
        $month = $this->input->post('month', true);
        $year = $this->input->post('year', true);

        // get available records
        $data['tr_list'] = $this->et_mdl->getTrainingList4($dept, $month, $year);

        $this->render($data);
    }

    // STAFF LIST
    public function trStaffList()
    {   
        // selected filter value
        $refid = $this->input->post('refid', true);

        $trListArr = array();

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $tr_detl = $this->et_mdl->getTrainingHead($refid);
            if(!empty($tr_detl)) {
                $data['tr_title'] = $tr_detl->TH_TRAINING_TITLE;
            } else {
                $data['tr_title'] = '';
            }
        } else {
            $data['refid'] = '';
            $data['tr_title'] = '';
        }

        // get available records
        $data['tr_list'] = $this->et_mdl->getTrStaffList($refid);

        foreach($data['tr_list'] as $tl) 
        {   
            $sid = $tl->STH_STAFF_ID;
            $sname = $tl->SM_STAFF_NAME;
            $sjs_desc = $tl->SJS_STATUS_DESC;
            $status = $tl->STH_STATUS;
            $appl_date = $tl->STH_APPLY_DATE2;
            $fee_code_desc = $tl->FEE_CODE_DESC;
            $cost = $tl->TC_AMOUNT;
            $remark = $tl->STH_RECOMMENDER_REASON;

            $fee_code = $tl->STH_FEE_CODE;

            // GET STAFF KTP
            $get_ktp = $this->et_mdl->getKtp();
            if(!empty($get_ktp)) {
                $ktp = $get_ktp->DM_DIRECTOR;
            } else {
                $ktp = '';
            }

            // GET STAFF REGISTRAR
            $get_registrar = $this->et_mdl->getRegistrar();
            if(!empty($get_registrar)) {
                $registrar = $get_registrar->DM_DIRECTOR;
            } else {
                $registrar = '';
            }

            // CHECK KTP
            if($sid == $ktp && ($fee_code == '001' || $fee_code == '002')) {
                $check_ktp = '<b><font color="blue">YES</font></b>';
            } else {
                $check_ktp = '<b>NO</b>';
            }

            // CHECK REGISTRAR
            if($sid == $registrar && ($fee_code == '001' || $fee_code == '002')) {
                $check_reg = '<b><font color="blue">YES</font></b>';
            } else {
                $check_reg = '<b>NO</b>';
            }

            $trListArr [] = array('STAFF_ID'=>$sid,
            'sname'=>$sname,
            'sjs_desc'=>$sjs_desc,
            'status'=>$status,
            'appl_date'=>$appl_date,
            'fee_code_desc'=>$fee_code_desc,
            'cost'=>$cost,
            'remark'=>$remark,
            'KTP'=>$check_ktp, 
            'REG'=>$check_reg);
        }

        $data['stf_list'] = $trListArr;

        $this->render($data);
    }

    // APPROVE APPLICANT
    public function appTrApplicant()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffID', true);
        $remark = $this->input->post('remark', true);
        $sts = 0;
        $success = 0;
        $successUpdApp = 0;
        $successMemo = 0;
        $cc_user = '';

        if (!empty($refid) && !empty($staffID)) {
            foreach ($staffID as $key => $sid) {
                $success++;
                $rem = $remark[$key];

                // STH DETL
                $sth_detl = $this->et_mdl->getSTHDetl($refid, $sid);
                if(!empty($sth_detl)) {
                    $fee_code = $sth_detl->STH_FEE_CODE;
                } else {
                    $fee_code = '';
                }

                // EVALUATOR DETL
                $eva_detl = $this->et_mdl->getEvaDetl($refid, $sid);
                if(!empty($eva_detl)) {
                    $eva_id = $eva_detl->STH_VERIFY_BY;
                } else {
                    $eva_id = '';
                }

                $cur_usr_id = $this->staff_id;

                // update sth
                $upd_approve = $this->et_mdl->updateApprove($refid, $sid, $fee_code, $cur_usr_id, $rem, $eva_id);
                if ($upd_approve > 0) {
                    $successUpdApp++;
                } else {
                    $successUpdApp = 0;
                }

                // SEND APPROVE MEMO
                if($fee_code == '003') {
                    $status = $this->et_mdl->SendApproveMemo003($cur_usr_id, $refid, $sid);
                    if($status > 0) {
                        $successMemo++;
                    } else {
                        $successMemo = 0;
                    }
                }

                if($fee_code == '002') {
                    
                    // GET REG / SUPERIOR
                    $reg_sup_detl = $this->et_mdl->getRegSup();
                    if(!empty($reg_sup_detl)) {
                        $reg_sup = $reg_sup_detl->DM_DIRECTOR;
                    } else {
                        $reg_sup = '';
                    }

                    if(!empty($cc_user)) {
                        $cc_user = $cc_user.$sid.',';
                    } else {
                        $cc_user = $sid.',';
                    }

                    $status = $this->et_mdl->SendApproveMemo002($cur_usr_id, $refid, $reg_sup, $cc_user);
                    if($status > 0) {
                        $successMemo++;
                    } else {
                        $successMemo = 0;
                    }
                }

                if($fee_code == '001') {

                    // GET KTP / SUPERIOR
                    $ktp_sup_detl = $this->et_mdl->getKtpSup();
                    if(!empty($ktp_sup_detl)) {
                        $ktp_sup = $ktp_sup_detl->DM_DIRECTOR;
                    } else {
                        $ktp_sup = '';
                    }

                    if(!empty($cc_user)) {
                        $cc_user = $cc_user.$sid.',';
                    } else {
                        $cc_user = $sid.',';
                    }

                    $status = $this->et_mdl->SendApproveMemo001($cur_usr_id, $refid, $ktp_sup, $cc_user);
                    if($status > 0) {
                        $successMemo++;
                    } else {
                        $successMemo = 0;
                    }
                }
            }

            if($success == $successUpdApp && $successMemo == $success) {
                $json = array('sts' => 1, 'msg' => 'Training Application Approval Completed.', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Training Application Approval Aborted.', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // APPROVE KTP / REG APPLICANT
    public function appKtpRegApplicant()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffID', true);
        $remark = $this->input->post('remark', true);
        $sts = 0;
        $success = 0;
        $successUpdApp = 0;
        $successMemo = 0;

        if (!empty($refid) && !empty($staffID)) {
            foreach ($staffID as $key => $sid) {
                $success++;
                $rem = $remark[$key];

                // STH DETL
                $sth_detl = $this->et_mdl->getSTHDetl($refid, $sid);
                if(!empty($sth_detl)) {
                    $fee_code = $sth_detl->STH_FEE_CODE;
                } else {
                    $fee_code = '';
                }

                // EVALUATOR DETL
                $eva_detl = $this->et_mdl->getEvaDetl($refid, $sid);
                if(!empty($eva_detl)) {
                    $eva_id = $eva_detl->STH_VERIFY_BY;
                } else {
                    $eva_id = '';
                }

                $cur_usr_id = $this->staff_id;

                // update sth
                $upd_approve = $this->et_mdl->updateApproveKtpReg($refid, $sid, $fee_code, $cur_usr_id, $rem, $eva_id);
                if ($upd_approve > 0) {
                    $successUpdApp++;
                } else {
                    $successUpdApp = 0;
                }

                // SEND APPROVE MEMO 004
                $status = $this->et_mdl->SendApproveMemo004($cur_usr_id, $refid, $sid);
                if($status > 0) {
                    $successMemo++;
                } else {
                    $successMemo = 0;
                }
            }

            if($success == $successUpdApp && $successMemo == $success) {
                $json = array('sts' => 1, 'msg' => 'Training Application Approval (KTP / REGISTRAR) Completed.', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Training Application Approval (KTP / REGISTRAR) Aborted.', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // REJECT APPLICANT
    public function rejTrApplicant()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffID', true);
        $remark = $this->input->post('remark', true);
        $sts = 0;
        $success = 0;
        $successUpdRej = 0;
        $successMemo = 0;

        if (!empty($refid) && !empty($staffID)) {
            foreach ($staffID as $key => $sid) {
                $success++;
                $rem = $remark[$key];

                // STH DETL
                $sth_detl = $this->et_mdl->getSTHDetl($refid, $sid);
                if(!empty($sth_detl)) {
                    $fee_code = $sth_detl->STH_FEE_CODE;
                } else {
                    $fee_code = '';
                }

                $cur_usr_id = $this->staff_id;

                // update sth 
                $upd_reject = $this->et_mdl->updateReject($refid, $sid, $fee_code, $cur_usr_id, $rem);
                if ($upd_reject > 0) {
                    $successUpdRej++;
                } else {
                    $successUpdRej = 0;
                }

                // MEMO DETL
                $mem_detl = $this->et_mdl->getRejMemoDetl($refid, $sid);
                if(!empty($mem_detl)) {
                    $sid2 = $mem_detl->STH_STAFF_ID;
                    $title = $mem_detl->TH_TRAINING_TITLE;
                    $venue = $mem_detl->STH_VENUE;
                    $dt_from = $mem_detl->TH_DATE_FROM;
                    $dt_to = $mem_detl->TH_DATE_TO;
                    $sth_sts = $mem_detl->STH_STATUS;
                    $due_date = $mem_detl->TH_DUE_DATE;
                } else {
                    $sid2 = '';
                    $title = '';
                    $venue = '';
                    $dt_from = '';
                    $dt_to = '';
                    $sth_sts = '';
                    $due_date = '';
                }

                $memoTitle = 'Permohonan Latihan Agensi Luar Tidak Diperakukan';
                $memoContent = 'Dukacita dimaklumkan bahawa permohonan tuan/puan untuk mengikuti kursus yang dinyatakan dibawah adalah '.
                            '<br>'.
                            '<b>Tidak Diperakukan oleh Unit Latihan, BSM.</b>'.
                            '<br><br>'.
                            'Kursus : '.$title.
                            '<br>'.
                            'Tarikh : '.$dt_from.' - '.$dt_to.
                            '<br>'.
                            'Alasan : '.$rem.
                            '<br><br>'.
                            'Sekian, terima kasih.'.
                            '<br><br>'.
                            '--System Generated Memo--';

                // CREATE MEMO
                $status = $this->et_mdl->createMemo($cur_usr_id, $sid, $cc = null, $memoTitle, $memoContent);
                if($status > 0) {
                    $successMemo++;
                } else {
                    $successMemo = 0;
                }
            }

            if($success == $successUpdRej && $successMemo == $success) {
                $json = array('sts' => 1, 'msg' => 'Training Application Has Been Rejected.', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Training Application (Reject) Aborted.', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // REJECT KTP / REG APPLICANT
    public function rejKtpRegApplicant()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffID', true);
        $remark = $this->input->post('remark', true);
        $sts = 0;
        $success = 0;
        $successUpdRej = 0;
        $successMemo = 0;

        if (!empty($refid) && !empty($staffID)) {
            foreach ($staffID as $key => $sid) {
                $success++;
                $rem = $remark[$key];

                // STH DETL
                $sth_detl = $this->et_mdl->getSTHDetl($refid, $sid);
                if(!empty($sth_detl)) {
                    $fee_code = $sth_detl->STH_FEE_CODE;
                } else {
                    $fee_code = '';
                }

                $cur_usr_id = $this->staff_id;

                // update sth 
                $upd_reject = $this->et_mdl->updateRejectKtpReg($refid, $sid, $fee_code, $cur_usr_id, $rem);
                if ($upd_reject > 0) {
                    $successUpdRej++;
                } else {
                    $successUpdRej = 0;
                }

                // MEMO DETL
                $mem_detl = $this->et_mdl->getRejMemoDetl($refid, $sid);
                if(!empty($mem_detl)) {
                    $sid2 = $mem_detl->STH_STAFF_ID;
                    $title = $mem_detl->TH_TRAINING_TITLE;
                    $venue = $mem_detl->STH_VENUE;
                    $dt_from = $mem_detl->TH_DATE_FROM;
                    $dt_to = $mem_detl->TH_DATE_TO;
                    $sth_sts = $mem_detl->STH_STATUS;
                    $due_date = $mem_detl->TH_DUE_DATE;
                } else {
                    $sid2 = '';
                    $title = '';
                    $venue = '';
                    $dt_from = '';
                    $dt_to = '';
                    $sth_sts = '';
                    $due_date = '';
                }

                $memoTitle = 'Permohonan Latihan Agensi Luar Tidak Diperakukan';
                $memoContent = 'Dukacita dimaklumkan bahawa permohonan tuan/puan untuk mengikuti kursus yang dinyatakan dibawah adalah '.
                            '<br>'.
                            '<b>Tidak Diperakukan oleh Unit Latihan, BSM.</b>'.
                            '<br><br>'.
                            'Kursus : '.$title.
                            '<br>'.
                            'Tarikh : '.$dt_from.' - '.$dt_to.
                            '<br>'.
                            'Alasan : '.$rem.
                            '<br><br>'.
                            'Sekian, terima kasih.'.
                            '<br><br>'.
                            '--System Generated Memo--';

                // CREATE MEMO
                $status = $this->et_mdl->createMemo($cur_usr_id, $sid, $cc = null, $memoTitle, $memoContent);
                if($status > 0) {
                    $successMemo++;
                } else {
                    $successMemo = 0;
                }
            }

            if($success == $successUpdRej && $successMemo == $success) {
                $json = array('sts' => 1, 'msg' => 'Training Application Has Been Rejected (KTP / REGISTRAR).', 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => 'Training Application (Reject - KTP / REGISTRAR) Aborted.', 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*===========================================================
       ASSIGN TRAINING COST TO STAFF - ATF029
    =============================================================*/

    // STAFF LIST 2
    public function trStaffList2()
    {   
        // selected filter value
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $tr_detl = $this->et_mdl->getTrainingHead($refid);
            if(!empty($tr_detl)) {
                $data['tr_title'] = $tr_detl->TH_TRAINING_TITLE;
            } else {
                $data['tr_title'] = '';
            }
        } else {
            $data['refid'] = '';
            $data['tr_title'] = '';
        }

        // get available records
        $data['stf_cost'] = $this->et_mdl->getTrStaffCostList($refid);

        $this->render($data);
    }

    // PAYMENT DETAILS
    public function getPaymentDetl()
    {   
        // selected filter value
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);

        // TRAINING DETL
        if(!empty($refid)) {
            $data['refid'] = $refid;
            $tr_detl = $this->et_mdl->getTrainingHead($refid);
            if(!empty($tr_detl)) {
                $data['tr_title'] = $tr_detl->TH_TRAINING_TITLE;
            } else {
                $data['tr_title'] = '';
            }
        } else {
            $data['refid'] = '';
            $data['tr_title'] = '';
        }

        // APPLICANT DETL
        if(!empty($staff_id)) {
            $data['staff_id'] = $staff_id;
            $app_detl = $this->et_mdl->getApplicantDetl($staff_id);
            if(!empty($app_detl)) {
                $data['staff_name'] = $app_detl->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }
        } else {
            $data['staff_id'] = '';
            $data['staff_name'] = '';
        }

        // get available records
        $data['pymnt_detl'] = $this->et_mdl->getPaymentDetl($staff_id, $refid);

        $this->render($data);
    }

    // EDIT STAFF TRAINING COST
    public function editStaffCost()
    {   
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
        } else {
            $data['refid'] = "";
        }

        // APPLICANT DETL
        if(!empty($staff_id)) {
            $data['staff_id'] = $staff_id;
            $app_detl = $this->et_mdl->getApplicantDetl($staff_id);
            if(!empty($app_detl)) {
                $data['staff_name'] = $app_detl->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }
        } else {
            $data['staff_id'] = '';
            $data['staff_name'] = '';
        }

        // STAFF TRAINING COST DETL
        $data['cost_detl'] = $this->et_mdl->getTrStaffCostDetl($refid, $staff_id);

        $this->render($data);
    }

    // SAVE UPDATE STAFF TRAINING COST
    public function saveUpdAssignStaffCost()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $staff_id = $form['staff_id'];

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]', 
            'staff_id' => 'required|max_length[10]', 
            'amount' => 'required|numeric|max_length[40]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            // UPDATE STAFF_TRAINING_COST_MAIN
            $update = $this->et_mdl->saveUpdAssignStaffCost($form);

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

    // ADD PAYMENT DETL
    public function addPaydetl()
    {   
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
        } else {
            $data['refid'] = "";
        }

        // APPLICANT DETL
        if(!empty($staff_id)) {
            $data['staff_id'] = $staff_id;
            $app_detl = $this->et_mdl->getApplicantDetl($staff_id);
            if(!empty($app_detl)) {
                $data['staff_name'] = $app_detl->SM_STAFF_NAME;
            } else {
                $data['staff_name'] = '';
            }
        } else {
            $data['staff_id'] = '';
            $data['staff_name'] = '';
        }

        // COST CODE DD
        $data['cost_code'] = $this->dropdown($this->et_mdl->getCostCodeDD2($refid, $staff_id), 'TC_COST_CODE', 'TC_COST_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // COST AMOUNT DETL
    public function getCostCodeDetl() 
    {
		$this->isAjax();
        
        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $staff_id = $form['staff_id'];
        $cost_code = $form['cost_code'];
        // var_dump($refid);
        
        if (!empty($refid) && !empty($staff_id) && !empty($cost_code)) {
            $cost_detl = $this->et_mdl->getCostCodeDetl($refid, $staff_id, $cost_code);

            if(!empty($cost_detl)) {
                $amount = $cost_detl->TC_AMOUNT;
            } else {
                $amount = '';
            }
        
            if (!empty($amount)) {
                $json = array('sts' => 1, 'msg' => 'Amount found.', 'alert' => 'success', 'amount' => $amount);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to get amount.', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // SAVE PAYMENT DETL
    public function savePayDetl()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $staff_id = $form['staff_id'];

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]', 
            'staff_id' => 'required|max_length[10]', 
            'cost_code' => 'required|max_length[10]',
            'amount' => 'required|numeric|max_length[40]',
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            // INSERT STAFF_TRAINING_COST_DETL
            $insert = $this->et_mdl->savePayDetl($form);

            if($insert > 0) {
                // SUM STCD
                $sum_amt = $this->et_mdl->getSumSTCD($refid, $staff_id);
                if(!empty($sum_amt)) {
                    $amt = $sum_amt->SUM_STCD;
                } else {
                    $amt = 0;
                }

                // UPDATE STAFF_TRAINING_COST_MAIN
                $update = $this->et_mdl->saveUpdateStfTrCostMain($refid, $staff_id, $amt);

                if($update > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => $staff_id);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // DELETE STCM
    public function delStfTrCost() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        
        if (!empty($staff_id) && !empty($staff_id)) {
            // CHECK STCD
            $check = $this->et_mdl->checkSTCD($refid, $staff_id);

            if (empty($check)) {
                $del = $this->et_mdl->delStfTrCost($refid, $staff_id);
        
                if ($del > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted', 'alert' => 'success');
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Please delete record on Payment Details', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // DELETE STCD
    public function delPayDetl() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        $code_code = $this->input->post('code_code', true);
        
        if (!empty($refid) && !empty($staff_id)) {
            $del = $this->et_mdl->delPayDetl($refid, $staff_id, $code_code);
    
            if ($del > 0) {
                // SUM STCD
                $sum_amt = $this->et_mdl->getSumSTCD($refid, $staff_id);
                if(!empty($sum_amt)) {
                    $amt = $sum_amt->SUM_STCD;
                } else {
                    $amt = 0;
                }

                // UPDATE STAFF_TRAINING_COST_MAIN
                $update = $this->et_mdl->saveUpdateStfTrCostMain($refid, $staff_id, $amt);

                if($update > 0) {
                    $updMsg = nl2br("\r\n")."Staff Training Cost has been updated.";
                    $json = array('sts' => 1, 'msg' => 'Record has been deleted'.$updMsg, 'alert' => 'success', 'refid' => $refid);
                } else {
                    $updMsg = nl2br("\r\n")."Fail to update Staff Training Cost.";
                    $json = array('sts' => 0, 'msg' => 'Record has been deleted'.$updMsg, 'alert' => 'danger');
                }
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to delete record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    /*===========================================================
       APPROVE TRAINING BY MPE FOR EXTERNAL AGENCY - ATF143
    =============================================================*/

    // TRAINING LIST 5
    public function getTrainingList5()
    {   
        // selected filter value
        $dept = $this->input->post('dept', true);
        $month = $this->input->post('month', true);
        $year = $this->input->post('year', true);

        // get available records
        $data['tr_list'] = $this->et_mdl->getTrainingList5($dept, $month, $year);

        $this->render($data);
    }

    // STAFF LIST 3
    public function trStaffList3()
    {   
        // selected filter value
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $tr_detl = $this->et_mdl->getTrainingHead($refid);
            if(!empty($tr_detl)) {
                $data['tr_title'] = $tr_detl->TH_TRAINING_TITLE;
            } else {
                $data['tr_title'] = '';
            }
        } else {
            $data['refid'] = '';
            $data['tr_title'] = '';
        }

        // get available records
        $data['stf_list'] = $this->et_mdl->getTrStaffList3($refid);

        $this->render($data);
    }


    // APPROVE APPLICANT MPE
    public function appTrApplicantMPE()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffID', true);
        $remark = $this->input->post('remark', true);
        $mpe_date = $this->input->post('mpe_date', true);
        $sts = 0;
        $success = 0;
        $successUpdApp1 = 0;
        $successUpdApp2 = 0;
        $successMemo = 0;
        $msg1 = '';
        $msg2 = '';
        $msg3 = '';
        $cc_hod = '';
        $reportID = 'ATR230';

        if (!empty($refid) && !empty($staffID)) {
            foreach ($staffID as $key => $sid) {
                $success++;
                $rem = $remark[$key];

                $cur_usr_id = $this->staff_id;

                // update sth
                $upd_sth = $this->et_mdl->updateSTH($refid, $sid, $cur_usr_id, $rem);
                // $upd_sth = 1;
                if ($upd_sth > 0) {
                    $successUpdApp1++;
                    $msg1 = 'Staff has been approved. (Staff Training 1)';
                } else {
                    $successUpdApp1 = 0;
                    $msg1 = 'Fail to approve staff. (Staff Training 1)';
                }

                // var_dump($mpe_date);

                // update std
                $upd_std = $this->et_mdl->updateSTD($refid, $sid, $mpe_date);
                // $upd_std = 1;
                if ($upd_std > 0) {
                    $successUpdApp2++;
                    $msg2 = nl2br("\r\n").'Record has been saved. (Staff Training 2)';
                } else {
                    $successUpdApp2 = 0;
                    $msg2 = nl2br("\r\n").'Fail to save record. (Staff Training 2)';
                }

                // EVALUATOR DETL
                $hod_detl = $this->et_mdl->getDeptDirector($sid);
                if(!empty($hod_detl)) {
                    $hod = $hod_detl->DM_DIRECTOR;
                } else {
                    $hod = '';
                }

                if(!empty($cc_hod)) {
                    $cc_hod = $cc_hod.$hod;
                } else {
                    $cc_hod = $hod.',';
                }

                // MEMO DETL
                $mem_detl = $this->et_mdl->getRejMemoDetl($refid, $sid);
                if(!empty($mem_detl)) {
                    $sid2 = $mem_detl->STH_STAFF_ID;
                    $title = $mem_detl->TH_TRAINING_TITLE;
                    $venue = $mem_detl->STH_VENUE;
                    $dt_from = $mem_detl->TH_DATE_FROM;
                    $dt_to = $mem_detl->TH_DATE_TO;
                    $sth_sts = $mem_detl->STH_STATUS;
                    $due_date = $mem_detl->TH_DUE_DATE;
                } else {
                    $sid2 = '';
                    $title = '';
                    $venue = '';
                    $dt_from = '';
                    $dt_to = '';
                    $sth_sts = '';
                    $due_date = '';
                }

                $memoTitle = 'Permohonan Latihan Agensi Luar Diluluskan';
                $memoContent = 'Sukacita dimaklumkan bahawa permohonan tuan/puan untuk mengikuti kursus yang dinyatakan dibawah telah '.
                            '<br>'.
                            '<b>DILULUSKAN.</b>'.
                            '<br><br>'.
                            'Kursus : '.$title.
                            '<br>'.
                            'Tarikh : '.$dt_from.' - '.$dt_to.
                            '<br><br>'.
                            '2. Klik pautan dibawah untuk mencetak surat kelulusan : '.
                            '<br>'.
                            '<a href="TrainingReport?action=EXT_AGENCY_TRAIN&repID='.$reportID.'&apRID='.$refid.'" onmouseover="window.status='.'Surat Kelulusan Permohonan Latihan Agensi Luar'.';return true;">Surat Kelulusan Permohonan Latihan Agensi Luar</a>.'.
                            '<br><br><br>'.
                            'Sekian, terima kasih.'.
                            '<br><br>'.
                            '--System Generated Memo--';

                // CREATE MEMO
                $status = $this->et_mdl->createMemo2($cur_usr_id, $sid, $cc_hod, $memoTitle, $memoContent);
                if($status > 0) {
                    $successMemo++;
                    $msg3 = nl2br("\r\n").'Memo has been sent.';
                } else {
                    $successMemo = 0;
                    $msg3 = nl2br("\r\n").'Fail to send memo.';
                }
                $cc_hod = '';
            }

            if($success == $successUpdApp1  && $success == $successUpdApp2 && $successMemo == $success) {
                $json = array('sts' => 1, 'msg' => $msg1.$msg2.$msg3, 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => $msg1.$msg2.$msg3, 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // REJECT APPLICANT MPE
    public function rejTrApplicantMPE()
    {  
        $this->isAjax();

        $refid = $this->input->post('refid', true);
        $staffID = $this->input->post('staffID', true);
        $remark = $this->input->post('remark', true);
        $mpe_date = $this->input->post('mpe_date', true);
        $sts = 0;
        $success = 0;
        $successUpdApp1 = 0;
        $successUpdApp2 = 0;
        $successMemo = 0;
        $msg1 = '';
        $msg2 = '';
        $msg3 = '';
        $cc_hod = '';
        $reportID = 'ATR230';

        if (!empty($refid) && !empty($staffID)) {
            foreach ($staffID as $key => $sid) {
                $success++;
                $rem = $remark[$key];

                $cur_usr_id = $this->staff_id;

                // update sth 2
                $upd_sth = $this->et_mdl->updateSTH2($refid, $sid, $cur_usr_id, $rem);
                // $upd_sth = 1;
                if ($upd_sth > 0) {
                    $successUpdApp1++;
                    $msg1 = 'Staff has been rejected. (Staff Training 1)';
                } else {
                    $successUpdApp1 = 0;
                    $msg1 = 'Fail to reject staff. (Staff Training 1)';
                }

                // var_dump($mpe_date);

                // update std
                $upd_std = $this->et_mdl->updateSTD($refid, $sid, $mpe_date);
                // $upd_std = 1;
                if ($upd_std > 0) {
                    $successUpdApp2++;
                    $msg2 = nl2br("\r\n").'Record has been saved. (Staff Training 2)';
                } else {
                    $successUpdApp2 = 0;
                    $msg2 = nl2br("\r\n").'Fail to save record. (Staff Training 2)';
                }

                // EVALUATOR DETL
                $hod_detl = $this->et_mdl->getDeptDirector($sid);
                if(!empty($hod_detl)) {
                    $hod = $hod_detl->DM_DIRECTOR;
                } else {
                    $hod = '';
                }

                if(!empty($cc_hod)) {
                    $cc_hod = $cc_hod.$hod;
                } else {
                    $cc_hod = $hod.',';
                }

                // MEMO DETL
                $mem_detl = $this->et_mdl->getRejMemoDetl($refid, $sid);
                if(!empty($mem_detl)) {
                    $sid2 = $mem_detl->STH_STAFF_ID;
                    $title = $mem_detl->TH_TRAINING_TITLE;
                    $venue = $mem_detl->STH_VENUE;
                    $dt_from = $mem_detl->TH_DATE_FROM;
                    $dt_to = $mem_detl->TH_DATE_TO;
                    $sth_sts = $mem_detl->STH_STATUS;
                    $due_date = $mem_detl->TH_DUE_DATE;
                } else {
                    $sid2 = '';
                    $title = '';
                    $venue = '';
                    $dt_from = '';
                    $dt_to = '';
                    $sth_sts = '';
                    $due_date = '';
                }

                $memoTitle = 'Permohonan Latihan Agensi Luar Tidak Diluluskan';
                $memoContent = 'Dukacita dimaklumkan bahawa permohonan tuan/puan untuk mengikuti kursus yang dinyatakan dibawah adalah '.
                            '<br>'.
                            '<b>TIDAK DILULUSKAN.</b>'.
                            '<br><br>'.
                            'Kursus : '.$title.
                            '<br>'.
                            'Tarikh : '.$dt_from.' - '.$dt_to.
                            '<br>'.
                            'Alasan : '.$rem.
                            '<br><br>'.
                            'Sekian, terima kasih.'.
                            '<br><br>'.
                            '--System Generated Memo--';

                // CREATE MEMO
                $status = $this->et_mdl->createMemo2($cur_usr_id, $sid, $cc_hod, $memoTitle, $memoContent);
                if($status > 0) {
                    $successMemo++;
                    $msg3 = nl2br("\r\n").'Memo has been sent.';
                } else {
                    $successMemo = 0;
                    $msg3 = nl2br("\r\n").'Fail to send memo.';
                }
                $cc_hod = '';
            }

            if($success == $successUpdApp1  && $success == $successUpdApp2 && $successMemo == $success) {
                $json = array('sts' => 1, 'msg' => $msg1.$msg2.$msg3, 'alert' => 'green');
            } else {
                $json = array('sts' => 0, 'msg' => $msg1.$msg2.$msg3, 'alert' => 'red');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Please contact administrator', 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*===========================================================
       ASSIGN TRAINING FOR EXTERNAL AGENCY - ATF142
    =============================================================*/

    // TRAINING LIST 6
    public function getTrainingList6()
    {   
        // selected filter value
        $dept = $this->input->post('dept', true);
        $month = $this->input->post('month', true);
        $year = $this->input->post('year', true);

        // get available records
        $data['tr_list'] = $this->et_mdl->getTrainingList6($dept, $month, $year);

        $this->render($data);
    }

    // STAFF LIST 4
    public function trStaffList4()
    {   
        // selected filter value
        $refid = $this->input->post('refid', true);

        if(!empty($refid)) {
            $data['refid'] = $refid;
            $tr_detl = $this->et_mdl->getTrainingHead($refid);
            if(!empty($tr_detl)) {
                $data['tr_title'] = $tr_detl->TH_TRAINING_TITLE;
            } else {
                $data['tr_title'] = '';
            }
        } else {
            $data['refid'] = '';
            $data['tr_title'] = '';
        }

        // get available records
        $data['stf_list'] = $this->et_mdl->getTrStaffList4($refid);

        $this->render($data);
    }

    // SEARCH STAFF
    public function searchStaffAssignTr() 
    {
        $staff_id = $this->input->post('staff_id', true);
        $search_trigger = $this->input->post('search_trigger', true);
        $refid = $this->input->post('refid', true);

        if(!empty($refid) && !empty($staff_id) && $search_trigger == 1) {
            $data['refid'] = $refid;

            $data['stf_inf'] = $this->et_mdl->getStaffSearch($staff_id);

            // role dd
            $data['role_list'] = $this->dropdown($this->et_mdl->getRoleDD(), 'TPR_CODE', 'TPR_CODE_DESC', ' ---Please select--- ');

            // fee code dd
            $data['fee_list'] = $this->dropdown($this->et_mdl->getFeeDD(), 'TFS_CODE', 'TFS_CODE_DESC', ' ---Please select--- ');

            // $data['role_list'] = $this->et_mdl->getRoleDD();

            $this->render($data);
        } else {
            $data['refid'] = $refid;
            $this->render($data);
        }
    }

    // STAFF FORM DETL
    public function staffFormDetl() 
    {
		$this->isAjax();
		
        $refid = $this->input->post('refid', true);
        $staff_id = $this->input->post('staff_id', true);
        
        if (!empty($refid) && !empty($staff_id)) {
            // STAFF DEPT
            $info1 = $this->et_mdl->getStaffDept($staff_id);
            if(!empty($info1)) {
                $dept = $info1->SM_DEPT_CODE;
            } else {
                $dept = '';
            }

            // TRAINING FEE
            $info2 = $this->et_mdl->getTrainingFee($refid);
            if(!empty($info2)) {
                $fee = number_format($info2->TC_AMOUNT, 2);
            } else {
                $fee = '';
            }
    
            if(!empty($dept) && !empty($fee)) {
                $json = array('sts' => 1, 'msg' => 'Details found', 'alert' => 'success', 'dept' => $dept, 'fee' => $fee);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to get details', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => 'Invalid operation. Please contact administrator', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // SAVE ASSIGN STAFF
    public function saveAssignStaff()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $staff_id = $form['staff_id_form'];
        $sth_status = $form['status'];
        $eva_id = '';
        $sth_complete = '';

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]', 
            'staff_id_form' => 'required|max_length[10]', 
            'role' => 'required|max_length[100]',
            'status' => 'max_length[15]',
            'fee_category' => 'required|max_length[10]',
            'tr_benefit_stf' => 'max_length[200]',
            'tr_benefit_dept' => 'max_length[200]',
            'remark' => 'max_length[300]',
            'remark_other' => 'max_length[300]',
            'eva_status' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check =  $this->et_mdl->assignStaffDetl($refid, $staff_id);

            if(empty($check)) {
                $tr_detl =  $this->et_mdl->getTrDetl($refid);

                if(!empty($tr_detl)) {
                    $att_type = $tr_detl->TH_ATTENDANCE_TYPE;
                    $th_evaluation = $tr_detl->TH_EVALUATION_COMPULSORY;
                } else {
                    $att_type = '';
                    $th_evaluation = '';
                }

                if(empty($att_type) || $att_type == 'NONE' && $th_evaluation == 'N') {
                    $sth_complete = 'Y';
                }

                if($sth_status != 'REJECT' || $sth_status != 'CANCEL') {
                    if($th_evaluation == 'Y') {
                        $eva_detl =  $this->et_mdl->getEvaluatorDetl($staff_id);
                        if(!empty($eva_detl)) {
                            $eva_id = $eva_detl->DM_DIRECTOR;
                        }
                    }
                }

                $insert =  $this->et_mdl->saveAssignStaff($form, $sth_complete, $eva_id);
                // $insert =  1;

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => $staff_id);
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

    // EDIT ASSIGN STAFF
    public function editAssignStfTr() 
    {
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);

        if(!empty($refid) && !empty($staff_id)) {
            $data['refid'] = $refid;
            $data['staff_id'] = $staff_id;

            // $data['stf_inf'] = $this->et_mdl->getStaffList($staff_id);
            $data['assign_detl'] = $this->et_mdl->getAssignStfDetl($refid, $staff_id);

            // role dd
            $data['role_list'] = $this->dropdown($this->et_mdl->getRoleDD(), 'TPR_CODE', 'TPR_CODE_DESC', ' ---Please select--- ');

            // fee code dd
            $data['fee_list'] = $this->dropdown($this->et_mdl->getFeeDD(), 'TFS_CODE', 'TFS_CODE_DESC', ' ---Please select--- ');
        } 

        $this->render($data);
    }

    // SAVE EDIT ASSIGN STAFF
    public function saveEditAssignStaff()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $staff_id = $form['staff_id_form'];
        $sth_status = $form['status'];
        $update2Msg = '';
        $update3Msg = '';
        $sth_complete = '';

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]', 
            'staff_id_form' => 'required|max_length[10]', 
            'role' => 'required|max_length[100]',
            'status' => 'max_length[15]',
            'fee_category' => 'required|max_length[10]',
            'tr_benefit_stf' => 'max_length[200]',
            'tr_benefit_dept' => 'max_length[200]',
            'remark' => 'max_length[300]',
            'remark_other' => 'max_length[300]',
            'eva_status' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {

            $tr_detl =  $this->et_mdl->getTrDetl($refid);

            if(!empty($tr_detl)) {
                $att_type = $tr_detl->TH_ATTENDANCE_TYPE;
                $th_evaluation = $tr_detl->TH_EVALUATION_COMPULSORY;
            } else {
                $att_type = '';
                $th_evaluation = '';
            }

            if(empty($att_type) || $att_type == 'NONE' && $th_evaluation == 'N') {
                $sth_complete = 'Y';
            }

            if($sth_status == 'REJECT' || $sth_status == 'CANCEL') {
                $cnt = $this->et_mdl->getSumCNT($staff_id);
                if(!empty($cnt)) {
                    $jumum = (int)$cnt->SUM_CNT;
                } else {
                    $jumum = 0;
                }

                $cnt2 = $this->et_mdl->getSumCNT2($staff_id);
                if(!empty($cnt2)) {
                    $jkhu = (int)$cnt2->SUM_CNT2;
                } else {
                    $jkhu = 0;
                }

                $cnt3 = $this->et_mdl->getSumCNT3($staff_id);
                if(!empty($cnt3)) {
                    $jum_cpd = (int)$cnt3->SUM_CNT3;
                } else {
                    $jum_cpd = 0;
                }

                $cpd_detl = $this->et_mdl->getCPDDetl($staff_id);
                if(!empty($cpd_detl)) {
                    $sch_jum_cpd = (int)$cpd_detl->SCH_JUM_CPD;
                    $sch_cpd_layak = (int)$cpd_detl->SCH_CPD_LAYAK;
                    $lnptweightage = (int)$cpd_detl->CP_LNPT_WEIGHTAGE;

                    // UPDATE STAFF_CPD_HEAD
                    $update2 =  $this->et_mdl->updateSCH($staff_id, $jumum, $jkhu, $jum_cpd);
                    if($update2 > 0) {
                        $update2Msg = nl2br("\r\n").'Record has been saved (Staff CPD)';
                    } else {
                        $update2Msg = '';
                    }

                    if($sch_jum_cpd < $sch_cpd_layak) {
                        $res = $lnptweightage;
                    } else {
                        if($sch_cpd_layak == 0) {
                            $res = 0;
                        } else {
                            $res_sum = ($sch_jum_cpd / $sch_cpd_layak) * $lnptweightage;
                            $res = round($res_sum, 2);
                        }
                    }

                    // UPDATE STAFF_CPD_HEAD 2
                    $update3 =  $this->et_mdl->updateSCH2($staff_id, $res);
                    if($update3 > 0) {
                        $update3Msg = nl2br("\r\n").'Record has been saved (Staff CPD 2)';
                    } else {
                        $update3Msg = '';
                    }
                } else {
                    $update2Msg = nl2br("\r\n").'<font class="text-danger">No record saved on Staff CPD</font>';
                }

            }

            $update =  $this->et_mdl->saveEditAssignStaff($form, $sth_complete);

            if($update > 0) {
                $json = array('sts' => 1, 'msg' => 'Record has been saved'.$update2Msg.$update3Msg, 'alert' => 'success', 'refid' => $refid, 'staff_id' => $staff_id);
            } else {
                $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
            }
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    // UPDATE TRAINING DETAILS
    public function updTrainingDetl() 
    {
        $staff_id = $this->input->post('staff_id', true);
        $refid = $this->input->post('refid', true);
        $sth_status = $this->input->post('sth_status', true);

        if(!empty($refid) && !empty($staff_id)) {
            $data['refid'] = $refid;
            $data['staff_id'] = $staff_id;
            $data['sth_status'] = $sth_status;

            $data['stf_inf'] = $this->et_mdl->getStaffList($staff_id);

            $data['tr_detl'] = $this->et_mdl->getTrainingDetl($refid, $staff_id);

            if(!empty($data['tr_detl'])) {
                $data['c_reason'] = $data['tr_detl']->STD_CANCEL_REASON;
                $data['mpe_date'] = $data['tr_detl']->STD_MPE_DATE2;
                $data['nitc'] = $data['tr_detl']->STD_TRAINING_CALENDAR;
                $data['wrelated'] = $data['tr_detl']->STD_WORK_RELATED;
            } else {
                $data['c_reason'] = '';
                $data['mpe_date'] = '';
                $data['nitc'] = '';
                $data['wrelated'] = '';
            }
        } 

        $this->render($data);
    }

    // SAVE EDIT TRAINING DETAIL
    public function saveEditTrDetl()
    {
        $this->isAjax();

        // get parameter values
        $form = $this->input->post('form', true);

        $refid = $form['refid'];
        $staff_id = $form['staff_id_form'];
        $sth_status = $form['status'];

        // form / input validation
        $rule = array(
            'refid' => 'required|max_length[30]', 
            'staff_id_form' => 'required|max_length[10]', 
            'status' => 'max_length[15]',
            'cancel_reason' => 'max_length[200]',
            'mpe_date' => 'max_length[11]',
            'nitc' => 'max_length[1]',
            'wrelated' => 'max_length[1]'
        );

        $exclRule = null;
        
        list($status, $err) = $this->validation('form', $form, $exclRule, $rule);

        if ($status == 1) {
            $check =  $this->et_mdl->getTrainingDetl($refid, $staff_id);

            if(!empty($check)) {
                $update =  $this->et_mdl->saveEditTrDetl($form);

                if($update > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => $staff_id);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            } else {
                $insert =  $this->et_mdl->saveInsTrDetl($form);

                if($insert > 0) {
                    $json = array('sts' => 1, 'msg' => 'Record has been saved', 'alert' => 'success', 'refid' => $refid, 'staff_id' => $staff_id);
                } else {
                    $json = array('sts' => 0, 'msg' => 'Fail to save record', 'alert' => 'danger');
                }
            }
            
        } else {
            $json = array('sts' => 0, 'msg' => $err, 'alert' => 'danger');
        }
         
        echo json_encode($json);
    }

    /*===========================================================
       REPORTS FOR EXTERNAL AGENCY - ATF144
    =============================================================*/

    // PRINT LETTER REPORT
    public function printLetterRep()
    {
        $this->render();
    }

    // SEARCH TRAINING
    public function searchTrainingMd() 
    {
        $data['train_list'] = $this->et_mdl->getExtTrainList();

        $this->render($data);
    }

    // PRINT EXTERNAL TRAINING REPORT
    public function extReport()
    {
        $data['date'] = $this->et_mdl->getCurDate();

        $data['cur_month'] = $data['date']->SYSDATE_MM;  
        $data['cur_year'] = $data['date']->SYSDATE_YYYY;
        
        //get year dd list
        $data['year_list'] = $this->dropdown($this->et_mdl->getYearListAppTr2(), 'CM_YEAR', 'CM_YEAR', ' --Please select-- ');
        
        //get month dd list
        $data['month_list'] = $this->dropdown($this->et_mdl->getMonthList(), 'CM_MM', 'CM_MONTH', ' --Please select-- ');

        $data['dept_list'] = $this->dropdown($this->et_mdl->getDeptAll(), 'DM_DEPT_CODE', 'DP_CODE_DESC', ' ---Please select--- ');

        $data['sts_list'] = array(''=>'---Please select---', 'APPLY'=>'APPLY', 'RECOMMEND'=>'RECOMMEND', 'RECOMMEND_BSM'=>'RECOMMEND_BSM', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT');

        // fee code dd
        $data['fee_list'] = $this->dropdown($this->et_mdl->getFeeDD(), 'TFS_CODE', 'TFS_CODE_DESC', ' ---Please select--- ');

        $this->render($data);
    }

    // SEARCH STAFF EXTERNAL
    public function searchStaffMdExt() 
    {
        $refid = $this->input->post('refid', true);

        $data['stf_inf'] = $this->et_mdl->searchStaffMdExt($refid);

        $this->render($data);
    }
}
