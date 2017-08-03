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
    $(function(){
        $("#formuploadajax").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "CrearFormularioEvento.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	            processData: false,
				success:  function() {   alert('Evento Registrado con Exito');  }
            })               
        });
    });
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
 
$consultaHorario=$cn->prepare('SELECT * FROM evento');
$consultaHorario->execute(array(':Codigo'=>$cod));

$consultaModulo=$cn->prepare('SELECT * FROM tema WHERE CodigoEvento IN (SELECT CodigoEvento FROM evento WHERE CodigoOrganizador=:Codigo)');
$consultaModulo->execute(array(':Codigo'=>$cod));

$consultaTema=$cn->prepare('SELECT * FROM evento WHERE CodigoOrganizador=:Codigo');
$consultaTema->execute(array(':Codigo'=>$cod));
 

?>

<form enctype="multipart/form-data" id="formuploadajax" method="post">

  <fieldset>
<legend><strong>Informacion de Evento</strong></legend>
<table width="860" height="114" border="0" cellpadding="2" cellspacing="0">
 <tr>
   <td scope="row">&nbsp;</td>
   <td height="22" scope="row"><label for="label">Codigo del Evento:</label></td>
   <td colspan="4"><input type="text" name="codigo_evento" id="CodigoEvento" size="30" maxlength="32" />
     Codigos Restringidos<select size="1" name="nulo" id="nulo">
       <?php 
		
	while($result=$consultaHorario->fetch())
	{
	?>
       <option value="<?php echo $result['CodigoEvento']?>"><?php echo $result['CodigoEvento'];?></option>
       <?php 
	}
	?>
     </select></td>
   </tr>
 <tr>
	 <td width="6" scope="row">&nbsp;</td>
	 <td width="181" height="22" scope="row"><label for="label">Nombre del Evento:</label></td>
	 <td width="247"><input type="text" name="nombre_evento" id="NombreEvento" size="30" maxlength="32" /></td>
	 <td width="18">&nbsp;</td>
	 <td width="117"><label for="label2">Descuento:</label></td>
	 <td width="267"><input type="text" name="descuento_evento" id="Descuento" size="30" maxlength="32" />Bs</td>
 </tr>
          
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="26" scope="row"><label for="label3">Fecha:</label></td>
     <td><select size="1" name="mes_evento"  id="Mes">
       <option value="Enero">Enero</option>
       <option value="Febrero">Febrero</option>
       <option value="Marzo">Marzo</option>
       <option value="Abril">Abril</option>
       <option value="Mayo">Mayo</option>
       <option value="Junio">Junio</option>
       <option value="Julio">Julio</option>
       <option value="Agosto">Agosto</option>
       <option value="Septiembre">Septiembre</option>
       <option value="Octubre">Octubre</option>
       <option value="Noviembre">Noviembre</option>
       <option value="Diciembre">Diciembre</option>
     </select>
       <select size="1" name="dia_evento" id="Dia">
         <option value="01">01</option>
         <option value="02">02</option>
         <option value="03">03</option>
         <option value="04">04</option>
         <option value="05">05</option>
         <option value="06">06</option>
         <option value="07">07</option>
         <option value="08">08</option>
         <option value="09">09</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
         <option value="13">13</option>
         <option value="14">14</option>
         <option value="15">15</option>
         <option value="16">16</option>
         <option value="17">17</option>
         <option value="18">18</option>
         <option value="19">19</option>
         <option value="20">20</option>
         <option value="21">21</option>
         <option value="22">22</option>
         <option value="23">23</option>
         <option value="24">24</option>
         <option value="25">25</option>
         <option value="26">26</option>
         <option value="27">27</option>
         <option value="28">28</option>
         <option value="29">29</option>
         <option value="30">30</option>
         <option value="31">31</option>
       </select>
       <select size="1" name="gestion_evento" id="Gestion">
         <option value="2019">2019</option>
         <option value="2018">2018</option>
         <option value="2017">2017</option>
         <option value="2016">2016</option>
         <option value="2015">2015</option>
         <option value="2014">2014</option>
         <option value="2013">2013</option>
         <option value="2012">2012</option>
         <option value="2011">2011</option>
         <option value="2010">2010</option>
         <option value="2009">2009</option>
         <option value="2008">2008</option>
         <option value="2007">2007</option>
         <option value="2006">2006</option>
         <option value="2005">2005</option>
         <option value="2004">2004</option>
         <option value="2003">2003</option>
         <option value="2002">2002</option>
         <option value="2001">2001</option>
         <option value="2000">2000</option>
         <option value="1999">1999</option>
         <option value="1998">1998</option>
         <option value="1997">1997</option>
         <option value="1996">1996</option>
         <option value="1995">1995</option>
         <option value="1994">1994</option>
         <option value="1993">1993</option>
         <option value="1992">1992</option>
         <option value="1991">1991</option>
         <option value="1990">1990</option>
         <option value="1989">1989</option>
         <option value="1988">1988</option>
         <option value="1987">1987</option>
         <option value="1986">1986</option>
         <option value="1985">1985</option>
         <option value="1984">1984</option>
         <option value="1983">1983</option>
         <option value="1982">1982</option>
         <option value="1981">1981</option>
         <option value="1980">1980</option>
         <option value="1979">1979</option>
         <option value="1978">1978</option>
         <option value="1977">1977</option>
         <option value="1976">1976</option>
         <option value="1975">1975</option>
         <option value="1974">1974</option>
         <option value="1973">1973</option>
         <option value="1972">1972</option>
         <option value="1971">1971</option>
         <option value="1970">1970</option>
         <option value="1969">1969</option>
         <option value="1968">1968</option>
         <option value="1967">1967</option>
         <option value="1966">1966</option>
         <option value="1965">1965</option>
         <option value="1964">1964</option>
         <option value="1963">1963</option>
         <option value="1962">1962</option>
         <option value="1961">1961</option>
         <option value="1960">1960</option>
         <option value="1959">1959</option>
         <option value="1958">1958</option>
         <option value="1957">1957</option>
         <option value="1956">1956</option>
         <option value="1955">1955</option>
         <option value="1954">1954</option>
         <option value="1953">1953</option>
         <option value="1952">1952</option>
         <option value="1951">1951</option>
         <option value="1950">1950</option>
       </select></td>
     <td>&nbsp;</td>
     <td><label for="label2">Tipo:</label></td>
     <td><select size="1" name="tipo_evento" id="Tipo">
       <option value="Curso">Curso</option>
       <option value="Seminario">Seminario</option>
       <option value="Congreso">Congreso</option>
       <option value="Taller">Taller</option>
       <option value="Postgrado">Postgrado</option>
       <option value="Maestria">Maestria</option>
       <option value="Diplomado">Diplomado</option>
     </select></td>
 </tr>
          
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"><label for="label">Costo:</label></td>
     <td><input type="text" name="costo_evento" id="Costo" size="30" maxlength="32" />       
      Bs</td>
     <td>&nbsp;</td>
     <td><label for="label2">Aviso:</label></td>
     <td><input type="text" name="aviso_evento" id="aviso_evento" size="30" maxlength="32" /></td>
 </tr>
          
 <tr>
     <td scope="row">&nbsp;</td>
     <td height="22" scope="row"></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td><label for="label2">Imagen:</label></td>
     <td><input type="file" name="imagen_evento" id="Imagen" size="30" maxlength="32" /></td>
 </tr>
