<?php
require("../../backend/conexao.php");

// Verifica se marcas foram selecionadas
$marcas = isset($_GET['marca']) ? $_GET['marca'] : [];

// Criando a consulta SQL
if (!empty($marcas)) {
    $marcasEscapadas = array_map([$conexao, 'real_escape_string'], $marcas);
    $marcasString = "'" . implode("','", $marcasEscapadas) . "'";
    $query = "SELECT * FROM produto WHERE marcaProduto IN ($marcasString)";
} else {
    $query = "SELECT * FROM produto"; // Se nenhuma marca estiver selecionada
}

// Executando a consulta
$result = $conexao->query($query);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Verifica se marcas foram selecionadas
$marcas = isset($_GET['marca']) ? $_GET['marca'] : [];

// Criando a consulta SQL
if (!empty($marcas)) {
    $marcasEscapadas = array_map([$conexao, 'real_escape_string'], $marcas);
    $marcasString = "'" . implode("','", $marcasEscapadas) . "'";
    $query = "SELECT * FROM produto WHERE marcaProduto IN ($marcasString)";
} else {
    $query = "SELECT * FROM produto"; // Se nenhuma marca estiver selecionada
}

// Executando a consulta
$result = $conexao->query($query);

// Exibindo a tabela de produtos
echo "<table>";
echo "<tr><th>Nome do Produto</th><th>Marca</th></tr>"; // Cabeçalho da tabela

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row['nomeProduto']) . "</td><td>" . htmlspecialchars($row['marcaProduto']) . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>Nenhum produto encontrado.</td></tr>";
}
echo "</table>";

// Fechando a conexão
$conexao->close();
?>
