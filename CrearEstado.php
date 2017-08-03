<?php
include("Conexion.php");



	$CodigoOrganizador=$_POST['CodigoOrganizador'];
	$Nombre=$_POST['Nombre'];



	$consulta=$cn->prepare('INSERT INTO estado(CodigoOrganizador,Nombre)VALUES(:Codigo,:Nombre)');
	$consulta->execute(array(':Codigo'=>$CodigoOrganizador,':Nombre'=>$Nombre));
	$resultado=$consulta->fetch();

?>