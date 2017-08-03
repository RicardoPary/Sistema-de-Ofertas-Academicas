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
                "codigo_organizador" : $('#CodigoOrganizador').val(),
                "codigo_evento" : $('#CodigoEvento').val(),
				"nombre" : $('#Nombre').val(),
				"capacidad" : $('#Capacidad').val(),
				"tipo" : $('#Tipo').val(),				
				"direccion" : $('#Direccion').val(),
              	
        };
        $.ajax({
                data:  parametros,
                url:   'CrearAmbiente.php',
                type:  'post',
                success:  function() {   alert('Ambiente Creado con Exito');  }
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

<body bgcolor="#F4F4F4">
<?php
 include('Conexion.php');
 $cod=$_POST['id'];
 
$consulta=$cn->prepare('SELECT * FROM evento WHERE CodigoOrganizador=:Codigo');
$consulta->execute(array(':Codigo'=>$cod));
?>


<fieldset>
<legend><strong>Informacion de Ambiente</strong></legend>
<table width="883" height="70" border="0" cellpadding="2" cellspacing="0">
 <tr>
	 <td width="69" rowspan="3" scope="row">&nbsp;</td>
	 <td width="146" height="11" scope="row"><label for="label">Evento</label></td>
	 <td width="290"><select size="1" name="CodigoInstitucion" id="CodigoEvento">
       <?php 
		
	while($result=$consulta->fetch())
	{
	?>
       <option value="<?php echo $result['CodigoEvento']?>"><?php echo $result['Nombre'];?></option>
       <?php 
	}
	?>
     </select></td>
	 <td width="14" rowspan="3">&nbsp;</td>
	 <td width="159"><label for="label3">Tipo de Ambiente:</label></td>
	 <td width="181"><input type="text" name="T3" id="Tipo" size="30" maxlength="32" /></td>
 </tr>
 <tr>
   <td height="11" scope="row"><label for="label">Nombre Ambiente:</label></td>
   <td><input type="text" name="T1"  size="30" maxlength="32" id="Nombre"/></td>
   <td width="159"><label for="label">Direccion:</label></td>
   <td width="181"><input type="text" name="T4" id="Direccion" size="30" maxlength="32" /></td>
 </tr>
 <tr>
   <td height="11" scope="row"><label for="label">Capacidad:</label></td>
   <td width="290"><input type="text" name="T2"  size="30" maxlength="32" id="Capacidad"/></td>
   <td width="159">&nbsp;</td>
   <td width="181">&nbsp;</td>
 </tr>
          
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="26" scope="row"></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td></td>
     <td>&nbsp;</td>
 </tr>
</table>
 </fieldset>
	
 <fieldset>
 <table width="881" height="34" border="0" cellpadding="0" cellspacing="0">
   
 <tr>
  <td width="25" height="32" scope="row">&nbsp;</td>
  <td width="96"><input name="button" type="button" class="submit" onclick="realizaProceso();return false;" value="Registrar" href="javascript:;"/></td>
  <td width="28">&nbsp;</td>
  <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
  <td width="633"><input type="text" name="T12"  size="30" maxlength="32" value="<?php echo $cod;?>" id="CodigoOrganizador" style="visibility:hidden;"/></td>
 </tr>
 </table>
 </fieldset>





<div style="width:900px; margin:10px auto;">

<table width="900"  border="0" id="example">
  <thead>
    <tr >
	  <td width="128" height="25"><span class="Estilo15">Codigo Ambiente</span></td>
      <td width="106"><span class="Estilo15">Codigo Evento</span></td>
      <td width="116"><span class="Estilo15">Nombre</span></td>
      <td width="125"><span class="Estilo15">Capacidad</span></td>
	    <td width="125"><span class="Estilo15">Tipo</span></td>
		  <td width="125"><span class="Estilo15">Direccion</span></td>
	  
    </tr>
  </thead>
  <tfoot>
    <tr>
   	   <td width="128" height="25"><span class="Estilo15">Codigo Ambiente</span></td>
      <td width="106"><span class="Estilo15">Codigo Evento</span></td>
      <td width="116"><span class="Estilo15">Nombre</span></td>
      <td width="125"><span class="Estilo15">Capacidad</span></td>
	    <td width="125"><span class="Estilo15">Tipo</span></td>
		  <td width="125"><span class="Estilo15">Direccion</span></td>
    </tr>
  </tfoot>
  <tbody>
    <?php 


	$sql=$cn->prepare('SELECT * FROM ambiente WHERE CodigoEvento IN (SELECT CodigoEvento FROM evento WHERE CodigoOrganizador=:Codigo)');	
	$sql->execute(array(':Codigo'=>$cod));		
	
  while($op=$sql->fetch())	 	
   { ?>
 


<tr>
  <td><span class="Estilo3"><?php echo $op['CodigoAmbiente'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['CodigoEvento'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['Nombre'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['Capacidad'];?></span></td>
    <td><span class="Estilo3"><?php echo $op['Tipo'];?></span></td>
	  <td><span class="Estilo3"><?php echo $op['Direccion'];?></span></td>
 
</tr>

<?php		
}	
?>
  </tbody>
</table>

</div>



</body>
</html>
