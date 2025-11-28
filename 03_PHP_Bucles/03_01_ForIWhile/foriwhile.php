<?php
/**
 * Exemple 03_01: Bucles For i While en PHP
 * 
 * Aquest exemple mostra com utilitzar els bucles for, while i do-while
 */

echo "<h2>Exemple de Bucles For i While en PHP</h2>";
echo "<hr>";

// 1. Bucle FOR bàsic
echo "<h3>1. Bucle FOR bàsic:</h3>";
echo "Comptar del 1 al 5:<br>";
for ($i = 1; $i <= 5; $i++) {
    echo "Número: " . $i . "<br>";
}

// 2. Bucle FOR amb decrement
echo "<h3>2. Bucle FOR amb decrement:</h3>";
echo "Compte enrere:<br>";
for ($i = 5; $i >= 1; $i--) {
    echo $i . "... ";
}
echo "Enlairament!<br>";

// 3. Bucle FOR amb salt
echo "<h3>3. Bucle FOR amb increment de 2:</h3>";
echo "Números parells del 2 al 10:<br>";
for ($i = 2; $i <= 10; $i += 2) {
    echo $i . " ";
}
echo "<br>";

// 4. Bucle WHILE bàsic
echo "<h3>4. Bucle WHILE bàsic:</h3>";
$comptador = 1;
echo "Mentre comptador <= 5:<br>";
while ($comptador <= 5) {
    echo "Comptador: " . $comptador . "<br>";
    $comptador++;
}

// 5. Bucle DO-WHILE
echo "<h3>5. Bucle DO-WHILE:</h3>";
echo "S'executa almenys una vegada:<br>";
$num = 10;
do {
    echo "Valor: " . $num . "<br>";
    $num++;
} while ($num < 10);
echo "(El bucle s'ha executat encara que la condició era falsa)<br>";

// 6. Bucles niuats (taula de multiplicar)
echo "<h3>6. Bucles niuats - Taula de multiplicar:</h3>";
echo "<table border='1' cellpadding='5'>";
for ($i = 1; $i <= 5; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 5; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// 7. Control de bucles: break
echo "<h3>7. Ús de BREAK:</h3>";
echo "Cercar número 7 en la seqüència:<br>";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 7) {
        echo "Trobat el " . $i . "! Sortim del bucle.<br>";
        break;
    }
    echo $i . " ";
}
echo "<br>";

// 8. Control de bucles: continue
echo "<h3>8. Ús de CONTINUE:</h3>";
echo "Mostrar números de l'1 al 10, saltant el 5:<br>";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        continue;
    }
    echo $i . " ";
}
echo "<br>";

// 9. Bucle infinit controlat
echo "<h3>9. Bucle amb condició de sortida:</h3>";
$intentos = 0;
$objectiu = 7;
$numeros_provats = [];

while (true) {
    $numero_aleatori = rand(1, 10);
    $numeros_provats[] = $numero_aleatori;
    $intentos++;
    
    if ($numero_aleatori == $objectiu) {
        echo "Trobat l'objectiu ($objectiu) després de $intentos intents!<br>";
        echo "Números provats: " . implode(", ", $numeros_provats) . "<br>";
        break;
    }
    
    if ($intentos >= 20) {
        echo "Màxim d'intents assolit<br>";
        break;
    }
}
?>
