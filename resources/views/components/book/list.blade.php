@props(['books'])

<section>
    <div class="border-t-2 border-gray-300 py-3 flex justify-between items-center mb-5">
        <p class="text-xl font-bold">{{ $slot }}</p>
        <a class="underline" href="{{ route('category.show', $books->first()->category->slug) }}">Xem thêm</a>
    </div>
    <div class=" flex mb-10 space-x-10">
        @foreach($books as $book)
        <x-book.item :book="$book"></x-book.item>
        @endforeach
</section>