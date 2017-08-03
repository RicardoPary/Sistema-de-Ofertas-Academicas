<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" media="all" href="css/RegistrarCuenta.css" />
<style type="text/css">
<!--
.Estilo1 {font-family: Vrinda}
-->
</style>

<link rel="stylesheet" href="Aula.css">
<script src="js/jquery.js"></script>
		<script src="js/jquery-1.11.0.min.js"></script>


<style type="text/css">
<!--
.Estilo3 {
	font-size: 18px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #999999;
}
-->
</style>
</head>

<body>
 <div>
  <div align="center" class="Estilo3">EVENTOS PERSONALIZADOS</div>
</div>

 
 
<?php
include('Conexion.php');
$cod=$_GET['id'];

$sql=$cn->prepare('SELECT I.Codigoinstitucion,I.Nombre as NombreInstitucion,E.CodigoEvento,E.Nombre as NombreEvento,E.Fecha,I.Imagen,E.Costo,E.Descuento,E.Tipo,E.Aviso FROM evento E,organizador O,institucion I WHERE E.CodigoOrganizador=O.CodigoOrganizador AND O.CodigoInstitucion=I.CodigoInstitucion AND E.CodigoEvento=:CodigoEvento');
$sql->execute(array(':CodigoEvento'=>$cod));

$op=$sql->fetch();


$sql2=$cn->prepare('SELECT * FROM ambiente WHERE CodigoEvento=:CodigoEvento');
$sql2->execute(array(':CodigoEvento'=>$cod));


$sql3=$cn->prepare('SELECT * FROM horario WHERE CodigoEvento=:CodigoEvento');
$sql3->execute(array(':CodigoEvento'=>$cod));


$sql4=$cn->prepare('SELECT * FROM tema WHERE CodigoEvento=:CodigoEvento');
$sql4->execute(array(':CodigoEvento'=>$cod));

$sql5=$cn->prepare('SELECT M.Nombre,M.Numero FROM modulo M,tema T WHERE T.CodigoEvento=:CodigoEvento AND T.CodigoTema=M.CodigoTema ');
$sql5->execute(array(':CodigoEvento'=>$cod));

?>
<form  id="formChat" role="form">

<fieldset>
<legend><strong>Informacion de Evento</strong></legend>
<table width="890" height="114" border="0" cellpadding="2" cellspacing="0" align="center">
 <tr>
	 <td width="3" scope="row">&nbsp;</td>
	 <td width="91" rowspan="5" scope="row"><a href=""><img src=<?php echo $op['Imagen'];?> width="72" height="74" border="0" style="padding:2px; margin-left:15px;"/></a></td>
	 <td width="167" height="22" scope="row"><label for="label">Codigo Organizador:</label></td>
	 <td width="276"><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $cod;?></span></td>
	 <td width="6">&nbsp;</td>
	 <td width="79"><label for="label2">Descuento:</label></td>
	 <td width="240"><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['Descuento'];?></span></td>
 </tr>
          
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="26" scope="row"><label for="label">Nombre:</label></td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['NombreEvento'];?></span></td>
     <td>&nbsp;</td>
     <td><label for="label2">Tipo:</label></td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['Tipo'];?></span></td>
 </tr>
          
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"><label for="label3">Fecha:</label></td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['Fecha'];?></span></td>
     <td>&nbsp;</td>
     <td><label for="label2">Aviso:</label></td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['Aviso'];?></span></td>
 </tr>
          
 <tr>
   <td scope="row">&nbsp;</td>
   <td height="22" scope="row"><label for="label">Costo:</label></td>
   <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['Costo'];?></span></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="22" scope="row"><label for="label">Institucion:</label></td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['NombreInstitucion'];?></span></td>
     <td>&nbsp;</td>
     <td><label for="label2">Imagen:</label></td>
     <td>&nbsp;</td>
 </tr>
</table>
 </fieldset>
	

</form>



<form  id="formChat2" role="form">

<fieldset>
<legend><strong>Informacion de Ambiente</strong></legend>
<table width="695" height="53" border="1" cellpadding="2" cellspacing="0" align="center">
 
 <thead bgcolor="#FFFF1C">
 <tr>
 
	 <td width="4" height="25" scope="row">&nbsp;</td>
	 <td width="168"><label for="label" style="float:left; font-weight:bold;">Nombre</label></td>
	 <td width="4">&nbsp;</td>
	 <td width="94"><label for="label"style="float:left; font-weight:bold;">Tipo</label></td>
	 <td width="4">&nbsp;</td>
	 <td width="122"><label for="label"style="float:left; font-weight:bold;">Capacidad</label></td>
	 <td width="4">&nbsp;</td>
	 <td width="235"><label style="float:left; font-weight:bold;">Direccion</label></td>
	 <td width="4">&nbsp;</td>
 </tr>
 </thead>
      
