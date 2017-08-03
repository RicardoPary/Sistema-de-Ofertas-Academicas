<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<?php

$cn=new PDO('mysql:host=localhost;dbname=Sistema Ofertas Academicas','root','');

/*if( $cn)
{echo "<script>alert ('CONEXION EXITOSA');</script>";}
else
{echo "<script>alert ('LA CONEXION FALLO');</script>";}  */


?>




 <?php /*?> <?php 

	$sql=$cn->prepare('SELECT "Nombre", "Paterno", "Materno"  FROM public."Persona"');	
	$sql->execute();		
	//$resultado = $sql->fetch();
	

  
 
  
  while($op=$sql->fetch())	 	
   { ?>
 
	<p><?php echo $op['Nombre'].' '.$op['Paterno'];?></p>

   
    <?php  }  ?>
<?php */?>


</body>
</html>
