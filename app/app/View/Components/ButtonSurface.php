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
    public string $mode = 'admin',
    public string $type = 'primary',
    public string $size = 'normal',
    public bool $disabled = false,
    public string $className = '',
  ) {
    $this->className = TailwindMerge::merge([
      'uppercase border border-transparent relative flex items-center justify-center gap-2 rounded px-4 font-bold leading-none tracking-[0.56px] shadow-[0_1px_3px_rgba(0,_0,_0,_0.24)] outline-none hover:opacity-70',
      $mode === 'admin' && $type === 'primary' ? 'bg-gradient-to-r from-puerto-rico-400 to-puerto-rico-300 text-white' : '',
      $mode === 'admin' && $type === 'secondary' ? 'bg-gradient-to-r from-sea-pink-400 to-sea-pink-300 text-white' : '',
      $mode === 'admin' && $type === 'tertiary' ? 'bg-gradient-to-r from-atlantis-400 to-atlantis-300 text-white' : '',
      $mode === 'admin' && $type === 'outline' ? 'bg-white border-puerto-rico-400 text-puerto-rico-400' : '',

      $mode === 'front' && $type === 'primary' ? 'bg-gradient-to-r from-turquoise-400 to-turquoise-300 text-white' : '',
      $mode === 'front' && $type === 'secondary' ? 'bg-gradient-to-r from-wild-watermelon-400 to-wild-watermelon-300 text-white' : '',
      $mode === 'front' && $type === 'tertiary' ? 'bg-gradient-to-r from-picton-blue-400 to-picton-blue-300 text-white' : '',
      $mode === 'front' && $type === 'outline' ? 'bg-white border-turquoise-400 text-turquoise-400' : '',

      $type === 'disabled' ? 'bg-gray-400 text-white' : '',

      $size === 'normal' ? 'py-3 text-sm' : '',
      $size === 'sm' ? 'py-2 text-xs' : '',

      $disabled ? 'hover:cursor-not-allowed hover:opacity-100' : 'hover:cursor-pointer',
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
