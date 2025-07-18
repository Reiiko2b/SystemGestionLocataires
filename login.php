<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - SGL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      background-color: #f0f4ff; /* pastel bleu clair */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
    }
  </style>
</head>

<?php
    session_start();
    $mail = $_SESSION['mail'];
    $username = $_SESSION['username'];
?>
<body>
  <div class="card">
    <h2 class="text-center mb-4">Inscription</h2>
    <form method="POST" action="./src/controllers/verifInscription.php">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Adresse email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="<?php $mail?>" disabled>
      </div>

      <div class="mb-3">
        <label for="exampleInputText1" class="form-label">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="exampleInputText1" placeholder="<?php $username?>" disabled>
      </div>
      <div class="mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe" name="password">
      </div>

      <button type="submit" class="btn btn-primary w-100">Valider l'inscription</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>