<?php

namespace App\Http\Controllers\Blog\Admin;


use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;

/**
* @package App\Http\Controllers\Blog\Admin
 */
class PostController extends BaseController
{

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
        //Сервис-провайдер
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
        $this->blogPostRepository = app(BlogPostRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate(12);

        return view('blog.admin.posts.index', compact('paginator'));
    }

    public function create()
    {
        //
        $item = new BlogCategory();

        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.posts.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request, $item)
    {
        //
        $data = $request->input();
        $item = (new BlogPost())->create($data);

        return $item ?
            redirect()
            ->route('blog.admin.posts.edit', $item->id)
            ->with(['success' => 'Успешно сохранено']) :
            back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        if(empty($item)){
            abort(404);
        }

        $categoryList = $this->blogCategoryRepository
            ->getForComboBox();

        return view('blog.admin.posts.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        //dd('asd');
        $item = $this->blogPostRepository->getEdit($id);
        //$item = BlogPost::find($id);
        //dd('adsd ');
        if(empty($item)){
            return back()
                ->withErrors(['msg' => 'Запись id = [{$id}] не найдена'])
                ->withInput();
        }

        $data = $request->all();
//Observer
//        if(empty($data['slug'])){
//            $data['slug'] = \Str::slug($data['title']);
//        }
//
//         if(empty($item->published_at) && $data['is_published']){
//             $data['published_at'] = Carbon::now();
//         }

         $result = $item->update($data);

        return $result ? redirect()
            ->route('blog.admin.posts.edit', $item->id)
            ->with(['success' => 'Успешно сохранено']) : back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->withInput();


       // return redirect()->route('blog.admin.posts.edit', $item->id);

//        if($request){
//            return redirect()
//                ->route('blog.admin.posts.edit', $item->id)
//                ->with(['success' => 'Успешно сохранено']);
//        }    else{
//                return back()
//                    ->route('blog.admin.posts.edit', $item->id)
//                    ->withInput();
//            }

    }

//public function update(Request $request, $id){
//    dd(__METHOD__ ,$request->all(), $id);
//}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $result = BlogPost::destroy($id);

        return $result ? redirect()
            ->route('blog.admin.posts.index')
            ->with(['success' => 'Удаление статьи прошло успешно']) : back()
            ->withErrors(['msg' => 'Ошибка удаления'])
            ->withInput();
    }
}
