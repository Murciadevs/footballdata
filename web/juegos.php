<?php include_once("document-start.php");

// Nombre del archivo de la base de datos SQLite3
$database_file = 'football-data.sqlite';

try {
    // Conectar a la base de datos SQLite3
    $db = new SQLite3($database_file);
    // Consultar los datos de la tabla
    $result = $db->query("SELECT * FROM competitions");

    // Mostrar los datos
    echo "Juegos:\n";
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        //game_id	competition_id	season	round	date	home_club_id	away_club_id	home_club_goals	away_club_goals	home_club_position	...	stadium	attendance	referee	url	home_club_formation	away_club_formation	home_club_name	away_club_name	aggregate	competition_type

        echo "game_id: {$row['game_id']}, competition_id: {$row['competition_id']}, season: {$row['season']}, round: {$row['round']}, date: {$row['date']}, home_club_id: {$row['home_club_id']}, away_club_id: {$row['away_club_id']}, home_club_goals: {$row['home_club_goals']}...<br><br>";
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
