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
define( 'DB_NAME', 'planet_wp_qckyd' );

/** MySQL database username */
define( 'DB_USER', 'planet_wp_yeawv' );

/** MySQL database password */
define( 'DB_PASSWORD', 'qeCAEW0*g1~0NGUU' );

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
define('AUTH_KEY', 'cpL1bNwk7O7i%0|p43hglZj*96Lu@@626i7:(!:#[B!_x2fPSV@88W-a*9&kaxx)');
define('SECURE_AUTH_KEY', '7bB/34Wq@3:TH!)2@#5-U39J@sFju+@2h;g5Z/opv(Bnb2D5:B5D6m5(1XY6L%*9');
define('LOGGED_IN_KEY', '9vv26uY&1;jr0Z|K*4/%d4e#7ko|[s:_;!;0PyyLP1dlr;0/&~2S3WpoupjOy_Q*');
define('NONCE_KEY', 'j)wcg8oc@a]pTDjdH4e#6z_|~K10B|*7D4x0/0TA]Y87&O#(X:;tNF-Wsk)C7QO9');
define('AUTH_SALT', '![cU-e%6GiaoAr5U6ma02z13F1qK50LB(;QNz|T:l@#r7*87Ab4pR9ljqQtWcL(*');
define('SECURE_AUTH_SALT', 'h9)o5:C8O1#-L3@6_]A6M~[38270EZ2q-C7:v+F*P32/m%L|([(94htWPo~9mw*N');
define('LOGGED_IN_SALT', 'CPia)UF4~61v8@y|]Q*ZXSL5/XhIGvsf!2p6VC49&*[_4;+D90V3&vzcHG6Cuk:9');
define('NONCE_SALT', '89:+u5m(nK_4(51Mn-1g[#/7_[]@77led6N13#zh2(6M9;a&L@4Li)GjEL%1G+76');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'xmZETKXqD_';


define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
