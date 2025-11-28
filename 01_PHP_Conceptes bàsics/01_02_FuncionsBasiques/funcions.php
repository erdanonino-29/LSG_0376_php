<?php
/**
 * Exemple 01_02: Funcions Bàsiques en PHP
 * 
 * Aquest exemple mostra com crear i utilitzar funcions en PHP
 */

// Funció simple sense paràmetres
function saludar() {
    echo "Hola, benvingut al món de PHP!<br>";
}

// Funció amb paràmetres
function saludarPersona($nom) {
    echo "Hola, " . $nom . "! Com estàs?<br>";
}

// Funció que retorna un valor
function sumar($a, $b) {
    return $a + $b;
}

// Funció amb valor per defecte
function mostrarMissatge($missatge = "Missatge per defecte") {
    echo "<p>" . $missatge . "</p>";
}

// Funció que retorna múltiples valors (array)
function calcularEstadistiques($numeros) {
    $suma = array_sum($numeros);
    $mitjana = $suma / count($numeros);
    $maxim = max($numeros);
    $minim = min($numeros);
    
    return array(
        "suma" => $suma,
        "mitjana" => $mitjana,
        "maxim" => $maxim,
        "minim" => $minim
    );
}

// Funció amb tipus de retorn (PHP 7+)
function multiplicar(int $a, int $b): int {
    return $a * $b;
}

// EXECUTAR LES FUNCIONS
echo "<h2>Exemple de Funcions en PHP</h2>";
echo "<hr>";

echo "<h3>1. Funció simple sense paràmetres:</h3>";
saludar();

echo "<h3>2. Funció amb paràmetres:</h3>";
saludarPersona("Maria");
saludarPersona("Pere");

echo "<h3>3. Funció que retorna un valor:</h3>";
$resultat = sumar(5, 3);
echo "La suma de 5 + 3 = " . $resultat . "<br>";

echo "<h3>4. Funció amb valor per defecte:</h3>";
mostrarMissatge();
mostrarMissatge("Aquest és un missatge personalitzat!");

echo "<h3>5. Funció que retorna múltiples valors:</h3>";
$numeros = [10, 20, 30, 40, 50];
$estadistiques = calcularEstadistiques($numeros);
echo "Números: " . implode(", ", $numeros) . "<br>";
echo "Suma: " . $estadistiques["suma"] . "<br>";
echo "Mitjana: " . $estadistiques["mitjana"] . "<br>";
echo "Màxim: " . $estadistiques["maxim"] . "<br>";
echo "Mínim: " . $estadistiques["minim"] . "<br>";

echo "<h3>6. Funció amb tipus definits:</h3>";
echo "Multiplicar 4 * 7 = " . multiplicar(4, 7) . "<br>";
?>
