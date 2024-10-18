<?php include_once("document-start.php");
// Nombre del archivo de la base de datos SQLite3
$database_file = 'football-data.sqlite';
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$pageReal=$page-1;
$init=$page*10;
$page+=1;
try {
    // Conectar a la base de datos SQLite3
    $db = new SQLite3($database_file);
    // Consultar los datos de la tabla
    $result = $db->query("SELECT * FROM players ORDER BY player_id LIMIT ".$init.", 10 ");
    $rowCount=0;
    $resultCount = $db->query("SELECT count(*)  FROM players");
    while ($linea = $resultCount->fetchArray(SQLITE3_ASSOC)) {
		$rowCount =  $linea['count(*)']; 
	}
    //// Mostrar los datos
    echo "Jugadores: total: " .$rowCount. "\n<br>";
    /*
    "player_id","nombre","apellido", "nombre_completo","ultima_temporada", 
    "actual_club_id", "codigo_player", "pais_de_nacimiento", "ciudad_de_nacimiento", 
    "pais_de_ciudadania", "fecha_de_nacimiento","sub_posicón","posición",
    "pie","altura_en_centimetros","fecha_de_vencimiento_del_contrato", "nombre_del_agente","url_imagen",
    "url_player", "id_de_competición_nacional_del_club_actual", "nombre_del_club_actual","valor_de_mercado_en_euros","valor_de_mercado_más_alto_en_euros"]

    */
    ?>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Buscar por
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Nombre</a></li>
    <li><a class="dropdown-item" href="#">Equipo</a></li>
    <li><a class="dropdown-item" href="#">Pais de nacimiento</a></li>
    <li><a class="dropdown-item" href="#">posición</a></li>
    <li><a class="dropdown-item" href="#">pié</a></li>
    <li><a class="dropdown-item" href="#">Altura</a></li>
    <li><a class="dropdown-item" href="#">fecha_de_vencimiento_del_contrato</a></li>
    <li><a class="dropdown-item" href="#">Nombre del agente</a></li>
    <li><a class="dropdown-item" href="#">Nombre del club</a></li>
    <li><a class="dropdown-item" href="#">Valor del mercado</a></li>
  </ul>
</div>
<form method=post action='jugadores.php'>
    <label for="tituloWeb" class="label-control">texto</label>
    <input type='text' class='form-control' name='search' id='search' size=80 title='Se necesita un nombre' placeholder='Escribe el nombre de la web a buscar aquí'  required >
    <input type='submit' value='Buscar' class='btn btn-default' ></input> 
</form>





    <nav class="navbar">
        <ul class="pagination">
            <?php if($pageReal>0) {?>
            <li class="page-item"><a class="page-link" href="<?php echo "jugadores.php?page=".$page-2; ?>">Previous</a></li>
            <?php } ?>
            <li class="page-item disabled"><a class="page-link" href="#"><?php echo $pageReal;?></a></li>
            <?php if($pageReal+1<$rowCount/10) {?>
            <li class="page-item"><a class="page-link" href="<?php echo "jugadores.php?page=".$pageReal+1; ?>"><?php echo $pageReal+1;?></a></li>
            <?php } ?>
            <?php if($pageReal+2<$rowCount/10) {?>
            <li class="page-item"><a class="page-link" href="<?php echo "jugadores.php?page=".$pageReal+2; ?>"><?php echo $pageReal+2;?></a></li>
            <?php } ?>
            <?php if($pageReal+3<$rowCount/10) {?>
            <li class="page-item"><a class="page-link" href="<?php echo "jugadores.php?page=".$pageReal+3; ?>"><?php echo $pageReal+3;?></a></li>
            <?php } ?>
            <?php if($page<$rowCount/10) {?>
            <li class="page-item"><a class="page-link" href="<?php echo "jugadores.php?page=".$page; ?>">Next</a></li>
            <?php } ?>
        </ul>
    </nav>
    <p>Click sobre el titulo para ordenar</p>
    <table class='table'>
        <thead>
            <tr>
                <th scope="col">player_id</th>
                <th scope="col">Url Image</th>
                <th scope="col">Url player</th>
                <th scope="col"><a href="">nombre</a></th>
                <th scope="col"><a href="">apellido</a></th>
                <th scope="col"><a href="">nombre_completo</a></th>
                <th scope="col"><a href="">ultima_temporada</a></th>
                <th scope="col"><a href="">actual_club_id</a></th>
                <th scope="col"><a href="">codigo_player</a></th>
                <th scope="col"><a href="">pais_de_nacimiento</a></th>
                <th scope="col"><a href="">ciudad_de_nacimiento</a></th>
                <th scope="col"><a href="">pais_de_ciudadania</a></th>
                <th scope="col"><a href="">fecha_de_nacimiento</a></th>
                <th scope="col"><a href="">sub_posicón</a></th>
                <th scope="col"><a href="">posición</a></th>
                <th scope="col"><a href="">pie</a></th>
                <th scope="col"><a href="">altura_en_centimetros</a></th>
                <th scope="col"><a href="">fecha_de_vencimiento_del_contrato</a></th>
                <th scope="col"><a href="">nombre_del_agente</a></th>
                <th scope="col"><a href="">id_de_competición_nacional_del_club_actual</a></th>
                <th scope="col"><a href="">nombre_del_club_actual</a></th>
                <th scope="col"><a href="">valor_de_mercado_en_euros</a></th>
                <th scope="col"><a href="">valor_de_mercado_más_alto_en_euros</a></th>
            </tr>	
        </thead>
        <?php
        echo "<tbody>";
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
                echo "<td>{$row['player_id']}</td>";
                echo "<td><img src='{$row['url_imagen']}'></td>";
                echo "<td><a href='{$row['url_player']}' target='_blanck'>https//www...<a></td>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>{$row['apellido']}</td>";
                echo "<td>{$row['nombre_completo']}</td>";
                echo "<td>{$row['ultima_temporada']}</td>";
                echo "<td>{$row['actual_club_id']}</td>";
                echo "<td>{$row['codigo_player']}</td>";
                echo "<td>{$row['pais_de_nacimiento']}</td>";
                echo "<td>{$row['ciudad_de_nacimiento']}</td>";
                echo "<td>{$row['pais_de_ciudadania']}</td>";
                echo "<td>{$row['fecha_de_nacimiento']}</td>";
                echo "<td>{$row['sub_posicón']}</td>";
                echo "<td>{$row['posición']}</td>";
                echo "<td>{$row['pie']}</td>";
                echo "<td>{$row['altura_en_centimetros']}</td>";
                echo "<td>{$row['fecha_de_vencimiento_del_contrato']}</td>";
                echo "<td>{$row['nombre_del_agente']}</td>";
                echo "<td>{$row['id_de_competición_nacional_del_club_actual']}</td>";
                echo "<td>{$row['nombre_del_club_actual']}</td>";
                echo "<td>{$row['valor_de_mercado_en_euros']}</td>";
                echo "<td>{$row['valor_de_mercado_más_alto_en_euros']}</td>";
            echo "</tr>";
            //echo "<tr><td>{$row['id']}</td><td>{$row['nombre_completo']}</td><td>{$row['pais_de_nacimiento']}</td><td>{$row['posicion']}</td><td>{$row['nombre_del_club_actual']}</td></tr>";
            //echo "Nombre: {$row['nombre_completo']}, pais de origen: {$row['pais_de_nacimiento']}, posición: {$row['posicion']}, club actual: {$row['nombre_del_club_actual']}<br>\n";
        }
    echo "</tbody>";
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
