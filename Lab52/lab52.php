<?php
if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name']))
{
    $nombreDirectorio = "archivos/";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombrearchivo;
    $archivosize = $_FILES['nombre_archivo_cliente']['size'];
    if ($archivosize > 1024000) 
    { 
        echo "Archivo que sedea adjuntar supera el tamaño limite: 1MB";
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