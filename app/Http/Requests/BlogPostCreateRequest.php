<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 23.01.2020
 * Time: 13:07
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class BlogPostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:200',
            'slug' => 'max:200',
            'content_raw' => 'required|string|min:5|max:10000',
            'category_id' => 'required|integer|exists:blog_categories,id'
        ];

    }

//    public function messages()
//    {
//        return [
//          'title' => 'required|min:5|max:200|unique:blog_posts',
//           'slug' => 'max:200',
//            'description' => 'string|max:500|min:3',
//            'parent_id' => 'required|integer|exists:blog_categories, id',
//        ];
//    }

    public function messages(){
        return [
          'title.required' => 'Введите заголовок статьи',
          'content_raw.min' => 'Минимальная длина статьи [:min] символов',
        ];
    }

}