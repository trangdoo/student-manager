<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sm_add_student_meta_boxes() {
    add_meta_box(
        'sm_student_info',
        __( 'Thông tin sinh viên', 'student-manager' ),
        'sm_render_student_meta_box',
        'student',
        'normal',
        'default'
    );
}

add_action( 'add_meta_boxes', 'sm_add_student_meta_boxes' );

function sm_render_student_meta_box( $post ) {
    wp_nonce_field( 'sm_save_student', 'sm_student_nonce' );

    $mssv  = get_post_meta( $post->ID, '_sm_mssv', true );
    $class = get_post_meta( $post->ID, '_sm_class', true );
    $dob   = get_post_meta( $post->ID, '_sm_dob', true );

    $classes = array( 'CNTT' => 'CNTT', 'Kinh tế' => 'Kinh tế', 'Marketing' => 'Marketing' );
    ?>
    <p>
        <label for="sm_mssv"><strong>MSSV</strong></label><br />
        <input type="text" id="sm_mssv" name="sm_mssv" value="<?php echo esc_attr( $mssv ); ?>" style="width:100%" />
    </p>

    <p>
        <label for="sm_class"><strong>Lớp/Chuyên ngành</strong></label><br />
        <select id="sm_class" name="sm_class" style="width:100%">
            <option value="">-- Chọn --</option>
            <?php foreach ( $classes as $key => $label ) : ?>
                <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $class, $key ); ?>><?php echo esc_html( $label ); ?></option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label for="sm_dob"><strong>Ngày sinh</strong></label><br />
        <input type="date" id="sm_dob" name="sm_dob" value="<?php echo esc_attr( $dob ); ?>" />
    </p>
    <?php
}

function sm_save_student_meta( $post_id, $post ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( $post->post_type !== 'student' ) {
        return;
    }

    if ( ! isset( $_POST['sm_student_nonce'] ) || ! wp_verify_nonce( $_POST['sm_student_nonce'], 'sm_save_student' ) ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // MSSV
    if ( isset( $_POST['sm_mssv'] ) ) {
        $mssv = sanitize_text_field( wp_unslash( $_POST['sm_mssv'] ) );
        update_post_meta( $post_id, '_sm_mssv', $mssv );
    } else {
        delete_post_meta( $post_id, '_sm_mssv' );
    }

    // Class
    if ( isset( $_POST['sm_class'] ) ) {
        $class = sanitize_text_field( wp_unslash( $_POST['sm_class'] ) );
        update_post_meta( $post_id, '_sm_class', $class );
    } else {
        delete_post_meta( $post_id, '_sm_class' );
    }

    // DOB
    if ( isset( $_POST['sm_dob'] ) ) {
        $dob = sanitize_text_field( wp_unslash( $_POST['sm_dob'] ) );
        update_post_meta( $post_id, '_sm_dob', $dob );
    } else {
        delete_post_meta( $post_id, '_sm_dob' );
    }
}

add_action( 'save_post', 'sm_save_student_meta', 10, 2 );
