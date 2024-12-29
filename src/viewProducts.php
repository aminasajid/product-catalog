<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Decor Store</title>
    <link rel="stylesheet" href="./output.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>

<?php include './header.php'; ?>

<div class="container mx-auto p-6">
    <div class="grid grid-cols-12 gap-6">

        <!-- Left Sidebar -->
        <div class="col-span-12 md:col-span-3 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Categories</h2>
            <form action="#" method="POST">
                <div id="categoriesList">
                    <!-- Categories will be displayed here -->
                </div>
            </form>

            <button id="clearFilters" class="btn bg-red-500 text-white py-2 px-4 rounded mt-4 w-full">Clear Filters</button>
        </div>

        <!-- Right Content -->
        <div class="col-span-12 md:col-span-9">
            <div id="productList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Product Cards will be displayed here -->
            </div>
        </div>

    </div>
</div>

<?php include './footer.php'; ?>

<script>

fetch('products.json')
    .then(response => response.json())  
    .then(data => {
        const categoriesContainer = document.getElementById('categoriesList');
        const productsContainer = document.getElementById('productList');

        //  creating checkboxes
        data.categories.forEach(category => {
            const categoryElement = document.createElement('div');
            categoryElement.classList.add('mb-4');
            categoryElement.innerHTML = `
                <label class="block text-sm font-medium text-gray-700">
                    <input type="checkbox" name="category" value="${category.name}" class="mr-2"> ${category.name}
                </label>
            `;
            categoriesContainer.appendChild(categoryElement);
        });

        // to horten the descripion
        function sliceDescription(description) {
            const words = description.split(' ');
            return words.slice(0, 10).join(' ') + '...'; 
        }

        // function to filter products 
        function filterProducts() {
            const selectedCategories = Array.from(document.querySelectorAll('input[name="category"]:checked')).map(checkbox => checkbox.value);
            productsContainer.innerHTML = ''; 

       
            const filteredProducts = data.products.filter(product => {
                if (selectedCategories.length === 0) return true; 
                return selectedCategories.includes(product.category); 
            });

            // Display the filtered products
            filteredProducts.forEach(product => {
                const productCard = document.createElement('div');
                productCard.classList.add('bg-white', 'rounded-lg', 'shadow-lg', 'overflow-hidden', 'hover:shadow-xl', 'hover:outline', 'hover:outline-2', 'hover:outline-gray-300');
                productCard.innerHTML = `
                    <img class="w-full h-60 object-cover" src="${product.imageUrl}" alt="${product.name}">
                    <div class="p-4">
                        <p class="text-sm text-gray-500">${product.color}</p>
                        <h3 class="text-lg font-semibold text-gray-800">${product.name}</h3>
                        <p class="text-sm text-gray-600">${sliceDescription(product.description)}</p>
                        <h2 class="text-xl font-bold text-gray-800 mt-2">${product.price}</h2>
                    </div>
                `;
                productsContainer.appendChild(productCard); 
            });
        }

        const checkboxes = document.querySelectorAll('input[name="category"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', filterProducts);
        });

        filterProducts();  
       
        document.getElementById('clearFilters').addEventListener('click', function() {
            checkboxes.forEach(checkbox => checkbox.checked = false);
            filterProducts();  
        });

    })
    .catch(error => console.error('Error fetching the json data:', error)); 
</script>

</body>
</html>
