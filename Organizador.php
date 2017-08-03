<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Cuenta Organizador</title>

<link rel="stylesheet" href="css/Organizador.css" type="text/css" />	



<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>

<script type="text/javascript">
	$(document).ready(function() 
	{				
	    CargarCuerpo();			
		function CargarCuerpo()
		{
		var codigo=<?php echo $_GET['id']; ?>;		
		$("#Cuerpo").load('MuroOrganizador.php',{id:codigo});		
		}				
	});	     	
	</script>			
</head>
<body>	
<?php	   
  include('Conexion.php');
  $cod=$_GET['id'];
  $sql=$cn->prepare("SELECT * FROM organizador WHERE CodigoOrganizador=:Codigo");
  $sql->execute(array(':Codigo' => $cod ));
  $op= $sql->fetch();
?>
  
<div class="cabeza"> 
   <table width="100%" border="0" cellspacing="0" cellpadding="0">   
     <tr>	 
       <td width="174" ></td>	   
       <td width="89">&nbsp;</td>
	   <td width="33">&nbsp;</td	   
  >
	   <td width="495"></td>  
  <td width="32"><img src=<?php echo $op['Imagen'];?> width="30" height="26" class="foto2"/> </td>  	   
  <td width="113"><span style="font-family:Geneva, Arial, Helvetica, sans-serif; color:#FFFFFF; font-size:12px; margin-left:5px;"><?php echo $op['Nombre'];?></span></td>       
  <td width="112">
 <a href="Close.php?id=<?php echo $cod;?>" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF;">Cerrar Sesion</a></td>
  </tr>
  </table>
</div>
  
<div id="Cuerpo" class="Cuerpo">
</div>		
</body>
</html>