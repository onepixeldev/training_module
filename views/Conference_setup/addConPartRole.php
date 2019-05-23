<form id="addConAllow" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Conference Participant Role</h4>
    </div>
    <div class="modal-body">
        <div id="addConAllowAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Code <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[code]" placeholder="Code" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Participant Role <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <input name="form[participant_role]" placeholder="Description" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Ref Code</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[ref_code]', '', '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Description</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[description]', '', '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[status]', array(''=>'---Please Select---', 'ACTIVE'=>'ACTIVE', 'INACTIVE'=>'INACTIVE'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_ca"><i class="fa fa-save"></i> Save</button>
    </div>
</form>