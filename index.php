<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Ofertas Academicas</title>
<link rel="stylesheet" href="css/index.css" type="text/css" />	
<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>




			
<script>
function realizaProceso(){
    
         var codigo = $('#Buscar').val();                
    
		CargarBusqueda();			
		function CargarBusqueda()
		{  	
		$("#Medio").load('Busqueda.php',{id:codigo});		
		}	
		
       
}
</script>
		



<script type="text/javascript">
	$(document).ready(function() 
	{							
		CargarCuerpo();			
		function CargarCuerpo()
		{  	
		$("#Cuerpo").load('MuroInicio.php');		
		}					
	});
	     	
	</script>	

<script type="text/javascript">
$(document).ready(function()
{
   $(".EnlaceInicio").each(function(){
      var href = $(this).attr("href");		   
	  $(this).attr({ href: "#"});	  
      $(this).click(function(){	
         $("#Cuerpo").load(href);		 
      });
   });
});		
</script>



</head>
<body bgcolor="#F5F5F5">	
<?php	include('Conexion.php');   echo "";?>
  
<div class="cabeza"> 
<ul id="menu">
 
   <table width="100%" border="0" cellspacing="0" cellpadding="0">   
       <tr>
         <td width="246" rowspan="4" ><img src="Imagenes/received_10204629327371607.jpeg" width="201" height="71" /></td>
         <td width="9" rowspan="4" >&nbsp;</td>
         <td height="19" >&nbsp;</td>
         <td colspan="2" rowspan="4" ><form class="form" action="Login.php" method="post" style=" float:right; padding:0px; margin:0px;">
           <table width="369" border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td width="120" height="19"><label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; float:left; margin-left:5px; margin:2px;">Nick</label></td>
              <td width="10">&nbsp;</td>
              <td width="120"><label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; float:left; margin-left:5px; margin:2px;">Password</label></td>
              <td width="10">&nbsp;</td>
              <td width="109">&nbsp;</td>
            </tr>
             <tr>
               <td><input type="text" name="T1" required="true"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000; " /></td>
              <td>&nbsp;</td>
              <td><input type="password" name="T2" required="true"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;  "/></td>
              <td>&nbsp;</td>
              <td><input name="submit" type="submit" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; float:left; margin-left:5px; background:#666666; border:1px #000000 solid; height:25px; cursor:pointer; font-weight:bold;" value="Acceder"/></td>
            </tr>
             <tr>
               <td>
                <a href="RegistrarCuentaOrganizador.php" class="EnlaceInicio"><label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; float:left; margin-left:5px; margin:2px;">Registrar Organizacion</label></a></td>
              <td>&nbsp;</td>
              <td></td>
              <td></td>
            </tr>
            </table>
         </form></td>
       </tr>
      <tr>
       <td width="425" height="25" ><label style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#FFFFFF; float:left; margin-left:5px; margin:2px; font-weight:bold; margin-left:20px;">SISTEMA DE OFERTAS ACADEMICAS</label></td>
      </tr>
  
  <tr>
  <td>
  
     <input name="Buscar" id="Buscar" type="text" placeholder="        Busca envetos, anuncios y cosas " style="width:400px;" onclick="realizaProceso();"/>
   </td>
  <td width="6" colspan="2" rowspan="2">  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  </table>
</ul>  
 
</div> 
  
<div id="Cuerpo" class="Cuerpo">
</div>
 
		
</body>
</html>