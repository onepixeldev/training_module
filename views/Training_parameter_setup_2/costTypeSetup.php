<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Cost Type Setup</h4>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tcs">
		<thead>
		<tr>
			<th class="text-center">Cost Code</th>
			<th class="text-center">Description</th>
            <th class="text-center">Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($tr_cost_st)) {
				foreach ($tr_cost_st as $tcs) {
                    $tcsStatus = "";

                    if ($tcs->TCT_STATUS == 'Y')
                    {
                        $tcsStatus = 'ACTIVE';
                    } 
                    elseif ($tcs->TCT_STATUS == 'N')
                    {
                        $tcsStatus = 'INACTIVE';
                    }
                    else {
                        $tcsStatus = '';
                    }   
					echo '
					<tr>
						<td class="text-center col-md-1">' . $tcs->TCT_CODE . '</td>
						<td class="text-left">' . $tcs->TCT_DESC . '</td>
                        <td class="text-center col-md-1">' . $tcsStatus . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_tcs" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tcs" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			} else {
				echo '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>

<br><br><br>

<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_tfs"><i class="fa fa-plus"></i> Add New Fee Category</button>
</div>
<br>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Fee Category Setup</h4>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tfs">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Description</th>
			<th class="text-center">Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($tr_fee_st)) {
				foreach ($tr_fee_st as $tfs) { 
					$mpe = '';
					$sts = '';

					if ($tfs->TFS_MPE_APPROVE == 'Y'){
						$mpe = 'YES';
					} elseif ($tfs->TFS_MPE_APPROVE == 'N'){
						$mpe = 'NO';
					} else {
						$mpe = '';
					}

					if ($tfs->TFS_STATUS == 'Y'){
						$sts = 'ACTIVE';
					} elseif ($tfs->TFS_STATUS == 'N'){
						$sts = 'INACTIVE';
					} else {
						$sts = '';
					}

					echo '
					<tr>
						<td class="text-center col-md-1">' . $tfs->TFS_CODE . '</td>
						<td class="text-left">' . $tfs->TFS_DESC . '</td>
						<td class="text-center col-md-1">' . $sts . '</td>
						<td class="text-center col-md-3">
							<button type="button" class="btn btn-info btn-xs detail_tfs" title="More details"><i class="fa fa-info-circle"></i> Details</button>
							<button type="button" class="btn btn-success btn-xs edit_tfs" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tfs" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			} else {
				echo '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>
<script>

	// DELETE page
	$('.delete_tcs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delCTS')?>',
				data: {'codeTCS' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tcs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editCTS')?>',
				data: {'codeTCS' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// ADD - fee category
	$('.add_tfs').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTFS')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	// DETAIL page - fee category
	$('.detail_tfs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('detailTFS')?>',
				data: {'codeTFS' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// DELETE page - fee category
	$('.delete_tfs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTFS')?>',
				data: {'codeTFS' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page - fee category
	$('.edit_tfs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTFS')?>',
				data: {'codeTFS' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>