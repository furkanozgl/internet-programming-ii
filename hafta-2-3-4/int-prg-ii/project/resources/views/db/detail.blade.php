<h1 style="color: #000000">{{ $newsDetail->title }}</h1>

<p style="text-decoration: underline; color: #051BF9">{{ $newsDetail->summary }}</p>

<p>{{ $newsDetail->content }}</p>

<a href="/db/delete/{{ $newsDetail->id }}" style="color: red;">Haberi Sil!</a>
|  <a href="/db/edit/{{ $newsDetail->id }}" style="color: cadetblue;">Haberi Düzenle!</a>
