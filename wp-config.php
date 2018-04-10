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
define('DB_NAME', 'shiro');

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
 define('AUTH_KEY',         'w1uVcY^|9tZtzt8yFSR16U,Pk0etJ/rp^/c~X*hI%K5_>:ozkCk}i[2LfPgY13ho');
 define('SECURE_AUTH_KEY',  'g69vs9U.e{@GlN^Ke6:MxlT;IBDk#rxr,`Y]xf%_w+dx`7vadl!%2`Sp+s|{rWuv');
 define('LOGGED_IN_KEY',    ']L/!za8a-4&Nv*dFh.3|E7W95rMmTX]YisP-9xe<W`zZz)82zf)iM&ElQY{X3+$@');
 define('NONCE_KEY',        '))#,=y@SQN3vHe+yZ0]Q!-E2FFQ[i{ |+s@?1`:~h%%&qGW@If6x$/yHHlLQyI~P');
 define('AUTH_SALT',        '0V-/Y1/QWI{b@;;Da.*_D#@xswhhgYFa%O0Kvp=uuC8T?&2V`F$TAbmJ >U1E5|s');
 define('SECURE_AUTH_SALT', 's`F`d$eiXCG)|CIoqulCLm&-]8bt>5CCZTfLC+Pv7D,( ;pG:[b22?4K3c;>9-f{');
 define('LOGGED_IN_SALT',   '.=B3A*-ocdx,Q--`4F!(#BS3g|GrblAtfa%OTKW!~3(lmsF[-xzIBPUig-YuDcCd');
 define('NONCE_SALT',       '!)R9D`5: qL*=6y `P`uSQ;[t(j5^Hjg/QS_{i-)efzg0sU48!~E%P>|y;%5lI@+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'shiro_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
