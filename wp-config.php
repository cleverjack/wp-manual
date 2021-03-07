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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'q|NL)j7#uNgWdzumJ$p;V/Nj5)p3Jc[W$u*zOu2;ZK1~&PXZ.zg?vvlB8Q1b})u`' );
define( 'SECURE_AUTH_KEY',  '<7)`R31b-E%BtGM}+uY>]cC6,0eyGwY9FqQsq^F=R:81[-T+239rJ4p|XN)YdOlh' );
define( 'LOGGED_IN_KEY',    '1a4~d6RhJ-/XBs>pk_SDlVMK8qK~Miq0tvT/Op4/U6z~};djsz}Y.wT$hYS;K{kk' );
define( 'NONCE_KEY',        'mM<,)7~as]K*n}^cXmZpZw,[ilPP[@Tcb{e]/Lt7Fv><Q4jZiq:#P&gSY=6U9?_Y' );
define( 'AUTH_SALT',        '>.5&y=T/|#+a|me?8TGQ<.@Y;X?qVn&wc_59+eAhy/:O7T?p5/ns1VS7jdJASS}{' );
define( 'SECURE_AUTH_SALT', 'o%K/.&+GB&rfhc&D^f>pPuMMYF7<2eeAw4vhz*-Q=xvd0+K=)Imt%{30bMXV=KK)' );
define( 'LOGGED_IN_SALT',   '=]x][Y3/Plt(TE0mMMZ^iw0z+3E-ep<R`!guC}@|v^U=v(<@4@DX?|w~2R&39z{f' );
define( 'NONCE_SALT',       '6QO%}?l}|,1C-]3nV:.8_)#NfvCh)rO?1*^_;Cxp/0M+I}S$W?3ce|{?P9Dib 1m' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_33kj0kydxg_';

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
