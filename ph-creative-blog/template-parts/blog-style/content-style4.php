<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phcreativeblog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row blog-style4 col-md-6 col-lg-6 grid-layout'); ?>>
<div class="blog-layout">
	<div class="thumbnail col-md-12 col-lg-12">
		<figure>
		<a href="<?php the_permalink(); ?>"><?php 
		if (has_post_thumbnail()):
			the_post_thumbnail(); 
		endif;	?></a>
		</figure>
	</div>
	
	<div class="post-details col-md-12 col-lg-12">
		
<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

<div class="entry-meta">
			<?php
			phcreativeblog_posted_on();
			phcreativeblog_posted_by();
		?>
</div><!-- .entry-meta -->
		<div class="entry-excerpt">
          <?php the_excerpt();?>	
		</div>
</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
