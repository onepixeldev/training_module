<form id="formUpdMs2" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alertUpdMs2"></div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-2 control-label"><b>Contents</b></label>
            <div class="col-md-9">
                <textarea name="form[contents]" placeholder="Contents" class="form-control" type="text" rows="10"><?php echo $ms_cont?></textarea>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_ms2"><i class="fa fa-save"></i> Save</button>
    </div>
</form>