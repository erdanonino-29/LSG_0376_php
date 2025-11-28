<?php
/**
 * Exemple 01_01: Variables i Tipus de Dades en PHP
 * 
 * Aquest exemple mostra com declarar i utilitzar diferents tipus de variables en PHP
 */

// Variables de tipus String (cadena de text)
$nom = "Joan";
$cognom = 'Garcia';

// Variables de tipus Integer (números enters)
$edat = 25;
$any_naixement = 1999;

// Variables de tipus Float/Double (números decimals)
$altura = 1.75;
$pes = 70.5;

// Variables de tipus Boolean (veritat o fals)
$es_estudiant = true;
$te_treball = false;

// Variables de tipus Array (llista de valors)
$colors = array("vermell", "verd", "blau");
$numeros = [1, 2, 3, 4, 5];

// Mostrar les variables
echo "<h2>Exemple de Variables i Tipus en PHP</h2>";
echo "<hr>";

echo "<h3>Variables de tipus String:</h3>";
echo "Nom: " . $nom . "<br>";
echo "Cognom: " . $cognom . "<br>";

echo "<h3>Variables de tipus Integer:</h3>";
echo "Edat: " . $edat . " anys<br>";
echo "Any de naixement: " . $any_naixement . "<br>";

echo "<h3>Variables de tipus Float:</h3>";
echo "Altura: " . $altura . " metres<br>";
echo "Pes: " . $pes . " kg<br>";

echo "<h3>Variables de tipus Boolean:</h3>";
echo "És estudiant: " . ($es_estudiant ? "Sí" : "No") . "<br>";
echo "Té treball: " . ($te_treball ? "Sí" : "No") . "<br>";

echo "<h3>Variables de tipus Array:</h3>";
echo "Colors: " . implode(", ", $colors) . "<br>";
echo "Números: " . implode(", ", $numeros) . "<br>";

// Obtenir el tipus de cada variable
echo "<h3>Tipus de cada variable (gettype):</h3>";
echo "Tipus de \$nom: " . gettype($nom) . "<br>";
echo "Tipus de \$edat: " . gettype($edat) . "<br>";
echo "Tipus de \$altura: " . gettype($altura) . "<br>";
echo "Tipus de \$es_estudiant: " . gettype($es_estudiant) . "<br>";
echo "Tipus de \$colors: " . gettype($colors) . "<br>";
?>
