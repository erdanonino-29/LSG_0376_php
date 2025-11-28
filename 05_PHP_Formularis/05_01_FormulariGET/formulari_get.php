<?php
/**
 * Exemple 05_01: Formulari amb mètode GET
 * 
 * Aquest exemple mostra com processar dades d'un formulari enviat amb GET
 */
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari GET - Cercador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
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
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Exemple de Formulari GET - Cercador</h2>
    <p>El mètode GET envia les dades a través de la URL (visible a la barra d'adreces).</p>
    
    <form method="GET" action="">
        <div class="form-group">
            <label for="cerca">Cerca:</label>
            <input type="text" id="cerca" name="cerca" 
                   value="<?php echo isset($_GET['cerca']) ? htmlspecialchars($_GET['cerca']) : ''; ?>" 
                   placeholder="Introdueix el terme de cerca">
        </div>
        
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria">
                <option value="">Totes</option>
                <option value="tecnologia" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'tecnologia') ? 'selected' : ''; ?>>Tecnologia</option>
                <option value="esports" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'esports') ? 'selected' : ''; ?>>Esports</option>
                <option value="musica" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'musica') ? 'selected' : ''; ?>>Música</option>
                <option value="cinema" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'cinema') ? 'selected' : ''; ?>>Cinema</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="resultats">Resultats per pàgina:</label>
            <select id="resultats" name="resultats">
                <option value="10" <?php echo (isset($_GET['resultats']) && $_GET['resultats'] == '10') ? 'selected' : ''; ?>>10</option>
                <option value="25" <?php echo (isset($_GET['resultats']) && $_GET['resultats'] == '25') ? 'selected' : ''; ?>>25</option>
                <option value="50" <?php echo (isset($_GET['resultats']) && $_GET['resultats'] == '50') ? 'selected' : ''; ?>>50</option>
            </select>
        </div>
        
        <button type="submit">Cercar</button>
    </form>
    
    <?php
    // Processar el formulari si s'han enviat dades
    if (!empty($_GET)) {
        echo "<div class='result'>";
        echo "<h3>Resultat de la cerca:</h3>";
        
        // Obtenir i validar les dades
        $cerca = isset($_GET['cerca']) ? htmlspecialchars(trim($_GET['cerca'])) : '';
        $categoria = isset($_GET['categoria']) ? htmlspecialchars($_GET['categoria']) : '';
        $resultats = isset($_GET['resultats']) ? (int)$_GET['resultats'] : 10;
        
        echo "<p><strong>Terme cercat:</strong> " . ($cerca ? $cerca : "<em>cap</em>") . "</p>";
        echo "<p><strong>Categoria:</strong> " . ($categoria ? $categoria : "Totes") . "</p>";
        echo "<p><strong>Resultats per pàgina:</strong> $resultats</p>";
        
        echo "<h4>URL generada:</h4>";
        echo "<code>" . htmlspecialchars($_SERVER['REQUEST_URI']) . "</code>";
        
        echo "<h4>Contingut de \$_GET:</h4>";
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
        
        echo "</div>";
    }
    ?>
    
    <div style="margin-top: 30px; padding: 15px; background-color: #e7f3ff; border-radius: 4px;">
        <h4>Quan utilitzar GET:</h4>
        <ul>
            <li>Cercadors i filtres</li>
            <li>Paginació</li>
            <li>Enllaços compartibles</li>
            <li>Quan les dades NO són sensibles</li>
        </ul>
        <p><strong>Avantatges:</strong> Es pot marcar com a favorit, compartir l'URL</p>
        <p><strong>Desavantatges:</strong> Límit de longitud, dades visibles a l'URL</p>
    </div>
</body>
</html>
