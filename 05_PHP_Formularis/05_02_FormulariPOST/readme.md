# 05_02 Formulari POST

## Descripció
Aquest exemple mostra com crear i processar un formulari que envia dades amb el mètode POST, incloent validació de dades.

## Contingut
- **formulari_post.php**: Formulari de contacte amb mètode POST i validació.

## Característiques del mètode POST
- Les dades s'envien de forma oculta
- No són visibles a la URL
- No tenen límit de longitud
- Més segur per a dades sensibles

## Quan utilitzar POST
- Formularis de contacte
- Login i registre d'usuaris
- Enviament de dades sensibles
- Càrrega de fitxers
- Dades extenses

## Com executar
Necessites un servidor web (Apache, Nginx, o PHP built-in server):
```bash
php -S localhost:8000
```
Després accedeix a: http://localhost:8000/formulari_post.php

## Conceptes clau
- `$_POST`: Array superglobal amb les dades del formulari
- `$_SERVER['REQUEST_METHOD']`: Comprovar el mètode HTTP
- `filter_var()`: Validar dades (emails, URLs, etc.)
- `htmlspecialchars()`: Prevenir atacs XSS

## Validacions implementades
- Camp obligatori
- Longitud mínima
- Format d'email vàlid

## Flux de processament
1. Comprovar si és una petició POST
2. Obtenir i netejar dades
3. Validar dades
4. Mostrar errors o processar
