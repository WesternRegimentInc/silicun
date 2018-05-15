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
define('DB_NAME', 'silicun_db');

/** MySQL database username */
define('DB_USER', 'kenny');

/** MySQL database password */
define('DB_PASSWORD', 'REwq$#21');

/** MySQL hostname */
define('DB_HOST', '159.89.237.149');

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
define('AUTH_KEY',         '>,4xtMy!iQQiuu $9wEq&S,/e3UUh}7P*IDX~J/R[U,b01z^677^Xhx]+KC+I}dy');
define('SECURE_AUTH_KEY',  '+OF)+O V|@mni&c3)M_p;,qwplov^W@yiy-jHo[(.x3X/r73lSrR0F`5(A}N]&.R');
define('LOGGED_IN_KEY',    'q_b<98RX,a_T5-.fI$;_#g|y^zip=w4[OMCc25W*<]]5bLhe&@|UV{rjI31$I.Bl');
define('NONCE_KEY',        'A;%b/C::,t#PS^wF[FZS;L MF%Zy2P-zjUwN<;Cpoj(FSdL~uF%`/.L&T}f;eGw-');
define('AUTH_SALT',        'ZH(DG(G#T9yX#k&R@1 t-^_|b`QuaTSw&Y=g:{;qBhst9V<|5|KM2aS(0z0Oev]1');
define('SECURE_AUTH_SALT', 'h?h[`[8=6Mqnm|g*BM3x%B##$GM^<*o.nP-:6PMPrtWL~fa RFPIesC@,#U!b#hh');
define('LOGGED_IN_SALT',   '>#caONe-U1}MqH?w|^~4g9vr7@dY@Z)=:f-EO^vnGS;#h~>J:VF$tPol2cSHXwEL');
define('NONCE_SALT',       'oKJ(3Pe~_a!B6XO~j!arVU.}D;=omPvd;*Ovk(iyW9/+,8vK+g.kv$DW`r~?<sQF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'slc_';

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
