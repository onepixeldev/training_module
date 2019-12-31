<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_toh">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Description</th>
			<th class="text-center">Country</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($training_organizer_head)) {
				foreach ($training_organizer_head as $toh) {
					echo '
					<tr>
						<td class="text-center col-md-1">' . $toh->TOH_ORG_CODE . '</td>
						<td class="text-left">' . $toh->TOH_ORG_DESC . '</td>
						<td class="text-center col-md-1">' . $toh->CM_COUNTRY_DESC . '</td>
                        <td class="text-center col-md-3">
                            <button type="button" class="btn btn-info btn-xs detail_toh" title="More details"><i class="fa fa-info-circle"></i> Detail</button>
							<button type="button" class="btn btn-success btn-xs edit_toh" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_toh" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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

	// DETAILS page
	$('.detail_toh').click(function () {
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
				url: '<?php echo $this->lib->class_url('detailTOH')?>',
				data: {'codeTOH' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// DELETE page
	$('.delete_toh').click(function () {
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
				url: '<?php echo $this->lib->class_url('delTOH')?>',
				data: {'codeTOH' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_toh').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTOH')?>',
				data: {'codeTOH' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>