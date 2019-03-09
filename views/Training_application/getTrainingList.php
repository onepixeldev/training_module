<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_tr_list">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
			<th class="text-center">Code</th>
            <th class="text-left">Title</th>
            <th class="text-center">Date From</th>
            <th class="text-center">Date To</th>
			<th class="text-center col-md-5">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($tr_list)) {
				foreach ($tr_list as $trl) {
					echo '
                    <tr>
						<td class="text-center">' . $trl->TH_REF_ID . '</td>
                        <td class="text-center">' . $trl->TH_TRAINING_CODE . '</td>
                        <td class="text-left col-md-6">' . $trl->TH_TRAINING_TITLE . '</td>
                        <td class="text-center">' . $trl->TH_DATE_FROM . '</td>
                        <td class="text-center">' . $trl->TH_DATE_TO . '</td>
                        <td class="text-center col-md-1">
							<button type="button" class="btn btn-info btn-xs select_training_btn"><i class="fa fa-crosshairs"></i> Select</button>
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