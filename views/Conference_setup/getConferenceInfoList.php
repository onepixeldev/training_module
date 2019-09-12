<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm con_inf_add_btn"><i class="fa fa-plus"></i> Add New Conference</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_cil_list">
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
						<td class="text-center col-md-2">' . $cil->CM_REFID . '</td>
                        <td class="text-left">' . html_entity_decode($cil->CM_NAME) . '</td>
                        <td class="text-center col-md-1">' . $cil->CM_DATE_FROM2 . '</td>
                        <td class="text-center col-md-1">' . $cil->CM_DATE_TO2 . '</td>
						<td class="text-center col-md-3">
							<button type="button" class="btn btn-info btn-xs con_inf_detl_btn"><i class="fa fa-info-circle"></i> Details</button>
							<button type="button" class="btn btn-success btn-xs con_inf_edit_btn"><i class="fa fa-pencil-square-o"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs con_inf_del_btn"><i class="fa fa-trash"></i> Delete</button>
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