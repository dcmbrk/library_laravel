@props(['selected' => false])

@php
$class = $selected
? 'p-2 text-white border text-xs border-white bg-black w-[80px] block'
:'p-2 text-black border text-xs border-black bg-white w-[80px] block hover:text-white hover:bg-black transition-colors
duration-300';
@endphp


<p>
    <a href="" class="{{ $class }}">{{ $slot }}</a>
</p>