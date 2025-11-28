<?php
/**
 * Exemple 02_02: Switch-Case en PHP
 * 
 * Aquest exemple mostra com utilitzar l'estructura switch-case per gestionar múltiples opcions
 */

echo "<h2>Exemple de Switch-Case en PHP</h2>";
echo "<hr>";

// 1. Switch bàsic amb números
echo "<h3>1. Switch bàsic (menú d'opcions):</h3>";
$opcio = 2;
echo "Opció seleccionada: " . $opcio . "<br>";

switch ($opcio) {
    case 1:
        echo "Has seleccionat: Veure perfil<br>";
        break;
    case 2:
        echo "Has seleccionat: Editar configuració<br>";
        break;
    case 3:
        echo "Has seleccionat: Tancar sessió<br>";
        break;
    default:
        echo "Opció no vàlida<br>";
        break;
}

// 2. Switch amb strings
echo "<h3>2. Switch amb cadenes de text:</h3>";
$dia = "dimecres";
echo "Dia: " . $dia . "<br>";

switch ($dia) {
    case "dilluns":
        echo "Comença la setmana laboral<br>";
        break;
    case "dimarts":
        echo "Segon dia de la setmana<br>";
        break;
    case "dimecres":
        echo "Meitat de la setmana<br>";
        break;
    case "dijous":
        echo "Gairebé cap de setmana<br>";
        break;
    case "divendres":
        echo "Últim dia laboral!<br>";
        break;
    case "dissabte":
    case "diumenge":
        echo "Cap de setmana!<br>";
        break;
    default:
        echo "Dia no reconegut<br>";
        break;
}

// 3. Switch amb cases múltiples (fall-through controlat)
echo "<h3>3. Switch amb cases agrupats:</h3>";
$mes = 4;
echo "Mes número: " . $mes . "<br>";

switch ($mes) {
    case 1:
    case 2:
    case 3:
        echo "Estació: Hivern<br>";
        break;
    case 4:
    case 5:
    case 6:
        echo "Estació: Primavera<br>";
        break;
    case 7:
    case 8:
    case 9:
        echo "Estació: Estiu<br>";
        break;
    case 10:
    case 11:
    case 12:
        echo "Estació: Tardor<br>";
        break;
    default:
        echo "Mes no vàlid<br>";
        break;
}

// 4. Switch dins d'una funció
echo "<h3>4. Switch dins d'una funció:</h3>";

function obtenirPreu($producte) {
    switch ($producte) {
        case "pizza":
            return 12.50;
        case "hamburguesa":
            return 8.75;
        case "amanida":
            return 6.50;
        case "beguda":
            return 2.50;
        default:
            return 0;
    }
}

$producte = "pizza";
$preu = obtenirPreu($producte);
echo "Producte: " . $producte . "<br>";
echo "Preu: " . $preu . "€<br>";

// 5. Match expression (PHP 8+)
echo "<h3>5. Match Expression (PHP 8+):</h3>";
$codi_estat = 200;
echo "Codi d'estat: " . $codi_estat . "<br>";

$missatge = match ($codi_estat) {
    200 => "OK - Sol·licitud exitosa",
    201 => "Creat - Recurs creat correctament",
    400 => "Error - Sol·licitud incorrecta",
    404 => "Error - Recurs no trobat",
    500 => "Error - Error del servidor",
    default => "Codi desconegut",
};
echo "Missatge: " . $missatge . "<br>";
?>
