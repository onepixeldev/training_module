<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_nt"><i class="fa fa-plus"></i> Add New Training</button>
</div>
<br>
<div class="well">
	<div class="row">
	<div id="target_group_spinner"></div>
		<table class="table table-bordered table-hover" id="tbl_list_ti">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
			<th class="text-left">Training</th>
			<th class="text-center col-md-5">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($trainingInfo)) {
				foreach ($trainingInfo as $ti) {
					echo '
                    <tr>
						<td class="text-center col-md-2">' . $ti->TH_REF_ID . '</td>
                        <td class="text-left">' . $ti->TH_TRAINING_TITLE . '</td>
                        <td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_training_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_training_btn"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			} else {
				echo '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>

<script>

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