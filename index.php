<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'create':
        create();
        break;
    default:
        overview();
        break;
}

function overview()
{
    // Load your view
    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    global $cardRepository; 
    $cards = $cardRepository->get();
    require 'overview.php';
}

function create()
{
    global $cardRepository;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $hp = (int)$_POST['hp'] ?? 0;
        $type = $_POST['type'] ?? '';
        $cardYear = (int)$_POST['cardYear'] ?? 0;

        // Validate form data (add more validation as needed)

        // Save the new Pokémon card to the database
        $cardRepository->create($name, $hp, $type, $cardYear);

        // Redirect to the overview page after creating the card
        header('Location: index.php');
        exit;
    }

    // If not a POST request, show the create form
    require 'create.php';
}