<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MaterialSymbol extends Component
{
  /**
   * Create a new component instance.
   */
  public function __construct(
    public string $type = 'outlined',
    public bool $fill = false,
    public int $weight = 400,
    public int $grade = 0,
    public int $opticalSize = 24
  ) {
    //
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.material-symbol');
  }
}
