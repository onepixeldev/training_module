<form class="form-horizontal" method="post">
    <div class="modal-header btn-danger">
        <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
    </div>
    <div class="modal-body">
        <div id="alertDel"></div>
        <div>
        	Are you sure to delete this record? :<br>
			<b>Category :</b> <?php echo $tc_cat?><br>
            <b>Status :</b> <?php 
                    if ($tc_desc->TC_STATUS == 'Y') {
						$status = 'ACTIVE';
					} else if($tc_desc->TC_STATUS == 'N') {
						$status = 'INACTIVE';
					} else{
						$status = '';
                    } 
                    
                    echo $status
                    ?><br>
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
				url: '<?php echo $this->lib->class_url('deleteTC')?>',
				data: {categoryTC: '<?php echo $tc_cat ?>'},
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alertDel');
					
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
					msg.danger('Please contact administrator.', '#alertDel');
				}
			});
		});	

	});  	  
</script>

