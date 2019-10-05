<form id="addTrCost" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">New Training Cost</h4>
    </div>
    <div class="modal-body">
        <div id="addTrCostAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Refid</label>
            <div class="col-md-4">
                <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Cost Code <b><font color="red">*</font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[cost_code]', $c_code, '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Amount <b><font color="red">*</font></b></label>
            <div class="col-md-4">
                <input name="form[amount]" placeholder="RM" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Remark</label>
            <div class="col-md-8">
                <input name="form[remark]" placeholder="Remark" class="form-control" type="text" onkeyup="this.value = this.value.toUpperCase();">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary add_tr_cost"><i class="fa fa-save"></i> Save</button>
    </div>
</form>