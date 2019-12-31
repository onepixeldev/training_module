<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Facilitator Info</h4>
<br>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_tr_fi" value="<?php echo $refid ?>"><i class="fa fa-plus"></i> Add Facilitator</button>
</div>
<br>
<div class="well table-condensed table-responsive">
	<table class="table table-bordered table-hover" id="tbl_list_fi">
	<thead>
	<tr>
		<th class="text-center" style="display: none">Reference ID</th>
		<th class="text-center">Type</th>
		<th class="text-center">Facilitator ID</th>
		<th class="text-left">Facilitator Name</th>
		<th class="text-center">Label</th>
		<th class="text-center" id="fiAct">Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
		if (!empty($facilitatorInfoExternal)) {
			foreach ($facilitatorInfoExternal as $fie) {
				echo '
				<tr>
					<td class="text-center" style="display: none">' . $refid .'</td>
					<td class="text-center col-md-1">' . $fie->TF_TYPE . '</td>
					<td class="text-center col-md-2">' . $fie->TF_FACILITATOR_ID . '</td>
					<td class="text-left col-md-7">' . $fie->EF_FACILITATOR_NAME . '</td>
					<td class="text-center col-md-1">' . $fie->TF_FACILITATOR_LABEL . '</td>
					<td class="text-center col-md-1" id="fiAct">
						<button type="button" class="btn btn-danger btn-xs del_fi_btn"><i class="fa fa-trash"></i> Delete</button>
					</td>
				</tr>
				';
			}
		}
		if (!empty($facilitatorInfoStaff)) {
			foreach ($facilitatorInfoStaff as $fis) {
				echo '
				<tr>
					<td class="text-center" style="display: none">' . $refid .'</td>
					<td class="text-center col-md-1">' . $fis->TF_TYPE . '</td>
					<td class="text-center col-md-2">' . $fis->TF_FACILITATOR_ID . '</td>
					<td class="text-left col-md-7">' . $fis->SM_STAFF_NAME . '</td>
					<td class="text-center col-md-1">' . $fis->TF_FACILITATOR_LABEL . '</td>
					<td class="text-center col-md-1" id="fiAct">
						<button type="button" class="btn btn-danger btn-xs del_fi_btn"><i class="fa fa-trash"></i> Delete</button>
					</td>
				</tr>
				';
			}
		} 
		if (empty($facilitatorInfoExternal) && empty($facilitatorInfoStaff)) {
			echo '<tr id="trNrecord"><td colspan="8" class="text-center">No record found.</td></tr>';
		}
	?>
	</tbody>
	</table>
</div>
</p>