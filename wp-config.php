<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sst');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'x.XJTvq2))z_iep&p*:NBz-:51h@g>!VWWQZ+o~_VkzmC%wCZ%n8|]`,vM{-T>X@');
define('SECURE_AUTH_KEY',  'dRY+2|n;eLHCqxKzU(lEJ=9{W%h^5|ll} t*,T0R6an}-FqT`~`y*(Ip&tSOp;_~');
define('LOGGED_IN_KEY',    'SOb+AS[++vQbt#^>`dcj0IioT~y8&%JHOGQ9zj/`!Ze GMhR_,KO6i~sfOrfyqP,');
define('NONCE_KEY',        'R*]sx<*Nu{-#vS`vM9(|^tE(*a_p:ZS6)<N<Q/j=:/$%di# +AJKc+G-0hkP*1:u');
define('AUTH_SALT',        'hnn-/pK@di@hX8me>^h1p2`!!LuTIAxf!u>@;2}Q|--x};eD|sfGiNx^%vRkD]m)');
define('SECURE_AUTH_SALT', '(iN|z&2jmbx|j?MQk[NcNM>*nX-V3>zB0GvkdrzZ1W/*&45jHY}p&tY@}X[>4mef');
define('LOGGED_IN_SALT',   'O5iyV<N-j*}Sx!i!r@l%h@ DX,Xl|owqt{@?Qqb?Sm0>3#B-bS0odr-`N!|L5fRF');
define('NONCE_SALT',       'a1p9 %]}Qu7}:ILyG&kb/xp.f-Z>|}zvQV+3QEtdpKX*WfS#=@h(E<ndu(ca5X|%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
