<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit a Pokémon Card</title>
</head>
<body>
    <h1>Edit a Pokémon Card</h1>
    <h2>Spotted something wrong with your entry or our database? You can edit it here.</h2>
    <form action="index.php?action=edit&id=<?= $card['id'] ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $card['name'] ?>" required><br>

        <label for="hp">HP:</label>
        <input type="number" id="hp" name="hp" value="<?= $card['hp'] ?>" required><br>

        <label for="type">Type:</label>
        <input type="text" id="type" name="type" value="<?= $card['type'] ?>" required><br>

        <label for="cardYear">Card Year:</label>
        <input type="number" id="cardYear" name="cardYear" value="<?= $card['cardYear'] ?>" required><br>

        <button type="submit">Update Pokémon Card</button>
    </form>
</body>
</html>
