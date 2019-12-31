<p>
<div class="well table-responsive">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_scpd_list" style="width: 100%">
		<thead>
        <tr>
			<th class="text-center" rowspan="2">Staff ID</th>
            <th class="text-center" rowspan="2">Name</th>
            <th class="text-center" colspan="4">Minimum Point</th>
            <th class="text-center" colspan="4">Accumulated Point</th>
            <th class="text-center" colspan="2">LNPT(%)</th>

            <th class="text-center" rowspan="2">Action</th>
		</tr>

		<tr>
    
            <th class="text-center">Khusus</th>
            <th class="text-center">Umum</th>
            <th class="text-center">Teras</th>
            <th class="text-center">CPD</th>

            <th class="text-center">Khusus</th>
            <th class="text-center">Umum</th>
            <th class="text-center">Teras</th>
            <th class="text-center">CPD</th>

            <th class="text-center">Weightage</th>
            <th class="text-center">Percent</th>

		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($s_cpd)) {
				foreach ($s_cpd as $sc) {
					echo '
                    <tr>
						<td class="text-center col-md-1 staff_id">' . $sc->SCH_STAFF_ID . '</td>
                        <td class="text-left col-md-3 staff_name">' . $sc->SM_STAFF_NAME . '</td>

                        <td class="text-center col-md-1">' . round($sc->SCH_JUM_KHUSUS_MIN, 2) . '</td>
                        <td class="text-center col-md-1">' . round($sc->SCH_JUM_UMUM_MIN, 2) . '</td>
                        <td class="text-center col-md-1">' . round($sc->SCH_JUM_TERAS_MIN, 2) . '</td>
                        <td class="text-center col-md-1">' . round($sc->SCH_CPD_LAYAK , 2). '</td>

                        <td class="text-center col-md-1">' . round($sc->SCH_JUM_KHUSUS, 2) . '</td>
                        <td class="text-center col-md-1">' . round($sc->SCH_JUM_UMUM, 2) . '</td>
                        <td class="text-center col-md-1">' . round($sc->SCH_JUM_TERAS, 2) . '</td>
                        <td class="text-center col-md-1">' . round($sc->SCH_JUM_CPD, 2) . '</td>

                        <td class="text-center col-md-1">' . round($sc->SCH_PEMBERAT_LPP, 2) . '</td>
                        <td class="text-center col-md-1">' . round($sc->SCH_PERATUS_LPP, 2) . '</td>

						<td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
									<button type="button" class="btn btn-success text-left btn-block btn-xs upd_stf_cpd" value=""><i class="fa fa-edit"></i> Update Point</button>
									<button type="button" class="btn btn-info text-left btn-block btn-xs detl_stf_acpd" value=""><i class="fa fa-info-circle"></i> View Detail</button>
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