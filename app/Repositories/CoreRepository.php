<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 19.01.2020
 * Time: 18:03
 */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**Class CoreRepository
 * @package App\Repositories
 * Репозиторий для работы с сущностями:
 * выдаёт наборы данных, не меняя сущности.
 */
abstract class CoreRepository
{
    /** @var Model*/
    protected $model;
    /** CoreRepository constructor*/
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**@return mixed*/

    abstract protected function getModelClass();

    /**@return Model\Illuminate\Foundation\Application\mixed */

    protected function startConditions(){
        return clone $this->model;
    }
}