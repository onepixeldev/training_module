<form id="editTrCost" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">New Training Cost</h4>
    </div>
    <div class="modal-body">
        <div id="editTrCostAlert">
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
                    echo form_dropdown('', $c_code, $code, 'class="form-control width-50" disabled')
                ?>
            </div>
        </div>

        <div class="form-group hidden">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <input name="form[cost_code]"class="form-control" type="text" value="<?php echo $code ?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Amount <b><font color="red">*</font></b></label>
            <div class="col-md-4">
                <input name="form[amount]" placeholder="RM" class="form-control" type="text" value="<?php echo $cost_detl->TC_AMOUNT ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Remark</label>
            <div class="col-md-8">
                <input name="form[remark]" placeholder="Remark" class="form-control" type="text" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $cost_detl->TC_REMARK ?>">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_tr_cost"><i class="fa fa-save"></i> Save</button>
    </div>
</form>