<div class="">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel"><b>Conference Details</b></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-3"><b>Refid</b></td>
                    <td class="text-left"><?php echo $refid?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Title</b></td>
                    <td class="text-left"><?php echo $title?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Description</b></td>
                    <td class="text-left">
                        <textarea rows="4" cols="50" readonly><?php echo $detl->CM_DESC?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Address</b></td>
                    <td class="text-left">
                        <textarea rows="4" cols="50" readonly><?php echo $detl->CM_ADDRESS?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>City</b></td>
                    <td class="text-left"><?php echo $detl->CM_CITY?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Postcode</b></td>
                    <td class="text-left"><?php echo $detl->CM_POSTCODE?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>State</b></td>
                    <td class="text-left"><?php echo $detl->SM_STATE_DESC?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Country</b></td>
                    <td class="text-left"><?php echo $detl->CM_COUNTRY_DESC?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Organizer Name</b></td>
                    <td class="text-left"><?php echo $detl->CM_ORGANIZER_NAME?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Level</b></td>
                    <td class="text-left"><?php echo $detl->TL_DESC?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Temporary Open</b></td>
                    <td class="text-left"><?php echo $detl->CM_TEMP_OPEN_FULL?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-3"><b>Total Participant</b></td>
                    <td class="text-left"><?php echo $detl->CM_PARTICIPANT?></td>
                </tr>
            </tbody>
            </table>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
    </div>
</div>