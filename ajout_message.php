<?php
	include('includes/connexion.inc.php');
    
    $sql="INSERT INTO messages (contenu, date) VALUES (:contenu, UNIX_TIMESTAMP())";
        
    $prep=$pdo->prepare($sql);
    $prep->bindValue(':contenu', $_POST['message']);
    $prep->execute();
    header("Location:index.php");
?>

