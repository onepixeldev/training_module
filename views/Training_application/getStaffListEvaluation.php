<p>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>REFERENCE ID : </b></label>
		</div>
	</div> 
	<div class="col-sm-8">
		<div class="form-group text-left"><?php echo $refid. " - " .$tname?></div>
	</div> 
</div>
<div class="row">
	<div class="col-sm-12 text-right">
		<button type="button" class="btn btn-danger btn-sm eva_report_btn" value="<?php echo $refid?>" data-form-code="ATR276"><i class="fa fa-file-pdf-o"></i> Evaluation Report</button>
	</div>
</div>
<br>
<div class="well">
	<div id="loader"></div>
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_list_sta_eva">
		<thead>
		<tr>
			<th class="text-center">Select</th>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
			<th class="text-center">Department</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_list_eva)) {
				foreach ($staff_list_eva as $sle) {
					echo '
					<tr>
						<td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="applicantID" id="applicantID" value="' . $sle->STF_ID. '" aria-label="...">
							</div>
						</td>
						<td class="text-center col-md-1 sid">' . $sle->STF_ID . '</td>
						<td class="text-left col-md-3 sname">' . $sle->STF_N1 . '</td>
						<td class="text-center col-md-1">' . $sle->STF_DEPT1 . '</td>
                        <td class="text-center col-md-2">
                            <button type="button" class="btn btn-info text-left btn-xs sta_eva_detl_btn" value='.$refid.'><i class="fa fa-info-circle"></i> Details</button>
                            <button type="button" class="btn btn-success text-left btn-xs sta_eva_edit_btn" value='.$refid.'><i class="fa fa-pencil-square-o"></i> Edit</button>
                            <button type="button" class="btn btn-danger text-left btn-xs sta_eva_print_btn" value='.$refid.' data-staff-id='.$sle->STF_ID.' data-form-code="STAFF_EVA_REP"><i class="fa fa-print"></i> Print</button>
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

<br>
<div class="row">
	<div class="col-sm-10">
		<button type="button" class="btn btn-primary btn-sm proc_eva_id_btn" value="<?php echo $refid?>" data-tr-name="<?php echo $tname?>"><i class="fa fa-cog"></i> Process Evaluator ID</button>
		<button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
		<button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
	</div>
</div>
</p>