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
if(!empty($_POST['filmajout'])){
    $ajoutFilm = $_POST['filmajout'];
    echo $ajoutFilm; //test si la valeur est bien envoyé en POST
    $tab = array(
        'id' => '',
        'titre'=>$ajoutFilm);
        // $sqlAjout ="INSERT INTO film (titre) VALUES ".$_POST['filmajout']."";

        $sqlAjout ="INSERT INTO film VALUES(:id, :titre)";
        $reqAjout = $dbh->prepare($sqlAjout);
        $reqAjout ->execute($tab);
        if($reqAjout == true){
            header("Location: index.php"); 
        } else {
            echo "Ajout impossible";
        }
}


?>
<form method='POST' action='#'><input style = 'width: 300px;'name='filmajout' type='text' /> <button type='submit' value='submit' name='modification'>Ajouter</button></form>
