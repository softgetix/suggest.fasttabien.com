<style type="text/css">
.topsidebar-toggle{position: absolute;top: -36px;z-index: 99999;right: 0px;}	
</style>
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->

<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<div class="sidebar-toggler-wrapper topsidebar-toggle">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</div>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				
				<li class="start <?php echo ($slag=='dashboard')?'active open':'';?>">
					<a href="<?php echo base_url('admin/dashboard') ?>">
						<i class="icon-list"></i>
						<span class="title">Manage Category</span>
						<span class="selected"></span>
					</a>
				</li>
				<li class="start  <?php echo ($slag=='group')?'active open':'';?>">
					<a href="<?php echo base_url('admin/group') ?>">
						<i class="fa fa-group"></i>
						<span class="title">Manage Group</span>
						<span class="selected"></span>
					</a>
				</li>
				<li class="start  <?php echo ($slag=='records')?'active open':'';?>">
					<a href="<?php echo base_url('admin/records') ?>">
						<i class="icon-folder"></i>
						<span class="title">Manage Record</span>
						<span class="selected"></span>
					</a>
				</li>
				<li class="start  <?php echo ($slag=='common_section')?'active open':'';?>">
					<a href="<?php echo base_url('admin/common_section') ?>">
						<i class="icon-folder"></i>
						<span class="title">Common Section</span>
						<span class="selected"></span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->