<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Location</title>
</head>
<body>
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
     
        // if(!empty($_POST['id_client'])AND !empty($_POST['id_film'])){
    
        $idClient = $_POST['id_client'];
        $idFilm = $_POST['id_film'];


        // $tab = array(
        //     'id_film' => $idFilm,
        //     'id_client'=>$idClient);
        //     //la requête doit comporter id et titre sinon ca ne marche pas
        //     $sqlAjout ="INSERT INTO location VALUES(:id_film, :id_client)";
        //     $reqAjout = $dbh->prepare($sqlAjout);
        //     $reqAjout ->execute($tab);
        //     if($reqAjout == true){
        //         echo "Location enregistré";
        //     } else {
        //         echo "Impossible d'enregistrer la location";
        //     }
    ?>

<form method="get" action="#">	
    <select name="id_client">
        <?php
        while($reqUserFinal=$reqUser->fetch(PDO::FETCH_ASSOC)){
            echo '<option value="'. $reqUserFinal['id'].'" selected>'.$reqUserFinal['Nom']." " .$reqUserFinal['Prenom'].'</option> ';
        }
        ?>
    </select>
	<select name="id_film">
    <!-- tant que c'est possible afficher la liste des films -->
        <?php while($reqFilmFinal=$reqFilm->fetch(PDO::FETCH_ASSOC)){
            echo '<option value="'. $reqFilmFinal['id'].'" selected>'.$reqFilmFinal["titre"].'</option> ';
        }?>
	</select>
	<input type="submit" value="Louer" />
</form>
</body>
</html>