<p>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>REFERENCE ID : </b></label>
		</div>
	</div> 
	<div class="col-sm-8">
		<div class="form-group text-left"><?php echo $refid. " - " .$tname?></div>
		<div class="form-group text-left tr_refid" style="display:none"><?php echo $refid?></div>
	</div> 
	<div class="col-sm-2">
		<div class="text-right">
			<button type="button" class="btn btn-danger btn-sm print_offer_mem_btn"><i class="fa fa-print"></i> Print Offer Memo</button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>SUMMARY : </b></label>
		</div>
	</div>

	<div class="container col-md-3">
		<div class="panel panel-default">
			<div class="panel-body" id="summary"><?php echo $summary?></div>
		</div>
	</div>
</div>
<br>
<div class="well">
	<div id="loader"></div>
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_list_sta">
		<thead>
		<tr>
			<th class="text-center">Select</th>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
			<th class="text-center">Department</th>
            <th class="text-center">Role</th>
            <th class="text-center">Apply Date</th>
			<th class="text-center">Attendance Confirmation</th>
            <th class="text-center">Send Memo Status</th>
            <th class="text-center">Evaluation Status</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_tr_list_con)) {
				$counter = 1;
				foreach ($staff_tr_list_con as $stlc) {
					$opFont = '';
					$clFont = '';
					if($stlc->STD_ATTEND == 'Yes (Auto)' || $stlc->STD_ATTEND == 'Yes') {
						$opFont = '<font color="green">';
						$clFont = '</font>';
					}
					if($stlc->STD_ATTEND == 'No') {
						$opFont = '<font color="red">';
						$clFont = '</font>';
					}
					if(empty($stlc->STD_ATTEND)) {
						$opFont = '<font color="blue">';
						$clFont = '</font>';
					}
					echo '
					<tr>
						<td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="applicantID" id="applicantID" value="' . $stlc->SM_STAFF_ID . '" aria-label="...">
							</div>
						</td>
						<td class="text-center col-md-1 sid">' .$opFont. $stlc->SM_STAFF_ID .$clFont. '</td>
						<td class="text-left col-md-3 sname">' . $stlc->SM_STAFF_NAME . '</td>
						<td class="text-center col-md-1">' . $stlc->SM_DEPT_CODE . '</td>
						<td class="text-center col-md-1">' . $stlc->TPR_DESC . '</td>
						<td class="text-center col-md-1">' . $stlc->STHAPPDATE . '</td>
						<td class="text-center col-md-1 attend">' .$opFont. $stlc->STD_ATTEND .$clFont. '</td>
						<td class="text-center col-md-1">' . $stlc->STD_SENDMEMO . '</td>
						<td class="text-center col-md-1">' . $stlc->STH_HOD_EVALUATION . '</td>
						<td class="text-center col-md-1">
							<div class="btn-group">
								<button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
								<div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
									<button type="button" class="btn btn-success text-left btn-block btn-xs edit_app_btn" value='.$refid.'><i class="fa fa-pencil-square-o"></i> Edit</button>
									<button type="button" class="btn btn-info text-left btn-block btn-xs detl_conf_btn" value='.$refid.'><i class="fa fa-info-circle"></i> Other Details</button>
									<button type="button" class="btn btn-info text-left btn-block btn-xs sta_history_btn" value='.$refid.'><i class="fa fa-history"></i> History</button>
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

<br>
<div class="row">
	<div class="text-left col-sm-10">
		<button type="button" class="btn btn-danger btn-sm resend_email_btn" value="<?php echo $refid?>" data-tr-name="<?php echo $tname?>"><i class="fa fa-envelope-o"></i> Resend Email</button>
		<button type="button" class="btn btn-primary btn-sm auto_conf_btn" value="<?php echo $refid?>" data-tr-name="<?php echo $tname?>"><i class="fa fa-check-square"></i> Auto Confirmation</button>
		<button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
		<button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
	</div>
</div>
</p>