<?php

date_default_timezone_set("Asia/Bangkok");

define("DIR_ROOT", dirname(__DIR__));

const APP_NAME = "POLY-MOBILE";
const BASE_URL = "http://localhost:81/poly-mobile/";
const ADMIN_URL = "http://localhost:81/poly-mobile/cp-admin/";
const ADMIN_ASSETS = BASE_URL . 'public/adminlte/';
const PUBLIC_ASSETS = "http://localhost:81/poly-mobile/public/";

const MAIL_HOST = 'smtp.gmail.com';
const MAIL_SMTP_AUTH = true;
const MAIL_SMTP_SECURE = 'tls';
const MAIL_PORT = '587';
const MAIL_USERNAME = '';
const MAIL_PASSWORD = '';

?>