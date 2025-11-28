# 05_01 Formulari GET

## Descripció
Aquest exemple mostra com crear i processar un formulari que envia dades amb el mètode GET.

## Contingut
- **formulari_get.php**: Formulari de cerca amb mètode GET.

## Característiques del mètode GET
- Les dades s'envien a través de la URL
- Són visibles a la barra d'adreces
- Es poden guardar com a favorits
- Tenen límit de longitud (~2048 caràcters)

## Quan utilitzar GET
- Cercadors i filtres
- Paginació
- Enllaços que es volen compartir
- Dades NO sensibles

## Com executar
Necessites un servidor web (Apache, Nginx, o PHP built-in server):
```bash
php -S localhost:8000
```
Després accedeix a: http://localhost:8000/formulari_get.php

## Conceptes clau
- `$_GET`: Array superglobal amb les dades del formulari
- `htmlspecialchars()`: Prevenir atacs XSS
- `isset()`: Comprovar si existeix una variable
- `trim()`: Eliminar espais

## Exemple d'URL generada
```
formulari_get.php?cerca=php&categoria=tecnologia&resultats=25
```
