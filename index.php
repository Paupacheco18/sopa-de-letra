<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Palabras</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<body>
  
    <div class="container">
    <h2>Buscador de Palabras en Sopa de Letras</h2>
    <form action="resultado.php" method="post">
        <label for="palabras">Ingrese las palabras separadas por coma:</label><br>
        <input type="text" id="palabras" name="palabras" required><br>
       <label for="matriz">Ingrese la matriz de letras separadas por coma:</label><br>
        <textarea id="matriz" name="matriz" rows="14" cols="14" required></textarea><br> 
        <input type="submit" value="Buscar"></a></li>
    </form>
    </div>
</body> 
</html>