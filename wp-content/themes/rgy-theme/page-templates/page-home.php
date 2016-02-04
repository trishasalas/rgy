<?php
/**
 * Template Name: Home
 *
 * @package rgy
 */

get_header(); ?>

	<section id="masthead" class="masthead">
		<?php echo rgy_home_slider();?>
	</section>

	<section id="schedule" class="schedule-section">
		<?php echo rgy_home_schedule();?>

	</section>

	<section id="grid-nav" class="grid-nav">

	</section>


<?php
get_footer();