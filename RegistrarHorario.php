<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Registro de Datos</title>

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
				"dia" : $('#Dia').val(),
				"hora" : $('#Hora').val(),
		};
        $.ajax({
                data:  parametros,
                url:   'CrearHorario.php',
                type:  'post',
                success:  function() {   alert('Horario Creado con Exito');  }
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


<form action="CrearHorario.php?id=<?php echo $cod;?>" method="post" enctype="multipart/form-data">

<fieldset>
<legend><strong>Informacion de Horario</strong></legend>
<table width="873" height="70" border="0" cellpadding="2" cellspacing="0">
 <tr>
	 <td width="69" rowspan="2" scope="row">&nbsp;</td>
	 <td width="150" height="11" scope="row"><label for="label">Evento:</label></td>
	 <td width="285">
	 
	<select size="1" name="CodigoInstitucion" id="CodigoEvento">
	
	<?php 
		
	while($result=$consulta->fetch())
	{
	?>
	<option value="<?php echo $result['CodigoEvento']?>"><?php echo $result['Nombre'];?></option>
    <?php 
	}
	?>		 
    </select>	 </td>
	 <td width="12" rowspan="2">&nbsp;</td>
	 <td width="106"><label for="label3">Hora:</label></td>
	 <td width="227"><input type="text" name="T3" id="Hora" size="30" maxlength="32" /></td>
 </tr>
 <tr>
   <td height="11" scope="row"><label for="label">Dia:</label></td>
   <td width="285"><input type="text" name="T2"  size="30" maxlength="32" id="Dia"/></td>
   <td width="106">&nbsp;</td>
   <td width="227">&nbsp;</td>
 </tr>
          
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="26" scope="row"></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
 </tr>
</table>
 </fieldset>
	
 <fieldset>
 <table width="871" height="34" border="0" cellpadding="0" cellspacing="0">
   <tr>
     <td width="25" height="32" scope="row">&nbsp;</td>
     <td width="96"><input name="button" type="button" class="submit" onclick="realizaProceso();return false;" value="Registrar" href="javascript:;"/></td>
     <td width="28">&nbsp;</td>
     <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
     <td width="247"><input type="text" name="T12"  size="30" maxlength="32" value="<?php echo $cod;?>" style="visibility:hidden;"/></td>
   </tr>
 </table>
 </fieldset>
</form>



<div style="width:700px; margin:10px auto;">

<table width="614"  border="0" id="example">
  <thead>
    <tr >
	  <td width="128" height="25"><span class="Estilo15">Codigo Horario</span></td>
      <td width="106"><span class="Estilo15">Codigo Evento</span></td>
      <td width="116"><span class="Estilo15">Dia</span></td>
      <td width="125"><span class="Estilo15">Hora</span></td>
	  
    </tr>
  </thead>
  <tfoot>
    <tr>
   	  <td width="128" height="25"><span class="Estilo15">Codigo Horario</span></td>
      <td width="106"><span class="Estilo15">Codigo Evento</span></td>
      <td width="116"><span class="Estilo15">Dia</span></td>
      <td width="125"><span class="Estilo15">Hora</span></td>
    </tr>
  </tfoot>
  <tbody>
    <?php 


	$sql=$cn->prepare('SELECT * FROM horario WHERE CodigoEvento IN (SELECT CodigoEvento FROM evento WHERE CodigoOrganizador=:Codigo)');	
	$sql->execute(array(':Codigo'=>$cod));		
	
  while($op=$sql->fetch())	 	
   { ?>
 


<tr>
  <td><span class="Estilo3"><?php echo $op['CodigoHorario'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['CodigoEvento'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['Dia'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['Hora'];?></span></td>
 
</tr>

<?php		
}	
?>
  </tbody>
</table>

</div>


</body>
</html>