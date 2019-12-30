<form id="updCpdMarkStaff" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Update CPD</h4>
    </div>
    <div class="modal-body">
        <div id="updCpdMarkStaffAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group hidden">
            <label class="col-md-3 control-label">Refid</label>
            <div class="col-md-2">
                <input name="form[refid]" placeholder="Refid" class="form-control" type="text" value="<?php echo $refid?>" readonly>
            </div>

            <div class="col-md-6">
                <input name="" placeholder="Title" class="form-control" type="text" value="<?php echo $title?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff ID</label>
            <div class="col-md-2">
                <input name="form[staff_id]" placeholder="ID" class="form-control" type="text" value="<?php echo $staff_id?>" readonly>
            </div>

            <div class="col-md-6">
                <input name="" placeholder="Name" class="form-control" type="text" value="<?php echo $staff_name?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Mark</label>
            <div class="col-md-2">
                <input name="form[mark]" placeholder="Mark" class="form-control" type="text" value="<?php echo $mark?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Competency</label>
            <div class="col-md-4">
                <?php echo form_dropdown('form[competency]', array(''=>'--- Please Select ---', 'KHUSUS'=>'KHUSUS', 'UMUM'=>'UMUM', 'TERAS'=>'TERAS'), $comp, 'class="form-control"'); ?>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-primary upd_staff_cpd_mark"><i class="fa fa-save"></i> Save</button>
    </div>
</form>