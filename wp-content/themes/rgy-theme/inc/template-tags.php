<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package rgy
 */

if ( ! function_exists( 'rgy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function rgy_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'rgy' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'rgy' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'rgy_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function rgy_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'rgy' ) );
		if ( $categories_list && rgy_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'rgy' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'rgy' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'rgy' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'rgy' ), esc_html__( '1 Comment', 'rgy' ), esc_html__( '% Comments', 'rgy' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'rgy' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function rgy_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'rgy_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'rgy_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so rgy_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so rgy_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in rgy_categorized_blog.
 */
function rgy_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'rgy_categories' );
}
add_action( 'edit_category', 'rgy_category_transient_flusher' );
add_action( 'save_post',     'rgy_category_transient_flusher' );

function contact_page_link() {
	$page = get_page_by_title( 'Contact' );
	if( $page ) :
		$output = '';
		$output .= '<a href="' . get_permalink( $page->ID ) . '"><img src="' . get_template_directory_uri() . '/assets/images/Contact-icon.png" alt="contact icon"></a>';
	return $output;
		endif;
}

add_filter('the_content', 'my_content');

/**
 * Displays Slider and slider data
 *
 */
function rgy_home_slider() {
		$output         = '';
		$output         .= '<div class="slider">';

		$slides                     = get_post_meta( get_the_id(), 'rgy_home_slider_post', true );

		if( $slides ) {
			foreach ( $slides as $slide ) {
				$slide_image_id     = get_post_meta( $slide, 'rgy_retreat_image', true );
				$start_date_stamp   = get_post_meta( $slide, 'rgy_retreat_start_date', true );
				$start_date         = new DateTime("@$start_date_stamp");
				$end_date_stamp     = get_post_meta( $slide, 'rgy_retreat_end_date', true );
				$end_date           = new DateTime("@$end_date_stamp");
				$image_id           = wp_get_attachment_image_src( $slide_image_id, 'full' );
				$location           = get_post_meta( $slide, 'rgy_retreat_location', true );

				$output .= '<div class="slide" style="background-image:url(' . $image_id[0] . ');">';
				$output .= '<div class="date"><meta itemprop="startDate" content="' . $start_date->format('Y-m-d') . '">' . $start_date->format('M d') . ' - ' . $end_date->format('d, Y') . '</meta></div>';
				$output .= '<h2 class="slide-title">' . get_the_title( $slide ) . '</h2>';
				$output .= '<div class="location" itemprop="location" itemscope itemtype="http://schema.org/Place">' . $location . '</div>';
				$output .= '</div>';
			}
		}
	return $output;
}


function rgy_home_schedule() {
	$output = '';
	$schedule_first = esc_html( get_post_meta( get_the_id(), 'rgy_home_schedule_title', true ) );
	if( $schedule_first ) :
		$output .= '<div class="schedule title">';
		$output .= wpautop( $schedule_first );
		$output .= '</div>';
	endif;

	$schedule_second = get_post_meta( get_the_id(), 'rgy_home_schedule_first', true );
	if( $schedule_second ) :
	$output .= '<div class="schedule first">';
	$output .= wpautop( $schedule_second );
	$output .= '</div>';
	endif;

	$schedule_third = get_post_meta( get_the_id(), 'rgy_home_schedule_name', true );
	if( $schedule_third ) :
	$output .= '<div class="schedule second">';
	$output .= wpautop( $schedule_third );
	$output .= '</div>';
	endif;

	return $output;

}
