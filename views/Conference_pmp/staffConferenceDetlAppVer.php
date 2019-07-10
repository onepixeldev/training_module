<form id="staffConDetlAppVer" class="form-horizontal" method="post">
    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="form[remark]" placeholder="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $stf_detl->SCM_TNCA_REMARK?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Budget Origin</label>
        <div class="col-md-4">
            <input name="form[budget_origin]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_BUDGET_ORIGIN?>" readonly>
        </div>

        <div class="col-md-2 hidden" id="rsh_btn">
            <button type="button" class="btn btn-primary research_info" data-budget-origin="<?php echo $stf_detl->SCM_BUDGET_ORIGIN?>" value="<?php echo $stf_detl->SCM_RESEARCH_REFID?>"><i class="fa fa-info-circle"></i> Research Info</button>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Previous Budget Origin</label>
        <div class="col-md-4">
            <input name="form[previous_budget_origin]" class="form-control" type="text" value="<?php echo $stf_detl->SCM_BUDGET_ORIGIN_PREV?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Category</label>
        <div class="col-md-6">
            <?php
                echo form_dropdown('form[category]', $cr_cat_list, $stf_detl->SCM_CATEGORY_CODE, 'class="form-control width-50" disabled')
            ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label">Applied (RM) (Conference/PTNCA)</label>
        <div class="col-md-2">
            <input name="form[applied_rm_conference_ptnca]" placeholder="Total (RM)" class="form-control" type="text" value="<?php echo number_format($stf_detl->SCM_RM_TOTAL_AMT, 2)?>" readonly>
        </div>

        <label class="col-md-3 control-label">Applied (RM) (Department)</label>
        <div class="col-md-2">
            <input name="form[applied_rm_department]" class="form-control" type="text" value="<?php echo number_format($stf_detl->SCM_RM_TOTAL_AMT_DEPT, 2)?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Approved HOD (RM) (Conference/PTNCA)</label>
        <div class="col-md-2">
            <input name="form[approved_hod_rm_conference_ptnca]" class="form-control" type="text" value="<?php echo number_format($stf_detl->SCM_RM_TOTAL_AMT_APPROVE_HOD, 2)?>" readonly>
        </div>

        <label class="col-md-3 control-label">Approved HOD (RM) (Department/Research)</label>
        <div class="col-md-2">
            <input name="form[approved_hod_rm_department_research]" class="form-control" type="text" value="<?php echo number_format($stf_detl->SCM_TOTAL_AMT_DEPT_APPRV_HOD, 2)?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Approved RMIC (RM) (Research)</label>
        <div class="col-md-2">
            <input name="form[approved_rmic_rm_research]" class="form-control" type="text" value="<?php echo number_format($stf_detl->SCM_RM_TOT_AMT_APPRV_RMIC, 2)?>" readonly>
        </div>

        <label class="col-md-3 control-label">Approved TNC P&I (RM)</label>
        <div class="col-md-2">
            <input name="form[approved_tnc_pi]" class="form-control" type="text" value="<?php echo number_format($stf_detl->SCM_RM_TOT_AMT_APPRV_TNCPI, 2)?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Approved TNC A&A (RM)</label>
        <div class="col-md-2">
            <input name="form[approved_tnc_aa]" class="form-control" type="text" value="<?php echo number_format($stf_detl->SCM_RM_TOTAL_AMT_APPROVE_TNCA, 2)?>" readonly>
        </div>

        <div class="col-md-2 hidden" id="allw_detl">
            <button type="button" class="btn btn-primary allowance_detl" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staffID?>"><i class="fa fa-info-circle"></i> Allowance Detail</button>
        </div>
        <div class="col-md-2 hidden" id="allw_detl2">
            <button type="button" class="btn btn-primary allowance_detl2" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staffID?>"><i class="fa fa-info-circle"></i> Allowance Detail</button>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Approved / Rejected By</label>
        <div class="col-md-8">
            <?php
                echo form_dropdown('form[approved_by_tnc]', $staff_list, $app_rejc_id, 'class="select2-filter form-control" style = "width: 100%" disabled')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved / Rejected Date</label>
        <div class="col-md-2">
            <input name="form[approved_date_tnc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $curr_date?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Receive Date</label>
        <div class="col-md-2">
            <input name="form[received_date_tnc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $receive_date?>" readonly>
        </div>
    </div>

    <!--<div id="alertEditStaffConferenceFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary save_staff_con_detl_app_ver"><i class="fa fa-save"></i> Save</button>
    </div>-->
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