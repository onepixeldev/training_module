<form class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title" id="myModalLabel">Add New Training Category</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>
        <div class="form-group">
            <label class="col-md-3 control-label"><b>Category</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[category]" placeholder="Training category name" class="form-control" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label font-weight-bold"><b>Confirmation</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[confirmation]">
					<option value="" selected > ---Please select--- </option>
					<option class="text-primary" value="Y">YES</option>
					<option class="text-success" value="N">NO</option>
				</select>
			</div>
        </div>
		<div class="form-group">
			<label class="col-xs-3 control-label font-weight-bold"><b>Element</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[element]">
					<option value="" selected > ---Please select--- </option>
					<option class="text-primary" value="UTAMA">UTAMA</option>
					<option class="text-success" value="TAMBAHAN">TAMBAHAN</option>
				</select>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-3 control-label font-weight-bold"><b>Structured</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[structured]">
					<option value="" selected > ---Please select--- </option>
					<option class="text-primary" value="Y">YES</option>
					<option class="text-success" value="N">NO</option>
				</select>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-3 control-label font-weight-bold"><b>Sort By</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<input name="form[sort_by]" placeholder="Sort priority(number)" class="form-control" type="text">
            </div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label font-weight-bold"><b>Status</b> <b><font color="red">*</font></b></label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[status]">
					<option value="" selected > ---Please select--- </option>
					<option class="text-primary" value="Y">ACTIVE</option>
					<option class="text-success" value="N">INACTIVE</option>
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
			msg.wait('#alertFooter');
			
			$('.btn').attr('disabled', 'disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('saveTC')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					//msg.show(res.msg, res.alert, '#alertFooter');
					
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
					//msg.danger('Please contact administrator.', '#alertFooter');
				}
			});	
		});  				

	});  	  
</script>