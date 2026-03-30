<?php
/**
 * Plugin Name: Student Manager
 * Description: Quản lý Sinh viên — Custom Post Type, Meta Boxes, Shortcode [danh_sach_sinh_vien]
 * Version: 1.0
 * Author: Student
 * Text Domain: student-manager
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'SM_PLUGIN_DIR' ) ) {
    define( 'SM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'SM_PLUGIN_URL' ) ) {
    define( 'SM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

require_once SM_PLUGIN_DIR . 'includes/cpt.php';
require_once SM_PLUGIN_DIR . 'includes/meta-boxes.php';
require_once SM_PLUGIN_DIR . 'includes/shortcode.php';
