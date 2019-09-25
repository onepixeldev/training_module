<div class="alert alert-info fade in">
    <b>Training Details</b>
</div>
<form id="" class="form-horizontal">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Training Refid</label>
        <div class="col-md-2">
            <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[cr_name]" class="form-control" type="text" value="<?php echo $title?>" id="cr_name" readonly>
        </div>
    </div>
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
        <label class="col-md-2 control-label">Submission Date</label>
        <div class="col-md-2">
            <input name="form[submission_date]" class="form-control" type="text" value="<?php echo $sub_date?>" id="submission_date" readonly>
        </div>
    </div>
</form>

<form class="form-horizontal">
    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>Objective</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="2" cols="50" readonly><?php echo $obj?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>Benefit to Staff</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="2" cols="50" readonly><?php echo $ben_stf?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>Benefit to University / Department / Unit</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $ben_dept?></textarea>
        </div>
    </div>
</form>

<br>

<div class="alert alert-info fade in">
    <b>Action Plan</b>
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="">
		<thead>
		<tr>
			<th class="text-center col-md-1">No</th>
            <th class="text-center col-md-2">Task</th>
            <th class="text-center col-md-2">Implementation</th>
            <th class="text-center col-md-2">Effect</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($strp_detl)) {
				foreach ($strp_detl as $sd) {
					echo '
                    <tr>
						<td class="text-center col-md-1">'.$sd->STRP_SEQ.'</td>
                        <td class="text-left col-md-2">'.$sd->STRP_TASK.'</td>
                        <td class="text-left col-md-2">'.$sd->STRP_IMPLEMENTATION.'</td>
                        <td class="text-left col-md-2">'.$sd->STRP_EFFECT.'</td>
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

<form id="" class="form-horizontal">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Recommend By</label>
        <div class="col-md-2">
            <input name="form[recommend_by_id]" class="form-control" type="text" value="<?php echo $rec_id?>" id="recommend_by_id" readonly>
        </div>

        <div class="col-md-4">
            <input name="form[recommend_by_name]" class="form-control" type="text" value="<?php echo $rec_name?>" id="recommend_by_name" readonly>
        </div>

        <label class="col-md-1 control-label">Date</label>
        <div class="col-md-2">
            <input name="form[recommend_date]" class="form-control" type="text" value="<?php echo $rec_date?>" id="recommend_date" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve By</label>
        <div class="col-md-2">
            <input name="form[approve_by_id]" class="form-control" type="text" value="<?php echo $app_id?>" id="approve_by_id" readonly>
        </div>

        <div class="col-md-4">
            <input name="form[approve_by_name]" class="form-control" type="text" value="<?php echo $app_name?>" id="approve_by_name" readonly>
        </div>

        <label class="col-md-1 control-label">Date</label>
        <div class="col-md-2">
            <input name="form[approve_date]" class="form-control" type="text" value="<?php echo $app_date?>" id="approve_date" readonly>
        </div>
    </div>
</form>