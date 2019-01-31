<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_egs">
		<thead>
		<tr>
			<th class="text-center">Mark</th>
			<th class="text-center">Description</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($eff_gra_se)) {
				foreach ($eff_gra_se as $egs) {
					echo '
					<tr>
						<td class="text-center col-md-1">' . $egs->TAG_GRADE_CODE . '</td>
						<td class="text-left">' . $egs->TAG_GRADE_DESC . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_egs" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_egs" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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

	// DELETE page
	$('.delete_egs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var egsCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (egsCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delEGS')?>',
				data: {'egsCode' : egsCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_egs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var egsCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (egsCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editEGS')?>',
				data: {'egsCode' : egsCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>