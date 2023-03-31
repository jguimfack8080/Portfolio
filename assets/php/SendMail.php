<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// récupération des données du formulaire
$name = $_POST['name'];
$subject = $_POST['betreff'];
$email = $_POST['email'];
$message = $_POST['message'] . "<br><br><br>" . "<b>Name des Absendes: </b>     " . $name . "<br>"

    . "<b>Email des Absenders : </b>     " . $email . "<br>" . "<b>Telefonummer : </b>     "
    . $_POST['tel'] . "<br><br><br>" . "Un utilisateur essaye de me contacter via mon portfolio.";

if (isset($name) && !empty($name) && isset($email) && !empty($email) && isset($subject) 
&& isset($message) && !empty($message)){

    // création d'une nouvelle instance de PHPMailer
    $mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'portfoliojeuna@gmail.com'; // Remplacez par votre adresse email Gmail
    $mail->Password = 'wfhbxkrlooegfwlt'; // Remplacez par votre mot de passe Gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mailDestinatiare = 'jeunaj3@gmail.com';
    // Définir l'adresse de l'expéditeur
    $mail->setFrom('portfoliojeuna@gmail.com');

    // Ajouter l'adresse du destinataire
    $mail->addAddress($mailDestinatiare);

    // Spécifier que le contenu du message est en HTML
    $mail->isHTML(true);

    // Définir le sujet et le corps du message
    $mail->Subject = $subject;
    $mail->Body = $message;


    // Envoi de l'e-mail
    if (!$mail->send()) {
        echo "
       <script>
            alert ('Ihre Nachricht könnte leider nicht gesendet werden');
            document.location.href = '../../index.html?#contact';

       </script>
       ";
    } else {
        echo "
       <script>
            alert ('Ihre Nachricht wurde erfolgreich gesendet');
            document.location.href = '../../index.html';

       </script>

       ";

    }
} catch (Exception $e) {
    echo "Une erreur s'est produite : {$mail->ErrorInfo}";
}

}else{
    echo "
    <script>
         alert ('Bitte füllen Sie alle Daten des Formulars aus. Außer Ihrer Telefonnummer, falls Sie dies nicht wünschen.');
         document.location.href = 'contact.html?error=fehlendeAngaben';

    </script>
    ";
}