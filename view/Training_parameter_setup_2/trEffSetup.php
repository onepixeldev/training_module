<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Effectiveness Category Setup</h4>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_es">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Description</th>
            <th class="text-center">Order</th>
            <th class="text-center">Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($ef_cat)) {
				foreach ($ef_cat as $tac) {
                    $tacStatus = "";

                    if ($tac->TAC_STATUS == 'Y')
                    {
                        $tacStatus = 'ACTIVE';
                    } 
                    elseif ($tac->TAC_STATUS == 'N')
                    {
                        $tacStatus = 'INACTIVE';
                    } 
					echo '
					<tr>
						<td class="text-center col-md-1">' . $tac->TAC_CODE . '</td>
                        <td class="text-left">' . $tac->TAC_DESC . '</td>
                        <td class="text-center col-md-1">' . $tac->TAC_ORDERING . '</td>
                        <td class="text-center col-md-1">' . $tacStatus . '</td>
                        <td class="text-center col-md-3">
                        	<button type="button" class="btn btn-info btn-xs eff_title_setup" title="Effectiveness Title Setup"><i class="fa fa-arrow-down"></i> Select</button>
							<button type="button" class="btn btn-success btn-xs edit_tac" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tac" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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

<br>
<!-------------------------->
<div>
	<h4 class="panel-heading bg-color-blueDark txt-color-white">Effectiveness Title Setup</h4>

	<div id="ef_title_setup">
	<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th class="text-center">Please select category from Effectiveness Category Setup</th>
		</tr>
		</thead>
	</table>
	</div>
</div>	
<!-------------------------->

<br>
<!-------------------------->
<div>
	<h4 class="panel-heading bg-color-blueDark txt-color-white">Effectiveness Setup</h4>

	<div id="ef_setup">
	<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th class="text-center">Please select category from Effectiveness Category Setup</th>
		</tr>
		</thead>
	</table>
	</div>
</div>	
<!-------------------------->
<script>
	//var dt_obj = '';
	//var dt_obj2 = '';

	// DELETE page - category setup
	$('.delete_tac').click(function () {
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
				url: '<?php echo $this->lib->class_url('delTAC')?>',
				data: {'codeTAC' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page - category setup
	$('.edit_tac').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTAC')?>',
				data: {'codeTAC' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

    $('.eff_title_setup').click(function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var codeTAC = td.eq(0).html().trim();
        var descTAC = td.eq(1).html().trim();
		//alert(recCode);

		//$('#assessment_list_spinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#ef_title_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#ef_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('effTitleSetup')?>',
			data: {'codeTAC' : codeTAC, 'descTAC' : descTAC},
			success: function(res) {
				$('#ef_title_setup').html(res);

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('effSetup')?>',
					data: {'codeTAC' : codeTAC, 'descTAC' : descTAC},
					success: function(res2) {
						$('#ef_setup').html(res2);
					}
				});	
			}
		});
	});	
</script>