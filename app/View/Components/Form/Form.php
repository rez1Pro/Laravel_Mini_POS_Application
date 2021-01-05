<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $userId;
    public $adminId;
    public $action;
    public function __construct($userId , $adminId , $action)
    {
        $this->userId = $userId;
        $this->adminId = $adminId;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.Form.form');
    }
}