<?php
    if (!empty($getListEgPosition)) {
        echo '
        <tr data-gpcode='.$getListEgPosition->TGS_GRPSERV_CODE.' id="dataGp">
            <td class="text-center col-md-1">' . $getListEgPosition->TGS_SEQ . '</td>
            <td class="text-center col-md-2">' . $getListEgPosition->TGS_SERVICE_CODE . '</td>
            <td class="text-left">' . $getListEgPosition->SS_SERVICE_DESC . '</td>
            <td class="text-center col-md-1" id="postAction">
                <button type="button" class="btn btn-danger btn-xs del_eg_btn"><i class="fa fa-trash"></i> Delete</button>
            </td>
        </tr>
        ';
    }
?>