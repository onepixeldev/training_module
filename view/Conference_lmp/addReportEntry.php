<div class="modal-header btn-primary">
    <h4 class="modal-title txt-color-white" id="myModalLabel">New Report Entry</h4>
</div>
<br>
<div class="alert alert-info fade in">
    <b>Part I</b>
</div>
<form id="addNewReportPartI" class="form-horizontal" method="post">
    <div id="alertAddNewReportPartI">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID <b><font color="red">*</font></b></label>
        <div class="col-md-2">
            <input name="form[staff_id]" placeholder="Staff ID" class="form-control" type="text" id="staff_id">
        </div>

        <div class="col-md-6">
            <input name="form[staff_name]" placeholder="Staff Name" class="form-control" type="text" id="staff_name" readonly>
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
        <label class="col-md-2 control-label">Position</label>
        <div class="col-md-8">
            <input name="" placeholder="Position" class="form-control" type="text" id="postion" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Position Level</label>
        <div class="col-md-8">
            <input name="" placeholder="Position Level" class="form-control" id="pos_lvl" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Department / Unit ID</label>
        <div class="col-md-2">
            <input name="" placeholder="Department / Unit" id="dept_unit_id" class="form-control" type="text" readonly>
        </div>

        <div class="col-md-6">
            <input name="" placeholder="Description" id="dept_unit_name" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">PTJ / Faculty</label>
        <div class="col-md-2">
            <input name="" placeholder="PTJ / Faculty" id="ptj_fac_id" class="form-control" type="text" readonly>
        </div>

        <div class="col-md-6">
            <input name="" placeholder="Description" id="ptj_fac_name" class="form-control" type="text" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>Part II</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference / Workshop / Seminar <b><font color="red">*</font></b></label>
        <div class="col-md-2">
            <input name="form[conference_workshop_seminar]" placeholder="ID" class="form-control" type="text" id="con_id" readonly>
        </div>

        <div class="col-md-6">
            <input name="" placeholder="Description" class="form-control" type="text" id="con_name" readonly>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary search_cr"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>

   <div class="form-group">
        <label class="col-md-2 control-label">Paper Work Title (I)</label>
        <div class="col-sm-8">
            <textarea name="" placeholder="Paper Work Title (I)" class="form-control" type="text" rows="2" cols="50" id="paper_work_title_i" readonly></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Paper Work Title (II)</label>
        <div class="col-sm-8">
            <textarea name="" placeholder="Paper Work Title (II)" class="form-control" type="text" rows="2" cols="50" id="paper_work_title_ii" readonly></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Address</label>
        <div class="col-sm-8">
            <textarea name="" placeholder="Address" class="form-control" type="text" rows="2" cols="50" id="address" readonly></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-3">
            <input name="" placeholder="City" class="form-control" type="text" id="city" readonly>
        </div>

        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-3">
            <input name="" placeholder="Postcode" class="form-control" type="text" id="postcode" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-3">
            <input name="" placeholder="State" class="form-control" type="text" id="state" readonly>
        </div>
        
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-3">
            <input name="" placeholder="Country" class="form-control" type="text" id="country" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-3">
            <input name="" placeholder="DD/MM/YYYY" class="form-control" type="text" id="date_from" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-3">
            <input name="" placeholder="DD/MM/YYYY" class="form-control" type="text" id="date_to" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Duration</label>
        <div class="col-md-3">
            <input name="" placeholder="Day(s)" class="form-control" type="text" id="duration" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Organizer</label>
        <div class="col-md-3">
            <input name="" placeholder="Organizer" class="form-control" type="text" id="organizer" readonly>
        </div>
    </div>

    <br>
    <div class="form-group">
        <label class="col-md-4 control-label"><b>Financial Assistance Received :</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">(I) UPSI (RM)</label>
        <div class="col-md-3">
            <input name="" placeholder="RM" class="form-control" type="text" id="fa_upsi" readonly>
        </div>

        <label class="col-md-2 control-label">(II) External Agency (RM)</label>
        <div class="col-md-3">
            <input name="" placeholder="RM" class="form-control" type="text" id="fa_ea" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">(III) Other Source (RM)</label>
        <div class="col-md-3">
            <input name="form[fa_os]" placeholder="RM" class="form-control" type="text" id="fa_os">
        </div>
    </div>

    <br>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Report Date Submission</label>
        <div class="col-md-3">
            <input name="form[report_date_submission]" placeholder="DD/MM/YYYY" value="<?php echo ''?>" class="datepicker form-control" type="text">
        </div>


        <label class="col-md-2 control-label">Status</label>
        <div class="col-md-3">
            <?php
                echo form_dropdown('form[status]', $sts_list, NULL, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div id="alertAddNewReportPartIFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary ins_rep_ent_pt_i"><i class="fa fa-save"></i> Save</button>
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