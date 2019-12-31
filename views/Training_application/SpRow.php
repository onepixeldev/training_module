<?php
    if (!empty($speakerInfoExternal)) {
        echo '
        <tr>
            <td class="text-center" style="display: none">' . $refid .'</td>
            <td class="text-center">' . $speakerInfoExternal->TS_TYPE . '</td>
            <td class="text-center">' . $speakerInfoExternal->TS_SPEAKER_ID . '</td>
            <td class="text-left">' . $speakerInfoExternal->ES_SPEAKER_NAME . '</td>
            <td class="text-left">' . $speakerInfoExternal->ES_DEPT . '</td>
            <td class="text-center">' . $speakerInfoExternal->TS_CONTACT . '</td>
            <td class="text-center col-md-2">
                <button type="button" class="btn btn-success btn-xs edit_sp_btn"><i class="fa fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-danger btn-xs del_sp_btn"><i class="fa fa-trash"></i> Delete</button>
            </td>
        </tr>
        ';
    }
    if (!empty($speakerInfoStaff)) {
        echo '
        <tr>
            <td class="text-center" style="display: none">' . $refid .'</td>
            <td class="text-center">' . $speakerInfoStaff->TS_TYPE . '</td>
            <td class="text-center">' . $speakerInfoStaff->TS_SPEAKER_ID . '</td>
            <td class="text-left">' . $speakerInfoStaff->SM_STAFF_NAME . '</td>
            <td class="text-left">' . $speakerInfoStaff->SM_DEPT_CODE . '</td>
            <td class="text-center">' . $speakerInfoStaff->TS_CONTACT . '</td>
            <td class="text-center col-md-2">
                <button type="button" class="btn btn-success btn-xs edit_sp_btn"><i class="fa fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-danger btn-xs del_sp_btn"><i class="fa fa-trash"></i> Delete</button>
            </td>
        </tr>
        ';
    } 
?>