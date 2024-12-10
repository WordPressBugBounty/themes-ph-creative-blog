<?php

/**
 * Adds Foo_Widget widget.
 */

 class Foo_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'foo_widget',
            esc_html__( 'Popular Posts', 'ph-creative-blog' ),
            array( 'description' => esc_html__( 'This widgets can be used to show latest posts popular posts.', 'ph-creative-blog' ), )
        );
    }

    public function widget( $args, $instance ) {
        $title            = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'ph-creative-blog' );
        $number_of_posts  = ! empty( $instance['number_of_posts'] ) ? absint( $instance['number_of_posts'] ) : 4;
        $order            = ! empty( $instance['order'] ) ? $instance['order'] : 'random';
        $category         = ! empty( $instance['category'] ) ? $instance['category'] : '';

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
        }
        $featured_post_sidebar_args = array(
            'posts_per_page'      => $number_of_posts,
            'ignore_sticky_posts' => 1,
            'order'               => $order,
            'cat'                 => $category,
        );

        $featured_post_sidebar = new WP_Query( $featured_post_sidebar_args );

        if ( $featured_post_sidebar->have_posts() ) {
            echo '<div class="featured-post-widget">';
            echo '<div class="row featured-sidebar-row">';
            while ( $featured_post_sidebar->have_posts() ) {
                $featured_post_sidebar->the_post();
                echo '<div class="sidebar-thumbnail-wrapper col-md-6 col-lg-4 col-xl-4">';
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                } else {
                    echo '<img src="' . esc_url( get_template_directory_uri() . "/design-files/images/thumbnail.jpg" ) . '">';
                }
                echo '</div>';
                echo '<div class="sidebar-post-info-wrapper col-md-6 col-lg-8 col-xl-8">';
                echo '<a href="' . get_permalink() . '">';
                echo '<h4 id="entry-title-fp" class="sidebar-title">' . get_the_title() . '</h4>';
                echo '</a>';
                echo '<div class="entry-meta">';
                phcreativeblog_posted_on();
                echo '</div><!-- .entry-meta -->';
                echo '</div><!-- sidebar-post-info-wrapper -->';
            }
            echo '</div><!-- row -->';
            echo '</div><!-- featured-post-widget -->';
        }

        wp_reset_postdata();
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title            = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'ph-creative-blog' );
        $number_of_posts  = ! empty( $instance['number_of_posts'] ) ? absint( $instance['number_of_posts'] ) : 4;
        $order            = ! empty( $instance['order'] ) ? $instance['order'] : 'random';
        $category         = ! empty( $instance['category'] ) ? $instance['category'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'ph-creative-blog' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>"><?php esc_html_e( 'Number of Posts:', 'ph-creative-blog' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="number" min="1" step="1" value="<?php echo esc_attr( $number_of_posts ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Post Order:', 'ph-creative-blog' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>">
                <option value="random" <?php selected( $order, 'random' ); ?>><?php esc_html_e( 'Random', 'ph-creative-blog' ); ?></option>
                <option value="date" <?php selected( $order, 'date' ); ?>><?php esc_html_e( 'Date', 'ph-creative-blog' ); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Category:', 'ph-creative-blog' ); ?></label>
            <?php wp_dropdown_categories( array(
                'show_option_none' => esc_html__( 'Select category', 'ph-creative-blog' ),
                'name'             => $this->get_field_name( 'category' ),
                'id'               => $this->get_field_id( 'category' ),
                'selected'         => $category,
                'class'            => 'widefat',
            ) ); ?>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance                 = array();
        $instance['title']        = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? absint( $new_instance['number_of_posts'] ) : 4;
        $instance['order']        = ( ! empty( $new_instance['order'] ) ) ? sanitize_text_field( $new_instance['order'] ) : 'random';
        $instance['category']     = ( ! empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';

        return $instance;
    }

}

function register_foo_widget() {
    register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );
