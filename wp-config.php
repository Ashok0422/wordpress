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


$env = getenv('APP_ENV') ?: 'prod'; // default to prod

$config = include __DIR__ . "/db.$env.php";
// require 'config.php';

// $config = require "/db.$env.php";

error_log("💡 Loaded ENV: " . getenv('APP_ENV'));

// Use $config['host'], etc.
define('DB_NAME', $config['database']);
define('DB_USER', $config['username']);
define('DB_PASSWORD', $config['password']);
define('DB_HOST', $config['host']);


// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define( 'DB_NAME', 'wordpress_local' );

/** Database username */
//define( 'DB_USER', 'root' );

/** Database password */
//define( 'DB_PASSWORD', '' );

/** Database hostname */
//define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
//define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
//define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '#LPAQ3kQK_J%GL~)*kirj>ApKSv%$4s8_!^D726?kkCYwbE5(MVZEaaN?FynBM;#' );
define( 'SECURE_AUTH_KEY',  'lg/C4@L 7x+EW16XMcnb#$nckd{MvWR)|=J<O0yRAz!l>4&n{]9YVn L=ZS{D/%<' );
define( 'LOGGED_IN_KEY',    '@,9u.A:rg;&P*+C!_~YX2Qo-dCRnzo!{6&8Y8W,m@o& 3])i0$H-VbEnspBH @z.' );
define( 'NONCE_KEY',        '7_t*;M)0K`4~;O$#mBV4dTzb W$qM @L#6Ep+ti<TA1C#Ykubw6vR<2x76yU/2Nc' );
define( 'AUTH_SALT',        'fh-`c/uJ{p`Jw+X<THjbK);Yx,ie9_den5f6US/:!S+GhyijN?BDChQbZ%O_R*?b' );
define( 'SECURE_AUTH_SALT', 'W+B7+TZO#`5m9q(-26fFC7<5CW>-7$C+sN$.20nS;YB_CsggJSRg}T&LZ~lAZ,u-' );
define( 'LOGGED_IN_SALT',   'lXNW=~)lrMZ|t.PR^ecK.Zll|(-Ax^y*_OKy{~?wM}%$ZXJ8d!fP/puR_1.<FcKM' );
define( 'NONCE_SALT',       'mDV^ZT/[Bxc.sk4[$K*on]8R%`-CK+%I3K(oU}!v8xaNw/h%[RvE1WfYOo=00=43' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
// define( 'WP_DEBUG', false );

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true); // Set to false on production
@ini_set('display_errors', 1);


/* Add any custom values between this line and the "stop editing" line. */

define('WP_HOME', 'http://localhost:8000/wordpress');
define('WP_SITEURL', 'http://localhost:8000/wordpress');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
