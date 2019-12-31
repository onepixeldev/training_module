<form id="addStfAdminHier" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Staff Admin</h4>
    </div>
    <div class="modal-body">
        <div id="addStfAdminHierAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Admin Code <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[admin_code]', $admin_list, '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">TNC (A&A) Approve?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[tnc_approve]', array(''=>'---Please Select---', 'Y'=>'YES', 'N'=>'NO'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">VC Approve?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[vc_approve]', array(''=>'---Please Select---', 'Y'=>'YES', 'N'=>'NO'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[status]', array(''=>'---Please Select---', 'Y'=>'ACTIVE', 'N'=>'INACTIVE'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_sah"><i class="fa fa-save"></i> Save</button>
    </div>
</form>