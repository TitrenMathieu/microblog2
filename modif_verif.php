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
 
 ?>