<?php
$host = "192.168.56.11";  // IP privada de la máquina db (ajusta si tu db tiene otra IP)
$dbname = "webdb";        // Nombre de la base de datos
$user = "ana_user";       // Usuario que creaste en el script provision-db.sh
$password = "12345";      // Contraseña del usuario

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h1>Lista de Usuarios</h1>";

    $stmt = $conn->query("SELECT * FROM usuarios");

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Nombre</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td></tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "<p>Error de conexión: " . $e->getMessage() . "</p>";
}
?>
