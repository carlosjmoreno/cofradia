<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cofradia' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '.n?4XOe;Q3=`:cq7U{+-oMHNR|`+nt@F;)b^-Hb,RkCR6?Xt}bF`%{%pveD5Lxzq' );
define( 'SECURE_AUTH_KEY',  'I;P|*ghu:3izS=Om]xd`x#$j0Ee)W!aNljY^F$)cv_S8/A !@cT;1j@E;Lv;F6n0' );
define( 'LOGGED_IN_KEY',    'Q)C]E,2~1iaF>G{fxo#jlBWW1pn!X}y6}:@Y1;QCRkUC3A/J4d=QSWYm<*CU4PTB' );
define( 'NONCE_KEY',        '_$aX[*w:11yJGnzb0v(}F`;8Xa2gJ>w.>,}je8__[fhG=rxd E@em17@cevi2+)F' );
define( 'AUTH_SALT',        '@+^EAw*Fhi~)I~ -13B>G<o5&=:F9; L(%PcJqLd,bWwr0JD%^f%Mv_-]2ru9$<6' );
define( 'SECURE_AUTH_SALT', 'MXxUaGCpTNM#J)_.#yss]Z5 k]4kFeYj[^iEV%B(-1%.6[,Y)yV`#Y,yoH]YYm1&' );
define( 'LOGGED_IN_SALT',   '>*Z8|d6:%7.w1~{!6HjDXwk]FT*{H_V*VSsW$o7?GFz|-Gi@W.!*XFj_Asak_v?$' );
define( 'NONCE_SALT',       '}$bkb2HC>ysZ]9:.!*&y-OrWu+jig-Ebe<ostW>(Jm[45QA^*q/FT0 #i`4T[K .' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cofra_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
