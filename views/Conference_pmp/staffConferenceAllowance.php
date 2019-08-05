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

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-2">
            <input name="form[date_from]" placeholder="DD/MM/YYYY" value="<?php echo $date_from?>" class="datepicker form-control" type="text" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-2">
            <input name="form[date_to]" placeholder="DD/MM/YYYY" value="<?php echo $date_to?>" class="datepicker form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Budget Origin</label>
        <div class="col-md-2">
            <input name="form[budget_origin]" value="<?php echo $budget_origin?>" class="form-control" type="text" readonly>
        </div>
    </div>


<div class="alert alert-info fade in">
    <b>Allowances</b>
</div>

<div class="text-right">
    <button type="button" class="btn btn-primary add_allowance_con"><i class="fa fa-plus"></i> Add conference allowance</button>
</div>
<p>
<div class="well">
    <div class="row table-condensed table-responsive">
        <table class="table table-bordered table-hover" id="tbl_stf_cr_allw_list">
        <thead>
        <tr>
            <th class="text-center">Code</th>
            <th class="text-left">Allowance</th>
            <th class="text-center">Apply (RM)</th>
            <th class="text-center">Apply (Foreign)</th>
            <th class="text-center">Approved HOD (RM)</th>
            <th class="text-center">Approved HOD (Foreign)</th>

            
            <th class="text-center allwRmic hidden">Approved RMIC (RM)</th>
            <th class="text-center allwRmic hidden">Approved RMIC (Foreign)</th>
            <th class="text-center allwRmic hidden">Approved TNCPI (RM)</th>
            <th class="text-center allwRmic hidden">Approved TNCPI (Foreign)</th>

            <th class="text-center">Approved TNCA (RM)</th>
            <th class="text-center">Approved TNCA (Foreign)</th>
            <th class="text-center">Approved VC (RM)</th>
            <th class="text-center">Approved VC (Foreign)</th>
            <th class="text-center">Action</th>
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
                        
                        <td class="text-center col-md-1 allwRmic hidden">' . number_format($sca->SCA_AMT_RM_APPROVE_RMIC, 2) . '</td>
                        <td class="text-center col-md-1 allwRmic hidden">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_RMIC, 2) . '</td>
                        <td class="text-center col-md-1 allwRmic hidden">' . number_format($sca->SCA_AMT_RM_APPROVE_TNCPI, 2) . '</td>
                        <td class="text-center col-md-1 allwRmic hidden">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_TNCPI, 2) . '</td>

                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_RM_APPROVE_TNCA, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_TNCA, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_RM_APPROVE_VC, 2) . '</td>
                        <td class="text-center col-md-1">' . number_format($sca->SCA_AMT_FOREIGN_APPROVE_VC, 2) . '</td>
                        <td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                    <button type="button" class="btn btn-success text-left btn-block btn-xs edit_stf_con_allw" value=""><i class="fa fa-pencil-square-o"></i> Edit</button>
                                    <button type="button" class="btn btn-danger text-left btn-block btn-xs del_stf_con_allw" value=""><i class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>
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

                        
                        <td class="text-center col-md-1 allwRmic hidden"><b>' . number_format($total_rmic, 2) . '</b></td>
                        <td class="text-center col-md-1 allwRmic hidden"><b>' . number_format($total_rmic_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1 allwRmic hidden"><b>' . number_format($total_tncpi, 2) . '</b></td>
                        <td class="text-center col-md-1 allwRmic hidden"><b>' . number_format($total_tncpi_foreign, 2) . '</b></td>
                        

                        <td class="text-center col-md-1"><b>' . number_format($total_tnca, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_tnca_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_vc, 2) . '</b></td>
                        <td class="text-center col-md-1"><b>' . number_format($total_vc_foreign, 2) . '</b></td>
                        <td class="text-center col-md-1"></td>
                    </tr>
                    ';
            } else {
                echo '<tr><td colspan="11" class="text-center">No record found.</td></tr>';
            }
        ?>
        </tbody>
        </table>	
    </div>
</div>
</p>
<div class="form-group">
    <label class="col-md-4 control-label text-right">Applied (Conference/PTNCA) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="form[appl_con_ptnca]" placeholder="" class="form-control" type="text" value="<?php echo $appl_con_ptnca?>" readonly>
    </div>

    <label class="col-md-4 control-label text-right">Applied (Department) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="form[appl_dept]" class="form-control" type="text" value="<?php echo $appl_dept?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label text-right">Approved HOD (Conference/PTNCA) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="form[appr_hod_con_ptnca]" class="form-control" type="text" value="<?php echo $appr_hod_con_ptnca?>" readonly>
    </div>

    <label class="col-md-4 control-label text-right">Approved HOD (Department) (RM)</label>
    <div class="col-md-2 text-right">
        <input name="form[appl_dept_hod]" class="form-control" type="text" value="<?php echo $appl_dept_hod?>" readonly>
    </div>
</div>

<div id="allwRmicSummary" class="hidden">
    <div class="form-group">
        <label class="col-md-4 control-label text-right">Applied (Research) (RM)</label>
        <div class="col-md-2 text-right">
            <input name="form[appl_rc]" class="form-control" type="text" value="<?php echo $appl_rc?>" readonly>
        </div>

        <label class="col-md-4 control-label text-right">Approved RMIC (Research) (RM)</label>
        <div class="col-md-2 text-right">
            <input name="form[appr_rmic_rc]" class="form-control" type="text" value="<?php echo $appr_rmic_rc?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label text-right">Approved TNCPI (RM)</label>
        <div class="col-md-2 text-right">
            <input name="form[appr_tncpi_rc]" class="form-control" type="text" value="<?php echo $appr_tncpi_rc?>" readonly>
        </div>
    </div>

</div>

<div class="form-group">
    <label class="col-md-4 control-label text-right">Approved TNCA (RM)</label>
    <div class="col-md-2 text-right">
        <input name="form[appr_tnca]" class="form-control" type="text" value="<?php echo $appr_tnca?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label text-right">Approved VC (RM)</label>
    <div class="col-md-2 text-right">
        <input name="form[appr_vc]" class="form-control" type="text" value="<?php echo $appr_vc?>" readonly>
    </div>
</div>
</form>