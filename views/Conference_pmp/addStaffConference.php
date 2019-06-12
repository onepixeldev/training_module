<form id="addStaffConference" class="form-horizontal" method="post">
    <div id="alert">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID <b><font color="red">* </font></b></label>
        <div class="col-md-10">
            <input name="form[staff_id]" placeholder="Staff ID" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title <b><font color="red">* </font></b></label>
        <div class="col-md-10">
            <input name="form[conference_title]" placeholder="Conference Title" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Venue <b><font color="red">* </font></b></label>
        <div class="col-md-10">
            <input name="form[venue]" placeholder="Venue" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-4">
            <input name="form[venue]" placeholder="City" class="form-control" type="text">
        </div>

        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-2">
            <input name="form[postcode]" placeholder="Postcode" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
            <input name="form[state]" placeholder="State" class="form-control" type="text">
        </div>
        
        <label class="col-md-2 control-label">Area</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[area]', '', '', 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Service Group</label>
        <div class="col-md-10">
            <?php
                echo form_dropdown('form[service_group]', '', '', 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Training Title <b><font color="red">* </font></b></label>
        <div class="col-md-10">
            <input name="form[training_title]" placeholder="Training Title" class="form-control" type="text" id="trTitle">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Training Description</label>
        <div class="col-md-10">
            <textarea name="form[training_description]" placeholder="Training Description" class="form-control" type="text" rows="5"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Venue</label>
        <div class="col-md-10">
            <input name="form[venue]" placeholder="Training Venue" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[country]', '', '', 'class="selectpicker form-control width-50" id="country"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
            <div id="faspinner"></div>
            <?php
                echo form_dropdown('form[state]', '', '', 'class="selectpicker form-control width-50" id="state"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[date_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker">
        </div>


        <label class="col-md-2 control-label">Date To <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[date_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker2">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Time From <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[time_from]" placeholder="HH:MM AM/PM" class="form-control" type="text" id="timepicker">
        </div>


        <label class="col-md-2 control-label">Time To <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[time_to]" placeholder="HH:MM AM/PM" class="form-control" type="text" id="timepicker2">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Total Hours <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[total_hours]" placeholder="Total Hours" class="form-control" type="text">
        </div>

        <label class="col-md-2 control-label">Internal/External? <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php echo form_dropdown('form[internal_external]', array(''=>'---Please Select---','INTERNAL'=>'INTERNAL','EXTERNAL'=>'EXTERNAL', 'EXTERNAL_AGENCY'=>'EXTERNAL AGENCY'), '', 'class="selectpicker form-control width-50"')?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Sponsor</label>
        <div class="col-md-10">
            <input name="form[sponsor]" placeholder="Sponsor" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Offer?</label>
        <div class="col-md-4">
            <?php echo form_dropdown('form[offer]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')?>
        </div>

        <label class="col-md-2 control-label">Participants</label>
        <div class="col-md-4">
            <input name="form[participants]" placeholder="Maximum number of participant" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Online application?</label>
        <div class="col-md-2">
            <?php echo form_dropdown('form[online_application]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')?>
        </div>

        <label class="col-md-4 control-label">Closing Date</label>
        <div class="col-md-4">
            <input name="form[closing_date]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker3">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Competency Code</label>
        <div class="col-md-5">
            <?php echo form_dropdown('form[competency_code]', '', '', 'class="selectpicker form-control width-50"')?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label text-right"><b>Evaluation Period :</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label text-right" id="evaMsg"></label>
    </div>

    <div class="form-group">
        <div id="evaLoader"></div>
        <label class="col-md-2 control-label" id="evaPFrom">From</label>
        <div class="col-md-4">
            <input name="form[evaluation_period_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker4">
        </div>

        <label class="col-md-2 control-label" id="evaPTo">To</label>
        <div class="col-md-4">
            <input name="form[evaluation_period_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker5">
        </div>
    </div>

    <br>
    <div class="form-group">
        <label class="col-md-4 control-label text-right"><b>Module Setup :</b></label>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Coordinator</label>
        <div class="col-md-5">
            <?php
                echo form_dropdown('form[coordinator]', '', '', 'class="selectpicker select2-filter form-control" style="width: 100%"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Coordinator Sector</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[coordinator_sector]', '', '', 'class="selectpicker form-control width-50"')
            ?>
        </div>

        <label class="col-md-2 control-label">Phone Number</label>
        <div class="col-md-4">
            <input name="form[phone_number]" placeholder="Coordinator contact / phone number" class="form-control" type="text"">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Evaluation?</label>
        <div class="col-md-2">
            <?php echo form_dropdown('form[evaluation]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50" id="evaluation"')?>
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Confirmation Due Info</b>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Date From <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[confirmation_due_date_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker6">
        </div>

        <label class="col-md-2 control-label">Date To <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[confirmation_due_date_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker7">
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Organizer Info</b>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Organizer Level</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[organizer_level]', '', '', 'class="selectpicker form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">Organizer Name</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[organizer_name]', '', '', 'class="selectpicker select2-filter form-control" style="width: 100%" id="orginfo"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Address</label>
        <div class="col-md-10">
            <div id="faspinner2"></div>
            <textarea name="" placeholder="Address" class="form-control" type="text" rows="5"  id="orgAddress" readonly></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-4">
            <div id="faspinner2"></div>
            <input name="" placeholder="Postcode" class="form-control" type="text" id="orgPostcode" readonly>
        </div>

        <label class="col-md-2 control-label">City</label>
        <div class="col-md-4">
            <div id="faspinner2"></div>
            <input name="" placeholder="City" class="form-control" type="text" id="orgCity" readonly>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
        <div id="faspinner2"></div>
            <input name="" placeholder="State" class="form-control" type="text" id="orgState" readonly>
        </div>

        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-4">
            <div id="faspinner2"></div>
            <input name="" placeholder="Country" class="form-control" type="text" id="orgCountry" readonly>
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Completion Info</b>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Evaluation Compulsory?</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[evaluation_compulsary]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-4 control-label">Attendance Type</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[attendance_type]', array('NONE'=>'NONE','DAILY'=>'DAILY','ONE-TIME'=>'ONE-TIME'), '', 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Print Certificate?</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[print_certificate]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div id="alertFooter"></div>
    
    <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-primary ins_tr_info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
	$(document).ready(function(){
        $('.select2-filter').select2({
            placeholder: 'Select an option',
            width: 'resolve'
        });
        
        $('#datepicker').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        });

        $('#datepicker2').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        });

        $('#datepicker3').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        });

        $('#datepicker4').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        });

        $('#datepicker5').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        });

        $('#datepicker6').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        });

        $('#datepicker7').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        });

        $('#timepicker').datetimepicker({
            format: 'LT',
            format: 'hh:mm A'
        });

        $('#timepicker2').datetimepicker({
            format: 'LT',
            format: 'hh:mm A'
        });  
	});
</script>