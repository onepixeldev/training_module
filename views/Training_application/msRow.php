<?php
    if (!empty($tr_head_detl)) {
        echo '
        <tr id="btnTr1">
            <td class="text-left col-md-1"><b>Specific Objectives</b></td>
            <td class="text-left col-md-10"><textarea class="form-control" type="text" rows="10" cols="50" readonly id="spObj">'. $tr_head_detl->THD_TRAINING_OBJECTIVE2 .'</textarea></td>
            <td class="text-left">
                <button type="button" class="btn btn-success btn-xs edit_ms1_btn" value='.$refid.' title="Edit Record"><i class="fa fa-edit"></i> Update</button>
            </td>
        </tr>

        <tr>
            <td class="text-left col-md-1"><b>Contents</b></td>
            <td class="text-left col-md-10"><textarea class="form-control" type="text" rows="10" cols="50" readonly id="msCont">'. $tr_head_detl->THD_TRAINING_CONTENT .'</textarea></td>
            <td class="text-left">
                <button type="button" class="btn btn-success btn-xs edit_ms2_btn" value='.$refid.' title="Edit Record"><i class="fa fa-edit"></i> Update</button>
            </td>
        </tr>

        <tr>
            <td class="text-left col-md-1"><b>Component/Category</b></td>
            <td class="text-left col-md-10" id="msComp">'. $tr_head_detl->TMCDESC .'</td>
            <td class="text-left">
                <button type="button" class="btn btn-success btn-xs edit_ms3_btn" value='.$refid.' title="Edit Record"><i class="fa fa-edit"></i> Update</button>
            </td>
        </tr>
        ';
    }
?>
