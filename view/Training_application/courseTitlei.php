<div class="modal-header btn-primary">
	<h4 class="modal-title" id="myModalLabel"><b>Structured Training</b></h4>
</div>
<div class="form-group well">
	<table class="table table-bordered table-hover" id="tbl_list_cr_title">
		<thead>
			<tr>
				<th class="text-center col-md-1">Ref ID</th>
				<th class="text-left col-md-4">Description</th>
				<th class="text-center col-md-2">Date</th>
				<th class="text-center col-md-1">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if (!empty($cr_title)) {
					foreach ($cr_title as $ct) {
						echo '
						<tr>
							<td class="text-center col-md-1">' . $ct->TH_REF_ID . '</td>
							<td class="text-left col-md-4">' . $ct->TH_TRAINING_TITLE . '</td>
							<td class="text-center col-md-2">' . $ct->TH_DATE . '</td>
							<td class="text-center col-md-1">
								<button type="button" class="btn btn-primary btn-xs select_course_title"><i class="fa fa-check-square-o"></i> Select</button>
							</td>
						</tr>
						';
					}
				} 
			?>
		</tbody>
	</table>

	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
	</div>
</div>

