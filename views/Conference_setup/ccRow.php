<?php
    if (!empty($cc_detl)) {
        echo '
        <tr>
            <td class="text-center col-md-1 cc_code">' . $cc_detl->CC_CODE . '</td>
            <td class="text-left col-md-3 cc_desc">' . $cc_detl->CC_DESC . '</td>
            <td class="text-center col-md-2 cc_from">' . number_format($cc_detl->CC_RM_AMOUNT_FROM,2) . '</td>
            <td class="text-center col-md-2 cc_to">' . number_format($cc_detl->CC_RM_AMOUNT_TO,2) . '</td>
            <td class="text-center col-md-1 cc_head_rec">' . $cc_detl->CC_HEAD_RECOMMEND . '</td>
            <td class="text-center col-md-1 cc_tnca_app">'.$cc_detl->CC_TNCA_APPROVE.'</td>
            <td class="text-center col-md-1 cc_vc_app">'.$cc_detl->CC_VC_APPROVE.'</td>
            <td class="text-center col-md-1 cc_sts">'.$cc_detl->CC_STATUS.'</td>
            <td class="text-center col-md-2">
            <div class="btn-group">
                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                    <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                        <button type="button" class="btn btn-success text-left btn-block btn-xs edit_cc_btn"><i class="fa fa-pencil-square-o"></i> Edit</button>
                        <button type="button" class="btn btn-danger text-left btn-block btn-xs del_cc_btn"><i class="fa fa-trash"></i> Delete</button>
                    </div>
                </div>
            </td>
        </tr>
        ';
    }
?>