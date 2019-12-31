<div class="alert alert-info fade in">
    <b>Notification Setup</b>
</div>
<form id="saveNotiSet" class="form-horizontal" method="post">
    <div id="notiSetAlert">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <div style="">
        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-2"><b>Code</b></td>
                <td class="text-center col-md-2"><input name="form[code]" placeholder="Code" class="form-control" type="text" value="<?php echo $code?>" readonly></td>
                <td class="text-left"></td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-2"><b>Address</b></td>
                <td class="text-left col-md-4">
                <textarea name="form[address]" class="form-control" type="text" rows="5" cols="50"><?php echo $address?></textarea>
                </td>
                <td class="text-left"></td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-2"><b>URL Link</b></td>
                <td class="text-center col-md-8"><input name="form[url_link]" placeholder="URL Link" class="form-control" type="text" value="<?php echo $url_link?>"></td>
                <td class="text-left"></td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody>
            <tr>
                <td class="text-left col-md-2"><b>Phone Number</b></td>
                <td class="text-center col-md-1"><input name="form[phone_no]" placeholder="Phone no." class="form-control" type="text" value="<?php echo $phone_no?>"></td>
                <td class="text-left"></td>
            </tr>
            <tr>
                <td class="text-left col-md-2"><b>Fax Number</b></td>
                <td class="text-center col-md-2"><input name="form[fax_no]" placeholder="Fax no." class="form-control" type="text" value="<?php echo $fax_no?>"></td>
                <td class="text-left"></td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-2"><b>Send By <font color="red">*</font></b></td>
                <td class="text-left col-md-4"><?php echo form_dropdown('form[send_by]', $staff_list, $send_by, 'class="select2-filter form-control" id="send_by" style="width: 100%"')?></td>
                <td class="text-left"></td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-2"><b>Status</b></td>
                <td class="text-center col-md-2"><?php echo form_dropdown('form[status]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $status, 'class="form-control width-50" id="status"')?></td>
                <td class="text-left"></td>
            </tr>
        </tbody>
        </table>

        <div id="notiSetAlertFoot"></div>
        <div class="text-right"><button type="button" class="btn btn-primary btn-md save_noti_setup" value=""><i class="fa fa-save"></i> Save</button></div>
    </div>
</form>

<br>

<div class="alert alert-info fade in">
    <b>Staff Reminder (TNC A&A Staff Only)</b>
</div>
<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_stf_rem_btn"><i class="fa fa-plus"></i> Add Staff</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_stf_rem_list">
		<thead>
		<tr>
			<th class="text-center col-md-1">Staff ID</th>
            <th class="text-left">Name</th>
            <th class="text-center col-md-1">Status</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_reminder)) {
				foreach ($staff_reminder as $sr) {
					echo '
                    <tr>
						<td class="text-center">' . $sr->SR_STAFF_ID . '</td>
                        <td class="text-left">' . $sr->SM_STAFF_NAME . '</td>
                        <td class="text-center">' . $sr->SR_STATUS . '</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-xs del_sr_btn"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
                    ';
				}
			}
		?>
		</tbody>
		</table>	
	</div>
</div>

<script>
    $('.select2-filter').select2({
        // placeholder: 'Select an option',
        width: 'resolve'
    });
</script>