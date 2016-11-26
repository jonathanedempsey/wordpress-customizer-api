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
define('DB_NAME', 'wordpress_customizer');

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
define('AUTH_KEY',         'yB|Jq-gCj~me~?(SL3H:Xj{jX/wq3Xet]df3VYHfz4MQ-_oH[#;3Ee,#ouzG$92B');
define('SECURE_AUTH_KEY',  'L&v`@I^)F7`4fLRF%]Xt?#`oMHpPZe`1Mx}#zBp.KZ%GoVOex-nO*YciVYGE?Uhw');
define('LOGGED_IN_KEY',    ';Q8m#)Yg0V/z*!8yM9p~/C&1%cO81vdb`3mg6`LKFbp2^@A|MIXVF`sHBI^eq8IF');
define('NONCE_KEY',        'Br#o<XYb$+t@|_KhtPz~~l31krp`B?y^Xswq>C@{W(eUxZE[,I@7[Hs/(B:MsmWp');
define('AUTH_SALT',        'KMCh:LDK.i0G+E0abWU=0$@c 9?DlgJ`>aG;wa*8#8@Tol/yJx^%T mg!W;^ID*w');
define('SECURE_AUTH_SALT', '>.pB0X40]PUs?, A-[^Bb(h8TY4YJ;*z3SaN=X #m6(QOL{nE?YWPB^101fu_Z-d');
define('LOGGED_IN_SALT',   'M)M3BhAJX`,9vi7N`.-N[sX.,zSn4D8pew-fFu#*E2+IR.NZ!)TZo%G9l(c//[~N');
define('NONCE_SALT',       'W|B@ RwLLZiHt4OF%~oI=W&qZg$UM;m4}`Uv[x@&epq8F};8-n$afo|lv=Ir8&x2');

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
