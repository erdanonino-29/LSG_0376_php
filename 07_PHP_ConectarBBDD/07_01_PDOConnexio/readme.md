# 07_01 Connexió PDO

## Descripció
Aquest exemple mostra com establir una connexió a una base de dades MySQL utilitzant PDO (PHP Data Objects).

## Contingut
- **connexio.php**: Exemple de connexió amb gestió d'errors i bones pràctiques.

## Què és PDO?
PDO és una interfície lleugera i consistent per accedir a bases de dades en PHP. Suporta MySQL, PostgreSQL, SQLite, i més.

## Sintaxi bàsica
```php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=test;charset=utf8mb4",
        "usuari",
        "contrasenya",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
```

## Com executar
1. Tenir MySQL/MariaDB instal·lat i en execució
2. Crear la base de dades `exemple_db`
3. Ajustar les credencials si cal
4. Executar amb `php connexio.php` o servidor web

## Opcions PDO importants
| Opció | Descripció |
|-------|------------|
| `ERRMODE_EXCEPTION` | Llança excepcions en errors |
| `FETCH_ASSOC` | Retorna arrays associatius |
| `EMULATE_PREPARES` | false = més segur |

## Avantatges de PDO
- Suporta múltiples bases de dades
- Prepared statements natius
- Gestió d'errors amb excepcions
- Transaccions

## Seguretat
- Mai posar credencials al codi (usar fitxers .env)
- Sempre usar prepared statements
- Escapar dades de sortida
