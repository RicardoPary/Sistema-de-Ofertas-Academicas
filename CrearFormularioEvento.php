<?php
	
include("Conexion.php");

    $codigo_organizador=$_POST['codigo_organizador'];
//EVENTO
	
	$codigo_evento=$_POST['codigo_evento'];
	$nombre_evento=$_POST['nombre_evento'];
	
    $Dia=$_POST['dia_evento'];
	$Mes=$_POST['mes_evento'];
	$Gestion=$_POST['gestion_evento'];
	
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
	
	$fecha=$Gestion."-".$MesOrigen."-".$Dia;		
	
	$costo_evento=$_POST['costo_evento'];
	$descuento_evento=$_POST['descuento_evento'];
	$tipo_evento=$_POST['tipo_evento'];
	$aviso_evento=$_POST['aviso_evento'];
	
	$NombreFoto=$_FILES['imagen_evento']['name'];
	$Ruta=$_FILES['imagen_evento']['tmp_name'];	
    $Destino="Fotos/".$NombreFoto;
	copy($Ruta,$Destino);	
	
//HORARIO	
	
	$dia_horario=$_POST['dia_horario'];
	$hora_horario=$_POST['hora_horario'];
	
//MODULO	
	
$nombre_modulo=$_POST['nombre_modulo'];
$numero_modulo=$_POST['numero_modulo'];
$codigo_tema=$_POST['codigo_tema'];
	
	
//EVENTO	
$consultaEvento=$cn->prepare('INSERT INTO evento(CodigoEvento,CodigoOrganizador,Nombre,Fecha,Costo,Descuento,Tipo,Aviso,Imagen)VALUES(:CodigoEvento,:CodigoOrganizador,:Nombre,:Fecha,:Costo,:Descuento,:Tipo,:Aviso,:Imagen)');
$consultaEvento->execute(array(':CodigoEvento'=>$codigo_evento,':CodigoOrganizador'=>$codigo_organizador,':Nombre'=>$nombre_evento,':Fecha'=>$fecha,':Costo'=>$costo_evento,':Descuento'=>$descuento_evento,':Tipo'=>$tipo_evento,':Aviso'=>$aviso_evento,':Imagen'=>$Destino));
$resultEvento=$consultaEvento->fetch();

//HORARIO
$consultaHorario=$cn->prepare('INSERT INTO horario(CodigoEvento,Dia,Hora)
VALUES(:CodigoEvento,:Dia,:Hora)');
$consultaHorario->execute(array(':CodigoEvento'=>$codigo_evento,':Dia'=>$dia_horario,':Hora'=>$hora_horario));
$resultHorario=$consulta->fetch();

//MODULO
$consultaModulo=$cn->prepare('INSERT INTO modulo(CodigoTema,Nombre,Numero)VALUES(:CodigoTema,:Nombre,:Numero)');
$consultaModulo->execute(array(':CodigoTema'=>$codigo_tema,':Nombre'=>$nombre_modulo,':Numero'=>$numero_modulo));
$resultModulo=$consulta->fetch();

?>