
    <?php
        include('Model/accesBDD.php');
        include 'head.php';
        include('header.php');
        
        $dbh = connexion();
        
        $lesSeries = rechercherLesSeries($dbh);
        $uneSerie = $lesSeries->fetch(); // Lecture 1ère ligne du jeu d'enregistrements

        
    ?>
<body>
    <div class="container">
        <table class="table">
            <caption>Liste des séries</caption> 
            <thead>
                <tr>
                    <th>No</th>
                    <th>Titre</th>
                    <th>Vue</th>
                    <th>Date</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>     
            <tbody>
                <?php
while ($uneSerie) {
    $no = $uneSerie["id"];
    $nom = $uneSerie["nom"]; // À compléter
    $vue = $uneSerie["vue"];
    $dateVue = $uneSerie["dateVue"];

    // Intégration de la logique conditionnelle
    if ($vue == 0) {
        $affichageDate = $dateVue; // Affiche $dateVue si $vue est égal à 0.
    } elseif ($vue === null) {
        $affichageDate = ''; // Si $vue est null, ne rien afficher (masquer la date).
    } else {
        // Autre logique à exécuter si $vue n'est ni 0 ni null.
        // Vous pouvez ajouter du code supplémentaire ici si nécessaire.
        $affichageDate = ''; // À compléter en fonction de votre logique.
    }

    // Affichage de la ligne de tableau avec la logique conditionnelle
echo "<tr><td>$no</td><td>$nom</td><td>$vue</td><td>$affichageDate</td>";
echo "<td>"
    . "<a class='link' href='voirDetail.php?id=$no'>Détail&nbsp;&nbsp;</a>"
    . "<a class='link' href='voirDetail.php?id=$no'>Modifier&nbsp;&nbsp;</a>"
    . "<a class='link' href='voirDetail.php?id=$no'>Supprimer&nbsp;&nbsp;</a>"
    . "</td></tr>";

    $uneSerie = $lesSeries->fetch(); // Lecture suivante
}



                ?>
            </tbody>
        </table>
        <a href="saisirNouvelleSerie.php"><div class="add">Ajouter une série</div></a>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-bdP2n8U/JPRznQ7Iqj8WdH3+T6hAvcq8Ag/zHvH6eJph/1zQRR66h1MkPyo8Ld1c" crossorigin="anonymous"></script>
</body>
</html>
