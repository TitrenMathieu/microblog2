<?php
	include('includes/connexion.inc.php');
    
    $a=$_GET['a'];
    $id=$_GET['id'];

    if($a=='sup'){
        $sql="DELETE FROM messages WHERE id = :id";
        $prep=$pdo->prepare($sql);
        $prep->bindValue(':id', $id);
    
    }else{
        $sql="INSERT INTO messages (contenu, date) VALUES (:contenu, UNIX_TIMESTAMP())";
        $prep=$pdo->prepare($sql);
        $prep->bindValue(':contenu', $_POST['message']);
        
    }
    $prep->execute();

   header("Location:index.php");
?>

