<?php
/**
 * Exemple 02_01: Condicionals If-Else en PHP
 * 
 * Aquest exemple mostra com utilitzar les estructures condicionals if, else i elseif
 */

echo "<h2>Exemple de Condicionals If-Else en PHP</h2>";
echo "<hr>";

// 1. Condicional simple (if)
echo "<h3>1. Condicional Simple (if):</h3>";
$edat = 20;
echo "Edat: " . $edat . " anys<br>";

if ($edat >= 18) {
    echo "Ets major d'edat<br>";
}

// 2. Condicional amb else
echo "<h3>2. Condicional If-Else:</h3>";
$nota = 4.5;
echo "Nota: " . $nota . "<br>";

if ($nota >= 5) {
    echo "Has aprovat l'examen!<br>";
} else {
    echo "Has suspès l'examen. Has d'estudiar més!<br>";
}

// 3. Condicional amb elseif (múltiples condicions)
echo "<h3>3. Condicional If-Elseif-Else:</h3>";
$puntuacio = 85;
echo "Puntuació: " . $puntuacio . "<br>";

if ($puntuacio >= 90) {
    echo "Qualificació: Excel·lent (A)<br>";
} elseif ($puntuacio >= 80) {
    echo "Qualificació: Molt Bé (B)<br>";
} elseif ($puntuacio >= 70) {
    echo "Qualificació: Bé (C)<br>";
} elseif ($puntuacio >= 60) {
    echo "Qualificació: Suficient (D)<br>";
} else {
    echo "Qualificació: Insuficient (F)<br>";
}

// 4. Condicionals niuats
echo "<h3>4. Condicionals Niuats:</h3>";
$usuari_actiu = true;
$es_admin = true;
echo "Usuari actiu: " . ($usuari_actiu ? "Sí" : "No") . "<br>";
echo "És administrador: " . ($es_admin ? "Sí" : "No") . "<br>";

if ($usuari_actiu) {
    echo "L'usuari està actiu<br>";
    if ($es_admin) {
        echo "Té permisos d'administrador<br>";
    } else {
        echo "És un usuari normal<br>";
    }
} else {
    echo "L'usuari no està actiu<br>";
}

// 5. Operador ternari (forma curta d'if-else)
echo "<h3>5. Operador Ternari:</h3>";
$temperatura = 25;
echo "Temperatura: " . $temperatura . "°C<br>";

$estat = ($temperatura > 30) ? "Fa calor" : "Temperatura agradable";
echo "Estat: " . $estat . "<br>";

// 6. Operadors lògics en condicionals
echo "<h3>6. Operadors Lògics (AND, OR, NOT):</h3>";
$te_carnet = true;
$te_cotxe = false;
echo "Té carnet: " . ($te_carnet ? "Sí" : "No") . "<br>";
echo "Té cotxe: " . ($te_cotxe ? "Sí" : "No") . "<br>";

if ($te_carnet && $te_cotxe) {
    echo "Pot conduir el seu propi cotxe<br>";
} elseif ($te_carnet || $te_cotxe) {
    echo "Té carnet o cotxe, però no ambdós<br>";
} else {
    echo "No té ni carnet ni cotxe<br>";
}

// 7. Operador null coalescing (??)
echo "<h3>7. Operador Null Coalescing (??):</h3>";
$nom_usuari = null;
$nom_mostrar = $nom_usuari ?? "Usuari Anònim";
echo "Nom a mostrar: " . $nom_mostrar . "<br>";
?>
