<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validation côté serveur
    if (empty($name) || empty($email) || empty($message)) {
        echo "Tous les champs sont requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
    } else {
        // Envoyer l'email
        $to = "fireleven09@gmail.com"; // Remplacez par votre adresse email
        $subject = "Nouveau message de contact";
        $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Merci pour votre message ! Nous vous répondrons sous peu.";
        } else {
            echo "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.";
        }
    }
} else {
    echo "Méthode de requête non supportée.";
}
?>
