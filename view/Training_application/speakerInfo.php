<h4 class="panel-heading bg-color-blueDark txt-color-white">Speaker Info</h4>
<br>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_tr_sp" value="<?php echo $refid ?>"><i class="fa fa-plus"></i> Add Speaker</button>
</div>
<br>
<div class="well table-condensed table-responsive">
	<table class="table table-bordered table-hover" id="tbl_list_si">
	<thead>
	<tr>
		<th class="text-center" style="display: none">Reference ID</th>
		<th class="text-center">Type</th>
		<th class="text-center">Speaker ID</th>
		<th class="text-left">Speaker Name</th>
		<th class="text-left">Department/Organization</th>
		<th class="text-center">Contact/Phone No</th>
		<th class="text-center" id="spAct">Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
		if (!empty($speakerInfoExternal)) {
			foreach ($speakerInfoExternal as $sie) {
				echo '
				<tr>
					<td class="text-center" style="display: none">' . $refid .'</td>
					<td class="text-center">' . $sie->TS_TYPE . '</td>
					<td class="text-center">' . $sie->TS_SPEAKER_ID . '</td>
					<td class="text-left">' . $sie->ES_SPEAKER_NAME . '</td>
					<td class="text-left">' . $sie->ES_DEPT . '</td>
					<td class="text-center">' . $sie->TS_CONTACT . '</td>
					<td class="text-center col-md-2" id="spAct">
						<button type="button" class="btn btn-success btn-xs edit_sp_btn"><i class="fa fa-edit"></i> Edit</button>
						<button type="button" class="btn btn-danger btn-xs del_sp_btn"><i class="fa fa-trash"></i> Delete</button>
					</td>
				</tr>
				';
			}
		}
		if (!empty($speakerInfoStaff)) {
			foreach ($speakerInfoStaff as $sis) {
				echo '
				<tr>
					<td class="text-center" style="display: none">' . $refid .'</td>
					<td class="text-center">' . $sis->TS_TYPE . '</td>
					<td class="text-center">' . $sis->TS_SPEAKER_ID . '</td>
					<td class="text-left">' . $sis->SM_STAFF_NAME . '</td>
					<td class="text-left">' . $sis->SM_DEPT_CODE . '</td>
					<td class="text-center">' . $sis->TS_CONTACT . '</td>
					<td class="text-center col-md-2" id="spAct">
						<button type="button" class="btn btn-success btn-xs edit_sp_btn"><i class="fa fa-edit"></i> Edit</button>
						<button type="button" class="btn btn-danger btn-xs del_sp_btn"><i class="fa fa-trash"></i> Delete</button>
					</td>
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
</div>