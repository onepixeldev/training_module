<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cpd_report extends MY_Controller
{
    private $staff_id;
    private $username;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cpd_model', 'mdl_cpd');
        $this->load->model('Conference_pmp_model', 'mdl_pmp');
        $this->staff_id = $this->lib->userid();
        $this->username = $this->lib->username();
    }

    // CPD REPORTS
    public function ATF136()
    {
        $this->render();
    }

    // COORDINATOR REPORT
    public function coorReport()
    {
        $data['month'] = $this->mdl_pmp->getCurDate();
        $data['year'] = $this->mdl_pmp->getCurDate();
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_pmp->getYearList(), 'CM_YEAR', 'CM_YEAR', '--Please select--');

        // FORMAT LIST
        $data['format_dd'] = array('PDF'=>'PDF', 'EXCEL' =>'EXCEL');

        // CURRENT LOGIN STAFF DEPT
        $staff_dp = $this->mdl_cpd->getStaffDept();
        if(!empty($staff_dp)) {
            $dept = $staff_dp->SM_DEPT_CODE;
        } else {
            $dept = '';
        }

        // HRD DEPT
        $parm_dept = $this->mdl_cpd->getCpdAdminDeptCode();
        // if(!empty($parm)) {
        //     $parm_dept = $parm->HP_PARM_DESC;
        // } else {
        //     $parm_dept = '';
        // }

        if($dept == $parm_dept) {
            $is_hr_staff = 'Y';

            // PTJ LIST
            $data['ptj_list'] = $this->dropdown($this->mdl_cpd->getPtjList($is_hr_staff), 'DM_DEPT_CODE', 'DM_DEPT_CD', ' ---Please select--- ');
        } else {
            $is_hr_staff = 'N';

            // PTJ LIST
            $data['ptj_list'] = $this->dropdown($this->mdl_cpd->getPtjList($is_hr_staff), 'DM_DEPT_CODE', 'DM_DEPT_CD', '');
        }

        // PTJ LIST
        // $data['ptj_list'] = $this->dropdown($this->mdl_cpd->getPtjList($is_hr_staff), 'DM_DEPT_CODE', 'DM_DEPT_CD', ' ---Please select--- ');

        $this->render($data);
    }

    // PANEL SECTOR REPORT
    public function sectorReport()
    {
        $data['month'] = $this->mdl_pmp->getCurDate();
        $data['year'] = $this->mdl_pmp->getCurDate();
 
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_pmp->getYearList(), 'CM_YEAR', 'CM_YEAR', '--Please select--');

        // FORMAT LIST
        $data['format_dd'] = array('PDF'=>'PDF', 'EXCEL' =>'EXCEL');

        // SECTOR LIST
        $data['sec_list'] = $this->dropdown($this->mdl_cpd->getSector(), 'SC_CLASS_SECTOR', 'SC_CLASS_SECTOR', ' ---Please select--- ');

        // JOB LIST
        $data['job_list'] = $this->dropdown($this->mdl_cpd->getJobList(), 'SS_SERVICE_CODE', 'SS_SERVICE_CODE_DC', ' ---Please select--- ');

        $this->render($data);
    }

    // STAT REPORT
    public function statReport()
    {
        $data['month'] = $this->mdl_pmp->getCurDate();
        $data['year'] = $this->mdl_pmp->getCurDate();
 
        $data['cur_year'] = $data['month']->SYSDATE_YYYY;       

        //get year dd list
        $data['year_list'] = $this->dropdown($this->mdl_pmp->getYearList(), 'CM_YEAR', 'CM_YEAR', '--Please select--');

        // FORMAT LIST
        $data['format_dd'] = array('PDF'=>'PDF', 'EXCEL' =>'EXCEL');

        $this->render($data);
    }

    // CHANGE JOB LIST
    public function getJobList()
    {  
        $this->isAjax();
        $year = $this->input->post('year', true);
        $sector = $this->input->post('sector', true);
        $scheme = $this->input->post('scheme', true);

        $list = $this->mdl_cpd->getJobList($sector, $scheme, $year);

        if (!empty($list)) {
            $json = array('sts' => 1, 'msg' => 'Found', 'alert' => 'green', 'job_list' => $list);
        } else {
            $json = array('sts' => 0, 'msg' => 'Not found', 'alert' => 'red');
        }
         
        echo json_encode($json);
    }

    // POPULATE SCHEME LIST
    public function getSchemeList()
    {  
        $this->isAjax();
        $sector = $this->input->post('sector', true);

        $list = $this->mdl_cpd->getScheme($sector);

        if (!empty($list)) {
            $json = array('sts' => 1, 'msg' => 'Found', 'alert' => 'green', 'scheme_list' => $list);
        } else {
            $json = array('sts' => 0, 'msg' => 'Not found', 'alert' => 'red');
        }
         
        echo json_encode($json);
    }

    // AUTO SEARCH STAFF ID
    public function staffKeyUp()
    {  
        $this->isAjax();
        $staff_id = $this->input->post('staff_id', true);
        $found = 0;

        if (!empty($staff_id)) {
            $stf_inf = $this->mdl_cpd->getStaffList($staff_id, $dept = null);
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

    // SEARCH STAFF
    public function searchStaffMd() {
        $staff_id = $this->input->post('staff_id', true);
        $search_trigger = $this->input->post('search_trigger', true);
        $dept = $this->input->post('dept', true);

        if(!empty($staff_id) && $search_trigger == 1) {
            $data['stf_inf'] = $this->mdl_cpd->getStaffSearch($staff_id, $dept);
            $this->render($data);
        } elseif(empty($staff_id) && $search_trigger == 1) {
            $data['stf_inf'] = $this->mdl_cpd->getStaffList($staff_id = null, $dept);
            $this->render($data);
        } else {
            $this->render();
        }
    }

    // SET REPORT PARAM
    public function setRepParam() {
		$this->isAjax();
	
		$repCode = $this->input->post('repCode', true);
		$param = '';
		
		if ($repCode == 'ATR264') {
			$year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);
            $is_hr = $this->input->post('is_hr', true);

            // if($format == 'EXCEL') {
            //     $repCode = 'ATR187';
            // }

            if($is_hr == 'N') {
                $repCode = 'ATR187';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        } 
        elseif($repCode == 'ATR188') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);

            if($format == 'EXCEL') {
                $repCode = 'ATR216';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        } 
        elseif($repCode == 'ATR189') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);

            if($format == 'EXCEL') {
                $repCode = 'ATR217';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR282') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);

            if($format == 'EXCEL') {
                $repCode = 'ATR217';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR190') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);

            if($format == 'EXCEL') {
                $repCode = 'ATR208';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR191') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);

            if($format == 'EXCEL') {
                $repCode = 'ATR191';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR283') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);

            if($format == 'EXCEL') {
                $repCode = 'ATR191';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR256') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);

            if($format == 'EXCEL') {
                $repCode = 'ATR191';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR262') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $format = $this->input->post('format', true);

            if($format == 'EXCEL') {
                $repCode = 'ATR262';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR240') {
            $year = $this->input->post('year', true);
            $dept = $this->input->post('dept', true);
            $staff_id = $this->input->post('staff_id', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR240X';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','DEPT'=>$dept, 'YEAR'=>$year, 'STAFFID'=>$staff_id));
        }
        elseif($repCode == 'ATR202') {
            $year = $this->input->post('year', true);
            $scheme = $this->input->post('scheme', true);
            $sector = $this->input->post('staff_id', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR212';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','SCHEME'=>$scheme, 'YEAR'=>$year, 'SECTOR'=>$sector));
        }
        elseif($repCode == 'ATR203') {
            $year = $this->input->post('year', true);
            $scheme = $this->input->post('scheme', true);
            $sector = $this->input->post('staff_id', true);
            $job = $this->input->post('job', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR214';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','SCHEME'=>$scheme, 'YEAR'=>$year, 'SECTOR'=>$sector, 'JOB'=>$job));
        }
        elseif($repCode == 'ATR207') {
            $year = $this->input->post('year', true);
            $scheme = $this->input->post('scheme', true);
            $sector = $this->input->post('staff_id', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR213';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO','SCHEME'=>$scheme, 'YEAR'=>$year, 'SECTOR'=>$sector));
        }
        elseif($repCode == 'ATR263') {
            $year = $this->input->post('year', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR263';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO', 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR261') {
            $year = $this->input->post('year', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR261';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO', 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR253') {
            $year = $this->input->post('year', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR253X';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO', 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR254') {
            $year = $this->input->post('year', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR254X';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO', 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR284') {
            $year = $this->input->post('year', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR284';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO', 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR200') {
            $year = $this->input->post('year', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR204';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO', 'YEAR'=>$year));
        }
        elseif($repCode == 'ATR201') {
            $year = $this->input->post('year', true);
            $format = $this->input->post('format', true);
            
            if($format == 'EXCEL') {
                $repCode = 'ATR205';
            }

            $param = $this->encryption->encrypt_array(array('REPORT'=>$repCode,'FORMAT'=>$format,'PARAMFORM' => 'NO', 'YEAR'=>$year));
        }
		
		$json = array('report' => $param);
		
		echo json_encode($json);		
    } 
    
    // GENERATE REPORT
    public function reportOracle(){
		$report = $this->encryption->decrypt_array($this->input->get('r'));
		$this->lib->generate_report($report, false);
    }
	
		// Calling Jasper Reports
	public function report(){
		// Load jasperreport library
		$this->load->library('jasperreport');
		
		// get report parameters
		$param = $this->encryption->decrypt_array($this->input->get('r'));
		
		// get report code and format
		$repCode = isset($param['REPORT'])?strtoupper($param['REPORT']):'';
		$format = isset($param['FORMAT'])?strtolower($param['FORMAT']):'pdf';
		
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

    // VALIDATE HRD
    public function validateHrd() {
        $this->isAjax();

        $role = 'COORDINATOR';

        // CURRENT LOGIN STAFF DEPT
        $staff_dp = $this->mdl_cpd->getStaffDept();
        if(!empty($staff_dp)) {
            $dept = $staff_dp->SM_DEPT_CODE;
        } else {
            $dept = '';
        }

        // HRD DEPT
        $parm_dept = $this->mdl_cpd->getCpdAdminDeptCode();
        // if(!empty($parm)) {
        //     $parm_dept = $parm->HP_PARM_DESC;
        // } else {
        //     $parm_dept = '';
        // }

        if($dept == $parm_dept) {
            $is_hr_staff = 'Y';
        } else {
            $is_hr_staff = 'N';
        }

        // COUNT USER LVL
        if($is_hr_staff == 'N') {
            $count = $this->mdl_cpd->getCntUsrLvl($role);
            if(!empty($count)) {
                $cnt = (int)$count->COUNT_USR;
            } else {
                $cnt = 0;
            }
        } else {
            $cnt = 1;
        }

        if($cnt > 0) {
            $json = array('sts' => 1, 'msg' => 'Print', 'alert' => 'success', 'is_hr' => $is_hr_staff);
        } else {
            $json = array('sts' => 0, 'msg' => 'Sorry, Access Denied. You are not authorized to access the report.', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // VALIDATE HRD 2
    public function validateHrd2() {
        $this->isAjax();

        $role = 'PANEL';

        // CURRENT LOGIN STAFF DEPT
        $staff_dp = $this->mdl_cpd->getStaffDept();
        if(!empty($staff_dp)) {
            $dept = $staff_dp->SM_DEPT_CODE;
        } else {
            $dept = '';
        }

        // HRD DEPT
        $parm_dept = $this->mdl_cpd->getCpdAdminDeptCode();
        // if(!empty($parm)) {
        //     $parm_dept = $parm->HP_PARM_DESC;
        // } else {
        //     $parm_dept = '';
        // }

        if($dept == $parm_dept) {
            $is_hr_staff = 'Y';
        } else {
            $is_hr_staff = 'N';
        }

        // COUNT USER LVL
        if($is_hr_staff == 'N') {
            $count = $this->mdl_cpd->getCntUsrLvl($role);
            if(!empty($count)) {
                $cnt = (int)$count->COUNT_USR;
            } else {
                $cnt = 0;
            }
        } else {
            $cnt = 1;
        }
        
        if($cnt > 0) {
            $json = array('sts' => 1, 'msg' => 'Print', 'alert' => 'success', 'is_hr' => $is_hr_staff);
        } else {
            $json = array('sts' => 0, 'msg' => 'Sorry, Access Denied. You are not authorized to access the report.', 'alert' => 'danger');
        }
        echo json_encode($json);
    }

    // VALIDATE HRD 3
    public function validateHrd3() {
        $this->isAjax();

        // CURRENT LOGIN STAFF DEPT
        $staff_dp = $this->mdl_cpd->getStaffDept();
        if(!empty($staff_dp)) {
            $dept = $staff_dp->SM_DEPT_CODE;
        } else {
            $dept = '';
        }

        // HRD DEPT
        $parm_dept = $this->mdl_cpd->getCpdAdminDeptCode();
        // if(!empty($parm)) {
        //     $parm_dept = $parm->HP_PARM_DESC;
        // } else {
        //     $parm_dept = '';
        // }

        if($dept == $parm_dept) {
            $is_hr_staff = 'Y';
        } else {
            $is_hr_staff = 'N';
        }
        
        if($is_hr_staff  == 'Y') {
            $json = array('sts' => 1, 'msg' => 'Print', 'alert' => 'success');
        } else {
            $json = array('sts' => 0, 'msg' => 'Sorry, Access Denied. You are not authorized to access the report.', 'alert' => 'danger');
        }
        echo json_encode($json);
    }
}