<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tc">
		<thead>
		<tr>
			<th class="text-center">Category</th>
			<th class="text-center">Confirmation</th>
			<th class="text-center">Element</th>
			<th class="text-center">Structured</th>
			<th class="text-center">Sort By</th>
			<th class="text-center">Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			//$no = 0;
			if (!empty($training_category_list)) {
				foreach ($training_category_list as $tc) {

					if ($tc->TC_STATUS == 'Y') {
						$status = 'ACTIVE';
					} else if($tc->TC_STATUS == 'N') {
						$status = 'INACTIVE';
					} else{
						$status = '';
					}

					if ($tc->TC_CONFIRMATION == 'Y') {
						$confirmation = 'YES';
					} else if($tc->TC_CONFIRMATION == 'N') {
						$confirmation = 'NO';
					} else{
						$confirmation = '';
					}

					if ($tc->TC_STRUCTURED == 'Y') {
						$structured = 'YES';
					} else if($tc->TC_STRUCTURED == 'N') {
						$structured = 'NO';
					} else{
						$structured = '';
					}


					echo '
					<tr>
						<td class="text-left">' . $tc->TC_CATEGORY . '</td>
						<td class="text-center col-md-1">' . $confirmation . '</td>
						<td class="text-center col-md-1">' . $tc->TC_ELEMENT . '</td>
						<td class="text-center col-md-1">' . $structured . '</td>
						<td class="text-center col-md-1">' . $tc->TC_RANKING . '</td>
						<td class="text-center col-md-1">' . $status . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_tc" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tc" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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
	$('.delete_tc').click(function () {
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
				url: '<?php echo $this->lib->class_url('delTC')?>',
				data: {'tc_cat' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tc').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTC')?>',
				data: {'tc_cat' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>