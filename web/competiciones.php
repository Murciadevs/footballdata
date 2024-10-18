<?php include_once("document-start.php");

// Nombre del archivo de la base de datos SQLite3
$database_file = 'football-data.sqlite';

try {
    // Conectar a la base de datos SQLite3
    $db = new SQLite3($database_file);
    // Consultar los datos de la tabla
    $result = $db->query("SELECT * FROM competitions");

    // Mostrar los datos
    echo "Competiciones:\n";
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        //competition_id	competition_code	name	sub_type	type	country_id	country_name	domestic_league_code	confederation	url	is_major_national_league
        echo "competition_id: {$row['competition_id']}, competition_code: {$row['competition_code']}, name: {$row['name']}, sub_type: {$row['sub_type']}, type: {$row['type']}, country_id: {$row['country_id']}, country_name: {$row['country_name']}, domestic_league_code: {$row['domestic_league_code']}, confederation: {$row['confederation']}, url: {$row['url']}, is_major_national_league: {$row['is_major_national_league']}<br><br>";
    }

} catch (Exception $e) {
    // En caso de error, mostrar el mensaje
    echo "Error al conectar a la base de datos: " . $e->getMessage();
} finally {
    // Cerrar la conexión
    if ($db) {
        $db->close();
    }
}
include_once("document-end.php");
?>
