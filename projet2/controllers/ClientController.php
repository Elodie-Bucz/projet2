<?php 

function client_controller_index(){
   require_once(MODEL_DIR."/client.php");
   $data = client_select();
   return renderOffline("client/index.php", $data);
}

function client_controller_indexConnection(){
   return render("client/index.php");
}

function client_controller_create(){
   return renderOffline("client/create.php");
}

function client_controller_store($request) {
   if ($_SERVER['REQUEST_METHOD'] != 'POST') {
       header('Location: ?controller=client');
       exit;
   }

   require_once(MODEL_DIR . "/client.php");

   $result = client_insert($request);

   if ($result === 'email_error') {
      echo "L'email entré est déjà utilisé par un compte.";
   } else if ($result === 'nom_error') {
      echo "Votre nom n'a pas un minimum de deux caractères.";
   } else if ($result === 'password_error_contenu') {
      echo "Le mot de passe doit contenir au moins une lettre et un chiffre.";
   } else if ($result === 'password_error_taille') {
      echo "Le mot de passe doit contenir entre 6 et 20 caractères.";
   } else if ($result === false) {
      echo "Erreur lors de l'insertion des données.";
   } else {
      header("Location: ?controller=client&function=connect");
      exit;
   }
}

function client_controller_connect($request){
   return renderOffline("client/connexion.php");

}

function client_controller_compare($request) {
   if ($_SERVER['REQUEST_METHOD'] != 'POST') {
       header('location:?controller=client&function=create');
       exit;
   }

   $nom_utilisateur = isset($request['nom_utilisateur']) ? $request['nom_utilisateur'] : '';
   $mot_de_passe = isset($request['mot_de_passe']) ? $request['mot_de_passe'] : '';

   require_once(MODEL_DIR . "/client.php");

   $user = client_compare_credentials($nom_utilisateur, $mot_de_passe);

   if ($user) {
      return render("client/index.php"); 
      exit;
   } else {
       echo "Nom d'utilisateur ou mot de passe incorrect.";
   }
}

function client_controller_offline(){
   return renderOffline("client/connexion.php");
}

function client_controller_show(){
   return render("article/article.php");
}