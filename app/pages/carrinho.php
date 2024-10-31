<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RocketStore - Carrinho</title>
</head>

<body>
    <section class="py-8 antialiased bg-white md:py-16">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Seu Carrinho</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="flex-none w-full mx-auto lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        <!--Produto 1-->
                        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm md:p-6">
                            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                <a href="#" class="shrink-0 md:order-1">
                                    <img class="w-20 h-20" src="https://placehold.co/600" alt="produto" />
                                </a>

                                <label for="counter-input" class="sr-only">Quantidade:</label>
                                <div class="flex items-center justify-between md:order-3 md:justify-end">
                                    <div class="flex items-center">
                                        <button type="button" id="decrement-button"
                                            data-input-counter-decrement="counter-input"
                                            class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 ">
                                            <svg class="h-2.5 w-2.5 text-gray-900 " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <input type="text" id="counter-input" data-input-counter
                                            class="w-10 text-sm font-medium text-center text-gray-900 bg-transparent border-0 shrink-0 focus:outline-none focus:ring-0"
                                            placeholder="" value="2" required />
                                        <button type="button" id="increment-button"
                                            data-input-counter-increment="counter-input"
                                            class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                                            <svg class="h-2.5 w-2.5 text-gray-900" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="text-end md:order-4 md:w-32">
                                        <p class="text-base font-bold text-gray-900">$1,499</p>
                                    </div>
                                </div>

                                <div class="flex-1 w-full min-w-0 space-y-4 md:order-2 md:max-w-md">
                                    <a href="#" class="text-base font-medium text-gray-900 hover:underline">
                                        Produto1
                                    </a>

                                    <div class="flex items-center gap-4">
                                        <button type="button"
                                            class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                            </svg>
                                            Adicionar aos favoritos
                                        </button>

                                        <button type="button"
                                            class="inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                            Remover
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden xl:mt-8 xl:block">
                        <h3 class="text-2xl font-semibold text-gray-900">Outros também viram:</h3>
                        <div class="grid grid-cols-3 gap-4 mt-6 sm:mt-8">
                            <div
                                class="p-6 space-y-6 overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                                <a href="#" class="overflow-hidden rounded">
                                    <img class="mx-auto h-44 w-44" src="https://placehold.co/400"
                                        alt="produtoPopular" />
                                </a>
                                <div>
                                    <a href="#"
                                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline">
                                        NomeProdutoPop1
                                    </a>
                                    <p class="mt-2 text-base font-normal text-gray-500">
                                        Descrição do produto
                                    </p>
                                </div>
                                <div>
                                    <p class="text-lg font-bold text-gray-900">
                                        <span class="line-through"> R$100,00</span>
                                    </p>
                                    <p class="text-lg font-bold leading-tight text-red-600">R$25,00</p>
                                </div>
                                <div class="mt-6 flex items-center gap-2.5">
                                    <button data-tooltip-target="favourites-tooltip-1" type="button"
                                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                                        </svg>
                                    </button>
                                    <div id="favourites-tooltip-1" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                        Adicionar aos favoritos
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <button type="button"
                                        class="inline-flex w-full items-center justify-center rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300">
                                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 4a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm2-10H5.74m0 0L4.38 7.72M5.74 10H17a2 2 0 0 0 1.98-2.23l-.6-6A2 2 0 0 0 16.4 2H4.62a2 2 0 0 0-1.96 2.34l1.12 5.66Z" />
                                        </svg>
                                        Comprar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkout -->
                <div class="flex-1 max-w-4xl mx-auto mt-6 space-y-6 lg:mt-0 lg:w-full">
                    <div
                        class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Preço total</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">R$7,592.00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Desconto</dt>
                                    <dd class="text-base font-medium text-green-600">-R$299.00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Frete</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">R$99</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Imposto</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">R$799</dd>
                                </dl>
                            </div>

                            <dl
                                class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">R$8,190.00</dd>
                            </dl>
                        </div>

                        <a href="#"
                            class="flex w-full items-center justify-center rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Ir para o Checkout</a>

                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> ou </span>
                            <a href="#" title=""
                                class="inline-flex items-center gap-2 text-sm font-medium text-purple-700 underline hover:no-underline dark:text-purple-500">
                                Continuar comprando
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div
                        class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <form class="space-y-4">
                            <div>
                                <label for="voucher"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cupom de desconto:</label>
                                <input type="text" id="voucher"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-purple-500 dark:focus:ring-purple-500"
                                    placeholder="" required="">
                            </div>
                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                Aplicar cupom
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>