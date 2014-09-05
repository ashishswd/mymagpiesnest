<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mymagpie');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2-<HP|wJQ/T+8Ja@mz#(Ltdhabv.Hq3,9Og,Oqy[+o{D+w4_`x<J9P);nV<y<d4*');
define('SECURE_AUTH_KEY',  '*/9NYfnH4p~KgUQpHq!9s).f`;=C6Yy.esr.4TBuuj|T&TI.3rL^LMG|HMU`-cta');
define('LOGGED_IN_KEY',    'Ya>/twmGiUA|}>vjL{h8wxZ_OY8=Rc|ToFLsY-oV%}5C*BOX->VS=+N-[o#.tOse');
define('NONCE_KEY',        '+U:%b+Xdts.hjvN/|--5pmwHq</sSY7WhPLI-8ll*|+gpT|2RuHoeoN9FN(1>~*9');
define('AUTH_SALT',        'ZUIy+m(NU;_BI$Q<xJr=-/c*2_u?:!92}mLv<2~JjmA{pvIC`a|G{BsLaf/*L3ky');
define('SECURE_AUTH_SALT', '[zh0+<u >WQ@bz5nCe]L61~A;(b|b Qj+G66CZzR}#YL2g/p!C]p`BSDnU+[6K`/');
define('LOGGED_IN_SALT',   'p|A<|{VRF-np^@=d)s-glK^8@i5aaH<3=6-]5m1lCf;xzZs^4p##M/$^nBTr`@)j');
define('NONCE_SALT',       ':-oM<YF8&)9;Q@j@^H2qCMIpt[q&Q`wXyz]Y+B(>z| GVqYo0IK*Jap-+(J+Iqz+');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
