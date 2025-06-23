<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SaveButton extends Component
{
    protected $id;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $text = 'Save', string $id = 'saveBtn')
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.save-button', ['id' => $this->id, 'text' => $this->text]);
    }
}
