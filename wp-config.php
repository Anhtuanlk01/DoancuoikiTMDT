<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'o8gafmw2061k_vgfood' );

/** Database username */
define( 'DB_USER', 'o8gafmw2061k_admin1' );

/** Database password */
define( 'DB_PASSWORD', 'bh$GtBJeZzrg' );

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
define( 'AUTH_KEY',         'n* i%-1S9w~$$%n3/^ho.zG{8U`Il~u,;.L>~D[1fUX>^s8!ks#(lE rVOQ;Ix.D' );
define( 'SECURE_AUTH_KEY',  ' /3zD$1z/R.I}z#Niax%caT&.^?e}U}HsUE!&m@.P4Q/$ar_PclWuHwUmyeIaXxP' );
define( 'LOGGED_IN_KEY',    '+IB07jIjfHtAslFwySX9E{YQ[7%o35I=svV}%v0##DlnTWEeB8u[))ST_F/7b8(E' );
define( 'NONCE_KEY',        '~-Z%<E|+KJhpTOUwY]VQoKGUg*ETQ3#}<-Pv_tN/`{1m>}Azk!9$+_GsT+E`3{[u' );
define( 'AUTH_SALT',        '{GC^RXe:beQJCw+G7o#!fp4L-4^)!@>tzg|$4@%D&.~u-Z5U_>uSYD)opgO`=rcy' );
define( 'SECURE_AUTH_SALT', 'lcxU;^e|;eJ7PZ]ua,K?Y*q?r$s4KF@}]/9REj `z+nb95~Uk<r;,Mk9R!@:wx.v' );
define( 'LOGGED_IN_SALT',   'R~ZV@7B&hQtZ8xMW^?s/d%m=6HkmPntb{yuoV5&D;q>Quw g>uzM:<:F={LFb1rO' );
define( 'NONCE_SALT',       'k]evD}i=u%K<mgkyG*a$8jD_Q`?JXoqK4xI;T.pKl3:Q7So[KTnq|9,NCJz;Kuvi' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
