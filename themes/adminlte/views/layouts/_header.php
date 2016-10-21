<header class="main-header">
	<!-- Logo -->
	<a href="<?= $this->createUrl('/site/index'); ?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><?= CHtml::encode(Yii::app()->name); ?></span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><?= CHtml::encode(Yii::app()->name); ?></span> 
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> 
			<span class="sr-only">Toggle navigation</span> 
			<span class="icon-bar"></span> <span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user normal-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user"></i>&nbsp;
						<span class="hidden-xs"><?= Yii::app()->user->name; ?></span>
						<span class="caret"></span>
					</a>
					
					<ul class="dropdown-menu">
						<li><a href="<?= $this->createUrl('/backend/profile/changePassword'); ?>">Change password</a></li>
						<li><a href="<?= $this->createUrl('/backend/default/logout'); ?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
