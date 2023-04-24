@foreach($news as $newsItem)
    <h1>{{ $newsItem->title }}</h1>
    <p>{{ $newsItem->summary }}</p>

    <a href="/db/detail/{{ $newsItem->id }}">Detaylar >></a>
    <hr />
@endforeach
