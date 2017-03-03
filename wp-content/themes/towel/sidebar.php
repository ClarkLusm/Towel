<?php $current_lang = pll_current_language() ?>
<?php  
$post_type = get_post_type();
if($post_type == 'post') :
?>

<div id="sidebar" class="col-sm-3">
  <div class="list-category">
    <h3><?php echo ($current_lang == 'vi') ? _e('Danh mục' ) : _e('Categories'); ?></h3>
    <ul >
    <?php $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 0,
        'echo'                => 1,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'name',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories' ),
        'style'               => 'list',
        'taxonomy'            => 'category',
        'title_li'            => __( '' ),
        'use_desc_for_title'  => 1,
    ); ?>
    <?php wp_list_categories($defaults); ?>
    </ul>
  </div>
</div>

<?php endif ?>