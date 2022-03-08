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

define( 'DB_NAME', "u1434073_default" );


/** MySQL database username */

define( 'DB_USER', "u1434073_default" );


/** MySQL database password */

define( 'DB_PASSWORD', "Xk6FX4p1gciy92Q0" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         '9B@S~k[-1<c}?_`qSn[Lw_bov>oRxMyX>ZR=4m&8esuc7iZpunxNe8taeS11m1g>' );

define( 'SECURE_AUTH_KEY',  'kCVid|d]]`jX|t7KL!yz2:Gh:$fU16nF,E4y}K paWc3CeC.35y`AuxHlq~(G=c]' );

define( 'LOGGED_IN_KEY',    '9T^}E9JDSQ&LG1<x7k6^bAY>2MNQWfHqX QKqV@<^N?iyjkzL;D*Y2hq3##[O&OZ' );

define( 'NONCE_KEY',        ':(NNGzLe*uZNXZkbTP<z)DnIdiD`J`CD!IbaHWcP6pJ}j82(6yz[{SKOa!H<:zan' );

define( 'AUTH_SALT',        'jO*[<~05VQVqNG 5^!k)Blhq]LxZl?4=}&Yu8,x}/9LqPkBeGbchN+y;s;Cvxugs' );

define( 'SECURE_AUTH_SALT', '[[)UcZ)^E+=j6Dns%d)c.&u$]-l<&SjZnzRPuyEg^%_-@,oW8u0^g0>]E$Ra-<~}' );

define( 'LOGGED_IN_SALT',   'X o]$)s>+&o1%l{[LtjV{V.j G?3UG8I!S|kq4.iXFSQv;_n3<ujSP<.w@qrCA+%' );

define( 'NONCE_SALT',       'K^Zj(#$d[q~bxGS}$>br53d3g(1w[H!Z/eN%s4]#Ml-U(1#tcK,oc^;qF>gqtqdV' );


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

