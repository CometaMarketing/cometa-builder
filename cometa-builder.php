<?php
/*
Plugin Name: Cometa Builder
Description: Abre uma sidebar com efeito slide no Elementor.
Version: 1.0
Author: Seu Nome
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Enqueue scripts and styles
function cometa_enqueue_scripts() {
    if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
        wp_enqueue_script( 'cometa-sidebar-script', plugin_dir_url( __FILE__ ) . 'cometa-sidebar.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_style( 'cometa-sidebar-style', plugin_dir_url( __FILE__ ) . 'cometa-sidebar.css', array(), '1.0' );
    }
}
add_action( 'wp_enqueue_scripts', 'cometa_enqueue_scripts' );

// Include update checker
require plugin_dir_path(__FILE__) . 'plugin-update-checker/plugin-update-checker.php';
use Puc_v4_Factory;

$update_checker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/CometaMarketing/cometa-builder/', // URL do repositório GitHub
    __FILE__,
    'cometa-builder'
);

// Set the branch that contains the stable release.
$update_checker->setBranch('main');

// Optional: If you're using GitHub releases, specify the release assets.
$update_checker->getVcsApi()->enableReleaseAssets();
