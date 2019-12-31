<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tas">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Attendance Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($training_attendance_status_list)) {
				foreach ($training_attendance_status_list as $tas) {
                    
					echo '
					<tr>
						<td class="text-center col-md-1">' . $tas->TAS_CODE . '</td>
						<td class="text-left">' . $tas->TAS_DESC . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_tas" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tas" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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
	$('.delete_tas').click(function () {
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
				url: '<?php echo $this->lib->class_url('delTAS')?>',
				data: {'tasCode' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tas').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTAS')?>',
				data: {'tasCode' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>