</table>
 </fieldset>
	

<fieldset>
<legend><strong>Informacion de Horario</strong></legend>
<table width="873" height="22" border="0" cellpadding="2" cellspacing="0">
 <tr>
	 <td width="69" rowspan="2" scope="row">&nbsp;</td>
	 <td width="150" height="11" scope="row"><label for="label">Dia:</label></td>
	 <td width="285"><select size="1" name="dia_horario" id="select">
       <option value="Lunes">Lunes</option>
       <option value="Martes">Martes</option>
       <option value="Miercoles">Miercoles</option>
       <option value="Jueves">Jueves</option>
       <option value="Viernes">Viernes</option>
       <option value="Sabado">Sabado</option>
       <option value="Domingo">Domingo</option>
     </select> </td>
	 <td width="12" rowspan="2">&nbsp;</td>
	 <td width="106"><label for="label3">Hora:</label></td>
	 <td width="227"><input type="text" name="hora_horario" id="Hora" size="30" maxlength="32" /></td>
 </tr>
 <tr>
   <td height="11" scope="row"></td>
   <td width="285">&nbsp;</td>
   <td width="106">&nbsp;</td>
   <td width="227">&nbsp;</td>
 </tr>
</table>
 </fieldset>
	
 


<fieldset>
<legend><strong>Informacion de Modulo</strong></legend>
<table width="880" height="70" border="0" cellpadding="2" cellspacing="0">
 <tr>
	 <td width="54" rowspan="2" scope="row">&nbsp;</td>
	 <td width="243" height="11" scope="row"><label for="label">Tema:</label></td>
	 <td width="260">
	 
	 <select size="1" name="codigo_tema_modulo" id="CodigoTema">
	
	<?php 
		
	while($resultModulo=$consultaModulo->fetch())
	{
	?>
	<option value="<?php echo $resultModulo['CodigoTema']?>"><?php echo $resultModulo['Titulo'];?></option>
    <?php 
	}
	?>		 
    </select>	 
	 
	 
	 </td>
	 
	 <td width="8" rowspan="2">&nbsp;</td>
	 <td width="79"><label for="label3">Numero:</label></td>
	 <td width="212"><input type="text" name="numero_modulo" id="Numero" size="30" maxlength="32" /></td>
 </tr>
 <tr>
   <td height="11" scope="row"><label for="label">Nombre:</label></td>
   <td width="260"><input type="text" name="nombre_modulo" id="Nombre"   size="30" maxlength="32" /></td>
   <td width="79">&nbsp;</td>
   <td width="212">&nbsp;</td>
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
<legend><strong>Informacion de Tema</strong></legend>
<table width="886" height="48" border="0" cellpadding="2" cellspacing="0">
 <tr>
	 <td width="77" rowspan="2" scope="row">&nbsp;</td>
	 <td width="218" height="11" scope="row"><label for="label">Codigo Facilitador:</label></td>
	 <td width="247"><input type="text" name="codigo_facilitador_tema"  size="30" maxlength="32" id="CodigoFacilitador"/></td>
	 <td width="6" rowspan="2">&nbsp;</td>
	 <td width="59"><label for="label3">Titulo:</label></td>
	 <td width="257"><input type="text" name="titulo_tema" id="Titulo" size="30" maxlength="32" /></td>
 </tr>
 <tr>
   <td height="11" scope="row"><label for="label">Duracion:</label></td>
   <td width="247"><input type="text" name="duracion_tema" size="30" maxlength="32" id="Duracion"/>
     Hrs   </td>
   <td width="59"><label for="label3">Numero:</label></td>
   <td width="257"><input type="text" name="numero_tema" id="Numero" size="30" maxlength="32" /></td>
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
 <table width="776" height="34" border="0" cellpadding="0" cellspacing="0">
   
 <tr>
  <td width="25" height="32" scope="row">&nbsp;</td>
  <td width="96"><input type="submit" value="Registrar" class="submit"/></td>
  <td width="28">&nbsp;</td>
  <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
  <td width="247"><input type="text" name="codigo_organizador" id="CodigoOrganizador"  size="30" maxlength="32" value="<?php echo $cod;?>" style="visibility:hidden;"/></td>
 </tr>
 </table>
 </fieldset>

        
