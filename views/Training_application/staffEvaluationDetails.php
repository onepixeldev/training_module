<div class="">
	<div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel"><b>Staff Evaluation Details</b></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-4 row h-50"><b>Staff ID</b></td>
                    <td class="text-left row h-50"><?php echo $staffID?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Name</b></td>
                    <td class="text-left"><?php echo $staffN?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Submit Date</b></td>
                    <td class="text-left"><?php echo $staff_eva_detl->STH_SB_DT?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Evaluator ID</b></td>
                    <td class="text-left"><?php echo $staff_eva_detl->EVA_ID_NAME?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Evaluation Status</b></td>
                    <td class="text-left"><?php echo $staff_eva_detl->SHE_DESC?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Evaluation Date</b></td>
                    <td class="text-left"><?php echo $staff_eva_detl->SED?></td>
                </tr>
            </tbody>
            </table>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
    </div>
</div>