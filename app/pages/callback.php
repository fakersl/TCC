<?php
require("../../vendor/autoload.php");

$cliente = new Google_Client();
$cliente->setClientId('755071431063-alpka3q8aohevbcvd5va7nrh16rtbifc.apps.googleusercontent.com'); // Client ID
$cliente->setClientSecret('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'); // Client Secret
$cliente->setRedirectUri('http://localhost/tccz/app/pages/callback.php'); // URI de redirecionamento

if (isset($_GET['code'])) {
    // Troca o código de autenticação por um token de acesso
    $token = $cliente->fetchAccessTokenWithAuthCode($_GET['code']);
    $cliente->setAccessToken($token['access_token']);

    // Obtém informações do perfil do usuário
    $oauth2 = new Google_Service_Oauth2($cliente);
    $userInfo = $oauth2->userinfo->get(); // Obtém os dados do usuário

    // Dados do usuário
    $email = $userInfo->email;
    $name = $userInfo->name;

    // Aqui você pode armazenar os dados do usuário ou iniciar uma sessão
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;

    // Redireciona para a página principal ou dashboard
    header('Location: index.php');
    exit();
} else {
    echo "Erro ao autenticar com o Google.";
}
?>