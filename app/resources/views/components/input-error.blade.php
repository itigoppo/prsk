@props(['messages'])

@if ($messages)
  <ul {{ $attributes->merge(['class' => 'text-sm text-sea-pink-600 dark:text-sea-pink-400 space-y-1']) }}>
    @foreach ((array) $messages as $message)
      <li>{{ $message }}</li>
    @endforeach
  </ul>
@endif
