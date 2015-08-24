<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/** Joomla Custom chrome **/ 
/* make sure there's content, otherwise don't display anything */
function modChrome_notEmpty( $module, &$params, &$attribs ) {
	if(preg_match("/[^(\s|\t)]+/i", $module->content)) { 
		echo '<div class="moduletable' .$params->get( 'moduleclass_sfx' ) .'" >';
		if ($module->showtitle) {
		  echo '<h3>' .$module->title .'</h3>';
		}
		echo $module->content;
		echo '</div>';
	}
}


/** Page **/
$menus =& JSite::getMenu();
$menu =& $menus->getActive();
//$jinput = JFactory::getApplication()->input;

$isFrontPage = ($menus->getActive() == $menus->getDefault());


/** Load resource **/
$doc = &JFactory::getDocument();
$urlPrefix = ''; //$urlPrefix = JUri::base();
$templatePath = $urlPrefix.'templates/'.$this->template;


/* css */
$doc->addStyleSheet($templatePath . '/css/normalize.css');
$doc->addStyleSheet($templatePath . '/css/bootstrap.css');
$doc->addStyleSheet($templatePath . '/css/owl.css');
$doc->addStyleSheet($templatePath . '/css/animate.css');
$doc->addStyleSheet($templatePath . '/fonts/font-awesome-4.1.0/css/font-awesome.min.css');
$doc->addStyleSheet($templatePath . '/fonts/eleganticons/et-icons.css');
$doc->addStyleSheet($templatePath . '/css/template.css');


/* js */
$jsPath = $templatePath.'/js/';
$jsLibPath = $jsPath.'vendor/';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Halant:600' rel='stylesheet' type='text/css'>
	<jdoc:include type="head" />
</head>

<body>
	<div class="preloader">
		<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
					<h4 class="bold blue logo">	<img class="logo" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/logo.jpg" data-active-url="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/logo.jpg" alt=""></a>
<span class="big">A</span><span class="small">GUILUS CONSULTING SERVICES</span></h4>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<jdoc:include type="modules" name="navigation" style="none" />
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="white typed shadow header">Improving employment relationships and organisational systems</h3>

						</div>
					</div>
				</div>
			</div>
			<div class="weather">
			<!-- weather widget start >
				<a href="//www.booked.net/weather/melbourne-30354">
					<img src="//w.bookcdn.com/weather/picture/25_30354_1_1_3658db_250_2a48ba_ffffff_ffffff_1_2071c9_ffffff_0_3.png?scode=124&domid=w209" />
				</a>
			<!-- weather widget end -->
							<jdoc:include type="modules" name="weather" style="none" />

			</div>
		</div>
	</header>
	<section id="about" class="section section-padded">
		<div class="cut cut-top"></div>
		<div class="container">
			<div class="row text-center title">
				<h2>About Us</h2>
				<h4 class="light muted">Aguilus Consulting Services, is helping businesses improve their employment relationships and organisation systems; and, are committed to helping their clients stimulate employment growth in Australia.</h4>
			</div>
			<div class="row about">
				<jdoc:include type="modules" name="about" style="none" />

			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section id="services" class="section section-padded blue-bg">
		<div class="cut cut-top"></div>
		<div class="container">
			<div class="row text-center title">
				<h2 class="white">Services</h2>
				<h4 class="light white">Aguilus Consulting Services provides specialist assistance to businesses for all aspect of their Human Resources, Industrial Relations and Change Management requirements, including:</h4>
			</div>
			<div class="row services">
				<jdoc:include type="modules" name="services" style="none" />

				
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>

	<section id="blog" class="section section-padded blog">
		<div class="row text-center title">
				<h2>Blog</h2>
				<h4 class="blue light">We ask for your patience as we start our online journey.</h4>
				
			</div>
		</div>
	</section>

	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Contact Us</h3>
				<jdoc:include type="modules" name="contact" style="none" />
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p class="white phone">M +61 425 412 072</p>
					<p class="white phone">PO BOX 1088</p>
					<p class="white phone">Hawsburn, VIC 3142</p>
				</div>
				<div class="col-sm-8">
					<ul class="social-footer">
						<li><a href="http://www.facebook.com/aguilusconsulting" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://au.linkedin.com/pub/joe-aguilus-mba/99/177/4b8" target="_blank"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				<div class="col-sm-8">
					<p class="white copy">&copy; Aguilus Consulting Services 2015</p>
				</div>
				
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<jdoc:include type="modules" name="navigation" style="none" />
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	<?php $doc->addScript($jsPath.'jquery-1.11.1.min.js'); ?>
	<?php $doc->addScript($jsPath.'owl.carousel.min.js'); ?>
	<?php $doc->addScript($jsPath.'bootstrap.min.js'); ?>
	<?php $doc->addScript($jsPath.'wow.min.js'); ?>
	<?php $doc->addScript($jsPath.'typewriter.js'); ?>
	<?php $doc->addScript($jsPath.'jquery.onepagenav.js'); ?>
	<?php $doc->addScript($jsPath.'main.js'); ?>
</body>

</html>
