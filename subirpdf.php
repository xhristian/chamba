<?php
$nombre=$_FILES["archivo"]["name"];
$extension=strtolower(array_pop(explode(".",$nombre)));
$carpeta = "files/";
$destino = $carpeta.$nombre;

if ($_FILES['archivo']["error"] > 0)
{
	echo "Error. No se ha seleccionado el archivo para subir.";
}
else
{
	// Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
		if (file_exists($destino))
		{
		echo "El archivo con nombre " . $nombre . " ya existe. Por lo que no se volverá a subir. <br>";
		}
	else{
			
			if($extension=="pdf")
				{ 
				opendir($carpeta);
				copy ($_FILES["archivo"]["tmp_name"], $destino);/* con la función copy
pasaremos el archivo que está en el directorio temporal
al subdirectorio que contiene el script que estamos
ejecutando. Podríamos incluir un path y copiarlo
a otro directorio */
				
				echo "Archivo subido correctamente <br><br>";
				echo "Nombre: " . $nombre . "<br>";
				echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
				echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB <br>";
				echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
				/*ahora con la funcion move_uploaded_file lo guardaremos en el destino que queramos*/

				move_uploaded_file($_FILES['archivo']['tmp_name'],$destino);
				/*move_uploaded_file($_FILES['archivo']['tmp_name'],‘subidas/’.$_FILES['archivo']['name']);*/
				}
			else{
					echo "El archivo que intenta subir no tiene formato pdf sino ". $extension . " Por lo que no se subirá";
					}
			}
}
/****************/
?>
