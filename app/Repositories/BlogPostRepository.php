<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**Class BlogCategoryRepository
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository{

    /**
     * @return string
     */

    protected function getModelClass()
    {

        return Model::class;
    }
    /**Получить список статей для вывода на пагинаторы
     *
     * @param int/null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage){

        $columns = [
            'id', 'title', 'slug', 'is_published', 'published_at', 'user_id', 'category_id',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            //->with(['category', 'user'])
            ->with([
                'category' => function ($query) {
                    $query->select(['id', 'title']);
               },
                'user:id,name',])
            ->paginate($perPage);

        return $result;
    }
    /**Получить список статей для вывода на пагинаторы
     *
     * @param int/null $quantity
     *
     * @return LengthAwarePaginator
     */
    public function getSomeWithPaginate($category_id, $quantity){

        $columns = [
            'id', 'title', 'is_published', 'published_at', 'user_id', 'category_id', 'excerpt'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('published_at', 'DESC')
            //->with(['category', 'user'])
            ->where('is_published', 1)
            ->where('category_id', $category_id)
            ->with([
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                },
                'user:id,name',])
            ->paginate($quantity);

        return $result;
    }

    /**Получить модель редактирования в админке
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id){
        //dd($this->startConditions()->find($id));
        return $this->startConditions()->find($id);
    }

    public function getPost($id){
        $columns = [
            'id', 'title', 'is_published', 'published_at', 'user_id', 'category_id', 'excerpt', 'content_html'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            //->with(['category', 'user'])
            ->with([
                'user' => function ($query) {
                    $query->select(['id', 'name']);
                },])
            ->where('id', $id)
            ->get()
            //->toArray();
            ->first();

        //$result = $result[0];

        //dd($result, $id);

        return $result;

    }


}