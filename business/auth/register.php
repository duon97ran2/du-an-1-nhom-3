<?php

require_once DIR_ROOT."/commons/mailer/mail.php";

function client_register_page() {
    client_render('auth/register');
}

function client_register_handle() {
    $errors = [];
    $name = input_post('name');
    $email = input_post('email');
    $password = input_post('password');
    $confirm_password = input_post('confirm_password');
    $name_separation = nameSeparation($name);
    $first_name = $name_separation['first_name'];
    $last_name = $name_separation['last_name'];
    $user = find_user_by_email($email);

    if (empty($name)) {
        $errors['name'] = 'Vui lòng điền thông tin';
    }
    if (empty($email)) {
        $errors['email'] = 'Vui lòng điền thông tin';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email sai định dạng';
    } else if (!empty($user)) {
        $errors['email'] = 'Email đã tồn tại';
    }
    if (empty($password)) {
        $errors['password'] = 'Vui lòng điền thông tin';
    } else if (strlen($password) < 6) {
        $errors['password'] = 'Mật khẩu tối thiểu 6 ký tự';
    }
    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Vui lòng điền xác nhận mật khẩu';
    } else if ($confirm_password != $password) {
        $errors['confirm_password'] = 'Xác nhận mật khẩu không khớp';
    }

    if ($errors) {
        set_errors($errors);
        redirect('dang-ky');
    } else {
        $token = base64_encode(uniqid().$email);
        $start_time = date("Y-m-d H:i:s");
        $end_time = date("Y-m-d H:i:s");
        $password = password_hash($password, PASSWORD_DEFAULT);

        $user_sql = "INSERT INTO users (name, first_name, last_name, email, password) VALUES ('$name', '$first_name', '$last_name', '$email', '$password')";
        $user_id = insertExecuteQueryLastID($user_sql);

        $token_sql = "INSERT INTO user_tokens (user_id, access_token, start_time, end_time) VALUES ('$user_id', '$token', '$start_time', '$end_time')";
        executeQuery($token_sql);

        $verify_btn = 'Xác nhận tài khoản';
        $verify_url = app_url('dang-ky/xac-nhan-tai-khoan?token='.$token);
        $mail_content = "Xin chào ".$first_name."!.<br><br>Bạn đã đã Đăng ký tài khoản mới tại POLY-MOBILE. Bạn hãy bấm vào nút dưới đây để xác nhận tài khoản:";
        $mail_subject = '[POLY-MOBILE] Xác nhận tài khoản';
        sendEmail($email, $mail_subject, $mail_content, $verify_btn, $verify_url);
        set_session('message', 'Một liên kết đã được gửi vào địa chỉ email bạn cung cấp');
        redirect('dang-ky');
    }
}

function client_verify_hanle() {
    $token = input_get('token');
    $user_token = find_user_by_token($token);
    $time_now = strtotime(date("Y-m-d H:i:s"));
    $end_time = strtotime($user_token['end_time'] ?? 0);
    if (empty($user_token) || $user_token['is_active'] == 1) {
        error_page();
    }
    $user_id = $user_token['user_id'];
    $user_sql = "UPDATE users SET is_verify = 1 WHERE user_id = '$user_id'";
    executeQuery($user_sql);
    $token_sql = "UPDATE user_tokens SET is_active = 1 WHERE access_token = '$token'";
    executeQuery($token_sql);
    set_session('message', 'Xác nhận tài khoản thành công');
    redirect('dang-nhap');
}

function nameSeparation($name)
{
    $name_arr = explode(" ", $name);
    $first_name = count($name_arr) > 1 ? array_pop($name_arr) : $name;
    $last_name = count($name_arr) > 1 ? implode(" ", $name_arr) : '';
    return [
        'first_name' => $first_name,
        'last_name' => $last_name
    ];
}

function find_user_by_email($email) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    return executeQuery($sql, false);
}

function find_user_by_token($token) {
    $sql = "SELECT * FROM user_tokens WHERE access_token = '$token'";
    return executeQuery($sql, false);
}