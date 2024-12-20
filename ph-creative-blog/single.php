<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package phcreativeblog
 */

get_header();
?>

	<main id="primary" class="site-main <?php do_action('phcreativeblog_primary_width_class') ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/single-post/single-post', get_theme_mod('phcreativeblog-single-post-style','style3') );


		endwhile; // End of the loop.
		?>

	</main><!-- #main --> 

<?php
get_sidebar();
get_footer();
