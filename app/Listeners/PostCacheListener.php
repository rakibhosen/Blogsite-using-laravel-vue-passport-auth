<?php

namespace App\Listeners;

use App\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        cache()->forget('posts'); //forget all the cache data initially 

        $post = Post::all(); //fetch all data

        cache()->forever('posts', $post);
    }
}
