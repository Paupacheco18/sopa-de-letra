<?php
// Incluir el archivo buscar_palabras.php
include 'buscar_palabras.php';

// Obtener las palabras y la matriz de letras del formulario
$palabras = isset($_POST['palabras']) ? $_POST['palabras'] : '';
$matriz = isset($_POST['matriz']) ? $_POST['matriz'] : '';

// Buscar las palabras en la sopa de letras
$resultado = buscarPalabras($palabras, $matriz); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Palabras</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<body>
    <div class="resultado">
        <p>Palabras encontradas: <?php echo implode (',',$resultado['encontradas']); ?></p>
        <p>Palabras no encontradas: <?php echo implode (',',$resultado['noencontradas']); ?></p>
    </div>
  
</body> 
</html>