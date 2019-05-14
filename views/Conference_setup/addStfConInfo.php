<form id="addStfConInfo" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add Staff Contact Info</h4>
    </div>
    <div class="modal-body">
        <div id="addStfConInfoAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Ext <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <input name="form[ext]" placeholder="Ext" class="form-control" type="text">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary save_staff_contact_info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>