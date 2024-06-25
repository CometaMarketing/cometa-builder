<?php
/*
Plugin Name: Cometa Builder
Description: Crie páginas em menor tempor!
Version: 1.0
Author: Cometa Marketing
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
