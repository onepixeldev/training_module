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
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_tr_stf_list">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
            <th class="text-center">Total Amount (RM)</th>
            <th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($stf_cost)) {
				foreach ($stf_cost as $sc) {
					echo '
                    <tr>
						<td class="text-center col-md-1 staff_id">' . $sc->STCM_STAFF_ID . '</td>
                        <td class="text-left col-md-3 name">' . $sc->SM_STAFF_NAME  . '</td>
                        <td class="text-center col-md-1">' . number_format($sc->STCM_TOTAL_AMOUNT, 2) . '</td>
                        <td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                    <button type="button" class="btn btn-info text-left btn-block btn-xs payment_detl" value=""><i class="fa fa-info-circle"></i> Payment Details</button>
                                    <button type="button" class="btn btn-success text-left btn-block btn-xs upd_stf_cost" value=""><i class="fa fa-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger text-left btn-block btn-xs del_tr_cost hidden" value=""><i class="fa fa-trash"></i> Delete</button>
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

    <br>
		
</div>
</p>