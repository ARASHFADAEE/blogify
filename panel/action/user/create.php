<?php include_once '../inc/database.php' ?>


<?php


// مسیر موقت فایل آپلودشده
$tmpFile = $_FILES['img']['tmp_name'];

// نام فایل
$fileName = $_FILES['img']['name'];

// مسیر مقصد (یک سطح بالاتر، داخل پوشه img)
$imageDir = __DIR__ . '/../img/';
$destinationPath = $imageDir . $fileName;

// ساخت پوشه img اگر وجود نداشته باشد
if (!is_dir($imageDir)) {
    mkdir($imageDir, 0777, true);
}

// انتقال فایل
if (is_uploaded_file($tmpFile)) {
    if (move_uploaded_file($tmpFile, $destinationPath)) {
        echo "فایل با موفقیت به $destinationPath منتقل شد!";
    } else {
        echo "خطا در انتقال فایل!";
    }
} else {
    echo "فایل آپلود نشده است!";
}
?>
