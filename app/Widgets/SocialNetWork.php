<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Info;

class SocialNetWork extends AbstractWidget
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

        return view("widgets.social_net_work", [
            'listInfo' => Info::all(),
        ]);
    }
}