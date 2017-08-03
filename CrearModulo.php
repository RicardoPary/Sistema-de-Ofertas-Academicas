<?php
include("Conexion.php");
$xCodigoOrganizador=$_POST['codigo_organizador'];
	$CodigoTema=$_POST['codigo_tema'];
	$Nombre=$_POST['nombre'];
	$Numero=$_POST['numero'];
	


	$consulta=$cn->prepare('INSERT INTO modulo(
           CodigoTema,Nombre,Numero)
    VALUES(:CodigoTema,:Nombre,:Numero)');
	$consulta->execute(array(':CodigoTema'=>$CodigoTema,':Nombre'=>$Nombre,':Numero'=>$Numero));
	$result=$consulta->fetch();
	
	//	header("Location: Organizador.php?id=".$xCodigoOrganizador);

	//if($result)
	//echo "Evento Registrada";	
?>