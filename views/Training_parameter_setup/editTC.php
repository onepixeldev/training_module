<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>
        <div class="form-group">
            <label class="col-md-3 control-label"><b>Category</b></label>
            <div class="col-md-9">
				<input name="form[category]" placeholder="Training category name" class="form-control" type="text" value="<?php echo $tc_cat?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label font-weight-bold"><b>Confirmation</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[confirmation]', array('Y'=>'YES','N'=>'NO'), $tc_desc->TC_CONFIRMATION, 'class="selectpicker form-control width-50"')?>
			</div>
        </div>
		<div class="form-group">
			<label class="col-xs-3 control-label font-weight-bold"><b>Element</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[element]', array('UTAMA'=>'UTAMA','TAMBAHAN'=>'TAMBAHAN'), $tc_desc->TC_ELEMENT, 'class="selectpicker form-control width-50"')?>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-3 control-label font-weight-bold"><b>Structured</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[structured]', array('Y'=>'YES','N'=>'NO'), $tc_desc->TC_STRUCTURED, 'class="selectpicker form-control width-50"')?>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-3 control-label font-weight-bold"><b>Sort By</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<input name="form[sort_by]" placeholder="Sort priority (number)" class="form-control" type="text" value="<?php 
                    echo $tc_desc->TC_RANKING?>">
            </div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label font-weight-bold"><b>Status</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<?php echo form_dropdown('form[status]', array('Y'=>'ACTIVE','N'=>'INACTIVE'), $tc_desc->TC_STATUS, 'class="selectpicker form-control width-50"')?>
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
				url: '<?php echo $this->lib->class_url('updateTC')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s2')?>';
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