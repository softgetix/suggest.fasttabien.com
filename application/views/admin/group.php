<style type="text/css">
.add-row,.remove-row{margin-top:18%}
.group-data{display: none}
div.checker input {cursor: pointer;} 
#add_group_form div.checker span {margin-top: 10px}
#update_group_form div.checker span {margin-top: 3px}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
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
					Group
				</li>
			</ul>
			
		</div>
		<h4 class="page-title">
		Group <small></small>
		</h4>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<?php
		if( null !== $this->session->flashdata('error') ){ ?>
		<div class="note note-danger">
			<button class="close" data-close="alert"></button>
			<span><?php echo $this->session->flashdata('error');?></span>
		</div>
		<?php }?>
		<?php
		if( null !== $this->session->flashdata('success') ){ ?>
		<div class="note note-success">
			<button class="close" data-close="alert"></button>
			<span><?php echo $this->session->flashdata('success');?></span>
		</div>
		<?php }?>
		<div class="row">
			<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-group"></i>View Group
							</div>
							<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
						</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered" id="group_table">
							<thead>
							<tr>
								<th>
									 No
								</th>
								<th>
									 Name
								</th>
								<th>
									 Description
								</th>
								<th>
									 Featured
								</th>
								<th>
									 Created On
								</th>
								<th>
									 Edit
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
				<div class="portlet box purple">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-plus"></i>Create new
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="<?php echo base_url('admin/save_group')?>" class="form-horizontal" method="post" id="add_group_form">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">Group Name</label>
									<div class="col-md-4">
										<input type="text" name="name" id="name" class="form-control input-circle" placeholder="Enter name">
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Group Description</label>
									<div class="col-md-4">
										<textarea  rows='5' name="description" class="form-control input-circle" placeholder="Enter description"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Featured Group</label>
									<div class="col-md-4">
										<input type="checkbox" name="is_featured" class="checkbox" placeholder="Enter description" value="1">
									</div>
								</div>								
							<!-- <button type="button" class="btn btn-circle add-data purple btn-sm">Add Data</button>
							<div class="form-group add-data-div"></div> -->
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn btn-circle purple">Save</button>
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

		<div class="group-data">
			<div class="col-md-12">
				<div class="col-md-3">
					<label class="control-label">Group</label>
					<input type="text" name="group[]" class="form-control input-circle" placeholder="Enter group">
				</div>
				<div class="col-md-3">
					<label class="control-label">Data</label>
					<input type="text" name="data[]" class="form-control input-circle" placeholder="Enter data">
				</div>
				<div class="col-md-3">
					<label class="control-label">Price</label>
					<input type="number" name="price[]" class="form-control input-circle" placeholder="Enter price">
				</div>
				<div class="col-md-1">
					<label class="control-label">Sold</label>
					<select name="sold[]" class="form-control btn-circle">
						<option value="N">N</option>
						<option value="Y">Y</option>
					</select>
				</div>
				<div class="col-md-2">
					<button type="button" class="btn add-row red btn-circle btn-sm" >Add row</button><button type="button" class="btn remove-row yellow btn-circle btn-sm">Remove</button>
				</div>
			</div>	
		</div>
			
		<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form id="update_group_form" method="post" action="<?php echo base_url('admin/update_group'); ?>">	
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Edit Group</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<input type="hidden" id="group_id" name="id">
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label">Group Name</label>
									<div class="col-md-5">
										<input type="text" name="name" id="group_name" class="form-control input-circle" placeholder="Enter name">
										
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label">Group Description</label>
									<div class="col-md-5">
										<textarea  rows='5' id="group_desc" name="description" class="form-control input-circle" placeholder="Enter description"></textarea>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4 control-label">Featured Group</label>
									<div class="col-md-5">
										<input type="checkbox" name="is_featured" id="is_featured" class="checkbox" placeholder="Enter description" value="1">
									</div>
								</div>		
								</div>	
							</div>	
						<div class="modal-footer">
							<button type="button" class="btn default btn-circle" data-dismiss="modal">Close</button>
							<button type="submit" class="btn purple btn-circle">Update</button>
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
/*$(document).on('click','.add-row,.add-data',function(){
	$('.add-data-div').append($('.group-data').html());	
})
$(document).on('click','.remove-row',function(){
	$(this).parent().parent().remove();
})*/
var FormValidation = function () {

   	var handleValidation1 = function() {
        	var form1 = $('#add_group_form');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    name: {
	                    remote: "Group already taken",
	                }
                },
                rules: {
                    name: {
                       	required: true,
                       	remote: {
	                        url: base_url+"/admin/Admin_controller/check_group",
	                        type: "post",
	                        data: {
	                          name: function() {
	                            return $( "#add_group_form #name" ).val();
	                          }
	                        }
                      	}  
                    },
                    description: {
                        required: true
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
        	var form1 = $('#update_group_form');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    name: {
	                    remote: "Group already taken",
	                }
                },
                rules: {
                    name: {
                       	required: true,
                       	remote: {
	                        url: base_url+"/admin/Admin_controller/check_group",
	                        type: "post",
	                        data: {
	                          name: function() {
	                            return $( "#update_group_form #group_name" ).val();
	                          },
	                          id:function(){
	                          	return $( "#update_group_form #group_id" ).val();
	                          }
	                        }
                      	}  
                    },
                    description: {
                        required: true
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
        }

    };

}();


var TableManaged = function () {

      var handleTable = function () {

    	var table = $('#group_table');

        var oTable = table.dataTable({
			"oLanguage": {
                "sProcessing": "Loading"},
       //     "ordering": true,
            "sAjaxSource": base_url+ "admin/get_group",
            "bProcessing": true,
            "bServerSide": true,
            "aLengthMenu": [[25, 50, 100], [25, 50, 100]],
            "iDisplayLength": 25,
            "responsive": true,
//        "bSortCellsTop": true,
         //   "bDestroy": true, //!!!--- for remove data table warning.
            "aoColumnDefs": [
                { "aTargets": [0], orderable: false},
                { "aTargets": [5], orderable: false},
                
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
	var id=$(this).attr('data_id');
	$.ajax({
		type:'post',
		url:base_url+'admin/Admin_controller/getGroupById',
		dataType:'Json',
		data:{'id':id},
		success:function(res){
			$('#group_id').val(id);
			$('#group_name').val(res.name);
			$('#group_desc').val(res.description);
			if (res.is_featured=='1'){
				$('#is_featured').prop('checked', true);
				$('#is_featured').parent().addClass('checked');
			}
		}
	})
	$('#basic').modal('show');
})

$(document).on('click','.delete',function(){
	var id=$(this).attr('data_id');
	bootbox.confirm({
	size:"small",		
    message: "Are you sure? you are about to delete group, all records containing this group will be deleted",
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
					url:base_url+'admin/Admin_controller/delete_group',
					data:{'id':id},
					success:function(){
							window.location.reload();
					}
				})
	     	}   
	    }
	});
})

</script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   FormValidation.init();
   TableManaged.init();
 });
</script>
<!-- END JAVASCRIPTS -->
