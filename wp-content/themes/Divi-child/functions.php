<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION


add_filter('gettext', 'change_relatedproducts_text', 10, 3);

function change_relatedproducts_text($new_text, $related_text, $source)
{
     if ($related_text === 'Related products' && $source === 'woocommerce') {
         $new_text = esc_html__('Možda vam se dopadne:', $source);
     }
     return $new_text;
}

add_action('woocommerce_before_add_to_cart_form','dodaj_tekst');
function dodaj_tekst()
{
    $tekst = "Izaberite količinu:";
    echo $tekst;

}

add_filter('gettext', 'promeni_quantity', 10, 3);

function promeni_quantity($new_text, $related_text, $source)
{
  if ($related_text === 'Quantity' && is_cart ()) {
         $new_text = esc_html__('Količina', $source);
     }
     return $new_text;  
}

add_filter('gettext', 'promeni_subtotal', 10, 3);

function promeni_subtotal($new_text, $related_text, $source)
{
  if ($related_text === 'Subtotal' && is_cart ()) {
         $new_text = esc_html__('Ukupno', $source);
     }
     return $new_text;  
}

add_filter('gettext', 'promeni_price', 10, 3);

function promeni_price($new_text, $related_text, $source)
{
  if ($related_text === 'Price' && is_cart ()) {
         $new_text = esc_html__('Cena', $source);
     }
     return $new_text;  
}

add_filter('gettext', 'promeni_product', 10, 3);

function promeni_product($new_text, $related_text, $source)
{
  if ($related_text === 'Product' && is_cart ()) {
         $new_text = esc_html__('Proizvod', $source);
     }
     return $new_text;  
}

// Promena featured slike za blog modul
function pa_blog_image_width($width) {
	return '9999';
}
function pa_blog_image_height($height) {
	return '9999';
}
add_filter( 'et_pb_blog_image_width', 'pa_blog_image_width' );
add_filter( 'et_pb_blog_image_height', 'pa_blog_image_height' );
// Kraj



