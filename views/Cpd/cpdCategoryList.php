<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_cpcat_btn"><i class="fa fa-plus"></i> Add New CPD Category</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_cpcat_list" style="width: 100%">
		<thead>
            <tr>
                <th class="text-center col-md-1">Code</th>
                <th class="text-left col-md-4">Description</th>
                <th class="text-center col-md-1">Status</th>
                <th class="text-center col-md-1">Action</th>
            </tr>
		</thead>
		<tbody>
		<?php
			if (!empty($cpd_cat)) {
				foreach ($cpd_cat as $cc) {
					echo '
                    <tr>
                        <td class="text-center">'.$cc->CC_CATEGORY_CODE.'</td>
						<td class="text-left">'.$cc->CC_CATEGORY_DESC.'</td>
						<td class="text-center">'.$cc->CC_STATUS_DESC.'</td>
						<td class="text-center">
							<button type="button" class="btn btn-success btn-xs edit_cpcat_btn"><i class="fa fa-edit"></i> Edit</button>
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