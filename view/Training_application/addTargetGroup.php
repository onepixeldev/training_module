<form id="insFormTargetGroup" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Target Group</h4>
    </div>
    <div class="modal-body">
        <div id="alertInsTg">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Group Code <b><font color="red">* </font></b></label>
            <div class="col-md-5">
                <?php
                    echo form_dropdown('form[group_code]', $tg_list, '', 'class="selectpicker select2-filter form-control" style="width: 100%" id="groupCode"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Description</label>
            <div class="col-md-10">
                <div id="faspinner3"></div>
                <input name="" placeholder="Description" class="form-control" type="text" id="tgDesc" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Scheme Code</label>
            <div class="col-md-4">
                <input name="" placeholder="Scheme Code" class="form-control" type="text" id="schemeCode" readonly>
            </div>

            <label class="col-md-2 control-label">Grade (From)</label>
            <div class="col-md-4">
                <input name="" placeholder="Grade (From)" class="form-control" type="text" id="gradeFrom" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Grade (To)</label>
            <div class="col-md-4">
                <input name="" placeholder="Grade (To)" class="form-control" type="text" id="gradeTo" readonly>
            </div>

            <label class="col-md-2 control-label">Service Year (from)</label>
            <div class="col-md-4">
                <input name="" placeholder="Service Year (From)" class="form-control" type="text" id="svcYearFrom" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Service Year (to)</label>
            <div class="col-md-4">
                <input name="" placeholder="Service Year (To)" class="form-control" type="text" id="svcYearTo" readonly>
            </div>

            <label class="col-md-2 control-label">Group Service</label>
            <div class="col-md-4">
                <input name="" placeholder="Group Service" class="form-control" type="text" id="grpSvc" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Academician</label>
            <div class="col-md-4">
                <input name="" placeholder="Academician?" class="form-control" type="text" id="academician" readonly>
            </div>

            <label class="col-md-2 control-label">New Staff</label>
            <div class="col-md-4">
                <input name="" placeholder="New Staff?" class="form-control" type="text" id="nStaff" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Compulsory</label>
            <div class="col-md-4">
                <input name="" placeholder="Compulsory?" class="form-control" type="text" id="compulsory" readonly>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_tg_btn"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
$('.select2-filter').select2({
    tags: true,
    dropdownParent: $("#myModalis"),
    placeholder: 'Select an option',
    width: 'resolve'
});
</script>