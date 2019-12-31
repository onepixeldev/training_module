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

<div class="text-right" id="add_nw_stf">
	<button type="button" class="btn btn-primary btn-sm con_app_add_btn" value="<?php echo $refid?>" data-crname="<?php echo $crName?>"><i class="fa fa-plus"></i> Add New Staff</button>
</div>
<br>
<div class="well">
	<div class="row table-responsive">
		<table class="table table-bordered table-hover table-condensed" id="tbl_list_sta_cr" style="white-space: nowrap, width: 1%;">
		<thead>
		<tr data-crname="<?php echo $crName?>" data-refid="<?php echo $refid?>">
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
			<th class="text-center">Role</th>
			<th class="text-center">Status</th>
			<th class="text-center col-md-2" id="tbl_list_sta_cr_act">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_cr_list)) {
				foreach ($staff_cr_list as $scl) {
					echo '
					<tr>
						<td class="text-center col-md-1 sid">' . $scl->SCM_STAFF_ID . '</td>
						<td class="text-left col-md-4">' . $scl->SM_STAFF_NAME . '</td>
						<td class="text-center col-md-2">' . $scl->CPR_DESC . '</td>
						<td class="text-center col-md-2">' . $scl->SCM_STATUS . '</td>
						<td class="text-center">
							<button type="button" class="btn btn-success btn-xs stacr_edit_btn" value="'.$refid.'" data-crname="'.$crName.'"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs stacr_del_btn" value="'.$refid.'" data-crname="'.$crName.'"><i class="fa fa-trash"></i> Delete</button>
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