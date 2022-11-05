@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 bg-green-300 px-5 py-2 rounded-md shadow mb-3']) }}>
        {{ $status }}
    </div>
@endif
