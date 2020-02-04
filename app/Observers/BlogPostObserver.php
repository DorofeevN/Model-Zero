<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostObserver
{



    public function creating(BlogPost $blogPost){
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }



    /**
     * Handle the blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
        //$test[] = $blogPost->isDirty();

    }



    public function updating(BlogPost $blogPost){
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);

        $this->setHtml($blogPost);

        $this->setUser($blogPost);
    }
    /**
     * Handle the blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {

    }


    public function deleting($id){

//        //dd(__METHOD__, $blogPost);
//        $result = BlogPost::destroy($id);
//
//        return $result
//            ? redirect()
//                ->route('blog.admin.posts.index')
//                ->with(['success' => 'Удаление статьи прошло успешно'])
//            : back()
//                ->withErrors(['msg' => 'Ошибка удаления1'])
//                ->withInput();
    }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
    /** В случае пустой даты публикации и утстановки флага
     *опубликовано - устанавливаем дату публикации на текущую
     */
    protected function setPublishedAt(BlogPost $blogPost){
        if(empty($blogPost->published_at) && $blogPost->is_published){
            $blogPost->published_at = Carbon::now();
        }
    }
    /**В случае пустого слага
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost){
        if (empty($blogPost->slug)){
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }

    protected function setHtml(BlogPost $blogPost){
        if ($blogPost->isDirty('content_raw')){
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    protected function setUser(BlogPost $blogPost){
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }




}
