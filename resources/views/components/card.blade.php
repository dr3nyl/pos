<div {{ $attributes->merge(['class' => 'flex items-center justify-center '.$outerDivAttribute]) }}>
    <div {{ $attributes->merge(['class' => 'bg-white border-b border-gray-200 rounded-lg shadow-lg '.$innerDivAttribute]) }}>
        {{ $slot }}
    </div>
</div>