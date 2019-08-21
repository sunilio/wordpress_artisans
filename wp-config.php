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
define( 'AUTH_KEY',         '7<2KokFjzGA <;*/nU^ix70{(hXo)[:{&4}mhmff3M~5U8@in#y?4B^pGG>7nd[_' );
define( 'SECURE_AUTH_KEY',  'HSxRm:BUbGi[jqc8=<ij3}~Nod{f:*?Jx;NiXQD-Do#)cpMf;[eY`BM~qjW-rQ[F' );
define( 'LOGGED_IN_KEY',    'RC!L1mDCojneCR$Z^j:e~BEwi*w^R3NYOO2.E@`W*hU55RT,O)tWyoOtSpXa/7:~' );
define( 'NONCE_KEY',        '(K(FUy.L<#>%8|W}0eG/l-N@lGH4Uyx6+~kcfI^Q?+.yQpL]EU0nCg?:cmqtR<W7' );
define( 'AUTH_SALT',        '+1Xhmi96stvJO1Zr}9g&&w@Ec?PaNzM67Mgx EyXq1@4Rx)|U<Z.WV>nCe91Xm*$' );
define( 'SECURE_AUTH_SALT', '/9!]hl3kFHH39^n^b/gC-eA-Iaw}]MlkN$M+:YqWy=UV_,FRth=:J65wwahZ9^2w' );
define( 'LOGGED_IN_SALT',   'pF*rt+d&xRL;%%XpX45*1%)yi2~J1-9Nna/E2HA{dpmtqD2yHgSg#H%(BS_2i8-]' );
define( 'NONCE_SALT',       'Oaaj5q>Wy./}??D0(Ch`|BA!GRWr`5~v#IbJKHma7t&(E;Z}0r?@ZkP$;NAk/2mj' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
