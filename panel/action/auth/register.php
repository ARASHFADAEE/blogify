<?php include_once '../../inc/database.php' ?>
<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/blog/panel/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/blog/panel/inc/database.php';

if (isset($_POST['register'])) {
    // گرفتن و تمیز کردن داده‌ها
    $username = filter_var($_POST['username'] ?? '');
    $email = filter_var($_POST['email'] ?? '');
    $mobile = filter_var($_POST['mobile'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $password_confirm = trim($_POST['password_confirm'] ?? '');
    $role = 'user'; // نقش پیش‌فرض کاربر
    $img = 'default.jpg'; // تصویر پیش‌فرض (می‌تونی بعداً آپلود تصویر اضافه کنی)
    $created_at = date('Y-m-d H:i:s');

    // اعتبارسنجی‌ها
    if (empty($username) || empty($email) || empty($mobile) || empty($password) || empty($password_confirm)) {
        header("Location: " . BASE_URL . "/register.php?error=empty_fields");
        exit;
    }

    // اعتبارسنجی ایمیل
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: " . BASE_URL . "/register.php?error=invalid_email");
        exit;
    }

    // اعتبارسنجی شماره موبایل
    if (!preg_match('/^09[0-9]{9}$/', $mobile)) {
        header("Location: " . BASE_URL . "/register.php?error=invalid_mobile");
        exit;
    }

    // چک کردن تطابق پسوردها
    if ($password !== $password_confirm) {
        header("Location: " . BASE_URL . "/register.php?error=password_mismatch");
        exit;
    }

    try {
        // چک کردن اینکه ایمیل یا موبایل قبلاً ثبت نشده
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email OR mobile = :mobile");
        $stmt->execute(['email' => $email, 'mobile' => $mobile]);
        if ($stmt->fetch()) {
            if ($stmt->rowCount() > 0) {
                $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = :email");
                $checkEmail->execute(['email' => $email]);
                if ($checkEmail->fetch()) {
                    header("Location: " . BASE_URL . "/panel/view/user/register.php?error=email_exists");
                } else {
                    header("Location: " . BASE_URL . "/panel/view/user/register.php?error=mobile_exists");
                }
                exit;
            }
        }

        // هَش کردن پسورد
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // ثبت کاربر توی دیتابیس
        $stmt = $conn->prepare("INSERT INTO users (username, role, email, mobile, password, img, created_at) 
                                VALUES (:username, :role, :email, :mobile, :password, :img, :created_at)");
        $stmt->execute([
            'username' => $username,
            'role' => $role,
            'email' => $email,
            'mobile' => $mobile,
            'password' => $hashedPassword,
            'img' => $img,
            'created_at' => $created_at
        ]);

        // ریدایرکت به صفحه لاگین با پیام موفقیت
        header("Location: " . BASE_URL . "/register.php?success=registered");
        exit;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        header("Location: " . BASE_URL . "/register.php?error=db_error");
        exit;
    }
} else {
    header("Location: " . BASE_URL . "/register.php?error=no");
    exit;
}
?>