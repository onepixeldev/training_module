<form id="addPayDetl" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add Payment Detail</h4>
    </div>
    <div class="modal-body">
        <div id="addPayDetlAlert">
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
            <label class="col-md-3 control-label">Cost Code <b><font color="red">*</font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[cost_code]', $cost_code, '', 'class="form-control" style="width: 100%" id="costCode"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Amount <b><font color="red">*</font></b></label>
            <div class="col-md-4">
                <input name="form[amount]" placeholder="RM" class="form-control" type="text" id="cost_amount">
            </div>
            <div class="col-md-2" id="loader" style="font-size: 11px;">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary save_pay_detl"><i class="fa fa-save"></i> Save</button>
    </div>
</form>