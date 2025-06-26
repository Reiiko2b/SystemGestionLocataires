<?php
require_once 'DB.php';

$pdo = DB::connectBdd();

$stmt = $pdo->query("SELECT 'Connection successful!' AS message");
$row =  $stmt->fetch();

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Roncaglia</title>
  <link rel="stylesheet" href="style/dashboard.css"> <!-- lien vers ton CSS -->
</head>
<body>
        <div class="container">
            <img src="img/logoClair.png" alt="Logo roncaglia" class="logo" />
            <?php echo '<h1>Bienvenue,  '.$_SESSION["user"].'</h1>'?>
            <ul class="menu">
                <li><a href="dashboard.php">Accueil</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="has-submenu">
                    <a class="active"href="user.php" style="cursor: default;">Mon compte</a>
                    <ul class="submenu">
                        <li><a href="./params.php" class="noHover">Paramèrtres</a></li>
                        <li><a href="./index.php" class="noHover">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>

                
            </ul>
        </div>

    </body>
</html>