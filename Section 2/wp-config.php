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
define( 'DB_NAME', 'wordpress_db' );

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
define( 'AUTH_KEY',         'N4!tzVtPOCS2P_OCpoJ8y*9C)&h2w50XXSn[*$H?-xe8@,LSRj_o@&q|s!>O4NV+' );
define( 'SECURE_AUTH_KEY',  'E=]@^m` R[u2Ok)EVD=bx@#<()!C&T bcv0r$DpB=&A?#^1.MM,viFy_D1.-ytv]' );
define( 'LOGGED_IN_KEY',    '-7@6Buc %M7!D`DEM&Cjf-gT]!+~u6JFO+^Yrxo&k:NCE`9)UsD}Tu}|*P$,,}so' );
define( 'NONCE_KEY',        's.>mP9DK+%A|!>oKcd946RwMQsbhfIa -Z~GlO/ps ESI&qYy__8M*MF5?xErW$r' );
define( 'AUTH_SALT',        '3!jr#0%-C,MJNt-_XaxTh7HY5a8`>,!t8xZUM4wJB:L?eb2$uQ+(GvU6O2N4Hlv+' );
define( 'SECURE_AUTH_SALT', '=167bvs]&X4%JAokEUEE&k3yCG+Zk$SE+CtoOwCUUF<]6LPG)HDU##H|XC{5$j8+' );
define( 'LOGGED_IN_SALT',   ';-SBKj7;UvDQUit]+f*w5VmrCydFa^]p:%1ekKYeT>K^>!5A}u!m}~>/1{{i5HxH' );
define( 'NONCE_SALT',       '@GDie?4xr+6VLf$CGvQ&V75QB:wP=IAb4Jn2[=wctp4dg,a.+H+R{wC!=Jl_TKg)' );

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
