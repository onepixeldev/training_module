<p>
	<div class="well">
        <div class="alert alert-success fade in">
            <strong>List of Organizer</strong>
        </div>
		<div class="row">
			<table class="table table-bordered table-hover" id="tbl_organizer_tab2_list">
			<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Organizer</th>
				<th class="text-center">Description</th>
				<th class="text-center">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$no = 0;
				
				if (!empty($organizer_list)) {
					foreach ($organizer_list as $organizer) {
						echo '
						<tr data-org-code="' . $organizer->TOH_ORG_CODE . '">
							<td class="text-center col-md-1">' . ++$no . '</td>
							<td class="text-center col-md-1">' . $organizer->TOH_ORG_CODE . '</td>
							<td class="text-left col-md-7">' . $organizer->TOH_ORG_DESC . '</td>
							<td class="text-center col-md-1">
                                                            <button type="button" class="btn btn-primary btn-xs select_orgTab2_btn"><i class="fa fa-check-square-o"></i> Select</button>
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