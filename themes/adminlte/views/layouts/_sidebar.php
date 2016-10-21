<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<?php $this->widget('SidebarMenu', array(
			'items'=>array(
				// Important: you need to specify url as 'controller/action',
				// not just as 'controller' even if default acion is used.
				array('label'=>'Dashboard', 'url'=>array('/backend/default/index'), 'icon'=> 'fa fa-dashboard'),
				// 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
				array('label'=>'System', 'icon'=>'fa fa-cogs', 'items'=>array(
					array('label'=>'Users', 'url'=>array('/backend/user'), 'permission'=>'viewUser', 'icon'=>'fa fa-user'),
					array('label'=>'Roles', 'url'=>array('/backend/role'), 'permission'=>'viewRole', 'icon'=>'fa fa-users'),
					array('label'=>'Permissions', 'url'=>array('/backend/permission'), 'permission'=>'managePermission', 'icon'=>'fa fa-key'),
					array('label'=>'Configuration', 'url'=>array('/backend/default/config'), 'permission'=>'manageConfiguration', 'icon'=>'fa fa-gear'),
				)),
			),
		)); ?>			
		<!-- sidebar menu: : style can be found in sidebar.less -->
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
