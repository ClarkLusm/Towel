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
define('DB_NAME', 'towel');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

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
define('AUTH_KEY',         'e; }3Dtn=,}D!NG;tKVh4=0.Nmy8!ih!YcTrA5tMKCr)hyy_RznPCO?koBHV589G');
define('SECURE_AUTH_KEY',  'Sg]|$kyOvl0[,Yk+mTG|q|im3]u=PR|WvI2zO/sY5@xw{/%}(,b=slEEc5,@D/!m');
define('LOGGED_IN_KEY',    'ico]^izA677%;@6:hY0cbw2uba$c$DNr};5A-NxXV7)yW)P@KKV<p. h@p-Zd-#k');
define('NONCE_KEY',        'vrG@qFi6[1C~&PbZ|A:[#G7jjH!pJ;csu_-nU&]kbLt,;n|^}:<T[A.P&IgzvL:S');
define('AUTH_SALT',        '}L-L$LxZS48]OFppNMvK=?8Zr[8yPp5!0kRB`wns:PHHB15e2jzkhZ9-ZqO+oFJi');
define('SECURE_AUTH_SALT', ')hs*D|73gYkI<QbxN^G{JE8EBv?HcRD6uW2xN*JZ6Y8`W%)Hp(sA!wo-!P0/S.6d');
define('LOGGED_IN_SALT',   '}7Jqj[6Bf m`,I#kmvVP&9PfrQ-bp*f!n|$)c.OQ{6vz3J|trz>9$Pmlet-Yq~ww');
define('NONCE_SALT',       '*0o/gNX{aOw^PK%(_M30rBnl8rQ~NLm@7@z$v`Tm&iY,/AX1{lm4`e.nZRv#y}_O');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
