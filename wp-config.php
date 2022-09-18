<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/** Enable W3 Total Cache */
/** Enable W3 Total Cache */
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
define( 'DB_NAME', 'dstojanovic_projekat' );
/** Database username */
define( 'DB_USER', 'dstojanovic_projekat' );
/** Database password */
define( 'DB_PASSWORD', '(LYAGXZ}z.Hs' );
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
define( 'AUTH_KEY',         'gX6@#e2.|N]BcD&7g5>r`|1N^mQhD4mqh5qI$AMn~6QAP[(ha[`7$z w!49d,b*:' );
define( 'SECURE_AUTH_KEY',  '>w.zrV;%aP?b;<hflXQ@`}*.Mr+EYcGR+Z2= ~i}_?#A10e>h!bL5C%8]sP{}Y//' );
define( 'LOGGED_IN_KEY',    'c5up{d({`DDkb7M /crab7BBg3mRRNC_X;b=|P+(!@~+cz9&~W05qp! 6z>|,FN2' );
define( 'NONCE_KEY',        '7OPgEFeh*+|(;ytA|B9e9hXiDyG2Qn#HMt1r-AwLm4]L-MxGd)zD|Zv1Gs61Ql+D' );
define( 'AUTH_SALT',        '^o7qb`un0dJm`2|@Zups1-j8]W$1D[l1U0Y4AWmz^`jNi]?QQ2JoV/uoHQF:BEac' );
define( 'SECURE_AUTH_SALT', 'cCS;jUQEW?R9M<KqVF1mjG(g+`Zdc)^}WEr*o|9.SAzr|O6K6ccMa1&!u%Cdq<OU' );
define( 'LOGGED_IN_SALT',   '68ZKZ)l FIZ^$A6j9emsl87EDX)8V#qjtaJ%2fkaAi&Z:A4/huE`(_`s|5}=NOBI' );
define( 'NONCE_SALT',       '{h[Ghn?MYQp9joykR_Mw-}~S$25L@&P4[d4iNK5>JFa=nGnD+^C6q/@ErU-*Trd ' );
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