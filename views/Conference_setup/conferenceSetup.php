<h6><b><font color="red">*</font></b> To disable this function, put 0 as value</h6>
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
                <td class="text-left col-md-4"><b>Temporary Open ? (Conference Application)</b></td>
                <td class="text-center col-md-2"><?php echo form_dropdown('form[temp_open]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $conference_temp_open_appl->HP_PARM_DESC, 'class="form-control width-50" id="temp_open"')?></td>
                <td class="text-left"></td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-4"><b>Maximum interval for staff to apply for conference</b></td>
                <td class="text-left col-md-1">Local: </td>
                <td class="text-left col-md-1"><input name="form[min_days_submit_local]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $min_days_submit_local->HP_PARM_DESC?>"></td>
                <td class="text-left">day(s)</td>
            </tr>
            <tr>
                <td class="text-left col-md-4"></td>
                <td class="text-left col-md-1">Oversea :</td>
                <td class="text-left col-md-1"><input name="form[min_days_submit_oversea]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $min_days_submit_oversea->HP_PARM_DESC?>"></td>
                <td class="text-left">day(s)</td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-4"><b>Check if staff has submitted LMP 1/01?</b></td>
                <td class="text-center col-md-2"><?php echo form_dropdown('form[check_submit_lmp]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $check_submit_report->HP_PARM_DESC, 'class="form-control width-50" id="check_submit_lmp"')?></td>
                <td class="text-left"></td>
            </tr>
            <tr>
                <td class="text-left col-md-4"><b>Maximum interval for staff to update conference report application ('REJECT' status only)</b></td>
                <td class="text-center col-md-1"><input name="form[max_days_edit_lmp]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $max_days_edit_lmp->HP_PARM_DESC?>"></td>
                <td class="text-left">day(s)</td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody>
            <tr>
                <td class="text-left col-md-4"><b>Exception for attending conferences overseas once in every two years</b></td>
                <td class="text-center col-md-1"><?php echo form_dropdown('form[conference_overseas_2yrs]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $conference_overseas_2yrs->HP_PARM_DESC, 'class="form-control width-50" id="check_submit_lmp"')?></td>
                <td class="text-left col-md-6"><b><font color="red">*</font> Select 'Yes' to enable the exception</b></td>
            </tr>
            <tr>
                <td class="text-left col-md-4"><b>Exception for attending conferences ASEAN COUNTRY once in every one years</b></td>
                <td class="text-center col-md-2"><?php echo form_dropdown('form[conference_asean_1yrs]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $conference_asean_1yrs->HP_PARM_DESC, 'class="form-control width-50" id="check_submit_lmp"')?></td>
                <td class="text-left col-md-6"><b><font color="red">*</font> Select 'Yes' to enable the exception</b></td>
            </tr>
        </tbody>
        </table>

        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-4"><b>Maximum interval for HOD to approve for conference</b></td>
                <td class="text-left col-md-1">Local :</td>
                <td class="text-left col-md-1"><input name="form[conf_max_days_rec_local]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $conf_max_days_rec_local->HP_PARM_DESC?>"></td>
                <td class="text-left">day(s)</td>
            </tr>
            <tr>
                <td class="text-left col-md-4"></td>
                <td class="text-left col-md-1">Oversea :</td>
                <td class="text-left col-md-1"><input name="form[conf_max_days_rec_oversea]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $conf_max_days_rec_oversea->HP_PARM_DESC?>"></td>
                <td class="text-left">day(s)</td>
            </tr>
        </tbody>
        </table>

        <div id="conSetAlertFoot"></div>
        <div class="text-right"><button type="button" class="btn btn-primary btn-md save_con_setup" value=""><i class="fa fa-save"></i> Save</button></div>
    </div>
</form>

<br>

<div class="alert alert-info fade in">
    <b>Guideline URL</b>
</div>

<form id="saveGuidelineURL" class="form-horizontal" method="post">
    <div style="max-height:500px;overflow-y:auto;overflow-x:hidden">
        <table class="table table-bordered table-hover">
        <div id="conURLAlert"></div>
        <tbody> 
            <tr>
                <td class="text-left col-md-3"><b>Guideline URL</b></td>
                <td class="text-center col-md-8"><input name="form[conference_url]" placeholder="Guideline URL" class="form-control" type="text" value="<?php echo $conference_url->HP_PARM_DESC?>"></td>
                <td class="text-left">
                    <button type="button" class="btn btn-primary btn-md save_gui_url"><i class="fa fa-edit"></i> Save</button>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</form>
<br>

<div class="alert alert-info fade in">
    <b>Conference Setup (Oversea)</b>
</div>
<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_cso_btn"><i class="fa fa-plus"></i> Add Conference Setup (Oversea)</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_cso_list">
		<thead>
		<tr>
			<th class="text-center col-md-1">No</th>
            <th class="text-left">Email</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($conference_admin_email)) {
				foreach ($conference_admin_email as $cae) {
					echo '
                    <tr>
						<td class="text-center">' . $cae->HP_PARM_NO . '</td>
                        <td class="text-left">' . $cae->HP_PARM_DESC . '</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-xs del_cso_btn"><i class="fa fa-trash"></i> Delete</button>
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

<br>

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

<br>

<div class="alert alert-info fade in">
    <b>Reminder Setup</b>
</div>
<form id="saveRemSet" class="form-horizontal" method="post">
    <div id="remSetAlert"></div>
    <div style="max-height:500px;overflow-y:auto;overflow-x:hidden">
        <table class="table table-bordered table-hover">
        <tbody> 
            <tr>
                <td class="text-left col-md-4"><b>LMP Reminder</b></td>
                <td class="text-center col-md-1"><input name="form[conf_rpt_max_days_b4_reminder]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $conf_rpt_max_days_b4_reminder->HP_PARM_DESC?>"></td>
                <td>day(s)</td>
            </tr>
            <tr>
                <td class="text-left col-md-4"><b>Due Date for Staff To Submit LMP After Reminder</b></td>
                <td class="text-center col-md-1"><input name="form[conf_rpt_due_days_reminder]" placeholder="day(s)" class="form-control" type="text" value="<?php echo $conf_rpt_due_days_reminder->HP_PARM_DESC?>"></td>
                <td>day(s)</td>
            </tr>
        </tbody>
        </table>

        <div class="text-right"><button type="button" class="btn btn-primary btn-md save_reminder_setup" value=""><i class="fa fa-save"></i> Save</button></div>
    </div>
</form>