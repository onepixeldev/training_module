<?php echo $this->lib->title('Conference / CPD Reports', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF136 - CPD Reports</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Coordinator Reports</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Sector Panel Reports</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Statistics</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="coor_report">
									</div>
                                </div>

								<div class="tab-pane fade" id="s2">
									<div id="panel_report">
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div id="statistics">
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
	var stf_row = '';

	$(document).ready(function(){

		$("#myModalis").draggable({
			handle: ".modal-content"
		});

		$("#myModalis2").draggable({
			handle: ".modal-content"
		});

        // PREVENT SUBMIT RELOAD
		$('#myModalis').on('submit', function(e){
			e.preventDefault();
		});
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

    // COORDINATOR REPORT
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('coorReport')?>',
		data: '',
		beforeSend: function() {
			$('#coor_report').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#coor_report').html(res);
		},
    });

    // PANEL SECTOR REPORT
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('sectorReport')?>',
		data: '',
		beforeSend: function() {
			$('#panel_report').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#panel_report').html(res);
		},
    });

    // STATISTICS REPORT
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('statReport')?>',
		data: '',
		beforeSend: function() {
			$('#statistics').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#statistics').html(res);
		},
    });

	/*-----------------------------
	TAB 1 - COOR REPORT
	-----------------------------*/

	// PRINT REPORT COOR
	$('#coor_report').on('click','.gen_rep_btn', function () {
		var thisBtn = $(this);
		var year = $("#year_a").val();
		var dept = $("#ptj_faculty_a").val();
        var format = $("#format").val();
        var staff_id = $("#staff_id").val().toUpperCase();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+dept+' '+format+' '+repCode+' '+staff_id);
        show_loading();

        // if(dept == '') {
        //     hide_loading();
        //     $.alert({
        //         title: 'Alert!',
        //         content: 'Please select department.',
        //         type: 'red',
        //     });
        //     return;
        // }
        
        // VALIDATE HRD
        $.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('validateHrd')?>',
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
					hide_loading();
					// is_hr = res.is_hr;
					$.ajax({
                        type: 'POST',
                        url: '<?php echo $this->lib->class_url('setRepParam')?>',
                        data: {'year':year, 'dept':dept, 'format':format, 'staff_id':staff_id, 'repCode':repCode, 'is_hr':res.is_hr},
                        dataType: 'JSON',
                        success: function(res) {
                            window.open("report?r="+res.report,"mywin","width=800,height=600");
                        }
                    });
				} else {
                    hide_loading();
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
				}
			}
		});
	});

    ///// SEARCH STAFF//////

	// AUTO SEARCH STAFF ID
	$('#coor_report').on('keyup','#staff_id', function(){
		// console.log(this.value);
		var val_length = this.value.length;
		var staff_id = this.value;
		msg.wait('#alertStfID');

		if(val_length >= 5) {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('staffKeyUp')?>',
				data: {'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						msg.show('Staff ID is valid', 'success', '#alertStfID');
						$('#staff_name').val(res.stf_name);
					} else {
						msg.show('Invalid Staff ID', 'danger', '#alertStfID');
						$('#staff_name').val('');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'danger', '#alertStfID');
			$('#staff_name').val('');
		}
	});

	// SEARCH STAFF
	$('#coor_report').on('click','.search_staff', function(){
        // var dept = $("#ptj_faculty_a").val();
        search_trigger = 0;

        // if(dept == '') {
        //     $.alert({
        //         title: 'Alert!',
        //         content: 'Please select department.',
        //         type: 'red',
        //     });
        //     return;
        // }

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: {'search_trigger':search_trigger},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
                $('#myModalis #staff_list').removeClass('hidden');

                stf_row = $('#myModalis #tbl_stf_res_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});

	// SEARCH STAFF MODAL
	$('#myModalis').on('click', '.search_staff_md', function () {
		var staff_id = $('#myModalis #staff_id').val();
        var dept = $('#coor_report #ptj_faculty_a').val();
		search_trigger = 1;
		// console.log(dept);
		
		if(staff_id == '') {
			msg.show('Please enter Staff ID / Name', 'warning', '#myModalis .modal-content #alertStfIDMD');
			return;
		}

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: {'staff_id':staff_id, 'search_trigger':search_trigger, 'dept':dept},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				$('#myModalis #staff_list').removeClass('hidden');

				stf_row = $('#myModalis #tbl_stf_res_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});

	// ENTER BUTTON NOT ALLOWED
	$('#myModalis').on('keyup', '#staff_id', function (e) {
		if (e.keyCode === 13) {
            e.preventDefault();
			msg.show('Enter button are not allowed', 'warning', '#myModalis .modal-content #alertStfIDMD');
			return;
        }
	});

	// SELECT STAFF ID
	$('#myModalis').on('click', '.select_staff_id', function () {
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		
		if(staff_id != '' && staff_name != '') {
			$('#staff_id').val(staff_id);
			$('#staff_name').val(staff_name);
		}
	});
	///// SEARCH STAFF//////

	/*-----------------------------
	TAB 2 - SECTOR REPORT
	-----------------------------*/

    // CHANGE YEAR - JOB LIST
    $('#panel_report').on('change', '#year_coor', function() {
		var year = $(this).val();
        var sector = $('#sector').val();
        var scheme = $('#scheme').val();
		$('#faspinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#job').html('');

        // console.log(year+' '+sector+' '+scheme);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getJobList')?>',
			data: {'year' : year, 'sector' : sector, 'scheme' : scheme},
			dataType: 'json',
			success: function(res) {
				$('#faspinner').html('');
				
				var resList = '<option value="" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.job_list) {
						resList += '<option value="'+res.job_list[i]['SS_SERVICE_CODE']+'">'+res.job_list[i]['SS_SERVICE_CODE_DC']+'</option>';
                    }
                } 
				
				$("#job").html(resList);				
			}
		});
	});

    // CHANGE SECTOR - JOB LIST
    $('#panel_report').on('change', '#sector', function() {
		var year = $('#year_coor').val();
        var sector = $(this).val();
        var scheme = $('#scheme').val();
		$('#faspinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
        $('#faspinner2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#job').html('');
        $('#scheme').html('');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getJobList')?>',
			data: {'year' : year, 'sector' : sector, 'scheme' : scheme},
			dataType: 'json',
			success: function(res) {
				$('#faspinner').html('');
				
				var resList = '<option value="" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.job_list) {
						resList += '<option value="'+res.job_list[i]['SS_SERVICE_CODE']+'">'+res.job_list[i]['SS_SERVICE_CODE_DC']+'</option>';
                    }
                } 
				
				$("#job").html(resList);				
			}
		});
        

        // POPULATE SCHEME
        $.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getSchemeList')?>',
			data: {'sector' : sector},
			dataType: 'json',
			success: function(res) {
				$('#faspinner2').html('');
				
				var resList = '<option value="" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.scheme_list) {
						resList += '<option value="'+res.scheme_list[i]['SC_CLASS_CODE']+'">'+res.scheme_list[i]['SC_CLASS_DESC']+'</option>';
                    }
                } 
				
				$("#scheme").html(resList);				
			}
		});
	});

    // CHANGE YEAR - JOB LIST
    $('#panel_report').on('change', '#scheme', function() {
		var year = $('#year_coor').val();
        var sector = $('#sector').val();
        var scheme = $(this).val();
		$('#faspinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#job').html('');

        // console.log(year+' '+sector+' '+scheme);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getJobList')?>',
			data: {'year' : year, 'sector' : sector, 'scheme' : scheme},
			dataType: 'json',
			success: function(res) {
				$('#faspinner').html('');
				
				var resList = '<option value="" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.job_list) {
						resList += '<option value="'+res.job_list[i]['SS_SERVICE_CODE']+'">'+res.job_list[i]['SS_SERVICE_CODE_DC']+'</option>';
                    }
                } 
				
				$("#job").html(resList);				
			}
		});
	});

    // PRINT REPORT SECTOR
	$('#panel_report').on('click','.gen_rep_btn2', function () {
		var thisBtn = $(this);
		var year = $("#year_coor").val();
        var format = $("#format_sec").val();
        var sector = $("#sector").val();
        var scheme = $("#scheme").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+sector+' '+format+' '+repCode+' '+scheme);
        show_loading();

        if(scheme == '') {
            hide_loading();
            $.alert({
                title: 'Alert!',
                content: 'Please select scheme.',
                type: 'red',
            });
            return;
        }
        
        // VALIDATE HRD
        $.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('validateHrd2')?>',
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
                    hide_loading();
					$.ajax({
                        type: 'POST',
                        url: '<?php echo $this->lib->class_url('setRepParam')?>',
                        data: {'year':year, 'format':format, 'sector':sector, 'scheme':scheme, 'repCode':repCode, 'is_hr':res.is_hr},
                        dataType: 'JSON',
                        success: function(res) {
                            window.open("report?r="+res.report,"mywin","width=800,height=600");
                        }
                    });
				} else {
                    hide_loading();
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
				}
			}
		});
	});

    // PRINT REPORT SECTOR JOB
	$('#panel_report').on('click','.gen_rep_btn_job', function () {
		var thisBtn = $(this);
		var year = $("#year_coor").val();
        var format = $("#format_sec").val();
        var sector = $("#sector").val();
        var scheme = $("#scheme").val();
        var job = $("#job").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+sector+' '+format+' '+repCode+' '+scheme+' '+job);
        show_loading();

        if(scheme == '' || job == '') {
            hide_loading();
            $.alert({
                title: 'Alert!',
                content: 'Scheme or Job field cannot be empty.',
                type: 'red',
            });
            return;
        }
        
        // VALIDATE HRD
        $.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('validateHrd2')?>',
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
                    hide_loading();
					$.ajax({
                        type: 'POST',
                        url: '<?php echo $this->lib->class_url('setRepParam')?>',
                        data: {'year':year, 'format':format, 'sector':sector, 'scheme':scheme, 'job':job, 'repCode':repCode, 'is_hr':res.is_hr},
                        dataType: 'JSON',
                        success: function(res) {
                            window.open("report?r="+res.report,"mywin","width=800,height=600");
                        }
                    });
				} else {
                    hide_loading();
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
	TAB 3 - STATITICS REPORT
	-----------------------------*/

    // PRINT REPORT STAT
	$('#statistics').on('click','.gen_rep_btn3', function () {
		var thisBtn = $(this);
		var year = $("#year_stat").val();
        var format = $("#format_stat").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+format);
        show_loading();
        
        // VALIDATE HRD
        $.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('validateHrd3')?>',
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
                    hide_loading();
					$.ajax({
                        type: 'POST',
                        url: '<?php echo $this->lib->class_url('setRepParam')?>',
                        data: {'year':year, 'format':format, 'repCode':repCode},
                        dataType: 'JSON',
                        success: function(res) {
                            window.open("report?r="+res.report,"mywin","width=800,height=600");
                        }
                    });
				} else {
                    hide_loading();
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
				}
			}
		});
	});
	
</script>