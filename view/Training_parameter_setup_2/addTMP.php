<form class="form-horizontal" method="post">
	<div class="modal-header btn-primary">
        <h4 class="modal-title" id="myModalLabel">New Training Memo (Participant)</h4>
    </div>
	<div class="modal-body">
		<div>
			<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
		</div>
		<div id="alert"></div>
		<div class="form-group">
			<label class="col-md-3 control-label"><b>Module </b><b><font color="red">*</font></b></label>
			<div class="col-md-5">
				<?php echo form_dropdown('form[module]', array(''=>'---Please Select---','TRAINING_EFFECTIVENESS'=>'TRAINING EFFECTIVENESS','ASSIGN_TRAINING'=>'ASSIGN TRAINING','TRAINING_HELPDESK'=>'TRAINING HELPDESK','TRAINING_APPL_SECTOR'=>'TRAINING APPLICATION SECTOR'), '', 'class="selectpicker form-control width-50"')?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Address </b></label>
			<div class="col-md-8">
				<textarea name="form[address]" placeholder="Address" class="form-control" type="text" rows="5"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Link </b></label>
			<div class="col-md-6">
				<input name="form[link]" placeholder="Link" class="form-control" type="text">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Email </b></label>
			<div class="col-md-6">
				<input name="form[email]" placeholder="Email" class="form-control" type="text">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Tel. No. </b></label>
			<div class="col-md-6">
				<input name="form[tel_no]" placeholder="Telephone Number" class="form-control" type="text">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Fax No. </b></label>
			<div class="col-md-6">
				<input name="form[fax_no]" placeholder="Fax Number" class="form-control" type="text">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Send By </b><b><font color="red">*</font></b></label>
			<div class="col-md-8">
				<?php
					echo form_dropdown('form[send_by]', $staff_list, '', 'class="form-control width-50" id=""')
				?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Status </b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[status]', array(''=>'---Please Select---','Y'=>'ACTIVE','N'=>'INACTIVE'), '', 'class="selectpicker form-control width-50"')?>
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
				url: '<?php echo $this->lib->class_url('saveTMP')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s5')?>';
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
</script>