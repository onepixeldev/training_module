<form id="" class="form-horizontal">
    <br>
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
        <label class="col-md-2 control-label">Conference ID</label>
        <div class="col-md-2">
            <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[cr_name]" class="form-control" type="text" value="<?php echo $crname?>" id="cr_name" readonly>
        </div>
    </div>
</form>
<div class="alert alert-info fade in">
    <b>Part II</b>
</div>
<form class="form-horizontal">
    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>Title of paper work presented (1)</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="2" cols="50" readonly><?php echo $con_rep_partii->SCM_PAPER_TITLE?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>Title of paper work presented (2)</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="2" cols="50" readonly><?php echo $con_rep_partii->SCM_PAPER_TITLE2?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <label class="col-md-8 control-label text-left"><b>State the content of the Conference / Seminars / Workshops relevant to areas of expertise</b></label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $con_rep_partii->SCR_CONTENT?></textarea>
        </div>
    </div>
</form>
<div class="alert alert-info fade in">
    <b>Established networks and relationships (at least (3) people)</b>
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="part_ii">
		<thead>
		<tr>
			<th class="text-left col-md-4">Name</th>
            <th class="text-center col-md-2">Expertise</th>
            <th class="text-center col-md-2">Institution</th>
            <th class="text-center col-md-2">Tel No.</th>
            <th class="text-center col-md-2">Email</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($scr_parti)) {
				foreach ($scr_parti as $spi) {
					echo '
                    <tr>
						<td class="text-left">'.$spi->SCRP1_NAME.'</td>
                        <td class="text-center">'.$spi->SCRP1_FIELD.'</td>
                        <td class="text-center">'.$spi->SCRP1_INSTITUITION.'</td>
                        <td class="text-center">'.$spi->SCRP1_TELNO.'</td>
                        <td class="text-center">'.$spi->SCRP1_EMAIL.'</td>
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