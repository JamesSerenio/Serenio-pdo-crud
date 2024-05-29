<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            background: url('https://wallpapertag.com/wallpaper/middle/3/5/d/268845-amazing-wood-background-2592x1728.jpg');
            justify-content: center;
            align-items: center;    
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
             color: #bbbbbb;
        }

        .navbar-dark .form-control {
             background-color: #ffffff;
             color: #495057;
             border-color: #ffffff;
        }

        .navbar-dark .form-control:focus {
             background-color: #ffffff;
             border-color: #ffffff;
             box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        }

        .navbar-dark .btn-outline-light {
            color: #ffffff;
            border-color: #ffffff;
        }

        .navbar-dark .btn-outline-light:hover {
            color: #343a40;
            background-color: #ffffff; 
        }

        .navbar-dark .btn-outline-light:focus {
            color: #343a40; 
            background-color: #ffffff;
            border-color: #ffffff; 
        }

        .navbar-brand img {
            margin-right: 5px;
            border-radius: 50%;
        }
        #productsDisplay {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: transparent;
            border: 1px solid #eee;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 250px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .card-text {
            font-size: 1rem;
            color: #ffffff;
        }

        .btn-add-to-cart {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-add-to-cart:hover {
            background-color: #218838;
        }

        .add-right {
            float: right;
            margin-left: 10px;
        }

        #cartContainer {
            position: fixed;
            top: 4em;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999;
            border-radius: 5px;
            max-width: 300px;
        }

        #cartContainer h3 {
            margin-bottom: 10px;
        }

        #cartContainer p {
            margin: 5px 0;
        }
        #cartContainer .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        #cartContainer .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .modal-content {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        .modal-header {
            border-bottom: none;
            padding: 1rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .modal-header h5.modal-title {
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 1rem;
        }

        .modal-footer {
            border-top: none;
            padding: 1rem;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .modal-footer .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s ease;
        }

        .modal-footer .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 5px;
            padding: 0.5rem 1rem;
        }

        .modal-footer .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: transparent;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://img.lovepik.com/element/45016/0567.png_860.png" width="30" height="30" class="d-inline
            -block align-top" alt="">
            Jem'z Restaurant
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Ito ang bahagi na burahin para alisin ang Home at Links -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search Products" aria-label="Search" style="background-color: transparent; border-color: #fff;">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>

        </div>
    </div>
</nav>
    <div class="container">
        <div id="productsDisplay" class="card-grid"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cartModalBody">
                    <!-- Cart items will be displayed here -->
                </div>
                <div class="modal-footer">
                    <p class="mr-auto" id="totalPrice"></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="buyButton">Buy</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        fetch('./products/products-api.php')
            .then(response => response.json())
            .then(data => {
                const productsContainer = document.getElementById('productsDisplay');
                data.forEach(product => {
                    const cardHTML = `
                        <div class="card">
                            <img class="card-img-top" src="${product.img}" alt="${product.title}">
                            <div class="card-body">
                                <h5 class="card-title">${product.title}</h5>
                                <p class="card-text">${product.description}</p>
                                <p class="card-text">Price: ₱${product.rrp}</p>
                                <p class="card-text">Quantity: ${product.quantity}</p>
                                <button class="btn btn-add-to-cart" onclick="addToCart(${product.id}, '${product.title}', ${product.rrp})">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                                <button class="btn btn-add-to-cart add-right" onclick="addUnliRice(${product.id}, '${product.title}', ${product.rrp})">
                                    <i class="fas fa-cart-plus"></i> Add w/Rice/drinks
                                </button>
                            </div>
                        </div>
                    `;
                    productsContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        let cart = {};

        function addToCart(productId, productName, productPrice) {
            if (cart[productId]) {
                cart[productId].quantity++;
            } else {
                cart[productId] = { name: productName, quantity: 1, price: productPrice };
            }
            displayCart();
            $('#cartModal').modal('show'); // Show the modal after adding to cart
        }

        function addUnliRice(productId, productName, productPrice) {
            if (cart[productId]) {
                cart[productId].name = productName + ' w/ Rice and Drinks';
                cart[productId].price = productPrice + 15; // Add 15 to the price for the rice
            } else {
                cart[productId] = { name: productName + ' w/ Rice and Drinks', quantity: 1, price: productPrice + 15 };
            }
            displayCart();
            $('#cartModal').modal('show'); // Show the modal after adding with rice
        }

        function removeFromCart(productId) {
            if (cart[productId]) {
                if (cart[productId].quantity > 1) {
                    cart[productId].quantity--;
                } else {
                    delete cart[productId];
                }
            }
            displayCart();
        }

        function increaseQuantity(productId) {
            if (cart[productId]) {
                cart[productId].quantity++;
            }
            displayCart();
        }

        function displayCart() {
            const cartModalBody = document.getElementById('cartModalBody');
            const totalPriceElement = document.getElementById('totalPrice');
            let cartHTML = '';
            let totalPrice = 0;

            for (const [productId, product] of Object.entries(cart)) {
                const productTotal = product.quantity * product.price;
                totalPrice += productTotal;
                cartHTML += `
                    <div>
                        <p>Product Name: ${product.name}, Quantity: ${product.quantity}, Total: ₱${productTotal}</p>
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${productId})">-</button>
                        <button class="btn btn-secondary btn-sm" onclick="increaseQuantity(${productId})">+</button>
                    </div>
                `;
            }

            cartModalBody.innerHTML = cartHTML;
            totalPriceElement.innerHTML = `Total Price: ₱${totalPrice}`;
        }   

        document.getElementById('buyButton').addEventListener('click', () => {
            const productId = Object.keys(cart)[0]; 
            const productName = cart[productId].name;
            const productPrice = cart[productId].price;
            const productQuantity = cart[productId].quantity;
            window.location.href = `assets/address/payment.php?product_name=${productName}&amount=${productPrice * productQuantity}`;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
