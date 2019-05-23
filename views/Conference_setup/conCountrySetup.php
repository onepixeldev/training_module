<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_ccs_btn"><i class="fa fa-plus"></i> Add New Country</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ccs_list" style="width: 100%">
		<thead>
		<tr>
			<th class="text-center">Code</th>
            <th class="text-left">Asean Countries</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($con_Country)) {
				foreach ($con_Country as $ccs) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $ccs->ACS_COUNTRY_CODE . '</td>
						<td class="text-left">' . $ccs->ACS_COUNTRY_DESC . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-danger btn-xs del_ccs_btn"><i class="fa fa-trash"></i> Delete</button>
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