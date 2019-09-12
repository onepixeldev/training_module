<div class="">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel"><b><?php echo $cpr_desc." (".$cpr_code.")"?></b></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-3"><b>No. of attachment</b></td>
                    <td class="text-left"><?php if($mod == 'RMIC') {
                        echo $part_role_detl->CPR_TOTAL_ATTACH_RMIC;
                    } else {
                        echo $part_role_detl->CPR_TOTAL_ATTACHMENTS;
                    }?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Checklist (BM)</b></td>
                    <td class="text-left"><?php if($mod == 'RMIC') {
                        echo $part_role_detl->CPR_CHECKLIST_RMIC;
                    } else {
                        echo $part_role_detl->CPR_CHECKLIST;
                    }?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Checklist (BI)</b></td>
                    <td class="text-left"><?php if($mod == 'RMIC') {
                        echo $part_role_detl->CPR_CHECKLIST_ENG_RMIC;
                    } else {
                        echo $part_role_detl->CPR_CHECKLIST_ENG;
                    }?></td>
                </tr>
            </tbody>
            </table>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
    </div>
</div>