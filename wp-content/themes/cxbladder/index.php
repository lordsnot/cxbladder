<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage CX_Bladder
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	  		<div id="what" class="section">
	            <div class="container">

	                <h1>What is ELIGARD<sup>&reg;</sup> (leuprorelin acetate)?</h1>
	                <div class="redLineSpacer"></div>
									
	                <p>
	                    <strong>
	                        ELIGARD<sup>&reg;</sup> is indicated for the palliative treatment of advanced prostate cancer.<sup>1</sup>
	                        ELIGARD<sup>&reg;</sup> is a sterile polymeric matrix formulation of leuprorelin acetate for subcutaneous
	                        injection. It is designed to deliver leuprorelin acetate at a controlled rate over a therapeutic period.<sup>1</sup>
	                    </strong>
	                </p>
	            </div>
	        </div>

	        <div id="choice" class="section">
	            <div class="container">
	                <h1 class="redText">THE POWER OF CHOICE<sup>1&Dagger;</sup></h1>
	                <div class="redLineSpacer"></div>
									<p class="reference" style="text-align: center">
	                    &Dagger; Choice of 1-month (7.5 mg), 3-month (22.5 mg) 4-month (30 mg) or 6-month (45 mg) injections.1<br>
	                </p>

	                <p>
	                    Only ELIGARD<sup>&reg;</sup> offers a choice of 1, 3, 4 and 6-monthly dosages,<sup>1</sup> giving you the
	                    flexibility to tailor treatment to suit the specific requirements of each of your patients.
	                </p>
									<img src="img/eligard/boxes.jpg" alt="ELIGARD product shot" />
	            </div>
	        </div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
