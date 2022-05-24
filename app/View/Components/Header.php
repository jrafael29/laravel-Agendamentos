<?php

namespace App\View\Components;

use App\Models\Evento;
use Illuminate\View\Component;

class Header extends Component
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
        $pendentes = Evento::where('accepted', '0')->paginate(2);


        return view('components.header', [
            'pendentes' => $pendentes
        ]);
    }
}
