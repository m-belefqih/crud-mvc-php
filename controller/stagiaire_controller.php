<?php
// la liaison entre le modèle et la vue via le contrôleur
require_once 'model/stagiaire.php';

function indexAction()
{
    if (isset($_SESSION['messageSuccess'])) {
        $messageSuccess = $_SESSION['messageSuccess'];
        unset($_SESSION['messageSuccess']);
    }
    
    $stagiaires = findAll();
    require_once 'views/liste_stagiaires.php';
}

function createAction()
{
    require_once 'views/create.php';
}

function storeAction()
{
    $nom      = trim(isset($_POST['nom'])      ? $_POST['nom']      : '');
    $prenom   = trim(isset($_POST['prenom'])   ? $_POST['prenom']   : '');
    $age      = trim(isset($_POST['age'])      ? $_POST['age']      : '');
    $login    = trim(isset($_POST['login'])    ? $_POST['login']    : '');
    $password = trim(isset($_POST['password']) ? $_POST['password'] : '');

    if ($nom === '' || $prenom === '' || $age === '' || $login === '' || $password === '') {
        $message = "Veuillez remplir tous les champs";
        require_once 'views/create.php';
    } else {
        create();
        $_SESSION['messageSuccess'] = "Le stagiaire a été ajouté avec succès";

        header('Location: index.php?action=list');
    }
}

function editAction()
{
    $id = $_GET['id'];
    $stagiaire = view($id);
    require_once 'views/edit.php';
}

function updateAction()
{
    extract($_POST);
    edit($id, $nom, $prenom, $age, $login, $password);

    $_SESSION['messageSuccess'] = "Le stagiaire a été modifié avec succès";

    header('location:index.php?action=list');
}

function deleteAction()
{
    $id = $_GET['id'];
    require_once 'views/delete.php';
}

function destroyAction()
{
    destroy($_GET['id']);

    $_SESSION['messageSuccess'] = "Le stagiaire a été supprimé avec succès";

    header('location:index.php?action=list');

}