<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{


    /**
     * Инфа
     * @url https://laravel.com/docs/6.0/collections
     * Справка
     * @url https://laravel.com/api/6.0/Illuminate/Support/Collection.html
     * Коллекция для моделей Eloquent
     * @url https://laravel.com//api/6.0/Illuminate/Database/Eloquent/Collection.html
     * !Билдер запросов!
     * @url https://laravel.com/docs/6.0/queries
     */
    public function collections(){

    $result = [];

    /**
     * @var \Illuminate\Database\Eloquent\Collection $eloquentCollection
     */
    $eloquentCollection = BlogPost::withTrashed()->get();

    dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

    /**
     * @var \Illuminate\Database\Eloquent\Collection $collection
     */

    $collection = collect($eloquentCollection->toArray());

    dd(get_class($eloquentCollection), get_class($collection), $collection);


    }
}
