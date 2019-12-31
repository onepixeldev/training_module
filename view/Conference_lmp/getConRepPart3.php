<form id="" class="form-horizontal">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $staff_name?>" id="staff_name" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Conference ID</label>
        <div class="col-md-2">
            <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[cr_name]" class="form-control" type="text" value="<?php echo $crname?>" id="cr_name" readonly>
        </div>
    </div>
</form>
<div class="alert alert-info fade in">
    <b>Part III</b>
</div>
<form class="form-horizontal">
    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>State the knowledge / understanding / a new experience has been obtained</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $con_rep_partiii->SCR_EXPERIENCE?></textarea>
        </div>
    </div>
</form>
<div class="alert alert-info fade in">
    <b>How will you use your new knowledge / understanding / experience gained from conference / seminar / workshop for activities in PTj. (Please use attachments if there is not enough space)</b>
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="">
		<thead>
		<tr>
			<th class="text-left col-md-4">Plan / Activity / Follow-Up at PTj</th>
            <th class="text-center col-md-2">Date will be applied</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($scr_partii)) {
				foreach ($scr_partii as $spii) {
					echo '
                    <tr>
						<td class="text-left">'.$spii->SCRP2_ACTIVITY.'</td>
                        <td class="text-center">'.$spii->SCRP2_IMPLEMENT_DATE.'</td>
					</tr>
					';
				}
			} else {
                echo '
                    <tr><td class="text-center" colspan="2">No record found</td></tr>
					';
            }
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>
<br>
<form class="form-horizontal">
    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>Do you have a networking relationship when attending a Conference / Seminar / Workshop inside or outside the country? With whom? How did you create that networking relationship?</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $con_rep_partiii->SCR_REMARK?></textarea>
        </div>
    </div>
</form>
<br>
<div class="alert alert-info fade in">
    <b>Please include a copy of the program book that prove your involvement in the conference / seminar / workshop</b>
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="">
		<thead>
		<tr>
			<th class="text-left col-md-4">Filename</th>
            <th class="text-center col-md-2">Proceedings File?</th>
            <th class="text-center col-md-2">Award Received</th>
            <th class="text-center col-md-2">Status of Proceedings</th>
            <th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($saa_detl)) {
				foreach ($saa_detl as $sd) {
					echo '
                    <tr>
						<td class="text-left">'.$sd->SAA_FILENAME.'</td>
                        <td class="text-center">'.$sd->PR_FILE.'</td>
                        <td class="text-center">'.$sd->SAA_PROCEEDING_AWARDED.'</td>
                        <td class="text-center">'.$sd->SAA_PROCEEDING_STATUS.'</td>
                        <td class="text-center"> 
                            <button type="button" class="btn btn-primary btn-xs attach_file_btn"><i class="fa fa-download"></i> File Attachment</button>
                        </td>
					</tr>
					';
				}
			} else {
                echo '
                    <tr><td class="text-center" colspan="5">No record found</td></tr>
					';
            }
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>
<br>