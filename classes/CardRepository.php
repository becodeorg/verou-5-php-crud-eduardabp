<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(string $name, int $hp, string $type, int $cardYear): void
    {
        try {
            $statement = $this->databaseManager->connection->prepare("INSERT INTO cards (name, hp, type, cardYear) VALUES (?, ?, ?, ?)");
            $statement->execute([$name, $hp, $type, $cardYear]);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Get one
    public function find(): array
    {

    }

    // Get all
    public function get(): array
    {
        try {
            $statement = $this->databaseManager->connection->query("SELECT name, hp, type, cardYear FROM cards");
            $cards = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $cards;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return [];
        }
    }

    public function update(): void
    {

    }

    public function delete(): void
    {

    }

}