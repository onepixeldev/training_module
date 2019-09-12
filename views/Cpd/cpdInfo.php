
<form id="crCpdSetup" class="form-horizontal" method="post">
    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $title?>" id="title" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date from</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $cr_dt_fr?>" id="dtFrom" readonly>
        </div>

        <label class="col-md-2 control-label">Date to</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $cr_dt_to?>" id="dtTo" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Competency</label>
        <div class="col-md-2">
            <input name="form[competency]" class="form-control" type="text" value="<?php echo $comp?>" id="competency" readonly>
        </div>

        <label class="col-md-2 control-label">Mark</label>
        <div class="col-md-2">
            <input name="form[mark]" class="form-control" type="text" value="<?php echo $mark?>" id="mark" readonly>
        </div>
    </div>

    <div class="form-group text-right">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <button type="button" class="btn btn-primary btn-sm generate_mark_btn"><i class="fa fa-pie-chart"></i> Generate Mark</button>
        </div>
        
    </div>

    <br>
</form>
<div class="well">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_assign_cpd_list" style="width: 100%">
		<thead>
            <tr>
                <th class="text-center col-md-1">Staff ID</th>
                <th class="text-left col-md-4">Name</th>
                <th class="text-center col-md-1">Participant Role</th>
                <th class="text-center col-md-1">Status PMP</th>
                <th class="text-center col-md-2">Status LMP</th>
                <th class="text-center col-md-1">CPD Mark</th>
                <th class="text-center col-md-1">Competency</th>
                <th class="text-center col-md-2">Action</th>
            </tr>
		</thead>
		<tbody>
		<?php
			if (!empty($stf_list)) {
				foreach ($stf_list as $sl) {
					echo '
                    <tr>
                        <td class="text-center">'.$sl->SCM_STAFF_ID.'</td>
						<td class="text-left">'.$sl->SM_STAFF_NAME.'</td>
                        <td class="text-center">'.$sl->SCM_PARTICIPANT_ROLE.'</td>
                        <td class="text-left">'.$sl->STATUS_PMP.'</td>
                        <td class="text-left">'.$sl->STATUS_LMP.'</td>
                        <td class="text-center">'.$sl->SCM_CPD_MARK.'</td>
                        <td class="text-center">'.$sl->SCM_CPD_COMPETENCY.'</td>
						<td class="text-center col-md-1">
                            <button type="button" class="btn btn-success text-left btn-xs upd_cpd_btn"><i class="fa fa-pencil-square-o"></i> Update CPD</button>
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