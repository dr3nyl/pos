<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $outerDivAttribute;
    public $innerDivAttribute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($outerDivAttribute, $innerDivAttribute)
    {
        $this->outerDivAttribute = $outerDivAttribute;
        $this->innerDivAttribute = $innerDivAttribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
