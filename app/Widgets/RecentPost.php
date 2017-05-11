<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Post;

class RecentPost extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view("widgets.recent_post", [
            'recent_post' => Post::orderBy('id', 'desc')->limit(2)->get(),
        ]);
    }
}