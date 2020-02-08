@extends('layouts.main')

@section('content')

    <!-- featured
================================================== -->




<section class="s-featured">


    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1 class="display-1 display-1--with-line-sep">ВИДЖЕТ РЕКОМЕНДУЕМЫХ СТАТЕЙ</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-full">

            <div class="featured-slider featured" data-aos="zoom-in">

                @foreach($featured_random as $featured)
                <div class="featured__slide">
                    <div class="entry">

                        <div class="entry__background"
                             style="background-image:url('{{$featured->category->wallpaper}}');"></div>

                        <div class="entry__content">
                            <span class="entry__category"><a href="#0">{{$featured->category->title}}</a></span>

                            <h1><a href="/post/{{$featured->id}}" title="">{{$featured->title}}</a></h1>

                            <div class="entry__info">
                                <a href="#0" class="entry__profile-pic">
                                    <img class="avatar" src="{{$featured->user->avatar}}" alt="">
                                </a>
                                <ul class="entry__meta">
                                    <li><a href="#0">{{$featured->user->name}}</a></li>
                                    <li>{{$featured->published_at}}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->
                </div> <!-- end featured__slide -->
                @endforeach
            </div> <!-- end featured -->

        </div> <!-- end col-full -->
    </div>
</section> <!-- end s-featured -->


<!-- s-content
================================================== -->
<section class="s-content">


    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1 class="display-1 display-1--with-line-sep">НЕДАВНИЕ СТАТЬИ</h1>
        </div>
    </div>

    <div class="row entries-wrap wide">
        <div class="entries">


            @foreach($recent_post_paginator as $post)
                <article class="col-block">

                    <div class="item-entry" data-aos="zoom-in">
                        <div class="item-entry__thumb">
                            <a href="/post/{{$post->id}}" class="item-entry__thumb-link">
                                <img src="{{$post->cover}}" alt="{{$post->id}}">
                            </a>
                        </div>

                        <div class="item-entry__text">
                            <div class="item-entry__cat">
                                <a href="/category/{{$post->category->id}}">{{ $post->category->title }}</a>
                            </div>

                            <h1 class="item-entry__title"><a href="/post/{{$post->id}}">{{$post->title}}</a></h1>

                            <div class="item-entry__date">
                                <a href="/post/{{$post->id}}">{{$post->published_at}}</a>
                            </div>
                        </div>
                    </div> <!-- item-entry -->

                </article> <!-- end article -->
            @endforeach
        </div> <!-- end entries -->
    </div> <!-- end entries-wrap -->





    @if($recent_post_paginator->total() > $recent_post_paginator->count())
        <div class="row pagination-wrap">
            <div class="col-full">
                <nav class="pgn" data-aos="fade-up">
                    {{$recent_post_paginator->links()}}
                </nav>
            </div>
        </div>
    @endif

</section> <!-- end s-content -->


<!-- s-extra
================================================== -->
<section class="s-extra">

    <div class="row">

        <div class="col-seven md-six tab-full popular">
            <h3>Набирающее популярность</h3>

            <div class="block-1-2 block-m-full popular__posts">
                @foreach($popular_random as $popular)
                <article class="col-block popular__post">
                    <a href="/post/{{$popular->id}}" class="popular__thumb">
                        <img src="{{$popular->cover}}" alt="">
                    </a>
                    <h5>{{$popular->title}}</h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <b>{{$popular->user->name}}</b></span>
                        <span class="popular__date"><span>on</span> <time datetime="2018-06-14">{{$popular->published_at}}</time></span>
                    </section>
                </article>
                    @endforeach
            </div> <!-- end popular_posts -->
        </div> <!-- end popular -->

        <div class="col-four md-six tab-full end">
            <div class="row">
                <div class="col-six md-six mob-full categories">
                    <h3>Категории</h3>

                    <ul class="linklist">
                        @foreach($categoryList as $category)
                        <li><a href="/category{{$category->id}}">{{$category->id_title}}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- end categories -->

                <div class="col-six md-six mob-full sitelinks">
                    <h3>Site Links</h3>

                    <ul class="linklist">
                        <li><a href="#0">Home</a></li>
                        <li><a href="#0">Blog</a></li>
                        <li><a href="#0">Styles</a></li>
                        <li><a href="#0">About</a></li>
                        <li><a href="#0">Contact</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>
                </div> <!-- end sitelinks -->
            </div>
        </div>
    </div> <!-- end row -->

</section> <!-- end s-extra -->

@endsection
<!-- s-footer
================================================== -->