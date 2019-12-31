<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>STAFF ID : </b></label>
		</div>
	</div> 
	<div class="col-sm-10">
		<div class="form-group text-left"><?php echo $stfID. " - " .$stfName?></div>
	</div> 
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tr_list_stf">
		<thead>
		<tr>
			<th class="text-center">Training ID</th>
			<th class="text-left">Title</th>
            <th class="text-center">Participant Status</th>
            <th class="text-center">Participant Role</th>
            <th class="text-center">Status</th>
            <th class="text-center">Remark</th>
            <th class="text-center">Completion</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($tr_list)) {
				foreach ($tr_list as $tl) {
					echo '
                    <tr>
						<td class="text-center col-md-2">' . $tl->STH_TRAINING_REFID . '</td>
                        <td class="text-left col-md-3">' . $tl->TH_TRAINING_TITLE . '</td>
                        <td class="text-center col-md-1">' . $tl->TPS_DESC . '</td>
                        <td class="text-center col-md-1">' . $tl->TPR_DESC . '</td>
                        <td class="text-center col-md-1">' . $tl->STH_STATUS . '</td>
                        <td class="text-center col-md-1">' . $tl->STH_REMARK . '</td>
                        <td class="text-center col-md-1">' . $tl->STHCOMPLETE . '</td>
						<td class="text-center col-md-3">
                            <button type="button" class="btn btn-info btn-xs tr_detl_btn"><i class="fa fa-info-circle"></i> Detail</button>
                            <button type="button" class="btn btn-primary btn-xs stf_tr_btn" value='.$stfID.'><i class="fa fa-search"></i> Staff Training</button>
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