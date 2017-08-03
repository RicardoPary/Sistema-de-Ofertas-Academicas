<?php
include("Conexion.php");
$xCodigoOrganizador=$_POST['codigo_organizador'];
	$xCodigoFacilitador=$_POST['codigo_facilitador'];
	$xCodigoEvento=$_POST['codigo_evento'];
	$xDuracion=$_POST['duracion'];
	$xTitulo=$_POST['titulo'];
	$xNumero=$_POST['numero'];


	$consulta=$cn->prepare('INSERT INTO tema(
           CodigoFacilitador,CodigoEvento,Duracion,Titulo,Numero)
    VALUES(:CodigoFacilitador,:CodigoEvento,:Duracion,:Titulo,:Numero)');
	$consulta->execute(array(':CodigoFacilitador'=>$xCodigoFacilitador,':CodigoEvento'=>$xCodigoEvento,':Duracion'=>$xDuracion,':Titulo'=>$xTitulo,':Numero'=>$xNumero));
	$result=$consulta->fetch();
	
	//header("Location: Organizador.php?id=$xCodigoOrganizador");
	
	//if($result)
	//echo "Evento Registrada";	
?>