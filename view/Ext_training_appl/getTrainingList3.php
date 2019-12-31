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
                            <button type="button" class="btn btn-success text-left btn-xs upd_tr"><i class="fa fa-edit"></i> Edit</button>
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