@props([
    'disabled' => false,
    'current' => false,
    'class' => '',
])
<div>
  <label>
    <input type="checkbox" @disabled($disabled) @checked($current) {{ $attributes }}
      class="peer hidden" />
    <span class="@twMerge('peer-checkedborder-atlantis-300 rounded border border-gray-600 bg-gray-400 px-4 py-2 text-xs hover:cursor-pointer peer-checked:bg-atlantis-200' . ($class ? ' ' . $class : ''))">
      {{ $slot }}
    </span>
  </label>
</div>
