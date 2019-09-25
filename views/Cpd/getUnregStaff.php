<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_unreg_stf_list" style="width: 100%">
		<thead>
		<tr>
            <th class="text-center">Staff ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Status</th>
            <th class="text-center">Department</th>
            <th class="text-center">Job Code</th>
            <th class="text-center">Job Description</th>
            <th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($unreg_stf)) {
				foreach ($unreg_stf as $us) {
					echo '
                    <tr>
						<td class="text-center col-md-1 staff_id">' . $us->SM_STAFF_ID . '</td>
                        <td class="text-left col-md-3 staff_name">' . $us->SM_STAFF_NAME . '</td>
                        <td class="text-center col-md-1">' . $us->SM_STAFF_STATUS_DESC . '</td>
                        <td class="text-center col-md-1">' . $us->SM_DEPT_CODE . '</td>
                        <td class="text-center col-md-1">' . $us->SM_JOB_CODE . '</td>
                        <td class="text-left col-md-2">' . $us->SS_SERVICE_DESC . '</td>
						<td class="text-center col-md-1">
                            <button type="button" class="btn btn-primary text-left btn-xs create_staff" value=""><i class="fa fa-plus"></i> Create</button>
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