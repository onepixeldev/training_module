<form class="well form-horizontal" method="post">
	<div class="modal-header btn-primary">
        <h4 class="modal-title" id="myModalLabel">New External Speaker</h4>
    </div>
	<div>
		<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
	</div>
		<br>
		<div class="form-group">
				<label class="col-md-3 control-label font-weight-bold"><b>Status </b><b><font color="red">* </font></b></label>
				<div class="col-md-3">
					<select class="selectpicker form-control" name="form[status]">
						<option value="" selected > ---Please select--- </option>
						<option class="text-success">ACTIVE</option>
						<option class="text-danger">INACTIVE</option>
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
				<label class="col-md-3 control-label"><b>Organization </b></label>
				<div class="col-md-3">
					<input name="form[orES]" placeholder="Organization" class="form-control" type="text">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Position </b></label>
				<div class="col-md-4">
					<input name="form[posES]" placeholder="Position" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Office Tel No. </b></label>
				<div class="col-md-3">
					<input name="form[offTelES]" placeholder="Office telephone number" class="form-control" type="text">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>HP No. </b></label>
				<div class="col-md-4">
					<input name="form[mobileES]" placeholder="Mobile phone number" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Address </b></label>
				<div class="col-md-9">
					<textarea name="form[addressES]" placeholder="Address" class="form-control" type="text" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Postcode </b></label>
				<div class="col-md-3">
					<input name="form[postcodeES]" placeholder="Postcode" class="form-control" type="text">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>City </b></label>
				<div class="col-md-4">
					<input name="form[cityES]" placeholder="City" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Country </b></label>
				<div class="col-md-3">
					<?php
						echo form_dropdown('form[country_es]', $count_list, $count_code, 'class="form-control width-50" id="countryES"')
					?>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>State </b></label>
				<div class="col-md-4" id="state_list">
					<div id="faspinner"></div>
						<?php 
							echo form_dropdown('form[state_es]', $state_list, '', 'class="form-control width-50" id="stateES"') 
						?>
				</div>
			</div>
		</div>
		<div id="alertWarning"></div>
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
			
			$('.btn').attr('disabled', 'disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('saveES')?>',
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

	// FILTER state by country
	/*$("#countryES").change(function () {
		var countryCode = $(this).val();

		// clear all fields
		$('#alert').html('<b>Note : </b> ( <b><font color=\"red\">*</font></b> ) <b><font color=\"red\">compulsory fields</font></b><br>&nbsp; <span id=\"note\"></span>');
		$('#stateES').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></center>');
					
		$.get("refreshCountryList", {currentCC: countryCode}, function (data) {
			var res = "<option value=\"\" selected > ---Please select--- </option>";
			
			var myObj = JSON.parse(data);

			for (var idx = 0; idx < myObj.length; idx++) {
				res += "<option value='" + myObj[idx].SM_STATE_CODE + "'>" + myObj[idx].SM_STATE_DESC + "</option>";
			}

			$("#stateES").html('');
			$("#stateES").html(res);
		});
	});*/

	$('#countryES').change(function() {
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
				
				$("#stateES").html(resList);				
			}
		});
	});	
</script>