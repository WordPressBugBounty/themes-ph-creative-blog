<div id="middle-bar">
	<div id="site-branding">
		<div class="container logo-search-wrapper">
		<?php
		the_custom_logo(); ?>
			<div class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
		<div class="menu-wrapper col-md-8">
			<nav id="site-navigation" class="main-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
			</nav><!-- #site-navigation -->
		</div>

		<div id="search-bar-wrapper" class="search-bar-wrapper col-md-1">
					<i class="fa fa-search" style="cursor:pointer;"></i>
		</div>
		</div>
	</div><!-- .site-branding -->
</div>
