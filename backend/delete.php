<?php
include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM etudiant WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

header('Location: ../frontend/etudiants.php');
exit();