<?php
session_start();

// la liaison entre le modèle et la vue via le contrôleur
require_once 'controller/stagiaire_controller.php';

// Création d'un routeur.
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'create':
            createAction();
            break;
        case 'list':
            indexAction();
            break;
        case 'destroy':
            destroyAction();
            break;
        case 'edit':
            editAction();
            break;
        case 'store':
            storeAction();
            break;
        case 'update':
            updateAction();
            break;
        case 'delete':
            deleteAction();
            break;
        default:
            // Handle invalid actions
            echo "Action non reconnue";
            // Return page of error 404
            break;
    }
} else {
    // Default action when no action parameter is provided
    indexAction(); // Typically shows the list view as default
}