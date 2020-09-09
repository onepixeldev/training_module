<form id="updTrainingInfo" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Training</h4>
    </div>
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>

        <div class="alert alert-success fade in">
            <b>Training Info</b>
        </div>
        <br>
        <input name="form[sc_code]" type="hidden" class="form-control" value="<?php echo $defSecCode?>" readonly>
        <div class="form-group">
            <label class="col-md-2 control-label"><b>Ref ID</b></label>
            <div class="col-md-2">
				<input name="form[training_refid]" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_REF_ID?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Type <b><font color="red">* </font></b></label>
            <div class="col-md-10">
                <?php
                    echo form_dropdown('form[type]', $type_list, $trInfo->TH_TYPE, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">    
            <label class="col-md-2 control-label">Category <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[category]', $category, $trInfo->TH_CATEGORY, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>

            <label class="col-md-2 control-label">Structured Training</label>
            <div class="col-md-2">
                <input name="form[structured_training]" placeholder="Ref ID" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TRAINING_CODE?>" id="strTraining" readonly>
            </div>
            <button type="button" class="btn btn-primary" id="search_str_tr_ver" value="<?php echo $trInfo->TH_REF_ID?>"><i class="fa fa-search"></i> Search</button>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Level <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[level]', $level, $trInfo->TH_LEVEL, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">Area</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[area]', $area, $trInfo->TH_FIELD, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Service Group</label>
            <div class="col-md-10">
                <?php
                    echo form_dropdown('form[service_group]', $sgroup, $trInfo->TH_SERVICE_GROUP, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Title <b><font color="red">* </font></b></label>
            <div class="col-md-10">
				<input name="form[training_title]" placeholder="Training Title" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TRAINING_TITLE?>" id="trTitle">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Description</label>
            <div class="col-md-10">
				<textarea name="form[training_description]" placeholder="Training Description" class="form-control field_inpt" type="text" rows="5"><?php echo $trInfo->TH_TRAINING_DESC?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Venue</label>
            <div class="col-md-10">
				<input name="form[venue]" placeholder="Training Venue" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TRAINING_VENUE?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Country</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[country]', $count_list, $trInfo->TH_TRAINING_COUNTRY, 'class="selectpicker form-control field_inpt width-50" id="country"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">State</label>
            <div class="col-md-4">
                <div id="faspinner"></div>
                <?php
                    echo form_dropdown('form[state]', $state_list, $trInfo->TH_TRAINING_STATE, 'class="selectpicker form-control field_inpt width-50" id="state"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Date From <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[date_from]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker" value="<?php echo $trInfo->TH_DATEFR?>">
            </div>


            <label class="col-md-2 control-label">Date To <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[date_to]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker2" value="<?php echo $trInfo->TH_DATETO?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Time From <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[time_from]" placeholder="HH:MM AM/PM" class="form-control field_inpt" type="text" id="timepicker" value="<?php echo $trInfo->TIME_FR?>">
            </div>


            <label class="col-md-2 control-label">Time To <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[time_to]" placeholder="HH:MM AM/PM" class="form-control field_inpt" type="text" id="timepicker2" value="<?php echo $trInfo->TIME_T?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Total Hours <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[total_hours]" placeholder="Total Hours" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TOTAL_HOURS?>">
            </div>

            <label class="col-md-2 control-label">Internal/External? <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php echo form_dropdown('form[internal_external]', array(''=>'---Please Select---','INTERNAL'=>'INTERNAL','EXTERNAL'=>'EXTERNAL', 'EXTERNAL_AGENCY'=>'EXTERNAL AGENCY'), $trInfo->TH_INTERNAL_EXTERNAL, 'class="selectpicker form-control field_inpt width-50"')?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Sponsor</label>
            <div class="col-md-10">
                <input name="form[sponsor]" placeholder="Sponsor" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_SPONSOR?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Offer?</label>
            <div class="col-md-2">
                <?php echo form_dropdown('form[offer]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $trInfo->TH_OFFER, 'class="selectpicker form-control field_inpt width-50"')?>
            </div>

            <label class="col-md-4 control-label">Participants</label>
            <div class="col-md-4">
                <input name="form[participants]" placeholder="Maximum number of participant" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_MAX_PARTICIPANT?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Online application?</label>
            <div class="col-md-2">
                <?php echo form_dropdown('form[online_application]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $trInfo->TH_OPEN, 'class="selectpicker form-control field_inpt width-50"')?>
            </div>

            <label class="col-md-4 control-label">Closing Date</label>
            <div class="col-md-4">
                <input name="form[closing_date]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker3" value="<?php echo $trInfo->TH_APP_CLOSING_DATE?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Competency Code</label>
            <div class="col-md-5">
                <?php echo form_dropdown('form[competency_code]', $com_lvl_code, $trInfo->TH_COMPETENCY_CODE, 'class="selectpicker form-control field_inpt width-50"')?>
            </div>
        </div>

        <!--<div class="form-group">
            <label class="col-md-4 control-label text-right"><b>Evaluation Period :</b></label>
        </div>
        
        <div class="form-group">
            <label class="col-md-4 control-label text-right" id="evaMsg"></label>
        </div>-->

        <div class="form-group">
            <label class="col-md-2 control-label">Effectiveness Evaluation</label>
            <div class="col-md-2">
                <?php echo form_dropdown('form[evaluation]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $evaluation, 'class="selectpicker form-control field_inpt width-50" id="evaluation"')?>
            </div>
        </div>

        <!--<div class="form-group">
            <div id="evaLoader"></div>
            <label class="col-md-2 control-label" id="evaPFrom">Program / Facilitator Evaluation  From</label>
            <div class="col-md-4">
                <input name="form[evaluation_period_from]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker4" value="<?php //echo $trInfo->TH_EVA_DATE_FROM?>">
            </div>

            <label class="col-md-2 control-label" id="evaPTo">Program / Facilitator Evaluation To</label>
            <div class="col-md-4">
                <input name="form[evaluation_period_to]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker5"  value="<?php //echo $trInfo->TH_EVA_DATE_TO?>">
            </div>
        </div>-->

        <div class="form-group">
            <label class="col-md-4 control-label text-right"><b>Module Setup :</b></label>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Coordinator</label>
            <div class="col-md-5">
                <?php
                    echo form_dropdown('form[coordinator]', $coor, $coordinator, 'class="select2-filter form-control field_inpt" id="coor"')
                ?>
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-danger" id="toggleClear"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Coordinator Sector</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[coordinator_sector]', $coor_sec, $coor_sector, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>

            <label class="col-md-2 control-label">Phone Number</label>
            <div class="col-md-4">
                <input name="form[phone_number]" placeholder="Coordinator contact / phone number" class="form-control field_inpt" type="text" value="<?php echo $coor_p_no?>">
            </div>
        </div>

        <div class="alert alert-success fade in">
            <b>Program / Facilitator Evaluation Info</b>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label text-right"><b>Program / Facilitator Evaluation Period :</b></label>
        </div>
        <div class="form-group">
            <div id="evaLoader"></div>
            <label class="col-md-2 control-label" id="evaPFrom">From</label>
            <div class="col-md-4">
                <input name="form[evaluation_period_from]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker4" value="<?php echo $trInfo->TH_EVA_DATE_FROM?>">
            </div>

            <label class="col-md-2 control-label" id="evaPTo">To</label>
            <div class="col-md-4">
                <input name="form[evaluation_period_to]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker5"  value="<?php echo $trInfo->TH_EVA_DATE_TO?>">
            </div>
        </div>

        <div class="alert alert-success fade in">
            <b>Confirmation Due Info</b>
        </div>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Date From <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[confirmation_due_date_from]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker6" value="<?php echo $trInfo->TH_CON_DATE_FROM?>">
            </div>

            <label class="col-md-2 control-label">Date To <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[confirmation_due_date_to]" placeholder="DD-MM-YYYY" class="form-control field_inpt" type="text" id="datepicker7" value="<?php echo $trInfo->TH_CON_DATE_TO?>">
            </div>
        </div>

        <div class="alert alert-success fade in">
            <b>Organizer Info</b>
        </div>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Organizer Level</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_level]', $org_lvl, $trInfo->TH_ORGANIZER_LEVEL, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Organizer Name</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_name]', $org_name, $trInfo->TH_ORGANIZER_NAME, 'class="select2-filter form-control field_inpt" id="orginfo"')
                ?>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger" id="toggleClear2"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-10">
                <div id="faspinner2"></div>
                <textarea name="" placeholder="Address" class="form-control field_inpt" type="text" rows="5" id="orgAddress" readonly><?php echo $OrgAdd?></textarea>
            </div>
        </div>

        <div class="form-group">    
            <label class="col-md-2 control-label">Postcode</label>
            <div class="col-md-4">
                <div id="faspinner2"></div>
                <input name="" placeholder="Postcode" class="form-control field_inpt" type="text" value="<?php echo $OrgPost?>" id="orgPostcode" readonly>
            </div>

            <label class="col-md-2 control-label">City</label>
            <div class="col-md-4">
                <div id="faspinner2"></div>
                <input name="" placeholder="City" class="form-control field_inpt" type="text" value="<?php echo $OrgCity?>" id="orgCity" readonly>
            </div>
        </div>

        <div class="form-group">    
            <label class="col-md-2 control-label">State</label>
            <div class="col-md-4">
            <div id="faspinner2"></div>
                <input name="" placeholder="State" class="form-control field_inpt" type="text" value="<?php echo $OrgState?>" id="orgState" readonly>
            </div>

            <label class="col-md-2 control-label">Country</label>
            <div class="col-md-4">
                <div id="faspinner2"></div>
                <input name="" placeholder="Country" class="form-control field_inpt" type="text" value="<?php echo $OrgCountry?>" id="orgCountry" readonly>
            </div>
        </div>

        <div class="alert alert-success fade in">
            <b>Completion Info</b>
        </div>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Evaluation Compulsory?</label>
            <div class="col-md-2">
                <?php
                    echo form_dropdown('form[evaluation_compulsary]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $trInfo->TH_EVALUATION_COMPULSORY, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
            
            <label class="col-md-4 control-label">Attendance Type</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[attendance_type]', array('NONE'=>'NONE','DAILY'=>'DAILY','ONE-TIME'=>'ONE-TIME'), $trInfo->TH_ATTENDANCE_TYPE, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Print Certificate?</label>
            <div class="col-md-2">
                <?php
                    echo form_dropdown('form[print_certificate]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $trInfo->TH_PRINT_CERTIFICATE, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
        </div>
        
        <!-- start @update 06032020 -->
        <div class="alert alert-success fade in">
            <b>Training Setup (History)</b>
        </div>
        <br>
        <div class="form-group">
            <label class="col-md-3 control-label">Set as Training Setup (History) ?</label>
            <div class="col-md-2">
                <?php
                    echo form_dropdown('form[training_setup_history]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $thHistory, 'class="selectpicker form-control field_inpt width-50"')
                ?>
            </div>
            <div class="col-md-7">
                <b><font color="red">(This Training will not be appeared on Training Calendar if set to 'Yes')</font></b><br>&nbsp; <span id="note"></span>
            </div>
        </div>
        <!-- end @update 06032020 -->
        
        <div id="alertFooter"></div>
    
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary save_upd_tr_info"><i class="fa fa-save"></i> Save Changes</button>
    </div>
</form>

<p>
    <div id="speakerInfo">
    </div>
    <br>
    <div id="facilitatorInfo">
    </div>
</p>

<script>
    //var recc = '';

	$(document).ready(function(){	
        $('.select2-filter').select2({
            allowClear: true,
            placeholder: 'Select an option',
            width: '100%',
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

    $("#toggleClear").click(function() {
        $("#coor").select2("val", "");
        $("#coor").select2().val("");
    });
    
    $("#toggleClear2").click(function() { 
        $("#orginfo").select2("val", "");
        $("#orginfo").select2().val("");
    });
    
</script>