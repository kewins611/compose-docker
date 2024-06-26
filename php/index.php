<?php
echo "Hola Mundo!<br>";

$servername = "db";
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Conectado a la base de datos exitosamente<br>";

$sql = "SELECT text FROM messages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Mensaje: " . $row["text"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
