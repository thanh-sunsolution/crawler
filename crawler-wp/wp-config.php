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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'crawler-wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`K2W5?K:{_u-qtyT!*=^bg$3 ]}coid7PqJes|o4In~M`Y@4y{{)XgX}1Lm,`wq(' );
define( 'SECURE_AUTH_KEY',  'p hj(3b6C,s3T-rU+PL]+&6<wE4*F;$)u0T, QCPbAshQU&k*wo3J:j*WmoV~E~j' );
define( 'LOGGED_IN_KEY',    'G3fe{?>A0W59?lnTn c/vouB_LXTh:J]LF6l-ShPz#CXTs:0h DmZ-J2_4_yH]H(' );
define( 'NONCE_KEY',        '_w~-ui)g$R:(Q.}KC3Q>:5nS9Zf*/UI:IL1>cuz.~QV,yz[|r#aFmy]:e/A#]WhB' );
define( 'AUTH_SALT',        'knrD~x-Yw<`G)yO{6h0S32>[!pg55;QaK}?}yG{y/n8zokQ,Y!&*}|XMdSa[VxOE' );
define( 'SECURE_AUTH_SALT', '%n2-*jq?ba6<,24YFDXHZ]@!jBy8[oxCq?YVm!W*2;}NXdzi9>/T{`w~8flc>v*`' );
define( 'LOGGED_IN_SALT',   'kGjfBEA;?Jb(Kf976U$92&ZRr()Zp_=W(qc1flsy@!-~L{*NMG#FfVEj1dZ+{I3_' );
define( 'NONCE_SALT',       'f[fmVq_.`)y4x}xneA|}aU}6(Le;ZJS<dE_1oodbUpc8w9vO6$nV5NFc=t?EO~fy' );

/**#@-*/

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
