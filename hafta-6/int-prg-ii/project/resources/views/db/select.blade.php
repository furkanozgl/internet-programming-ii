@extends('layouts.app')

@section('title' , 'Add News')

@section('content')

@foreach($news as $newsItem)
    <h3>{{ $newsItem->title }}</h3>
    <p>{{ $newsItem->summary }}</p>

    <a href="/db/detail/{{ $newsItem->id }}" class="btn btn-outline-primary">Detaylar >></a>
    <hr />
@endforeach

@endsection
