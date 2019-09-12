<p>
<div class="text-right">
    <button type="button" class="btn btn-danger btn-sm rep_coor_btn"><i class="fa fa-file-pdf-o"></i> Generate Report</button>
    <button type="button" class="btn btn-primary btn-sm add_coor_btn"><i class="fa fa-plus"></i> Add New Coordinator</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_coor_list" style="width: 100%">
		<thead>
            <tr>	
				<th class="text-center col-md-1 hidden">ROWID</th>
                <th class="text-center col-md-1">Staff ID</th>
                <th class="text-left col-md-3">Name</th>
                <th class="text-center col-md-1">Role</th>
                <th class="text-center col-md-1">Role Panel</th>
                <th class="text-center col-md-2">Department 1</th>
                <th class="text-center col-md-2">Department 2</th>
                <th class="text-center col-md-2">Department 3</th>
                <th class="text-center col-md-2">Action</th>
            </tr>
		</thead>
		<tbody>
		<?php
			if (!empty($coor_list)) {
				foreach ($coor_list as $cl) {
					echo '
					<tr>
						<td class="text-center hidden rowid">'.$cl->ROWIDCHAR.'</td>
                        <td class="text-center sid">'.$cl->CUL_STAFF_ID.'</td>
						<td class="text-left sname">'.$cl->SM_STAFF_NAME.'</td>
                        <td class="text-center">'.$cl->CUL_ROLE.'</td>
                        <td class="text-center">'.$cl->CUL_ROLE_PANEL.'</td>
                        <td class="text-center">'.$cl->DEPT_CODE_DESC1.'</td>
                        <td class="text-center">'.$cl->DEPT_CODE_DESC2.'</td>
                        <td class="text-center">'.$cl->DEPT_CODE_DESC3.'</td>
						<td class="text-center col-md-1">
							<div class="btn-group">
								<button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
									<div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
										<button type="button" class="btn btn-success text-left btn-block btn-xs edit_coor_btn"><i class="fa fa-pencil-square-o"></i> Edit</button>
										<button type="button" class="btn btn-danger text-left btn-block btn-xs del_coor_btn"><i class="fa fa-trash"></i> Delete</button>
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
<br><br>
<div id="add_edit_cpd_coor">

</div>