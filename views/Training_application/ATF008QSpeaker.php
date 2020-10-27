<div class="alert alert-success fade in">
    <b>Speaker Info</b>
</div>

	<table class="table table-bordered table-hover" id="tbl_list_si">
	<thead>
	<tr>
		<th class="text-center" style="display: none">Reference ID</th>
		<th class="text-center">Type</th>
		<th class="text-center">Speaker ID</th>
		<th class="text-left">Speaker Name</th>
		<th class="text-left">Department/Organization</th>
		<th class="text-center">Contact/Phone No</th>
	</tr>
	</thead>
	<tbody>
	<?php
		if (!empty($speakerInfoExternal)) {
			foreach ($speakerInfoExternal as $sie) {
				echo '
				<tr>
					<td class="text-center" style="display: none">' . $ref_id .'</td>
					<td class="text-center">' . $sie->TS_TYPE . '</td>
					<td class="text-center">' . $sie->TS_SPEAKER_ID . '</td>
					<td class="text-left">' . $sie->ES_SPEAKER_NAME . '</td>
					<td class="text-left">' . $sie->ES_DEPT . '</td>
					<td class="text-center">' . $sie->TS_CONTACT . '</td>
				</tr>
				';
			}
		}
		if (!empty($speakerInfoStaff)) {
			foreach ($speakerInfoStaff as $sis) {
				echo '
				<tr>
					<td class="text-center" style="display: none">' . $ref_id .'</td>
					<td class="text-center">' . $sis->TS_TYPE . '</td>
					<td class="text-center">' . $sis->TS_SPEAKER_ID . '</td>
					<td class="text-left">' . $sis->SM_STAFF_NAME . '</td>
					<td class="text-left">' . $sis->SM_DEPT_CODE . '</td>
					<td class="text-center">' . $sis->TS_CONTACT . '</td>
				</tr>
				';
			}
		} 
		if(empty($speakerInfoExternal) && empty($speakerInfoStaff)){
			echo '<tr id="trNrecord"><td colspan="8" class="text-center">No record found.</td></tr>';
		} 
	?>
	</tbody>
	</table>	
