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
            <th class="text-center">Fee (RM)</th>
			<th class="text-center" id="trListAct">Action</th>
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
                        <td class="text-center col-md-1">' . number_format($trl->TH_TRAINING_FEE, 2) . '</td>
                        <td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">

                                    <button type="button" class="btn btn-info text-left btn-block btn-xs select_training_btn"><i class="fa fa-info-circle"></i> Details</button>
                                    <button type="button" class="btn btn-primary text-left btn-block btn-xs approve_training_btn"><i class="fa fa-check-square-o"></i> Approve</button>
                                    <button type="button" class="btn btn-success text-left btn-block btn-xs postpone_training_btn"><i class="fa fa-clock-o"></i> Postpone</button>
                                    <button type="button" class="btn btn-danger text-left btn-block btn-xs reject_training_btn"><i class="fa fa-times-circle"></i> Reject</button>
                                    <button type="button" class="btn btn-warning text-left btn-block btn-xs amend_training_btn"><i class="fa fa-share-square-o"></i> Amend</button>
                                    
                                </div>
                            </div>
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