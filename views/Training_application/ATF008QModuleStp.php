<div class="alert alert-success fade in">
    <b>Module Setup</b>
</div>

<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_ms">
		<tbody>
		<?php
			if (!empty($moduleSetup)) {
				echo '
				<tr id="btnTr1">
					<td class="text-left col-md-1"><b>Specific Objectives</b></td>
					<td class="text-left col-md-4"><textarea class="form-control" type="text" rows="2" cols="50" readonly id="spObj">'. $moduleSetup->THD_TRAINING_OBJECTIVE2 .'</textarea></td>
				</tr>

				<tr>
					<td class="text-left col-md-1"><b>Contents</b></td>
					<td class="text-left col-md-4"><textarea class="form-control" type="text" rows="2" cols="50" readonly id="msCont">'. $moduleSetup->THD_TRAINING_CONTENT .'</textarea></td>
				</tr>

				<tr>
					<td class="text-left col-md-1"><b>Component/Category</b></td>
					<td class="text-left col-md-4" id="msComp">'. $moduleSetup->TMCDESC .'</td>
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