<div class="">
	<div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel"><b>Applicant Details</b></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-4 row h-50"><b>Staff ID</b></td>
                    <td class="text-left row h-50"><?php echo $staff_tr_list->SM_STAFF_ID?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Name</b></td>
                    <td class="text-left"><?php echo $staff_tr_list->SM_STAFF_NAME?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Email Address</b></td>
                    <td class="text-left"><?php echo $staff_tr_list->SM_EMAIL_ADDR?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Evaluator Info</b></td>
                    <td class="text-left"><?php echo $eva_info?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Department</b></td>
                    <td class="text-left"><?php echo $staff_tr_list->SM_DEPT_CODE?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Job Status</b></td>
                    <td class="text-left"><?php echo $staff_tr_list->SJS_STATUS_DESC?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Status</b></td>
                    <td class="text-left"><?php echo $staff_tr_list->STH_STATUS?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Apply Date</b></td>
                    <td class="text-left"><?php echo $staff_tr_list->STHAPPDATE?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Department Training Benefit</b></td>
                    <td class="text-left"><?php echo $staff_tr_list->STH_DEPT_TRAINING_BENEFIT?></td>
                </tr>
            </tbody>
            </table>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
    </div>
</div>