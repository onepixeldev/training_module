<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tl">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Training Level</th>
			<th class="text-center">Training Level (English)</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($training_level_list)) {
				foreach ($training_level_list as $tl) {
					echo '
					<tr>
						<td class="text-center col-md-1">' . $tl->TL_CODE . '</td>
						<td class="text-center">' . $tl->TL_DESC . '</td>
						<td class="text-center">' . $tl->TL_DESC_ENG . '</td>
						<td class="text-center col-md-1">
							<button type="button" class="btn btn-success btn-xs edit_tl" title="Edit Record"><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-xs delete_tl" title="Delete Record"><i class="fa fa-trash"></i></button>
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
	$('.delete_tl').click(function () {
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
				url: '<?php echo $this->lib->class_url('delTL')?>',
				data: {'codeTL' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tl').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTL')?>',
				data: {'codeTL' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>