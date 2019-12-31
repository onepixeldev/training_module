<form id="addConferenceAllowance" class="form-horizontal" method="post">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $crStaffName?>" id="staff_name" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[conference_title]" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[conference_name]" class="form-control" type="text" value="<?php echo $crName?>" id="crName" readonly>
        </div>
    </div>

<div class="alert alert-info fade in">
    <b>Allowances Details</b>
</div>
<p>
<div class="well">
    <div class="row table-condensed table-responsive">
        <table class="table table-bordered table-hover" id="tbl_stf_cr_allw_detl_query">
        <thead>
        <tr>
            <th class="text-center">Code</th>
            <th class="text-left">Allowance</th>
            <th class="text-center">Apply (RM)</th>
            <th class="text-center">Apply (Foreign)</th>
            <th class="text-center">Approved HOD (RM)</th>
            <th class="text-center">Approved HOD (Foreign)</th>
            <th class="text-center">Approved RMIC (RM)</th>
            <th class="text-center">Approved RMIC (Foreign)</th>
            <th class="text-center">Approved TNCPI (RM)</th>
            <th class="text-center">Approved TNCPI (Foreign))</th>
            <th class="text-center">Approved TNCA (RM)</th>
            <th class="text-center">Approved TNCA (Foreign)</th>
            <th class="text-center">Approved VC (RM)</th>
            <th class="text-center">Approved VC (Foreign)</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if (!empty($stf_cr_allw)) {
                foreach ($stf_cr_allw as $sca) {
                    echo '
                    <tr>
                        <td class="text-center col-md-1 sca_code">' . $sca->SCA_ALLOWANCE_CODE . '</td>
                        <td class="text-left col-md-2 sca_desc">' . $sca->CA_DESC . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMOUNT_RM, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMOUNT_FOREIGN, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_RM_APPROVE_HOD, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_HOD, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_RM_APPROVE_RMIC, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_RMIC, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_RM_APPROVE_TNCPI, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_TNCPI, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_RM_APPROVE_TNCA, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_TNCA, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_RM_APPROVE_VC, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_VC, 2) . '</td>
                    </tr>
                    ';
                }
                echo '
                    <tr>
                        <td class="text-right col-md-1" colspan="2"><b>Total</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_apply, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_apply_foreign, 2) . '<b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_hod, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_hod_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_app_rmic, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_app_rmic_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_app_tncpi, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_app_tncpi_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_tnca, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_tnca_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_vc, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_vc_foreign, 2) . '</b></td>
                    </tr>
                    ';
            } else {
                echo '<tr><td colspan="14" class="text-center">No record found.</td></tr>';
            }
        ?>
        </tbody>
        </table>	
    </div>
</div>
</p>
<br>
<div class="alert alert-info fade in">
    <b>Allowances Summary</b>
</div>
<div class="form-group">
    <label class="col-md-4 control-label text-right">Applied (Conference/PTNCA) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appl_con_ptnca?>" readonly>
    </div>

    <label class="col-md-4 control-label text-right">Applied (Department) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appl_dept?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label text-right">Approved HOD (Conference/PTNCA) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appr_hod_con_ptnca?>" readonly>
    </div>

    <label class="col-md-4 control-label text-right">Approved HOD (Department) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appl_dept_hod?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label text-right">Approved RMIC (Research) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appr_rmic_rc?>" readonly>
    </div>

    <label class="col-md-4 control-label text-right">Applied (Research) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appl_rc?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label text-right">Approved TNCPI (Research) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appr_tncpi_rc?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label text-right">Approved TNCA (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appr_tnca?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label text-right">Approved VC (RM)</label>
    <div class="col-md-2 text-right">
        <input name="" class="form-control" type="text" value="<?php echo $appr_vc?>" readonly>
    </div>
</div>
</form>