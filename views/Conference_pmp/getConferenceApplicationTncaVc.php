<p>
<div class="well">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_ca_list">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
            <th class="text-center">Position</th>
            <th class="text-center">Conference ID</th>
            <th class="text-center">Conference Name</th>
            <th class="text-center">Academician?</th>
            <th class="text-center">Apply Date</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($con_app_tncaa)) {
				foreach ($con_app_tncaa as $cat) {
					echo '
                    <tr>
						<td class="text-center col-md-1 staff_id">' . $cat->SCM_STAFF_ID . '</td>
                        <td class="text-left col-md-2">' . $cat->TITLE_NAME . '</td>
                        <td class="text-center col-md-2">' . $cat->SS_DESC_SHORT . '</td>
                        <td class="text-center col-md-2 refid">' . $cat->SCM_REFID . '</td>
                        <td class="text-center col-md-2">' . $cat->CM_NAME . '</td>
                        <td class="text-center">' . $cat->SS_ACADEMIC_DESC . '</td>
                        <td class="text-center col-md-1">' . $cat->SCM_APPLY_DATE . '</td>
						<td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                    <button type="button" class="btn btn-primary text-left btn-block btn-xs select_stf_app_ver" value=""><i class="fa fa-info-circle"></i> Detail</button>
                                    <button type="button" class="btn btn-info text-left btn-block btn-xs history_stf_app_ver" value=""><i class="fa fa-history"></i> History</button>
                                    <button type="button" class="btn btn-danger text-left btn-block btn-xs print_stf_app_ver" repcode="ATRAPPVER"><i class="fa fa-print"></i> Print</button>
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