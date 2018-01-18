<?php
 include('includes/connexion.inc.php');
 
 session_start();
 
 $modifier=$_GET['id'];
 
 if(isset($_POST['message'])){
     $update="UPDATE messages SET contenu='{$_POST['message']}', date= UNIX_TIMESTAMP() WHERE id=$modifier";
     $update2=$pdo->prepare($update);
     $update2->execute();
	 
     header("location:index.php");
 }
 /* $sql="INSERT INTO messages (contenu, date) VALUES (:contenu, UNIX_TIMESTAMP())";
        $prep=$pdo->prepare($sql);
        $prep->bindValue(':contenu', $_POST['message']);
		*/
 ?>