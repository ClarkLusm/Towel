jQuery( document ).ready(function() {
   jQuery("div.cart").each(function(i){
   var $this = jQuery(this),
    $a = $this.find('a');

    $this.html($a);

   });
  jQuery('.bxslider').bxSlider({
    mode: 'fade',
    captions: true,
  });
  sticky();
});
jQuery(window).scroll(function () {
  sticky();
})
function sticky() {
  if(jQuery(window).scrollTop() > 0) 
    jQuery('#header').addClass('is-sticky');
  else
    jQuery('#header').removeClass('is-sticky');
}