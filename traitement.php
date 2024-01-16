<?php
// Récupération des données du formulaire
$id = $_POST['id'];
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];

// Connexion à la base de données (utilisez votre propre code de connexion ici)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation de la requête SQL d'insertion des données
    $sql = "INSERT INTO etudianti (id, pseudo, email) VALUES (:id, :pseudo, :email)";
    $stmt = $conn->prepare($sql);

    // Exécution de la requête avec les valeurs des champs du formulaire
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "Données insérées avec succès dans la base de données!";
    
    //$sql = "SELECT * FROM etudianti";
    //$stmt = $conn->prepare($sql);
    //$stmt->execute();

    // Affichage des données
    //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //echo "id : " . $row['id'] . "<br>";
      //  echo "pseudo : " . $row['nom'] . "<br>";
        //echo "email : " . $row['email'] . "<br><br>";
    //}
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>