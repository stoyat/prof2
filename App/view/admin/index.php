<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create</title>
</head>
<body>
<h2>Список</h2>
<p><a href="add.php">Добавить новость</a></p>
<div class="container">
        <table border="1" cellpadding="20px">
            <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>del</th>
                <th>upd</th>
            </tr>
            </thead>
            <tbody>
            <? foreach($news as $item):?>
            <tr>
                    <td><p><? echo $item->id;?></p></td>
                    <td><p><? echo $item->title;?></p></td>
                    <td><a href="update.php?id=<? echo $item->id?>">update</a></td>
                    <td><a href="delete.php?id=<? echo $item->id?>">delete</a></td>
            </tr>
            <? endforeach;?>
            </tbody>
        </table>
</body>
</html>