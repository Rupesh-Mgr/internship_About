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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

// define( 'DB_NAME', 'newwp' );

// /** Database username */
// define( 'DB_USER', 'root' );

// /** Database password */
// define( 'DB_PASSWORD', '' );

// /** Database hostname */
// define( 'DB_HOST', '127.0.0.1' );

// /** Database charset to use in creating database tables. */
// define( 'DB_CHARSET', 'utf8mb4' );

// /** The database collate type. Don't change this if in doubt. */
// define( 'DB_COLLATE', '' );


define( 'DB_NAME', 'Pandora_shop' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


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
define( 'AUTH_KEY',         '1(ri?[_L.!#sS_;fWwW;xSy1:*KYxqF;XCs`Ged`~vy ?ig.A$qTjqfH{yl,*,51' );
define( 'SECURE_AUTH_KEY',  '$A!iWw%TH_Edz#[=fuQai{f>E*-Fp^|,1$y<m@Nt8XEAt#2X(P1U_W73>:7`.Jyu' );
define( 'LOGGED_IN_KEY',    '?{rE=]:_]jczTP0rA;qaLEWWJYVTT(&+vIG*/GYn;5>UQpvdDF?jj:_Q$PjX~D(6' );
define( 'NONCE_KEY',        '(l=!U_Wa|Ua!4/6caQBQ3bQ,nbI`%5EY/dcv#y>;[bZ2kF_P_Ar$r|lO$7r.EId;' );
define( 'AUTH_SALT',        'mq>?m4rlc@{zBGE6+I.sl&/f]RwYsrnV[ sN6n3U][hj:FW{#Z}cbFv,:Pbq0.Es' );
define( 'SECURE_AUTH_SALT', '1H+Xk&M;RI|i<Z5;KER<Q293r, kqWU5NRB`tKKq8KD3bhi_iH<QGb]o!}`ufJZR' );
define( 'LOGGED_IN_SALT',   ' Xb1+r/JFi4N]>mFq_a:rysxJ~$x>[veZ9pAcG>#U64L,IfUvT}]/_s{h9gM;Ch]' );
define( 'NONCE_SALT',       'S,@c?|]DR8ATI)c<9brL5T;V.LGxD#| {<7w5]x#6ZOO2v@`fEfa_{*Ea/[]qR;J' );

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
$table_prefix = 'wp';

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
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
