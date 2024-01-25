// Define cartContent variable
const cartContent = document.getElementById('cart-content');

// Function to create a cart item element
function createCartItemElement(item, index) {
    const cartItem = document.createElement('li');
    cartItem.classList.add('cart-item');

    const itemText = document.createElement('span');
    itemText.innerHTML = `Item ${index + 1}:<br>`;

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

    const buttonContainer = document.createElement('div');
    const removeButton = document.createElement('button');
    if (removeButton){
        removeButton.innerHTML = '×';
        removeButton.classList.add('remove-button');
        removeButton.onclick = () => removeItem(index);
    }
    

    buttonContainer.appendChild(removeButton);
    cartItem.appendChild(buttonContainer);

    return cartItem;
}


// Function to update the cart view
function updateCartView() {
    cartContent.innerHTML = ''; // Clear the cart content
    const cartData = localStorage.getItem('cart');

    if (cartData) {
        const cartItems = JSON.parse(cartData);

        if (cartItems.length > 0) {
            const cartList = document.createElement('ul');
            cartList.id = 'cart-list'; // Assign an ID to the list

            cartItems.forEach(function (item, index) {
                if (item && item['gc-type']) {
                    const cartItem = createCartItemElement(item, index);
                    cartItem.setAttribute('data-index', index); // Set the data-index attribute
                    cartList.appendChild(cartItem);
                }
            });

            cartContent.appendChild(cartList);
        } else {
            const emptyCartText = document.createElement('p');
            emptyCartText.innerHTML = 'Your cart is empty.';
            cartContent.appendChild(emptyCartText);
        }
    } else {
        const emptyCartText = document.createElement('p');
        emptyCartText.innerHTML = 'Your cart is empty.';
        cartContent.appendChild(emptyCartText);
    }
}

// Function to remove an item from the cart and local storage
function removeItem(index) {
    const cartItems = JSON.parse(localStorage.getItem('cart'));
    if (cartItems && cartItems.length > index) {
        cartItems.splice(index, 1); // Remove the item at the specified index
        localStorage.setItem('cart', JSON.stringify(cartItems)); // Update local storage
        updateCartView(); // Update the cart view

        // Get the parent of the removed item and remove it from the DOM
        const cartList = document.getElementById('cart-list');
        const removedItem = cartList.querySelector(`li[data-index="${index}"]`);
        if (removedItem) {
            cartList.removeChild(removedItem);
        }
    }
}

//retrieve cart items

function getCartItems() {
    const cartItems = JSON.parse(localStorage.getItem('cart'));
    console.log(cartItems);
    // console.log(cartItems[0]);
    return cartItems;
}

//add convert to list

function extractPrice(array) {
    const resultList = [];
    array.forEach((item) => {
      if (item['gc-cash']) {
        resultList.push(Number(item['gc-cash']));
      }
      if (item['gc-price']) {
        resultList.push(Number(item['gc-price']));
      }
    });
    return resultList;
}

// Call getCartItems function to retrieve the data
const cartItems = getCartItems();

// Call extractPrice with the cartItems as an argument
console.log(extractPrice(cartItems));
//total
function sumArray(numbers) {
    // Initialize a variable to store the sum
    let sum = 0;

    // Iterate through the array and add each number to the sum
    for (let i = 0; i < numbers.length; i++) {
        if (typeof numbers[i] === 'number') {
            sum += numbers[i];
        }
    }

    return sum;
}
console.log(sumArray(extractPrice(cartItems)));

// Create a button element for "Empty Cart"
const emptyCartButton = document.createElement('button');
emptyCartButton.id = 'empty-cart';
emptyCartButton.textContent = 'Empty Cart';

// Append the "Empty Cart" button to the cartContent element
cartContent.appendChild(emptyCartButton);

// Call updateCartView to ensure the button is displayed
updateCartView();


// stripe checkout ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


const stripe = Stripe('pk_test_51L8denBtDnDsDtOMCyguRiCrsCHifSwqzNrC0PNsSS303cQRPfGsBaPIqSmqkfgGIwyFDLMoguxKZDPPcaZDngQ7005FQgKh9Y'); // Add your Stripe publishable key

const checkoutButton = document.getElementById('submit');
    checkoutButton.addEventListener('click', () => {
        function getCookie(name) {
            let cookieValue = null;
            if (document.cookie && document.cookie !== '') {
                const cookies = document.cookie.split(';');
                for (let i = 0; i < cookies.length; i++) {
                    const cookie = cookies[i].trim();
                    if (cookie.substring(0, name.length + 1) === (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            console.log(cookieValue);
            return cookieValue;
        }
        
        const csrftoken = getCookie('csrftoken');
        
        function initiateCheckout(cartItems) {
            fetch('/create-checkout/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRFToken': csrftoken,
                },
                body: JSON.stringify({ cartItems: cartItems }),
            })
            .then(response => response.json())
            .then(data => {
                return stripe.redirectToCheckout({ sessionId: data.sessionId });
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        initiateCheckout(cartItems);
    });




