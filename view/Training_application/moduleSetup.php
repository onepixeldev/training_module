<p>
<div id="msBTN">
	<?php
	if (empty($moduleSetup)) {
		echo '
			<div class="text-right">
				<button type="button" class="btn btn-primary btn-sm add_ms_btn" value='.$refid.'><i class="fa fa-plus"></i> Add Module</button>
			</div>
		';
	} else {
		echo '
			<div class="text-right">
				<button type="button" class="btn btn-danger btn-sm delete_ms_btn" value='.$refid.' id="del_ms_btn"><i class="fa fa-trash"></i> Delete Module</button>
			</div>
		';
	}
	?>
	<div class="text-right">
		<button type="button" class="btn btn-primary btn-sm add_ms_btn" id="insMs" value="<?php echo $refid ?>" style="display: none;"><i class="fa fa-plus"></i> Add Module</button>
		<button type="button" class="btn btn-danger btn-sm delete_ms_btn" id="remMs" value="<?php echo $refid ?>" style="display: none;"><i class="fa fa-trash"></i> Delete Module</button>
	</div>
</div>
<br>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_ms">
		<tbody>
		<?php
			if (!empty($moduleSetup)) {
				echo '
				<tr id="btnTr1">
					<td class="text-left col-md-1"><b>Specific Objectives</b></td>
					<td class="text-left col-md-10"><textarea class="form-control" type="text" rows="5" cols="50" readonly id="spObj">'. $moduleSetup->THD_TRAINING_OBJECTIVE2 .'</textarea></td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_ms1_btn" value='.$refid.' title="Edit Record"><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>

				<tr>
					<td class="text-left col-md-1"><b>Contents</b></td>
					<td class="text-left col-md-10"><textarea class="form-control" type="text" rows="5" cols="50" readonly id="msCont">'. $moduleSetup->THD_TRAINING_CONTENT .'</textarea></td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_ms2_btn" value='.$refid.' title="Edit Record"><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>

				<tr>
					<td class="text-left col-md-1"><b>Component/Category</b></td>
					<td class="text-left col-md-10" id="msComp">'. $moduleSetup->TMCDESC .'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_ms3_btn" value='.$refid.' title="Edit Record"><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>
				';
			}
			if (empty($moduleSetup)) {
				echo '<tr id="trNrecord"><td colspan="8" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>