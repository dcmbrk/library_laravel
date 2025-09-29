@props(['books'])
<div>
    <section class="grid grid-cols-5 gap-y-6 mx-auto justify-items-center">
        @foreach($books as $book)
        <x-book.item :book=" $book" class="p-2"></x-book.item>
        @endforeach
    </section>
    <div class="mt-6 mb-2 flex justify-center items-center">
        {{ $books->links() }}
    </div>
</div>