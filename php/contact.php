<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Adresse email de destination
    $to = "mussoarthur@gmail.com";

    // Sujet de l'email
    $email_subject = "Nouveau message de : $name - $subject";

    // Contenu de l'email
    $email_body = "Vous avez reçu un nouveau message depuis le formulaire de contact.\n\n".
                  "Nom : $name\n".
                  "E-mail : $email\n".
                  "Sujet : $subject\n\n".
                  "Message :\n$message\n";

    // En-têtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi de l'email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur est survenue. Veuillez réessayer.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
