<?php
/**
 * Exemple 05_02: Formulari amb mètode POST
 * 
 * Aquest exemple mostra com processar dades d'un formulari enviat amb POST
 * Inclou validació de dades
 */

// Inicialitzar variables
$errors = [];
$nom = '';
$email = '';
$missatge = '';
$success = false;

// Processar el formulari quan s'envia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenir i netejar les dades
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $missatge = isset($_POST['missatge']) ? trim($_POST['missatge']) : '';
    
    // Validació
    if (empty($nom)) {
        $errors['nom'] = 'El nom és obligatori';
    } elseif (strlen($nom) < 2) {
        $errors['nom'] = 'El nom ha de tenir almenys 2 caràcters';
    }
    
    if (empty($email)) {
        $errors['email'] = 'L\'email és obligatori';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'email no és vàlid';
    }
    
    if (empty($missatge)) {
        $errors['missatge'] = 'El missatge és obligatori';
    } elseif (strlen($missatge) < 10) {
        $errors['missatge'] = 'El missatge ha de tenir almenys 10 caràcters';
    }
    
    // Si no hi ha errors, processar el formulari
    if (empty($errors)) {
        $success = true;
        // Aquí es podria enviar un email, guardar a base de dades, etc.
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari POST - Contacte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input.error, textarea.error {
            border-color: #dc3545;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        button:hover {
            background-color: #218838;
        }
        .success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .info {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Exemple de Formulari POST - Contacte</h2>
    <p>El mètode POST envia les dades de forma oculta (no visible a l'URL).</p>
    
    <?php if ($success): ?>
        <div class="success">
            <h3>✓ Missatge enviat correctament!</h3>
            <p><strong>Nom:</strong> <?php echo htmlspecialchars($nom); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Missatge:</strong> <?php echo htmlspecialchars($missatge); ?></p>
        </div>
        
        <h4>Contingut de $_POST:</h4>
        <pre><?php print_r($_POST); ?></pre>
    <?php endif; ?>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" 
                   value="<?php echo htmlspecialchars($nom); ?>"
                   class="<?php echo isset($errors['nom']) ? 'error' : ''; ?>"
                   placeholder="El teu nom">
            <?php if (isset($errors['nom'])): ?>
                <p class="error-message"><?php echo $errors['nom']; ?></p>
            <?php endif; ?>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" 
                   value="<?php echo htmlspecialchars($email); ?>"
                   class="<?php echo isset($errors['email']) ? 'error' : ''; ?>"
                   placeholder="email@exemple.com">
            <?php if (isset($errors['email'])): ?>
                <p class="error-message"><?php echo $errors['email']; ?></p>
            <?php endif; ?>
        </div>
        
        <div class="form-group">
            <label for="missatge">Missatge:</label>
            <textarea id="missatge" name="missatge" rows="5"
                      class="<?php echo isset($errors['missatge']) ? 'error' : ''; ?>"
                      placeholder="Escriu el teu missatge aquí..."><?php echo htmlspecialchars($missatge); ?></textarea>
            <?php if (isset($errors['missatge'])): ?>
                <p class="error-message"><?php echo $errors['missatge']; ?></p>
            <?php endif; ?>
        </div>
        
        <button type="submit">Enviar missatge</button>
    </form>
    
    <div class="info">
        <h4>Quan utilitzar POST:</h4>
        <ul>
            <li>Formularis de contacte</li>
            <li>Login i registre</li>
            <li>Enviament de dades sensibles</li>
            <li>Càrrega de fitxers</li>
            <li>Quan les dades són extenses</li>
        </ul>
        <p><strong>Avantatges:</strong> Dades no visibles, sense límit de longitud</p>
        <p><strong>Desavantatges:</strong> No es pot guardar com a favorit</p>
    </div>
</body>
</html>
