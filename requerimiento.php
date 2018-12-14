<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
header("Content-Type: text/html;charset=utf-8");
$txt = $_POST["texto"];

$server = "localhost";
$usuario = "root";
$clave = "";
$db = "farmacia";

$conn = new mysqli($server, $usuario, $clave, $db);

if($conn->connect_error){
	die("Conexion fallida: ".$conn->connect_error);
}

//$acentos = $conn->query("SET descripcion 'utf8'");



$sql = "SELECT * FROM medicamentos WHERE descripcion LIKE '%".$txt."%'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . utf8_encode($row["id"]). "<br>" . "Descripcion: " . utf8_encode($row["descripcion"]). "<br><br>";
    }
} else {
    echo "0 results";
}

$conn->close();

 ?>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
		Ingrese la descripcion del medicamento
		<input type="text" name="texto">
		<input type="submit"><br><br>
	</form>
<h1>Esto es lo que hay en la base de datos para que seleccione una palabra clave</h1>


<h3>Paracetamol</h3> 
<p><strong>Descripcion:</strong> es un medicamento con actividad analgésica, es decir, es útil para eliminar el dolor, y con actividad antipirética, por lo tanto reduce la fiebre.</p><br>

<h3>Aspirina</h3>
<p><strong>Descripcion:</strong> es un medicamento que contiene como sustancia activa ácido acetilsalicólico, que es un antiinflamatorio no esteroideo, que sirve para aliviar el dolor y bajar la fiebre en adultos y niños.</p><br>

<h3>diasepan</h3>
<p><strong>Descripcion:</strong> se usa para aliviar la ansiedad, los espasmos musculares y las crisis convulsivas, y para controlar la agitación causada por la abstinencia de alcohol.</p><br>

<h3>Atamel</h3>
<p><strong>Descripcion:</strong> Analgésico y antipirético. Inhibe la síntesis de prostaglandinas en el SNC y bloquea la generación del impulso doloroso a nivel periférico. Actúa sobre el centro hipotalámico regulador de la temperatura.</p><br>
</body>
</html>