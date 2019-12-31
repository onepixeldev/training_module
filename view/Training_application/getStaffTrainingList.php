<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="stf_tr_list">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
			<th class="text-left">Name</th>
            <th class="text-center">Department</th>
            <th class="text-center">Service</th>
			<th class="text-center" id="StfTrListAct">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($stf_tr_list)) {
				foreach ($stf_tr_list as $stl) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $stl->SM_STAFF_ID . '</td>
                        <td class="text-left col-md-4">' . $stl->SM_STAFF_NAME . '</td>
                        <td class="text-center col-md-2">' . $stl->DM_DEPT_DESC . '</td>
                        <td class="text-center col-md-2">' . $stl->SS_SERVICE_DESC . '</td>
						<td class="text-center col-md-1">
							<button type="button" class="btn btn-info btn-xs select_staff_btn"><i class="fa fa-crosshairs"></i> Select</button>
						</td>
					</tr>
					';
				}
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>