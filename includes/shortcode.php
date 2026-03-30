<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sm_enqueue_assets() {
    wp_register_style( 'sm-styles', SM_PLUGIN_URL . 'assets/css/style.css', array(), '1.0' );
}

add_action( 'wp_enqueue_scripts', 'sm_enqueue_assets' );

function sm_student_list_shortcode( $atts ) {
    wp_enqueue_style( 'sm-styles' );

    $args = array(
        'post_type'      => 'student',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    );

    $students = get_posts( $args );

    if ( empty( $students ) ) {
        return '<p>Chưa có sinh viên nào.</p>';
    }

    $output  = '<table class="sm-student-table">';
    $output .= '<thead><tr><th>STT</th><th>MSSV</th><th>Họ tên</th><th>Lớp</th><th>Ngày sinh</th></tr></thead>';
    $output .= '<tbody>';

    $i = 1;
    foreach ( $students as $student ) {
        $mssv  = get_post_meta( $student->ID, '_sm_mssv', true );
        $class = get_post_meta( $student->ID, '_sm_class', true );
        $dob   = get_post_meta( $student->ID, '_sm_dob', true );

        $display_name = get_the_title( $student );

        $dob_display = '';
        if ( $dob ) {
            // store in YYYY-MM-DD; display as d/m/Y
            $ts = strtotime( $dob );
            if ( $ts ) {
                $dob_display = date_i18n( 'd/m/Y', $ts );
            }
        }

        $output .= '<tr>';
        $output .= '<td>' . esc_html( $i ) . '</td>';
        $output .= '<td>' . esc_html( $mssv ) . '</td>';
        $output .= '<td>' . esc_html( $display_name ) . '</td>';
        $output .= '<td>' . esc_html( $class ) . '</td>';
        $output .= '<td>' . esc_html( $dob_display ) . '</td>';
        $output .= '</tr>';

        $i++;
    }

    $output .= '</tbody></table>';

    return $output;
}

add_shortcode( 'danh_sach_sinh_vien', 'sm_student_list_shortcode' );
