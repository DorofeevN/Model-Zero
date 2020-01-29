<?php

namespace App\Http\Controllers\Blog\Site;

use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;

    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;


    /**
     * PostController constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    public function __invoke($id, BlogCategoryRepository $categoryRepository, BlogPostRepository $postRepository)
    {
        $item = $categoryRepository->getEdit($id);

         if(empty($item)){
            abort(404);
        }

        $categoryList = $this->blogCategoryRepository->getForComboBox();

        $categoryPosts = $this->blogPostRepository->getSomeWithPaginate($id, 12);
        //dd($categoryPosts);
        return view('blog.site.main.category',
            compact('categoryPosts', 'categoryList'));
    }
}
