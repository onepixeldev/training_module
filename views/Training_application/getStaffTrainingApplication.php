<p>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>REFERENCE ID : </b></label>
		</div>
	</div> 
	<div class="col-sm-10">
		<div class="form-group text-left"><?php echo $refid. " - " .$tname?></div>
		<div class="form-group text-left app_stf_tr_name" style="display:none"><?php echo $tname?></div>
	</div> 
</div>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_sta">
		<thead>
		<tr>
			<th class="text-center">Select</th>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
			<th class="text-center">Email</th>
			<th class="text-center">Department</th>
			<th class="text-center">Job Status</th>
			<th class="text-center">Evaluator ID</th>
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
						<td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="applicantID" id="applicantID" value="' . $stl->SM_STAFF_ID . '" aria-label="...">
							</div>
						</td>
						<td class="text-center col-md-1 sid">' . $stl->SM_STAFF_ID . '</td>
						<td class="text-left col-md-3">' . $stl->SM_STAFF_NAME . '</td>
						<td class="text-center col-md-2">' . $stl->SM_EMAIL_ADDR . '</td>
						<td class="text-center col-md-2">' . $stl->SM_DEPT_CODE . '</td>
						<td class="text-center col-md-2">' . $stl->SJS_STATUS_DESC . '</td>
						<td class="text-center col-md-2">' . $stl->STAFFEVA . '</td>
						<td class="text-center col-md-1">
						<div class="form-group">
							<div class="col-md-9">
								<input name="remark" placeholder="remark" class="form-control" type="text" id="appRemark">
							</div>
						</div>
						</td>
						<td class="text-center col-md-2">
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

<br>
<div class="row">
	<div class="text-left col-sm-10">
		<button type="button" class="btn btn-primary btn-sm sta_appsm_btn" value="<?php echo $refid?>" data-tr-name="<?php echo $tname?>"><i class="fa fa-check-square"></i> Approve & Send Email</button>
		<button type="button" class="btn btn-danger btn-sm sta_reject_btn" value="<?php echo $refid?>" data-tr-name="<?php echo $tname?>"><i class="fa fa-times-circle"></i> Reject</button>
		<button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
		<button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
	</div>
</div>
</p>