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
<div id="cpdBTN">
<?php 
	if (empty($cpdSetup)) {
		echo '
			<div class="text-right">
				<button type="button" class="btn btn-primary btn-sm add_cpd_btn" value='.$refid.'><i class="fa fa-plus"></i> Add CPD</button>
			</div>
		';	
	} else {
		echo '
			<div class="text-right">
				<button type="button" class="btn btn-danger btn-sm delete_cpd_btn" value='.$refid.'><i class="fa fa-trash"></i> Delete CPD</button>
			</div>
		';	
	}
?>

	<div class="text-right">
		<button type="button" class="btn btn-primary btn-sm add_cpd_btn" id="insCPD" value="<?php echo $refid ?>" style="display: none;"><i class="fa fa-plus"></i> Add CPD</button>
		<button type="button" class="btn btn-danger btn-sm delete_cpd_btn" id="remCPD" value="<?php echo $refid ?>" style="display: none;"><i class="fa fa-trash"></i> Delete CPD</button>
	</div>
</div>
<br>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_cs">
		<tbody>
		<?php
			if (!empty($cpdSetup)) {
				echo '
				<tr>
					<td class="text-right col-md-2"><b>Competency</b></td>
					<td class="text-left col-md-5">'.$cpdSetup->CH_COMPETENCY.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_cpd1_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>

				<tr>
					<td class="text-right col-md-2"><b>Category</b></td>
					<td class="text-left col-md-5">'.$cpdSetupCatDesc.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_cpd2_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>

				<tr>
					<td class="text-right col-md-2"><b>Mark</b></td>
					<td class="text-left col-md-5">'.$cpdSetup->CH_MARK.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_cpd3_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
                </tr>
                
                <tr>
					<td class="text-right col-md-2"><b>Report Submission?</b></td>
					<td class="text-left col-md-5">'.$cpdSetup->REP_SUB.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_cpd4_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>

				<tr>
					<td class="text-right col-md-2"><b>Compulsory ?</b></td>
					<td class="text-left col-md-5">'.$cpdSetup->CHCOMPULSORY.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_cpd5_btn" value='.$refid.' title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>
				';
			}
			if (empty($cpdSetup)) {
				echo '<tr id="trNrecord"><td colspan="8" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>