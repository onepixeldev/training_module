<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>
        <div class="form-group">
            <label class="col-md-3 control-label"><b>Code</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[code]" placeholder="Training type code" class="form-control" type="text" value="<?php echo $tt_code?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"><b>Training Type</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[training_type]" placeholder="Training type name" class="form-control" type="text" value="<?php echo $tt_desc->TT_DESC?>">
            </div>
        </div>
		<div class="form-group">
			<label class="col-md-3 control-label font-weight-bold">Counted </label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[counted]">
                    <option value="<?php echo $tt_desc->TT_COUNTED?>" selected > <?php 
                    if ($tt_desc->TT_COUNTED == 'Y') {
						$counted = 'YES';
					} else if($tt_desc->TT_COUNTED == 'N') {
						$counted = 'NO';
					} else{
						$counted = '---Please select---';
                    } 
                    
                    echo $counted?> </option>
					<option class="text-primary" value="Y">YES</option>
					<option class="text-success" value="N">NO</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label font-weight-bold">Training Evaluation </label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[training_evaluation]">
                    <option value="<?php echo $tt_desc->TT_EVALUATION?>" selected > <?php 
                    if ($tt_desc->TT_EVALUATION == 'Y') {
						$evaluation = 'YES';
					} else if($tt_desc->TT_EVALUATION == 'N') {
						$evaluation = 'NO';
					} else{
						$evaluation = '---Please select---';
                    } 
                    
                    echo $evaluation?> </option>
					<option class="text-primary" value="Y">YES</option>
					<option class="text-success" value="N">NO</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label font-weight-bold">Confirmation </label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[confirmation]">
                    <option value="<?php echo $tt_desc->TT_CONFIRMATION?>" selected > <?php 
                    if ($tt_desc->TT_CONFIRMATION == 'Y') {
						$confirmation = 'YES';
					} else if($tt_desc->TT_CONFIRMATION == 'N') {
						$confirmation = 'NO';
					} else{
						$confirmation = '---Please select---';
                    } 
                    
                    echo $confirmation?> </option>
					<option class="text-primary" value="Y">YES</option>
					<option class="text-success" value="N">NO</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label font-weight-bold">Service Book </label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[service_book]">
                    <option value="<?php echo $tt_desc->TT_SERVICE_BOOK?>" selected > <?php 
                    if ($tt_desc->TT_SERVICE_BOOK == 'Y') {
						$svcBook = 'YES';
					} else if($tt_desc->TT_SERVICE_BOOK == 'N') {
						$svcBook = 'NO';
					} else{
						$svcBook = '---Please select---';
                    } 
                    
                    echo $svcBook?> </option>
					<option class="text-primary" value="Y">YES</option>
					<option class="text-success" value="N">NO</option>
				</select>
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
				url: '<?php echo $this->lib->class_url('updateTT')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

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
					msg.danger('Please contact administrator.', '#alertWarning');
				}
			});			
		});  				

	});
</script>