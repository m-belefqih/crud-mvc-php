<?php

function database_connection()
{
    return new PDO('mysql:dbname=mvc_project;host=localhost', 'root', '');
}

function findAll()
{
    $pdo = database_connection();
    return $pdo->query('SELECT * FROM stagiaire ORDER BY id DESC')->fetchAll(PDO::FETCH_OBJ);
}

//function create()
//{
//    extract($_POST); // $_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['login'], $_POST['password']
//    $pdo = database_connection();
//    $sqlState = $pdo->prepare("INSERT INTO stagiaire VALUES(null,?,?,?,?,?)");
//    return $sqlState->execute([$nom, $prenom, $age, $login, $password]);
//}

function create()
{
    // Vérification des champs POST avant de les utiliser
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $age = htmlentities($_POST['age']);
    $login = htmlentities($_POST['login']);
    $password = htmlentities($_POST['password']);

    $pdo = database_connection();
    $sqlState = $pdo->prepare("INSERT INTO stagiaire VALUES(null,?,?,?,?,?)");
    return $sqlState->execute([$nom, $prenom, $age, $login, $password]);
}

function edit($id, $nom, $prenom, $age, $login, $password)
{
    $pdo = database_connection();
    $sqlState = $pdo->prepare("UPDATE stagiaire
                                    SET nom = ? ,
                                        prenom = ? , 
                                        age = ? , 
                                        login = ? , 
                                        password = ?
                                    WHERE id = ?");
    return $sqlState->execute([$nom, $prenom, $age, $login, $password, $id]);
}

function destroy($id)
{
    $pdo = database_connection();
    $sqlState = $pdo->prepare("DELETE FROM stagiaire WHERE id = ?");
    return $sqlState->execute([$id]);
}

function view($id)
{
    $pdo = database_connection();
    $sqlState = $pdo->prepare("SELECT * FROM stagiaire WHERE id = ?");
    $sqlState->execute([$id]);
    return $sqlState->fetch(PDO::FETCH_OBJ);
}