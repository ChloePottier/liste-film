<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Liste des films dans BDD</title>
</head>
<body>
    <div class="container">
    <h1>Liste des films</h1>
    

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

$sql = "SELECT * FROM `film`"; 
//exécute la requête SQL 
$dbh->query($sql);
//resultat de la requete
$requete = $dbh->query($sql);
echo"<ul>";
// tant que c'est possible execute ma condition
while($reqFilm=$requete->fetch(PDO::FETCH_ASSOC)){
    echo '<li><span class="liste-film">'. $reqFilm['titre'].'</span><a href="modification.php?filmid='.$reqFilm["id"].'" class="btn-modif">Modifier</a> <a href="suppression.php?filmid2='.$reqFilm["id"].'" class="btn-supprimer">Supprimer</a></li>';
}
echo"</ul>";
?>
<a href="ajout.php?filmajout" class="btn-ajouter">Ajouter un film</a>
</div>
</body>
</html>