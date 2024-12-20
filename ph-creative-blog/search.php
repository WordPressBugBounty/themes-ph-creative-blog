<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package phcreativeblog
 */

get_header();
?>
<div class="container">
	<div class="row">
	<main id="primary" class="site-main <?php do_action('phcreativeblog_primary_width_class') ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header page-entry-header">
				<h1 class="page-title"><span>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ph-creative-blog' ), '<span>' . get_search_query() . '</span>' );
					?>
				</span></h1>
			</header><!-- .page-header -->

			<?php
			do_action( 'phcreativeblog_before_loop' );
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				do_action('phcreativeblog_blog_layout'); 

			endwhile;
			do_action( 'phcreativeblog_after_loop' );

			the_posts_pagination( apply_filters( 'phcreativeblog_posts_pagination_args', array(
				'class'	=>	'phcreativeblog-pagination',
				'prev_text'	=> '<i class="fa fa-angle-left"></i>',
				'next_text'	=> '<i class="fa fa-angle-right"></i>'
			) ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
	<?php get_sidebar();?>
	</div>
	
</div>
<?php

get_footer();
