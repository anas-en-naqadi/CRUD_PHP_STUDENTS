<?php
include 'db.php';

$id = $_GET['id'];
$sql = "UPDATE etudiant SET prenom = :prenom, nom = :nom, email = :email, age = :age, 
        filiere = :filiere, bourse = :bourse, date_inscription = :date_inscription WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':prenom' => $_POST['prenom'],
    ':nom' => $_POST['nom'],
    ':email' => $_POST['email'],
    ':age' => $_POST['age'],
    ':filiere' => $_POST['filiere'],
    ':bourse' => $_POST['bourse'],
    ':date_inscription' => $_POST['date_inscription'],
    ':id' => $id,
]);
header('Location: ../frontend/etudiants.php');
exit();