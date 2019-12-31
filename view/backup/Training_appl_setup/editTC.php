<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="alert">
        	<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    	</div>
        <div class="form-group">
            <label class="col-md-3 control-label"><b>Category</b> <b><font color="red">* </font></b></label>
            <div class="col-md-9">
				<input name="form[category]" placeholder="Training category name" class="form-control" type="text" value="<?php echo $tc_cat?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label font-weight-bold">Confirmation </label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[confirmation]">
                    <option value="<?php echo $tc_desc->TC_CONFIRMATION?>" selected > <?php 
                    if ($tc_desc->TC_CONFIRMATION == 'Y') {
						$confirmation = 'YES';
					} else if($tc_desc->TC_CONFIRMATION == 'N') {
						$confirmation = 'NO';
					} else{
						$confirmation = '---Please select---';
                    } 
                    
                    echo $confirmation;?> </option>
					<option class="text-primary" value="Y">YES</option>
					<option class="text-success" value="N">NO</option>
				</select>
			</div>
        </div>
		<div class="form-group">
			<label class="col-xs-3 control-label font-weight-bold">Element </label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[element]">
                    <option value="<?php 
                    echo $tc_desc->TC_ELEMENT?>" selected > <?php 
                    if (!empty($tc_desc->TC_ELEMENT)) {
                        echo $tc_desc->TC_ELEMENT;
                    } else {
                        echo '---Please select---';
                    }
                    ?> </option>
					<option class="text-primary" value="UTAMA">UTAMA</option>
					<option class="text-success" value="TAMBAHAN">TAMBAHAN</option>
				</select>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-3 control-label font-weight-bold">Structured </label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[structured]">
                    <option value="<?php 
                    echo $tc_desc->TC_STRUCTURED?>" selected > <?php 
                    if ($tc_desc->TC_STRUCTURED == 'Y') {
						$structured = 'YES';
					} else if($tc_desc->TC_STRUCTURED == 'N') {
						$structured = 'NO';
					} else{
						$structured = '---Please select---';
                    } 
                    
                    echo $structured?> </option>
					<option class="text-primary" value="Y">YES</option>
					<option class="text-success" value="N">NO</option>
				</select>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-3 control-label font-weight-bold">Sort By </label>
			<div class="col-md-4">
				<input name="form[sort_by]" placeholder="Sort priority (number)" class="form-control" type="text" value="<?php 
                    echo $tc_desc->TC_RANKING?>">
            </div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label font-weight-bold">Status </label>
			<div class="col-md-4">
				<select class="selectpicker form-control" name="form[status]">
                    <option value="<?php 
                    echo $tc_desc->TC_STATUS?>" selected > <?php 
                    if ($tc_desc->TC_STATUS == 'Y') {
						$status = 'ACTIVE';
					} else if($tc_desc->TC_STATUS == 'N') {
						$status = 'INACTIVE';
					} else{
						$status = '---Please select---';
                    } 
                    
                    echo $status?> </option>
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