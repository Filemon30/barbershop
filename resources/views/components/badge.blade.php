<span {{ $attributes->merge(['class' => 'badge']) }}
      style="background-color: {{ $bgColor }}; color: {{ $textColor }};">
    {{ $slot }}
</span>