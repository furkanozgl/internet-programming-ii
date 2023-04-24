@extends('layouts.app')

@section('title' , 'Add News')

@section('content')

    @if($errors->isNotEmpty())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif



    <form method="post" action="/db/edit/{{ $newsDetail->id }}">
        @csrf
        <label>Category</label>
        <select name="category_id" class="form-control mb-5">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"  @if($category->id == $newsDetail->category_id) selected @endif> {{ $category->name }} </option>
            @endforeach

        </select>

        <label>Title</label>
        <input class="form-control @if (in_array('title', $errors->keys()))is-invalid @endif" type="text" name="title" placeholder="Title" value="{{ old('title', $newsDetail->title) }}" /> <br /><br />

        <label>Summary</label>
        <textarea style="height: 150px;" class="form-control @if (in_array('summary', $errors->keys()))is-invalid @endif" name="summary" placeholder="Summary" value="{{ old('summary', $newsDetail->summary) }}"></textarea><br /><br />

        <label>Content</label>
        <textarea style="height: 300px;" class="form-control @if (in_array('content', $errors->keys()))is-invalid @endif" name="content" placeholder="Content" value="{{ old('content', $newsDetail->content) }}"></textarea> <br /><br />
        <input class="btn btn-primary" type="submit" value="Update News!">
    </form>

@endsection
