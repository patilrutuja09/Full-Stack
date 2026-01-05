// order success message
document.querySelector(".order-card").addEventListener("submit", function(e) {
    e.preventDefault();
    document.querySelector(".order-success").style.display = "block";
});

// coffee toggle
function showCoffee() {
    document.querySelector('.coffee-items').style.display = 'flex';
    document.querySelector('.snack-items').style.display = 'none';

    document.querySelectorAll('.toggle-btn')[0].classList.add('active');
    document.querySelectorAll('.toggle-btn')[1].classList.remove('active');
}

function showSnacks() {
    document.querySelector('.coffee-items').style.display = 'none';
    document.querySelector('.snack-items').style.display = 'flex';

    document.querySelectorAll('.toggle-btn')[1].classList.add('active');
    document.querySelectorAll('.toggle-btn')[0].classList.remove('active');
}


// cart functionality
let cartCount = 0;

function addToCart() {
    cartCount++;
    document.getElementById("cart-count").innerText = cartCount;
}

function changeQty(btn, value) {
    let qty = btn.parentElement.querySelector(".qty");
    let num = parseInt(qty.innerText) + value;
    if (num < 1) num = 1;
    qty.innerText = num;
}
//
function showCoffee() {
    document.querySelector(".coffee-items").style.display = "flex";
    document.querySelector(".snack-items").style.display = "none";
}

function showSnacks() {
    document.querySelector(".coffee-items").style.display = "none";
    document.querySelector(".snack-items").style.display = "flex";
}

// Cart functionality
let cart = [];

function addToCart(name, price) {
    let item = cart.find(i => i.name === name);

    if (item) {
        item.qty++;
    } else {
        cart.push({ name, price, qty: 1 });
    }

    updateCart();
}

function updateCart() {
    let cartItemsDiv = document.getElementById("cart-items");
    let cartCount = document.getElementById("cart-count");
    let cartTotal = document.getElementById("cart-total");

    cartItemsDiv.innerHTML = "";
    let total = 0;
    let count = 0;

    cart.forEach((item, index) => {
        total += item.price * item.qty;
        count += item.qty;

        cartItemsDiv.innerHTML += `
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <strong>${item.name}</strong><br>
                    ₹${item.price} × ${item.qty}
                </div>
                <div>
                    <button class="btn btn-sm btn-outline-dark" onclick="changeCartQty(${index}, -1)">−</button>
                    <button class="btn btn-sm btn-outline-dark" onclick="changeCartQty(${index}, 1)">+</button>
                    <button class="btn btn-sm btn-outline-danger" onclick="removeItem(${index})">✕</button>
                </div>
            </div>
        `;
    });

    cartCount.innerText = count;
    cartTotal.innerText = total;
}

function changeCartQty(index, value) {
    cart[index].qty += value;
    if (cart[index].qty <= 0) cart.splice(index, 1);
    updateCart();
}

function removeItem(index) {
    cart.splice(index, 1);
    updateCart();
}

function placeOrder() {
    if (cart.length === 0) {
        alert("Your cart is empty!");
        return;
    }

    alert("✅ Order placed successfully!");
    cart = [];
    updateCart();
    $('#cartModal').modal('hide');
}
