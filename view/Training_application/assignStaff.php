<form id="assignNwStaff" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Assign New Staff</h4>
    </div>
    <div class="modal-body">
        <div id="alertAssignNwStaff">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" id="refid" readonly>

        <!--<div class="form-group">
            <label class="col-md-2 control-label">Department <b><font color="red">* </font></b></label>
            <div class="col-md-7"> 
                <?php
                   // echo form_dropdown('form[department]', $dept_list, '', 'class="selectpicker form-control width-50" id="deptList"')
                ?>
            </div>
        </div>-->

        <div class="form-group">
            <label class="col-md-2 control-label">Staff ID <b><font color="red">* </font></b></label>
            <div class="col-md-7"> 
                <div id="faspinner"></div>
                <?php
                    echo form_dropdown('form[staff_id]', $staff_list, '', 'class="selectpicker select2-filter form-control" id="stfList"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Role <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[role]', $role_list, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Status <b><font color="red">* </font></b></label>
            <div class="col-md-4"> 
                <?php
                    echo form_dropdown('form[status]', $sts_list, '', 'class="selectpicker form-control width-50" id="trStatus"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Benefit (Staff)</label>
            <div class="col-md-9"> 
                <input name="form[training_benefit_staff]" placeholder="Traininng benefit to staff" class="form-control" value="" type="text" id="appRemark">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Benefit (Department)</label>
            <div class="col-md-9"> 
                <input name="form[training_benefit_department]" placeholder="Traininng benefit to department" class="form-control" value="" type="text" id="appRemark">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Remark</label>
            <div class="col-md-9"> 
                <input name="form[remark]" placeholder="Remark" class="form-control" value="" type="text" id="appRemark">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-primary asgn_nstf"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
$('.select2-filter').select2({
	dropdownParent: $('#myModalis'),
	tags: 'true',
	// placeholder: 'Select an option',
	width: 'resolve'
});
</script>