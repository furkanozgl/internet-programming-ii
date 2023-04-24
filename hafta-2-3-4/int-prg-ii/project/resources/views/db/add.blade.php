<form method="post" action="/db/insert">
    @csrf
    <input type="text" name="title" placeholder="Title" /> <br /><br />
    <textarea name="summary" placeholder="Summary"></textarea><br /><br />
    <textarea name="content" placeholder="Content"></textarea> <br /><br />
    <input type="submit" value="Create News!">
</form>
