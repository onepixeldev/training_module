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

<div class="alert alert-info fade in">
    <b>TNC (A&A) Amendment / Approval</b>
</div>
<form id="tncaApproval" class="form-horizontal" method="post">
    <div id="alertTncaApproval"></div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" id="remark_tnca"><?php echo $con_rep_partiv->SCR_TNCA_REMARK1?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved By</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $app_amd_by_id?>" id="approved_rjc_by_tnc">
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $app_amd_by_name?>" id="approved_rjc_by_tnc_name" readonly>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary search_staff"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-3" id="alertStfID">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved Date</label>
        <div class="col-md-2">
            <input name="" class="datepicker form-control" type="text" value="<?php echo $con_rep_partiv->CURR_DATE?>" id="tncaa_amd_app_date">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary text-left btn-md tncaa_save_amd_app"><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-warning text-left btn-md tncaa_amend" value=""><i class="fa fa-share-square-o"></i> Amend</button>
        <button type="button" class="btn btn-success text-left btn-md tncaa_approve" value=""><i class="fa fa-check-square-o"></i> Approve</button>
    </div>
</form>

<div class="alert alert-info fade in">
    <b>TNC (A&A) Reject</b>
</div>
<form id="tncaReject" class="form-horizontal" method="post">
    <div id="alertTncaReject"></div>
    <div class="form-group">
        <label class="col-md-2 control-label">Reject Remark</label>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" id="remark_tnca_reject"><?php echo $con_rep_partiv->SCR_TNCA_REJECT_REMARK?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Reject By</label>
        <div class="col-md-2">
            <input name="form[rjc_by_tnc]" class="form-control" type="text" value="<?php echo $rejc_by_id?>" id="rjc_by_tnc">
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $rejc_by_name?>" id="rjc_by_tnc_name" readonly>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary search_staff2"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-3" id="alertStfID2">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Reject Date</label>
        <div class="col-md-2">
            <input name="" class="datepicker form-control" type="text" value="<?php echo $con_rep_partiv->CURR_DATE?>" id="tncaa_rjc_date">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary text-left btn-md tncaa_save_reject"><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-danger text-left btn-md tncaa_reject" value=""><i class="fa fa-times-circle"></i> Reject</button>
    </div>
</form>

<script>
	$(document).ready(function(){
        $('.datepicker').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });
	});
</script>
