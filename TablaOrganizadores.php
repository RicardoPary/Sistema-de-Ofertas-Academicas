<html>
<head>
<title>Tabla de Organizadores</title>

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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><head>
	
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>

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
<div style="width:800px; margin:10px auto; ">

<table width="795"  border="0" id="example" >
  <thead>
    <tr >
	  <td width="85"><span class="Estilo15">Foto</span></td>
      <td width="128" height="25"><span class="Estilo15">Codigo Organizador </span></td>
      <td width="106"><span class="Estilo15">Codigo Institucion </span></td>
      <td width="116"><span class="Estilo15">Nombre</span></td>
      <td width="125"><span class="Estilo15">Credencial</span></td>
	  <td width="134"><span class="Estilo15">Telefono</span></td>
    </tr>
  </thead>
  <tfoot>
    <tr>
        <td width="85"><span class="Estilo15">Foto</span></td>
      <td width="128" height="25"><span class="Estilo15">Codigo Organizador </span></td>
      <td width="106"><span class="Estilo15">Codigo Institucion </span></td>
      <td width="116"><span class="Estilo15">Nombre</span></td>
      <td width="125"><span class="Estilo15">Credencial</span></td>
	  <td width="134"><span class="Estilo15">Telefono</span></td>
    </tr>
  </tfoot>
  <tbody>
    <?php 
include("Conexion.php");

	$sql=$cn->prepare('SELECT * FROM organizador');	
	$sql->execute();		
	
  while($op=$sql->fetch())	 	
   { ?>
 


<tr>
  <td ><span class="Estilo3"><img src=<?php echo $op['Imagen'];?> width="63" height="57" style="padding:1px; border:1px #CCCCCC solid;"></span></td>
  <td><span class="Estilo3"><?php echo $op['CodigoOrganizador'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['CodigoInstitucion'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['Nombre'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['Credencial'];?></span></td>
  <td ><span class="Estilo3"><?php echo $op['Telefono'];?></span></td>
 
</tr>

<?php		
}	
?>
  </tbody>
</table>

</div>

</body>


</html>
