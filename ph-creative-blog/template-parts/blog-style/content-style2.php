<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phcreativeblog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row blog-style2'); ?>>

<div class="post-details col-md-8 col-lg-8">

	<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	<div class="entry-meta">
			<?php
			phcreativeblog_posted_on();
			phcreativeblog_posted_by();
			?>
	</div><!-- .entry-meta -->

	<div class="entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
	
</div>

<div class="thumbnail col-md-4 col-lg-4" style="background-image: url('<?php echo has_post_thumbnail() ? esc_url(get_the_post_thumbnail_url(get_the_ID())) : esc_url(get_template_directory_uri().'/design-files/images/thumbnail.jpg'); ?>'); background-position: center; background-repeat: no-repeat; background-size: cover;">
			<?php $primary_category = phcreativeblog_primary_category(); 
				if (true) :
					echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
				endif;
			?>
			<a href="<?php the_permalink(); ?>">
			</a>	
</div>

</article><!-- #post-<?php the_ID(); ?> -->