<div class="modal-header btn-primary">
	<h4 class="modal-title" id="myModalLabel"><b>Staff List</b></h4>
</div>
<br>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>Department : </b></label>
		</div>
	</div> 
	<div class="col-sm-8">
        <?php
            echo form_dropdown('form[department]', $dept_list, $curUsrDept, 'class="selectpicker form-control width-50" data-refid='.$refid.' id="deptList"')
        ?>
	</div> 
</div>
<div class="form-group well">
	<table class="table table-bordered table-hover" id="staff_list_tbl">
		<thead>
			<tr>
                <th class="text-center col-md-1">Select</th>
				<th class="text-center col-md-1">Staff ID</th>
				<th class="text-left">Name</th>
                <th class="text-center col-md-1">Department</th>
				<th class="text-center col-md-1">Role</th>
				<th class="text-center col-md-1">Status</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if (!empty($staff_list)) {
					foreach ($staff_list as $sl) {
						echo '
                        <tr>
                            <td class="text-center col-md-1">
                                <div class="form-check text-center">
                                    <input class="form-check-input position-static checkitem" type="checkbox" name="applicantID" id="applicantID" value="' . $sl->SM_STAFF_ID . '" aria-label="...">
                                </div>
                            </td>
                            <td class="text-left sid">' . $sl->SM_STAFF_ID . '</td>
                            <td class="text-left">' . $sl->SM_STAFF_NAME . '</td>
                            <td class="text-left">' . $sl->SM_DEPT_CODE . '</td>
							<td class="text-center col-md-1">' . form_dropdown('form[role]', $role_list, 'D', 'class="selectpicker form-control width-50" id="roleList"') .'</td>
							<td class="text-left">' . form_dropdown('form[status]', $sts_list, 'RECOMMEND', 'class="selectpicker form-control width-50" id="stsList"') .'</td>
						</tr>
						';
					}
				}
			?>
		</tbody>
	</table>

	<div class="modal-footer">
        <div class="row">
            <div class="text-left">
                <button type="button" class="btn btn-primary btn-sm assign_staff_batch" value="<?php echo $refid?>" ><i class="fa fa-plus"></i> Assign Staff</button>
                <button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
                <button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
        </div>
	</div>
</div>

