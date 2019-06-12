<form id="addStaffReminder" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Staff Admin</h4>
    </div>
    <div class="modal-body">
        <div id="addStaffReminderAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff ID <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[staff_id]', $staff_tnca, '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[status]', array(''=>'---Please Select---', 'Y'=>'ACTIVE', 'N'=>'INACTIVE'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary save_stf_rem_btn"><i class="fa fa-save"></i> Save</button>
    </div>
</form>