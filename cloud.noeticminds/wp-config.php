<?php
define( 'WP_CACHE', false /* Modified by NitroPack */ );

//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'N8DJI0yca5AgRSf0fd5WmuwRXgw9nuhrz5HPQFuoK2uAU0Le3z3sZnpjqiGlls51');
//END Really Simple Security key



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
define( 'DB_NAME', 'cloud_noetic' );

/** Database username */
define( 'DB_USER', 'cloud_noetic' );

/** Database password */
define( 'DB_PASSWORD', '3avLWguQJ0rPi5iB' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         '8fpazng6yckylakyfghm1zml1xnqjxppz6rjphizp3trujkdrwgsjn3ieokc45nt' );
define( 'SECURE_AUTH_KEY',  'hyi6a791ytdwsglkugufitcslibnscotrkv3l3efl9hmqxc64alqnxy8qvgupsv3' );
define( 'LOGGED_IN_KEY',    '5ylgbnexkgrtafw2wozkzo3wddhvzdmuwrtnw4czvzjnmmwxglyzdsi1bi734aox' );
define( 'NONCE_KEY',        '00v3bhwfd8aslrjgjgmekutu8jfyugawgqebyjuu8n1az15ha0zeepjnocyx7bhe' );
define( 'AUTH_SALT',        'fveozapnz3wjamfractvtxkjsjwcrxvaiwp7tcqftf6iwczppvwpxtg3ffz2ragc' );
define( 'SECURE_AUTH_SALT', 'v9kfwslfgpfsqx2ylw49hgikjfmwgjjbxs5mssv41ayg9ekdvgm4g0yi0mrmtjsa' );
define( 'LOGGED_IN_SALT',   'mrjqzyp7ht1l7tarpodwbwheailk6x1xapixnjozpdolzctapau2qhckgxa6mr77' );
define( 'NONCE_SALT',       'lwjhjpwwbnrb0yljrqk3ei1d5e7nldewsuohqfgv9v099a3k6cnremtiwebrzn1g' );

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
$table_prefix = 'wpnn_';

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
