<?php /* Template Name: Resources Template */ ?>

<?php

$custom_fields = get_post_custom(); 

get_header(); 

?>


	<div id="primary" class="content-area">
		<main id="main cxbladder" class="site-main" role="main">


			<div class="header">
	   			 <a class="external" rel="http://fertility-for-men.myshopify.com/products/cx-bladder-cancer-test"><img class="headerBuyButton" src="/wp-content/themes/cxbladder/img/page_assets/buy_button.png" /></a>
	   		</div>
			

	   		<div class="resources_container">
<?php 
	while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
 
		        <div class="entry-content-page">
		            <?php the_content(); ?> <!-- Page Content -->
		        </div><!-- .entry-content-page -->

<?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>
			</div>

			<div id="Modal_External" class="modal">
			    <div class="close"></div>
			    <input type="hidden" id="hdnURL" value="" />
			    <h2>Disclaimer</h2>
			    <p>
			        Using this link will let you leave www.tolmar.com.au, therefore the information may
				        not comply with the Australian or New Zealand regulatory authority environment.
				        Any information provided by this source should be discussed with your healthcare
				        professional and does not replace their advice. This link is provided to you only as
				    information, not as advice, and the inclusion of this link does not imply endorsement
				    by TOLMAR.
				</p>
				<a class="button black clickable continue" id="btnContinue">Continue</a>
			</div>
		    
		</main><!-- .site-main -->
<?php get_footer(); ?>
	</div><!-- .content-area -->

