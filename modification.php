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
//on teste si l'id du film est bien récupérée
// var_dump($_GET['filmid'])
//variable id du film
$idFilm = $_GET['filmid'];
//la requête
$sqlTitre = "SELECT titre FROM film WHERE id= $idFilm";
//exécute la requête SQL 
$dbh->query($sqlTitre);
//resultat de la requete
$reqTitre = $dbh->query($sqlTitre);
// echo $idFilm . " <input name='name' type='text' value='".$res."'  /><br />";
while($resTitre=$reqTitre->fetch(PDO::FETCH_ASSOC)){
    echo "<form method='POST' action='#'><input style = 'width: 300px;'name='titreModif' type='text' value='".$resTitre['titre']."'  /> <button type='submit' value='submit' name='modification'>Modifier</button></form>";
};
if (!empty($_POST['titreModif'])){
    $tab = array(
        'id' => $idFilm,
        'titre'=>$titreModif);
}
// $sqlModif = "UPDATE film SET titre='$titreModif' WHERE id=".$idFilm."";


// 
// $sqlDelete = "DELETE  FROM `film` DELETE FROM `film` WHERE `id`= ? "

// //exécute la requête SQL 
// $dbh->query($sqlModif);
// //resultat de la requete
// $requete = $dbh->query($sqlModif);


?>