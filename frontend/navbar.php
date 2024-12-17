<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestion Étudiants</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'form.php') ? 'active' : ''; ?>" href="form.php">Ajouter Étudiant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'etudiants.php') ? 'active' : ''; ?>" href="etudiants.php">Afficher Étudiants</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
