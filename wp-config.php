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
define( 'DB_NAME', 'e-cell-sgsits_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '1zzSyB2<hq:?$f#UN,0U%l1^odj3wQD8%`8o2KdNoRy&iYW3V[$5I/[c=?pMe<HH' );
define( 'SECURE_AUTH_KEY',  'VD({*:[Ag:y-]ZnGd>HM[zTM6C74(GU_Xf/8KM&U!R;t$a{P@,X^U:HEQc?Roo=j' );
define( 'LOGGED_IN_KEY',    'yK*Xwh0O)FF$mV+(^[-2f]SDXh?g4-*jtwN^tI>$auNM9>wD?1q(x&rbA^8J6d9y' );
define( 'NONCE_KEY',        'RT;fQM|_<-RUQ3EZ2MAQvh`=5$1M2MP>u}Ow2XmWofJoU1L4~YjN8INJ2%WZ?!r4' );
define( 'AUTH_SALT',        'Y,/kb<J$M^uWpZ$4l,*@:0,A#;0!n.foR/(,>orUMb$n=6LAMBrG4qmLE<GPVm}Z' );
define( 'SECURE_AUTH_SALT', 'jz$_x.7,u|x1:mS&.j709)ZYP^|n$*Q;(IzF}{13qhkgMzn6asj4oQI0|b}!+MT]' );
define( 'LOGGED_IN_SALT',   '4Mc8=ef|?UJOBWq1%m(%MIJo(9n~0O0jc(BnbSCjRg3+<)0I?Q*8T)ypf#1{lq2O' );
define( 'NONCE_SALT',       'K!kUmE=_?=pc`zjR)Wo%;kg(D|9E{?8:,lp0Am7(dz)ePDza0Tz-P).<l_&noS9&' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
