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
        <select name="id_client">
            <?php
            while($reqUserFinal=$reqUser->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'. $reqUserFinal['id'].'" selected>'.$reqUserFinal['Nom']." " .$reqUserFinal['Prenom'].'</option> ';
            }
            ?>
        </select>
        <select name="id_film">
            <?php while($reqFilmFinal=$reqFilm->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'. $reqFilmFinal['id'].'" selected>'.$reqFilmFinal["titre"].'</option> ';
            }?>
        </select>
        <select name="dureeLoc">
            <?php while($reqDureeFinal=$reqDuree->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'. $reqDureeFinal['Duree'].'" selected>'.$reqDureeFinal["Duree"].'</option> ';
            }
            ?>
        </select>

        <?php ?>
    </div>
</body>
</html>