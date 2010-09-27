<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('WP_CACHE', true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'patoeuge_novedades');

/** MySQL database username */
define('DB_USER', 'patoeuge_novedad');

/** MySQL database password */
define('DB_PASSWORD', 'PatoEuge2010');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',        '+=OtI:[REg+MFqv|v !|_h~p-Rw{u.Y$r:4B8KV*a7ezD-/ZR_#hk={Ao0(d8uf9');
define('SECURE_AUTH_KEY', '<]oU4I67Woe@Bl8Tm`qS5*,o$7|Y#YxYBRIm|;U,A$.UC%+#a/#%fG~[|4u+{-7I');
define('LOGGED_IN_KEY',   'Y+=rb!@iX_jO4z%e`,C_NH-%+|h`n|@tGs6ki-x1l|ks,y!x--*o*p5 1YMFfIOv');
define('NONCE_KEY',       '*_>sunzH/@di&+R0|~)Yl5i>x2LZIlap*cd/|a(!BJ{{-)e+uA!bF>W4(|*iq+Ji');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'es_ES');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
