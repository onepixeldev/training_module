<form id="formUpdateTrainingSpeaker" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Training Speaker</h4>
    </div>
    <div class="modal-body">
        <div id="alertUpdTrSp"></div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-2 control-label">Type</label>
            <div class="col-md-4">
                <input name="form[type]" value="<?php echo $sp_info->TS_TYPE ?>" class="form-control" type="text" readonly>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Speaker</label>
            <div class="col-md-9">
                <input name="" value="<?php echo $spname ?>" class="form-control" type="text" readonly>
                <input name="form[speaker]" value="<?php echo $sp_info->TS_SPEAKER_ID ?>" class="form-control" type="hidden" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Department</label>
            <div class="col-md-9">
                <input name="" placeholder="Department" value="<?php echo $spdept ?>" class="form-control" type="text" readonly id="spDept">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Contact / Phone No.</label>
            <div class="col-md-9">
                <input name="form[contact_phone_no]" placeholder="Contact Info" value="<?php echo $sp_info->TS_CONTACT?>" class="form-control" type="text" id="spCtc">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_sp_info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>