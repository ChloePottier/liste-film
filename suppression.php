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
//variable id du film
$idFilm = $_GET['filmid2'];
$sqlDelete = "DELETE FROM film  WHERE id = $idFilm  ";
// var_dump($sqlDelete)
// exécute la requête SQL 
$dbh->query($sqlDelete);
//resultat de la requete
$reqDelete = $dbh->query($sqlDelete);
// traiter le tableau : mettre le titre trouvé dans le input
if($reqDelete == true){
    echo "Le film a bien été supprimé de la base de donnée";
};

?>