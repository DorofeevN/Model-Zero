<?php

namespace App\Http\Controllers\Blog\Admin;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Repositories\BlogCategoryRepository;
use App\Models\BlogCategory;
use Illuminate\Http\Response;

/**
 * Управляем категориями блога
 * Class CategoryController
 * @package App\Http\Controllers\Blog\Admin
 */
class CategoryController extends BaseController
{
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
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     *
     * @return Response
     *
     */
    public function index()

    {
        //$paginator = BlogCategory::paginate(10);
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(12);
        return view('blog.admin.categories.index', compact('paginator'));
        //dd(__METHOD__);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(__METHOD__);
        $item = new BlogCategory();
        //$categoryList = BlogCategory::all();
        $categoryList = $this
            ->blogCategoryRepository
            ->getForComboBox();

        return view('blog.admin.categories.edit', compact('item',
            'categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        //dd(__METHOD__);
        $data = $request->input();

        //Observer
//        if (empty($data['slug'])){
//            $data['slug'] = str_slug($data['title']);
//        }



        $item = new BlogCategory($data);
        $item->save();

        //$item = (new BlogCategory())
        //    ->create($data);

        if($item){
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        }else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
        //dd(__METHOD__);
        //$item = BlogCategory::findOrFail($id);
        //$categoryList = BlogCategory::all();

        $item = $categoryRepository->getEdit($id);

//        $v['title_before'] = $item->title;
//
//        $item->title = 'NewRandomTitleForChecking';
//
//        $v['title_after'] = $item->title;
//        $v['getAttribute'] = $item->getAttribute('title');
//        $v['attributesToArray'] = $item->attributesToArray();
//        $v['getAttributeValue'] = $item->getAttributeValue('title');
//        $v['getMutatedAttributes'] = $item->getMutatedAttributes();
//        $v['hasGetMutator for title'] = $item->hasGetMutator('title');
//        $v['toArray'] = $item->toArray();
//
//        dd($v, $item);

        if(empty($item)){
            abort(404);
        }

        $categoryList = $categoryRepository->getForComboBox();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *BlogCategoryUpdateRequest $request
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {

        //$validatedData = $this->validate($request, $rules);
        //$validatedData = $this->validate($rules);
        //dd(__METHOD__, $request->all(), $id);
        $item = BlogCategory::find($id);
        if (empty($item)){
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();

        }

        $data = $request->all();
//        $result = $item
//            ->fill($data)
//            ->save();

        //Observer
//        if (empty($data['slug'])){
//            $data['slug'] = str_slug($data['title']);
//        }

        $result = $item->update($data);

        if ($result){
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено. Поздравляю!']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
