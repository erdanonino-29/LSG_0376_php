<?php
/**
 * Exemple 07_02: Operacions CRUD amb PDO
 * 
 * Aquest exemple mostra com fer Create, Read, Update, Delete amb PDO
 * Utilitza SQLite per simplicitat (no requereix servidor MySQL)
 */

// Crear/Connectar a base de dades SQLite (s'emmagatzema en un fitxer)
try {
    $pdo = new PDO('sqlite:' . __DIR__ . '/productes.db', null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    // Crear taula si no existeix
    $pdo->exec("CREATE TABLE IF NOT EXISTS productes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT NOT NULL,
        preu REAL NOT NULL,
        estoc INTEGER DEFAULT 0,
        creat_a DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    
} catch (PDOException $e) {
    die("Error de connexió: " . $e->getMessage());
}

$missatge = '';
$error = '';
$accio = isset($_GET['accio']) ? $_GET['accio'] : '';

// Processar accions
switch ($accio) {
    // CREATE - Afegir producte
    case 'crear':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $preu = floatval($_POST['preu'] ?? 0);
            $estoc = intval($_POST['estoc'] ?? 0);
            
            if ($nom && $preu > 0) {
                $stmt = $pdo->prepare("INSERT INTO productes (nom, preu, estoc) VALUES (:nom, :preu, :estoc)");
                $stmt->execute([
                    ':nom' => $nom,
                    ':preu' => $preu,
                    ':estoc' => $estoc
                ]);
                $missatge = "Producte creat correctament! ID: " . $pdo->lastInsertId();
            } else {
                $error = "Dades invàlides";
            }
        }
        break;
    
    // UPDATE - Actualitzar producte
    case 'actualitzar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id'] ?? 0);
            $nom = trim($_POST['nom'] ?? '');
            $preu = floatval($_POST['preu'] ?? 0);
            $estoc = intval($_POST['estoc'] ?? 0);
            
            if ($id && $nom && $preu > 0) {
                $stmt = $pdo->prepare("UPDATE productes SET nom = :nom, preu = :preu, estoc = :estoc WHERE id = :id");
                $stmt->execute([
                    ':id' => $id,
                    ':nom' => $nom,
                    ':preu' => $preu,
                    ':estoc' => $estoc
                ]);
                $missatge = "Producte actualitzat correctament!";
            }
        }
        break;
    
    // DELETE - Eliminar producte
    case 'eliminar':
        $id = intval($_GET['id'] ?? 0);
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM productes WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $missatge = "Producte eliminat correctament!";
        }
        break;
}

// READ - Obtenir tots els productes
$stmt = $pdo->query("SELECT * FROM productes ORDER BY id DESC");
$productes = $stmt->fetchAll();

// Obtenir producte per editar
$producte_editar = null;
if ($accio === 'editar' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM productes WHERE id = :id");
    $stmt->execute([':id' => intval($_GET['id'])]);
    $producte_editar = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD amb PDO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
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
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-warning { background-color: #ffc107; color: black; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-sm { padding: 5px 10px; font-size: 0.9em; }
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .alert-success { background-color: #d4edda; color: #155724; }
        .alert-danger { background-color: #f8d7da; color: #721c24; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
        }
        .form-inline {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .form-inline .form-group {
            flex: 1;
            min-width: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Exemple CRUD amb PDO (SQLite)</h2>
        
        <?php if ($missatge): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($missatge); ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <!-- Formulari per CREAR o ACTUALITZAR -->
        <h3><?php echo $producte_editar ? 'Editar Producte' : 'Afegir Nou Producte'; ?></h3>
        <form method="POST" action="?accio=<?php echo $producte_editar ? 'actualitzar' : 'crear'; ?>">
            <?php if ($producte_editar): ?>
                <input type="hidden" name="id" value="<?php echo $producte_editar['id']; ?>">
            <?php endif; ?>
            
            <div class="form-inline">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" required
                           value="<?php echo $producte_editar ? htmlspecialchars($producte_editar['nom']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="preu">Preu (€):</label>
                    <input type="number" id="preu" name="preu" step="0.01" min="0" required
                           value="<?php echo $producte_editar ? $producte_editar['preu'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="estoc">Estoc:</label>
                    <input type="number" id="estoc" name="estoc" min="0"
                           value="<?php echo $producte_editar ? $producte_editar['estoc'] : '0'; ?>">
                </div>
            </div>
            
            <button type="submit" class="btn-<?php echo $producte_editar ? 'warning' : 'success'; ?>">
                <?php echo $producte_editar ? 'Actualitzar' : 'Afegir'; ?>
            </button>
            <?php if ($producte_editar): ?>
                <a href="crud.php"><button type="button" class="btn-primary">Cancel·lar</button></a>
            <?php endif; ?>
        </form>
        
        <!-- LLISTAT (READ) -->
        <h3>Llistat de Productes</h3>
        <?php if (count($productes) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Preu</th>
                        <th>Estoc</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productes as $p): ?>
                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo htmlspecialchars($p['nom']); ?></td>
                            <td><?php echo number_format($p['preu'], 2); ?> €</td>
                            <td><?php echo $p['estoc']; ?></td>
                            <td>
                                <a href="?accio=editar&id=<?php echo $p['id']; ?>">
                                    <button type="button" class="btn-warning btn-sm">Editar</button>
                                </a>
                                <a href="?accio=eliminar&id=<?php echo $p['id']; ?>" 
                                   onclick="return confirm('Estàs segur que vols eliminar aquest producte?')">
                                    <button type="button" class="btn-danger btn-sm">Eliminar</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hi ha productes. Afegeix-ne un!</p>
        <?php endif; ?>
        
        <div style="margin-top: 30px; padding: 15px; background-color: #e7f3ff; border-radius: 4px;">
            <h4>Operacions CRUD:</h4>
            <ul>
                <li><strong>C</strong>reate: INSERT INTO ... VALUES ...</li>
                <li><strong>R</strong>ead: SELECT ... FROM ...</li>
                <li><strong>U</strong>pdate: UPDATE ... SET ... WHERE ...</li>
                <li><strong>D</strong>elete: DELETE FROM ... WHERE ...</li>
            </ul>
            <p><strong>Important:</strong> Aquest exemple utilitza SQLite (no cal MySQL). 
               La base de dades s'emmagatzema a <code>productes.db</code></p>
        </div>
    </div>
</body>
</html>
