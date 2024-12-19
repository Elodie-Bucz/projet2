<?php

function client_select() {
  require(CONNEX_DIR); 
  $sql = "SELECT * FROM utilisateur ORDER BY nom";  
  $result = mysqli_query($connex, $sql);
  $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $result;
}

function client_insert($request) {
  require(CONNEX_DIR);

  $password = $request['mot_de_passe'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "SELECT COUNT(*) FROM utilisateur WHERE nom_utilisateur = '{$request['nom_utilisateur']}'";
  $result = mysqli_query($connex, $sql);
  $row = mysqli_fetch_row($result);

  if ($row[0] > 0) {
      return 'email_error';
  }

  if (strlen($request['nom']) < 2) {
      return 'nom_error';
  }

  if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password)) {
      return 'password_error_contenu';
  }

  if (strlen($password) < 6 || strlen($password) > 20) {
      return 'password_error_taille';
  }

  $sql = "INSERT INTO utilisateur (nom, nom_utilisateur, mot_de_passe, date_de_naissance) 
          VALUES ('{$request['nom']}', '{$request['nom_utilisateur']}', '$hashed_password', '{$request['date_de_naissance']}')";

  if (mysqli_query($connex, $sql)) {
      return true;
  } else {
      return false;
  }
}

function client_compare_credentials($nom_utilisateur, $mot_de_passe) {
  require(CONNEX_DIR); 

  $nom_utilisateur = mysqli_real_escape_string($connex, $nom_utilisateur);

  $sql = "SELECT mot_de_passe FROM utilisateur WHERE nom_utilisateur = '$nom_utilisateur'";
  $result = mysqli_query($connex, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $hashed_password = $row['mot_de_passe'];

      if (password_verify($mot_de_passe, $hashed_password)) {
          return true;  
      }
  }

  return false;  
}
?>