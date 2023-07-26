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
define( 'DB_NAME', 'wp_qwbyz' );

/** MySQL database username */
define( 'DB_USER', 'wp_7pmjz' );

/** MySQL database password */
define( 'DB_PASSWORD', 'e4COnX0^_Ud~#1iw' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'q*X1PE)tto15lq6F0/j*Qe](lk8~9&5~ZX)YWx[#feHA!%8lp]!&AkwX79v6103+');
define('SECURE_AUTH_KEY', 'Kms*1IXyFNwcGLh4Mq5Y~St&|mrNp]xjq:!_9%S73l&K0UUW-02~I3:6-G7#+C/~');
define('LOGGED_IN_KEY', 't@:42n3cc4GJi)(e/zU)_e9QK7pC6H&(#Q[Fo*8[0bAP;K9NR&TF1D|w6ll5l(-s');
define('NONCE_KEY', 'Xv3Ls%953FUEm~v#3(W7(i59)4@:Qpx6geW76XET5rR7kVJ;SZoksjo328@1XuLx');
define('AUTH_SALT', '*U5-U2v7AN22GIv#]4aD9O|shlYG8_)M-~13e&*Hp89Pt66-u;DbgUf/)16~zuJ(');
define('SECURE_AUTH_SALT', '~m:5p|/WJ1Z+-ml;5+/#XpkV)M!p:htFBw2Wej3w2i6(ozs64f093Yma/~5%Y]r+');
define('LOGGED_IN_SALT', 'HH0qeq@O2|F1&&pZQ;;8mIxU2YfHmM_y[2Q9zMCyf*90-5jxGk1~)0pa0_7qbw3#');
define('NONCE_SALT', 'VD~cLX4-4EwEA74QfVh4:3:8-LDn0p9eE2vNiwA8|&66;2HP6V5JDNC6jj+#21MG');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kj5x3_';


define('WP_ALLOW_MULTISITE', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
