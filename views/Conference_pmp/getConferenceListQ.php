<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ca_list">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
            <th class="text-left">Title</th>
            <th class="text-left">Address</th>
            <th class="text-center">Date From</th>
            <th class="text-center">Date To</th>
            <th class="text-center">Organizer</th>
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
                        <td class="text-left col-md-2 crname">' . $cil->CM_NAME . '</td>
                        <td class="text-left col-md-2">' . $cil->ADDR_COMBINED . '</td>
                        <td class="text-center col-md-1">' . $cil->CM_DATE_FR . '</td>
                        <td class="text-center col-md-1">' . $cil->CM_DATE_TO . '</td>
                        <td class="text-center col-md-2">' . $cil->CM_ORGANIZER_NAME . '</td>
						<td class="text-center col-md-1">
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                            <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                <button type="button" class="btn btn-primary text-left btn-block btn-xs detl_btn_cr"><i class="fa fa-info-circle"></i> Detail</button>
                                <button type="button" class="btn btn-danger text-left btn-block btn-xs print_rep_btn"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
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