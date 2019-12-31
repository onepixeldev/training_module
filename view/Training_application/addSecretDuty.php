<form id="addSecretForm" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add secretariat in charge</h4>
    </div>
    <div class="modal-body">
        <div id="addSercetDutyAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>
        <input name="form[refid]" class="form-control" type="hidden" value="<?php echo $refid?>" readonly>

        <div class="form-group">
            <label class="col-md-3 control-label">Secretariat ID <b><font color="red">* </font></b></label>
            <div class="col-md-9">
                <?php
                    echo form_dropdown('form[secretariat_id]', $staff_list, '', 'class="selectpicker select2-filter form-control" style="width: 100%" id="secretariat_id"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <div id="loaderDept"></div>
            <label class="col-md-3 control-label">Department</label>
            <div class="col-md-4">
                <input name="form[department]" placeholder="Department" class="form-control" type="text" value="" id="secretDept" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Date</label>
            <div class="col-md-4">
                <input name="form[date]" placeholder="DD/MM/YYYY" class="form-control" type="text" value="" id="datepickerSecret">
            </div>
        </div>


    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-primary save_secret_duty"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
	$(document).ready(function(){	
        
        $('#datepickerSecret').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        }); 
	});

    $('.select2-filter').select2({
        dropdownParent: $('#myModalis2'),
        tags: 'true',
        // placeholder: 'Select an option',
        width: 'resolve'
    });
</script>