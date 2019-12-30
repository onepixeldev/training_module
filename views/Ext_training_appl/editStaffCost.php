<form id="editAssignStfCost" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Staff Cost</h4>
    </div>
    <div class="modal-body">
        <div id="editAssignStfCostAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Refid</label>
            <div class="col-md-4">
                <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff ID</label>
            <div class="col-md-2">
                <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" readonly>
            </div>

            <div class="col-md-6">
                <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $staff_name?>" readonly style="font-size: 11px;">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Total Amount <b><font color="red">*</font></b></label>
            <div class="col-md-4">
                <input name="form[amount]" placeholder="RM" class="form-control" type="text" value="<?php echo $cost_detl->STCM_TOTAL_AMOUNT?>">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_stf_cost"><i class="fa fa-save"></i> Save</button>
    </div>
</form>