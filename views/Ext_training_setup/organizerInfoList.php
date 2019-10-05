<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_org_btn"><i class="fa fa-plus"></i> Add New Organizer</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ol_list" style="width: 100%">
		<thead>
            <tr>
                <th class="text-center col-md-1">Code</th>
                <th class="text-center col-md-3">Description</th>
                <th class="text-center col-md-1">Address</th>
				<th class="text-center col-md-1">Postcode</th>
				<th class="text-center col-md-1">City</th>
				<th class="text-center col-md-1">State</th>
				<th class="text-center col-md-1">Country</th>
                <th class="text-center col-md-1">Action</th>
            </tr>
		</thead>
		<tbody>
		<?php
			if (!empty($org_list)) {
				foreach ($org_list as $ol) {
					echo '
                    <tr>
                        <td class="text-center code">'.$ol->TOH_ORG_CODE.'</td>
						<td class="text-left desc">'.$ol->TOH_ORG_DESC.'</td>
						<td class="text-center">'.$ol->TOH_ADDRESS.'</td>
						<td class="text-center">'.$ol->TOH_POSTCODE.'</td>
						<td class="text-center">'.$ol->TOH_CITY.'</td>
						<td class="text-center">'.$ol->SM_STATE_DESC.'</td>
						<td class="text-center">'.$ol->CM_COUNTRY_DESC.'</td>
						<td class="text-center">
							<div class="btn-group">
								<button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
								<div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
									<button type="button" class="btn btn-success text-left btn-block btn-xs upd_org" value=""><i class="fa fa-edit"></i> Edit</button>
									<button type="button" class="btn btn-danger text-left btn-block btn-xs del_org" value=""><i class="fa fa-trash"></i> Delete</button>
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