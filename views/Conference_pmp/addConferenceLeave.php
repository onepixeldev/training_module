<!--<div class="modal-header btn-primary">
    <h4 class="modal-title txt-color-white" id="myModalLabel">Add Conference Leave</h4>
</div>
<br>-->
<form id="addConferenceLeave" class="form-horizontal" method="post">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $crStaffName?>" id="staff_name" readonly>
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

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-2">
            <input name="form[date_from]" placeholder="DD/MM/YYYY" value="<?php echo $date_from?>" class="datepicker form-control" type="text" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-2">
            <input name="form[date_to]" placeholder="DD/MM/YYYY" value="<?php echo $date_to?>" class="datepicker form-control" type="text" readonly>
        </div>
    </div>


    <div class="alert alert-info fade in">
        <b>Staff Conference Leave</b>
    </div>

    <div id="alertStaffConference">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="container col-md-10">
            <div class="panel panel-default text-right">
                <div class="panel-body" id="summary">

                    <div class="form-group">
                        <label class="col-md-2 control-label" id="applied_date">Applied Date (From)</label>
                        <div class="col-md-4">
                            <input name="form[applied_date_from]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $scm_leave_date_from?>">
                        </div>

                        <label class="col-md-2 control-label" id="approve_date">Approve Date (From)</label>
                        <div class="col-md-4">
                            <input name="form[approve_date_from]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $sld_date_from?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" id="budSp">Applied Date (To)</label>
                        <div class="col-md-4">
                            <input name="form[applied_date_to]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $scm_leave_date_to?>">
                        </div>

                        <label class="col-md-2 control-label" id="totalAmt">Approve Date (To)</label>
                        <div class="col-md-4">
                            <input name="form[approve_date_to]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $sld_date_to?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Total Day (Applied)</label>
                        <div class="col-md-4">
                            <input name="form[total_day_applied]" placeholder="day(s)" class="form-control" type="text" readonly value="<?php echo $total_day_applied?>">
                        </div>


                        <label class="col-md-2 control-label">Total Day (Approve)</label>
                        <div class="col-md-4">
                            <input name="form[total_day_approve]" placeholder="day(s)" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Entitled</label>
                        <div class="col-md-2">
                            <input name="form[entitled]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $entitled?>" readonly>
                        </div>
                        <label class="col-md-1 control-label text-left">day(s)</label>

                        <label class="col-md-1 control-label text-left">Year</label>
                        <div class="col-md-2 text-left">
                            <input name="form[year]" placeholder="YYYY" class="form-control" type="text" value="<?php echo $curr_year?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Balance</label>
                        <div class="col-md-2">
                            <input name="form[balance]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $balance?>" readonly>
                        </div>
                        <label class="col-md-2 control-label text-left">day(s)</label>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Staff On Study/Sabbatical leave?</label>
                        <div class="col-md-4">
                            <input name="form[apply_date]" placeholder="" class="form-control" type="text" value="<?php echo $sb_leave?>" readonly>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="alertStaffConferenceFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary ins_stf_cr"><i class="fa fa-save"></i> Save</button>
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

        $('#timepicker').datetimepicker({
            format: 'LT',
            format: 'hh:mm A'
        });
	});
</script>