<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === 0) {
        // Define la ubicación donde se almacenarán las imágenes de perfil
        $rutaDestino = "ruta/donde/guardar/las/imagenes/";

        // Genera un nombre único para la imagen para evitar conflictos de nombres
        $nombreImagen = uniqid("perfil_") . "_" . $_FILES["foto"]["name"];

        // Mueve el archivo temporal a la ubicación de destino
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaDestino . $nombreImagen)) {
            // Actualiza la ruta de la imagen en la sesión del usuario
            $_SESSION['usuario']['ruta_imagen'] = $rutaDestino . $nombreImagen;

            // Respuesta de éxito (puedes modificar esta respuesta según tus necesidades)
            echo "La imagen se ha subido correctamente.";

            // Redirecciona a la página del perfil del usuario o a otra ubicación deseada
            // header("Location: perfil.php");
            // exit;
        } else {
            echo "Hubo un error al guardar la imagen.";
        }
    } else {
        echo "No se ha subido ninguna imagen o se produjo un error en la carga.";
    }
}
?>
