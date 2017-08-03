in<?php
include("Conexion.php");

    $CodigoOrganizador=$_POST['codigo_organizador'];   
	$Nombre=$_POST['nombre'];
   
	$Costo=$_POST['costo'];
	$Descuento=$_POST['descuento'];
	$Tipo=$_POST['tipo'];
	$Aviso=$_POST['aviso'];
   
		
	$Dia=$_POST['dia'];
	$Mes=$_POST['mes'];
	$Gestion=$_POST['gestion'];
	
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
	
	$Fecha=$Gestion."-".$MesOrigen."-".$Dia;	
		
		
	$Imagen=$_POST['imagen'];			
	/*$NombreFoto=$_FILES['T8']['name'];
	$Ruta=$_FILES['T8']['tmp_name'];	
    $Destino="Imagenes/".$NombreFoto;
	copy($Ruta,$Destino);	*/
		
		
	$consulta=$cn->prepare('INSERT INTO evento(
           CodigoOrganizador,Nombre,Fecha,Costo,Descuento,Tipo,Aviso,Imagen)
    VALUES(:CodigoOrganizador,:Nombre,:Fecha,:Costo,:Descuento,:Tipo,:Aviso,:Imagen)');
	$consulta->execute(array(':CodigoOrganizador'=>$CodigoOrganizador,':Nombre'=>$Nombre,':Fecha'=>$Fecha,':Costo'=>$Costo,':Descuento'=>$Descuento,':Tipo'=>$Tipo,':Aviso'=>$Aviso,':Imagen'=>$Imagen));
	$result=$consulta->fetch();
	
	
	
	//(header("Location: Organizador.php?id=".$CodigoOrganizador);
	//if($result)
	//echo "Evento Registrado";	
?>