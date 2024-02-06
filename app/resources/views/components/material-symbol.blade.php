<span {{ $attributes->merge(['class' => "material-symbols-$type inline-block shrink-0 overflow-hidden"]) }}
  style="font-variation-settings: 'FILL' {{ $fill ? 1 : 0 }}, 'wght' {{ $weight }}, 'GRAD' {{ $grade }}, 'opsz' {{ $opticalSize }}; font-size: {{ $opticalSize }}px">
  {{ $slot }}
</span>
