<form class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title" id="myModalLabel">Add New Effectiveness Setup</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Order</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[order]" placeholder="Order (Number)" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>No. Portal</b></label>
            <div class="col-md-4">
				<input name="form[no_portal]" placeholder="No. Portal" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>No. </b> <b><font color="red">* </font></b></label>
            <div class="col-md-4">
				<input name="form[no]" placeholder="Assessment Code" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Description</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[description]" placeholder="Description" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Effectiveness Type</b> <b><font color="red">* </font></b></label>
            <div class="col-md-4">
				<select class="selectpicker form-control" name="form[effectiveness_type]">
					<option value="" selected > ---Please select--- </option>
					<option class="text-primary" value="OBJECTIVE">OBJECTIVE</option>
					<option class="text-success" value="SUBJECTIVE">SUBJECTIVE</option>
				</select>
			</div>
        </div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Status </b><b><font color="red">* </font></b></label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[status]">
					<option value="" selected > ---Please select--- </option>
					<option class="text-primary" value="Y">ACTIVE</option>
					<option class="text-success" value="N">INACTIVE</option>
				</select>
			</div>
		</div>

        <div class="form-group">
            <div class="col-md-9">
				<input name="form[type]" class="form-control" type="hidden" value="EFFECTIVENESS" readonly>
            </div>
            <div class="col-md-9">
				<input name="form[tas_title]" class="form-control" type="hidden" value="<?php echo $code_tet?>" readonly>
            </div>
            <div class="col-md-9">
				<input name="form[tas_category]" class="form-control" type="hidden" value="<?php echo $code_tac?>" readonly>
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
				url: '<?php echo $this->lib->class_url('saveTASEff2')?>',
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