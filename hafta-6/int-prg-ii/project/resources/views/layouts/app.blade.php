<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Portal - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">

    <div class="row mb-5">
        <div class="col-12" style="background: cadetblue; border-radius: 10px; padding: 30px;">
            <h1>DPÜ News Portal</h1>
        </div>
    </div>

<div class="row mb-5">
    <div class="col-8">
        @yield('content')
    </div>
    <div class="col-4">
        <div class="list-group">
            @foreach(App\Models\Category::orderBy('order')->get() as $category)
                <a class="list-group-item @if(isset($category_id) && $category->id == $category_id) active @endif"
                   href="/db/category/{{ $category->id }}">  {{ $category->name }}  </a>
            @endforeach

            <a class="list-group-item"  href="/db/add">Add News </a>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col text-center" style="background: cadetblue; border-radius: 10px; padding: 10px;">
            Copyright &copy: 2023 Kütahya Teknik Bilimler Meslek Yüksekokulu
            </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
