@extends('layouts.app')
@section('content')
<x-book.section-account :books="$books">{{$books->first()->pivot->status}}</x-book.section-account>
@endsection