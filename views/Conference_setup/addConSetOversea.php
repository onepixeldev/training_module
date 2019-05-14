<form id="addConSetOversea" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add Conference Setup (Oversea)</h4>
    </div>
    <div class="modal-body">
        <div id="addConSetOverseaAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Email <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <input name="form[email]" placeholder="Email" class="form-control" type="text">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary save_con_set_ovsea"><i class="fa fa-save"></i> Save</button>
    </div>
</form>