<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>Goodcard - track your collection of Pokémon cards</h1>

<a href="index.php?action=create">Add a Pokémon Card to our Collection</a>

<ul>
    <?php foreach ($cards as $card) : ?>
        <li>
            <strong>ID: </strong> <?= $card['id'] ?><br>
            <strong>Name: </strong> <?= $card['name'] ?><br>
            <strong>HP: </strong> <?= $card['hp'] ?><br>
            <strong>Type: </strong> <?= $card['type'] ?><br>
            <strong>Card Year: </strong> <?= $card['cardYear'] ?><br>
            &nbsp&nbsp
            <a href="index.php?action=edit&id=<?= $card['id'] ?>">Edit</a>&nbsp&nbsp&nbsp&nbsp
            <a href="index.php?action=delete&id=<?= $card['id'] ?>">Delete</a>
        </li><br>
    <?php endforeach; ?>
</ul>

</body>
</html>