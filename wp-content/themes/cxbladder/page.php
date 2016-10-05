<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage CX_Bladder
 * @since CX Bladder 1.0
 */

$custom_fields = get_post_custom(); 

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main cxbladder" class="site-main" role="main">
			<div class="header">
	   			 <a class="external" rel="http://fertility-for-men.myshopify.com/products/cx-bladder-cancer-test"><img class="headerBuyButton" src="/wp-content/themes/cxbladder/img/page_assets/buy_button.png" /></a>
	   		</div>
			<div class="intro">
				<?php echo $custom_fields['intro_text'][0]; ?>
			</div>
	
			<div class="sectionContainer">

				<div id="section1">
		            
		            <div class="containerLeft">
		                <div class="title"><?php echo $custom_fields['section1_title'][0]; ?></div>
		            </div>
		            
		            <div class="containerRight">
		            	<div class="blueRule"></div>
                        <?php echo wpautop($custom_fields['section1_text'][0]); ?>
                    </div>

		        </div>

		        <div id="section2">
		            <div class="container">
			            <div class="textContainer">
			            	<div class="val_table">
	     						<div class="val_cell">
	     							<?php echo wpautop($custom_fields['section2_text'][0]); ?>
	     						</div>
	     					</div>
			           	</div>
		        	</div>
		    	</div>
		    </div>

			<div class="bottomSectionContainer">

		        <div id="section3">
		            <div class="container">

			            <div class="containerLeft">
			                <div class="title"><?php echo $custom_fields['section3_title'][0]; ?></div>
			                <div class="image"><img src="/wp-content/themes/cxbladder/img/page_assets/section3Leftb.jpg"/></div>
			            </div>
			            
			            <div class="containerRight">
			            	<div class="blueRule"></div>
	                        <?php echo wpautop($custom_fields['section3_text'][0]); ?>
	                    </div>
		            	
		           	</div>
		        </div>

		    </div>

		    <div class="linkSectionContainer">

		        <div class="container">

		        	<div class="link">
		        		<a class="external" rel="https://bladdercancer.me/"><img src="/wp-content/themes/cxbladder/img/page_assets/bc_logo.png" /></a>
		        	</div>
		        	<div class="link">
		        		<a class="external" rel="http://www.pacificedgedx.com"><img src="/wp-content/themes/cxbladder/img/page_assets/pe_logo.png" /></a>
		        	</div>
		        	<div class="link">
		        		<div class="cx">
		        			<img src="/wp-content/themes/cxbladder/img/page_assets/logo-cxbladder.png" />
		        			<a class="external" rel="http://fertility-for-men.myshopify.com/products/cx-bladder-cancer-test"><img src="/wp-content/themes/cxbladder/img/page_assets/buy_button_white.png" /></a>
		        		</div>
		        	</div>

	           	</div>

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

