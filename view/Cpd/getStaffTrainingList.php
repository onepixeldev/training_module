<form id="" class="form-horizontal" method="post">
    <div class="form-group">
        <label class="col-md-2 control-label">Training Title</label>
        <div class="col-md-2">
            <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $title?>" id="title" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><b>Status</b></label>
        <div class="col-md-2">
                <?php echo form_dropdown('sStatus', $status_dd, $status, 'class="form-control listFilter" id="sStatus"'); ?>
        </div>
    </div>

    <br>
</form>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_stf_list">
		<thead>
		<tr>
            <th class="text-center">Select</th>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
            <th class="text-center">Department</th>
            <th class="text-center">Report Status</th>
            <th class="text-center">Submission Date</th>
            <th class="text-center">Recommendation Date (HOD)</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_list)) {
				foreach ($staff_list as $sl) {

                    if($sl->STH_CPD_REPORT == 'Y') {
                        $is_submit = 'APPROVE';
                    } else {
                        $is_submit = 'NO SUBMISSION';
                    }

                    if($is_submit == 'NO SUBMISSION') {
                        $submission_date = $sl->STR_APPLY_DATE;
                        $recommendation_date = $sl->STR_RECOMMEND_DATE;

                        if(!empty($sl->STR_STATUS)) {
                            $sth_report_status = $sl->STR_STATUS;
                        } else {
                            $sth_report_status = $is_submit;
                        }
                    } else {
                        $sth_report_status = $is_submit;

                        if($is_submit == 'APPROVE') {
                            if(!empty($sl->STR_STATUS)) {
                                $submission_date = $sl->STR_APPLY_DATE;
                                $recommendation_date = $sl->STR_RECOMMEND_DATE;
                            } else {
                                if($sl->STH_CPD_REPORT == 'Y') {
                                    $submission_date = $sl->STH_CPD_REPORT_DATE;
                                    $recommendation_date = $sl->STH_CPD_REPORT_DATE;
                                } else {
                                    $submission_date = $sl->STH_CPD_REPORT_DATE;
                                    $sth_report_status = 'SUBMIT';
                                }
                            }
                        }
                    }

					echo '
                    <tr>
                        <td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static chkStaffId" type="checkbox" name="chkStaffId" id="chkStaffId" value="' . $sl->STH_STAFF_ID  . '" aria-label="...">
							</div>
						</td>
                        <td class="text-center col-md-1 staff_id">' . $sl->STH_STAFF_ID . '</td>
                        <td class="text-left staff_name">' . $sl->SM_STAFF_NAME . '</td>
                        <td class="text-center col-md-1">' . $sl->SM_DEPT_CODE . '</td>
                        <td class="text-center col-md-2">' . $sth_report_status . '</td>
                        <td class="text-center col-md-1">' . $submission_date . '</td>
                        <td class="text-center col-md-1">' . $recommendation_date . '</td>
						<td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                    <button type="button" class="btn btn-info text-left btn-block btn-xs rep_sub_detl"><i class="fa fa-info-circle"></i> Detail</button>
                                    <button type="button" class="btn btn-danger text-left btn-block btn-xs print_rep"><i class="fa fa-print"></i> Print</button>
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
    <div class="row">
        <div class="text-left">
            <button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
            <button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
            <button type="button" class="btn btn-primary btn-sm approve_by_staff"><i class="fa fa-check-square"></i> Approve by Staff</button>
        </div>
    </div>
</div>
</p>