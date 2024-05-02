@props([
    'disabled' => false,
    'current' => false,
    'options' => collect([['label' => '選択してください', 'value' => '']]),
    'class' => '',
])

<div class="@twMerge('relative inline-flex gap-1' . ($class ? ' ' . $class : ''))">

  @foreach ($options as $item)
    <label>
      <input type="radio" @disabled($disabled) @checked($current === $item['value']) {{ $attributes }}
        value="{{ $item['value'] }}" class="peer hidden" />
      <span class="@twMerge('peer-checked:border-atlantis-500 rounded border border-gray-600 bg-gray-200 px-4 py-2 text-xs hover:cursor-pointer peer-checked:bg-atlantis-200' . ($class ? ' ' . $class : ''))">
        {{ $item['label'] }}
      </span>
    </label>
  @endforeach
</div>
