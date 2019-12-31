<form id="formAddEGPos" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add Eligible Position</h4>
    </div>
    <div class="modal-body">
        <div id="alertAddEGPos">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[gpcode]" class="form-control" value="<?php echo $gpCode?>" type="hidden" readonly>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Service <b><font color="red">* </font></b></label>
            <div class="col-md-9">
                <?php
                    echo form_dropdown('form[service]', $service_list, '', 'class="selectpicker select2-filter form-control" style="width: 100%" id="service"')
                ?>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary add_eg_pos"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
$('.select2-filter').select2({
	dropdownParent: $('#myModalis2'),
	tags: 'true',
	// placeholder: 'Select an option',
	width: 'resolve'
});
</script>