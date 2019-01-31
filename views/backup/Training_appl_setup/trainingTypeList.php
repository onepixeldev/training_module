<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_appl">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Training Type</th>
			<th class="text-center">Counted</th>
			<th class="text-center">Training Evaluation</th>
			<th class="text-center">Confirmation</th>
			<th class="text-center">Service Book</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($training_type_list)) {
				foreach ($training_type_list as $tt) {

					if ($tt->TT_COUNTED == 'Y') {
						$counted = 'YES';
					} else if($tt->TT_COUNTED == 'N') {
						$counted = 'NO';
					} else{
						$counted = '';
					}

					if ($tt->TT_EVALUATION == 'Y') {
						$evaluation = 'YES';
					} else if($tt->TT_EVALUATION == 'N') {
						$evaluation = 'NO';
					} else{
						$evaluation = '';
					}

					if ($tt->TT_CONFIRMATION == 'Y') {
						$confirmation = 'YES';
					} else if($tt->TT_CONFIRMATION == 'N') {
						$confirmation = 'NO';
					} else{
						$confirmation = '';
					}

					if ($tt->TT_SERVICE_BOOK == 'Y') {
						$svcBook = 'YES';
					} else if($tt->TT_SERVICE_BOOK == 'N') {
						$svcBook = 'NO';
					} else{
						$svcBook = '';
					}


					echo '
					<tr>
						<td class="text-center col-md-1">' . $tt->TT_CODE . '</td>
						<td class="text-left">' . $tt->TT_DESC . '</td>
						<td class="text-center col-md-1">' . $counted . '</td>
						<td class="text-center col-md-1">' . $evaluation . '</td>
						<td class="text-center col-md-1">' . $confirmation . '</td>
						<td class="text-center col-md-1">' . $svcBook . '</td>
						<td class="text-center col-md-1">
							<button type="button" class="btn btn-success btn-xs edit_tt" title="Edit training type Record"><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-xs delete_tt" title="Delete training type Record"><i class="fa fa-trash"></i></button>
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
	$('.delete_tt').click(function () {
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
				url: '<?php echo $this->lib->class_url('delTT')?>',
				data: {'codeTT' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tt').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTT')?>',
				data: {'codeTT' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>