<form id="staffConDetlAppVer" class="form-horizontal" method="post">

    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staffID?>" id="staff_id" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $crStaffName?>" id="staff_name" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-2 control-label">Service Code</label>
        <div class="col-md-2">
            <input name="form[svc_code]" class="form-control" type="text" value="<?php echo $svc_code?>" id="svc_code" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[svc_desc]" class="form-control" type="text" value="<?php echo $svc_desc?>" id="svc_desc" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[conference_title]" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[conference_name]" class="form-control" type="text" value="<?php echo $crName?>" id="crName" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Mod</label>
        <div class="col-md-2">
            <input name="form[mod]" class="form-control" type="text" value="" id="modDetl" readonly>
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Details</b>
    </div>
    <div id="alertStaffConDetlAppVer"></div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="form[remark]" placeholder="" class="form-control" type="text" rows="4" cols="50" id="remark"><?php echo $remark?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Budget Origin</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[budget_origin]', $cr_budget_origin_list, $stf_detl->SCM_BUDGET_ORIGIN, 'class="form-control width-50" id="budOrg"')
            ?>
        </div>

        <div class="col-md-2 hidden" id="rsh_btn">
            <button type="button" class="btn btn-primary research_info" data-budget-origin="<?php echo $stf_detl->SCM_BUDGET_ORIGIN?>" value="<?php echo $stf_detl->SCM_RESEARCH_REFID?>"><i class="fa fa-info-circle"></i> Research Info</button>
        </div>
    </div>

    <div class="form-group" id="prev_bud_org">
        <label class="col-md-2 control-label">Previous Budget Origin</label>
        <div class="col-md-4">
            <input name="form[previous_budget_origin]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_BUDGET_ORIGIN_PREV?>" id="prev_bug_org" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Category</label>
        <div class="col-md-6">
            <?php
                echo form_dropdown('form[category]', $cr_cat_list, $stf_detl->SCM_CATEGORY_CODE, 'class="form-control width-50" id="catCode"')
            ?>
        </div>
    </div>
    <br>

    <div class="form-group hidden" id="app_research">
        <label class="col-md-3 control-label">Applied (RM) (Research)</label>
        <div class="col-md-2">
            <input name="form[applied_rm_research]" placeholder="Total (RM)" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_TOT_AMT_RMIC?>" readonly>
        </div>
    </div>

    <div class="form-group" id="app_dept_con_ptnca">
        <label class="col-md-3 control-label">Applied (RM) (Conference/PTNCA)</label>
        <div class="col-md-2">
            <input name="form[applied_rm_conference_ptnca]" placeholder="Total (RM)" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_TOTAL_AMT?>" readonly id="total_rm2">
        </div>

        <label class="col-md-3 control-label">Applied (RM) (Department)</label>
        <div class="col-md-2">
            <input name="form[applied_rm_department]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_TOTAL_AMT_DEPT?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <div id="app_hod">
            <label class="col-md-3 control-label">Approved HOD (RM) (Conference/PTNCA)</label>
            <div class="col-md-2">
                <input name="form[approved_hod_rm_conference_ptnca]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_TOTAL_AMT_APPROVE_HOD?>" readonly id="hod_amount">
            </div>
        </div>
        

        <label class="col-md-3 control-label">Approved HOD (RM) (Department/Research)</label>
        <div class="col-md-2">
            <input name="form[approved_hod_rm_department_research]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_TOTAL_AMT_DEPT_APPRV_HOD?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Approved RMIC (RM) (Research)</label>
        <div class="col-md-2">
            <input name="form[approved_rmic_rm_research]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_TOT_AMT_APPRV_RMIC?>" readonly id="rmic_amount">
        </div>

        <div id="tncPIf">
            <label class="col-md-3 control-label">Approved TNC P&I (RM)</label>
            <div class="col-md-2">
                <input name="form[approved_tnc_pi]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_TOT_AMT_APPRV_TNCPI?>" readonly id="tncpi_amount">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div id="app_tncaa">
            <label class="col-md-3 control-label">Approved TNC A&A (RM)</label>
            <div class="col-md-2">
                <input name="form[approved_tnc_aa]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_TOTAL_AMT_APPROVE_TNCA?>" readonly id="approved_tnc_aa">
            </div>
        </div>
        
        <div class="col-md-2 hidden" id="allw_detl">
            <button type="button" class="btn btn-primary allowance_detl" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staffID?>" data-serv-code="<?php echo $svc_code?>" data-serv-desc="<?php echo $svc_desc?>"><i class="fa fa-info-circle"></i> Allowance Detail</button>
        </div>
        <div class="col-md-2 hidden" id="allw_detl2">
            <button type="button" class="btn btn-primary allowance_detl2" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staffID?>" data-serv-code="<?php echo $svc_code?>" data-serv-desc="<?php echo $svc_desc?>"><i class="fa fa-info-circle"></i> Allowance Detail</button>
        </div>
    </div>

    <div class="form-group hidden" id="app_vc">
        <label class="col-md-3 control-label">Approved VC (RM)</label>
        <div class="col-md-2">
            <input name="form[approved_vc]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_TOTAL_AMT_APPROVE_VC?>" readonly id="approved_vc">
        </div>

        <div class="col-md-2 hidden" id="allw_detl_vc">
            <button type="button" class="btn btn-primary allowance_detl_vc" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staffID?>"><i class="fa fa-info-circle"></i> Allowance Detail</button>
        </div>
        <div class="col-md-2 hidden" id="allw_detl2_vc">
            <button type="button" class="btn btn-primary allowance_detl2_vc" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staffID?>"><i class="fa fa-info-circle"></i> Allowance Detail</button>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved / Rejected By</label>
        <div class="col-md-2">
            <input name="form[approved_rjc_by_tnc]" class="form-control" type="text" value="<?php echo $app_rejc_id?>" id="approved_rjc_by_tnc">
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $app_rejc_name?>" id="approved_rjc_by_tnc_name" readonly>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary search_staff"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-3" id="alertStfID">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved / Rejected Date</label>
        <div class="col-md-2">
            <input name="form[approved_rjc_date_tnc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $curr_date?>" id="approved_rjc_date_tnc">
        </div>
    </div>

    <div class="form-group" id="received_date">
        <label class="col-md-2 control-label">Receive Date</label>
        <div class="col-md-2">
            <input name="form[received_date_tnc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $receive_date?>" id="received_date_tnc" readonly>
        </div>
    </div>

    <div id="alertStaffConDetlAppVerFooter"></div>
    
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-success save_staff_con_detl_app_ver"><i class="fa fa-save"></i> Save</button>-->
        <!--<div class="btn-group">
            <button type="button" class="btn btn-md btn-primary" data-toggle="dropdown"><i class="fa fa-cog"></i> Option</button>
            <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                <button type="button" class="btn btn-warning text-left btn-block btn-md amend_stf_app_ver" value=""><i class="fa fa-share-square-o"></i> Amend</button>
                <button type="button" class="btn btn-primary text-left btn-block btn-md approve_stf_app_ver" value=""><i class="fa fa-check-square-o"></i> Approve</button>
                <button type="button" class="btn btn-danger text-left btn-block btn-md reject_stf_app_ver" value=""><i class="fa fa-times-circle"></i> Reject</button>
            </div>
        </div>-->

        <button type="button" class="btn btn-primary text-left btn-md save_stf_detl"><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-warning text-left btn-md amend_stf_app_ver" value=""><i class="fa fa-share-square-o"></i> Amend</button>
        <button type="button" class="btn btn-success text-left btn-md approve_stf_app_ver" value=""><i class="fa fa-check-square-o"></i> Approve</button>
        <button type="button" class="btn btn-danger text-left btn-md reject_stf_app_ver" value=""><i class="fa fa-times-circle"></i> Reject</button>
    </div>
</form>

<div id="allowance_detl">
    
</div>

<script>
	$(document).ready(function(){
        $('.select2-filter').select2({
            // placeholder: 'Select an option',
            width: 'resolve'
        });
        
        $('.datepicker').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });
	});
</script>