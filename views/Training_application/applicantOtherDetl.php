<div class="">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel"><b><?php echo $tname." (".$stfID.")"?></b></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-3"><b>Transportation</b></td>
                    <td class="text-left"><?php echo $app_ot_detl->STD_TRANSPORTATION?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Confirm Date</b></td>
                    <td class="text-left"><?php echo $app_ot_detl->STD_ATTEND_DATE?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Absent Remark</b></td>
                    <td class="text-left"><?php echo $app_ot_detl->STD_ATTEND_REMARK?></td>
                </tr>
            </tbody>
            </table>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
    </div>
</div>