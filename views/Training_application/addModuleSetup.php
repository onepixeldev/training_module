<form id="insModuleSetup" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Module</h4>
    </div>
    <div class="modal-body">
        <div id="alertInsMs">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-2 control-label">Specific Objectives <b><font color="red">(2000 character limit)</font></b></label>
            <div class="col-md-9">
                <textarea name="form[specific_objectives]" placeholder="Objectives" class="form-control" type="text" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Contents </label>
            <div class="col-md-9">
                <textarea name="form[contents]" placeholder="Contents" class="form-control" type="text" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Component / Category <b><font color="red">* </font></b></label>
            <div class="col-md-9">
                <?php
                    echo form_dropdown('form[component_category]', $comp_list, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_ms"><i class="fa fa-save"></i> Save</button>
    </div>
</form>