<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u757767753_dqztm' );

/** Database username */
define( 'DB_USER', 'u757767753_hmvpM' );

/** Database password */
define( 'DB_PASSWORD', 'YNv03hYrUi' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'W%JTxQE.ZXJX3*cNL%}H%K>BkiJ}hipS69 lzm__wlw2rH$C=ZG~SJ{JZ(QKsYo2' );
define( 'SECURE_AUTH_KEY',   'Y?LfZQS),#m@Ao>ntw@8gmbC54YN}G/D0bey{DJTC?IMi1GR2$rE/Luh=T>1HFSn' );
define( 'LOGGED_IN_KEY',     'm8->,xheb-D#J>k36: 1#+gw4Jix|{oTVY75<O[u1{[ $YB]8qo1g]wHb+|GDO$N' );
define( 'NONCE_KEY',         'OP6,CFzr.v^(pb;iL{p^ut#lJJ c7*0)S]K9I$xw>ERkrgFc+,g${1Ct7JoZg@?~' );
define( 'AUTH_SALT',         'x_?aLT%tg^p&}<lGRhI$)hD&P)h#L>eZxAR:RTq?[C}OekZCkD%/~@*0`kY|fd&,' );
define( 'SECURE_AUTH_SALT',  '+4^/ 5GlJw>~M#[OtdSG-H_1[3Ji%QC[3Wf.`IR:S}u:a+#BylKJ,bkX({3O$5uT' );
define( 'LOGGED_IN_SALT',    'xX+TX)i5GgJ:uDs+{?gDNbvhTMkn ia9S ViUcmoa,$-*hj3z_[n.PM1x^<l6DJ%' );
define( 'NONCE_SALT',        '4J;yT=6>fXu}vW:P[DIj6?iz%u-Fk9=ZC.@+7}~:S,LQTXB:-%_%rYLm}kiY#3<J' );
define( 'WP_CACHE_KEY_SALT', 'Uul3N,sKH2+PF?wzSO8@9SnhxQ0}&G^]c3^<-8^3ZKdG MnARV4~KG~bLT?|w]SF' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
