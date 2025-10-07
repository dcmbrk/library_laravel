@props(['books'])

<div>
    <!-- <p class="font-bold text-md mb-4 uppercase">{{ $slot }}</p> -->
    <section class="grid grid-cols-4 gap-y-6 gap-x-[200px]  w-[900px] mx-auto justify-items-center">
        @foreach($books as $book)
        <x-book.item :book=" $book" class="p-2"></x-book.item>
        @endforeach
    </section>
    <div class="mt-4 mb-2 flex justify-center items-center">
        {{ $books->links() }}
    </div>
</div>