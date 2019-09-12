<form id="addConPartRole" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Conference Participant Role</h4>
    </div>
    <div class="modal-body">
        <div id="addConPartRoleAlert">
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
                <input name="form[participant_role]" placeholder="Participant Role" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Ref Code</label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[ref_code]', $ref_role, '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Order By</label>
            <div class="col-md-4">
                <input name="form[order_by]" placeholder="Order By" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">CPD Counted (Academic)</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[cpd_counted_academic]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">CPD Counted (Non-Academic)</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[cpd_counted_non_academic]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group" id="display_conference">
            <label class="col-md-3 control-label">Display Conference?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[display_conference]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group" id="display_conference">
            <label class="col-md-3 control-label">Prosiding?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[prosiding]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group hidden" id="display_rmic">
            <label class="col-md-3 control-label">Display RMIC?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[display_rmic]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Number of attachment</label>
            <div class="col-md-4">
                <input name="form[number_of_attachment]" placeholder="No. of attachment" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Checklist (BM)</label>
            <div class="col-md-8">
                <textarea name="form[checklist_bm]" placeholder="Checklist (BM)" class="form-control" type="text" rows="4" cols="50"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Checklist (BI)</label>
            <div class="col-md-8">
                <textarea name="form[checklist_bi]" placeholder="Checklist (BI)" class="form-control" type="text" rows="4" cols="50"></textarea>
            </div>
        </div>

        <div id="addConPartRoleAlertFoot"></div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_pr"><i class="fa fa-save"></i> Save</button>
    </div>
</form>