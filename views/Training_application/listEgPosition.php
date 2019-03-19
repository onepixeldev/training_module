<div class="modal-header btn-primary">
	<h4 class="modal-title" id="myModalLabel"><b>List of Eligible Position</b></h4>
</div>
<div class="well">
	<table class="table table-bordered table-hover" id="tbl_list_eg_pos">
		<thead>
			<tr>
				<th class="text-center col-md-1">No</th>
				<th class="text-center">Service Code</th>
				<th class="text-left">Description</th>
				<th class="text-center col-md-1" id="postAction">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if (!empty($list_eg_pos)) {
					foreach ($list_eg_pos as $lep) {
						echo '
						<tr data-gpcode='.$lep->TGS_GRPSERV_CODE.' id="dataGp">
							<td class="text-center col-md-1">' . $lep->TGS_SEQ . '</td>
							<td class="text-center col-md-2">' . $lep->TGS_SERVICE_CODE . '</td>
							<td class="text-left">' . $lep->SS_SERVICE_DESC . '</td>
							<td class="text-center col-md-1" id="postAction">
                                <button type="button" class="btn btn-danger btn-xs del_eg_btn"><i class="fa fa-trash"></i> Delete</button>
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

