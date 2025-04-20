<html dir="rtl" lang="fa-IR">

<head>

    <title>وبلاگ</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1">
    <link href="./assets/Css/Main.css" rel="stylesheet" />
    <link href="./assets/Css/Menu-demo1.css" rel="stylesheet" />
    <link href="./assets/Css/Style.css" rel="stylesheet" />
</head>

<body class="rtl blog">
    <div class="main_wrap">
        <div class="of-site-mask"></div>


        <div class="off-canvas-wrap ">
            <div class="close-off-canvas-wrap">
                <a href="#" id="of-close-off-canvas">
                    <i class="fal fa-times"></i>
                </a>
            </div>
            <div class="off-canvas-inner">
                <div id="of-mobile-nav" class="mobile-menu-wrap">
                    <ul class="mobile-menu">
                        <li class="current-menu-item">
                            <a href="Index_demo1.html">صفحه اصلی</a>
                        </li>
                        <li>
                            <a href="blog.html">مقالات</a>
                        </li>
                        <li><a href="aboutus.html" target="_blank">درباره ما</a></li>
                        <li><a href="ContactUs.html" target="_blank">تماس با ما</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <header class="main_header wide_header">
            <div class="header_container">
                <div class="menu_wrapper menu_sticky">
                    <div class="container p_relative h86">
                        <div id="navigation" class="of-drop-down of-main-menu" role="navigation">
                            <ul class="menu">
                                <li>
                                    <a href="Index_demo1.html" class="current">
                                        <img src="./assets/Img/logo-main.png" />
                                    </a>
                                </li>
                                <li>
                                    <a href="Index_demo1.html">صفحه اصلی</a>
                                </li>
                                <li><a href="blog.html" target="_blank">مقالات</a></li>
                                <li><a href="aboutus.html" target="_blank">درباره ما</a></li>
                                <li><a href="ContactUs.html" target="_blank">تماس با ما</a></li>

                            </ul>
                        </div>
                        <div class="m_search pt-xl-3 pt-1"><i class="fal fa-search"></i></div>
                        <div class="is-show mobile-nav-button">
                            <a id="of-trigger" class="icon-wrap  mt-2" href="#"> <i class="fal fa-bars"></i>فهرست</a>
                        </div>
                        <form class="search_wrap mt-lg-0" id="ajax-form-search" method="get" action="">

                            <input type="text" id="search-form-text" class="search-field" value="" name="s" placeholder="کلید واژه مورد نظر ...">
                            <button><i class="fal fa-search"></i></button>

                            <input type="hidden" name="post_type" value="product">
                            <div id="ajax-search-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </header>


        <div class="clearfix"></div>
        <section class="container mt-4 mb-2">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb radius15 shadow-sm">
                        <ul>
                            <li><a href="#">خانه / </a></li>
                            <li><a href="#" class="current">لیست مقالات</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>