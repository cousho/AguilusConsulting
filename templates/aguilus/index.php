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
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<h4 class="bold blue logo">A<span>GUILUS CONSULTING SERVICES</span></h4>
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
							<h1 class="bold white shadow2 header">A<span>GUILUS CONSULTING SERVICES</span></h1>
							<h3 class="floral-white typed shadow header">Improving employment relationships and organisational systems</h3>
						</div>
					</div>
				</div>
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
				<p>			</p>
				<p>Aguilus Consulting Services is a specialist consultancy firm that was established in Melbourne in 2012 to:</p>
				<ul>
					<li>Assist employers build the most effective  employment relationships with their employees</li>
					<li>Provide businesses with effective and efficient organisational systems</li>
					<li>Provide Human Resources Management, Industrial Relations and Change Management consulting services</li>
					<li>Assist businesses to build their competitiveness and maintain their viability in an ever changing environment.</li>
				</ul>

				<p>The lead Director of Aguilus Consulting Services, Joe Aguilus, is a qualified and experienced HR Professional with a Master of Business (Industrial Relations & Human Resources Management) and a Master of Business Administration. He has a background of working with small, medium to large organisations, both in the public and private sectors. Throughout his HR career, Joe has helped organisations with complex change management implementations and the management of their employee lifecycles.</p>
				
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
				<ul>
					<li>HR, IR and change strategy formulation</li>
					<li>Coaching of Executives and Managers</li>
					<li>Pay structure, incentives and benefits</li>
					<li>Workplace mediation and representation</li>

					<li>Conflict and performance management</li>
					<li>Recruitment and selection</li>
					<li>Job analysis and design</li>
					<li>Development of HR policies, processes, procedures and documentation</li>
					<li>Career transition assistance.</li>
				</ul>
				
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
				<!--<form action="" class="popup-form">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					<textarea placeholder="Message" class="form-control form-white"></textarea>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>-->
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p class="white">&copy; 2015 All Rights Reserved.</p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="http://www.facebook.com/aguilusconsulting" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://au.linkedin.com/pub/joe-aguilus-mba/99/177/4b8" target="_blank"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
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
