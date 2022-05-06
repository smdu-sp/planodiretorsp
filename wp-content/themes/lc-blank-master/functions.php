<?php
/**
 * Functions and definitions.
 *
 * @link https://livecomposerplugin.com/themes/
 *
 * @package LC Blank
 */

// Delcare Header/Footer compatibility.
define( 'DS_LIVE_COMPOSER_HF', true );
define( 'DS_LIVE_COMPOSER_HF_AUTO', false );

// Content Width ( WP requires it and LC uses is to figure out the wrapper width ).
if ( ! isset( $content_width ) ) {
	$content_width = 1180;
}

if ( ! function_exists( 'lct_theme_setup' ) ) {

	/**
	 * Basic theme setup.
	 */
	function lct_theme_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable Post Thumbnails ( Featured Image ).
		add_theme_support( 'post-thumbnails' );

		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );
	}
} add_action( 'after_setup_theme', 'lct_theme_setup' );

/**
 * Load JS and CSS files.
 */
function lct_load_scripts() {

	wp_enqueue_style( 'lct-base-style', get_stylesheet_uri(), array(), '1.0.1' );
	wp_enqueue_script( 'jquery' );

} add_action( 'wp_enqueue_scripts', 'lct_load_scripts' );

if ( ! defined( 'DS_LIVE_COMPOSER_VER' ) ) {

	/**
	 * Admin Notice
	 */
	function lct_notification() {
	?>
		<div class="error">
			<p><?php printf( __( '%sLive Composer%s plugin is %srequired%s and has to be active for this theme to function.', 'lc-blank' ), '<a target="_blank" href="https://wordpress.org/plugins/live-composer-page-builder/">', '</a>', '<strong>', '</strong>' ); ?></p>
		</div>
	<?php }
	add_action( 'admin_notices', 'lct_notification' );
}

/**
 * Proper <title> for header.php - Pass your seperator in header.php. Default: '|'
*/
function lct_title( $sep ) {
	the_title();
	echo ' ' . $sep . ' ';
	bloginfo( 'name ' );
}
// Cadastro e carregamento de estilos
function gerenciamentoDeEstilos() {
	  wp_register_style('agenda-participativa', get_template_directory_uri() . '/css/agenda-participativa.css', array(), '1.0.1', 'all');

	  // Estilos da Home
	  if (is_front_page() || is_page('evento')) {
		wp_enqueue_style('agenda-participativa');
	  }
}

add_action('wp_enqueue_scripts', 'gerenciamentoDeEstilos');

// Funções para comparação de string em PHP < 8
function startsWith($haystack, $needles) {
	foreach ((array) $needles as $needle) {
		if ((string) $needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0) {
			return true;
		}
	}

	return false;
}

function contains($haystack, $needles) {
	foreach ((array) $needles as $needle) {
		if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
			return true;
		}
	}

	return false;
}
// Validação de URL
function validaUrl($url) {
	$path = parse_url($url, PHP_URL_PATH);
	$encoded_path = array_map('urlencode', explode('/', $path));
	$url = str_replace($path, implode('/', $encoded_path), $url);
	if (!filter_var($url, FILTER_VALIDATE_URL)) {
		return false;
	}

	return 	(
				startsWith($url, ['http://', 'https://', 'ftp://']) ||
				startsWith($url, 'mailto:') && !contains($url, '/') && contains($url, '%40')
			) ? true : false;
}
// TODO SHORTCODE
add_shortcode('shortcodeAgendaParticipativa', 'shortcodeAgendaParticipativa');
function shortcodeAgendaParticipativa() {
	
include_once "modulo-agenda-participativa.php";

return ob_get_clean();
}
