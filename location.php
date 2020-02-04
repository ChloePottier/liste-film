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
     
        if(!empty($_GET['id_client'])AND !empty($_GET['id_film']) AND !empty($_GET['dureeLoc']) AND !empty($_GET['dateLoc'])){
            $idFilm = $_GET['id_film'];
            $idClient = $_GET['id_client'];
            $dureeLoc = $_GET['dureeLoc'];
            $dateLoc = $_GET['dateLoc'];

            echo $idFilm ." ".$idClient." ".$dureeLoc." ".$dateLoc;
            $tab = array(
                'id_film' => $idFilm,
                'id_client'=>$idClient,
                'Duree' => $dureeLoc,
                'date_debut_location' => $dateLoc
                );
            // la requête doit comporter id et titre sinon ca ne marche pas
            $sqlLoc ="INSERT INTO location VALUES(:id_film, :id_client, :Duree, :date_debut_location)";
            $reqLoc = $dbh->prepare($sqlLoc);
            $reqLoc ->execute($tab);
            if($reqLoc == true){
                echo "Location enregistré";
            } else {
                echo "Impossible d'enregistrer la location";
            };
        };
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
            <?php while($reqFilmFinal=$reqFilm->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'. $reqFilmFinal['id'].'" selected>'.$reqFilmFinal["titre"].'</option> ';
            }?>
        </select>
        <input style = 'width: 300px;' name='dureeLoc' type='number' /> 
        <input type="date" name="dateLoc">
        <button type="submit" value="Louer">Louer</button>
    </form>
</body>
</html>