<?php
if ($_FILES['archivo']["error"] > 0)
{
	echo "Error. No se ha seleccionado el archivo para subir.";
}
else
{
	$carpeta = "files/";
	opendir($carpeta);
	$destino = $carpeta.$_FILES["archivo"]["name"];
	copy ($_FILES["archivo"]["tmp_name"], $destino);
	echo "Archivo subido correctamente <br>";
	$nombre=$_FILES["archivo"]["name"];
	echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
	echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
	echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB <br>";
	echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
/*ahora con la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
	move_uploaded_file($_FILES['archivo']['tmp_name'],$carpeta.$_FILES['archivo']['name']);
/*move_uploaded_file($_FILES['archivo']['tmp_name'],‘subidas/’.$_FILES['archivo']['name']);*/
}
/****************/

?>
