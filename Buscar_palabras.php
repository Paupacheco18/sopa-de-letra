<?php
function buscarPalabras($palabras, $matriz) {
    $encontradas = [];
    $noEncontradas = [];

    // Convertir la matriz de letras en un array bidimensional
    $matriz = preg_replace('/\s+/', '', $matriz); // Eliminar espacios en blanco
    $matriz = trim($matriz, ","); // Eliminar comas al inicio y final    
    $sopa = array_map('str_split', preg_split('/\R/', $matriz));

    // Convertir las palabras en un array
    $palabras = explode(",", strtoupper($palabras));

    foreach ($palabras as $palabra) {
        $encontrada = false;
        $palabra = trim($palabra);

        // Verificar horizontalmente
        foreach ($sopa as $fila) {
            $filaTexto = implode('', $fila);
            if (strpos($filaTexto, $palabra) !== false) {
                $encontrada = true;
                break;
            }
        }

        // Verificar verticalmente
        $columnas = count($sopa[0]);
        for ($i = 0; $i < $columnas; $i++) {
            $columnaTexto = '';
            foreach ($sopa as $fila) {
                $columnaTexto .= $fila[$i];
            }
            if (strpos($columnaTexto, $palabra) !== false) {
                $encontrada = true;
                break;
            }
        }

        // Verificar diagonalmente (izquierda a derecha)
        for ($i = 0; $i < count($sopa); $i++) {
            for ($j = 0; $j < $columnas; $j++) {
                $diagonalTexto = '';
                $k = $i;
                $l = $j;
                while ($k < count($sopa) && $l < $columnas) {
                    $diagonalTexto .= $sopa[$k++][$l++];
                }
                if (strpos($diagonalTexto, $palabra) !== false) {
                    $encontrada = true;
                    break 2;
                }
            }
        }

        // Verificar diagonalmente (derecha a izquierda)
        for ($i = 0; $i < count($sopa); $i++) {
            for ($j = $columnas - 1; $j >= 0; $j--) {
                $diagonalTexto = '';
                $k = $i;
                $l = $j;
                while ($k < count($sopa) && $l >= 0) {
                    $diagonalTexto .= $sopa[$k++][$l--];
                }
                if (strpos($diagonalTexto, $palabra) !== false) {
                    $encontrada = true;
                    break 2;
                }
            }
        }

        if ($encontrada) {
            $encontradas[] = $palabra;
        } else {
            $noEncontradas[] = $palabra;
        }
    }

    return [
        'encontradas' => $encontradas,
        'noEncontradas' => $noEncontradas
    ];
}

// Obtener las palabras y la matriz de letras del formulario
$palabras = isset($_POST['palabras']) ? $_POST['palabras'] : '';
$matriz = isset($_POST['matriz']) ? $_POST['matriz'] : '';

// Buscar las palabras en la sopa de letras
$resultado = buscarPalabras($palabras, $matriz);

// Imprimir el resultado
echo "Palabras encontradas: " . implode(', ', $resultado['encontradas']) . "<br>";
echo "Palabras no encontradas: " . implode(', ', $resultado['noEncontradas']);
?>
