<?php

include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $filiere = $_POST['filiere'];
    $bourse = $_POST['bourse'];
    $date_inscription = $_POST['date_inscription'];

    $sql = "INSERT INTO etudiant (prenom, nom, email, age, filiere, bourse, date_inscription) 
            VALUES (:prenom, :nom, :email, :age, :filiere, :bourse, :date_inscription)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':email' => $email,
            ':age' => $age,
            ':filiere' => $filiere,
            ':bourse' => $bourse,
            ':date_inscription' => $date_inscription,
        ]);
        header('Location: ../frontend/etudiants.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout : " . $e->getMessage();
    }
} else {
    echo "Méthode non autorisée.";
}

?>