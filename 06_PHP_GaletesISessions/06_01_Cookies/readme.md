# 06_01 Cookies

## Descripció
Aquest exemple mostra com crear, llegir i eliminar cookies en PHP per guardar preferències d'usuari.

## Contingut
- **cookies.php**: Exemple interactiu de gestió de cookies.

## Què són les cookies?
Les cookies són petits fitxers de text que s'emmagatzemen al navegador de l'usuari i persisteixen entre sessions.

## Funcions principals
- `setcookie()`: Crear o modificar una cookie
- `$_COOKIE`: Array superglobal per llegir cookies
- Per eliminar: `setcookie()` amb temps passat

## Sintaxi de setcookie()
```php
setcookie(
    'nom',
    'valor',
    [
        'expires' => time() + 3600,  // 1 hora
        'path' => '/',
        'secure' => true,            // Només HTTPS
        'httponly' => true,          // No accessible via JS
        'samesite' => 'Strict'       // Protecció CSRF
    ]
);
```

## Com executar
```bash
php -S localhost:8000
```
Accedir a: http://localhost:8000/cookies.php

## Consideracions de seguretat
- `httponly`: Evita accés des de JavaScript (protegeix contra XSS)
- `secure`: Només envia per HTTPS
- `samesite`: Protecció contra CSRF

## Limitacions
- Màxim ~4KB per cookie
- Màxim ~20-50 cookies per domini
- L'usuari pot desactivar-les
