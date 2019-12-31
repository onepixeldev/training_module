<p>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>SUMMARY : </b></label>
		</div>
	</div>

	<div class="container col-md-4">
		<div class="panel panel-default">
			<div class="panel-body" id="summary"><?php echo $summary?></div>
		</div>
	</div>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_tr_list">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
            <th class="text-left">Title</th>
            <th class="text-left">Venue</th>
            <th class="text-center">Date From</th>
            <th class="text-center">Date To</th>
			<th class="text-center" id="trListAct">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($tr_list)) {
				foreach ($tr_list as $trl) {
                    $fontIn = '';
                    $fontOut = '</font>';
                    if(!empty($trl->TSR_REFID)) {
                        $fontIn = '<font color="green">';
                        $button = '<button type="button" class="btn btn-success btn-xs select_training_btn"><i class="fa fa-info-circle"></i> Details</button>';
                    } else {
                        $fontIn = '<font color="red">';
                        $button = '<button type="button" class="btn btn-danger btn-xs select_training_btn"><i class="fa fa-info-circle"></i> Details</button>';
                    }
                    echo '
                        <tr>
                            <td class="text-center col-md-2">' . $fontIn . $trl->TH_REF_ID . $fontOut . '</td>
                            <td class="text-left col-md-4">' . $fontIn . $trl->TH_TRAINING_TITLE . $fontOut . '</td>
                            <td class="text-left col-md-2">' . $fontIn . $trl->TH_TRAINING_VENUE . $fontOut . '</td>
                            <td class="text-center col-md-1">' . $fontIn . $trl->TH_DATE_FROM . $fontOut . '</td>
                            <td class="text-center col-md-1">' . $fontIn . $trl->TH_DATE_TO . $fontOut . '</td>
                            <td class="text-center col-md-2">
                                '.$button.'
                                <button type="button" class="btn btn-info btn-xs scre_gen_rpt_btn" value='.$trl->TH_REF_ID.' data-form-code="ATR251"><i class="fa fa-file-pdf-o"></i> Form</button>
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
<br>
<div id="scre_report_form">
    <h4 class="panel-heading bg-color-blueDark txt-color-white">Report Manual Entry Form</h4>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="text-center">Please select detail in Course Info</th>
        </tr>
        </thead>
    </table>
</div>
</p>