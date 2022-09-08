<?php
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
define( 'DB_NAME', 'dstojanovic_vezbaDigitel' );
/** Database username */
define( 'DB_USER', 'dstojanovic_vezbaDigitel' );
/** Database password */
define( 'DB_PASSWORD', 'hus@p%p$J-;y' );
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
define( 'AUTH_KEY',         'eyG4E8sf!%=-c+<wb)`TSVFJC(GH@<vGJ6Zq<i6@)AN*wK0nm4gA6*!R?nR,e>UN' );
define( 'SECURE_AUTH_KEY',  '6Z*l2IB0eZE(|jtT=`D<=yx8[8O:q!R;u>yah_2/)sL-Kv0-h{Z%@~>xD,n.J5R|' );
define( 'LOGGED_IN_KEY',    'jo*J}<5mLYA@<o@jItQ&Dzaa-iSacP,:C0&&%`>G8lUdGZaqp%:u(7{bAdFZmp.%' );
define( 'NONCE_KEY',        ';=J~#?[/nA2GLi]z~8yV@#T$1O&e;U7NE..B!0K:e/7eL`]5pMgi!*[EMwzg[]pj' );
define( 'AUTH_SALT',        '+U&r9l=zOv8,17e @c}a!_Al diAB;c9HtivEsI2EA1peMHbW9~iwqBe;Q1#kW;*' );
define( 'SECURE_AUTH_SALT', 'R0$O|!wn`D5Ru$r3qG8)i,smlgq@T5-[E&J;u){~*NW>r7$0W[?^L @?K-^}CPYe' );
define( 'LOGGED_IN_SALT',   '3Vh7u [%jjl7dcREMf).%WSA*0r+[X93Hn2rqWn9*EW-p@3{|x66 &$-CT%35{Q6' );
define( 'NONCE_SALT',       ']WdB)*ABms^7Z/W7@:i*[GKRy6#mfD#oJ_:F+/?@0mUexsn>%hq5U+] &?g9T)OK' );
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