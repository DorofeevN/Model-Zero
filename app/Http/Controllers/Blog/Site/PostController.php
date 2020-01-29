<?php

namespace App\Http\Controllers\Blog\Site;

use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends BaseController
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

    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);

    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, BlogPostRepository $postRepository, BlogCategoryRepository $categoryRepository)
    {

        $item = $this->blogPostRepository->getEdit($id);

        if(empty($item)){
            abort(404);
        }

        $categoryList = $this->blogCategoryRepository->getForComboBox();

        $thePost = $this->blogPostRepository->getPost($id);
        //dd($thePost);
        return view('blog.site.main.post',
            compact('thePost', 'categoryList'));

    }
}
