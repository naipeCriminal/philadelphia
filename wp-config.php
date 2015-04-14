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
define('DB_NAME', 'philadelphia');

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
define('AUTH_KEY',         'c]lbyZ+Uj[cQ3]YOid@S/TQiYhefc|ksDU.tF2+;$aRHjR<4JCUy|:Kte0<i-[Gq');
define('SECURE_AUTH_KEY',  'UyIW|b)n-zrd`iO>q6JIIlsvat5;4!zr[My]eUP)RrPwm1a8Y0MY^?^kV83LiLMo');
define('LOGGED_IN_KEY',    'jTDzu1/O5^J`S=7F6>9k@|TRn0C11[?9.pMq]4j5eq<T,+uJqzOhHGBlg!GoS1tI');
define('NONCE_KEY',        '{7!7CAv[~UePb-$`?TUC/4at_6)1 VZ+^bdlA(A${ua;6q#o+<kyyAZ(wV?-#`Tn');
define('AUTH_SALT',        'e*xOTBmJc2]~l_6szJ/x;~EC}>xXw@r7}Eab-gbaxw1C3!o9!K@D)#m-uV*^Xd%~');
define('SECURE_AUTH_SALT', '~)yca__7|U`(!uuCd5RYVoq21!#~X,n6a_|(h:u^+h.[<`mk])*?YaCBn0x+C+!o');
define('LOGGED_IN_SALT',   'QnH[3NoH9-?;0:R;|8g;H.fNYJtea|`GHk|w|rkx~_W=r+Y5<>F7Z>KDY87_LCR?');
define('NONCE_SALT',       'T:P`7g0LK5j]-B))Yl/<Z<KS-#2(<@#h kei[DSWR&tp,Q__EU``Seyx+%w3YtpM');

/**#@-*/
define( ‘WP_AUTO_UPDATE_CORE’, false );
// add_filter( 'auto_update_translation', '__return_false' );
 
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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
