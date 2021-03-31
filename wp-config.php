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
define( 'AUTH_KEY',         '-L7+>a+G=p[YqdRWjB4|?X`{De<epg(3c:vCbUf-J$peCxG]>1Dw&UKE8D!ck~#Z' );
define( 'SECURE_AUTH_KEY',  'p2~G2&-)Q(q?$46BnrUeX=RtgXmT(sQZX]efY,-~Q4`T{w9/#FL@{#8NWcb;jtVt' );
define( 'LOGGED_IN_KEY',    'k*C4R&a`11r})oNW{ocAt%rqoDNt%(Dj1?N[pZvb9.vVH@Jt=ve0Z_=!EXL!.uk/' );
define( 'NONCE_KEY',        'PMS*Yj+cUbyGP24Y9X{!HW[20@Wx _=Gzq}vp>*fllO*iCdXQot@HFPoFN)R~KXu' );
define( 'AUTH_SALT',        'f>1Q^[[=M0_XB_G4C8heV@.aNEnQjULws{2xd%jT6%Y(wUH]UZ6du<wDcF8dc@)J' );
define( 'SECURE_AUTH_SALT', 'upnk/Qr3SYlmV5}OgiDk$KXu#s)*!wllCsKTPh#avpRI$BnK[=M7}ii6R[1m:sWt' );
define( 'LOGGED_IN_SALT',   '8`fk4&Y&Wy`RIDD?iby{7Li~-6>-m-:c`XC[,?DGg$;QCng|Nvu/vg}IDnd!0?J+' );
define( 'NONCE_SALT',       'Pke[6i <BY4A4S9mSZZoAo:1k0LGD(nh/{F(Q28X?tn4to_j|o#:?Zq~#2@1jFc ' );

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
