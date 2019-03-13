<?php
    if (!empty($stf_assign_row)) {
        echo '
        <tr>
            <td class="text-center col-md-1">' . $stf_assign_row->SM_STAFF_ID . '</td>
            <td class="text-left col-md-3">' . $stf_assign_row->SM_STAFF_NAME . '</td>
            <td class="text-center col-md-1">' . $stf_assign_row->SM_DEPT_CODE . '</td>
            <td class="text-center col-md-1">' . $stf_assign_row->TPR_DESC . '</td>
            <td class="text-center col-md-1">' . $stf_assign_row->STH_STATUS . '</td>
            <td class="text-center col-md-1">
            <div class="form-group">
                <div class="col-md-9"> 
                    <input name="remark" placeholder="remark" class="form-control" value="'.$stf_assign_row->STH_REMARK.'" type="text" id="appRemark">
                </div>
            </div>
            </td>
            <td class="text-center col-md-9">
                <button type="button" class="btn btn-primary btn-xs sta_appsm_btn" value='.$refid.'><i class="fa fa-check-square"></i> Edit</button>
                <button type="button" class="btn btn-danger btn-xs sta_reject_btn" value='.$refid.'><i class="fa fa-times-circle"></i> Delete</button>
                <button type="button" class="btn btn-success btn-xs sta_detl_btn" value='.$refid.'><i class="fa fa-info-circle"></i> Detail</button>
                <button type="button" class="btn btn-info btn-xs sta_history_btn"><i class="fa fa-history"></i> History</button>
            </td>
        </tr>
        ';
    }
?>