<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Category as TableCategory;

class Category extends AbstractWidget
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

        return view("widgets.category", [
            'listCategory' => TableCategory::all(),
        ]);
    }
}