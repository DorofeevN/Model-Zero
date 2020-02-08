<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Laravel-Blog</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS


    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader" class="dots-fade">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>


<!-- header
================================================== -->
<header class="s-header header">

    <div class="header__logo">
        <a class="logo" href="/">
            <img src="/images/logo.svg" alt="Homepage">
        </a>
    </div> <!-- end header__logo -->

    <a class="header__search-trigger" href="#0"></a>
    <div class="header__search">

        <form role="search" method="get" class="header__search-form" action="#">
            <label>
                <span class="hide-content">Поиск:</span>
                <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="Search">
        </form>

        <a href="#0" title="Close Search" class="header__overlay-close">Закрыть</a>

    </div>  <!-- end header__search -->

    <a class="header__toggle-menu" href="#0" title="Menu"><span>Меню</span></a>
    <nav class="header__nav-wrap">

        <h2 class="header__nav-heading h6">Навигация</h2>

        <ul class="header__nav">
            <li class="current"><a href="/" title="">Домашняя страница</a></li>
            <li class="has-children">
                <a href="#0" title="">Категории</a>
                <ul class="sub-menu">
                    @foreach($categoryList as $category_title)
                        <li><a href="/category/{{ $category_title->id }}">{{ $category_title->id_title }}</a></li>
                    @endforeach
                </ul>
            </li>
            {{--<li class="has-children">--}}
                {{--<a href="#0" title="">Blog</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li><a href="single-video.html">Video Post</a></li>--}}
                    {{--<li><a href="single-audio.html">Audio Post</a></li>--}}
                    {{--<li><a href="single-standard.html">Standard Post</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="style-guide.html" title="">Styles</a></li>--}}
            {{--<li><a href="page-about.html" title="">About</a></li>--}}
            {{--<li><a href="page-contact.html" title="">Contact</a></li>--}}
        </ul> <!-- end header__nav -->

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav> <!-- end header__nav-wrap -->

</header> <!-- s-header -->




@yield('content')

<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-six tab-full s-footer__about">

                <h4>About Wordsmith</h4>

                <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut occaecati placeat at.
                    Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia consequatur.
                    Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa error
                    temporibus magnam est voluptatem.</p>

            </div> <!-- end s-footer__about -->

            <div class="col-six tab-full s-footer__subscribe">

                <h4>Our Newsletter</h4>

                <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">

                        <input type="submit" name="subscribe" value="Send">

                        <label for="mc-email" class="subscribe-message"></label>

                    </form>
                </div>

            </div> <!-- end s-footer__subscribe -->

        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">

            <div class="col-six">
                <ul class="footer-social">
                    <li>
                        <a href="#0"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-six">
                <div class="s-footer__copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                </div>
            </div>

        </div>
    </div> <!-- end s-footer__bottom -->

    <div class="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top"></a>
    </div>

</footer> <!-- end s-footer -->


<!-- Java Script
================================================== -->

<script src="{{ asset('js/main/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('js/main/plugins.js')}}"></script>
<script src="{{ asset('js/main/main.js')}}"></script>
<script src="{{ asset('js/main/modernizr.js')}}"></script>
================================================== -->
<link href="{{ asset('css/base.css') }}" rel="stylesheet">
<link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

<!-- script
================================================== -->

</body>

</html>