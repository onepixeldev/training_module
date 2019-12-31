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
<p>
<div class="row">
	<div class="text-right col-sm-12">
		<button type="button" class="btn btn-primary btn-sm assign_stf_batch_btn" id="assignStfBatch" value="<?php echo $refid ?>" data-trname="<?php echo $tname;?>"><i class="fa fa-plus"></i> Assign new staff (Batch)</button>
		<button type="button" class="btn btn-primary btn-sm assign_stf_btn" id="assignStf" value="<?php echo $refid ?>"><i class="fa fa-plus"></i> Assign new staff (Individual)</button>
	</div>
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_list_sass">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
			<th class="text-center">Department</th>
            <th class="text-center">Role</th>
            <th class="text-center">Status</th>
            <th class="text-center">Remark</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_asstr_list)) {
				foreach ($staff_asstr_list as $sal) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $sal->SM_STAFF_ID . '</td>
						<td class="text-left col-md-3">' . $sal->SM_STAFF_NAME . '</td>
                        <td class="text-center col-md-1">' . $sal->SM_DEPT_CODE . '</td>
                        <td class="text-center col-md-1">' . $sal->TPR_DESC . '</td>
                        <td class="text-center col-md-1">' . $sal->STH_STATUS . '</td>
						<td class="text-center col-md-2">'.$sal->STH_REMARK.'</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs sta_edit_btn" value='.$refid.'><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs sta_del_btn" value='.$refid.'><i class="fa fa-times-circle"></i> Delete</button>
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