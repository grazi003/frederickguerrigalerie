<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'fredguerrigallery' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xh1r:JkKMns .&6G|.~QT*@2`R/Gh{[jhd*C):E:sarc*R$a_+i_xaQva2nxM/dT' );
define( 'SECURE_AUTH_KEY',  'eT|s%SuikkWFU##>?.;ObY:kT{a|CK5j{W(k;-yB<jPMg71HclqVP|4NL.1h_}I.' );
define( 'LOGGED_IN_KEY',    '8nT:-%2a0le8zO{kp;^M,lV{5?gG7b&R@1(Pc8;*<N$B(&ym6-Ezj|r%vE;6yt3%' );
define( 'NONCE_KEY',        '%y@l;`zBDE=AR{VEs=}F|q#qj(KdQD4:lZ_A+0/8%$<t<Y!FQ zR(]rx?OZ$(H3q' );
define( 'AUTH_SALT',        'hzHaZoSrUikyB*twV<(jXMO7iA?%Xd}Np4N{Ve<L1Ea)mP>KUS}u]3v5=t#V:j>R' );
define( 'SECURE_AUTH_SALT', '5FvFxC,GO,]<-U;L{DI7C^m9vJb{$t+4xe,lf0V5L,[30Bb>W}2D_aHz..fK2^E9' );
define( 'LOGGED_IN_SALT',   ':*}xS]Cp<j}/-xH+tE;yH)qQ[1X}6^$&y#(LX/aSQrSO#BqD$Y/P&cQA -Zxp!S1' );
define( 'NONCE_SALT',       '_gu#:&p]2A}GXK{k,{sM?[%*KP+Ic}Z>;t$A$yHT)0}V[PP^12FP@BfF]l|C0/-o' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );   // 5.2
define( 'WP_DEBUG', true );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

//define('CONCATENATE_SCRIPTS', false);
