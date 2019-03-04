<?php
    if (!empty($tr_head_detl)) {
        echo '
            <tr data-parm-id="">
                <td class="text-left col-md-1"><b>Specific Objectives</b></td>
                <td class="text-left col-md-4"><textarea class="form-control" type="text" rows="10" cols="50" readonly>'. $tr_head_detl->THD_TRAINING_OBJECTIVE2 .'</textarea></td>
                <td class="text-left">
                    <button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
                </td>
            </tr>

            <tr data-parm-id="">
                <td class="text-left col-md-1"><b>Contents</b></td>
                <td class="text-left col-md-4"><textarea class="form-control" type="text" rows="10" cols="50" readonly>'. $tr_head_detl->THD_TRAINING_CONTENT .'</textarea></td>
                <td class="text-left">
                    <button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
                </td>
            </tr>

            <tr data-parm-id="">
                <td class="text-left col-md-1"><b>Component/Category</b></td>
                <td class="text-left col-md-4">'. $tr_head_detl->TMCDESC .'</td>
                <td class="text-left">
                    <button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
                </td>
            </tr>
        ';
    }
?>
