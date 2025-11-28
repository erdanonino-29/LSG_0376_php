<?php
/**
 * Exemple 04_02: Operacions amb Arrays en PHP
 * 
 * Aquest exemple mostra les funcions més comunes per treballar amb arrays
 */

echo "<h2>Exemple d'Operacions amb Arrays en PHP</h2>";
echo "<hr>";

// 1. Crear arrays
echo "<h3>1. Crear arrays:</h3>";
$array_indexat = [1, 2, 3, 4, 5];
$array_associatiu = ["nom" => "Pere", "edat" => 30];
$array_buit = [];
$array_range = range(1, 10);

echo "Array indexat: [" . implode(", ", $array_indexat) . "]<br>";
echo "Array associatiu: nom=" . $array_associatiu["nom"] . ", edat=" . $array_associatiu["edat"] . "<br>";
echo "Array amb range(1,10): [" . implode(", ", $array_range) . "]<br>";

// 2. Afegir i eliminar elements
echo "<h3>2. Afegir i eliminar elements:</h3>";
$llista = ["a", "b", "c"];
echo "Original: [" . implode(", ", $llista) . "]<br>";

array_push($llista, "d", "e");
echo "Després de array_push('d','e'): [" . implode(", ", $llista) . "]<br>";

array_unshift($llista, "z");
echo "Després de array_unshift('z'): [" . implode(", ", $llista) . "]<br>";

$ultim = array_pop($llista);
echo "array_pop() retorna: '$ultim', array: [" . implode(", ", $llista) . "]<br>";

$primer = array_shift($llista);
echo "array_shift() retorna: '$primer', array: [" . implode(", ", $llista) . "]<br>";

// 3. Cercar en arrays
echo "<h3>3. Cercar en arrays:</h3>";
$fruites = ["poma", "plàtan", "taronja", "maduixa"];
echo "Array: [" . implode(", ", $fruites) . "]<br>";

echo "in_array('plàtan'): " . (in_array("plàtan", $fruites) ? "Sí" : "No") . "<br>";
echo "array_search('taronja'): " . array_search("taronja", $fruites) . "<br>";

// 4. Ordenar arrays
echo "<h3>4. Ordenar arrays:</h3>";
$numeros = [5, 2, 8, 1, 9, 3];
echo "Original: [" . implode(", ", $numeros) . "]<br>";

sort($numeros);
echo "sort() (ascendent): [" . implode(", ", $numeros) . "]<br>";

rsort($numeros);
echo "rsort() (descendent): [" . implode(", ", $numeros) . "]<br>";

$noms = ["Zoe", "Anna", "Marc", "Berta"];
asort($noms);
echo "asort() (manté índexs): ";
print_r($noms);
echo "<br>";

// 5. Filtrar arrays
echo "<h3>5. Filtrar arrays (array_filter):</h3>";
$edats = [15, 22, 17, 30, 12, 45];
echo "Edats: [" . implode(", ", $edats) . "]<br>";

$majors_edat = array_filter($edats, function($edat) {
    return $edat >= 18;
});
echo "Majors de 18: [" . implode(", ", $majors_edat) . "]<br>";

// 6. Transformar arrays
echo "<h3>6. Transformar arrays (array_map):</h3>";
$preus = [10, 20, 30, 40];
echo "Preus: [" . implode(", ", $preus) . "]<br>";

$preus_iva = array_map(function($preu) {
    return $preu * 1.21;
}, $preus);
echo "Preus amb IVA (21%): [" . implode(", ", $preus_iva) . "]<br>";

// 7. Reduir arrays
echo "<h3>7. Reduir arrays (array_reduce):</h3>";
$valors = [10, 20, 30, 40, 50];
echo "Valors: [" . implode(", ", $valors) . "]<br>";

$suma = array_reduce($valors, function($acumulat, $valor) {
    return $acumulat + $valor;
}, 0);
echo "Suma total: " . $suma . "<br>";

// 8. Combinar arrays
echo "<h3>8. Combinar arrays:</h3>";
$a = [1, 2, 3];
$b = [4, 5, 6];
echo "Array A: [" . implode(", ", $a) . "]<br>";
echo "Array B: [" . implode(", ", $b) . "]<br>";

$merged = array_merge($a, $b);
echo "array_merge(): [" . implode(", ", $merged) . "]<br>";

$claus = ["nom", "edat", "ciutat"];
$valors_comb = ["Joan", 25, "Barcelona"];
$combinat = array_combine($claus, $valors_comb);
echo "array_combine(): nom=" . $combinat["nom"] . ", edat=" . $combinat["edat"] . "<br>";

// 9. Obtenir claus i valors
echo "<h3>9. Obtenir claus i valors:</h3>";
$persona = ["nom" => "Maria", "edat" => 28, "professió" => "Doctora"];
echo "array_keys(): [" . implode(", ", array_keys($persona)) . "]<br>";
echo "array_values(): [" . implode(", ", array_values($persona)) . "]<br>";

// 10. Funcions d'utilitat
echo "<h3>10. Funcions d'utilitat:</h3>";
$numeros_utils = [5, 2, 8, 2, 5, 9, 2];
echo "Array: [" . implode(", ", $numeros_utils) . "]<br>";

echo "count(): " . count($numeros_utils) . "<br>";
echo "array_unique(): [" . implode(", ", array_unique($numeros_utils)) . "]<br>";
echo "array_sum(): " . array_sum($numeros_utils) . "<br>";
echo "max(): " . max($numeros_utils) . "<br>";
echo "min(): " . min($numeros_utils) . "<br>";

// 11. Arrays multidimensionals
echo "<h3>11. Arrays multidimensionals:</h3>";
$productes = [
    ["id" => 1, "nom" => "Portàtil", "preu" => 899],
    ["id" => 2, "nom" => "Teclat", "preu" => 45],
    ["id" => 3, "nom" => "Monitor", "preu" => 299]
];

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Nom</th><th>Preu</th></tr>";
foreach ($productes as $producte) {
    echo "<tr>";
    echo "<td>" . $producte["id"] . "</td>";
    echo "<td>" . $producte["nom"] . "</td>";
    echo "<td>" . $producte["preu"] . "€</td>";
    echo "</tr>";
}
echo "</table>";

// Ordenar per preu
usort($productes, function($a, $b) {
    return $a["preu"] - $b["preu"];
});
echo "<br>Ordenat per preu (usort):<br>";
foreach ($productes as $p) {
    echo "- " . $p["nom"] . ": " . $p["preu"] . "€<br>";
}
?>
