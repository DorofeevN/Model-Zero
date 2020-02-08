<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{


    use SoftDeletes;
    const UNKNOWN_USER = '1';
    protected $fillable
        =[
            'title',
            'slug',
            'category_id',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',
            //'user_id',
        ];
    /**
     *Категория статьи
     *
     * @return BelongsTo
     */
    public function category(){
        //Категория статьи
        return $this->belongsTo(BlogCategory::class);
    }

    public function user(){
        //Пользователь статьи
        return $this->belongsTo(User::class);
    }

}
