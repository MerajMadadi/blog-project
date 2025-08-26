<?php

//config
define('BASE_URL', 'http://localhost/blog-project/');

if (!function_exists('redirect')) {

    function redirect($url)
    {
        header('Location: ' . trim(BASE_URL, '/ ') . '/' . trim($url, '/ '));
        exit;
    }
}

if (!function_exists('asset')) {

    function asset($file)
    {
        return trim(BASE_URL, '/ ') . '/assets/' . trim($file, '/ ');
    }
}

if (!function_exists('url')) {
    function url($url)
    {
        return trim(BASE_URL, '/ ') . '/' . trim($url, '/ ');
    }
}


if (!function_exists('dd')) {
    function dd($var)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        die;
    }
}

if (!function_exists('slugify')) {
    function slugify($string)
    {
        $string = strtolower(trim($string));
        $string = preg_replace('/[^a-z0-9آ-ی]+/u', '-', $string);
        $string = trim($string, '-');

        return $string;
    }
}
if (!function_exists('old')) {
    function old($key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }
}

if (!function_exists('sanitize')) {
    function sanitize($string)
    {
        return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('str_limit')) {
    function str_limit($string, $limit = 50, $end = '...')
    {
        return mb_strlen($string) > $limit
            ? mb_substr($string, 0, $limit) . $end
            : $string;
    }
}

if (!function_exists('upload_image')) {
    function upload_image($file, $maxSizeMB = 2)
    {
        // 1. بررسی خطا
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die("خطا در آپلود فایل");
        }

        // 2. مسیر ذخیره
        $uploadDir = "../../assets/images/posts/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // 3. بررسی پسوند مجاز
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed)) {
            die("فرمت فایل مجاز نیست (فقط jpg, jpeg, png, gif)");
        }

        // 4. بررسی حجم فایل (بایت)
        $maxSize = $maxSizeMB * 1024 * 1024; // تبدیل مگابایت به بایت
        if ($file['size'] > $maxSize) {
            die("حجم فایل نباید بیشتر از {$maxSizeMB} مگابایت باشد");
        }

        // 5. ساخت نام فایل یکتا
        $fileName = uniqid("img_", true) . "." . $ext;
        $destination = $uploadDir . $fileName;

        // 6. انتقال فایل
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            die("خطا در ذخیره فایل");
        }
        // 7. برگردوندن نام فایل ذخیره‌شده
        return $fileName;
    }
}
if (!function_exists('delete_image')) {
    function delete_image($fileName)
    {
        // مسیر پوشه آپلود
        $uploadDir = "../../assets/images/posts/";
        $filePath = $uploadDir . $fileName;

        // بررسی اینکه فایل وجود داره یا نه
        if (file_exists($filePath)) {
            unlink($filePath); // حذف فایل
            return true;
        }

        return false; // فایل پیدا نشد
    }
}



