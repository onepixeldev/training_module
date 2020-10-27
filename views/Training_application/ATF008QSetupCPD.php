<div class="alert alert-success fade in">
    <b>CPD Setup</b>
</div>
<div class="row">
    <div class="col-sm-2">
	<div class="form-group text-left">
            <label><b>Reference ID :</b></label>
	</div>
    </div> 
    <div class="col-sm-4">
        <div class="form-group text-left text-primary"><strong><?php echo  $ref_id?></strong></div>
    </div> 
    <div class="col-sm-2">
        <div class="form-group text-left">
            <label><b>Training Title :</b></label>
        </div>
    </div> 
    <div class="col-sm-4">
            <div class="form-group text-left text-primary"><strong><?php echo  $trInfo->TH_TRAINING_TITLE?></strong></div>
    </div> 
</div>
<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_cs">
		<tbody>
		<?php
			if (!empty($cpdSetup)) {
				echo '
				<tr>
					<td class="text-left col-md-2"><b>Competency</b></td>
					<td class="text-left col-md-5">'.$cpdSetup->CH_COMPETENCY.'</td>
				</tr>

				<tr>
					<td class="text-left col-md-2"><b>Category</b></td>
					<td class="text-left col-md-5">'.$cpdSetupCatDesc.'</td>
				</tr>

				<tr>
					<td class="text-left col-md-2"><b>Mark</b></td>
					<td class="text-left col-md-5">'.$cpdSetup->CH_MARK.'</td>
                </tr>
                
                <tr>
					<td class="text-left col-md-2"><b>Report Submission?</b></td>
					<td class="text-left col-md-5">'.$cpdSetup->REP_SUB.'</td>
				</tr>

				<tr>
					<td class="text-left col-md-2"><b>Compulsory ?</b></td>
					<td class="text-left col-md-5">'.$cpdSetup->CHCOMPULSORY.'</td>
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