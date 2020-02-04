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
//normalement on devrait avoir un bouton "etes vous sur de vouloir supprimer le film....."
//variable id du film
$idFilm = $_GET['filmid2'];
$sqlDelete = "DELETE FROM film  WHERE id = $idFilm  ";
// exécute le résultat de la requête SQL 
$reqDelete = $dbh->query($sqlDelete);
// traiter le tableau : mettre le titre trouvé dans le input
if($reqDelete == true){
    header("Location: index.php");
};

?>