<?php
// config/config.php

// تنظیمات محیط (development یا production)
const ENVIRONMENT = 'development';

// نمایش خطاها فقط در محیط توسعه
if (ENVIRONMENT == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// تنظیمات دیتابیس (بعداً کامل می‌کنیم)
const DB_HOST = 'localhost';
const DB_NAME = 'mvc_db';
const DB_USER = 'root';
const DB_PASS = '';

// آدرس پایه سایت (برای ریدایرکت و لینک‌ها)
const BASE_URL = 'http://localhost/my-mvc/';