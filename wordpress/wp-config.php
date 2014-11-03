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
define('DB_NAME', 'mysql');

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
define('AUTH_KEY',         'gWY.<1pb9A_u&%TKMQ0X,6Hp(Zk52%>iHptck2i_`H~XXj.lPk%=C!91kn}@Wjj>');
define('SECURE_AUTH_KEY',  'XJm%92Yb.eg*-,[A2/@qfbBk;&N4e~qRNHXDSI)N}[!-bB7<^_n8&i*xaTdtM~)o');
define('LOGGED_IN_KEY',    'X92!SZ+wxaE9i Sf889l`^MFuCjY^^4|{X5zN.kM7jqNTwR#Jpg-P`Udu}wJpX!e');
define('NONCE_KEY',        '[<byys7@oAjD}|y%!2[_2[6yr>Y]gF)S;1fsm&_&uUK@E?x|),cBd!;rMg#CMHpU');
define('AUTH_SALT',        '_AJ3cL7H|{5s#NMn _m>E-t`_3=+j)qx*]{35`}dHPCZF9e[FM8[Q*SK/d1*Ms0J');
define('SECURE_AUTH_SALT', '$hnj[n_mp|icb}95#>+{^aR^T&(w}f:,0Ig)5e/zpcfJVcpz;d#Z$ -Md7{@[{hO');
define('LOGGED_IN_SALT',   'cQ@#?tu>cA{o2+H3Xq{IVou&qrt3)&Vf&^#rrkbbi=Tw)hY+wP{, VDq#UP(:;IR');
define('NONCE_SALT',       '8a0j.u@7lHNtF2?KGQ{/h7?{4fJa[PWwh=*f/<&`~n]@[&bkxd.uaR s?EdwT!*h');

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
