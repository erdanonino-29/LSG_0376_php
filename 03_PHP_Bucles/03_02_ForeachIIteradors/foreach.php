<?php
/**
 * Exemple 03_02: Foreach i Iteradors en PHP
 * 
 * Aquest exemple mostra com utilitzar foreach per recórrer arrays i objectes
 */

echo "<h2>Exemple de Foreach i Iteradors en PHP</h2>";
echo "<hr>";

// 1. Foreach bàsic amb array indexat
echo "<h3>1. Foreach bàsic amb array indexat:</h3>";
$fruites = ["poma", "plàtan", "taronja", "maduixa", "kiwi"];
echo "Llista de fruites:<br>";
foreach ($fruites as $fruita) {
    echo "- " . $fruita . "<br>";
}

// 2. Foreach amb index
echo "<h3>2. Foreach amb index:</h3>";
$colors = ["vermell", "verd", "blau", "groc"];
echo "Colors amb índex:<br>";
foreach ($colors as $index => $color) {
    echo "Posició " . $index . ": " . $color . "<br>";
}

// 3. Foreach amb array associatiu
echo "<h3>3. Foreach amb array associatiu:</h3>";
$persona = [
    "nom" => "Anna",
    "edat" => 28,
    "ciutat" => "Barcelona",
    "professió" => "Enginyera"
];
echo "Dades de la persona:<br>";
foreach ($persona as $clau => $valor) {
    echo ucfirst($clau) . ": " . $valor . "<br>";
}

// 4. Foreach amb array multidimensional
echo "<h3>4. Foreach amb array multidimensional:</h3>";
$estudiants = [
    ["nom" => "Marc", "nota" => 8.5],
    ["nom" => "Laura", "nota" => 9.2],
    ["nom" => "Pau", "nota" => 7.8],
    ["nom" => "Marta", "nota" => 9.5]
];
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Nota</th></tr>";
foreach ($estudiants as $estudiant) {
    echo "<tr>";
    echo "<td>" . $estudiant["nom"] . "</td>";
    echo "<td>" . $estudiant["nota"] . "</td>";
    echo "</tr>";
}
echo "</table>";

// 5. Foreach amb referència (modificar l'array)
echo "<h3>5. Foreach amb referència (&):</h3>";
$numeros = [1, 2, 3, 4, 5];
echo "Números originals: " . implode(", ", $numeros) . "<br>";

foreach ($numeros as &$num) {
    $num = $num * 2;
}
unset($num); // Important: eliminar la referència
echo "Números duplicats: " . implode(", ", $numeros) . "<br>";

// 6. Recórrer objectes amb foreach
echo "<h3>6. Foreach amb objectes:</h3>";
class Cotxe {
    public $marca = "Toyota";
    public $model = "Corolla";
    public $any = 2022;
    private $preu = 25000;
}

$cotxe = new Cotxe();
echo "Propietats públiques del cotxe:<br>";
foreach ($cotxe as $propietat => $valor) {
    echo ucfirst($propietat) . ": " . $valor . "<br>";
}

// 7. Utilitzar funcions d'array amb iteració
echo "<h3>7. Funcions d'array útils:</h3>";
$productes = [
    ["nom" => "Portàtil", "preu" => 899],
    ["nom" => "Teclat", "preu" => 45],
    ["nom" => "Ratolí", "preu" => 25],
    ["nom" => "Monitor", "preu" => 299]
];

// array_map per transformar
$noms_productes = array_map(function($p) {
    return $p["nom"];
}, $productes);
echo "Noms de productes: " . implode(", ", $noms_productes) . "<br>";

// array_filter per filtrar
$productes_cars = array_filter($productes, function($p) {
    return $p["preu"] > 100;
});
echo "Productes amb preu > 100€:<br>";
foreach ($productes_cars as $p) {
    echo "- " . $p["nom"] . " (" . $p["preu"] . "€)<br>";
}

// array_reduce per calcular
$preu_total = array_reduce($productes, function($suma, $p) {
    return $suma + $p["preu"];
}, 0);
echo "Preu total de tots els productes: " . $preu_total . "€<br>";
?>
