<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Speaker Info</h4>
<br>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_nt"><i class="fa fa-plus"></i> Add New Speaker <b>(Referrence ID: <?php echo $refid ?>)</b></button>
</div>
<br>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_si">
		<thead>
		<tr>
			<th class="text-center">Reference ID</th>
            <th class="text-center">Type</th>
			<th class="text-center">Speaker ID</th>
			<th class="text-left">Speaker Name</th>
			<th class="text-left">Department/Organization</th>
            <th class="text-center">Contact/Phone No</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($speakerInfoExternal)) {
				foreach ($speakerInfoExternal as $sie) {
					echo '
                    <tr>
                        <td class="text-center">' . $refid .'</td>
						<td class="text-center">' . $sie->TS_TYPE . '</td>
						<td class="text-center">' . $sie->TS_SPEAKER_ID . '</td>
						<td class="text-left">' . $sie->ES_SPEAKER_NAME . '</td>
						<td class="text-left">' . $sie->ES_DEPT . '</td>
						<td class="text-center">' . $sie->TS_CONTACT . '</td>
                        <td class="text-center col-md-3">
                        	<button type="button" class="btn btn-info btn-xs select_training_btn"><i class="fa fa-arrow-down"></i> Select</button>
							<button type="button" class="btn btn-success btn-xs edit_training_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_training_btn"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			}
			if (!empty($speakerInfoStaff)) {
				foreach ($speakerInfoStaff as $sis) {
					echo '
                    <tr>
                        <td class="text-center">' . $refid .'</td>
						<td class="text-center">' . $sis->TS_TYPE . '</td>
						<td class="text-center">' . $sis->TS_SPEAKER_ID . '</td>
						<td class="text-left">' . $sis->SM_STAFF_NAME . '</td>
						<td class="text-left">' . $sis->SM_DEPT_CODE . '</td>
						<td class="text-center">' . $sis->TS_CONTACT . '</td>
                        <td class="text-center col-md-3">
                        	<button type="button" class="btn btn-info btn-xs select_training_btn"><i class="fa fa-arrow-down"></i> Select</button>
							<button type="button" class="btn btn-success btn-xs edit_training_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_training_btn"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			} 
			if (empty($speakerInfoStaff) && empty($speakerInfoExternal)) {
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