<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>
        <div class="form-group">
            <label class="col-md-4 control-label"><b>Code</b></label>
            <div class="col-md-8">
				<input name="form[code]" class="form-control" type="text" value="<?php echo $tpr_code?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"><b>Participant Role</b> <b><font color="red">* </font></b></label>
            <div class="col-md-8">
				<input name="form[participant_role]" placeholder="Participant role description" class="form-control" type="text" value="<?php echo $tpr_desc->TPR_DESC?>">
            </div>
        </div>
        <div class="form-group">
			<label class="col-md-4 control-label"><b>Sort Order</b> <b><font color="red">* </font></b></label>
			<div class="col-md-3">
				<input name="form[sort_order]" placeholder="Sort by (number)" class="form-control" type="text" value="<?php echo $tpr_desc->TPR_ORDER_BY?>">
            </div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label font-weight-bold"><b>CPD Counted (NON-ACADEMIC)</b> <b><font color="red">* </font></b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[cpd_counted_non_academic]', array('Y'=>'YES','N'=>'NO'), $tpr_desc->TPR_CPD_COUNTED_NACAD, 'class="selectpicker form-control width-50"')?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label font-weight-bold"><b>CPD Counted (ACADEMIC)</b> <b><font color="red">* </font></b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[cpd_counted_academic]', array('Y'=>'YES','N'=>'NO'), $tpr_desc->TPR_CPD_COUNTED_ACAD, 'class="selectpicker form-control width-50"')?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label font-weight-bold"><b>Display Training</b> <b><font color="red">* </font></b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[display_training]', array('Y'=>'YES','N'=>'NO'), $tpr_desc->TPR_DISPLAY_TRAINING, 'class="selectpicker form-control width-50"')?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label font-weight-bold"><b>Display Conference</b> <b><font color="red">* </font></b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[display_conference]', array('Y'=>'YES','N'=>'NO'), $tpr_desc->TPR_DISPLAY_CONFERENCE, 'class="selectpicker form-control width-50"')?>
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
				url: '<?php echo $this->lib->class_url('updateTPR')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s6')?>';
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
</script>