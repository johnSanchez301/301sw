<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', '301_db');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'p i5#jV.QQkl/@W3?Vqq({+k/Re_|XP/rgmMq$C& NWZtrNQ6w7j)^w%gxR1r,@h');
define('SECURE_AUTH_KEY', '` sJpTA7S~yxl92bjm3JhzG,Wn8($eNiI]$6BJ:V[!X$gdZG<EiFQ2O OZzfv6F|');
define('LOGGED_IN_KEY', 'mY5g0Y?GbqPYX~,ajKQlacD/Uw_+z%v*:xhgDO+?lXzaw,i]{E@0Tqf^|3f?$|j[');
define('NONCE_KEY', 'SV>SZQ(<ijl ^ QZbz(]+/]q`6c`F.kvzm=(m 58ytc_Z+IDa]i7,[jwNLoQ)d%G');
define('AUTH_SALT', '*JxM:ouh:^uwNO{l2WV%E[4K+441 )m*e*fouXV@ygpBCP95hn/@]W2g([i0<vi_');
define('SECURE_AUTH_SALT', 'NM&Hbp1AbQU?^I8Ujp2=t>g52GrQc+GK[[3FmmyBMHvj)V,^; 0G5Ft5V3f*.wzH');
define('LOGGED_IN_SALT', 'Ln}|<oa;v}>$[NG+;$9XCu0O;^rLJh;^DdAwN! $@69ed$dwn-UW`xSa47BMa)Q*');
define('NONCE_SALT', ';agYD5}K17*2:;Rt8NMJV_NW&z Zp(bpbe5B]{/[#(q5_J(G`nnpU r*xK:bm9k*');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

