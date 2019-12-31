<div class="modal-header btn-success">
    <h4 class="modal-title txt-color-white" id="myModalLabel">Report Entry Part I</h4>
</div>
<br>
<div class="alert alert-info fade in">
    <b>Part I</b>
</div>
<form id="editReportPartI" class="form-horizontal" method="post">
    <div id="alertEditReportPartI">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID <b><font color="red">*</font></b></label>
        <div class="col-md-2">
            <input name="form[staff_id]" placeholder="Staff ID" class="form-control" type="text" id="staff_id" value="<?php echo $staff_id?>" readonly>
        </div>

        <div class="col-md-6">
            <input name="" placeholder="Staff Name" class="form-control" type="text" id="staff_name" value="<?php echo $staff_name?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Position</label>
        <div class="col-md-8">
            <input name="" placeholder="Position" class="form-control" type="text" value="<?php echo $pos?>" id="postion" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Position Level</label>
        <div class="col-md-8">
            <input name="" placeholder="Position Level" class="form-control" value="<?php echo $pos_lvl?>" id="pos_lvl" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Department / Unit ID</label>
        <div class="col-md-2">
            <input name="" placeholder="Department / Unit" id="dept_unit_id" value="<?php echo $dept_unit?>" class="form-control" type="text" readonly>
        </div>

        <div class="col-md-6">
            <input name="" placeholder="Description" id="dept_unit_name" value="<?php echo $unit_desc?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">PTJ / Faculty</label>
        <div class="col-md-2">
            <input name="" placeholder="PTJ / Faculty" id="ptj_fac_id" value="<?php echo $ptj_fac?>" class="form-control" type="text" readonly>
        </div>

        <div class="col-md-6">
            <input name="" placeholder="Description" id="ptj_fac_name" value="<?php echo $dept_desc?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>Part II</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference / Workshop / Seminar <b><font color="red">*</font></b></label>
        <div class="col-md-2">
            <input name="form[conference_workshop_seminar]" placeholder="ID" class="form-control" type="text" id="con_id" value="<?php echo $refid?>" readonly>
        </div>

        <div class="col-md-6">
            <input name="" placeholder="Description" class="form-control" type="text" id="con_name" value="<?php echo $crName?>" readonly>
        </div>
    </div>

   <div class="form-group">
        <label class="col-md-2 control-label">Paper Work Title (I)</label>
        <div class="col-sm-8">
            <textarea name="" placeholder="Paper Work Title (I)" class="form-control" type="text" rows="2" cols="50" id="paper_work_title_i" readonly><?php echo $pw1?></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Paper Work Title (II)</label>
        <div class="col-sm-8">
            <textarea name="" placeholder="Paper Work Title (II)" class="form-control" type="text" rows="2" cols="50" id="paper_work_title_ii" readonly><?php echo $pw2?></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Address</label>
        <div class="col-sm-8">
            <textarea name="" placeholder="Address" class="form-control" type="text" rows="2" cols="50" id="address" readonly><?php echo $address?></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-3">
            <input name="" placeholder="City" class="form-control" type="text" id="city" value="<?php echo $city?>" readonly>
        </div>

        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-3">
            <input name="" placeholder="Postcode" class="form-control" type="text" id="postcode" value="<?php echo $postcode?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-3">
            <input name="" placeholder="State" class="form-control" type="text" id="state" value="<?php echo $state?>" readonly>
        </div>
        
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-3">
            <input name="" placeholder="Country" class="form-control" type="text" id="country" value="<?php echo $country?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-3">
            <input name="" placeholder="DD/MM/YYYY" class="form-control" type="text" id="date_from" value="<?php echo $date_from?>" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-3">
            <input name="" placeholder="DD/MM/YYYY" class="form-control" type="text" id="date_to" value="<?php echo $date_to?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Duration (day(s))</label>
        <div class="col-md-3">
            <input name="" placeholder="Day(s)" class="form-control" type="text" id="duration" value="<?php echo $duration?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Organizer</label>
        <div class="col-md-3">
            <input name="" placeholder="Organizer" class="form-control" type="text" id="organizer" value="<?php echo $organizer?>" readonly>
        </div>
    </div>

    <br>
    <div class="form-group">
        <label class="col-md-4 control-label"><b>Financial Assistance Received :</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">(I) UPSI (RM)</label>
        <div class="col-md-3">
            <input name="" placeholder="RM" class="form-control" type="text" id="fa_upsi" value="<?php echo $fa_upsi?>" readonly>
        </div>

        <label class="col-md-2 control-label">(II) External Agency (RM)</label>
        <div class="col-md-3">
            <input name="" placeholder="RM" class="form-control" type="text" id="fa_ea" value="<?php echo $fa_ea?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">(III) Other Source (RM)</label>
        <div class="col-md-3">
            <input name="form[fa_os]" placeholder="RM" class="form-control" type="text" value="<?php echo $oth_s?>" id="fa_os">
        </div>
    </div>

    <br>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Report Date Submission</label>
        <div class="col-md-3">
            <input name="form[report_date_submission]" placeholder="DD/MM/YYYY" class="datepicker form-control" value="<?php echo $appl_date?>" type="text">
        </div>


        <label class="col-md-2 control-label">Status</label>
        <div class="col-md-3">
            <?php
                echo form_dropdown('form[status]', $sts_list, $scr_sts, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div id="alertEditReportPartIFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary edit_rep_ent_pt_i"><i class="fa fa-save"></i> Save</button>
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