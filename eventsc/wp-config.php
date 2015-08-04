<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'eventsc');

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
define('AUTH_KEY',         'gorxiug@s4Pg5LNM_ybb@3),A c<m&^:cMNP-Xz*OET|z?.]|&FtGrLvN3bO?48g');
define('SECURE_AUTH_KEY',  '&4`uTF92rmS9QA^. ~<*tHdAOMh~kSc/3Jk&.@nFOg58taJ-$|_Jaf}pM5>7$|<L');
define('LOGGED_IN_KEY',    '!s4!-z5:|X_dO?/boGmWM1$p|HS&Gk8}K)-u}|Qn}&K[$pudKMubq8G|fklBN?O5');
define('NONCE_KEY',        '~-<Bo#P)092DGB}]JhROE%&q-B&?C>]0dG%p0|I)PcH-Q/d=Z1SG/o-;)T_+gu}d');
define('AUTH_SALT',        'w:j]X^wCGotIEB]Bh:j,B+rHd_(`n##F};gy{Z:meT+jhe+Ot{Mq6PxBgU?+vNHg');
define('SECURE_AUTH_SALT', '#`PgR^zE`dZ[6Mupyk,*6b4BCsvGjD*(:T6FTC=b|PM*Xqn0E_C9pJK!m ,|`Oof');
define('LOGGED_IN_SALT',   'HAj!fY%+--}TVO(YNbb#p+_YKn@W>3HF5x88HNC>M$2zK,!,Ga4RFzdIuI[;~%y0');
define('NONCE_SALT',       '%+a*+D,x)/?U.Xl;OK-MYz!M<TzxvoT 4Kc$[iR*b6B0ynxC*S/?&_wObf*I`HbM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
