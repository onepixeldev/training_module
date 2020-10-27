<div class="alert alert-success fade in">
    <b>Facilitator Info</b>
</div>
	<table class="table table-bordered table-hover" id="tbl_list_fi">
	<thead>
	<tr>
		<th class="text-center" style="display: none">Reference ID</th>
		<th class="text-center">Type</th>
		<th class="text-center">Facilitator ID</th>
		<th class="text-left">Facilitator Name</th>
	</tr>
	</thead>
	<tbody>
	<?php
		if (!empty($facilitatorInfoExternal)) {
			foreach ($facilitatorInfoExternal as $fie) {
				echo '
				<tr>
					<td class="text-center" style="display: none">' . $ref_id .'</td>
					<td class="text-center col-md-1">' . $fie->TF_TYPE . '</td>
					<td class="text-center col-md-2">' . $fie->TF_FACILITATOR_ID . '</td>
					<td class="text-left">' . $fie->EF_FACILITATOR_NAME . '</td>
				</tr>
				';
			}
		}
		if (!empty($facilitatorInfoStaff)) {
			foreach ($facilitatorInfoStaff as $fis) {
				echo '
				<tr>
					<td class="text-center" style="display: none">' . $ref_id .'</td>
					<td class="text-center col-md-1">' . $fis->TF_TYPE . '</td>
					<td class="text-center col-md-2">' . $fis->TF_FACILITATOR_ID . '</td>
					<td class="text-left">' . $fis->SM_STAFF_NAME . '</td>
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