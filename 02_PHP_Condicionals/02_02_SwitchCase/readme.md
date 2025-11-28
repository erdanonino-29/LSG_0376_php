# 02_02 Switch-Case

## Descripció
Aquest exemple mostra com utilitzar l'estructura switch-case en PHP per gestionar múltiples opcions de forma clara i organitzada.

## Contingut
- **switchcase.php**: Fitxer principal amb exemples de switch-case.

## Estructures demostrades
1. **Switch bàsic**: Amb opcions numèriques
2. **Switch amb strings**: Comparació de cadenes de text
3. **Cases agrupats**: Múltiples cases que executen el mateix codi
4. **Switch en funcions**: Utilitzar switch amb return
5. **Match expression**: Nova sintaxi de PHP 8+

## Com executar
```bash
php switchcase.php
```

## Sintaxi bàsica
```php
switch ($variable) {
    case valor1:
        // codi
        break;
    case valor2:
        // codi
        break;
    default:
        // codi per defecte
        break;
}
```

## Conceptes clau
- `break`: Surt del switch (important per evitar fall-through no desitjat)
- `default`: S'executa si cap case coincideix
- `match`: Alternativa moderna (PHP 8+) més compacta i segura
