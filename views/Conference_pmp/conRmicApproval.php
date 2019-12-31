<form class="form-horizontal" method="post">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staffID?>" id="staff_id" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $stf_name_con?>" id="staff_name" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[conference_title]" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[conference_name]" class="form-control" type="text" value="<?php echo $crName?>" id="crName" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>Head of Department RMIC Approval/Verification</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $stf_detl->SCM_RMIC_REMARK?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve By</label>
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $stf_rmic_by?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve Date</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RMIC_APPROVE_DATE?>" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>TNC (PI) Approval/Verification</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $stf_detl->SCM_TNCPI_REMARK?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve By</label>
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $stf_tncpi_by?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve Date</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $stf_detl->SCM_TNCPI_APPROVE_DATE?>" readonly>
        </div>
    </div>
</form>