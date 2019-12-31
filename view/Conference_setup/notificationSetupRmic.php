<div class="alert alert-info fade in">
    <b>Conference Setup</b>
</div>
<form id="saveConSet" class="form-horizontal" method="post">
    <div id="conSetAlert">
        <!--<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>-->
    </div>
    <div style="">
        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-4"><b>Maximum interval for staff to apply for conference</b></td>
                <td class="text-left col-md-1">Local: </td>
                <td class="text-left col-md-1"><input name="form[min_days_submit_local]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $min_days_submit_local_rmic->HP_PARM_DESC?>"></td>
                <td class="text-left">day(s)</td>
            </tr>
            <tr>
                <td class="text-left col-md-4"></td>
                <td class="text-left col-md-1">Oversea :</td>
                <td class="text-left col-md-1"><input name="form[min_days_submit_oversea]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $min_days_submit_oversea_rmic->HP_PARM_DESC?>"></td>
                <td class="text-left">day(s)</td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-4"><b>Approval TNCPI Online?</b></td>
                <td class="text-center col-md-2"><?php echo form_dropdown('form[approval_tncpi_online]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $approval_tncpi_online->HP_PARM_DESC, 'class="form-control width-50"')?></td>
                <td class="text-left"></td>
            </tr>
        </tbody>
        </table>

        <div id="conSetAlertFoot"></div>
        <div class="text-right"><button type="button" class="btn btn-primary btn-md save_con_setup" value=""><i class="fa fa-save"></i> Save</button></div>
    </div>
</form>

<br>

<div class="alert alert-info fade in">
    <b>Staff Reminder (RMIC)</b>
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

<div class="alert alert-info fade in">
    <b>Staff Contact Info</b>
</div>
<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_sci_btn"><i class="fa fa-plus"></i> Add Staff Contact Info</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_sci_list">
		<thead>
		<tr>
			<th class="text-center col-md-1">No</th>
            <th class="text-left">Ext</th>
			<th class="text-center col-md-3">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($conference_admin_ext)) {
				foreach ($conference_admin_ext as $cae) {
					echo '
                    <tr>
						<td class="text-center">' . $cae->HP_PARM_NO . '</td>
						<td class="text-left">' . $cae->HP_PARM_DESC . '</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success btn-xs edit_sci_btn"><i class="fa fa-pencil-square-o"></i> Edit</button>
                            <button type="button" class="btn btn-danger btn-xs del_sci_btn"><i class="fa fa-trash"></i> Delete</button>
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
</p>

<script>
    $('.select2-filter').select2({
        // placeholder: 'Select an option',
        width: 'resolve'
    });
</script>