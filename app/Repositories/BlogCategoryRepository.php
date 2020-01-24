<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 19.01.2020
 * Time: 18:01
 */
namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**Class BlogCategoryRepository
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**@return string*/

    protected function getModelClass(){
        return Model::class;
    }
    /**@param  int $id
     *@return Model
     */
    public function getEdit($id){
        return $this->startConditions()->find($id);
    }
    /**Получить список категорий для вывода в выпадающем списке
     * @return Collection
     */
    public function getForComboBox(){
        //return $this->startConditions()->all();

        $columns = implode(', ', [
            'id',
            'CONCAT(id, ". ", title) AS id_title',
            ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;

    }

    /**Получить категории для вывода на пагинаторы
     *
     * @param int/null $perPage
     *
     * @return LengthAwarePaginator
    */
    public function getAllWithPaginate($perPage = null){
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with(['parentCategory:id,title',])
            ->paginate($perPage);

        return $result;
    }

}