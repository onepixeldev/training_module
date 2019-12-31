<p>
<div class="text-right">
    <button type="button" class="btn btn-primary btn-sm add_effs" value="<?php echo $tac_code ?>"><i class="fa fa-plus"></i> Add New Effectiveness Setup (<?php echo $tac_desc ?>)</button>
</div>
<br>
<div class="well">
	<h5><b>Category: </b><?php echo $tac_desc ?></h5>
	<div class="row">
		<table class="table table-bordered table-hover" id="">
		<thead>
		<tr>
			<th class="text-center">Type</th>
			<th class="text-center">Order</th>
            <th class="text-center">No. Portal</th>
            <th class="text-center">No</th>
            <th class="text-center">Description</th>
            <th class="text-center">Effectiveness Type</th>
            <th class="text-center">Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			//$no = 0;
			if (!empty($ef_se)) {
				foreach ($ef_se as $efs) {
					$sts = '';
					if($efs->TAS_STATUS == 'Y')
					{
						$sts = 'ACTIVE';
					} elseif($efs->TAS_STATUS == 'N')
					{
						$sts = 'INACTIVE';
					} else {
						$sts = '';
					}
					echo '
					<tr>
						<td class="text-center col-md-1">' . $efs->TAS_TYPE . '</td>
                        <td class="text-center col-md-1">' . $efs->TAS_ORDERING . '</td>
                        <td class="text-center col-md-1">' . $efs->TAS_NUMBERING . '</td>
                        <td class="text-center col-md-1">' . $efs->TAS_CODE . '</td>
                        <td class="text-left">' . $efs->TAS_DESC . '</td>
                        <td class="text-center col-md-1">' . $efs->TAS_ASSESSMENT_TYPE . '</td>
                        <td class="text-center col-md-1">' . $sts . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_effs" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_effs" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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
	$('.delete_effs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
        //var tasType = td.eq(0).html().trim();
		var tasCode = td.eq(3).html().trim();
        //var tasCatCode = thisBtn.val();
		//alert(recCode);
		
		if (tasCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTASEff')?>',
				data: {'tas_code' : tasCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_effs').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var tasCode = td.eq(3).html().trim();
		//alert(recCode);
		
		if (tasCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTASEff')?>',
				data: {'tas_code' : tasCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
    });
    
    // ADD
	$('.add_effs').click(function () {
        var thisBtn = $(this);
		var recType = thisBtn.val();
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
            url: '<?php echo $this->lib->class_url('addTASEff')?>',
            data: {'codeTAC' : recType},
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
    });
</script>