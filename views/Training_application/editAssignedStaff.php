<form id="updAssignNwStaff" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Assigned Staff</h4>
    </div>
    <div class="modal-body">
        <div id="alertUpdAssignNwStaff">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" id="refid" readonly>

        <div class="form-group">
            <label class="col-md-2 control-label">Department <b><font color="red">* </font></b></label>
            <div class="col-md-7"> 
                <input placeholder="Department" class="form-control" value="<?php echo $staff_asstr_list->SM_DEPT_CODE?>" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Staff ID <b><font color="red">* </font></b></label>
            <div class="col-md-7"> 
                <div id="faspinner"></div>
                <input name="form[staff_id]" class="form-control" value="<?php echo $staff_asstr_list->SM_STAFF_ID?>" type="hidden" readonly>
                <input class="form-control" value="<?php echo $staff_asstr_list->SM_ID_NAME?>" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Role <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[role]', $role_list, $staff_asstr_list->STH_PARTICIPANT_ROLE, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Status <b><font color="red">* </font></b></label>
            <div class="col-md-4"> 
                <?php
                    echo form_dropdown('form[status]', $sts_list, $staff_asstr_list->STH_STATUS, 'class="selectpicker form-control width-50" id="trStatus"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Benefit (Staff)</label>
            <div class="col-md-9"> 
                <input name="form[training_benefit_staff]" placeholder="Traininng benefit to staff" class="form-control" value="<?php echo $staff_asstr_list->STH_STAFF_TRAINING_BENEFIT?>" type="text" id="appRemark">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Benefit (Department)</label>
            <div class="col-md-9"> 
                <input name="form[training_benefit_department]" placeholder="Traininng benefit to department" class="form-control" value="<?php echo $staff_asstr_list->STH_DEPT_TRAINING_BENEFIT?>" type="text" id="appRemark">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Remark</label>
            <div class="col-md-9"> 
                <input name="form[remark]" placeholder="Remark" class="form-control" value="<?php echo $staff_asstr_list->STH_REMARK?>" type="text" id="appRemark">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-primary upd_asgn_stf"><i class="fa fa-save"></i> Save</button>
    </div>
</form>