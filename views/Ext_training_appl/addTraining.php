<form id="addTraining" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Training</h4>
    </div>
    
    <div id="alert">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <div class="alert alert-info fade in">
        <b>Training Info</b>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Type <b><font color="red">* </font></b></label>
        <div class="col-md-10">
            <?php
                echo form_dropdown('form[type]', $type_list, '', 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">Category <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[category]', $category, '', 'class="form-control width-50"')
            ?>
        </div>

        <label class="col-md-2 control-label">Level <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[level]', $level, '', 'class="form-control width-50"')
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
                echo form_dropdown('form[country]', $country_dd, '', 'class="form-control" id="country" style="width: 100%"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
            <div id="faspinner"></div>
            <?php
                echo form_dropdown('form[state]', array(''=>'-- Please select country --'), '', 'class="form-control width-50" id="state"')
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
        <label class="col-md-2 control-label">Total Hours <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <input name="form[total_hours]" placeholder="Total Hours" class="form-control" type="text">
        </div>

        <label class="col-md-2 control-label">Internal/External?</label>
        <div class="col-md-4">
            <input name="form[internal_external]" class="form-control" type="text" value="EXTERNAL_AGENCY" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Fee (RM)</label>
        <div class="col-md-4">
            <input name="form[fee]" placeholder="Fee" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Sponsor</label>
        <div class="col-md-10">
            <input name="form[sponsor]" placeholder="Sponsor" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Participants</label>
        <div class="col-md-4">
            <input name="form[participants]" placeholder="Maximum number of participant" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Online application?</label>
        <div class="col-md-4">
            <?php echo form_dropdown('form[online_application]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="form-control width-50"')?>
        </div>

        <label class="col-md-2 control-label">Closing Date</label>
        <div class="col-md-4">
            <input name="form[closing_date]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker3">
        </div>
    </div>

    <br>

    <!--<div class="form-group">
        <label class="col-md-4 control-label text-right"><b>Evaluation Period :</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label text-right" id="evaMsg"></label>
    </div>-->

    <div class="form-group">
        <label class="col-md-2 control-label">Effectiveness Evaluation</label>
        <div class="col-md-4">
            <?php echo form_dropdown('form[evaluation]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="form-control width-50" id="evaluation"')?>
        </div>
    </div>

    <!--<div class="form-group hidden" id="eva_period">
        <div id="evaLoader"></div>
        <label class="col-md-2 control-label" id="evaPFrom">From</label>
        <div class="col-md-4">
            <input name="form[evaluation_period_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker4">
        </div>

        <label class="col-md-2 control-label" id="evaPTo">To</label>
        <div class="col-md-4">
            <input name="form[evaluation_period_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker5">
        </div>
    </div>-->

    <br>
    <div class="form-group">
        <label class="col-md-4 control-label text-right"><b>Module Setup :</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Coordinator</label>
        <div class="col-md-2">
            <input name="form[coordinator]" class="form-control" type="text" value="" id="coordinator_id" readonly>
        </div>

        <div class="col-md-4">
            <input name="" class="form-control" type="text" value="" id="coordinator_name" readonly>
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
                echo form_dropdown('form[coordinator_sector]', $coor_sec, '', 'class="form-control width-50"')
            ?>
        </div>

        <label class="col-md-2 control-label">Phone Number</label>
        <div class="col-md-4">
            <input name="form[phone_number]" placeholder="Coordinator contact / phone number" class="form-control" type="text"">
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Program / Facilitator Evaluation Info</b>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label text-right"><b>Program / Facilitator Evaluation Period :</b></label>
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

    <div class="alert alert-info fade in">
        <b>Organizer Info</b>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Organizer Level</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[organizer_level]', $org_lvl, '', 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Organizer Name</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[organizer_name]', $org_name, '', 'class="select2-filter form-control" id="orginfo"')
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

    <div class="form-group">
        <label class="col-md-2 control-label">For Attention</label>
        <div class="col-md-10">
            <input name="form[attention]" placeholder="For Attention" class="form-control" type="text">
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Completion Info</b>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Evaluation Compulsory?</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[evaluation_compulsary]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">Attendance Type</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[attendance_type]', array('NONE'=>'NONE','DAILY'=>'DAILY','ONE-TIME'=>'ONE-TIME'), '', 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Print Certificate?</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[print_certificate]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div id="alertFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary add_tr"><i class="fa fa-save"></i> Save</button>
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