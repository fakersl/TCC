<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>

<body class="bg-gray-50">
    <?php include("sidenav.php"); ?>

    <div class="container mx-auto my-10">
        <div class="max-w-md p-8 mx-auto bg-white rounded-lg shadow-lg">
            <h1 class="mb-4 text-xl font-bold">Create product</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Product title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Produto</label>
                    <input type="text" id="title" name="title"
                        class="block w-full p-2 mt-1 border border-gray-300 rounded-md" placeholder="Writing">
                </div>

                <!-- Label -->
                <div class="mb-4">
                    <label for="label" class="block text-sm font-medium text-gray-700 resize-none">Label</label>
                    <textarea id="label" name="label" class="block w-full p-2 mt-1 border border-gray-300 rounded-md resize-none" placeholder="Type here"></textarea>
                </div>

                <!-- Upar imagens -->
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="small_size">Imagem:</label>
                    <input
                        class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="small_size" type="file">
                </div>

                <!-- Tags -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tags</label>
                    <input type="text" name="tags" class="block w-full p-2 mt-1 border border-gray-300 rounded-md"
                        placeholder="Clothes, Men, Fashion">
                </div>

                <!-- Category and Sub Category -->
                <div class="flex mb-4 space-x-4">
                    <div class="w-1/2">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category" name="category"
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                            <option>Select</option>
                            <option>Clothes</option>
                            <option>Electronics</option>
                            <option>Accessories</option>
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="subcategory" class="block text-sm font-medium text-gray-700">Sub category</label>
                        <select id="subcategory" name="subcategory"
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                            <option>Select</option>
                            <option>Men</option>
                            <option>Women</option>
                            <option>Kids</option>
                        </select>
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <div class="flex items-center">
                        <input type="text" id="price" name="price"
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md" placeholder="Type here">
                        <span class="ml-2">USD</span>
                    </div>
                </div>

                <!-- Publish on site -->
                <div class="mb-4">
                    <label for="publish" class="inline-flex items-center">
                        <input id="publish" name="publish" type="checkbox"
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">Publish on site</span>
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="w-full p-2 text-white bg-blue-600 rounded-md">Submit item</button>
            </form>
        </div>
    </div>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>