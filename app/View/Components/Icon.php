<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Icon extends Component
{
    public string $src;

    public function __construct($src)
    {
        $this->src = asset('icons/' . $src);
    }

    public function render(): View
    {
        return view('components.icon');
    }
}
