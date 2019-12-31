<?php echo $this->lib->title('Conference / Conference Reports', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF091 - Conference Reports</h2>				
            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div role="content">
            <div class="jarviswidget-editbox">
            </div>
            <div class="widget-body">
                <div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
					</header>

                    <!-- widget div-->
                    <div role="content">
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <div class="widget-body">

                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Report</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Report (II)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Academic</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Non-Academic</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="report">
									</div>
                                </div>

								<div class="tab-pane fade" id="s2">
									<div id="report2">
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div id="academic">
									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div id="non_academic">
									</div>
                                </div>

                            </div>
                            <!-- end myTabContent1 -->
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="mContent">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content" id="mContent2">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<script>
	var a_row = '';
	var b_row = '';

	$(document).ready(function(){

		$("#myModalis").draggable({
			handle: ".modal-content"
		});

		$("#myModalis2").draggable({
			handle: ".modal-content"
		});
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

    // REPORT I
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('reportI')?>',
		data: '',
		beforeSend: function() {
			$('#report').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report').html(res);
		},
    });

    // REPORT II
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('reportII')?>',
		data: '',
		beforeSend: function() {
			$('#report2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report2').html(res);
		},
    });

    // ACADEMIC
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('repAcademic')?>',
		data: '',
		beforeSend: function() {
			$('#academic').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#academic').html(res);
		},
    });

    // NON-ACADEMIC
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('repNonAcademic')?>',
		data: '',
		beforeSend: function() {
			$('#non_academic').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#non_academic').html(res);
		},
    });

	/*-----------------------------
	TAB 1 - REPORT
	-----------------------------*/

	// PRINT REPORT
	$('#report').on('click','.gen_rep_btn', function () {
		var thisBtn = $(this);
		var year = $("#year_a").val();
		var month = $("#month_a").val();
		var dept = $("#ptj_faculty_a").val();
		var category = $("#category_a").val();
		var allocation = $("#allocation_a").val();
		var status = $("#status_a").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+month+' '+dept+' '+category+' '+allocation+' '+status+' '+repCode);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'year':year, 'month':month, 'dept':dept, 'category':category, 'allocation':allocation, 'status':status, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});

	/*-----------------------------
	TAB 2 - REPORT II
	-----------------------------*/

	///// SEARCH STAFF//////
	// AUTO SEARCH STAFF ID
	$('#report2').on('keyup','#staff_id_2', function(){
		// console.log(this.value);
		var val_length = this.value.length;
		var staff_id = this.value;
		msg.wait('#alertStfID');

		// console.log(val_length);

		if(val_length >= 5) {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('staffKeyUp')?>',
				data: {'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						msg.show('Staff ID is valid', 'success', '#alertStfID');
						$('#staff_name_2').val(res.stf_name);
					} else {
						msg.show('Invalid Staff ID', 'danger', '#alertStfID');
						$('#staff_name_2').val('');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'danger', '#alertStfID');
			$('#staff_name_2').val('');
		}
	});

	// SEARCH STAFF
	$('#report2').on('click','.search_staff', function(){
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: '',
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// SEARCH STAFF MODAL
	$('#myModalis').on('click', '.search_staff_md', function () {
		var staff_id = $('#myModalis #staff_id').val();
		search_trigger = 1;
		// console.log(staff_id);

		if(staff_id == '') {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
				data: '',
				success: function(res) {
					$('#myModalis .modal-content').html(res);
					msg.show('Please enter Staff ID / Name', 'danger', '#myModalis .modal-content #alertStfIDMD');
				}
			});
			return;
		}

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: {'staff_id':staff_id, 'search_trigger':search_trigger,},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				$('#myModalis #staff_list').removeClass('hidden');

				stf_row = $('#myModalis #tbl_stf_res_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});

	// SELECT STAFF ID
	$('#myModalis').on('click', '.select_staff_id', function () {
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		
		if(staff_id != '' && staff_name != '') {
			$('#staff_id_2').val(staff_id);
			$('#staff_name_2').val(staff_name);
		}
	});
	///// SEARCH STAFF//////

	// PRINT REPORT
	$('#report2').on('click','.gen_rep_btn2', function () {
		var thisBtn = $(this);
		var year = $("#year_a_rep2").val();
		var dept = $("#ptj_faculty_rep2").val();
		var staff_id = $("#staff_id_2").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+dept+' '+staff_id+' '+repCode);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'year':year, 'dept':dept, 'staff_id':staff_id, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});

	// PRINT REPORT - ATR134
	$('#report2').on('click','.gen_rep_btn2b', function () {
		var thisBtn = $(this);
		var year = $("#year_rep2").val();
		var month = $("#month_rep2").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+month+' '+repCode);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'year':year, 'month':month, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});

	/*-----------------------------
	TAB 3 - ACADEMIC REPORT
	-----------------------------*/

	// UNIT DEPT LIST
	$('#academic').on('change', '.select2-filter', function() {
		var dept_code = $('#ptj_faculty_aca').val();
		$('#loaderF').html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
		$('#dept_aca').html('');
		// console.log(dept_code);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getUnitDeptList')?>',
			data: {'dept_code' : dept_code},
			dataType: 'json',
			success: function(res) {
				$('#loaderF').html('');

				var resList = '<option value="" selected > ---Please select--- </option>';
				
				if (res.sts == 1) {
					for (var i in res.unit_dept) {
						resList += '<option value="'+res.unit_dept[i]['DM_DEPT_CODE']+'">'+res.unit_dept[i]['DM_DEPT_CODE_DESC']+'</option>';
					}
				} 
				
				$("#dept_aca").html(resList);
			}
		});
	});

	// PRINT REPORT - ATR134
	$('#academic').on('click','.gen_rep_btn_aca', function () {
		var thisBtn = $(this);
		var year = $("#year_aca").val();
		var month = $("#month_aca").val();
		var fac = $("#ptj_faculty_aca").val();
		var unit = $("#dept_aca").val();
		var sts = $("#status_aca").val();
		var dom_ovs = $("#dom_osea_aca").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+month+' '+fac+' '+unit+' '+sts+' '+dom_ovs+' '+repCode);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'year':year, 'month':month, 'fac':fac, 'unit':unit, 'sts':sts, 'dom_ovs':dom_ovs, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});

	// VIEW FILE ATTACHMENT
	$('#part_iii').on('click','.attach_file_btn', function(){
		var thisBtn = $(this);
		staff_id = $('#staff_id').val();
		cr_refid = $('#refid').val();
		var td = thisBtn.parent().siblings();
		var file_name = td.eq(0).html().trim();
		// alert(staff_id+' '+cr_refid);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('dloadFileAttParam')?>',
			data: {'staff_id' : staff_id, 'cr_refid' : cr_refid, 'file_name' : file_name},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
					var ecommURL = '<?php echo $this->lib->class_url('fileAttachmentDload') ?>';
					var newWin = window.open(ecommURL, 'title', 'width=800, height=300');
				} else {
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
				}
			}
		});
    });

	/*-----------------------------
	TAB 3 - NON-ACADEMIC REPORT
	-----------------------------*/

	// UNIT DEPT LIST
	$('#non_academic').on('change', '.select2-filter', function() {
		var dept_code = $('#ptj_faculty_naca').val();
		$('#loaderFN').html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
		$('#dept_naca').html('');
		// console.log(dept_code);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getUnitDeptList')?>',
			data: {'dept_code' : dept_code},
			dataType: 'json',
			success: function(res) {
				$('#loaderFN').html('');

				var resList = '<option value="" selected > ---Please select--- </option>';
				
				if (res.sts == 1) {
					for (var i in res.unit_dept) {
						resList += '<option value="'+res.unit_dept[i]['DM_DEPT_CODE']+'">'+res.unit_dept[i]['DM_DEPT_CODE_DESC']+'</option>';
					}
				} 
				
				$("#dept_naca").html(resList);
			}
		});
	});

	// PRINT REPORT - ATR134
	$('#non_academic').on('click','.gen_rep_btn_naca', function () {
		var thisBtn = $(this);
		var year = $("#year_naca").val();
		var month = $("#month_naca").val();
		var fac = $("#ptj_faculty_naca").val();
		var unit = $("#dept_naca").val();
		var sts = $("#status_naca").val();
		var dom_ovs = $("#dom_osea_naca").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+month+' '+fac+' '+unit+' '+sts+' '+dom_ovs+' '+repCode);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'year':year, 'month':month, 'fac':fac, 'unit':unit, 'sts':sts, 'dom_ovs':dom_ovs, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});
</script>