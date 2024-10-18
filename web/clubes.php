<?php include_once("document-start.php");

// Nombre del archivo de la base de datos SQLite3
$database_file = 'football-data.sqlite';

try {
    // Conectar a la base de datos SQLite3
    $db = new SQLite3($database_file);
    // Consultar los datos de la tabla
    $result = $db->query("SELECT * FROM clubs");

    // Mostrar los datos
    echo "Clubes:\n";
    ?>
    <table class='table'>
        <thead>
            <tr>
                <th scope="col">club_id</th>
                <th scope="col">codigo_club</th>
                <th scope="col">nombre</th>
                <th scope="col">competicion_id</th>
                <th scope="col">valor_total_mercado</th>
                <th scope="col">tamanio_plantilla</th>
                <th scope="col">edad_promedio</th>
                <th scope="col">numero_extranjeros</th>
                <th scope="col">porcentaje_extranjeros</th>
                <th scope="col">jugadores_del_equipo_nacional</th>
                <th scope="col">nombre_estadio</th>
                <th scope="col">capacidad_estadio</th>
                <th scope="col">registro_transferencias</th>
                <th scope="col">nombre_del_entrenador</th>
                <th scope="col">ultima_temporada</th>
                <th scope="col">nombre_archivo</th>
                <th scope="col">url_club</th>
            </tr>	
        </thead>
        <?php
        echo "<tbody>";
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        //club_id	codigo_club	nombre	competicion_id	valor_total_mercado	tamanio_plantilla	edad_promedio	numero_extranjeros	porcentaje_extranjeros	jugadores_del_equipo_nacional	nombre_estadio	capacidad_estadio	registro_transferencias	nombre_del_entrenador	ultima_temporada	nombre_archivo	url_club
        echo "<tr>";
            echo "<td>{$row['club_id']}</td>";
            echo "<td>{$row['codigo_club']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['competicion_id']}</td>";
            echo "<td>{$row['valor_total_mercado']}</td>";
            echo "<td>{$row['tamanio_plantilla']}</td>";
            echo "<td>{$row['edad_promedio']}</td>";
            echo "<td>{$row['numero_extranjeros']}</td>";
            echo "<td>{$row['porcentaje_extranjeros']}</td>";
            echo "<td>{$row['jugadores_del_equipo_nacional']}</td>";
            echo "<td>{$row['nombre_estadio']}</td>";
            echo "<td>{$row['capacidad_estadio']}</td>";
            echo "<td>{$row['registro_transferencias']}</td>";
            echo "<td>{$row['nombre_del_entrenador']}</td>";
            echo "<td>{$row['ultima_temporada']}</td>";
            echo "<td>{$row['nombre_archivo']}</td>";
            echo "<td>{$row['url_club']}</td>";
        echo "</tr>";
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