<?php
while($op2=$sql2->fetch())
{
?>	      
 <tr>
     <td height="26" scope="row">&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op2['Nombre'];?></span></td>
     <td>&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op2['Tipo'];?></span></td>
     <td>&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op2['Capacidad'];?></span></td>
     <td>&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op2['Direccion'];?></span></td>
     <td>&nbsp;</td>
 </tr>
 
 <?php
 }
 ?>
</table>
 </fieldset>
	
 
</form>


<form  id="formChat3" role="form">

<fieldset>
<legend><strong>Informacion de Horario</strong></legend>
<table width="433" height="53" border="1" cellpadding="2" cellspacing="0" align="center">

<thead bgcolor="#FFFF1C">

 <tr>
	 <td width="4" height="25" scope="row">&nbsp;</td>
	 <td width="197"><label for="label" style="float:left; font-weight:bold;">Dia</label></td>
	 <td width="4">&nbsp;</td>
	 <td width="192"><label for="label" style="float:left; font-weight:bold;">Hora</label></td>
	 <td width="4">&nbsp;</td>
	 </tr>
    </thead>
<?php
while($op3=$sql3->fetch())
{
?>	      
 <tr>
     <td height="26" scope="row">&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op3['Dia'];?></span></td>
     <td>&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op3['Hora'];?></span></td>
     <td>&nbsp;</td>
    </tr>
 
 <?php
 }
 ?>
</table>
 </fieldset>
	

</form>


<form  id="formChat4" role="form">

<fieldset>
<legend><strong>Informacion de Tema</strong></legend>
<table width="623" height="53" border="1" cellpadding="2" cellspacing="0" align="center">
 <thead bgcolor="#FFFF1C">
 <tr>
	 <td width="4" height="25" scope="row">&nbsp;</td>
	 <td width="130"><label for="label" style="float:left; font-weight:bold;">Codigo Facilitador</label></td>
	 <td width="4">&nbsp;</td>
	 <td width="145"><label for="label" style="float:left; font-weight:bold;">Duracion</label></td>
	 <td width="4">&nbsp;</td>
	 <td width="130"><label for="label" style="float:left; font-weight:bold;">Titulo</label></td>
	 <td width="4">&nbsp;</td>
	 <td width="142"><label style="float:left; font-weight:bold;">Numero</label></td>
	 <td width="4">&nbsp;</td>
 </tr>
    </thead>
<?php
while($op4=$sql4->fetch())
{
?>	      
 <tr>
     <td height="26" scope="row">&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op4['CodigoFacilitador'];?></span></td>
     <td>&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op4['Duracion'];?></span></td>
     <td>&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op4['Titulo'];?></span></td>
     <td>&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op4['Numero'];?></span></td>
     <td>&nbsp;</td>
 </tr>
 
 <?php
 }
 ?>
</table>
 </fieldset>
	
 
</form>


<form  id="formChat5" role="form">

<fieldset>
<legend><strong>Informacion de Modulo</strong></legend>
<table width="434" height="53" border="1" cellpadding="2" cellspacing="0" align="center">
<thead bgcolor="#FFFF1C">
 <tr>
	 <td width="4" height="25" scope="row">&nbsp;</td>
	 <td width="197"><label for="label" style="float:left; font-weight:bold;">Nombre Modulo </label></td>
	 <td width="4">&nbsp;</td>
	 <td width="193"><label for="label" style="float:left; font-weight:bold;">Numero de Modulo</label></td>
	 <td width="4">&nbsp;</td>
	 </tr>
	</thead>
      
<?php
while($op5=$sql5->fetch())
{
?>	      
 <tr>
     <td height="26" scope="row">&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op5['Nombre'];?></span></td>
     <td>&nbsp;</td>
     <td><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op5['Numero'];?></span></td>
     <td>&nbsp;</td>
    </tr>
 
 <?php
 }
 ?>
</table>
 </fieldset>
	
 
</form>


</body>
</html>

</body>
</html>
