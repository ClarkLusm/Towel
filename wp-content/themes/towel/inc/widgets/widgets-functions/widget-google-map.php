<?php

  class Foo_Widget extends WP_Widget {

    function __construct() {
      parent::__construct(
        'foo_widget', // Base ID
        esc_html__( 'Widget Title', 'text_domain' ), // Name
        array( 'description' => esc_html__( 'A Foo Widget', 'text_domain' ), ) // Args
      );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
      echo $args['before_widget'];
      if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }
      echo esc_html__( 'Hello, World!', 'text_domain' );
      echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
      $api_key    = isset( $instance['api_key'] ) ? absint( $instance['api_key'] ) : '';
      ?>
      <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
      </p>

      <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'api_key' ) ); ?>"><?php _e( 'Your API key:' ); ?></label> 
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'api_key' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'api_key' ) ); ?>" type="text" value="<?php echo esc_attr( $api_key ); ?>">
      </p>

      
      <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
      $instance = array();
      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

      return $instance;
    }

  } // class Foo_Widget

function register_foo_widget() {
  register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );