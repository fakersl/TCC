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
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>

<body>
    <!-- CARROSEL -->
    <div id="default-carousel" class="relative w-full mt-20" data-carousel="slide">
        <div class="relative h-screen overflow-hidden">
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://placehold.co/1280x720" class="absolute top-0 left-0 block object-cover w-full h-full"
                    alt="...">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://placehold.co/1280x720" class="absolute top-0 left-0 block object-cover w-full h-full"
                    alt="...">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://placehold.co/1280x720" class="absolute top-0 left-0 block object-cover w-full h-full"
                    alt="...">
            </div>
        </div>
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        </div>
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4"></path>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4"></path>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script defer src="../../public/js/sidebar.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script defer src="../../public/js/owlcarousel.js"></script>
</body>

</html>