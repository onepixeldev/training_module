<form id="formTrainingSpeaker" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Training Speaker</h4>
    </div>
    <div class="modal-body">
        <div id="alertInsTrSp">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Type <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[type]', array(''=>'---Please Select---', 'STAFF'=>'STAFF', 'EXTERNAL'=>'EXTERNAL'), '', 'class="selectpicker form-control width-50" id="typeSpeaker"')
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Speaker <b><font color="red">* </font></b></label>
            <div class="col-md-9">
                <div id="faspinner3"></div>
                <?php
                    echo form_dropdown('form[speaker]', array(''=>'---Please Select ---'), '', 'class="selectpicker select2-filter form-control" style="width: 100%" id="trSpeaker"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Department</label>
            <div class="col-md-9">
                <input name="" placeholder="Department" class="form-control" type="text" readonly id="spDept">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Contact / Phone No.</label>
            <div class="col-md-9">
                <input name="form[contact_phone_no]" placeholder="Contact Info" class="form-control" type="text" id="spCtc">
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_sp_info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
    $('.select2-filter').select2({
        dropdownParent: $('#myModalis2'),
        tags: 'true',
        placeholder: 'Select an option',
        width: 'resolve'
    });
</script>