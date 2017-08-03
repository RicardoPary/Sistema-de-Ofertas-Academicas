<?php
include('Conexion.php');
$CodigoOrganizador=$_POST['codigo_organizador'];
	$CodigoEvento=$_POST['codigo_evento'];
	$Dia=$_POST['dia'];
	$Hora=$_POST['hora'];
	

	$consulta=$cn->prepare('INSERT INTO horario(CodigoEvento,Dia,Hora)
    VALUES(:CodigoEvento,:Dia,:Hora)');
	$consulta->execute(array(':CodigoEvento'=>$CodigoEvento,':Dia'=>$Dia,':Hora'=>$Hora));
	$result=$consulta->fetch();
	//header("Location: Organizador.php?id=".$CodigoOrganizador);
//	if($result)
	//echo "Evento Registrada";	
?>