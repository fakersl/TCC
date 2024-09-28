<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../../public/css/output.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../public/css/output.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>

<body>
  <div class="pt-10 text-center">
    <h2 class="text-2xl font-bold">COLEÇÃO 2</h2>
    <p class="text-gray-500">descrição da coleção... descrição da coleção... descrição da coleção...</p>
  </div>

  <section class="py-8 antialiased bg-gray-50 dark:bg-gray-900 md:py-12">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
      <!-- Heading & Filters -->
      <div class="items-end justify-between mb-4 space-y-4 sm:flex sm:space-y-0 md:mb-8">
        <div>
          <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="#"
                  class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-purple-600 dark:text-gray-400 dark:hover:text-white">
                  <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                      d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z">
                    </path>
                  </svg>
                  Home
                </a>
              </li>
              <li>
                <div class="flex items-center">
                  <svg class="w-5 h-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m9 5 7 7-7 7"></path>
                  </svg>
                  <a href="#"
                    class="text-sm font-medium text-gray-700 ms-1 hover:text-purple-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Products</a>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="w-5 h-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m9 5 7 7-7 7"></path>
                  </svg>
                  <span class="text-sm font-medium text-gray-500 ms-1 dark:text-gray-400 md:ms-2">Electronics</span>
                </div>
              </li>
            </ol>
          </nav>
          <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Electronics</h2>
        </div>
        <div class="flex items-center space-x-4">
          <button data-modal-toggle="filterModal" data-modal-target="filterModal" type="button"
            class="flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
            <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z">
              </path>
            </svg>
            Filters
            <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7"></path>
            </svg>
          </button>
          <button id="sortDropdownButton1" data-dropdown-toggle="dropdownSort1" type="button"
            class="flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
            <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4"></path>
            </svg>
            Sort
            <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7"></path>
            </svg>
          </button>
          <div id="dropdownSort1"
            class="z-50 hidden w-40 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
            data-popper-placement="bottom"
            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(715.556px, 122.222px);">
            <ul class="p-2 text-sm font-medium text-left text-gray-500 dark:text-gray-400"
              aria-labelledby="sortDropdownButton">
              <li>
                <a href="#"
                  class="inline-flex items-center w-full px-3 py-2 text-sm text-gray-500 rounded-md group hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                  The most popular </a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full px-3 py-2 text-sm text-gray-500 rounded-md group hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                  Newest </a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full px-3 py-2 text-sm text-gray-500 rounded-md group hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                  Increasing price </a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full px-3 py-2 text-sm text-gray-500 rounded-md group hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                  Decreasing price </a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full px-3 py-2 text-sm text-gray-500 rounded-md group hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                  No. reviews </a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full px-3 py-2 text-sm text-gray-500 rounded-md group hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                  Discount % </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="grid gap-4 mb-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

        <!-- PRODUTO -->
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
          <div class="w-full h-56">
            <a href="#">
              <img class="h-full mx-auto dark:hidden"
                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-light.svg" alt="">
              <img class="hidden h-full mx-auto dark:block"
                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-dark.svg" alt="">
            </a>
          </div>

          <div class="pt-6">
            <div class="flex items-center justify-between gap-4 mb-4">
              <span
                class="me-2 rounded bg-purple-100 px-2.5 py-0.5 text-xs font-medium text-purple-800 dark:bg-purple-900 dark:text-purple-300">
                15% de Desconto</span>

              <div class="flex items-center justify-end gap-1">
                <button type="button" data-tooltip-target="tooltip-quick-look-2"
                  class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                  <span class="sr-only"> Ver Produto </span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                      d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"></path>
                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                  </svg>
                </button>
                <div id="tooltip-quick-look-2" role="tooltip"
                  class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
                  style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(634.444px, -875.556px);"
                  data-popper-placement="top">
                  Ver Produto
                  <div class="tooltip-arrow" data-popper-arrow=""
                    style="position: absolute; left: 0px; transform: translate(43.3333px, 0px);"></div>
                </div>

                <button type="button" data-tooltip-target="tooltip-add-to-favorites-2"
                  class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                  <span class="sr-only"> Adicionar aos favoritos </span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                  </svg>
                </button>
                <div id="tooltip-add-to-favorites-2" role="tooltip"
                  class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
                  style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(651.111px, -875.556px);"
                  data-popper-placement="top">
                  Adicionar aos favoritos
                  <div class="tooltip-arrow" data-popper-arrow=""
                    style="position: absolute; left: 0px; transform: translate(66.6667px, 0px);"></div>
                </div>
              </div>
            </div>

            <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Nome
              do Produto</a>

            <div class="flex items-center gap-2 mt-2">
              <div class="flex items-center">
                <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z">
                  </path>
                </svg>

                <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z">
                  </path>
                </svg>

                <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z">
                  </path>
                </svg>

                <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z">
                  </path>
                </svg>

                <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z">
                  </path>
                </svg>
              </div>

              <p class="text-sm font-medium text-gray-900 dark:text-white">4.9</p>
              <p class="text-sm font-medium text-gray-500 dark:text-gray-400">(1,233)</p>
            </div>

            <ul class="flex items-center gap-4 mt-2">
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m7.171 12.906-2.153 6.411 2.672-.89 1.568 2.34 1.825-5.183m5.73-2.678 2.154 6.411-2.673-.89-1.568 2.34-1.825-5.183M9.165 4.3c.58.068 1.153-.17 1.515-.628a1.681 1.681 0 0 1 2.64 0 1.68 1.68 0 0 0 1.515.628 1.681 1.681 0 0 1 1.866 1.866c-.068.58.17 1.154.628 1.516a1.681 1.681 0 0 1 0 2.639 1.682 1.682 0 0 0-.628 1.515 1.681 1.681 0 0 1-1.866 1.866 1.681 1.681 0 0 0-1.516.628 1.681 1.681 0 0 1-2.639 0 1.681 1.681 0 0 0-1.515-.628 1.681 1.681 0 0 1-1.867-1.866 1.681 1.681 0 0 0-.627-1.515 1.681 1.681 0 0 1 0-2.64c.458-.361.696-.935.627-1.515A1.681 1.681 0 0 1 9.165 4.3ZM14 9a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z">
                  </path>
                </svg>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Mais Popular</p>
              </li>

              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z">
                  </path>
                </svg>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Melhor Preço</p>
              </li>
            </ul>

            <div class="flex items-center justify-between gap-4 mt-4">
              <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">R$0,00</p>

              <button type="button"
                class="inline-flex items-center rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-purple-800 focus:outline-none focus:ring-4  focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6">
                  </path>
                </svg>
                Adicionar ao carrinho
              </button>
            </div>
          </div>
        </div>
        <!-- FIM DO PRODUTO -->
      </div>
    </div>
    </div>
    <div class="w-full text-center">
      <button type="button"
        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Ver
        mais</button>
    </div>
    </div>
    <!-- Filter modal -->
    <form action="#" method="get" id="filterModal" tabindex="-1"
      class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto h-modal md:inset-0 md:h-full"
      aria-hidden="true">
      <div class="relative w-full h-full max-w-xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
          <!-- Modal header -->
          <div class="flex items-start justify-between p-4 rounded-t md:p-5">
            <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Filters</h3>
            <button type="button"
              class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
              data-modal-toggle="filterModal">
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18 17.94 6M18 18 6.06 6"></path>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="px-4 md:px-5">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
              <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-1" role="presentation">
                  <button
                    class="inline-block pb-2 pr-1 text-blue-600 border-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 dark:border-blue-500"
                    id="brand-tab" data-tabs-target="#brand" type="button" role="tab" aria-controls="profile"
                    aria-selected="true">Brand</button>
                </li>
                <li class="mr-1" role="presentation">
                  <button
                    class="inline-block px-2 pb-2 text-gray-500 border-gray-100 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300 dark:border-transparent dark:text-gray-400 dark:border-gray-700"
                    id="advanced-filers-tab" data-tabs-target="#advanced-filters" type="button" role="tab"
                    aria-controls="advanced-filters" aria-selected="false">Advanced Filters</button>
                </li>
              </ul>
            </div>
            <div id="myTabContent">
              <div class="grid grid-cols-2 gap-4 md:grid-cols-3" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                <div class="space-y-2">
                  <h5 class="text-lg font-medium text-black uppercase dark:text-white">A</h5>

                  <div class="flex items-center">
                    <input id="apple" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Apple (56)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="asus" type="checkbox" value="" checked=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Asus (97)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="acer" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="acer" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Acer (234)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="allview" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="allview" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Allview (45)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="atari" type="checkbox" value="" checked=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Atari (176)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="amd" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="amd" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> AMD (49)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="aruba" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="aruba" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Aruba (16)
                    </label>
                  </div>
                </div>

                <div class="space-y-2">
                  <h5 class="text-lg font-medium text-black uppercase dark:text-white">B</h5>

                  <div class="flex items-center">
                    <input id="beats" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="beats" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Beats (56)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="bose" type="checkbox" value="" checked=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="bose" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Bose (97)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="benq" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> BenQ (45)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="bosch" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="bosch" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Bosch (176)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="brother" type="checkbox" value="" checked=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="brother" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Brother
                      (176) </label>
                  </div>

                  <div class="flex items-center">
                    <input id="biostar" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="biostar" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Biostar (49)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="braun" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="braun" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Braun (16)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="blaupunkt" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="blaupunkt" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Blaupunkt
                      (45) </label>
                  </div>

                  <div class="flex items-center">
                    <input id="benq2" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="benq2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> BenQ (23)
                    </label>
                  </div>
                </div>

                <div class="space-y-2">
                  <h5 class="text-lg font-medium text-black uppercase dark:text-white">C</h5>

                  <div class="flex items-center">
                    <input id="canon" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="canon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Canon (49)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="cisco" type="checkbox" value="" checked=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="cisco" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Cisco (97)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="cowon" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="cowon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Cowon (234)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="clevo" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="clevo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Clevo (45)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="corsair" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="corsair" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Corsair (15)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="csl" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="csl" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Canon (49)
                    </label>
                  </div>
                </div>

                <div class="space-y-2">
                  <h5 class="text-lg font-medium text-black uppercase dark:text-white">D</h5>

                  <div class="flex items-center">
                    <input id="dell" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Dell (56)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="dogfish" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="dogfish" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Dogfish (24)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="dyson" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="dyson" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Dyson (234)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="dobe" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="dobe" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Dobe (5)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="digitus" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="digitus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Digitus (1)
                    </label>
                  </div>
                </div>

                <div class="space-y-2">
                  <h5 class="text-lg font-medium text-black uppercase dark:text-white">E</h5>

                  <div class="flex items-center">
                    <input id="emetec" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="emetec" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Emetec (56)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="extreme" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="extreme" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Extreme (10)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="elgato" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="elgato" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Elgato (234)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="emerson" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="emerson" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Emerson (45)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="emi" type="checkbox" value="" checked=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="emi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> EMI (176)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="fugoo" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="fugoo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Fugoo (49)
                    </label>
                  </div>
                </div>

                <div class="space-y-2">
                  <h5 class="text-lg font-medium text-black uppercase dark:text-white">F</h5>

                  <div class="flex items-center">
                    <input id="fujitsu" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="fujitsu" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Fujitsu (97)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="fitbit" type="checkbox" value="" checked=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Fitbit (56)
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input id="foxconn" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="foxconn" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Foxconn
                      (234) </label>
                  </div>

                  <div class="flex items-center">
                    <input id="floston" type="checkbox" value=""
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                    <label for="floston" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Floston (45)
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="hidden space-y-4" id="advanced-filters" role="tabpanel" aria-labelledby="advanced-filters-tab">
              <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <div class="grid grid-cols-2 gap-3">
                  <div>
                    <label for="min-price" class="block text-sm font-medium text-gray-900 dark:text-white"> Min Price
                    </label>
                    <input id="min-price" type="range" min="0" max="7000" value="300" step="1"
                      class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                  </div>

                  <div>
                    <label for="max-price" class="block text-sm font-medium text-gray-900 dark:text-white"> Max Price
                    </label>
                    <input id="max-price" type="range" min="0" max="7000" value="3500" step="1"
                      class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                  </div>

                  <div class="flex items-center justify-between col-span-2 space-x-2">
                    <input type="number" id="min-price-input" value="300" min="0" max="7000"
                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-purple-500 dark:focus:ring-purple-500 "
                      placeholder="" required="">

                    <div class="text-sm font-medium shrink-0 dark:text-gray-300">to</div>

                    <input type="number" id="max-price-input" value="3500" min="0" max="7000"
                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-purple-500 dark:focus:ring-purple-500"
                      placeholder="" required="">
                  </div>
                </div>

                <div class="space-y-3">
                  <div>
                    <label for="min-delivery-time" class="block text-sm font-medium text-gray-900 dark:text-white"> Min
                      Delivery Time (Days) </label>

                    <input id="min-delivery-time" type="range" min="3" max="50" value="30" step="1"
                      class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                  </div>

                  <input type="number" id="min-delivery-time-input" value="30" min="3" max="50"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-purple-500 dark:focus:ring-purple-500 "
                    placeholder="" required="">
                </div>
              </div>

              <div>
                <h6 class="mb-2 text-sm font-medium text-black dark:text-white">Condition</h6>

                <ul
                  class="flex items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                  <li class="w-full border-r border-gray-200 dark:border-gray-600">
                    <div class="flex items-center pl-3">
                      <input id="condition-all" type="radio" value="" name="list-radio" checked=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-2 focus:ring-purple-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-purple-600">
                      <label for="condition-all"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> All </label>
                    </div>
                  </li>
                  <li class="w-full border-r border-gray-200 dark:border-gray-600">
                    <div class="flex items-center pl-3">
                      <input id="condition-new" type="radio" value="" name="list-radio"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-2 focus:ring-purple-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-purple-600">
                      <label for="condition-new"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> New </label>
                    </div>
                  </li>
                  <li class="w-full">
                    <div class="flex items-center pl-3">
                      <input id="condition-used" type="radio" value="" name="list-radio"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-2 focus:ring-purple-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-purple-600">
                      <label for="condition-used"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Used </label>
                    </div>
                  </li>
                </ul>
              </div>

              <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
                <div>
                  <h6 class="mb-2 text-sm font-medium text-black dark:text-white">Colour</h6>
                  <div class="space-y-2">
                    <div class="flex items-center">
                      <input id="blue" type="checkbox" value=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="blue"
                        class="flex items-center ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <div class="mr-2 h-3.5 w-3.5 rounded-full bg-purple-600"></div>
                        Blue
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="gray" type="checkbox" value=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="gray"
                        class="flex items-center ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <div class="mr-2 h-3.5 w-3.5 rounded-full bg-gray-400"></div>
                        Gray
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="green" type="checkbox" value="" checked=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="green"
                        class="flex items-center ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <div class="mr-2 h-3.5 w-3.5 rounded-full bg-green-400"></div>
                        Green
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="pink" type="checkbox" value=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="pink"
                        class="flex items-center ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <div class="mr-2 h-3.5 w-3.5 rounded-full bg-pink-400"></div>
                        Pink
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="red" type="checkbox" value="" checked=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="red"
                        class="flex items-center ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <div class="mr-2 h-3.5 w-3.5 rounded-full bg-red-500"></div>
                        Red
                      </label>
                    </div>
                  </div>
                </div>

                <div>
                  <h6 class="mb-2 text-sm font-medium text-black dark:text-white">Rating</h6>
                  <div class="space-y-2">
                    <div class="flex items-center">
                      <input id="five-stars" type="radio" value="" name="rating"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">
                      <label for="five-stars" class="flex items-center ml-2">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="four-stars" type="radio" value="" name="rating"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">
                      <label for="four-stars" class="flex items-center ml-2">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="three-stars" type="radio" value="" name="rating" checked=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">
                      <label for="three-stars" class="flex items-center ml-2">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="two-stars" type="radio" value="" name="rating"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">
                      <label for="two-stars" class="flex items-center ml-2">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="one-star" type="radio" value="" name="rating"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">
                      <label for="one-star" class="flex items-center ml-2">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                      </label>
                    </div>
                  </div>
                </div>

                <div>
                  <h6 class="mb-2 text-sm font-medium text-black dark:text-white">Weight</h6>

                  <div class="space-y-2">
                    <div class="flex items-center">
                      <input id="under-1-kg" type="checkbox" value=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="under-1-kg" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Under 1
                        kg </label>
                    </div>

                    <div class="flex items-center">
                      <input id="1-1-5-kg" type="checkbox" value="" checked=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="1-1-5-kg" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 1-1,5 kg
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="1-5-2-kg" type="checkbox" value=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="1-5-2-kg" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 1,5-2 kg
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="2-5-3-kg" type="checkbox" value=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="2-5-3-kg" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 2,5-3 kg
                      </label>
                    </div>

                    <div class="flex items-center">
                      <input id="over-3-kg" type="checkbox" value=""
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-purple-600">

                      <label for="over-3-kg" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Over 3
                        kg </label>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                <h6 class="mb-2 text-sm font-medium text-black dark:text-white">Delivery type</h6>

                <ul class="grid grid-cols-2 gap-4">
                  <li>
                    <input type="radio" id="delivery-usa" name="delivery" value="delivery-usa" class="hidden peer"
                      checked="">
                    <label for="delivery-usa"
                      class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-600 peer-checked:border-purple-600 peer-checked:text-purple-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:peer-checked:text-purple-500 md:p-5">
                      <div class="block">
                        <div class="w-full text-lg font-semibold">USA</div>
                        <div class="w-full">Delivery only for USA</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <input type="radio" id="delivery-europe" name="delivery" value="delivery-europe"
                      class="hidden peer">
                    <label for="delivery-europe"
                      class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-600 peer-checked:border-purple-600 peer-checked:text-purple-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:peer-checked:text-purple-500 md:p-5">
                      <div class="block">
                        <div class="w-full text-lg font-semibold">Europe</div>
                        <div class="w-full">Delivery only for USA</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <input type="radio" id="delivery-asia" name="delivery" value="delivery-asia" class="hidden peer"
                      checked="">
                    <label for="delivery-asia"
                      class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-600 peer-checked:border-purple-600 peer-checked:text-purple-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:peer-checked:text-purple-500 md:p-5">
                      <div class="block">
                        <div class="w-full text-lg font-semibold">Asia</div>
                        <div class="w-full">Delivery only for Asia</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <input type="radio" id="delivery-australia" name="delivery" value="delivery-australia"
                      class="hidden peer">
                    <label for="delivery-australia"
                      class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-600 peer-checked:border-purple-600 peer-checked:text-purple-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:peer-checked:text-purple-500 md:p-5">
                      <div class="block">
                        <div class="w-full text-lg font-semibold">Australia</div>
                        <div class="w-full">Delivery only for Australia</div>
                      </div>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="flex items-center p-4 space-x-4 rounded-b dark:border-gray-600 md:p-5">
            <button type="submit"
              class="rounded-lg bg-purple-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 dark:bg-purple-700 dark:hover:bg-purple-800 dark:focus:ring-purple-800">Show
              50 results</button>
            <button type="reset"
              class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Reset</button>
          </div>
        </div>
      </div>
    </form>
  </section>





  <!--carrosel-->
  <div class="relative w-full pt-12 pb-16">
    <div class="flex flex-col items-center item">
      <img src="https://placehold.co/640x960" alt="Produto 1" />
      <p class="mt-4 text-sm font-semibold">Produto</p>
      <p class="text-sm text-gray-500">R$ 99,90</p>
    </div>

  </div>
  </div>

  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script defer src="../../public/js/sidebar.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
  <script defer src="../../public/js/owlcarousel.js"></script>

</body>

</html>