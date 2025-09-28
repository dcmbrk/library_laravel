@props(['book', 'class' => ''])

<div {{ $attributes->merge(['class' => "group min-h-[230px] w-[245px] flex flex-col items-center text-center
    leading-tight cursor-pointer $class"]) }}>
    <img src="{{ $book->image }}" alt=""
        class="h-[199px] w-[199px] object-contain transition-transform duration-300 ease-in-out group-hover:scale-110">
    <h3 class="uppercase font-bold font-xs w-full mt-4">{{ $book->title }}</h3>
</div>