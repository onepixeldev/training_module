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
            <th class="text-center">Remark</th>
            <th class="text-center">Action</th>
            <th class="text-center">Select</th>
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
                        <td class="text-center col-md-2">' . $sl->SJS_STATUS_DESC . '</td>
                        <td class="text-center col-md-1">' . $sl->STH_STATUS . '</td>
                        <td class="text-center col-md-1">' . $sl->STH_APPLY_DATE2 . '</td>
                        <td class="text-center col-md-2">' . $sl->FEE_CODE_DESC . '</td>
						<td class="text-center col-md-1">' . number_format($sl->TC_AMOUNT,2) . '</td>
						<td class="text-center col-md-2">
							<div class="form-group">
								<div class="col-md-9">
									<input name="remark" placeholder="remark" class="form-control" type="text" value="'. $sl->STH_APPROVE_REASON .'">
								</div>
							</div>
						</td>
                        <td class="text-center col-md-1">
                            <button type="button" class="btn btn-info text-left btn-xs tr_history"><i class="fa fa-history"></i> History</button>
                        </td>
                        <td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="allwCode" id="allwCode" value="' . $sl->STH_STAFF_ID . '" aria-label="...">
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
        <div class="form-group text-left col-md-12">
            <label class="col-md-1 control-label"><b> MPE Date :</b></label>
            <div class="col-md-2">
                <input name="mpe_date" placeholder="DD/MM/YYYY" class="form-control mpe_date" type="text" id="mpe_date">
            </div>
		</div>
		<div class="form-group text-left col-md-12">
			<button type="button" class="btn btn-primary btn-sm app_stf"><i class="fa fa-check-square"></i> Approve</button>
			<button type="button" class="btn btn-danger btn-sm rej_stf"><i class="fa fa-times-circle"></i> Reject</button>
			<button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
			<button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
		</div>
	</div>
		
</div>
</p>

<script>
	$(document).ready(function(){
        $('#mpe_date').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });
	});
</script>