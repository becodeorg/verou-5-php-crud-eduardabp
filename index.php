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
    case 'edit':
        edit();
        break;
    case 'delete':
        delete();
        break;
    default:
        overview();
        break;
}

function overview()
{
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

        $cardRepository->create($name, $hp, $type, $cardYear);

        echo "Your card has been added to the database!";
    } 
    require 'create.php';
}

function edit()
{
    $id = (int)$_GET['id'] ?? 0;
    global $cardRepository;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $hp = (int)$_POST['hp'] ?? 0;
        $type = $_POST['type'] ?? '';
        $cardYear = (int)$_POST['cardYear'] ?? 0;

        $cardRepository->update($id, $name, $hp, $type, $cardYear);

        header('Location: index.php');
        exit;
    }

    $card = $cardRepository->find($id);
    if (!$card) {
        echo "Card not found";
        exit;
    }

    require 'edit.php';
}

function delete()
{
    $id = (int)$_GET['id'] ?? 0;
    global $cardRepository;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
        $cardRepository->delete($id);

        header('Location: index.php');
        exit;
    }

    $card = $cardRepository->find($id);
    if (!$card) {
        echo "Card not found";
        exit;
    }

    require 'delete.php';
}
