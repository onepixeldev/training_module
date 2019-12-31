<p>
<div class="text-right" id="add_rep_stf">
	
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ca_list">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
            <th class="text-left">Title</th>
            <th class="text-center">Date From</th>
            <th class="text-center">Date To</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($conference_inf_list)) {
				foreach ($conference_inf_list as $cil) {
					echo '
                    <tr>
						<td class="text-center col-md-2 refid">' . $cil->CM_REFID . '</td>
                        <td class="text-left title">' . $cil->CM_NAME . '</td>
                        <td class="text-center col-md-1">' . $cil->CM_DATE_FR . '</td>
                        <td class="text-center col-md-1">' . $cil->CM_DATE_TO . '</td>
						<td class="text-center col-md-1" id="act">
							<button type="button" class="btn btn-info btn-xs con_app_detl_btn"><i class="fa fa-info-circle"></i> Details</button>
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