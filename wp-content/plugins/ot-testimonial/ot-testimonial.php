<?php  
/*
Plugin Name:  Omythemes Testimonial Plugin
Plugin URI:   http://www.omytheme.com
Description:  Omythemes Testimonial Plugin Description
Version:      1.0.0
Author:       Clark Lusm
Author URI:
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:
Domain Path: 
*/

// add_action( 'admin_menu', 'testimonial_admin_actions' );
// function testimonial_admin_actions()
// {
//   add_options_page( "OT Testimonial", 'OT Testimonial', 'manage_options', _FILE_, 'testimonial_admin' );
// }
// function testimonial_admin()
// {
?>

  <!-- <div class="wrap">
    <h4></h4>
    <form action="">
      <div class="form-controls">
        <label>Path of avatar</label>
        <input type="text" name="path">
      </div>
      <div class="form-controls">
        <label>Content</label>
        <input type="text" name="content">
      </div>
      <div class="form-controls">
        <label>Name</label>
        <input type="text" name="name">
      </div>
    </form>
  </div> -->

<?php
// }
// function install_testimonial_slider() {
//   global $wpdb, $table_prefix;  
//   $table_name = $table_prefix.TESTIMONIAL_SLIDER_TABLE;
//   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
//     $sql = "CREATE TABLE $table_name (
//           id int(5) NOT NULL AUTO_INCREMENT,
//           post_id int(11) NOT NULL,
//           date datetime NOT NULL,
//           slider_id int(5) NOT NULL DEFAULT '1',
//           slide_order int(5) NOT NULL DEFAULT '0',
//           UNIQUE KEY id(id)
//         );";
//     $rs = $wpdb->query($sql);
//   }
//     $meta_table_name = $table_prefix.TESTIMONIAL_SLIDER_META;
//   if($wpdb->get_var("show tables like '$meta_table_name'") != $meta_table_name) {
//     $sql = "CREATE TABLE $meta_table_name (
//           slider_id int(5) NOT NULL AUTO_INCREMENT,
//           slider_name varchar(100) NOT NULL default '',
//           UNIQUE KEY slider_id(slider_id)
//         );";
//     $rs2 = $wpdb->query($sql);
  
//     $wpdb->insert($meta_table_name, array('slider_id' => 1, 'slider_name' => 'Testimonial Slider'), array('%d', '%s'));
//   }

//   $slider_postmeta = $table_prefix.TESTIMONIAL_SLIDER_POST_META;
//   if($wpdb->get_var("show tables like '$slider_postmeta'") != $slider_postmeta) {
//     $sql = "CREATE TABLE $slider_postmeta (
//           post_id int(11) NOT NULL,
//           slider_id int(5) NOT NULL default '1',
//           UNIQUE KEY post_id(post_id)
//         );";
//     $rs4 = $wpdb->query($sql);
//   }
//    // Testimonial Slider Settings and Options
//    $default_slider = array();
//    global $default_testimonial_slider_settings;
//    $default_slider = $default_testimonial_slider_settings;
   
//                $default_scounter='1';
//      $scounter=get_option('testimonial_slider_scounter');
//      if(!isset($scounter) or $scounter=='' or empty($scounter)){
//         update_option('testimonial_slider_scounter',$default_scounter);
//       $scounter=$default_scounter;
//      }
     
//      for($i=1;$i<=$scounter;$i++){
//          if ($i==1){
//         $testimonial_slider_options='testimonial_slider_options';
//        }
//        else{
//         $testimonial_slider_options='testimonial_slider_options'.$i;
//        }
//        $testimonial_slider_curr=get_option($testimonial_slider_options);
             
//        if(!$testimonial_slider_curr and $i==1) {
//        $testimonial_slider_curr = array();
//        }
  
//        if($testimonial_slider_curr or $i==1) {
//          foreach($default_slider as $key=>$value) {
//           if(!isset($testimonial_slider_curr[$key])) {
//            $testimonial_slider_curr[$key] = $value;
//           }
//          }
//          update_option($testimonial_slider_options,$testimonial_slider_curr);
//          update_option( "testimonial_db_version", $testimonial_db_version );
//        }
//      } //end for loop
// }