<?php
include '../backend/db.php'; // Adjust this path as needed

$etudiant = [
    'id' => '',
    'prenom' => '',
    'nom' => '',
    'email' => '',
    'age' => '',
    'filiere' => '',
    'bourse' => '',
    'date_inscription' => '',
];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student data using PDO
    $query = "SELECT * FROM etudiant WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the student exists
        if (!$etudiant) {
            echo "Aucun étudiant trouvé avec cet ID.";
            $etudiant = [
                'id' => '',
                'prenom' => '',
                'nom' => '',
                'email' => '',
                'age' => '',
                'filiere' => '',
                'bourse' => '',
                'date_inscription' => '',
            ];
        }
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des données : " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Étudiant </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php $current_page = 'form.php';
    include 'navbar.php';  ?>
    <div class="container mt-4  mx-5 d-flex justify-items-center flex-column align-items-center">
        <h2 class="text-center mb-4">Formulaire Étudiant</h2>
        <form class="w-50 mb-5" action="<?php echo empty($etudiant['id']) ? '../backend/post.php' : '../backend/put.php?id=' . $etudiant['id']; ?>" method="post">
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" placeholder="Entrez le prénom" required>
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" placeholder="Entrez le nom" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($etudiant['email']); ?>" placeholder="exemple@email.com" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Âge</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($etudiant['age']); ?>" min="0" placeholder="Entrez l'âge" required>
            </div>

            <div class="mb-3">
                <label for="filiere" class="form-label">Filière</label>
                <select class="form-select" id="filiere" name="filiere" required>
                    <option value="" disabled>Sélectionnez une filière</option>
                    <option value="Informatique" <?php echo ($etudiant['filiere'] == 'Informatique') ? 'selected' : ''; ?>>Informatique</option>
                    <option value="Mathématiques" <?php echo ($etudiant['filiere'] == 'Mathématiques') ? 'selected' : ''; ?>>Mathématiques</option>
                    <option value="Physique" <?php echo ($etudiant['filiere'] == 'Physique') ? 'selected' : ''; ?>>Physique</option>
                    <option value="Chimie" <?php echo ($etudiant['filiere'] == 'Chimie') ? 'selected' : ''; ?>>Chimie</option>
                </select>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between w-100 align-items-center ">
                <!-- Bourse -->
                <div class="mb-3">
                    <label class="form-label">Bourse</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" id="bourse_oui" name="bourse" value="1" <?php echo ($etudiant['bourse'] == '1') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="bourse_oui">Oui</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="bourse_non" name="bourse" value="0" <?php echo ($etudiant['bourse'] == '0') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="bourse_non">Non</label>
                        </div>
                    </div>
                </div>

                <!-- Date d'inscription -->
                <div class="mb-3">
                    <label for="date_inscription" class="form-label">Date d'inscription</label>
                    <input type="date" class="form-control" id="date_inscription" name="date_inscription" value="<?php echo htmlspecialchars($etudiant['date_inscription']); ?>" required>
                </div>
            </div>

                <!-- Boutons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary"><?php echo empty($etudiant['id']) ? 'Ajouter' : 'Mettre à jour'; ?></button>

                    <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                </div>
        </form>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>