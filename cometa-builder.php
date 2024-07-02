<?php
/*
Plugin Name: Cometa Builder
Description: Crie páginas em menos tempo com a Cometa Builder para Elementor!
Version: 1.6
Author: Gedi Caldeira
Author URI: https://www.cometamarketing.com.br
Plugin URI: https://www.cometamarketing.com.br/plugin-cometa-builder
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Enqueue scripts and styles
function cometa_enqueue_scripts() {
    // Only enqueue scripts if Elementor editor is active
    if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
        wp_enqueue_script( 'cometa-sidebar-script', plugin_dir_url( __FILE__ ) . 'cometa-sidebar.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_style( 'cometa-sidebar-style', plugin_dir_url( __FILE__ ) . 'cometa-sidebar.css', array(), '1.0' );
    }
}
add_action( 'elementor/editor/after_enqueue_scripts', 'cometa_enqueue_scripts' );

// Include update checker
require plugin_dir_path(__FILE__) . 'plugin-update-checker-master/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$update_checker = PucFactory::buildUpdateChecker(
    'https://github.com/CometaMarketing/cometa-builder/', // URL do repositório GitHub
    __FILE__,
    'cometa-builder'
);

// Set the branch that contains the stable release.
$update_checker->setBranch('main');

// Optional: If you're using GitHub releases, specify the release assets.
$update_checker->getVcsApi()->enableReleaseAssets();
