<form class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title" id="myModalLabel">Add New Training</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>
        <h4 class="panel-heading bg-success txt-color-black">Training Info</h4>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Type <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[type]', $type_list, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">Category <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[category]', $category, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Level <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[level]', $level, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">Area <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[area]', $area, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Service Group</label>
            <div class="col-md-10">
                <?php
                    echo form_dropdown('form[service_group]', $sgroup, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Title <b><font color="red">* </font></b></label>
            <div class="col-md-10">
				<input name="form[training_title]" placeholder="Training Title" class="form-control" type="text">
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
                    echo form_dropdown('form[country]', $count_list, '', 'class="selectpicker form-control width-50" id="country"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">State</label>
            <div class="col-md-4">
                <div id="faspinner"></div>
                <?php
                    echo form_dropdown('form[state]', $state_list, '', 'class="selectpicker form-control width-50" id="state"')
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
                <?php echo form_dropdown('form[internal_external]', array('---Please Select---','INTERNAL'=>'INTERNAL','EXTERNAL'=>'EXTERNAL'), '', 'class="selectpicker form-control width-50"')?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Sponsor <b><font color="red">* </font></b></label>
            <div class="col-md-10">
                <input name="form[sponsor]" placeholder="Sponsor" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Offer?</label>
            <div class="col-md-4">
                <?php echo form_dropdown('form[offer]', array('---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')?>
            </div>

            <label class="col-md-2 control-label">Participants</label>
            <div class="col-md-4">
                <input name="form[participants]" placeholder="Maximum number of participant" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Online application?</label>
            <div class="col-md-4">
                <?php echo form_dropdown('form[online_application]', array('---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')?>
            </div>

            <label class="col-md-2 control-label">Closing Date</label>
            <div class="col-md-4">
                <input name="form[closing_date]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker3">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Competency Code</label>
            <div class="col-md-6">
                <?php echo form_dropdown('form[competency_code]', $com_lvl_code, '', 'class="selectpicker form-control width-50"')?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-right"><b>Evaluation Period :</b></label>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">From <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[evaluation_period_from]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker4">
            </div>

            <label class="col-md-2 control-label">To <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <input name="form[evaluation_period_to]" placeholder="DD-MM-YYYY" class="form-control" type="text" id="datepicker5">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Coordinator</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[coordinator]', $coor, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">Coordinator Sector</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[coordinator_sector]', $coor_sec, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Phone Number</label>
            <div class="col-md-4">
                <input name="form[phone_number]" placeholder="Coordinator contact / phone number" class="form-control" type="text"">
            </div>

            <label class="col-md-2 control-label">Evaluation?</label>
            <div class="col-md-4">
                <?php echo form_dropdown('form[evaluation]', array('---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')?>
            </div>
        </div>


        <h4 class="panel-heading bg-success txt-color-black">Confirmation Due Info</h4>
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


        <h4 class="panel-heading bg-success txt-color-black">Organizer Info</h4>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Organizer Level</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_level]', $org_lvl, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">Organizer Name</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_name]', $org_name, '', 'class="selectpicker form-control width-50" id="orginfo"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-10">
                <div id="faspinner2"></div>
                <textarea name="form[address]" placeholder="Address" class="form-control" type="text" rows="5"  id="orgAddress" readonly></textarea>
            </div>
        </div>

        <div class="form-group">    
            <label class="col-md-2 control-label">Postcode</label>
            <div class="col-md-4">
                <div id="faspinner2"></div>
                <input name="form[postcode]" placeholder="Postcode" class="form-control" type="text" id="orgPostcode" readonly>
            </div>

            <label class="col-md-2 control-label">City</label>
            <div class="col-md-4">
                <div id="faspinner2"></div>
                <input name="form[city]" placeholder="City" class="form-control" type="text" id="orgCity" readonly>
            </div>
        </div>

        <div class="form-group">    
            <label class="col-md-2 control-label">State</label>
            <div class="col-md-4">
            <div id="faspinner2"></div>
                <input name="form[o_state]" placeholder="State" class="form-control" type="text" id="orgState" readonly>
            </div>

            <label class="col-md-2 control-label">Country</label>
            <div class="col-md-4">
                <div id="faspinner2"></div>
                <input name="form[o_country]" placeholder="Country" class="form-control" type="text" id="orgCountry" readonly>
            </div>
        </div>

        <h4 class="panel-heading bg-success txt-color-black">Completion Info</h4>
        <br>
        <div class="form-group">
            <label class="col-md-2 control-label">Evaluation Compulsory? <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_level]', array('---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
            
            <label class="col-md-2 control-label">Attendance Type <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_name]', array('NONE'=>'NONE','DAILY'=>'DAILY','ONE-TIME'=>'ONE-TIME'), '', 'class="selectpicker form-control width-50" id="orginfo"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Print Certificate? <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[organizer_level]', array('---Please Select---','Y'=>'YES','N'=>'NO'), '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

    </div>

    
    <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
	$(document).ready(function(){	
		$('form').submit(function (e) { 
			e.preventDefault();
			var data = $('form').serialize();
			msg.wait('#alert');
			msg.wait('#alertFooter');
			
			$('.btn').attr('disabled', 'disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('saveCTS')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					//msg.show(res.msg, res.alert, '#alertFooter');
					
					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s8')?>';
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