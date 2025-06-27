<?php
$pdo = new PDO('mysql:host=localhost;dbname=gainsplus', 'root', 'motdepasse');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Sécurisation
$nom = htmlspecialchars($_POST['nom']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if ($email) {
    // Enregistrement en BDD
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email) VALUES (?, ?)");
    $stmt->execute([$nom, $email]);

    // Email de confirmation
    $to = $email;
    $subject = "Confirmation d'inscription - GainsPlus";
    $message = "
    Bonjour $nom,

    Merci de vous être inscrit à GainsPlus !
    Votre inscription est bien prise en compte.

    À bientôt,
    L'équipe GainsPlus
    ";
    $headers = "From: contact@gainsplus.com";

    mail($to, $subject, $message, $headers);

    echo "<h3>Merci $nom, une confirmation vous a été envoyée par email !</h3>";
} else {
    echo "Adresse email invalide.";
}
?>
