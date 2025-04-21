<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/blog/panel/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/blog/panel/inc/database.php';

if (isset($_POST['sub_login'])) {
    $mobile = filter_var($_POST['mobile'] ?? '', FILTER_SANITIZE_STRING);
    $password = trim($_POST['password'] ?? '');

    // بررسی خالی بودن فیلدها
    if (empty($mobile) || empty($password)) {
        header("Location: " . BASE_URL . "/login.php?field=no");
        exit;
    }

    // اعتبارسنجی شماره تلفن با Regex
    if (!preg_match('/^09[0-9]{9}$/', $mobile)) {
        header("Location: " . BASE_URL . "/login.php?field=invalid_mobile");
        exit;
    }

    try {
        // اجرای کوئری با PDO برای گرفتن پسورد و نقش
        $stmt = $conn->prepare("SELECT password, role FROM users WHERE mobile = :mobile");
        $stmt->execute(['mobile' => $mobile]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // بررسی پسورد
            if (password_verify($password, $user['password'])) {
                // ذخیره نقش و موبایل توی سشن
                $_SESSION['role'] = $user['role'];
                $_SESSION['mobile'] = $mobile;

                if ($user['role'] === 'admin') {
                    header("Location: " . BASE_URL . "/panel/view/dashboard/");
                } elseif ($user['role'] === 'user') {
                    header("Location: " . BASE_URL . "/panel/view/dashboard/");
                } else {
                    header("Location: " . BASE_URL . "/login.php?field=invalid_role");
                }
                exit;
            } else {
                header("Location: " . BASE_URL . "/login.php?field=wrong_password");
                exit;
            }
        } else {
            header("Location: " . BASE_URL . "/login.php?field=user_not_found");
            exit;
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        header("Location: " . BASE_URL . "/login.php?field=db_error");
        exit;
    }
} else {
    header("Location: " . BASE_URL . "/login.php?field=no");
    exit;
}
?>