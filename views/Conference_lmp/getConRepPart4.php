<form id="" class="form-horizontal">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $staff_name?>" id="staff_name" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Conference ID</label>
        <div class="col-md-2">
            <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[cr_name]" class="form-control" type="text" value="<?php echo $crname?>" id="cr_name" readonly>
        </div>
    </div>
</form>

<div class="alert alert-info fade in" id="alertInfoHod">
    <b>Certificate and Review of Head of PTj</b>
</div>
<form class="form-horizontal">
    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>Does the involvement of staff in these conferences / seminars / workshops provide benefit on PTJ?</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $con_rep_partiv->SCR_HOD_REMARK1?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>What are follow-up plans / activities suggested by the staff to be implemented on PTj?</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $con_rep_partiv->SCR_HOD_REMARK2?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>Comments if any</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $con_rep_partiv->SCR_HOD_REMARK3?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Certified by</label>
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $con_rep_partiv->HOD_VERIFY_BY_ID_NAME?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date certified</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $con_rep_partiv->SCR_HOD_VERIFY_DATE?>" readonly>
        </div>
    </div>
</form>

<div id="cnrTncaa">
    <div class="alert alert-info fade in">
        <b>Certificate and Review of TNC (AA)</b>
    </div>
    <form class="form-horizontal">

        <div class="form-group">
            <label class="col-md-2 control-label">Remark</label>
            <div class="col-md-8">
                <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $con_rep_partiv->SCR_TNCA_REMARK1?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Approved by</label>
            <div class="col-md-8">
                <input name="" class="form-control" type="text" value="<?php echo $con_rep_partiv->TNCA_VERIFY_BY_ID_NAME?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Approved Date</label>
            <div class="col-md-2">
                <input name="" class="form-control" type="text" value="<?php echo $con_rep_partiv->SCR_TNCA_VERIFY_DATE?>" readonly>
            </div>
        </div>
    </form>
</div>
