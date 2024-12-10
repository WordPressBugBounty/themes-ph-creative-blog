<footer id="footer-widgets">
	<div class="container">
		<div class="row">
			<?php
            $footer_columns = get_theme_mod('phcreativeblog_footer_column_choice', 'four-columns');
            // Determine the Bootstrap column class based on the user's selection
            switch ($footer_columns) {
                case 'one-column':
                    $col_class = 'col-md-12';
                    $max_columns = 1;
                    break;
                case 'two-columns':
                    $col_class = 'col-md-6';
                    $max_columns = 2;
                    break;
                case 'three-columns':
                    $col_class = 'col-md-6 col-lg-4';
                    $max_columns = 3;
                    break;
                case 'four-columns':
                default:
                    $col_class = 'col-md-6 col-lg-3';
                    $max_columns = 4;
            }

            for ($i = 1; $i <= $max_columns; $i++): 
                if (is_active_sidebar('footer-' . $i)): ?>
				    <div class="<?php echo $col_class; ?> footer-column footer-column-<?php echo $i; ?>">
					    <?php dynamic_sidebar('footer-' . $i); ?>
				    </div>
			    <?php endif;
            endfor;
            ?>
		</div>
	</div>
</footer>
