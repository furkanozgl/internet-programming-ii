<style type="text/css">
    input, textarea{
        display: block;
        width: 400px;
        clear: both;
        margin-bottom: 25px;
    }

    textarea.summary{
        height: 200px;
    }

    textarea.content{
        height: 400px;
    }
</style>

<form method="post">
    @csrf
    Başlık:
    <input type="text" name="title" value="{{ $newsDetail->title }}" />
    Özet:
    <textarea name="summary" class="summary">{{ $newsDetail->summary }}</textarea>
    İçerik:
    <textarea name="content" class="content">{{ $newsDetail->content }}</textarea>
    <input type="submit" value="Haberi Güncelle">
</form>
