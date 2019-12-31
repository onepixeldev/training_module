<form id="addCpdCoor" class="form-horizontal" method="post">

    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New CPD Coordinator</h4>
    </div>

    <div class="row">
        <div class="container col-md-12">
            <div class="panel panel-default text-left">

                <div id="addCpdCoorAlert">
                </div>

                <div class="panel-body" id="summary">
                    <div id="" class="text-left">
                        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Staff ID <b><font color="red">*</font></b></label>
                        <div class="col-md-2">
                            <input name="form[staff_id]" class="form-control" type="text" id="staff_id_f" placeholder="Staff ID">
                        </div>

                        <div class="col-md-6">
                            <input name="" class="form-control" type="text" id="staff_name_f" placeholder="Staff Name" readonly>
                        </div>

                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary search_staff"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-3" id="alertStfID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Role</label>
                        <div class="col-md-4">
                            <?php echo form_dropdown('form[role]', array(''=>'--- Please Select ---', 'COORDINATOR'=>'COORDINATOR', 'PANEL'=>'PANEL'), '', 'class="form-control"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Role Panel</label>
                        <div class="col-md-4">
                            <?php echo form_dropdown('form[role_panel]', array(''=>'--- Please Select ---', 'Akademik'=>'Akademik', 'Pentadbiran, Pengurusan dan Kepimpinan'=>'Pentadbiran, Pengurusan dan Kepimpinan', 'Perkhidmatan Sosial'=>'Perkhidmatan Sosial', 'Sains dan Teknologi'=>'Sains dan Teknologi'), '', 'class="form-control"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Department 1</label>
                        <div class="col-md-6">
                            <?php echo form_dropdown('form[department_1]', $dept_list, '', 'class="select2-filter form-control" style="width: 100%"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Department 2</label>
                        <div class="col-md-6">
                            <?php echo form_dropdown('form[department_2]', $dept_list, '', 'class="select2-filter form-control" style="width: 100%"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Department 3</label>
                        <div class="col-md-6">
                            <?php echo form_dropdown('form[department_3]', $dept_list, '', 'class="select2-filter form-control" style="width: 100%"'); ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary ins_cpd_coor"><i class="fa fa-save"></i> Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</form>

<script>
	$(document).ready(function(){
        $('.select2-filter').select2({
            // placeholder: 'Select an option',
            width: 'resolve'
        });
	});
</script>