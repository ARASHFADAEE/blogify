<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/blog/panel/config.php';
?>

<html dir="rtl" lang="fa-IR">
<head>
    <title>عضویت</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link href="./assets/Css/Main.css" rel="stylesheet" />
    <link href="./assets/Css/Style.css" rel="stylesheet" />
</head>
<body class="rtl bg-greengrad min-h">
    <section class="container maxw">
        <div class="card login mx-md-5 mt-5 justify-content-center shadow-none">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body p-4 text-center">
                        <a href="#">
                            <img src="./assets/Img/logo-main.png" alt="logo" class="pt-2 pb-4">
                        </a>
                        <!-- نمایش پیام خطا یا موفقیت -->
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger">
                                <?php
                                if ($_GET['error'] === 'empty_fields') echo 'لطفاً همه فیلدها را پر کنید!';
                                elseif ($_GET['error'] === 'invalid_mobile') echo 'شماره موبایل نامعتبر است!';
                                elseif ($_GET['error'] === 'password_mismatch') echo 'کلمه‌های عبور مطابقت ندارند!';
                                elseif ($_GET['error'] === 'db_error') echo 'خطایی در ثبت‌نام رخ داد!';
                                elseif ($_GET['error'] === 'email_exists') echo 'ایمیل قبلاً ثبت شده است!';
                                elseif ($_GET['error'] === 'mobile_exists') echo 'شماره موبایل قبلاً ثبت شده است!';
                                ?>
                            </div>
                        <?php elseif (isset($_GET['success'])): ?>
                            <div class="alert alert-success">
                                ثبت‌نام با موفقیت انجام شد! <a href="<?php echo BASE_URL; ?>/login.php">وارد شوید</a>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo BASE_URL; ?>/panel/action/auth/register.php">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control" required placeholder="نام کاربری">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required placeholder="آدرس ایمیل">
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" id="mobile" class="form-control" required placeholder="شماره تلفن همراه">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" required placeholder="کلمه عبور">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" required placeholder="تکرار کلمه عبور">
                            </div>
                            <button type="submit" name="register" id="register" class="btn btn-block btn-success py-2 radius10 mb-4">عضویت</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 m-auto">
                    <img src="./assets/Img/login.jpg" class="img-fluid d-lg-block d-none" />
                </div>
            </div>
        </div>
    </section>
</body>
</html>