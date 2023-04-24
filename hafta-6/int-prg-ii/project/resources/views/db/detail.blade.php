@extends('layouts.app')

@section('title' , 'Add News')

@section('content')

<h1 style="color: #000000">{{ $news->title }}  <span class="badge bg-info">{{ $news->category->name }}</span></h1>

<p style="text-decoration: underline; color: #051BF9">{{ $news->summary }}</p>

<p>{{ $news->content }}</p>

<a class="btn btn-outline-danger" href="/db/delete/{{ $news->id }}">Haberi Sil!</a>
|  <a class="btn btn-outline-info" href="/db/edit/{{ $news->id }}">Haberi Düzenle!</a>

@endsection
