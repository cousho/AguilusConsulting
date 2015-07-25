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
$doc->addStyleSheet($templatePath . '/css/cardio.css');


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
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
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
				<a class="navbar-brand" href="#"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/logo.png" data-active-url="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/logo-active.png" alt=""></a>
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
							<h1 class="bold blue shadow">AGUILUS CONSULTING</h1>
							<h3 class="blue typed shadow">Building Insights</h3>
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
				<h4 class="light muted">Aguilus Consulting Services (ACS), is helping businesses improve their employment relationships and organisation systems; and, are committed to helping their clients stimulate employment growth in Australia.</h4>
			</div>
			<div class="row about">
				<h3>Company profile - what, when, where and who:</h3>
				<p>ACS is a specialist consultancy firm that was established in Melbourne in 2012 to:</p>
				<ul>
					<li>Assist employers build the most effective  employment relationships with their employees</li>
					<li>Provide businesses with effective and efficient organisational systems</li>
					<li>Provide Human Resources Management, Industrial Relations and Change Management consulting services</li>
					<li>Assist businesses to build their competitiveness and maintain their viability in an ever changing environment.</li>
				</ul>

				<p>The lead Director of ACS, Joe Aguilus, is a qualified and experienced HR Professional with a Master of Business (Industrial Relations & Human Resources Management) and a Master of Business Administration. He has a background of working with small, medium to large organisations, both in the public and private sectors. Throughout his HR career, Joe has helped organisations with complex change management implementations and the management of their employee lifecycles.</p>
				
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section id="services" class="section section-padded blue-bg">
		<div class="container">
			<div class="row text-center title">
				<h2 class="white">Services</h2>
				<h4 class="light white">ACS provides specialist assistance to businesses for all aspect of their Human Resources, Industrial Relations and Change Management requirements, including:</h4>
			</div>
			<div class="row services">
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">HR, IR and change strategy formulation</h4>
						<p class="description blue">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Coaching of Executives and Managers</h4>
						<p class="description blue">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Pay structure, incentives and benefits</h4>
						<p class="description blue">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Workplace mediation and representation</h4>
						<p class="description blue">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Conflict and performance management</h4>
						<p class="description blue">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Recruitment and selection</h4>
						<p class="description blue">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Job analysis and design</h4>
						<p class="description blue">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">  Development of HR policies, processes, procedures and documentation</h4>
						<p class="description  blue">A elementum ligula lacus ac quam.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Development of HR policies, processes, procedures and documentation</h4>
						<p class="description  blue">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>

	<section id="blog" class="section section-padded blog">
		<div class="row text-center title">
				<h2>Blog</h2>
			</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="owl-twitter owl-carousel">
						<div class="item">
							<h4 class="blue light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="blue light">#health #training #exercise</h4>
						</div>
						<div class="item">
							<h4 class="blue light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="blue light">#health #training #exercise</h4>
						</div>
						<div class="item">
							<h4 class="blue light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="blue light">#health #training #exercise</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Sign Up</h3>
				<form action="" class="popup-form">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					<div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pricing Plan
						</button>
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
							<li class="animated lightSpeedIn"><a href="#">1 month membership ($150)</a></li>
							<li class="animated lightSpeedIn"><a href="#">3 month membership ($350)</a></li>
							<li class="animated lightSpeedIn"><a href="#">1 year membership ($1000)</a></li>
							<li class="animated lightSpeedIn"><a href="#">Free trial class</a></li>
						</ul>
					</div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
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
						<li><a href="h#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
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
