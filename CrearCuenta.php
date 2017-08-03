<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Crear Cuenta</title>
</head>

<body>
<?php

include("Conexion.php");

	$TipoD=$_POST['TipoD'];
	$NumD=$_POST['T1'];
	$Nombre=$_POST['T2'];
	$Paterno=$_POST['T3'];
	$Materno=$_POST['T4'];
	$Genero=$_POST['Sexo'];
	$EstadoCivil=$_POST['T5'];
	$Telefono=$_POST['T6'];
	$Celular=$_POST['T7'];
	$Departamento=$_POST['T8'];
	$Provincia=$_POST['T9'];
	$Municipio=$_POST['T10'];
	$Zona=$_POST['T11'];
	$Calle=$_POST['T12'];
	$Numero=$_POST['T13'];
	
	$Dia=$_POST['Dia'];
	$Mes=$_POST['Mes'];
	$Gestion=$_POST['Gestion'];
	
	$MesOrigen="";
	if($Mes == 'Enero')
	{$MesOrigen='01';}
	if($Mes == 'Febrero')
	{$MesOrigen='02';}
	if($Mes == 'Marzo')
	{$MesOrigen='03';}
	if($Mes == 'Abril')
	{$MesOrigen='04';}
	if($Mes == 'Mayo')
	{$MesOrigen='05';}
	if($Mes == 'Junio')
	{$MesOrigen='06';}
	if($Mes == 'Julio')
	{$MesOrigen='07';}
	if($Mes == 'Agosto')
	{$MesOrigen='08';}
	if($Mes == 'Septiembre')
	{$MesOrigen='09';}
	if($Mes == 'Octubre')
	{$MesOrigen='10';}
	if($Mes == 'Noviembre')
	{$MesOrigen='11';}
	if($Mes == 'Diciembre')
	{$MesOrigen='12';}
	
	$FechaNacimiento=$Gestion."-".$MesOrigen."-".$Dia;
			
	$Correo=$_POST['C1'];
	$Contrasena=$_POST['C2'];
	$Tipo=$_POST['Tipo'];
	$Nick=$_POST['C3'];	
		
	$NombreFoto=$_FILES['C4']['name'];
	$Ruta=$_FILES['C4']['tmp_name'];	
    $Destino="Fotos/".$NombreFoto;
	copy($Ruta,$Destino);	
	
	$consulta="INSERT INTO Persona(TipoDocumento,NumeroDocumento,Nombre,Paterno,Materno,Genero,EstadoCivil,Telefono,Celular,Departamento,Provincia,Municipio,Zona,Calle,Numero,FechaNacimiento)VALUE('$TipoD','$NumD','$Nombre','$Paterno','$Materno','$Genero','$EstadoCivil','$Telefono','$Celular','$Departamento','$Provincia','$Municipio','$Zona','$Calle','$Numero','$FechaNacimiento')";
$sql=mysql_query($consulta,$cn);
	
	
$consulta1="INSERT INTO Cuenta(NumeroDocumento,CorreoElectronico,Contrasena,Tipo,Nick,Foto)VALUE('$NumD','$Correo','$Contrasena','$Tipo','$Nick','$Destino')";
$sql1=mysql_query($consulta1,$cn);

header("Location: RegistrarCuenta.php");
?>



</body>
</html>
