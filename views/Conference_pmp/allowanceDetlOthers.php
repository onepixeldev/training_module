<div class="alert alert-info fade in">
    <b>Allowance Details</b>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ad_list">
		<thead>
		<tr>
            <th class="text-center">Allowance Code</th>
			<th class="text-left">Allowance</th>
			<th class="text-center">Amount (RM)</th>
            <th class="text-center">Amount Foreign (RM)</th>
            <th class="text-center">Approved HOD (RM)</th>
            <th class="text-center">Approved HOD - Foreign (RM)</th>
            <th class="text-center">Approved TNCA (RM)</th>
            <th class="text-center">Approved TNCA - Foreign (RM)</th>
            <th class="text-center">Select</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($other_allw_detl)) {
				foreach ($other_allw_detl as $oad) {
					echo '
                    <tr>
                        <td class="text-center staff_id col-md-1">' . $oad->SCA_ALLOWANCE_CODE . '</td>
						<td class="text-left staff_id">' . $oad->CA_DESC . '</td>
                        <td class="text-center col-md-1">
                            <input name="SCA_AMOUNT_RM" class="form-control" type="number" id="amount" value="' . number_format($oad->SCA_AMOUNT_RM, 2) . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="SCA_AMOUNT_FOREIGN" class="form-control" type="number" id="amountFor" value="' . number_format($oad->SCA_AMOUNT_FOREIGN, 2) . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="SCA_AMT_RM_APPROVE_HOD" class="form-control" type="number" id="amountAppHod" value="' . number_format($oad->SCA_AMT_RM_APPROVE_HOD, 2) . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="SCA_AMT_FOREIGN_APPROVE_HOD" class="form-control" type="number" id="amountAppHodFor" value="' . number_format($oad->SCA_AMT_FOREIGN_APPROVE_HOD, 2) . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="SCA_AMT_RM_APPROVE_TNCA" class="form-control" type="number" id="amountAppTnca" value="' . number_format($oad->SCA_AMT_RM_APPROVE_TNCA, 2) . '">
                        </td>
                        <td class="text-center col-md-1">
                            <input name="SCA_AMT_FOREIGN_APPROVE_TNCA" class="form-control" type="number" id="amountAppTncaFor" value="' . number_format($oad->SCA_AMT_FOREIGN_APPROVE_TNCA, 2) . '">
                        </td>
                        <td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="applicantID" id="applicantID" value="' . $oad->SCA_ALLOWANCE_CODE . '" aria-label="...">
							</div>
						</td>
					</tr>
					';
                }
                echo '
                    <tr>
                        <td class="text-right col-md-1" colspan="2"><b>Total</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amount_rm, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amount_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_rm_approve_hod, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_foreign_approve_hod, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_rm_approve_tnca, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_sca_amt_foreign_approve_tnca, 2) . '</b></td>
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
</div>