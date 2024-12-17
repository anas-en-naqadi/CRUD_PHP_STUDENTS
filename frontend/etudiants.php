    <?php
    include '../backend/db.php';

    // Lire tous les étudiants
    $sql = "SELECT * FROM etudiant";
    $stmt = $pdo->query($sql);
    $students = $stmt->fetchAll();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Étudiants</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body>
        <?php $current_page = 'etudiants.php';
        include 'navbar.php';
        ?>
        <div class="m-5 d-flex justify-items-center">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Âge</th>
                        <th>Filière</th>
                        <th>Bourse</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($students)): // Si le tableau est vide
                    ?>
                        <tr>
                            <td colspan="9" style="color:red" class="text-center">Il n'y a pas d'étudiants pour le moment !!</td>
                        </tr>
                        <?php
                    else: // Si le tableau contient des étudiants
                        foreach ($students as $student):
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($student['id']) ?></td>
                                <td><?= htmlspecialchars($student['prenom']) ?></td>
                                <td><?= htmlspecialchars($student['nom']) ?></td>
                                <td><?= htmlspecialchars($student['email']) ?></td>
                                <td><?= htmlspecialchars($student['age']) ?></td>
                                <td><?= htmlspecialchars($student['filiere']) ?></td>
                                <td><?= $student['bourse'] ? 'Oui' : 'Non' ?></td>
                                <td><?= htmlspecialchars($student['date_inscription']) ?></td>
                                <td>
                                    <a href="../frontend/form.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                                    <a href="../backend/delete.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');">Supprimer</a>
                                </td>
                            </tr>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>

            </table>
        </div>
    </body>

    </html>