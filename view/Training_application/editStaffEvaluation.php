<form id="formUpdStaffEvaDetl" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alertUpdStaffEvaDetl">
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff ID</label>
            <div class="col-md-4">
                <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staffID ?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff Name</label>
            <div class="col-md-8">
                <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $staffN ?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Submit Date</label>
            <div class="col-md-6">
                <input name="form[submit_date]" placeholder="DD/MM/YYYY" class="form-control" type="text" id="pickdate" value="<?php echo $staff_eva_detl->STH_SB_DT?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Evaluator ID</label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[evaluator_id]', $eva_list, $staff_eva_detl->EVA_ID, 'class="selectpicker select2-filter form-control"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Evaluation Status</label>
            <div class="col-md-6">
                <?php
                    echo form_dropdown('form[evaluation_status]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $staff_eva_detl->SHE, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Evaluation Date</label>
            <div class="col-md-6">
                <input name="form[evaluation_date]" placeholder="DD/MM/YYYY" class="form-control" type="text" id="pickdate2" value="<?php echo $staff_eva_detl->SED?>">
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-primary upd_stf_eva_detl"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>

	$(document).ready(function(){	
        $('#pickdate').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });

        $('#pickdate2').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });
	});

    $('.select2-filter').select2({
        tags: true,
        dropdownParent: $("#myModalis2"),
        placeholder: 'Select an option',
        width: 'resolve'
    });
</script>