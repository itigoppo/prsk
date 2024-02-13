@props([
    'disabled' => false,
    'current' => false,
    'options' => collect([['label' => '選択してください', 'value' => '']]),
    'class' => '',
])

<span class="@twMerge('relative inline-flex' . ($class ? ' ' . $class : ''))">
  <select {{ $attributes }} @class([
      'flex-auto appearance-none rounded border border-gray-400 py-[11px] pl-4 pr-10 text-sm leading-none shadow-[0_1px_3px_rgba(0,_0,_0,_0.24)] focus:border-puerto-rico-300 focus:ring-puerto-rico-300',
      'pointer-events-none bg-gray-20 shadow-none' => $disabled,
  ])>
    @foreach ($options as $item)
      <option value="{{ $item['value'] }}" @selected($current === $item['value'])>{{ $item['label'] }}</option>
    @endforeach
  </select>
</span>
