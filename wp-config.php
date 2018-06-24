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
define('DB_NAME', 'wgr_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'olm,>6kE;c{c3xoOx@(6i; =P/s}0613krBFuZ<;FZ*j];9q[@8_sd.^%isg,)]*');
define('SECURE_AUTH_KEY',  '2s-T??1-wScH684!6`?EO?2vZf-(5{T4&%xG:{:A3{yp2J)Q2XUwbF(w@g,G Glt');
define('LOGGED_IN_KEY',    '{%%a*CNa#}Brqnb.lgvdR;C=YgxhS);7l-lEy)XxV,i_8E,A+F &sg=|^32w#`DY');
define('NONCE_KEY',        '-.l2H5EoA7pm4au6hS0>r~z_JP5$M3sf8VV1`/e09.iNKW$C`pN(`1uAzP*+R8Um');
define('AUTH_SALT',        'k);i%_Usfd#vEOA]}oo[4LUmv-%M*:hB]$t]$&s{CAsU@PT4R=.9ZC};.D?c`Kn@');
define('SECURE_AUTH_SALT', '~q^?fvKP8l^ F aBO8Jo:vD1o+P=t{vpK#(|Zm9-lT6neO@U:kX-j48ipM<k_*0b');
define('LOGGED_IN_SALT',   '<1u:Vlb7#m](U}-N.V!L^C@t65ZWdG/G^yqW@ki!{al(u~I*!f[$x{w=`q,cAH%$');
define('NONCE_SALT',       '%?L@u/K7+<Y.|u29e=%@a2kG-ty![A#SwK>_82fa0Ntd|I%_/Rn9U/+ZdIq_lTFg');

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
