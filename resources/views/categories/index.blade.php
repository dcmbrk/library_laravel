@extends('layouts.app')
@section('content')
<x-banner></x-banner>
<x-book.list :books="$best_sellers">{{ $best_sellers->first()->category->name }}</x-book.list>
<x-book.list :books="$modern_literature">{{ $modern_literature->first()->category->name}}</x-book.list>
@endsection