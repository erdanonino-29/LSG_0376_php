<?php
/**
 * Exemple 04_01: Manipulació de Strings en PHP
 * 
 * Aquest exemple mostra les funcions més comunes per treballar amb cadenes de text
 */

echo "<h2>Exemple de Manipulació de Strings en PHP</h2>";
echo "<hr>";

$text = "  Hola, benvingut al món de PHP!  ";
$email = "USUARI@EXEMPLE.COM";

// 1. Longitud d'un string
echo "<h3>1. Longitud d'un string (strlen):</h3>";
echo "Text: '" . $text . "'<br>";
echo "Longitud: " . strlen($text) . " caràcters<br>";

// 2. Eliminar espais
echo "<h3>2. Eliminar espais (trim):</h3>";
echo "Original: '" . $text . "'<br>";
echo "trim(): '" . trim($text) . "'<br>";
echo "ltrim(): '" . ltrim($text) . "'<br>";
echo "rtrim(): '" . rtrim($text) . "'<br>";

// 3. Majúscules i minúscules
echo "<h3>3. Canviar majúscules/minúscules:</h3>";
echo "Original: " . $email . "<br>";
echo "strtolower(): " . strtolower($email) . "<br>";
echo "strtoupper(): " . strtoupper($text) . "<br>";
echo "ucfirst(): " . ucfirst(strtolower($email)) . "<br>";
echo "ucwords(): " . ucwords("hola món php") . "<br>";

// 4. Cercar dins d'un string
echo "<h3>4. Cercar dins d'un string:</h3>";
$frase = "PHP és un llenguatge de programació";
echo "Frase: '" . $frase . "'<br>";
echo "strpos('programació'): " . strpos($frase, "programació") . "<br>";

if (str_contains($frase, "PHP")) {
    echo "str_contains('PHP'): La frase conté 'PHP'<br>";
}

// 5. Reemplaçar text
echo "<h3>5. Reemplaçar text (str_replace):</h3>";
$original = "Les pomes són vermelles, les pomes són dolces";
echo "Original: " . $original . "<br>";
echo "Reemplaçar 'pomes' per 'taronges': " . str_replace("pomes", "taronges", $original) . "<br>";

// 6. Extreure subcadenes
echo "<h3>6. Extreure subcadenes (substr):</h3>";
$codi = "PROD-12345-CAT";
echo "Codi: " . $codi . "<br>";
echo "substr(5, 5): " . substr($codi, 5, 5) . "<br>";
echo "substr(-3): " . substr($codi, -3) . "<br>";

// 7. Dividir strings
echo "<h3>7. Dividir strings (explode):</h3>";
$csv = "nom,cognom,edat,ciutat";
$camps = explode(",", $csv);
echo "CSV: " . $csv . "<br>";
echo "Camps separats:<br>";
foreach ($camps as $camp) {
    echo "- " . $camp . "<br>";
}

// 8. Unir arrays en string
echo "<h3>8. Unir arrays en string (implode):</h3>";
$etiquetes = ["php", "programació", "web", "backend"];
echo "Array: [" . implode(", ", $etiquetes) . "]<br>";
echo "implode(' | '): " . implode(" | ", $etiquetes) . "<br>";

// 9. Format de strings
echo "<h3>9. Format de strings (sprintf):</h3>";
$nom = "Maria";
$punts = 1523.456;
echo "sprintf('Hola %s, tens %.2f punts', \$nom, \$punts):<br>";
echo sprintf("Hola %s, tens %.2f punts", $nom, $punts) . "<br>";

// 10. Validació de strings
echo "<h3>10. Validació de strings:</h3>";
$test1 = "12345";
$test2 = "12abc";
$test3 = "";

echo "ctype_digit('$test1'): " . (ctype_digit($test1) ? "Sí" : "No") . "<br>";
echo "ctype_digit('$test2'): " . (ctype_digit($test2) ? "Sí" : "No") . "<br>";
echo "empty('$test3'): " . (empty($test3) ? "Sí" : "No") . "<br>";

// 11. Expressions regulars
echo "<h3>11. Expressions regulars (preg_match):</h3>";
$email_test = "usuari@domini.com";
$patro = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
if (preg_match($patro, $email_test)) {
    echo "'" . $email_test . "' és un email vàlid<br>";
}

// 12. Seguretat: escapar HTML
echo "<h3>12. Seguretat - Escapar HTML:</h3>";
$entrada_usuari = "<script>alert('XSS')</script>";
echo "Entrada perillosa: " . htmlspecialchars($entrada_usuari) . "<br>";
echo "Amb htmlspecialchars és segur mostrar-la<br>";
?>
