<?php
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
define( 'DB_NAME', 'dstojanovic_troubleshooting' );

/** Database username */
define( 'DB_USER', 'dstojanovic_troubleshooting' );

/** Database password */
define( 'DB_PASSWORD', '$v+]iZlV2j?,' );

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
define( 'AUTH_KEY',         ':-hW&cT.U5*%cN(_?S,]7Ma3oa)g@..#AL4]mBL89?sbf[K#(wT3T22|ej|d*^bq' );
define( 'SECURE_AUTH_KEY',  'nZeju%/MRd*U;1N|xMP=/x[/*V]<R.HJ^B:Zl+o1K)zrcOBdZ:HHa6NzGo}<V+z ' );
define( 'LOGGED_IN_KEY',    'p(,%i/G<NS+:!f^6~LG=?ct}zx{?{fG:K VA|/?W&hg+O9571hpYP`k~=dp9JvoK' );
define( 'NONCE_KEY',        'Rjvual@bm.qt?u[7~@E/VA){Mi.%lE-#cyK3 Zyv1U fv12TDD0SCwl+Ux:M+tx.' );
define( 'AUTH_SALT',        'at&Qrw.f%~ESJER5S_D@e=rH?*^1xn$W|0nCdn?$>jOryu7$q-8[}~zwc9oD2x^ ' );
define( 'SECURE_AUTH_SALT', ':h=tC=Y-o0-af;[xyPuPGEFTt;BAVXvg2/{qOo%[c$TcpHF3K/S4)<TT^vE%N($<' );
define( 'LOGGED_IN_SALT',   '.AUkKXYx F1SAf9!lr|PkMj]piY~,gYoPQH%0)~>2!@lp[fcb*mp|6!7]HozgaEE' );
define( 'NONCE_SALT',       '3i<A[~bxgYyc|rcPvl*i.<Dx}:$&d#]i1s=lE2`A~yLy*pKwSs$+`.R4~245xUcD' );

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
