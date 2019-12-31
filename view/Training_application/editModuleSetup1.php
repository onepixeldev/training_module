<form id="formUpdMs1" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alertUpdMs1"></div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-6 control-label"><b>Specific Objectives</b> <b><font color="red">(2000 character limit)</font></b></label>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <textarea name="form[specific_objectives]" placeholder="Objectives" class="form-control" type="text" rows="10"><?php echo $sp_obj?></textarea>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_ms1"><i class="fa fa-save"></i> Save</button>
    </div>
</form>