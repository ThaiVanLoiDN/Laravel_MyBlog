<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Post;

class PopularPost extends AbstractWidget
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

        return view("widgets.popular_post", [
            'popular_post' => Post::orderBy('read_count', 'desc')->limit(2)->get(),
        ]);
    }
}