<div class="">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel"><b>Code:</b> <?php echo $tem_desc->TEM_CODE?></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-4 row h-50"><b>Module</b></td>
                    <td class="text-left row h-50"><?php echo $tem_desc->TEM_MODULE?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Title</b></td>
                    <td class="text-left"><?php echo $tem_desc->TEM_TITLE?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Content</b></td>
                    <td class="text-left"><textarea cols="45" rows="20" readonly><?php echo $tem_desc->TEM_CONTENT?></textarea></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Send By</b></td>
                    <td class="text-left"><?php 
                    $smName = "";
                    if (!empty($staff_desc->SM_STAFF_NAME)){
                        $smName = "$staff_desc->SM_STAFF_NAME ($tem_desc->TEM_SEND_BY)"; 
                    } else {
                        $smName = "";
                    }
                    echo $smName?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Status</b></td>
                    <td class="text-left"><?php 
                    $tmpStatus = "";

                    if ($tem_desc->TEM_STATUS == 'Y')
                    {
                        $tmpStatus = 'ACTIVE';
                    } 
                    elseif ($tem_desc->TEM_STATUS == 'N')
                    {
                        $tmpStatus = 'INACTIVE';
                    } 
                    echo $tmpStatus?></td>
                </tr>
            </tbody>
            </table>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
    </div>
</div>