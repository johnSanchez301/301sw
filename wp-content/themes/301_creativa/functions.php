<?php
require_once locate_template('config/init.php');
require_once locate_template('config/template_display_function.php');
require_once locate_template('config/functions.php');
require_once locate_template('config/scripts.php');
require_once locate_template('config/layout.php');
require_once locate_template('config/class.php');
require_once locate_template('config/header.php');
require_once locate_template('config/content.php');
require_once locate_template('config/footer.php');
require_once locate_template('config/breadcrumb.php');
require_once locate_template('config/post_navigation.php');
require_once locate_template('config/comment_trackback.php');
require_once locate_template('config/walker_nav_menu.php');
global $wp_version;
if($wp_version >4.0)
{
	require_once locate_template('config/customizer4.x.php');
}else
{
	require_once locate_template('config/customizer.php');
}
// add short code for theme
require_once locate_template('shortcodes/class.shortcodes.php');
$aweinitShortcode = new AWEShortcodes();

if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'id' => 'newsletter',
    'name' => 'Newsletter',
    'before_widget' => '',
    'after_widget' => '',
));

function ajax_subscribe() {
   $data = urldecode( $_POST['data'] );
    if ( !empty( $data ) ) :
        $data_array = explode( "&", $data );
        $fields = [];
        foreach ( $data_array as $array ) :
            $array = explode( "=", $array );
            $fields[ $array[0] ] = $array[1];
        endforeach;
    endif;
    
	if ( !empty( $fields ) ){
		if ( filter_var( $fields['ne'], FILTER_VALIDATE_EMAIL ) ){
            global $wpdb;
            $exists = $wpdb->get_var(
				$wpdb->prepare(
					"SELECT email FROM " . $wpdb->prefix . "newsletter
					WHERE email = %s",
                    $fields['ne']
				)
            );

             if ( ! $exists ) {
				NewsletterSubscription::instance()->subscribe();
				$output = array(
					'status'    => 'success',
					'msg'       => __( '¡Suscripción exitosa! Recibirás un correo electrónico de confirmación en pocos minutos. Si tarda más de 15 minutos en aparecer en tu buzón, por favor comprueba la carpeta de correos no deseados.', 'theme_text_domain' )
				);
         	} else {
                $output = array(
					'status'    => 'error',
					'msg'       => __( 'Su correo electrónico ya está registrado. Valide su buzón y confirme su suscripción.', 'theme_text_domain' )
				);
			}
        }else {
			$output = array(
				'status'    => 'error',
				'msg'       => __( 'El correo electrónico es invalido.', 'theme_text_domain' )
			);
        };
    }else{
        $output = array(
            'status'    => 'error',
            'msg'       => __( 'Se ha presentado un error. Por intente más tarde.', 'theme_text_domain' )
        );
    };
    wp_send_json( $output );
}
add_action( 'wp_ajax_nopriv_ajax_subscribe', 'ajax_subscribe' );
add_action( 'wp_ajax_ajax_subscribe', 'ajax_subscribe' );