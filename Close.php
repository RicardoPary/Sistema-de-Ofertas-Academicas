<?php 
include('Conexion.php');
$cod=$_GET['id'];
$es="Inactivo";		
		
		$sql=$cn->prepare('UPDATE estado SET Nombre=:Estado WHERE CodigoOrganizador=:Codigo');	
	    $sql->execute(array(':Codigo' => $cod,':Estado' => $es ));	
	    header('Location: index.php');	
?>
