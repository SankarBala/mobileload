<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.client.sidebar')->withUser(Auth::user());
    }
}
