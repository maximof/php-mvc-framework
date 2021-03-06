<!doctype html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="keywords" content="<?= CHtml::encode($this->_pageKeywords); ?>"/>
	<meta name="description" content="<?= CHtml::encode($this->_pageDescription); ?>"/>
	<meta name="author" content="ApPHP Company - Advanced Power of PHP">
	<meta name="generator" content="ApPHP Simple Login System">
	<title><?= CHtml::encode($this->_pageTitle); ?></title>

	<base href="<?= A::app()->getRequest()->getBaseUrl(); ?>"/>
	
	<?= CHtml::cssFile('templates/default/css/main.css'); ?>
	
	<?= CHtml::scriptFile('//code.jquery.com/jquery-1.11.3.min.js'); ?>
	<?= CHtml::scriptFile('templates/default/js/main.js'); ?>
</head>
<body>
<header>
	<nav>
		<?php
		CWidget::create('CMenu', array(
			'items' => array(
				array('label' => 'Home', 'url' => 'index/index'),
				(CAuth::isLoggedIn() == true) ? array('label' => 'Dashboard', 'url' => 'page/dashboard') : '',
				(CAuth::isLoggedIn() == true) ? array('label' => 'My Account', 'url' => 'account/edit') : '',
				array('label' => 'Public Page #1', 'url' => 'page/public/id/1'),
				array('label' => 'Public Page #2', 'url' => 'page/public/id/2'),
			),
			'type' => 'horizontal',
			'selected' => $this->_activeMenu,
			'return' => false,
		));
		?>
		
		<?php
		CWidget::create('CMenu', array(
			'items' => array(
				(CAuth::isLoggedIn() == true) ? array('label' => 'Logout', 'url' => 'login/logout') : array('label' => 'Login', 'url' => 'login/index'),
			),
			'type' => 'horizontal',
			'class' => 'user_menu',
			'selected' => $this->_activeMenu,
			'return' => false,
		));
		?>
	</nav>
</header>
<section>
	<?php
	CWidget::create('CBreadCrumbs', array(
		'links' => $this->_breadCrumbs,
		'return' => false,
	));
	?>
	<?= A::app()->view->getContent(); ?>
</section>
<footer>
	<p class="copyright">Copyright &copy; <?= @date('Y'); ?> Your Site</p>
	<p class="powered"><?= A::powered(); ?></p>
</footer>
</body>
</html>