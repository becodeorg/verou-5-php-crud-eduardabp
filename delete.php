<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete a Pokémon Card</title>
</head>
<body>
    <h1>Delete a Pokémon Card</h1>
    <h2>Are you sure you want to delete this card?</h2>

    <ul>
        <li>
            <strong>ID: </strong> <?= $card['id'] ?><br>
            <strong>Name: </strong> <?= $card['name'] ?><br>
            <strong>HP: </strong> <?= $card['hp'] ?><br>
            <strong>Type: </strong> <?= $card['type'] ?><br>
            <strong>Card Year: </strong> <?= $card['cardYear'] ?>
        </li>
</ul>
    <form action="index.php?action=delete&id=<?= $card['id'] ?>" method="post">
        <button type="submit">Delete</button>
    </form>
</body>
</html>