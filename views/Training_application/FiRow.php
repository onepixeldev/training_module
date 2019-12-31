<?php
    if (!empty($facilitatorInfoExternal)) {
        echo '
        <tr>
            <td class="text-center" style="display: none">' . $refid .'</td>
            <td class="text-center col-md-1">' . $facilitatorInfoExternal->TF_TYPE . '</td>
            <td class="text-center col-md-2">' . $facilitatorInfoExternal->TF_FACILITATOR_ID . '</td>
            <td class="text-left col-md-7">' . $facilitatorInfoExternal->EF_FACILITATOR_NAME . '</td>
			<td class="text-center col-md-1">' . $facilitatorInfoExternal->TF_FACILITATOR_LABEL . '</td>
            <td class="text-center col-md-1">
                <button type="button" class="btn btn-danger btn-xs del_fi_btn"><i class="fa fa-trash"></i> Delete</button>
            </td>
        </tr>
        ';
    }
    if (!empty($facilitatorInfoStaff)) {
        echo '
        <tr>
            <td class="text-center" style="display: none">' . $refid .'</td>
            <td class="text-center col-md-1">' . $facilitatorInfoStaff->TF_TYPE . '</td>
            <td class="text-center col-md-2">' . $facilitatorInfoStaff->TF_FACILITATOR_ID . '</td>
            <td class="text-left col-md-7">' . $facilitatorInfoStaff->SM_STAFF_NAME . '</td>
			<td class="text-center col-md-1">' . $facilitatorInfoStaff->TF_FACILITATOR_LABEL . '</td>
            <td class="text-center col-md-1">
                <button type="button" class="btn btn-danger btn-xs del_fi_btn"><i class="fa fa-trash"></i> Delete</button>
            </td>
        </tr>
        ';
    } 
?>