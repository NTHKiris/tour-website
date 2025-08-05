<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TitleAbout extends Component
{
    public $smtitle;
    public $lgtitle;
    public function __construct($smtitle, $lgtitle)
    {
        $this->smtitle = $smtitle;
        $this->lgtitle = $lgtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.title-about');
    }
}
