<form action="<?= url('/auth/news')?>" method="post">
    <label>Title:
        <input type="text" name="title" required/>
    </label>
    <label>Text:
        <textarea name="text" required></textarea>
    </label>
    <input type="submit" value="Добавить"/>
    <a href="<?= url('/auth/news')?>">Все новости</a>
</form>
