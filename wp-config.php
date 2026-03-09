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
define( 'DB_NAME', 'jetro-clone' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'B:`x!Y1$PA#e9h~0DTt`7#4qm0+{5TkU#?5,5PnQO+dRk65lOG:uoHwSDQ4l(O^F' );
define( 'SECURE_AUTH_KEY',  'agpka_6~4x(.4K&]p72{UN8O.@f CL]a41E#iO09l5qF^74{Dx_a8&%r9L*}iOWn' );
define( 'LOGGED_IN_KEY',    ':2zMN`>3ZN|52&ex{uX^[[ J&o*%0-(XsX$Gv.9q!t`]/u{LgUIj#ab3BsKs;OA5' );
define( 'NONCE_KEY',        '1hn/%vt@p2[]F%0U;XDZ@%10tn1TDTUQ2Z`h++p[zbYi3~= zw4nud iV.TZkD-K' );
define( 'AUTH_SALT',        'd-e{h/o0>&ZWg<=ag1Si`>aK[o#{{WV7Vvqy]7:=o ]#-c=)N@o=~<r8P ZnS;@~' );
define( 'SECURE_AUTH_SALT', '+?%}Fvk`@gUqqAwbTP$nlAYm]A<9aqZ^bTuG1x5]ri)fW?|!xn$D7Tc<Z9&#c-_|' );
define( 'LOGGED_IN_SALT',   'cId{Gf9PPa2!l5z!P&pDpG;,UKF1FJ1QIj$`(a@7${xwTYgV:2Ppz!?JWQo$KvX+' );
define( 'NONCE_SALT',       'v7r(a5:*HVPqJ2UBIRRygB1D$C+,O}X~ogP#r/JOBb*54NMe>$9V01`jH65|,K/Y' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
