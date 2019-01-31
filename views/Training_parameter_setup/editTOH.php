<form class="form-horizontal" method="post">
	<div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record</h4>
    </div>
	<div>
		<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
	</div>
	<div id="alert"></div>
		<div class="modal-body">
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Code</b></label>
				<div class="col-md-9">
					<input name="form[code]" placeholder="Organizer Code" class="form-control" type="text" value="<?php echo $toh_code?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Description </b><b><font color="red">*</font></b></label>
				<div class="col-md-9">
					<input name="form[description]" placeholder="Organizer Description" class="form-control" type="text" value="<?php echo $toh_desc->TOH_ORG_DESC?>">
				</div>
			</div>
		    <div class="form-group">
				<label class="col-md-3 control-label"><b>Address </b></label>
				<div class="col-md-9">
					<textarea name="form[address]" placeholder="Address" class="form-control" type="text" rows="5"><?php echo $toh_desc->TOH_ADDRESS?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Postcode </b></label>
				<div class="col-md-3">
					<input name="form[postcode]" placeholder="Postcode" class="form-control" type="text" value="<?php echo $toh_desc->TOH_POSTCODE?>">
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>City </b></label>
				<div class="col-md-4">
					<input name="form[city]" placeholder="City" class="form-control" type="text" value="<?php echo $toh_desc->TOH_CITY?>"> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Country </b><b><font color="red">*</font></b></label>
				<div class="col-md-3">
					<?php
						echo form_dropdown('form[country]', $count_list, $toh_desc->TOH_COUNTRY, 'class="form-control width-50" id="countrySel"')
					?>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>State </b></label>
				<div class="col-md-4" id="state_list">
					<div id="faspinner"></div>
						<?php 
							echo form_dropdown('form[state]', $state_list, $toh_desc->TOH_STATE, 'class="form-control width-50" id="stateSel"') 
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
			
			$('.btn').attr('disabled', 'disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('updateTOH')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s13')?>';
						}, 1000);
					} else {
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

	$('#countrySel').change(function() {
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
				
				var resList = '<option value="" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.stateList) {
						resList += '<option value="'+res.stateList[i]['SM_STATE_CODE']+'">'+res.stateList[i]['SM_STATE_DESC']+'</option>';
                    }
                } 
				
				$("#stateSel").html(resList);				
			}
		});
	});	
</script>