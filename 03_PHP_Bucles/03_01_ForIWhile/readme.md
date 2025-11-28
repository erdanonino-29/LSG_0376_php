# 03_01 Bucles For i While

## Descripció
Aquest exemple mostra com utilitzar els bucles for, while i do-while en PHP per repetir blocs de codi.

## Contingut
- **foriwhile.php**: Fitxer principal amb exemples de diferents tipus de bucles.

## Tipus de bucles demostrats
1. **FOR bàsic**: Repetició amb comptador
2. **FOR amb decrement**: Comptar enrere
3. **FOR amb salt**: Incrementar de més d'un
4. **WHILE**: Repetir mentre condició sigui certa
5. **DO-WHILE**: Executa almenys una vegada
6. **Bucles niuats**: Bucles dins de bucles
7. **Break**: Sortir del bucle
8. **Continue**: Saltar a la següent iteració

## Com executar
```bash
php foriwhile.php
```

## Sintaxi
```php
// FOR
for ($i = 0; $i < 10; $i++) {
    // codi
}

// WHILE
while (condició) {
    // codi
}

// DO-WHILE
do {
    // codi
} while (condició);
```

## Quan utilitzar cada bucle
- **FOR**: Quan saps el nombre d'iteracions
- **WHILE**: Quan no saps quantes vegades iteraràs
- **DO-WHILE**: Quan necessites executar almenys una vegada
