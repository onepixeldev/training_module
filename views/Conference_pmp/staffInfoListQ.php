<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_sinf_list">
		<thead>
		<tr>
			<th class="text-center col-md-1">Staff ID</th>
            <th class="text-left col-md-4">Name</th>
            <th class="text-center col-md-1">Service Code</th>
            <th class="text-left col-md-2">Service</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($stf_inf)) {
				foreach ($stf_inf as $si) {
					echo '
                    <tr>
						<td class="text-center">' . $si->SM_STAFF_ID . '</td>
                        <td class="text-left">' . $si->SM_STAFF_NAME . '</td>
                        <td class="text-center">' . $si->SM_JOB_CODE . '</td>
                        <td class="text-left">' . $si->SS_SERVICE_DESC . '</td>
						<td class="text-center">
							<button type="button" class="btn btn-primary btn-xs selc_staff"><i class="fa fa-chevron-right"></i> Select</button>
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