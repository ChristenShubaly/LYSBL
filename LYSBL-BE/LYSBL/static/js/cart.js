document.addEventListener("DOMContentLoaded", function () {
    // Initialize the cart
    let cart = [];
    const $addToCart = document.getElementById('addToCart');
    const cartContent = document.getElementById('cart-content');

    if ($addToCart) {
        $addToCart.addEventListener('click', function () {
            const selectedType = document.querySelector('input[name="gc-type"]:checked').id;

            if (selectedType) {
                const productData = { 'gc-type': selectedType };

                if (selectedType === "cash") {
                    productData['gc-cash'] = document.getElementById('gc_cash').value;
                } else if (selectedType === "voucher") {
                    const selectedServiceOption = document.querySelector('select[name="gc-services"] option:checked');
                    productData['gc-service'] = selectedServiceOption.value;
                    productData['gc-price'] = selectedServiceOption.getAttribute('data-price');
                }

                // Retrieve the existing cart data from local storage
                const cartData = localStorage.getItem('cart');

                if (cartData) {
                    cart = JSON.parse(cartData);
                }

                // Add the new product data to the cart
                cart.push(productData);

                // Store the updated cart in local storage
                localStorage.setItem('cart', JSON.stringify(cart));

                // Update the cart view
                updateCartView(cart, cartContent);

                // Update the item count
                updateCartItemCount(cart);
            }
        });

        // Display item count in cart
        function updateCartItemCount(cart) {
            const cartItemCount = document.getElementById('cartItemCount');
            if (cartItemCount) {
                cartItemCount.innerHTML = cart.length;
            }
        }

        // Initial cart view
        updateCartView(cart, cartContent);
    }
});

// rendercart.js
function createCartItemElement(item, index) {
    const cartItem = document.createElement('li');
    cartItem.classList.add('cart-item');

    const itemText = document.createElement('span');
    itemText.innerHTML = `Item ${index + 1}:<br>`;

    const removeButton = document.createElement('button');
    removeButton.innerHTML = '🗑';
    removeButton.onclick = () => removeItem(index);

    cartItem.appendChild(itemText);

    if (item['gc-type'] === 'cash' && item['gc-cash']) {
        const typeText = document.createElement('span');
        typeText.innerHTML = `Giftcard Type: ${item['gc-type']}<br>Price: $${item['gc-cash']}`;
        cartItem.appendChild(typeText);
    } else if (item['gc-type'] === 'voucher' && item['gc-service'] && item['gc-price']) {
        const typeText = document.createElement('span');
        typeText.innerHTML = `Giftcard Type: ${item['gc-type']}<br>Service: ${item['gc-service']}<br>Price: $${item['gc-price']}`;
        cartItem.appendChild(typeText);
    }

    cartItem.appendChild(removeButton);

    return cartItem;
}

function updateCartView(cart, cartContent) {
    if (cartContent) {
        cartContent.innerHTML = ''; // Clear the cart content

        if (cart.length > 0) {
            const cartList = document.createElement('ul');
            cart.forEach(function (item, index) {
                if (item && item['gc-type']) {
                    const cartItem = createCartItemElement(item, index);
                    cartList.appendChild(cartItem);
                }
            });
            cartContent.appendChild(cartList);
        } else {
            const emptyCartText = document.createElement('p');
            emptyCartText.innerHTML = 'Your cart is empty.';
            if (cartContent) {
                cartContent.appendChild(emptyCartText);
            }
        }
    }
    

    
}

function removeItem(index) {
    const cartItems = JSON.parse(localStorage.getItem('cart'));
    if (cartItems && cartItems.length > index) {
        cartItems.splice(index, 1); // Remove the item at the specified index
        localStorage.setItem('cart', JSON.stringify(cartItems)); // Update local storage
        updateCartView(cartItems, cartContent); // Update the cart view
        updateCartItemCount(cartItems);
    }
}


