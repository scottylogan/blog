<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', $_SERVER['RDS_DB_NAME']);

/** MySQL database username */
define('DB_USER', $_SERVER['RDS_USERNAME']);

/** MySQL database password */
define('DB_PASSWORD', $_SERVER['RDS_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $_SERVER['RDS_HOSTNAME']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


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

/** Amazon Web Services plugin setup */

define( 'AWS_ACCESS_KEY_ID', $_SERVER['AWS_ACCESS_KEY_ID'] );
define( 'AWS_SECRET_ACCESS_KEY', $_SERVER['AWS_SECRET_ACCESS_KEY'] );

/** Fix reverse proxy issue */
//if (array_key_exists('HTTP_X_FORWARDED_PROTO', $_SERVER) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
if (   $_SERVER['HTTP_CLOUDFRONT_FORWARDED_PROTO'] == 'https'
    || $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
   $_SERVER['HTTPS'] = 'on';
   $_SERVER['SERVER_PORT'] = 443;
}

/** Enforce SSL connections */
define('FORCE_SSL_LOGIN', true);
define('FORCE_SSL_ADMIN', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
require_once(ABSPATH . 'wp-salts.php');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

