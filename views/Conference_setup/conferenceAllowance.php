<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_ca_btn"><i class="fa fa-plus"></i> Add New Conferance Allowance</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ca_list" style="width: 100%">
		<thead>
		<?php
			if($mod == 'RMIC') {
				echo ' 
					<tr>
						<th class="text-center">Code</th>
						<th class="text-left">Description</th>
						<th class="text-center">Max Amount (RM)</th>
						<th class="text-center">Budget Orinin (Local)</th>
						<th class="text-center">Budget Orinin (Oversea)</th>
						<th class="text-center">Status</th>
						<th class="text-center">Display RMIC?</th>
						<th class="text-center col-md-1">Action</th>
					</tr>
				';
			} else {
				echo ' 
					<tr>
						<th class="text-center">Code</th>
						<th class="text-left">Description</th>
						<th class="text-center">Max Amount (RM)</th>
						<th class="text-center">Budget Orinin (Local)</th>
						<th class="text-center">Budget Orinin (Oversea)</th>
						<th class="text-center">Status</th>
						<th class="text-center col-md-1">Action</th>
					</tr>
				';
			}
		?>
		</thead>
		<tbody>
		<?php
			if (!empty($con_allow) && empty($mod)) {
				foreach ($con_allow as $co) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $co->CA_CODE . '</td>
						<td class="text-left col-md-3">' . $co->CA_DESC . '</td>
                        <td class="text-center col-md-1">'.number_format($co->CA_RM_MAX_AMOUNT, 2).'</td>
                        <td class="text-center col-md-1">'.$co->CA_BUDGET_ORIGIN_LOCAL.'</td>
						<td class="text-center col-md-1">'.$co->CA_BUDGET_ORIGIN_OVERSEAS.'</td>
						<td class="text-center col-md-1">'.$co->CA_STATUS.'</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_ca_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs del_ca_btn"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
                    ';
				}
			} 
			elseif(!empty($con_allow) && $mod == 'RMIC') {
				foreach ($con_allow as $co) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $co->CA_CODE . '</td>
						<td class="text-left col-md-3">' . $co->CA_DESC . '</td>
                        <td class="text-center col-md-1">'.number_format($co->CA_RM_MAX_AMOUNT, 2).'</td>
                        <td class="text-center col-md-1">'.$co->CA_BUDGET_ORIGIN_LOCAL_RMIC.'</td>
						<td class="text-center col-md-1">'.$co->CA_BUDGET_ORIGIN_OVERSEAS_RMIC.'</td>
						<td class="text-center col-md-1">'.$co->CA_STATUS.'</td>
						<td class="text-center col-md-1">'.$co->CA_RMIC_DESC.'</td>
						<td class="text-center col-md-1">
							<button type="button" class="btn btn-success btn-xs edit_ca_btn"><i class="fa fa-edit"></i> Edit</button>
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