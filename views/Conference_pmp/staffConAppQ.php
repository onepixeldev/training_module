<form id="addConferenceLeave" class="form-horizontal" method="post">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[conference_title]" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[conference_name]" class="form-control" type="text" value="<?php echo $crname?>" id="crName" readonly>
        </div>
    </div>
</form>
<div class="alert alert-info fade in">
	<b>Staff Conference Application</b>
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_sca_list">
		<thead>
		<tr>
			<th class="text-left col-md-3">Staff ID</th>
            <th class="text-center col-md-1">Department</th>
            <th class="text-left col-md-1">Role</th>
            <th class="text-center col-md-1">Budget Origin</th>
            <th class="text-center col-md-1">Applied (RM) (Conference / PTNCA)</th>
			<th class="text-center col-md-1">Applied (RM) (Department)</th>
			<th class="text-center col-md-1">Approved (RM) HOD (Conference / PTNCA)</th>
			<th class="text-center col-md-1">Approved (RM) HOD (Department)</th>
			<th class="text-center col-md-1">Approved (RM) (TNCA)</th>
			<th class="text-center col-md-1">Approved (RM) (VC)</th>
			<th class="text-center col-md-1">Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($stf_con_appl)) {
				foreach ($stf_con_appl as $sca) {
					echo '
                    <tr>
						<td class="text-left">' . $sca->STF_ID_NAME . '</td>
                        <td class="text-center">' . $sca->SM_DEPT_CODE . '</td>
                        <td class="text-left">' . $sca->SCM_PARTICIPANT_ROLE . '</td>
                        <td class="text-center">' . $sca->SCM_BUDGET_ORIGIN . '</td>
						<td class="text-center">' . number_format($sca->SCM_RM_TOTAL_AMT,2) . '</td>
						<td class="text-center">' . number_format($sca->SCM_RM_TOTAL_AMT_DEPT,2) . '</td>
						<td class="text-center">' . number_format($sca->SCM_RM_TOTAL_AMT_APPROVE_HOD,2) . '</td>
						<td class="text-center">' . number_format($sca->SCM_TOTAL_AMT_DEPT_APPRV_HOD,2) . '</td>
						<td class="text-center">' . number_format($sca->SCM_RM_TOTAL_AMT_APPROVE_TNCA,2) . '</td>
						<td class="text-center">' . number_format($sca->SCM_RM_TOTAL_AMT_APPROVE_VC,2) . '</td>
						<td class="text-center">' . $sca->SCM_STATUS . '</td>
						<td class="text-center col-md-1">
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                            <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
								<button type="button" class="btn btn-danger text-left btn-block btn-xs print_pmp" value="'.$sca->SCM_STAFF_ID.'"><i class="fa fa-print"></i> PMP</button>
                                <button type="button" class="btn btn-danger text-left btn-block btn-xs print_lmp" value="'.$sca->SCM_STAFF_ID.'"><i class="fa fa-print"></i> LMP</button>
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
</p>