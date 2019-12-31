<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_nt"><i class="fa fa-plus"></i> Add New Training</button>
</div>
<br>
<div id="loader"></div>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_list_ti">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
			<th class="text-left">Training</th>
			<th class="text-center col-md-5">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($trainingInfo)) {
				foreach ($trainingInfo as $ti) {
					echo '
                    <tr>
						<td class="text-center col-md-2">' . $ti->TH_REF_ID . '</td>
                        <td class="text-left">' . $ti->TH_TRAINING_TITLE . '</td>
                        <td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_training_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_training_btn"><i class="fa fa-trash"></i> Delete</button>
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