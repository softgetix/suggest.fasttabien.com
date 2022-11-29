<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<style type="text/css">
.add-row,.remove-row{margin-top:18%}
.records-data{display: none}
.record-div{margin-top: 20px}
.sold-label{width: 100%;text-align: left !important;}
.btn-div{padding-left: 0px !important;padding-top: 14px}
.sold-div .checker{padding-top: 5px !important;}
div.checker input {cursor: pointer;} 
#records_table_filter {display: none;}
#records_table_length{display: none;}
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
					Common Section
				</li>
			</ul>
			
		</div>
		<h4 class="page-title">
		Common Section <small></small>
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
							<a href="javascript:;" class="collapse">
							</a>
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
									 Category Order
								</th>
								<th>
									 Category
								</th>
								<th>
									 Month
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
		</div>

			<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog ">
					<div class="modal-content">
						<form id="form2" method="post" action="<?php echo base_url('admin/update_common_section'); ?>">	
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Edit Category</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<input type="hidden" id="records_id" name="id">
									<div class="form-group col-md-12">
										<label class="col-md-3 control-label">Category</label>
										<div class="col-md-7">
											<input type="text" id="category" name="category" class="form-control input-circle" placeholder="Enter category">
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

	var FormValidation = function () {

   	var handleValidation1 = function() {
        	var form1 = $('#form2');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    
                },
                rules: {
                    category: {
                       required:true,
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
        }
    };
}();

var TableManaged = function () {

      var handleTable = function () {

    	var table = $('#records_table');

        var oTable = table.dataTable({
			"oLanguage": {
                "sProcessing": "Loading"},
            "sAjaxSource": base_url+ "admin/get_common_records",
            "bProcessing": true,
            "bServerSide": true,
            "responsive": true,
            "aaSorting": [],
            "aoColumnDefs": [
                { "aTargets": [0], orderable: false},
                { "aTargets": [1], orderable: false},
                { "aTargets": [2], orderable: false},
                { "aTargets": [3], orderable: false},
                { "aTargets": [4], orderable: false},       
            ],
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
	var id=$(this).attr('data_id');
	$.ajax({
		type:'post',
		url:base_url+'admin/Admin_controller/getCategoryById',
		dataType:'Json',
		data:{'id':id},
		success:function(res){
			$('#form2 #records_id').val(id);
			$('#form2 #category').val(res.category);
		}
	})
	$('#basic').modal('show');
})

</script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   FormValidation.init();
   TableManaged.init();
   //ComponentsDropdowns.init();
 });
</script>

