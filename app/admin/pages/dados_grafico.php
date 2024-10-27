<?php
// Configurações do banco de dados
$host = 'localhost';
$db = 'bancorocketstore';
$user = 'root';
$pass = '';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta de dados para o gráfico
$query = "SELECT * FROM produto";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Retornar dados como JSON
header('Content-Type: application/json');
echo json_encode($data);
$conn->close();
