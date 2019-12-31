<?php echo $this->lib->title('Training external speaker') ?>
<section id="widget-grid" class="well">
	<div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
		<header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Training External Speaker Query</h2>				
            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
        </header>	
			<div role="content">
				<div class="widget-body">
					<div class="text-right">
						<button type="button" class="btn btn-primary btn-sm add_es_btn"><i class="fa fa-plus"></i> Add New</button>
						<br>&nbsp;
					</div>
					<p>
					<table class="table table-bordered table-hover" id="tbl_list_es">
						<thead>
							<tr>
								<th class="col-sm-4 text-center" style="display: none">ID</th>
								<th class="text-center">No</th>
								<th class="col-sm-3">Name</th>
								<th class="">IC No.</th>
								<th class="">Organization</th>
								<th class="text-center">Position</th>
								<th class="text-center">Status</th>
								<th class="col-sm-3 text-center"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (!empty($basic_ext)) {
									$countN = 0;
									foreach ($basic_ext as $be) {
										$countN++;
										echo"
										<tr>
											<td style='display: none'>".$be->ES_SPEAKER_ID."</td>
											<td class='text-center' ><strong>".$countN."</strong></td>
											<td>".$be->ES_SPEAKER_NAME."</td>
											<td>".$be->ES_IC_NO."</td>
											<td>".$be->ES_DEPT."</td>
											<td class='text-center'>".$be->ES_POSITION."</td>
											<td class='text-center'>".$be->ES_STATUS."</td>
											<td class='text-center col-sm-2'>
													<button type='button' class='detail_es btn btn-xs btn-info'><i class='fa fa-info-circle'></i> Detail</button>
													<button type='button' class='edit_es btn btn-xs btn-success'><i class='fa fa-edit'></i> Edit</button>
													<button type='button' class='delete_es btn btn-xs btn-danger'><i class='fa fa-delete'></i> Delete</button>
											</td>
										</tr>";
									}
								} else {
									echo '<tr><td colspan="3" class="text-center">No record found.</td></tr>';
								}
							?>
						</tbody>
					</table>
					</p>
				</div>
			</div>
	</div>
</section>

<!-- DETAILS / ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- end DETAILS / ADD / EDIT / DELETE -->
<script>
	var dt_appl_row = '';
	// CALL ADD MODAL
	$('.add_es_btn').click(function () {
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addES')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	// CALL ES DETAIL MODAL
	$('.detail_es').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		//$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:lightblue"></i></center>');

		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:white"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('esDetail')?>',
				data: {'esID' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_es').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
		
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editES')?>',
				data: {'esID' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// DELETE page
	$('.delete_es').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
		
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delES')?>',
				data: {'esID' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	$.ajax({
		success: function() {
			dt_appl_row = $('#tbl_list_es').DataTable({
				"ordering":false
			});
		}
	});		
</script>