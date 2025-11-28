# 03_02 Foreach i Iteradors

## Descripció
Aquest exemple mostra com utilitzar el bucle foreach per recórrer arrays i objectes en PHP de forma eficient.

## Contingut
- **foreach.php**: Fitxer principal amb exemples de foreach i funcions d'iteració.

## Tipus d'iteracions demostrades
1. **Foreach bàsic**: Recórrer arrays simples
2. **Foreach amb índex**: Obtenir posició i valor
3. **Arrays associatius**: Recórrer clau => valor
4. **Arrays multidimensionals**: Estructures complexes
5. **Referència (&)**: Modificar l'array durant la iteració
6. **Objectes**: Recórrer propietats d'objectes
7. **Funcions d'array**: array_map, array_filter, array_reduce

## Com executar
```bash
php foreach.php
```

## Sintaxi
```php
// Només valor
foreach ($array as $valor) {
    // codi
}

// Clau i valor
foreach ($array as $clau => $valor) {
    // codi
}

// Amb referència (per modificar)
foreach ($array as &$valor) {
    $valor = $valor * 2;
}
unset($valor); // Important!
```

## Funcions útils per iteració
- `array_map()`: Transforma cada element
- `array_filter()`: Filtra elements
- `array_reduce()`: Redueix a un sol valor
