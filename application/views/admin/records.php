<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<style type="text/css">
.add-row,.remove-row{margin-top:18%}
.records-data{display: none}
.record-div{margin-top: 20px}
.sold-label{width: 100%;text-align: left !important;}
.btn-div{padding-left: 0px !important;padding-top: 14px}
.sold-div .checker{padding-top: 5px !important;}
div.checker input {cursor: pointer;} 
.s_data{float: right;margin-top: 16px;padding-right: 10px; margin-right: 10px}
#number_two{width: 186px; max-width: 100%}
#number_one{width: 175px; max-width: 100%}
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo base_url('admin/dashboard') ?>">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					Records
				</li>
			</ul>
			
		</div>
		<h4 class="page-title">
		Records <small></small>
		</h4>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<?php
		if( null !== $this->session->flashdata('success') ){ ?>
		<div class="note note-success">
			<button class="close" data-close="alert"></button>
			<span><?php echo $this->session->flashdata('success');?></span>
		</div>
		<?php }?>
		<?php
		if( null !== $this->session->flashdata('error') ){ ?>
		<div class="note note-danger">
			<button class="close" data-close="alert"></button>
			<span><?php echo $this->session->flashdata('error');?></span>
		</div>
		<?php }?>
		<div class="row">
			<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-folder"></i>View Records
							</div>
							<div class="tools">
								<button type="button" class="btn btn-circle btn-warning import-btn" data-toggle="modal" data-target="#basic3">
								<i class="fa fa-upload"></i> Import all numbers
							    </button>
							     <a href="<?php echo base_url('frontend/allnumber.csv');?>" download>
								  <button type="button" class="btn btn-circle btn-warning">
									<i class="fa fa-download"></i> Sample
								  </button>
							    </a>
							<a href="javascript:;" class="collapse">
							</a>
						    </div>
						    <button type="button" class="range_delete red btn-circle btn-sm btn s_data" href="javascript:;"><i class="fa fa-trash"></i></button>
						    <div class="form-group s_data">
								<input type="number" name="number" class="form-control input-circle" placeholder="Enter Number second" id="number_two">
                            </div>
                            <div class="form-group s_data">
								<input type="number" name="number" class="form-control input-circle" placeholder="Enter Number one" id="number_one">
                            </div>
                            <div class="form-group s_data">
								<select class="form-control" name="category" id="category">
									<option value>select category</option>
								<?php if (!empty($category)) {
									 foreach ($category as $key => $value){
										  echo "<option value='".$value['id']."'>$value[name]</option>";			
										}
									} ?>	
							    </select>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered" id="records_table">
							<thead>
							<tr>
								<th>
									 No
								</th>
								<th>
									 Category
								</th>
								<th>
									 Group
								</th>
								<th>
									 Price
								</th>
								<th>
									 Data
								</th>
								<th>
									 Number
								</th>
								<th>
									 Sold
								</th>
								<th>
									 Featured
								</th>
								<th>
									 Created On
								</th>
								<th>
									 Updated On
								</th>
								<th>
									 Action
								</th>
							</tr>
							</thead>
								<tbody></tbody>
							</table>	
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
			</div>
			<div class="col-md-12">	
			<div class="portlet-body">
				<div class="portlet box yellow">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-plus"></i>Create new
						</div>
						<div class="tools">
							<button type="button" class="btn btn-circle btn-warning import-btn" data-toggle="modal" data-target="#basic2">
								<i class="fa fa-upload"></i> Import
							</button>
							<a href="<?php echo base_url('frontend/sample.csv');?>" download>
								<button type="button" class="btn btn-circle btn-warning">
									<i class="fa fa-download"></i> Sample
								</button>
							</a>
							<a href="javascript:;" class="collapse">
							</a>
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="<?php echo base_url('admin/save_records')?>" class="form-horizontal" method="post" id="form">
							<div class="form-body">
							  <div class="row record-div">
							  	<div class="col-sm-12">
						  	 	   <div class="col-sm-2 ">
							     	<label class="control-label">Category</label>
									<select class="form-control" id="catg_id" name="catg_id[]">
										<option value></option>
									<?php if (!empty($category)) {
										 foreach ($category as $key => $value){
											  echo "<option value='".$value['id']."'>$value[name]</option>";			
											}
										} ?>	
										</select>
							     </div>
							     <div class="col-sm-2">
							     		<label class="control-label">Group</label>
										<select class="form-control" id="group_id" name="group_id[]">
										<option value></option>
									<?php if (!empty($group)){
											 foreach ($group as $key => $value){
												echo "<option value='".$value['id']."'>$value[name]</option>";				
											 } 
									} ?>	
										</select>
							     </div>
									<div class="col-sm-2">
										<label class="control-label">Data</label>
										<input type="text" name="data[]" class="form-control input-circle" placeholder="Enter data">
									</div>
									<div class="col-sm-2">
										<label class="control-label">Price</label>
										<input type="number" name="price[]" class="form-control input-circle" placeholder="Enter price">
									</div>
									<div class="col-sm-2">
										<label class="control-label">Number</label>
										<input type="number" name="number[]" class="form-control input-circle" placeholder="Enter Number">
									</div>
									<div class="col-sm-1 sold-div">
										<label class="control-label sold-label">Sold</label>
										<input type="checkbox" name="sold[]" value="1">
									</div>
									<div class="col-sm-1 btn-div">
										<button type="button" class="btn add-row yellow btn-circle btn-sm" ><i class="fa fa-plus"></i></button>
									</div>
								</div>	 
							  </div>										
							<div class="form-group add-data-div"></div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn btn-circle yellow">Save</button>
									</div>
								</div>
							</div>
						</form>
						<!-- END FORM-->
					</div>
				</div>
			</div>
			</div>
		</div>

		<div class="records-data">
			<div class="col-sm-12">		
			 	 <div class="col-sm-2 ">
			     	<label class="control-label">Category</label>
					<select class="form-control  catg_id" name="catg_id[]">
						<option value></option>
					<?php if (!empty($category)) {
						 foreach ($category as $key => $value){
							  echo "<option value='".$value['id']."'>$value[name]</option>";			
							}
						} ?>	
						</select>
			     </div>
			     <div class="col-sm-2">
			     		<label class="control-label">Group</label>
						<select class="form-control  group_id"  name="group_id[]">
						<option value></option>
					<?php if (!empty($group)){
							 foreach ($group as $key => $value){
								echo "<option value='".$value['id']."'>$value[name]</option>";				
							 } 
					} ?>	
						</select>
			     </div>
				<div class="col-sm-2">
					<label class="control-label">Data</label>
					<input type="text" name="data[]" class="form-control input-circle" placeholder="Enter data">
				</div>
				<div class="col-sm-2">
					<label class="control-label">Price</label>
					<input type="number" name="price[]" class="form-control input-circle" placeholder="Enter price">
				</div>
				<div class="col-sm-2">
					<label class="control-label">Number</label>
					<input type="number" name="number[]" class="form-control input-circle" placeholder="Enter Number">
				</div>
				<div class="col-sm-1 sold-div">
					<label class="control-label sold-label">Sold</label>
					<input type="checkbox" name="sold[]" value="1">
				</div>
				<div class="col-sm-1 btn-div">
					<button type="button" class="btn add-row yellow btn-circle btn-sm" ><i class="fa fa-plus"></i></button><button type="button" class="btn remove-row red btn-circle btn-sm"><i class="fa fa-minus"></i></button>
				</div>
			</div>	 	
		</div>
			
		<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog ">
					<div class="modal-content">
						<form id="form2" method="post" action="<?php echo base_url('admin/update_records'); ?>">	
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Edit Records</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<input type="hidden" id="records_id" name="id">
									<div class="form-group col-md-12">
										<label class="col-md-3 control-label">Data</label>
										<div class="col-md-7">
											<input type="text" id="data" name="data" class="form-control input-circle" placeholder="Enter data">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="col-md-3 control-label">Price</label>
										<div class="col-md-7">
											<input type="number" id="price" name="price" class="form-control input-circle" placeholder="Enter price">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="col-md-3 control-label">Number</label>
										<div class="col-md-7">
											<input type="number" id="number" name="number" class="form-control input-circle" placeholder="Enter Number">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="col-md-3 control-label ">Sold</label>
										<div class="col-md-7">
											<input type="checkbox" id="sold" name="is_sold" value="1">
										</div>
									</div>
								</div>	
						</div>
						<div class="modal-footer">
							<button type="button" class="btn default btn-circle" data-dismiss="modal">Close</button>
							<button type="submit" class="btn yellow btn-circle">Update</button>
						</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
		</div>

		<div class="modal fade" id="basic2" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog ">
					<div class="modal-content">
						<form id="form3" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/import'); ?>">	
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Import csv</h4>
						</div>
						<div class="modal-body">
							<div class="row">
									<div class="form-group col-md-12">
										<input type="file" name="file" class="form-control input-circle">
									</div>
							</div>	
						</div>
						<div class="modal-footer">
							<button type="button" class="btn default btn-circle" data-dismiss="modal">Close</button>
							<button type="submit" class="btn yellow btn-circle">Import</button>
						</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
		</div>

		<!-- import number-->
		<div class="modal fade" id="basic3" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog ">
					<div class="modal-content">
						<form id="form4" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/importallnumbers'); ?>">	
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Import Number</h4>
						</div>
						<div class="modal-body">
							<div class="row">
									<div class="form-group col-md-12">
										<input type="file" name="file" class="form-control input-circle">
									</div>
							</div>	
						</div>
						<div class="modal-footer">
							<button type="button" class="btn default btn-circle" data-dismiss="modal">Close</button>
							<button type="submit" class="btn yellow btn-circle">Import</button>
						</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
		</div>
