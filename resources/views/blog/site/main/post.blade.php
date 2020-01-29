
@extends('layouts.main')

@section('content')



<!-- s-content
================================================== -->
<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">

        <div class="entry__media col-full">
            <div class="entry__post-thumb">
                <img src="images/thumbs/single/standard/standard-1000.jpg"
                     srcset="images/thumbs/single/standard/standard-2000.jpg 2000w,
                                 images/thumbs/single/standard/standard-1000.jpg 1000w,
                                 images/thumbs/single/standard/standard-500.jpg 500w"
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="">
            </div>
        </div>

        <div class="entry__header col-full">
            <h1 class="entry__header-title display-1">
                {{ $thePost->title }}
            </h1>
            <ul class="entry__header-meta">
                <li class="date">{{ $thePost->published_at }}</li>
                <li class="byline">
                    By
                    <a href="#0">{{ $thePost->user->name }}</a>
                </li>
            </ul>
        </div>

        <div class="col-full entry__main">

            <p class="lead drop-cap">{{ $thePost->excerpt }}</p>

            <p>{{ $thePost->content_html }}</p>


    </article> <!-- end entry/article -->


    <div class="s-content__entry-nav">
        <div class="row s-content__nav">
            <div class="col-six s-content__prev">
                <a href="#0" rel="prev">
                    <span>Previous Post</span>
                    The Pomodoro Technique Really Works.
                </a>
            </div>
            <div class="col-six s-content__next">
                <a href="#0" rel="next">
                    <span>Next Post</span>
                    3 Benefits of Minimalism In Interior Design.
                </a>
            </div>
        </div>
    </div> <!-- end s-content__pagenav -->

    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">

                <h3 class="h2">5 Comments</h3>

                <!-- START commentlist -->
                <ol class="commentlist">

                    <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author">Itachi Uchiha</div>

                                <div class="comment__meta">
                                    <div class="comment__time">Jun 15, 2018</div>
                                    <div class="comment__reply">
                                        <a class="comment-reply-link" href="#0">Reply</a>
                                    </div>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                                    facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
                            </div>

                        </div>

                    </li> <!-- end comment level 1 -->

                    <li class="thread-alt depth-1 comment">

                        <div class="comment__avatar">
                            <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author">John Doe</div>

                                <div class="comment__meta">
                                    <div class="comment__time">Jun 15, 2018</div>
                                    <div class="comment__reply">
                                        <a class="comment-reply-link" href="#0">Reply</a>
                                    </div>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod
                                    urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et
                                    tantas semper delicatissimi.</p>
                            </div>

                        </div>

                        <ul class="children">

                            <li class="depth-2 comment">

                                <div class="comment__avatar">
                                    <img class="avatar" src="images/avatars/user-03.jpg" alt="" width="50" height="50">
                                </div>

                                <div class="comment__content">

                                    <div class="comment__info">
                                        <div class="comment__author">Kakashi Hatake</div>

                                        <div class="comment__meta">
                                            <div class="comment__time">Jun 15, 2018</div>
                                            <div class="comment__reply">
                                                <a class="comment-reply-link" href="#0">Reply</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment__text">
                                        <p>Duis sed odio sit amet nibh vulputate
                                            cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                                            cursus a sit amet mauris</p>
                                    </div>

                                </div>

                                <ul class="children">

                                    <li class="depth-3 comment">

                                        <div class="comment__avatar">
                                            <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                                        </div>

                                        <div class="comment__content">

                                            <div class="comment__info">
                                                <div class="comment__author">John Doe</div>

                                                <div class="comment__meta">
                                                    <div class="comment__time">Jun 15, 2018</div>
                                                    <div class="comment__reply">
                                                        <a class="comment-reply-link" href="#0">Reply</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="comment__text">
                                                <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
                                                    etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                            </div>

                                        </div>

                                    </li>

                                </ul>

                            </li>

                        </ul>

                    </li> <!-- end comment level 1 -->

                    <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img class="avatar" src="images/avatars/user-02.jpg" alt="" width="50" height="50">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author">Shikamaru Nara</div>

                                <div class="comment__meta">
                                    <div class="comment__time">Jun 15, 2018</div>
                                    <div class="comment__reply">
                                        <a class="comment-reply-link" href="#0">Reply</a>
                                    </div>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                            </div>

                        </div>

                    </li>  <!-- end comment level 1 -->

                </ol>
                <!-- END commentlist -->

            </div> <!-- end col-full -->
        </div> <!-- end comments -->

        <div class="row comment-respond">

            <!-- START respond -->
            <div id="respond" class="col-full">

                <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                    <fieldset>

                        <div class="form-field">
                            <input name="cName" id="cName" class="full-width" placeholder="Your Name*" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email*" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="cWebsite" id="cWebsite" class="full-width" placeholder="Website" value="" type="text">
                        </div>

                        <div class="message form-field">
                            <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message*"></textarea>
                        </div>

                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

                    </fieldset>
                </form> <!-- end form -->

            </div>
            <!-- END respond-->

        </div> <!-- end comment-respond -->

    </div> <!-- end comments-wrap -->

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
                        <img src="images/thumbs/small/tulips-150.jpg" alt="">
                    </a>
                    <h5>10 Interesting Facts About Caffeine.</h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                        <span class="popular__date"><span>on</span> <time datetime="2018-06-14">Jun 14, 2018</time></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/thumbs/small/wheel-150.jpg" alt="">
                    </a>
                    <h5><a href="#0">Visiting Theme Parks Improves Your Health.</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                        <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/thumbs/small/shutterbug-150.jpg" alt="">
                    </a>
                    <h5><a href="#0">Key Benefits Of Family Photography.</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                        <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/thumbs/small/cookies-150.jpg" alt="">
                    </a>
                    <h5><a href="#0">Absolutely No Sugar Oatmeal Cookies.</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                        <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/thumbs/small/beetle-150.jpg" alt="">
                    </a>
                    <h5><a href="#0">Throwback To The Good Old Days.</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                        <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/thumbs/small/salad-150.jpg" alt="">
                    </a>
                    <h5>Healthy Mediterranean Salad Recipes</h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                        <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
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


<!-- s-footer
================================================== -->
@endsection('content')