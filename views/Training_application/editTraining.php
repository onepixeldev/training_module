<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Training</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>
        <h4 class="panel-heading bg-success txt-color-black">Training Info</h4>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label"><b>Ref ID</b></label>
            <div class="col-md-2">
				<input name="form[training_refid]" class="form-control" type="text" value="<?php echo $trInfo->TH_REF_ID?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Type <b><font color="red">* </font></b></label>
            <div class="col-md-10">
                <?php
                    echo form_dropdown('form[type]', $type_list, $trInfo->TH_TYPE, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">    
            <label class="col-md-2 control-label">Category <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[category]', $category, $trInfo->TH_CATEGORY, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Level <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[level]', $level, $trInfo->TH_LEVEL, 'class="selectpicker form-control width-50"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">Area <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[area]', $area, $trInfo->TH_FIELD, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Service Group</label>
            <div class="col-md-10">
                <?php
                    echo form_dropdown('form[service_group]', $sgroup, $trInfo->TH_SERVICE_GROUP, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Title <b><font color="red">* </font></b></label>
            <div class="col-md-10">
				<input name="form[training_title]" placeholder="Training Title" class="form-control" type="text" value="<?php echo $trInfo->TH_TRAINING_TITLE?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Description</label>
            <div class="col-md-10">
				<textarea name="form[training_description]" placeholder="Training Description" class="form-control" type="text" rows="5"><?php echo $trInfo->TH_TRAINING_DESC?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Venue</label>
            <div class="col-md-10">
				<input name="form[venue]" placeholder="Training Venue" class="form-control" type="text" value="<?php echo $trInfo->TH_TRAINING_VENUE?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Country</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[country]', $count_list, $trInfo->TH_TRAINING_COUNTRY, 'class="selectpicker form-control width-50" id="country"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">State</label>
            <div class="col-md-4">
                <div id="faspinner"></div>
                <?php
                    echo form_dropdown('form[state]', $state_list, $trInfo->TH_TRAINING_STATE, 'class="selectpicker form-control width-50" id="state"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Date From <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[date_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker" value="<?php echo $trInfo->TH_DATEFR?>">
            </div>


            <label class="col-md-2 control-label">Date To <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[date_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker2" value="<?php echo $trInfo->TH_DATETO?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Time From <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[time_from]" placeholder="HH:MM AM/PM" class="form-control" type="text" id="timepicker" value="<?php echo $trInfo->TIME_FR?>">
            </div>


            <label class="col-md-2 control-label">Time To <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[time_to]" placeholder="HH:MM AM/PM" class="form-control" type="text" id="timepicker2" value="<?php echo $trInfo->TIME_T?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Total Hours <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[total_hours]" placeholder="Total Hours" class="form-control" type="text" value="<?php echo $trInfo->TH_TOTAL_HOURS?>">
            </div>

            <label class="col-md-2 control-label">Internal/External? <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php echo form_dropdown('form[internal_external]', array('---Please Select---','INTERNAL'=>'INTERNAL','EXTERNAL'=>'EXTERNAL'), $trInfo->TH_INTERNAL_EXTERNAL, 'class="selectpicker form-control width-50"')?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Sponsor <b><font color="red">* </font></b></label>
            <div class="col-md-10">
                <input name="form[sponsor]" placeholder="Sponsor" class="form-control" type="text" value="<?php echo $trInfo->TH_SPONSOR?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Offer?</label>
            <div class="col-md-4">
                <?php echo form_dropdown('form[offer]', array('---Please Select---','Y'=>'YES','N'=>'NO'), $trInfo->TH_OFFER, 'class="selectpicker form-control width-50"')?>
            </div>

            <label class="col-md-2 control-label">Participants</label>
            <div class="col-md-4">
                <input name="form[participants]" placeholder="Maximum number of participant" class="form-control" type="text" value="<?php echo $trInfo->TH_MAX_PARTICIPANT?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Online application?</label>
            <div class="col-md-2">
                <?php echo form_dropdown('form[online_application]', array('---Please Select---','Y'=>'YES','N'=>'NO'), $trInfo->TH_OPEN, 'class="selectpicker form-control width-50"')?>
            </div>

            <label class="col-md-4 control-label">Closing Date</label>
            <div class="col-md-4">
                <input name="form[closing_date]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker3" value="<?php echo $trInfo->TH_APP_CLOSING_DATE?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Competency Code</label>
            <div class="col-md-6">
                <?php echo form_dropdown('form[competency_code]', $com_lvl_code, $trInfo->TH_COMPETENCY_CODE, 'class="selectpicker form-control width-50"')?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-right"><b>Evaluation Period :</b></label>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">From <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[evaluation_period_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker4" value="<?php echo $trInfo->TH_EVA_DATE_FROM?>">
            </div>

            <label class="col-md-2 control-label">To <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[evaluation_period_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker5"  value="<?php echo $trInfo->TH_EVA_DATE_TO?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-right"><b>Module Setup :</b></label>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Coordinator</label>
            <div class="col-md-5">
                <?php
                    echo form_dropdown('form[coordinator]', $coor, $trInfoDetl->THD_COORDINATOR, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Coordinator Sector</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[coordinator_sector]', $coor_sec, $trInfoDetl->THD_COORDINATOR_SECTOR, 'class="selectpicker form-control width-50"')
                ?>
            </div>

            <label class="col-md-2 control-label">Phone Number</label>
            <div class="col-md-4">
                <input name="form[phone_number]" placeholder="Coordinator contact / phone number" class="form-control" type="text" value="<?php echo $trInfoDetl->THD_COORDINATOR_TELNO?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Evaluation?</label>
            <div class="col-md-2">
                <?php echo form_dropdown('form[evaluation]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $trInfoDetl->THD_EVALUATION, 'class="selectpicker form-control width-50"')?>
            </div>
        </div>

        <h4 class="panel-heading bg-success txt-color-black">Confirmation Due Info</h4>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Date From <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[confirmation_due_date_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker6" value="<?php echo $trInfo->TH_CON_DATE_FROM?>">
            </div>

            <label class="col-md-2 control-label">Date To <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[confirmation_due_date_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker7" value="<?php echo $trInfo->TH_CON_DATE_TO?>">
            </div>
        </div>


        <h4 class="panel-heading bg-success txt-color-black">Organizer Info</h4>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Organizer Level</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_level]', $org_lvl, $trInfo->TH_ORGANIZER_LEVEL, 'class="selectpicker form-control width-50"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">Organizer Name</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_name]', $org_name, $trInfo->TH_ORGANIZER_NAME, 'class="selectpicker form-control width-50" id="orginfo"')
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

        <h4 class="panel-heading bg-success txt-color-black">Completion Info</h4>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Evaluation Compulsory? <b><font color="red">* </font></b></label>
            <div class="col-md-2">
                <?php
                    echo form_dropdown('form[evaluation_compulsary]', array('---Please Select---','Y'=>'YES','N'=>'NO'), $trInfo->TH_EVALUATION_COMPULSORY, 'class="selectpicker form-control width-50"')
                ?>
            </div>
            
            <label class="col-md-4 control-label">Attendance Type <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[attendance_type]', array('NONE'=>'NONE','DAILY'=>'DAILY','ONE-TIME'=>'ONE-TIME'), $trInfo->TH_ATTENDANCE_TYPE, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Print Certificate? <b><font color="red">* </font></b></label>
            <div class="col-md-2">
                <?php
                    echo form_dropdown('form[print_certificate]', array('---Please Select---','Y'=>'YES','N'=>'NO'), $trInfo->TH_PRINT_CERTIFICATE, 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div id="alertFooter"></div>

    </div>
    
    <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
    //var recc = '';

	$(document).ready(function(){	
		$('form').submit(function (e) { 
			e.preventDefault();
			var data = $('form').serialize();
			msg.wait('#alert');
			msg.wait('#alertFooter');
			
			$('.btn').attr('disabled', 'disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('saveUpdateTraining')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertFooter');
					
					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s1')?>';
						}, 1000);
					} else {
						$('.btn').removeAttr('disabled');
					}
				},
				error: function() {
					$('.btn').removeAttr('disabled');
					msg.danger('Please contact administrator.', '#alert');
					//msg.danger('Please contact administrator.', '#alertFooter');
				}
			});	
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