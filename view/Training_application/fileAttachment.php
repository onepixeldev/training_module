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
<div class="row" id="fileAttBtn">
	<div class="col-sm-3">
         <div class="form-group text-right">
            <button type="button" class="btn btn-primary btn-sm add_cpd_btn" id="insCPD" value="<?php echo $refid ?>"><i class="fa fa-plus"></i> File Attachment</button>
		</div>
	</div>
</div>
</p>