<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u883663312_xgptc' );

/** MySQL database username */
/**define( 'DB_USER', 'u883663312_9xuKz' ); */
define( 'DB_USER', 'root' );

/** MySQL database password */
/**define( 'DB_PASSWORD', 'EPXYThyDn1' ); */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
/** define( 'DB_HOST', 'mysql' ); */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '?AHHXe#xUp|)K[L#-o7WOGA0#y]hyi[`|;9%Uc=|!fg6@<8_cLC Tg/6_YYu~^>r' );
define( 'SECURE_AUTH_KEY',   'sPIfu&e0}-as4^Y.;91wY,m1R*j_#DIP!}!Vs-s}BUJ5_7_{>6PKTo<ic3CvT-e0' );
define( 'LOGGED_IN_KEY',     'g*v!v+7Gi>.2U0k+&+XNYRvK=t6fq9W{PfjKhK3W/_n_tPiV+`@sv(I>/9E+_[Q8' );
define( 'NONCE_KEY',         'opi{*g i+~H<|q:-Y6T=)v#m~P`e&mu[JpV_k(Tkf,I<,HvoEDkrCmQKRVSFqvAS' );
define( 'AUTH_SALT',         '? `3H 8Bv]&lN(l/~+IaXF&OKU-/CE&l^P&3p6AYl1e>Is`H%3Y>ytrLJi~f!7n=' );
define( 'SECURE_AUTH_SALT',  '0|[XSEyTw&!#cM7yuXbTt_i7aMkl8s|4tV4ms=p@:o]$Pr7:h29vKVOE3q]^5vi+' );
define( 'LOGGED_IN_SALT',    '&plj8Hwg|97$LJ/$A53s=iA3;LbAI1A ktv)OcFPAhA`[ n8ZE*>`NJx EML};[#' );
define( 'NONCE_SALT',        'UYvR^1<ld;9RBN-z>A>wzdT6TEAJUGm}~VgblZ:hco@7O(h1geDr?s1<yw$0xh T' );
define( 'WP_CACHE_KEY_SALT', 'N/ERz;(YWy!g+ckk7eJ;B>]4.+2}DUUmD6k)gh%#_,Iq4zG:SOh>%IRp~<j$(NtV' );

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
