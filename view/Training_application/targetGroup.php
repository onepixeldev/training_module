<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>REFERENCE ID : </b></label>
		</div>
	</div> 
	<div class="col-sm-10">
		<div class="form-group text-left"><?php echo $refid. " - " .$tname?></div>
	</div> 
</div>
<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Target Group</h4>
<br>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_tg" value="<?php echo $refid?>"><i class="fa fa-plus"></i> Add Target Group</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_list_tg">
		<thead>
		<tr>
			<th class="text-center">Group Code</th>
			<th class="text-left">Description</th>
            <th class="text-center">Scheme Code</th>
            <th class="text-center">Grade (From)</th>
            <th class="text-center">Grade (To)</th>
            <th class="text-center">Service Year (From)</th>
            <th class="text-center">Service Year (To)</th>
            <th class="text-center">Service Group</th>
            <th class="text-center">Academician?</th>
            <th class="text-center">New Staff?</th>
            <th class="text-center">Compulsory?</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($targetGroup)) {
				foreach ($targetGroup as $tg) {
					echo '
                    <tr>
						<td class="text-center col-md-2">' . $tg->TTG_GROUP_CODE . '</td>
                        <td class="text-left col-md-3">' . $tg->TG_GROUP_DESC . '</td>
                        <td class="text-center">' . $tg->TG_SCHEME . '</td>
                        <td class="text-center">' . $tg->TG_GRADE_FROM . '</td>
                        <td class="text-center">' . $tg->TG_GRADE_TO . '</td>
                        <td class="text-center">' . $tg->TG_SERVICE_YEAR_FROM . '</td>
                        <td class="text-center">' . $tg->TG_SERVICE_YEAR_TO . '</td>
                        <td class="text-center">' . $tg->TG_SERVICE_GROUP . '</td>
                        <td class="text-center">' . $tg->TGACADEMIC . '</td>
                        <td class="text-center">' . $tg->TGNEWSTAFF . '</td>
                        <td class="text-center">' . $tg->TGCOMPULSORY . '</td>
						<td class="text-center col-md-3">
							<button type="button" class="btn btn-info btn-xs pos_tg_btn"><i class="fa fa-info-circle"></i> Position</button>
							<button type="button" class="btn btn-danger btn-xs del_tg_btn" value='.$refid.'><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			}
			if (empty($targetGroup)) {
				echo '<tr id="trNrecord"><td colspan="12" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>

<br>
<!-------------------------->
<div>
    <h4 class="panel-heading bg-color-blueDark txt-color-white">Module Setup</h4>
	<div id="module_setup">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center">Please select training from Training Info</th>
            </tr>
            </thead>
        </table>
	</div>
</div>	
<!-------------------------->