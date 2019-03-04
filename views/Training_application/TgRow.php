<?php
    echo '
    <tr>
        <td class="text-center col-md-2">' . $target_group->TTG_GROUP_CODE . '</td>
        <td class="text-left col-md-3">' . $target_group->TG_GROUP_DESC . '</td>
        <td class="text-center">' . $target_group->TG_SCHEME . '</td>
        <td class="text-center">' . $target_group->TG_GRADE_FROM . '</td>
        <td class="text-center">' . $target_group->TG_GRADE_TO . '</td>
        <td class="text-center">' . $target_group->TG_SERVICE_YEAR_FROM . '</td>
        <td class="text-center">' . $target_group->TG_SERVICE_YEAR_TO . '</td>
        <td class="text-center">' . $target_group->TG_SERVICE_GROUP . '</td>
        <td class="text-center">' . $target_group->TGACADEMIC . '</td>
        <td class="text-center">' . $target_group->TGNEWSTAFF . '</td>
        <td class="text-center">' . $target_group->TGCOMPULSORY . '</td>
        <td class="text-center col-md-1">
        <button type="button" class="btn btn-info btn-xs pos_tg_btn"><i class="fa fa-info-circle"></i> Position</button>
            <button type="button" class="btn btn-danger btn-xs del_tg_btn" value='.$refid.'><i class="fa fa-trash"></i> Delete</button>
        </td>
    </tr>
    ';
?>