<?php
include_once("conexion.php");
include_once("head.php");
$cedula = '';
$modo = '';
$nombre = '';
$apellido = '';
$fecha_de_nacimiento = '';
$genero = '';
if (isset($_GET["cedula"])) {
  $modo = $_GET["modo"];
  $cedula = $_GET["cedula"];




  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }



  $sql = "SELECT * FROM persona where cedula ='" . $cedula . "'";
  $result = $conn->query($sql);



  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $nombre = $row["cedula"];
      $nombre = $row["nombre"];
      $apellido = $row["apellido"];
      $fecha_de_nacimiento = $row["fecha_nacimiento"];
      $genero = $row["genero"];
    }
  }
}

?>

<h1>Creaciòn de formulario</h1>

<form action="">
  <label for="">Cédula</label>
  <input class="form-control" name="cedula" id="cedula" value="<?php echo $cedula; ?>" type="text">

  <label for="">Nombre</label>
  <input class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" type="text">

  <label for="">Apellido</label>
  <input class="form-control" name="apellido" id="apellido" value="<?php echo $apellido; ?>" type="text">

  <label for="">Fecha de Nacimiento</label>
  <input class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_de_nacimiento; ?>" type="text">

  <label for="">Genero</label>
  <input class="form-control" name="genero" id="genero" value="<?php echo $genero; ?>" type="text">



  <input class="form-check-input" type="radio" name="masculino" value="masculino" id="masculino" <?php if ($genero == "M") { ?>checked="checked" <?php } ?>>
  <label class="form-check-label" for="masculino">
    Masculino
  </label>

  <input class="form-check-input" type="radio" name="femenino" value="femenino" id="femenino" <?php if ($genero == "F") { ?>checked="checked" <?php } ?>>
  <label class="form-check-label" for="femenino">
    Femenino
  </label>


  <br>
  <button type="submit" class="btn btn-primary">Guardar</button>

  <!-- genero en radio buttom -->


</form>

<?php
include_once("footer.php");
?>