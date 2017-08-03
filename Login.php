<?php
include("Conexion.php");

	$a1=$_POST['T1'];
	$a2=$_POST['T2'];
		
	$sql=$cn->prepare('SELECT * FROM organizador WHERE Nick=:Correo AND Password=:Contra');	
	$sql->execute(array(':Correo' => $a1,':Contra' => $a2 ));		
	$resultado = $sql->fetch();
	
	$tam=count($resultado);	
	$cod=$resultado['CodigoOrganizador'];
	
	$sql2=$cn->prepare('SELECT * FROM estado WHERE CodigoOrganizador=:Cod');	
	$sql2->execute(array(':Cod' => $cod));		
	$resultado2 = $sql2->fetch();
	
	if($tam>1)		
	{	
	
	$est=$resultado2['Nombre'];
				
			if($est == "Inactivo")
			{				
			$es="Activo";					
			$sql3=$cn->prepare('UPDATE estado SET Nombre=:Nombre WHERE CodigoOrganizador=:Codigo');	
			$sql3->execute(array(':Nombre' => $es,':Codigo' => $cod));		
			$resultado3 = $sql3->fetch();																			
			header("Location: Organizador.php?id=".$cod);	
			}
			else
			{
			header('Location: index.php');
			}
    }
	else
	{	
	header('Location: index.php');	
	}	

?>
