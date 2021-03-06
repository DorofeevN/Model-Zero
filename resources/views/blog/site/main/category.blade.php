@extends('layouts.main')

@section('content')

    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep">Category: {{ $categoryPosts[0]->category->title }}</h1>
                <p class="lead">Dolor similique vitae. Exercitationem quidem occaecati iusto. Id non vitae enim quas error dolor maiores ut. Exercitationem earum ut repudiandae optio veritatis animi nulla qui dolores.</p>
            </div>
        </div>

        <div class="row entries-wrap add-top-padding wide">
            <div class="entries">
                @foreach($categoryPosts as $categoryPost)
                <article class="col-block">

                    <div class="item-entry" data-aos="zoom-in">
                        <div class="item-entry__thumb">
                            <a href="/post/{{$categoryPost->id}}" class="item-entry__thumb-link">
                                <img src="{{$categoryPost->cover}}"
                                    alt="{{$categoryPost->id}}">
                            </a>
                        </div>

                        <div class="item-entry__text">
                            <div class="item-entry__cat">
                                <a href="/category/{{ $categoryPost->category->id }}">{{ $categoryPost->category->title    }}</a>
                            </div>

                                <h1 class="item-entry__title"><a href="/post/{{ $categoryPost->id }}">{{ $categoryPost->title }}</a></h1>

                            <div class="item-entry__date">
                                <a href="/post/{{$categoryPost->id}}">{{ $categoryPost->published_at }}</a>
                            </div>
                        </div>
                    </div> <!-- item-entry -->

                </article> <!-- end article -->
                @endforeach
            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->

        @if($categoryPosts->total() > $categoryPosts->count())
            <div class="row pagination-wrap">
                <div class="col-full">
                    <nav class="pgn" data-aos="fade-up">
                        {{$categoryPosts->links()}}
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
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="/images/thumbs/small/tulips-150.jpg" alt="">
                        </a>
                        <h5>10 Interesting Facts About Caffeine.</h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-14">Jun 14, 2018</time></span>
                        </section>
                    </article>

                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>

                        <ul class="linklist">
                            <li><a href="#0">Lifestyle</a></li>
                            <li><a href="#0">Travel</a></li>
                            <li><a href="#0">Recipes</a></li>
                            <li><a href="#0">Management</a></li>
                            <li><a href="#0">Health</a></li>
                            <li><a href="#0">Creativity</a></li>
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