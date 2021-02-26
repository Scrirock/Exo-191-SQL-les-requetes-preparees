<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $server = "localhost";
    $db = "table_test_php";
    $user = "root";
    $pass = "";

    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.

    $nom = "Roger";
    $prenom = "Roger";
    $email = "tredf@Roger.be";
    $password = "rogerRogerRoger";
    $adresse = "La bas";
    $codePostal = 7898;
    $pays = "RogerLand";
    $dateJoin = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table_test_php.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin)
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);

    $newUser->execute();

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.

    $titre = "pomme";
    $prix = 2.54;
    $descriptionCourte = "un fruit";
    $descriptionLongue = "un fruit rond, ici il est rouge, qui se mange a toute heure de la journee";

    $newProduct = $pdo->prepare("
        INSERT INTO table_test_php.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);

    $newProduct->execute();

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.

    $nom = "Roger";
    $prenom = "Roger";
    $email = "emailtest@gmail.com";
    $password = "rogerRogerRoger";
    $adresse = "La bas";
    $codePostal = 7898;
    $pays = "RogerLand";
    $dateJoin = NULL;
    $nom2 = "Roger";
    $prenom2 = "Roger";
    $email2 = "refefeo@Rfregtgt.com";
    $password2 = "rogerRogerRoger";
    $adresse2 = "La bas";
    $codePostal2 = 7898;
    $pays2 = "RogerLand";
    $dateJoin2 = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table_test_php.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin),
               (:nom2, :prenom2, :email2, :password2, :adresse2, :codePostal2, :pays2, :dateJoin2) 
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);
    $newUser->bindParam(":nom2", $nom2);
    $newUser->bindParam(":prenom2", $prenom2);
    $newUser->bindParam(":email2", $email2);
    $newUser->bindParam(":password2", $password2);
    $newUser->bindParam(":adresse2", $adresse2);
    $newUser->bindParam(":codePostal2", $codePostal2, PDO::PARAM_INT);
    $newUser->bindParam(":pays2", $pays2);
    $newUser->bindParam(":dateJoin2", $dateJoin2);

    $newUser->execute();

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.

    $titre = "pomme";
    $prix = 2.54;
    $descriptionCourte = "un fruit";
    $descriptionLongue = "un fruit rond, ici il est rouge, qui se mange a toute heure de la journee";
    $titre2 = "pomme";
    $prix2 = 2.54;
    $descriptionCourte2 = "un fruit";
    $descriptionLongue2 = "un fruit rond, ici il est rouge, qui se mange a toute heure de la journee";

    $newProduct = $pdo->prepare("
        INSERT INTO table_test_php.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue),
               (:titre2, :prix2, :descriptionCourte2, :descriptionLongue2)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);
    $newProduct->bindParam(":titre2", $titre2);
    $newProduct->bindParam(":prix2", $prix2, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte2", $descriptionCourte2);
    $newProduct->bindParam(":descriptionLongue2", $descriptionLongue2);

    $newProduct->execute();

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.

    $pdo->beginTransaction();

    $nom = "Michel";
    $prenom = "Michel";
    $email = "mich.mich@gmail.com";
    $password = "jesuismichel";
    $adresse = "trucmich";
    $codePostal = 7412;
    $pays = "Belgique";
    $dateJoin = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table_test_php.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin)
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);

    $newUser->execute();

    $nom = "didier";
    $prenom = "truc";
    $email = "adressenomarle@gmail.com";
    $password = "azerty";
    $adresse = "pasTresLoin";
    $codePostal = 0000;
    $pays = "France";
    $dateJoin = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table_test_php.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin)
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);

    $newUser->execute();

    $nom = "Roger";
    $prenom = "Roger";
    $email = "rogercdfrfvo@Roger.be";
    $password = "rogerRogerRoger";
    $adresse = "La bas";
    $codePostal = 7898;
    $pays = "RogerLand";
    $dateJoin = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table_test_php.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin)
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);

    $newUser->execute();

    $pdo->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $pdo->beginTransaction();

    $titre = "trtbg";
    $prix = 24;
    $descriptionCourte = "ztgtrgt";
    $descriptionLongue = "gbgzrt gzttrbz tb trebhtebhthbye b y by hbety ";

    $newProduct = $pdo->prepare("
        INSERT INTO table_test_php.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);

    $newProduct->execute();

    $titre = "hbgtvfr";
    $prix = 2785;
    $descriptionCourte = "mlokijuhygt";
    $descriptionLongue = "mlokin hjub hhnjuj hb bgvtvbhujn njni";

    $newProduct = $pdo->prepare("
        INSERT INTO table_test_php.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);

    $newProduct->execute();

    $titre = "mplokijuhy";
    $prix = 1;
    $descriptionCourte = "poiuytreza";
    $descriptionLongue = "poik,nhytredfgbnj jhytrfdc n,jytr vcdfv bgtb";

    $newProduct = $pdo->prepare("
        INSERT INTO table_test_php.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);

    $newProduct->execute();

    $pdo->commit();
}

catch (PDOException $e){
    echo $e->getMessage();
    $pdo->rollBack();
}