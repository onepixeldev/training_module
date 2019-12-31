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

    <div class="form-group">
		<label class="col-md-2 control-label">Staff ID</label>
		<div class="col-md-2">
			<input class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
		</div>

		<div class="col-md-4">
			<input class="form-control" type="text" value="<?php echo $staff_name?>" id="staff_name" readonly>
		</div>
	</div>
</form>
<br>

<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_p_detl"><i class="fa fa-plus"></i> Add Payment Detail</button>
</div>

<br>
<div class="well">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_pymnt_detl">
		<thead>
		<tr>
			<th class="text-center">Cost Code</th>
            <th class="text-left">Description</th>
            <th class="text-center">Amount (RM)</th>
            <th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($pymnt_detl)) {
				foreach ($pymnt_detl as $pd) {
					echo '
                    <tr>
						<td class="text-center col-md-1 cost_code">' . $pd->STCD_COST_CODE . '</td>
                        <td class="text-left col-md-3 cost_desc">' . $pd->TCT_DESC  . '</td>
                        <td class="text-center col-md-1">' . number_format($pd->STCD_AMOUNT, 2) . '</td>
                        <td class="text-center col-md-1">
							<button type="button" class="btn btn-danger text-left btn-xs del_pay_detl"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			} else {
				echo '
                    <tr>
                        <td class="text-center" colspan="4">
							No record found.
						</td>
					</tr>
					';
			}
		?>
		</tbody>
		</table>	
	</div>

    <br>
		
</div>
</p>