<div class="alert alert-info fade in">
    <b>Allowance Details</b>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ad_list">
		<thead>
		<tr>
            <th class="text-center hidden">Allowance Code</th>
			<th class="text-left">Allowance</th>
			<th class="text-center">Amount (RM)</th>
            <th class="text-center">Amount Foreign (RM)</th>
            <th class="text-center">Approved RMIC (RM)</th>
            <th class="text-center">Approved RMIC - Foreign (RM)</th>
            <th class="text-center">Approved TNCPI (RM)</th>
            <th class="text-center">Approved TNCPI - Foreign (RM)</th>
            <th class="text-center">Approved TNCA (RM)</th>
            <th class="text-center">Approved TNCA - Foreign  (RM)</th>
            <th class="text-center">Approved VC (RM)</th>
            <th class="text-center">Approved VC - Foreign (RM)</th>
            <th class="text-center">Select</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($research_allw_detl)) {
				foreach ($research_allw_detl as $rad) {
					echo '
                    <tr>
                        <td class="text-center col-md-1 hidden">' . $rad->SCA_ALLOWANCE_CODE . '</td>
						<td class="text-left">' . $rad->CA_DESC . '</td>
                        <td class="text-center col-md-1">
                            <input name="sca_amount_rm" class="form-control" type="number" id="amount" value="' . $rad->SCA_AMOUNT_RM . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amount_foreign" class="form-control" type="number" id="amountFor" value="' . $rad->SCA_AMOUNT_FOREIGN . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_rm_approve_rmic" class="form-control" type="number" id="amountAppRmic" value="' . $rad->SCA_AMT_RM_APPROVE_RMIC . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_foreign_approve_rmic" class="form-control" type="number" id="amountAppForRmic" value="' . $rad->SCA_AMT_FOREIGN_APPROVE_RMIC . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_rm_approve_tncpi" class="form-control" type="number" id="amountAppTncpi" value="' . $rad->SCA_AMT_RM_APPROVE_TNCPI . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_foreign_approve_tncpi" class="form-control" type="number" id="amountAppForTncpi" value="' . $rad->SCA_AMT_FOREIGN_APPROVE_TNCPI . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_rm_approve_tnca" class="form-control" type="number" id="amountAppTnca" value="' . $rad->SCA_AMT_RM_APPROVE_TNCA . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_foreign_approve_tnca" class="form-control" type="number" id="amountAppTncaFor" value="' . $rad->SCA_AMT_FOREIGN_APPROVE_TNCA . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_rm_approve_vc" class="form-control" type="number" id="amountAppVc" value="' . $rad->SCA_AMT_RM_APPROVE_VC . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="sca_amt_foreign_approve_vc" class="form-control" type="number" id="amountAppForVc" value="' . $rad->SCA_AMT_FOREIGN_APPROVE_VC . '">
                        </td>
                        <td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="allwCode" id="allwCode" value="' . $rad->SCA_ALLOWANCE_CODE . '" aria-label="...">
							</div>
						</td>
					</tr>
					';
                }
                echo '
                    <tr>
                        <td class="text-right col-md-1"><b>Total (RM)</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amount_rm, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amount_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_rm_approve_rmic, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_foreign_approve_rmic, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_rm_approve_tncpi, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_foreign_approve_tncpi, 2) . '</b></td>
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
						<td class="text-center" colspan="12">No record found</td>
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
            <button type="button" class="btn btn-primary btn-sm save_allw_detl_rc_vc" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staff_id?>"><i class="fa fa-floppy-o"></i> Save</button>
            <button type="button" class="btn btn-warning btn-sm calculate_amt_rc_vc" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staff_id?>"><i class="fa fa-calculator"></i> Calculate</button>
            <!--<button type="button" class="btn btn-danger btn-sm clear_val_tnca" value="<?php echo ''?>" data-tr-name="<?php echo ''?>"><i class="fa fa-eraser"></i> Clear Value Approved TNCA</button>-->
            <button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
            <button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
        </div>
    </div>
</div>