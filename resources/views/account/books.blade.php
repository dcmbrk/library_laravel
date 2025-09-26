@extends('layouts.app')

@section('content')

<div class="flex items-center">
    <h2 class="text-xl font-bold mb-5">user_0000 <span>></span> <span>Books</span></h2>
</div>
<x-book.list>Want to Read</x-book.list>
<x-book.list>My Loans</x-book.list>
<x-book.list>Already Read</x-book.list>
<x-book.list>Loan History</x-book.list>
@endsection