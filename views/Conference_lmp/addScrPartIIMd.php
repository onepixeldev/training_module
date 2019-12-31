<form id="addScrPartIIMd" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add Record</h4>
    </div>
    <div class="modal-body">
        <div id="addScrPartIIMdAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <br>

        <div class="form-group">
            <label class="col-md-4 control-label">Activity <b><font color="red">*</font></b></label>
            <div class="col-md-6">
                <input name="form[activity]" class="form-control" type="text" placeholder="Activity">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Implementation date</label>
            <div class="col-md-6">
                <input name="form[implementation_date]" class="datepicker form-control" type="text" placeholder="DD/MM/YYYY">
            </div>
        </div>

        <div class="form-group hidden">
            <label class="col-md-3 control-label">Staff ID</label>
            <div class="col-md-6">
                <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" readonly>
            </div>
        </div>

        <div class="form-group hidden">
            <label class="col-md-3 control-label">Ref ID</label>
            <div class="col-md-6">
                <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>"  readonly>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary save_scrpii" data-staff-id="<?php echo $staff_id?>" refid="<?php echo $refid?>"><i class="fa fa-save"></i> Save</button>
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