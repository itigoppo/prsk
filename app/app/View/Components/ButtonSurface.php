<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use TailwindMerge\Laravel\Facades\TailwindMerge;

class ButtonSurface extends Component
{
  /**
   * Create a new component instance.
   */
  public function __construct(
    public string $type = 'primary',
    public string $size = 'normal',
    public bool $disabled = false,
    public string $className = '',
  ) {
    $this->className = TailwindMerge::merge([
      'uppercase border border-transparent relative flex items-center justify-center gap-2 rounded px-4 font-bold leading-none tracking-[0.56px] shadow-[0_1px_3px_rgba(0,_0,_0,_0.24)] outline-none hover:opacity-70',
      $type === 'primary' ? 'bg-gradient-to-r from-puerto-rico-400 to-puerto-rico-300 text-white' : '',
      $type === 'secondary' ? 'bg-gradient-to-r from-sea-pink-400 to-sea-pink-300 text-white' : '',
      $type === 'tertiary' ? 'bg-gradient-to-r from-atlantis-400 to-atlantis-300 text-white' : '',
      $type === 'outline' ? 'bg-white border-puerto-rico-400 text-puerto-rico-400' : '',
      $type === 'disabled' ? 'bg-gray-400 text-white' : '',

      $size === 'normal' ? 'py-3 text-sm' : '',
      $size === 'sm' ? 'py-2 text-xs' : '',

      $disabled ? 'cursor-not-allowed hover:opacity-100' : 'cursor-pointer',
    ]);
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.button-surface');
  }
}
