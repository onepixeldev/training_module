<form id="formUpdAppOthDetl" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alertAppOthDetl">
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff ID</label>
            <div class="col-md-4">
                <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $stfID ?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff Name</label>
            <div class="col-md-8">
                <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $stName ?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Attendance Confirmation</label>
            <div class="col-md-6">
                <?php
                    echo form_dropdown('form[attendance_confirmation]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No', 'A'=>'Yes (Auto)'), $app_ot_detl->STD_ATTEND2, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Transportation</label>
            <div class="col-md-6">
                <?php
                    echo form_dropdown('form[transportation]', array(''=>'---Please Select---', 'UPSI'=>'UPSI', 'OWN_SHARING'=>'Owned  / Shared Transport'), $app_ot_detl->STD_TRANSPORTATION2, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Confirm Date</label>
            <div class="col-md-6">
                <input name="form[confirm_date]" placeholder="DD/MM/YYYY" class="form-control" type="text" id="pickdate" value="<?php echo $app_ot_detl->STD_ATTEND_DATE ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Absent Remark</label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[absent_remark]', $abs_rmk, $app_ot_detl->STD_ATTEND_REMARK, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-primary upd_app_oth_detl"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>

	$(document).ready(function(){	
        $('#pickdate').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });
	});
</script>