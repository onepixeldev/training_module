<?php
    if (!empty($stf_assign_row)) {
        echo '
        <tr>
            <td class="text-center col-md-1">' . $stf_assign_row->SM_STAFF_ID . '</td>
            <td class="text-left col-md-3">' . $stf_assign_row->SM_STAFF_NAME . '</td>
            <td class="text-center col-md-1">' . $stf_assign_row->SM_DEPT_CODE . '</td>
            <td class="text-center col-md-1">' . $stf_assign_row->TPR_DESC . '</td>
            <td class="text-center col-md-1">' . $stf_assign_row->STH_STATUS . '</td>
            <td class="text-center col-md-2">'. $stf_assign_row->STH_REMARK . '</td>
            <td class="text-center col-md-2">
                <button type="button" class="btn btn-success btn-xs sta_edit_btn" value='.$refid.'><i class="fa fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-danger btn-xs sta_del_btn" value='.$refid.'><i class="fa fa-times-circle"></i> Delete</button>
                <button type="button" class="btn btn-info btn-xs sta_history_btn"><i class="fa fa-history"></i> History</button>
            </td>
        </tr>
        ';
    }
?>