<?php
if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name']))
{
    $nombreDirectorio = "archivos/";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $archivotipo = $_FILES['nombre_archivo_cliente']['type'];
    $archivosize = $_FILES['nombre_archivo_cliente']['size'];
    $nombreCompleto = $nombreDirectorio . $nombrearchivo;   
    
    if (!((strpos($archivotipo, "gif") || strpos($archivotipo, "jpeg") || strpos($archivotipo, "jpg") || strpos($archivotipo, "png")) && ($archivosize < 1048576))) 
    {
        echo 'Extension o tamaño incorrectos';
    }
    else
    {
        if (is_file($nombreCompleto))
        {
            $idUnico = time();
            $nombrearchivo = $idUnico . "-" . $nombrearchivo;
            echo "Archivo repetido, se cambiara el nombre a $nombrearchivo 
            <br><br>";
        }
    move_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombrearchivo);
    
    echo "El archivo se ha subido satisfactoriamente al directorio 
    $nombreDirectorio <br>";
    }
}
else
    echo "No se ha podido subir el archivo <br>";
?>