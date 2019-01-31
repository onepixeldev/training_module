<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_pr">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Participant Role</th>
			<th class="text-center">Sort By</th>
			<th class="text-center">CPD Counted (NON-ACADEMIC)</th>
			<th class="text-center">CPD Counted (ACADEMIC)</th>
			<th class="text-center">Display Training</th>
            <th class="text-center">Display Conference</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($training_participant_role_list)) {
				foreach ($training_participant_role_list as $tpr) {

					if ($tpr->TPR_CPD_COUNTED_NACAD == 'Y') {
						$tprCPDCountedNacad = 'YES';
					} else if($tpr->TPR_CPD_COUNTED_NACAD == 'N') {
						$tprCPDCountedNacad = 'NO';
					} else{
						$tprCPDCountedNacad = '';
					}

					if ($tpr->TPR_DISPLAY_TRAINING == 'Y') {
						$displayTraining = 'YES';
					} else if($tpr->TPR_DISPLAY_TRAINING == 'N') {
						$displayTraining = 'NO';
					} else{
						$displayTraining = '';
					}

					if ($tpr->TPR_DISPLAY_CONFERENCE == 'Y') {
						$displayConference = 'YES';
					} else if($tpr->TPR_DISPLAY_CONFERENCE == 'N') {
						$displayConference = 'NO';
					} else{
						$displayConference = '';
					}

					if ($tpr->TPR_CPD_COUNTED_ACAD == 'Y') {
						$CPDCountedAcad = 'YES';
					} else if($tpr->TPR_CPD_COUNTED_ACAD == 'N') {
						$CPDCountedAcad = 'NO';
					} else{
						$CPDCountedAcad = '';
					}


					echo '
					<tr>
						<td class="text-center col-md-1">' . $tpr->TPR_CODE . '</td>
						<td class="text-left">' . $tpr->TPR_DESC . '</td>
						<td class="text-center col-md-1">' . $tpr->TPR_ORDER_BY . '</td>
						<td class="text-center col-md-1">' . $tprCPDCountedNacad . '</td>
						<td class="text-center col-md-1">' . $CPDCountedAcad . '</td>
						<td class="text-center col-md-1">' . $displayTraining . '</td>
						<td class="text-center col-md-1">' . $displayConference . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_tpr" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tpr" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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
	$('.delete_tpr').click(function () {
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
				url: '<?php echo $this->lib->class_url('delTPR')?>',
				data: {'codeTPR' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tpr').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTPR')?>',
				data: {'codeTPR' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>