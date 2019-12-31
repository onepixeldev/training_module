<form id="addEstNetRelayMd" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add Record</h4>
    </div>
    <div class="modal-body">
        <div id="addEstNetRelayMdAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <br>

        <div class="form-group">
            <label class="col-md-3 control-label">Name <b><font color="red">*</font></b></label>
            <div class="col-md-6">
                <input name="form[name]" class="form-control" type="text" placeholder="Name">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Expertise <b><font color="red">*</font></b></label>
            <div class="col-md-6">
                <input name="form[expertise]" class="form-control" type="text" placeholder="Expertise">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Institution</label>
            <div class="col-md-6">
                <input name="form[institution]" class="form-control" type="text" placeholder="Institution">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Tel No.</label>
            <div class="col-md-6">
                <input name="form[tel_no]" class="form-control" type="text" placeholder="Tel No.">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Email</label>
            <div class="col-md-6">
                <input name="form[email]" class="form-control" type="text" placeholder="Email">
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
        <button type="submit" class="btn btn-primary ins_net_relay" data-staff-id="<?php echo $staff_id?>" refid="<?php echo $refid?>"><i class="fa fa-save"></i> Save</button>
    </div>
</form>