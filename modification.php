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
// var_dump($_GET['filmid'])
$idFilm = $_GET['filmid'];
echo $idFilm "";


// $sqlModif = "UPDATE `film` SET `id`=[value-1],`titre`=[value-2] "; 
// $sqlDelete = "DELETE  FROM `film` DELETE FROM `film` WHERE `id`= ? "
// $sqlModif =; 
// //exécute la requête SQL 
// $dbh->query($sqlModif);
// //resultat de la requete
// $requete = $dbh->query($sqlModif);


?>