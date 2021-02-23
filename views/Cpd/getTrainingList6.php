<p>
<div class="well">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_tr_list">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
            <th class="text-left">Title</th>
            <th class="text-center">Date From</th>
            <th class="text-center">Date To</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($tr_list)) {
				foreach ($tr_list as $trl) {
					echo '
                    <tr>
						<td class="text-center col-md-2 refid">' . $trl->TH_REF_ID . '</td>
                        <td class="text-left title">' . $trl->TH_TRAINING_TITLE . '</td>
                        <td class="text-center col-md-1">' . $trl->TH_DATE_FROM2 . '</td>
                        <td class="text-center col-md-1">' . $trl->TH_DATE_TO2 . '</td>
                        <td class="text-center col-md-2">
							<button type="button" class="btn btn-info btn-xs select_training_btn"><i class="fa fa-info-circle"></i> Details</button>
							<button type="button" class="btn btn-primary btn-xs approve_training_btn"><i class="fa fa-check-square-o"></i> Approve</button>
							<button type="button" class="btn btn-success btn-xs postpone_training_btn"><i class="fa fa-clock-o"></i> Postpone</button>
							<button type="button" class="btn btn-danger btn-xs reject_training_btn"><i class="fa fa-times-circle"></i> Reject</button>
							<button type="button" class="btn btn-warning btn-xs amend_training_btn"><i class="fa fa-share-square-o"></i> Amend</button>
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