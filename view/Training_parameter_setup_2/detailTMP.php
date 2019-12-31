<div class="">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel"><b>Code:</b> <?php echo $tmp_code?></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-4 row h-50"><b>Module</b></td>
                    <td class="text-left row h-50"><?php echo $tmp_desc->TMC_MODULE?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Address</b></td>
                    <td class="text-left"><?php echo $tmp_desc->TMC_ADDRESS?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Link</b></td>
                    <td class="text-left"><?php echo $tmp_desc->TMC_LINK?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Email</b></td>
                    <td class="text-left"><?php echo $tmp_desc->TMC_EMAIL?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Tel. No</b></td>
                    <td class="text-left"><?php echo $tmp_desc->TMC_TELNO?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Fax. No</b></td>
                    <td class="text-left"><?php echo $tmp_desc->TMC_FAXNO?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Send By</b></td>
                    <td class="text-left"><?php 
                    $smName = "";
                    if (!empty($staff_desc->SM_STAFF_NAME)){
                        $smName = "$staff_desc->SM_STAFF_NAME ($tmp_desc->TMC_SEND_BY)"; 
                    } else {
                        $smName = "";
                    }
                    echo $smName?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Status</b></td>
                    <td class="text-left"><?php 
                    $tmpStatus = "";

                    if ($tmp_desc->TMC_STATUS == 'Y')
                    {
                        $tmpStatus = 'ACTIVE';
                    } 
                    elseif ($tmp_desc->TMC_STATUS == 'N')
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