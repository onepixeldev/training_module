<form id="editTrainDetl" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Training Details</h4>
    </div>
    <div class="modal-body">
        <div id="editTrainDetlAlert">
            <!--<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>-->
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
                <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $stf_inf->SM_STAFF_NAME?>" readonly style="font-size: 11px;" id="stfName">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-4">
                <input name="form[status]" class="form-control" type="text" value="<?php echo $sth_status?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Cancel Reason</label>
            <div class="col-md-8">
                <input name="form[cancel_reason]" class="form-control" type="text" value="<?php echo $c_reason?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">MPE Date</label>
            <div class="col-md-4">
                <input name="form[mpe_date]" class="datepicker form-control" type="text" value="<?php echo $mpe_date?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Not in Training Calendar ?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[nitc]', array(''=>'--- Please Select ---', 'Y'=>'Yes', 'N'=>'No'), $nitc, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Work Related ?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[wrelated]', array(''=>'--- Please Select ---', 'Y'=>'Yes', 'N'=>'No'), $wrelated, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>
        
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
        <button type="submit" class="btn btn-primary upd_train_detl"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
	$(document).ready(function(){
        $('.datepicker').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });
	});
</script>
