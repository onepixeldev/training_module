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
<div class="well">
	<div class="row table-condensed table-responsive" style="font-size: 11px;">
		<table class="table table-bordered table-hover" id="tbl_tr_stf_list">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
            <th class="text-center">Job Status</th>
            <th class="text-center">Status</th>
            <th class="text-center">Apply Date</th>
            <th class="text-center">Fee Category</th>
            <th class="text-center">Fee (RM)</th>
			<th class="text-center">KTP</th>
			<th class="text-center">Registrar</th>
            <th class="text-center">Remark</th>
            <th class="text-center">Action</th>
            <th class="text-center">Select</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($stf_list)) {
				foreach ($stf_list as $sl=>$val) {
					echo '
                    <tr>
						<td class="text-center col-md-1 staff_id">' . $val['STAFF_ID'] . '</td>
                        <td class="text-left col-md-3 name">' . $val['sname'] . '</td>
                        <td class="text-center col-md-2">' . $val['sjs_desc'] . '</td>
                        <td class="text-center col-md-1">' . $val['status'] . '</td>
                        <td class="text-center col-md-1">' . $val['appl_date'] . '</td>
                        <td class="text-center col-md-2">' . $val['fee_code_desc'] . '</td>
						<td class="text-center col-md-1">' . number_format($val['cost'], 2) . '</td>
						<td class="text-center col-md-1 ktp">' . $val['KTP'] . '</td>
						<td class="text-center col-md-1 reg">' . $val['REG'] . '</td>
						<td class="text-center col-md-2">
							<div class="form-group">
								<div class="col-md-9">
									<input name="remark" placeholder="remark" class="form-control" type="text" value="'. $val['remark'] .'">
								</div>
							</div>
						</td>
                        <td class="text-center col-md-1">
                            <button type="button" class="btn btn-info text-left btn-xs tr_history"><i class="fa fa-history"></i> History</button>
                        </td>
                        <td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="allwCode" id="allwCode" value="' . $val['STAFF_ID'] . '" aria-label="...">
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

    <br>

	<div class="row">
		<div class="text-left col-md-6">
			<button type="button" class="btn btn-primary btn-sm app_stf"><i class="fa fa-check-square"></i> Approve</button>
			<button type="button" class="btn btn-danger btn-sm rej_stf"><i class="fa fa-times-circle"></i> Reject</button>
			<button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
			<button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
		</div>

		<div class="text-right">
			<div class="container col-md-6">
				<div class="panel panel-default text-left">

					<div class="panel-body" id="summary">
						<div class="panel-body">

							<div class="text-center">
								<div class="row">
									<label class="control-label"><b>Approval for KTP / REGISTRAR Only</b></label>
								</div>
								<div class="row">

									<div class="btn-group">
										<button type="button" class="btn btn-primary btn-sm app_ktp_reg"><i class="fa fa-check-square"></i> Approve (KTP / REGISTRAR)</button>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-danger btn-sm rej_ktp_reg"><i class="fa fa-times-circle"></i> Reject (KTP / REGISTRAR)</button>
									</div>
								</div>
							</div>
							
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
		
</div>
</p>