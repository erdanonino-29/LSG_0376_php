# LSG_0376 PHP - Guia d'inici (ASIX 1r)

## Descripció
Aquest repositori recull exercicis i exemples de PHP per a l'alumnat de primer d'ASIX.

## Què necessites per començar a programar en PHP
1. **Visual Studio Code**
   - Descarrega'l des de: https://code.visualstudio.com/
   - Instal·la'l amb la configuració per defecte.

2. **PHP instal·lat a l'ordinador**
   - Comprova-ho amb:
   ```bash
   php -v
   ```
   - Si no el tens instal·lat, pots fer servir un entorn com **Laragon** (Windows), que ja inclou PHP i servidor local.

## Extensions recomanades de Visual Studio Code
- **PHP Intelephense**: autocompletat, navegació i ajuda de codi.
- **PHP Debug**: per depurar codi amb breakpoints (Xdebug).
- **Error Lens** (opcional): mostra errors i avisos directament a l'editor.

## Configuració bàsica de VS Code
1. Obre la carpeta del projecte a VS Code.
2. Instal·la les extensions recomanades.
3. Assegura't que VS Code detecta el binari de PHP (`php`) al sistema.
4. Desa els fitxers amb extensió `.php`.

## Com executar codi PHP

### Opció A: Terminal de VS Code
1. Obre el terminal integrat (`Terminal > New Terminal`).
2. Situa't a la carpeta on tens el fitxer.
3. Executa:
   ```bash
   php nom_fitxer.php
   ```

### Opció B: Servidor PHP integrat
1. Des de la carpeta del projecte, executa:
   ```bash
   php -S localhost:8000
   ```
2. Obre el navegador a `http://localhost:8000`.

### Opció C: Laragon
1. Instal·la i obre Laragon.
2. Crea o copia el projecte dins la carpeta `www`.
3. Inicia Apache/Nginx des de Laragon.
4. Obre el projecte al navegador amb la URL local que et mostri Laragon.

## Bones pràctiques inicials
- Escriu codi en fitxers separats per exercici.
- Prova els canvis sovint des del terminal.
- Llegeix els errors complets abans de corregir.
- Mantén una estructura de carpetes ordenada com la d'aquest repositori.
