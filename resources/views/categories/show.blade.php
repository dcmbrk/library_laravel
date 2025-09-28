@extends('layouts.app')
@section('content')
<x-book.section :books="$books">{{$category->name}}</x-book.section>
@endsection