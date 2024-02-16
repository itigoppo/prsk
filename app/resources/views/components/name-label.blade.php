@props([
    'type' => 'basic',
    'bgColor',
    'color',
])

<span {{ $attributes->twMerge('rounded border px-2 py-1 text-[10px] leading-none') }}
  @style(['color: ' . $color, 'border-color: ' . $bgColor, 'background-color: #fff' => $type === 'outline', 'background-color: ' . $bgColor => $type !== 'outline'])>{{ $slot }}</span>
