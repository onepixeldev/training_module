<div class="modal-header btn-success">
    <h4 class="modal-title txt-color-white" id="myModalLabel">Report Entry Part III</h4>
</div>
<br>
<form id="editReportPartIV" class="form-horizontal" method="post">

    <div id="alertEditReportPartIV">
        <!--<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>-->
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $staff_name?>" id="staff_name" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[conference_id]" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $crName?>" id="crName" readonly>
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Certificate and Review of Head of PTJ</b>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>    
        <label class="col-md-6 control-label text-left">Does the involvement of staff in these conferences / seminars / workshops provide benefit on PTJ?</label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-sm-8">
            <textarea name="form[hod_remark_1]" placeholder="HOD remark I" class="form-control" type="text" rows="4" cols="50"><?php echo $hod_remark1?></textarea>
        </div>
    </div>

    <div class="form-group">   
        <div class="col-md-2"></div>  
        <label class="col-md-6 control-label text-left">What are follow-up plans / activities suggested by the staff to be implemented on PTj?</label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-sm-8">
            <textarea name="form[hod_remark_2]" placeholder="HOD remark II" class="form-control" type="text" rows="4" cols="50"><?php echo $hod_remark2?></textarea>
        </div>
    </div>

    <div class="form-group">   
        <div class="col-md-2"></div>  
        <label class="col-md-6 control-label text-left">Other comments if any</label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-sm-8">
            <textarea name="form[hod_remark_3]" placeholder="HOD remark III" class="form-control" type="text" rows="4" cols="50"><?php echo $hod_remark3?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Certified by</label>
        <div class="col-md-2">
            <input name="form[certified_by_id]" placeholder="Staff ID" class="form-control" type="text" id="staff_id_hod" value="<?php echo $hod_ver_id?>">
        </div>

        <div class="col-md-6">
            <input name="form[certified_by_name]" placeholder="Staff Name" class="form-control" type="text" id="staff_name_hod" value="<?php echo $hod_ver_name?>" readonly>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary search_staff_hod"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-3" id="alertStfIDHod">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date certified</label>
        <div class="col-md-2">
            <input name="form[date_certified]" class="datepicker form-control" type="text" placeholder="DD/MM/YYYY" value="<?php echo $hod_ver_date?>">
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>Certificate and Review of TNC (AA)</b>
    </div>
    <br>

    <div class="form-group">   
        <div class="col-md-2"></div>  
        <label class="col-md-6 control-label text-left">Remark</label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-sm-8">
            <textarea name="form[tnca_remark]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"><?php echo $tnca_remark1?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved by</label>
        <div class="col-md-2">
            <input name="form[approved_by_id]" placeholder="Staff ID" class="form-control" type="text" id="staff_id_tnca" value="<?php echo $tnca_ver_id?>">
        </div>

        <div class="col-md-6">
            <input name="form[approved_by_name]" placeholder="Staff Name" class="form-control" type="text" id="staff_name_tnca" value="<?php echo $tnca_ver_name?>" readonly>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary search_staff_tnca"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-3" id="alertStfIDTnca">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved Date</label>
        <div class="col-md-2">
            <input name="form[approved_date]" class="datepicker form-control" type="text" placeholder="DD/MM/YYYY" value="<?php echo $tnca_app_date?>">
        </div>
    </div>

    <div id="alertEditReportPartIVFooter"></div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary edit_rep_part_iv"><i class="fa fa-save"></i> Save</button>
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