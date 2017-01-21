<?php
/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class Custom_Widget_Recent_Posts extends WP_Widget {

  public function __construct() {
    $widget_ops = array(
      'classname' => 'widget_recent_entries',
      'description' => __( 'Your site&#8217;s most recent Posts.' ),
      'customize_selective_refresh' => true,
    );
    parent::__construct( 'custom-recent-posts', __( 'Custom Recent Posts' ), $widget_ops );
    $this->alt_option_name = 'widget_recent_entries';
  }

  public function widget( $args, $instance ) {
    if ( ! isset( $args['widget_id'] ) ) {
      $args['widget_id'] = $this->id;
    }

    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

    /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

    $cat_id = ( ! empty( $instance['cat_id'] ) ) ? absint( $instance['cat_id'] ) : '';
    if ( ! $cat_id )
      $cat_id = '';

    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
    if ( ! $number )
      $number = 5;
    $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

    $r = new WP_Query( apply_filters( 'widget_posts_args', array(
      'cat'                 => $cat_id,
      'posts_per_page'      => $number,
      'no_found_rows'       => true,
      'post_status'         => 'publish',
      'ignore_sticky_posts' => true
    ) ) );

    if ($r->have_posts()) :
    ?>
    <div class="wg-lastest-news">      
      <?php //echo $args['before_widget']; ?>
      <?php if ( $title ) {
        echo $args['before_title'] . $title . $args['after_title'];
      } ?>
      <!-- <ul> -->
      <?php while ( $r->have_posts() ) : $r->the_post(); ?>
        <div class="item col-sm-4">
          <a href="<?php the_permalink(); ?>">
            <span class="post-image">
              <?php echo get_the_post_thumbnail() ?>
            </span>
            <strong class="post-headline"><?php get_the_title() ? the_title() : the_ID(); ?>
            <?php if ( $show_date ) : ?>
              <span class="post-time"><?php echo get_the_date(); ?></span>
            <?php endif; ?>
            </strong>
          </a>
        </div>
      <?php endwhile; ?>
      <!-- </ul> -->
      <?php echo $args['after_widget']; ?>
      <?php
      // Reset the global $the_post as this query will have stomped on it
      wp_reset_postdata(); ?>

    </div>

    <?php 
    endif; 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = sanitize_text_field( $new_instance['title'] );
    $instance['number'] = (int) $new_instance['number'];
    $instance['cat_id'] = (int) $new_instance['cat_id'];
    $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_recent_posts', 'widget');
  }

  public function form( $instance ) {
    $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
    $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    $cat_id    = isset( $instance['cat_id'] ) ? absint( $instance['cat_id'] ) : '';
    $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
    <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
    <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

    <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>

    <?php $cats = get_categories();
      if(!empty($cats)) : ?>
    <label for="<?php echo $this->get_field_id( 'cat_id' ); ?>"><?php _e( 'Posts from category:' ); ?></label>
    <select name="<?php echo $this->get_field_name( 'cat_id' ); ?>">
      <?php foreach ($cats as $cat) : ?>
      <option value="<?php echo $cat->cat_ID ?>" <?php if($cat_id == $cat->cat_ID) echo "selected"; ?>><?php echo $cat->name ?></option>
      <?php endforeach ?>
    </select>

    <?php endif ?>
<?php
  }
}
// function wpse97413_register_custom_widgets() {
  register_widget( 'Custom_Widget_Recent_Posts' );
// }
// add_action( 'widgets_init', 'wpse97413_register_custom_widgets' );