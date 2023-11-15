<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style >
h1{
  font-size: 30px;
  color: black;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
  color: black;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: black;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: black;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}
h2{
	text-align: center;
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #293462, #1CD6CE, #FEDB39,#D61C4E);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
h3{
	color: black;
}	
	</style>

</head>
<body>


</body>
</html>
<?php
$user = "root";
$pass = "";
$host = "localhost";


$connection = mysqli_connect($host, $user, $pass);

$usuario = $_POST['txtnombre'];
$apellido = $_POST['txtapellido'];
$correo = $_POST['txtcorreo'];
$pass = $_POST['txtpassword'];

if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        { 

            echo "<center>";
            echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
            echo "</center>";
        }
$dbname = "test";
$db = mysqli_select_db($connection,$dbname);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<center>";
        echo "<h3>Tabla seleccionada:</h3>" ;
        echo "</center>";
        }
  //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
    $instruccion_SQL = "INSERT INTO login (nombre, apellido, correo,password)
                             VALUES ('$usuario','$apellido','$correo','$pass')";

	$resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM login";  

$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<center>";
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Apellido</th></h1>";
echo "<th><h1>Correo</th></h1>";
echo "<th><h1>Password</th></h1>";
echo "</tr>";


while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id']. "</td></h2>";
    echo "<td><h2>" . $colum['nombre']. "</td></h2>";
    echo "<td><h2>" . $colum['apellido'] . "</td></h2>";
    echo "<td><h2>" . $colum['correo'] . "</td></h2>";
    echo "<td><h2>" . $colum['password'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";
echo "</center>";

mysqli_close( $connection );

   //echo "Fuera " 
   
   echo '<form action="enlace.html"/>';
   echo '<section class="form-register">';
   echo '<input class="botons" type="submit" value="Ir a  Menú">';
   echo '<a href="index.html"> Volver Atrás</a>';
   echo '</section>';
?>                           
