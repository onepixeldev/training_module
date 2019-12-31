<div class="modal-header btn-primary">
	<h4 class="modal-title" id="myModalLabel"><b>Structured Training</b></h4>
</div>
<div class="form-group well">
	<table class="table table-bordered table-hover" id="tbl_list_str_tr">
		<thead>
			<tr>
				<th class="text-center col-md-1">Code</th>
				<th class="text-left">Title</th>
				<th class="text-center col-md-1">Category</th>
				<th class="text-left">Area (Code - Description)</th>
				<th class="text-left">Type (Type - Description)</th>
				<th class="text-center col-md-1">Competency</th>
				<th class="text-center col-md-1">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if (!empty($str_tr)) {
					foreach ($str_tr as $sst) {
						echo '
						<tr>
							<td class="text-center col-md-1">' . $sst->TTH_REF_ID . '</td>
							<td class="text-left">' . $sst->TTH_TRAINING_TITLE . '</td>
							<td class="text-center col-md-1">' . $sst->TTH_CATEGORY . '</td>
							<td class="text-left">' . $sst->TTH_TF_FIELD_DESC . '</td>
							<td class="text-center">' . $sst->TTH_TT_TYPE_DESC . '</td>
							<td class="text-center col-md-1">' . $sst->TTH_COMPETENCY . '</td>
							<td class="text-center col-md-1">
								<button type="button" class="btn btn-primary btn-xs select_str_tr"><i class="fa fa-check-square-o"></i> Select</button>
							</td>
						</tr>
						';
					}
				} else {
					echo '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
				}
			?>
		</tbody>
	</table>

	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
	</div>
</div>

