<form class="form-horizontal" method="post">
	<div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Update External Speaker Record</h4>
    </div>
	<div id="alert">
		<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
	</div>
		<br>
		<div class="form-group">
				<div class="col-md-9">
					<input name="form[IDes]" placeholder="Name" class="form-control" type="hidden" value="<?php echo $es_id?>" readonly>
				</div>
			</div>
		<div class="form-group">
				<label class="col-md-2 control-label"><b>Status</b> <b><font color="red">* </font></b></label>
				<div class="col-md-3">
					<?php echo form_dropdown('form[status]', array('ACTIVE'=>'ACTIVE','INACTIVE'=>'INACTIVE'), $es_desc->ES_STATUS, 'class="selectpicker form-control width-50"')?>
				</div>
			<!--/div>	
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>IC No.</b> </label>
				<div class="col-md-4">
					<input name="form[ic_no]" placeholder="Identification card number" class="form-control" type="text" value="<?php echo $es_desc->ES_IC_NO?>">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Name</b> <b><font color="red">* </font></b></label>
				<div class="col-md-9">
					<input name="form[name]" placeholder="Name" class="form-control" value="<?php echo $es_desc->ES_SPEAKER_NAME?>" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Organization</b> <b><font color="red">* </font></b></label>
				<div class="col-md-3">
					<input name="form[organization]" placeholder="Organization" class="form-control" type="text" value="<?php echo $es_desc->ES_DEPT?>">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Position</b> </label>
				<div class="col-md-4">
					<input name="form[posES]" placeholder="Position" class="form-control" type="text" value="<?php echo $es_desc->ES_POSITION?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Office Tel No.</b> </label>
				<div class="col-md-3">
					<input name="form[offTelES]" placeholder="Office telephone number" class="form-control" type="text" value="<?php echo $es_desc->ES_TELNO_WORK?>">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>HP No.</b> <b><font color="red">* </font></b></label>
				<div class="col-md-4">
					<input name="form[hp_no]" placeholder="Mobile phone number" class="form-control" type="text" value="<?php echo $es_desc->ES_HANDPHONE?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Address</b> </label>
				<div class="col-md-9">
					<textarea name="form[addressES]" placeholder="Address" class="form-control" type="text" rows="5" value="<?php echo $es_desc->ES_ADDRESS?>"><?php echo $es_desc->ES_ADDRESS?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Postcode</b> </label>
				<div class="col-md-3">
					<input name="form[postcodeES]" placeholder="Postcode" class="form-control" type="text" value="<?php echo $es_desc->ES_PCODE?>">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>City</b> </label>
				<div class="col-md-4">
					<input name="form[cityES]" placeholder="City" class="form-control" type="text" value="<?php echo $es_desc->ES_CITY?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Country</b> </label>
				<div class="col-md-3">
					<?php
						echo form_dropdown('form[country_es]', $count_list, $es_desc->ES_COUNTRY, 'class="form-control width-50" id="countryES"')
					?>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>State</b> </label>
				<div class="col-md-4">
					<div id="faspinner"></div>
						<?php
							echo form_dropdown('form[state_es]', $state_list, $es_desc->ES_STATE, 'class="form-control width-50" id="stateES"') 
						?>
				</div>
			</div>
		</div>
		<div id="alertWarning"></div>					
		<div class="modal-footer">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
			<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
		</div>
</form>

<script>
	$(document).ready(function(){	
		$('form').submit(function (e) { 
			e.preventDefault();
			var data = $('form').serializeArray();
			data.push({name: 'IDes', value: '<?php echo $es_id?>'});
			msg.wait('#alert');
			
			$('.btn').attr('disabled', 'disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('updateES')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, 'warning', '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('ATF120')?>';
						}, 1000);
					} else {
						msg.show(res.msg, res.alert, '#alert');
						msg.show(res.msg, 'warning', '#alertWarning');

						$('.btn').removeAttr('disabled');
					}
				},
				error: function() {
					$('.btn').removeAttr('disabled');
					msg.danger('Please contact administrator.', '#alert');
					msg.danger('Please contact administrator.', '#alertWarning');
				}
			});			
		});  				

	}); 

	// Filter state based on country
	$('#countryES').change(function() {
		var countCode = $(this).val();
		$('#faspinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		//$('#stateES').html('');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('stateList')?>',
			data: {'countryCode' : countCode},
			dataType: 'json',
			success: function(res) {
				$('#faspinner').html('');
				
				var resList = '<option value=\"\" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.stateList) {
						resList += '<option value="'+res.stateList[i]['SM_STATE_CODE']+'">'+res.stateList[i]['SM_STATE_DESC']+'</option>';
                        //$("#stateES").append("<option value='" + res.stateList[i]['SM_STATE_CODE'] + "'>" + res.stateList[i]['SM_STATE_DESC'] + "</option>";
                    }
                } 
				
				$("#stateES").html(resList);				
			}
		});
	});	
</script>