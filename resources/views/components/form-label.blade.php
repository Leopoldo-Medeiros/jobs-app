<!-- resources/views/components/form-label.blade.php -->
<label {{ $attributes->merge(['class' => 'block text-sm font-bold mb-2 ' . ($textColor ?? 'text-black')]) }}>
    {{ $slot }}
</label>
