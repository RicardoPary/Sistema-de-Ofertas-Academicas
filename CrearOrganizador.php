<?php
include("Conexion.php");
$xCodigoOrganizador=1;
	$CodigoInstitucion=$_POST['CodigoInstitucion'];
	$Nombre=$_POST['Nombre'];
	$Credencial=$_POST['Credencial'];
	$Telefono=$_POST['Telefono'];
	$Nick=$_POST['Nick'];
	$Password=$_POST['Password'];
	
	
	$NombreFoto=$_FILES['Imagen']['name'];
	$Ruta=$_FILES['Imagen']['tmp_name'];	
    $Destino="Imagenes/".$NombreFoto;
	copy($Ruta,$Destino);	
	


	$consulta=$cn->prepare('INSERT INTO organizador(
           CodigoInstitucion,Nombre,Credencial,Telefono,Nick,Password,Imagen)
    VALUES(:CodigoInstitucion,:Nombre,:Credencial,:Telefono,:Nick,:Password,:Imagen)');
	$consulta->execute(array(':CodigoInstitucion'=>$CodigoInstitucion,':Nombre'=>$Nombre,':Credencial'=>$Credencial,':Telefono'=>$Telefono,':Nick'=>$Nick,':Password'=>$Password,':Imagen'=>$Destino));
	
	
	header('Location: index.php');
?>