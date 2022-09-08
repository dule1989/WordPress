<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dstojanovic_portfolio' );
/** Database username */
define( 'DB_USER', 'dstojanovic_portfolio' );
/** Database password */
define( 'DB_PASSWORD', 'wN?zO]?Q[{3x' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|A[VvhG2t,,l,t%8I{:UnYIl)|>7qmv18d)59.XXU[mqOmL2;4%=Aq|F@:>sjORc' );
define( 'SECURE_AUTH_KEY',  '<H)dC,Mo1^0`%pBPjKSWO~,;G(lgDuT]}HnGj)BzfHmlVnj2Dn}kM]qPWy7+!X-(' );
define( 'LOGGED_IN_KEY',    'Jsw{$]J+0A7{{/F:7N2xoUrFQ<J0Hu[euE{rp8$_>@S;}mvIo~W;<j f7;wnIq8m' );
define( 'NONCE_KEY',        'b~ tzGTWKk{nza;t.VVN|s]LWH(^pr<Iw!=o(Mop!JWtcxQ>;y}eK&)E!0Sd1):K' );
define( 'AUTH_SALT',        '2Th[+UpZjnMwjOWDgUrk.Aa9|NLiz=8bdDDVW/hsRSz3#Q!sjDa)O=QZEZf1b=O&' );
define( 'SECURE_AUTH_SALT', '[>xQV([V.SO.K9RWh+*i,GBLwZ.A!(TD&v<k4@MH-`H`+c/R[pox!nBEw&M4[VQk' );
define( 'LOGGED_IN_SALT',   'p{.&y#,K$Q?K_QrDaU,/M;!tP-<4=D!&4aHz69dWE)88|x#C[o2F?R_c3^D>kM{ ' );
define( 'NONCE_SALT',       '3:*`xMz:2{s_4z2bBWDLR=Q8@6D2HaN_z|)v#x:#[!l8T@ <f;L.A7LV6[eUPiNJ' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';