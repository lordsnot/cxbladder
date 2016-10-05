<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage CX_Bladder
 * @since CX Bladder 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://tolmar.com.au/http://gmpg.org/xfn/11">
	<link rel="pingback" href="http://tolmar.com.au/<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="icon" type="image/png" href="/cxbladder/wp-content/themes/cxbladder/img/favicon.ico">


	<script src="https://use.typekit.net/xzp1mes.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tools.tooltips.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.bPopup.js"></script>

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="cxbladder">
	<div id="headerPlaceholder">
		<div class="header">
		    <a href="http://tolmar.com.au/index.html" class="logo non-mobile"><img src="/cxbladder/wp-content/themes/cxbladder/img/logos/tolmar_header.jpg" alt="TOLMAR Australia" /></a>
		    <a href="http://tolmar.com.au/index.html" class="logo mobile-only"><img src="/cxbladder/wp-content/themes/cxbladder/img/logos/tolmar_header_iphone.jpg" alt="TOLMAR Australia" /></a>
		    <ul id="nav">
		        <li><a href="http://tolmar.com.au/about.html">About&nbsp;TOLMAR</a></li>
		        <li><a href="http://tolmar.com.au/products.html">Products</a></li>
		        <li><a href="http://tolmar.com.au/careers.html">Careers</a></li>
		        <li><a href="http://tolmar.com.au/research.html">R &amp; D</a></li>
		        <li><a href="http://tolmar.com.au/news.html">News</a></li>
		        
		        <li class="tooltipMenu tooltipTrigger" style="cursor: pointer">Resources</li>
		        <div class="tooltip">
		            <a href="http://tolmar.com.au/resources.html">Prostate Cancer</a>
		            <a class="external" rel="http://www.profertil.com.au/" target="_blank">Fertility</a>
		        </div>
		        
		        <li class="loginOnly tooltipTrigger">HCP</li>
		        <div class="tooltip">
		            <a href="http://tolmar.com.au/eligard.html">ELIGARD<sup>&reg;</sup></a>
		            <a href="http://tolmar.com.au/nursecare.html">ELIGARD<sup>&reg;</sup> NurseCARE</a>
		            <a href="http://tolmar.com.au/congress.html">TOLMAR Congress Highlights</a>
								<a href="http://tolmar.com.au/about.html#representatives">Contact Product Specialist</a>
		        </div>
		    </ul>
		    <a class="login button red clickable modalTrigger free" rel="#Modal_Login">HCP Login</a>
		    <a class="logout button red clickable modalTrigger loginOnly" rel="#Modal_Logout">Logout</a>
		    <div class="clearer"></div>
		    <div class="redLineSpacer loginOnly"></div>
		    <div class="loginOnly hcpLinks">
		        <span class="redText non-mobile">HCP links&nbsp;<img src="/cxbladder/wp-content/themes/cxbladder/img/backgrounds/red_right.png" alt=""/></span>
		        <a href="http://tolmar.com.au/eligard.html">ELIGARD<sup>&reg;</sup></a>
		        <a href="http://tolmar.com.au/nursecare.html">NurseCARE</a>
		        <a href="http://tolmar.com.au/congress.html">TOLMAR Congress highlights</a>
				<a href="http://tolmar.com.au/about.html#representatives">Contact Product Specialist</a>
		        <div class="clearer"></div>
		    </div>

		    <!--Mobile-only menu bar-->
		    <div class="mobileMenu">
		        &nbsp;
		        <div class="hamburger"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div>
		        <ul>
		            <li><a href="http://tolmar.com.au/about.html">About&nbsp;TOLMAR</a></li>
		            <li><a href="http://tolmar.com.au/products.html">Products</a></li>
		            <li><a href="http://tolmar.com.au/careers.html">Careers</a></li>
		            <li><a href="http://tolmar.com.au/research.html">R &amp; D</a></li>
		            <li><a href="http://tolmar.com.au/news.html">News</a></li>
		            <li><a href="http://tolmar.com.au/resources.html">Resources</a></li>
		        </ul>
		    </div>
		</div>
	</div>
    <!--Home page content-->
    <div class="content">