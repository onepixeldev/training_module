<p>
	<div class="well">
        <div class="alert alert-success fade in">
            <strong>List of Coordinator</strong>
        </div>
		<div class="row">
			<table class="table table-bordered table-hover" id="tbl_staff_tab2_list">
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
				
				if (!empty($coordinator_list)) {
					foreach ($coordinator_list as $coordinator) {
						echo '
						<tr data-staff-id="' . $coordinator->SM_STAFF_ID . '">
							<td class="text-center col-md-1">' . ++$no . '</td>
							<td class="text-center col-md-1">' . $coordinator->SM_STAFF_ID . '</td>
							<td class="text-left col-md-7">' . $coordinator->SM_STAFF_ID_NAME . '</td>
							<td class="text-center col-md-1">
                                                            <button type="button" class="btn btn-primary btn-xs select_staffTab2_btn"><i class="fa fa-check-square-o"></i> Select</button>
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