<?php
/**
 * Exemple 06_01: Cookies en PHP
 * 
 * Aquest exemple mostra com crear, llegir i eliminar cookies
 */

// Les cookies s'han de definir ABANS de qualsevol sortida HTML
$missatge = '';
$accio = isset($_GET['accio']) ? $_GET['accio'] : '';

// Processar les accions
if ($accio === 'crear') {
    $nom_usuari = isset($_POST['nom_usuari']) ? $_POST['nom_usuari'] : 'Visitant';
    $color = isset($_POST['color']) ? $_POST['color'] : 'blau';
    
    // Crear cookies que expiren en 7 dies
    $expiracio = time() + (7 * 24 * 60 * 60);
    
    setcookie('nom_usuari', $nom_usuari, [
        'expires' => $expiracio,
        'path' => '/',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
    
    setcookie('color_preferit', $color, [
        'expires' => $expiracio,
        'path' => '/',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
    
    $missatge = "Cookies creades correctament!";
    
    // Actualitzar $_COOKIE manualment per mostrar immediatament
    $_COOKIE['nom_usuari'] = $nom_usuari;
    $_COOKIE['color_preferit'] = $color;
}

if ($accio === 'eliminar') {
    // Eliminar cookies establint un temps d'expiració passat
    setcookie('nom_usuari', '', time() - 3600, '/');
    setcookie('color_preferit', '', time() - 3600, '/');
    $missatge = "Cookies eliminades!";
    
    // Actualitzar $_COOKIE manualment
    unset($_COOKIE['nom_usuari']);
    unset($_COOKIE['color_preferit']);
}

// Obtenir valors actuals de les cookies
$nom_actual = isset($_COOKIE['nom_usuari']) ? htmlspecialchars($_COOKIE['nom_usuari']) : '';
$color_actual = isset($_COOKIE['color_preferit']) ? $_COOKIE['color_preferit'] : '';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de Cookies en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            <?php if ($color_actual): ?>
            background-color: <?php echo $color_actual; ?>;
            <?php endif; ?>
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .cookie-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        pre {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Exemple de Cookies en PHP</h2>
        
        <?php if ($missatge): ?>
            <div class="alert alert-success"><?php echo $missatge; ?></div>
        <?php endif; ?>
        
        <?php if ($nom_actual): ?>
            <div class="cookie-info">
                <h3>👋 Hola, <?php echo $nom_actual; ?>!</h3>
                <p>El teu color preferit és: <strong><?php echo $color_actual; ?></strong></p>
                <p>Aquesta informació s'ha recuperat de les cookies.</p>
            </div>
        <?php else: ?>
            <div class="cookie-info">
                <p>No hi ha cookies guardades. Configura les teves preferències:</p>
            </div>
        <?php endif; ?>
        
        <h3>Configurar Cookies</h3>
        <form method="POST" action="?accio=crear">
            <div class="form-group">
                <label for="nom_usuari">El teu nom:</label>
                <input type="text" id="nom_usuari" name="nom_usuari" 
                       value="<?php echo $nom_actual; ?>" 
                       placeholder="Introdueix el teu nom">
            </div>
            
            <div class="form-group">
                <label for="color">Color de fons preferit:</label>
                <select id="color" name="color">
                    <option value="lightblue" <?php echo ($color_actual === 'lightblue') ? 'selected' : ''; ?>>Blau clar</option>
                    <option value="lightgreen" <?php echo ($color_actual === 'lightgreen') ? 'selected' : ''; ?>>Verd clar</option>
                    <option value="lightyellow" <?php echo ($color_actual === 'lightyellow') ? 'selected' : ''; ?>>Groc clar</option>
                    <option value="lavender" <?php echo ($color_actual === 'lavender') ? 'selected' : ''; ?>>Lavanda</option>
                    <option value="peachpuff" <?php echo ($color_actual === 'peachpuff') ? 'selected' : ''; ?>>Préssec</option>
                </select>
            </div>
            
            <button type="submit" class="btn-primary">Guardar preferències</button>
        </form>
        
        <form method="POST" action="?accio=eliminar" style="margin-top: 10px;">
            <button type="submit" class="btn-danger">Eliminar cookies</button>
        </form>
        
        <h3 style="margin-top: 30px;">Contingut de $_COOKIE:</h3>
        <pre><?php print_r($_COOKIE); ?></pre>
        
        <div style="margin-top: 20px; padding: 15px; background-color: #e7f3ff; border-radius: 4px;">
            <h4>Sobre les Cookies:</h4>
            <ul>
                <li><strong>Què són?</strong> Petits fitxers que s'emmagatzemen al navegador</li>
                <li><strong>Durada:</strong> Persisteixen entre sessions (segons expiració)</li>
                <li><strong>Mida màxima:</strong> ~4KB per cookie</li>
                <li><strong>Seguretat:</strong> Utilitzar httponly i secure en producció</li>
            </ul>
        </div>
    </div>
</body>
</html>
