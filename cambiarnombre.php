<?php
function uploadfotoChangeName($_FILES){//sube el archivo y cambia el nombre
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
    $fileName=$_FILES['file']['name'];
    $uploadDir="upload/";
    $uploadFile=$uploadDir.$fileName;    
    $num = 0;
    $name = $fileName;
    $extension = end(explode('.',$fileName));
    $onlyName = substr($fileName,0,strlen($fileName)-(strlen($extension)+1));
    while(file_exists($uploadDir.$name)){
        $num++;            
        $name = $onlyName."".$num.".".$extension;
    }
    $uploadFile = $uploadDir.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);
    return($name);    
    }    
}
?>
