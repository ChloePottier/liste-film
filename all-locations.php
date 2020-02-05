<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Locations : triés par filtre</title>
</head>
<body>
<h1>Afficher toutes les locations et les trier par filtre</h1>
<?php
$userBdd ='root';
$pass ='';
//Connexion à la BDD en PDO
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $userBdd, $pass);
    // print 'connexion bdd ok'; //juste pour voir si il se connecte correctement

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

        // requete afficher tous les films disponibles
        $sqlUser = "SELECT * FROM `client`"; 
        //exécute la requête SQL 
        $dbh->query($sqlUser);
        //resultat de la requete
        $reqUser = $dbh->query($sqlUser);

        // requete afficher tous les films disponibles
        $sqlFilm = "SELECT * FROM `film`"; 
        //exécute la requête SQL 
        $dbh->query($sqlFilm);
        //resultat de la requete
        $reqFilm = $dbh->query($sqlFilm);
        // requete afficher tous les films disponibles
        $sqlDuree = "SELECT DISTINCT Duree FROM `location` ORDER BY Duree"; 
        //exécute la requête SQL 
        $dbh->query($sqlDuree);
        //resultat de la requete
        $reqDuree = $dbh->query($sqlDuree);



?>

    <div>
    <form action="" method="get">
        <select name="id_client">
        <option value="" selected>Sélectionner un client</option>
            <?php
            while($reqUserFinal=$reqUser->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'. $reqUserFinal['id'].'" >'.$reqUserFinal['Nom']." " .$reqUserFinal['Prenom'].'</option> ';
            }
            ?>
        </select>
        <select name="id_film">
        <option value="" selected>Sélectionner un film</option>
            <?php while($reqFilmFinal=$reqFilm->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'. $reqFilmFinal['id'].'">'.$reqFilmFinal["titre"].'</option> ';
            }?>
        </select>
        <select name="dureeLoc">
        <option value=""selected>Sélectionner une durée</option>
            <?php while($reqDureeFinal=$reqDuree->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'. $reqDureeFinal['Duree'].'">'.$reqDureeFinal["Duree"].'</option> ';
            }
            ?>
        </select>
        <label for="dateDebut">Date début</label>
        <input type="date" name="dateDebLoc">
        <label for="dateFin">Date fin</label>
        <input type="date" name="dateFinLoc">
        <button type="submit" value="filtrer">Chercher</button>
    </form>



        <?php 
               if (!empty($_GET['id_client'])){
                 // requete afficher tous les films disponibles
                $sqlUserSelect = "SELECT Nom, Prenom, titre, date_debut_location, Duree FROM client 
                INNER JOIN location ON location.id_client = client.id
                JOIN film ON film.id = location.id_film
                WHERE client.id=".$_GET['id_client'].""; 
                //exécute la requête SQL 
                $dbh->query($sqlUserSelect);
                //resultat de la requete
                $reqUserSelect = $dbh->query($sqlUserSelect);
               
                echo '<ul> <span> Le client '.$_GET['id_client'].' a loué : </span><br />';
                while($reqUserFinalSelect=$reqUserSelect->fetch(PDO::FETCH_ASSOC)){
                //Calcul date de fin : la première étape est de transformer la date de début en timestamp
                $dateDepartTimestamp = strtotime($reqUserFinalSelect['date_debut_location']);
                //on calcule la date de fin = date début + duree
                 $dateFin = date('Y-m-d', strtotime('+'.$reqUserFinalSelect['Duree'].'day', $dateDepartTimestamp ));
                    echo '<li>'.$reqUserFinalSelect['titre'].', le '.$reqUserFinalSelect['date_debut_location'].' pendant '.$reqUserFinalSelect['Duree'].' jours, donc jusqu\'au : '.$dateFin.'</li>';
                }
                echo '</ul>';
            } else if(!empty($_GET['id_film'])){

            }

        
        
        ?>
    </div>
</body>
</html>