<?php
    if (!empty($cpdSetup)) {
        echo '
        <tr>
            <td class="text-right col-md-2"><b>Competency</b></td>
            <td class="text-left col-md-5">'.$cpdSetup->CH_COMPETENCY.'</td>
            <td class="text-left">
                <button type="button" class="btn btn-success btn-xs edit_cpd1_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
            </td>
        </tr>

        <tr>
            <td class="text-right col-md-2"><b>Category</b></td>
            <td class="text-left col-md-5">'.$cpdSetupCatDesc.'</td>
            <td class="text-left">
                <button type="button" class="btn btn-success btn-xs edit_cpd2_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
            </td>
        </tr>

        <tr>
            <td class="text-right col-md-2"><b>Mark</b></td>
            <td class="text-left col-md-5">'.$cpdSetup->CH_MARK.'</td>
            <td class="text-left">
                <button type="button" class="btn btn-success btn-xs edit_cpd3_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
            </td>
        </tr>
        
        <tr>
            <td class="text-right col-md-2"><b>Report Submission?</b></td>
            <td class="text-left col-md-5">'.$cpdSetup->REP_SUB.'</td>
            <td class="text-left">
                <button type="button" class="btn btn-success btn-xs edit_cpd4_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
            </td>
        </tr>

        <tr>
            <td class="text-right col-md-2"><b>Compulsory ?</b></td>
            <td class="text-left col-md-5">'.$cpdSetup->CHCOMPULSORY.'</td>
            <td class="text-left">
                <button type="button" class="btn btn-success btn-xs edit_cpd5_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
            </td>
        </tr>
        ';
    } 
?>