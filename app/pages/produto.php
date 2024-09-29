<?php
include("./navbar.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produto - RocketStore</title>
  <link href="../../public/css/output.css" rel="stylesheet">
</head>

<body>
  <div class="container px-4 py-16 mx-auto">
    <nav aria-label="Breadcrumb">
      <ol role="list" class="flex items-center max-w-2xl px-4 mx-auto space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
        <li>
          <div class="flex items-center">
            <a href="#" class="mr-2 text-sm font-medium text-gray-900">Masculino</a>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="w-4 h-5 text-gray-300" aria-label="seta para a direita">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>
        <li>
          <div class="flex items-center">
            <a href="#" class="mr-2 text-sm font-medium text-gray-900">Roupas</a>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="w-4 h-5 text-gray-300" aria-label="seta para a direita">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>
        <li class="text-sm">
          <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">Top Bandeau</a>
        </li>
      </ol>
    </nav>
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
      <div class="flex flex-col">
        <img src="https://placehold.co/400" alt="Produto 1" class="w-full h-auto pb-4">
        <div class="flex justify-center mt-4">
          <img src="https://placehold.co/400" alt="Produto 1 - Miniatura 1" class="w-16 h-16 mr-2">
          <img src="https://placehold.co/400" alt="Produto 1 - Miniatura 2" class="w-16 h-16 mr-2">
          <img src="https://placehold.co/400" alt="Produto 1 - Miniatura 3" class="w-16 h-16">
        </div>
      </div>
      <div>
        <h1 class="mb-4 text-3xl font-bold">Top Bandeau</h1>
        <p class="text-2xl font-bold text-gray-800">R$99,90</p>
        <p class="text-sm text-gray-600">12 x de R$9,66</p>
        <p class="text-sm text-green-500">Frete grátis</p>

        <div class="mt-8">
          <h3 class="mb-2 text-lg font-medium">Cor</h3>
          <div class="flex">
            <button class="w-8 h-8 mr-2 bg-gray-300 rounded-full"></button>
            <button class="w-8 h-8 mr-2 bg-black rounded-full"></button>
            <button class="w-8 h-8 bg-white border border-gray-400 rounded-full"></button>
          </div>
        </div>

        <div class="mt-8">
          <h3 class="mb-2 text-lg font-medium">Tamanho</h3>
          <div class="flex">
            <button class="w-8 h-8 mr-2 bg-gray-200 border border-gray-400 rounded-full">P</button>
            <button class="w-8 h-8 mr-2 bg-gray-200 border border-gray-400 rounded-full">M</button>
            <button class="w-8 h-8 mr-2 bg-gray-200 border border-gray-400 rounded-full">G</button>
          </div>
        </div>

        <div class="mt-8">
          <button class="px-8 py-3 font-bold text-white bg-black rounded-lg hover:bg-gray-800">
            Comprar
          </button>
        </div>

        <div class="mt-12">
          <h3 class="mb-2 text-lg font-medium">Meios de pagamento</h3>
          <p class="text-sm text-gray-600">Visa, Mastercard, Elo, Amex, PayPal</p>
        </div>

        <div class="mt-12">
          <h3 class="mb-2 text-lg font-medium">Descrição</h3>
          <p class="text-sm text-gray-600">Top em modelagem bandeau com recorte reto, em tecido suplex.</p>
        </div>

        <div class="mt-12">
          <h3 class="mb-2 text-lg font-medium">Compartilhar</h3>
          <div class="flex">
            <a href="#" class="mr-4 text-blue-500 hover:text-blue-700">
              <i class="fab fa-facebook-f"></i> Facebook
            </a>
            <a href="#" class="mr-4 text-blue-400 hover:text-blue-600">
              <i class="fab fa-twitter"></i> Twitter
            </a>
            <a href="#" class="text-red-600 hover:text-red-800">
              <i class="fab fa-pinterest-p"></i> Pinterest
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
include("./footer.php");
?>
</html>
