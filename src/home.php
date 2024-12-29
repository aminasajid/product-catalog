<div class="min-h-screen bg-gray-50">
    <!-- Banner section -->
    <section class="relative bg-cover bg-center h-[500px] sm:h-[400px]"
        style="background-image: url('https://static.asianpaints.com/content/dam/asian_paints/products/landing-pages/idea-gallery-spotlight-lp.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="container mx-auto flex items-center h-full relative z-10 px-6">
            <div class="text-white max-w-2xl">
                <h6 class="text-xl font-semibold mb-2">Transform Your Space</h6>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Home Decor That Inspires</h1>
                <p class="text-lg mb-8">Discover timeless styles and exclusive designs to refresh your home this season.
                    Let us help you make your space truly yours.</p>
                <button class="bg-white text-gray-800 hover:bg-gray-200 px-6 py-3 rounded-lg text-lg"
                    onclick="allProducts()">Shop Now</button>
            </div>
        </div>
    </section>


    <!-- New arrivals -->
    <section id="newArrivals" class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-8 text-center">New Arrivals</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="productList">
                <!-- Product Cards will be displayed here -->
            </div>
        </div>
    </section>

    <!-- Featured categories -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-8 text-center">Featured Categories</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6" id="categoriesList">
                <!-- Categories will be displayed here -->
            </div>
        </div>
    </section>

    <!-- Contact  -->
    <section id="contact" class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-semibold mb-6 text-center">Contact Us</h2>
                <form>
                    <div class="mb-4">
                        <input type="text" placeholder="Your Name" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <input type="email" placeholder="Your Email" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <textarea placeholder="Your Message" rows="4"
                            class="w-full px-4 py-2 border rounded-lg"></textarea>
                    </div>
                    <button type="submit" class=" btn bg-gray-800 text-white px-6 py-3 rounded-lg w-full">Send
                        Message</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>



    fetch('products.json')
        .then(response => response.json())
        .then(data => {
            // handle categories
            const categoriesContainer = document.getElementById('categoriesList');
            data.categories.forEach(category => {
                const categoryElement = document.createElement('div');
                categoryElement.classList.add('relative', 'overflow-hidden', 'rounded-lg', 'group');
                categoryElement.innerHTML = ` 
                <img src="${category.image}" alt="${category.name}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">  
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <h3 class="text-white text-2xl font-semibold">${category.name}</h3> 
                </div>
            `;
                categoriesContainer.appendChild(categoryElement);
            });

            //  to shorten the description 
            function sliceDescription(description, maxWords = 10) {
                const words = description.split(' '); 
                return words.slice(0, maxWords).join(' ') + '...';  
            }

            // Handle Products
            const productsContainer = document.getElementById('productList');  
            const lastThreeProducts = data.products.slice(-3);  // to get the last 3 products
            lastThreeProducts.forEach(product => {  
                const productCard = document.createElement('div'); 
                productCard.classList.add('bg-white', 'rounded-lg', 'shadow-lg', 'overflow-hidden', 'transition-all', 'duration-300', 'hover:shadow-xl', 'hover:scale-105');  // Add styles
                productCard.innerHTML = `
                <img class="w-full h-64 object-cover" src="${product.imageUrl}" alt="${product.name}">  <!-- Product image -->
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">${product.name}</h3>  <!-- Product name -->
                    <p class="text-sm text-gray-500 mb-4">${sliceDescription(product.description)}</p>  <!-- Shortened description -->
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-gray-800">${product.price}</span>  <!-- Product price -->
                    </div>
                </div>
            `;
                productsContainer.appendChild(productCard);  
            });
        })
        .catch(error => console.log('Error fetching the data:', error));  
</script>