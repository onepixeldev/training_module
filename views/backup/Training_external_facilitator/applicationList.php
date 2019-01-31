<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_appl">
		<thead>
		<tr>
			<th class="col-sm-4 text-center" style="display: none">ID</th>
			<th class="text-canter">No</th>
			<th class="text-left">Name</th>
			<th class="text-center">Department</th>
			<th class="text-center">Organization</th>
			<th class="text-center">Position</th>
			<th class="text-center">Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 1;
			if (!empty($external_facilitator_list)) {
				foreach ($external_facilitator_list as $efl) {
					echo '
					<tr>
						<td style="display: none">'.$efl->EF_FACILITATOR_ID.'</td>
						<td class="text-center">' . $no . '</td>
						<td class="text-left">' . $efl->EF_FACILITATOR_NAME . '</td>
						<td class="text-left col-md-2">' . $efl->EF_DEPARTMENT . '</td>
						<td class="text-center col-md-2">' . $efl->EF_ORGANIZATION . '</td>
						<td class="text-center col-md-2">' . $efl->EF_POSITION . '</td>
						<td class="text-center col-md-1">' . $efl->EF_STATUS . '</td>
						<td class="text-center">
							<button type="button" class="btn btn-info btn-xs detail_ef_btn"><i class="fa fa-search"></i></button>
							<button type="button" class="btn btn-success btn-xs edit_ef_btn"><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-xs delete_ef_btn"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					';
					$no++;
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
	// CALL ES DETAIL MODAL
	$('.detail_ef_btn').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		//$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:lightblue"></i></center>');

		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('efDetail')?>',
				data: {'efID' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// DELETE page
	$('.delete_ef_btn').click(function () {
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
				url: '<?php echo $this->lib->class_url('delEF')?>',
				data: {'efID' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_ef_btn').click(function () {
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
				url: '<?php echo $this->lib->class_url('editEF')?>',
				data: {'efID' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>