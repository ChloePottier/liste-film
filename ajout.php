<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un film</title>
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
$ajoutFilm = $_POST['filmajout'];
$sqlAjout ="";

// requete
// INSERT INTO `film`( `titre`) VALUES ('Matrix 1') 


?>
<form method='POST' action='#'><input style = 'width: 300px;'name='filmajout' type='text' /> <button type='submit' value='submit' name='modification'>Modifier</button></form>;
