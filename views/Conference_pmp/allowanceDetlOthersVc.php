<div class="alert alert-info fade in">
    <b>Allowance Details</b>
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ad_list">
		<thead>
		<tr>
            <th class="text-center">Allowance Code</th>
			<th class="text-left">Allowance</th>
			<th class="text-center">Amount (RM)</th>
            <th class="text-center">Amount Foreign (RM)</th>
            <th class="text-center">Approved TNCA (RM)</th>
            <th class="text-center">Approved TNCA - Foreign (RM)</th>
            <th class="text-center">Approved VC (RM)</th>
            <th class="text-center">Approved VC - Foreign (RM)</th>
            <th class="text-center">Select</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($other_allw_detl)) {
				foreach ($other_allw_detl as $oad) {
					echo '
                    <tr>
                        <td class="text-center col-md-1">' . $oad->SCA_ALLOWANCE_CODE . '</td>
						<td class="text-left">' . $oad->CA_DESC . '</td>
                        <td class="text-center col-md-1">
                            <input name="sca_amount_rm" class="form-control" type="number" id="amount" value="' . $oad->SCA_AMOUNT_RM . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amount_foreign" class="form-control" type="number" id="amountFor" value="' . $oad->SCA_AMOUNT_FOREIGN . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_rm_approve_tnca" class="form-control" type="number" id="amountAppTnca" value="' . $oad->SCA_AMT_RM_APPROVE_TNCA . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_foreign_approve_tnca" class="form-control" type="number" id="amountAppTncaFor" value="' . $oad->SCA_AMT_FOREIGN_APPROVE_TNCA . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_rm_approve_vc" class="form-control" type="number" id="amountAppVc" value="' . $oad->SCA_AMT_RM_APPROVE_VC . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_foreign_approve_vc" class="form-control" type="number" id="amountAppForVc" value="' . $oad->SCA_AMT_FOREIGN_APPROVE_VC . '">
                        </td>
                        <td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="allwCode" id="allwCode" value="' . $oad->SCA_ALLOWANCE_CODE . '" aria-label="...">
							</div>
						</td>
					</tr>
					';
                }
                echo '
                    <tr>
                        <td class="text-right col-md-1" colspan="2"><b>Total (RM)</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amount_rm, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amount_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_rm_approve_tnca, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_foreign_approve_tnca, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_rm_approve_vc, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_foreign_approve_vc, 2) . '</b></td>
                        <td class="text-center col-md-1"></td>
                    </tr>
                    ';
			} else {
                echo '
                    <tr>
						<td class="text-center" colspan="9">No record found</td>
					</tr>
					';
            }
		?>
		</tbody>
		</table>	
	</div>

    <br>
    <div class="row">
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-sm save_allw_detl_oth_vc" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staff_id?>"><i class="fa fa-floppy-o"></i> Save</button>
            <button type="button" class="btn btn-warning btn-sm calculate_amt_oth_vc" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staff_id?>"><i class="fa fa-calculator"></i> Calculate</button>
            <!--<button type="button" class="btn btn-danger btn-sm clear_val_tnca" value="<?php echo ''?>" data-tr-name="<?php echo ''?>"><i class="fa fa-eraser"></i> Clear Value Approved TNCA</button>-->
            <button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
            <button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
        </div>
    </div>
</div>
</p>