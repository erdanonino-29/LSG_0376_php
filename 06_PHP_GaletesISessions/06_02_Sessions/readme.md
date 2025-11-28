# 06_02 Sessions

## Descripció
Aquest exemple mostra com utilitzar sessions en PHP per mantenir l'estat de l'usuari i implementar un sistema de login bàsic.

## Contingut
- **sessions.php**: Exemple interactiu de gestió de sessions amb login/logout.

## Què són les sessions?
Les sessions permeten emmagatzemar informació de l'usuari al servidor, mantenint l'estat entre diferents pàgines.

## Funcions principals
- `session_start()`: Iniciar o reprendre una sessió
- `$_SESSION`: Array superglobal per guardar dades
- `session_destroy()`: Destruir la sessió
- `session_unset()`: Eliminar totes les variables de sessió
- `session_id()`: Obtenir l'ID de sessió

## Com executar
```bash
php -S localhost:8000
```
Accedir a: http://localhost:8000/sessions.php

Credencials de prova: **admin / 1234**

## Flux de treball
1. `session_start()` al principi de cada pàgina
2. Guardar dades: `$_SESSION['clau'] = valor;`
3. Llegir dades: `$valor = $_SESSION['clau'];`
4. Tancar sessió: `session_destroy();`

## Sessions vs Cookies

| Característica | Sessions | Cookies |
|----------------|----------|---------|
| Emmagatzematge | Servidor | Navegador |
| Mida | Il·limitada | ~4KB |
| Durada | Fins tancar navegador | Configurable |
| Seguretat | Més segur | Menys segur |

## Usos comuns
- Sistemes d'autenticació
- Cistella de la compra
- Preferències d'usuari temporals
