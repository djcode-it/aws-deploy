<?php

namespace App\View\Components;

use App\Models\Todo;
use Illuminate\View\Component;

class TodoTable extends Component
{
    var $todos;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->todos = \Auth::user()->todos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.todo-table');
    }
}