<!-- End import number-->
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2020 &copy;.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script src="<?php echo base_url();?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>

<script type="text/javascript">
var i=1;	
$(document).on('click','.add-row,.add-data',function(){
	$('.records-data .catg_id').attr('id','catg_'+i);
	$('.records-data .group_id').attr('id','group_'+i);
	$('.record-div').append($('.records-data').html());	
   	$('#catg_'+i).select2({
            placeholder: "Select",
            allowClear: true
    });
    $('#group_'+i).select2({
        placeholder: "Select",
        allowClear: true
    });	
    ++i;
})
$(document).on('click','.remove-row',function(){
	$(this).parent().parent().remove();
})
$(document).on('click','input[type="checkbox"]',function(){
	if ($(this).is(":checked"))
		$(this).parent().addClass('checked');
	else
		$(this).parent().removeClass('checked');
})	
var FormValidation = function () {

   	var handleValidation1 = function() {
        	var form1 = $('#form5');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    name: {
	                    remote: "Records already taken",
	                }
                },
                rules: {
                    'data[]': {
                       required:true,
                    },
                    'price[]': {
                        required: true,
                        number:true,
                        min:100,
                    },
                    'number[]': {
                        required: true,
                        number:true,
                        minlength:2,
                    },
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                   // Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form.submit(); 
                }
            });
    }
    var handleValidation2 = function() {
    	$.validator.addMethod(
		    "money",
		    function(value, element) {
		        var isValidMoney = /^\d{0,4}(\.\d{0,2})?$/.test(value);
		        return this.optional(element) || isValidMoney;
		    },
		    "Please enter valid price"
		);
        	var form1 = $('#form2');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    name: {
	                    remote: "Records already taken",
	                },
	                number:{minlength:'Please enter at least 2 digit.'},
	            },
                rules: {
                    data: {
                       required:true,
                    },
                    price: {
                        required: true,
                        number:true,
                        min:100,
                    },
                    number: {
                        required: true,
                        number:true,
                        minlength:2,
                    },
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                   // Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form.submit(); 
                }
            });
    }
     var handleValidation3 = function() {
    	
        	var form1 = $('#form3');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                	file:{
                		extension:"Please upload csv file",
                	}
                },
                rules: {
                    file: {
                      	required:true,
                        extension: "csv"
                    },
               	},

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                   // Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form.submit(); 
                }
            });
    }
     var handleValidation4 = function() {
    	
        	var form1 = $('#form4');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                	file:{
                		extension:"Please upload csv file",
                	}
                },
                rules: {
                    file: {
                      	required:true,
                        extension: "csv"
                    },
               	},

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                   // Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form.submit(); 
                }
            });
    }
	return {
        init: function () {
        	handleValidation1();
        	handleValidation2();
        	handleValidation3();
        	handleValidation4();
        }
    };
}();


