<p>
<form class="form-horizontal">
	<div class="form-group">
		<label class="col-md-2 control-label">Conference Title</label>
		<div class="col-md-2">
			<input class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
		</div>

		<div class="col-md-8">
			<input class="form-control" type="text" value="<?php echo $tr_title?>" id="title" readonly>
		</div>
	</div>
</form>
<br>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm assign_staff"><i class="fa fa-plus"></i> Assign New Staff</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive" style="font-size: 10px;">
		<table class="table table-bordered table-hover" id="tbl_tr_stf_list">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
            <th class="text-center">Department</th>
			<th class="text-center">Role</th>
            <th class="text-center">Status</th>
            <th class="text-center">Fee Category</th>
            <th class="text-center">Fee (RM)</th>
            <th class="text-left col-md-2">Training Benefit (Staff)</th>
			<th class="text-left col-md-2">Training Benefit (Department)</th>
			<th class="text-left col-md-2">Remark (HR)</th>
			<th class="text-left col-md-2">Remark (KTP / Pendaftar / MPE)</th>
			<th class="text-center">Evaluation Status ?</th>
            <th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($stf_list)) {
				foreach ($stf_list as $sl) {
					echo '
                    <tr>
						<td class="text-center col-md-1 staff_id">' . $sl->STH_STAFF_ID . '</td>
                        <td class="text-left col-md-3 name">' . $sl->SM_STAFF_NAME . '</td>
						<td class="text-center col-md-1">' . $sl->STAFF_DEPT . '</td>
						<td class="text-center col-md-1">' . $sl->TPR_DESC . '</td>
                        <td class="text-center col-md-1 sth_status">' . $sl->STH_STATUS . '</td>
                        <td class="text-center col-md-2">' . $sl->FEE_CODE_DESC . '</td>
						<td class="text-center col-md-1">' . number_format($sl->TC_AMOUNT,2) . '</td>


						<td class="text-left col-md-2">' . $sl->STH_STAFF_TRAINING_BENEFIT . '</td>
						<td class="text-left col-md-2">' . $sl->STH_DEPT_TRAINING_BENEFIT . '</td>
						<td class="text-left col-md-2">' . $sl->STH_RECOMMENDER_REASON . '</td>
						<td class="text-left col-md-2">' . $sl->STH_APPROVE_REASON . '</td>

						<td class="text-center col-md-1">' . $sl->STH_HOD_EVALUATION2 . '</td>

						<td class="text-center col-md-1">
							<div class="btn-group">
								<button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
								<div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">

									<button type="button" class="btn btn-success text-left btn-block btn-xs upd_staff"><i class="fa fa-edit"></i> Edit</button>

									<button type="button" class="btn btn-primary text-left btn-block btn-xs tr_detl_btn"><i class="fa fa-info-circle"></i> Training Details</button>

									<button type="button" class="btn btn-info text-left btn-block btn-xs tr_history"><i class="fa fa-history"></i> History</button>

									<button type="button" class="btn btn-danger text-left btn-block btn-xs print_btn"><i class="fa fa-print"></i> Print</button>

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