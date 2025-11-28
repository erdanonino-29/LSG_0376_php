<?php
/**
 * Exemple 07_01: Connexió a Base de Dades amb PDO
 * 
 * Aquest exemple mostra com connectar-se a una base de dades MySQL utilitzant PDO
 */

echo "<h2>Exemple de Connexió a Base de Dades amb PDO</h2>";
echo "<hr>";

// Configuració de la connexió
$host = 'localhost';
$dbname = 'exemple_db';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// Opcions de configuració PDO
$opcions = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Llançar excepcions en errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // Retornar arrays associatius
    PDO::ATTR_EMULATE_PREPARES   => false,                   // Desactivar emulació de prepared statements
];

echo "<h3>1. Intent de connexió:</h3>";
echo "<pre>";
echo "Host: $host\n";
echo "Base de dades: $dbname\n";
echo "Usuari: $username\n";
echo "DSN: $dsn\n";
echo "</pre>";

try {
    // Crear la connexió
    $pdo = new PDO($dsn, $username, $password, $opcions);
    
    echo "<div style='background-color: #d4edda; padding: 15px; border-radius: 4px; margin: 10px 0;'>";
    echo "<strong>✓ Connexió establerta correctament!</strong>";
    echo "</div>";
    
    // Mostrar informació del servidor
    echo "<h3>2. Informació del servidor:</h3>";
    echo "<pre>";
    echo "Versió del servidor: " . $pdo->getAttribute(PDO::ATTR_SERVER_VERSION) . "\n";
    echo "Versió del client: " . $pdo->getAttribute(PDO::ATTR_CLIENT_VERSION) . "\n";
    echo "Driver: " . $pdo->getAttribute(PDO::ATTR_DRIVER_NAME) . "\n";
    echo "</pre>";
    
    // Exemple de consulta simple
    echo "<h3>3. Exemple de consulta:</h3>";
    
    $stmt = $pdo->query("SELECT VERSION() as versio");
    $resultat = $stmt->fetch();
    echo "<p>Versió MySQL: " . $resultat['versio'] . "</p>";
    
    // Llistar bases de dades
    echo "<h3>4. Bases de dades disponibles:</h3>";
    $stmt = $pdo->query("SHOW DATABASES");
    echo "<ul>";
    while ($row = $stmt->fetch()) {
        echo "<li>" . htmlspecialchars($row['Database']) . "</li>";
    }
    echo "</ul>";
    
} catch (PDOException $e) {
    // Gestió d'errors de connexió
    echo "<div style='background-color: #f8d7da; padding: 15px; border-radius: 4px; margin: 10px 0;'>";
    echo "<strong>✗ Error de connexió:</strong><br>";
    echo htmlspecialchars($e->getMessage());
    echo "</div>";
    
    echo "<h3>Possibles solucions:</h3>";
    echo "<ul>";
    echo "<li>Verifica que MySQL/MariaDB està en execució</li>";
    echo "<li>Comprova les credencials (usuari i contrasenya)</li>";
    echo "<li>Assegura't que la base de dades existeix</li>";
    echo "<li>Verifica que l'extensió PDO està habilitada</li>";
    echo "</ul>";
}

// Classe de connexió reutilitzable
echo "<h3>5. Exemple de classe de connexió:</h3>";
echo "<pre style='background-color: #f8f9fa; padding: 15px; border-radius: 4px;'>";
$codi = <<<'CODE'
class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        $config = [
            'host' => 'localhost',
            'dbname' => 'exemple_db',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4'
        ];
        
        $dsn = "mysql:host={$config['host']};
                dbname={$config['dbname']};
                charset={$config['charset']}";
        
        $this->pdo = new PDO($dsn, 
                             $config['username'], 
                             $config['password'], 
                             [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    
    // Singleton pattern
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->pdo;
    }
}

// Ús:
// $db = Database::getInstance()->getConnection();
CODE;
echo htmlspecialchars($codi);
echo "</pre>";

echo "<div style='margin-top: 20px; padding: 15px; background-color: #e7f3ff; border-radius: 4px;'>";
echo "<h4>Bones pràctiques:</h4>";
echo "<ul>";
echo "<li><strong>PDO vs mysqli:</strong> PDO és més flexible (suporta múltiples BD)</li>";
echo "<li><strong>Prepared statements:</strong> Sempre utilitzar per prevenir SQL Injection</li>";
echo "<li><strong>Excepcions:</strong> Utilitzar try-catch per gestionar errors</li>";
echo "<li><strong>Credencials:</strong> Mai posar credencials directament al codi (usar .env)</li>";
echo "<li><strong>Connexió única:</strong> Utilitzar Singleton pattern per evitar múltiples connexions</li>";
echo "</ul>";
echo "</div>";
?>