var TableManaged = function () {

      var handleTable = function () {

    	var table = $('#records_table');

        var oTable = table.dataTable({
			"oLanguage": {
            "sProcessing": "Loading"},
            "sAjaxSource": base_url+ "admin/get_records",
            "bProcessing": true,
            "bServerSide": true,
            "aLengthMenu": [[25, 50, 100], [25, 50, 100]],
            "iDisplayLength": 25,
            "responsive": true,
            "aoColumnDefs": [
                { "aTargets": [0], orderable: false},
                { "aTargets": [10], orderable: false},  
            ],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });
    }
	return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }
            handleTable();
        }
    };
}();

$(document).on('click','.edit',function(){
	var id = $(this).attr('data_id');
	$.ajax({
		type:'post',
		url:base_url+'admin/Admin_controller/getRecordsById',
		dataType:'Json',
		data:{'id':id},
		success:function(res){
			$('#form2 #records_id').val(id);
			$('#form2 #data').val(res.data);
			$('#form2 #price').val(res.price);
			$('#form2 #number').val(res.number);
			if (res.is_sold=='1'){
				$('#form2 #sold').prop('checked', true);
				$('#form2 #sold').parent().addClass('checked');
			}
		}
	})
	$('#basic').modal('show');
})

$(document).on('click','.delete',function(){
	var id=$(this).attr('data_id');
	bootbox.confirm({
	size:"small",		
    message: "Are you sure?",
    buttons: {
	        confirm: {
	            label: 'Yes',
	            className: 'btn btn-circle yellow btn-sm'
	        },
	        cancel: {
	            label: 'No',
	            className: 'btn btn-circle default btn-sm'
	        }
	    },
	    callback: function (result) {
	     	if (result) {
	     		$.ajax({
					type:'post',
					url:base_url+'admin/Admin_controller/delete_record',
					data:{'id':id},
					success:function(){
							window.location.reload();
					}
				})
	     	}   
	    }
	});
})
$(document).on('click','.range_delete',function(){
	var cat = $("#category").val();
	var number_one = $("#number_one").val();
	var number_two = $("#number_two").val();
	console.log(cat);console.log(number_one);console.log(number_two);
	bootbox.confirm({
	size:"small",		
    message: "Are you sure?",
    buttons: {
	        confirm: {
	            label: 'Yes',
	            className: 'btn btn-circle yellow btn-sm'
	        },
	        cancel: {
	            label: 'No',
	            className: 'btn btn-circle default btn-sm'
	        }
	    },
	    callback: function (result) {
	     	if (result) {
	     		$.ajax({
					type:'post',
					url:base_url+'admin/Admin_controller/delete_range_record',
					data:{'cat':cat,'number_one':number_one,'number_two':number_two},
					success:function(){
					    window.location.reload();
					}
				})
	     	}   
	    }
	});
});
</script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   FormValidation.init();
   TableManaged.init();
 });
</script>
<script type="text/javascript">
$('#form #catg_id').select2({
    placeholder: "Select",
    allowClear: true
});
$('#form #group_id').select2({
    placeholder: "Select",
    allowClear: true
});
</script>
<!-- END JAVASCRIPTS -->
