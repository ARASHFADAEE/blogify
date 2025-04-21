
<?php
session_start();
define('TITLE_PAGE', 'لیست کاربران');
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
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary">ردیف</th>
                            <th class="text-center align-middle text-primary">عکس</th>
                            <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                            <th class="text-center align-middle text-primary">ایمیل</th>
                            <th class="text-center align-middle text-primary">موبایل</th>
                            <th class="text-center align-middle text-primary">نقش های کاربر</th>
                            <th class="text-center align-middle text-primary">وضعیت</th>
                            <th class="text-center align-middle text-primary">ویرایش</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"></td>
                            <td class="text-center align-middle">
                                <figure class="avatar avatar">
                                    <img src="" class="rounded-circle" alt="image">
                                </figure>
                            </td>
                            <td class="text-center align-middle"></td>
                            <td class="text-center align-middle"></td>
                            <td class="text-center align-middle"></td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-info" href="#">
                                    نقش های کاربر
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <span class="cursor-pointer badge badge-success">فعال</span>
                            </td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-info" href="#">
                                    ویرایش
                                </a>
                            </td>
                            <td class="text-center align-middle"></td>
                        </tr>
                    </tbody>
                </table>
                <div style="margin: 40px !important;"
                    class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once '../partials/footer.php'; ?>