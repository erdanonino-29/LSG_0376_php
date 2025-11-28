# 04_01 Manipulació de Strings

## Descripció
Aquest exemple mostra les funcions més comunes per treballar amb cadenes de text en PHP.

## Contingut
- **strings.php**: Fitxer principal amb exemples de manipulació de strings.

## Funcions demostrades

### Bàsiques
- `strlen()`: Longitud del string
- `trim()`, `ltrim()`, `rtrim()`: Eliminar espais

### Majúscules/Minúscules
- `strtolower()`: Tot a minúscules
- `strtoupper()`: Tot a majúscules
- `ucfirst()`: Primera lletra majúscula
- `ucwords()`: Primera lletra de cada paraula

### Cerca i reemplaçament
- `strpos()`: Trobar posició
- `str_contains()`: Comprovar si conté
- `str_replace()`: Reemplaçar text

### Subcadenes i divisió
- `substr()`: Extreure part del string
- `explode()`: Dividir en array
- `implode()`: Unir array en string

### Format i validació
- `sprintf()`: Format amb placeholders
- `ctype_digit()`: Validar que són números
- `preg_match()`: Expressions regulars

### Seguretat
- `htmlspecialchars()`: Escapar HTML (prevenir XSS)

## Com executar
```bash
php strings.php
```