</form>
    


<div style="width:900px; margin:10px auto;">
  <table width="900"  border="0" id="example">
    <thead>
      <tr >
	   <td width="128" height="25"><span class="Estilo15">Imagen</span></td>
        <td width="128" height="25"><span class="Estilo15">Codigo Evento</span></td>
        <td width="106"><span class="Estilo15">Nombre</span></td>
        <td width="116"><span class="Estilo15">Fecha</span></td>
        <td width="125"><span class="Estilo15">Costo</span></td>
        <td width="134"><span class="Estilo15">Descuento</span></td>
        <td width="134"><span class="Estilo15">Tipo</span></td>
        <td width="134"><span class="Estilo15">Aviso</span></td>
      </tr>
    </thead>
    <tfoot>
      <tr>
   <td width="128" height="25"><span class="Estilo15">Imagen</span></td>
        <td width="128" height="25"><span class="Estilo15">Codigo Evento</span></td>
        <td width="106"><span class="Estilo15">Nombre</span></td>
        <td width="116"><span class="Estilo15">Fecha</span></td>
        <td width="125"><span class="Estilo15">Costo</span></td>
        <td width="134"><span class="Estilo15">Descuento</span></td>
        <td width="134"><span class="Estilo15">Tipo</span></td>
        <td width="134"><span class="Estilo15">Aviso</span></td>
      </tr>
    </tfoot>
    <tbody>
      <?php 
include("Conexion.php");
$cod=$_POST['id'];

	$sql=$cn->prepare('SELECT * FROM evento WHERE CodigoOrganizador=:Codigo');	
	$sql->execute(array(':Codigo'=>$cod));		
	
  while($op=$sql->fetch())	 	
   { ?>
      <tr>
         <td><span class="Estilo3"><img src=<?php echo $op['Imagen'];?> width="60" height="55"></span></td>
		 <td><span class="Estilo3"><?php echo $op['CodigoEvento'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['Nombre'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['Fecha'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['Costo'];?></span></td>
        <td ><span class="Estilo3"><?php echo $op['Descuento'];?></span></td>
        <td ><span class="Estilo3"><?php echo $op['Tipo'];?></span></td>
        <td ><span class="Estilo3"><?php echo $op['Aviso'];?></span></td>
      </tr>
      <?php		
}	
?>
    </tbody>
  </table>
</div>


</body>
</html>