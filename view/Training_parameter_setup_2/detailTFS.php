<div class="">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel"><b><?php echo $tfs_code?></b></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-4"><b>Description</b></td>
                    <td class="text-left"><?php echo $tfs_desc->TFS_DESC?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Range </b></td>
                    <td class="text-left"><?php echo 'RM'.number_format($tfs_desc->TFS_AMOUNT_FROM,2) .' to '. 'RM'.number_format($tfs_desc->TFS_AMOUNT_TO,2)?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>DCR Approve</b></td>
                    <td class="text-left"><?php 
                    $dcr ='';
                    if (empty($tfs_dept_full->DM_DEPT_DESC)){
                        $dcr ='';
                    } else {
                        $dcr = $tfs_dept_full->DM_DEPT_DESC;
                    }
                    echo $dcr?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Registrar Approve</b></td>
                    <td class="text-left"><?php 
                    $reg ='';
                    if (empty($tfs_dept_full2->DM_DEPT_DESC)){
                        $reg ='';
                    } else {
                        $reg = $tfs_dept_full2->DM_DEPT_DESC;
                    }
                    echo $reg?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>MPE Approve?</b></td>
                    <td class="text-left"><?php
                    $mpe = ''; 
                    if ($tfs_desc->TFS_MPE_APPROVE == 'Y'){
						$mpe = 'YES';
					} elseif ($tfs_desc->TFS_MPE_APPROVE == 'N'){
						$mpe = 'NO';
					} else {
						$mpe = '';
					}
                    echo $mpe?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Status</b></td>
                    <td class="text-left"><?php 
                    $sts = '';
                    if ($tfs_desc->TFS_STATUS == 'Y'){
						$sts = 'ACTIVE';
					} elseif ($tfs_desc->TFS_STATUS == 'N'){
						$sts = 'INACTIVE';
					} else {
						$sts = '';
					}
                    echo $sts?></td>
                </tr>
            </tbody>
            </table>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
    </div>
</div>