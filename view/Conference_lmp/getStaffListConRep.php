<p>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>REFERENCE ID : </b></label>
		</div>
	</div> 
	<div class="col-sm-10">
		<div class="form-group text-left"><?php echo $refid. " - " .$crName?></div>
	</div> 
</div>
<br>
<div class="well">
	<div class="row table-responsive">
		<table class="table table-bordered table-hover table-condensed" id="tbl_list_sta_cr" style="white-space: nowrap, width: 1%;">
		<thead>
		<tr data-crname="<?php echo $crName?>" data-refid="<?php echo $refid?>">
			<th class="text-center col-md-1">Staff ID</th>
            <th class="text-left col-md-4">Name</th>
			<th class="text-center col-md-1">Report Submission Date</th>
			<th class="text-center col-md-1">Status</th>
			<th class="text-center col-md-2">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_cr_list)) {
				foreach ($staff_cr_list as $scl) {
					echo '
					<tr>
						<td class="text-center sid">' . $scl->SCR_STAFF_ID . '</td>
						<td class="text-left">' . $scl->SM_STAFF_NAME . '</td>
						<td class="text-center">' . $scl->SCR_APPLY_DATE . '</td>
						<td class="text-center">' . $scl->SCR_STATUS . '</td>
						<td class="text-center">
							<button type="button" class="btn btn-success btn-xs rep_edit_btn" value="'.$refid.'"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs rep_del_btn" value="'.$refid.'"><i class="fa fa-trash"></i> Delete</button>
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