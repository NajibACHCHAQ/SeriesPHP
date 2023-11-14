<?php
/*****************************************************************************
 * Regroupement de toutes les fonctions d'accès à la base de données
 ****************************************************************************/

    /**
     * Connexion persistante au serveur
     * @return \PDO Connexion
     */
    function connexion(){
        // Définition des variables de connexion
        $user = "publicSerie";
        $pass = "mdpSerie";
        $dsn ='mysql:host=localhost;dbname=bdserie'; //Data Source Name

        // Connexion 
        try {
            $dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT=>true, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  // Connexion persistante
        }
        catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
        return $dbh;
    }
    
    /**
     * Insertion d'une nouvelle série dans la table serie
     * @param type $dbh         Connexion
     * @param type $nom         nom de la série
     * @param type $vue         1 si vue, 0 si non
     * @param type $dateVue     date de visualisation
     * @param type $feedback   
     */
 function ajouterSerie($dbh, $nom, $vue, $dateVue, $feedback) {
    try {
        // Préparation de la requête SQL d'insertion
        $stmt = $dbh->prepare("INSERT INTO serie (nom, vue, dateVue, remarques) VALUES (:nom, :vue, :dateVue, :feedback)");

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':vue', $vue);
        $stmt->bindParam(':dateVue', $dateVue);
        $stmt->bindParam(':feedback', $feedback);

        // Exécution de la requête
        $stmt->execute();

        // Retourne l'identifiant de la série nouvellement insérée
        return $dbh->lastInsertId();
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur d'insertion : " . $e->getMessage();
        return false; // Ou renvoyez une valeur appropriée en cas d'erreur
    }
}

    
    /**
     * Requete de sélection de toutes les series
     * @param type $dbh connexion
     * @return type jeu d'enregistrements
     */
    function rechercherLesSeries($dbh) {
        $sql = "SELECT * FROM serie;";
		$resultat = $dbh->query($sql);							// Execution de la requete
		if ($resultat === false) {
				afficherErreurSQL("Pb lors de la recherche des series.", $sql, $dbh);
		}
		return $resultat;
    }
    
    /**
     * Recherche de la série dont l'identifiant est passé en paramètre
     * @param type  $dbh connexion
     * @param type  $id  identifiant de la série recherchée
     * @return type jeu d'enregistrement trouvé
     */
    function rechercherUneSerie($dbh, $id) {
        // À compléter
    }
           
    /** afficherErreurSQL : 
     *  Affichage de messages lors l'accès à la bdd avec une requete SQL
     *  @param $message	: message a afficher
     *  @param $req 	: requete executee
     *  @param $dbh     : connexion PDO
    */		
    function afficherErreurSQL($message, $req, $dbh) {
        echo $message . "<br />";
        echo "Requete : " . $req . "<br />";
        print_r($dbh->errorInfo());
        die();
    }
