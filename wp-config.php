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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_cxbladder');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(>?0bFB37@$&w[KBc>:;uD@.a&t9i+o^%Kf|:Xft)ib]UiuEr=)Y#1XtJ]> JAYF');
define('SECURE_AUTH_KEY',  'y;4fXK~Df2X4~H0BUVsNep[jieU8kmjK@xE5[MrA@:H_r$?~tVR7l:{TsxF93p0S');
define('LOGGED_IN_KEY',    'L+xm8bk #E2/hSC[7>TBK&z@=?TOY1(t7B)dILwVG+3PT(&@`/(b(Xb*;<}IcyCO');
define('NONCE_KEY',        'R@vr`Iq,=t9aqf,).^mhcEr[wn|*;vdp^W=rdwal(zF!Q=Fw}%Gc*`kd^H]]0;}I');
define('AUTH_SALT',        'GG4twa#)o:A|(7B=:TF?e3`WI.@8bGn`RXa;&8irvPc!ITp9gI#Dpe d?pLGe&_E');
define('SECURE_AUTH_SALT', '.J 7oMAqtx;d;5JQgW3P|_8N3>N)T$^SU+9T?)K%:N@g1y<RD99N+[$}fL#=-$_[');
define('LOGGED_IN_SALT',   'SMD<N1Z A5~[,#K{}Je|Bq`H*IiXr_m-[fxM;!;4{b3-Y`g|% 5d7ExPx-oDepOa');
define('NONCE_SALT',       'N*;;h{@e^t@;prT q:6x?,*}P)R#zm?LZ4&TJ-J~s.)?Xg*&}Zc),Kz[&([B!E&F');

define('WP_HOME','http://dev.cxbladder.com.au');
define('WP_SITEURL','http://dev.cxbladder.com.au');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
