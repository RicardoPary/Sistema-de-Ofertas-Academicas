<?php
include("Conexion.php");
    $CodigoOrganizador=$_POST['codigo_organizador']; 
	$CodigoEvento=$_POST['codigo_evento'];  
	$Nombre=$_POST['nombre'];
   
	$Capacidad=$_POST['capacidad'];
	$Tipo=$_POST['tipo'];
	$Direccion=$_POST['direccion'];

	
	
	$consulta=$cn->prepare('INSERT INTO ambiente(
           CodigoEvento,Nombre,Capacidad,Tipo,Direccion)
    VALUES(:CodigoEvento,:Nombre,:Capacidad,:Tipo,:Direccion)');
	$consulta->execute(array(':CodigoEvento'=>$CodigoEvento,':Nombre'=>$Nombre,':Capacidad'=>$Capacidad,':Tipo'=>$Tipo,':Direccion'=>$Direccion));
	$result=$consulta->fetch();
	

	
	
	
	//header("Location: Organizador.php?id=".$CodigoOrganizador);
	//if($result)
	//echo "Evento Registrado";	
?>