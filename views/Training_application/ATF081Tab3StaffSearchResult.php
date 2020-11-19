<p>
	<div class="well">
        <div class="alert alert-success fade in">
            <strong>List of Staff</strong>
        </div>
		<div class="row">
			<table class="table table-bordered table-hover" id="tbl_staff_tab3_list">
			<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Coordinator</th>
				<th class="text-center">Name</th>
				<th class="text-center">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$no = 0;
				
				if (!empty($staff_list)) {
					foreach ($staff_list as $staff) {
						echo '
						<tr data-staff-id="' . $staff->SM_STAFF_ID . '">
							<td class="text-center col-md-1">' . ++$no . '</td>
							<td class="text-center col-md-1">' . $staff->SM_STAFF_ID . '</td>
							<td class="text-left col-md-7">' . $staff->SM_STAFF_ID_NAME . '</td>
							<td class="text-center col-md-1">
                                                            <button type="button" class="btn btn-primary btn-xs select_staffTab3_btn"><i class="fa fa-check-square-o"></i> Select</button>
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