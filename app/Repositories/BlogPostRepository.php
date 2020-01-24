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
     * @param int/null $petPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate(){

        $columns = [
            'id', 'title', 'slug', 'is_published', 'published_at', 'user_id', 'category_id'
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
            ->paginate(25);

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


}