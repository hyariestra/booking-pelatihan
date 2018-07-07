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
define('DB_NAME', 'bumdes_asli');

/** MySQL database username */
define('DB_USER', 'bumdes_db');

/** MySQL database password */
define('DB_PASSWORD', '4W?&m2@hv~xU');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

//define('WP_ALLOW_REPAIR', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'B.o@@#^&{sL_e!}uXG+/qLO3g=.Bm]IEh:nuE0:n)9&FXYsE$2[8:9@(1soU5#HV');
define('SECURE_AUTH_KEY',  'pKtQ:sCf/(Znyb{lOdA~za*US0O8O(wL]d2qUWTl:Tw&Tmoa9M5KnbBr[&t_^}=9');
define('LOGGED_IN_KEY',    '_{n%zc=CZ;leCO?qnc*$pEt{xUuFCR,f4*#G [Z_.uxS6~{KnYXwGT 6!2[?mfT9');
define('NONCE_KEY',        'c]S2kMIgBu4K~${.l?U&bTbr-;.?N=7v%HURQja8f^_[GVo>.()8EgCsYO6,/ZKu');
define('AUTH_SALT',        'ge7Eme0}(L&Mt_~:O*H&QTRbeg7Hln_f)l55hh^.NXa|en{]nEf7}@Y(+8w@Tmkn');
define('SECURE_AUTH_SALT', 'l[dUp`w*z>G.=]vG*LNE!h.WJ*B;j3:zSkzSZ9!)1P*5uZ8HIDpm0=z1z{7w09}A');
define('LOGGED_IN_SALT',   'c|LC hxRp[KW*=%(E%)|cN|Wwxwtq6B,V2!LBx(;MoRi!EeWY2drf AQl;UubkKD');
define('NONCE_SALT',       'G/|t1- (Tm R gr<3f@O,C9@/Y8@S lG@O5<|@;%q$+a][Rbx))FK@w/GA<2X&OS');
define('JETPACK_IP_ADDRESS_OK', '111.68.26.254');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);
/* Script Function Multisite Wordpress */
define('WP_ALLOW_MULTISITE', true);
/* Script Function Multisite Wordpress */

/* Define Multi site */

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'bumdes.id');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
