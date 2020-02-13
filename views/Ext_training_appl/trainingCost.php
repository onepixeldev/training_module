<p>

<form id="" class="form-horizontal" method="post">
    <div class="form-group">
        <label class="col-md-2 control-label">Refid</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $tr_info->TH_TRAINING_TITLE?>" id="trName" readonly>
        </div>
    </div>
</form>

<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_tr_cost"><i class="fa fa-plus"></i> Add Training Cost</button>
</div>
<br>
<div id="loader"></div>
<div class="well">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_list_trc">
		<thead>
		<tr>
			<th class="text-center">Cost Code</th>
			<th class="text-left">Cost Description</th>
            <th class="text-center">Amount (RM)</th>
            <th class="text-center">Remark</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($tr_cost)) {
				foreach ($tr_cost as $tc) {
					echo '
                    <tr>
						<td class="text-center col-md-2 code">' . $tc->TC_COST_CODE . '</td>
                        <td class="text-left cost_desc">' . $tc->TCT_DESC . '</td>
                        <td class="text-center col-md-1">' . number_format($tc->TC_AMOUNT, 2) . '</td>
                        <td class="text-center col-md-1">' . $tc->TC_REMARK . '</td>
                        <td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                    <button type="button" class="btn btn-success text-left btn-block btn-xs upd_tr_cost"><i class="fa fa-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger text-left btn-block btn-xs del_tr_cost"><i class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
						</td>
					</tr>
					';
				}
			} else {
                echo '<tr class="text-center"><td colspan="5">No record found</td></tr>';
            }
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>