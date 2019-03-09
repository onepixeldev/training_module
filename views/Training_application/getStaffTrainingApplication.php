<p>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>REFERENCE ID : </b></label>
		</div>
	</div> 
	<div class="col-sm-10">
		<div class="form-group text-left"><?php echo $refid. " - " .$tname?></div>
	</div> 
</div>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_sta">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
			<th class="text-center">Email</th>
            <th class="text-center">Remark</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_tr_list)) {
				foreach ($staff_tr_list as $stl) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $stl->SM_STAFF_ID . '</td>
						<td class="text-left col-md-4">' . $stl->SM_STAFF_NAME . '</td>
						<td class="text-center col-md-2">' . $stl->SM_EMAIL_ADDR . '</td>
						<td class="text-center col-md-1">
						<div class="form-group">
							<div class="col-md-9">
								<input name="" placeholder="Remark" class="form-control" type="text" id="appRemark">
							</div>
						</div>
						</td>
						<td class="text-center col-md-5">
							<button type="button" class="btn btn-danger btn-xs sta_appsm_btn" value='.$refid.'><i class="fa fa-check-square"></i> Approve & Send Email</button>
							<button type="button" class="btn btn-primary btn-xs sta_detl_btn" value='.$refid.'><i class="fa fa-info-circle"></i> Detail</button>
							<button type="button" class="btn btn-info btn-xs sta_history_btn"><i class="fa fa-history"></i> History</button>
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