<div class="alert alert-success fade in">
    <b>Training Cost</b>
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
		<table class="table table-bordered table-hover" id="tbl_list_tcost">
		<thead>
		<tr>
                    <th class="text-center">Cost Code</th>
                    <th class="text-left">Description</th>
                    <th class="text-center">Amount (RM)</th>
                    <th class="text-center">Remark</th>
		</tr>
		</thead>
		<tbody>
		<?php
                if ($trInfo->TH_INTERNAL_EXTERNAL == 'EXTERNAL_AGENCY') {
                    
			if (!empty($trCost)) {
				foreach ($trCost as $tcos) {
					echo '
                        <tr>
			<td class="text-center col-md-1">' . $tcos->TC_COST_CODE . '</td>
                        <td class="text-left">' . $tcos->TCT_DESC . '</td>
                        <td class="text-center col-md-2">' . number_format($tcos->TC_AMOUNT,2). '</td>
                        <td class="text-center col-md-3">' . $tcos->TC_REMARK . '</td>
			</tr>
			';
				}
			}
			if (empty($trCost)) {
				echo '<tr id="trNrecord"><td colspan="12" class="text-center" style="font-weight:bold">No record found.</td></tr>';
			}
               } else{
                    echo '<tr id="trNrecord"><td colspan="12" class="text-center" style="font-weight:bold"><i>Training Cost only available for External Agency Training Only</i></td></tr>';
                }
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>




 
 

 

  
    

