<?php
/**
 * Exemple 06_02: Sessions en PHP
 * 
 * Aquest exemple mostra com utilitzar sessions per mantenir l'estat de l'usuari
 */

// Iniciar la sessió (ha de ser abans de qualsevol sortida HTML)
session_start();

$missatge = '';
$accio = isset($_GET['accio']) ? $_GET['accio'] : '';

// Processar les accions
switch ($accio) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuari = isset($_POST['usuari']) ? trim($_POST['usuari']) : '';
            $contrasenya = isset($_POST['contrasenya']) ? $_POST['contrasenya'] : '';
            
            // Validació simple (en producció s'hauria de verificar amb base de dades)
            if ($usuari === 'admin' && $contrasenya === '1234') {
                $_SESSION['usuari'] = $usuari;
                $_SESSION['login_time'] = time();
                $_SESSION['visites'] = 1;
                $missatge = "Sessió iniciada correctament!";
            } else {
                $missatge = "Credencials incorrectes. Usuari: admin, Contrasenya: 1234";
            }
        }
        break;
        
    case 'logout':
        // Eliminar totes les variables de sessió
        session_unset();
        // Destruir la sessió
        session_destroy();
        // Iniciar nova sessió per mostrar missatge
        session_start();
        $missatge = "Has tancat la sessió correctament.";
        break;
        
    case 'incrementar':
        if (isset($_SESSION['visites'])) {
            $_SESSION['visites']++;
        }
        break;
}

// Comprovar si l'usuari té sessió activa
$sessio_activa = isset($_SESSION['usuari']);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de Sessions en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 25px;
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
        input[type="text"], input[type="password"] {
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
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-danger { background-color: #dc3545; color: white; }
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .alert-info { background-color: #cce5ff; color: #004085; }
        .alert-success { background-color: #d4edda; color: #155724; }
        .session-info {
            background-color: #e8f4f8;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .user-welcome {
            background-color: #d4edda;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        pre {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Exemple de Sessions en PHP</h2>
        
        <?php if ($missatge): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($missatge); ?></div>
        <?php endif; ?>
        
        <?php if ($sessio_activa): ?>
            <!-- Àrea d'usuari autenticat -->
            <div class="user-welcome">
                <h3>👤 Benvingut, <?php echo htmlspecialchars($_SESSION['usuari']); ?>!</h3>
                <p>Has iniciat sessió fa: 
                    <?php 
                    $temps_passat = time() - $_SESSION['login_time'];
                    $minuts = floor($temps_passat / 60);
                    $segons = $temps_passat % 60;
                    echo "{$minuts}m {$segons}s";
                    ?>
                </p>
                <p>Nombre de visites: <strong><?php echo $_SESSION['visites']; ?></strong></p>
            </div>
            
            <div style="margin-bottom: 20px;">
                <a href="?accio=incrementar">
                    <button type="button" class="btn-success">+1 Visita</button>
                </a>
                <a href="?accio=logout">
                    <button type="button" class="btn-danger">Tancar sessió</button>
                </a>
            </div>
            
        <?php else: ?>
            <!-- Formulari de login -->
            <div class="session-info">
                <p>No tens cap sessió activa. Inicia sessió per veure el contingut protegit.</p>
                <p><small>Credencials de prova: <strong>admin / 1234</strong></small></p>
            </div>
            
            <h3>Iniciar Sessió</h3>
            <form method="POST" action="?accio=login">
                <div class="form-group">
                    <label for="usuari">Usuari:</label>
                    <input type="text" id="usuari" name="usuari" placeholder="Introdueix l'usuari">
                </div>
                
                <div class="form-group">
                    <label for="contrasenya">Contrasenya:</label>
                    <input type="password" id="contrasenya" name="contrasenya" placeholder="Introdueix la contrasenya">
                </div>
                
                <button type="submit" class="btn-primary">Iniciar sessió</button>
            </form>
        <?php endif; ?>
        
        <h3 style="margin-top: 30px;">Informació de la Sessió:</h3>
        <p><strong>ID de sessió:</strong> <?php echo session_id(); ?></p>
        <p><strong>Nom de la sessió:</strong> <?php echo session_name(); ?></p>
        
        <h4>Contingut de $_SESSION:</h4>
        <pre><?php print_r($_SESSION); ?></pre>
        
        <div style="margin-top: 20px; padding: 15px; background-color: #fff3cd; border-radius: 4px;">
            <h4>Sessions vs Cookies:</h4>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="text-align: left; padding: 8px; border-bottom: 1px solid #ccc;">Característica</th>
                    <th style="text-align: left; padding: 8px; border-bottom: 1px solid #ccc;">Sessions</th>
                    <th style="text-align: left; padding: 8px; border-bottom: 1px solid #ccc;">Cookies</th>
                </tr>
                <tr>
                    <td style="padding: 8px;">Emmagatzematge</td>
                    <td style="padding: 8px;">Servidor</td>
                    <td style="padding: 8px;">Navegador</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Mida</td>
                    <td style="padding: 8px;">Il·limitada</td>
                    <td style="padding: 8px;">~4KB</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Durada</td>
                    <td style="padding: 8px;">Fins tancar navegador</td>
                    <td style="padding: 8px;">Configurable</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Seguretat</td>
                    <td style="padding: 8px;">Més segur</td>
                    <td style="padding: 8px;">Menys segur</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
