<?php if (get_theme_mod('phcreativeblog-enable-top-bar', false)) : ?>
<div id="top-bar">
	<div class="container">
		<div class="row top-bar-wrapper">
		<div id="top-bar-left" class="col col-md-6 col-lg-6">
		
				<?php
				if(get_theme_mod('phcreativeblog-display-search')):
					get_search_form();
			    endif;
				?>	
			<?php if(has_nav_menu('menu-top')):?>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-top',
							'menu_id'        => 'top-menu',
						)
					);
				endif;?>
				
			</div>
			<?php if (get_theme_mod('phcreativeblog-enable-date', true)) : ?>
			<div id="top-bar-right" class="col col-md-6 col-lg-6">
				<?php echo esc_html(date('j F, Y')); ?>
				<div class="social-menu-wrapper">
				<?php if (has_nav_menu( 'social' )) : ?>
						<?php wp_nav_menu(
							array(
								'theme_location' => 'social',
								'menu_id'        => 'social-menu',
							)
						); ?>
				<?php endif; ?>
			</div>
			</div>
			<?php endif; ?>
			
		</div>
	</div>
</div><!--#top-bar-->
<?php endif; ?>