<div class="modal-header btn-primary">
    <h4 class="modal-title txt-color-white" id="myModalLabel">New Report Entry</h4>
</div>
<br>
<div class="alert alert-info fade in">
    <b>Part I</b>
</div>
<form id="addNewReport" class="form-horizontal" method="post">
    <div id="alertAddNewReport">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" placeholder="Staff ID" class="form-control" type="text" id="staff_id">
        </div>

        <div class="col-md-6">
            <input name="" placeholder="Staff Name" class="form-control" type="text" id="staff_name" readonly>
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
            <input name="form[pos]" placeholder="Position" class="form-control" type="text" id="postion" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Position Level</label>
        <div class="col-md-8">
            <input name="form[pos_lvl]" placeholder="Position Level" class="form-control" id="pos_lvl" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Department / Unit ID</label>
        <div class="col-md-2">
            <input name="form[dept_unit_id]" placeholder="Department / Unit" id="dept_unit_id" class="form-control" type="text" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[dept_unit_name]" placeholder="Description" id="dept_unit_name" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">PTJ / Faculty</label>
        <div class="col-md-2">
            <input name="form[ptj_fac_id]" placeholder="PTJ / Faculty" id="ptj_fac_id" class="form-control" type="text" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[ptj_fac_name]" placeholder="Description" id="ptj_fac_name" class="form-control" type="text" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>Part II</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference / Workshop / Seminar</label>
        <div class="col-md-2">
            <input name="form[conference_id]" placeholder="ID" class="form-control" type="text" id="con_id" readonly>
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
            <textarea name="form[paper_work_title_i]" placeholder="Paper Work Title (I)" class="form-control" type="text" rows="2" cols="50" readonly></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Paper Work Title (II)</label>
        <div class="col-sm-8">
            <textarea name="form[paper_work_title_ii]" placeholder="Paper Work Title (II)" class="form-control" type="text" rows="2" cols="50" readonly></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Address</label>
        <div class="col-sm-8">
            <textarea name="form[address]" placeholder="Address" class="form-control" type="text" rows="2" cols="50" readonly></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-3">
            <input name="form[city]" placeholder="City" class="form-control" type="text" id="cr_city" readonly>
        </div>

        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-3">
            <input name="form[postcode]" placeholder="Postcode" class="form-control" type="text" id="cr_postcode" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-3">
            <input name="form[state]" placeholder="State" class="form-control" type="text" readonly>
        </div>
        
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-3">
            <input name="form[country]" placeholder="Country" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-3">
            <input name="form[date_from]" placeholder="DD/MM/YYYY" class="form-control" type="text" id="date_from" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-3">
            <input name="form[date_to]" placeholder="DD/MM/YYYY" class="form-control" type="text" id="date_to" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Duration</label>
        <div class="col-md-3">
            <input name="form[duration]" placeholder="Day(s)" class="form-control" type="text" readonly>
        </div>
    </div>

    <br>
    <div class="form-group">
        <label class="col-md-4 control-label"><b>Financial Assistance Received :</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">(I) UPSI</label>
        <div class="col-md-3">
            <input name="form[fa_upsi]" placeholder="RM" class="form-control" type="text" readonly>
        </div>

        <label class="col-md-2 control-label">(II) External Agency</label>
        <div class="col-md-3">
            <input name="form[fa_ea]" placeholder="RM" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">(III) Other Source</label>
        <div class="col-md-3">
            <input name="form[fa_os]" placeholder="RM" class="form-control" type="text" readonly>
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

    <div id="alertAddNewReportFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary ins_rep_ent"><i class="fa fa-save"></i> Save</button>
    </div>

    
</form>



<script>
	$(document).ready(function(){
        $('.select2-filter').select2({
            // placeholder: 'Select an option',
            width: 'resolve'
        });
        
        $('.datepicker').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });
	});
</script>