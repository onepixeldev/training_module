<form id="editTraining" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Training</h4>
    </div>
    
    <div id="alert">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <div class="alert alert-success fade in">
        <b>Training Info</b>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Refid</label>
        <div class="col-md-4">
            <input name="form[refid]" placeholder="refid" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-2"></div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary file_att"><i class="fa fa-upload"></i> File Attachment</button>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Type <b><font color="red">* </font></b></label>
        <div class="col-md-10">
            <?php
                echo form_dropdown('form[type]', $type_list, $tr_info->TH_TYPE, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Category <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[category]', $category, $tr_info->TH_CATEGORY, 'class="form-control width-50"')
            ?>
        </div>

        <label class="col-md-2 control-label">Level <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[level]', $level, $tr_info->TH_LEVEL, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Training Title <b><font color="red">* </font></b></label>
        <div class="col-md-10">
            <input name="form[training_title]" placeholder="Training Title" class="form-control" type="text" value="<?php echo $tr_info->TH_TRAINING_TITLE?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Training Description</label>
        <div class="col-md-10">
            <textarea name="form[training_description]" placeholder="Training Description" class="form-control" type="text" rows="5"><?php echo $tr_info->TH_TRAINING_DESC?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Venue</label>
        <div class="col-md-10">
            <input name="form[venue]" placeholder="Training Venue" class="form-control" type="text" value="<?php echo $tr_info->TH_TRAINING_VENUE?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[country]', $country_dd, $tr_info->TH_TRAINING_COUNTRY, 'class="selectpicker form-control field_inpt width-50" id="country"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
            <div id="faspinner"></div>
            <?php
                echo form_dropdown('form[state]', $state_list, $tr_info->TH_TRAINING_STATE, 'class="selectpicker form-control field_inpt width-50" id="state"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[date_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker" value="<?php echo $tr_info->TH_DATE_FROM2?>">
        </div>


        <label class="col-md-2 control-label">Date To <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[date_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker2" value="<?php echo $tr_info->TH_DATE_TO2?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Total Hours <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[total_hours]" placeholder="Total Hours" class="form-control" type="text" value="<?php echo $tr_info->TH_TOTAL_HOURS?>">
        </div>

        <label class="col-md-2 control-label">Internal/External?</label>
        <div class="col-md-4">
            <input name="form[internal_external]" class="form-control" type="text" value="EXTERNAL_AGENCY" value="<?php echo $tr_info->TH_INTERNAL_EXTERNAL?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Fee (RM)</label>
        <div class="col-md-4">
            <input name="form[fee]" placeholder="Fee" class="form-control" type="text" value="<?php echo $tr_info->TH_TRAINING_FEE?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Sponsor</label>
        <div class="col-md-10">
            <input name="form[sponsor]" placeholder="Sponsor" class="form-control" type="text" value="<?php echo $tr_info->TH_SPONSOR?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Participants</label>
        <div class="col-md-4">
            <input name="form[participants]" placeholder="Maximum number of participant" class="form-control" type="text" value="<?php echo $tr_info->TH_MAX_PARTICIPANT?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Online application?</label>
        <div class="col-md-4">
            <?php echo form_dropdown('form[online_application]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $tr_info->TH_OPEN, 'class="form-control width-50"')?>
        </div>

        <label class="col-md-2 control-label">Closing Date</label>
        <div class="col-md-4">
            <input name="form[closing_date]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker3" value="<?php echo $tr_info->TH_APPLY_CLOSING_DATE2?>">
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
        <div class="col-md-4">
            <?php echo form_dropdown('form[evaluation]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $evaluation, 'class="form-control width-50" id="evaluation"')?>
        </div>
    </div>

    <!--<div class="form-group hidden" id="eva_period">
        <div id="evaLoader"></div>
        <label class="col-md-2 control-label" id="evaPFrom">From</label>
        <div class="col-md-4">
            <input name="form[evaluation_period_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker4" value="<?php //echo $tr_info->TH_EVALUATION_DATE_FROM2?>">
        </div>

        <label class="col-md-2 control-label" id="evaPTo">To</label>
        <div class="col-md-4">
            <input name="form[evaluation_period_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker5" value="<?php //echo $tr_info->TH_EVALUATION_DATE_TO2?>">
        </div>
    </div>-->

    <br>
    <div class="form-group">
        <label class="col-md-4 control-label text-right"><b>Module Setup :</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Coordinator</label>
        <div class="col-md-2">
            <input name="form[coordinator]" class="form-control" type="text" id="coordinator_id" value="<?php echo $coor_id?>" readonly>
        </div>

        <div class="col-md-4">
            <input name="" class="form-control" type="text" id="coordinator_name" value="<?php echo $coor_name?>" readonly>
        </div>

        <div class="col-md-1">
            <button type="button" class="btn btn-primary search_staff"><i class="fa fa-search"></i> Search</button>
        </div>

        <div class="col-md-1">
            <button type="button" class="btn btn-danger" id="toggleClear"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-3" id="alertStfID">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Coordinator Sector</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[coordinator_sector]', $coor_sec, $coor_sec_code, 'class="form-control width-50"')
            ?>
        </div>

        <label class="col-md-2 control-label">Phone Number</label>
        <div class="col-md-4">
            <input name="form[phone_number]" placeholder="Coordinator contact / phone number" class="form-control" type="text" value="<?php echo $coor_c?>">
        </div>
    </div>

    <div class="alert alert-success fade in">
        <b>Program / Facilitator Evaluation Info</b>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label text-right"><b>Program / Facilitator Evaluation Period :</b></label>
    </div>
    <div class="form-group" id="eva_period">
        <div id="evaLoader"></div>
        <label class="col-md-2 control-label" id="evaPFrom">From</label>
        <div class="col-md-4">
            <input name="form[evaluation_period_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker4" value="<?php echo $tr_info->TH_EVALUATION_DATE_FROM2?>">
        </div>

        <label class="col-md-2 control-label" id="evaPTo">To</label>
        <div class="col-md-4">
            <input name="form[evaluation_period_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker5" value="<?php echo $tr_info->TH_EVALUATION_DATE_TO2?>">
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
                echo form_dropdown('form[organizer_level]', $org_lvl, $tr_info->TH_ORGANIZER_LEVEL, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Organizer Name</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[organizer_name]', $org_name, $tr_info->TH_ORGANIZER_NAME, 'class="select2-filter form-control" style="width: 100%" id="orginfo"')
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
            <textarea name="" placeholder="Address" class="form-control" type="text" rows="5"  id="orgAddress" readonly><?php echo $address?></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-4">
            <div id="faspinner2"></div>
            <input name="" placeholder="Postcode" class="form-control" type="text" id="orgPostcode" value="<?php echo $postcode?>" readonly>
        </div>

        <label class="col-md-2 control-label">City</label>
        <div class="col-md-4">
            <div id="faspinner2"></div>
            <input name="" placeholder="City" class="form-control" type="text" id="orgCity" value="<?php echo $city?>" readonly>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
        <div id="faspinner2"></div>
            <input name="" placeholder="State" class="form-control" type="text" id="orgState" value="<?php echo $state?>" readonly>
        </div>

        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-4">
            <div id="faspinner2"></div>
            <input name="" placeholder="Country" class="form-control" type="text" id="orgCountry" value="<?php echo $country?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">For Attention</label>
        <div class="col-md-10">
            <input name="form[attention]" placeholder="For Attention" class="form-control" type="text" value="<?php echo $f_att?>">
        </div>
    </div>

    <div class="alert alert-success fade in">
        <b>Completion Info</b>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Evaluation Compulsory?</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[evaluation_compulsary]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $tr_info->TH_EVALUATION_COMPULSORY, 'class="form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">Attendance Type</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[attendance_type]', array('NONE'=>'NONE','DAILY'=>'DAILY','ONE-TIME'=>'ONE-TIME'), $tr_info->TH_ATTENDANCE_TYPE, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Print Certificate?</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[print_certificate]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $tr_info->TH_PRINT_CERTIFICATE, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div id="alertFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary save_upd_tr"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
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

        $("#toggleClear").click(function() {
            $("#coordinator_id").val("");
            $("#coordinator_name").val("");
        });
        
        $("#toggleClear2").click(function() { 
            $("#orginfo").select2("val", "");
            $("#orginfo").select2().val("");
        });
	});
</script>