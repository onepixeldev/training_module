<form id="editAssignStaffForm" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="editAssignStaffAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Refid</label>
            <div class="col-md-4">
                <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff ID</label>
            <div class="col-md-2">
                <input name="form[staff_id_form]" class="form-control" type="text" value="<?php echo $staff_id?>" id="stfID" readonly>
            </div>

            <div class="col-md-6">
                <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $assign_detl->SM_STAFF_NAME?>" readonly style="font-size: 11px;" id="stfName">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Department</label>
            <div class="col-md-4">
                <input name="" class="form-control" type="text" value="<?php echo $assign_detl->STAFF_DEPT?>" id="staff_dept" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Role <b><font color="red">*</font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[role]', $role_list, $assign_detl->STH_PARTICIPANT_ROLE, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[status]', array(''=>'--- Please Select ---', 'VERIFY'=>'VERIFY', 'RECOMMEND'=>'RECOMMEND', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL', 'RECOMMEND_BSM'=>'RECOMMEND_BSM'), $assign_detl->STH_STATUS, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Fee Category <b><font color="red">*</font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[fee_category]', $fee_list, $assign_detl->STH_FEE_CODE, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Fee (RM)</label>
            <div class="col-md-4">
                <input name="" class="form-control" type="text" value="<?php echo number_format($assign_detl->TC_AMOUNT, 2)?>" id="staff_fee" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Training Benefit (Staff)</label>
            <div class="col-md-8">
                <input name="form[tr_benefit_stf]" placeholder="Training Benefit (Staff)" class="form-control" value="<?php echo $assign_detl->STH_STAFF_TRAINING_BENEFIT?>" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Training Benefit (Department)</label>
            <div class="col-md-8">
                <input name="form[tr_benefit_dept]" placeholder="Training Benefit (Department)" class="form-control" value="<?php echo $assign_detl->STH_DEPT_TRAINING_BENEFIT?>" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Remark (HR)</label>
            <div class="col-md-8">
                <input name="form[remark]" placeholder="Remark (HR)" class="form-control" value="<?php echo $assign_detl->STH_RECOMMENDER_REASON?>" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Remark (KTP/Pendaftar/MPE)</label>
            <div class="col-md-8">
                <input name="form[remark_other]" placeholder="Remark (KTP/pendaftar/MPE)" class="form-control" value="<?php echo $assign_detl->STH_APPROVE_REASON?>" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Evaluation Status</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[eva_status]', array(''=>'--- Please Select ---', 'Y'=>'Yes', 'N'=>'No'), $assign_detl->STH_HOD_EVALUATION, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>
        
        <div id="editAssignStaffAlertFooter">
        </div>

        
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
        <button type="submit" class="btn btn-primary upd_assign_stf"><i class="fa fa-save"></i> Save</button>
    </div>
</form>
