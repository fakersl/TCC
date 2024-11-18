<?php
session_start();
require("../../vendor/autoload.php");

$cliente = new Google_Client();
$cliente->setClientId('755071431063-alpka3q8aohevbcvd5va7nrh16rtbifc.apps.googleusercontent.com'); // Client ID
$cliente->setClientSecret('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'); // Client Secret
$cliente->setRedirectUri('http://localhost/tcc/app/pages/callback.php'); // URI de redirecionamento

// Verifica se o código de autenticação foi fornecido
if (isset($_GET['code'])) {
    // Exibe o código para depuração
    echo "Código de autenticação: " . $_GET['code'] . "<br>";

    try {
        // Troca o código de autenticação por um token de acesso
        $token = $cliente->fetchAccessTokenWithAuthCode($_GET['code']);

        // Verifique se o token foi retornado e exiba a resposta completa do token
        if (isset($token['access_token'])) {
            echo "Token de acesso: " . $token['access_token'] . "<br>"; // Exibe o token de acesso para depuração
            $cliente->setAccessToken($token['access_token']);

            // Obtém informações do perfil do usuário
            $oauth2 = new Google_Service_Oauth2($cliente);
            $userInfo = $oauth2->userinfo->get(); // Obtém os dados do usuário

            // Dados do usuário
            $email = $userInfo->email;
            $name = $userInfo->name;

            // Armazenar os dados do usuário na sessão
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;

            // Redireciona para a página principal ou dashboard
            header('Location: index.php');
            exit();
        } else {
            echo "Erro ao obter o token de acesso.<br>";
            echo "Resposta completa do token: ";
            var_dump($token); // Exibe toda a resposta do token para depuração
        }
    } catch (Exception $e) {
        // Exibe a mensagem de erro, caso haja uma falha na troca de código por token
        echo "Erro ao autenticar com o Google: " . $e->getMessage();
        echo "<br><b>Detalhes:</b><br>";
        var_dump($e); // Exibe mais detalhes sobre a exceção, se houver
    }
} else {
    echo "Erro: código de autenticação não encontrado.";
}
?>
