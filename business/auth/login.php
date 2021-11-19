<?php

function admin_login_page() {
    view_no_layout('auth/admin/login');
}

function admin_login_handle() {
    $errors = [];
    $email = input_post('email');
    $password = input_post('password');

    if (empty($email)) {
        $errors['email'] = 'Vui lòng điền thông tin';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email sai định dạng';
    }
    if (empty($password)) {
        $errors['password'] = 'Vui lòng điền thông tin';
    } else if (strlen($password) < 6) {
        $errors['password'] = 'Mật khẩu tối thiểu 6 ký tự';
    } else {
        $user = find_user_by_email($email); 
        $password_verify = password_verify($password, $user['password']);
        if (empty($user)) {
            $errors['email'] = 'Tài khoản không tồn tại';
        } else if ($user['email'] != $email) {
            $errors['message'] = 'Tài khoản hoặc mật khẩu không chính xác';
        } else if ($user['password'] != $password_verify) {
            $errors['message'] = 'Tài khoản hoặc mật khẩu không chính xác';
        } else if ($user['is_active'] == 0) {
            $errors['message'] = 'Tài khoản đang bị khoá';
        } else if (strtolower($user['role']) != 'admin') {
            $errors['message'] = 'Bạn không có quyền truy cập';
        } 
    }

    if ($errors) {
        set_errors($errors);
        redirect('cp-admin/dang-nhap');
    } else {
        set_session('AUTH_ID', $user['user_id']);
        redirect('cp-admin/dashboard');
    }
}

function admin_logout() {
    remove_session('AUTH_ID');
    redirect('cp-admin/dang-nhap');
}

function find_user_by_email($email) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    return executeQuery($sql, false);
}