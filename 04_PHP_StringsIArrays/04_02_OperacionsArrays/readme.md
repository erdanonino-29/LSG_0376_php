# 04_02 Operacions amb Arrays

## Descripció
Aquest exemple mostra les funcions més comunes per treballar amb arrays en PHP.

## Contingut
- **arrays.php**: Fitxer principal amb exemples de manipulació d'arrays.

## Funcions demostrades

### Crear arrays
- `[]` o `array()`: Crear arrays
- `range()`: Crear seqüències

### Afegir i eliminar
- `array_push()`: Afegir al final
- `array_unshift()`: Afegir al principi
- `array_pop()`: Treure de l'últim
- `array_shift()`: Treure del primer

### Cercar
- `in_array()`: Comprovar si existeix
- `array_search()`: Trobar índex

### Ordenar
- `sort()` / `rsort()`: Ordenar ascendent/descendent
- `asort()` / `arsort()`: Ordenar mantenint índexs
- `usort()`: Ordenar amb funció personalitzada

### Transformar
- `array_filter()`: Filtrar elements
- `array_map()`: Transformar cada element
- `array_reduce()`: Reduir a un valor

### Combinar
- `array_merge()`: Unir arrays
- `array_combine()`: Crear array de claus i valors

### Utilitats
- `count()`: Nombre d'elements
- `array_unique()`: Eliminar duplicats
- `array_sum()`: Suma de valors
- `max()` / `min()`: Valor màxim/mínim
- `array_keys()` / `array_values()`: Obtenir claus/valors

## Com executar
```bash
php arrays.php
```
