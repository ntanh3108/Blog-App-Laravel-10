@props(['bgColor', 'textColor'])

@php
    $textColor = match($textColor){
        'gray' => 'text-gray-800',
        'blue' => 'text-blue-800',
        'red' => 'text-red-800',
        'yellow' => 'text-yellow-800',
        default => 'text-gray-800',
    };

    $bgColor = match($bgColor){
        'gray' => 'bg-gray-100',
        'blue' => 'bg-blue-100',
        'red' => 'bg-red-100',
        'yellow' => 'bg-yellow-100',
        default => 'bg-gray-100',
    };
@endphp

{{-- $attributes nay thua huong lai cac thuoc tinh wire:navigate, href cua file resources\views\post\includes\categories-box.blade.php --}}
<a {{$attributes}} href="#" class="{{$bgColor}} {{$textColor}} rounded-xl px-3 py-1 text-base">
    {{$slot}}
</a>