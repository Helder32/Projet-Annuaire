

<?php 

//-------------------------------------------------------------------------------------------------
echo "<h1>Liste de contacts</h1>";
//-------------------------------------------------------------------------------------------------
try
{

    $bdd = new PDO('mysql:host=localhost;dbname=Annuaire;charset=utf8', 'helder', 'Rastatengo32');
}

// en cas d'erreur on affiche un message :

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$reponse = $bdd->query('SELECT * FROM contacts') ;
$cpt = $bdd->query('SELECT COUNT(*) AS nb_contacts FROM contacts') ;

while($donnees=$reponse->fetch())
{
      echo '<p>Nom = ' . $donnees['nom'];
}

while($result=$cpt->fetch())
{
      echo '<p>Nombre de contacts= ' . $result[0];
}


 //-----------------------------------------------------------------------------------------------------
 echo "<h1>Contacts habitant à Auch</h1>";
//-----------------------------------------------------------------------------------------------------
 $Auch = $bdd->query("SELECT * FROM contacts WHERE ville = 'Auch'" );

 while ($city=$Auch->fetch())
{
	echo '<p>Nom = ' . $city["nom"];
}	

//-----------------------------------------------------------------------------------------------------
echo "<h1>Contacts avec compte Gmail</h1>";
//-----------------------------------------------------------------------------------------------------
$email = $bdd->query('SELECT * FROM contacts WHERE email LIKE "%gmail.com"');

 while ($retour_email=$email->fetch())
{
	echo '<P>Nom = ' . $retour_email['nom'];
}

//Modification du contact ID18---------------------------------------------------------------------
$up = $bdd->query('UPDATE contacts SET email = "ogatien@simplon.co" WHERE id = 18') ;

//Effacer un contact-----------------------------------------------------------------------------
$de = $bdd->query('DELETE FROM appartenir WHERE fk_contact = 1 ');

$del = $bdd->query('DELETE FROM contacts WHERE id = 1');

?>
