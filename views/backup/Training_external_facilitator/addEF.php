<form class="well form-horizontal" method="post">
	<div class="modal-header btn-primary">
        <h4 class="modal-title" id="myModalLabel">New External Facilitator</h4>
    </div>
	<div>
		<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
	</div>
	<div id="alert"></div>
	<h5 class="panel-heading bg-success txt-color-black"><b>Details</b></h5>
		<br>
		<div class="form-group">
				<label class="col-md-3 control-label font-weight-bold"><b>Status </b><b><font color="red">* </font></b></label>
				<div class="col-md-3">
					<select class="selectpicker form-control" name="form[status]">
						<option value="" selected > ---Please select--- </option>
						<option class="text-primary">ENTRY</option>
						<option class="text-success">APPROVE</option>
						<option class="text-danger">NOT APPROVE</option>
						<option>KIV</option>
					</select>
				</div>
			<!--/div>	
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>IC No. </b></label>
				<div class="col-md-4">
					<input name="form[ic_no]" placeholder="Identification card number" class="form-control" type="text">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Name </b><b><font color="red">* </font></b></label>
				<div class="col-md-9">
					<input name="form[name]" placeholder="Name" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Department </b></label>
				<div class="col-md-3">
					<input name="form[deptEF]" placeholder="Department" class="form-control" type="text">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Organization </b></label>
				<div class="col-md-4">
					<input name="form[orEF]" placeholder="Organization" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Position </b></label>
				<div class="col-md-3">
					<input name="form[posEF]" placeholder="Position" class="form-control" type="text">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Office Tel No. </b></label>
				<div class="col-md-4">
					<input name="form[offTelEF]" placeholder="Office telephone number" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>H/P No. </b></label>
				<div class="col-md-3">
					<input name="form[mobileEF]" placeholder="Mobile phone number" class="form-control" type="text">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Email </b></label>
				<div class="col-md-4">
					<input name="form[emailEF]" placeholder="Email address" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Area 1 </b></label>
				<div class="col-md-9">
					<input name="form[area1]" placeholder="Area 1" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Area 2 </b></label>
				<div class="col-md-9">
					<input name="form[area2]" placeholder="Area 2" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Area 3 </b></label>
				<div class="col-md-9">
					<input name="form[area3]" placeholder="Area 3" class="form-control" type="text">
				</div>
			</div>
		</div>
		<h5 class="panel-heading bg-success txt-color-black"><b>Address</b></h5>
		<div class="form-group">
				<label class="col-md-3 control-label"><b>Address </b></label>
				<div class="col-md-9">
					<textarea name="form[addressEF]" placeholder="Address" class="form-control" type="text" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Postcode </b></label>
				<div class="col-md-3">
					<input name="form[postcodeEF]" placeholder="Postcode" class="form-control" type="text">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>City </b></label>
				<div class="col-md-4">
					<input name="form[cityEF]" placeholder="City" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Country </b></label>
				<div class="col-md-3">
					<?php
						echo form_dropdown('form[country]', $count_list, $count_code, 'class="form-control width-50" id="countryEF"')
					?>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>State </b></label>
				<div class="col-md-4" id="state_list">
					<div id="faspinner"></div>
						<?php 
							echo form_dropdown('form[state]', $state_list, '', 'class="form-control width-50" id="stateEF"') 
						?>
				</div>
			</div>
		</div>
		<div id="alertWarning"></div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
			<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Add Record</button>
		</div>
</form>

<script>
	$(document).ready(function(){	
		$('form').submit(function (e) { 
			e.preventDefault();
			var data = $('form').serialize();	
			msg.wait('#alert');
			
			$('.btn').attr('disabled', 'disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('saveEF')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('view')?>';
						}, 1000);
					} else {
						$('.btn').removeAttr('disabled');
					}
				},
				error: function() {
					$('.btn').removeAttr('disabled');
					msg.danger('Please contact administrator.', '#alert');
					msg.show(res.msg, 'Please contact administrator.', '#alertWarning');
				}
			});			
		});  				

	});

	$('#countryEF').change(function() {
		var countCode = $(this).val();
		$('#faspinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#stateES').html('');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('stateList')?>',
			data: {'countryCode' : countCode},
			dataType: 'json',
			success: function(res) {
				$('#faspinner').html('');
                //$('#upsiJoinDate').val('');
				
				var resList = '<option value="" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.stateList) {
						resList += '<option value="'+res.stateList[i]['SM_STATE_CODE']+'">'+res.stateList[i]['SM_STATE_DESC']+'</option>';
                        //$("#lsStaffID").append("<option value='" + res.staffList[i]['STAFF_ID'] + "'>" + res.staffList[i]['STAFF_NAME'] + "</option>";
                    }
                } 
				
				$("#stateEF").html(resList);				
			}
		});
	});	
</script>