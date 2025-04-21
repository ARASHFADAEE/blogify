<?php
session_start();
define('TITLE_PAGE', 'نمایش کاربر');
include_once $_SERVER['DOCUMENT_ROOT'].'/blog/panel/config.php';
// چک کردن سشن و نقش کاربر
if (!isset($_SESSION['role'])) {
    // اگه سشن وجود نداشت (کاربر لاگین نکرده)
    header("Location: " . BASE_URL . "/index.php?error=not_logged_in");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    // اگه نقش کاربر ادمین نبود (مثلاً user یا هر چیز دیگه)
    header("Location: " . BASE_URL . "/index.php?error=access_denied");
    exit;
}

// اگه همه چیز درست بود، صفحه لود می‌شه
include_once '../partials/header.php';
?>

<!-- end::header -->
<!-- begin::main content -->
<main class="main-content">

    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title"> ویرایش کاربر</h6>
                <form method="POST">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ایمیل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">موبایل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="mobile">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پسورد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">واتس اپ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="whatsapp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تلگرام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="telegram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">اینستاگرام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="instagram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                        <input class="col-sm-10" type="file" class="form-control-file" id="file">
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ذخیره
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>


</main>
<?php include_once '../partials/footer.php' ?>