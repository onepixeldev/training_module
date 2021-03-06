<form class="form-horizontal" method="post">
    <div class="modal-header btn-danger">
        <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
    </div>
    <div class="modal-body">
        <div id="alertDel"></div>
        <div>
        	Are you sure to delete this record? :<br>
			<b>Code :</b> <?php echo $tsecl_code?><br>
        	<b>Sector Level :</b> <?php echo $tsecl_desc->TSL_DESC?><br>
            <b>Status :</b> <?php 
                    if ($tsecl_desc->TSL_STATUS == 'Y') {
                        $tslStatus = 'ACTIVE';
                    } elseif ($tsecl_desc->TSL_STATUS == 'N') {
                        $tslStatus = 'INACTIVE';
                    } else {
                        $tslStatus = '---Please select---';
                    }
                    echo $tslStatus?>
            <br>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-minus-square"></i> No</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-check-square-o"></i> Yes</button>
    </div>
</form>

<script>
	$(document).ready(function(){	
		$('form').submit(function (e) {
			e.preventDefault();
			msg.wait('#alertDel');
			$('.btn').attr('disabled', 'disabled');
			
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('deleteTSECL')?>',
				data: {codeTSECL: '<?php echo $tsecl_code ?>'},
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alertDel');
					
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
					msg.danger('Please contact administrator.', '#alertDel');
				}
			});
		});	

	});  	  
</script>

