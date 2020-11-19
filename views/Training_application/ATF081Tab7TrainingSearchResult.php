<p>
	<div class="well">
        <div class="alert alert-success fade in">
            <strong>List of Training</strong>
        </div>
		<div class="row">
			<table class="table table-bordered table-hover" id="tbl_training_tab7_list">
			<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Training Code</th>
				<th class="text-center">Title</th>
                                <th class="text-center">Training Date</th>
				<th class="text-center">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$no = 0;
				
				if (!empty($training_list)) {
					foreach ($training_list as $training) {
						echo '
						<tr data-training-code="' . $training->TH_REF_ID . '">
							<td class="text-center col-md-1">' . ++$no . '</td>
							<td class="text-center col-md-1">' . $training->TH_REF_ID . '</td>
							<td class="text-left col-md-6">' . $training->TH_TRAINING_TITLE . '</td>
                                                        <td class="text-left col-md-3">' . $training->TH_DATE . '</td>
							<td class="text-center col-md-1">
                                                            <button type="button" class="btn btn-primary btn-xs select_training_tab7_btn"><i class="fa fa-check-square-o"></i> Select</button>
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