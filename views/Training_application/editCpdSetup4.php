<form id="formUpdCpd4" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alertUpdCpd4">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-4 control-label">Report Submission <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[report_submission]', array(''=>'---Please Select---', 'Y'=>'YES', 'N'=>'NO'), $cpd_rpsub_val, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_cpd4"><i class="fa fa-save"></i> Save</button>
    </div>
</form>