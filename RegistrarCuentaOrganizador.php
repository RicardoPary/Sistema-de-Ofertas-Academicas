<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Registro de Datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="all" href="css/Registro2.css" />

</head>

<body bgcolor="#F4F4F4">
<?php 
include('Conexion.php');

$consulta=$cn->prepare('SELECT * FROM institucion');
$consulta->execute();
?>


<form action="CrearOrganizador.php" method="post" enctype="multipart/form-data">

<fieldset>
<legend><strong>Informacion Organizacion</strong></legend>
<table width="487" height="158" border="0" cellpadding="2" cellspacing="0">
 <tr>
	 <td width="16" scope="row">&nbsp;</td>
	 <td width="180" height="22" scope="row"><label for="label">Institucion:</label></td>
	 <td width="246">
	 
	   <select size="1" name="CodigoInstitucion" id="CodigoDepartamento">
	
	<?php 
		
	while($result=$consulta->fetch())
	{
	?>
	<option value="<?php echo $result['CodigoInstitucion']?>"><?php echo $result['Nombre'];?></option>
    <?php 
	}
	?>		 
    </select> 
	</td>
	 <td width="29">&nbsp;</td>
 </tr>
          
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="26" scope="row"><label for="label">Nombre:</label></td>
     <td><input type="text" name="Nombre"  size="30" maxlength="32" /></td>
     <td>&nbsp;</td>
 </tr>
          
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"><label for="label3">Credencial:</label></td>
     <td><input type="text" name="Credencial" id="email22" size="30" maxlength="128" /></td>
     <td>&nbsp;</td>
 </tr>
          
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="22" scope="row"><label for="label">Telefono:</label></td>
     <td><input type="text" name="Telefono" id="password4" size="30" maxlength="32" /></td>
     <td>&nbsp;</td>
 </tr>
   
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="22" scope="row"><label for="label2">Nick:</label></td>
     <td><input type="text" name="Nick" id="password5" size="30" maxlength="32" /></td>
     <td>&nbsp;</td>
 </tr>
       
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="22" scope="row"><label for="label2">Password:</label></td>
     <td>
	    <input type="text" name="Password" id="password5" size="30" maxlength="32" />    </td>
     <td>&nbsp;</td>	 
 </tr>
         
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="22" scope="row"><label for="label2">Imagen:</label></td>
     <td><input type="file" name="Imagen" id="password11" size="30" maxlength="32" /></td>
     <td>&nbsp;</td>
 </tr>
   </table>
</fieldset>

	
 <fieldset>
 <table width="495" height="34" border="0" cellpadding="0" cellspacing="0">
   
 <tr>
  <td width="25" height="32" scope="row">&nbsp;</td>
  <td width="96"><input type="submit" name="submit" id="submit" value="Crear" class="submit"/></td>
  <td width="28">&nbsp;</td>
  <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
  <td width="247">&nbsp;</td>
 </tr>
 </table>
 </fieldset>
</form>


</body>
</html>