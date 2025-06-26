<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once '../DB.php';

session_start();

$pdo = DB::connectBdd();

$mail = new PHPMailer(true);

// Récupérer les données du formulaire
$username = $_POST['username'] ?? '';
$Usermail = $_POST['Usermail'] ?? '';

if (!filter_var($Usermail, FILTER_VALIDATE_EMAIL)) {
    die("❌ Adresse email invalide !");
}

try {
    // Configuration serveur Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'lucasvallecalle@gmail.com';       // Ton email
    $mail->Password   = 'fuwj msdc kflt kyry';    // 🔒 PAS ton mot de passe Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;       // TLS implicite
    $mail->Port       = 465;

    // Destinataires
    $mail->setFrom('lucasvallecalle@gmail.com', 'Lucas');
    $mail->addAddress($Usermail);

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Test depuis PHPMailer';
    $mail->Body    = '    Salut ' . htmlspecialchars($username) . ',<br><br>
    Ceci est un test <b>HTML</b> depuis PHPMailer 🚀<br><br>
    <a href="http://192.168.1.25/locataires/login.php" 
       style="
          display: inline-block; 
          padding: 10px 20px; 
          font-size: 16px; 
          color: white; 
          background-color: #007bff; 
          text-decoration: none; 
          border-radius: 5px;">
       Créer mon mot de passe
    </a>';
    $mail->AltBody = 'Salut Lucas, Ceci est un test simple depuis PHPMailer';

    DB::saveUser($username, $Usermail);
    $mail->send();
    echo '✅ Message envoyé avec succès !';
    $_SESSION['mail'] = $Usermail;
    $_SESSION['username'] = $username;
} catch (Exception $e) {
    echo "❌ Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
}
