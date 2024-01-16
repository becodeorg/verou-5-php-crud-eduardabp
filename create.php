<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Pokémon Card</title>
</head>
<body>
    <h1>Add Pokémon Card</h1>
    <form action="index.php?action=create" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="hp">HP:</label>
        <input type="number" id="hp" name="hp" required><br>

        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required><br>

        <label for="cardYear">Card Year:</label>
        <input type="number" id="cardYear" name="cardYear" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
