<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_cohp_btn"><i class="fa fa-plus"></i> Add New Certified Officer</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_cohp_list">
		<thead>
		<tr>
			<th class="text-center">Department</th>
            <th class="text-left">Description</th>
            <th class="text-center">Parent Department (Recommender)</th>
            <th class="text-center">Description</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($certified_officer_head_ptj)) {
				foreach ($certified_officer_head_ptj as $cohp) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $cohp->CDH_DEPT_CODE . '</td>
						<td class="text-left col-md-3">' . $cohp->DM_DEPT_DESC1 . '</td>
                        <td class="text-center col-md-1">'.$cohp->CDH_PARENT_DEPT_CODE.'</td>
                        <td class="text-left col-md-3">'.$cohp->DM_DEPT_DESC2.'</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_cohp_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs del_cohp_btn"><i class="fa fa-trash"></i> Delete</button>
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