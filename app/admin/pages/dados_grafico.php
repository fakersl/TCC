<?php
include("../../../backend/conexao.php");

// Consulta SQL para contar o número de pedidos por mês
$query = "SELECT MONTH(dataPedido) AS mes, COUNT(*) AS total_pedidos FROM pedidos GROUP BY MONTH(dataPedido)";
$result = $conexao->query($query);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    echo json_encode(['error' => 'Erro na execução da consulta SQL']);
    exit;
}

// Preparando arrays para armazenar os resultados
$meses = [];
$totalPedidos = [];

if ($result->num_rows > 0) {
    // Loop para preencher os dados de meses e total de pedidos
    while ($row = $result->fetch_assoc()) {
        $meses[] = "Mês " . $row['mes'];  // Exibe o número do mês, ex: "Mês 1"
        $totalPedidos[] = (int)$row['total_pedidos'];  // Converte para número
    }
}

// Fechando a conexão com o banco de dados
$conexao->close();

// Verificando se os dados foram encontrados
if (empty($meses) || empty($totalPedidos)) {
    echo json_encode(['error' => 'Dados não encontrados']);
    exit;
}

// Retornando os dados como JSON
echo json_encode(['meses' => $meses, 'totalPedidos' => $totalPedidos]);
exit;
?>
