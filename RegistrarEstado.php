<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Registro de Datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.Estilo3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo15 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000099; font-weight: bold; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}

</style>
<link rel="stylesheet" type="text/css" media="all" href="css/RegistrarCuenta.css" />
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables_themeroller.css"/>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>

		
			
<script>
function realizaProceso(){
        var parametros = {
                "CodigoOrganizador" : $('#CodigoOrganizador').val(),
               	"Nombre" : $('#Nombre').val()
        };
        $.ajax({
                data:  parametros,
                url:   'CrearEstado.php',
                type:  'post',
                success:  function() {   alert('Registrado con Exito');  }
        });
}
</script>
		
		
<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "language": {         	
	"processing": "cargando......",
	"lengthMenu": "Mostrar _MENU_ registros",
	"zeroRecords": "No existen registros",
		"info": "pagina _PAGE_ de _PAGES_",
	"infoEmpty": "Ningun registro disponible",
	"infoFiltered": "(filtrado de  _MAX_ total registros)",
	"infoPostFix": "",
	"search": "Buscar",
	"url": "",
	"paginate": {
		"first":    "Primero",
		"previous": "Anterior",
		"next":     "Siguiente",
		"last":     "Ultimo"
				}				
        }
    } );
} );
</script>

</head>

<body>
<?php 
include('Conexion.php');

$consulta=$cn->prepare('SELECT * FROM organizador WHERE CodigoOrganizador NOT IN (SELECT CodigoOrganizador FROM estado)');
$consulta->execute();
?>





<fieldset>
<legend><strong>Informacion Estado</strong></legend>
<table width="776" height="48" border="0" cellpadding="2" cellspacing="0">
          
 <tr>
   <td width="9" scope="row">&nbsp;</td>
   <td width="179" height="26" scope="row"><label for="label2">Codigo Organizador:</label></td>
   <td width="90"><select size="1" name="Genero" id="CodigoOrganizador">
     <?php 
		
	while($result=$consulta->fetch())
	{
	?>
     <option value="<?php echo $result['CodigoOrganizador']?>"><?php echo $result['CodigoOrganizador'];?></option>
     <?php 
	}
	?>
   </select></td>
   <td width="40">&nbsp;</td>
   <td width="190"><label for="label3">Nombre:</label></td>
   <td width="225"><select size="1" name="Nombre" id="Nombre">
     <option value="Activo">Activo</option>
     <option value="Inactivo">Inactivo</option>
   </select></td>
   <td width="15">&nbsp;</td>
 </tr>

 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
 </tr>
</table>
</fieldset>
	
 <fieldset>
 <table width="776" height="34" border="0" cellpadding="0" cellspacing="0">
   
 <tr>
  <td width="25" height="32" scope="row">&nbsp;</td>
  <td width="96"><input type="button" href="javascript:;" onclick="realizaProceso();return false;" value="Registrar" class="submit"/></td>
  <td width="28">&nbsp;</td>
  <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
  <td width="247">&nbsp;</td>
 </tr>
 </table>
 </fieldset>




<div style="width:790px; margin:10px auto;">

<table width="788"  border="0" id="example">
  <thead>
    <tr >
	  <td width="128" height="25"><span class="Estilo15">Codigo Estado</span></td>
      <td width="106"><span class="Estilo15">Codigo Organizador</span></td>
    
      <td width="125"><span class="Estilo15">Nombre</span></td>
    </tr>
  </thead>
  <tfoot>
    <tr>
   	  	   <td width="128" height="25"><span class="Estilo15">Codigo Estado</span></td>
      <td width="106"><span class="Estilo15">Codigo Organizador</span></td>
    
      <td width="125"><span class="Estilo15">Nombre</span></td>
    </tr>
  </tfoot>
  <tbody>
    <?php 


	$sql=$cn->prepare('SELECT * FROM estado');	
	$sql->execute();		
	
  while($op=$sql->fetch())	 	
   { ?>
 


<tr>
  <td><span class="Estilo3"><?php echo $op['CodigoEstado'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['CodigoOrganizador'];?></span></td>

  <td><span class="Estilo3"><?php echo $op['Nombre'];?></span></td>
</tr>

<?php		
}	
?>
  </tbody>
</table>

</div>



</body>
</html>
