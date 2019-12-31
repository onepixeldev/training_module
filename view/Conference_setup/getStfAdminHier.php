<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_sah_btn"><i class="fa fa-plus"></i> Add New Staff Admin</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_sah_list">
		<thead>
		<tr>
			<th class="text-center">Admin Code</th>
            <th class="text-left">Description</th>
            <th class="text-center">TNC (A&A) Approve ?</th>
            <th class="text-center">VC Approve ?</th>
            <th class="text-center">Active ?</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_admin_hier)) {
				foreach ($staff_admin_hier as $sah) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $sah->CAH_ADMIN_CODE . '</td>
						<td class="text-left col-md-3">' . $sah->APM_DESC . '</td>
                        <td class="text-center col-md-1">'.$sah->CAH_APPROVE_TNCA.'</td>
                        <td class="text-center col-md-1">'.$sah->CAH_APPROVE_VC.'</td>
                        <td class="text-center col-md-1">'.$sah->CAH_STATUS.'</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_sah_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs del_sah_btn"><i class="fa fa-trash"></i> Delete</button>
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