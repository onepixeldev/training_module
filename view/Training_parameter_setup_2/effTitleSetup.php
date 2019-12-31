<p>
<div class="text-right">
    <button type="button" class="btn btn-primary btn-sm add_tet" value="<?php echo $tac_code ?>"><i class="fa fa-plus"></i> Add New Effectiveness Title (<?php echo $tac_desc ?>)</button>
</div>
<br>
<div class="well">
	<h5><b>Category: </b><?php echo $tac_desc ?></h5>
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tet">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Description</th>
            <th class="text-center">Order</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			//$no = 0;
			if (!empty($ef_title_se)) {
				foreach ($ef_title_se as $ets) {
					echo '
					<tr>
						<td class="text-center col-md-1">' . $ets->TET_CODE . '</td>
                        <td class="text-left">' . $ets->TET_DESC . '</td>
                        <td class="text-center col-md-1">' . $ets->TET_ORDERING . '</td>
						<td class="text-center col-md-3">
							<button type="button" class="btn btn-info btn-xs eff_setup" value='.$tac_code.' title="Effectiveness Setup"><i class="fa fa-arrow-down"></i> Select</button>
							<button type="button" class="btn btn-success btn-xs edit_tet" title="Edit Record" value='.$tac_code.'><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tet" title="Delete Record" value='.$tac_code.'><i class="fa fa-trash"></i> Delete</button>
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
	$('.delete_tet').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
        var recCode = td.eq(0).html().trim();
        var recType = thisBtn.val();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTET')?>',
				data: {'tacCode' : recType, 'tetCode' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tet').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
        var recType = thisBtn.val();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTET')?>',
				data: {'tacCode' : recType, 'tetCode' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
    });
    
    // ADD
	$('.add_tet').click(function () {
        var thisBtn = $(this);
		var recCode = thisBtn.val();
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
            url: '<?php echo $this->lib->class_url('addEffTitle')?>',
            data: {'tac_code' : recCode},
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	$('.eff_setup').click(function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var codeTET = td.eq(0).html().trim();
        var descTET = td.eq(1).html().trim();
		var codeTAC = thisBtn.val();
		//alert(recCode);

		$('#ef_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('effSetup2')?>',
			data: {'codeTET' : codeTET, 'descTET' : descTET, 'coteTAC' : codeTAC},
			success: function(res) {
				$('#ef_setup').html(res);
			}
		});	
	});	
</script>