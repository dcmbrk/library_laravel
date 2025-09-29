@props(['books'])
<!-- <div class="flex items-center justify-center">
    <section class="grid grid-cols-5 gap-y-6 justify-around">
        @foreach($books as $book)
        <x-book.item :book="$book"></x-book.item>
        @endforeach

</div>
-->

<div>
    <section class="grid grid-cols-4 gap-y-6 w-[900px] mx-auto justify-items-center">
        @foreach($books as $book)
        <x-book.item :book=" $book" class="p-2"></x-book.item>
        @endforeach
    </section>
    <div class="mt-6 mb-2 flex justify-center items-center">
        {{ $books->links() }}
    </div>
</div>