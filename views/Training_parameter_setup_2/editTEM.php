<form class="form-horizontal" method="post">
	<div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Update Record</h4>
    </div>
	<div class="modal-body">
		<div>
			<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
		</div>
		<div id="alert"></div>
			<div class="form-group">
				<div class="form-group">
					<label class="col-md-3 control-label"><b>Code </b></label>
					<div class="col-md-4">
						<input name="form[code]" class="form-control" type="text" value="<?php echo $tem_desc->TEM_CODE?>" readonly>
					</div>
				</div>

                <div class="form-group">
					<label class="col-md-3 control-label"><b>Module </b></label>
					<div class="col-md-4">
						<input name="form[module]" class="form-control" type="text" value="<?php echo $tem_desc->TEM_MODULE?>" readonly>
					</div>
				</div>

                <div class="form-group">
					<label class="col-md-3 control-label"><b>Title </b></label>
					<div class="col-md-8">
						<input name="form[title]" placeholder="Title" class="form-control" type="text" value="<?php echo $tem_desc->TEM_TITLE?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><b>Content </b><b><font color="red">*</font></b><b><font color="blue">*</font></b></label>
					<div class="col-md-8">
                        <textarea name="form[content]" placeholder="Content" class="form-control" type="text" cols="45" rows="20"><?php echo $tem_desc->TEM_CONTENT?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><b>Send By </b><b><font color="red">*</font></b></label>
					<div class="col-md-8">
						<?php
							echo form_dropdown('form[send_by]', $staff_list, $tem_desc->TEM_SEND_BY, 'class="form-control width-50" id=""')
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><b>Status </b></label>
					<div class="col-md-4">
						<?php echo form_dropdown('form[status]', array('Y'=>'ACTIVE','N'=>'INACTIVE'), $tem_desc->TEM_STATUS, 'class="selectpicker form-control width-50"')?>
					</div>
				</div>

			</div>
            <div id="alertWarning"></div>
            <div>
                <b><font color="blue">*</font></b> <b><font color="blue">Do not change</font></b><br>
                Nama : nn<br>
                Kursus : xxxxxx<br>
                Tarikh : ddmmyyyy<br>
                Tempat : kkkkkk<br>
                Link url : FFFFFF<br>
                Ayat standard (-- system generated memo --) : MMMMMM<br>
                <b> </b>
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
				url: '<?php echo $this->lib->class_url('updateTEM')?>',
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
					msg.danger('Please contact administrator.', '#alertWarning');
				}
			});			
		});  				

	});
</script>