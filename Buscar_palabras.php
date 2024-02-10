<?php

function buscarPalabras($palabras, $matriz) {
    $encontradas = [];
    $noEncontradas = [];

    // Convertir la matriz de letras en un array bidimensional
    $sopa = [];
    $filas = explode("\n", trim($matriz));
    foreach ($filas as $fila) {
        $sopa[] = str_replace(",", "", trim($fila));
    }

    // Convertir las palabras en un array
    $palabras = explode(",", strtoupper($palabras));

    // Calcular el número de columnas y filas
    $numFilas = count($sopa);
    $numColumnas = strlen($sopa[0]);

    foreach ($palabras as $palabra) {
        $encontrada = false;
        $palabra = trim($palabra);

        // Verificar horizontalmente
        for ($i = 0; $i < $numFilas; $i++) {
            if (strpos($sopa[$i], $palabra) !== false) {
                $encontrada = true;
                break;
            }
        }

        // Verificar verticalmente
        for ($i = 0; $i < $numColumnas; $i++) {
            $columnaTexto = '';
            for ($j = 0; $j < $numFilas; $j++) {
                $columnaTexto .= $sopa[$j][$i];
            }
            if (strpos($columnaTexto, $palabra) !== false) {
                $encontrada = true;
                break;
            }
        }

        // Verificar diagonales (de izquierda a derecha)
        for ($i = 0; $i < $numFilas; $i++) {
            for ($j = 0; $j < $numColumnas; $j++) {
                $diagonalTexto = '';
                $k = $i;
                $l = $j;
                while ($k < $numFilas && $l < $numColumnas) {
                    $diagonalTexto .= $sopa[$k++][$l++];
                }
                if (strpos($diagonalTexto, $palabra) !== false) {
                    $encontrada = true;
                    break 2;
                }
            }
        }

        // Verificar diagonales (de derecha a izquierda)
        for ($i = 0; $i < $numFilas; $i++) {
            for ($j = $numColumnas - 1; $j >= 0; $j--) {
                $diagonalTexto = '';
                $k = $i;
                $l = $j;
                while ($k < $numFilas && $l >= 0) {
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
        'noencontradas' => $noEncontradas
    ];
}