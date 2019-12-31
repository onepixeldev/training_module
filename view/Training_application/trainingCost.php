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
<div class="well">
	<div class="row table-condensed table-responsive">
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
				echo '<tr id="trNrecord"><td colspan="12" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>