<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Code</b></label>
            <div class="col-md-8">
				<input name="form[code]" class="form-control" type="text" value="<?php echo $tfs_code?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Description</b> <b><font color="red">* </font></b></label>
            <div class="col-md-8">
				<input name="form[description]" placeholder="Fee Description" class="form-control" type="text" value="<?php echo $tfs_desc->TFS_DESC?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Minimum Range (RM)</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[minimum_range]" placeholder="Minimum fee range" class="form-control" type="text" value="<?php echo number_format($tfs_desc->TFS_AMOUNT_FROM,2)?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>Maximum Range (RM)</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[maximum_range]" placeholder="Maximum fee range" class="form-control" type="text" value="<?php echo number_format($tfs_desc->TFS_AMOUNT_TO,2)?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"><b>DCR Approve </b></label>
            <div class="col-md-9">
                <?php
                    echo form_dropdown('form[dcr_approve]', $dept_list, $tfs_desc->TFS_DCR_APPROVE, 'class="form-control width-50"')
                ?>
            </div>
        </div>

		<div class="form-group">
            <label class="col-md-3 control-label"><b>Registrar Approve </b></label>
            <div class="col-md-9">
                <?php
                    echo form_dropdown('form[registrar_approve]', $dept_list, $tfs_desc->TFS_REGISTRAR_APPROVE, 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
			<label class="col-md-3 control-label"><b>MPE Approve? </b><b><font color="red">* </font></b></label>
			<div class="col-md-4">
                <?php echo form_dropdown('form[mpe_approve]', array(''=>'---Please Select---','Y'=>'YES','N'=>'NO'), $tfs_desc->TFS_MPE_APPROVE, 'class="selectpicker form-control width-50"')?>
			</div>
		</div>

        <div class="form-group">
			<label class="col-md-3 control-label"><b>Status </b><b><font color="red">* </font></b></label>
			<div class="col-md-4">
                <?php echo form_dropdown('form[status]', array(''=>'---Please Select---','Y'=>'ACTIVE','N'=>'INACTIVE'), $tfs_desc->TFS_STATUS, 'class="selectpicker form-control width-50"')?>
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
				url: '<?php echo $this->lib->class_url('updateTFS')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s8')?>';
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