<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record for Effectiveness Setup</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>
        <div class="form-group">
            <div class="col-md-9">
				<input name="form[type]" class="form-control" type="hidden" value="EFFECTIVENESS" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Order</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[order]" placeholder="Order (Number)" class="form-control" type="text" value="<?php echo $tas_desc->TAS_ORDERING?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>No. Portal</b></label>
            <div class="col-md-4">
				<input name="form[no_portal]" placeholder="No. Portal" class="form-control" type="text" value="<?php echo $tas_desc->TAS_NUMBERING?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>No. </b></label>
            <div class="col-md-4">
				<input name="form[no]" placeholder="Assessment Code" class="form-control" type="text" value="<?php echo $tas_code?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Description</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[description]" placeholder="Description" class="form-control" type="text" value="<?php echo $tas_desc->TAS_DESC?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Effectiveness Type</b> <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php echo form_dropdown('form[effectiveness_type]', array('OBJECTIVE'=>'OBJECTIVE','SUBJECTIVE'=>'SUBJECTIVE'), $tas_desc->TAS_ASSESSMENT_TYPE, 'class="selectpicker form-control width-50"')?>
			</div>
        </div>

		<div class="form-group">
			<label class="col-md-3 control-label"><b>Status </b><b><font color="red">* </font></b></label>
			<div class="col-md-4">
                <?php echo form_dropdown('form[status]', array('Y'=>'ACTIVE','N'=>'INACTIVE'), $tas_desc->TAS_STATUS, 'class="selectpicker form-control width-50"')?>
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
				url: '<?php echo $this->lib->class_url('updateTASEff')?>',
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