<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package phcreativeblog
 */

get_header();
?>

	<main id="primary" class="site-main">
       <div class="container">
			<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ph-creative-blog' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. ', 'ph-creative-blog' ); ?></p>
			<div class="error-search-wrapper">
				<?php get_search_form();?>
			</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
	</div>	

<?php
get_footer();
