<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Facilitator Info</h4>
<br>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_nt"><i class="fa fa-plus"></i> Add New Facilitator</button>
</div>
<br>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_fi">
		<thead>
		<tr>
            <th class="text-center">Reference ID</th>
            <th class="text-center">Type</th>
			<th class="text-left">Facilitator</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($facilitatorInfoExternal)) {
				foreach ($facilitatorInfoExternal as $fie) {
					echo '
                    <tr>
                        <td class="text-center col-md-2">' . $refid .'</td>
						<td class="text-center col-md-1">' . $fie->TF_TYPE . '</td>
						<td class="text-left">' . $fie->EF_FACILITATOR_NAME . '</td>
                        <td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_training_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_training_btn"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			}
			if (!empty($facilitatorInfoStaff)) {
				foreach ($facilitatorInfoStaff as $fis) {
					echo '
                    <tr>
                        <td class="text-center col-md-2">' . $refid .'</td>
						<td class="text-center col-md-1">' . $fis->TF_TYPE . '</td>
						<td class="text-left">' . $fis->SM_STAFF_NAME . '</td>
                        <td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_training_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_training_btn"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			} 
			if (empty($facilitatorInfoExternal) && empty($facilitatorInfoStaff)) {
				echo '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>

<script>
	//var dt_obj = '';
	//var dt_obj2 = '';

	// DELETE page - category setup
	$('.delete_tac').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTAC')?>',
				data: {'codeTAC' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page - category setup
	$('.edit_tac').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTAC')?>',
				data: {'codeTAC' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});	
</script>