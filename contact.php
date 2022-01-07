<h1>recapitulatif:</h1>

<p>votre nom est <?php echo $_POST['nom']; ?></p>
<p>votre prenom est <?php echo $_POST['prenom']; ?></p>
<p>votre telephone est <?php echo $_POST['telephone']; ?></p>
<p>voici votre message <?php echo $_POST['message']; ?></p>

<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$message = $_POST['message'];
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cv;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$insertbdd = $bdd->prepare("INSERT INTO cv_contact(nom,prenom,telephone,message) VALUES(?,?,?,?)");
$insertbdd ->execute(array($nom, $prenom, $telephone, $message));
?>

<?php
      $headers ='From: "nom_prenom"<adresse@fai.fr>'."\n";
      $headers .='Reply-To: maylis.heyraud@gmail.com'."\n";
      $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
      $headers .='Content-Transfer-Encoding: 8bit';

      $message ='<html><head><title>Un recapitulatif </title></head><body>Un message de recapitulation de vos données </body></html>';

      if(mail('maiwenn.detot@gmail.com',' demande de contact', $message, $headers))
      {
           echo 'Le message a été envoyé';
      }
      else
      {
           echo 'Le message n\'a pu être envoyé';
}
?>
