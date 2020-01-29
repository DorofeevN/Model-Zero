<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $fillable
    = [
        'title',
        'slug',
        'parent_id',
        'description'
        ];
    /**Получить родительскую катгеорию
     * @return BlogCategory
     */
    public function parentCategory(){
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }
    /**
     * Пример аксесуара Accessor
     * @url https://laravel.com/docs/5.8/eloquent-mutators
     * @return string
     */
    public function getParentTitleAttribute(){

        $title = $this->parentCategory->title ?? ($this->isRoot() ? 'Корень': '???');
        return $title;
    }
/**Проверка на корневой объект
 *@return bool
 */
    public function isRoot(){
        return $this->id === BlogCategory::ROOT;
    }
    /**Accessor
    *@param string @valueFromDB
    * @return bool|mixed|null|string|string[]
     */
//    public function getTitleAttribute($valueFromObject)
//    {
//        return mb_strtoupper($valueFromObject);
//    }

    /**Mutator
     * @return string $incomingValue
     */

    public function setTitleAttribute($incomingValue){
        $this->attributes['title'] = mb_strtolower($incomingValue);
    }
}
