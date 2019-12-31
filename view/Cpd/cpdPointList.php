<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_cpd_point_btn"><i class="fa fa-plus"></i> Add New CPD Point</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_cpdpts_list" style="width: 100%">
		<thead>
            <tr>
                <th class="text-center col-md-1">Scheme</th>
                <th class="text-left col-md-4">Description</th>
                <th class="text-center col-md-1">Compulsory CPD</th>
                <th class="text-center col-md-1">Minimun CPD (Khusus)</th>
                <th class="text-center col-md-1">Minimun CPD (Umum)</th>
                <th class="text-center col-md-1">CPD (Umum - Compulsory)</th>
                <th class="text-center col-md-1">Minimun CPD<br>(Teras)</th>
                <th class="text-center col-md-1">LNPT Weightage</th>
                <th class="text-center col-md-1">Rank</th>
                <th class="text-center col-md-2">Action</th>
            </tr>
		</thead>
		<tbody>
		<?php
			if (!empty($cpd_pts)) {
				foreach ($cpd_pts as $cp) {
					echo '
                    <tr>
                        <td class="text-center cp_scheme">'.$cp->CP_SCHEME.'</td>
						<td class="text-left desc">'.$cp->SOG_GROUP_DESC.'</td>
                        <td class="text-center cp_cpd_layak">'.$cp->CP_CPD_LAYAK.'</td>
                        <td class="text-center cp_cpd_khusus_min">'.$cp->CP_CPD_KHUSUS_MIN.'</td>
                        <td class="text-center cp_cpd_umum_min">'.$cp->CP_CPD_UMUM_MIN.'</td>
                        <td class="text-center cp_umum_mandatory">'.$cp->CP_UMUM_MANDATORY.'</td>
                        <td class="text-center cp_cpd_teras_min">'.$cp->CP_CPD_TERAS_MIN.'</td>
                        <td class="text-center cp_lnpt_weightage">'.$cp->CP_LNPT_WEIGHTAGE.'</td>
                        <td class="text-center">'.$cp->CP_RANK.'</td>
						<td class="text-center col-md-1">
							<div class="btn-group">
								<button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
									<div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
										<button type="button" class="btn btn-info text-left btn-block btn-xs generate_staff_btn"><i class="fa fa-users"></i> Generate Staff</button>
										<button type="button" class="btn btn-success text-left btn-block btn-xs edit_cpdp_btn"><i class="fa fa-edit"></i> Edit</button>
										<button type="button" class="btn btn-danger text-left btn-block btn-xs del_cpdp_btn"><i class="fa fa-trash"></i> Delete</button>
									</div>
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