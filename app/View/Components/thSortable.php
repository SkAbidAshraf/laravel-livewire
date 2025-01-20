<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class thSortable extends Component
{
    /**
     * Create a new component instance.
     */
    public $fieldName;
    public $colName;

    public function __construct($fieldName, $colName)
    {
        // dd($fieldName);
        $this->fieldName = $fieldName;
        $this->colName = $colName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.th-sortable');
    }
}
