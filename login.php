<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/blog/panel/config.php';
?>
<html dir="rtl" lang="fa-IR">
<head>
    <title>ورود</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link href="<?php echo BASE_URL; ?>/assets/Css/Main.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL; ?>/assets/Css/Style.css" rel="stylesheet" />
</head>
<body class="rtl bg-greengrad min-h">
    <section class="container maxw">
        <div class="card login mx-md-5 mt-5 justify-content-center shadow-none">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body p-4 text-center">
                        <a href="<?php echo BASE_URL; ?>/">
                            <img src="<?php echo BASE_URL; ?>/assets/Img/logo-main.png" alt="لوگوی سایت" class="pt-2 pb-4">
                        </a>
                        <?php if (isset($_GET['field'])): ?>
                            <div class="alert alert-danger">
                                <p>
                                    <?php
                                    switch ($_GET['field']) {
                                        case 'no':
                                            echo 'لطفا مقادیر را تکمیل کنید';
                                            break;
                                        case 'invalid_mobile':
                                            echo 'شماره تلفن باید 11 رقم باشد و با 09 شروع شود (بدون +98)';
                                            break;
                                        case 'wrong_password':
                                            echo 'رمز عبور اشتباه است';
                                            break;
                                        case 'user_not_found':
                                            echo 'شماره تلفن یا رمز عبور اشتباه است';
                                            break;
                                        case 'db_error':
                                            echo 'خطا در اتصال به دیتابیس';
                                            break;
                                        default:
                                            echo 'خطای ناشناخته';
                                    }
                                    ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo BASE_URL; ?>/panel/action/auth/login.php">
                            <div class="form-group">
                                <label for="user">شماره تلفن</label>
                                <input type="text" name="mobile" id="user" class="form-control" required placeholder="شماره تلفن (مثال: 09123456789)">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">کلمه عبور</label>
                                <input type="password" name="password" id="password" class="form-control" required placeholder="کلمه عبور">
                            </div>
                            <button type="submit" name="sub_login" id="login" class="btn w-100 py-2 btn-success radius10 my-3">ورود</button>
                            <p>هنوز ثبت نام نکرده اید؟ <a href="<?php echo BASE_URL; ?>/register.php" class="text-drkprimary">عضویت در سایت</a></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 m-auto">
                    <img src="<?php echo BASE_URL; ?>/assets/Img/login.jpg" class="img-fluid d-lg-block d-none" alt="تصویر ورود" />
                </div>
            </div>
        </div>
    </section>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const mobile = document.getElementById('user').value;
            const mobileRegex = /^09[0-9]{9}$/;
            const existingError = document.querySelector('.alert.alert-danger');
            if (!mobileRegex.test(mobile)) {
                e.preventDefault();
                if (!existingError) {
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'alert alert-danger';
                    errorDiv.innerHTML = '<p>شماره تلفن باید 11 رقم باشد و با 09 شروع شود (بدون +98)</p>';
                    document.querySelector('form').prepend(errorDiv);
                }
            } else if (existingError) {
                existingError.remove(); // حذف خطا در صورت معتبر بودن شماره
            }
        });
    </script>
</body>
</html>