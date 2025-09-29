@props(['books', 'status'])

@if($books->isNotEmpty())
<section>
    <div class="border-t-2 border-gray-300 py-3 flex justify-between items-center mb-5">
        <p class="text-xl font-bold">{{ $slot }}</p>
        <a class="underline" href="{{ route('account.show', ['status' => $status]) }}">
            Xem thêm
        </a>
    </div>

    <div class="flex mb-10 flex-wrap gap-6">
        @foreach($books as $book)
        <x-book.item :book="$book"></x-book.item>
        @endforeach
    </div>
</section>
@endif