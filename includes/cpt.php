<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sm_register_student_cpt() {
    $labels = array(
        'name'               => __( 'Sinh viên', 'student-manager' ),
        'singular_name'      => __( 'Sinh viên', 'student-manager' ),
        'add_new'            => __( 'Thêm sinh viên', 'student-manager' ),
        'add_new_item'       => __( 'Thêm sinh viên mới', 'student-manager' ),
        'edit_item'          => __( 'Chỉnh sửa sinh viên', 'student-manager' ),
        'new_item'           => __( 'Sinh viên mới', 'student-manager' ),
        'all_items'          => __( 'Tất cả sinh viên', 'student-manager' ),
        'view_item'          => __( 'Xem sinh viên', 'student-manager' ),
        'search_items'       => __( 'Tìm sinh viên', 'student-manager' ),
        'not_found'          => __( 'Không tìm thấy', 'student-manager' ),
        'not_found_in_trash' => __( 'Không tìm thấy trong thùng rác', 'student-manager' ),
        'menu_name'          => __( 'Sinh viên', 'student-manager' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor' ),
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'sinh-vien' ),
        'menu_icon'          => 'dashicons-welcome-learn-more',
    );

    register_post_type( 'student', $args );
}

add_action( 'init', 'sm_register_student_cpt' );
