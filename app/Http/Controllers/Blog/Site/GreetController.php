<?php

namespace App\Http\Controllers\Blog\Site;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;

class GreetController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct(){
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    public function index()

    {
        //$paginator = BlogCategory::paginate(10);
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        $featured_random = $this->blogPostRepository->getFeaturedRandom(3);

        $recent_post_paginator = $this->blogPostRepository->getAllWithPaginate(12);

        $popular_random = $this->blogPostRepository->getPopularRandom(6);



        //dd($recent_post_paginator);

        //dd($featured_random);
        return view('blog.site.main.index', compact('recent_post_paginator',
            'categoryList', 'featured_random', 'popular_random'));
        //dd(__METHOD__);
    }



}
