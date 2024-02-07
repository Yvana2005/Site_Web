<?php
// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cycle = $_POST['cycle'];
$filiere = $_POST['filiere'];
$description = $_POST['description'];
$age = $_POST['age'];

// Connexion à la base de données (utilisez votre propre code de connexion ici)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation de la requête SQL d'insertion des données
    $sql = "INSERT INTO user (nom, prenom, email, phone, cycle, filiere, description, age) 
                  VALUES (:nom, :prenom, :email, :phone, :cycle, :filiere, :description, :age)";
    $stmt = $conn->prepare($sql);

    // Exécution de la requête avec les valeurs des champs du formulaire
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':cycle', $cycle);
    $stmt->bindParam(':filiere', $filiere);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':age', $age);
    $stmt->execute();

    echo "<h3 style='text-align:center'>Données insérées avec succès dans la base de données!</h3>";
    
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