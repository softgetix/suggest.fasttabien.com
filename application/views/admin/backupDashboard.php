<style type="text/css">
.add-row,.remove-row{margin-top:18%}
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
					Dashboard
				</li>
			</ul>
			
		</div>
		<h3 class="page-title">
		Category <small></small>
		</h3>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<!-- <button type="button" class="btn green">Create New</button> -->
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
			<div class="portlet-body">
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Create new
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="<?php echo base_url('save_category')?>" class="form-horizontal" method="post" id="form">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">Category Name</label>
									<div class="col-md-4">
										<input type="text" name="name" class="form-control input-circle" placeholder="Enter name">
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Category Description</label>
									<div class="col-md-4">
										<input type="text" name="desc" class="form-control input-circle" placeholder="Enter description">
									</div>
								</div>								
							<button type="button" class="btn btn-circle add-data purple btn-sm">Add Data</button>
							<div class="form-group add-data-div"></div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn btn-circle green">Save</button>
										<button type="button" class="btn btn-circle default">Cancel</button>
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
		<!-- END DASHBOARD STATS -->
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
$(document).on('click','.add-row,.add-data',function(){
	$('.add-data-div').append('<div class="col-md-12"><div class="col-md-3"><label class="control-label">Data</label><input type="text" name="data[]" class="form-control input-circle" placeholder="Enter data"></div><div class="col-md-3"><label class="control-label">Group</label><input type="text" name="group[]" class="form-control input-circle" placeholder="Enter group"></div><div class="col-md-3"><label class="control-label">Price</label><input type="number" name="price[]" class="form-control input-circle" placeholder="Enter price"></div><div class="col-md-1"><label class="control-label">Sold</label><select name="sold[]" class="form-control btn-circle"><option value="N">N</option><option value="Y">Y</option></select></div><div class="col-md-2"><button type="button" class="btn add-row red btn-circle btn-sm" >Add row</button><button type="button" class="btn remove-row yellow btn-circle btn-sm">Remove</button></div></div>');	
})
$(document).on('click','.remove-row',function(){
	$(this).parent().parent().remove();
})
var FormValidation = function () {

    // basic validation
    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    desc: {
                        required: true
                    },
                   /* 'data[]': {
                        required: true,
                    },
                    'group[]': {
                        required: true,
                        //number: true
                    },
                   'price[]': {
                        required: true,
                        number: true
                    },*/
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
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
                }
            });


    }

	return {
        //main function to initiate the module
        init: function () {
        	handleValidation1();
        }

    };

}();
</script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   FormValidation.init();
 });
</script>
<!-- END JAVASCRIPTS -->
