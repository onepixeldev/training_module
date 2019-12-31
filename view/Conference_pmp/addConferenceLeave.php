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

    <div class="form-group hidden">
        <label class="col-md-2 control-label">Mod</label>
        <div class="col-md-2">
            <input name="form[mod]"  value="" class="form-control" id="mod_sc" readonly>
        </div>
    </div>


    <div class="alert alert-info fade in">
        <b>Staff Conference Leave</b>
    </div>

    <div id="alertConferenceLeave">
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
                        <div class="appliedDateFromRmv">
                            <label class="col-md-2 control-label">Applied Date (From) <b><font color="red">*</font></b></label>
                            <div class="col-md-4">
                                <input name="form[applied_date_from]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $scm_leave_date_from?>" id="appliedDateFrom">
                            </div>
                        </div>

                        <label class="col-md-2 control-label" id="appDateFromLabel">Approve Date (From) <b><font color="red">*</font></b></label>
                        <div class="col-md-4">
                            <input name="form[approve_date_from]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $sld_date_from?>" id="approveDateFrom">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="appliedDateToRmv">
                            <label class="col-md-2 control-label" id="appliedDateToLabel">Applied Date (To) <b><font color="red">*</font></b></label>
                            <div class="col-md-4">
                                <input name="form[applied_date_to]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $scm_leave_date_to?>" id="appliedDateTo">
                            </div>
                        </div>

                        <label class="col-md-2 control-label" id="appDateToLabel">Approve Date (To) <b><font color="red">*</font></b></label>
                        <div class="col-md-4">
                            <input name="form[approve_date_to]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $sld_date_to?>" id="approveDateTo">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="totalDayAppliedRmv">
                            <label class="col-md-2 control-label" id="totalDayAppliedLabel">Total Day (Applied)</label>
                            <div class="col-md-4">
                                <input name="form[total_day_applied]" placeholder="day(s)" class="form-control" type="text" readonly value="<?php echo $total_day_applied?>" id="totalDayApplied">
                            </div>
                        </div>

                        <label class="col-md-2 control-label" id="totalDayApproveLabel">Total Day (Approve)</label>
                        <div class="col-md-4">
                            <input name="form[total_day_approve]" placeholder="day(s)" class="form-control" type="text" readonly value="<?php echo $total_day_approve?>" id="totalDayApprove">
                        </div>
                    </div>

                    <div class="form-group">
                        <div id="loaderTDayApp"></div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Entitled</label>
                        <div class="col-md-2">
                            <input name="form[entitled]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $entitled?>" readonly id="entitledLeave">
                        </div>
                        <label class="col-md-1 control-label text-left">day(s)</label>

                        <label class="col-md-1 control-label text-left">Year</label>
                        <div class="col-md-2 text-left">
                            <input name="form[year]" placeholder="YYYY" class="form-control" type="text" value="<?php echo $curr_year?>" readonly id="entitledYear">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Balance</label>
                        <div class="col-md-2">
                            <input name="form[balance]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $balance?>" readonly id="balanceLeave">
                        </div>
                        <label class="col-md-2 control-label text-left">day(s)</label>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Staff On Study/Sabbatical leave?</label>
                        <div class="col-md-4">
                            <input name="form[study_leave]" placeholder="" class="form-control" type="text" value="<?php echo $sb_leave?>" readonly>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="alertConferenceLeaveFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary ins_con_leave"><i class="fa fa-save"></i> Save</button>
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