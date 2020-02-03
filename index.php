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
    echo '<li>'. $reqFilm['titre'].'<a href="modification.php?filmid='.$reqFilm["id"].'">Modifier</a> <a href="suppression.php?filmid='.$reqFilm["id"].'">Supprimer</a></li>';
}
echo"</ul>";
?>