<p>
	<div class="well">
        <div class="alert alert-success fade in">
            <strong>List of Department</strong>
        </div>
		<div class="row">
			<table class="table table-bordered table-hover" id="tbl_dept_tab3b_list">
			<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Department</th>
				<th class="text-center">Description</th>
				<th class="text-center">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$no = 0;
				
				if (!empty($dept_list)) {
					foreach ($dept_list as $dept) {
						echo '
						<tr data-dept-code="' . $dept->DM_DEPT_CODE . '">
							<td class="text-center col-md-1">' . ++$no . '</td>
							<td class="text-center col-md-1">' . $dept->DM_DEPT_CODE . '</td>
							<td class="text-left col-md-7">' . $dept->DM_DEPT_DESC . '</td>
							<td class="text-center col-md-1">
                                                            <button type="button" class="btn btn-primary btn-xs select_deptTab3B_btn"><i class="fa fa-check-square-o"></i> Select</button>
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