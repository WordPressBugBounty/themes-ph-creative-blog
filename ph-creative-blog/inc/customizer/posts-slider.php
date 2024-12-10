<?php
class Featured_Post_Slider_Widget extends WP_Widget {

    // Constructor to initialize the widget
    public function __construct() {
        parent::__construct(
            'featured_post_slider_widget', // Base ID
            __('Featured Post Slider', 'ph-creative-blog'), // Name
            array('description' => __('A widget to display featured posts in a slider', 'ph-creative-blog')) // Args
        );
    }

    public function widget($args, $instance) {
        $number_of_posts = !empty($instance['number_of_posts']) ? $instance['number_of_posts'] : 4;
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $category = !empty($instance['category']) ? $instance['category'] : 1;
    
        echo $args['before_widget'];
    
        // Fetch latest posts based on widget settings
        $featured_post_slider_args = array(
            'posts_per_page'      => $number_of_posts,
            'ignore_sticky_posts' => 1,
            'order'               => $order,
            'cat'                 => $category,
        );
    
        $featured_post_slider = new WP_Query($featured_post_slider_args);
    
        if ($featured_post_slider->have_posts()) {
            echo '<div class="swiper-container">';
            echo '<div class="swiper-wrapper">';
            while ($featured_post_slider->have_posts()) {
                $featured_post_slider->the_post();
    
                $link = get_permalink();
                $title = get_the_title();
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
    
                // Each post as a swiper slide
                echo '<div class="swiper-slide" style="background-image: url(' . esc_url($thumbnail_url) . ');">';
                echo '<div class="slide-overlay">';
                echo '<div class="post-details-wrapper">';
                
                // Display post category
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<div class="post-category">' . esc_html($categories[0]->name) . '</div>';
                }
                echo '<a href="' . esc_url($link) . '" title="' . esc_attr($title) . '">';
                echo '<h2 class="slide-title">' . esc_html($title) . '</h2>';
                echo '</a>';
                
                // Display post author and date
                echo '<div class="post-meta">';
                echo '<span class="post-author">' . esc_html__('By', 'ph-creative-blog') . ' ' . get_the_author() . '</span>';
                echo '<span class="post-date">' . esc_html(get_the_date()) . '</span>';
                echo '</div>'; // End of .post-meta
                
                echo '</div>'; // End of .post-details-wrapper
                echo '</div>'; // End of .slide-overlay
                echo '</div>'; // End of .swiper-slide
            }
    
            echo '</div>'; // End of .swiper-wrapper
            echo '<div class="swiper-pagination"></div>';
            echo '<div class="swiper-button-next"></div>';
            echo '<div class="swiper-button-prev"></div>';
            echo '</div>'; // End of .swiper-container
        }
    
        wp_reset_postdata();
    
        // Add Swiper initialization script
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
        </script>
        ";
    
        echo $args['after_widget'];
    }
    

    // Back-end widget form
    public function form($instance) {
        $number_of_posts = !empty($instance['number_of_posts']) ? $instance['number_of_posts'] : 4;
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $category = !empty($instance['category']) ? $instance['category'] : '';
        $categories = get_categories();

        // Form fields
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>"><?php _e('Number of Posts:','ph-creative-blog'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="number" value="<?php echo esc_attr($number_of_posts); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order:','ph-creative-blog'); ?></label>
            <select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>" class="widefat">
                <option value="DESC" <?php selected($order, 'DESC'); ?>><?php _e('DESC', 'ph-creative-blog'); ?></option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>><?php _e('ASC', 'ph-creative-blog'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:','ph-creative-blog'); ?></label>
            <select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>" class="widefat">
                <?php foreach ($categories as $cat) : ?>
                    <option value="<?php echo esc_attr($cat->term_id); ?>" <?php selected($category, $cat->term_id); ?>><?php echo esc_html($cat->name); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    // Update widget options
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['number_of_posts'] = (!empty($new_instance['number_of_posts'])) ? strip_tags($new_instance['number_of_posts']) : 4;
        $instance['order'] = (!empty($new_instance['order'])) ? strip_tags($new_instance['order']) : 'DESC';
        $instance['category'] = (!empty($new_instance['category'])) ? strip_tags($new_instance['category']) : '';

        return $instance;
    }
}

// Register the widget
function register_featured_post_slider_widget() {
    register_widget('Featured_Post_Slider_Widget');
}
add_action('widgets_init', 'register_featured_post_slider_widget');
