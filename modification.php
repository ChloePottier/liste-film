<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
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
//traiter le tableau : mettre le titre trouvé dans le input
while($resTitre=$reqTitre->fetch(PDO::FETCH_ASSOC)){
    echo "<form method='POST' action='#'><input style = 'width: 300px;'name='titreModif' type='text' value='".$resTitre['titre']."'  /> <button type='submit' value='submit' name='modification'>Modifier</button></form>";
};
// si input est différent de vide alors
if (!empty($_POST['titreModif'])){
    $titreModif = $_POST['titreModif'];
    $tab = array(
        'id' => $idFilm,
        'titre'=>$titreModif);
    $sqlModif = "UPDATE film SET titre='$titreModif' WHERE id=".$idFilm."";
    $reqModif = $dbh->prepare($sqlModif);
    $reqModif ->execute(array($sqlModif));
    // si une modif est faite 
    if($reqModif == true){
        header("Location: index.php");
    
    }
}

?>
<a href='index.php'>Annuler la modification</a>