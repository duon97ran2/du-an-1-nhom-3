<?php 

require_once DIR_ROOT."/commons/mailer/mail.php";

function admin_forgot_password_page() {
    is_login_for_auth_page();
    view_no_layout('auth/admin/forgot');
}

function admin_forgot_password_handle() {
    $errors = [];
    $email = input_post('email');
    $user = find_user_by_email($email);
    if (empty($email)) {
        $errors['email'] = 'Vui lòng điền thông tin';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email sai định dạng';
    } else if (empty($user)) {
        $errors['email'] = 'Email không tồn tại trong hệ thống';
    }

    if ($errors) {
        set_errors($errors);
    } else {
        $token = base64_encode(uniqid().$email);
        $user_id = $user['user_id'];
        $start_time = date("Y-m-d H:i:s");
        $end_time = date("Y-m-d H:i:s", strtotime("+60 minutes"));

        $sql = "INSERT INTO user_tokens (user_id, access_token, start_time, end_time) VALUES ('$user_id', '$token', '$start_time', '$end_time')";
        executeQuery($sql);

        $verify_btn = 'Cập nhật mật khẩu';
        $verify_url = admin_url('quen-mat-khau/cap-nhat-mat-khau?token='.$token);
        $mail_content = "Xin chào ".$user['first_name']."!.<br><br>Bạn đã đã có yêu cầu đổi mật khẩu. Bạn hãy bấm vào nút dưới đây để cập nhật lại mật khẩu cho tài khoản, liên kết có thời hạn 60 phút:";
        $mail_subject = '[POLY-MOBILE] Quên mật khẩu';
        sendEmail($email, $mail_subject, $mail_content, $verify_btn, $verify_url);
        set_session('message', 'Một liên kết đã được gửi vào địa chỉ email bạn cung cấp');
    }
    redirect('cp-admin/quen-mat-khau');
}

function admin_reset_password_page() {
    is_login_for_auth_page();
    
    $token = input_get('token');
    $user_token = find_user_by_token($token);
    $time_now = strtotime(date("Y-m-d H:i:s"));
    $end_time = strtotime($user_token['end_time'] ?? 0);
    if (empty($user_token) || $time_now > $end_time || $user_token['is_active'] == 1) {
        error_page();
    }
    $user = find_user_by_id($user_token['user_id']);
    view_no_layout('auth/admin/reset', [
        'email' => $user['email'],
        'token' => $token
    ]);
}

function admin_reset_password_handle() {
    $errors = [];
    $token = input_post('token');
    $email = input_post('email');
    $password = input_post('password');
    $confirm_password = input_post('confirm_password');
    $user = find_user_by_email($email);
    $password_verify = password_verify($password, $user['password']);
    if (empty($password)) {
        $errors['password'] = 'Vui lòng điền mật khẩu mới';
    } else if (strlen($password) < 6) {
        $errors['password'] = 'Mật khẩu tối thiểu 6 ký tự';
    }
    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Vui lòng điền xác nhận mật khẩu mới';
    } else if ($confirm_password != $password) {
        $errors['confirm_password'] = 'Xác nhận mật khẩu không khớp';
    }

    if ($errors) {
        set_errors($errors);
        redirect('cp-admin/quen-mat-khau/cap-nhat-mat-khau?token='.$token);
    } else {
        $date_now = date("Y-m-d H:i:s");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user_sql = "UPDATE users SET password = '$password', updated_at = '$date_now' WHERE email = '$email'";
        executeQuery($user_sql);
        $token_sql = "UPDATE user_tokens SET is_active = 1 WHERE access_token = '$token'";
        executeQuery($token_sql);
        set_session('message', 'Cập nhật mật khẩu mới thành công');
        redirect('cp-admin/dang-nhap');
    }
}

function find_user_by_email($email) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    return executeQuery($sql, false);
}

function find_user_by_id($user_id) {
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    return executeQuery($sql, false);
}

function find_user_by_token($token) {
    $sql = "SELECT * FROM user_tokens WHERE access_token = '$token'";
    return executeQuery($sql, false);
}