<article id="post-<?php the_ID(); ?>" <?php post_class('single-style2'); ?>>
<?php if (get_theme_mod('phcreativeblog-breadcrumbs_set')) : ?>
  <div class="breadcrumb-wrapper"><?php phcreativeblog_get_breadcrumbs(); ?></div>
<?php endif;?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>	
			<div class="entry-meta">
				<?php
				phcreativeblog_entry_meta_style2();
				?>
			</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php phcreativeblog_post_thumbnail(); ?>

	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clearfix">
		<?php phcreativeblog_entry_footer_style2(); ?>
	</footer><!-- .entry-footer -->
		
	<?php
		the_post_navigation(
			array(
				'prev_text' => '<i class="fa fa-arrow-alt-circle-left"></i><span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-title">%title</span><i class="fa fa-arrow-alt-circle-right"></i>',
			)
		); 
	
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>			
</article><!-- #post-<?php the_ID(); ?> -->