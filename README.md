## Introduction

This project is a **simple PHP MVC (Model-View-Controller) application for managing interns** (stagiaires in french). It provides the full CRUD workflow—create, read, update and delete—using a front controller to route requests, PDO for secure database access, and PHP sessions for flash messaging. The codebase is organized into:

- `controller/` for business logic
- `model/` for database operations
- `views/` for HTML templates

By following this structure, the application remains easy to maintain and extend.

## 📁 Structure of the project

```bash
/projet-mvc-login-no-oop
│
├── index.php                 # Front controller
├── README.md            
│
├── /controllers
│   └── auth.php
├── /models
│   └── userModel.php
├── /views
│   └── login.php
│
└── /core
    └── database.php
```

## 🗂️ MVC Structure Diagram

![MVC Diagram](/mvc-diagram.png)

This diagram illustrates the MVC (Model-View-Controller) architecture used in the project.  
- The **View** (`index.php`) displays the user interface.  
- The **Controller** (`stagiaire_controller.php`) handles user input and updates the model or view accordingly.  
- The **Model** (`stagiaire.php`) interacts with the database and contains methods like `findAll()`, `create()`, `edit()`, `destroy()`, and `view()`.

This structure helps keep the code modular, organized, and easier to maintain.

## Database

```sql 
CREATE DATABASE mvc_project;
       
USE mvc_project;

CREATE TABLE stagiaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    age INT(2) NOT NULL,
    login VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

INSERT INTO stagiaire (nom, prenom, age, login, password) VALUES
('Dupont', 'Jean', 22, 'jean.dupont', 'password123'),
('Martin', 'Marie', 21, 'marie.martin', 'secure456'),
('Ahmed', 'Khalid', 23, 'khalid.ahmed', 'stagiaire789'),
('Garcia', 'Sofia', 20, 'sofia.garcia', 'trainee2023');
```

## Note that 

Khassk t9ol f had fichier tari9a kifach tkhadem had projet,
kib7al khassk tcloner w après t7atou f dossier dyal www (en cas de wamp) ou bien http (en cas de xamp) w mn ba3d chouf projet
