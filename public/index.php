<?php

session_start();

$_SESSION['contacts'] = [];


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $name = ($_POST['name'] ?? '');
        $age =  ($_POST['age'] ?? 0);
        $email = ($_POST['email'] ?? '');

        if(!empty($name) && !empty($age) && !empty($email)) {
            $newContact = [
                "name" => $name,
                "age" => $age,
                "email" => $email
            ];
            $_SESSION['contacts'][] = $newContact;
            echo "Nom du nv contact :<br>",  $newContact["name"] ,"<br>", "age du nv contact<br>", $newContact["age"] ,"<br>", "email du nv contact:<br>" , $newContact["email"] ; 

        }else {
        echo "Données erronées.<br><br>";
}
    }
?>

   

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "../input/header.php"; ?>
<main>

<form id="form" action="" method="POST">
    <h2>Nous contactez :</h2>

    <div>
      <label for="name"> Votre nom:</label>
      <input class="imput" id="name" name="name" type="text"  placeholder="Votre nom" /> 
    </div>
    <div>
      <label for="age">Votre age:</label>
      <input class="imput" id="age" name="age"  type="age"  placeholder="votre age" />
    </div>
    <div>
      <label for="email">Votre email:</label>
      <input id="email" name="email" type="email" placeholder="Votre mail" />
    </div>
  
    <div>
      <input type="submit" value = "Envoyer" >
    </div>
  
</form>
</main>
   
   <?php include "../input/footer.php"; ?>

</body>
</html>
<?php
 
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ;
    $age = $_POST["age"] ;
    $email = $_POST["email"];

    $errors = [];
    if(empty($name)) {
        $errors[] = "Veuillez compléter tous les champs du formulaire";
    }

    if(empty($age)) {
        $errors[] = "Veuillez renseigner votre age";

    }
     if(empty($email)) {
        $errors[] = "Veuillez renseigner votre adresse email";

    }
    
  if(empty($errors)) {
    $name = htmlspecialchars(trim($name));
    $age = htmlspecialchars(trim($age));
    $email = htmlspecialchars(trim($email));

    echo "Le formulaire a été envoyé avec succés";
  }
  else {
    foreach ($errors as $error) {

        echo "$error <br>";
    }
  }

 };


 
?>