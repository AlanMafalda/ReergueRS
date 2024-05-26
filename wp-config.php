<?php
/**
 * Configurações básicas do WordPress
 *
 * Este arquivo é usado durante a instalação. Você pode copiá-lo para "wp-config.php"
 * e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * Idioma
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode obter essas informações do seu provedor de hospedagem ** //
/** Nome do banco de dados do WordPress */
define( 'DB_NAME', 'u757767753_dqztm' );

/** Usuário do banco de dados */
define( 'DB_USER', 'u757767753_hmvpM' );

/** Senha do banco de dados */
define( 'DB_PASSWORD', 'YNv03hYrUi' );

/** Nome do host do banco de dados */
define( 'DB_HOST', '127.0.0.1' );

/** Charset do banco de dados a ser usado na criação das tabelas do banco de dados. */
define( 'DB_CHARSET', 'utf8' );

/** O tipo de collation do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para uma frase única!
 * Você pode gerar essas chaves usando {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * Alterar essas chaves invalidará todos os cookies existentes. Isso forçará todos os usuários a se logarem novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'W%JTxQE.ZXJX3*cNL%}H%K>BkiJ}hipS69 lzm__wlw2rH$C=ZG~SJ{JZ(QKsYo2' );
define( 'SECURE_AUTH_KEY', 'Y?LfZQS),#m@Ao>ntw@8gmbC54YN}G/D0bey{DJTC?IMi1GR2$rE/Luh=T>1HFSn' );
define( 'LOGGED_IN_KEY', 'm8->,xheb-D#J>k36: 1#+gw4Jix|{oTVY75<O[u1{[ $YB]8qo1g]wHb+|GDO$N' );
define( 'NONCE_KEY', 'OP6,CFzr.v^(pb;iL{p^ut#lJJ c7*0)S]K9I$xw>ERkrgFc+,g${1Ct7JoZg@?~' );
define( 'AUTH_SALT', 'x_?aLT%tg^p&}<lGRhI$)hD&P)h#L>eZxAR:RTq?[C}OekZCkD%/~@*0`kY|fd&,' );
define( 'SECURE_AUTH_SALT', '+4^/ 5GlJw>~M#[OtdSG-H_1[3Ji%QC[3Wf.`IR:S}u:a+#BylKJ,bkX({3O$5uT' );
define( 'LOGGED_IN_SALT', 'xX+TX)i5GgJ:uDs+{?gDNbvhTMkn ia9S ViUcmoa,$-*hj3z_[n.PM1x^<l6DJ%' );
define( 'NONCE_SALT', '4J;yT=6>fXu}vW:P[DIj6?iz%u-Fk9=ZC.@+7}~:S,LQTXB:-%_%rYLm}kiY#3<J' );
define( 'WP_CACHE_KEY_SALT', 'Uul3N,sKH2+PF?wzSO8@9SnhxQ0}&G^]c3^<-8^3ZKdG MnARV4~KG~bLT?|w]SF' );
/**#@-*/

/** URL do WordPress */
define( 'WP_HOME', 'https://reerguers.com.br' );
define( 'WP_SITEURL', 'https://reerguers.com.br' );

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der um prefixo único para cada instalação.
 * Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/* Adicione qualquer valor personalizado entre esta linha e a "pare de editar". */


/**
 * Para desenvolvedores: modo de depuração do WordPress.
 *
 * Altere isso para true para habilitar a exibição de avisos durante o desenvolvimento.
 * É altamente recomendado que os desenvolvedores de plugins e temas usem WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para obter informações sobre outras constantes que podem ser usadas para depuração,
 * visite a documentação.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

/* Isso é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis do WordPress e inclui os arquivos. */
require_once ABSPATH . 'wp-settings.php';
